$(window).on('load',function(){

	var ruta = window.location.pathname;
	var tipo_registro = $('#tipo_registro_contable_id');
	var registro = $('#numero_registro');

	if(ruta != '/contables/create'){
		registro.removeAttr('disabled');
	}

	tipo_registro.change(function(){
		$('#cheque').val('');
		if($(this).val() != ''){
			registro.removeAttr('disabled');
		}else{
			registro.attr('disabled','true');
		}
	});

});