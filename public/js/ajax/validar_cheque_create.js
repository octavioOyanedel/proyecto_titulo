$(window).on('load',function(){

	var cheque = $('#cheque');
	var echeque = $('#error-cheque');
	var ccheque = $('#comprobar-cheque');
	var chequeo = $('#cheque-ok');

	cheque.focusout(function(){
		if(cheque.val() === ''){
			echeque.addClass('d-none').empty();
			chequeo.addClass('d-none').empty();
		}
	});


	cheque.keyup( function(){

		if(cheque.val().length >= 7 && cheque.val().length <= 9){

			ccheque.removeClass('d-none');
			chequeo.addClass('d-none').empty();
			echeque.addClass('d-none').empty();

			$.ajax({
				method: 'GET',
				dataType: 'json',
				url: '/verificar_cheque',
				data: {cheque: cheque.val()},
				success: function(respuesta){
					ccheque.addClass('d-none');
					chequeo.addClass('d-none').empty();
					echeque.addClass('d-none').empty();
					if(respuesta === 1){
						cheque_ok = 0;
						echeque.removeClass('d-none').append('Ya existe este cheque.');													
					}else{
						var patron = /^\d*$/;
						if(!cheque.val().search(patron)){
							cheque_ok = 1;
							chequeo.removeClass('d-none').append('Cheque ok.');
						}else{
							cheque_ok = 0;
							echeque.removeClass('d-none').append('Cheque inválido.');
						}
					}
				},
				error: function(respuesta){
					console.log('ERROR: '+respuesta);
				}
			});	
		}
	});

	$('#cheque').focusout(function(){
		if(egreso_ok === 1 && cheque_ok === 1){
			$('#incorporar-prestamo').removeAttr('disabled');
		}else{
			$('#incorporar-prestamo').attr('selected','true');
		}
	});

	$('#numero_egreso').focusout(function(){
		if(egreso_ok === 1 && cheque_ok === 1){
			$('#incorporar-prestamo').removeAttr('disabled');
		}else{
			$('#incorporar-prestamo').attr('selected','true');
		}
	});
});