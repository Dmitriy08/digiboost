<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'title' => array(
		'type'       => 'text',
		'value'      => '',
		'label'      => esc_html__( 'Progress Bar title', 'digiboost' ),
	),
	'percent' => array(
		'type'       => 'slider',
		'value'      => 80,
		'properties' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'label'      => esc_html__( 'Count To', 'digiboost' ),
		'desc'       => esc_html__( 'Choose percent to count to', 'digiboost' ),
	),
	'background_class' => array(
		'type'    => 'select',
		'value'   => 'progress-bar-success',
		'label'   => esc_html__( 'Context background color', 'digiboost' ),
		'desc'    => esc_html__( 'Select one of predefined background colors', 'digiboost' ),
		'choices' => array(
			'bg-maincolor' => esc_html__( 'Main color 1', 'digiboost' ),
			'bg-maincolor2'    => esc_html__( 'Main color 2', 'digiboost' ),
			'bg-maincolor3' => esc_html__( 'Main color 3', 'digiboost' ),
			'bg-maincolor4'  => esc_html__( 'Main color 4', 'digiboost' ),
		),
	),
);