<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in WordPress customizer
 */

//theme defaults
$options_class = new Digiboost_Options();
$defaults      = $options_class->get_default_options_array();

// color defaults
$current_colors = array(
	'accent_color_1' => '',
	'accent_color_2' => '',
	'accent_color_3' => '',
	'accent_color_4' => ''
);

$slider_extension    = fw()->extensions->get( 'slider' );
$choices_blog_slider = '';
if ( ! empty ( $slider_extension ) ) {
	$choices_blog_slider = $slider_extension->get_populated_sliders_choices();
}
//adding empty value to disable slider
$choices_blog_slider['0'] = esc_html__( 'No Slider', 'digiboost' );

$options = array(
	'meta_section'          => array(
		'title'              => esc_html__( 'Theme Meta', 'digiboost' ),
		'options'            => array(
			'meta_phone'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Phone number', 'digiboost' ),
				'desc'  => esc_html__( 'Number to appear in header', 'digiboost' ),
				'help'  => esc_html__( 'Not all headers display this info', 'digiboost' ),
			),
			'meta_email'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Email', 'digiboost' ),
				'desc'  => esc_html__( 'Email to appear in header', 'digiboost' ),
				'help'  => esc_html__( 'Not all headers display this info', 'digiboost' ),
			),
			'meta_address' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Address', 'digiboost' ),
				'desc'  => esc_html__( 'Address to appear in header', 'digiboost' ),
				'help'  => esc_html__( 'Not all headers display this info', 'digiboost' ),
			),
			digiboost_shortcode_options( 'icons_social' ),
		),
		'wp-customizer-args' => array(
			'active_callback' => '__return_true',
			'priority'        => 150,
		),
	),
	'header_section'        => array(
		'title'   => esc_html__( 'Theme Header Section', 'digiboost' ),
		'options' => array(
			'logo_section'            => array(
				'title'   => esc_html__( 'Logo', 'digiboost' ),
				'options' => array(
					'logo_image'         => array(
						'type'               => 'upload',
						'value'              => array(),
						'attr'               => array(
							'class'           => 'logo_image-class',
							'data-logo_image' => 'logo_image'
						),
						'label'              => esc_html__( 'Main logo image that appears in header', 'digiboost' ),
						'desc'               => esc_html__( 'Select your logo', 'digiboost' ),
						'help'               => esc_html__( 'Choose image to display as a site logo', 'digiboost' ),
						'images_only'        => true,
						'files_ext'          => array( 'png', 'jpg', 'jpeg', 'gif' ),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'logo_image_inverse' => array(
						'type'               => 'upload',
						'value'              => array(),
						'attr'               => array(
							'class'           => 'logo_image-class',
							'data-logo_image' => 'logo_image'
						),
						'label'              => esc_html__( 'Main inverse logo image that appears in dark header', 'digiboost' ),
						'desc'               => esc_html__( 'Select your inverse logo', 'digiboost' ),
						'help'               => esc_html__( 'Choose image to display as a site inverse logo', 'digiboost' ),
						'images_only'        => true,
						'files_ext'          => array( 'png', 'jpg', 'jpeg', 'gif' ),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'logo_text'          => array(
						'type'               => 'text',
						'value'              => 'Digiboost',
						'attr'               => array( 'class' => 'logo_text-class', 'data-logo_text' => 'logo_text' ),
						'label'              => esc_html__( 'Logo Text', 'digiboost' ),
						'desc'               => esc_html__( 'Text that appears near logo image', 'digiboost' ),
						'help'               => esc_html__( 'Type your text to show it in logo', 'digiboost' ),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'logo_subtext'       => array(
						'type'               => 'text',
						'value'              => '',
						'attr'               => array( 'class' => 'logo_text-class', 'data-logo_text' => 'logo_text' ),
						'label'              => esc_html__( 'Logo Sub Text', 'digiboost' ),
						'desc'               => esc_html__( 'Text that appears near logo image', 'digiboost' ),
						'help'               => esc_html__( 'Type your text to show it in logo', 'digiboost' ),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
				),
			),
			digiboost_get_header_options_array_for_customizer_and_page( $defaults ),
			'topline_section_options' => array(
				'title'              => esc_html__( 'Topline Section Options', 'digiboost' ),
				'options'            => digiboost_get_section_options_array( 'topline_', array(
					'top_padding',
					'bottom_padding',
					'top_padding_sm',
					'bottom_padding_sm',
					'top_padding_md',
					'bottom_padding_md',
					'top_padding_lg',
					'bottom_padding_lg',
					'top_padding_xl',
					'bottom_padding_xl',
					'columns_padding',
					'columns_vertical_margins',
					'is_align_vertical',

				) ),
				//show topline options only when header layout with topline chosen
				'wp-customizer-args' => array(
					'active_callback' => 'digiboost_topline_is_visible',
				),
			),
			'toplogo_section_options' => array(
				'title'              => esc_html__( 'Toplogo Section Options', 'digiboost' ),
				'options'            => digiboost_get_section_options_array( 'toplogo_', array(
					'top_padding',
					'bottom_padding',
					'top_padding_sm',
					'bottom_padding_sm',
					'top_padding_md',
					'bottom_padding_md',
					'top_padding_lg',
					'bottom_padding_lg',
					'top_padding_xl',
					'bottom_padding_xl',
					'columns_padding',
					'columns_vertical_margins',
					'is_align_vertical',

				) ),
				'wp-customizer-args' => array(
					'active_callback' => 'digiboost_toplogo_is_visible',
				),
			),
		),
	),
	'title_section'         => array(
		'title'   => esc_html__( 'Theme Title Section', 'digiboost' ),
		'options' => array(
			'title_layout'          => array(
				'title'   => esc_html__( 'Title Section Layout', 'digiboost' ),
				'options' => array(
					'page_title'      => array(
						'type'               => 'select',
						'value'              => $defaults['page_title'],
						'attr'               => array(
							'class' => 'breadcrumbs-thumbnail',
						),
						'label'              => esc_html__( 'Page title sections with optional breadcrumbs', 'digiboost' ),
						'desc'               => esc_html__( 'Select one of predefined page title sections. Install Unyson Breadcrumbs extension to display breadcrumbs', 'digiboost' ),
						'help'               => esc_html__( 'You can select one of predefined theme title sections', 'digiboost' ),
						'choices'            => array(
							'1' => esc_html__( 'Default - title above breadcrumbs', 'digiboost' ),
							'2' => esc_html__( 'Left title with right breadcrumbs', 'digiboost' ),
							'3' => esc_html__( 'Left title with inline breadcrumbs', 'digiboost' ),
							'4' => esc_html__( 'Centered title with bottom right breadcrumbs', 'digiboost' ),
							'5' => esc_html__( 'Left small title with bottom small breadcrumbs', 'digiboost' ),
							'6' => esc_html__( 'Centered small title with bottom small breadcrumbs', 'digiboost' ),
						),
						'blank'              => false, // (optional) if true, image can be deselected
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'hide_term_title' => array(
						'type'               => 'switch',
						'value'              => true,
						'label'              => esc_html__( 'Hide Term Name', 'digiboost' ),
						'desc'               => esc_html__( 'May to hide Archive or Taxonomy Name, such as \'Archives: \', \'Category: \', \'Tag: \', etc. ', 'digiboost' ),
						'right-choice'       => array(
							'value' => false,
							'label' => esc_html__( 'Show', 'digiboost' )
						),
						'left-choice'        => array(
							'value' => true,
							'label' => esc_html__( 'Hide', 'digiboost' )
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
				),
			),
			'title_section_options' => array(
				'title'              => esc_html__( 'Title Section Options', 'digiboost' ),
				'options'            => digiboost_get_section_options_array( 'title_', array(
					'columns_padding',
					'columns_vertical_margins',
					'is_align_vertical',
				) ),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'title_section_padding' => array(
				'title'              => esc_html__( 'Title Section Padding', 'digiboost' ),
				'options'            => digiboost_unyson_option_get_section_padding_array( 'title_' ),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
		),
	),
	'footer_section'        => array(
		'title'   => esc_html__( 'Theme Footer Section', 'digiboost' ),
		'options' => array(
			digiboost_get_footer_options_array_for_customizer_and_page( $defaults )
		),
	),
	'copyright_section'     => array(
		'title'   => esc_html__( 'Theme Copyright Section', 'digiboost' ),
		'options' => array(
			'copyright_layout'          => array(
				'title'   => esc_html__( 'Copyright Section Layout', 'digiboost' ),
				'options' => array(
					'page_copyright'  => array(
						'type'               => 'select',
						'value'              => $defaults['page_copyright'],
						'label'              => esc_html__( 'Page copyright', 'digiboost' ),
						'desc'               => esc_html__( 'Select one of predefined page copyright sections.', 'digiboost' ),
						'help'               => esc_html__( 'You can select one of predefined theme copyright section', 'digiboost' ),
						'choices'            => array(
							'1' => esc_html__( 'One centered column', 'digiboost' ),
							'2' => esc_html__( 'Two columns', 'digiboost' ),
							'3' => esc_html__( 'Three columns with logo and menu', 'digiboost' ),
							'4' => esc_html__( 'Two columns with menu', 'digiboost' ),
						),
						'blank'              => false, // (optional) if true, image can be deselected
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'copyright_text'  => array(
						'type'               => 'textarea',
						'value'              => '&copy; Digiboost <span class="copyright_year">2020</span> | Created with <i class="fa fa-heart color-main"></i> by Author',
						'label'              => esc_html__( 'Copyright text', 'digiboost' ),
						'desc'               => esc_html__( 'Please type your copyright text', 'digiboost' ),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'copyright_text2' => array(
						'type'               => 'textarea',
						'value'              => 'Theme: Digiboost',
						'label'              => esc_html__( 'Copyright secondary text', 'digiboost' ),
						'desc'               => esc_html__( 'Please type your copyright secondary text', 'digiboost' ),
						'wp-customizer-args' => array(
							'active_callback' => 'digiboost_copyright_secondary_text_is_visible',
						),
					),
					'copyright_logo'  => array(
						'type'               => 'upload',
						'value'              => '',
						'label'              => esc_html__( 'Copyright logo', 'digiboost' ),
						'desc'               => esc_html__( 'Appears in certain copyright layouts', 'digiboost' ),
						'wp-customizer-args' => array(
							'active_callback' => 'digiboost_copyright_logo_is_visible',
						),
					),
				),
			),
			'copyright_section_options' => array(
				'title'              => esc_html__( 'Copyright Section Options', 'digiboost' ),
				'options'            => digiboost_get_section_options_array( 'copyright_' ),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'copyright_section_padding' => array(
				'title'              => esc_html__( 'Copyright Section Padding', 'digiboost' ),
				'options'            => digiboost_unyson_option_get_section_padding_array( 'copyright_' ),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
		),
	),
	'404_panel'             => array(
		'title'   => esc_html__( 'Theme 404 page', 'digiboost' ),
		'options' => array(
			'404_section_main_options' => array(
				'title'   => esc_html__( '404 Section Main Options', 'digiboost' ),
				'options' => array(
					'404_text' => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_html__( 'Text of 404', 'digiboost' ),
					),
				),

			),


			'404_section_options' => array(
				'title'              => esc_html__( '404 Section Options', 'digiboost' ),
				'options'            => digiboost_get_section_options_array( '404_', array(
					'columns_padding',
					'columns_vertical_margins',
					'is_align_vertical',
				) ),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
				'image_text'         => array(
					'type'        => 'upload',
					'value'       => '',
					'label'       => esc_html__( 'Image', 'digiboost' ),
					'images_only' => true,
				),
			),
			'404_section_padding' => array(
				'title'              => esc_html__( '404 Section Padding', 'digiboost' ),
				'options'            => digiboost_unyson_option_get_section_padding_array( '404_' ),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
		)
	),
	'fonts_section'         => array(
		'title'   => esc_html__( 'Theme Fonts', 'digiboost' ),
		'options' => array(
			'body_fonts_section' => array(
				'title'              => esc_html__( 'Font for body', 'digiboost' ),
				'options'            => array(
					'body_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'main_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'digiboost' ),
								'desc'         => esc_html__( 'Enable custom body font', 'digiboost' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'digiboost' ),
								),
								'right-choice' => array(
									'value' => 'main_font_options',
									'label' => esc_html__( 'Enabled', 'digiboost' ),
								),
							),
						),
						'choices' => array(
							'main_font_options' => array(
								'main_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight' like so:
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 14,
										'line-height'    => 24,
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => true,
										'line-height'    => true,
										'letter-spacing' => true,
										'color'          => false
									),
									'label'      => esc_html__( 'Custom font', 'digiboost' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'digiboost' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'digiboost' ),
								),
							),
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),

			'headings_fonts_section' => array(
				'title'              => esc_html__( 'Font for headings', 'digiboost' ),
				'options'            => array(
					'h_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'h_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'digiboost' ),
								'desc'         => esc_html__( 'Enable custom heading font', 'digiboost' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'digiboost' ),
								),
								'right-choice' => array(
									'value' => 'h_font_options',
									'label' => esc_html__( 'Enabled', 'digiboost' ),
								),
							),
						),
						'choices' => array(
							'h_font_options' => array(
								'h_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 28,
										'line-height'    => '100%',
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => false,
										'line-height'    => false,
										'letter-spacing' => true,
										'color'          => false
									),
									'label'      => esc_html__( 'Custom font', 'digiboost' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'digiboost' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'digiboost' ),
								),
							),
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),

		),
	),
	'theme_options_section' => array(
		'title'   => esc_html__( 'Theme Options', 'digiboost' ),
		'options' => array(
			'layout_section'       => array(
				'title'              => esc_html__( 'Theme Layout', 'digiboost' ),
				'options'            => array(
					'layout' => array(
						'type'    => 'multi-picker',
						'value'   => 'wide',
						'attr'    => array( 'class' => 'theme-layout-class', 'data-theme-layout' => 'layout' ),
						'label'   => esc_html__( 'Theme layout', 'digiboost' ),
						'desc'    => esc_html__( 'Wide or Boxed layout', 'digiboost' ),
						'picker'  => array(
							'boxed' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => false,
								'desc'         => false,
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Wide', 'digiboost' ),
								),
								'right-choice' => array(
									'value' => 'boxed_options',
									'label' => esc_html__( 'Boxed', 'digiboost' ),
								),
							),
						),
						'choices' => array(
							'boxed_options' => array(
								'body_background_image' => array(
									'type'        => 'upload',
									'value'       => '',
									'label'       => esc_html__( 'Body background image', 'digiboost' ),
									'help'        => esc_html__( 'Choose body background image if needed.', 'digiboost' ),
									'images_only' => true,
								),
								'body_cover'            => array(
									'type'         => 'switch',
									'value'        => '',
									'label'        => esc_html__( 'Parallax background', 'digiboost' ),
									'desc'         => esc_html__( 'Enable full width background for body', 'digiboost' ),
									'left-choice'  => array(
										'value' => '',
										'label' => esc_html__( 'No', 'digiboost' ),
									),
									'right-choice' => array(
										'value' => 'yes',
										'label' => esc_html__( 'Yes', 'digiboost' ),
									),
								),
								'boxed_extra_margins'   => array(
									'type'         => 'switch',
									'value'        => '',
									'label'        => esc_html__( 'Additional margins', 'digiboost' ),
									'desc'         => esc_html__( 'Enable additional margins for boxed container', 'digiboost' ),
									'left-choice'  => array(
										'value' => '',
										'label' => esc_html__( 'No', 'digiboost' ),
									),
									'right-choice' => array(
										'value' => 'yes',
										'label' => esc_html__( 'Yes', 'digiboost' ),
									),
								),
							),
						),

					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'version_section'      => array(
				'title'              => esc_html__( 'Theme Variant', 'digiboost' ),
				'options'            => array(
					'version' => array(
						'type'    => 'radio',
						'value'   => 'light',
						'attr'    => array( 'class' => 'theme-layout-class', 'data-theme-layout' => 'layout' ),
						'label'   => esc_html__( 'Theme Version', 'digiboost' ),
						'desc'    => esc_html__( 'Light or dark version', 'digiboost' ),
						'help'    => esc_html__( 'Select one of predefined versions', 'digiboost' ),
						'choices' => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
							'ls' => esc_html__( 'Light', 'digiboost' ),
							'ds' => esc_html__( 'Dark', 'digiboost' ),
						),
						// Display choices inline instead of list
						'inline'  => true,
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'color_scheme_section' => array(
				'title'              => esc_html__( 'Theme Color Scheme', 'digiboost' ),
				'options'            => array(
					'accent_color_1' => array(
						'label'                      => esc_html__( 'Override first color scheme', 'digiboost' ),
						'desc'                       => esc_html__( 'Accent Color 1', 'digiboost' ),
						'help'                       => esc_html__( 'This colors are used for regenerate predefined "css/main.css" file with first color scheme. Remove custom color values for reset first color scheme to defaults.', 'digiboost' ),
						'type'                       => 'color-picker',
						'value'                      => $current_colors['accent_color_1'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
					'accent_color_2' => array(
						'label'                      => false,
						'desc'                       => esc_html__( 'Accent Color 2', 'digiboost' ),
						'type'                       => 'color-picker',
						'value'                      => $current_colors['accent_color_2'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
					'accent_color_3' => array(
						'label'                      => false,
						'desc'                       => esc_html__( 'Accent Color 3', 'digiboost' ),
						'type'                       => 'color-picker',
						'value'                      => $current_colors['accent_color_3'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
					'accent_color_4' => array(
						'label'                      => false,
						'desc'                       => esc_html__( 'Accent Color 4', 'digiboost' ),
						'type'                       => 'color-picker',
						'value'                      => $current_colors['accent_color_4'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'blog_section'         => array(
				'title'              => esc_html__( 'Theme Blog Options', 'digiboost' ),
				'options'            => array(
					'blog_layout'              => array(
						'type'               => 'select',
						'value'              => '1',
						'label'              => esc_html__( 'Blog layout', 'digiboost' ),
						'desc'               => esc_html__( 'Select one of predefined blog layouts', 'digiboost' ),
						'choices'            => array(
							'1'    => '1',
							'2'    => '2',
							'3'    => '3',
							'4'    => '4',
							'grid' => 'Grid',
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_categories'     => array(
						'type'               => 'switch',
						'value'              => false,
						'label'              => esc_html__( 'Hide categories in blog feed', 'digiboost' ),
						'left-choice'        => array(
							'value' => false,
							'label' => esc_html__( ' Show', 'digiboost' ),
						),
						'right-choice'       => array(
							'value' => true,
							'label' => esc_html__( ' Hide', 'digiboost' ),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_tags'           => array(
						'type'               => 'switch',
						'value'              => false,
						'label'              => esc_html__( 'Hide tags in blog feed', 'digiboost' ),
						'left-choice'        => array(
							'value' => false,
							'label' => esc_html__( ' Show', 'digiboost' ),
						),
						'right-choice'       => array(
							'value' => true,
							'label' => esc_html__( ' Hide', 'digiboost' ),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_author'         => array(
						'type'               => 'switch',
						'value'              => false,
						'label'              => esc_html__( 'Hide author in blog feed', 'digiboost' ),
						'left-choice'        => array(
							'value' => false,
							'label' => esc_html__( ' Show', 'digiboost' ),
						),
						'right-choice'       => array(
							'value' => true,
							'label' => esc_html__( ' Hide', 'digiboost' ),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_date'           => array(
						'type'               => 'switch',
						'value'              => false,
						'label'              => esc_html__( 'Hide date in blog feed', 'digiboost' ),
						'left-choice'        => array(
							'value' => false,
							'label' => esc_html__( ' Show', 'digiboost' ),
						),
						'right-choice'       => array(
							'value' => true,
							'label' => esc_html__( ' Hide', 'digiboost' ),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_comments_link'  => array(
						'type'               => 'switch',
						'value'              => false,
						'label'              => esc_html__( 'Hide comments link in blog feed', 'digiboost' ),
						'left-choice'        => array(
							'value' => false,
							'label' => esc_html__( ' Show', 'digiboost' ),
						),
						'right-choice'       => array(
							'value' => true,
							'label' => esc_html__( ' Hide', 'digiboost' ),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_slider_switch'       => array(
						'type'               => 'multi-picker',
						'label'              => false,
						'desc'               => false,
						'picker'             => array(
							'blog_slider_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Blog slider', 'digiboost' ),
								'desc'         => esc_html__( 'Enable slider on blog page', 'digiboost' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'No', 'digiboost' ),
								),
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__( 'Yes', 'digiboost' ),
								),
							),
						),
						'choices'            => array(
							'yes' => array(
								'slider_id' => array(
									'type'    => 'select',
									'value'   => '',
									'label'   => esc_html__( 'Select Slider', 'digiboost' ),
									'choices' => $choices_blog_slider
								),
							),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_posts_widget_switch' => array(
						'type'               => 'switch',
						'value'              => '',
						'label'              => esc_html__( 'Post widget', 'digiboost' ),
						'desc'               => esc_html__( 'Enable posts widget on blog page', 'digiboost' ),
						'left-choice'        => array(
							'value' => '',
							'label' => esc_html__( 'No', 'digiboost' ),
						),
						'right-choice'       => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'digiboost' ),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'preloader_panel'      => array(
				'title'   => esc_html__( 'Theme Preloader', 'digiboost' ),
				'options' => array(
					'preloader'              => array(
						'type'               => 'multi-picker',
						'label'              => false,
						'desc'               => false,
						'value'              => array(
							'css' => 'css',
						),
						'picker'             => array(
							'preloader_type' => array(
								'label'   => esc_html__( 'Choose preloader type', 'digiboost' ),
								'type'    => 'select', // or 'short-select'
								'value'   => 'css',
								'choices' => array(
									'css'          => esc_html__( 'Default', 'digiboost' ),
									'image'        => esc_html__( 'Default Image', 'digiboost' ),
									'image_custom' => esc_html__( 'Custom Image', 'digiboost' ),
									'disabled'     => esc_html__( 'Disabled', 'digiboost' ),
								),
								'help'    => esc_html__( 'You can use default CSS or Image preloader, use your own image or disable preloader', 'digiboost' ),
							)
						),
						'choices'            => array(
							'css'          => array(
								'options' => array(
									'type'  => 'hidden',
									'value' => 'css',
								)
							),
							'image'        => array(
								'options' => array(
									'type'  => 'hidden',
									'value' => 'image',
								),
							),
							'image_custom' => array(
								'options' => array(
									'type'        => 'upload',
									'value'       => '',
									'label'       => esc_html__( 'Custom preloader image', 'digiboost' ),
									'help'        => esc_html__( 'GIF image recommended. Recommended maximum preloader width 150px, maximum preloader height 150px.', 'digiboost' ),
									'images_only' => true,
								),
							),
							'disabled'     => array(
								'options' => array(
									'type'  => 'hidden',
									'value' => false,
								),
							),
						),
						/**
						 * (optional) if is true, the borders between choice options will be shown
						 */
						'show_borders'       => false,
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'preloader_custom_class' => array(
						'type'               => 'text',
						'label'              => esc_html__( 'Additional CSS class', 'digiboost' ),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					)
				),
			),
			'share_buttons'        => array(
				'title' => esc_html__( 'Theme Share Buttons', 'digiboost' ),

				'options'            => array(
					'share_facebook'  => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable Facebook Share Button', 'digiboost' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'digiboost' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'digiboost' ),
						),
					),
					'share_twitter'   => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable Twitter Share Button', 'digiboost' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'digiboost' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'digiboost' ),
						),
					),
					'share_pinterest' => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable Pinterest Share Button', 'digiboost' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'digiboost' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'digiboost' ),
						),
					),
					'share_linkedin'  => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable LinkedIn Share Button', 'digiboost' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'digiboost' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'digiboost' ),
						),
					),
					'share_tumblr'    => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable Tumblr Share Button', 'digiboost' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'digiboost' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'digiboost' ),
						),
					),
					'share_reddit'    => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable Reddit Share Button', 'digiboost' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'digiboost' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'digiboost' ),
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => 'digiboost_shared_buttons_options_is_visible',
				),
			),
			'sliding_section'      => array(
				'title'   => esc_html__( 'Sliding Speed', 'digiboost' ),
				'options' => array(

					'slide_speed' => array(
						'type'  => 'text',
						'value' => '5',
						'label' => esc_html__( 'Global Sliding Speed', 'digiboost' ),
						'desc'  => esc_html__( 'Applied to all sliders, carousels, testimonials, etc.', 'digiboost' )
						           . '<br>' . esc_html__( '( in seconds )', 'digiboost' ),
					)
				)
			),
		),
	),
);