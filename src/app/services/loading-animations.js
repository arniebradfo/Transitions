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
		// console.log(event);
		if (!unloading)
			event.preventDefault();

		document.body.classList.remove('jsState-styleLoaded');

		document.getElementsByClassName('jsTarget-transitionEnd')[0]
			.addEventListener('transitionend', function (transitionEvent) {
				// console.log(transitionEvent);
				
				unloading = true;
				switch (event.type) {
					case 'click':
						event.target.click();
						break;
					case 'submit':
						event.target.submit();
						break;
					default:
						break;
				}

			});
	}

	function bindNavigatingElements() {
		for (var i = 0; i < document.links.length; i++) {
			var link = document.links[i];
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

	// window.addEventListener('beforeunload', onUnload, false);
	// window.addEventListener('popstate', onUnload);
	// window.addEventListener('hashchange', onUnload);
	// window.addEventListener('unload', onUnload, false);
	
}());
