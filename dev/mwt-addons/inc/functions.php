<?php
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

if ( !function_exists( 'digiboost_slide_speed' ) ):
	/**
	 * Output global sliding speed.
	 */
	function digiboost_slide_speed( $default = 5000 ) {
		
		return	5000;
	}
endif;

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


if ( !function_exists( 'digiboost_get_unyson_icon_type_v2_array_for_special_heading' ) ) :
	function digiboost_get_unyson_icon_type_v2_array_for_special_heading( $atts, $key ) {
		
		if ( !defined( 'FW' ) ) {
			return false;
		}
		if ( empty( $atts['headings'][ $key ]['heading_icon'] ) ) {
			return false;
		}
		$icon_array = $atts['headings'][ $key ]['heading_icon'];
		$icon_html = '';
		$icon_type = false;
		if ( $icon_array['type'] === 'icon-font' ) {
			if ( $icon_array['icon-class'] !== '' ) {
				$icon_html = '<i class="' . $icon_array['icon-class'] . '"></i>';
				$icon_type = 'icon';
			}
		} elseif ( $icon_array['type'] === 'custom-upload' ) {
			$icon_html = '<img src="' . $icon_array['url'] . '" alt="' . esc_attr( $atts['headings'][ $key ]['heading_text'] ) . '" class="special-heading-image">';
			$icon_type = 'image';
		}
		return array(
			'icon_html' => $icon_html,
			'icon_type' => $icon_type,
		);
	}
endif; //digiboost_get_unyson_icon_type_v2_array_for_special_heading

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

if ( !function_exists( 'digiboost_categorized_blog' ) ) :
	function digiboost_categorized_blog() {
		if ( false === ( $all_categories = get_transient( 'digiboost_category_count' ) ) ) {
			// Create an array of all the categories that are attached to posts
			$all_categories = get_categories( array(
				'hide_empty' => 1,
			) );
			
			// Count the number of categories that are attached to the posts
			$all_categories = count( $all_categories );
			
			set_transient( 'digiboost_category_count', $all_categories );
		}
		
		if ( 1 !== (int)$all_categories ) {
			// This blog has more than 1 category so digiboost_categorized_blog should return true
			return true;
		} else {
			// This blog has only 1 category so digiboost_categorized_blog should return false
			return false;
		}
	}
endif; //digiboost_categorized_blog()

if ( !function_exists( 'digiboost_get_option' ) ) :
	/**
	 * Get single option
	 * @param $option_name
	 * @param string $default_value
	 *
	 * @return mixed|string
	 */
	function digiboost_get_option( $option_name, $default_value = '' ) {

		return true;
	}
endif; //digiboost_get_option

if ( !function_exists( 'digiboost_posted_on' ) ) : /**
 * Print HTML with meta information for the current post-date/time and author.
 */
	function digiboost_posted_on ( $included_keys = array( 'date', 'author', 'comments', 'categories', 'tags', 'sticky' ) ) {
		
		$options = digiboost_get_options();
		$hide_author = $options['blog_hide_author'];
		$hide_date = $options['blog_hide_date'];
		$hide_comments = $options['blog_hide_comments_link'];
		$hide_categories = $options['blog_hide_categories'];
		$hide_tags = $options['blog_hide_tags'];
		
		if ( $included_keys ) {
			foreach ( $included_keys as $key ) {
				switch ( $key ) {
					case 'author':
						if ( !$hide_author ) :
							digiboost_the_author( array(
								'before' => '<span class="author vcard">',
								'avatar' => '<i class="fa fa-user-o" aria-hidden="true"></i>',
								'after' => '</span>',
								'link_class' => 'url fn n',
								'link_attributes' => 'rel="author"',
							) );
						endif; //!hide_author
						break;
					case 'date':
						if ( !$hide_date ) :
							digiboost_the_date( array(
								'before' => '<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>',
								'after' => '</span>',
								'link_attributes' => 'rel="bookmark"',
								'time_tag_class' => 'entry-date'
							) );
						endif; //!hide_date
						break;
					case 'comments':
						if ( !$hide_comments ) :
							digiboost_comments_counter( array(
								'before' => '<span class="comments-link"><i class="fa fa-comment-o" aria-hidden="true"></i>',
								'after' => '</span>',
								'link_attributes' => 'rel="bookmark"',
								'time_tag_class' => 'entry-comments'
							) );
						endif; //!hide_comments
						break;
					case 'categories':
						if ( !$hide_categories ) :
							digiboost_the_categories();
						endif; //!hide_categories
						break;
					case 'tags':
						if ( !$hide_tags ) :
							the_tags( '<div class="tagcloud">', '', '</div>' );
						endif; //!hide_tags
						break;
					case 'sticky':
						digiboost_sticky_marker( array(
							'sticky_symbol' => 'fa fa-thumb-tack',
							'before' => '<span class="featured-post">',
							'after' => esc_html__( ' Sticky', 'digiboost' ) . '</span>',
						) );
						break;
					case 'more_button':
						digiboost_more_button( array(
							'text' => wp_kses_post( 'Read More<i class="fa fa-long-arrow-right" aria-hidden="true"></i>' ),
							'class' => 'btn btn-outline-darkgrey only-link'
						
						) );
						break;
				}
			}
		}
	}

endif; //digiboost_posted_on

if ( !function_exists( 'digiboost_get_options' ) ) :
	/**
	 * Get all theme options in one array
	 * @return array
	 */
	function digiboost_get_options() {

		return true;
	}
endif; //digiboost_get_options


if ( ! function_exists( 'digiboost_the_date' ) ) :
	/**
	 * Echo formatted post date.
	 */
	function digiboost_the_date( $args = array() ) {
		
		$args[ 'is_output' ] = true;
		
		echo wp_kses( digiboost_get_the_date( $args ), digiboost_tt_kses_list( $args ) );
	}
endif;

if ( ! function_exists( 'digiboost_get_the_date' ) ) :
	/**
	 * Retrieve formatted post date.
	 */
	function digiboost_get_the_date( $args = array() ) {
		
		if ( ! array_key_exists( 'object_type', $args ) ) {
			$args['object_type'] = 'post';
		}
		
		if ( ! array_key_exists( 'format', $args ) ) {
			$args['format'] = get_option( 'date_format' );
		}
		
		return digiboost_get_object_time( $args );
	}
endif;

if ( ! function_exists( 'digiboost_get_object_time' ) ) :
	/**
	 * Retrieve formatted object time.
	 */
	function digiboost_get_object_time( $args = array() ) {
		
		// Arguments defaults can be overridden by 'digiboost_get_the_terms_defaults' filter.
		$defaults = array();
		
		
		// ARGUMENTS LIST:
		
		/* @var $print bool */                  /** 'to print' switcher for output function(s) */
		// To output or not.
		// Does not affect getter functions.
		$defaults[ 'print' ]                    = true;
		
		
		/* @var $object_type string */
		$defaults[ 'object_type' ]              = 'post';
		
		/* @var $comment_args array */
		$defaults[ 'comment_args' ]             = array();
		
		
		/* @var $format */
		$defaults[ 'format' ]                   = 'F d, Y \a\t H:i a';
		
		/* @var $time_variant string */
		$defaults[ 'time_variant' ]             = 'published';
		
		/* @var $return_type string */
		$defaults[ 'return_type' ]              = 'time-tag';
		
		/* @var $screen_reader string */
		$defaults[ 'screen_reader' ]            = '';
		
		
		/* @var $before string */
		$defaults[ 'before' ]                   = '';
		
		/* @var $after string */
		$defaults[ 'after' ]                    = '';
		
		
		/* @var $use_link bool */
		$defaults[ 'use_link' ]                 = true;
		
		/* @var $link_variant string */
		$defaults[ 'link_variant' ]             = 'day';
		
		/* @var $link_class string */
		$defaults[ 'link_class' ]               = '';
		
		/* @var $link_attributes string */
		$defaults[ 'link_attributes' ]          = '';
		
		
		/* @var $time_tag_class string */
		$defaults[ 'time_tag_class' ]           = '';
		
		/* @var $time_tag_attributes string */
		$defaults[ 'time_tag_attributes' ]      = '';
		
		
		/* @var $days_ago bool */
		$defaults[ 'days_ago' ]                 = false;
		
		/* @var $days_ago_max_days int */
		$defaults[ 'days_ago_max_days' ]        = - 1;
		
		/* @var $days_ago_text string */
		$defaults[ 'days_ago_text' ]            = esc_html__( 'days ago', 'digiboost' );
		
		/* @var $today string */
		$defaults[ 'today' ]                    = esc_html__( 'Today', 'digiboost' );
		
		/* @var $yesterday string */
		$defaults[ 'yesterday' ]                = esc_html__( 'Yesterday', 'digiboost' );
		
		/* @var $week_ago string */
		$defaults[ 'week_ago' ]                 = esc_html__( 'Week ago', 'digiboost' );
		
		/* @var $weeks_ago string */
		$defaults[ 'weeks_ago' ]                = esc_html__( 'weeks ago', 'digiboost' );
		
		/* @var $month_ago string */
		$defaults[ 'month_ago' ]                = esc_html__( 'Month ago', 'digiboost' );
		
		/* @var $months_ago string */
		$defaults[ 'months_ago' ]               = esc_html__( 'months ago', 'digiboost' );
		
		/* @var $year_ago string */
		$defaults[ 'year_ago' ]                 = esc_html__( 'Year ago', 'digiboost' );
		
		/* @var $years_ago string */
		$defaults[ 'years_ago' ]                = esc_html__( 'years ago', 'digiboost' );
		
		
		/* @var $no_title bool */
		$defaults[ 'no_title' ]                 = false;
		
		/* @var $is_new_day bool */
		$defaults[ 'is_new_day' ]               = false;
		
		// end of ARGUMENTS LIST
		
		
		// Replace defaults globally
		$defaults = array_merge( $defaults, apply_filters( 'digiboost_get_object_time_defaults', array() ) );
		
		// Replace defaults locally and init variables
		foreach ( $defaults as $key => $value ) { ${$key} = array_key_exists( $key, $args ) ? $args[ $key ] : $value; }
		
		// print switcher for output function(s)
		if ( array_key_exists( 'is_output', $args ) ) {
			if ( $args[ 'is_output' ] ) {
				if ( ! $print ) { return ''; }
			}
		}
		
		$out = '';
		
		// Whether the publish date of the current post in the loop is different from the publish date of the previous post in the loop
		if ( $is_new_day ) {
			if ( is_new_day() ) {
				global $currentday, $previousday;
				$previousday = $currentday;
			} else {
				return $out;
			}
		}
		
		// if not post or comment, return
		if ( ! in_array( $object_type, array( 'post', 'comment' ) ) ) {
			return $out;
		}
		
		// published time by default
		if ( ! in_array( $time_variant, array( 'published', 'updated' ) ) || 'comment' == $object_type ) {
			$time_variant = 'published';
		}
		
		$object_id = '';
		$time      = '';
		$time_diff = '';
		
		// post time
		if ( 'post' == $object_type ) {
			
			$object_id = isset( $post_id ) ? $post_id : get_the_ID();
			
			// published time
			if ( 'published' == $time_variant ) {
				$time      = get_the_date( $format, $object_id );
				$time_diff = new DateTime( get_the_date( 'Y-n-d', $object_id ) . 'T' . get_the_time( 'H:i', $object_id ) );
				
			}
			
			// updated time
			if ( 'updated' == $time_variant ) {
				$time      = get_the_modified_date( $format, $object_id );
				$time_diff = new DateTime( get_the_modified_date( 'Y-n-d', $object_id ) . 'T' . get_the_modified_time( 'H:i', $object_id ) );
			}
		}
		
		// comment time
		if ( 'comment' == $object_type ) {
			
			$object_id = isset( $comment_id ) ? $comment_id : get_comment_ID();
			
			$time      = get_comment_date( $format, $object_id );
			$time_diff = new DateTime( get_comment_date( 'Y-n-d', $object_id ) . 'T' . get_comment_date( 'H:i', $object_id ) );
		}
		
		if ( '' != $time ) {
			
			// for 'days ago' output
			if ( '' != $time_diff && $days_ago ) {
				
				//calc difference
				$time_diff   = $time_diff->diff( new DateTime( 'NOW' ) );
				$time_days   = $time_diff->days;
				$time_months = $time_diff->m;
				$time_years  = $time_diff->y;
				
				// max days difference for using 'days ago' output
				if ( $days_ago_max_days > 0 ) {
					$days_ago = ( $days_ago_max_days >= $time_days );
				}
				
				// difference output type
				if ( $days_ago ) {
					
					if ( $time_years > 0 ) {
						
						switch ( $time_years ) {
							case 1:
								$time = $year_ago;
								break;
							default:
								$time = $time_years . ' ' . $years_ago;
								break;
						}
						
					} elseif ( $time_months > 0 ) {
						
						switch ( $time_months ) {
							case 1:
								$time = $month_ago;
								break;
							default:
								$time = $time_months . ' ' . $months_ago;
								break;
						}
						
					} else {
						
						switch ( $time_days ) {
							case 0:
								$time = $today;
								break;
							case 1:
								$time = $yesterday;
								break;
							case $time_days > 1 && $time_days < 7:
								$time = $time_days . ' ' . $days_ago_text;
								break;
							case $time_days >= 7 && $time_days < 14:
								$time = $week_ago;
								break;
							case $time_days >= 14 && $time_days < 30:
								$time = floor( $time_days / 7 ) . ' ' . $weeks_ago;
								break;
							default:
								$time = $time_days . ' ' . $days_ago_text;
								break;
						}
					}
				}
			}
			
			// for datetime="" attribute
			$time_iso = '';
			
			if ( 'post' == $object_type ) {
				$time_iso = get_the_date( 'c' );
			}
			
			if ( 'comment' == $object_type ) {
				$time_iso = get_comment_date( 'c' );
			}
			
			// use '<time>' tag by default
			if ( ! in_array( $return_type, array( 'time-tag', 'simple' ) ) ) {
				$return_type = 'time-tag';
			}
			
			// Output
			
			$time_string = '';
			
			// time string for output with '<time>' tag
			if ( 'time-tag' == $return_type ) {
				
				$time_string = sprintf( '<time class="%s%s" datetime="%s"%s>%s</time>',
					$time_variant,
					( '' != $time_tag_class ) ? ' ' . $time_tag_class : '',
					$time_iso,
					( '' != $time_tag_attributes ) ? ' ' . $time_tag_attributes : '',
					$time
				);
			}
			
			// time string for output without '<time>' tag
			if ( 'simple' == $return_type ) {
				$time_string = $time;
			}
			
			$out .= $before;
			
			// screen reader text
			if ( '' != $screen_reader ) {
				$out .= '<span class="screen-reader-text">' . $screen_reader . '</span>';
			}
			
			// output for time with link
			if ( $use_link ) {
				
				$time_url = '';
				
				// url for post
				if ( 'post' == $object_type ) {
					
					if ( $no_title && '' == get_the_title( $object_id ) ) {
						
						// post without title case
						$time_url = get_the_permalink( $object_id );
						
					} else {
						
						// post url destination
						
						if ( ! in_array( $link_variant, array( 'year', 'month', 'day' ) ) ) {
							$link_variant = 'day';
						}
						
						switch ( $link_variant ) {
							case 'year':
								$time_url = esc_url( get_year_link(
									get_the_date( 'Y', $object_id )
								) );
								break;
							case 'month':
								$time_url = esc_url( get_month_link(
									get_the_date( 'Y', $object_id ),
									get_the_date( 'm', $object_id )
								) );
								break;
							case 'day':
							default:
								$time_url = esc_url( get_day_link(
									get_the_date( 'Y', $object_id ),
									get_the_date( 'm', $object_id ),
									get_the_date( 'd', $object_id )
								) );
								break;
						}
					}
				}
				
				// url for comment
				if ( 'comment' == $object_type ) {
					$time_url = esc_url( get_comment_link( $object_id, $comment_args ) );
				}
				
				// link output
				$out .= sprintf( '<a%s href="%s"%s>%s</a>',
					( '' != $link_class ) ? ' ' . 'class="' . $link_class . '"' : '',
					esc_url( $time_url ),
					( '' != $link_attributes ) ? ' ' . $link_attributes : '',
					$time_string
				);
				
				// output for time without link
			} else {
				$out .= $time_string;
			}
			
			$out .= $after;
		}
		
		return apply_filters( 'digiboost_get_object_time', $out );
	}
endif;


if ( ! function_exists( 'digiboost_tt_kses_list' ) ) :
	/**
	 * Return array of allowed tags for template tags functions.
	 */
	function digiboost_tt_kses_list( $args = array() ) {
		
		$kses_tags = array();
		$kses_atts = array();
		if ( array_key_exists( 'kses_tags', $args ) ) {
			$kses_tags = $args[ 'kses_tags' ];
		}
		if ( array_key_exists( 'kses_atts', $args ) ) {
			$kses_atts = $args[ 'kses_atts' ];
		}
		$out = function_exists( 'digiboost_kses_list' ) ? digiboost_kses_list( $kses_tags, $kses_atts ) : 'post';
		$out = apply_filters( 'digiboost_tt_kses_list', $out );
		
		return $out;
	}
endif;

if ( !function_exists( 'digiboost_trim_title_words' ) ) {
	function digiboost_trim_title_words( $count, $after ) {
		$title = get_the_title();
		$words = explode( ' ', $title );
		if ( count( $words ) > $count ) {
			array_splice( $words, $count );
			$title = implode( ' ', $words );
		} else $after = '';
		echo esc_html( $title . $after );
	}
}

if ( ! function_exists( 'digiboost_more_button' ) ) :
	/**
	 * Echo formatted more_button.
	 */
	function digiboost_more_button( $args = array() ) {
		
		$args[ 'is_output' ] = true;
		
		echo wp_kses( digiboost_get_more_button( $args ), digiboost_tt_kses_list( $args ) );
	}
endif;

if ( ! function_exists( 'digiboost_get_more_button' ) ) :
	/**
	 * Retrieve formatted more_button.
	 */
	function digiboost_get_more_button( $args = array() ) {
		
		// Arguments defaults can be overridden by 'digiboost_get_the_terms_defaults' filter.
		$defaults = array();
		
		
		// ARGUMENTS LIST:
		
		/* @var $print bool */                /** 'to print' switcher for output function(s) */
		// To output or not.
		// Does not affect getter functions.
		$defaults[ 'print' ]                = true;
		
		/* @var $post_id int|false */         /** Post ID */
		$defaults[ 'post_id' ]              = get_the_ID();
		
		
		/* @var $text string */
		$defaults[ 'text' ]                 = esc_attr__( 'Read More', 'digiboost' );
		
		
		/* @var $before string */
		$defaults[ 'before' ]               = '';
		
		/* @var $after string */
		$defaults[ 'after' ]                = '';
		
		
		/* @var $class string */
		$defaults[ 'class' ]                = 'more-button btn btn-outline-darkgrey';
		
		/* @var $additional_class string */
		$defaults[ 'additional_class' ]     = '';
		
		/* @var $attributes string */
		$defaults[ 'attributes' ]           = '';
		
		// end of ARGUMENTS LIST
		
		
		// Replace defaults globally
		$defaults = array_merge( $defaults, apply_filters( 'digiboost_get_more_button_defaults', array() ) );
		
		// Replace defaults locally and init variables
		foreach ( $defaults as $key => $value ) { ${$key} = array_key_exists( $key, $args ) ? $args[ $key ] : $value; }
		
		if ( '' != $additional_class ) {
			$class = implode( ' ', array( $class, $additional_class ) );
		}
		
		// print switcher for output function(s)
		if ( array_key_exists( 'is_output', $args ) ) {
			if ( $args[ 'is_output' ] ) {
				if ( ! $print ) { return ''; }
			}
		}
		
		$out = '';
		
		$out .= $before;
		
		$out .= sprintf( '<a%s%s%s>%s</a>',
			'' != $class ? ' ' . 'class="' . $class . '"' : '',
			' ' . 'href="' . esc_url( get_the_permalink( $post_id ) ) . '"',
			( '' != $attributes ) ? ' ' . $attributes : '',
			$text
		);
		
		$out .= $after;
		
		return apply_filters( 'digiboost_get_more_button', $out );
	}
endif;


//get icon array for special header for Unyson builder
if ( !function_exists( 'digiboost_get_unyson_icon_type_v2_array' ) ) :
	function digiboost_get_unyson_icon_type_v2_array( $atts, $key ) {
		if ( !defined( 'FW' ) ) {
			return array(
				'icon_html' => '',
				'icon_type' => false,
			);
		}
		$icon_array = $atts[ $key ];
		$icon_html = '';
		$icon_type = false;
		if ( $icon_array['type'] === 'icon-font' ) {
			if ( $icon_array['icon-class'] !== '' ) {
				$icon_html = '<i class="' . $icon_array['icon-class'] . '"></i>';
				$icon_type = 'icon';
			}
		} elseif ( $icon_array['type'] === 'custom-upload' ) {
			$icon_html = '<img src="' . $icon_array['url'] . '" alt="' . esc_attr( $icon_array['type'] ) . '" class="special-heading-image">';
			$icon_type = 'image';
		}
		return array(
			'icon_html' => $icon_html,
			'icon_type' => $icon_type,
		);
	}
endif; //digiboost_get_unyson_icon_type_v2_array

//get icon styled css class
if ( !function_exists( 'digiboost_get_unyson_icon_styled_class' ) ) :
	function digiboost_get_unyson_icon_styled_class( $atts ) {
		if ( !defined( 'FW' ) ) {
			return '';
		}
		$class = $atts['icon_font_size'];
		$style_cololr_divider = ' ';
		
		//check if is bg- icon_style
		if ( strstr( $atts['icon_style'], 'bg-' ) ) {
			//main colors
			$atts['icon_color'] = str_replace( 'color-main', 'maincolor', $atts['icon_color'] );
			//darkgrey colors
			$atts['icon_color'] = str_replace( 'color-', '', $atts['icon_color'] );
			
			$style_cololr_divider = '';
		}
		
		return trim( $class . ' ' . $atts['icon_style'] . $style_cololr_divider . $atts['icon_color'] );
	}
endif; //digiboost_get_unyson_icon_styled_class

if ( !function_exists( 'digiboost_is_active_widgets_in_main_sidebar_exists' ) ) :
	/**
	 * Define is sidebar that must be shown has active widgets
	 */
	function digiboost_is_active_widgets_in_main_sidebar_exists() {
		//default value
		$return = true;
		
		//if Unyson exists
		if ( function_exists( 'fw_ext_sidebars_show' ) ) {
			//if custom sidebar is set for current page
			if ( fw_ext_sidebars_show( 'blue' ) ) {
				//if custom sidebar is not empty - see theme/framework-customizations/extensions/sidebars/views/frontend-no-widgets.php
				if ( fw_ext_sidebars_show( 'blue' ) !== '1' ) {
					$return = true;
				} else {
					$return = false;
				}
				//if no custom sidebar but Unyson exists
			} else {
				//if no default sidebar
				if ( !is_active_sidebar( 'sidebar-main' ) ) {
					$return = false;
				} else {
					$return = true;
				}
			}
			//no Unyson and empty sidebar
		} else {
			if ( !is_active_sidebar( 'sidebar-main' ) ) {
				$return = false;
			} else {
				$return = true;
			}
		}
		return $return;
	}
endif; //digiboost_is_active_widgets_in_main_sidebar_exists


if ( ! function_exists( 'digiboost_the_categories' ) ) :
	/**
	 * Echo formatted categories.
	 */
	function digiboost_the_categories( $args = array() ) {
		
		$args[ 'is_output' ] = true;
		
		echo wp_kses( digiboost_get_the_categories( $args ), digiboost_tt_kses_list( $args ) );
	}
endif;

if ( ! function_exists( 'digiboost_get_the_categories' ) ) :
	/**
	 * Retrieve formatted categories.
	 */
	function digiboost_get_the_categories( $args = array() ) {
		
		if ( ! array_key_exists( 'taxonomy', $args ) ) {
			$args['taxonomy'] = 'category';
			
			if ( apply_filters( 'digiboost_use_auto_taxonomy_for_template_tags', true ) ) {
				$args['taxonomy'] = digiboost_auto_taxonomy( array( 'type' => 'category' ) );
			}
		}
		
		return digiboost_get_the_terms( $args );
	}
endif;

if ( ! function_exists( 'digiboost_auto_taxonomy' ) ) :
	/**
	 * Return taxonomy of given type for given post_type.
	 */
	function digiboost_auto_taxonomy( $args = array() ) {
		
		$post_type = array_key_exists( 'post_type', $args )
			? $args['post_type']
			: ( array_key_exists( 'post_id', $args )
				? get_post_type( $args['post_id'] )
				: get_post_type() );
		
		$type = array_key_exists( 'type', $args ) ? $args['type'] : 'category';
		
		$out = '';
		
		$taxonomies = array(
			'post'         => array(
				'category' => 'category',
				'tag'      => 'post_tag',
			),
			'fw-portfolio' => array(
				'category' => 'fw-portfolio-category',
			),
			'fw-event'     => array(
				'category' => 'fw-event-taxonomy-name',
			),
			'fw-services'  => array(
				'category' => 'fw-services-category',
			),
			'fw-team'  => array(
				'category' => 'fw-team-category',
			),
			'product'      => array(
				'category' => 'product_cat',
				'tag'      => 'product_tag',
			),
		);
		
		$taxonomies = array_merge( $taxonomies, apply_filters( 'digiboost_auto_taxonomy_list', array() ) );
		
		if ( array_key_exists( $post_type, $taxonomies ) ) {
			if ( array_key_exists( $type, $taxonomies[ $post_type ] ) ) {
				$out = $taxonomies[ $post_type ][ $type ];
			}
		}
		
		return $out;
	}
endif;


if ( ! function_exists( 'digiboost_get_the_terms' ) ) :
	/**
	 * Retrieve formatted terms.
	 */
	function digiboost_get_the_terms( $args = array() ) {
		
		// Arguments defaults can be overridden by 'digiboost_get_the_terms_defaults' filter.
		$defaults = array();
		
		
		// ARGUMENTS LIST:
		
		/* @var $print bool */           /** 'to print' switcher for output function(s) */
		// To output or not.
		// Does not affect getter functions.
		$defaults[ 'print' ]           = true;
		
		/* @var $post_id int|false */    /** Post ID */
		$defaults[ 'post_id' ]         = get_the_ID();
		
		/* @var $taxonomy string */      /** Taxonomy */
		// ! not recommended to use directly
		// For posts, portfolios, events, services, team, woo products, ... taxonomies are
		// automated via digiboost_auto_taxonomy() mechanism.
		// If your taxonomy is replica of category or tag,
		// edit $taxonomies array in digiboost_auto_taxonomy() function.
		// Use this argument for non standard taxonomies only.
		$defaults[ 'taxonomy' ]        = 'category';
		
		
		/* @var $featured_ids array */   /** Use only terms with this IDs */
		// Can be automated via unyson post options. In this case use option name instead of IDs array.
		// Already done for post categories and post tags.
		$defaults[ 'featured_ids' ]    = array();
		
		/* @var $empty_featured bool */  /** Use any terms if there are no featured */
		$defaults[ 'empty_featured' ]  = true;
		
		/* @var $max_items int */        /** Limit items number. -1 is not limited */
		$defaults[ 'max_items' ]       = - 1;
		
		/* @var $return_type string */   /** What will be returned */
		// 'objects-array'  for array of WP_Term objects,
		// 'html-array'     for array of formatted items,
		// 'html'           for items in fully formatted html.  */
		$defaults[ 'return_type' ]     = 'html';
		
		
		/* @var $before string */        /** Goes before all items */
		$defaults[ 'before' ]          = '';
		
		/* @var $after string */         /** Goes after all items */
		$defaults[ 'after' ]           = '';
		
		/* @var $before_singular string */ /** Overrides 'before', if there is only one item after all operations */
		$defaults[ 'before_singular' ] = '';
		
		/* @var $after_singular string */  /** Overrides 'after', if there is only one item after all operations */
		$defaults[ 'after_singular' ]  = '';
		
		/* @var $output_multiple bool */ /** Get items, if there is more then one item after all operations */
		$defaults[ 'output_multiple' ] = true;
		
		/* @var $output_singular bool */ /** Get items, if there is one item after all operations */
		// 'output_multiple' and 'output_singular' work independently.
		$defaults[ 'output_singular' ] = true;
		
		
		/* @var $item_before string */   /** Goes before each item outside of the link */
		// Works, no matter if link is used or not.
		$defaults[ 'item_before' ]     = '';
		
		/* @var $item_after string */    /** Goes after each item outside of the link */
		//Works, no matter if link is used or not.
		$defaults[ 'item_after' ]      = '';
		
		/* @var $use_link bool */        /** Use link for each item. */
		$defaults[ 'use_link' ]        = true;
		
		/* @var $link_class string */    /** Class for each item's link */
		// Works, only if link is used.
		$defaults[ 'link_class' ]      = '';
		
		/* @var $link_attributes string */ /** Additional tag attributes for each item's link */
		// Works, only if link is used.
		// Use 'kses_tags' and 'kses_atts' parameter if needed.
		$defaults[ 'link_attributes' ] = '';
		
		/* @var $link_before string */   /** Goes before each item inside of the link */
		// Works, only if link is used.
		$defaults[ 'link_before' ]     = '';
		
		/* @var $link_after string */    /** Goes after each item inside of the link. Works, only if link is used. */
		$defaults[ 'link_after' ]      = '';
		
		
		/* @var $screen_reader string */ /** Screen Reader html */
		// Goes between 'before' and items list.
		$defaults[ 'screen_reader' ]   = '';
		
		/* @var $items_separator string */ /** Goes between items */
		$defaults[ 'items_separator' ] = '<span class="terms-separator">'
			. esc_html_x( ' ', 'Used between list items, there is a space after the comma.', 'digiboost' )
			. '</span>';
		
		
		/* 'kses_tags' */                /** Adds tags to kses list via digiboost_kses_list() */
		// Only for output functions.
		// Cannot be overridden globally. Edit digiboost_kses_list() manually instead.
		
		/* 'kses_atts' */                /* Adds attributes for all tags in kses list via digiboost_kses_list() */
		// Only for output functions.
		// Cannot be overridden globally. Edit digiboost_kses_list() manually instead.
		
		// end of ARGUMENTS LIST
		
		
		// Replace defaults globally
		$defaults = array_merge( $defaults, apply_filters( 'digiboost_get_the_terms_defaults', array() ) );
		
		// Replace defaults locally and init variables
		foreach ( $defaults as $key => $value ) { ${$key} = array_key_exists( $key, $args ) ? $args[ $key ] : $value; }
		
		// ! experimental
		$crop = array_key_exists( 'crop', $args ) ? $args[ 'crop' ] : - 1;
		
		// print switcher for output function(s)
		if ( array_key_exists( 'is_output', $args ) ) {
			if ( $args[ 'is_output' ] ) {
				if ( ! $print ) { return ''; }
			}
		}
		
		$out = '';
		
		// get terms
		$terms_raw = get_the_terms( $post_id, $taxonomy );
		$terms     = array();
		
		if ( ! empty( $terms_raw ) && ! is_wp_error( $terms_raw ) ) {
			
			// featured filter
			if ( is_string( $featured_ids ) ) {
				$featured_ids = function_exists( 'fw_get_db_post_option' )
					? fw_get_db_post_option( $post_id, $featured_ids, '' ) : '';
			}
			if ( ! is_array( $featured_ids ) ) {
				$featured_ids = array();
			}
			if ( ! empty( $featured_ids ) ) {
				foreach ( $terms_raw as $term ) {
					if ( in_array( $term->term_id, $featured_ids ) ) {
						$terms[] = $term;
					}
				}
			}
			
			// use any terms if there are no featured
			if ( empty( $terms ) && $empty_featured ) {
				$terms = $terms_raw;
			}
			
			// crop terms array to $max_items
			if ( ! empty( $terms ) ) {
				if ( - 1 != $max_items ) {
					$terms = array_slice( $terms, 0, $max_items );
				}
			}
			
			if ( ! empty( $terms ) ) {
				
				// crop terms array to $max_items
				if ( - 1 != $max_items ) {
					$terms = array_slice( $terms, 0, $max_items );
				}
				
				// sanitize $return_type
				if ( ! in_array( $return_type, array( 'objects-array', 'html-array', 'html' ) ) ) {
					
					$return_type = 'html';
				}
				
				// TODO: terms string crop
				if ( 'objects-array' != $return_type ) {
					
					if ( $crop > - 1 && count( $terms ) > 0 ) {
						
						$terms_length     = 0;
						$terms_new_length = 0;
						$separator_length = strlen( $items_separator );
						$crop             = false;
						
						foreach ( $terms as $key => &$term ) {
							
							$terms_length += strlen( $term->name );
							
							$terms_length += $separator_length;
							
							if ( $crop ) {
								unset( $terms[ $key ] );
							} elseif ( $terms_length > $crop ) {
								$crop             = true;
								$terms_new_length = $terms_length;
							}
						}
						
						$terms_new_length -= strlen( end( $terms )->name ) + $separator_length;
						$terms_new_length = $crop - $terms_new_length;
						
						if ( $terms_new_length > 0 ) {
							end( $terms )->name = substr( end( $terms )->name, 0, $terms_new_length );
						} else {
							array_pop( $terms );
						}
					}
				}
				
				// Multiple or Singular
				if ( count( $terms ) == 1 ) {
					$has_output = $output_singular;
					
					if ( '' != $before_singular ) {
						$before = $before_singular;
					}
					if ( '' != $after_singular ) {
						$after = $after_singular;
					}
				} else {
					$has_output = $output_multiple;
				}
				
				// Output
				if ( $has_output ) {
					
					if ( 'objects-array' == $return_type ) {
						$out = $terms;
					} else {
						
						// term items array
						$term_items = array();
						foreach ( $terms as $term ) {
							
							$term_item = '';
							
							$term_item .= $item_before;
							
							// term item content
							
							if ( $use_link ) {
								
								// with link
								$term_item .= sprintf( '<a%s%s%s>%s%s%s</a>',
									'' != $link_class ? ' ' . 'class="' . $link_class . '"' : '',
									' ' . 'href="' . get_term_link( $term ) . '"',
									'' != $link_attributes ? ' ' . $link_attributes : '',
									$link_before,
									$term->name,
									$link_after
								);
							} else {
								
								// without link
								$term_item .= $term->name;
							}
							
							$term_item .= $item_after;
							
							$term_items[] = $term_item;
						}
						
						// array or list output
						switch ( $return_type ) {
							
							// array
							case 'html-array':
								$out = $term_items;
								break;
							
							// html
							case 'html':
								
								$out .= $before;
								$out .= $screen_reader;
								$out .= implode( $items_separator, $term_items );
								$out .= $after;
								break;
						}
					}
				}
			}
		}
		
		return apply_filters( 'digiboost_get_the_terms', $out );
	}
endif;

if ( ! function_exists( 'digiboost_the_excerpt' ) ) :
	/**
	 * Echo excerpt with custom length in characters or words and custom more link.
	 */
	function digiboost_the_excerpt( $args = array() ) {
		
		$args[ 'is_output' ] = true;
		
		echo wp_kses( digiboost_get_the_excerpt( $args ), digiboost_tt_kses_list( $args ) );
	}
endif;

if ( ! function_exists( 'digiboost_get_the_excerpt' ) ) :
	/**
	 * Retrieve excerpt with custom length in characters or words and custom more link.
	 */
	function digiboost_get_the_excerpt( $args = array() ) {
		
		// Arguments defaults can be overridden by 'digiboost_get_the_terms_defaults' filter.
		$defaults = array();
		
		
		// ARGUMENTS LIST:
		
		/* @var $print bool */           /** 'to print' switcher for output function(s) */
		// To output or not.
		// Does not affect getter functions.
		$defaults[ 'print' ]           = true;
		
		/* @var $post_id int|false */    /** Post ID */
		$defaults[ 'post_id' ]         = get_the_ID();
		
		
		/* @var $use_summary bool */
		$defaults[ 'use_summary' ]                  = true;
		
		/* @var $use_content bool */
		$defaults[ 'use_content' ]                  = true;
		
		/* @var $content_part string */
		$defaults[ 'content_part' ]                 = 'whole-post';
		
		/* @var $respect_pages string */
		$defaults[ 'respect_pages' ]                = 'all-pages';
		
		
		/* @var $strip_shortcodes bool */
		$defaults[ 'strip_shortcodes' ]             = true;
		
		/* @var $use_the_content_filters bool */
		$defaults[ 'use_the_content_filters' ]      = true;
		
		/* @var $escape_cdata_closing bool */
		$defaults[ 'escape_cdata_closing' ]         = true;
		
		/* @var $strip_tags bool */
		$defaults[ 'strip_tags' ]                   = true;
		
		/* @var $merge_spaces bool */
		$defaults[ 'merge_spaces' ]                 = true;
		
		
		/* @var $length int */
		$defaults[ 'length' ]                       = 55;
		
		/* @var $crop_type string */
		$defaults[ 'crop_type' ]                    = 'words';
		
		/* @var $respect_words bool */
		$defaults[ 'respect_words' ]                = true;
		
		
		/* @var $before string */
		$defaults[ 'before' ]                       = '';
		
		/* @var $after string */
		$defaults[ 'after' ]                        = '';
		
		
		/* @var $more string */
		$defaults[ 'more' ]                         = esc_html__( '[...]', 'digiboost' );
		
		/* @var $more_only_if_cropped bool */
		$defaults[ 'more_only_if_cropped' ]         = true;
		
		/* @var $more_before string */
		$defaults[ 'more_before' ]                  = '';
		
		/* @var $more_after string */
		$defaults[ 'more_after' ]                   = '';
		
		/* @var $use_link bool */
		$defaults[ 'use_link' ]                     = false;
		
		/* @var $link_class string */
		$defaults[ 'link_class' ]                   = '';
		
		/* @var $link_attributes string */
		$defaults[ 'link_attributes' ]              = '';
		
		/* @var $link_before string */
		$defaults[ 'link_before' ]                  = '';
		
		/* @var $link_after string */
		$defaults[ 'link_after' ]                   = '';
		
		// end of ARGUMENTS LIST
		
		
		// Replace defaults globally
		$defaults = array_merge( $defaults, apply_filters( 'digiboost_get_the_excerpt_defaults', array() ) );
		
		// Replace defaults locally and init variables
		foreach ( $defaults as $key => $value ) { ${$key} = array_key_exists( $key, $args ) ? $args[ $key ] : $value; }
		
		// print switcher for output function(s)
		if ( array_key_exists( 'is_output', $args ) ) {
			if ( $args[ 'is_output' ] ) {
				if ( ! $print ) { return ''; }
			}
		}
		
		$out = '';
		
		// get excerpt
		$post = get_post( $post_id );
		if ( ! empty( $post ) ) {
			
			if ( post_password_required( $post ) ) {
				
				// if password protected
				$out = esc_html__( 'There is no excerpt because this is a protected post.', 'digiboost' );
			} else {
				
				// use summary
				if ( $use_summary ) {
					
					// raw data
					$out = $post->post_excerpt;
					
					// shortcodes
					if ( $strip_shortcodes ) {
						$out = strip_shortcodes( $out );
					}
				}
				
				// use content  ( also if summary is empty )
				if ( '' == $out && $use_content ) {
					
					// raw data
					$out = get_extended( $post->post_content );
					
					// pages   ( all / first / current )
					if ( 'before-more' != $content_part ) {
						
						// raw data
						global $pages;
						
						switch ( $respect_pages ) {
							
							case 'first-page':
								$out['extended'] = $pages[0];
								break;
							
							case 'current-page':
								global $page;
								$out['extended'] = $pages[ $page - 1 ];
								break;
							
							case 'all-pages':
							default:
								$out['extended'] = implode( ' ', $pages );
								break;
						}
					}
					
					// content part   ( before "more break" / before "after break" / whole post content )
					switch ( $content_part ) {
						
						case 'before-more':
							$out = $out['main'];
							break;
						
						case 'after-more':
							$out = $out['extended'];
							break;
						
						case 'whole-post':
						default:
							$out = implode( ' ', $out );
							break;
					}
					
					// shortcodes
					if ( $strip_shortcodes ) {
						$out = strip_shortcodes( $out );
					}
					
					// the_content filters
					if ( $use_the_content_filters ) {
						$out = apply_filters( 'the_content', $out );
					}
					
					// escape CDATA closing tag
					if ( $escape_cdata_closing ) {
						$out = str_replace( ']]>', ']]&gt;', $out );
					}
				}
				
			}
			
		}
		
		if ( '' != $out ) {
			//removing from excerpt invisible heading for section if page builder is used for post
			$out = preg_replace( '+<h6 class=\"d-none\">.*</h6>+', '', $out );
			
			// strip all tags
			if ( $strip_tags ) {
				$out = strip_tags( $out );
			}
			
			// merge spaces
			if ( $merge_spaces ) {
				$out = trim( preg_replace( '/\s+/', ' ', $out ) );
			}
			
			// crop
			$cropped = false;
			if ( $length > - 1 ) {
				
				// cropping needs strip tags
				if ( ! $strip_tags ) {
					$out = strip_tags( $out );
				}
				
				$words_array = array();
				if ( 'words' == $crop_type || $respect_words ) {
					$words_array = preg_split( "/[\n\r\t ]+/", $out, - 1, PREG_SPLIT_NO_EMPTY );
				}
				
				// words or symbols
				switch ( $crop_type ) {
					
					case 'symbols':
						
						if ( $length < strlen( $out ) ) {
							
							if ( $respect_words ) {
								$counter = 0;
								$sum     = 0;
								$lengths = array_map( 'strlen', $words_array );
								for ( $i = 1; $i < count( $lengths ) - 1; $i ++ ) {
									$lengths[ $i ] ++;
								}
								foreach ( $lengths as $cur ) {
									$sum += $cur;
									if ( $sum > $length ) {
										break;
									}
									$counter ++;
								}
								
								$out = implode( ' ', array_slice( $words_array, 0, $counter ) );
								
							} else {
								$out = substr( $out, 0, $length );
							}
							$cropped = true;
						}
						
						break;
					
					case 'words':
					default:
						if ( $length < count( $words_array ) ) {
							$out     = implode( ' ', array_slice( $words_array, 0, $length ) );
							$cropped = true;
						}
						break;
				}
				
				if ( $cropped && ( 'words' == $crop_type || $respect_words ) ) {
					$more = ' ' . $more;
				}
			}
			
			// output
			$out = $before . $out;
			
			if ( '' != $more && ! ( $more_only_if_cropped && ! $cropped ) ) {
				
				$out .= $more_before;
				
				if ( $use_link ) {
					
					$out .= sprintf( '<a%s%s%s>%s%s%s</a>',
						'' != $link_class ? ' ' . 'class="' . $link_class . '"' : '',
						' ' . 'href="' . get_permalink( $post_id ) . '"',
						'' != $link_attributes ? ' ' . $link_attributes : '',
						$link_before,
						$more,
						$link_after
					);
					
				} else {
					$out .= $more;
				}
				
				$out .= $more_after;
			}
			
			$out .= $after;
		}
		
		return apply_filters( 'digiboost_get_the_excerpt', $out );
	}
endif;

if ( !function_exists( 'digiboost_shortcode_options' ) ) :
	/**
	 * Get options for unyson shortcode if shortcode exists
	 * @param string $shortcode_name
	 * @return array
	 */
	function digiboost_shortcode_options( $shortcode_name, $excluded_keys = array() ) {
		$options = array();
		
		if ( defined( 'FW' ) && '' != $shortcode_name ) {
			
			$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
			if ( !empty( $shortcodes_extension ) ) {
				
				$shortcode = $shortcodes_extension->get_shortcode( $shortcode_name );
				if ( !empty( $shortcode ) ) {
					$options = $shortcode->get_options();
				}
			}
		}
		if ( $excluded_keys ) {
			foreach ( $excluded_keys as $key ) {
				unset( $options[ $key ] );
			}
		}
		return $options;
	}
endif;

if ( !function_exists( 'digiboost_post_thumbnail' ) ) :
	function digiboost_post_thumbnail ( $small_image = false, $cover_image = '', $date_in_corner = false ) {
		$pID = get_the_ID();
		
		//detecting featured video
		$embed_url = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $pID, 'post-featured-video', '' ) : '';
		$iframe = '';
		if ( $embed_url ) {
			global $wp_embed;
			
			$width = '800';
			$height = '400
			';
			$iframe = $wp_embed->run_shortcode( '[embed  width="' . $width . '" height="' . $height . '"]' . trim( $embed_url ) . '[/embed]' );
			
		}// embed_url
		
		//detecting gallery
		$is_gallery = false;
		$gallery_css_class = '';
		if ( get_post_format( $pID ) == 'gallery' ) {
			
			digiboost_shortcode_atts_gallery_trigger();
			$galleries_images = get_post_galleries_images( $pID );
			digiboost_shortcode_atts_gallery_trigger( false );
			$galleries_images_count = count( $galleries_images );
			
			if ( $galleries_images_count ) {
				$is_gallery = true;
				$gallery_css_class = 'item-media-gallery';
			}
		} //gallery post format
		
		if ( post_password_required() || is_attachment() || ( !has_post_thumbnail() && !$is_gallery && !$iframe ) ) {
			return false;
		}
		
		//adding additional wrap for small image layout feed
		if ( !is_single() && $small_image ) :
			?>
			<div class="<?php echo esc_attr( $small_image ); ?>">
		<?php
		endif; //!is_single and small image
		
		if ( !$iframe ) :
			?>
		
		<?php endif; //iframe ?>
		<div class="item-media entry-thumbnail post-thumbnail <?php echo esc_attr( $gallery_css_class . ' ' . $cover_image ); ?>">
			<?php
			// info in corner only for feed view and only for posts
			if ( $date_in_corner && ( !is_single() ) && ( 'post' === get_post_type() ) ) : ?>
				<div class="entry-meta-corner">
					<?php
					// Set up and print post meta information.
					printf( '<span class="date">
									<time class="entry-date" datetime="%1$s">
										<span class="day">%2$s</span><span class="month">%3$s</span>
									</time>
								</span>',
						
						esc_attr( get_the_date( 'c' ) ),
						esc_html( get_the_date( 'j' ) ),
						esc_html( get_the_date( 'M' ) )
					);
					
					// Set up and print post meta information.
					if ( !post_password_required() && ( comments_open() || get_comments_number() ) ) :
						?>
						<span class="comments-link">
								<i class="fa fa-comment color-main"></i>
								<?php comments_popup_link( esc_html__( '0', 'digiboost' ), esc_html__( '1', 'digiboost' ), esc_html__( '%', 'digiboost' ) ); ?>
						</span>
					<?php
					endif; //post_password_required
					?>
				</div><!-- .entry-meta-corner -->
			<?php endif; //!is_single && 'post'
			if ( !is_single() && !$iframe && !( 'fw-portfolio' === get_post_type() ) ) : ?>
				<div class="media-links">
					<a class="abs-link" href="<?php the_permalink(); ?>"></a>
				</div>
			<?php endif; //!is_single check
			//featured image only for post
			if ( !$is_gallery ) :
				if ( $iframe ) : ?>
					<div class="embed-responsive embed-responsive-21by9">
					<?php if ( has_post_thumbnail() ): ?>
						<a href="" data-iframe="<?php echo esc_attr( $iframe ) ?>" class="embed-placeholder">
					<?php
					else:
						echo wp_kses( $iframe, array( 'iframe' => array(
							'width' => true,
							'height' => true,
							'src' => true,
							'frameborder' => true,
							'allowfullscreen' => true,
						), ) );
					endif; //has_post_thumbnail inside iframe check
				endif; // iframe check
				
				if (
					!( is_single() && !$small_image )
					|| ( 'fw-event' === get_post_type() )
					|| ( is_single() && $iframe )
				) {
					$atts = array();
					if ( $iframe ) {
						$atts['class'] = 'embed-responsive-item';
					}
					the_post_thumbnail( 'digiboost-full-width', $atts );
				} elseif ( !is_single() && $small_image ) {
					the_post_thumbnail( 'digiboost-small-width' );
				} else {
					
					the_post_thumbnail();
				} //$current_position
				
				// creating post link for whole featured image
				
				if ( $iframe ):
					if ( has_post_thumbnail() ) :
						?>
						</a><!-- eof image link -->
					<?php endif; //post thumbnail check for closing A tag
					?>
					</div>
				<?php endif; //iframe check
			
			// gallery
			else :
				//featured image url
				$post_featured_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $pID ), 'post-thumbnail' );
				?>
				<div id="owl-carousel-<?php echo esc_attr( $pID ); ?>" class="owl-carousel"
					 data-margin="0"
					 data-nav="true"
					 data-dots="false"
					 data-themeclass="owl-theme entry-thumbnail-carousel"
					 data-center="false"
					 data-items="1"
					 data-loop="true"
					 data-autoplay="true"
					 data-speed="<?php digiboost_slide_speed(); ?>"
					 data-responsive-xs="1"
					 data-responsive-sm="1"
					 data-responsive-md="1"
					 data-responsive-lg="1"
					 data-responsive-xl="1"
				>
					<?php
					//adding featured image as a first element in carousel
					if ( $post_featured_image_src ) : ?>
						<div class="item">
							<img src="<?php echo esc_attr( $post_featured_image_src[0] ); ?>"
								 alt="<?php echo esc_attr( get_the_title( $pID ) ); ?>">
						</div>
					<?php endif;
					$count = 1;
					foreach ( $galleries_images as $gallerie ) :
						foreach ( $gallerie as $src ) :
							//showing only 3 images from gallery
							if ( $count > 3 ) {
								break 2;
							}
							?>
							<div class="item">
								<img src="<?php echo esc_attr( $src ); ?>"
									 alt="<?php echo esc_attr( get_the_title( $pID ) ); ?>">
							</div>
							<?php
							$count++;
						endforeach;
					endforeach; ?>
				</div>
			<?php
			endif; // $is_gallery
			?>
		</div> <!-- .item-media -->
		<?php if ( !$iframe ) : ?>
		
		<?php
		endif; //iframe
		//closing additional wrap for small image layout feed
		if ( !is_single() && $small_image ) : ?>
			</div> <!-- eof .col-md-6 -->
		<?php endif;
	}
endif;//digiboost_post_thumbnail()

if ( !function_exists( 'digiboost_shortcode_atts_gallery_trigger' ) ) :
	function digiboost_shortcode_atts_gallery_trigger ( $add_filter = true ) {
	
		return false;
		
	} //digiboost_shortcode_atts_gallery_trigger()
endif;