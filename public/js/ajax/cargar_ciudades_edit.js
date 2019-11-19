$(window).on('load',function(){

	var ruta = window.location.pathname 
	var ciudad = $('#ciudad_id');
	var ciudad_id = parseInt($('#edit_ciudad').val());

	if(ruta.indexOf('socios') >= 0 && ruta.indexOf('edit') >= 0){
		//obtener comuna seleccionada
		var comuna_id = parseInt($('#comuna_id option:selected').val());
		ajax(comuna_id, ciudad_id);
	}

	function ajax(comuna_id, ciudad_id){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);		

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargar_ciudades',
			data: {id: comuna_id},
			success: function(respuesta){
				ciudad.empty();
				ciudad.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					if(ciudad_id === parseInt(e.id)){
						ciudad.append('<option value='+e.id+' selected="true">'+e.nombre+'</option>');
					}else{
						ciudad.append('<option value='+e.id+'>'+e.nombre+'</option>');
					}			
				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});
	}
});