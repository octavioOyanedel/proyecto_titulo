$(window).on('load',function(){

	var textos = $('.texto-deuda');
	for(var i = 0; i < textos.length; i++){
		texto = textos.eq(i).text();
		if(texto === 'Pagado' || texto === 'Pagada'){
			textos.eq(i).addClass('bg-success');
			textos.eq(i).addClass('text-light');
		}
		if(texto === 'Pendiente'){
			textos.eq(i).addClass('bg-warning');
			textos.eq(i).addClass('text-dark');
		}
		if(texto === 'Atrasado' || texto === 'Atrasada'){
			textos.eq(i).addClass('bg-danger');
			textos.eq(i).addClass('text-light');
		}
	}

});