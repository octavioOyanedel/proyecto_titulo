$(window).on('load',function(){
	$.ajax({
		method: 'GET',
		dataType: 'json',
		url: '/cambio_estado_deposito',
		success: function(respuesta){
		},
		error: function(respuesta){
		}
	});
});