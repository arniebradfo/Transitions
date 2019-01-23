// jquery.isFirefox.js

function fireFoxLimits(){
	// Firefox 1.0+ Detection - Sorry if sniffing isn't sexy
	var isFirefox = typeof InstallTrigger !== 'undefined';   
	// FireFox can't handle animationing such a large area?
	// if FireFox, delete the large elements and skip the centering
	if ( isFirefox && $('.image-overlay').length ){
		$('.image-overlay').css({
			'display' : 'none'
		}); 
	}
}
