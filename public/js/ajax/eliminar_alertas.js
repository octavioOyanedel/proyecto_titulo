$(window).on('load',function(){

boton_cerrar_alerta = $('.close');

	boton_cerrar_alerta.click(function(){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cerrar_alerta',
			success: function(respuesta){

			},
			error: function(respuesta){

			}
		});
	});

});