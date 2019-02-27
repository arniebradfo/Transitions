// anonymous wrapper
(function(){

	// adds parallax to headings

	var scrollTarget = window;
	var scrollingElement = document.documentElement; 
	var denominator = 2; // how much parallax?

	// retrieve elements
	var imgParallaxTop = document.querySelector('.jsTarget-parallax--top')
	var imgParallaxBottom = document.querySelector('.jsTarget-parallax--bottom')

	function updateParallax() {
		
		if (TRANSITIONS.state.isInputTouch){
			imgParallaxTop.style = '';
			return;
		}

		if (imgParallaxTop && window.innerHeight > scrollingElement.scrollTop) {

			var parallaxDistanceTop = Math.round(scrollingElement.scrollTop / denominator);
			imgParallaxTop.style = 'transform: translate3D(0, '+ parallaxDistanceTop +'px, 0)';
			
		}

		var scrollBottom = scrollingElement.scrollHeight - scrollingElement.scrollTop - window.innerHeight;
		
		if (imgParallaxBottom && window.innerHeight > scrollBottom) {

			var parallaxDistanceBottom = Math.round(scrollBottom / denominator);
			imgParallaxBottom.style = 'transform: translate3D(0, -'+ parallaxDistanceBottom +'px, 0)';

		}
	}

	function onScroll(event) {	
		scrollingElement = event.target.scrollingElement;
		window.requestAnimationFrame(updateParallax)
	}

	if (imgParallaxTop || imgParallaxBottom)
		scrollTarget.addEventListener('scroll', onScroll);

}());
