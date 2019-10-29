$(window).on('load',function(){

	var elemento = $('#correo');
	var error = $('#error-correo');
	var spin = $('#comprobar-correo');
	var ok = $('#correo-ok');
	//var boton = $('#incorporar');

	elemento.keyup( function(){

		limpiarMensajes();

		if(elemento.val().length === 0){
			limpiarMensajes();		
		}

		if(elemento.val().length < 2){
			ocultarSpin()
		}

		if(elemento.val().length > 4 && elemento.val().length < 50){
			mostrarSpin();
			$.ajax({
				method: 'GET',
				dataType: 'json',
				url: '/verificar_correo',
				data: {elemento: elemento.val()},
				success: function(respuesta){
					limpiarMensajes();				
					if(respuesta === 1){
						ocultarSpin()
						//desactivarBoton();
						error.removeClass('d-none').append('Correo ya registrado.');				
					}else{
						var patron = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
						if(!elemento.val().search(patron)){
							ocultarSpin();
							//activarBoton();
							ok.removeClass('d-none').append('Correo válido y no registrado.');
						}else{
							ocultarSpin();
							//desactivarBoton();
							error.removeClass('d-none').append('Correo no válido.');
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