$(window).on('load',function(){

	var grado = $('#grado_academico_id');
	var institucion = $('#institucion_id');

	var id_institucion = parseInt($('#old_institucion').val());

	if(id_institucion != 0){
		var id_grado = parseInt($('#grado_academico_id option:selected').val());
		ajaxOld(id_grado, id_institucion);
	}

	grado.change(function(){
		var id = parseInt($('#grado_academico_id option:selected').val());
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
			url: '/cargar_instituciones',
			data: {id: id},
			success: function(respuesta){
				institucion.empty();
				institucion.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					institucion.append('<option value='+e.id+'>'+e.nombre+'</option>');
				
				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});
	}

	function ajaxOld(id_grado, id_institucion){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);	
			
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargar_instituciones',
			data: {id: id_grado},
			success: function(respuesta){
				institucion.empty();
				institucion.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					if(parseInt(e.id) == id_institucion){
						institucion.append('<option value='+e.id+' selected>'+e.nombre+'</option>');
					}else{
						institucion.append('<option value='+e.id+'>'+e.nombre+'</option>');
					}		
				
				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});		
	}

});