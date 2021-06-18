<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get button to add:
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();

$options = array(
	'tab_main' => array(
		'type' => 'tab',
		'title' => esc_html__('Info', 'digiboost'),
		'options' => array(
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
					'fs-52' => esc_html__('52px', 'digiboost'),
					'fs-56' => esc_html__('56px', 'digiboost'),
					'fs-60' => esc_html__('60px', 'digiboost'),
					'fs-70' => esc_html__('70px', 'digiboost'),
				),
			),
            'title'   => array(
                'type'  => 'text',
                'value' => '',
                'label' => esc_html__( 'Pricing plan title', 'digiboost' ),
            ),
			'currency'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Currency Sign', 'digiboost' ),
			),
			'price'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Whole price', 'digiboost' ),
				'desc' => esc_html__( 'Price before decimal divider', 'digiboost' ),
			),
			'price_after'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Text after price', 'digiboost' ),
				'desc' => esc_html__( 'Price after decimal divider, including divider (dot, coma etc.), for example ".99", or text "per month"', 'digiboost' ),
			),
			'features'         => array(
				'type'            => 'addable-box',
				'value'           => '',
				'label'           => esc_html__( 'Pricing plan features', 'digiboost' ),
				'box-options'     => array(
					'feature_name'   => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_html__( 'Feature name', 'digiboost' ),
					),
					'feature_checked' => array(
						'type'        => 'select',
						'value'       => '',
						'label'       => esc_html__( 'Default, checked or unchecked', 'digiboost' ),
						'choices'     => array(
							'default' => esc_html__( 'Default', 'digiboost' ),
							'enabled' => esc_html__( 'Enabled', 'digiboost' ),
							'disabled' => esc_html__( 'Disabled', 'digiboost'),
						),
						'no-validate' => false,
					),
				),
				'template'        => '{{=feature_name}}',
				'limit'           => 0, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'digiboost' ),
				'sortable'        => true,
			),
			'featured' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Default or featured plan', 'digiboost'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__(' Default', 'digiboost'),
				),
				'right-choice' => array(
					'value' => 'cs',
					'label' => esc_html__(' Featured', 'digiboost'),
				),
			),
			'layout' => array(
				'label'   => esc_html__('Choose layout', 'digiboost'),
				'type'    => 'select', // or 'short-select'
				'value'   => '1',
				'choices' => array(
					'1'  => esc_html__('Default', 'digiboost'),
					'2' => esc_html__('Second', 'digiboost'),
					'3' => esc_html__('Third', 'digiboost'),
				),
			)
		),
	),
	'tab_button' => array(
		'type' => 'tab',
		'title' => esc_html__('Button', 'digiboost'),
		'options' => array(
			$button_options,
		),
	),


);