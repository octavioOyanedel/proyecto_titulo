$(window).on('load',function(){

	//variables
	var elemento = $('#numero_socio');
	var patron = /^\d*$/;
	var spin = $('#comprobar-numero');
	var ruta = window.location.pathname;
	var valor = '';
	var ok = $('#numero-ok');
	var error = $('#error-numero');
	var original = '';
	var error_php = $('#error-numero-php');

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
		if(valor.length >= 1 && valor.length <= 4 && valor != '' &&  validarFormato() != null){
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
			url: '/verificar_numero_socio',
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
		ocultarErrorPhp();
		noEsInvalido();
		limpiarMensajes();	
		ok.removeClass('d-none').append('El campo es válido.');
		ocultarSpin();
	}

	function invalido(){
		ocultarErrorPhp();
		esInvalido();
		limpiarMensajes();
		error.removeClass('d-none').append('El campo es inválido.');
		ocultarSpin();
	}

	function yaRegistrado(){
		ocultarErrorPhp();
		esInvalido();
		limpiarMensajes();	
		error.removeClass('d-none').append('El valor de este campo ya ha sido registrado.');
		ocultarSpin();		
	}

	function ocultarErrorPhp(){
		error_php.addClass('d-none').empty();
	}

	function esInvalido(){
		elemento.addClass('is-invalid');
	}

	function noEsInvalido(){
		elemento.removeClass('is-invalid');
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