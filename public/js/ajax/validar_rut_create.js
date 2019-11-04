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

	//reset mensajes
	limpiarMensajes();

	//capturar evento
	elemento.focusout( function(){ //keyup - focusout

		limpiarMensajes();
		mostrarSpin();	

		//formatear valor de entrada
		valor = formatearEntrada(elemento.val());	

		//condiciones que se deben cumplir para llamar a funcion ajax
		if(valor.length >= 8 && valor.length <= 9 && valor != '' &&  validarFormato() != null && validarRut(valor) === true){
			$.ajax({
				method: 'GET',
				dataType: 'json',
				url: '/verificar_rut',
				data: {elemento: valor},
				success: function(respuesta){						
					if(comprobarRuta() === -1 && respuesta === valor){
						valido();					
					}else if(respuesta === valor){
						yaRegistrado();
					}else{
						valido();
					}
				},
				error: function(respuesta){
					console.log('ERROR: '+respuesta);
				}
			});	
		}else{
			invalido();
		}
		
	});

	function valido(){
		activarBoton();
		limpiarMensajes();	
		ok.removeClass('d-none').append('Rut válido.');
		ocultarSpin();
	}

	function invalido(){
		desactivarBoton();
		limpiarMensajes();
		error.removeClass('d-none').append('Rut no válido.');
		ocultarSpin();
	}

	function yaRegistrado(){
		desactivarBoton();
		limpiarMensajes();	
		error.removeClass('d-none').append('Rut ya registrado.');
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

	function activarBoton(){
		boton.removeAttr('disabled');
	}

	function desactivarBoton(){
		boton.attr('disabled','true');
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