// TODO: browser test
// adds a class when the main style.css is loaded

// anonymous wrapper
(function(){

	var initialized = false;
	var cssMain = document.head.querySelector('link[href*="/style.css"]');

	function isCssMainLoaded() {
		var sheets = document.styleSheets;
		for (let i = 0; i < sheets.length; i++) {
			const sheet = sheets[i];
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
		console.log('styleLoaded');
		document.body.classList.add('jsState-styleLoaded');
	}

	// START //
	maybeInitialize();
	document.addEventListener('DOMContentLoaded', maybeInitialize);
	window.addEventListener('load', maybeInitialize);
	if (cssMain)
		cssMain.addEventListener('load', maybeInitialize);
	
}());
