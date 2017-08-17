/**
	* CF Card Masonry.
	*/
window.CF_Card_Masonry = {};
( function( window, $, app ) {

	// Constructor.
	app.init = function() {
		app.cache();

		if ( app.meetsRequirements() ) {
			app.bindEvents();
		}
	};

	// Cache elements.
	app.cache = function() {
		app.$c = {
			window: $( window ),
			masonry: $( '.masonry' ),
			postCard: $( '.card' ),
		};
	};

	// Combine all events.
	app.bindEvents = function() {
		app.$c.window.on( 'load', app.doMasonry );
	};

	// Do we meet the requirements?
	app.meetsRequirements = function() {
		return app.$c.masonry.length;
	};

	/**
	 * Do Foo.
	 *
	 * @return
	 * @author Carrie Forde
	 */
	app.doMasonry = function() {

		app.$c.masonry.masonry({
			itemSelector: '.card',
			columnWidth: '.alcatraz-col--4',
			percentPosition: true,
		});
	};

	// Engage!
	$( app.init );

})( window, jQuery, window.CF_Card_Masonry );
