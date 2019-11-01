$(window).on('load',function(){

	var grado = $('#grado_academico_id');
	var titulo = $('#titulo_id');

	grado.change(function(){
		var id = $('#grado_academico_id option:selected').val();

		if(parseInt(id) === 1){
			ocultarTitulado();

		}else{
			mostrarTitulado();
		}

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargar_titulos',
			data: {id: id},
			success: function(respuesta){
				titulo.empty();
				titulo.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					titulo.append('<option value='+e.id+'>'+e.nombre+'</option>');
				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});
	});	

	function ocultarTitulado(){
		$('#estado_grado_academico_id option:contains("Titulado")').hide();
		$('#estado_grado_academico_id option:contains("Graduado")').show();
	}

	function mostrarTitulado(){
		$('#estado_grado_academico_id option:contains("Titulado")').show();
		$('#estado_grado_academico_id option:contains("Graduado")').hide();
	}

});