<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - extended item layout
 */
if($atts['layout']['layout_type']==='tiled' && $count==1 ){
	$post_class='side-item text-center text-sm-left content-padding padding-small';
}else{
	$post_class='text-center text-sm-left vertical-item content-padding padding-small';
}

?>

<article <?php post_class( $post_class.' '.$background  ); ?>>
	<?php
	if($atts['layout']['layout_type']==='tiled' && $count==1):
		echo '<div class="row align-center">';
		echo '	<div class="col-lg-6">';
	endif;
	?>
	<?php if ( get_the_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			the_post_thumbnail($image_size);
			?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
            <?php
            if (in_array('category', get_object_taxonomies(get_post_type())) && digiboost_categorized_blog() && !digiboost_get_option('blog_hide_categories') ) :
                digiboost_the_categories();
            endif; //categories
            ?>
		</div>
	<?php endif; //eof thumbnail check
		if($atts['layout']['layout_type']==='tiled' && $count==1):
			echo '</div>';
			echo '<div class="col-lg-6">';
		endif;
		?>
	<div class="item-content">
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
					digiboost_posted_on( array(  'date' ) );
				endif; ?>
			</div>
			<h5 class="entry-title">
				<a href="<?php the_permalink(); ?>">
					<?php digiboost_trim_title_words($title_size, '...'); ?>
				</a>
			</h5>
		</header>
		<div class="entry-content">
            <?php
            if ( function_exists( 'digiboost_the_excerpt' ) ) {
                digiboost_the_excerpt( array(
                    'length' => $excerpt_size,
                    'before' => '<p>',
                    'after' => '</p>',
                    'more' => '.',
                ) );
            } else {
                the_excerpt();
            }
            ?>
		</div>
		<footer class="entry-footer">
			<div class="entry-meta">
				<?php
				if ( 'post' == get_post_type() ) :
					digiboost_posted_on( array( 'more_button' ) );
				endif;
				?>
			</div>
		</footer>
	</div>
	<?php
	if($atts['layout']['layout_type']==='tiled' && $count==1):
		echo '</div>';
		echo '</div>';
	endif;
	?>

</article><!-- eof vertical-item -->
