<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\NewsController;
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

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/test', function () {
return ('welcome');
});

Route::namespace ('Front')->group(function () {
Route::get('user', [UserController::class, 'show']);
}); */

/* Route::group(['namespace'=>'Admin'], function () {
Route::get('second',[SecondController::class, 'show']);
}); */

Route::resource('news', NewsController::class);

Route::get('view', [UserController::class, 'getView']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

//
Route::group(['prefix' => 'offer'], function () {
    Route::get('get', [CrudController::class, 'getOffers'])->name('offers.getOffers');
    Route::get('create', [CrudController::class, 'createOffer'])->name('offers.create');
    Route::post('store', [CrudController::class, 'store'])->name('offer.store');
});
