$(window).on('load',function(){

	var op1 = $('#option1');
	var op2 = $('#option2');

	op1.focusin(function(){
		op2.removeAttr('checked');
		op1.attr('checked','true');
	});

	op2.focusin(function(){
		op1.removeAttr('checked');
		op2.attr('checked','true');
	});

});