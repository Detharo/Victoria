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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/product','ProductController');

Route::resource('/stock','QuantityProductController');
Route::get('/product.stock','QuantityProductController@index')->name("stock");
Route::post('/product.quantity/{PDT_id}','QuantityProductController@Qlist')->name("Qlist");

Route::get('/productos','ProductController@list');

Route::get('/rusuario','ProductController@rusuario');

Route::resource('/typeproduct','TypeProductController');
Route::name("eliminaTPR")->delete('delete/{TPR_id}','TypeProductController@destroy');

Route::resource('/statusproduct','StatusProductController');
Route::delete('delete/{STS_id}','StatusProductController@destroy');

Route::get('/CHStatus','ProductController@CHStatus');


Route::get('/BuscarStock','ProductController@BuscarStock');

Route::put('update/{PDT_code}','ProductController@updateSTS');





