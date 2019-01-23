// jquery.perfectCenter.js
// .height & .width classes are in js-perfect-center.scss

function perfectCenterImage( parent, child ){
	parent = typeof parent !== 'undefined' ?  parent : '.perfect-contain';
	child  = typeof child  !== 'undefined' ?  child  : 'img';

	$(parent).each(function(i){	 

		//define containerRatio as containerHeight/containerWidth
		var containerRatio = $(this).outerWidth() / $(this).outerHeight() ;
		//define imageRatio as imageHeight/imageWidth
		var imgRatio = $(this).find(child).outerWidth() / $(this).find(child).outerHeight() ;

		// compare the containerRatio to the imageRatio, and set the approprite class 
		if (imgRatio >= containerRatio && !($(this).find(child).hasClass('height'))){
			$(this).find(child).removeClass('width').addClass('height');
		} else if (imgRatio < containerRatio && !($(this).find(child).hasClass('width'))) {
			$(this).find(child).removeClass('height').addClass('width');
		} 

	});
}