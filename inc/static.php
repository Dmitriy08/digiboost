<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

//removing default font awesome css style - we using our "font-awesome.css" file which contain font awesome
wp_deregister_style( 'fw-font-awesome' );
wp_deregister_style( 'font-awesome' );

//Add Theme Fonts
wp_enqueue_style(
	'font-awesome',
	DIGIBOOST_THEME_URI . '/css/font-awesome.css',
	array(),
	DIGIBOOST_THEME_VERSION
);


if ( is_admin_bar_showing() ) {
	//Add Frontend admin styles
	wp_register_style(
		'digiboost-admin_bar',
		DIGIBOOST_THEME_URI . '/css/admin-frontend.css',
		array(),
		DIGIBOOST_THEME_VERSION
	);
	wp_enqueue_style( 'digiboost-admin_bar' );
}

//styles and scripts below only for frontend: if in dashboard - exit
if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */
// Add theme google font, used in the main stylesheet.
wp_enqueue_style(
	'digiboost-google-font',
	digiboost_google_font_url(),
	array(),
	DIGIBOOST_THEME_VERSION
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script(
		'digiboost-keyboard-image-navigation',
		DIGIBOOST_THEME_URI . '/js/keyboard-image-navigation.js',
		array( 'jquery' ),
		DIGIBOOST_THEME_VERSION
	);
}

//plugins theme script
wp_enqueue_script(
	'digiboost-modernizr',
	DIGIBOOST_THEME_URI . '/js/vendor/modernizr-custom.js',
	false,
	'3.6.0',
	false
);

//plugins theme script

wp_enqueue_script( 'bootstrap-bundle', DIGIBOOST_THEME_URI . '/js/vendor/bootstrap.bundle.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'affix', DIGIBOOST_THEME_URI . '/js/vendor/affix.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'appear', DIGIBOOST_THEME_URI . '/js/vendor/jquery.appear.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'cookie', DIGIBOOST_THEME_URI . '/js/vendor/jquery.cookie.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'easing', DIGIBOOST_THEME_URI . '/js/vendor/jquery.easing.1.3.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'hoverIntent', DIGIBOOST_THEME_URI . '/js/vendor/jquery.hoverIntent.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'superfish', DIGIBOOST_THEME_URI . '/js/vendor/superfish.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'progressbar', DIGIBOOST_THEME_URI . '/js/vendor/bootstrap-progressbar.min.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'countdown', DIGIBOOST_THEME_URI . '/js/vendor/jquery.countdown.min.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'countTo', DIGIBOOST_THEME_URI . '/js/vendor/jquery.countTo.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'easypiechart', DIGIBOOST_THEME_URI . '/js/vendor/jquery.easypiechart.min.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'scrollbar', DIGIBOOST_THEME_URI . '/js/vendor/jquery.scrollbar.min.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'localScroll', DIGIBOOST_THEME_URI . '/js/vendor/jquery.localScroll.min.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'scrollTo', DIGIBOOST_THEME_URI . '/js/vendor/jquery.scrollTo.min.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'totop', DIGIBOOST_THEME_URI . '/js/vendor/jquery.ui.totop.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'parallax', DIGIBOOST_THEME_URI . '/js/vendor/jquery.parallax-1.1.3.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'isotope', DIGIBOOST_THEME_URI . '/js/vendor/isotope.pkgd.min.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'flexslider', DIGIBOOST_THEME_URI . '/js/vendor/jquery.flexslider-min.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'owlcarousel', DIGIBOOST_THEME_URI . '/js/vendor/owl.carousel.min.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'photoswipe', DIGIBOOST_THEME_URI . '/js/vendor/photoswipe.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );
wp_enqueue_script( 'photoswipe-default', DIGIBOOST_THEME_URI . '/js/vendor/photoswipe-ui-default.min.js', array('jquery'), DIGIBOOST_THEME_VERSION, true );

//main theme script
wp_enqueue_script(
	'digiboost-main',
	DIGIBOOST_THEME_URI . '/js/main.js',
	array( 'jquery' ),
	DIGIBOOST_THEME_VERSION,
	true
);

// Add Bootstrap Style
wp_enqueue_style(
	'bootstrap',
	DIGIBOOST_THEME_URI . '/css/bootstrap.min.css',
	array(),
	DIGIBOOST_THEME_VERSION
);

// Add Animations Style
wp_enqueue_style(
	'digiboost-animations',
	DIGIBOOST_THEME_URI . '/css/animations.css',
	array(),
	DIGIBOOST_THEME_VERSION
);

// Add Theme Style
wp_enqueue_style(
	'digiboost-main',
	DIGIBOOST_THEME_URI . '/css/main.css',
	array(),
	DIGIBOOST_THEME_VERSION
);

// Add Theme stylesheet.
wp_enqueue_style( 'digiboost-style', get_stylesheet_uri(), array(), DIGIBOOST_THEME_VERSION );

wp_add_inline_style( 'digiboost-main', digiboost_add_font_styles_in_head() );
wp_add_inline_style( 'digiboost-main', digiboost_custom() );

if( defined('FW') ) :

	//function for enqueue styles and scripts for section video background
	if (! function_exists( 'digiboost_unyson_enqueue_section_video_background_scripts' ) ) :
		function digiboost_unyson_enqueue_section_video_background_scripts() {

			// fixes https://github.com/ThemeFuse/Unyson/issues/1552
			{
				global $is_safari;

				if ($is_safari) {
					wp_enqueue_script('youtube-iframe-api', 'https://www.youtube.com/iframe_api');
				}
			}

			wp_enqueue_style(
				'digiboost-shortcode-section-background-video',
				DIGIBOOST_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/section/static/css/background.css'
			);

			wp_enqueue_script(
				'digiboost-shortcode-section-formstone-core',
				DIGIBOOST_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/section/static/js/core.js',
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script(
				'digiboost-shortcode-section-formstone-transition',
				DIGIBOOST_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/section/static/js/transition.js',
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script(
				'digiboost-shortcode-section-formstone-background',
				DIGIBOOST_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/section/static/js/background.js',
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script(
				'digiboost-shortcode-section',
				DIGIBOOST_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/section/static/js/background.init.js',
				array(
					'digiboost-shortcode-section-formstone-core',
					'digiboost-shortcode-section-formstone-transition',
					'digiboost-shortcode-section-formstone-background'
				),
				false,
				true
			);
		}
	endif;
endif;
