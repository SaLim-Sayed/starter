<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show(){
        return 'Salim Sayed';
    }

    public function getView(){
        // return view('welcome')->with(['data'=>'Salim Sayeed','age'=>24]);
        // return view('landing');
        return view('about');
    }
}
