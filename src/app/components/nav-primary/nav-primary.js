/** nav-primary.js */

// anonymous wrapper
(function(){

	// attach to html on load
	var navButton = document.querySelector('.jsTarget-navButton');
	var navOverlay = document.querySelector('.jsTarget-navOverlay');
	var navOpenClass = 'jsState-navOpen';
	var navClosedClass = 'jsState-navClosed';
	var navOpen = false;
	
	// listen for click/hover on button
	function attachNavEvents() {
		navButton.addEventListener('click', toggleNav, false);
		navOverlay.addEventListener('click', closeNav, false);
	}
	
	function toggleNav(event) {
		if (navOpen)
			closeNav();
		else 
			openNav();
	}
	
	function openNav(event) {
		navOpen = true;
		document.body.classList.add(navOpenClass);
		document.body.classList.remove(navClosedClass);
	}
	
	function closeNav(event) {
		navOpen = false;	
		document.body.classList.remove(navOpenClass);
		document.body.classList.add(navClosedClass);
	}
	
	attachNavEvents();
	openNav();

})();
	