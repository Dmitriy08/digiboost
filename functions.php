<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

$theme = wp_get_theme( 'digiboost' );
define('DIGIBOOST_THEME_VERSION', $theme['Version']);

//Since WP v4.7 using new functions
//https://developer.wordpress.org/themes/basics/linking-theme-files-directories/#linking-to-theme-directories
define( 'DIGIBOOST_THEME_URI', get_parent_theme_file_uri() );
define( 'DIGIBOOST_THEME_PATH', get_parent_theme_file_path() );

// You may request this 'DIGIBOOST_REMOTE_DEMO_ID' value from this theme author to get a colorized demo content.
// See the Theme support service contacts information.
define( 'DIGIBOOST_REMOTE_DEMO_ID', '23670282' ); // as example: '12345678'
define( 'DIGIBOOST_REMOTE_DEMO_VERSION', '1.0.0' );
define( 'DIGIBOOST_DEV_MODE', is_dir(DIGIBOOST_THEME_PATH . '/dev' ) );

//loading framework only if Unyson plugin is not active
if(!defined('FW') && file_exists(DIGIBOOST_THEME_PATH . '/inc/framework/bootstrap.php') ) {
	include_once DIGIBOOST_THEME_PATH . '/inc/framework/bootstrap.php';
}

/**
 * Theme Includes
 *
 * https://github.com/ThemeFuse/Theme-Includes
 */
require_once DIGIBOOST_THEME_PATH . '/inc/init.php';