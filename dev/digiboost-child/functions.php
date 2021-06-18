<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'digiboost_child_cfg_parent_css' ) ):
    function digiboost_child_cfg_parent_css() {
        wp_deregister_style( 'digiboost-woo' );
        wp_enqueue_style( 'digiboost-child-woo', get_theme_file_uri( '/css/shop.css' ), array(), DIGIBOOST_THEME_VERSION );

        wp_deregister_style( 'digiboost-main' );
        wp_enqueue_style( 'digiboost-child-main', get_theme_file_uri( '/css/main.css' ), array(), DIGIBOOST_THEME_VERSION );
    }
endif;
add_action( 'wp_enqueue_scripts', 'digiboost_child_cfg_parent_css', 20 );

// END ENQUEUE PARENT ACTION
