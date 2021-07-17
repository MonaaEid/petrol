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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salling', 'mainController@index');
Route::get('/addProduct', 'galleryController@addProduct');
Route::post('/storeProduct', 'galleryController@store');
Route::get('/order', 'galleryController@galleryOrder');
// Route::get('/orderr', 'galleryController@galleryOrderr');
Route::post('/storeOrder', 'galleryController@storeOrder');
Route::get('/galleryList', 'galleryController@index');
//delete a reservation from the list
Route::get('/deleter/{id}','galleryController@delete');
Route::get('/editer/{id}','galleryController@edit');
Route::post('/editer/{id}/update','galleryController@update');



Route::get('/priceTwo', 'galleryController@priceTwo')->name('priceTwo');
Route::get('/totalPriceUpdate', 'galleryController@totalPriceUpdate')->name('totalPriceUpdate');
