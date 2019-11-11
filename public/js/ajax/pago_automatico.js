$(window).on('load',function(){
	$.ajax({
		method: 'GET',
		dataType: 'json',
		url: '/pago_automatico_cuotas',
		success: function(respuesta){
		},
		error: function(respuesta){
			//console.log(respuesta);
		}
	});
});