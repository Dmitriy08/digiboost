<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$post_type = $ext_services_settings['post_type'];

//get button to add in a teaser:
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
unset( $button_options['target'] );

$options = array(
	'service' => array(
		'type'  => 'multi-select',
		'value' => array(),
		'label' => esc_html__('Service', 'mwt'),
		'desc'  => esc_html__('Select service to display', 'mwt'),
		'population' => 'posts',
		'source' => $post_type,
		'limit' => 1,
	),
    'background_color' => array(
        'type'    => 'select',
        'value'   => 'cs',
        'label'   => esc_html__( 'Background color', 'mwt' ),
        'desc'    => esc_html__( 'Select one of predefined background colors', 'mwt' ),
        'choices' => array(
            '' => esc_html__( 'Transparent (No Background)', 'mwt' ),
            'ls' => esc_html__( 'Light', 'mwt' ),
            'ls ms' => esc_html__( 'Grey', 'mwt' ),
            'ds' => esc_html__( 'Dark', 'mwt' ),
            'ds ms' => esc_html__( 'Dark Grey', 'mwt' ),
            'cs' => esc_html__( 'Main color', 'mwt' ),
            'cs cs2' => esc_html__( 'Second Main color', 'mwt' ),
            'cs cs3' => esc_html__( 'Third Main color', 'mwt' ),
            'bordered' => esc_html__( 'Transparent background with border', 'mwt' ),
        ),
    ),
    'media_position'  => array(
        'type'  => 'switch',
        'value' => 'left',
        'label' => esc_html__('Media position', 'mwt'),
        'desc'  => esc_html__('Left or right media position', 'mwt'),
        'left-choice' => array(
            'value' => '',
            'label' => esc_html__('Left', 'mwt'),
        ),
        'right-choice' => array(
            'value' => true,
            'label' => esc_html__('Right', 'mwt'),
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