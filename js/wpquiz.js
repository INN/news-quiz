/**
 * Checks for divs with a .quizbox tag and
 * creates a new MotherJones quiz in them.
 */
jQuery( document ).ready(function() {

	jQuery( ".news-quiz-quizbox" ).each( function() {
		jQuery( this ).quiz( jQuery( this ).attr( 'data-key' ) );
	});

});
