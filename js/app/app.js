$(document).ready(function() {

	var $windowHeight = $(window).height();
	var $windowWidth = $(window).width();


	// set of the values for the right and left panel

	$('#map').css('height', $windowHeight - 60);
	$('#donation').css('height', $windowHeight - 60);

	// Set of the real level according to php values
	var $amountPercentage = $('.amount-percentage h2 span').text();
	$('.level-real').css('width', $amountPercentage);
	$('.level-real').attr('data-content', $amountPercentage);

	// Set of the real level according to php values
	var $amountPercentage = $('.amount-percentage h2 span').text();
	$('.level-real').css('width', $amountPercentage + '%');
	$('.level-real').attr('data-content', parseInt($amountPercentage));

	// Check the active menu
	if ($('.wrapper').hasClass('index')) {
		$('header ul li:first-child').addClass('active');
	} else if ($('.wrapper').hasClass('paulineETmargaux')) {
		$('header ul li:nth-child(2)').addClass('active');
	} else {
		$('header ul li:nth-child(3)').addClass('active');
	}


	//	Script for the video 

	$('.landing-video video').attr('width', $windowWidth);
	$('.skip-button').on('click', fadeOutTheVideo);

	if (document.getElementById('video-intro') != null) {
		document.getElementById('video-intro').addEventListener('ended', fadeOutTheVideo, false);
	}

	function fadeOutTheVideo() {
		$('.landing-video').fadeOut(750);
		document.getElementById('video-intro').pause();
		$('.wrapper').addClass('visible');
	}

	//help container effect

	$('.help-container').css('width', $windowWidth);
	$('.help-container').css('height', $windowHeight);

	$('#help').css('margin-top', $('#help').height() / -2);
	$('#help').css('margin-left', $('#help').width() / -2);

	$('#help .cross').on('click', toggle);

	$('.help-link').on('click', function(e) {
		e.preventDefault();
		toggle();
	});


	function toggle() {
		$('.help-container').toggleClass('visible');
		$('#help').toggleClass('visible');
	}
	// End function for help tab

	// Even Listener on the input number to increase the level progress bar

	$('.make-donation input[type=number]').on('change', function() {

		var possiblePercentageProgress = $(this).val() / 10;
		$('.make-donation h2 span').text(possiblePercentageProgress + '%');
		var potentialForward = parseFloat($amountPercentage) + parseFloat(possiblePercentageProgress);
		$('.level-possible').css('width', potentialForward + '%');
		$('.level-possible').addClass('active');
		$('.level-possible').attr('data-content', parseInt(potentialForward));
		$('.level-real').addClass('active');
	});

	// Add fadeOut on the contibution button

	$('a.contribute-button').on('click', function() {

		$('.numbers').addClass('active');
		$('.contribute-button-parent').addClass('active');

		$('.make-donation').fadeIn(1000);
	});


	// Ajax form for the donations

	$('#donationForm').submit(function(e) {
		e.preventDefault();
		var somedata = {
			"amount": $('#donationForm input#amount').val()
		};

		// Use Ajax to submit form data
		$.ajax({
			url: 'request.php',
			type: 'POST',
			data: somedata,
			success: function(result) {

				$('.make-donation').fadeOut(300);
				$('.donation-success').fadeIn(500);
				successVideo();

			}
		});
	})

	function successVideo() {

		$('.success-video-container').toggleClass('visible');
		var video = document.getElementById("success-video");
		var strechWidth = $('.level-possible').width();
		console.log(strechWidth);
		$('.level-real').css('width', strechWidth);
		video.play();


		video.addEventListener('ended', function() {

			$('.success-video-container').fadeOut(1000);

		})
	};

	// Timer landing page;

	var launch = new Date(2016, 1, 8, 17, 45);
	var days = $('#days');
	var hours = $('#hours');
	var minutes = $('#minutes');
	var seconds = $('#seconds');

	setDate();

	function setDate() {
		var now = new Date();

		var s = ((launch.getTime() - now.getTime()) / 1000) - now.getTimezoneOffset() * 60;
		if (s < 0) {
			s = 0;
			addDailyClass();
		}
		var d = Math.floor(s / 86400);
		days.html('<strong>' + d + '</strong>: ');
		s -= d * 86400;

		var h = Math.floor(s / 3600);
		hours.html('<strong> ' + h + '</strong>: ');
		s -= h * 3600;

		var m = Math.floor(s / 60);
		minutes.html('<strong> ' + m + '</strong>: ');
		s -= m * 60;

		s = Math.floor(s);
		seconds.html('<strong> ' + s + '</strong>');

		setTimeout(setDate, 1000);
	}

	function addDailyClass() {
		$('.timer-before-donation').remove();
		$('.donation-statistics').fadeIn(1000);
		$('.donation-statistics').css('display', 'flex');
	}


});