jQuery(function($) {
	$(document).ready(function()  {

		$(window).scroll(function(event){                          
			if ($(this).scrollTop() > 5) {
				
					$('body').addClass('scrolled');
			} else {
					$('body').removeClass('scrolled');
			}

			var scrollingColumnsBottom = $('.scrolling-columns').offset().top + $('.scrolling-columns').height();
			console.log(scrollingColumnsBottom);

			var windowBottomScrollPos = $(this).scrollTop() + $(this).height();
			console.log(windowBottomScrollPos);

			if (windowBottomScrollPos >= scrollingColumnsBottom) {
				$('.scrolling-columns').addClass('unlocked');
				event.preventDefault();
			} else {
				$('.scrolling-columns').removeClass('unlocked');
			}

		});

		$('.editorials .load-more').on('click touch', function(event) {
			event.preventDefault();
			$($('.editorials .editorial-group:not(:visible)').get()[0]).css('display','block');

			if ($('.editorials .editorial-group:not(:visible)').length < 1) {
				$(this).css('display', 'none');
			}
		
		
		});

		var slider = $('.magazine-preview');
		slider.slick({
			slidesToShow: 2,
			slidesToScroll: 1,
			arrows: false,
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
