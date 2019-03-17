// underscore in _state.js is so it will appear first in the glob
// global for attaching things to.
TRANSITIONS = {state:{}};

// TODO: browser test
// detects if we are using a touch or mouse input

// anonymous wrapper
(function(){

	var _element = document.body;
	var _touchEndTimeStamp;
	var _cssClassInputMouse = 'jsState-inputMouse';
	var _cssClassInputTouch = 'jsState-inputTouch';
	TRANSITIONS.state.isInputTouch = false;

	function constructor() {
		if (window.innerWidth > 666) // hail satan!
			_switchToMouse();
		else
			_switchToTouch();

		// FOR DEBUG //
		// document.addEventListener('touchstart', () => console.log('touchstart'), true);
		// document.addEventListener('mousemove', () => console.log('mousemove'), true);
	}

	function _switchToTouch() {
		document.removeEventListener('touchstart', _switchToTouch, true);
		document.addEventListener('touchend', _recordEventTimeStamp, true);
		document.addEventListener('mousemove', _switchToMouse, true);
		_element.classList.remove(_cssClassInputMouse);
		_element.classList.add(_cssClassInputTouch);
		TRANSITIONS.state.isInputTouch = true;
		// console.log(_cssClassInputTouch);
	}

	function _switchToMouse(event) {
		// 'touchend' and 'mousemove' both fire at the end of a touch press on android
		// event.timeStamp should equal _touchEndTimeStamp exactly, but lets allow a margin of error
		if (event && event.timeStamp - _touchEndTimeStamp < 10)
			return; // filter out the 'mousemove' that occur after presses on a touch device

		document.addEventListener('touchstart', _switchToTouch, true);
		document.removeEventListener('touchend', _recordEventTimeStamp, true);
		document.removeEventListener('mousemove', _switchToMouse, true);
		_element.classList.add(_cssClassInputMouse);
		_element.classList.remove(_cssClassInputTouch);
		TRANSITIONS.state.isInputTouch = false;
		// console.log(_cssClassInputMouse);
	}

	function _recordEventTimeStamp(event) {
		// record the 'touchend' time stamp to compare with 'mousemove' in_switchToMouse
		_touchEndTimeStamp = event.timeStamp
	}

	constructor();

}());
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
		console.log('Unload animation starting');
		
		if (event.target.closest)
			var unloadTargetElement = event.target.closest('.'+eligibleTargetClass);

		if (unloadTargetElement)
			unloadTargetElement.classList.add(unloadTargetClass);
		
		document.body.classList.add(unloadClass);
		document.body.classList.remove(loadedClass, preloadClass);

		var continueUnload = function () {
			console.log('Unload animation end. Proceeding to next page');
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
		}

		document.getElementsByClassName(transitionEndClass)[0].addEventListener('transitionend', continueUnload);
		window.setTimeout(continueUnload, 2000); // incase something went wrong
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

// https://css-tricks.com/the-trick-to-viewport-units-on-mobile/

/*
.my-element {
	height: calc(var(--vh, 1vh) * 100);
	height: calc(@1vh * 100);
}
*/

// anonymous wrapper
(function(){

	var vh = 400 * 0.01; // random guess at a default screen height

	function setVhCssUnit() {
		// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
		vh = window.innerHeight * 0.01;
		// Then we set the value in the --vh custom property to the root of the document
		document.documentElement.style.setProperty('--vh', vh+'px');
	}

	setVhCssUnit();
	// window.addEventListener('resize', setVhCssUnit);

}());

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

/** nav-primary.js */

// anonymous wrapper
(function(){

	// attach to html on load
	var navButton = document.querySelector('.jsTarget-navButton');
	var navOverlay = document.querySelector('.jsTarget-navOverlay');
	var navOpenClass = 'jsState-navOpen';
	var navClosedClass = 'jsState-navClosed';
	var buttonFillClass = 'button--fill-light';
	var bufferActive = false;
	var bufferTime = 500; //ms
	TRANSITIONS.state.isNavOpen = false;

	
	// listen for click/hover on button
	function attachNavEvents() {
		navButton.addEventListener('click', toggleNav, false);
		navOverlay.addEventListener('click', closeNav, false);
	}
	
	function toggleNav(event) {
		if (TRANSITIONS.state.isNavOpen)
			closeNav();
		else 
			openNav();
	}
	
	function openNav(event) {
		// if (bufferActive) return;

		TRANSITIONS.state.isNavOpen = true;
		document.body.classList.add(navOpenClass);
		document.body.classList.remove(navClosedClass);

		navOverlay.addEventListener('mouseenter', closeNav, false);
		navButton.removeEventListener('mouseenter', openNav, false);
		navButton.classList.remove(buttonFillClass)

		setBuffer();
	}
	
	function closeNav(event) {
		if (bufferActive) return;

		// only return clicks
		// if (bufferActive && (!event || event.type !== 'mouseenter') ) return; 
		
		TRANSITIONS.state.isNavOpen = false;
		document.body.classList.remove(navOpenClass);
		document.body.classList.add(navClosedClass);

		navOverlay.removeEventListener('mouseenter', closeNav, false);
		navButton.addEventListener('mouseenter', openNav, false);
		navButton.classList.add(buttonFillClass)
	}

	function setBuffer(){
		bufferActive = true;
		window.setTimeout( function () {
			bufferActive = false;
		}, bufferTime);
	}


	
	attachNavEvents();
	closeNav();
	// openNav(); // for debug!

})();
	