$(document).ready(function () {

	// topSale owl carousel
	var owltop = $('#topSale .owl-carousel');
	owltop.owlCarousel(
		{
			loop: true,
			margin: 20,
			nav: false,
			dots: false,
			responsive:
			{
				0: { items: 1 },
				575: { items: 2 },
				768: { items: 3 },
				991: { items: 4 },
				1199: { items: 5 }
			}
		});

	if ($('.topSale_prev').length) {
		var prevtop = $('.topSale_prev');
		prevtop.on('click', function () {
			owltop.trigger('prev.owl.carousel');
		});
	}

	if ($('.topSale_next').length) {
		var nextop = $('.topSale_next');
		nextop.on('click', function () {
			owltop.trigger('next.owl.carousel');
		});
	}


	// banner owl carousel
	$("#banner-area .owl-carousel").owlCarousel({
		loop: true,
		dots: true,
		autoplay: false,
		autoplayTimeout: 5000,
		items: 1
	});

	// top sale owl carousel
	$("#top-sale .owl-carousel").owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1000: {
				items: 5
			}
		}

	});

	// isotope filter
	var $grid = $(".grid").isotope({
		itemSelector: '.grid-item',
		layoutMode: 'fitRows',


	});

	// filter items on button click
	$(".button-group").on("click", "button", function () {
		var filterValue = $(this).attr('data-filter');
		$grid.isotope({ filter: filterValue });
	})


	// newPhones owl carousel
	var owlnew = $('#newPhones .owl-carousel');
	owlnew.owlCarousel(
		{
			loop: true,
			margin: 20,
			nav: false,
			dots: false,
			responsive:
			{
				0: { items: 1 },
				575: { items: 2 },
				768: { items: 3 },
				991: { items: 4 },
				1199: { items: 5 }
			}
		});

	if ($('.newPhones_prev').length) {
		var prevnew = $('.newPhones_prev');
		prevnew.on('click', function () {
			owlnew.trigger('prev.owl.carousel');
		});
	}

	if ($('.newPhones_next').length) {
		var nextnew = $('.newPhones_next');
		nextnew.on('click', function () {
			owlnew.trigger('next.owl.carousel');
		});
	}


	// blogs owl carousel
	$("#blogs .owl-carousel").owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			}
		}
	})


});