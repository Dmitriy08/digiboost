<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts The shortcode attributes
 */

$loop = $atts['layout']['carousel']['loop'];
$nav = $atts['layout']['carousel']['nav'];
$dots = $atts['layout']['carousel']['dots'];
$center = $atts['layout']['carousel']['center'];
$autoplay = $atts['layout']['carousel']['autoplay'];
$responsive_lg = $atts['layout']['carousel']['responsive_lg'];
$responsive_md = $atts['layout']['carousel']['responsive_md'];
$responsive_sm = $atts['layout']['carousel']['responsive_sm'];
$responsive_xs = $atts['layout']['carousel']['responsive_xs'];
$margin = $atts['layout']['carousel']['margin'];

/**
 * @var array $atts
 * @var array $posts
 */

$unique_id = uniqid();
$add_class = '';
$background = ( !empty($atts['background_color']) ) ? $atts['background_color'] : '';
$image_size='digiboost-rectangle2';
$excerpt_size=7;
$title_size=7;

	//get unique terms only for posts that are showing


?>
<div
	class="owl-carousel blog-shortcode"
	data-loop="<?php echo esc_attr( $loop ); ?>"
	data-nav="<?php echo esc_attr( $nav ); ?>"
	data-dots="<?php echo esc_attr( $dots ); ?>"
	data-center="<?php echo esc_attr( $center ); ?>"
	data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
	data-speed="<?php digiboost_slide_speed(); ?>"
	data-responsive-lg="<?php echo esc_attr( $responsive_lg ); ?>"
	data-responsive-md="<?php echo esc_attr( $responsive_md ); ?>"
	data-responsive-sm="<?php echo esc_attr( $responsive_sm ); ?>"
	data-responsive-xs="<?php echo esc_attr( $responsive_xs ); ?>"
	data-margin="<?php echo esc_attr( $margin ); ?>"
>
	<?php while ( $posts->have_posts() ) : $posts->the_post();
		$post_terms       = get_the_terms( get_the_ID(), 'category' );
		$post_terms_class = '';
		if ( ! empty ( $post_terms ) ) :
			foreach ( $post_terms as $post_term ) :
				$post_terms_class .= $post_term->slug . ' ';
			endforeach;
		endif;
	?>
	<div class="owl-carousel-item <?php echo esc_attr( 'item-layout-' . $atts['item_layout'] . ' ' . $post_terms_class ); ?>">
		<?php
		//include item layout view file. If no thumbnail - layout is always extended
		$filepath = get_template_directory() . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/' . $atts['item_layout'] . '.php';
		if ( ! ( has_post_thumbnail() ) ) {
			$filepath = get_template_directory() . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/item-extended.php';
		}
		if ( file_exists( $filepath ) ) {
			include( $filepath );
		} else {
			$filepath = plugin_dir_path( __FILE__ ) . $atts['item_layout'] . '.php';
			if ( ! ( has_post_thumbnail() ) ) {
				$filepath = plugin_dir_path( __FILE__ ) . 'item-extended.php';
			}
			if ( file_exists( $filepath ) ) {
				include( $filepath );
			} else {
				_e( 'View not found', 'digiboost' );
			}
		}
		?>
	</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); // reset the query ?>
</div>