/** nav-primary.js */

// anonymous wrapper
(function(){

	// attach to html on load
	var navButton = document.querySelector('.jsTarget-navButton');
	var navOverlay = document.querySelector('.jsTarget-navOverlay');
	var navOpenClass = 'jsState-navOpen';
	var navClosedClass = 'jsState-navClosed';
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

		setBuffer();
	}
	
	function closeNav(event) {
		if (bufferActive) return;

		TRANSITIONS.state.isNavOpen = false;
		document.body.classList.remove(navOpenClass);
		document.body.classList.add(navClosedClass);

		navOverlay.removeEventListener('mouseenter', closeNav, false);
		navButton.addEventListener('mouseenter', openNav, false);
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
	