$(window).on('load',function(){

	var pago = $('#forma_pago_id');
	var cheque = $('#cheque');
	var ok = $('#cheque-ok');
	var error = $('#error-cheque');
	var deposito = $('#deposito');
	var campo_fecha_pago_deposito = $('#campo_fecha_pago_deposito');
	var campo_cheque = $('#campo_cheque');
	var campo_cuotas = $('#campo_numero_cuotas');

	pago.change(function(){
		cheque.val('');		
		limpiarMensajes();
		var forma_pago = $('#forma_pago_id option:selected').text();

		switch(forma_pago) {
			case 'Descuento por planilla':
				activarCheque();
				activarOpciones();
			break;
			case 'Depósito':
				desactivarCheque();
				desactivarOpciones();
			break;			
			default:
				desactivarPagoYCheque();
				activarOpciones()
		} 
	});	

	function activarOpciones(){	
		campo_cuotas.removeClass('d-none');
	}

	function desactivarOpciones(){	
		campo_cuotas.addClass('d-none');
	}

	function desactivarPagoYCheque(){
		campo_cheque.addClass('d-none');
		campo_fecha_pago_deposito.addClass('d-none');
	}

	function activarCheque(){
		campo_cheque.removeClass('d-none');
		campo_fecha_pago_deposito.addClass('d-none');
	}

	function desactivarCheque(){
		deposito.val(1);
		campo_cheque.addClass('d-none');
		campo_fecha_pago_deposito.removeClass('d-none');
	}	

	function limpiarMensajes(){
		error.addClass('d-none').empty();
		ok.addClass('d-none').empty();
	}
});