$(window).on('load',function(){
	$.ajax({
		method: 'GET',
		dataType: 'json',
		url: '/pago_cuotas_atrasadas',
		success: function(respuesta){
		},
		error: function(respuesta){
		}
	});
});