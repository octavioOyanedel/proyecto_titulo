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
Route::get('/conciliacion', 'ConciliacionController@conciliacion')->name('conciliacion')->middleware('auth');