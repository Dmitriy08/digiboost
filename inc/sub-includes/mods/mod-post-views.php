<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( ! function_exists( 'digiboost_show_post_views_count' ) ) :
	function digiboost_show_post_views_count() {
		if ( function_exists( 'mwt_show_post_views_count' ) ) {
			mwt_show_post_views_count();
		}
	} //digiboost_show_post_views_count()
endif;
