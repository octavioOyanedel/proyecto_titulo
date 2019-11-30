$(window).on('load',function(){

	var grado = $('#grado_academico_id');
	var titulo = $('#titulo_id');
	var estado = $('#estado_grado_academico_id');
	var ruta = window.location.pathname; 
	var id_titulo = parseInt($('#old_titulo').val());
	var titulo_actual = parseInt($('#edit_titulo').val());

	if(ruta.indexOf('estudios_socio') >= 0 && ruta.indexOf('edit') >= 0){
		activarTitulo();
		var grado_academico_id = parseInt($('#grado_academico_id option:selected').val());
		ajaxOld(grado_academico_id, titulo_actual);
	}else{
		desactivarTitulo();
	}

	if(id_titulo != 0){
		var id_grado = parseInt($('#grado_academico_id option:selected').val());
		ajaxOld(id_grado, id_titulo);
	}

	grado.change(function(){
		//reset select
		estado.prop('selectedIndex',0);
		var id = parseInt($('#grado_academico_id option:selected').val());
		ajaxNormal(id);

		if(parseInt(id) === 1){
			ocultarTitulado();

		}else{
			mostrarTitulado();
		}
	});		

	estado.change(function(){
		var texto_estado = $('#estado_grado_academico_id option:selected').text();
		if(texto_estado === 'Titulado'){
			activarTitulo();
		}else{
			desactivarTitulo();
		}
	});		

	function activarTitulo(){
		titulo.removeAttr('disabled');
	}

	function desactivarTitulo(){
		titulo.attr('disabled','true');
	}

	function ajaxNormal(id){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);	

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
	}

	function ajaxOld(id_grado, id_titulo){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);	
		
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargar_titulos',
			data: {id: id_grado},
			success: function(respuesta){
				titulo.empty();
				titulo.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					if(parseInt(e.id) == id_titulo){
						titulo.append('<option value='+e.id+' selected>'+e.nombre+'</option>');
					}else{
						titulo.append('<option value='+e.id+'>'+e.nombre+'</option>');
					}		
				
				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});		
	}

	function ocultarTitulado(){
		$('#estado_grado_academico_id option:contains("Titulado")').hide();
		$('#estado_grado_academico_id option:contains("Graduado")').show();
	}

	function mostrarTitulado(){
		$('#estado_grado_academico_id option:contains("Titulado")').show();
		$('#estado_grado_academico_id option:contains("Graduado")').hide();
	}

	function activarInput(){
		titulo.removeAttr('disabled');
	}

	function desactivarInput(){
		titulo.attr('disabled','true');
	}
});