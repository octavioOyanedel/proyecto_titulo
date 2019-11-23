$(window).on('load',function(){

	$('[data-toggle="popover"]').popover();

	var ruta = window.location.pathname;

	//alert(ruta);	filtro_socios_form

	if(ruta.localeCompare('/home') === 0 || ruta.localeCompare('/filtro_socios') === 0 || ruta.localeCompare('/filtro_socios_form') === 0 || ruta.search('socios/') != -1){
		$('#span-socios').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-socio').removeClass('d-none');
	}

	if(ruta.localeCompare('/filtro_prestamos') === 0 || ruta.search('/prestamos') != -1 || ruta.localeCompare('/simulacion') === 0 || ruta.localeCompare('/filtro_prestamos_form') === 0){
		$('#span-prestamos').addClass('font-weight-bold text-uppercase text-success');
		$('#buscador-prestamo').removeClass('d-none');
	}

	if(ruta.localeCompare('/filtro_contables') === 0 || ruta.localeCompare('/crear-conciliacion') === 0 || ruta.search('/contables') != -1 || ruta.localeCompare('/mostrar-conciliacion') === 0 || ruta.localeCompare('/filtro_contables_form') === 0){
		$('#span-contables').addClass('font-weight-bold text-uppercase text-dark');
		$('#buscador-contable').removeClass('d-none');
	}

	if(ruta.search('/mantenedor') != -1 ||
		ruta.localeCompare('/cambiar_password') === 0 ||	
		ruta.search('/sedes') != -1 ||
		ruta.search('/areas') != -1 ||
		ruta.search('/cargos') != -1 ||
		ruta.search('/situaciones') != -1 ||
		ruta.search('/nacionalidades') != -1 ||
		ruta.search('/formas_pago') != -1 ||
		ruta.search('/cuentas') != -1 ||
		ruta.search('/bancos') != -1 ||
		ruta.search('/conceptos') != -1 ||
		ruta.search('/asociados') != -1 ||
		ruta.search('/cargas') != -1 ||
		ruta.search('/estudios') != -1 ||
		ruta.search('/parentescos') != -1 ||
		ruta.search('/niveles') != -1 ||
		ruta.search('/instituciones') != -1 ||
		ruta.search('/estados') != -1 ||
		ruta.search('/titulos') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
		$('#buscador-socio').removeClass('d-none');
	}

	if(ruta.localeCompare('/filtro_historial') === 0 || ruta.localeCompare('/historial') === 0 || ruta.localeCompare('/filtro_historial_form') === 0){	
		$('#span-historial').addClass('font-weight-bold text-uppercase text-danger');
		$('#buscador-historial').removeClass('d-none');
	}

	if(ruta.localeCompare('/register') === 0 || ruta.search('/usuarios') != -1){
		$('#span-usuarios').addClass('font-weight-bold text-uppercase text-danger');
		$('#buscador-usuario').removeClass('d-none');
	}

});