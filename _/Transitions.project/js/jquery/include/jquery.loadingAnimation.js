// jquery.loadingAnimation.js
// css classes are in js-loading-animation.scss

// TODO - what is that animateInViewport( delay , ... ) argument for?? is it nessasary?

// jquery.viewportSelectors.js  plugin - new selectors: 
// :aboveTheTop
// :inViewport
// :belowTheFold

// will store the animaton elements as a jquery object - so they will only need to be queried on the original page load - ...I think
var $animated;

// remove all animation classes from the DOM - resets for firefox/safari bfcashe "pageshow" event using their 
function animateReset() {
	$('.above-the-top').removeClass('above-the-top');
	$('.in-viewport').removeClass('in-viewport');
	$('.below-the-fold').removeClass('below-the-fold');
	$('.image-in-viewport').removeClass('image-in-viewport');
	$('.image-below-the-fold').removeClass('image-below-the-fold');	
	$('.fade').removeClass('fade');	
}

// code to be executed on document.ready
function readyLoadingAmimation() {

	// delete the "plese make sure you have your javascript turned on" warning
	$('#wrapper-js-warning').remove();
	$('#wrapper-home').remove();

	// defines list of elements to be animated on loads & scroll - it's a doozy
	$animated = $('
		.page-title, 
		.post-link, 
		.entry-title, 
		.entry-title span, 

		#post-header .post-meta-data p, 
		#post-header .info-toggle, 
		.scroll-down, 

		#post-content h1, 
		#post-content h2, 
		#post-content h3, 
		#post-content h4, 
		#post-content h5, 
		#post-content h6, 
		#post-content p, 
		#post-content span, 
		#post-content picture, 
		#post-content img, 

		#bio h2,
		#bio p,

		#skills h2,
		#skills h3,
		.skill,
		.skillsubset, 

		#work-experience h2,
		#work-experience > ul > li,

		#education h2,
		#education > ul > li,

		#contact-invitation,
		.contact-field,
		.contact-area,
		.contact-button,

		.scroll-to-top,
		.post-edit-link,

		#home-nav,
		#home-nav .menu-item
	');
	
	// adds the .below-the-fold class to all of the elements above - sets them up for initial animation
	addBelowFold();
}

// sets up all the $animated elements for their inital animation
function addBelowFold() {
	$animated.addClass('below-the-fold');
	// special class/animation for the featured image of a single post page
	$('.perfect-contain').addClass('image-below-the-fold');
}

// to be executed on window.load and on firefox/safari bfcashe "pageshow" event
function loadLoadingAmimation(wrapperTiming) {

	// if this is the home page, add the .animate class to play the home animation
	// .animate class is in home--animation.scss
	if ( $('#home-header').length ) {
		$('body, #home-nav').addClass('animate');	
	}

	// once the window's resouces are loaded, fade the #wrapper-loading
	$('#wrapper-loading').css({
		'opacity':'0',
		'transition':'opacity ' + (wrapperTiming - 200) + 'ms ease'
	});

	// start the animation just before the #wrapper-loading is completey transparent
	setTimeout(function(){

		// save the #wrapper-loading below everything else
		$('#wrapper-loading').css({	
			'z-index':'-99', 
			'display':'none' 
		});	

		// add special animation classes 
		$('.perfect-contain, #cd-google-map')
			.removeClass('image-below-the-fold')
			.addClass('image-in-viewport')
		;

		// timer that fires the animation sequence every half second
		setInterval(function(){
			animateInViewport(150,800);
		}, 500 );

	}, ( wrapperTiming - 100 ));
}


// animate in visible content - for use on initial window.load and timed interval
// delay argument is max interval of time between transition-delays
// totalAnimationTime argument is max about of time the animation is allowed to take
function animateInViewport(delay, totalAnimationTime) { // (150,800) 150*5=750 < 800 

	// create a subset of the $animated elements that are currently in the viewport
	var $animating = $animated.filter(':inViewport').filter('.below-the-fold');

	// adds an incrimented animation delay of x to each $animating element - so the file in one at a time
	// if the number of $animating elements is greater than five, divide the total number of elements into the totalAnimationTime
	var timeSeperation = ($animating.length > ( Math.floor(totalAnimationTime/delay)) ) ? (totalAnimationTime / $animating.length) : delay;

	// add a time incrimented transition-delay property to each $animating element
	$animating.each(function(i){
		el = $(this);
		// store the element's inline css if it has any
		currentStyles = el.attr('style') ? el.attr('style') : ''; 
		// add the transition-delay propery to the element's currentStyles and reset the 
		// NOTE - 	Math.round must be used or js will add a .00000000001 to the number - js vars don't have an interger setting.
		// NOTE - 	transition-delay must be added through string interpolation 
		//			el.css({'transition-delay': 'x' }) will add the delay as part of an otherwise null transition property
		//			result: style="transition:0 0 0 'x';"
		//			this inline style will cascade over the intended class's transition property
		//			I can't figure out how to make jQuery not do this... or maybe it's Chrome... I dunno
		el.attr(
			'style', currentStyles + 'transition-delay: '+ Math.round((i * timeSeperation) + delay) + 'ms;'
		);
	});

	// add the .in-Viewport class to all visible $animated elements and all $animated elements above the viewport
	$animated
		.filter(':inViewport, :aboveTheTop')
		.removeClass('below-the-fold')
		.addClass('in-viewport')
	;

	// after the delay, totalAnimationTime, and a 10ms buffer have elapsed, remove the inline transition delay
	setTimeout(function(){
		$animating.css({'transition-delay':''});
	}, delay + totalAnimationTime + 10);
}

// animate out function - plays after an internal link is clicked
function animateOut($href) {
	// matches the href of the clicked element to the href of the window

	// if nav link is clicked, close the the nav menu
	if ($('#menu-toggle').hasClass('menu-is-active')) {
		// remove toggle active class
		menuIsActive(); // located in jquery.menuToggle.js
	}

	// the interval of time between each $currentlyViewing element's transition-delay
	var transDelay = 20; 
	// create a subset of the $animated elements that are currently in the viewport
	var $currentlyViewing = $animated.filter(':inViewport');

	// NOTE - explination for this block is the same as the $animating.each in the animateInViewport() function
	$currentlyViewing.each(function(i){
		$(this).css({'transition-delay':''}); 
		currentStyles = $(this).attr('style') ? $(this).attr('style') : ''; 
		$(this).attr(
			'style', currentStyles + 'transition-delay: '+ (i * transDelay) + 'ms;' 
		);
	});

	// add the .above-the-top class to the elements in the viewport
	$currentlyViewing
		.removeClass('in-viewport')
		.addClass('above-the-top')
	;
	// if this is the home page, animate the home page elements
	if ( $('#home-header').length ) {
		$('#total-animation').addClass('above-the-top');
		$('#home-bg').addClass('fade');
		$('#home-nav').removeClass('above-the-top').addClass('fade');
	}
	// reset #wrapper-loading to original state
	$('#wrapper-loading').css({	
		'z-index':'', 
		'display':''
	});	

	// after all $currentlyViewing elements are gone, fade in #wrapper-loading
	var wrapperTiming = 500;
	setTimeout(function(){
		$('#wrapper-loading').css({	
			'opacity':'1',
			'transition':'all ' + wrapperTiming + 'ms ease'
		});
	}, ( ($currentlyViewing.length + 1) * transDelay ));	

	// if an $href is defined, forward the browser to it after the animation completes
	if ($href) {
		setTimeout(function(){
			// animateReset(); // better to do it on the "pageshow" event
			window.location = $href;
		}, (($currentlyViewing.length + 1) * transDelay )+ wrapperTiming);	
	}
}

// diverts clicks of internal links to the animateOut() function - not external links
function clickDiversion() {

	// if the clicked link is not a link to the current page,
	$('a').not('.current a, .current-menu-item a').click( function(e) {
		// and if the uri is within the same domain but not a hash link
		if( location.hostname == this.hostname && $(this).is('a:not([href^="#"])') ) {
			// save the link's href attribute and animateOut() the page
			e.preventDefault();
			$href = $(this).attr('href');
			animateOut($href);
		}
	});
	// on #search-form submission, add the search term to the domain name and animateOut() the page
	$('#search-form').submit( function(e){
			e.preventDefault();
			$href = $(this).attr('action') +'?'+ $(this).serialize();
			animateOut($href);
	});

}