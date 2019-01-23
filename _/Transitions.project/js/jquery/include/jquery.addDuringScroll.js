// jquery.addDuringScroll.js
// the .during-scroll class is located in js-no-hover-on-scroll.scss

// define global scrollTimer varible
scrollTimer = 0;

// bind this function to jQuery's onscroll event - in _close.js
function addDuringScroll() {

	// if add .during-scroll class to the site wrapper during scroll - this class stopps css pointer events like :hover 
	if(!$('#wrapper').hasClass('during-scroll')) {
		$('#wrapper').addClass('during-scroll');
	}

	// reset the scrollTimer to 0 everytime the scroll event fires - which is constantly during user scrolling
	clearTimeout(scrollTimer);

	// after scrolling has stopped for x time, remove the .during-scroll class
	scrollTimer = setTimeout( function () {
		$('#wrapper').removeClass('during-scroll');
	}, 250 );

}