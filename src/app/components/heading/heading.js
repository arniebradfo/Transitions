// anonymous wrapper
(function(){

	// adds parallax to headings

	var imgParallaxTop = document.querySelector('.jsTarget-parallax--top')
	var imgParallaxBottom = document.querySelector('.jsTarget-parallax--bottom')
	var scrollingElement = window;
	// console.log(imgParallaxTop, imgParallaxBottom);

	function throttleAnimationFrame(callback) { // from HESH
		var wait = false;
		return function () {
			var context = this, args = arguments;
			if (!wait) {
				callback.apply(context, args);
				wait = true;
				window.requestAnimationFrame(function () {
					wait = false;
				});
			}
		};
	}

	function onScroll(event) {	

		var denominator = 2; // how much parallax?
		var scrollingElement = event.target.scrollingElement;
		
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
	var throttledOnScroll = throttleAnimationFrame(onScroll);

	if (imgParallaxTop || imgParallaxBottom)
		scrollingElement.addEventListener('scroll', throttledOnScroll);

}());
