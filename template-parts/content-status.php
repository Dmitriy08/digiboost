<?php
/**
 * The default template for displaying quote content
 *
 * Used for both index/archive/.
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$show_post_thumbnail = ( post_password_required() || is_attachment() || !has_post_thumbnail() ) ? false : true;

$post_thumbnail = get_the_post_thumbnail( get_the_ID() );
$additional_post_class = ( $post_thumbnail ) ? 'cover-image ds s-overlay box-shadow' : 'ds vertical-item box-shadow content-padding';
$author_position = get_the_author_meta( 'position' );

if ( !digiboost_get_option( 'blog_hide_author' ) ){
	$add_class='show_author';
}else{
	$add_class ='';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( '' . $additional_post_class.' '.$add_class ); ?>>
	<div class="post-thumbnail">
		<?php
		echo wp_kses_post( $post_thumbnail );
		?>
	</div>
	<?php
	if ( !digiboost_get_option( 'blog_hide_author' ) && $post_thumbnail ) :?>
		<div class="author">
                    <?php
					global $post;
					echo get_avatar( $post->post_author );
					?>
                    <div class="author-content">
	                    <h5>
		                    <?php
							echo get_the_author_posts_link();
		                    ?>
	                    </h5>
                        <?php
						if ( !empty( $author_position ) ):
							echo '<span>' . $author_position . '</span>';
						endif;
						?>
                    </div>
                </div>
	<?php
	endif; ?>
	<?php
	if ( empty( $post_thumbnail ) ):
		echo '<div class="item-content">';
	endif;
	?>
	<?php
	if ( !digiboost_get_option( 'blog_hide_author' ) && !$post_thumbnail ) :?>
		<div class="author">
			<?php
			global $post;
			echo get_avatar( $post->post_author );
			?>
			<span class="author-content">
	                    <h5>
		                    <?php
							echo get_the_author_posts_link();
							?>
	                    </h5>
                        <?php
						if ( !empty( $author_position ) ):
							echo '<span>' . $author_position . '</span>';
						endif;
						?>
                    </span>
		</div>
	<?php
	endif; ?>
	<header class="entry-header">
		<?php
		if ( 'post' == get_post_type() ) :
			digiboost_posted_on( array( 'categories' ) );
		endif;
		?>
		<div class="entry-meta">
			<?php
			if ( 'post' == get_post_type() ) :
				digiboost_posted_on( array( 'date', 'comments' ) );
			endif; ?>
		</div>
		<?php
		the_title( '<h4 class="entry-title text-capitalize">', '</h5>' );
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		//hidding "more link" in content
		the_content( esc_html__( '', 'digiboost' ) );
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
	
	<?php
	if ( empty( $post_thumbnail ) ):
		echo '</div>';
	endif;
	?>
</article><!-- #post-## -->