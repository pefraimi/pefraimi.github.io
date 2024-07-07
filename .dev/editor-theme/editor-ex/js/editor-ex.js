jQuery(document).ready(function( $ ) {

		function openNavigation() {
			$('.main-navigation, .social-links').attr('style','display:block !important');
		}

		function closeNavigation() {
			$('.main-navigation, .social-links').attr('style','display:none !important');
		}

		function toggleNavigation() {
			if ( $( '.main-navigation, .social-links' ).is(":visible") ) {
				closeNavigation();
			} else {
				openNavigation();
			}
		}

		// If window size is okay, allow click event
		// and hide main navigation.
		if ( $( window ).width() < 841 ) {
			//$( '.main-navigation, .social-links' ).hide();
			closeNavigation();
		} else {
			// If window size is not okay, disallow click
			// event and display main navigation.
			//$( '.main-navigation, .social-links' ).show();
			openNavigation();
		}

		// Navigation tabs
		$( 'ul.toggle-bar a' ).click( function() {
			var tab_id = $( this ).attr( 'data-tab' );

			$( 'ul.toggle-bar li a' ).removeClass( 'current' );
			$( '.tab-content' ).removeClass( 'current' );

			$( this ).addClass( 'current' );
			$( "#"+tab_id ).addClass( 'current' );

			// Handle ARIA attributes
			$( 'a[role="tab"]:not(current_tab)' ).attr( 'aria-selected', 'false' );
			$( this ).attr( 'aria-selected', 'true' );
			$( 'div[role="tabpanel"]:not( .current )' ).attr( 'aria-hidden', 'true' );
			$( 'div.current[role="tabpanel"]' ).attr( 'aria-hidden', 'false' );
			return false;
		} );

		// Slide nav up when clicking other tabs
		// as long as click event allowed
		$( 'ul.toggle-bar a:not(.nav-toggle)' ).click( function() {
			//$( '.main-navigation, .social-links' ).hide();
			closeNavigation();
			return false;
		} );

		// Toggle the navigation menu on mobile
		// as long as click event allowed
		$( '.current .nav-toggle' ).click( function() {
			//$( '.main-navigation, .social-links' ).fadeToggle( 150 );
			toggleNavigation();
			return false;
		} );

		// Close the sidebar folder icon
		$( '.toggle-bar a' ).click( function() {
			$( '.fa-folder-open' ).hide();
			$( '.fa-folder' ).show();
			return false;
		} );

		// Open the sidebar folder icon
		$( '.folder-toggle' ).click( function() {
			$( '.fa-folder,.fa-folder-open' ).toggle();
			$( '#secondary' ).resize();
			return false;
		} );

		// Fitvid
		function fitvids() {
			$( "article iframe" ).not( ".fitvid iframe" ).wrap( "<div class='fitvid'/>" );
			$( ".fitvid" ).fitVids();
		}
		fitvids();

		// Hide the sidebar on full screen video
		$( document ).on( "webkitfullscreenchange mozfullscreenchange fullscreenchange", function () {
		    $( ".site-header" ).toggleClass( 'fullscreen' );
		});

});
