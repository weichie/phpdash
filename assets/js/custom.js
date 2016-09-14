$(document).ready(function(){

	$('.hide-panel').on('click',function(){
		$(this).closest('.panel').find('.panel-body').slideToggle();
	});
	
});