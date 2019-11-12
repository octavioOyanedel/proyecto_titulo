$(window).on('load',function(){

	//variables
	var elemento = $('#cheque');
	var patron = /^\d*$/;
	var spin = $('#comprobar-cheque');
	var ruta = window.location.pathname;
	var valor = '';
	var ok = $('#cheque-ok');
	var error = $('#error-cheque');
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
		
		if(valor != ''){		
			mostrarSpin();
			//condiciones que se deben cumplir para llamar a funcion ajax
			if(valor.length >= 1 && valor.length <= 10 && valor != '' &&  validarFormato() != null){
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
			url: '/verificar_cheque_contable',
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
		ok.removeClass('d-none').append('Cheque válido.');
		ocultarSpin();
	}

	function invalido(){
		limpiarMensajes();
		error.removeClass('d-none').append('Cheque no válido.');
		ocultarSpin();
	}

	function yaRegistrado(){
		limpiarMensajes();	
		error.removeClass('d-none').append('El valor de este campo ya ha sido registrado.');
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