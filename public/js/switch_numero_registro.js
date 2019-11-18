$(window).on('load',function(){

	var tipo_registro = $('#tipo_registro_contable_id');
	var registro = $('#numero_registro');

	tipo_registro.change(function(){
		if($(this).val() != ''){
			registro.removeAttr('disabled');
		}else{
			registro.attr('disabled','true');
		}
	});

});