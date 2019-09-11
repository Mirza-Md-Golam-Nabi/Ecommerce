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

Route::get('/', ['as' => 'welcome', 'uses' => 'GuestHomeController@index']);

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/sr/register', [
    'as' => 'srregister', 'uses' => 'SrbaseController@registrationContlr'
]);
Route::get('/sr/login', [
    'as' => 'srlogin', 'uses' => 'SrbaseController@loginContlr'
]);

Route::get('/merchant/register', [
    'as' => 'merchantregister', 'uses' => 'MerchantController@registrationView'
]);

Route::get('/merchant/varification', [
    'as' => 'merchantvarification', 'uses' => 'MerchantController@varificationContlr'
]);
Route::get('/merchant/login', [
    'as' => 'merchantlogin', 'uses' => 'MerchantController@loginContlr'
]);

Route::post('/merchant/login', [
    'as' => 'merchantloginprocess', 'uses' => 'MerchantController@doLogin'
]);

Route::post('/merchant/register', [
    'as' => 'merchantregisterpost', 'uses' => 'MerchantController@registrationFinal'
]);
Route::post('/merchant/verificationpost', [
    'as' => 'merchantvarificationpost', 'uses' => 'MerchantController@verificationFinal'
]);


/*................PRODUCT START...........*/

Route::get('/product/create', [
    'as' => 'productcreate', 'uses' =>'ProductController@productCreatevw'
]);
Route::get('/product/categoryfetch', [
    'as' => 'catgetfrmtyp', 'uses' =>'ProductController@datagetCatg'
]);
Route::get('/product/subcategoryfetch', [
    'as' => 'subgetfrmcat', 'uses' =>'ProductController@datagetSubcatg'
]);

Route::post('/product/upload', [
    'as' => 'productupload', 'uses' => 'ProductController@productUpload'
]);

Route::get('merchant/product/list', [
    'as' => 'merproductlist', 'uses' =>'ProductController@productList'
]);

Route::get('merchant/product/update/{id}', 'ProductController@productEdit')->name('productEdit');

Route::post('merchant/product/update/{id}','ProductController@productUpdate')->name('productupdate');

Route::get('merchant/product/delete/{id}','ProductController@productDelete')->name('productDelete');

Route::get('merchant/orderlist', [
    'as' => 'merorderlist', 'uses' =>'OrderController@orderList'
]);

Route::get('merchant/shiped/orderlist', [
    'as' => 'mershipedorderlist', 'uses' =>'OrderController@shipedorderList'
]);

Route::get('merchant/datewisereport', [
    'as' => 'datewiseorderhistory', 'uses' =>'OrderController@shipedorderList'
]);


/*................PRODUCT ENDS...........*/


/*................BRAND STARTS...........*/

Route::group(['prefix' => 'brand'], function(){

    Route::get('/create', 'BrandController@addBrand')->name('addBrand');

    Route::post('/create', 'BrandController@saveBrand')->name('saveBrand');

    Route::get('/list', 'BrandController@brandList')->name('brandList');

    Route::get('/edit/{id}', 'BrandController@brandEdit')->name('brandEdit');

    Route::post('/update/{id}', 'BrandController@brandUpdate')->name('brandUpdate');

    Route::get('/delete/{id}', 'BrandController@brandDelete')->name('brandDelete');

});

/*................BRAND ENDS...........*/


Auth::routes();
