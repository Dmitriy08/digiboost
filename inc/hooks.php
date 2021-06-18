<?php if ( !defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Filters and Actions
 */


if ( !function_exists( 'digiboost_action_setup' ) ) :
	/**
	 * Theme setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 * @internal
	 */
	function digiboost_action_setup () {
		
		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'digiboost', DIGIBOOST_THEME_PATH . '/languages' );
		
		add_editor_style( array( 'css/main.css' ) );
		
		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );
		
		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		
		//Let WordPress manage the document title.
		add_theme_support( 'title-tag' );
		
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		
		set_post_thumbnail_size( 1660, 800, true );
		add_image_size( 'digiboost-full-width', 1660, 800, true );
		add_image_size( 'digiboost-rectangle', 1050, 1500, true );//team
		add_image_size( 'digiboost-small-width', 1000, 1000, true );

		//content width
		$GLOBALS['content_width'] = apply_filters( 'digiboost_filter_content_width', 891 );
		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );
		
		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'standard',
			'aside',
			'chat',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
		) );
		
		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
	} //digiboost_action_setup()

endif;
add_action( 'after_setup_theme', 'digiboost_action_setup' );

add_filter( 'excerpt_length', function () {
	return 18;
} );
add_filter( 'excerpt_more', function ( $more ) {
	return '';
} );
/**
 * Register widget areas.
 * @internal
 */

if ( !function_exists( 'digiboost_action_widgets_init' ) ) :
	function digiboost_action_widgets_init () {
		register_sidebar( array(
			'name' => esc_html__( 'Main Widget Area', 'digiboost' ),
			'id' => 'sidebar-main',
			'description' => esc_html__( 'Appears in the content section of the site.', 'digiboost' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		//footer widget areas
		register_sidebar( array(
			'name' => esc_html__( 'Footer Widget Area #1', 'digiboost' ),
			'id' => 'sidebar-footer-1',
			'description' => esc_html__( 'Appears in the footer section of the site.', 'digiboost' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' => esc_html__( 'Footer Widget Area #2', 'digiboost' ),
			'id' => 'sidebar-footer-2',
			'description' => esc_html__( 'Appears in the footer section of the site.', 'digiboost' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' => esc_html__( 'Footer Widget Area #3', 'digiboost' ),
			'id' => 'sidebar-footer-3',
			'description' => esc_html__( 'Appears in the footer section of the site.', 'digiboost' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' => esc_html__( 'Footer Widget Area #4', 'digiboost' ),
			'id' => 'sidebar-footer-4',
			'description' => esc_html__( 'Appears in the footer section of the site.', 'digiboost' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		$blog_posts_widget_option = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'blog_posts_widget_switch' ) : '';
		if ( $blog_posts_widget_option ) {
			register_sidebar( array(
				'name' => esc_html__( 'Before Posts Widget Area', 'digiboost' ),
				'id' => 'sidebar-before-posts',
				'description' => esc_html__( 'Appears before blog feed on blog page', 'digiboost' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			) );
		}
		
	} //digiboost_action_widgets_init()
endif;
add_action( 'widgets_init', 'digiboost_action_widgets_init' );


/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
if ( !function_exists( 'digiboost_filter_body_classes' ) ) :
	function digiboost_filter_body_classes ( $classes ) {
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		
		if ( get_header_image() ) {
			$classes[] = 'header-image';
		} else {
			$classes[] = 'masthead-fixed';
		}
		
		if ( is_archive() || is_search() || is_home() ) {
			$classes[] = 'archive-list-view';
		}
		
		if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {
			$current_position = fw_ext_sidebars_get_current_position();
			if ( in_array( $current_position, array( 'full', 'left' ) )
				|| empty( $current_position )
				|| is_page_template( 'page-templates/full-width.php' )
				|| is_attachment()
			) {
				$classes[] = 'full-width';
			}
		} else {
			$classes[] = 'full-width';
		}
		
		if ( is_active_sidebar( 'sidebar-footer' ) ) {
			$classes[] = 'footer-widgets';
		}
		
		if ( is_singular() && !is_front_page() ) {
			$classes[] = 'singular';
		}
		
		if ( is_front_page()
			&& 'slider' == get_theme_mod( 'featured_content_layout' )
		) {
			$classes[] = 'slider';
		} elseif ( is_front_page() ) {
			$classes[] = 'grid';
		}
		
		//not hardcoding body_class in header
		$options = digiboost_get_options();
		
		//options for disabled sticky affixed header and disabled hiding extra menu items
		if ( !empty( $options['header_show_all_menu_items'] ) ) {
			$classes[] = 'header_show_all_menu_items';
		}
		
		if ( !empty( $options['header_disable_affix_xl'] ) ) {
			$classes[] = 'header_disable_affix_xl';
		}
		
		if ( !empty( $options['header_disable_affix_xs'] ) ) {
			$classes[] = 'header_disable_affix_xs';
		};
		
		return $classes;
	} //digiboost_filter_body_classes()
endif;
add_filter( 'body_class', 'digiboost_filter_body_classes' );

if ( !function_exists( 'digiboost_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	function digiboost_pingback_header () {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
endif;
add_action( 'wp_head', 'digiboost_pingback_header' );

//changing default comment form
if ( !function_exists( 'digiboost_filter_digiboost_contact_form_fields' ) ) :
	function digiboost_filter_digiboost_contact_form_fields ( $fields ) {
		$commenter = wp_get_current_commenter();
		$user = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$html_req = ( $req ? " required='required'" : '' );
		$html5 = 'html5';
		$fields = array(
			'author' => '<div class="col-sm-6"><p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'digiboost' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
				'<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' placeholder="' . esc_attr__( 'Full Name', 'digiboost' ) . '"></p></div>',
			'email' => '<div class="col-sm-6"><p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'digiboost' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
				'<input id="email" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" ' . $aria_req . $html_req . ' placeholder="' . esc_attr__( 'Email Address', 'digiboost' ) . '"/></p></div>',
			'comment_field' => '<div class="col-12 col-sm-12"><p class="comment-form-comment"><label for="comment">' . esc_html_x( 'Comment', 'noun', 'digiboost' ) . '</label> <textarea id="comment"  class="form-control" name="comment" cols="45" rows="8"  aria-required="true" required="required"  placeholder="' . esc_attr__( 'Comment', 'digiboost' ) . '"></textarea></p></div>',
		);
		
		return $fields;
	}

endif; // comment_form_default_fields filter

//changing gallery thumbnail size for entry-thumbnail display
if ( !function_exists( 'digiboost_filter_fw_shortcode_atts_gallery' ) ) :
	function digiboost_filter_fw_shortcode_atts_gallery ( $out, $pairs, $atts ) {
		$out['size'] = 'post-thumbnail';
		return $out;
	} //digiboost_filter_fw_shortcode_atts_gallery()
endif;

if ( !function_exists( 'digiboost_shortcode_atts_gallery_trigger' ) ) :
	function digiboost_shortcode_atts_gallery_trigger ( $add_filter = true ) {
		if ( $add_filter ) {
			add_filter( 'shortcode_atts_gallery', 'digiboost_filter_fw_shortcode_atts_gallery', 10, 3 );
		} else {
			false;
		}
	} //digiboost_shortcode_atts_gallery_trigger()
endif;

//custom posts per page count for portfolio category
if ( !function_exists( 'digiboost_filter_change_posts_per_page' ) ) :
	function digiboost_filter_change_posts_per_page ( $query ) {
		if ( !function_exists( 'fw_get_db_term_option' ) ) {
			return;
		}
		if ( !is_admin() && $query->is_main_query() ) {
			if ( $query->is_tax( 'fw-portfolio-category' ) ) {
				$atts = fw_get_db_term_option( $query->queried_object->term_taxonomy_id, $query->queried_object->taxonomy );
				if ( !empty( $atts['items_per_page'] ) ) {
					$query->set( 'posts_per_page', $atts['items_per_page'] );
				}
			}
		}
	}
endif; //digiboost_filter_change_posts_per_page
add_action( 'pre_get_posts', 'digiboost_filter_change_posts_per_page' );

//changing events slug
if ( !function_exists( 'digiboost_filter_fw_ext_events_post_slug' ) ) :
	function digiboost_filter_fw_ext_events_post_slug ( $slug ) {
		
		return 'events';
	}
endif;
add_filter( 'fw_ext_events_post_slug', 'digiboost_filter_fw_ext_events_post_slug' );

if ( !function_exists( 'digiboost_filter_fw_ext_events_taxonomy_slug' ) ) :
	function digiboost_filter_fw_ext_events_taxonomy_slug ( $slug ) {
		// 'fw-event-taxonomy-slug' change to 'event-category'
		return 'event-category';
	} //digiboost_filter_fw_ext_events_taxonomy_slug()
endif;
add_filter( 'fw_ext_events_taxonomy_slug', 'digiboost_filter_fw_ext_events_taxonomy_slug' );

//wrapping in a span categories and archives items count
if ( !function_exists( 'digiboost_filter_add_span_to_arhcive_widget_count' ) ) :
	function digiboost_filter_add_span_to_arhcive_widget_count ( $links ) {
		//for categories widget
		$links = str_replace( '</a> (', '</a> <span class="color-main">(', $links );
		//for archive widget
		$links = str_replace( '&nbsp;(', ' <span class="color-main">(', $links );
		$links = preg_replace( '/([0-9]+)\)/', '$1)</span>', $links );
		
		return $links;
	}
endif;

//categories
add_filter( 'wp_list_categories', 'digiboost_filter_add_span_to_arhcive_widget_count' );
//arhcive
add_filter( 'get_archives_link', 'digiboost_filter_add_span_to_arhcive_widget_count' );

//filter calendar widget to fix validation errors
if ( !function_exists( 'digiboost_filter_widget_calendar_html' ) ) :
	function digiboost_filter_widget_calendar_html ( $html ) {
		//get tfoot
		$tfoot = preg_match( '/<tfoot>(.|\n)*<\/tfoot>/', $html, $match );
		//remove tfoot from table
		$html = preg_replace( '/<tfoot>(.|\n)*<\/tfoot>/', '', $html );
		//attach tfoot after tbody
		if ( !empty( $match[0] ) ) {
			$html = str_replace( '</tbody>', "</tbody>\n\t" . $match[0], $html );
		}
		
		return $html;
	}
endif;
add_filter( 'get_calendar', 'digiboost_filter_widget_calendar_html' );


if ( !function_exists( 'digiboost_filter_monster_widget_text' ) ) :
	function digiboost_filter_monster_widget_text ( $text ) {
		$text = str_replace( 'name="monster-widget-just-testing"', 'name="monster-widget-just-testing" class="form-control"', $text );
		
		return $text;
	}
endif;
add_filter( 'monster-widget-get-text', 'digiboost_filter_monster_widget_text' );


/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
if ( !function_exists( 'digiboost_filter_post_classes' ) ) :
	function digiboost_filter_post_classes ( $classes ) {
		if ( !post_password_required() && !is_attachment() && has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		}
		return $classes;
	} //digiboost_filter_post_classes()
endif;
add_filter( 'post_class', 'digiboost_filter_post_classes' );


/**
 * Wrap first word followed by colon with span.
 *
 *
 * @param string $string content
 *
 * @return string new content.
 * @internal
 */
if ( !function_exists( 'digiboost_filter_the_content_chat_first_word' ) ) :
	function digiboost_filter_the_content_chat_first_word ( $content ) {
		if ( 'chat' === get_post_format() ) :
			$content = preg_replace( '/(<p>.*:)/', '<p><strong>$1</strong>', $content );
			$content = str_replace( '<p><strong><p>', '<p><strong>', $content );
		endif;
		return $content;
	} //digiboost_filter_the_content_chat_first_word()
endif;
add_filter( 'the_content', 'digiboost_filter_the_content_chat_first_word' );


/**
 * Add bootstrap CSS classes to default password protected form.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'digiboost_filter_password_form' ) ) :
	function digiboost_filter_password_form ( $html ) {
		$label = esc_html__( 'Password', 'digiboost' );
		$html = str_replace( 'input name="post_password"', 'input class="form-control" name="post_password" placeholder="' . esc_attr( $label ) . '"', $html );
		$html = str_replace( 'input type="submit"', 'input class="btn btn-darkgrey" type="submit"', $html );
		
		return $html;
	} //digiboost_filter_password_form()
endif;
add_filter( 'the_password_form', 'digiboost_filter_password_form' );


/**
 * Add bootstrap CSS class to readmore blog feed anchor.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'digiboost_filter_gallery_post_style_owl' ) ) :
	function digiboost_filter_gallery_post_style_owl ( $gallery_html ) {
		if ( $gallery_html && !is_admin() ) {
			//you can use 'isotope-wrapper' CSS class here
			$gallery_html = str_replace( 'gallery ', 'gallery ', $gallery_html );
			//if page is current
		}
		
		return $gallery_html;
	} //digiboost_filter_gallery_post_style_owl()
endif;
add_filter( 'gallery_style', 'digiboost_filter_gallery_post_style_owl' );

/**
 * Flush out the transients used in digiboost_categorized_blog.
 * @internal
 */
if ( !function_exists( 'digiboost_action_category_transient_flusher' ) ) :
	function digiboost_action_category_transient_flusher () {
		delete_transient( 'digiboost_category_count' );
	} //digiboost_action_category_transient_flusher()
endif;
add_action( 'edit_category', 'digiboost_action_category_transient_flusher' );
add_action( 'save_post', 'digiboost_action_category_transient_flusher' );


/**
 * Processing google fonts customizer options
 */

if ( !function_exists( 'digiboost_action_process_google_fonts' ) ) :
	function digiboost_action_process_google_fonts () {
		$google_fonts = fw_get_google_fonts();
		$include_from_google = array();
		
		$font_body = fw_get_db_customizer_option( 'main_font' );
		$font_headings = fw_get_db_customizer_option( 'h_font' );
		
		// if is google font
		if ( isset( $google_fonts[ $font_body['family'] ] ) ) {
			$include_from_google[ $font_body['family'] ] = $google_fonts[ $font_body['family'] ];
		}
		
		if ( isset( $google_fonts[ $font_headings['family'] ] ) ) {
			$include_from_google[ $font_headings['family'] ] = $google_fonts[ $font_headings['family'] ];
		}
		
		$google_fonts_links = digiboost_get_remote_fonts( $include_from_google );
		// set a option in db for save google fonts link
		update_option( 'digiboost_google_fonts_link', $google_fonts_links );
	} //digiboost_action_process_google_fonts()

endif;
add_action( 'customize_save_after', 'digiboost_action_process_google_fonts', 999, 2 );

if ( !function_exists( 'digiboost_get_remote_fonts' ) ) :
	function digiboost_get_remote_fonts ( $include_from_google ) {
		/**
		 * Get remote fonts
		 *
		 * @param array $include_from_google
		 */
		if ( !sizeof( $include_from_google ) ) {
			return '';
		}
		
		$html = "<link href='//fonts.googleapis.com/css?family=";
		
		foreach ( $include_from_google as $font => $styles ) {
			$html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '|';
		}
		
		$html = substr( $html, 0, -1 );
		$html .= "' rel='stylesheet' type='text/css'>";
		
		return $html;
	} //digiboost_get_remote_fonts()
endif;

if ( !function_exists( 'digiboost_action_add_login_page_script_and_styles' ) ) :
	function digiboost_action_add_login_page_script_and_styles ( $page ) {
		wp_enqueue_style(
			'digiboost-login-page-style',
			DIGIBOOST_THEME_URI . '/css/login-page.css',
			array(),
			DIGIBOOST_THEME_VERSION
		);
		wp_enqueue_script(
			'digiboost-login-page-script',
			DIGIBOOST_THEME_URI . '/js/login-page.js',
			array( 'jquery' ),
			DIGIBOOST_THEME_VERSION,
			false
		);
	}
endif;
add_action( 'login_enqueue_scripts', 'digiboost_action_add_login_page_script_and_styles' );


//admin dashboard styles and scripts
if ( !function_exists( 'digiboost_action_load_custom_wp_admin_style' ) ) :
	function digiboost_action_load_custom_wp_admin_style () {
		wp_register_style( 'digiboost-custom-wp-admin-css', DIGIBOOST_THEME_URI . '/css/admin-style.css', false, DIGIBOOST_THEME_VERSION );
		wp_enqueue_style( 'digiboost-custom-wp-admin-css' );
		
		$screen = get_current_screen();
		
		if ( 'nav-menus' === $screen->base ) {
			wp_register_style( 'digiboost-custom-wp-admin-icon-fonts-for-menu', DIGIBOOST_THEME_URI . '/css/flaticon.css', false, DIGIBOOST_THEME_VERSION );
			wp_enqueue_style( 'digiboost-custom-wp-admin-icon-fonts-for-menu' );
		}
		
	} //digiboost_action_load_custom_wp_admin_style()
endif;
add_action( 'admin_enqueue_scripts', 'digiboost_action_load_custom_wp_admin_style' );


// removing woo styles
// Remove each style one by one
if ( !function_exists( 'digiboost_filter_digiboost_dequeue_styles' ) ) :
	function digiboost_filter_digiboost_dequeue_styles ( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
		unset( $enqueue_styles['woocommerce-layout'] );        // Remove the layout
		unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
		return $enqueue_styles;
	} //digiboost_filter_digiboost_dequeue_styles()
endif;
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//this action defined in functions.php
add_action( 'tgmpa_register', 'digiboost_action_register_required_plugins' );

if ( !function_exists( 'digiboost_filter_wrap_cat_title_before_colon_in_span' ) ) :
	function digiboost_filter_wrap_cat_title_before_colon_in_span ( $title ) {
		return preg_replace( '/^.*: /', '<span class="taxonomy-name-title">${0}</span>', $title );
	}
endif;
add_filter( 'get_the_archive_title', 'digiboost_filter_wrap_cat_title_before_colon_in_span' );


//if Unyson installed - managing main slider and contact form scripts, sidebars, breadcrumbs
if ( defined( 'FW' ) ):
	//display main slider
	if ( !function_exists( 'digiboost_action_slider' ) ):
		
		function digiboost_action_slider () {
			if ( is_search() ) {
				return;
			}
			$slider_id = fw_get_db_post_option( get_the_ID(), 'slider_id', false );
			if ( fw_ext( 'slider' ) ) {
				echo fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
			}
			
		}
		add_action( 'digiboost_slider', 'digiboost_action_slider' );
	endif;
	
	
	//display blog slider
	if ( !function_exists( 'digiboost_action_blog_slider' ) ):
		
		function digiboost_action_blog_slider () {
			
			$blog_slider_options = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'blog_slider_switch' ) : '';
			$blog_slider_enabled = $blog_slider_options['yes'];
			if ( $blog_slider_enabled ) {
				$slider_id = $blog_slider_enabled['slider_id'];
				if ( fw_ext( 'slider' ) ) {
					$slider_html = fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
					if ( !empty( $slider_html ) ) {
						?>
						<div class="blog-slider col-sm-12">
							<?php
							echo wp_kses_post( $slider_html );
							?>
						</div>
						<?php
					}
				}
			}
		}
		
		add_action( 'digiboost_blog_slider', 'digiboost_action_blog_slider' );
	endif;
	
	//display blog posts widget
	if ( !function_exists( 'digiboost_blog_posts_widget' ) ) :
		
		function digiboost_blog_posts_widget () {
			
			$blog_posts_widget_option = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'blog_posts_widget_switch' ) : '';
			if ( $blog_posts_widget_option ) {
				if ( is_active_sidebar( 'sidebar-before-posts' ) ) {
					?>
					<div class="blog-posts-widget col-sm-12">
						<?php dynamic_sidebar( 'sidebar-before-posts' ); ?>
					</div>
					<?php
				}
			}
		}
		
		add_action( 'digiboost_posts_widget', 'digiboost_blog_posts_widget' );
	
	endif;
	
	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( !function_exists( 'digiboost_action_display_form_errors' ) ):
		function digiboost_action_display_form_errors () {
			$form = FW_Form::get_submitted();
			
			if ( !$form || $form->is_valid() ) {
				return;
			}
			
			wp_enqueue_script(
				'digiboost-show-form-errors',
				DIGIBOOST_THEME_URI . '/js/form-errors.js',
				array( 'jquery' ),
				DIGIBOOST_THEME_VERSION,
				true
			);
			
			wp_localize_script( 'digiboost-show-form-errors', '_localized_form_errors', array(
				'errors' => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'digiboost_action_display_form_errors' );
	
	
	//removing standard sliders from Unyson - we use our theme slider
	if ( !function_exists( 'digiboost_filter_disable_sliders' ) ) :
		function digiboost_filter_disable_sliders ( $sliders ) {
			foreach ( array( 'owl-carousel', 'bx-slider', 'nivo-slider' ) as $name ) {
				$key = array_search( $name, $sliders );
				unset( $sliders[ $key ] );
			}
			
			return $sliders;
		}
	endif;
	
	add_filter( 'fw_ext_slider_activated', 'digiboost_filter_disable_sliders' );
	
	//removing standard fields from Unyson slider - we use our own slider fields
	if ( !function_exists( 'digiboost_slider_population_method_custom_options' ) ) :
		function digiboost_slider_population_method_custom_options ( $arr ) {
			/**
			 * Filter for disable standard slider fields for carousel slider
			 *
			 * @param array $arr
			 */
			unset(
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['title'],
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['desc']
			);
			
			return $arr;
		}
	endif;
	add_filter( 'fw_ext_theme_slider_population_method_custom_options', 'digiboost_slider_population_method_custom_options' );

	//adding custom sidebar for shop page if WooCommerce active
	if ( class_exists( 'WooCommerce' ) ) :
		if ( !function_exists( 'digiboost_filter_fw_ext_sidebars_add_conditional_tag' ) ) :
			function digiboost_filter_fw_ext_sidebars_add_conditional_tag ( $conditional_tags ) {
				$conditional_tags['is_archive_page_slug'] = array(
					'order_option' => 2, // (optional: default is 1) position in the 'Others' lists in backend
					'check_priority' => 'last', // (optional: default is last, can be changed to 'first') use it to change priority checking conditional tag
					'name' => esc_html__( 'Products Type - Shop', 'digiboost' ), // conditional tag title
					'conditional_tag' => array(
						'callback' => 'is_shop', // existing callback
						'params' => array( 'products' ) //parameters for callback
					)
				);
				
				return $conditional_tags;
			}
		endif;
		add_filter( 'fw_ext_sidebars_conditional_tags', 'digiboost_filter_fw_ext_sidebars_add_conditional_tag' );
	
	endif; //WooCommerce
	
	
	//theme icon fonts
	if ( !function_exists( 'digiboost_filter_custom_packs_list' ) ) :
		function digiboost_filter_custom_packs_list ( $current_packs ) {
			/**
			 * $current_packs is an array of pack names.
			 * You should return which one you would like to show in the picker.
			 */
			return array( 'digiboost_icons', 'font-awesome', 'digiboost_icons2', 'digiboost_icons3' );
		}
	endif;
	add_filter( 'fw:option_type:icon-v2:filter_packs', 'digiboost_filter_custom_packs_list' );
	
	if ( !function_exists( 'digiboost_filter_add_my_icon_pack' ) ) :
		function digiboost_filter_add_my_icon_pack ( $default_packs ) {
			/**
			 * No fear. Defaults packs will be merged in back. You can't remove them.
			 * Changing some flags for them is allowed.
			 */
			return array(
//				'digiboost_icons' => array(
//					'name' => 'digiboost_icons', // same as key
//					'title' => esc_html__( 'Digiboost Flat Icons', 'digiboost' ),
//					'css_class_prefix' => 'flaticon',
//					'css_file' => DIGIBOOST_THEME_PATH . '/css/flaticon.css',
//					'css_file_uri' => DIGIBOOST_THEME_URI . '/css/flaticon.css',
//				),
			);
		}
	endif;
	add_filter( 'fw:option_type:icon-v2:packs', 'digiboost_filter_add_my_icon_pack' );
	
	if ( !function_exists( 'digiboost_breadcrumbs_blank_search_query_fix' ) ) :
		/**
		 * Breadcrumbs modifications
		 */
		function digiboost_breadcrumbs_blank_search_query_fix ( $items ) {
			
			if ( is_search() ) {
				if ( trim( get_search_query() ) == false ) {
					$items[ sizeof( $items ) - 1 ]['name'] = esc_html__( 'Search', 'digiboost' );
				}
			}
			
			return $items;
		}
	endif;
	
	add_filter( 'fw_ext_breadcrumbs_build', 'digiboost_breadcrumbs_blank_search_query_fix' );
	
	//enable tags for events
	if ( !function_exists( 'digiboost_add_tags_for_events_unyson_extension' ) ) :
		function digiboost_add_tags_for_events_unyson_extension () {
			return true;
		}
	endif;
	
	add_filter( 'fw:ext:events:enable-tags', 'digiboost_add_tags_for_events_unyson_extension' );
	
	//changing event tags name
	if ( !function_exists( 'digiboost_fw_ext_events_tag_name' ) ) :
		function digiboost_fw_ext_events_tag_name ( $array ) {
			return array(
				'singular' => esc_html__( 'Event Tag', 'digiboost' ),
				'plural' => esc_html__( 'Event Tags', 'digiboost' )
			);
			
		}
	endif;
	add_filter( 'fw_ext_events_tag_name', 'digiboost_fw_ext_events_tag_name' );

endif; //defined('FW')

//adding custom styles to TinyMCE
// Callback function to insert 'styleselect' into the $buttons array
if ( !function_exists( 'digiboost_filter_mce_theme_format_insert_button' ) ) :
	function digiboost_filter_mce_theme_format_insert_button ( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		
		return $buttons;
	} //digiboost_filter_mce_theme_format_insert_button()
endif;
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'digiboost_filter_mce_theme_format_insert_button' );
// Callback function to filter the MCE settings
if ( !function_exists( 'digiboost_filter_mce_theme_format_add_styles' ) ) :
	function digiboost_filter_mce_theme_format_add_styles ( $init_array ) {
		// Define the style_formats array
		$style_formats = array(
			// Each array child is a format with it's own settings
			array(
				'title' => esc_html__( 'Excerpt', 'digiboost' ),
				'block' => 'p',
				'classes' => 'excerpt',
				'wrapper' => false,
			),
			array(
				'title' => esc_html__( 'Paragraph with dropcap', 'digiboost' ),
				'block' => 'p',
				'classes' => 'big-first-letter',
				'wrapper' => false,
			),
			array(
				'title' => esc_html__( 'Main theme color', 'digiboost' ),
				'inline' => 'span',
				'classes' => 'color-main',
				'wrapper' => false,
			),
			array(
				'title' => esc_html__( 'List styled unordered', 'digiboost' ),
				'block' => 'ul',
				'classes' => 'list-styled',
				'wrapper' => false,
			),
			
			array(
				'title' => esc_html__( 'List styled ordered', 'digiboost' ),
				'block' => 'ol',
				'classes' => 'list-styled',
				'wrapper' => false,
			),
		
		);
		// Insert the array, JSON ENCODED, into 'style_formats'
		$init_array['style_formats'] = json_encode( $style_formats );
		
		return $init_array;
		
	} //digiboost_filter_mce_theme_format_add_styles()
endif;
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'digiboost_filter_mce_theme_format_add_styles', 1 );


//demo content on remote hosting
/**
 * @param FW_Ext_Backups_Demo[] $demos
 *
 * @return FW_Ext_Backups_Demo[]
 */
if ( !function_exists( 'digiboost_filter_theme_fw_ext_backups_demos' ) ) :
	
	function digiboost_filter_theme_fw_ext_backups_demos ( $demos ) {
		
		if ( class_exists( 'FW_Ext_Backups_Demo' ) ) :
			
			// ids
			$demo_version_suffix = '-v' . DIGIBOOST_REMOTE_DEMO_VERSION; // '-v1.2.0'
			// You may request this demo id from this theme author to get a colorized demo content. See the author contacts information.
			$secret_demo_id = DIGIBOOST_REMOTE_DEMO_ID; // as example: '12345678'
			
			// Demo ( Blurred )
			$demo_id = 'digiboost-demo' . $demo_version_suffix;
			$demos_array = array(
				$demo_id => array(
					'title' => esc_html__( 'Digiboost Demo', 'digiboost' ),
					'screenshot' => esc_url( 'http://webdesign-finder.com/digiboost/demo/screenshot.png' ),
					'preview_link' => esc_url( 'http://webdesign-finder.com/digiboost/' ),
				),
			);
			
			// Demo ( Colorized )
			$demo_colorized_id = 'digiboost-demo-colorized-' . $secret_demo_id . $demo_version_suffix;
			if ( $secret_demo_id ) {
				$demos_array[ $demo_colorized_id ] = array(
					'title' => esc_html__( 'Digiboost Demo (Colorized)', 'digiboost' ),
					'screenshot' => esc_url( 'http://webdesign-finder.com/digiboost/demo/screenshot.png' ),
					'preview_link' => esc_url( 'http://webdesign-finder.com/digiboost/' ),
				);
			}
			
			// Demo Variants
			foreach ( array() as $demo_variant ) {
				
				// Demo Variants ( Blurred )
				$demo_id = 'digiboost-' . $demo_variant . '-demo' . $demo_version_suffix;
				$demos_array[ $demo_id ] = array(
					'title' => ucwords( $demo_variant, " \t\r\n\f\v-" ) . esc_html__( ' Demo', 'digiboost' ),
					'screenshot' => esc_url( 'http://webdesign-finder.com/digiboost/demo/screenshot-' . $demo_variant . '.png' ),
					'preview_link' => esc_url( 'http://webdesign-finder.com/digiboost-' . $demo_variant ),
				);
				
				// Demo Variants ( Colorized )
				if ( $secret_demo_id ) {
					$demo_colorized_id = 'digiboost-' . $demo_variant . '-demo-colorized-' . $secret_demo_id . $demo_version_suffix;
					$demos_array[ $demo_colorized_id ] = array(
						'title' => ucwords( $demo_variant, " \t\r\n\f\v-" ) . esc_html__( ' Demo (Colorized)', 'digiboost' ),
						'screenshot' => esc_url( 'http://webdesign-finder.com/digiboost/demo/screenshot-' . $demo_variant . '.png' ),
						'preview_link' => esc_url( 'http://webdesign-finder.com/digiboost-' . $demo_variant ),
					);
				}
			}
			
			// remote demo URL
			$download_url = esc_url( 'http://webdesign-finder.com/digiboost/demo/' );
			
			// demo array
			foreach ( $demos_array as $id => $data ) {
				$demo = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
					'url' => $download_url,
					'file_id' => $id,
				) );
				$demo->set_title( $data['title'] );
				$demo->set_screenshot( $data['screenshot'] );
				$demo->set_preview_link( $data['preview_link'] );
				
				$demos[ $demo->get_id() ] = $demo;
				
				unset( $demo );
			}
			
			return $demos;
		
		endif; //class_exists
	} //digiboost_filter_theme_fw_ext_backups_demos()
endif;
add_filter( 'fw:ext:backups-demo:demos', 'digiboost_filter_theme_fw_ext_backups_demos' );


// phone protocols
add_filter( 'kses_allowed_protocols', function ( $protocols ) {
	$protocols[] = 'skype';
	$protocols[] = 'callto';
	$protocols[] = 'tell';
	return $protocols;
} );
