$(window).on('load',function(){
	$.ajax({
		method: 'GET',
		dataType: 'json',
		url: '/evaluar_fecha_prestamo',
		data: {id: 0},
		success: function(respuesta){

		},
		error: function(respuesta){
			//console.log(respuesta);
		}
	});
});