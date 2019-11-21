$(window).on('load',function(){

	var ruta = window.location.pathname;
	var div_cuotas = $('#campo_numero_cuotas');
	var forma_pago = $('#forma_pago_id');
	var rut = $('#rut');

	if(ruta === '/filtro_prestamos_form'){
		desactivarElemento(forma_pago);
		desactivarElemento(rut);
		mostrarCuotas(div_cuotas);
	}else{
		activarElemento(forma_pago);
		activarElemento(rut);
		ocultarCuotas(div_cuotas)
	}

	function activarElemento(elemento){
		elemento.attr('required','true');
	}

	function desactivarElemento(elemento){
		elemento.removeAttr('required');
	}

	function mostrarCuotas(elemento){
		elemento.removeClass('d-none');
	}

	function ocultarCuotas(elemento){
		elemento.addClass('d-none');
	}
});