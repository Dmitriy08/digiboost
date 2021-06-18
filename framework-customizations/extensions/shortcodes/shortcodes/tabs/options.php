<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'digiboost' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'digiboost' ),
		'desc'          => esc_html__( 'Create your tabs', 'digiboost' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tab Title', 'digiboost' )
			),
			'tab_content'        => array(
				'type'  => 'wp-editor',
				'label' => esc_html__( 'Tab Content', 'digiboost' ),
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Tab Featured Image', 'digiboost' ),
				'image'       => esc_html__( 'Featured image for your tab', 'digiboost' ),
				'help'        => esc_html__( 'Image for your tab. It appears on the top of your tab content', 'digiboost' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in tab title', 'digiboost' ),
				'set'   => 'theme-fa-icons',
			),
		),
	),
	'small_tabs' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Small Tabs', 'digiboost' ),
		'desc'         => esc_html__( 'Decrease tabs size', 'digiboost' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'digiboost' ),
		),
		'right-choice' => array(
			'value' => 'small-tabs',
			'label' => esc_html__( 'Yes', 'digiboost' ),
		),
	),
	'id'         => array( 'type' => 'unique' ),
);