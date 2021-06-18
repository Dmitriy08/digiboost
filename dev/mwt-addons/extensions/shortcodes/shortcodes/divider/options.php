<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'unique_id' => array(
		'type' => 'unique',
		'length' => 7
	),
	'style' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker' => array(
			'ruler_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Divider Type', 'digiboost' ),
				'desc'    => esc_html__( 'Here you can set the styling and size of the Divider element', 'digiboost' ),
				'choices' => array(
					'line'  => esc_html__( 'Line', 'digiboost' ),
					'line_styled'  => esc_html__( 'Line Styled', 'digiboost' ),
					'space' => esc_html__( 'Whitespace', 'digiboost' ),
					'word' => esc_html__( 'Word', 'digiboost' ),
				)
			)
		),
		'choices'     => array(
			'space' => array(
				'height' => array(
					'label' => esc_html__( 'Height', 'digiboost' ),
					'desc'  => esc_html__( 'How much whitespace do you need? Enter a pixel value. Positive value will increase the whitespace, negative value will reduce it. eg: \'50\', \'-25\', \'200\'', 'digiboost' ),
					'type'  => 'text',
					'value' => '50'
				)
			),
			'line_styled' => array(
				'background_color' => array(
					'type'    => 'select',
					'value'   => '',
					'label'   => esc_html__( 'Background color', 'digiboost' ),
					'desc'    => esc_html__( 'Select background color', 'digiboost' ),
					'help'    => esc_html__( 'Select one of predefined background types', 'digiboost' ),
					'choices' => digiboost_unyson_option_get_backgrounds_array(),
				),
				'position' => array(
					'type'    => 'select',
					'value'   => 'center',
					'label'   => esc_html__( 'Position Line Styled', 'digiboost' ),
					'choices' => array(
						'center'  => esc_html__( 'Center', 'digiboost' ),
						'left-line'  => esc_html__( 'Left', 'digiboost' ),
						'right-line' => esc_html__( 'Right', 'digiboost' ),
					)
				)
				
			),
			'word'=>array(
				'text' => array(
					'label' => esc_html__( 'Text od word spacer', 'digiboost' ),
					'type'  => 'text',
					'value' => ''
				)
			)
		)
	),
	'responsive' => array(
		'type' => 'box',
		'options' => digiboost_unyson_option_responsive_options_array(),
	)
);
