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
			$mainNav       = $( '.main-navigation' );

		// Fire sticky navigation on tablet portrait+.
		if ( tabletPortrait <= windowWidth ) {

			$mainNav.sticky();
		}

		if ( tabletPortrait > windowWidth ) {

			$mainNav.unstick();
		}
	};

	$( '.site-search' ).on( 'click', toggleNavSearch );
	$( window ).on( 'load', initStickyNav );
	$( window ).on( 'resize', initStickyNav );

} )( jQuery );
