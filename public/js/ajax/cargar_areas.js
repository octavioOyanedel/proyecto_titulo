$(window).on('load',function(){

	var sede = $('#sede_id');
	var area = $('#area_id');

	sede.change(function(){
		var id = $('#sede_id option:selected').val();
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargar_areas',
			data: {id: id},
			success: function(respuesta){
				area.empty();
				area.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					area.append('<option value='+e.id+'>'+e.nombre+'</option>');
				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});
	});	
});