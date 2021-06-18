<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Panels', 'digiboost' ),
		'popup-title'   => esc_html__( 'Add/Edit Accordion Panels', 'digiboost' ),
		'desc'          => esc_html__( 'Create your accordion panels', 'digiboost' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'digiboost' )
			),
			'tab_content'        => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Content', 'digiboost' )
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Panel Featured Image', 'digiboost' ),
				'image'       => esc_html__( 'Image for your panel.', 'digiboost' ),
				'help'        => esc_html__( 'It appears to the left from your content', 'digiboost' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in panel title', 'digiboost' ),
				'set'   => 'theme-fa-icons',
			),
		)
	),

	'id'   => array( 'type' => 'unique' ),
);