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


Route::resource('inventario/vehiculo','VehiculoController');
Route::resource('inventario/marca','MarcaController');
Route::resource('inventario/color','ColorController');
Route::resource('inventario/repuesto','RepuestoController');


Route::resource('ventas/cliente','ClienteController');
Route::resource('ventas/vendedor','VendedorController');
Route::resource('ventas/factura','FacturaController');

Route::resource('configuracion/serie','SerieController');
Route::resource('configuracion/usuario','UsuarioController');


Route::resource('import/importaciones','ImportController');
Route::resource('import/bl','BlController');
Route::resource('import/proveedor','ProveedorController');


Route::resource('taller/reparacion', 'ReparacionController');
Route::resource('taller/comprarepuesto','CompraRepuestoController');

Route::auth();

Route::get('test/datepicker', function () {
    return view('datepicker');
});
//Route::get('/home', 'HomeController@index');

