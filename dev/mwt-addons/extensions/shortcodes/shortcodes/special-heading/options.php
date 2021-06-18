<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'heading_align' => array(
		'type'    => 'select',
		'value'   => 'text-center text-sm-left',
		'label'   => esc_html__( 'Text alignment', 'digiboost' ),
		'desc'    => esc_html__( 'Select heading text alignment', 'digiboost' ),
		'choices' => array(
			'text-center text-sm-left'   => esc_html__( 'Left', 'digiboost' ),
			'text-center' => esc_html__( 'Center', 'digiboost' ),
			'text-center text-sm-right'  => esc_html__( 'Right', 'digiboost' ),
		),
	),

	'headings'      => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Headings', 'digiboost' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'digiboost' ),
		'box-options' => array(
			'heading_icon' => array(
				'type'  => 'icon-v2',
				'preview_size' => 'medium',
				'modal_size' => 'medium',
				'label' => esc_html__('Optional icon', 'digiboost'),
			),
			'heading_type' => array(
				'type'     => 'multi-picker',
				'label'    => false,
				'desc'     => false,
				'picker' => array(
					'type' => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Special Heading Type', 'digiboost' ),
						'desc'    => esc_html__( 'Here you can change the type of special heading', 'digiboost' ),
						'choices' => array(
							'default'  => esc_html__( 'Default', 'digiboost' ),
							'counter'  => esc_html__( 'Counter', 'digiboost' ),
						)
					)
				),
				'choices'     => array(
					'default'=>array(
						'heading_text'           => array(
							'type'  => 'text',
							'value' => '',
							'label' => esc_html__( 'Heading text', 'digiboost' ),
							'desc'  => esc_html__( 'Text to appear in slide layer', 'digiboost' ),
						),
					),
					'counter' => array(
						'count' => array(
							'type'       => 'slider',
							'value'      => '',
							'properties' => array(
								'min'  => 0,
								'max'  => 550,
								'step' => 1,
							),
							'label'      => esc_html__( 'Count To', 'digiboost' ),
							'desc'       => esc_html__( 'Choose number to count to', 'digiboost' ),
						),
						'coefficient'    => array(
							'type'  => 'text',
							'label' => esc_html__( 'Coefficient', 'digiboost' ),
							'desc'  => esc_html__( 'Add coefficient', 'digiboost' ),
						),
					),
				)
			),
			'heading_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Heading tag', 'digiboost' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'digiboost' ),
				'choices' => array(
					'h1' => esc_html__( 'H1 tag', 'digiboost' ),
					'h2' => esc_html__( 'H2 tag', 'digiboost' ),
					'h3' => esc_html__( 'H3 tag', 'digiboost' ),
					'h4' => esc_html__( 'H4 tag', 'digiboost' ),
					'h5' => esc_html__( 'H5 tag', 'digiboost' ),
					'h6' => esc_html__( 'H6 tag', 'digiboost' ),
					'p'  => esc_html__( 'P tag', 'digiboost' ),
				),
			),
			'heading_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text color', 'digiboost' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'digiboost' ),
				'choices' => array(
					''           => esc_html__( 'Inherited', 'digiboost' ),
					'color-main'  => esc_html__( 'Color main', 'digiboost' ),
					'color-main2' => esc_html__( 'Color main 2', 'digiboost' ),
					'color-darkgrey'       => esc_html__( 'Dark grey theme color', 'digiboost' ),
					'color-dark'      => esc_html__( 'Dark theme color', 'digiboost' ),
					'color-light'      => esc_html__( 'Light theme color', 'digiboost' ),
				),
			),
			'heading_text_size'    => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text size', 'digiboost' ),
				'desc'    => esc_html__( 'Select a size for your text in layer', 'digiboost' ),
				'choices' => array(
					''     => esc_html__( 'Normal', 'digiboost' ),
					'big' => esc_html__( 'Big', 'digiboost' ),
					'small' => esc_html__( 'Small', 'digiboost' ),

				),
			),
			'heading_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text transform', 'digiboost' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'digiboost' ),
				'choices' => array(
					''                => esc_html__( 'None', 'digiboost' ),
					'text-lowercase'  => esc_html__( 'Lowercase', 'digiboost' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'digiboost' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'digiboost' ),
				),
			),
		),
//		'template'    => '{{= heading_type.default.heading_text }}',
		'template'    => '{{ if (heading_type.default) { }} {{= heading_type.default.heading_text }} {{ } }} {{ if (heading_type.counter) { }} {{= heading_type.counter.count}} {{ } }}',
	)
);
