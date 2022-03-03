<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SecondController extends Controller
{

    public  function ShowString(){
        return 'hello from show string function';
    }
}
