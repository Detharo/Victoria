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

Route::get('/productos','ProductController@list');

Route::get('/rusuario','ProductController@rusuario');

Route::resource('/typeproduct','TypeProductController');
Route::name("eliminaTPR")->delete('delete/{TPR_id}','TypeProductController@destroy');
Route::resource('/statusproduct','StatusProductController');

Route::delete('delete/{STS_id}','StatusProductController@destroy');

Route::get('/CHStatus','ProductController@CHStatus');

Route::put('update/{PDT_code}','ProductController@updateSTS');





