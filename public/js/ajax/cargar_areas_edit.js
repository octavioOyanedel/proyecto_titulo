$(window).on('load',function(){

	var ruta = window.location.pathname 
	var area = $('#area_id');
	var area_id = parseInt($('#edit_area').val());

	if(ruta.indexOf('socios') >= 0 && ruta.indexOf('edit') >= 0){
		//obtener sede seleccionada
		var sede_id = parseInt($('#sede_id option:selected').val());
		ajax(sede_id, area_id);
	}

	function ajax(sede_id, area_id){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);		

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargar_areas',
			data: {id: sede_id},
			success: function(respuesta){
				area.empty();
				area.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					if(area_id === parseInt(e.id)){
						area.append('<option value='+e.id+' selected="true">'+e.nombre+'</option>');
					}else{
						area.append('<option value='+e.id+'>'+e.nombre+'</option>');
					}			
				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});
	}
});