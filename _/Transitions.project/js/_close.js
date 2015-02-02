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