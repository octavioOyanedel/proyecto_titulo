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

//Route::get('/prestamos', 'PrestamoController@index')->name('prestamos.index')->middleware('auth');

Route::post('/simulacion', 'PrestamoController@simulacion')->name('simulacion')->middleware('auth');
Route::get('/cancelar_deposito/{id}', 'PrestamoController@cancelarDeposito')->name('cancelar_deposito')->middleware('auth');


Route::resource('/sedes', 'SedeController')->middleware('auth')->middleware('administrador');
Route::resource('/areas', 'AreaController')->middleware('auth')->middleware('administrador');
Route::resource('/cargos', 'CargoController')->middleware('auth')->middleware('administrador');
Route::resource('/estado_socios', 'EstadoSocioController')->middleware('auth')->middleware('administrador');
Route::resource('/nacionalidades', 'NacionalidadController')->middleware('auth')->middleware('administrador');

Route::resource('/formas_pago', 'FormaPagoController')->middleware('auth')->middleware('administrador');

Route::resource('/cuentas', 'CuentaController')->middleware('auth')->middleware('administrador');
Route::resource('/tipos_cuentas', 'TipoCuentaController')->middleware('auth')->middleware('administrador');
Route::resource('/conceptos', 'ConceptoController')->middleware('auth')->middleware('administrador');
Route::resource('/bancos', 'BancoController')->middleware('auth')->middleware('administrador');
Route::resource('/asociados', 'AsociadoController')->middleware('auth')->middleware('administrador');

Route::resource('/historial', 'LogSistemaController')->middleware('auth')->middleware('administrador');

Route::resource('/usuarios', 'UsuarioController')->middleware('auth');

Route::resource('/contables', 'RegistroContableController')->middleware('auth');

//****************************************************************************************************
//ruta carga continua de info cargas familiares
Route::get('cargas/create/{id}', [
    'as' => 'cargas.create',
    'uses' => 'CargaFamiliarController@create'
])->middleware('administrador');

Route::get('cargas/create/', function () {
    return redirect('home');
})->middleware('administrador');

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

Route::resource('/parentescos', 'ParentescoController')->middleware('auth')->middleware('administrador');

Route::resource('/niveles', 'GradoAcademicoController')->middleware('auth')->middleware('administrador');
Route::resource('/instituciones', 'InstitucionController')->middleware('auth')->middleware('administrador');
Route::resource('/estados_nivel', 'EstadoGradoAcademicoController')->middleware('auth')->middleware('administrador');
Route::resource('/titulos', 'TituloController')->middleware('auth')->middleware('administrador');

Route::get('/passwords', 'UsuarioController@editPassword')->name('passwords')->middleware('auth');
Route::post('/update_passwords', 'UsuarioController@updatePassword')->name('update_passwords')->middleware('auth');

Route::get('/crear_conciliacion', 'ConciliacionController@crear')->name('crear_conciliacion')->middleware('auth')->middleware('administrador');
Route::get('/mostrar_conciliacion', 'ConciliacionController@mostrar')->name('mostrar_conciliacion')->middleware('auth')->middleware('administrador');

Route::get('/anular_registro_form', 'RegistroContableController@anularCheque')->name('anular_registro_form')->middleware('auth')->middleware('administrador');
Route::post('/anular_registro', 'RegistroContableController@anular')->name('anular_registro')->middleware('auth')->middleware('administrador');

//mantenedores
Route::get('/mantenedor_socio_sede','MantenedorController@socioSede')->name('mantenedor_socio_sede')->middleware('auth')->middleware('administrador');
Route::get('/mantenedor_socio_area','MantenedorController@socioArea')->name('mantenedor_socio_area')->middleware('auth')->middleware('administrador');
Route::get('/mantenedor_socio_cargo','MantenedorController@socioCargo')->name('mantenedor_socio_cargo')->middleware('auth')->middleware('administrador');
Route::get('/mantenedor_socio_estado','MantenedorController@socioEstado')->name('mantenedor_socio_estado')->middleware('auth')->middleware('administrador');
Route::get('/mantenedor_socio_nacionalidad','MantenedorController@socioNacionalidad')->name('mantenedor_socio_nacionalidad')->middleware('auth')->middleware('administrador');

Route::get('/mantenedor_carga_parentesco','MantenedorController@cargaParentesco')->name('mantenedor_carga_parentesco')->middleware('auth')->middleware('administrador');

Route::get('/mantenedor_estudio_nivel','MantenedorController@estudioNivel')->name('mantenedor_estudio_nivel')->middleware('auth')->middleware('administrador');
Route::get('/mantenedor_estudio_institucion','MantenedorController@estudioInstitucion')->name('mantenedor_estudio_institucion')->middleware('auth')->middleware('administrador');
Route::get('/mantenedor_estudio_estado_nivel','MantenedorController@estudioEstadoNivel')->name('mantenedor_estudio_estado_nivel')->middleware('auth')->middleware('administrador');
Route::get('/mantenedor_estudio_titulo','MantenedorController@estudioTitulo')->name('mantenedor_estudio_titulo')->middleware('auth')->middleware('administrador');

Route::get('/mantenedor_prestamo_forma_pago','MantenedorController@prestamoFormaPago')->name('mantenedor_prestamo_forma_pago')->middleware('auth')->middleware('administrador');

Route::get('/mantenedor_contable_cuenta','MantenedorController@contableCuenta')->name('mantenedor_contable_cuenta')->middleware('auth')->middleware('administrador');
Route::get('/mantenedor_contable_banco','MantenedorController@contableBanco')->name('mantenedor_contable_banco')->middleware('auth')->middleware('administrador');
Route::get('/mantenedor_contable_concepto','MantenedorController@contableConcepto')->name('mantenedor_contable_concepto')->middleware('auth')->middleware('administrador');
Route::get('/mantenedor_contable_tipo_cuenta','MantenedorController@contableTipoCuenta')->name('mantenedor_contable_tipo_cuenta')->middleware('auth')->middleware('administrador');
Route::get('/mantenedor_contable_asociado','MantenedorController@contableAsociado')->name('mantenedor_contable_asociado')->middleware('auth')->middleware('administrador');

//eliminar
Route::get('/eliminar_socio_form/{id}','SocioController@mostrarEliminarSocio')->name('eliminar_socio_form')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_socio','SocioController@destroy')->name('eliminar_socio')->middleware('auth')->middleware('administrador');
Route::get('/eliminar_usuario_form/{id}','UsuarioController@mostrarEliminarUsuario')->name('eliminar_usuario_form')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_usuario','UsuarioController@destroy')->name('eliminar_usuario')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_sede','SedeController@destroy')->name('eliminar_sede')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_area','AreaController@destroy')->name('eliminar_area')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_cargo','CargoController@destroy')->name('eliminar_cargo')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_estado_socio','EstadoSocioController@destroy')->name('eliminar_estado_socio')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_nacionalidad','NacionalidadController@destroy')->name('eliminar_nacionalidad')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_parentesco','ParentescoController@destroy')->name('eliminar_parentesco')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_nivel_educacional','GradoAcademicoController@destroy')->name('eliminar_nivel_educacional')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_institucion','InstitucionController@destroy')->name('eliminar_institucion')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_estado_academico','EstadoGradoAcademicoController@destroy')->name('eliminar_estado_academico')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_titulo','TituloController@destroy')->name('eliminar_titulo')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_forma_pago','FormaPagoController@destroy')->name('eliminar_forma_pago')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_cuenta','CuentaController@destroy')->name('eliminar_cuenta')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_concepto','ConceptoController@destroy')->name('eliminar_concepto')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_asociado','AsociadoController@destroy')->name('eliminar_asociado')->middleware('auth')->middleware('administrador');
Route::post('/eliminar_banco','BancoController@destroy')->name('eliminar_banco')->middleware('auth')->middleware('administrador');

Route::get('/cerrar_alerta','MantenedorController@cerrarAlerta')->name('cerrar_alerta')->middleware('auth');

//exportar excel
Route::get('socios_excel','SocioController@exportarExcel')->name('listado_socios')->middleware('auth');
Route::get('filtro_socios_excel/{desvinculados}/{fecha_nac_ini}/{fecha_nac_fin}/{fecha_pucv_ini}/{fecha_pucv_fin}/{fecha_sind1_ini}/{fecha_sind1_fin}/{genero}/{rut}/{comuna_id}/{ciudad_id}/{direccion}/{sede_id}/{area_id}/{cargo_id}/{estado_socio_id}/{nacionalidad_id}','SocioController@exportarExcelFiltro')->name('listado_socios_filtro')->middleware('auth');

Route::get('prestamos_excel','PrestamoController@exportarExcel')->name('listado_prestamos')->middleware('auth');
Route::get('filtro_prestamos_excel/{rut}/{fecha_solicitud_ini}/{fecha_solicitud_fin}/{monto_ini}/{monto_fin}/{forma_pago_id}/{fecha_pago_ini}/{fecha_pago_fin}/{numero_cuotas}/{cuenta_id}/{estado_deuda_id}/{numero_egreso}/{cheque}/{monto}','PrestamoController@exportarExcelFiltro')->name('listado_prestamos_filtro')->middleware('auth');

Route::get('contables_excel','RegistroContableController@exportarExcel')->name('listado_contables')->middleware('auth');
Route::get('filtro_contables_excel/{fecha_solicitud_ini}/{fecha_solicitud_fin}/{monto_ini}/{monto_fin}/{tipo_registro_contable_id}/{cuenta_id}/{concepto_id}/{socio_id}/{asociado_id}/{detalle}','RegistroContableController@exportarExcelFiltro')->name('listado_contables_filtro')->middleware('auth');

Route::get('conciliacion_excel/{cuenta}/{mes}/{year}','ConciliacionController@exportarExcel')->name('listado_conciliacion')->middleware('auth');

Route::get('estadisticas_cargo','MantenedorController@estadisticaCargo')->name('estadisticas_cargo')->middleware('auth');
Route::get('estadisticas_comuna_ciudad','MantenedorController@estadisticaComunaCiudad')->name('estadisticas_comuna_ciudad')->middleware('auth');
Route::get('estadisticas_nacionalidad','MantenedorController@estadisticaNacionalidad')->name('estadisticas_nacionalidad')->middleware('auth');
Route::get('estadisticas_sede_area','MantenedorController@estadisticaSedeArea')->name('estadisticas_sede_area')->middleware('auth');
Route::get('estadisticas_incorporados_desvinculados','MantenedorController@estadisticaIncorporadoDesvinculado')->name('estadisticas_incorporados_desvinculados')->middleware('auth');

Route::get('socios_filtrados','SocioController@socioFiltrados')->name('socios_filtrados')->middleware('auth');

Route::get('socios_general_estadistica/{nombre}/{id}/{genero}','SocioController@exportarExcelEstadistica')->name('socios_general_estadistica')->middleware('auth');

Route::get('socios_filtrados_incorporaciones','SocioController@socioFiltradosIncorporados')->name('socios_filtrados_incorporaciones')->middleware('auth');

Route::get('socios_incorporados_estadistica/{mes}/{estado}','SocioController@exportarExcelEstadisticaIncorporados')->name('socios_incorporados_estadistica')->middleware('auth');

Route::get('listado_socios_buscar/{buscar_socio}','HomeController@exportarExcel')->name('listado_socios_buscar')->middleware('auth');

Route::get('listado_prestamo_buscar/{buscar_prestamo}','PrestamoController@exportarExcelBusqueda')->name('listado_prestamo_buscar')->middleware('auth');

Route::get('listado_contable_buscar/{buscar_registro}','RegistroContableController@exportarExcelBusqueda')->name('listado_contable_buscar')->middleware('auth');

Route::get('cargas_excel','CargaFamiliarController@exportarExcel')->name('listado_cargas')->middleware('auth');

Route::get('listado_cargas_buscar/{buscar_carga}','CargaFamiliarController@exportarExcelBusqueda')->name('listado_cargas_buscar')->middleware('auth');

Route::get('estadisticas_estudio','MantenedorController@estadisticaEstudio')->name('estadisticas_estudio')->middleware('auth');
Route::get('estadisticas_carga','MantenedorController@estadisticaCarga')->name('estadisticas_carga')->middleware('auth');

Route::get('listado_cargas_estadistica','CargaFamiliarController@cargasFiltradas')->name('listado_cargas_estadistica')->middleware('auth');


Route::get('socios_filtrados_educacion','SocioController@socioFiltradosEducacion')->name('socios_filtrados_educacion')->middleware('auth');
Route::get('socios_estudios_estadistica/{nombre}','SocioController@exportarExcelEstadisticaEstudios')->name('socios_estudios_estadistica')->middleware('auth');

Route::get('estadistica_carga_excel/{nombre}','CargaFamiliarController@exportarEstadisticaCarga')->name('estadistica_carga_excel')->middleware('auth');