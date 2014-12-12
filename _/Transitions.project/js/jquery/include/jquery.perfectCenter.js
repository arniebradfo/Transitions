// jquery.perfectCenter.js
// .height & .width classes are in js-perfect-center.scss

function perfectCenterImage(){

	$('.perfect-contain').each(function(i){	

		//define containerRatio as containerHeight/containerWidth
		var containerRatio = $(this).outerWidth() / $(this).outerHeight() ;
		//define imageRatio as imageHeight/imageWidth
		var imgRatio = $(this).find('img').outerWidth() / $(this).find('img').outerHeight() ;

		// compare the containerRatio to the imageRatio, and set the approprite class 
		if (imgRatio >= containerRatio && !($(this).find('img').hasClass('height'))){
			$(this).find('img').removeClass('width').addClass('height');
		} else if (imgRatio < containerRatio && !($(this).find('img').hasClass('width'))) {
			$(this).find('img').removeClass('height').addClass('width');
		}

	});
}