$(window).on('load',function(){
	var pass = $('#password');
	var confirmar = $('#password_confirm');
	var patron = /^[0-9a-zA-Z]*$/;
	var spin = $('#comprobar-password_confirm');
	var pass_actual = '';
	var confirmar_actual = '';
	var ok = $('#password_confirm-ok');
	var error = $('#error-password_confirm');
	var boton = $('#incorporar');

	//reset mensajes
	limpiarMensajes();

	confirmar.focusout( function(){

		pass_actual = formatearEntrada(pass.val());
		confirmar_actual = formatearEntrada(confirmar.val());

		limpiarMensajes();
			
		if(pass_actual != '' && confirmar_actual != ''){
			mostrarSpin();
			if(pass_actual != '' && confirmar_actual != ''){
				if(pass_actual.length >= 8 && confirmar_actual.length <= 15){
					if(pass_actual.match(patron) != null && confirmar_actual.match(patron) != null){
						if(pass_actual === confirmar_actual){
							iguales();
						}else{
							distintas();
						}
					}else{
						alfanumericos();
					}
				}else{
					largos();
				}
			}else{
				vacios();
			}
		}
	});

	function vacios(){
		desactivarBoton();
		limpiarMensajes();
		error.removeClass('d-none').append('Contraseñas no deben estar vacias.');
		ocultarSpin();
	}
	function largos(){
		desactivarBoton();
		limpiarMensajes();
		error.removeClass('d-none').append('Contraseñas deben contener entre 8 y 15 caracteres.');
		ocultarSpin();
	}

	function alfanumericos(){
		desactivarBoton();
		limpiarMensajes();
		error.removeClass('d-none').append('Contraseñas deben contener caracteres alfanuméricos.');
		ocultarSpin();
	}

	function distintas(){
		desactivarBoton();
		limpiarMensajes();
		error.removeClass('d-none').append('Contraseñas distintas.');
		ocultarSpin();
	}

	function iguales(){
		activarBoton();
		limpiarMensajes();	
		ok.removeClass('d-none').append('Contraseñas válidas.');
		ocultarSpin();
	}

	function formatearEntrada(texto){
		return texto.trim();
	}

	function activarBoton(){
		boton.removeAttr('disabled');
	}

	function desactivarBoton(){
		boton.attr('disabled','true');
	}

	function limpiarMensajes(){
		error.addClass('d-none').empty();
		ok.addClass('d-none').empty();
	}

	function mostrarSpin(){
		spin.removeClass('d-none');
	}

	function ocultarSpin(){
		spin.addClass('d-none');
	}	
});