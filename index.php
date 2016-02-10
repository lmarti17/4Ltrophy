<?php require 'header.php' ?>

<div class="landing-video">
	<video id="video-intro" src="assets/intro.mp4" autoplay></video>
	<button class="skip-button">Passer l'intro</button>
</div>

<script src="js/dist/vendor.js"></script>
<script>

	var $windowWidth = $(window).width();

	//	Script for the video 

	$('.landing-video video').attr('width', $windowWidth);
	$('.skip-button').on('click', fadeOutTheVideo);

	if (document.getElementById('video-intro') != null) {
		document.getElementById('video-intro').addEventListener('ended', fadeOutTheVideo, false);
	}

	function fadeOutTheVideo() {
		// $('.landing-video').fadeOut(750);
		// document.getElementById('video-intro').pause();
		// $('.wrapper').addClass('visible');
		document.location.href="accueil.php";
	}



	</script>