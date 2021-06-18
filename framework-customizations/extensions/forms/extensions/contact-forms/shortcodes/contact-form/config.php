<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Contact form', 'digiboost' ),
	'description' => esc_html__( 'Build contact forms', 'digiboost' ),
	'tab'         => esc_html__( 'Content Elements', 'digiboost' ),
	'popup_size'  => 'large',
	'type'        => 'special'
);