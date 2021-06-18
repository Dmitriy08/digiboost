<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$main_options = digiboost_get_section_options_array();
$options = array(
	'tab_main_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Main Options', 'digiboost'),
		'options' => array(
			'column_align'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Text alignment in column', 'digiboost' ),
				'desc'    => esc_html__( 'Select text alignment inside your column', 'digiboost' ),
				'choices' => array(
					''            => esc_html__( 'Inherit', 'digiboost' ),
					'text-center text-sm-left'   => esc_html__( 'Left', 'digiboost' ),
					'text-center' => esc_html__( 'Center', 'digiboost' ),
					'text-center text-sm-right'  => esc_html__( 'Right', 'digiboost' ),
				),
			),
			'column_padding_horizontal'   => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Column Horizontal padding', 'digiboost' ),
				'desc'    => esc_html__( 'Select optional internal column horizontal paddings', 'digiboost' ),
				'choices' => array(
					''     => esc_html__( 'No padding', 'digiboost' ),
					'px-10' => esc_html__( '10px', 'digiboost' ),
					'px-15' => esc_html__( '15px', 'digiboost' ),
					'px-20' => esc_html__( '20px', 'digiboost' ),
					'px-30' => esc_html__( '30px', 'digiboost' ),
					'px-lg-35' => esc_html__( '35px', 'digiboost' ),
					'px-40' => esc_html__( '40px', 'digiboost' ),
					'px-0 px-sm-30 px-xl-50' => esc_html__( '50px', 'digiboost' ),
					'px-60' => esc_html__( '60px', 'digiboost' ),
					'px-xl-80 px-lg-60 px-sm-30' => esc_html__( '80px', 'digiboost' ),

				),
			),
            'column_padding_vertical'   => array(
                'type'    => 'select',
                'value'   => '',
                'label'   => esc_html__( 'Column Vertical padding', 'digiboost' ),
                'desc'    => esc_html__( 'Select optional internal column vertical paddings', 'digiboost' ),
                'choices' => array(
                    ''     => esc_html__( 'No padding', 'digiboost' ),
                    'py-10' => esc_html__( '10px', 'digiboost' ),
                    'py-15' => esc_html__( '15px', 'digiboost' ),
                    'py-20' => esc_html__( '20px', 'digiboost' ),
                    'py-0 py-lg-30' => esc_html__( '30px', 'digiboost' ),
                    'py-40' => esc_html__( '40px', 'digiboost' ),
                    'py-30 py-xl-50' => esc_html__( '50px', 'digiboost' ),
                    'py-60' => esc_html__( '60px', 'digiboost' ),
                ),
            ),
			'special_type_column' => array(
                'type'    => 'select',
                'value'   => '',
                'label'   => esc_html__( 'Type of column', 'digiboost' ),
                'desc'    => esc_html__( 'Select type of column', 'digiboost' ),
                'help'    => esc_html__( 'Select one of type of column', 'digiboost' ),
                'choices' => array(
                    ''     => esc_html__( 'Default', 'digiboost' ),
                    'special-column-space-left' => esc_html__( 'Special Column With Left Space', 'digiboost' ),
                    'special-column-up-right' => esc_html__( 'Special Column Up Right Position', 'digiboost' ),
                    'special-column-center' => esc_html__( 'Special Column Center', 'digiboost' ),
                    'special-column-center-second' => esc_html__( 'Special Column Center Variant 2', 'digiboost' ),
                ),
            ),
            'shadow' => array(
                'type'         => 'switch',
                'value'        => '',
                'label'        => esc_html__( 'Box Shadow Column', 'digiboost' ),
                'left-choice'  => array(
                    'value' => '',
                    'label' => esc_html__( 'No', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'box-shadow',
                    'label' => esc_html__( 'Yes', 'digiboost' ),
                ),
            ),
			'background_color' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Background color', 'digiboost' ),
				'desc'    => esc_html__( 'Select background color', 'digiboost' ),
				'help'    => esc_html__( 'Select one of predefined background types', 'digiboost' ),
				'choices' => digiboost_unyson_option_get_backgrounds_array(),
			),

			'column_animation' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Animation type', 'digiboost' ),
				'desc'    => esc_html__( 'Select one of predefined animations', 'digiboost' ),
				'choices' => digiboost_unyson_option_animations(),
			),
			'column_additional_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Additional CSS class', 'digiboost' ),
				'desc'  => esc_html__( 'Add your custom CSS class to column. Useful for Customization', 'digiboost' ),
			),
		),
	),
	'tab_responsive' => array(
		'type' => 'tab',
		'title' => esc_html__('Responsive', 'digiboost'),
		'options' => array(
			'responsive_alignment' => array(
				'type' => 'tab',
				'title' => esc_html__('Alignment', 'digiboost'),
				'options' => array(
					'text_align_sm' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 576px screen', 'digiboost' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'digiboost' ),
							'text-sm-left'   => esc_html__( 'Left', 'digiboost' ),
							'text-sm-center' => esc_html__( 'Center', 'digiboost' ),
							'text-sm-right'  => esc_html__( 'Right', 'digiboost' ),
						),
					),
					'text_align_md' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 768px screen', 'digiboost' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'digiboost' ),
							'text-md-left'   => esc_html__( 'Left', 'digiboost' ),
							'text-md-center' => esc_html__( 'Center', 'digiboost' ),
							'text-md-right'  => esc_html__( 'Right', 'digiboost' ),
						),
					),
					'text_align_lg' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 992px screen', 'digiboost' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'digiboost' ),
							'text-lg-left'   => esc_html__( 'Left', 'digiboost' ),
							'text-lg-center' => esc_html__( 'Center', 'digiboost' ),
							'text-lg-right'  => esc_html__( 'Right', 'digiboost' ),
						),
					),
					'text_align_xl' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 1200px screen', 'digiboost' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'digiboost' ),
							'text-xl-left'   => esc_html__( 'Left', 'digiboost' ),
							'text-xl-center' => esc_html__( 'Center', 'digiboost' ),
							'text-xl-right'  => esc_html__( 'Right', 'digiboost' ),
						),
					),
				),
			),
			'responsive_visibility' => array(
				'type' => 'tab',
				'title' => esc_html__('Visibility', 'digiboost'),
				'options' => digiboost_unyson_option_responsive_options_array(),
			),
		),
	),
);
