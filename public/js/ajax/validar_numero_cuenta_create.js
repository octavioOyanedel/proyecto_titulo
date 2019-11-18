$(window).on('load',function(){

	var elemento = $('#numero');
	var patron = /^([0-9]{1,9})-([0-9]{1,9})-([0-9]{1,9})*$/;
	var spin = $('#comprobar-numero-cuenta');
	var ruta = window.location.pathname;
	var valor = '';	
	var ok = $('#numero-cuenta-ok');
	var error = $('#error-numero-cuenta');
	var boton = $('#incorporar');	
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
			
		if(valor != ''){
			mostrarSpin();	
			//condiciones que se deben cumplir para llamar a funcion ajax
			if(valor.length >= 5 && valor.length <= 29 &&  validarFormato() != null){
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
		}			
	});

	function consultaAjax(valor){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);		
		
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/verificar_numero_cuenta',
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
		activarBoton();		
		limpiarMensajes();	
		ok.removeClass('d-none').append('Número de cuenta válido.');
		ocultarSpin();
	}

	function invalido(){
		ocultarErrorPhp();
		esInvalido();
		desactivarBoton();		
		limpiarMensajes();
		error.removeClass('d-none').append('Número de cuenta no válido.');
		ocultarSpin();
	}

	function yaRegistrado(){
		ocultarErrorPhp();
		esInvalido();
		desactivarBoton();		
		limpiarMensajes();	
		error.removeClass('d-none').append('El valor de este campo ya ha sido registrado.');
		ocultarSpin();		
	}

	function activarBoton(){
		boton.removeAttr('disabled');
	}

	function desactivarBoton(){
		boton.attr('disabled','true');
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