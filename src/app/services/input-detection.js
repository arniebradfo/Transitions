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