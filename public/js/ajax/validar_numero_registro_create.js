$(window).on('load',function(){

	//variables
	var elemento = $('#numero_registro');
	var patron = /^\d*$/;
	var spin = $('#comprobar-numero');
	var ruta = window.location.pathname;
	var valor = '';
	var ok = $('#numero-ok');
	var error = $('#error-numero');
	var boton = $('#incorporar');

	//reset mensajes
	limpiarMensajes();

	//capturar evento
	elemento.focusout( function(){ //keyup - focusout

		limpiarMensajes();
		mostrarSpin();	

		//formatear valor de entrada
		valor = formatearEntrada(elemento.val());	

		//condiciones que se deben cumplir para llamar a funcion ajax
		if(valor.length >= 1 && valor.length <= 4 && valor != '' &&  validarFormato() != null){
			//comprobar si es form create o edit, si es -1 no hay match (edit)
			if(comprobarRuta() === -1){ 	
				valido();
			}else{
				$.ajax({
					method: 'GET',
					dataType: 'json',
					url: '/verificar_numero_registro',
					data: {elemento: valor},
					success: function(respuesta){						
						if(comprobarRuta() === -1){
							valido();
						}else{
							if(respuesta === 1){
								yaRegistrado();
							}else{
								valido();
							}					
						}
					},
					error: function(respuesta){
						console.log('ERROR: '+respuesta);
					}
				});	
			}
		}else{
			invalido();
		}
		
	});

	function valido(){
		activarBoton();
		limpiarMensajes();	
		ok.removeClass('d-none').append('Número de registro válido.');
		ocultarSpin();
	}

	function invalido(){
		desactivarBoton();
		limpiarMensajes();
		error.removeClass('d-none').append('Número de registro no válido.');
		ocultarSpin();
	}

	function yaRegistrado(){
		desactivarBoton();
		limpiarMensajes();	
		error.removeClass('d-none').append('Número de registro ya registrado.');
		ocultarSpin();		
	}

	function activarBoton(){
		boton.removeAttr('disabled');
	}

	function desactivarBoton(){
		boton.attr('disabled','true');
	}

	function comprobarRuta(){
		return ruta.search('create');
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

});