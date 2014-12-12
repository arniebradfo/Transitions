function transitions(){
	$(".post-link").click(function(e){
		e.preventDefault();
		var destination = $(this).attr("href");
		var animDuration = 850;
		$(this).addClass("clicked");
		$(".window-wrapper > * > *")
			// .filter(":inViewport")
			.not(".clicked")
			.addClass("transition-fade");
		$(".transition-fade")
			.each(function(i){
				$(this).css({
					"transition-delay":"0.01s",// function that involves randomizing delay.
					"transition-duration":"0.3s",
				});
			});
		setTimeout(function () {
    		window.location = destination;
  		}
  		, animDuration);
		// all elements of the main section
		// that do not have the class "clicked"
		// filter that are on screen 
		// add class "fade-transition"
		// and set random transition delay

	});
}

// $(document).ready(function(){
// 	transitions();
// });

// should maybe use .json file to store common vars in .jq and .scss

// function transitions(){
// 	$(".post-link").click(function(e){
// 		e.preventDefault();
// 		var destination = $(this).attr("href");
// 		var animDuration = 850;
// 		var topDistance  = this.getBoundingClientRect().top;
// 		var bottomDistance = ($(window).height()) - (this.getBoundingClientRect().bottom);
// 		this.canScroll        = false; // what does this do? no documentation!
// 		$(this).removeClass("fade").addClass("abstract-transition")
// 			.css({
// 				"transform": "translate3d(0, "+ (1 * bottomDistance - 20) +"px, 0)",
// 			});
// 		$(".hider", this).addClass("post").removeClass("pre");
// 		$(".hider", this).css({
// 			"top":(-1 * (topDistance+bottomDistance))-5 +"px",
// 			"bottom": "-30px",
// 		});
// 		$(".bg-image", this).addClass("fade");
// 		$(".fade").css({
// 			// "transform": "translate3d(-100%,0,0)",
// 			"opacity":"0",
// 		});
// 		setTimeout(function () {
//     		window.location = destination;
//   			}
//   		, animDuration);
// 	});
// }