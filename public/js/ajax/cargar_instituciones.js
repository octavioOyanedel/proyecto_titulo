$(window).on('load',function(){

	var grado = $('#grado_academico_id');
	var institucion = $('#institucion_id');
	var titulo = $('#titulo_id');
	var estado = $('#estado_grado_academico_id');

	grado.change(function(){

		var id = $('#grado_academico_id option:selected').val();

		limpiarEstado();

		if(parseInt(id) === 1){
			ocultarTitulo();
			limpiarTitulo();
		}else{
			mostrarTitulo();
		}
		
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
	});	

	function limpiarEstado(){
		var valor_estado = $( "#estado_grado_academico_id option:selected" ).val();
		if(valor_estado.localeCompare('') != 0){
			$('#estado_grado_academico_id option:eq(0)').removeAttr('selected');
			$('#estado_grado_academico_id option:eq(0)').attr('selected','selected');
		}
	}

	function ocultarTitulo(){
		$('#estado_grado_academico_id option:contains("Titulado")').hide();
	}

	function mostrarTitulo(){
		$('#estado_grado_academico_id option:contains("Titulado")').show();
	}

	function limpiarTitulo(){
		titulo.empty();
		titulo.attr('disabled','true');
		titulo.append('<option selected="true">Seleccione...</option>');		
	}

});