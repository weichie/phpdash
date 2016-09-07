$(document).ready(function(){
	$('.hide-panel').on('click',function(){
		var panel = $(this).closest('.panel').find('.panel-body');

		panel.slideToggle();

		if(panel.is(':visible')){
			$(this).children().removeClass('fa-chevron-up');
			$(this).children().addClass('fa-chevron-down');
		}else{
			$(this).children().removeClass('fa-chevron-down');
			$(this).children().addClass('fa-chevron-up');
		}
	});
});