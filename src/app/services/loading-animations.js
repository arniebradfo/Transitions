// TODO: browser test
// adds a class when the main style.css is loaded

// anonymous wrapper
(function(){

	var initialized = false;
	var cssMain = document.head.querySelector('link[href*="/style.css"]');

	var enableBackAnimation = false;

	var preloadClass         = 'jsState-stylePreload';
	var loadedClass          = 'jsState-styleLoaded';
	var unloadClass          = 'jsState-styleUnload';
	var unloadTargetClass    = 'jsState-unloadTargetElement';
	var eligibleTargetClass  = 'jsTarget-eligibleTargetElement'; 
	var transitionEndClass   = 'jsTarget-transitionEnd';
	var loadDelayClass       = 'jsTarget-loadDelay';

	function isCssMainLoaded() {
		var sheets = document.styleSheets;
		for (var i = 0; i < sheets.length; i++) {
			var sheet = sheets[i];
			if (sheet.href.match(/\/style.css/ig))
				return true;
		}
		return false;
	}

	function maybeInitialize() {
		if (isCssMainLoaded() && !initialized)
			initialize();
	}

	function initialize() {
		initialized = true;
		document.body.classList.add(preloadClass);
		// maybe use window.setTimeout() ?
		window.requestAnimationFrame( function () {
			// console.log('styleLoaded');
			document.body.classList.remove(preloadClass, unloadClass);
			document.body.classList.add(loadedClass);
			var loadDelayElements = document.getElementsByClassName(loadDelayClass)
			for (var i = 0; i < loadDelayElements.length; i++) {
				var loadDelayElement = loadDelayElements[i];
				loadDelayElement.classList.add(loadDelayClass+'-'+(i+1));
			}
		});
	}

	var unloading = false;
	function onUnload(event) {		
			
		// if there is a special keypress+click combo
		if( event.altKey || event.ctrlKey || event.shiftKey || event.metaKey ) return;
		
		// if its an anchor link press
		if (event.type === 'popstate' && event.state == null) return;

		if (unloading) return;

		event.preventDefault();
		console.log(event);
		
		if (event.target.closest)
			var unloadTargetElement = event.target.closest('.'+eligibleTargetClass);

		if (unloadTargetElement)
			unloadTargetElement.classList.add(unloadTargetClass);
		
		document.body.classList.add(unloadClass);
		document.body.classList.remove(loadedClass, preloadClass);

		document.getElementsByClassName(transitionEndClass)[0]
			.addEventListener('transitionend', function (transitionEvent) {
				unloading = true;
				switch (event.type) {
					case 'click':
						event.target.click();
						break;
					case 'submit':
						// event.target.submit(); // this will fail if there is a form <element name="submit"/>, which seems likely...
						HTMLFormElement.prototype.submit.call(event.target) // ...so we use this instead? // https://trackjs.com/blog/when-form-submit-is-not-a-function/
						break;
					case 'popstate':
						history.go(-2);
						break;
					default:
						break;
				}

			});
	}

	function anchorNavigation(event) {
		// console.log(event.target);
		// TODO: animate? body{scroll-behavior: smooth;} does this fine
		// https://css-tricks.com/snippets/jquery/smooth-scrolling/
	}

	function bindNavigatingElements() {
		for (var i = 0; i < document.links.length; i++) {
			var link = document.links[i];

			if (link.target == '_blank') continue;

			if (link.pathname == window.location.pathname && link.hash) {
				link.addEventListener('click', anchorNavigation, false);
				continue;
			}

			link.addEventListener('click', onUnload, false);
		}
		for (var i = 0; i < document.forms.length; i++) {
			// TODO: test with comment forms
			var form = document.forms[i];
			form.addEventListener('submit', onUnload, false);
		}
	}

	function bindBackAnimation() {
		// https://stackoverflow.com/a/33004917/5648839
		if (history && history.scrollRestoration)
			history.scrollRestoration = 'manual';

		// replace the state so the back button will animate too
		history.replaceState( { href:window.location.href },'replace');
		history.pushState(    { href:window.location.href },'push');
		window.addEventListener('popstate', onUnload);
	}


	// START //
	maybeInitialize();
	document.addEventListener('DOMContentLoaded', maybeInitialize);
	window.addEventListener('load', maybeInitialize);
	if (cssMain)
		cssMain.addEventListener('load', maybeInitialize);	

	document.addEventListener('DOMContentLoaded', bindNavigatingElements);

	if (enableBackAnimation) 
		bindBackAnimation();
	
}());
