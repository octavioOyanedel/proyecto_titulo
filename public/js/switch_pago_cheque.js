$(window).on('load',function(){

	var pago = $('#forma_pago_id');
	var ok = $('#cheque-ok');
	var error = $('#error-cheque');
	var deposito = $('#deposito');
	var campo_fecha_pago_deposito = $('#campo_fecha_pago_deposito');
	var campo_cheque = $('#campo_cheque');
	var campo_cuotas = $('#campo_numero_cuotas');
	var fecha = $('#fecha_pago_deposito');
	var cheque = $('#cheque');

	pago.change(function(){	
		cheque.val('');
		limpiarMensajes();
		var forma_pago = $('#forma_pago_id option:selected').text();

		switch(forma_pago) {
			case 'Descuento por planilla':
				activarOpciones();
				desactivarFecha();
				fechaOpcional();
			break;
			case 'Depósito':
				desactivarOpciones();
				activarFecha();
				fechaRequerida();
			break;			
			default:
				activarOpciones();
				desactivarFecha();
				fechaOpcional();
		} 
	});	

	function activarFecha(){	
		campo_fecha_pago_deposito.removeClass('d-none');
	}

	function desactivarFecha(){	
		campo_fecha_pago_deposito.addClass('d-none');
	}

	function activarOpciones(){	
		campo_cuotas.removeClass('d-none');
	}

	function desactivarOpciones(){	
		campo_cuotas.addClass('d-none');
	}

	function limpiarMensajes(){
		error.addClass('d-none').empty();
		ok.addClass('d-none').empty();
	}

	function fechaRequerida(){
		fecha.attr('required','true');
	}

	function fechaOpcional(){
		fecha.removeAttr('required');
	}
});