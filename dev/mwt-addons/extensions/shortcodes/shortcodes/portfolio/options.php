<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}

$ext_portfolio_settings = fw()->extensions->get( 'portfolio' )->get_settings();
$taxonomy = $ext_portfolio_settings['taxonomy_name'];

$options = array(
    'background_color' => array(
        'type'    => 'select',
        'value'   => '',
        'label'   => esc_html__( 'Background color', 'digiboost' ),
        'desc'    => esc_html__( 'Select background color', 'digiboost' ),
        'help'    => esc_html__( 'Select one of predefined background types', 'digiboost' ),
        'choices' => digiboost_unyson_option_get_backgrounds_array(),
    ),
	'layout' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker' => array(
			'layout_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Layout', 'digiboost' ),
				'desc'    => esc_html__( 'Choose layout', 'digiboost' ),
				'choices' => array(
					'carousel' => esc_html__( 'Carousel', 'digiboost' ),
					'isotope'  => esc_html__( 'Masonry Grid', 'digiboost' ),
					'isotope-tiled'  => esc_html__( 'Tiled Grid', 'digiboost' ),
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
			'isotope-tiled' => array(
				digiboost_unyson_option_isotope()
			),
		)
	),
	'item_layout'   => array(
		'label'   => esc_html__( 'Item layout', 'digiboost' ),
		'desc'    => esc_html__( 'Choose Item layout', 'digiboost' ),
		'value'   => 'item-regular',
		'type'    => 'select',
		'choices' => array(
			'item-regular'  => esc_html__( 'Regular (just image)', 'digiboost' ),
			'item-title'    => esc_html__( 'Image with title', 'digiboost' ),
			'item-extended' => esc_html__( 'Image with title and excerpt', 'digiboost' ),
		)
	),
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__( 'Items number', 'digiboost' ),
		'desc'       => esc_html__( 'Number of portfolio projects tu display', 'digiboost' ),
	),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show filters', 'digiboost' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'digiboost' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'digiboost' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'digiboost' ),
		),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'digiboost'),
		'desc'  => esc_html__('You can select one or more categories', 'digiboost'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 100,
		'limit' => 100,
	)
);