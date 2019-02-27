// anonymous wrapper
(function(){

	// adds parallax to headings

	// retrieve elements
	var imgParallaxTop = document.querySelector('.jsTarget-parallax--top')
	var imgParallaxBottom = document.querySelector('.jsTarget-parallax--bottom')
	var scrollTarget = window;
	var scrollingElement = document.documentElement;

	var parallaxInc = 0;
	var scrollInc = 0;

	function updateParallax() {
		console.log(parallaxInc++);
		
		var denominator = 2; // how much parallax?
		
		if (TRANSITIONS.state.isInputTouch){
			imgParallaxTop.style = '';
			return;
		}

		if (imgParallaxTop) {
			var parallaxDistanceTop = Math.round(scrollingElement.scrollTop / denominator);
			imgParallaxTop.style = 'transform: translate3D(0, '+ parallaxDistanceTop +'px, 0)';
		}

		if (imgParallaxBottom) {
			var scrollBottom = scrollingElement.scrollHeight - scrollingElement.scrollTop - window.innerHeight;
			var parallaxDistanceBottom = Math.round(scrollBottom / denominator);
			imgParallaxBottom.style = 'transform: translate3D(0, -'+ parallaxDistanceBottom +'px, 0)';
		}
	}

	function onScroll(event) {	
		scrollingElement = event.target.scrollingElement;
		console.log(scrollInc++);
		window.requestAnimationFrame(updateParallax)
	}

	if (imgParallaxTop || imgParallaxBottom)
		scrollTarget.addEventListener('scroll', onScroll);

}());
