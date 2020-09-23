<?php

use Illuminate\Support\Facades\Route;

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
    if(Auth::check()){
        return redirect()->route('home');
    }else {
        return view('welcome');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::post('categorias/datatable', 'CategoriaProductoController@datatable')->name('categorias.datatable');
    Route::post('unidades/datatable', 'UnidadMedidaController@datatable')->name('unidades.datatable');
    Route::post('publicidad/datatable', 'PublicidadController@datatable')->name('publicidad.datatable');
    Route::post('productos/datatable', 'ProductoController@datatable')->name('productos.datatable');
    Route::resource('cuenta', 'AccountController');
    Route::resource('categorias', 'CategoriaProductoController');
    Route::resource('unidades', 'UnidadMedidaController');
    Route::resource('publicidad', 'PublicidadController');
    Route::resource('vender', 'SellController');
    Route::resource('comprar', 'BuyController');
    Route::resource('bodegas', 'BodegaController');
    Route::resource('productos', 'ProductoController');
});
