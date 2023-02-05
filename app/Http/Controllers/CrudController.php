<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Validator;

class CrudController extends Controller
{
    public function __construct()
    {

    }

    public function getOffers()
    {
        $offers = Offer::orderBy('id', 'DESC')->get();
        return view('offers.getOffers', compact('offers'));
    }

    public function createOffer()
    {
        return view('offers.create');
    }
    public function store(Request $request)
    {


        $rules = $this->getRules();
        $messages = $this->getMessages();
       

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'photo' => 'img2.png',
            'details' => $request->details,
        ]);
        return redirect(route('offers.getOffers'))->with(['success' => 'تم اضافة العرض بنجاح']);
    }

    protected function getRules(){
       return  [
            'name' => 'required|string|unique:offers,name|max:100',
            'price' => 'required|numeric',
            'details' => 'required|string',
        ];
    }
    protected function getMessages(){
        return [
            'name.required' => __('messages.offer name required'),
            'details.required' => 'تفاصيل العرض مطلوبة',
            'name.unique' => __('messages.offer name must be unique'),
            'price.required' => 'سعر العرض مطلوب',
            'price.numeric' => 'سعر العرض يجب ان يكون رقماََ',
        ];
    }
}
