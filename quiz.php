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

	$ret  = "";

	/* $attrs printing */
	
	$ret .= "<pre>";
	$ret .= print_r($atts,true);
	$ret .= "</pre>";

	$key = $atts['key'];
	$align = $atts['align'] ? $atts['align'] : 'alignleft';

	echo $align;

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
 * Enqueue scripts and styles.
 *
 * TODO:
 * Check to ensure there is a shortcode in the post before
 * loading all of this javascript onto the page.
 *
 * @since 0.1
 */
function theme_name_scripts() {


	/* Styles */
	wp_register_style( 'quiz_bootstrap', plugins_url( 'newsquiz/css/bootstrap.min.css', __FILE__ ), false, '1.0.0' );
	wp_register_style( 'quiz_bootstrap_responsive', plugins_url( 'newsquiz/css/bootstrap-responsive.css', __FILE__ ), false, '1.0.0' );
	wp_register_style( 'quiz_style', plugins_url( 'newsquiz/css/style.css', __FILE__ ), false, '1.0.0' );

	wp_enqueue_style(  'quiz_bootstrap' );
	wp_enqueue_style(  'quiz_bootstrap_responsive' );
	wp_enqueue_style(  'quiz_style' );

	/* Scripts */
	wp_register_script( 'tabletop', plugins_url(  'newsquiz/js/tabletop.js', __FILE__ ), array('jquery'), '1.0.0', true );
	wp_register_script( 'quiz_mj_js', plugins_url(  'newsquiz/js/newsquiz.min.js' , __FILE__), array('jquery','tabletop'), '1.0.0', true );
	wp_register_script( 'quiz_js', plugins_url(  'js/wpquiz.js' , __FILE__), array('jquery','quiz_mj_js'), '1.0.0', true );	
	
	wp_enqueue_script( 'tabletop' );
	wp_enqueue_script( 'quiz_js' );

}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );