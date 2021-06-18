<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'class'  => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Slider Additional CSS class', 'digiboost' ),
		'desc'  => esc_html__( 'Optional CSS class for slider section', 'digiboost' ),
	),
	'nav' => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show slides navigation', 'digiboost' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'Hide', 'digiboost' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Show', 'digiboost' ),
		),
	),
	'dots' => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show slide dots', 'digiboost' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'Hide', 'digiboost' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Show', 'digiboost' ),
		),
	),
	'slider_autoplay' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Autoplay', 'digiboost' ),
		'value' => 'true',
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'digiboost' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'digiboost' ),
		),
	),
	'speed'  => array(
		'type'  => 'slider',
		'value' => 5000,
		'properties' => array(
			'min' => 2000,
			'max' => 10000,
			'step' => 200,

		),
		'label' => esc_html__('Slider speed', 'digiboost'),
		'desc'  => esc_html__('In milliseconds', 'digiboost'),
	),
	'scroll_down' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'show_scroll_down' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show Scroll Down', 'digiboost' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'digiboost' ),
				),
				'right-choice' => array(
					'value' => 'scroll_down',
					'label' => esc_html__( 'Yes', 'digiboost' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'scroll_down' => array(
				'label'       => array(
					'label' => esc_html__( 'Scroll Down Label', 'digiboost' ),
					'desc'  => esc_html__( 'This is the text that appears on your scroll', 'digiboost' ),
					'type'  => 'text',
					'value' => esc_html__('Scroll', 'digiboost' ),
				),
				'link'        => array(
					'label' => esc_html__( 'Scroll Down Link', 'digiboost' ),
					'desc'  => esc_html__( 'Where should your scroll to', 'digiboost' ),
					'type'  => 'text',
					'value' => '#'
				),
			),
		),
	),

);