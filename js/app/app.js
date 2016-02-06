$(document).ready(function() {

	var $windowHeight = $(window).height();

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


	$('.make-donation input[type=number]').on('change', function() {

		var possiblePercentageProgress = $(this).val() / 10;
		$('.make-donation h2 span').text(possiblePercentageProgress);
		var potentialForward = parseFloat($amountPercentage) + parseFloat(possiblePercentageProgress);
		$('.level-possible').css('width', potentialForward + '%');
		$('.level-possible').addClass('active');
		$('.level-possible').attr('data-content', parseInt(potentialForward));
		$('.level-real').addClass('active')
	});

	$('a.contribute-button').on('click', function() {

		$('.numbers').addClass('active');
		$('.contribute-button-parent').addClass('active');

		$('.make-donation').fadeIn(1000);
	})


});