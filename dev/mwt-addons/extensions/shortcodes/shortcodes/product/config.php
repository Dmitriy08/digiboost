<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
if ( !class_exists('WooCommerce')) {
   return;
}
$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Products', 'digiboost' ),
		'description' => esc_html__( 'Products', 'digiboost' ),
		'tab'         => esc_html__( 'Content Elements', 'digiboost' )
	)
);