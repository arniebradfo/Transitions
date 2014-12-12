// jquery.perfectCenterRings.js

// centers the divs that contains the svg outer rings of the home page animation
// the top right corner of the divs sync with the center of the svg rings
function perfectCenterRings() {

	// Firefox 1.0+ Detection - Sorry if sniffing isn't sexy
	var isFirefox = typeof InstallTrigger !== 'undefined';   
	// FireFox can't handle animationing such a large area?
	// if FireFox, delete the large elements and skip the centering
	if ( isFirefox && $('.ring').length ){
		$('.ring').css({
			'display' : 'none'
		});

	// else, if this is the home page (if rings exist)
	} else if ($('.ring').length) {

		// set the dimensions to work with 
		var polarisCenterX	= 467,		// the horizontal center of the "O" in pOlaris
			polarisCenterY	= 353,		// the vertical center of the "O" in pOlaris
			polarisWidth	= 1200,		// width of the polaris svg
			polarisHeight	= 800,		// height of the polaris svg
			windowHeight 	= $(window).height(),
			windowWidth 	= $(window).width();

		// set the windowRatio & the polarisRatio
		var windowRatio 		= windowWidth / windowHeight,
			polarisRatio 		= polarisWidth / polarisHeight, // should be 3/2
			polarisRaioInvert 	= polarisHeight / polarisWidth; 
		
		if ( windowRatio > polarisRatio ){ // window is wide
			$('.ring').css({
				'left'	: ((windowWidth-(windowHeight*(polarisRatio)))/2) + ((polarisCenterX/polarisWidth)*(windowHeight*(polarisRatio))) +'px',
				'top'	: ((100 * polarisCenterY) / polarisHeight) +'%'
			});
		}
		if ( windowRatio <= polarisRatio ){ // window is squareish/tall
			$('.ring').css({
				'left'	: ((100 * polarisCenterX) / polarisWidth) +'%',
				'top'	: ((windowHeight-(windowWidth*(polarisRaioInvert)))/2) + ((polarisCenterY/polarisHeight)*(windowWidth*(polarisRaioInvert))) +'px'
			});
		}
		// all the math for the above 2 if blocks is written in my design notebook #5 dated: 9/27/2014 POLARIS RINGS GEOMETRY
	}
}