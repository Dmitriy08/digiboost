<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - extended item layout
 */

//wrapping in div for carousel layout
?>
<div class="vertical-item content-padding hero-bg text-center">
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
			<a class="abs-link" href="<?php the_permalink(); ?>"></a>
		</div>
	</div>
	<div class="item-content">
		<h3 class="item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<div class="cat-links">
			<?php
			echo get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', ' ', '' );
			?>
		</div>
		<div>
			<?php the_excerpt(); ?>
		</div>
		<div class="item-button">
			<a href="<?php the_permalink(); ?>" class="btn btn-maincolor">
				<?php esc_html_e( 'Learn More', 'mwt' ); ?>
			</a>
		</div>
	</div>
</div><!-- eof vertical-item -->
