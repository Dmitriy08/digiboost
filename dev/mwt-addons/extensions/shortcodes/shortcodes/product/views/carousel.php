<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
if ( !class_exists('WooCommerce')) {
    return;
}
/**
 * @var $atts The shortcode attributes
 */
$loop = $atts['loop'];
$nav = $atts['nav'];
$nav_position = $atts['nav_position'];
$dots = $atts['dots'];
$center = $atts['center'];
$autoplay = $atts['autoplay'];
$responsive_xl = $atts['responsive_xl'];
$responsive_lg = $atts['responsive_lg'];
$responsive_md = $atts['responsive_md'];
$responsive_sm = $atts['responsive_sm'];
$responsive_xs = $atts['responsive_xs'];
$margin = $atts['margin'];



/**
 * @var array $atts
 * @var array $posts
 */

$unique_id = uniqid();

?>
<div
		class="owl-carousel shortcode-product <?php echo esc_attr($nav_position)?>"
		data-loop="<?php echo esc_attr( $loop ); ?>"
		data-nav="<?php echo esc_attr( $nav ); ?>"
		data-dots="<?php echo esc_attr( $dots ); ?>"
		data-center="<?php echo esc_attr( $center ); ?>"
		data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
		data-speed="<?php digiboost_slide_speed(); ?>"
		data-responsive-xl="<?php echo esc_attr( $responsive_xl ); ?>"
		data-responsive-lg="<?php echo esc_attr( $responsive_lg ); ?>"
		data-responsive-md="<?php echo esc_attr( $responsive_md ); ?>"
		data-responsive-sm="<?php echo esc_attr( $responsive_sm ); ?>"
		data-responsive-xs="<?php echo esc_attr( $responsive_xs ); ?>"
		data-margin="<?php echo esc_attr( $margin ); ?>"
>
    <?php while ( $posts->have_posts() ) : $posts->the_post();
	
		$filepath = get_template_directory() . '/framework-customizations/extensions/shortcodes/shortcodes/product/views/item-layout.php';
		if ( file_exists( $filepath ) ) {
			include( $filepath );
		} else {
			$filepath = plugin_dir_path( __FILE__ ) .'item-layout.php';
		
			if ( file_exists( $filepath ) ) {
				include( $filepath );
			} else {
				_e( 'View not found', 'digiboost' );
			}
		}
            ?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); // reset the query ?>
</div>