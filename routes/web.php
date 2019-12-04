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
Route::get('/verificar_numero_cuenta', 'CuentaController@verificarNumeroCuenta');

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

//filtros
Route::get('/filtro_socios_form', 'SocioController@filtroSociosForm')->name('filtro_socios_form')->middleware('auth');
Route::get('/filtro_socios', 'SocioController@filtroSocios')->name('filtro_socios')->middleware('auth');

Route::get('/filtro_prestamos_form', 'PrestamoController@filtroPrestamosForm')->name('filtro_prestamos_form')->middleware('auth');
Route::get('/filtro_prestamos', 'PrestamoController@filtroPrestamos')->name('filtro_prestamos')->middleware('auth');

Route::get('/filtro_contables_form', 'RegistroContableController@filtroContablesForm')->name('filtro_contables_form')->middleware('auth');
Route::get('/filtro_contables', 'RegistroContableController@filtroContables')->name('filtro_contables')->middleware('auth');

Route::get('/filtro_historial_form', 'LogSistemaController@filtroHistorialForm')->name('filtro_historial_form')->middleware('auth');
Route::get('/filtro_historial', 'LogSistemaController@filtroHistorial')->name('filtro_historial')->middleware('auth');

Route::resource('/socios', 'SocioController')->middleware('auth');
Route::resource('/prestamos', 'PrestamoController')->middleware('auth');
Route::post('/simulacion', 'PrestamoController@simulacion')->name('simulacion')->middleware('auth');
Route::get('/cancelar_deposito/{id}', 'PrestamoController@cancelarDeposito')->name('cancelar_deposito')->middleware('auth');


Route::resource('/sedes', 'SedeController')->middleware('auth');
Route::resource('/areas', 'AreaController')->middleware('auth');
Route::resource('/cargos', 'CargoController')->middleware('auth');
Route::resource('/estado_socios', 'EstadoSocioController')->middleware('auth');
Route::resource('/nacionalidades', 'NacionalidadController')->middleware('auth');

Route::resource('/formas_pago', 'FormaPagoController')->middleware('auth');

Route::resource('/cuentas', 'CuentaController')->middleware('auth');
Route::resource('/tipos_cuentas', 'TipoCuentaController')->middleware('auth');
Route::resource('/conceptos', 'ConceptoController')->middleware('auth');
Route::resource('/bancos', 'BancoController')->middleware('auth');
Route::resource('/asociados', 'AsociadoController')->middleware('auth');

Route::resource('/historial', 'LogSistemaController')->middleware('auth');

Route::resource('/usuarios', 'UsuarioController')->middleware('auth');

Route::resource('/contables', 'RegistroContableController')->middleware('auth');

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


Route::resource('/estudios_socio', 'EstudioRealizadoSocioController')->middleware('auth');


//****************************************************************************************************

Route::resource('/parentescos', 'ParentescoController')->middleware('auth');

Route::resource('/niveles', 'GradoAcademicoController')->middleware('auth');
Route::resource('/instituciones', 'InstitucionController')->middleware('auth');
Route::resource('/estados_nivel', 'EstadoGradoAcademicoController')->middleware('auth');
Route::resource('/titulos', 'TituloController')->middleware('auth');

Route::get('/passwords', 'UsuarioController@editPassword')->name('passwords')->middleware('auth');
Route::post('/update_passwords', 'UsuarioController@updatePassword')->name('update_passwords')->middleware('auth');

Route::get('/crear_conciliacion', 'ConciliacionController@crear')->name('crear_conciliacion')->middleware('auth');
Route::get('/mostrar_conciliacion', 'ConciliacionController@mostrar')->name('mostrar_conciliacion')->middleware('auth');

Route::get('/anular_registro_form', 'RegistroContableController@anularCheque')->name('anular_registro_form')->middleware('auth');
Route::post('/anular_registro', 'RegistroContableController@anular')->name('anular_registro')->middleware('auth');

//mantenedores
Route::get('/mantenedor_socio_sede','MantenedorController@socioSede')->name('mantenedor_socio_sede')->middleware('auth');
Route::get('/mantenedor_socio_area','MantenedorController@socioArea')->name('mantenedor_socio_area')->middleware('auth');
Route::get('/mantenedor_socio_cargo','MantenedorController@socioCargo')->name('mantenedor_socio_cargo')->middleware('auth');
Route::get('/mantenedor_socio_estado','MantenedorController@socioEstado')->name('mantenedor_socio_estado')->middleware('auth');
Route::get('/mantenedor_socio_nacionalidad','MantenedorController@socioNacionalidad')->name('mantenedor_socio_nacionalidad')->middleware('auth');

Route::get('/mantenedor_carga_parentesco','MantenedorController@cargaParentesco')->name('mantenedor_carga_parentesco')->middleware('auth');

Route::get('/mantenedor_estudio_nivel','MantenedorController@estudioNivel')->name('mantenedor_estudio_nivel')->middleware('auth');
Route::get('/mantenedor_estudio_institucion','MantenedorController@estudioInstitucion')->name('mantenedor_estudio_institucion')->middleware('auth');
Route::get('/mantenedor_estudio_estado_nivel','MantenedorController@estudioEstadoNivel')->name('mantenedor_estudio_estado_nivel')->middleware('auth');
Route::get('/mantenedor_estudio_titulo','MantenedorController@estudioTitulo')->name('mantenedor_estudio_titulo')->middleware('auth');

Route::get('/mantenedor_prestamo_forma_pago','MantenedorController@prestamoFormaPago')->name('mantenedor_prestamo_forma_pago')->middleware('auth');

Route::get('/mantenedor_contable_cuenta','MantenedorController@contableCuenta')->name('mantenedor_contable_cuenta')->middleware('auth');
Route::get('/mantenedor_contable_banco','MantenedorController@contableBanco')->name('mantenedor_contable_banco')->middleware('auth');
Route::get('/mantenedor_contable_concepto','MantenedorController@contableConcepto')->name('mantenedor_contable_concepto')->middleware('auth');
Route::get('/mantenedor_contable_tipo_cuenta','MantenedorController@contableTipoCuenta')->name('mantenedor_contable_tipo_cuenta')->middleware('auth');
Route::get('/mantenedor_contable_asociado','MantenedorController@contableAsociado')->name('mantenedor_contable_asociado')->middleware('auth');

//eliminar
Route::get('/eliminar_socio_form/{id}','SocioController@mostrarEliminarSocio')->name('eliminar_socio_form')->middleware('auth');
Route::post('/eliminar_socio','SocioController@destroy')->name('eliminar_socio')->middleware('auth');

Route::get('/eliminar_usuario_form/{id}','UsuarioController@mostrarEliminarUsuario')->name('eliminar_usuario_form')->middleware('auth');
Route::post('/eliminar_usuario','UsuarioController@destroy')->name('eliminar_usuario')->middleware('auth');

Route::post('/eliminar_sede','SedeController@destroy')->name('eliminar_sede')->middleware('auth');
Route::post('/eliminar_area','AreaController@destroy')->name('eliminar_area')->middleware('auth');
Route::post('/eliminar_cargo','CargoController@destroy')->name('eliminar_cargo')->middleware('auth');
Route::post('/eliminar_estado_socio','EstadoSocioController@destroy')->name('eliminar_estado_socio')->middleware('auth');
Route::post('/eliminar_nacionalidad','NacionalidadController@destroy')->name('eliminar_nacionalidad')->middleware('auth');
Route::post('/eliminar_parentesco','ParentescoController@destroy')->name('eliminar_parentesco')->middleware('auth');
Route::post('/eliminar_nivel_educacional','GradoAcademicoController@destroy')->name('eliminar_nivel_educacional')->middleware('auth');
Route::post('/eliminar_institucion','InstitucionController@destroy')->name('eliminar_institucion')->middleware('auth');
Route::post('/eliminar_estado_academico','EstadoGradoAcademicoController@destroy')->name('eliminar_estado_academico')->middleware('auth');
Route::post('/eliminar_titulo','TituloController@destroy')->name('eliminar_titulo')->middleware('auth');
Route::post('/eliminar_forma_pago','FormaPagoController@destroy')->name('eliminar_forma_pago')->middleware('auth');
Route::post('/eliminar_cuenta','CuentaController@destroy')->name('eliminar_cuenta')->middleware('auth');
Route::post('/eliminar_concepto','ConceptoController@destroy')->name('eliminar_concepto')->middleware('auth');
Route::post('/eliminar_asociado','AsociadoController@destroy')->name('eliminar_asociado')->middleware('auth');
Route::post('/eliminar_banco','BancoController@destroy')->name('eliminar_banco')->middleware('auth');

Route::get('/cerrar_alerta','MantenedorController@cerrarAlerta')->name('cerrar_alerta')->middleware('auth');

//exportar excel
Route::get('socios_excel','SocioController@exportarExcel')->name('listado_socios')->middleware('auth');
Route::get('filtro_socios_excel/{desvinculados}/{fecha_nac_ini}/{fecha_nac_fin}/{fecha_pucv_ini}/{fecha_pucv_fin}/{fecha_sind1_ini}/{fecha_sind1_fin}/{genero}/{rut}/{comuna_id}/{ciudad_id}/{direccion}/{sede_id}/{area_id}/{cargo_id}/{estado_socio_id}/{nacionalidad_id}','SocioController@exportarExcelFiltro')->name('listado_socios_filtro')->middleware('auth');

Route::get('prestamos_excel','PrestamoController@exportarExcel')->name('listado_prestamos')->middleware('auth');
Route::get('filtro_prestamos_excel/{rut}/{fecha_solicitud_ini}/{fecha_solicitud_fin}/{monto_ini}/{monto_fin}/{forma_pago_id}/{fecha_pago_ini}/{fecha_pago_fin}/{numero_cuotas}/{cuenta_id}/{estado_deuda_id}','PrestamoController@exportarExcelFiltro')->name('listado_prestamos_filtro')->middleware('auth');

Route::get('contables_excel','RegistroContableController@exportarExcel')->name('listado_contables')->middleware('auth');
Route::get('filtro_contables_excel/{fecha_solicitud_ini}/{fecha_solicitud_fin}/{monto_ini}/{monto_fin}/{tipo_registro_contable_id}/{cuenta_id}/{concepto_id}/{socio_id}/{asociado_id}/{detalle}','RegistroContableController@exportarExcelFiltro')->name('listado_contables_filtro')->middleware('auth');

Route::get('conciliacion_excel/{cuenta}/{mes}/{year}','ConciliacionController@exportarExcel')->name('listado_conciliacion')->middleware('auth');

Route::get('estadisticas','MantenedorController@estadisticaGenero')->name('estadisticas')->middleware('auth');

Route::get('socios_sede/{sede}','SocioController@sociosSede')->name('socios_sede')->middleware('auth');