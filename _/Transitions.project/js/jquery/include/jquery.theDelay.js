// jquery.resizeDelay.js

// set a global resizeTimer
resizeTimer = 0; 
// call "funks" a "timing" number of ms after an event hasn't occured
function theDelay(funks, timing){
	clearTimeout(resizeTimer);
	resizeTimer = setTimeout( funks, timing );
}