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
			
		}else{
			invalido();
		}
		
	});

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