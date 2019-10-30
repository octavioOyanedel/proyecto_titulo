$(window).on('load',function(){

	var elemento = $('#numero_egreso');
	var error = $('#error-numero-egreso');
	var spin = $('#comprobar-numero-egreso');
	var ok = $('#numero-egreso-ok');
	//var boton = $('#incorporar');

	elemento.keyup( function(){
		console.log(elemento.val().length);
		limpiarMensajes();

		if(elemento.val().length === 0){
			limpiarMensajes();		
		}

		if(elemento.val().length < 4){
			ocultarSpin()
		}

		if(elemento.val().length > 2 && elemento.val().length < 5){
			mostrarSpin();
			$.ajax({
				method: 'GET',
				dataType: 'json',
				url: '/verificar_numero_egreso',
				data: {elemento: elemento.val()},
				success: function(respuesta){
					limpiarMensajes();				
					if(respuesta === 1){
						ocultarSpin()
						//desactivarBoton();
						error.removeClass('d-none').append('Número de egreso ya registrado.');				
					}else{
						var patron = /^\d*$/;
						if(!elemento.val().search(patron)){
							ocultarSpin();
							//activarBoton();
							ok.removeClass('d-none').append('Número de egreso válido y no registrado.');
						}else{
							ocultarSpin();
							//desactivarBoton();
							error.removeClass('d-none').append('Número de egreso no válido.');
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