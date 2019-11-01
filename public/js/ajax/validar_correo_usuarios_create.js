$(window).on('load',function(){

	var elemento = $('#email');
	var error = $('#error-email');
	var spin = $('#comprobar-email');
	var ok = $('#email-ok');
	//var boton = $('#incorporar');

	var ruta = window.location.pathname;

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
				url: '/verificar_correo_usuario',
				data: {elemento: elemento.val()},
				success: function(respuesta){
					limpiarMensajes();	

					if(ruta.search('edit') != -1){
						validarCorreo();
					}else{
						if(respuesta === 1){
							ocultarSpin()
							//desactivarBoton();
							error.removeClass('d-none').append('Correo ya registrado.');				
						}else{
							validarCorreo();
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

	function validarCorreo(){
		var patron = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		if(!elemento.val().search(patron)){
			ocultarSpin();
			//activarBoton();
			ok.removeClass('d-none').append('Correo válido.');
		}else{
			ocultarSpin();
			//desactivarBoton();
			error.removeClass('d-none').append('Correo no válido.');
		}			
	}

});