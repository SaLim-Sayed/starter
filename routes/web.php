<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth::routes(['verify'=>True]);
//Route::get('/home','HomeController@index')->name('home')->middleware('verified'  );
//
//Route::get('/', function () {
//    return 'Home';
//});
///*
//Route::get('/', function () {
////    $data=[];
////    $data['age']=5;
////    $data['string']='salim sayed salim';
//    return 'Home';
//
//
////    return view('welcome')->with(['string'=>'salim sayed ','age'=>23 ]);
//});
//*/
//Route::get('/test',function (){
//    return 'welcome';
//});
//
//Route::get('/test1/{id}',function ($id){
//    return  $id;
//});
//
//Route::get('/test3',function (){
//    return 'welcome route A';
//}) ->name('a');
//
//
//Route::namespace('Front')->group(function (){
//    Route::get('users','UserController@showUserName');
//}
//);
//
//Route::group(['prefix'=>'user','middleware'=>'auth'],function (){
//    Route::get('/',function (){
//        return 'hello';
//    });
//    Route::get('show','UserController@showAdminName' );
//
//    Route::get('delete','UserController@showAdminName' );
//
//});
////
////Route::get('check',function (){
////    return 'middleware';
////
////}) ->middleware('auth') ;
////
////Route::group(['namespace'=>'Admin'],function (){
////    Route::get('second','SecondController@showString');
////
////});
//Route::get('index','Front\UserController@getIndex');
//
//
//
//Route::get('/landing',function (){
//    return view('landing');
//});
//
//Route::get('/about',function (){
//    return view('about');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified'  );

Route::get('/',function (){
    return 'welcome hmoe';
});

Route::get('/dashboard',function (){
    return 'dashboard';
});


//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::get('/',function (){
//    return 'welcome hmoe';
//});
