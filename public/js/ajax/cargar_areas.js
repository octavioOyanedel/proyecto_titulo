$(window).on('load',function(){

	var sede = $('#sede_id');
	var area = $('#area_id');

	var id_area = parseInt($('#old_area').val());

	if(id_area != 0){
		var id_sede = parseInt($('#sede_id option:selected').val());
		ajaxOld(id_sede, id_area);
	}

	sede.change(function(){
		var id = parseInt($('#sede_id option:selected').val());
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
	}

	function ajaxOld(id_sede, id_area){
		
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargar_areas',
			data: {id: id_sede},
			success: function(respuesta){
				area.empty();
				area.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					if(parseInt(e.id) == id_area){
						area.append('<option value='+e.id+' selected>'+e.nombre+'</option>');
					}else{
						area.append('<option value='+e.id+'>'+e.nombre+'</option>');
					}		
				
				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});		
	}
});