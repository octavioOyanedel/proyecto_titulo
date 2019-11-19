$(window).on('load',function(){

	var ruta = window.location.pathname;
	var genero = $('#option1');
	var sede = $('#sede_id');
	var area = $('#area_id');
	var cargo = $('#cargo_id');
	var estado = $('#estado_socio_id');

	if(ruta === '/filtro_socios_form'){
		desactivarElemento(genero);
		desactivarElemento(sede);
		desactivarElemento(area);
		desactivarElemento(cargo);
		desactivarElemento(estado);
	}else{
		activarElemento(genero);
		activarElemento(sede);
		activarElemento(area);
		activarElemento(cargo);
		activarElemento(estado);		
	}

	function activarElemento(elemento){
		elemento.attr('required','true');
	}

	function desactivarElemento(elemento){
		elemento.removeAttr('required');		
	}
});