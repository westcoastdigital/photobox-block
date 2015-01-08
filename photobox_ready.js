jQuery( document ).ready(function() {
jQuery('.gallery').photobox('a');
		// or with a fancier selector and some settings, and a callback:
		jQuery('.gallery').photobox('a:first', { thumbs:false, time:0 }, imageLoaded);
		function imageLoaded(){
			console.log('image has been loaded...');
		}

	


});
