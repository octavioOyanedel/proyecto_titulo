$(window).on('load',function(){
	$.ajax({
		method: 'GET',
		dataType: 'json',
		url: '/pago_cuota',
		success: function(respuesta){
		},
		error: function(respuesta){
		}
	});
});