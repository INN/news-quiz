<?php
/**
 * Plugin Name: News Quizzes
 * Description: Loads a quiz as specified in google drive.
 * Version: 0.2.1
 * Author: The INN Nerds, Will Haynes for INN, Mother Jones
 * License: GPLv2
*/

/**
 * Registers a shortcode for quizzes.
 *
 * Checks for an attribute titled `key` for the Google Spreadsheet to pull from.
 * If it exists, then this shortcode uses the quiz library to insert a quiz into
 * the post.
 *
 * @since 0.1
 * @param $atts. array. the attributes passed into the shortcode.
 */
function news_quiz_shortcode( $atts ){

	/* 1: Enqueue previously registered scripts (to avoid unnecessary loading). */

	wp_enqueue_style(  'quiz_style' );
	wp_enqueue_script( 'quiz_js' );
	
 	/* 2: Pull out and sanitize attributes */

	$key = $atts['key'];

	$title = $atts['title'];

	$description = $atts['description'];

	$byline = $atts['byline'];

	$source = $atts['source'];

	$answerstyle = $atts['answerstyle'] ? $atts['answerstyle'] : 'bullet';
	if( !in_array( $answerstyle, array('alpha','bullets','roman','numbers') ) ) 
		$answerstyle = 'bullet';

	$layout = $atts['layout'] ? $atts['layout'] : 'fullwidth';
	if( !in_array( $layout, array('fullwidth','sidebar') ) ) 
		$layout = 'fullwidth';

	$align = $atts['align'] ? $atts['align'] : 'alignnone';
	if( $layout == 'fullwidth' || !in_array( $align, array('alignnone','aligncenter','alignright','alignleft') ) )
		$align = 'alignnone';

	/* 3: Return container */
	
	$ret  = "";

	// .news-quiz
	$ret .= "<aside class='news-quiz news-quiz-quiz news-quiz-$align news-quiz-$layout'>";

	// .news-quiz-header
	if($description || $title) {

		$ret .= "<header class='news-quiz-header'>";
	
		if( $title )
			$ret .= "<h3 class='news-quiz-headline'>" . $title . "</h3>";
		if( $description )
			$ret .= "<p class='news-quiz-lede'>" . $description . "</p>";
	
		$ret .= "</header>";

	}

	// .news-quiz-content
	$ret .= "<div ";
		$ret .= "class='news-quiz-quizbox news-quiz-content news-quiz-quizbox-list-$answerstyle' ";
		$ret .= "id='quizcontainer' ";
		$ret .= "data-key='$key' ";
	$ret .= "></div>";

	// .news-quiz-footer
	if( $byline || $source ) {
		
		$ret .= "<div class='news-quiz-footer'>";
	
		if( $byline )
			$ret .= "<span class='news-quiz-byline'>" . $byline . "</span>";
		if( $source ) 
			$ret .= "<span class='news-quiz-source'>Source: " . $source . "</span>";

		$ret .= "</div>";
	}

	$ret .= "</aside>";
	
	return $ret;

}
add_shortcode( 'quiz', 'news_quiz_shortcode' );


/**
 * Enqueue scripts and styles used by the plugin
 *
 * Registers:
 *
 *  - quiz_style (css)	Basic styling for the quiz.
 *  - tabletop (js)		Library to faciliatate google spreadsheets to JSON
 *  - quiz_mj_js (js)	Mother Jones' javascript library.
 *  - quiz_js (js)		Our jquery wrapper for Mother Jones.
 *
 * TODO:
 * Check to ensure there is a shortcode in the post before
 * loading all of this javascript onto the page.
 *
 * @since 0.1
 */
function news_quiz_scripts() {

	/* Styles */
	wp_register_style( 'quiz_style', plugins_url( 'css/style.css', __FILE__ ), false, '0.2' );

	/* Scripts */
	wp_register_script( 'tabletop', plugins_url(  'js/tabletop.js', __FILE__ ), array('jquery'), '1.0.0', true );
	wp_register_script( 'quiz_mj_js', plugins_url(  'js/newsquiz.min.js' , __FILE__), array('jquery','tabletop'), '1.0.0', true );
	wp_register_script( 'quiz_js', plugins_url(  'js/wpquiz.js' , __FILE__), array('jquery','quiz_mj_js'), '1.0.1', true );	

}
add_action( 'wp_enqueue_scripts', 'news_quiz_scripts' );
