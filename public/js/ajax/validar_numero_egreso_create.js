var egreso_ok = 0;
var cheque_ok = 0;

$(window).on('load',function(){

	var egreso = $('#numero_egreso');
	var eergreso = $('#error-numero-egreso');
	var cergreso = $('#comprobar-numero-egreso');
	var egresoo = $('#numero-egreso-ok');

	egreso.focusout(function(){
		if(egreso.val() === ''){
			eergreso.addClass('d-none').empty();
			egresoo.addClass('d-none').empty();
		}
	});


	egreso.keyup( function(){

		if(egreso.val().length >= 2 && egreso.val().length <= 9){

			cergreso.removeClass('d-none');
			egresoo.addClass('d-none').empty();
			eergreso.addClass('d-none').empty();

			$.ajax({
				method: 'GET',
				dataType: 'json',
				url: '/verificar_numero_egreso',
				data: {numero_egreso: egreso.val()},
				success: function(respuesta){
					cergreso.addClass('d-none');
					egresoo.addClass('d-none').empty();
					eergreso.addClass('d-none').empty();
					if(respuesta === 1){
						egreso_ok = 0;
						eergreso.removeClass('d-none').append('Ya existe este número egreso.');													
					}else{
						var patron = /^\d*$/;
						if(!egreso.val().search(patron)){
							egreso_ok = 1;
							egresoo.removeClass('d-none').append('Número egreso ok.');
						}else{
							egreso_ok = 0;
							eergreso.removeClass('d-none').append('Número egreso inválido.');
						}
					}
				},
				error: function(respuesta){
					console.log('ERROR: '+respuesta);
				}
			});	
		}
	});

});