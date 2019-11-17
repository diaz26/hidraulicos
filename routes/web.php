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
    return view('auth.login');
});

// Route::get('articuloss', 'ArticulosController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function ($routes) {
    $routes->get('/home', 'HomeController@index')->name('home');

    $routes->group(['prefix' => 'proveedores'], function ($routes) {
        $routes->get('', array('uses' => 'ProveedoresController@index'));
        $routes->post('', array('uses' => 'ProveedoresController@store'));
        $routes->get('delete/{id}', array('uses' => 'ProveedoresController@destroy'));
    });
    $routes->group(['prefix' => 'clientes'], function ($routes) {
        $routes->get('', array('uses' => 'ClientesController@index'));
        $routes->post('', array('uses' => 'ClientesController@store'));
        $routes->get('delete/{id}', array('uses' => 'ClientesController@destroy'));
    });
    $routes->group(['prefix' => 'articulos'], function ($routes) {
        $routes->get('', array('uses' => 'ArticulosController@index'));
        $routes->post('', array('uses' => 'ArticulosController@store'));
        $routes->get('delete/{id}', array('uses' => 'ArticulosController@destroy'));
    });
});

