<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Http\Requests\OfferRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class CrudController extends Controller
{
    public function __construct()
    {

    }

    public function getOffers()
    {
        $offers = Offer::select(
            'id',
            'price',
            'name_'.LaravelLocalization::getCurrentLocale().' as name',
            'details_'.LaravelLocalization::getCurrentLocale().' as details',
        )->get();
        return view('offers.getOffers', compact('offers'));
    }

    public function createOffer()
    {
        return view('offers.create');
    }
    public function store(OfferRequest $request)
    {
        Offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'photo' => 'img2.png',
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
        ]);
        return redirect(route('offers.getOffers'))->with(['success' =>__('messages.success')]);
    }

}
