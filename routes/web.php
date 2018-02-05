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
Route::get('/stock/listado2', 'ProductController@obtener_datos_stock2');
Route::post('/producto/editar','ProductController@editar_productos')->name('editar_productos');
Route::any('/producto/eliminar/{PDT_id}','ProductController@eliminar_desde_datatable')->name('eliminar_producto');

Route::get('user/rusuario', 'ProductController@obtener_datos_user');
Route::post('/user/editar','ProductController@editar_usuario')->name('editar_usuario');
Route::any('/user/eliminar/{id}','ProductController@eliminar_usuario')->name('eliminar_usuario');
Route::any('/rusuario}','ProductController@createUser')->name('createUser');

Route::get('/stock/quantity', 'QuantityProductController@obtener_datos_quantity');
Route::post('/quantity/editar','QuantityProductController@editar_quantity')->name('editar_producto');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product/{PDT_id}/edit/','ProductController@edit')->name('Pedit');

Route::resource('/product','ProductController');

Route::resource('/stock','QuantityProductController');

Route::get('/product.stock','QuantityProductController@index')->name("stock");

Route::post('/product.CHStatus','QuantityProductController@actSTS')->name("actSTS");

Route::any('/product.quantity/{PDT_id}','QuantityProductController@Qlist')->name("Qlist");

Route::any('/product.quantity2/{PDT_id}','QuantityProductController@Qlist2')->name("Qlist2");


Route::put('/product.quantity/{PDT_code}','QuantityProductController@update')->name("Qupdate");

Route::get('/productos','ProductController@list');
Route::get('/productos2','ProductController@list2');

Route::get('/granel','ProductController@granel');

Route::get('/rusuario','ProductController@rusuario')->name("rusuario");

Route::resource('/typeproduct','TypeProductController');


Route::name("eliminaTPR")->delete('delete/{TPR_id}','TypeProductController@destroy');

Route::resource('/statusproduct','StatusProductController');

Route::delete('delete/{STS_id}','StatusProductController@destroy');

Route::get('/CHStatus','ProductController@CHStatus');

Route::get('product.storage1','ProductController@storage1');
Route::post('product.storage1','ProductController@storageCH')->name('storageCH');


Route::get('product.storage2','ProductController@storage2');
Route::post('product.storage2','ProductController@storageCH2')->name('storageCH2');

Route::get('product.merma','ProductController@merma');
Route::get('/productos/merma', 'ProductController@obtener_datos_merma');


Route::get('product.vendido','ProductController@vendido');
Route::get('/productos/vendido', 'ProductController@obtener_datos_vendido');



Route::get('/BuscarStock','ProductController@BuscarStock');






