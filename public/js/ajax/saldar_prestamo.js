$(window).on('load',function(){
	$.ajax({
		method: 'GET',
		dataType: 'json',
		url: '/saldar_prestamo',
		success: function(respuesta){
			console.log(respuesta);
		},
		error: function(respuesta){
			//console.log(respuesta);
		}
	});
});