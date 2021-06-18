<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Register menus
 */

// This theme uses wp_nav_menu() in following locations:
register_nav_menus( array(
	'primary' => esc_html__( 'Top primary menu', 'digiboost' ),
	'topline' => esc_html__( 'Topline secondary menu', 'digiboost' ),
	'services' => esc_html__( 'Services menu', 'digiboost' ),
) );