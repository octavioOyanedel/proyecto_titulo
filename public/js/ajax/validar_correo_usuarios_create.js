$(window).on('load',function(){

	//variables
	var elemento = $('#email');
	var patron = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	var spin = $('#comprobar-email');
	var ruta = window.location.pathname;
	var valor = '';
	var ok = $('#email-ok');
	var error = $('#error-email');
	var boton = $('#incorporar');
	var original = '';

	if(comprobarRuta() === -1){
		activarBoton();
	}

	//reset mensajes
	limpiarMensajes();

	//capturar valor original
	original = formatearEntrada(elemento.val());

	//capturar evento
	elemento.focusout( function(){ //keyup - focusout

		//formatear valor de entrada
		valor = formatearEntrada(elemento.val());

		limpiarMensajes();
		mostrarSpin();	

		//condiciones que se deben cumplir para llamar a funcion ajax
		if(valor.length >= 5 && valor.length <= 50 && valor != '' &&  validarFormato() != null){
			//form editar
			if(comprobarRuta() === -1){
				//si valor original es distinto de vacío
				if(original != ''){
					//si campos no son iguales
					if(original != valor){
						consultaAjax(valor);
					}else{
						valido();
					}
				}
			}
			//form crear
			else{
				consultaAjax(valor);
			}
		}else{
			invalido();
		}
	});

	function consultaAjax(valor){
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/verificar_correo_usuario',
			data: {elemento: valor},
			success: function(respuesta){												
				if(respuesta === 1){
					yaRegistrado();
				}else{
					valido();
				}
			},
			error: function(respuesta){
				console.log('ERROR: '+respuesta);
			}
		});		
	}

	function valido(){
		limpiarMensajes();	
		ok.removeClass('d-none').append('Correo válido.');
		ocultarSpin();
	}

	function invalido(){
		limpiarMensajes();
		error.removeClass('d-none').append('Correo no válido.');
		ocultarSpin();
	}

	function yaRegistrado(){
		limpiarMensajes();	
		error.removeClass('d-none').append('Correo ya registrado.');
		ocultarSpin();		
	}

	function comprobarRuta(){
		return ruta.search('register');
	}

	function formatearEntrada(texto){
		return texto.trim().toLowerCase();
	}

	function validarFormato(){
		return valor.match(patron);
	}

	function mostrarSpin(){
		spin.removeClass('d-none');
	}

	function ocultarSpin(){
		spin.addClass('d-none');
	}

	function limpiarMensajes(){
		error.addClass('d-none').empty();
		ok.addClass('d-none').empty();
	}
	
	function activarBoton(){
		boton.removeAttr('disabled');
	}

	function desactivarBoton(){
		boton.attr('disabled','true');
	}
});