(function( $ ) {
	'use strict';

	(function( $ ) {
		'use strict';
	
		$(function() {
	
			$('#travel-booking-form button:not(.search)').on('click', function(e){
				e.preventDefault();
				//$('.menus > *').hide();
			});

			$('#destinations').on('click', function(e){
				e.preventDefault();
				$('#opt-destinations').toggle();
			});

			$('[destination-id]').on('click', function(e){
				e.preventDefault();
				$('#opt-destinations').toggle();
			});

			$('#travel-booking-form button#departure-location').on('click', function(e){
				e.preventDefault();
				let left_dl = $(this).position().left - $('#destinations').position().left;
				$('#opt-departure-location').css({left:left_dl+"px"});
				$('#opt-departure-location').toggle();
			});

			$('[departure-location-id]').on('click', function(e){
				e.preventDefault();
				$('#opt-departure-location').toggle();
			});

			$('#nights-at-destination').on('click', function(e){
				e.preventDefault();
				let left_dl = $(this).position().left - $('#destinations').position().left;
				$('#opt-nights-at-destination').css({left:left_dl+"px"});
				$('#opt-nights-at-destination').toggle();
			});

			$('#nights-at-destination-confirm').on('click', function(e){
				e.preventDefault();
				$('#opt-nights-at-destination').toggle();
			});

			var calendarEl = document.getElementById('opt-departure-date');

			var calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth'
			});

			calendar.render();

			$('#opt-departure-date').hide();

			$('#departure-date').on('click', function(e){
				e.preventDefault();
				let left_dl = $(this).position().left - $('#destinations').position().left - 256;
				$('#opt-departure-date').css({left:left_dl+"px"});
				$('#opt-departure-date').toggle();
			});

			$('[departure-date-id]').on('click', function(e){
				e.preventDefault();
				$('#opt-departure-date').toggle();
			});
	
		});
	
	})( jQuery );

})( jQuery );
