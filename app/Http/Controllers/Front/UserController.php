<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class  UserController extends  Controller{
    public function showUserName()
    {
        return 'Salim Sayed';
    }

    public function getIndex()
    {
       /* $obj  = new \stdClass();
        $obj -> name='salim';
        $obj ->id=5;
        $obj ->gender='male';

//    return view('welcome',$data);
        return view('welcome',compact('obj'));*/
        $data=[];
        return view('welcome',compact('data'));
//        return view('welcome')->with('name','salim');

    }
}
