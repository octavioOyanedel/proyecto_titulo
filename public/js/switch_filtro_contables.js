$(window).on('load',function(){

	var ruta = window.location.pathname;
	var tipo = $('#tipo_registro_contable_id');
	var cuenta = $('#cuenta_id');
	var concepto = $('#concepto_id');
	var socio = $('#socio_id');
	var asociado = $('#asociado_id');

	if(ruta === '/filtro_contables_form'){
		desactivarElemento(tipo);
		desactivarElemento(cuenta);
		desactivarElemento(concepto);
		desactivarElemento(socio);
		desactivarElemento(asociado);				
	}else{
		activarElemento(tipo);
		activarElemento(cuenta);
		activarElemento(concepto);
		activarElemento(socio);
		activarElemento(asociado);		
	}

	function activarElemento(elemento){
		elemento.attr('required','true');
	}

	function desactivarElemento(elemento){
		elemento.removeAttr('required');
	}

});