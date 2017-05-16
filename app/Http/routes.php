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
    return view('welcome');
});

Route::get('/clientes', function () {
    return view('clientes');
});

Route::get('/include/menu', function () {
    return view('includes.menu');
});

Route::get('/include/listClientes', function () {
    return view('includes.listClientes');
});

Route::get('/include/inicio', function () {
    return view('includes.inicio');
});

Route::get('/include/graficas', function () {
    return view('includes.graficas');
});

Route::get('/include/cliente', function () {
    return view('includes.cliente');
});

Route::post('/saveCliente', 'ClienteController@save');
Route::get('/getClientes', 'ClienteController@getClientes');
Route::get('/getCliente', 'ClienteController@getCliente');
Route::post('/editCliente', 'ClienteController@edit');
Route::get('/deleteCliente', 'ClienteController@delete');

Route::get('/include/listVendedores', function () {
    return view('includes.listVendedor');
});

Route::get('/include/vendedor', function () {
    return view('includes.vendedor');
});

Route::post('/saveVendedor', 'VendedorController@save');
Route::get('/getVendedores', 'VendedorController@getVendedores');
Route::get('/getVendedor', 'VendedorController@getVendedor');
Route::post('/editVendedor', 'VendedorController@edit');
Route::get('/deleteVendedor', 'VendedorController@delete');

Route::get('/include/listVisitas', function () {
    return view('includes.listVisitas');
});

Route::get('/include/visita', function () {
    return view('includes.visita');
});

Route::get('/getVisitas', 'VisitaController@getVisitas');
Route::post('/saveVisita', 'VisitaController@save');
Route::get('/getVisitasByCiudad', 'VisitaController@getVisitasByCiudad');
Route::get('/getVisitasByCliente', 'VisitaController@getVisitasByCliente');

Route::get('/include/reporte', function () {
    return view('includes.reporte');
});


Route::get('/getPaises', 'PaisController@getPaises');
Route::get('/getDepartamentos', 'DepartamentoController@getDepartamentosByPais');
Route::get('/getCiudades', 'CiudadController@getCiudadesByDepartamento');