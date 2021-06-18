<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy = $ext_team_settings['taxonomy_name'];

$options = array(
    'background_color' => array(
        'type'    => 'select',
        'value'   => '',
        'label'   => esc_html__( 'Background color', 'mwt' ),
        'desc'    => esc_html__( 'Select background color', 'mwt' ),
        'help'    => esc_html__( 'Select one of predefined background types', 'mwt' ),
        'choices' => digiboost_unyson_option_get_backgrounds_array(),
    ),
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 48,
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
    'included_user' => array(
        'type'  => 'multi-select',
        'label' => esc_html__('Included member', 'mwt'),
        'population' => 'posts',
        'source' => 'fw-team',
        'prepopulate' => 10,
        'limit' => 100,
    ),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'mwt'),
		'desc'  => esc_html__('You can select one or more categories', 'mwt'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 10,
		'limit' => 100,
	)
);