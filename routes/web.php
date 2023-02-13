<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Auth\CustomController;
use App\Http\Controllers\Auth\CustomAuthController;
// use Mcamara\LaravelLocalization\LaravelLocalization;

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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::get('/', function () {
        return view('layout');
    });

    Route::resource('news', NewsController::class);

    Route::get('view', [UserController::class, 'getView']);

    Auth::routes(['verify' => true]);

    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

    Route::group(['prefix' => 'offer'], function () {
        Route::get('get', [CrudController::class, 'getOffers'])->name('offers.getOffers');
        Route::get('create', [CrudController::class, 'createOffer'])->name('offers.create');
        Route::post('store', [CrudController::class, 'store'])->name('offer.store');

        Route::get('edit/{id}', [CrudController::class, 'editOffer'])->name('offer.edit');
        Route::post('update/{id}', [CrudController::class, 'updateOffer'])->name('offer.update');
        Route::get('delete/{id}', [CrudController::class, 'deleteOffer'])->name('offer.delete');
    });
    Route::get('youtube', [CrudController::class, 'getVideo'])->name('video');



    ##Ajax request
    Route::group(['prefix' => 'ajax-offers'],function(){
        Route::get('create',[OfferController::class,'create'])->name('ajax.create');
        Route::post('store',[OfferController::class,'store'])->name('ajax.store');
    });
});

Route::get('/notadult',function(){
    return 'Not Adults';
})->name('notadult');

Route::group(['middleware'=>'CheckAge'],function(){
    Route::get('custom',[CustomAuthController::class,'Adult'])->name('adult');
});