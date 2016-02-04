$(document).ready(function() {

	var $windowHeight = $(window).height();

	$('#map').css('height', $windowHeight - 80);
	$('#donation').css('height', $windowHeight - 80);

	var $amountPercentage = $('.amount-percentage h2 span').text();
	$('.level-real').css('width', $amountPercentage);
	$('.level-real').attr('data-content', $amountPercentage);

	$('.make-donation input[type=number]').on('change', function() {

		var possiblePercentageProgress = $(this).val() / 10;
		$('.make-donation h2 span').text(possiblePercentageProgress);
	});

	$('a.contribute-button').on('click', function() {
		$('.donation-statistics').fadeOut(300);
		$('.make-donation').fadeIn(1000);
	})


});