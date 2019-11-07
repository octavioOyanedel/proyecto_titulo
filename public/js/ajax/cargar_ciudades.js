$(window).on('load',function(){

	var comuna = $('#comuna_id');
	var ciudad = $('#ciudad_id');

	var id_ciudad = parseInt($('#old_ciudad').val());

	if(id_ciudad != 0){
		var id_comuna = parseInt($('#comuna_id option:selected').val());
		ajaxOld(id_comuna, id_ciudad);
	}

	comuna.change(function(){
		var id = parseInt($('#comuna_id option:selected').val());
		ajaxNormal(id);
	});			

	function ajaxNormal(id){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);		

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
	}

	function ajaxOld(id_comuna, id_ciudad){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);		
		
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargar_ciudades',
			data: {id: id_comuna},
			success: function(respuesta){
				ciudad.empty();
				ciudad.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					if(parseInt(e.id) == id_ciudad){
						ciudad.append('<option value='+e.id+' selected>'+e.nombre+'</option>');
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