<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//get accordion to add in tab:
$accordion_shortcode = fw_ext( 'shortcodes' )->get_shortcode( 'accordion' );

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
			'icon'    => array(
				'type'  => 'icon-v2',
				'label' => esc_html__('Choose an Icon', 'digiboost'),
			),
			'icon_style' => array(
				'type'    => 'image-picker',
				'value'   => '',
				'label'   => esc_html__( 'Icon Style', 'digiboost' ),
				'desc'    => esc_html__( 'Select one of predefined icon styles.', 'digiboost' ),
				'choices' => array(
					'' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/1.png',
					'bordered' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/2.png',
					'rounded bordered' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/3.png',
					'round bordered' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/4.png',
					'bg-' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/5.png',
					'rounded bg-' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/6.png',
					'round bg-' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/7.png',
				),
				'blank' => false, // (optional) if true, images can be deselected
			),
			'icon_color' => array(
				'type'    => 'select',
				'label'   => esc_html__('Icon color', 'digiboost'),
				'value' => 'color-main',
				'choices' => array(
					'color-darkgrey' => esc_html__('Darkgrey', 'digiboost'),
					'color-main' => esc_html__('Accent', 'digiboost'),
					'color-main2' => esc_html__('Accent second', 'digiboost'),
					'color-main3' => esc_html__('Accent third', 'digiboost'),
				),
			),
			'icon_font_size' => array(
				'type'    => 'select',
				'label'   => esc_html__('Icon Font Size', 'digiboost'),
				'value'   => 'fs-20',
				'choices' => array(
					//12 14 16 18 20 24 28 32 36 40 56
					'' => esc_html__('Inherit', 'digiboost'),
					'fs-12' => esc_html__('12px', 'digiboost'),
					'fs-14' => esc_html__('14px', 'digiboost'),
					'fs-16' => esc_html__('16px', 'digiboost'),
					'fs-18' => esc_html__('18px', 'digiboost'),
					'fs-20' => esc_html__('20px', 'digiboost'),
					'fs-24' => esc_html__('24px', 'digiboost'),
					'fs-28' => esc_html__('28px', 'digiboost'),
					'fs-32' => esc_html__('32px', 'digiboost'),
					'fs-36' => esc_html__('36px', 'digiboost'),
					'fs-40' => esc_html__('40px', 'digiboost'),
					'fs-56' => esc_html__('56px', 'digiboost'),
				),
			),
			'tab_description'          => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Tab Description', 'digiboost' )
			),
			$accordion_shortcode->get_options(),
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