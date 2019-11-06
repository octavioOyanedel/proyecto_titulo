$(window).on('load',function(){

	var comuna = $('#comuna_id');
	var ciudad = $('#ciudad_id');
	var id_ciudad = $('#old_ciudad').val();
	
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

					//si existe valor old
					if(id_ciudad != 0){
						if(e.id === id_ciudad){
							ciudad.append('<option value='+e.id+' selected>'+e.nombre+'</option>');
						}		
					}
					ciudad.append('<option value='+e.id+'>'+e.nombre+'</option>');					

				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});
	});	

});