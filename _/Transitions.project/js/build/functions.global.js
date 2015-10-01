// _open.js - the top of the js sandwich

// Browser detection for when you get desparate. A measure of last resort.
// http://rog.ie/post/9089341529/html5boilerplatejs

// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);

// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }


// remap jQuery to $
(function($){

	//	John Resig (jQuery developer) .reverse() function jQuery plugin.
	//	revereses the indexing of an array.
	//	an create a backwards .each(function(i)) if using the "i" argument.
	jQuery.fn.reverse = function() {
	    return this.pushStack(this.get().reverse(), arguments);
	};
/*
 * Viewport - jQuery selectors for finding elements in viewport
 *
 * Copyright (c) 2008-2009 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *  http://www.appelsiini.net/projects/viewport
 *
 */

//  CHANGES:
//  right and left selectors commented out
//  :selectors renamed in camelCase
//  $.abovethetop settings.threshold changed from subtraction to addition
//  var for syncing threshold added
//  ...

// (function($) {
    
    $.belowthefold = function(element, settings) {
        var fold = $(window).height() + $(window).scrollTop() + settings.threshold;
        return fold <= $(element).offset().top ;
    };

    $.abovethetop = function(element, settings) {
        var top = $(window).scrollTop();
        return top >= $(element).offset().top + $(element).outerHeight();
    };
    
    // $.rightofscreen = function(element, settings) {
    //     var fold = $(window).width() + $(window).scrollLeft();
    //     return fold <= $(element).offset().left - settings.threshold;
    // };
    
    // $.leftofscreen = function(element, settings) {
    //     var left = $(window).scrollLeft();
    //     return left >= $(element).offset().left + $(element).width() - settings.threshold;
    // };
    
    $.inviewport = function(element, settings) {
        // first line requres left and right - second line only requires top and bottom...
        // return !$.rightofscreen(element, settings) && !$.leftofscreen(element, settings) && !$.belowthefold(element, settings) && !$.abovethetop(element, settings);
        return !$.belowthefold(element, settings) && !$.abovethetop(element, settings);
    };
    
    var thresholdExpand = 50; // must match the .below-the-fold{transformY:...;}  in "js-loading-animation.scss" 

    $.extend($.expr[':'], {
        "belowTheFold": function(a, i, m) {
            return $.belowthefold(a, {threshold : thresholdExpand});
        },
        "aboveTheTop": function(a, i, m) {
            return $.abovethetop(a, {threshold : thresholdExpand});
        },
        // "leftOfScreen": function(a, i, m) {
        //     return $.leftofscreen(a, {threshold : 0});
        // },
        // "rightOfScreen": function(a, i, m) {
        //     return $.rightofscreen(a, {threshold : 0});
        // },
        "inViewport": function(a, i, m) {
            return $.inviewport(a, {threshold : thresholdExpand});
        }
    });
    
// })(jQuery);
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
// jquery.gMap.js
// this comes from the CodyHouse blog - http://codyhouse.co/gem/custom-google-map/
// google maps API js documentation - https://developers.google.com/maps/documentation/javascript/reference#MapTypeStyleFeatureType

function gMap() {

	if ( $('#google-container').length ) {

		//set your google maps parameters
		var latitude = 41.7313039,
			longitude = -111.8189167,
			map_zoom = 12,
			markerLatitude = 41.739,
			markerLongitude = -111.8339;
			
		//define the basic color of your map, plus a value for saturation and brightness
		var	main_color = '#2d313f', // not used
			saturation_value= -20,
			brightness_value= 5; // also not used 

		//we define here the style of the map
		var style= [ 
			{
				//set saturation for the labels on the map
				elementType: "labels",
				stylers: [
					{saturation: saturation_value}
				]
			},  
		    {	
		    	//poi stands for point of interest - don't show these lables on the map 
				featureType: "poi",
				elementType: "labels",
				stylers: [
					{visibility: "off"}
				]
			},
			{
				//don't show road lables on the map
		        featureType: 'road',
		        elementType: 'labels',
		        stylers: [
		            {visibility: "off"}
		        ]
		    }, 
		   	{
				//don't show transit lables on the map
		        featureType: 'transit',
		        elementType: 'labels',
		        stylers: [
		            {visibility: "off"}
		        ]
		    }, 
			{
				//don't show road lables on the map
				featureType: "road",
				elementType: "geometry.stroke",
				stylers: [
					{visibility: "off"}
				]
			},
		];
			
		//set google map options
		var map_options = {
	      	center: new google.maps.LatLng(latitude, longitude),
	      	zoom: map_zoom,
	      	draggable: false,
	      	panControl: false,
	      	zoomControl: false,
	      	mapTypeControl: false,
	      	streetViewControl: false,
	      	mapTypeId: google.maps.MapTypeId.ROADMAP,
	      	// mapTypeId: google.maps.MapTypeId.TERRAIN, // takes too long to load - set map_zoom to 14
	      	// tilt:45, // only works on SATELLITE & HYBRID mapType view
	      	scrollwheel: false,
	      	styles: style,
	    }
	    //inizialize the map
		var map = new google.maps.Map(document.getElementById('google-container'), map_options);
		//add a custom marker to the map				
		var marker = new google.maps.Marker({
		  	position: new google.maps.LatLng(markerLatitude, markerLongitude),
		    map: map,
		    visible: true,
		});

		// create a DOM element with the zoom in and out controls
		var zoomControlDiv = document.createElement('div');
	 	var zoomControl = new CustomZoomControl(zoomControlDiv, map);

	  	//insert the zoom div on the top left of the map
	  	map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);
	}
}

//add custom buttons for the zoom-in/zoom-out on the map
function CustomZoomControl(controlDiv, map) {

	//grap the zoom elements from the DOM and insert them in the map 
  	var controlUIzoomIn= document.getElementById('cd-zoom-in'),
  		controlUIzoomOut= document.getElementById('cd-zoom-out');
  	controlDiv.appendChild(controlUIzoomIn);
  	controlDiv.appendChild(controlUIzoomOut);
  	controlDiv.style.right='0px';

	// Setup the click event listeners and zoom-in or out according to the clicked element
	google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
	    map.setZoom(map.getZoom()+1)
	});
	google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
	    map.setZoom(map.getZoom()-1)
	});
}
// jquery.isFirefox.js

function fireFoxLimits(){
	// Firefox 1.0+ Detection - Sorry if sniffing isn't sexy
	var isFirefox = typeof InstallTrigger !== 'undefined';   
	// FireFox can't handle animationing such a large area?
	// if FireFox, delete the large elements and skip the centering
	if ( isFirefox && $('.image-overlay').length ){
		$('.image-overlay').css({
			'display' : 'none'
		}); 
	}
}

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
// jquery.menuToggle.js

// bind the approprite user inputs to toggle the menu's active state
function menuToggle(){
	$("#menu-toggle").click(function(){
		menuIsActive();
	});
	$("#blanket").click(function(){
		menuIsActive();
	});
	// force links to the current page to close the menu instead of reloading the page
	// NOTE - could have matched the window.location to the a.attr(href) to identify a page reload
	$("#header .current-menu-item a").click(function(e){
		e.preventDefault();
		menuIsActive();
	});
} 

// add or remove the .menu-is-active class from the elements that use it
function menuIsActive(){
	$("#header, #wrapper, #blanket, #menu-toggle").toggleClass("menu-is-active");
}

// opens the info panel to a post-link when the .info-toggle button is clicked
// .info-toggle button only appear in touch designed states
function infoToggle(){
	$(".info-toggle").click(function(){
		// close any other open info panels
		$(this).parent().siblings().filter(".info-is-active").removeClass("info-is-active");
		// open the clicked info panel
		$(this).parent().toggleClass("info-is-active");
	}); 
}
// jquery.perfectCenter.js
// .height & .width classes are in js-perfect-center.scss

function perfectCenterImage(){

	$('.perfect-contain').each(function(i){	

		//define containerRatio as containerHeight/containerWidth
		var containerRatio = $(this).outerWidth() / $(this).outerHeight() ;
		//define imageRatio as imageHeight/imageWidth
		var imgRatio = $(this).find('img').outerWidth() / $(this).find('img').outerHeight() ;

		// compare the containerRatio to the imageRatio, and set the approprite class 
		if (imgRatio >= containerRatio && !($(this).find('img').hasClass('height'))){
			$(this).find('img').removeClass('width').addClass('height');
		} else if (imgRatio < containerRatio && !($(this).find('img').hasClass('width'))) {
			$(this).find('img').removeClass('height').addClass('width');
		}

	});
}
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
// jquery.resizeDelay.js

// set a global resizeTimer
resizeTimer = 0; 
// call "funks" a "timing" number of ms after an event hasn't occured
function theDelay(funks, timing){
	clearTimeout(resizeTimer);
	resizeTimer = setTimeout( funks, timing );
}
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
// _close.js - the bottom of the js sandwich

	// calls all of the resize functions in the "correct" order
	function resizeOrder(){
		setWindowHeight();
		perfectCenterImage();
		perfectCenterRings();
	}

	$(document).ready(function(){
		// alert("doc is ready!");
		gMap();
		readyLoadingAmimation();
		resizeOrder();
		menuToggle();
		infoToggle();
		scrollDown();
		scrollToTop();
		currentLinks();
		fireFoxLimits();
	});

	var theTiming = 1000; // WHY 1000?
	$(window).load(function() {
		// alert("window has loaded!");
		perfectCenterImage();
		loadLoadingAmimation(theTiming);
		clickDiversion();	
	});

	//back-forward-cache compensation - chrome should skip it
	$(window).bind("pageshow", function(event) {
		// alert('the page is shown')
	    if (event.originalEvent.persisted) {
	        //alert('the page has been revisited / shown again');
	        animateReset();
	        addBelowFold();
	        loadLoadingAmimation(theTiming);
	    }
	});

	$(window).resize(function() {
		// alert("window has resized!");
		theDelay(function(){
			resizeOrder();
		}, 500);
	});

	$(window).on("scroll",function(){
		// alert("you are scrolling!");
		addDuringScroll();
	} );

// close the remapping to jQuery
})(window.jQuery);