<?php

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


Route::get('/', 'MobileController@getMobileWithPrice');

Route::group(['middleware' => ['auth','admin']], function () {
    Route::resource('brand', 'BrandController');
    Route::resource('mobile', 'MobileController');
    Route::resource('mobile-image', 'MobileImagesController');
});

Route::get('/compare', 'CompareController@getCompare')->name('compare.index');
Route::post('compare-items', 'CompareController@analyzeCompareProcess')->name('compare.analyze');

Route::get('mobiles/{mobile}/{mobile_brand}/{mobile_name}', 'MobileController@show')->name('mobile.display');
Route::get('mobiles/prices', 'MobileController@getMobileWithPrice')->name('mobile.prices');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
