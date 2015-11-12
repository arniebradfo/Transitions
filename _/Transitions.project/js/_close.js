// _close.js - the bottom of the js sandwich

	// calls all of the resize functions in the "correct" order
	function resizeOrder(){
		setWindowHeight();
		perfectCenterImage();
		perfectCenterImage('#home-video-container','.home-video');
		// perfectCenterRings();
	}

	$(document).ready(function(){
		// alert("doc is ready!");
		// imgRow(".img-row");
		gMap();
		readyLoadingAmimation();
		resizeOrder();
		menuToggle();
		infoToggle();
		scrollDown();
		scrollToTop();
		currentLinks();
		videoPlayer();
		// fireFoxLimits(); // this is done with css now
	});

	var theTiming = 1000; // WHY 1000?
	$(window).load(function() {
		// alert("window has loaded!");
		perfectCenterImage();
		perfectCenterImage('#home-video','video');
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