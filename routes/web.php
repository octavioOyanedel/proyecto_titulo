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

Route::resource('/socios', 'SocioController')->middleware('auth');
Route::get('/busqueda', 'BuscarController@busquedaAvanzada')->name('buscar')->middleware('auth');

Route::resource('/prestamos', 'PrestamoController')->middleware('auth');

Route::resource('/contables', 'RegistroContableController')->middleware('auth');

Route::get('/crear-conciliacion', 'ConciliacionController@crear')->name('crear_conciliacion')->middleware('auth');
Route::post('/mostrar-conciliacion', 'ConciliacionController@mostrar')->name('mostrar_conciliacion')->middleware('auth');

Route::get('/mantenedor','MantenedorController@mantenedor')->name('mantenedor')->middleware('auth');