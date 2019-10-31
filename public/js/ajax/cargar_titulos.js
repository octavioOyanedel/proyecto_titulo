$(window).on('load',function(){

	var estado = $('#estado_grado_academico_id');
	var titulo = $('#titulo_id');
	var institucion = $('#institucion_id');

	//activar titulo
	estado.change(function(){
		var valor_estado = $('#estado_grado_academico_id option:selected').val();
		if(parseInt(valor_estado) === 4){
			activarTitulo();
		}else{
			desactivarTitulo();
		}
	});	

	institucion.change(function(){
		var id = $('#institucion_id option:selected').val();
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

	function activarTitulo(){
		titulo.removeAttr('disabled');
	}

	function desactivarTitulo(){
		titulo.attr('disabled','true');
	}

});