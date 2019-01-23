// anonymous wrapper
(function(){

	// adds parallax to headings

	var imgParallaxTop = document.querySelector('.jsTarget-parallax--top')
	var imgParallaxBottom = document.querySelector('.jsTarget-parallax--bottom')
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

	var denominator = 2;
	function onScroll(event) {		

		if (imgParallaxTop) {
			var parallaxDistanceTop = Math.round(event.target.scrollTop / denominator);
			imgParallaxTop.style = 'transform: translate3D(0, '+ parallaxDistanceTop +'px, 0)';
		}

		if (imgParallaxBottom) {
			var scrollBottom = event.target.scrollHeight - event.target.scrollTop - window.innerHeight;
			var parallaxDistanceBottom = Math.round(scrollBottom / denominator);
			imgParallaxBottom.style = 'transform: translate3D(0, -'+ parallaxDistanceBottom +'px, 0)';
		}
	}
	var throttledOnScroll = throttleAnimationFrame(onScroll);


	if (imgParallaxTop || imgParallaxBottom)
		document.body.addEventListener('scroll', throttledOnScroll);

}());
