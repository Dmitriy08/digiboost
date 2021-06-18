<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'label'  => esc_html__( 'Content', 'digiboost' ),
		'desc'   => esc_html__( 'Enter some content for this text-block', 'digiboost' ),
		'reinit' => true,
		'teeny' => false,
	),
    'with_border' => array(
        'type'         => 'switch',
        'value'        => '',
        'label'        => esc_html__( 'With Border', 'digiboost' ),
        'left-choice'  => array(
            'value' => '',
            'label' => esc_html__( 'No', 'digiboost' ),
        ),
        'right-choice' => array(
            'value' => 'with-border',
            'label' => esc_html__( 'Yes', 'digiboost' ),
        ),
    ),
);
