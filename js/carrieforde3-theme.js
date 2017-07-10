/**
 * Carrie Forde 3 JS
 */

( function( $ ) {

	var toggleNavSearch = function( e ) {

		var $this = $( this );

		e.preventDefault();
		$this.parents( '.main-navigation' ).toggleClass( 'show-search' );
	};

	var mobileSiteMarginBottom = function() {

		var windowWidth      = $( window ).width(),
			tabletPortrait   = 600,
			bodyMarginBottom = parseInt( $( 'body' ).css( 'margin-bottom' ) ),
			mainNavigation   = $( '.main-navigation' ).outerHeight(),
			newMarginBottom  = bodyMarginBottom + mainNavigation + 'px';

		// Return early if we're not on mobile.
		if ( tabletPortrait <= windowWidth ) {
			return;
		}

		$( 'body' ).css( 'margin-bottom', newMarginBottom );
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

	// Fire all the things! 🔥
	$( '.search-toggle' ).on( 'click', toggleNavSearch );
	$( window ).on( 'load', mobileSiteMarginBottom );
	$( window ).on( 'load', initStickyNav );
	$( window ).on( 'resize', initStickyNav );

} )( jQuery );
