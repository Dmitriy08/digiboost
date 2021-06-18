<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}

/**
 * @var array $atts
 * @var array $posts
 */

$unique_id = uniqid();
$categories     = array();
$background = ( !empty($atts['background_color']) ) ? $atts['background_color'] : '';
$image_size='digiboost-small-width';

$loop = $atts['layout']['carousel']['loop'];
$nav = $atts['layout']['carousel']['nav'];
$nav_position = $atts['layout']['carousel']['nav_position'];
$dots = $atts['layout']['carousel']['dots'];
$center = $atts['layout']['carousel']['center'];
$autoplay = $atts['layout']['carousel']['autoplay'];
$responsive_xl = $atts['layout']['carousel']['responsive_xl'];
$responsive_lg = $atts['layout']['carousel']['responsive_lg'];
$responsive_md = $atts['layout']['carousel']['responsive_md'];
$responsive_sm = $atts['layout']['carousel']['responsive_sm'];
$responsive_xs = $atts['layout']['carousel']['responsive_xs'];
$margin = $atts['layout']['carousel']['margin'];

if ( $atts['show_filters'] ) {
	//get all terms for filter
	$all_categories = array();
	// Start the Loop.
	while ( $posts->have_posts() ) : $posts->the_post();
		$post_categories = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
		if ( ! empty( $post_categories ) ) {
			$all_categories[] = $post_categories;
		}
	endwhile;
	$posts->wp_reset_postdata();
	if ( ! empty( $all_categories ) ) {
		foreach ( $all_categories as $post_categories ) :
			foreach ( $post_categories as $category ) :
				$categories[] = $category;
			endforeach;
		endforeach;
	}
	$categories = array_unique( $categories, SORT_REGULAR );
	if ( count( $categories ) > 1 ) : ?>
		<div class="filters gallery-filters filters-bordered carousel_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
			<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'digiboost' ); ?></a>
			<?php foreach ( $categories as $category ) : ?>
				<a href="#"
				   data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
			<?php endforeach; ?>
		</div><!-- eof isotope_filters -->
	<?php endif; //count subcategories check
} //count subcategories check
?>
<div id="widget_portfolio_carousel_<?php echo esc_attr( $unique_id ); ?>"
     class="owl-carousel shortcode-gallery owl-shadowitems <?php echo esc_attr($nav_position)?>"
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
	<?php if ( count( $categories ) > 1 && $atts['show_filters'] ) { ?>
		data-filters=".carousel_filters-<?php echo esc_attr( $unique_id ); ?>"
	<?php } ?>
>
	<?php while ( $posts->have_posts() ) : $posts->the_post();
		$post_terms       = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
		$post_terms_class = '';
		if ( ! empty ( $post_terms ) ) :
			foreach ( $post_terms as $post_term ) :
				$post_terms_class .= $post_term->slug . ' ';
			endforeach;
		endif;
		?>
		<div
			class="owl-carousel-item <?php echo esc_attr( 'item-layout-' . $atts['item_layout'] . ' ' . $post_terms_class ); ?>">
			<?php
			//include item layout view file
			if ( has_post_thumbnail() ) {
				include( fw()->extensions->get( 'portfolio' )->locate_view_path( esc_attr( $atts['item_layout'] ) ) );
			} else {
				include( fw()->extensions->get( 'portfolio' )->locate_view_path( 'item-extended' ) );
			}
			?>
		</div>
	<?php endwhile; ?>
	<?php //removed reset the query ?>
</div>