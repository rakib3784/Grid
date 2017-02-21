

$(document).ready(function() {
	"use strict";


	$('.grid-layout article').matchHeight({ 
		property: 'min-height' 
	});


});


jQuery(window).on('scroll', function () {
	'use strict';

	if (jQuery(this).scrollTop() > 100) {
		jQuery('#scroll-to-top').fadeIn('slow');
	} else {
		jQuery('#scroll-to-top').fadeOut('slow');
	}

});


jQuery('#scroll-to-top').on("click", function() {
	'use strict';

	jQuery("html,body").animate({ scrollTop: 0 }, 1500);
	return false;
});

