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
