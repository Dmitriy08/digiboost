<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
$button_options['button_animation'] = array(
	'type'    => 'select',
	'value'   => 'fadeIn',
	'label'   => esc_html__( 'Animation type', 'digiboost' ),
	'desc'    => esc_html__( 'Select one of predefined animations', 'digiboost' ),
	'choices' => digiboost_unyson_option_animations(),
);

$events_box_options_event_options = array();
//if events extension is active and if our custom events extension class exists
$shortcode_events = fw_ext( 'events' );
if( class_exists( 'Digiboost_Unyson_Events_Extends' ) && ( ! empty( $shortcode_events ) ) ) {
	$events_box_options_event_options['next_event'] = array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Add next event counter below layer', 'digiboost'),
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__(' No', 'digiboost'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__(' Yes', 'digiboost'),
		),
	);
}

$options = array(
	'slide_background' => array(
		'type'        => 'select',
		'value'       => 'ls',
		'label'       => esc_html__( 'Slide background', 'digiboost' ),
		'desc'        => esc_html__( 'Select slide background color', 'digiboost' ),
		'choices'     => array(
			'ls'    => esc_html__( 'Light', 'digiboost' ),
			'ls ms' => esc_html__( 'Light Muted', 'digiboost' ),
			'ds'    => esc_html__( 'Dark', 'digiboost' ),
			'ds ms' => esc_html__( 'Dark Muted', 'digiboost' ),
			'cs'    => esc_html__( 'Color', 'digiboost' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_align'      => array(
		'type'        => 'select',
		'value'       => 'text-left',
		'label'       => esc_html__( 'Slide text alignment', 'digiboost' ),
		'desc'        => esc_html__( 'Select slide text alignment', 'digiboost' ),
		'choices'     => array(
			'text-center text-sm-left'   => esc_html__( 'Left', 'digiboost' ),
			'text-center' => esc_html__( 'Center', 'digiboost' ),
			'text-sm-right text-center'  => esc_html__( 'Right', 'digiboost' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_vertical_align'      => array(
		'type'        => 'select',
		'value'       => '',
		'label'       => esc_html__( 'Slide vertical alignment', 'digiboost' ),
		'desc'        => esc_html__( 'Select vertcial alignment for slider layers', 'digiboost' ),
		'choices'     => array(
			'align-center'   => esc_html__( 'Middle (default)', 'digiboost' ),
			'align-items-start' => esc_html__( 'Top', 'digiboost' ),
			'align-items-end'  => esc_html__( 'Bottom', 'digiboost' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_layers'     => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Slide Layers', 'digiboost' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'digiboost' ),

		'box-options' => array_merge( array(
			'layer_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Layer tag', 'digiboost' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'digiboost' ),
				'choices' => array(
					'h3' => esc_html__( 'H3 tag', 'digiboost' ),
					'h2' => esc_html__( 'H2 tag', 'digiboost' ),
					'h4' => esc_html__( 'H4 tag', 'digiboost' ),
					'p'  => esc_html__( 'P tag', 'digiboost' ),
					'div'  => esc_html__( 'div tag', 'digiboost' ),

				),
			),
			'layer_animation'      => array(
				'type'    => 'select',
				'value'   => 'fadeIn',
				'label'   => esc_html__( 'Animation type', 'digiboost' ),
				'desc'    => esc_html__( 'Select one of predefined animations', 'digiboost' ),
				'choices' => digiboost_unyson_option_animations(),
			),
			'layer_text'           => array(
				'type'  => 'textarea',
				'value' => '',
				'label' => esc_html__( 'Layer text', 'digiboost' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'digiboost' ),
			),
			'layer_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text color', 'digiboost' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'digiboost' ),
				'choices' => array(
					''           => esc_html__( 'Inherited', 'digiboost' ),
					'color-main'  => esc_html__( 'First theme main color', 'digiboost' ),
					'color-main2' => esc_html__( 'Second theme main color', 'digiboost' ),
					'color-darkgrey'       => esc_html__( 'Dark grey theme color', 'digiboost' ),
					'color-dark'      => esc_html__( 'Dark theme color', 'digiboost' ),

				),
			),
			'layer_text_weight'    => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text weight', 'digiboost' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'digiboost' ),
				'choices' => array(
					''     => esc_html__( 'Normal', 'digiboost' ),
					'bold' => esc_html__( 'Bold', 'digiboost' ),
					'thin' => esc_html__( 'Thin', 'digiboost' ),

				),
			),
			'layer_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text transform', 'digiboost' ),
				'desc'    => esc_html__( 'Select a text transformation for your layer', 'digiboost' ),
				'choices' => array(
					''                => esc_html__( 'None', 'digiboost' ),
					'text-lowercase'  => esc_html__( 'Lowercase', 'digiboost' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'digiboost' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'digiboost' ),

				),
			),
			'class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Additional Layer CSS class', 'digiboost' ),
			), $events_box_options_event_options )
		),
		'template'    => esc_html__( 'Slider Layer', 'digiboost' ),
		'limit'           => 5, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'digiboost' ),
	),
	'class'           => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Additional Slide CSS class', 'digiboost' ),
	),
	'button' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'show_button' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show button', 'digiboost' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'digiboost' ),
				),
				'right-choice' => array(
					'value' => 'button',
					'label' => esc_html__( 'Yes', 'digiboost' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'button' => $button_options,
		),
	),
);