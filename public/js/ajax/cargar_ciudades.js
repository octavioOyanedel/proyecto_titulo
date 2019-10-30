$(window).on('load',function(){

	var comuna = $('#comuna_id');
	var ciudad = $('#ciudad_id');

	comuna.change(function(){
		var id = $('#comuna_id option:selected').val();
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargar_ciudades',
			data: {id: id},
			success: function(respuesta){
				ciudad.empty();
				ciudad.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					ciudad.append('<option value='+e.id+'>'+e.nombre+'</option>');
				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});
	});	
});