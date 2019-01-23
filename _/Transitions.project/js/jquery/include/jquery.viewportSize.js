// jquery.viewportSize.js

function setWindowHeight() {
	// if a #...-header exists
	if($('#post-header').length || $('#about-header').length || $('#contact-header').length){

		// get the viewport height
		windowHeight = $( window ).height();

		// if wp admin bar is present, subtract its height from the windowHeight
		// wp admin bar height = 46px when window.width < 783px ...or 36px when window.width >=783px
		if($('#wpadminbar').length){
			if ($( window ).width() >= 783) {
				windowHeight -= 32;
			} else {
				windowHeight -= 46;
			}
		}

		// create empty headerHeight
		var headerHeight = 0;
		// if there is a .page-title, set the headerHeight to the .page-title's height
		if($('.page-title').length){
			headerHeight = $('.page-title').outerHeight(true);
		}

		// assign an inline css height to the #...-headers 
		if ($('#post-header').length) {
			$('#post-header').css({
				'height': windowHeight + 'px'
			});
		} else if ($('#about-header').length) {
			$('#about-header').css({
				'height': windowHeight - headerHeight + 'px'
			});
		} else if ($('#contact-header').length) {
			$('#contact-header').css({
				'height': (windowHeight) - headerHeight  + 'px'
			});
		}
	}
}

// might need a windowWidth for something later?
// function setWindowWidth(){
//	
// }