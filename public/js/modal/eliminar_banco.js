$(window).on('load',function(){

	var ventana_modal = $('#modal_eliminar_banco');
	var aceptar = $('.aceptar');
	var id = 0;

	ventana_modal.click(function(){
		id = $(this).data('id');
    	$(".modal-body #eliminar_oculto").val(id);
	});

	aceptar.click(function(){
		if(id != 0){

			$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}}
			);	

			$.ajax({
				method: 'POST',
				dataType: 'json',			
			    url: '/eliminar_banco',
			    data: {id: id},
			    success: function(respuesta){
			    	if(respuesta === 1){
			    		$('#eliminar_cuenta').modal('hide');
			    		location.href = '/mantenedor_contables?e='+respuesta;
			    	}
			    },
				error: function(respuesta){
					
				}
			});	
		}
	});

});$(window).on('load',function(){

	var ventana_modal = $('#modal_eliminar_cargo');
	var aceptar = $('.aceptar');
	var id = 0;

	ventana_modal.click(function(){
		id = $(this).data('id');
    	$(".modal-body #eliminar_oculto").val(id);
	});

	aceptar.click(function(){
		if(id != 0){

			$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}}
			);	

			$.ajax({
				method: 'POST',
				dataType: 'json',			
			    url: '/eliminar_area',
			    data: {id: id},
			    success: function(respuesta){
			    	if(respuesta === 1){
			    		$('#eliminar_area').modal('hide');
			    		location.href = '/mantenedor_socios?e='+respuesta;
			    	}
			    },
				error: function(respuesta){
					
				}
			});	
		}
	});

});