(function ($) {
	"use strict";
$(document).ready(function(){
	if ($(window).width() >= 768) {
		$('.main-container').css('margin-bottom', $('footer')[0].offsetHeight + 'px');
	}

	$("#testimonial-slider").owlCarousel({
				items:1,
				itemsDesktop:[1000,1],
				itemsDesktopSmall:[979,1],
				itemsTablet:[768,1],
				pagination: true,
				autoPlay:false
			});
		});

})( jQuery );
