$(window).on('load',function(){

	var elemento = $('#cheque');
	var error = $('#error-cheque');
	var spin = $('#comprobar-cheque');
	var ok = $('#cheque-ok');
	//var boton = $('#incorporar');

	elemento.keyup( function(){

		limpiarMensajes();

		if(elemento.val().length === 0){
			limpiarMensajes();		
		}

		if(elemento.val().length < 7){
			ocultarSpin()
		}

		if(elemento.val().length > 8 && elemento.val().length < 10){
			mostrarSpin();
			$.ajax({
				method: 'GET',
				dataType: 'json',
				url: '/verificar_cheque_contable',
				data: {elemento: elemento.val()},
				success: function(respuesta){
					limpiarMensajes();				
					if(respuesta === 1){
						ocultarSpin()
						//desactivarBoton();
						error.removeClass('d-none').append('Cheque ya registrado.');				
					}else{
						var patron = /^\d*$/;
						if(!elemento.val().search(patron)){
							ocultarSpin();
							//activarBoton();
							ok.removeClass('d-none').append('Cheque válido y no registrado.');
						}else{
							ocultarSpin();
							//desactivarBoton();
							error.removeClass('d-none').append('Cheque no válido.');
						}						
					}
				},
				error: function(respuesta){
					console.log('ERROR: '+respuesta);
				}
			});	
		}		
	});


	function limpiarMensajes(){
		error.addClass('d-none').empty();
		ok.addClass('d-none').empty();
	}

	function ocultarSpin(){
		spin.addClass('d-none');
	}

	function mostrarSpin(){
		spin.removeClass('d-none');
	}

	function activarBoton(){
		boton.removeAttr('disabled');
	}

	function desactivarBoton(){
		boton.attr('disabled','true');
	}

});