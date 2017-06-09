<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('inventario/categoria','CategoriaController');
Route::resource('inventario/articulo','ArticuloController');
Route::resource('inventario/almacen','AlmacenController');
Route::resource('inventario/productoporalmacen','ProductoAlmacenController');

Route::resource('ventas/cliente','ClienteController');
Route::resource('ventas/vendedor','VendedorController');
Route::resource('ventas/factura','FacturaController');

Route::resource('configuracion/serie','SerieController');
Route::resource('configuracion/usuario','UsuarioController');

Route::auth();

Route::get('/home', 'HomeController@index');
