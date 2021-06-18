<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'items'         => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Carousel items', 'digiboost' ),
		'box-options'     => array(
			'image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Image', 'digiboost' ),
				'images_only' => true,
			),
			'url'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Image link', 'digiboost' ),
			),
			'lightbox' => array(
				'type'         => 'switch',
				'value'        => false,
				'label'        => esc_html__( 'Open link in lightbox', 'digiboost' ),
				'desc'         => esc_html__( 'If your link is a video link you can open it in lightbox', 'digiboost' ),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Yes', 'digiboost' )
				),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'No', 'digiboost' )
				),
			),
			'title' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Title and Alt text', 'digiboost' ),
			),
			'image-filter'        => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Image Filter', 'digiboost' ),
				'choices'     => array(
					'' => esc_html__( 'Default', 'digiboost' ),
					'filter-opacity'  => esc_html__('Image Opacity', 'digiboost' ),
				),
				'no-validate' => false,
			),
		),
		'template'        => '{{=image.url}}',
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'digiboost' ),
		'sortable'        => true,
	),
	digiboost_unyson_option_carousel()

);