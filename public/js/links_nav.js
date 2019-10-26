$(window).on('load',function(){

	$('[data-toggle="popover"]').popover();

	var ruta = window.location.pathname;

	alert(ruta);

	if(ruta.localeCompare('/home') === 0 || ruta.localeCompare('/filtro_socios') === 0 || ruta.search('socios/') != -1){
		$('#span-socios').addClass('font-weight-bold text-uppercase text-primary');
	}

	if(ruta.localeCompare('/filtro_prestamos') === 0 || ruta.search('/prestamos') != -1){
		$('#span-prestamos').addClass('font-weight-bold text-uppercase text-primary');
	}

	if(ruta.localeCompare('/filtro_contables') === 0 || ruta.localeCompare('/crear-conciliacion') === 0 || ruta.search('/contables') != -1){
		$('#span-contables').addClass('font-weight-bold text-uppercase text-primary');
	}

	if(ruta.search('/mantenedor') != -1 || 
		ruta.search('/usuarios') != -1 || 
		ruta.localeCompare('/cambiar_password') === 0 || 
		ruta.localeCompare('/register') === 0 || 
		ruta.search('/sedes') != -1 || 
		ruta.search('/areas') != -1 || 
		ruta.search('/cargos') != -1 ||
		ruta.search('/situaciones') != -1 ||
		ruta.search('/nacionalidades') != -1 ||
		ruta.search('/formas_pago') != -1 ||
		ruta.search('/cuentas') != -1 ||
		ruta.search('/bancos') != -1){
		$('#span-mantenedores').addClass('font-weight-bold text-uppercase text-primary');
	}

	if(ruta.localeCompare('/filtro_historial') === 0 || ruta.localeCompare('/historial') === 0){
		$('#span-historial').addClass('font-weight-bold text-uppercase text-primary');
	}

});