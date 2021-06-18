<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - regular item layout
 */

//has thumbnail layout
if ( get_the_post_thumbnail() ) :
	?>
	<article <?php post_class( 'vertical-item item-gallery content-absolute '. $background); ?>  >
	<div class="item-media">
		<div class="media-links">
			<a class="abs-link" href="<?php the_permalink(); ?>"></a>
		</div>
		<?php
		$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
		the_post_thumbnail('digiboost-rectangle2');
		?>
	
	</div>
	<div class="item-content">
		<h6>
			<a href="<?php the_permalink(); ?>">
				<?php digiboost_trim_title_words($title_size, '...'); ?>
			</a>
		</h6>
	</div>
	</article>
	<?php
//no featured image
else :
	?>
	<article <?php post_class( 'vertical-item gallery-item item-no-image text-center display_table' ) ?>">
	<div class="item-content display_table_cell">
		<h4 class="item-meta">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h4>
	</div>
	</article>
	<?php
endif;
?>