<?php

//Main theme options class
class Digiboost_Options
{
    public $self;
    public $customizer_options;
    public $default_fonts_array;

    public function __construct() {

        //singleton
        if ( $this->self ) {
            return $this->self;
        } else {
            $this->self = $this;
        }

        //set default fonts property
        $this->default_fonts_array = $this->set_default_fonts_array();

        //all customizer options here
        //default values needs for theme without unyson istalled
        $default_options = $this->get_default_options_array();
        $customizer_options = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option() : array();

        //additional option array keys that we are using in theme for check
        //if Unyson installed
        $customizer_options['fw'] = defined( 'FW' ) ? true : false;
        //if WooCommerce installed
        $customizer_options['woo'] = class_exists( 'WooCommerce' ) ? true : false;

        //customizer options overwriting default options
        $this->customizer_options = wp_parse_args( $customizer_options, $default_options );
    }

    //get option value from whole options array
    public function get_customizer_option( $option_name, $default_value = '' ) {
        return ( !empty( $this->customizer_options[ $option_name ] ) ) ? $this->customizer_options[ $option_name ] : $default_value;
    }

    //theme default fonts for include
    public function set_default_fonts_array() {
        //put default google fonts here
        return array(

            'Roboto' => array(
                'google_font' => true,
                'subset' => 'latin-ext',
                'variation' => '300',
                'variants' => array( '300', '300i', '500', '500i','700' ),
                'family' => 'Roboto',
                'style' => false,
                'weight' => false,
                'size' => '16',
                'line-height' => '24',
                'letter-spacing' => '0',
                'color' => false,
            ),
			'Anton' => array(
				'google_font' => true,
				'subset' => 'latin-ext',
				'variation' => '400',
				'variants' => array( '400' ),
				'family' => 'Anton',
				'style' => false,
				'weight' => false,
				'size' => '16',
				'line-height' => '24',
				'letter-spacing' => '0',
				'color' => false,
			),
        );
    }

    //theme default configuration options
    //need do var_export($options) in header.php and put result array here with default values
    public function get_default_options_array() {
        return array (
			'meta_phone' => '',
			'meta_email' => '',
			'meta_address' => '',
			'social_icons' => '',
			'logo_image' =>
				array (
					'attachment_id' => '45',
					'url' => DIGIBOOST_THEME_URI . '/img/logo.png',
				),
			'logo_image_inverse' =>
				array (
					'attachment_id' => '45',
					'url' => DIGIBOOST_THEME_URI . '/img/logo.png',
				),
			'logo_text' => 'Digiboost',
			'logo_subtext' => '',
			'page_header' => '1',
			'header_absolute' => '',
			'header_search' => '',
			'header_show_all_menu_items' => false,
			'header_disable_affix_xl' => false,
			'header_disable_affix_xs' => false,
			'header_is_fluid' => true,
			'header_background_color' => 'ds ms',
			'header_background_image' =>
				array (
					'type' => 'custom',
					'custom' => '',
					'predefined' => '',
					'data' =>
						array (
							'icon' => '',
							'css' =>
								array (
								),
						),
				),
			'header_particles' => false,
			'header_background_cover' => false,
			'header_parallax' => false,
			'header_background_overlay' => false,
			'header_background_half_overlay' => false,
			'header_background_overlay_mobile' => false,
			'header_background_gradientradial' => false,
			'header_border_top' => '',
			'header_border_bottom' => '',
			'header_section_class' => '',
			'header_section_id' => '',
			'topline_is_fluid' => false,
			'topline_background_color' => 'ls',
			'topline_background_image' => '',
			'topline_particles' => false,
			'topline_background_cover' => false,
			'topline_parallax' => false,
			'topline_background_overlay' => false,
			'topline_background_half_overlay' => false,
			'topline_background_overlay_mobile' => false,
			'topline_background_gradientradial' => false,
			'topline_border_top' => '',
			'topline_border_bottom' => '',
			'topline_section_class' => '',
			'topline_section_id' => '',
			'toplogo_is_fluid' => false,
			'toplogo_background_color' => 'ls',
			'toplogo_background_image' => '',
			'toplogo_particles' => false,
			'toplogo_background_cover' => false,
			'toplogo_parallax' => false,
			'toplogo_background_overlay' => false,
			'toplogo_background_half_overlay' => false,
			'toplogo_background_overlay_mobile' => false,
			'toplogo_background_gradientradial' => false,
			'toplogo_border_top' => '',
			'toplogo_border_bottom' => '',
			'toplogo_section_class' => '',
			'toplogo_section_id' => '',
			'page_title' => '1',
			'hide_term_title' => true,
			'title_is_fluid' => false,
			'title_background_color' => 'ds',
			'title_particles' => false,
			'title_background_cover' => false,
			'title_parallax' => true,
			'title_background_overlay' => true,
			'title_background_half_overlay' => false,
			'title_background_overlay_mobile' => false,
			'title_background_gradientradial' => false,
			'title_border_top' => '',
			'title_border_bottom' => '',
			'title_section_class' => '',
			'title_section_id' => '',
			'title_top_padding' => 's-pt-60',
			'title_bottom_padding' => 's-pb-60',
			'title_top_padding_sm' => '',
			'title_bottom_padding_sm' => '',
			'title_top_padding_md' => 's-pt-md-90',
			'title_bottom_padding_md' => 's-pb-md-90',
			'title_top_padding_lg' => 's-pt-lg-110',
			'title_bottom_padding_lg' => 's-pb-lg-110',
			'title_top_padding_xl' => '',
			'title_bottom_padding_xl' => '',
			'page_footer' => NULL,
			'footer_is_fluid' => false,
			'footer_background_color' => 'ds ms',
			'footer_columns_padding' => '',
			'footer_columns_vertical_margins' => 'c-mb-30',
			'footer_background_image' => '',
			'footer_particles' => false,
			'footer_background_cover' => false,
			'footer_parallax' => false,
			'footer_background_overlay' => false,
			'footer_background_half_overlay' => false,
			'footer_background_overlay_mobile' => false,
			'footer_background_gradientradial' => false,
			'footer_border_top' => '',
			'footer_border_bottom' => '',
			'footer_is_align_vertical' => false,
			'footer_section_class' => '',
			'footer_section_id' => '',
			'footer_top_padding' => 's-pt-60',
			'footer_bottom_padding' => 's-pb-30',
			'footer_top_padding_sm' => '',
			'footer_bottom_padding_sm' => '',
			'footer_top_padding_md' => 's-pt-md-90',
			'footer_bottom_padding_md' => 's-pb-md-60',
			'footer_top_padding_lg' => 's-pt-lg-100',
			'footer_bottom_padding_lg' => 's-pb-lg-70',
			'footer_top_padding_xl' => '',
			'footer_bottom_padding_xl' => '',
			'page_copyright' => NULL,
			'copyright_text' => '© Digiboost 2020',
			'copyright_text2' => 'Theme: Digiboost',
			'copyright_logo' => '',
			'copyright_is_fluid' => false,
			'copyright_background_color' => 'ds',
			'copyright_columns_padding' => '',
			'copyright_columns_vertical_margins' => '',
			'copyright_background_image' => '',
			'copyright_particles' => false,
			'copyright_background_cover' => false,
			'copyright_parallax' => false,
			'copyright_background_overlay' => false,
			'copyright_background_half_overlay' => false,
			'copyright_background_overlay_mobile' => false,
			'copyright_background_gradientradial' => false,
			'copyright_border_top' => '',
			'copyright_border_bottom' => '',
			'copyright_is_align_vertical' => false,
			'copyright_section_class' => '',
			'copyright_section_id' => '',
			'copyright_top_padding' => 's-pt-20',
			'copyright_bottom_padding' => 's-pb-20',
			'copyright_top_padding_sm' => '',
			'copyright_bottom_padding_sm' => '',
			'copyright_top_padding_md' => '',
			'copyright_bottom_padding_md' => '',
			'copyright_top_padding_lg' => '',
			'copyright_bottom_padding_lg' => '',
			'copyright_top_padding_xl' => '',
			'copyright_bottom_padding_xl' => '',
			'404_text' => 'Looks Like You Got Lost',
			'404_is_fluid' => false,
			'404_background_color' => 'ds',
			'404_particles' => false,
			'404_background_cover' => true,
			'404_parallax' => false,
			'404_background_overlay' => true,
			'404_background_half_overlay' => false,
			'404_background_overlay_mobile' => false,
			'404_background_gradientradial' => false,
			'404_border_top' => '',
			'404_border_bottom' => '',
			'404_section_class' => '',
			'404_section_id' => '',
			'404_top_padding' => 's-pt-60',
			'404_bottom_padding' => 's-pb-60',
			'404_top_padding_sm' => '',
			'404_bottom_padding_sm' => '',
			'404_top_padding_md' => 's-pt-md-90',
			'404_bottom_padding_md' => 's-pb-md-90',
			'404_top_padding_lg' => 's-pt-lg-130',
			'404_bottom_padding_lg' => 's-pb-lg-130',
			'404_top_padding_xl' => 's-pt-xl-150',
			'404_bottom_padding_xl' => 's-pb-xl-150',
			'body_font_picker_switch' =>
				array (
					'main_font_enabled' => '',
					'main_font_options' =>
						array (
							'main_font' =>
								array (
									'google_font' => true,
									'subset' => 'latin-ext',
									'variation' => 'regular',
									'family' => 'Roboto',
									'style' => false,
									'weight' => false,
									'size' => 14,
									'line-height' => 24,
									'letter-spacing' => 0,
									'color' => false,
								),
						),
				),
			'h_font_picker_switch' =>
				array (
					'h_font_enabled' => '',
					'h_font_options' =>
						array (
							'h_font' =>
								array (
									'google_font' => true,
									'subset' => 'latin-ext',
									'variation' => 'regular',
									'family' => 'Roboto',
									'style' => false,
									'weight' => false,
									'size' => false,
									'line-height' => false,
									'letter-spacing' => 0,
									'color' => false,
								),
						),
				),
			'layout' =>
				array (
					'boxed' => '',
					'boxed_options' =>
						array (
							'body_background_image' => '',
							'body_cover' => '',
							'boxed_extra_margins' => '',
						),
				),
			'version' => 'ls',
			'color_scheme_number' => '',
			'accent_color_1' => '',
			'accent_color_2' => '',
			'accent_color_3' => '',
			'accent_color_4' => '',
			'font_color' => '',
			'light_color' => '',
			'dark_grey_color' => '',
			'grey_color' => '',
			'dark_color' => '',
			'blog_layout' => '1',
			'blog_hide_categories' => false,
			'blog_hide_tags' => false,
			'blog_hide_author' => false,
			'blog_hide_date' => false,
			'blog_hide_comments_link' => false,
			'blog_slider_switch' =>
				array (
					'blog_slider_enabled' => '',
					'yes' =>
						array (
							'slider_id' => '',
						),
				),
			'blog_posts_widget_switch' => '',
			'preloader' =>
				array (
					'preloader_type' => 'css',
					'css' => 'css',
					'image' =>
						array (
							'options' => 'image',
						),
					'image_custom' =>
						array (
							'options' => '',
						),
					'disabled' =>
						array (
							'options' => '',
						),
				),
			'preloader_custom_class' => '',
			'share_facebook' => '1',
			'share_twitter' => '1',
			'share_pinterest' => '1',
			'share_linkedin' => '1',
			'share_tumblr' => '1',
			'share_reddit' => '1',
			'slide_speed' => '5',
			'register_modal' =>
				array (
					'show_register_modal' => '',
					'show' =>
						array (
							'background_color' => '',
							'image_login' => '',
						),
				),
			'header_shopping_cart' => '',
			'header_button' =>
				array (
					'show_button' => '',
					'button' =>
						array (
							'label' => 'Submit',
							'link' => '#',
							'target' => '_self',
							'color' => 'btn btn-maincolor',
							'size' => '',
						),
				),
			'header_columns_border' => '',
			'header_box_shadow' => false,
			'topline_columns_border' => '',
			'topline_box_shadow' => false,
			'toplogo_columns_border' => '',
			'toplogo_box_shadow' => false,
			'title_columns_border' => '',
			'title_box_shadow' => false,
			'footer_columns_border' => '',
			'footer_box_shadow' => false,
			'copyright_columns_border' => '',
			'copyright_box_shadow' => false,
			'404_columns_border' => '',
			'404_box_shadow' => false,
		);
    }
}


///////////////////
//options helpers//
///////////////////
if ( !function_exists( 'digiboost_get_options' ) ) :
    /**
     * Get all theme options in one array
     * @return array
     */
    function digiboost_get_options() {
        $options = new Digiboost_Options();
        $options = $options->customizer_options;
        //check if unyson installed - push 'fw' key to true
        return $options;
    }
endif; //digiboost_get_options

if ( !function_exists( 'digiboost_get_option' ) ) :
    /**
     * Get single option
     * @param $option_name
     * @param string $default_value
     *
     * @return mixed|string
     */
    function digiboost_get_option( $option_name, $default_value = '' ) {
        $options = new Digiboost_Options();
        $option_value = $options->get_customizer_option( $option_name, $default_value );
        return $option_value;
    }
endif; //digiboost_get_option


if ( !function_exists( 'digiboost_get_default_section_option_value' ) ) :
    /**
     * Get default section option value for customizer options
     * used in digiboost_get_section_options_array
     * @param string $option_name
     * @param string $default_value
     *
     * @return mixed|string
     */
    function digiboost_get_default_section_option_value( $option_name, $default_value = '' ) {
        $options_class = new Digiboost_Options();
        $defaults = $options_class->get_default_options_array();
        $option_value = ( !empty ( $defaults[ $option_name ] ) ) ? $defaults[ $option_name ] : $default_value;
        return $option_value;
    }
endif; //digiboost_get_default_section_option_value


if ( !function_exists( 'digiboost_get_switch_option_type' ) ) :
    function digiboost_get_switch_option_type( $switch_array, $option_name, $value = false ) {
        $value = digiboost_get_default_section_option_value( $option_name, $value );

        return array_merge( $switch_array, array(
            'value' => $value,
            'left-choice' => array(
                'value' => false,
                'label' => esc_html__( 'No', 'digiboost' ),
                'color' => '', // #HEX
            ),
            'right-choice' => array(
                'value' => true,
                'label' => esc_html__( 'Yes', 'digiboost' ),
                'color' => '', // #HEX
            ),
        ) );
    }
endif; //digiboost_get_switch_option_type

//section options array for any section
if ( !function_exists( 'digiboost_get_section_options_array' ) ) :
    /**
     * Get any section options
     * @param string $prefix
     * @param array $excluded_keys
     *
     * @return array
     */
    function digiboost_get_section_options_array( $prefix = '', $excluded_keys = array() ) {

        $options = array(
            $prefix . 'is_fluid' => digiboost_get_switch_option_type( array(
                'label' => esc_html__( 'Full Width', 'digiboost' ),
                'type' => 'switch',
            ), $prefix . 'is_fluid'
            ),
            $prefix . 'background_color' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'background_color', 'ls' ),
                'label' => esc_html__( 'Background color', 'digiboost' ),
                'help' => esc_html__( 'Select one of predefined background colors',
                    'digiboost' ),
                'choices' => array(
                    '' => esc_html__( 'Transparent', 'digiboost' ),
                    'ls' => esc_html__( 'Light', 'digiboost' ),
                    'ls ms' => esc_html__( 'Light Grey', 'digiboost' ),
                    'ds' => esc_html__( 'Dark Grey', 'digiboost' ),
                    'ds ms' => esc_html__( 'Dark Muted', 'digiboost' ),
                    'cs' => esc_html__( 'Main color', 'digiboost' ),
                    'cs cs2' => esc_html__( 'Second Main color', 'digiboost' ),
                ),
            ),

            //100 80 60 50 30 25 20 15 10 5 2 1 0
            $prefix . 'columns_padding' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'columns_padding', '' ),
                'label' => esc_html__( 'Columns gutter (padding)', 'digiboost' ),
                'help' => esc_html__( 'Choose columns horizontal padding value (gutter)',
                    'digiboost' ),
                'choices' => array(
                    '' => esc_html__( 'Inherited - default', 'digiboost' ),
                    'c-gutter-0' => esc_html__( '0', 'digiboost' ),
                    'c-gutter-1' => esc_html__( '1px', 'digiboost' ),
                    'c-gutter-2' => esc_html__( '2px', 'digiboost' ),
                    'c-gutter-5' => esc_html__( '5px', 'digiboost' ),
                    'c-gutter-10' => esc_html__( '10px', 'digiboost' ),
                    'c-gutter-20' => esc_html__( '20px', 'digiboost' ),
                    'c-gutter-25' => esc_html__( '25px', 'digiboost' ),
                    'c-gutter-30' => esc_html__( '30px', 'digiboost' ),
                    'c-gutter-50' => esc_html__( '50px', 'digiboost' ),
                    'c-gutter-60' => esc_html__( '60px', 'digiboost' ),
                    'c-gutter-80' => esc_html__( '80px', 'digiboost' ),
                    'c-gutter-100' => esc_html__( '100px', 'digiboost' ),
                ),
            ),
            //0 1 2 5 10 15 20 25 30 40 50 60
            $prefix . 'columns_vertical_margins' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'columns_vertical_margins', '' ),
                'label' => esc_html__( 'Column vertical margins', 'digiboost' ),
                'help' => esc_html__( 'Choose columns vertical margins value',
                    'digiboost' ),
                'choices' => array(
                    '' => esc_html__( 'Top and bottom: 0 - default ', 'digiboost' ),
                    'c-my-1' => esc_html__( 'Top and bottom: 1px', 'digiboost' ),
                    'c-my-2' => esc_html__( 'Top and bottom: 2px', 'digiboost' ),
                    'c-my-5' => esc_html__( 'Top and bottom: 5px', 'digiboost' ),
                    'c-my-10' => esc_html__( 'Top and bottom: 10px', 'digiboost' ),
                    'c-my-15' => esc_html__( 'Top and bottom: 15px', 'digiboost' ),
                    'c-my-20' => esc_html__( 'Top and bottom: 20px', 'digiboost' ),
                    'c-my-25' => esc_html__( 'Top and bottom: 25px', 'digiboost' ),
                    'c-my-30' => esc_html__( 'Top and bottom: 30px', 'digiboost' ),
                    'c-my-40' => esc_html__( 'Top and bottom: 30px', 'digiboost' ),
                    'c-my-50' => esc_html__( 'Top and bottom: 50px', 'digiboost' ),
                    'c-my-60' => esc_html__( 'Top and bottom: 60px', 'digiboost' ),
                    'c-mb-1' => esc_html__( 'Bottom: 1px', 'digiboost' ),
                    'c-mb-2' => esc_html__( 'Bottom: 2px', 'digiboost' ),
                    'c-mb-5' => esc_html__( 'Bottom: 5px', 'digiboost' ),
                    'c-mb-10' => esc_html__( 'Bottom: 10px', 'digiboost' ),
                    'c-mb-15' => esc_html__( 'Bottom: 15px', 'digiboost' ),
                    'c-mb-20' => esc_html__( 'Bottom: 20px', 'digiboost' ),
                    'c-mb-25' => esc_html__( 'Bottom: 25px', 'digiboost' ),
                    'c-mb-30' => esc_html__( 'Bottom: 30px', 'digiboost' ),
                    'c-mb-40' => esc_html__( 'Bottom: 30px', 'digiboost' ),
                    'c-mb-50' => esc_html__( 'Bottom: 50px', 'digiboost' ),
                    'c-mb-60' => esc_html__( 'Bottom: 60px', 'digiboost' ),
                    'c-mt-1' => esc_html__( 'Top: 1px', 'digiboost' ),
                    'c-mt-2' => esc_html__( 'Top: 2px', 'digiboost' ),
                    'c-mt-5' => esc_html__( 'Top: 5px', 'digiboost' ),
                    'c-mt-10' => esc_html__( 'Top: 10px', 'digiboost' ),
                    'c-mt-15' => esc_html__( 'Top: 15px', 'digiboost' ),
                    'c-mt-20' => esc_html__( 'Top: 20px', 'digiboost' ),
                    'c-mt-25' => esc_html__( 'Top: 25px', 'digiboost' ),
                    'c-mt-30' => esc_html__( 'Top: 30px', 'digiboost' ),
                    'c-mt-40' => esc_html__( 'Top: 30px', 'digiboost' ),
                    'c-mt-50' => esc_html__( 'Top: 50px', 'digiboost' ),
                    'c-mt-60' => esc_html__( 'Top: 60px', 'digiboost' ),
                ),
            ),
			$prefix . 'columns_border' => array(
				'type' => 'select',
				'value' => digiboost_get_default_section_option_value( $prefix . 'columns_border', '' ),
				'label' => esc_html__( 'Columns border', 'digiboost' ),
				'help' => esc_html__( 'Choose columns borders', 'digiboost' ),
				'choices' => array(
					'' => esc_html__( 'Inherited - default', 'digiboost' ),
					's-bordered-columns' => esc_html__( 'Bordered Columns', 'digiboost' ),
				),
			),
            $prefix . 'background_image' => array(
                'label' => esc_html__( 'Background Image', 'digiboost' ),
                'help' => esc_html__( 'Choose the background image for section', 'digiboost' ),
                'type' => 'background-image',
                'choices' => array(//	in future may will set predefined images
                )
            ),
            $prefix . 'box_shadow' => digiboost_get_switch_option_type( array(
                'label' => esc_html__( 'Container Shadow', 'digiboost' ),
                'help' => esc_html__( 'Adds container shadow', 'digiboost' ),
                'type' => 'switch',
            ),
                $prefix . 'box_shadow'
            ),
            $prefix . 'particles' => digiboost_get_switch_option_type( array(
                'label' => esc_html__( 'Particles Enable', 'digiboost' ),
                'desc' => esc_html__( 'Enable particles animation', 'digiboost' ),
                'help' => esc_html__( 'Enable particles animation', 'digiboost' ),
                'type' => 'switch'
            ), $prefix . 'particles'
            ),
            $prefix . 'background_cover' => digiboost_get_switch_option_type( array(
                'label' => esc_html__( 'Background Cover', 'digiboost' ),
                'desc' => esc_html__( 'Stretch the image', 'digiboost' ),
                'help' => esc_html__( 'Adds "background-size:cover" CSS rule', 'digiboost' ),
                'type' => 'switch'
            ), $prefix . 'background_cover'
            ),
            $prefix . 'parallax' => digiboost_get_switch_option_type( array(
                'label' => esc_html__( 'Parallax', 'digiboost' ),
                'help' => esc_html__( 'Adds background parallax effect on section background image', 'digiboost' ),
                'type' => 'switch',
            ),
                $prefix . 'parallax'
            ),
            $prefix . 'background_overlay' => digiboost_get_switch_option_type( array(
                'label' => esc_html__( 'Background Color Overlay', 'digiboost' ),
                'help' => esc_html__( 'Adds semitransparent color overlay on section', 'digiboost' ),
                'type' => 'switch',
            ),
                $prefix . 'background_overlay'

            ),
            $prefix . 'background_overlay_mobile' => digiboost_get_switch_option_type( array(
                'label' => esc_html__( 'Background Color Overlay on mobile', 'digiboost' ),
                'help' => esc_html__( 'Adds semitransparent color overlay on section', 'digiboost' ),
                'type' => 'switch',
            ),
                $prefix . 'background_overlay_mobile'

            ),
            $prefix . 'background_gradientradial' => digiboost_get_switch_option_type( array(
                'label' => esc_html__( 'Background Radial Overlay', 'digiboost' ),
                'help' => esc_html__( 'Adds semitransparent light radial overlay on section', 'digiboost' ),
                'type' => 'switch',
            ),
                $prefix . 'background_gradientradial'
            ),
            $prefix . 'border_top' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'border_top', '' ),
                'label' => esc_html__( 'Top border', 'digiboost' ),
                'desc' => esc_html__( 'Will be hidden if overlay option is used', 'digiboost' ),
                'help' => esc_html__( 'Top border will be hidden if overlay option is used', 'digiboost' ),
                'choices' => array(
                    '' => esc_html__( 'None', 'digiboost' ),
                    's-bordertop' => esc_html__( 'Full Width', 'digiboost' ),
                    's-bordertop-container' => esc_html__( 'Container Width', 'digiboost' ),
                ),
            ),
            $prefix . 'border_bottom' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'border_bottom', '' ),
                'label' => esc_html__( 'Bottom border', 'digiboost' ),
                'choices' => array(
                    '' => esc_html__( 'None', 'digiboost' ),
                    's-borderbottom' => esc_html__( 'Full Width', 'digiboost' ),
                    's-borderbottom-container' => esc_html__( 'Container Width', 'digiboost' ),
                ),
            ),
            $prefix . 'is_align_vertical' => digiboost_get_switch_option_type( array(
                'label' => esc_html__( 'Vertical align content', 'digiboost' ),
                'help' => esc_html__( 'Align columns content vertically on wide screens', 'digiboost' ),
                'type' => 'switch',
            ),
                $prefix . 'is_align_vertical'

            ),
            $prefix . 'section_class' => array(
                'type' => 'text',
                'value' => digiboost_get_default_section_option_value( $prefix . 'section_class', '' ),
                'label' => esc_html__( 'Additional CSS class', 'digiboost' ),
                'desc' => esc_html__( 'Add your custom CSS class to section. Useful for Customization', 'digiboost' ),
            ),
            $prefix . 'section_id' => array(
                'type' => 'text',
                'value' => digiboost_get_default_section_option_value( $prefix . 'section_id', '' ),
                'label' => esc_html__( 'ID attribute', 'digiboost' ),
                'desc' => esc_html__( 'Add ID attribute to section. Useful for single page menu', 'digiboost' ),
            ),
        );

        if ( $excluded_keys ) {
            foreach ( $excluded_keys as $key ) {
                unset( $options[ $prefix . $key ] );
            }
        }

        return $options;
    }
endif; //digiboost_get_section_options_array

//prepare section HTML attributes
if ( !function_exists( 'digiboost_get_section_options' ) ) :
    /**
     * Prepare section HTML attributes
     * @param array $options
     * @param string $prefix
     *
     * @return array
     */
    function digiboost_get_section_options( $options, $prefix = '' ) {
        //$options values that contains CSS class
        $section_class_values = array(
            $prefix . 'background_color' => $prefix . 'background_color',
            $prefix . 'top_padding' => $prefix . 'top_padding',
            $prefix . 'bottom_padding' => $prefix . 'bottom_padding',
            $prefix . 'columns_padding' => $prefix . 'columns_padding',
            $prefix . 'columns_border' => $prefix . 'columns_border',
            $prefix . 'columns_vertical_margins' => $prefix . 'columns_vertical_margins',
            $prefix . 'border_top' => $prefix . 'border_top',
            $prefix . 'border_bottom' => $prefix . 'border_bottom',
            $prefix . 'columns_vertical_margins' => $prefix . 'columns_vertical_margins',
            $prefix . 'section_class' => $prefix . 'section_class',
            //responsive options
            $prefix . 'hidden_xs' => $prefix . 'hidden_xs',
            $prefix . 'hidden_sm' => $prefix . 'hidden_sm',
            $prefix . 'hidden_md' => $prefix . 'hidden_md',
            $prefix . 'hidden_lg' => $prefix . 'hidden_lg',
            $prefix . 'hidden_xl' => $prefix . 'hidden_xl',
            $prefix . 'top_padding_sm' => $prefix . 'top_padding_sm',
            $prefix . 'bottom_padding_sm' => $prefix . 'bottom_padding_sm',
            $prefix . 'top_padding_md' => $prefix . 'top_padding_md',
            $prefix . 'bottom_padding_md' => $prefix . 'bottom_padding_md',
            $prefix . 'top_padding_lg' => $prefix . 'top_padding_lg',
            $prefix . 'bottom_padding_lg' => $prefix . 'bottom_padding_lg',
            $prefix . 'top_padding_xl' => $prefix . 'top_padding_xl',
            $prefix . 'bottom_padding_xl' => $prefix . 'bottom_padding_xl',
        );

        //array with section attributes
        $array = array(
            'section_class' => '',
            'section_container_class_suffix' => '',
            'section_container_class' => '',
            'section_row_class_suffix' => '',
            'section_id' => '',
            'section_background_image' => '',
        );

        //skip top border if color overlay or radial gradient is active
        if ( !empty( $options[ $prefix . 'background_overlay' ] ) || !empty( $options[ $prefix . 'background_gradientradial' ] ) ) {
            unset( $section_class_values[ $prefix . 'border_top' ] );
        }
        
        //if is page and Unyson is installed - overriding global header and footer options from page settings
        if ( is_page() ) {
            if ( $prefix === 'header_' && function_exists( 'fw_get_db_post_option' ) ) {
                $page_options = fw_get_db_post_option( get_the_ID(), 'header_page' );

                if ( !empty( $page_options['header_page_styles'] ) ) {
                    $options = array_merge( $options, $page_options['header_page_custom_styles'] );
                }

            }
            if ( $prefix === 'footer_' && function_exists( 'fw_get_db_post_option' ) ) {
                $page_options = fw_get_db_post_option( get_the_ID(), 'footer_page' );
                if ( !empty( $page_options['footer_page_styles'] ) ) {
                    $options = array_merge( $options, $page_options['footer_page_custom_styles'] );
                }
            }
        }

        //building CSS class
        foreach ( $options as $key => $value ) {
            if ( in_array( $key, $section_class_values ) ) {
                $array['section_class'] .= ' ' . $value;
            }
        }

        //additional CSS classes
        $array['section_class'] .= ( !empty( $options[ $prefix . 'parallax' ] ) ) ? ' s-parallax' : '';
        $array['section_class'] .= ( !empty( $options[ $prefix . 'background_cover' ] ) ) ? ' cover-background' : '';
        $array['section_class'] .= ( !empty( $options[ $prefix . 'particles' ] ) ) ? ' with-particles' : '';
        $array['section_container_class'] .= ( !empty( $options[ $prefix . 'box_shadow' ] ) ) ? ' box-shadow' : '';
        $array['section_class'] .= ( !empty( $options[ $prefix . 'background_overlay' ] ) ) ? ' s-overlay' : '';

        $array['section_class'] .= ( !empty( $options[ $prefix . 'background_overlay_mobile' ] ) ) ? ' s-overlay mobile-overlay' : '';
        $array['section_class'] .= ( !empty( $options[ $prefix . 'background_gradientradial' ] ) ) ? ' gradientradial-background' : '';

        //container CSS class
        $array['section_container_class_suffix'] .= ( !empty( $options[ $prefix . 'is_fluid' ] ) ) ? '-fluid' : '';

        //row CSS class
        $array['section_row_class_suffix'] .= ( !empty( $options[ $prefix . 'is_align_vertical' ] ) ) ? ' align-center' : '';

        //ID attribute
        $array['section_id'] .= ( !empty( $options[ $prefix . 'section_id' ] ) ) ? $options[ $prefix . 'section_id' ] : '';

        //bg image
        if ( !empty( $options[ $prefix . 'background_image' ] ) && !empty( $options[ $prefix . 'background_image' ]['data']['icon'] ) ) {
            $array['section_background_image'] = 'background-image:url(' . $options[ $prefix . 'background_image' ]['data']['icon'] . ');';
        }

        return $array;
    }
endif; //digiboost_get_section_options


//default padding values that are set in variables_template SCSS file
if ( !function_exists( 'digiboost_unyson_option_section_padding_choices ' ) ) :
    function digiboost_unyson_option_section_padding_choices( $prefix = '' ) {
        //see _variables_template.scss
        $padding_values = array( 0, 1, 2, 3, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 80, 90, 100, 110, 115, 120, 130, 140, 150 );
        $breakpoins = array( 'xs', 'sm', 'md', 'lg', 'xl' );

        $array = array( '' => esc_html__( 'Inherit', 'digiboost' ) );
        foreach ( $padding_values as $value ) {
            $array[ $prefix . $value ] = esc_html__( $value . 'px', 'digiboost' );
        }
        return $array;
    }
endif; //digiboost_unyson_option_section_padding_choices


//section paddings


//background options
if ( !function_exists( 'digiboost_unyson_option_get_section_padding_array' ) ) :
    function digiboost_unyson_option_get_section_padding_array( $prefix = '' ) {
        return array(
            //see _variables_template.scss
            //0 1 2 3 5 10 15 20 25 30 50 60 75 100 130
            $prefix . 'top_padding' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'top_padding', 's-pt-60' ),
                'label' => esc_html__( 'Top padding', 'digiboost' ),
                'help' => esc_html__( 'Choose top padding value for section',
                    'digiboost' ),
                'choices' => digiboost_unyson_option_section_padding_choices( 's-pt-' ),
            ),
            $prefix . 'bottom_padding' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'bottom_padding', 's-pb-60' ),
                'label' => esc_html__( 'Bottom padding', 'digiboost' ),
                'help' => esc_html__( 'Choose bottom padding value for section',
                    'digiboost' ),
                'choices' => digiboost_unyson_option_section_padding_choices( 's-pb-' ),
            ),
            $prefix . 'top_padding_sm' => array(
                'type' => 'select',
                'value' => '',
                'label' => esc_html__( 'Top padding above 576px screen', 'digiboost' ),
                'help' => esc_html__( 'Choose top padding value for section',
                    'digiboost' ),
                'choices' => digiboost_unyson_option_section_padding_choices( 's-pt-sm-' ),
            ),
            $prefix . 'bottom_padding_sm' => array(
                'type' => 'select',
                'value' => '',
                'label' => esc_html__( 'Bottom padding above 576px screen', 'digiboost' ),
                'help' => esc_html__( 'Choose bottom padding value for section',
                    'digiboost' ),
                'choices' => digiboost_unyson_option_section_padding_choices( 's-pb-sm-' ),
            ),
            $prefix . 'top_padding_md' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'top_padding_md', 's-pt-md-90' ),
                'label' => esc_html__( 'Top padding above 768px screen', 'digiboost' ),
                'help' => esc_html__( 'Choose top padding value for section',
                    'digiboost' ),
                'choices' => digiboost_unyson_option_section_padding_choices( 's-pt-md-' ),
            ),
            $prefix . 'bottom_padding_md' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'bottom_padding_md', 's-pb-md-90' ),
                'label' => esc_html__( 'Bottom padding above 768px screen', 'digiboost' ),
                'help' => esc_html__( 'Choose bottom padding value for section',
                    'digiboost' ),
                'choices' => digiboost_unyson_option_section_padding_choices( 's-pb-md-' ),
            ),
            $prefix . 'top_padding_lg' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'top_padding_lg', 's-pt-lg-130' ),
                'label' => esc_html__( 'Top padding above 992px screen', 'digiboost' ),
                'help' => esc_html__( 'Choose top padding value for section',
                    'digiboost' ),
                'choices' => digiboost_unyson_option_section_padding_choices( 's-pt-lg-' ),
            ),
            $prefix . 'bottom_padding_lg' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'bottom_padding_lg', 's-pb-lg-130' ),
                'label' => esc_html__( 'Bottom padding above 992px screen', 'digiboost' ),
                'help' => esc_html__( 'Choose bottom padding value for section',
                    'digiboost' ),
                'choices' => digiboost_unyson_option_section_padding_choices( 's-pb-lg-' ),
            ),
            $prefix . 'top_padding_xl' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'top_padding_xl', 's-pt-xl-150' ),
                'label' => esc_html__( 'Top padding above 1200px screen', 'digiboost' ),
                'help' => esc_html__( 'Choose top padding value for section',
                    'digiboost' ),
                'choices' => digiboost_unyson_option_section_padding_choices( 's-pt-xl-' ),
            ),
            $prefix . 'bottom_padding_xl' => array(
                'type' => 'select',
                'value' => digiboost_get_default_section_option_value( $prefix . 'bottom_padding_xl', 's-pb-xl-150' ),
                'label' => esc_html__( 'Bottom padding above 1200px screen', 'digiboost' ),
                'help' => esc_html__( 'Choose bottom padding value for section',
                    'digiboost' ),
                'choices' => digiboost_unyson_option_section_padding_choices( 's-pb-xl-' ),
            ),
        );
    }
endif; //digiboost_unyson_option_get_section_padding_array


//animations
if ( !function_exists( 'digiboost_unyson_option_animations' ) ) :
    function digiboost_unyson_option_animations() {
        return array(
            '' => esc_html__( 'None', 'digiboost' ),
            'slideDown' => esc_html__( 'slideDown', 'digiboost' ),
            'scaleAppear' => esc_html__( 'scaleAppear', 'digiboost' ),
            'fadeInLeft' => esc_html__( 'fadeInLeft', 'digiboost' ),
            'fadeInUp' => esc_html__( 'fadeInUp', 'digiboost' ),
            'fadeInRight' => esc_html__( 'fadeInRight', 'digiboost' ),
            'fadeInDown' => esc_html__( 'fadeInDown', 'digiboost' ),
            'fadeIn' => esc_html__( 'fadeIn', 'digiboost' ),
            'slideRight' => esc_html__( 'slideRight', 'digiboost' ),
            'slideUp' => esc_html__( 'slideUp', 'digiboost' ),
            'slideLeft' => esc_html__( 'slideLeft', 'digiboost' ),
            'expandUp' => esc_html__( 'expandUp', 'digiboost' ),
            'slideExpandUp' => esc_html__( 'slideExpandUp', 'digiboost' ),
            'expandOpen' => esc_html__( 'expandOpen', 'digiboost' ),
            'bigEntrance' => esc_html__( 'bigEntrance', 'digiboost' ),
            'hatch' => esc_html__( 'hatch', 'digiboost' ),
            'tossing' => esc_html__( 'tossing', 'digiboost' ),
            'pulse' => esc_html__( 'pulse', 'digiboost' ),
            'floating' => esc_html__( 'floating', 'digiboost' ),
            'bounce' => esc_html__( 'bounce', 'digiboost' ),
            'pullUp' => esc_html__( 'pullUp', 'digiboost' ),
            'pullDown' => esc_html__( 'pullDown', 'digiboost' ),
            'stretchLeft' => esc_html__( 'stretchLeft', 'digiboost' ),
            'stretchRight' => esc_html__( 'stretchRight', 'digiboost' ),
            'fadeInUpBig' => esc_html__( 'fadeInUpBig', 'digiboost' ),
            'fadeInDownBig' => esc_html__( 'fadeInDownBig', 'digiboost' ),
            'fadeInLeftBig' => esc_html__( 'fadeInLeftBig', 'digiboost' ),
            'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'digiboost' ),
            'slideInDown' => esc_html__( 'slideInDown', 'digiboost' ),
            'slideInLeft' => esc_html__( 'slideInLeft', 'digiboost' ),
            'slideInRight' => esc_html__( 'slideInRight', 'digiboost' ),
            'moveFromLeft' => esc_html__( 'moveFromLeft', 'digiboost' ),
            'moveFromRight' => esc_html__( 'moveFromRight', 'digiboost' ),
            'moveFromBottom' => esc_html__( 'moveFromBottom', 'digiboost' ),
        );
    }
endif; //digiboost_unyson_option_animations

//responsive options
if ( !function_exists( 'digiboost_unyson_option_responsive_options_array' ) ) :
    function digiboost_unyson_option_responsive_options_array() {
        return array(
            'hidden-xs' => array(
                'type' => 'switch',
                'value' => '',
                'label' => esc_html__( 'Hide on Extra small screens (below 576px)', 'digiboost' ),
                'left-choice' => array(
                    'value' => '',
                    'label' => esc_html__( 'Show', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'hidden-xs',
                    'label' => esc_html__( 'Hide', 'digiboost' ),
                ),
            ),
            'hidden-sm' => array(
                'type' => 'switch',
                'value' => '',
                'label' => esc_html__( 'Hide on Small screens (between 576px and 767px)', 'digiboost' ),
                'left-choice' => array(
                    'value' => '',
                    'label' => esc_html__( 'Show', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'hidden-sm',
                    'label' => esc_html__( 'Hide', 'digiboost' ),
                ),
            ),
            'hidden-md' => array(
                'type' => 'switch',
                'value' => '',
                'label' => esc_html__( 'Hide on Medium screens (between 768px and 991px)', 'digiboost' ),
                'left-choice' => array(
                    'value' => '',
                    'label' => esc_html__( 'Show', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'hidden-md',
                    'label' => esc_html__( 'Hide', 'digiboost' ),
                ),
            ),
            'hidden-lg' => array(
                'type' => 'switch',
                'value' => '',
                'label' => esc_html__( 'Hide on Large screens (between 992px and 1199px)', 'digiboost' ),
                'left-choice' => array(
                    'value' => '',
                    'label' => esc_html__( 'Show', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'hidden-lg',
                    'label' => esc_html__( 'Hide', 'digiboost' ),
                ),
            ),
            'hidden-xl' => array(
                'type' => 'switch',
                'value' => '',
                'label' => esc_html__( 'Hide on Extra Large screens (between 1200px and 1599px)', 'digiboost' ),
                'left-choice' => array(
                    'value' => '',
                    'label' => esc_html__( 'Show', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'hidden-xl',
                    'label' => esc_html__( 'Hide', 'digiboost' ),
                ),
            ),
			'hidden-xxl' => array(
				'type' => 'switch',
				'value' => '',
				'label' => esc_html__( 'Hide on Full Screen (above 1600px)', 'digiboost' ),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__( 'Show', 'digiboost' ),
				),
				'right-choice' => array(
					'value' => 'hidden-xxl',
					'label' => esc_html__( 'Hide', 'digiboost' ),
				),
			),
        );
    }
endif; //digiboost_unyson_option_responsive_options_array

//carousel options
if ( !function_exists( 'digiboost_unyson_option_carousel' ) ) :
    function digiboost_unyson_option_carousel($excluded_keys = array()) {
        $options = array(
            'loop'          => array(
                'type'         => 'switch',
                'value'        => 'false',
                'label'        => esc_html__( 'Loop carousel', 'digiboost' ),
                'left-choice'  => array(
                    'value' => 'false',
                    'label' => esc_html__( 'No', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'true',
                    'label' => esc_html__( 'Yes', 'digiboost' ),
                ),
            ),
            'nav'           => array(
                'type'         => 'switch',
                'value'        => 'false',
                'label'        => esc_html__( 'Show Arrows', 'digiboost' ),
                'left-choice'  => array(
                    'value' => 'false',
                    'label' => esc_html__( 'No', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'true',
                    'label' => esc_html__( 'Yes', 'digiboost' ),
                ),
            ),
            'dots'          => array(
                'type'         => 'switch',
                'value'        => 'false',
                'label'        => esc_html__( 'Show Nav', 'digiboost' ),
                'left-choice'  => array(
                    'value' => 'false',
                    'label' => esc_html__( 'No', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'true',
                    'label' => esc_html__( 'Yes', 'digiboost' ),
                ),
            ),
            'center'        => array(
                'type'         => 'switch',
                'value'        => 'false',
                'label'        => esc_html__( 'Center carousel', 'digiboost' ),
                'left-choice'  => array(
                    'value' => 'false',
                    'label' => esc_html__( 'No', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'true',
                    'label' => esc_html__( 'Yes', 'digiboost' ),
                ),
            ),
            'autoplay'      => array(
                'type'         => 'switch',
                'value'        => 'false',
                'label'        => esc_html__( 'Autoplay', 'digiboost' ),
                'left-choice'  => array(
                    'value' => 'false',
                    'label' => esc_html__( 'No', 'digiboost' ),
                ),
                'right-choice' => array(
                    'value' => 'true',
                    'label' => esc_html__( 'Yes', 'digiboost' ),
                ),
            ),
			'responsive_xl' => array(
				'type'        => 'select',
				'value'       => '4',
				'label'       => esc_html__( 'Items count on ', 'digiboost' ) . '>' . esc_html__( '1200px', 'digiboost' ),
				'choices'     => array(
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'1' => '1',
				),
				'no-validate' => false,
			),
            'responsive_lg' => array(
                'type'        => 'select',
                'value'       => '4',
				'label'       => esc_html__( 'Items count on 992px-1200px', 'digiboost' ),
                'choices'     => array(
                    '4' => '4',
                    '3' => '3',
                    '2' => '2',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '1' => '1',
                ),
                'no-validate' => false,
            ),
            'responsive_md' => array(
                'type'        => 'select',
                'value'       => '4',
				'label'       => esc_html__( 'Items count on 768px-992px', 'digiboost' ),
                'choices'     => array(
                    '3' => '3',
                    '4' => '4',
                    '2' => '2',
                    '5' => '5',
                    '6' => '6',
                    '1' => '1',

                ),
                'no-validate' => false,
            ),
            'responsive_sm' => array(
                'type'        => 'select',
                'value'       => '3',
                'label'       => esc_html__( 'Items count on 575px-768px', 'digiboost' ),
                'choices'     => array(
                    '3' => '3',
                    '2' => '2',
                    '1' => '1',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',

                ),
                'no-validate' => false,
            ),
            'responsive_xs' => array(
                'type'        => 'select',
                'value'       => '2',
                'label'       => esc_html__( 'Items count on ', 'digiboost' ) . '<' . esc_html__( '575px', 'digiboost' ),
                'choices'     => array(
                    '2' => '2',
                    '1' => '1',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',

                ),
                'no-validate' => false,
            ),
			'nav_position'        => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Position Arrows', 'digiboost' ),
				'choices'     => array(
					'' => 'Default',
					'left-nav'  => 'Arrows Left',
					'top-nav-arrows'  => 'Arrows Top',
					'bottom-left-nav'  => 'Arrows Bottom',
				),
				'no-validate' => false,
			),
            'margin'        => array(
                'type'        => 'select',
                'value'       => '30',
                'label'       => esc_html__( 'Margin between items', 'digiboost' ),
                'choices'     => array(
                    '30' => '30px',
                    '0'  => '0px',
                    '5'  => '5px',
                    '10' => '10px',
                    '15' => '15px',
                    '40' => '40px',
                    '50' => '50px',
                    '60' => '60px',
                ),
                'no-validate' => false,
            ),
        );
        if ( $excluded_keys ) {
            foreach ( $excluded_keys as $key ) {
                unset( $options[ $key ] );
            }
        }
        return $options;
}
endif;//digiboost_carousel options

//isotope options
if ( !function_exists( 'digiboost_unyson_option_isotope' ) ) :
	function digiboost_unyson_option_isotope($excluded_keys = array()) {
		$options = array(
			'responsive_xl' => array(
				'type'        => 'select',
				'value'       => '4',
				'label'       => esc_html__( 'Items count on ', 'digiboost' ) . '>' . esc_html__( '1200px', 'digiboost' ),
				'choices'     => array(
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'1' => '1',
				),
				'no-validate' => false,
			),
			'responsive_lg' => array(
				'type'        => 'select',
				'value'       => '4',
				'label'       => esc_html__( 'Items count on 992px-1200px', 'digiboost' ),
				'choices'     => array(
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'1' => '1',
				),
				'no-validate' => false,
			),
			'responsive_md' => array(
				'type'        => 'select',
				'value'       => '4',
				'label'       => esc_html__( 'Items count on 768px-992px', 'digiboost' ),
				'choices'     => array(
					'3' => '3',
					'4' => '4',
					'2' => '2',
					'5' => '5',
					'6' => '6',
					'1' => '1',
				
				),
				'no-validate' => false,
			),
			'responsive_sm' => array(
				'type'        => 'select',
				'value'       => '3',
				'label'       => esc_html__( 'Items count on 575px-768px', 'digiboost' ),
				'choices'     => array(
					'3' => '3',
					'2' => '2',
					'1' => '1',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				
				),
				'no-validate' => false,
			),
			'responsive_xs' => array(
				'type'        => 'select',
				'value'       => '2',
				'label'       => esc_html__( 'Items count on ', 'digiboost' ) . '<' . esc_html__( '575px', 'digiboost' ),
				'choices'     => array(
					'2' => '2',
					'1' => '1',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				
				),
				'no-validate' => false,
			),
			'margin'        => array(
				'type'        => 'select',
				'value'       => '30',
				'label'       => esc_html__( 'Margin between items', 'digiboost' ),
				'choices'     => array(
					'30' => '30px',
					'0'  => '0px',
					'5'  => '5px',
					'10' => '10px',
					'15' => '15px',
					'40' => '40px',
					'50' => '50px',
					'60' => '60px',
				),
				'no-validate' => false,
			),
		);
		if ( $excluded_keys ) {
			foreach ( $excluded_keys as $key ) {
				unset( $options[ $key ] );
			}
		}
		return $options;
	}
endif;//digiboost_isotope options

//background options
if ( !function_exists( 'digiboost_unyson_option_get_backgrounds_array' ) ) :
    function digiboost_unyson_option_get_backgrounds_array() {
        return array(
            'transparent' => esc_html__( 'Transparent (No Background)', 'digiboost' ),
            'ls' => esc_html__( 'Light', 'digiboost' ),
            'ls ms' => esc_html__( 'Grey', 'digiboost' ),
            'ds' => esc_html__( 'Dark', 'digiboost' ),
            'ds ms' => esc_html__( 'Dark Grey', 'digiboost' ),
            'cs' => esc_html__( 'Main color', 'digiboost' ),
            'cs cs2' => esc_html__( 'Second Main color', 'digiboost' ),
            'cs cs3' => esc_html__( 'Third Main color', 'digiboost' ),
            'bordered' => esc_html__( 'Transparent background with border', 'digiboost' ),
        );
    }
endif; //digiboost_unyson_option_get_backgrounds_array


//get responsive CSS classes from options array
if ( !function_exists( 'digiboost_unyson_options_get_responsive_css_classes' ) ) :
    function digiboost_unyson_options_get_responsive_css_classes( $options ) {
        $css_class = '';
        $css_class .= ( !empty( $options['hidden_xs'] ) ) ? ' ' . $options['hidden_xs'] : '';
        $css_class .= ( !empty( $options['hidden_sm'] ) ) ? ' ' . $options['hidden_sm'] : '';
        $css_class .= ( !empty( $options['hidden_md'] ) ) ? ' ' . $options['hidden_md'] : '';
        $css_class .= ( !empty( $options['hidden_lg'] ) ) ? ' ' . $options['hidden_lg'] : '';
        $css_class .= ( !empty( $options['hidden_xl'] ) ) ? ' ' . $options['hidden_xl'] : '';
        $css_class .= ( !empty( $options['hidden_xxl'] ) ) ? ' ' . $options['hidden_xxl'] : '';
        return trim( $css_class );
    }
endif; //digiboost_unyson_options_get_responsive_css_classes

//get divider class
if ( !function_exists( 'digiboost_unyson_options_get_divider_css_classes' ) ) :
    function digiboost_unyson_options_get_divider_css_classes( $options ) {
        $css_class = '';
        $css_class .= ( $options['all'] !== '' ) ? ' divider-' . $options['all'] : '';
        $css_class .= ( $options['sm'] !== '' ) ? ' divider-sm-' . $options['sm'] : '';
        $css_class .= ( $options['md'] !== '' ) ? ' divider-md-' . $options['md'] : '';
        $css_class .= ( $options['lg'] !== '' ) ? ' divider-lg-' . $options['lg'] : '';
        $css_class .= ( $options['xl'] !== '' ) ? ' divider-xl-' . $options['xl'] : '';
        $css_class .= ( $options['xxl'] !== '' ) ? ' divider-xxl-' . $options['xxl'] : '';

        return trim( $css_class );
    }
endif; //digiboost unyson_options_get_responsive_css_classes

//detecting is topline is visible
if ( !function_exists( 'digiboost_topline_is_visible' ) ) :
    function digiboost_topline_is_visible() {
        $header = digiboost_get_option( 'page_header' );
        //array with headers where topline is not shown
        return ( !in_array( $header, array( '1' ) ) );
    }
endif; //digiboost_topline_is_visible

//detecting is toplogo is visible
if ( !function_exists( 'digiboost_toplogo_is_visible' ) ) :
    function digiboost_toplogo_is_visible() {
        $header = digiboost_get_option( 'page_header' );
        //array with headers where toplogo is not shown
        return ( !in_array( $header, array( '1', '2', '3' ) ) );
    }
endif; //digiboost_toplogo_is_visible

//detecting is register modal is visible
if ( !function_exists( 'digiboost_register_modal_is_visible' ) ) :
    function digiboost_register_modal_is_visible() {
        $header = digiboost_get_option( 'page_header' );
        //array with headers where register modal is not shown
        return ( !in_array( $header, array( '1' ) ) );
    }
endif; //digiboost_register_modal_is_visible

//detecting is header button is visible
if ( !function_exists( 'digiboost_header_button_is_visible' ) ) :
    function digiboost_header_button_is_visible() {
        $header = digiboost_get_option( 'page_header' );
        //array with headers where header button is not shown
        return ( !in_array( $header, array( '1' ) ) );
    }
endif; //digiboost_header_button_is_visible

//detecting is search widget is visible
if ( !function_exists( 'digiboost_search_widget_is_visible' ) ) :
    function digiboost_search_widget_is_visible() {
        $header = digiboost_get_option( 'page_header' );
        //array with headers where search widget is not shown
        return ( !in_array( $header, array( '2', '3' ) ) );
    }
endif; //digiboost_search_widget_is_visible

//detecting is shopping cart is visible
if ( !function_exists( 'digiboost_shopping_cart_is_visible' ) ) :
    function digiboost_shopping_cart_is_visible() {
        $header = digiboost_get_option( 'page_header' );
        //array with headers where search widget is not shown
        return ( !in_array( $header, array( '2', '3' ) ) );
    }
endif; //digiboost_shopping_cart_is_visible


//detecting is copyright secondary text option is visible
if ( !function_exists( 'digiboost_copyright_secondary_text_is_visible' ) ) :
    function digiboost_copyright_secondary_text_is_visible() {
        $copyright = digiboost_get_option( 'page_copyright' );
        //array with copyright where secondary text is visible
        return ( in_array( $copyright, array( '2' ) ) );
    }
endif; //digiboost_copyright_secondary_text_is_visible

//detecting is copyright logo option is visible
if ( !function_exists( 'digiboost_copyright_logo_is_visible' ) ) :
    function digiboost_copyright_logo_is_visible() {
        $copyright = digiboost_get_option( 'page_copyright' );
        //array with copyright where copyright logo is visible
        return ( in_array( $copyright, array( '3' ) ) );
    }
endif; //digiboost_copyright_logo_is_visible

//detecting if shared buttons section is visible
if ( !function_exists( 'digiboost_shared_buttons_options_is_visible' ) ) :
    function digiboost_shared_buttons_options_is_visible() {
        return function_exists( 'mwt_share_this' );
    }
endif; //digiboost_shared_buttons_options_is_visible

//predefined headers array
if ( !function_exists( 'digiboost_get_predefined_headers_array' ) ) :
    function digiboost_get_predefined_headers_array() {
        return array(
            '1' => esc_html__( 'Default - logo and menu', 'digiboost' ),
            '2' => esc_html__( 'Logo, menu and social icons', 'digiboost' ),
            '3' => esc_html__( 'Narrow header with top logo and info', 'digiboost' ),

        );
    }
endif; //digiboost_get_predefined_headers_array

//header options array for customizer and for page options
if ( !function_exists( 'digiboost_get_header_options_array_for_customizer_and_page' ) ) :
    function digiboost_get_header_options_array_for_customizer_and_page( $defaults ) {
        return array(
            'header_layout' => array(
                'title' => esc_html__( 'Header Layout', 'digiboost' ),
                //type tab for page options
                'type' => 'tab',
                'options' => array(
                    'page_header' => array(
                        'type' => 'select',
                        'value' => $defaults['page_header'],
                        'label' => esc_html__( 'Template Header', 'digiboost' ),
                        'desc' => esc_html__( 'Select one of predefined theme headers', 'digiboost' ),
                        'help' => esc_html__( 'You can select one of predefined theme headers', 'digiboost' ),
                        'choices' => digiboost_get_predefined_headers_array(),
                        'blank' => false, // (optional) if true, image can be deselected
                        'wp-customizer-args' => array(
                            'active_callback' => '__return_true',
                        ),
                    ),
                    'header_absolute' => array(
                        'label' => esc_html__( 'Position Absolute', 'digiboost' ),
                        'desc' => false,
                        'type' => 'switch',

                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => esc_html__( 'Enabled', 'digiboost' )
                        ),
                        'left-choice' => array(
                            'value' => '',
                            'label' => esc_html__( 'Disabled', 'digiboost' )
                        ),
                    ),
                    'header_button' => array(
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
                            'button' => digiboost_shortcode_options( 'button' ),
                        ),
                        'wp-customizer-args' => array(
                            'active_callback' => 'digiboost_header_button_is_visible',
                        ),
                    ),
                    'register_modal' => array(
                        'type'    => 'multi-picker',
                        'label'   => false,
                        'desc'    => false,
                        'value'   => false,
                        'picker'  => array(
                            'show_register_modal' => array(
                                'type'         => 'switch',
                                'label'        => esc_html__( 'Show Register Modal', 'digiboost' ),
                                'left-choice'  => array(
                                    'value' => '',
                                    'label' => esc_html__( 'No', 'digiboost' ),
                                ),
                                'right-choice' => array(
                                    'value' => 'show',
                                    'label' => esc_html__( 'Yes', 'digiboost' ),
                                ),
                            ),
                        ),
                        'choices' => array(
                            ''       => array(),
                            'show' => array(
                                'background_color' => array(
                                    'type'    => 'select',
                                    'value'   => '',
                                    'label'   => esc_html__( 'Background Color For Register Form ', 'digiboost' ),
                                    'desc'    => esc_html__( 'Select background color', 'digiboost' ),
                                    'help'    => esc_html__( 'Select one of predefined background types', 'digiboost' ),
                                    'choices' => digiboost_unyson_option_get_backgrounds_array(),
                                ),
                                'image_login' => array(
                                    'type'        => 'upload',
                                    'value'       => '',
                                    'label'       => esc_html__( 'Image For Register Form', 'digiboost' ),
                                    'images_only' => true,
                                ),
                            ),
                        ),
                        'wp-customizer-args' => array(
                            'active_callback' => 'digiboost_register_modal_is_visible',
                        ),
                    ),
                    'header_search' => array(
                        'label' => esc_html__( 'Show Header Search Product Widget', 'digiboost' ),
                        'desc' => false,
                        'type' => 'switch',
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => esc_html__( 'Yes', 'digiboost' )
                        ),
                        'left-choice' => array(
                            'value' => '',
                            'label' => esc_html__( 'No', 'digiboost' )
                        ),
                        'wp-customizer-args' => array(
                            'active_callback' => 'digiboost_search_widget_is_visible',
                        ),
                    ),
                    'header_shopping_cart' => array(
                        'label' => esc_html__( 'Show Header Shopping Cart Dropdown', 'digiboost' ),
                        'desc' => false,
                        'type' => 'switch',
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => esc_html__( 'Yes', 'digiboost' )
                        ),
                        'left-choice' => array(
                            'value' => '',
                            'label' => esc_html__( 'No', 'digiboost' )
                        ),
                        'wp-customizer-args' => array(
                            'active_callback' => 'digiboost_shopping_cart_is_visible',
                        ),
                    ),
                    'header_show_all_menu_items' => array(
                        'type' => 'switch',
                        'value' => false,
                        'label' => esc_html__( 'Always show all menu items', 'digiboost' ),
                        'desc' => esc_html__( 'Prevent hiding menu items that do not feet in menu width to sub-menus', 'digiboost' ),
                        'help' => esc_html__( 'This option will not work if header with centered logo layout used', 'digiboost' ),
                        'right-choice' => array(
                            'value' => true,
                            'label' => esc_html__( 'Yes', 'digiboost' )
                        ),
                        'left-choice' => array(
                            'value' => false,
                            'label' => esc_html__( 'No', 'digiboost' )
                        ),
                        'wp-customizer-args' => array(
                            'active_callback' => '__return_true',
                        ),
                    ),
                    'header_disable_affix_xl' => array(
                        'type' => 'switch',
                        'value' => false,
                        'label' => esc_html__( 'Prevent sticky header on wide screens', 'digiboost' ),
                        'desc' => esc_html__( 'Prevent header to be fixed on wide screens', 'digiboost' ),
                        'right-choice' => array(
                            'value' => true,
                            'label' => esc_html__( 'Yes', 'digiboost' )
                        ),
                        'left-choice' => array(
                            'value' => false,
                            'label' => esc_html__( 'No', 'digiboost' )
                        ),
                        'wp-customizer-args' => array(
                            'active_callback' => '__return_true',
                        ),
                    ),
                    'header_disable_affix_xs' => array(
                        'type' => 'switch',
                        'value' => false,
                        'label' => esc_html__( 'Prevent sticky header on small screens', 'digiboost' ),
                        'desc' => esc_html__( 'Prevent header to be fixed on small screens', 'digiboost' ),
                        'right-choice' => array(
                            'value' => true,
                            'label' => esc_html__( 'Yes', 'digiboost' )
                        ),
                        'left-choice' => array(
                            'value' => false,
                            'label' => esc_html__( 'No', 'digiboost' )
                        ),
                        'wp-customizer-args' => array(
                            'active_callback' => '__return_true',
                        ),
                    ),
                ),
            ),
            'header_section_options' => array(
                'title' => esc_html__( 'Header Section Options', 'digiboost' ),
                //type tab for page options
                'type' => 'tab',
                'options' => digiboost_get_section_options_array( 'header_', array(
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
                    'active_callback' => '__return_true',
                ),
            ),
        );
    }
endif; //digiboost_get_header_options_array_for_customizer_and_page

//predefined footers array
if ( !function_exists( 'digiboost_get_predefined_footers_array' ) ) :
    function digiboost_get_predefined_footers_array() {
        return array(
            '1' => esc_html__( '4 columns footer', 'digiboost' ),
            '5' => esc_html__( '4 different columns footer', 'digiboost' ),
            '2' => esc_html__( '3 columns footer', 'digiboost' ),
            '3' => esc_html__( '2 columns footer', 'digiboost' ),
            '4' => esc_html__( '1 column footer', 'digiboost' ),
        );
    }
endif; //digiboost_get_predefined_footers_array

//footer options array for customizer and for page options
if ( !function_exists( 'digiboost_get_footer_options_array_for_customizer_and_page' ) ) :
    function digiboost_get_footer_options_array_for_customizer_and_page( $defaults ) {
        return array(
            'footer_layout' => array(
                'title' => esc_html__( 'Footer Section Layout', 'digiboost' ),
                //type tab for page options
                'type' => 'tab',
                'options' => array(
                    'page_footer' => array(
                        'type' => 'select',
                        'value' => $defaults['page_footer'],
                        'label' => esc_html__( 'Page footer', 'digiboost' ),
                        'desc' => esc_html__( 'Select one of predefined page footers.', 'digiboost' ),
                        'help' => esc_html__( 'You can select one of predefined theme footers', 'digiboost' ),
                        'choices' => digiboost_get_predefined_footers_array(),
                        'blank' => false, // (optional) if true, image can be deselected
                    ),
                ),
                'wp-customizer-args' => array(
                    'active_callback' => '__return_true',
                ),
            ),
            'footer_section_options' => array(
                'title' => esc_html__( 'Footer Section Options', 'digiboost' ),
                //type tab for page options
                'type' => 'tab',
                'options' => digiboost_get_section_options_array( 'footer_' ),
                'wp-customizer-args' => array(
                    'active_callback' => '__return_true',
                ),
            ),
            'footer_section_padding' => array(
                'title' => esc_html__( 'Footer Section Padding', 'digiboost' ),
                //type tab for page options
                'type' => 'tab',
                'options' => digiboost_unyson_option_get_section_padding_array( 'footer_' ),
                'wp-customizer-args' => array(
                    'active_callback' => '__return_true',
                ),
            ),
        );
    }
endif; //digiboost_get_footer_options_array_for_customizer_and_page


//categories list default markup
add_filter( 'digiboost_get_the_terms_defaults', function ( $args ) {
    $args['before'] = '<span class="cat-links">';
    $args['after'] = '</span>';

    return $args;
} );

add_filter( 'digiboost_get_comments_counter_defaults', function ( $args ) {

    $options = digiboost_get_options();
    if ( !empty( $options['blog_hide_comments_link'] ) ) {
        $args['print'] = false;
    }

    return $args;
} );

