jQuery( document ).ready(function() {


	jQuery('.gallery').children().hover(function() {
		jQuery(this).siblings().stop().fadeTo(500,0.5);
	}, function() {
		jQuery(this).siblings().stop().fadeTo(500,1);
	});


});