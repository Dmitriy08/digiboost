<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'box_id' => array(
		'type'    => 'box',
		'title'   => esc_html__( 'Options for child categories', 'digiboost' ),
		'options' => array(
            'background_color' => array(
                'type'    => 'select',
                'value'   => '',
                'label'   => esc_html__( 'Background color', 'digiboost' ),
                'desc'    => esc_html__( 'Select background color', 'digiboost' ),
                'help'    => esc_html__( 'Select one of predefined background types', 'digiboost' ),
                'choices' => digiboost_unyson_option_get_backgrounds_array(),
            ),
			'layout'        => array(
				'label'   => esc_html__( 'Portfolio Layout', 'digiboost' ),
				'desc'    => esc_html__( 'Choose projects layout', 'digiboost' ),
				'value'   => 'isotope',
				'type'    => 'select',
				'choices' => array(
					'carousel' => esc_html__( 'Carousel', 'digiboost' ),
					'isotope'  => esc_html__( 'Masonry Grid', 'digiboost' ),
                    'isotope-tiled'  => esc_html__( 'Tiled Grid', 'digiboost' ),
				)
			),
			'item_layout'   => array(
				'label'   => esc_html__( 'Item layout', 'digiboost' ),
				'desc'    => esc_html__( 'Choose Item layout', 'digiboost' ),
				'value'   => 'item-regular',
				'type'    => 'select',
				'choices' => array(
					'item-regular'  => esc_html__( 'Regular (just image)', 'digiboost' ),
					'item-title'    => esc_html__( 'Image with title', 'digiboost' ),
					'item-extended' => esc_html__( 'Image with title and excerpt', 'digiboost' ),
				)
			),
			'full_width'    => array(
				'type'         => 'switch',
				'value'        => false,
				'label'        => esc_html__( 'Full width gallery', 'digiboost' ),
				'desc'         => esc_html__( 'Enable full width container for gallery', 'digiboost' ),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'No', 'digiboost' ),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Yes', 'digiboost' ),
				),
			),
			'margin'        => array(
				'label'   => esc_html__( 'Horizontal item margin (px)', 'digiboost' ),
				'desc'    => esc_html__( 'Select horizontal item margin', 'digiboost' ),
				'value'   => '30',
				'type'    => 'select',
				'choices' => array(
					'0'  => esc_html__( '0', 'digiboost' ),
					'1'  => esc_html__( '1px', 'digiboost' ),
					'2'  => esc_html__( '2px', 'digiboost' ),
					'10' => esc_html__( '10px', 'digiboost' ),
					'30' => esc_html__( '30px', 'digiboost' ),
				)
			),
			'responsive_lg' => array(
				'label'   => esc_html__( 'Columns on large screens', 'digiboost' ),
				'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'digiboost' ),
				'value'   => '4',
				'type'    => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'digiboost' ),
					'2' => esc_html__( '2', 'digiboost' ),
					'3' => esc_html__( '3', 'digiboost' ),
					'4' => esc_html__( '4', 'digiboost' ),
					'6' => esc_html__( '6', 'digiboost' ),
				)
			),
			'responsive_md' => array(
				'label'   => esc_html__( 'Columns on middle screens', 'digiboost' ),
				'desc'    => esc_html__( 'Select items number on middle screens (>992px)', 'digiboost' ),
				'value'   => '3',
				'type'    => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'digiboost' ),
					'2' => esc_html__( '2', 'digiboost' ),
					'3' => esc_html__( '3', 'digiboost' ),
					'4' => esc_html__( '4', 'digiboost' ),
					'6' => esc_html__( '6', 'digiboost' ),
				)
			),
			'responsive_sm' => array(
				'label'   => esc_html__( 'Columns on small screens', 'digiboost' ),
				'desc'    => esc_html__( 'Select items number on small screens (>768px)', 'digiboost' ),
				'value'   => '2',
				'type'    => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'digiboost' ),
					'2' => esc_html__( '2', 'digiboost' ),
					'3' => esc_html__( '3', 'digiboost' ),
					'4' => esc_html__( '4', 'digiboost' ),
					'6' => esc_html__( '6', 'digiboost' ),
				)
			),
			'responsive_xs' => array(
				'label'   => esc_html__( 'Columns on extra small screens', 'digiboost' ),
				'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'digiboost' ),
				'value'   => '1',
				'type'    => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'digiboost' ),
					'2' => esc_html__( '2', 'digiboost' ),
					'3' => esc_html__( '3', 'digiboost' ),
					'4' => esc_html__( '4', 'digiboost' ),
					'6' => esc_html__( '6', 'digiboost' ),
				)
			),
			'show_filters'  => array(
				'type'         => 'switch',
				'value'        => false,
				'label'        => esc_html__( 'Show filters', 'digiboost' ),
				'desc'         => esc_html__( 'Hide or show categories filters', 'digiboost' ),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'No', 'digiboost' ),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Yes', 'digiboost' ),
				),
			),
			'items_per_page' => array(
				'type'  => 'select',
				'value' => '12',
				'label' => esc_html__( 'Items Per Page', 'digiboost' ),
				'choices' => array(
					'2' =>  esc_html__('2 Items', 'digiboost'),
					'3' =>  esc_html__('3 Items', 'digiboost'),
					'4' =>  esc_html__('4 Items', 'digiboost'),
					'6' =>  esc_html__('6 Items', 'digiboost'),
					'8' =>  esc_html__('8 Items', 'digiboost'),
					'9' =>  esc_html__('9 Items', 'digiboost'),
					'12' =>  esc_html__('12 Items', 'digiboost'),
					'16' =>  esc_html__('16 Items', 'digiboost'),
				),
			)

		)
	)
);