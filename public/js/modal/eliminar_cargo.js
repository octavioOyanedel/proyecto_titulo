$(window).on('load',function(){

	var ventana_modal = $('#eliminar_cargo'); //ventana modal
	var link_eliminar = $('.enlace_eliminar'); //listado
	var boton_aceptar = $('.aceptar_cargo'); //modal
	var id = 0;

	link_eliminar.click(function(){
		id = $(this).data('id');
		if(id != 0){
			boton_aceptar.click(function(){
				eliminar(id);
			});
		}
	});

	function eliminar(id){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);	

		$.ajax({
			method: 'POST',
			dataType: 'json',			
		    url: '/eliminar_cargo',
		    data: {id: id},
		    success: function(respuesta){
		    	if(respuesta === 1){
		    		ventana_modal.modal('hide');
		    		location.href = '/mantenedor_socios?e=3';
		    	}else{
		    		console.log('no');
		    	}

		    },
			error: function(respuesta){
			}
		});			
	}	
});