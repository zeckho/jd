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