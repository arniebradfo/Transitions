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
