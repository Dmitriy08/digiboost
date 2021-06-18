<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - title item layout
 */

//wrapping in div for carousel layout
?>
<div class="widget_portfolio-item">
	<div class="vertical-item gallery-title-item">
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			if ( function_exists( 'digiboost_post_thumbnail' ) ) :
				digiboost_post_thumbnail();
			else :
				the_post_thumbnail();
			endif;
			?>
			<div class="media-links">
				<div class="links-wrap">
					<a class="link-zoom photoswipe-link"
					   href="<?php echo esc_attr( $full_image_src ); ?>"></a>
					<a class="link-anchor" href="<?php the_permalink(); ?>"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="item-title text-center">
		<h3>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<div class="cat-links">
			<?php
			echo get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', ' ', '' );
			?>
		</div>
	</div><!-- eof vertical-item -->
</div><!-- eof widget item -->