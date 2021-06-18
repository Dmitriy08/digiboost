<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy = $ext_services_settings['taxonomy_name'];

$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
unset( $button_options['target'] );


$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.
		),
		'label'      => esc_html__( 'Items number', 'mwt' ),
		'desc'       => esc_html__( 'Number of posts to display', 'mwt' ),
	),
	
	'layout' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker' => array(
			'layout_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Layout', 'mwt' ),
				'desc'    => esc_html__( 'Choose layout', 'mwt' ),
				'choices' => array(
					'carousel' => esc_html__( 'Carousel', 'mwt' ),
					'isotope'  => esc_html__( 'Masonry Grid', 'mwt' ),
				)
			)
		),
		'choices'     => array(
			'carousel' => array(
				digiboost_unyson_option_carousel()
			),
			'isotope' => array(
				digiboost_unyson_option_isotope()
			),
		)
	),
	'item-layout'        => array(
		'label'   => esc_html__( 'Item Layout', 'mwt' ),
		'desc'    => esc_html__( 'Choose item layout', 'mwt' ),
		'value'   => 'loop-item',
		'type'    => 'select',
		'choices' => array(
			'loop-item'  => esc_html__( 'With Image', 'mwt' ),
			'loop-item2'  => esc_html__( 'With Icon', 'mwt' ),
		)
	),
    'background_color' => array(
        'type'    => 'select',
        'value'   => '',
        'label'   => esc_html__( 'Background color', 'mwt' ),
        'desc'    => esc_html__( 'Select background color', 'mwt' ),
        'help'    => esc_html__( 'Select one of predefined background types', 'mwt' ),
        'choices' => digiboost_unyson_option_get_backgrounds_array(),
    ),
	'align'        => array(
		'label'   => esc_html__( 'Align Text', 'mwt' ),
		'desc'    => esc_html__( 'Choose text align', 'mwt' ),
		'value'   => 'text-sm-left text-center',
		'type'    => 'select',
		'choices' => array(
			'text-center' => esc_html__( 'Center', 'mwt' ),
			'text-sm-left text-center'  => esc_html__( 'Left', 'mwt' ),
			'text-sm-right text-center'  => esc_html__( 'Right', 'mwt' ),
		)
	),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show filters', 'mwt' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'mwt' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'mwt' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'mwt' ),
		),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'mwt'),
		'desc'  => esc_html__('You can select one or more categories', 'mwt'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 10,
		'limit' => 100,
	),
    
    'show_excerpt'  => array(
        'type'         => 'switch',
        'value'        => true,
        'label'        => esc_html__( 'Show Excerpt', 'mwt' ),
        'desc'         => esc_html__( 'Hide or show excerpt', 'mwt' ),
        'left-choice'  => array(
            'value' => false,
            'label' => esc_html__( 'No', 'mwt' ),
        ),
        'right-choice' => array(
            'value' => true,
            'label' => esc_html__( 'Yes', 'mwt' ),
        ),
    ),
    'button' => array(
        'type'    => 'multi-picker',
        'label'   => false,
        'desc'    => false,
        'value'   => false,
        'picker'  => array(
            'show_button' => array(
                'type'         => 'switch',
                'label'        => esc_html__( 'Show button', 'mwt' ),
                'left-choice'  => array(
                    'value' => '',
                    'label' => esc_html__( 'No', 'mwt' ),
                ),
                'right-choice' => array(
                    'value' => 'button',
                    'label' => esc_html__( 'Yes', 'mwt' ),
                ),
            ),
        ),
        'choices' => array(
            ''       => array(),
            'button' => $button_options,
        ),
    )
);