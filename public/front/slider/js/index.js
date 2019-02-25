//Playing with Ken Wheeler Slick carousel
$('.slider').slick({
	//dots: true,
	infinite: true,
	centerMode: true,
	centerPadding: '12%',
	slidesToShow: 3,
	speed: 500,
responsive: [{

      breakpoint: 992,
      settings: {
        slidesToShow: 1
      }

    }]
});


/* $(".slick-center").addClass(
		"switch");
$(".slick-current").prev().addClass(
		"switch");
$('.slider').on('init', function(currentSlide) {
	console.log(currentSlide);
	$(".slick-center").prev().toggleClass("switch"); 
}); */