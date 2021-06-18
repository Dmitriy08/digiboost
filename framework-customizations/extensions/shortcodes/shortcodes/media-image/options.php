<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'image'            => array(
        'type'  => 'upload',
        'label' => __( 'Choose Image', 'digiboost' ),
        'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'digiboost' )
    ),
    'size'             => array(
        'type'    => 'group',
        'options' => array(
            'width'  => array(
                'type'  => 'text',
                'label' => esc_html__( 'Width', 'digiboost' ),
                'desc'  => esc_html__( 'Set image width', 'digiboost' ),
                'value' => 300
            ),
            'height' => array(
                'type'  => 'text',
                'label' => esc_html__( 'Height', 'digiboost' ),
                'desc'  => esc_html__( 'Set image height', 'digiboost' ),
                'value' => 200
            )
        )
    ),
    'special_class'   => array(
        'type'    => 'select',
        'value'   => '',
        'label'   => esc_html__( 'Image Special Class', 'digiboost' ),
        'desc'    => esc_html__( 'Select optional special class for image', 'digiboost' ),
        'choices' => array(
            ''     => esc_html__( 'Default', 'digiboost' ),
            'round' => esc_html__( 'Rounded Image', 'digiboost' ),
        ),
    ),
    'image-link-group' => array(
        'type'    => 'group',
        'options' => array(
            'link'   => array(
                'type'  => 'text',
                'label' => esc_html__( 'Image Link', 'digiboost' ),
                'desc'  => esc_html__( 'Where should your image link to?', 'digiboost' )
            ),
            'target' => array(
                'type'         => 'switch',
                'label'        => __( 'Open Link in New Window', 'digiboost' ),
                'desc'         => __( 'Select here if you want to open the linked page in a new window', 'digiboost' ),
                'right-choice' => array(
                    'value' => '_blank',
                    'label' => esc_html__( 'Yes', 'digiboost' ),
                ),
                'left-choice'  => array(
                    'value' => '_self',
                    'label' => esc_html__( 'No', 'digiboost' ),
                ),
            ),
        )
    )


);

