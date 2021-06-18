<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'digiboost' ),
		'set'   => 'theme-fa-icons',
	),
    'rows_num' => array(
        'type' => 'short-text',
        'value' => '5',
        'label' => esc_html__( 'Number of rows', 'digiboost' ),
        'desc' => esc_html__( 'Select number of rows for textarea', 'digiboost' ),
    ),
);