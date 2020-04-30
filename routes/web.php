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
    return view('home');
});

Route::get('/first-page', 'TcpdfController@firstPage')->name('firstPage');
Route::get('/second-page', 'TcpdfController@secondPage')->name('secondPage');
Route::get('/download-pdf', 'TcpdfController@downloadPDF')->name('downloadPDF');

Route::get('/products', 'ProductsController@index')->name('products');
Route::get('add-to-cart/{id}', 'ProductsController@addToCart')->name('addToCart');

Route::get('/carts', 'CartsController@index')->name('carts');

Route::patch('update-cart', 'CartsController@update');
Route::patch('submit-discount', 'CartsController@submitDiscount');
Route::delete('remove-from-cart', 'CartsController@remove');