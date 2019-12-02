$(window).on('load',function(){

	$('[data-toggle="popover"]').popover();

	var ruta = window.location.pathname;

	//alert(ruta);
	console.log(ruta);

	if(ruta.localeCompare('/home') === 0 || ruta.localeCompare('/filtro_socios') === 0 || ruta.localeCompare('/filtro_socios_form') === 0 || ruta.search('socios/') != -1){
		$('#span-socios').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-socio').removeClass('d-none');
	}

	if(ruta.localeCompare('/filtro_prestamos') === 0 || ruta.search('/prestamos') != -1 || ruta.localeCompare('/simulacion') === 0 || ruta.localeCompare('/filtro_prestamos_form') === 0){
		$('#span-prestamos').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-prestamo').removeClass('d-none');
	}

	if(ruta.localeCompare('/anular_registro_form') === 0 || ruta.localeCompare('/filtro_contables') === 0 || ruta.localeCompare('/crear_conciliacion') === 0 || ruta.search('/contables') != -1 || ruta.localeCompare('/mostrar_conciliacion') === 0 || ruta.localeCompare('/filtro_contables_form') === 0){
		$('#span-contables').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-contable').removeClass('d-none');
	}

	if(ruta.search('/instituciones') != -1 || ruta.search('/titulos') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
	}

	if(ruta.search('/estudios') != -1){
		$('#span-socios').addClass('font-weight-bold text-uppercase text-dark');
	}

	//mantenedores
	if(ruta.localeCompare('/mantenedor_socio_sede') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-sede').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_socio_area') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-area').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_socio_cargo') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-cargo').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_socio_estado') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-estado-socio').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_socio_nacionalidad') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-nacionalidad').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_carga_parentesco') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-parentesco').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_estudio_nivel') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-nivel').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_estudio_institucion') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-institucion').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_estudio_estado_nivel') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-estado-nivel').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_estudio_titulo') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-titulo').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_prestamo_forma_pago') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-pago').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_contable_cuenta') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-cuenta').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_contable_banco') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-banco').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_contable_concepto') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-concepto').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_contable_tipo_cuenta') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-tipo-cuenta').removeClass('d-none');
	}

	if(ruta.localeCompare('/mantenedor_contable_asociado') === 0){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-asociado').removeClass('d-none');
	}
	//fin mantenedores
	if(ruta.localeCompare('/filtro_historial') === 0 || ruta.localeCompare('/historial') === 0 || ruta.localeCompare('/filtro_historial_form') === 0){
		$('#span-historial').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-historial').removeClass('d-none');
	}


	if(ruta.localeCompare('/register') === 0 || ruta.search('/usuarios') != -1){
		$('#span-usuarios').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-usuario').removeClass('d-none');
	}

});