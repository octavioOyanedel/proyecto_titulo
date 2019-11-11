$(window).on('load',function(){
	$.ajax({
		method: 'GET',
		dataType: 'json',
		url: '/cambio_estado_deposito',
		data: {id: 0},
		success: function(respuesta){

		},
		error: function(respuesta){
			//console.log(respuesta);
		}
	});
});