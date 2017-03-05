/**
 * Carrie Forde 3 JS
 */

( function( $ ) {

	var toggleNavSearch = function() {
		$( '.navigation-search' ).slideToggle( 'slow' );
	};

	var initStickyNav = function() {

		var windowWidth    = $( window ).width(),
			tabletPortrait = 600,
			$header        = $( '.site-header' );

		// Fire sticky navigation on tablet portrait+.
		if ( tabletPortrait <= windowWidth ) {

			$header.sticky({
				zIndex: 3
			});
		}

		// If the window is resized, or small to start, unstick the header.
		if ( tabletPortrait > windowWidth ) {

			$header.unstick();
		}
	};

	$( '.site-search' ).on( 'click', toggleNavSearch );
	$( window ).on( 'load', initStickyNav );
	$( window ).on( 'resize', initStickyNav );

} )( jQuery );
