$(window).on('load',function(){

	//variables
	var elemento = $('#email');
	var patron = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	var spin = $('#comprobar-email');
	var ruta = window.location.pathname;
	var valor = '';
	var ok = $('#email-ok');
	var error = $('#error-email');
	var original = '';
	var error_php = $('#error-email-php');
	var boton = $('#incorporar');
	
	//activar boton con valor old
	var email = $('#old_email').val();
	if(email != ''){
		activarBoton();
	}

	//activar boton update
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

		if(valor != ''){
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
		error.removeClass('d-none').append('El campo no es un correo válido.');
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

	function activarBoton(){
		boton.removeAttr('disabled');
	}

	function desactivarBoton(){
		boton.attr('disabled','true');
	}

	function esInvalido(){
		elemento.addClass('is-invalid');
	}

	function noEsInvalido(){
		elemento.removeClass('is-invalid');
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

});