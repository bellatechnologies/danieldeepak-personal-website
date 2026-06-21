<?php
/**
 * Twenty Twenty-Five Child theme functions.
 *
 * @package TwentyTwentyFiveChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueue the child theme stylesheet.
 *
 * The parent (Twenty Twenty-Five) is a block theme and loads its own styles
 * via theme.json, so we only need to enqueue the child's style.css.
 */
function twentytwentyfive_child_enqueue_styles() {
	wp_enqueue_style(
		'twentytwentyfive-child-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_styles' );
