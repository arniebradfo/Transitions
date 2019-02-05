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
		_switchToMouse(); // or...
		// _switchToTouch(); // if we expect a mobile device more often

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
		// console.log('styleLoaded');
		window.requestAnimationFrame( function () {
			document.body.classList.add('jsState-styleLoaded');
		});
	}

	var unloading = false;
	function onUnload(event) {		
		
		// if its an anchor link press
		if (event.type === 'popstate' && event.state == null) return;

		// TODO: handle ctrl+click request

		if (unloading) return;

		event.preventDefault();
		document.body.classList.remove('jsState-styleLoaded');

		document.getElementsByClassName('jsTarget-transitionEnd')[0]
			.addEventListener('transitionend', function (transitionEvent) {				
				unloading = true;
				switch (event.type) {
					case 'click':
						event.target.click();
						break;
					case 'submit':
						event.target.submit();
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
		// TODO: animate? body{scroll-behavior: smooth;}
		// https://css-tricks.com/snippets/jquery/smooth-scrolling/
	}

	function bindNavigatingElements() {
		for (var i = 0; i < document.links.length; i++) {
			var link = document.links[i];
			if (link.target == '_blank') continue;
			if (link.pathname == window.location.pathname) {
				link.addEventListener('click', anchorNavigation, false);
				continue;
			}				
			link.addEventListener('click', onUnload, false);
		}
		for (var i = 0; i < document.forms.length; i++) {
			var form = document.forms[i];
			form.addEventListener('submit', onUnload, false);
		}
	}


	// START //
	maybeInitialize();
	document.addEventListener('DOMContentLoaded', maybeInitialize);
	window.addEventListener('load', maybeInitialize);
	if (cssMain)
		cssMain.addEventListener('load', maybeInitialize);	

	document.addEventListener('DOMContentLoaded', bindNavigatingElements);

	history.replaceState( { href:window.location.href },'replace');
	history.pushState(    { href:window.location.href },'push');
	window.addEventListener('popstate', onUnload);

	// window.addEventListener('beforeunload', onUnload, false);
	// window.addEventListener('popstate', onUnload);
	// window.addEventListener('hashchange', onUnload);
	// window.addEventListener('unload', onUnload, false);
	
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

/** nav-primary.js */

// anonymous wrapper
(function(){

	// attach to html on load
	var navButton = document.querySelector('.jsTarget-navButton');
	var navOverlay = document.querySelector('.jsTarget-navOverlay');
	var navOpenClass = 'jsState-navOpen';
	var navClosedClass = 'jsState-navClosed';
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
		TRANSITIONS.state.isNavOpen = true;
		document.body.classList.add(navOpenClass);
		document.body.classList.remove(navClosedClass);
		
	}
	
	function closeNav(event) {
		TRANSITIONS.state.isNavOpen = false;	
		document.body.classList.remove(navOpenClass);
		document.body.classList.add(navClosedClass);
	}
	
	attachNavEvents();
	closeNav();
	// openNav(); // for debug!

})();
	