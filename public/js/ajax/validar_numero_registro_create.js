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
	var original = '';
	var tipo = '';

	//reset mensajes
	limpiarMensajes();

	//capturar valor original
	original = formatearEntrada(elemento.val());

	//captura de tipo de registro
	$('#tipo_registro_contable_id').change(function(){
		tipo = $(this).val();
	});

	//capturar evento
	elemento.focusout( function(){ //keyup - focusout

		//formatear valor de entrada
		valor = formatearEntrada(elemento.val());

		limpiarMensajes();	

		if(valor != ''){
			mostrarSpin();	
			//condiciones que se deben cumplir para llamar a funcion ajax
			if(valor.length >= 1 && valor.length <= 4 && valor != '' &&  validarFormato() != null){
				//form editar
				if(comprobarRuta() === -1){
					//si valor original es distinto de vacío
					if(original != ''){
						//si campos no son iguales
						if(original != valor){
							consultaAjax(valor, tipo);
						}else{
							valido();
						}
					}
				}
				//form crear
				else{
					consultaAjax(valor, tipo);
				}
			}else{
				invalido();
			}
		}else{
			desactivarBoton();
		}			
	});

	function consultaAjax(valor, tipo){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);		

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/verificar_numero_registro',
			data: {elemento: valor, tipo: tipo},
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
		activarBoton();
		limpiarMensajes();	
		ok.removeClass('d-none').append('Número de registro contable válido.');
		ocultarSpin();
	}

	function invalido(){
		desactivarBoton();
		limpiarMensajes();
		error.removeClass('d-none').append('Número de registro contable no válido.');
		ocultarSpin();
	}

	function yaRegistrado(){
		desactivarBoton();
		limpiarMensajes();	
		error.removeClass('d-none').append('Número de registro contable ya registrado.');
		ocultarSpin();		
	}

	function comprobarRuta(){
		return ruta.search('anular_registro_form');
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