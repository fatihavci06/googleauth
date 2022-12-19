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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/redirect', 'App\Http\Controllers\SocialAuthController@redirectToProvider')->name('redirectgoogle');
Route::get('/callback', 'App\Http\Controllers\SocialAuthController@handleProviderCallback');

Route::group(['prefix' => 'yonetim'], function() {
    Route::get('/giris','App\Http\Controllers\back\IndexController@login')->name('back.giris');
    Route::post('/girispost','App\Http\Controllers\back\IndexController@loginpost')->name('back.girispost');
    Route::get('/sifremi-unuttum','App\Http\Controllers\back\IndexController@sifremiunuttum')->name('back.sifremiunuttum');
    Route::post('/sifremi-unuttum','App\Http\Controllers\back\IndexController@sifremiunuttumpost')->name('back.sifremiunuttumpost');
    Route::get('/','App\Http\Controllers\back\IndexController@index')->name('back.index');
    Route::get('/logout','App\Http\Controllers\back\IndexController@logout')->name('back.logout');
    Route::group(['prefix' => 'personel'], function() {
    Route::get('/ekle','App\Http\Controllers\back\PersonelController@ekle')->name('personel.ekle');
    Route::post('/ekle','App\Http\Controllers\back\PersonelController@eklepost')->name('personel.eklepost');
    Route::get('/liste','App\Http\Controllers\back\PersonelController@liste')->name('personel.liste');
    });
  });
