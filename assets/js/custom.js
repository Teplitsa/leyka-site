/**
 * Custom Scripts
 */

( function ( $ ) {
	"use strict";

	if( $('.ll-video-course-list').length ) {
		$('.ll-video-course-list').slick({
			'infinite': false,
			'prevArrow': '<span class="slick-prev"><svg width="17" height="34" viewBox="0 0 17 34" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.2672 33.3335C13.5859 33.3335 12.9092 33.0371 12.4472 32.4631L1.18187 18.4631C0.486532 17.5975 0.495865 16.3608 1.20753 15.5068L12.8742 1.50679C13.6979 0.517458 15.1702 0.384458 16.1619 1.20812C17.1512 2.03179 17.2842 3.50412 16.4582 4.49346L6.01653 17.0258L16.0849 29.5371C16.8922 30.5405 16.7335 32.0105 15.7279 32.8178C15.2985 33.1655 14.7805 33.3335 14.2672 33.3335Z" fill="currentColor"/></svg><span>',
			'nextArrow': '<span class="slick-next"><svg width="17" height="34" viewBox="0 0 17 34" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2.7328 33.3335C3.41414 33.3335 4.0908 33.0371 4.5528 32.4631L15.8181 18.4631C16.5135 17.5975 16.5041 16.3608 15.7925 15.5068L4.1258 1.50679C3.30214 0.517458 1.8298 0.384458 0.838137 1.20812C-0.151196 2.03179 -0.284197 3.50412 0.541803 4.49346L10.9835 17.0258L0.915137 29.5371C0.107803 30.5405 0.26647 32.0105 1.27214 32.8178C1.70147 33.1655 2.21947 33.3335 2.7328 33.3335Z" fill="currentColor"/></svg><span>',
		});
	}

} )( jQuery );