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
	});

    function closeVideo(e) {
		$videoBox.removeClass('opened');
		// video animate out
		// video display none
		video.pause();
    }

	$('#video-close').on("click", closeVideo );
	// video.addEventListener('ended',closeVideo,false);
}

function homeVideoPlayer(){
	if( $('.home-video') ){

		var $video = $('.home-video');
		var video  = $video.get(0);
		var $muteToggle = $('.mute-toggle');
		var $unMuteMeText = $('.please-unmute-me');

		$muteToggle.on("click", function(){
			$unMuteMeText.remove();
			if (video.muted){
				$muteToggle.addClass('unmuted').removeClass('muted');
				video.muted = false;			
			} else {
				$muteToggle.addClass('muted').removeClass('unmuted');
				video.muted = true;			
			}
		});	

	}
}