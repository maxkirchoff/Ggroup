jQuery(function($) {
	$(document).ready(function()  {

		var slider = $('.magazine-preview');
		slider.slick({
			slidesToShow: 2,
			slidesToScroll: 1,
			infinite: true
		});

		slider.on('wheel', (function(e) {
			e.preventDefault();
		
			if (e.originalEvent.deltaY < 0) {
				$(this).slick('slickNext');
			} else {
				$(this).slick('slickPrev');
			}
		}));
	});
});
