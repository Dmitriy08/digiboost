<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'digiboost' ),
		'set'   => 'theme-fa-icons',
	),
	'icon_style' => array(
		'type'    => 'image-picker',
		'value'   => '',
		'label'   => esc_html__( 'Icon Style', 'digiboost' ),
		'desc'    => esc_html__( 'Select one of predefined icon styles.', 'digiboost' ),
		'help'    => esc_html__( 'If not set - no icon will appear.', 'digiboost' ),
		'choices' => array(
			'' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_01.png',
			'color-darkgrey' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_02.png',
			'color-main' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_03.png',
		),

		'blank' => false, // (optional) if true, images can be deselected
	),
	'title'      => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'digiboost' ),
		'desc'  => esc_html__( 'Title near icon', 'digiboost' ),
	),
	'text'       => array(
		'type'  => 'text',
		'label' => esc_html__( 'Text', 'digiboost' ),
		'desc'  => esc_html__( 'Text near title', 'digiboost' ),
	)
);