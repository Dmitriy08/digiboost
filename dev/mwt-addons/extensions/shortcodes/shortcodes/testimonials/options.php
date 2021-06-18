<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'background_color' => array(
        'type'    => 'select',
        'value'   => '',
        'label'   => esc_html__( 'Background color', 'digiboost' ),
        'desc'    => esc_html__( 'Select background color', 'digiboost' ),
        'help'    => esc_html__( 'Select one of predefined background types', 'digiboost' ),
        'choices' => digiboost_unyson_option_get_backgrounds_array(),
    ),
    'shadow' => array(
        'type'         => 'switch',
        'value'        => '',
        'label'        => esc_html__( 'Box Shadow', 'digiboost' ),
        'left-choice'  => array(
            'value' => '',
            'label' => esc_html__( 'No', 'digiboost' ),
        ),
        'right-choice' => array(
            'value' => 'box-shadow',
            'label' => esc_html__( 'Yes', 'digiboost' ),
        ),
    ),

	'testimonials'        => array(
		'label'         => esc_html__( 'Testimonials', 'digiboost' ),
		'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'digiboost' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'digiboost' ),
		'type'          => 'addable-popup',
		'template'      => '{{=author_name}}',
		'popup-options' => array(
            'author_avatar' => array(
                'label' => esc_html__( 'Author Image', 'digiboost' ),
                'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'digiboost' ),
                'type'  => 'upload',
            ),
            'author_name'   => array(
                'label' => esc_html__( 'Author Name', 'digiboost' ),
                'desc'  => esc_html__( 'Enter the author name', 'digiboost' ),
                'type'  => 'text'
            ),
            'author_position'   => array(
                'label' => esc_html__( 'Author Position', 'digiboost' ),
                'desc'  => esc_html__( 'Enter the author position', 'digiboost' ),
                'type'  => 'text'
            ),
			'author_content'       => array(
				'label' => esc_html__( 'Author Quote', 'digiboost' ),
				'desc'  => esc_html__( 'Enter the author quote here', 'digiboost' ),
				'type'  => 'textarea',
			),
		)
	),
    digiboost_unyson_option_carousel()

);