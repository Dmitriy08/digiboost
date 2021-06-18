<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$main_options = digiboost_get_section_options_array();
//adding overflow_visible for section
$main_options['overflow_visible'] = array(
	'type'  => 'switch',
	'value' => false,
	'label' => esc_html__('Overflow visible', 'digiboost'),
	'desc'  => esc_html__('Show content that do not fit in section', 'digiboost'),
	'left-choice' => array(
		'value' => false,
		'label' => esc_html__('No', 'digiboost'),
	),
	'right-choice' => array(
		'value' => true,
		'label' => esc_html__('Yes', 'digiboost'),
	)
);
//adding section name for builder backend view
$main_options['section_name'] = array(
	'type'  => 'text',
	'value' => '',
	'label' => esc_html__('Optional section name', 'digiboost'),
);

$options = array(
	'unique_id' => array(
		'type' => 'unique',
		'length' => 7
	),
	'tab_main_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Main Options', 'digiboost'),
		'options' => $main_options,
	),
	'tab_padding_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Section Padding', 'digiboost'),
		'options' => digiboost_unyson_option_get_section_padding_array(),
	),
	'tab_onehalf_media_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Side Media', 'digiboost'),
		'options' => array(
			'side_media_image' => array(
				'type'  => 'upload',
				'value' => array(),
				'label' => esc_html__('Side media image', 'digiboost'),
				'desc'  => esc_html__('Select image that you want to appear as one half side image', 'digiboost'),
				'images_only' => true,
			),
			'side_media_link' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Link to your side media', 'digiboost'),
				'desc'  => esc_html__('You can add a link to your side media. If YouTube link will be provided, video will play in LightBox', 'digiboost'),
			),
			'side_media_video' => array(
				'type'    => 'oembed',
				'value'   => '',
				'label'   => esc_html__( 'Video', 'digiboost' ),
				'desc'    => esc_html__( 'Adds video player. Works only when side media image is set', 'digiboost' ),
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
			'side_media_position'  => array(
				'type'  => 'switch',
				'value' => 'left',
				'label' => esc_html__('Media position', 'digiboost'),
				'desc'  => esc_html__('Left or right media position', 'digiboost'),
				'left-choice' => array(
					'value' => 'left',
					'label' => esc_html__('Left', 'digiboost'),
				),
				'right-choice' => array(
					'value' => 'right',
					'label' => esc_html__('Right', 'digiboost'),
				),
			),
			'side_media_overlay'  => array(
				'type'  => 'switch',
				'value' => 'left',
				'label' => esc_html__('Media overlay', 'digiboost'),
				'desc'  => esc_html__('Show media overlay', 'digiboost'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__('No', 'digiboost'),
				),
				'right-choice' => array(
					'value' => 's-overlay',
					'label' => esc_html__('Yes', 'digiboost'),
				),
			),
			'side_media_visibility'  => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Media Show On Small Screens', 'digiboost'),
				'desc'  => esc_html__('Show media on small screens < 991px', 'digiboost'),
				'left-choice' => array(
					'value' => 'd-none d-lg-block',
					'label' => esc_html__('No', 'digiboost'),
				),
				'right-choice' => array(
					'value' => '',
					'label' => esc_html__('Yes', 'digiboost'),
				),
			),
			'side_media_width' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Media Size', 'digiboost' ),
				'help'    => esc_html__( 'Choose type of size media', 'digiboost' ),
				'choices' => array(
					''      => esc_html__( 'Default', 'digiboost' ),
					's-cover-small'      => esc_html__( 'Media Small Size', 'digiboost' ),
				),
			),
		),
	),
	'tab_responsive' => array(
		'type' => 'tab',
		'title' => esc_html__('Responsive', 'digiboost'),
		'options' => array(
			'responsive_visibility' => array(
				'type' => 'tab',
				'title' => esc_html__('Visibility', 'digiboost'),
				'options' => digiboost_unyson_option_responsive_options_array(),
			),
			'responsive_horizontal_padding' => array(
				'type' => 'tab',
				'title' => esc_html__('Horizontal padding', 'digiboost'),
				'options' => array(
					'container-px-padding' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Horizontal padding', 'digiboost' ),
						'help'    => esc_html__( 'Choose horizontal padding value for section',
							'digiboost' ),
						'choices' => array(
							''      => esc_html__( 'default (15px)', 'digiboost' ),
							'container-px-xl-0'      => esc_html__( 'none (0px)', 'digiboost' ),
							'container-px-xl-5'      => esc_html__( 'Custom (5px)', 'digiboost' ),
							'container-px-xl-10'      => esc_html__( 'Custom (10px)', 'digiboost' ),
							'container-px-lg-20'      => esc_html__( 'Custom (20px)', 'digiboost' ),
							'container-px-lg-30'      => esc_html__( 'Custom (30px)', 'digiboost' ),
						),
					),

				)
			),
		),
	),
	'tab_background_extended' => array(
		'type' => 'tab',
		'title' => esc_html__('Background Video', 'digiboost'),
		'options' => array(
			'background_video' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'type' => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Background Type', 'digiboost' ),
						'desc'    => esc_html__( 'Here you can choose section background type', 'digiboost' ),
						'value'   => '',
						'choices' => array(
							'' => esc_html__( 'None', 'digiboost' ),
							'video_oembed'    => esc_html__( 'Video OEmbed', 'digiboost' ),
							'video_upload'    => esc_html__( 'Video Upload', 'digiboost' ),
						)
					)
				),
				'choices' => array(
					'video_oembed'    => array(
						'video' => array(
							'desc'  => esc_html__( 'Insert your video URL', 'digiboost' ),
							'type'  => 'text',
						),
						'poster' => array(
							'label'   => esc_html__( 'Replacement Image', 'digiboost' ),
							'type'    => 'background-image',
							'help'    => esc_html__('This image will replace the video on mobile devices that disable background videos', 'digiboost'),
						),
						'loop_video'      => array(
							'label'        => esc_html__( 'Loop Video', 'digiboost' ),
							'desc'         => esc_html__( 'Enable loop video?', 'digiboost' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'digiboost' )
							),
							'left-choice'  => array(
								'value' => 'no',
								'label' => esc_html__( 'No', 'digiboost' )
							),
							'value'        => 'yes',
						),
					),
					'video_upload' => array(
						'video'  => array(
							'desc'        => esc_html__( 'Upload a video', 'digiboost' ),
							'images_only' => false,
							'type'        => 'upload',
						),
						'poster' => array(
							'label'   => esc_html__( 'Replacement Image', 'digiboost' ),
							'type'    => 'background-image',
							'help'    => esc_html__('This image will replace the video on mobile devices that disable background videos', 'digiboost'),
						),
						'loop_video'      => array(
							'label'        => esc_html__( 'Loop Video', 'digiboost' ),
							'desc'         => esc_html__( 'Enable loop video?', 'digiboost' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'digiboost' )
							),
							'left-choice'  => array(
								'value' => 'no',
								'label' => esc_html__( 'No', 'digiboost' )
							),
							'value'        => 'yes',
						),
					),
				)
			),
		),

	),
);
