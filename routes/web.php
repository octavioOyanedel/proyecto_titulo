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

//ajax socio
Route::get('/verificar_rut', 'SocioController@verificarRut');
Route::get('/verificar_numero_socio', 'SocioController@verificarNumeroSocio');
Route::get('/verificar_correo', 'SocioController@verificarCorreo');
Route::get('/cargar_ciudades', 'CiudadController@obtenerCiudades');
Route::get('/cargar_areas', 'AreaController@obtenerAreas');

//ajax prestamo
Route::get('/verificar_rut_prestamo', 'PrestamoController@verificarRut');
Route::get('/verificar_cheque', 'PrestamoController@verificarCheque');
Route::get('/verificar_numero_egreso', 'PrestamoController@verificarNumeroEgreso');
Route::get('/obtener_id_socio_con_rut', 'SocioController@obtenerIdSocioConRut');

//ajax pagos automaticos
route::get('/cambio_estado_deposito', 'PrestamoController@cambiarEstadoDeposito');
route::get('/pago_cuotas_atrasadas', 'PrestamoController@pagoAutomaticoCuotas');
route::get('/saldar_prestamo', 'PrestamoController@saldarPrestamo');
route::get('/pago_cuota', 'PrestamoController@pagoCuota');

//ajax contable
Route::get('/verificar_cheque_contable', 'RegistroContableController@verificarCheque');
Route::get('/verificar_numero_registro', 'RegistroContableController@verificarNumero');
Route::get('/cargar_conceptos', 'RegistroContableController@obtenerConceptos');

//ajax carga familiar
Route::get('/verificar_rut_carga', 'CargaFamiliarController@verificarRut');

//ajax estudios
Route::get('/cargar_instituciones', 'GradoAcademicoInstitucionController@obtenerInstituciones');
Route::get('/cargar_titulos', 'GradoAcademicoTituloController@obtenerTitulos');

//ajax usuarios
Route::get('/verificar_correo_usuario', 'UsuarioController@verificarCorreo');

Route::resource('/socios', 'SocioController')->middleware('auth');
Route::get('/filtro_socios', 'BuscarController@filtroSocios')->name('filtro_socios')->middleware('auth');
Route::get('/filtro_prestamos', 'BuscarController@filtroPrestamos')->name('filtro_prestamos')->middleware('auth');
Route::get('/filtro_contables', 'BuscarController@filtroContables')->name('filtro_contables')->middleware('auth');
Route::get('/filtro_historial', 'BuscarController@filtroHistorial')->name('filtro_historial')->middleware('auth');

Route::resource('/prestamos', 'PrestamoController')->middleware('auth');
Route::post('/simulacion', 'PrestamoController@simulacion')->name('simulacion')->middleware('auth');
Route::get('/cancelar_deposito/{id}', 'PrestamoController@cancelarDeposito')->name('cancelar_deposito')->middleware('auth');

Route::resource('/contables', 'RegistroContableController')->middleware('auth');
Route::resource('/sedes', 'SedeController')->middleware('auth');
Route::resource('/areas', 'AreaController')->middleware('auth');
Route::resource('/cargos', 'CargoController')->middleware('auth');
Route::resource('/situaciones', 'EstadoSocioController')->middleware('auth');
Route::resource('/nacionalidades', 'NacionalidadController')->middleware('auth');
Route::resource('/formas_pago', 'FormaPagoController')->middleware('auth');
Route::resource('/cuentas', 'CuentaController')->middleware('auth');
Route::resource('/conceptos', 'ConceptoController')->middleware('auth');
Route::resource('/bancos', 'BancoController')->middleware('auth');
Route::resource('/asociados', 'AsociadoController')->middleware('auth');
Route::resource('/historial', 'LogSistemaController')->middleware('auth');
Route::resource('/usuarios', 'UsuarioController')->middleware('auth');

//****************************************************************************************************
//ruta carga continua de info cargas familiares
Route::get('cargas/create/{id}', [
    'as' => 'cargas.create',
    'uses' => 'CargaFamiliarController@create'
]);

Route::get('cargas/create/', function () {
    return redirect('home');
});

Route::resource('/cargas', 'CargaFamiliarController', ['except' => 'create'])->middleware('auth');
//****************************************************************************************************

//****************************************************************************************************
//ruta carga continua de info estudios realizados
Route::get('estudios/create/{id}', [
    'as' => 'estudios.create',
    'uses' => 'EstudioRealizadoController@create'
]);

Route::get('estudios/create/', function () {
    return redirect('home');
});

Route::resource('/estudios', 'EstudioRealizadoController', ['except' => 'create'])->middleware('auth');
Route::get('/estudios_socio', 'EstudioRealizadoSocioController@agregarEstudio')->name('estudios_socio')->middleware('auth');
//****************************************************************************************************

Route::resource('/parentescos', 'ParentescoController')->middleware('auth');
Route::resource('/niveles', 'GradoAcademicoController')->middleware('auth');
Route::resource('/instituciones', 'InstitucionController')->middleware('auth');
Route::resource('/estados', 'EstadoGradoAcademicoController')->middleware('auth');
Route::resource('/titulos', 'TituloController')->middleware('auth');

Route::get('/cambiar_password', 'UsuarioController@editPassword')->name('usuarios.editPassword')->middleware('auth');

Route::get('/crear_conciliacion', 'ConciliacionController@crear')->name('crear_conciliacion')->middleware('auth');
Route::post('/mostrar_conciliacion', 'ConciliacionController@mostrar')->name('mostrar_conciliacion')->middleware('auth');

Route::get('/mantenedor_socios','MantenedorController@socios')->name('mantenedor_socios')->middleware('auth');
Route::get('/mantenedor_prestamos','MantenedorController@prestamos')->name('mantenedor_prestamos')->middleware('auth');
Route::get('/mantenedor_contables','MantenedorController@contables')->name('mantenedor_contables')->middleware('auth');
Route::get('/mantenedor_cargas','MantenedorController@cargas')->name('mantenedor_cargas')->middleware('auth');
Route::get('/mantenedor_estudios','MantenedorController@estudios')->name('mantenedor_estudios')->middleware('auth');