<?php
if ( !defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

if ( class_exists( 'Digiboost_Comments_Walker' ) ) {
    return;
}

/**
 * Walker for comments
 */
class Digiboost_Comments_Walker extends Walker_Comment
{
    
    /**
     * Outputs a comment in the HTML5 format.
     *
     * @param WP_Comment $comment Comment to display.
     * @param int $depth Depth of the current comment.
     * @param array $args An array of arguments.
     * @see   wp_list_comments()
     *
     * @since 3.6.0
     *
     */
    protected function html5_comment( $comment, $depth, $args ) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
        ?>
        <<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children
            ? 'parent' : '', $comment ); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <header class="comment-meta">
                <div class="comment-author vcard">
                    <?php if ( 0 != $args['avatar_size'] ) {
                        echo get_avatar( $comment, $args['avatar_size'] );
                    }
                    /* translators: %s: comment author link */
                    printf( __( '%s ', 'digiboost' ),
                        sprintf( '<h5 class="fn text-capitalize">%s</h5>',
                            get_comment_author_link( $comment ) )
                    );
                    ?>
                </div><!-- .comment-author -->
            </header><!-- .comment-meta -->

            <div class="comment-content">
                <?php comment_text(); ?>
            </div><!-- .comment-content -->
            <footer class="comment-footer">
                <?php
                comment_reply_link( array_merge( $args, array(
                    'add_below' => 'div-comment',
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'before' => '<span class="reply"><i class="fa fa-share-square-o" aria-hidden="true"></i>',
                    'after' => '</span>'
                ) ) );
                edit_comment_link( esc_html__( 'Edit', 'digiboost' ),
                    '<span class="edit-link"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>', '</span>' );
                if ( '0' == $comment->comment_approved ) : ?>
                    <span class="comment-awaiting-moderation color-main fw-500"><?php esc_html_e( 'Your comment is awaiting moderation.', 'digiboost' ); ?></span>
                <?php endif; ?>
	            <span class="comment-metadata">
		            <i class="fa fa-calendar" aria-hidden="true"></i>
					<?php digiboost_comment_date() ?>
	            </span><!-- .comment-metadata -->
            </footer>
        </article><!-- .comment-body -->
        <?php
    }
}