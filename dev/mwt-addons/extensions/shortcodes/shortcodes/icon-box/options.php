<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//get button to add in a teaser:
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
unset( $button_options['target'] );

$options = array(
	'style'   => array(
		'type'    => 'select',
		'label'   => esc_html__('Box Style', 'digiboost'),
		'choices' => array(
			'top' => esc_html__('Icon above title', 'digiboost'),
			'left' => esc_html__('Icon to the left of title', 'digiboost'),
			'right' => esc_html__('Icon to the right of title', 'digiboost')
		)
	),
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
			'fs-70' => esc_html__('70px', 'digiboost'),
		),
	),
    'heading_tag'            => array(
        'type'    => 'select',
        'value'   => 'h3',
        'label'   => esc_html__( 'Title tag', 'digiboost' ),
        'desc'    => esc_html__( 'Select a tag for your title', 'digiboost' ),
        'choices' => array(
            'h2' => esc_html__( 'H2 tag', 'digiboost' ),
            'h3' => esc_html__( 'H3 tag', 'digiboost' ),
            'h4' => esc_html__( 'H4 tag', 'digiboost' ),
            'h5' => esc_html__( 'H5 tag', 'digiboost' ),
            'h6' => esc_html__( 'H6 tag', 'digiboost' ),
        ),
    ),
	'title'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Box', 'digiboost' ),
	),
	'title_text_weight'    => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Title text weight', 'digiboost' ),
		'desc'    => esc_html__( 'Select a weight for your title in layer', 'digiboost' ),
		'choices' => array(
			''     => esc_html__( 'Normal', 'digiboost' ),
			'bold' => esc_html__( 'Bold', 'digiboost' ),
			'thin' => esc_html__( 'Thin', 'digiboost' ),

		),
	),
	'content' => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Content', 'digiboost' ),
		'desc'  => esc_html__( 'Enter the desired content', 'digiboost' ),
	),
	'text_align' => array(
		'type'    => 'select',
		'label'   => esc_html__('Text alignment', 'digiboost'),
		'value'   => 'text-center text-sm-left',
		'choices' => array(
			'text-center text-sm-left' => esc_html__('Left', 'digiboost'),
			'text-center' => esc_html__('Center', 'digiboost'),
			'text-center text-sm-right' => esc_html__('Right', 'digiboost'),
		),
	),
	'link'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Optional teaser link', 'digiboost' ),
	),
	'class'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Optional additional CSS class', 'digiboost' ),
	),
	'button' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'show_button' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show button', 'digiboost' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'digiboost' ),
				),
				'right-choice' => array(
					'value' => 'button',
					'label' => esc_html__( 'Yes', 'digiboost' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'button' => $button_options,
		),
	)
);