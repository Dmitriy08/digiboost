<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'message' => array(
		'label' => esc_html__( 'Message', 'digiboost' ),
		'desc'  => esc_html__( 'Notification message', 'digiboost' ),
		'type'  => 'textarea',
		'value' => esc_html__( 'Message!', 'digiboost' ),
	),
	'type'    => array(
		'label'   => esc_html__( 'Type', 'digiboost' ),
		'desc'    => esc_html__( 'Notification type', 'digiboost' ),
		'type'    => 'select',
		'choices' => array(
			'success' => esc_html__( 'Congratulations', 'digiboost' ),
			'info'    => esc_html__( 'Information', 'digiboost' ),
			'warning' => esc_html__( 'Alert', 'digiboost' ),
			'danger'  => esc_html__( 'Error', 'digiboost' ),
		)
	),
);