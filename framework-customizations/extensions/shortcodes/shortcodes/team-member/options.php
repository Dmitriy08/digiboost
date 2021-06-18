<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image' => array(
		'label' => esc_html__( 'Team Member Image', 'digiboost' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'digiboost' ),
		'type'  => 'upload'
	),
	'name'  => array(
		'label' => esc_html__( 'Team Member Name', 'digiboost' ),
		'desc'  => esc_html__( 'Name of the person', 'digiboost' ),
		'type'  => 'text',
		'value' => ''
	),
	'job'   => array(
		'label' => esc_html__( 'Team Member Job Title', 'digiboost' ),
		'desc'  => esc_html__( 'Job title of the person.', 'digiboost' ),
		'type'  => 'text',
		'value' => ''
	),
	'desc'  => array(
		'label' => esc_html__( 'Team Member Description', 'digiboost' ),
		'desc'  => esc_html__( 'Enter a few words that describe the person', 'digiboost' ),
		'type'  => 'textarea',
		'value' => ''
	),
	digiboost_shortcode_options( 'icons_social' ),
);