<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\Video;
use App\Traits\OfferTrait;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{
    use OfferTrait;
    public function __construct()
    {

    }

    public function getOffers()
    {
        $offers = Offer::select(
            'id',
            'price',
            'photo',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details',
        )->get();
        return view('offers.getOffers', compact('offers'));
    }

    public function createOffer()
    {
        return view('offers.create');
    }
    public function editOffer($id)
    {
        $offer = Offer::findOrFail($id);
        return view('offers.edit', compact('offer'));
    }

    public function store(OfferRequest $request)
    {
        $file_name = $this->saveImage($request->photo, 'images/offers');
        Offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'photo' => $file_name,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
        ]);
        return redirect(route('offers.getOffers'))->with(['success' => __('messages.success')]);
    }
    public function updateOffer(OfferRequest $request, $id)
    {

        $offer = Offer::findOrFail($id);
        $offer->update($request->all());
        return redirect(route('offers.getOffers'))->with(['success' => 'تم تحديث بيانات العنصر رقم ' . $offer->id . ' بنجاح']);
    }
    public function deleteOffer($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return redirect(route('offers.getOffers'))->with(['success' => 'تم حذف بيانات العنصر رقم ' . $offer->id . ' بنجاح']);
    }

    public function getVideo()
    {
        $video = Video::first();
        event(new VideoViewer($video));
        return view('offers.video', compact('video'));
    }
}
