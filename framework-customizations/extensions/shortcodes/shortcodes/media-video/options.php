<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
	'video_type'   => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Select Video Type', 'digiboost' ),
		'desc'    => esc_html__( 'Select optional type of video', 'digiboost' ),
		'choices' => array(
			'default'     => esc_html__( 'Default', 'digiboost' ),
			'popup' => esc_html__( 'Popup', 'digiboost' ),
		),
	),
	'image'            => array(
		'type'  => 'upload',
		'label' => __( 'Background Image', 'digiboost' ),
		'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'digiboost' )
	),
    'media_link'     => array(
        'type'  => 'text',
        'value' => '',
        'label' => esc_html__( 'Link to your side media', 'digiboost' ),
        'desc'  => esc_html__( 'You can add a link to your side media. If YouTube link will be provided, video will play in LightBox', 'digiboost' ),
    ),
    'media_video'    => array(
        'type'    => 'oembed',
        'value'   => '',
        'label'   => esc_html__( 'Video', 'digiboost' ),
        'desc'    => esc_html__( 'Adds video player', 'digiboost' ),
        'help'    => esc_html__( 'Leave blank if no needed', 'digiboost' ),
        'preview' => array(
            'width'      => 278, // optional, if you want to set the fixed width to iframe
            'height'     => 185, // optional, if you want to set the fixed height to iframe
            /**
             * if is set to false it will force to fit the dimensions,
             * because some widgets return iframe with aspect ratio and ignore applied dimensions
             */
            'keep_ratio' => true
        ),
    ),
);
