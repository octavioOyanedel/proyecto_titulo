$(window).on('load',function(){

	var tipo = $('#tipo_registro_contable_id');
	var concepto = $('#concepto_id');
	var boton = $('#incorporar');
	var campo_cheque = $('#campo_cheque');
	var cheque = $('#cheque');

	var id_concepto = parseInt($('#old_concepto').val());

	if(id_concepto != 0){
		var id_tipo = parseInt($('#tipo_registro_contable_id option:selected').val());	
		ajaxOld(id_tipo, id_concepto);
		activarBoton();
	}

	tipo.change(function(){
		var id = parseInt($('#tipo_registro_contable_id option:selected').val());
		ajaxNormal(id);
		if(id === 1){
			activarCheque();
			siRequired();

		}else{
			desactivarCheque();
			noRequired();
		}		
	});

	function activarCheque(){
		campo_cheque.removeClass('d-none');
	}			

	function desactivarCheque(){
		campo_cheque.addClass('d-none');
	}

	function noRequired(){
		cheque.removeAttr('required');
	}

	function siRequired(){
		cheque.attr('required','true');
	}

	function activarBoton(){
		boton.removeAttr('disabled');
	}

	function desactivarBoton(){
		boton.attr('disabled','true');
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
			url: '/cargar_conceptos',
			data: {id: id},
			success: function(respuesta){
				concepto.empty();
				concepto.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					concepto.append('<option value='+e.id+'>'+e.nombre+'</option>');
				
				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});
	}

	function ajaxOld(id_tipo, id_concepto){
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargar_conceptos',
			data: {id: id_tipo},
			success: function(respuesta){
				concepto.empty();
				concepto.append('<option selected="true">Seleccione...</option>');
				respuesta.forEach(e => {
					if(parseInt(e.id) == id_concepto){
						concepto.append('<option value='+e.id+' selected>'+e.nombre+'</option>');
					}else{
						concepto.append('<option value='+e.id+'>'+e.nombre+'</option>');
					}		
				
				});
			},
			error: function(respuesta){
				console.log('error');
			}
		});		
	}
});