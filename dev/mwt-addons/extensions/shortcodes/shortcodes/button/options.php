<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'       => array(
		'label' => esc_html__( 'Button Label', 'digiboost' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'digiboost' ),
		'type'  => 'text',
		'value' => esc_html__('Submit', 'digiboost' ),
	),
	'link'        => array(
		'label' => esc_html__( 'Button Link', 'digiboost' ),
		'desc'  => esc_html__( 'Where should your button link to', 'digiboost' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Open Link in New Window', 'digiboost' ),
		'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'digiboost' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__( 'Yes', 'digiboost' ),
		),
		'left-choice'  => array(
			'value' => '_self',
			'label' => esc_html__( 'No', 'digiboost' ),
		),
	),
	'color'       => array(
		'label'   => esc_html__( 'Button Color', 'digiboost' ),
		'desc'    => esc_html__( 'Choose a type for your button', 'digiboost' ),
		'value'   => 'btn btn-maincolor',
		'type'    => 'select',
		'choices' => array(
			'btn btn-darkgrey'   => esc_html__( 'Default', 'digiboost' ),
			'btn btn-outline-darkgrey'   => esc_html__( 'Default Outline', 'digiboost' ),
			'btn btn-maincolor'  => esc_html__( 'Color 1', 'digiboost' ),
			'btn btn-maincolor2'  => esc_html__( 'Color 2', 'digiboost' ),
			'btn btn-maincolor3'  => esc_html__( 'Color 3', 'digiboost' ),
			'btn btn-outline-maincolor'  => esc_html__( 'Color outline 1', 'digiboost' ),
			'btn btn-outline-maincolor2'  => esc_html__( 'Color outline 2', 'digiboost' ),
			'btn btn-outline-maincolor3'  => esc_html__( 'Color outline 3', 'digiboost' ),
			'btn btn-outline-darkgrey only-link'   => esc_html__( 'Only link Default Outline', 'digiboost' ),
			'btn btn-outline-maincolor only-link'  => esc_html__( 'Only link maincolor', 'digiboost' ),
			'btn btn-outline-maincolor2 only-link'  => esc_html__( 'Only link maincolor 2', 'digiboost' ),
			'btn btn-outline-maincolor3 only-link'  => esc_html__( 'Only link maincolor 3', 'digiboost' ),
		)
	),
	'size'       => array(
		'label'   => esc_html__( 'Button Size', 'digiboost' ),
		'desc'    => esc_html__( 'Choose a size for your button', 'digiboost' ),
		'value'   => '',
		'type'    => 'select',
		'choices' => array(
			''   => esc_html__( 'Small Size', 'digiboost' ),
			'medium-btn'  => esc_html__( 'Medium Size', 'digiboost' ),
			'big-btn'  => esc_html__( 'Big Size', 'digiboost' ),
		)
	),
);