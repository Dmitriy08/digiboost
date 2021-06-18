<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
if ( !class_exists('WooCommerce')) {
    return;
}

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
		'label'      => esc_html__( 'Items number', 'digiboost' ),
		'desc'       => esc_html__( 'Number of posts to display', 'digiboost' ),
	),
    digiboost_unyson_option_carousel(),
    'button' => array(
        'type'    => 'multi-picker',
        'label'   => false,
        'desc'    => false,
        'value'   => false,
        'picker'  => array(
            'show_button' => array(
                'type'         => 'switch',
                'label'        => esc_html__( 'Show button', 'digiboost' ),
                'left-choice'  => array(
                    'value' => '',
                    'label' => esc_html__( 'No', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'button',
                    'label' => esc_html__( 'Yes', 'digiboost' ),
                ),
            ),
        ),
        'choices' => array(
            ''       => array(),
            'button' => $button_options,
        ),
    ),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'digiboost'),
		'desc'  => esc_html__('You can select one or more categories', 'digiboost'),
		'population' => 'taxonomy',
		'source' => 'product_cat',
		'prepopulate' => 10,
		'limit' => 100,
	)


);