// jquery.scrolling.js

// custom jQuery animation timing ase out exponentially 
$.extend( jQuery.easing, {
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	}
});

// bind all the different methods of scroll input on the html and body elements to the stop() function
function bindScrollInput(){
	$("html, body").bind("scroll mousedown DOMMouseScroll mousewheel keyup", function(){
		$('html, body').stop();
	});
}
// unbind all the different methods of scroll input... 
function unbindScrollInput(){
	$("html, body").unbind("scroll mousedown DOMMouseScroll mousewheel keyup");
}

// animate the scroll down - if user scrolls during the animation, stop the animation
function scrollDown(){
	$('.scroll-down').click(function(){
		bindScrollInput();
		$('html, body').animate({
			scrollTop: $(".scroll-down").offset().top + $(".scroll-down").outerHeight() },
			1000, 
			'easeOutExpo',
			function(){unbindScrollInput();}
		);
	});
}

// animate the retun to top - if user scrolls during the animation, stop the animation
function scrollToTop(){
	$('.scroll-to-top').click(function(){
		bindScrollInput();
		$('html, body').animate({
			scrollTop: $('body').offset().top },
			2000, 
			'easeOutExpo',
			function(){unbindScrollInput();}
		);
	});
}

// if the user clicks on a link to the current page, scroll to the top of the page instead of reloading
function currentLinks() {
	$('#wrapper .current a, #wrapper .current-menu-item a').click(function(e){
		e.preventDefault();
		bindScrollInput();
		$('html, body').animate({
			scrollTop: $('body').offset().top }, 
			2000,
			'easeOutExpo',
			function(){unbindScrollInput();}
		);
		return false; 
	});
}