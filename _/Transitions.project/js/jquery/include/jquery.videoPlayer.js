// jquery.videoPlayer.js

function videoPlayer(){

	var $videoBox = $('#header-video'),
		$video    = $('#header-video video');
	var video     = $video.get(0);

	$('#video-play').on("click", function(){
		$videoBox.addClass('opened');
		// video animate in
		video.play();
	});

	$video.on("click", function(){
		if (video.paused){
			video.play();
		} else {
			video.pause();
		}
	})

	$('#video-close').on("click", function(){
		$videoBox.removeClass('opened');
		// video animate out
		// video display none
		video.pause();
	});
}