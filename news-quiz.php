<?php
/**
 * Plugin Name: News Quizzes
 * Description: Loads a quiz as specified in google drive.
 * Version: 0.1
 * Author: Will Haynes for INN, MotherJones
 * License: GPLv2
*/

/**
 * Registers a shortcode for quizzes.
 *
 * Checks for an attribute titled `url` for the Google Spreadsheet to pull from.
 * If it exists, then this shortcode uses the quiz library to insert a quiz into
 * the post.
 *
 * @since 0.1
 * @param $atts. array. the attributes passed into the shortcode.
 */
function quiz_shortcode( $atts ){

	/* Setup: Enqueue previously registered scripts. */

	wp_enqueue_style(  'quiz_style' );
	wp_enqueue_script( 'quiz_js' );

	$ret  = "";

	/* $attrs printing
	
	$ret .= "<pre>";
	$ret .= print_r($atts,true);
	$ret .= "</pre>";
 	*/

 	/* Return: A container for the quiz to load in. */

	$key = $atts['key'];
	$align = $atts['align'] ? $atts['align'] : 'alignleft';

	$ret .= "<div ";
		$ret .= "id='quizcontainer' ";
		$ret .= "class='$align quizbox'";
		$ret .= "style='width:300px'";
		$ret .= "data-key='$key' ";
	$ret .= "></div>";
	
	return $ret;

}
add_shortcode( 'quiz', 'quiz_shortcode' );


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
function theme_name_scripts() {

	/* Styles */
	wp_register_style( 'quiz_style', plugins_url( 'css/style.css', __FILE__ ), false, '0.1' );

	/* Scripts */
	wp_register_script( 'tabletop', plugins_url(  'js/tabletop.js', __FILE__ ), array('jquery'), '1.0.0', true );
	wp_register_script( 'quiz_mj_js', plugins_url(  'js/newsquiz.min.js' , __FILE__), array('jquery','tabletop'), '1.0.0', true );
	wp_register_script( 'quiz_js', plugins_url(  'js/wpquiz.js' , __FILE__), array('jquery','quiz_mj_js'), '1.0.0', true );	

}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );