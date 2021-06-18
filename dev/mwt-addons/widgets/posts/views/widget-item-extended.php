<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget posts - extended item layout
 */

//wrapping in div for carousel layout
?>
<div class="vertical-item content-padding hero-bg text-center">
	<?php if ( get_the_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php echo get_the_post_thumbnail(); ?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //eof thumbnail check ?>
	<div class="item-content">
		<h3 class="item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<?php if ( get_the_term_list( get_the_ID(), 'category', '', ' ',
			'' )
		) : ?>
			<div class="cat-links">
				<?php
				echo get_the_term_list( get_the_ID(), 'category', '', ' ', '' );
				?>
			</div>
		<?php endif; //terms check ?>
		<?php the_excerpt(); ?>
	</div>
	<div class="item-icons links-darkgrey">
		<div class="row c-gutter-0">
			<?php if ( function_exists( 'mwt_share_this' ) ): ?>
				<div class="col">
					<i class="fa fa-eye color-main"></i>
					<?php mwt_show_post_views_count(); ?>
				</div>
			<?php endif; ?>
			<?php
			// Set up and print post meta information.
			if ( ! post_password_required()
			     && ( comments_open()
			          || get_comments_number() )
			) :
				?>
				<div class="col">
				<span class="comments-link">
					<i class="fa fa-comment-o color-main"></i>
					<?php comments_popup_link( esc_html__( '0', 'mwt' ),
						esc_html__( '1', 'mwt' ), esc_html__( '%', 'mwt' ) ); ?>
				</span>
				</div>
			<?php
			endif; //password
			if ( function_exists( 'mwt_share_this' ) ): ?>
				<div class="col">
					<?php
						mwt_post_like_button( get_the_ID() );
						mwt_post_like_count( get_the_ID() );
					?>
				</div>
			<?php endif; //mwt_share_this ?>
		</div>
	</div>
</div><!-- eof vertical-item -->
