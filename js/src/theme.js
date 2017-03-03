/**
 * Carrie Forde 3 JS
 */

( function( $ ) {

	var toggleNavSearch = function() {
		$( '.navigation-search' ).slideToggle( 'slow' );
	};

	$( '.site-search' ).on( 'click', toggleNavSearch );
} )( jQuery );
