$(window).on('load',function(){

	//variables
	var elemento = $('#cheque');
	var patron = /^\d*$/;
	var spin = $('#comprobar-cheque');
	var ruta = window.location.pathname;
	var valor = '';
	var ok = $('#cheque-ok');
	var error = $('#error-cheque');

	//reset mensajes
	limpiarMensajes();

	//capturar evento
	elemento.focusout( function(){ //keyup - focusout

		limpiarMensajes();
		mostrarSpin();	

		//formatear valor de entrada
		valor = formatearEntrada(elemento.val());	

		//condiciones que se deben cumplir para llamar a funcion ajax
		if(valor.length >= 1 && valor.length <= 9 && valor != '' &&  validarFormato() != null){
			//comprobar si es form create o edit, si es -1 no hay match (edit)
			if(comprobarRuta() === -1){ 	
				valido();
			}else{
				$.ajax({
					method: 'GET',
					dataType: 'json',
					url: '/verificar_cheque_contable',
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
		limpiarMensajes();	
		ok.removeClass('d-none').append('cheque válido.');
		ocultarSpin();
	}

	function invalido(){
		limpiarMensajes();
		error.removeClass('d-none').append('cheque no válido.');
		ocultarSpin();
	}

	function yaRegistrado(){
		limpiarMensajes();	
		error.removeClass('d-none').append('cheque ya registrado.');
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