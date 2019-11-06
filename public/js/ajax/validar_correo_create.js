$(window).on('load',function(){

	//variables
	var elemento = $('#correo');
	var patron = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	var spin = $('#comprobar-correo');
	var ruta = window.location.pathname;
	var valor = '';
	var ok = $('#correo-ok');
	var error = $('#error-correo');
	var original = '';

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
			url: '/verificar_correo',
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
		noEsInvalido();
		limpiarMensajes();	
		ok.removeClass('d-none').append('El campo es válido.');
		ocultarSpin();
	}

	function invalido(){
		esInvalido();
		limpiarMensajes();
		error.removeClass('d-none').append('El campo no es un correo válido.');
		ocultarSpin();
	}

	function yaRegistrado(){
		esInvalido();
		limpiarMensajes();	
		error.removeClass('d-none').append('El valor de este campo ya ha sido registrado.');
		ocultarSpin();		
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