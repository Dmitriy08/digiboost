<?php
/**
 * The Template for displaying all single posts
 */

get_header();
$column_classes = digiboost_get_columns_classes();
$post_thumbnail = get_the_post_thumbnail( get_the_ID() );
$show_post_thumbnail = ( post_password_required() || is_attachment() || !has_post_thumbnail() ) ? false : true;
$gallery_post_format = ( get_post_format() === 'gallery' ) ? true : false;
$additional_post_class = ( $post_thumbnail || $gallery_post_format ) ? ' box-shadow' : 'box-shadow';

?>
<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
<?php
// Start the Loop.
while ( have_posts() ) : the_post();
	
	/*
	 * Include the post format-specific template for the content. If you want to
	 * use this in a child theme, then include a file called called content-___.php
	 * (where ___ is the post format) and that will be used instead.
	 */
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item  content-padding  single-post ' . $additional_post_class ); ?>>
		<?php
		digiboost_post_thumbnail();
		if ( 'post' == get_post_type() ) :
			if ( has_post_thumbnail() || $gallery_post_format ):
				digiboost_posted_on( array( 'categories' ) );
			endif;
		endif;
		?>
		<div class="item-content ls">
            <header class="entry-header">
                <?php
                if ( 'post' == get_post_type() ) :
                    if ( !has_post_thumbnail() && !$gallery_post_format ):
                        digiboost_posted_on( array( 'categories' ) );
                    endif;
                endif;
             ?>
                <div class="entry-meta">
                    <?php
                    if ( 'post' == get_post_type() ) :
                        digiboost_posted_on( array( 'sticky','date', 'author', 'comments' ) );
                    endif; ?>
                </div>
            </header>
			<div class="entry-content">
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
            <footer class="entry-footer">
                <div class="entry-meta">
                    <?php
                    if ( 'post' == get_post_type() ) :
                        digiboost_posted_on( array( 'tags' ) );
                    endif;
                    ?>
                </div>
            </footer>
		</div>
	</article><!-- #post-## -->
	<?php

	
	// Previous/next post navigation. Uncomment following line if you need post navigation
	digiboost_post_nav();
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
	
?>

	<?php endwhile; ?>
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