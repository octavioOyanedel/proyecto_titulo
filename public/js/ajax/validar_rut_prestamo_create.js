$(window).on('load',function(){

	//variables
	var elemento = $('#rut');
	var patron = '[1-9]{1,2}[0-9]{3}[0-9]{3}[0-9Kk]{1}';
	var spin = $('#comprobar-rut');
	var ruta = window.location.pathname;
	var valor = '';
	var ok = $('#rut-ok');
	var error = $('#error-rut');
	var boton = $('#incorporar');
	var original = '';
	var error_php = $('#error-rut-php');

	//activar boton con valor old
	var rut = $('#old_rut').val();
	if(rut != ''){
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
			if(valor.length >= 8 && valor.length <= 9 && validarFormato() != null && validarRut(valor) === true){
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
		}else{
			desactivarBoton();
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
			url: '/verificar_rut_prestamo',
			data: {elemento: valor},
			success: function(respuesta){												
				switch(respuesta) {
					case 0:
						noRegistrado();
						break;
					case 1:
						prestamoPendiente();
						break;
					case 2:
						valido();
						incorporarIdSocio(valor);
						break;						
					default:
					// code block
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
		ok.removeClass('d-none').append('Socio no presenta préstamo pendiente.');
		ocultarSpin();
	}

	function incorporarIdSocio(valor){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);	

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/obtener_id_socio_con_rut',
			data: {elemento: valor},
			success: function(respuesta){												
				if(respuesta != null){
					$('#socio_id').val(respuesta);
				}
			},
			error: function(respuesta){
				console.log('ERROR: '+respuesta);
			}
		});						
	}

	function invalido(){
		ocultarErrorPhp();
		esInvalido();		
		desactivarBoton();
		limpiarMensajes();
		error.removeClass('d-none').append('Rut no válido.');
		ocultarSpin();
	}

	function noRegistrado(){
		ocultarErrorPhp();
		esInvalido();		
		desactivarBoton();
		limpiarMensajes();
		error.removeClass('d-none').append('Socio no registrado.');
		ocultarSpin();
	}

	function prestamoPendiente(){
		desactivarBoton();
		limpiarMensajes();	
		error.removeClass('d-none').append('Socio presenta préstamo pendiente.');
		ocultarSpin();		
	}

	function ocultarErrorPhp(){
		error_php.addClass('d-none').empty();
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

	function validarRut(rut){

		if(rut.match(patron) != null || rut.match(patron) != rut){
		    var dv = rut[rut.length-1];

		    switch(dv) {
		      case 'k':
		        dv = 10;
		        break;
		      case '0':
		        dv = 11;
		        break;
		      default:
		        dv = parseInt(dv);
		    } 

		    var rutSinDv = rut.slice(0, -1);
		    var suma = 0;
		    var factor = 2;

		    for(var i = rutSinDv.length - 1; i >= 0; i--){
		        if(factor === 8){
		            factor = 2;        
		        }
		        suma = suma + (parseInt(rutSinDv[i]) * factor);
		        factor++;
		    }

		    dvCalculado = 11 - (suma - ((Math.floor(suma/11)) * 11));

		    if(dv === dvCalculado){
		        return true;  
		    }else{
		        return false; 
		    }
		}else{
		    return false; 
		}		
	}
});