<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'size' => array(
		'type'       => 'slider',
		'value'      => 250,
		'properties' => array(
			'min'  => 150,
			'max'  => 350,
			'step' => 10,
		),
		'label'      => esc_html__( 'Chart Size (px)', 'digiboost' ),
	),

	'line' => array(
		'type'       => 'slider',
		'value'      => 10,
		'properties' => array(
			'min'  => 1,
			'max'  => 40,
			'step' => 1,
		),
		'label'      => esc_html__( 'Line Width (px)', 'digiboost' ),
	),

	'trackcolor' => array(
		'type'  => 'color-picker',
		'value' => '#c14240',
		// palette colors array
		// 'palettes' => array( '#ba4e4e', '#0ce9ed', '#941940' ),
		'label' => esc_html__( 'Bar Color', 'digiboost' ),
	),

	'bgcolor' => array(
		'type'  => 'color-picker',
		'value' => '#ffffff',
		'label' => esc_html__( 'Track Color', 'digiboost' ),
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
	'speed'   => array(
		'type'       => 'slider',
		'value'      => 1000,
		'properties' => array(
			'min'  => 500,
			'max'  => 5000,
			'step' => 100,
		),
		'label'      => esc_html__( 'Percents Counter Speed', 'digiboost' ),
		'desc'       => esc_html__( 'Choose counter speed (in milliseconds)', 'digiboost' ),
	),
	'name'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Chart Name', 'digiboost' ),
		'desc'  => esc_html__( 'Appears below percents number', 'digiboost' ),
	),
);