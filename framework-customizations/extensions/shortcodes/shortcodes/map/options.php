<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$map_shortcode = fw_ext('shortcodes')->get_shortcode('map');
$options = array(
	'data_provider' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'population_method' => array(
				'label'   => esc_html__('Population Method', 'digiboost'),
				'desc'    => esc_html__( 'Select map population method (Ex: events, custom)', 'digiboost' ),
				'type'    => 'select',
				'choices' => $map_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices' => $map_shortcode->_get_picker_choices(),
		'show_borders' => false,
		'hide_picker' => true
	),
	'gmap-key' => array_merge(
		array(
			'label' => esc_html__( 'Google Maps API Key', 'digiboost' ),
			'desc' => sprintf(
				esc_html__( 'Create an application in %sGoogle Console%s and add the Key here.', 'digiboost' ),
				'<a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">',
				'</a>'
			),
		),
		version_compare(fw()->manifest->get_version(), '2.5.7', '>=')
		? array(
			'type' => 'gmap-key',
		)
		: array(
			'type' => 'text',
			'fw-storage' => array(
				'type'      => 'wp-option',
				'wp_option' => 'fw-option-types:gmap-key',
			),
		)
	),
	'map_type' => array(
		'type'  => 'select',
		'label' => esc_html__('Map Type', 'digiboost'),
		'desc'  => esc_html__('Select map type', 'digiboost'),
		'choices' => array(
			'roadmap'   => esc_html__('Roadmap', 'digiboost'),
			'terrain' => esc_html__('Terrain', 'digiboost'),
			'satellite' => esc_html__('Satellite', 'digiboost'),
			'hybrid'    => esc_html__('Hybrid', 'digiboost')
		)
	),
	'map_height' => array(
		'label' => esc_html__('Map Height', 'digiboost'),
		'desc'  => esc_html__('Set map height (Ex: 300)', 'digiboost'),
		'type'  => 'text'
	),
	'disable_scrolling' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Disable zoom on scroll', 'digiboost'),
		'desc'  => esc_html__('Prevent the map from zooming when scrolling until clicking on the map', 'digiboost'),
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Yes', 'digiboost'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('No', 'digiboost'),
		),
	),
    'initial_zoom' => array(
        'label' => esc_html__('Initial Zoom', 'digiboost'),
        'desc'  => esc_html__('From 1 to 16', 'digiboost'),
        'type'  => 'text',
        'value' => '11',
    ),
);