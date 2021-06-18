<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$events = fw()->extensions->get( 'events' );
if ( empty( $events ) ) {
	return;
}

$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__( 'Items number', 'digiboost' ),
		'desc'       => esc_html__( 'Number of events to display', 'digiboost' ),
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
	)
);