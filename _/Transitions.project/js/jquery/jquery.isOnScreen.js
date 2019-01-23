// viewportSelectors jQuery plugin - new selectors: 
//	:aboveTheTop
//	:inViewport
//	:belowTheFold

function isOnScreen (selector,refreshTime) {
		$(selector)
			.css({
				"transition":"all 0.3s ease-out",
			});
		setInterval(function(){
			$(selector)
				.filter(":inViewport")
				.filter(".below-the-fold")
				.removeClass("below-the-fold")
				.addClass("in-viewport")
				.each(function(i){
					$(this).css({
					"transition-delay":(i*0.1)+"s",
					});
				});
			$(selector)
				.filter(":inViewport")
				.filter(".above-the-top")
				.removeClass("above-the-top")
				.reverse().each(function(i){
					$(this).css({
					"transition-delay":((i*0.1)/2)+"s",
					});
				});
			$(selector).filter(":belowTheFold").removeClass("in-viewport").addClass("below-the-fold");
			$(selector).filter(":aboveTheTop").removeClass("in-viewport").addClass("above-the-top");
		},refreshTime);
}
function isOnScreenSet(){
	if($("main").has(":inViewport")){
			isOnScreen("main > article > section > *", 250 );
	}
}


// function isOnScreenTiming( selector, frequency) {
// 	setInterval(function(){
// 		isOnScreen(selector);
// 	},frequency);
// }

// $(document).ready(function(){
// 	if($("main").has(":inViewport")){
// 		$(".window-wrapper").on("scroll", function(){
// 			isOnScreen("article > section > *");
// 		});
// 	}
// });





