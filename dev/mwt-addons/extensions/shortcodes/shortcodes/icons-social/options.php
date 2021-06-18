<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'social_icons' => array(
		'type'            => 'addable-popup',
		'value'           => '',
		'label'           => esc_html__( 'Social Buttons', 'digiboost' ),
		'desc'            => esc_html__( 'Optional social buttons', 'digiboost' ),
		'template'        => '{{=icon}}',
		'popup-options'     => array(
			'icon'       => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Social Icon', 'digiboost' ),
				'set'   => 'social-icons',
			),
			'icon_class' => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Icon type', 'digiboost' ),
				'desc'        => esc_html__( 'Select one of predefined social button types', 'digiboost' ),
				'choices'     => array(
					''                                    => esc_html__( 'Default', 'digiboost' ),
					'border-icon'                         => esc_html__( 'Simple Bordered Icon', 'digiboost' ),
					'border-icon rounded-icon'            => esc_html__( 'Rounded Bordered Icon', 'digiboost' ),
					'bg-icon'                             => esc_html__( 'Simple Background Icon', 'digiboost' ),
					'bg-icon rounded-icon'                => esc_html__( 'Rounded Background Icon', 'digiboost' ),
					'color-icon bg-icon'                  => esc_html__( 'Color Light Background Icon', 'digiboost' ),
					'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'digiboost' ),
					'color-icon'                          => esc_html__( 'Color Icon', 'digiboost' ),
					'color-icon border-icon'              => esc_html__( 'Color Bordered Icon', 'digiboost' ),
					'color-icon border-icon rounded-icon' => esc_html__( 'Rounded Color Bordered Icon', 'digiboost' ),
					'color-bg-icon'                       => esc_html__( 'Color Background Icon', 'digiboost' ),
					'color-bg-icon rounded-icon'          => esc_html__( 'Rounded Color Background Icon', 'digiboost' ),

				),
				/**
				 * Allow save not existing choices
				 * Useful when you use the select to populate it dynamically from js
				 */
				'no-validate' => false,
			),
			'icon_url'   => array(
				'type'  => 'text',
				'value' => '#',
				'label' => esc_html__( 'Icon Link', 'digiboost' ),
				'desc'  => esc_html__( 'Provide a URL to your icon', 'digiboost' ),
			)
		),
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'digiboost' ),
		'sortable'        => true,
	)
);