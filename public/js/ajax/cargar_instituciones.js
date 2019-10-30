$(window).on('load',function(){

	var grado = $('#grado_academico_id');
	var institucion = $('#institucion_id');

	grado.change(function(){
		var id = $('#grado_academico_id option:selected').val();
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargar_instituciones',
			data: {id: id},
			success: function(respuesta){
				console.log(respuesta);
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
	});	
});