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

Route::get('/stock/listado', 'ProductController@obtener_datos_stock');
Route::post('/producto/editar','ProductController@editar_producto')->name('editar_producto');
Route::any('/producto/eliminar/{PDT_id}','ProductController@eliminar_desde_datatable')->name('eliminar_producto');

Route::get('/rusuario', 'ProductController@obtener_datos_user');
Route::post('/user/editar','ProductController@editar_usuario')->name('editar_usuario');
Route::any('/user/eliminar/{id}','ProductController@eliminar_usuario')->name('eliminar_usuario');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product/{PDT_id}/edit/','ProductController@edit')->name('Pedit');

Route::resource('/product','ProductController');

Route::resource('/stock','QuantityProductController');

Route::get('/product.stock','QuantityProductController@index')->name("stock");

Route::post('/product.CHStatus/{id}','ProductController@updateSTS')->name("actSTS");

Route::any('/product.quantity/{PDT_id}','QuantityProductController@Qlist')->name("Qlist");

Route::put('/product.quantity/{PDT_code}','QuantityProductController@update')->name("Qupdate");

Route::get('/productos','ProductController@list');

Route::get('/rusuario','ProductController@rusuario')->name("rusuario");

Route::resource('/typeproduct','TypeProductController');

Route::name("eliminaTPR")->delete('delete/{TPR_id}','TypeProductController@destroy');

Route::resource('/statusproduct','StatusProductController');

Route::delete('delete/{STS_id}','StatusProductController@destroy');

Route::get('/CHStatus','ProductController@CHStatus');


Route::get('product.storage1','ProductController@storage1');

Route::get('product.storage2','ProductController@storage2');

Route::get('/BuscarStock','ProductController@BuscarStock');






