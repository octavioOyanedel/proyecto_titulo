$(window).on('load',function(){

	var registro = $('#registro');
	var columna = $('#columna');
	var orden = $('#orden');

	var filtrar = $('#filtrar');

	registro.change(function(){
		if($('#registro option:selected').val() != 0 || $('#columna option:selected').val() != 0 || $('#orden option:selected').val() != 0){
			activarBoton();
		}else{
			desactivarBoton();
		}  
	});

	columna.change(function(){
		if($('#registro option:selected').val() != 0 || $('#columna option:selected').val() != 0 || $('#orden option:selected').val() != 0){
			activarBoton();
		}else{
			desactivarBoton();
		}  
	});

	orden.change(function(){
		if($('#registro option:selected').val() != 0 || $('#columna option:selected').val() != 0 || $('#orden option:selected').val() != 0){
			activarBoton();
		}else{
			desactivarBoton();
		}  
	});

	function desactivarBoton(){
		filtrar.attr('disabled','true');
	}

	function activarBoton(){
		filtrar.removeAttr('disabled');
	}
});