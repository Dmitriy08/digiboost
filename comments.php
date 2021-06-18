<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$options = digiboost_get_options();

//fields are hooked in inc/hooks.php
$title_reply = ( have_comments() )
	? sprintf( _n( esc_html__( '1 comment' , 'digiboost' ), esc_html__( '%1$s comments', 'digiboost' ), get_comments_number(), 'digiboost' ), number_format_i18n( get_comments_number() ) )
	: esc_html__( 'Leave A Comment', 'digiboost' );
$req = get_option( 'require_name_email' );
$html_req = ( $req ? " required='required'" : '' );

$args = array(

	'fields'               =>  array(
		'author'  => '<p class="comment-form-author ">' . '<label for="author">' . esc_html__( 'Name', 'digiboost' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
					 '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $html_req . '   placeholder="' . esc_attr__( 'Name', 'digiboost' ) . '"/></p>',
		'email'   => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'digiboost' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
					 '<input id="email" class="form-control" name="email"  type="email"  value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" ' . $html_req . '   placeholder="' . esc_attr__( 'Email', 'digiboost' ) . '" /></p>',

	),
    'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . esc_html_x( 'Comment', 'noun', 'digiboost' ) . '</label> <textarea id="comment"  class="form-control" name="comment" cols="45" rows="5"  aria-required="true" required="required"  placeholder="' . esc_attr__( 'Comment', 'digiboost' ) . '"></textarea></p>',
	'logged_in_as'         => '<p class="logged-in-as">' .
	                          sprintf(
	                          /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
		                          esc_html__( 'Logged in as ', 'digiboost' ) . '<a href="%1$s" aria-label="%2$s">%3$s' .  '</a>. <a href="%4$s">' . esc_html__( 'Log out?', 'digiboost' ) . '</a>',
		                          get_edit_user_link(),
		                          /* translators: %s: user name */
		                          esc_attr( sprintf( esc_html__( 'Logged in as %s. Edit your profile.', 'digiboost' ), $user_identity ) ),
		                          $user_identity,
		                          wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) )
	                          ) . '</p>',
	'comment_notes_before' => '',
	'class_form'           => 'comment-form',
	'cancel_reply_link'    => esc_html__( 'Cancel reply', 'digiboost' ),
	'label_submit'         => esc_html__( 'Submit', 'digiboost' ),
	'title_reply'          => $title_reply,
	'title_reply_before'   => '<div class="ls ms p-30 p-lg-50"><h4 class="comment-reply-title">',
	'title_reply_after'    => '</h4>',
	'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
	'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
	'format'               => 'html5',
);

//closing div, that was opened in $args in 'title_reply_before'
add_action( 'comment_form_after', 'digiboost_echo_closing_div' );

?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="nav-links" role="navigation">
				<?php paginate_comments_links( array(
					'prev_text' => '<i class="fa fa-chevron-left"></i>',
					'next_text' => '<i class="fa fa-chevron-right"></i>',
				) ); ?>
			</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'walker'      => digiboost_return_comments_walker(),
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 80,
			) );
			?>
		</ol><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="nav-links" role="navigation">
				<?php paginate_comments_links( array(
                    'prev_text' => '<i class="fa fa-chevron-left"></i>',
                    'next_text' => '<i class="fa fa-chevron-right"></i>',
                    )
                ); ?>
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>
		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'digiboost' ); ?></p>
		<?php endif; //comments_open() ?>

	<?php endif; ?>
	<?php comment_form( $args ); ?>
</div><!-- #comments -->