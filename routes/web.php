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

//Route::get('/', 'MobileController@getMobileWithPrice');
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('mobile/search', 'MobileController@search')->name('mobile.search');
    Route::resource('brand', 'BrandController');
    Route::resource('mobiles', 'MobileController');
    Route::resource('review', 'ReviewController');
    Route::resource('mobile-image', 'MobileImagesController');
    Route::post('upload-review-images', 'ReviewController@uploadImages');
    Route::get('load-review-images/{review_id}', 'ReviewController@loadReviewImages');
    Route::get('upload-mobiles','MobileController@getuploadData')->name('mobiles.upload');
    Route::post('upload-mobiles','MobileController@uploadData')->name('mobiles.upload');
});


Route::prefix('on-demand')->group(function (){
    Route::get('/mobiles/get-by-price', 'API\MobileController@filterMobilesByPrice')->name('on_demand.mobiles.by_price');
    Route::get('/mobiles/get-by-name', 'API\MobileController@compareMobiles')->name('on_demand.mobiles.by_name');
    Route::get('/mobiles/compare', 'API\MobileController@chooseForMe')->name('on_demand.mobiles.choose_for_me');
});

Route::get('all/mobiles/prices', 'MobileController@getMobileWithPrice')->name('mobiles.prices');
Route::get('choose-for-me', 'ChooseForMeController@chooseForMe')->name('choose.me');
Route::get('change-language/{language}', 'TranslationController@changeLanguage')->name('language.change');
Route::post('choose-for-me', 'ChooseForMeController@filterApply')->name('choose.me');
Route::get('/compare', 'CompareController@getCompare')->name('compare.index');
Route::post('compare-items', 'CompareController@analyzeCompareProcess')->name('compare.analyze');
Route::post('post-comment', 'MobileCommentController@postComment');
Route::get('mobiles/{mobile}/{mobile_brand}/{mobile_name}', 'MobileController@show')->name('mobiles.display');
Route::get('brands/{brand}/mobiles', 'MobileController@getMobilesByBrand')->name('brand.mobiles');
Route::get('brands/all-brands', 'MobileController@allBrands')->name('brand.all');

Route::group(['middleware' => ['auth']], function () {
    Route::post('make-favourite', 'MobileController@makeFavourite')->name('make.favourite');
});

Auth::routes();
