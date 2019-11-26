$(window).on('load',function(){

	var ruta = window.location.pathname;
	var forma_pago = $('#forma_pago_id');
	var cuenta = $('#cuenta_id');
	var rut = $('#rut');
	var cuenta = $('#cuenta_id');
	var estado = $('#estado_deuda_id');
	var contenedor_cuotas = $('#contenedor_cuotas');
	var contenedor_fechas = $('#contenedor_fecha_pago');

	if(ruta === '/filtro_prestamos_form'){
		desactivarElemento(forma_pago);
		desactivarElemento(cuenta);
		desactivarElemento(rut);
		desactivarElemento(estado);
	}else{
		activarElemento(forma_pago);
		activarElemento(cuenta);
		activarElemento(rut);
		activarElemento(estado);
	}

	forma_pago.change(function(){
		var valor = $('#forma_pago_id option:selected').val();
		if(valor === '1'){
			mostrarElemento(contenedor_cuotas);
			ocultarElemento(contenedor_fechas);
		}else{
			mostrarElemento(contenedor_fechas);
			ocultarElemento(contenedor_cuotas);
		}

	});

	function activarElemento(elemento){
		elemento.attr('required','true');
	}

	function desactivarElemento(elemento){
		elemento.removeAttr('required');
	}

	function mostrarElemento(elemento){
		elemento.removeClass('d-none');
	}

	function ocultarElemento(elemento){
		elemento.addClass('d-none');
	}

});