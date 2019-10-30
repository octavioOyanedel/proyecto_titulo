$(window).on('load',function(){

	var elemento = $('#rut');
	var error = $('#error-rut');
	var spin = $('#comprobar-rut');
	var ok = $('#rut-ok');
	var boton = $('#incorporar');

	elemento.keyup( function(){

		limpiarMensajes();

		if(elemento.val().length === 0){
			limpiarMensajes();		
		}

		if(elemento.val().length < 8){
			ocultarSpin()
		}

		if(elemento.val().length > 6 && elemento.val().length < 10){
			mostrarSpin();
			$.ajax({
				method: 'GET',
				dataType: 'json',
				url: '/verificar_rut_carga',
				data: {elemento: elemento.val()},
				success: function(respuesta){
					limpiarMensajes();				
					if(respuesta === 1){
						ocultarSpin()
						desactivarBoton();
						error.removeClass('d-none').append('Rut ya registrado.');				
					}else{
						if(validarRut(elemento.val()) === true){
							ocultarSpin();
							activarBoton();
							ok.removeClass('d-none').append('Rut válido.');
						}else{
							ocultarSpin();
							desactivarBoton();
							error.removeClass('d-none').append('Rut no válido.');
						}						
					}
				},
				error: function(respuesta){
					console.log('ERROR: '+respuesta);
				}
			});	
		}		
	});


	function limpiarMensajes(){
		error.addClass('d-none').empty();
		ok.addClass('d-none').empty();
	}

	function ocultarSpin(){
		spin.addClass('d-none');
	}

	function mostrarSpin(){
		spin.removeClass('d-none');
	}

	function activarBoton(){
		boton.removeAttr('disabled');
	}

	function desactivarBoton(){
		boton.attr('disabled','true');
	}

	function validarRut(rut){

		var rut = rut.trim().toLowerCase();

		var patron = '[1-9]{1,2}[0-9]{3}[0-9]{3}[0-9Kk]{1}';

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