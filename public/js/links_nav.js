$(window).on('load',function(){

	$('[data-toggle="popover"]').popover();

	var ruta = window.location.pathname;

	//alert(ruta);
	console.log(ruta);

	if(ruta.localeCompare('/socios_filtrados_educacion') === 0 || ruta.localeCompare('/home') === 0 || ruta.localeCompare('/filtro_socios') === 0 || ruta.localeCompare('/filtro_socios_form') === 0 || ruta.search('socios/') != -1 || ruta.localeCompare('/socios_filtrados') === 0 || ruta.search('/eliminar_socio_form/') != -1 || ruta.localeCompare('/ayuda') === 0){
		$('#span-socios').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-socio').removeClass('d-none');
	}

	if(ruta.localeCompare('/filtro_prestamos') === 0 || ruta.search('/prestamos') != -1 || ruta.localeCompare('/simulacion') === 0 || ruta.localeCompare('/filtro_prestamos_form') === 0){
		$('#span-prestamos').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-prestamo').removeClass('d-none');
	}

	if(ruta.localeCompare('/anular_registro_form') === 0 || ruta.localeCompare('/filtro_contables') === 0 || ruta.localeCompare('/crear_conciliacion') === 0 || ruta.search('/contables') != -1 || ruta.localeCompare('/mostrar_conciliacion') === 0 || ruta.localeCompare('/filtro_contables_form') === 0){
		$('#span-contables').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-contable').removeClass('d-none');
	}

	if(ruta.search('/estudios/') != -1){
		$('#span-socios').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-socio').removeClass('d-none');
	}

	//mantenedores
	if(ruta.localeCompare('/mantenedor_socio_sede') === 0 || ruta.search('/sedes/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-sede').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_socio_area') === 0 || ruta.search('/areas/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-area').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_socio_cargo') === 0 || ruta.search('/cargos/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-cargo').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_socio_estado') === 0 || ruta.search('/estado_socios/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-estado-socio').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_socio_nacionalidad') === 0 || ruta.search('/nacionalidades/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-nacionalidad').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_carga_parentesco') === 0 || ruta.search('/parentescos/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-parentesco').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_estudio_nivel') === 0 || ruta.search('/niveles/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-nivel').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_estudio_institucion') === 0 || ruta.search('/instituciones/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-institucion').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_estudio_estado_nivel') === 0 || ruta.search('/estados_nivel/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-estado-nivel').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_estudio_titulo') === 0 || ruta.search('/titulos/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-titulo').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_prestamo_forma_pago') === 0 || ruta.search('/formas_pago/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-pago').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_contable_cuenta') === 0 || ruta.search('/cuentas/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-cuenta').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_contable_banco') === 0 || ruta.search('/bancos/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-banco').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_contable_concepto') === 0 || ruta.search('/conceptos/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-concepto').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_contable_tipo_cuenta') === 0 || ruta.search('/tipos_cuentas/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-tipo-cuenta').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_contable_asociado') === 0 || ruta.search('/asociados/') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-asociado').removeClass('d-none');
	}

	//fin mantenedores
	if(ruta.localeCompare('/filtro_historial') === 0 || ruta.localeCompare('/historial') === 0 || ruta.localeCompare('/filtro_historial_form') === 0){
		$('#span-historial').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-historial').removeClass('d-none');
	}

	if(ruta.localeCompare('/socios_filtrados_incorporaciones') === 0 || ruta.localeCompare('/estadisticas_estudio') === 0 || ruta.localeCompare('/estadisticas_sede_area') === 0 || ruta.localeCompare('/estadisticas_cargo') === 0 || ruta.localeCompare('/estadisticas_comuna_ciudad') === 0 || ruta.localeCompare('/estadisticas_nacionalidad') === 0 || ruta.localeCompare('/estadisticas_incorporados_desvinculados') === 0 || ruta.localeCompare('/estadisticas_carga') === 0){
		$('#span-estadisticas').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-socio').removeClass('d-none');
	}

	if(ruta.localeCompare('/register') === 0 || ruta.search('/usuarios') != -1 || ruta.localeCompare('/passwords') === 0){
		$('#span-usuarios').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-usuario').removeClass('d-none');
	}

	if(ruta.localeCompare('/cargas') === 0 || ruta.localeCompare('/listado_cargas_estadistica') === 0 || ruta.search('/cargas/create/') != -1){
		$('#span-cargas').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-carga').removeClass('d-none');
	}
});