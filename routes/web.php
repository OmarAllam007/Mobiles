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

Route::group(['middleware'=>['auth']],function (){
    Route::post('make-favourite','MobileController@makeFavourite')->name('make.favourite');
});
Route::get('choose-for-me','ChooseForMeController@chooseForMe')->name('choose.me');
Route::get('change-language/{language}','TranslationController@changeLanguage')->name('language.change');
Route::post('choose-for-me','ChooseForMeController@filterApply')->name('choose.me');
Route::get('/compare', 'CompareController@getCompare')->name('compare.index');
Route::post('compare-items', 'CompareController@analyzeCompareProcess')->name('compare.analyze');
Route::post('post-comment','MobileCommentController@postComment');
Route::get('mobiles/{mobile}/{mobile_brand}/{mobile_name}', 'MobileController@show')->name('mobile.display');
Route::get('mobiles/prices', 'MobileController@getMobileWithPrice')->name('mobile.prices');


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
