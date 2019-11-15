$(window).on('load',function(){

	var ventana_modal = $('#modal_eliminar_forma_pago');
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
			    url: '/eliminar_forma_pago',
			    data: {id: id},
			    success: function(respuesta){
			    	if(respuesta === 1){
			    		$('#eliminar_forma_pago').modal('hide');
			    		location.href = '/mantenedor_prestamos?e='+11;
			    	}
			    },
				error: function(respuesta){
					
				}
			});	
		}
	});

});