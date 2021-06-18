<?php
/**
 * The template for displaying image attachments
 */

get_header();

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();
$css_classes = 'vertical-item content-padding  content-up big-up content-box-shadow';
$column_classes = digiboost_get_columns_classes(); ?>
	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?> content-area image-attachment">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( $css_classes ); ?>>
				<div class="item-media">
					<?php digiboost_the_attached_image(); ?>

				</div>
				<div class="item-content ls">
					<div class="entry-content">
						
						<?php if ( has_excerpt() ) : ?>
							<div class="entry-caption">
								<?php the_excerpt(); ?>
							</div><!-- .entry-caption -->
						<?php endif; ?>

						<header class="entry-header">
							<div class="entry-meta">
								<span class="full-size-link cat-links"><a href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><?php echo esc_html( $metadata['width'] ); ?> &times; <?php echo esc_html( $metadata['height'] ); ?></a></span>
								<?php
								
								digiboost_posted_on( array( 'author', 'date' ) );
								?>

							</div>
							<h5 class="entry-title"><?php esc_html_e( 'Posted In: ', 'digiboost' ); ?>
								<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a>
							</h5>
						</header><!-- .entry-header -->
						<?php
						the_content();
						wp_link_pages( array(
							'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'digiboost' ) . '</span>',
							'after' => '</div>',
							'link_before' => '<span>',
							'link_after' => '</span>',
						) );
						?>
					</div><!-- .entry-content -->
				</div>

			</article><!-- #post-## -->
			<div class="has_post_thumbnail">
				<nav class="post-navigation">
					<div class="prev-item"><?php previous_image_link( false, '<i class="fa fa-angle-left" aria-hidden="true"></i>' . esc_html__( 'Previous Image', 'digiboost' ) ); ?></div>
					<div class="next-item"><?php next_image_link( false, esc_html__( 'Next Image', 'digiboost' ) . '<i class="fa fa-angle-right" aria-hidden="true"></i>' ); ?></div>
				</nav><!-- #image-navigation -->
				
				<?php comments_template(); ?>
			</div>
		<?php endwhile; // end of the loop. ?>
	</div><!--eof #content -->
<?php if ( $column_classes['sidebar_class'] ): ?>
	<!-- main aside sidebar -->
	<aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
	</aside>
	<!-- eof main aside sidebar -->
<?php
endif;
get_footer();