<?php
/**
 * The default template for displaying link content
 *
 * Used for index/archive.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$show_post_thumbnail = (post_password_required() || is_attachment() || !has_post_thumbnail()) ? false : true;
$post_thumbnail = get_the_post_thumbnail(get_the_ID());

$additional_post_class = ( $post_thumbnail ) ? ' content-up big-up content-box-shadow' : 'box-shadow';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'text-center text-sm-left vertical-item ds  content-padding  ' . $additional_post_class ); ?>>
	<?php digiboost_post_thumbnail();
	if ( 'post' == get_post_type() ) :
		if ( has_post_thumbnail()  ):
			digiboost_posted_on( array( 'categories' ) );
		endif;
	endif;
	?>
	<div class="item-content">
		<!-- .entry-header -->
        <header class="entry-header">
            <?php
            if ( 'post' == get_post_type() ) :
                if ( !has_post_thumbnail()  ):
                    digiboost_posted_on( array( 'categories' ) );
                endif;
            endif;
            ?>
            <?php the_title( '<h4 class="entry-title text-capitalize"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
            ?>
            <div class="entry-meta">
                <?php
                if ( 'post' == get_post_type() ) :
                    digiboost_posted_on( array( 'sticky','date', 'author' ) );
                endif; ?>
            </div>
        </header>
        <!-- .entry-header -->
        <div class="entry-content">
            <?php
            the_content( esc_html__( '', 'digiboost' ) );
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
                    digiboost_posted_on( array( 'tags', 'more_button' ) );
                endif;
                ?>
            </div>
        </footer>
	</div><!-- .item-content -->
</article><!-- #post-## -->
