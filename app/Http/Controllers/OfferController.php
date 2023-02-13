<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTrait;

class OfferController extends Controller
{
    use OfferTrait;
    public function create()
    {
        return view('ajaxoffers.create');
    }
    public function store(OfferRequest $request)
    {
        $file_name = $this->saveImage($request->photo, 'images/offers');
        $offer = Offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'photo' => $file_name,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
        ]);
        if ($offer) {
            return response()->json([
                'status' => true,
                'msg' => 'تم الحفظ بنجاح',
            ]);

        } else {
            return response()->json([
                'status' =>false,
                'msg' => 'فشل الحفظ ',
            ]);
        }
    }
}
