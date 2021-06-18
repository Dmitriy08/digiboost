<?php if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying single service
 *
 */

get_header();
$pID = get_the_ID();

//no columns on single service page
$column_classes = fw_ext_extension_get_columns_classes( true );

//getting taxonomy name
$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name = $ext_team_settings['taxonomy_name'];

$atts = fw_get_db_post_option( get_the_ID() );

$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$unique_id = uniqid();
?>
	<section class="ls s-py-xl-110 s-py-lg-130 s-py-md-90 s-py-60 text-center text-sm-left container-px-lg-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="fw-divider-space hidden-xs hidden-sm hidden-md hidden-lg hidden-xl" style="margin-top: 40px;"></div>
				</div>
				<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
					<?php
					// Start the Loop.
					while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>">
							<div class="side-item team-single content-box-shadow content-padding content-up">
								<div class="row align-items-center">
									<div class="col-xl-6 col-lg-5 col-md-6 col-sm-12">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="item-media">
												<?php the_post_thumbnail( 'digiboost-small-width' ); ?>
											</div>
										<?php endif; ?>
									</div>
									<div class="col-xl-6 col-lg-7 col-md-6 col-sm-12">
										<div class="item-content ls">
											<?php the_title( '<h4 class="color-main"><span class="big">', '</span></h4>' ); ?>
											<?php if ( !empty( $atts['position'] ) ) : ?>
												<p class="team-position small-text text-uppercase">
													<?php echo wp_kses_post( $atts['position'] ); ?>
												</p>
											<div class="divider-lg-50 divider-20"></div>
											<?php endif; //position
											if ( !empty( $atts['bio'] ) ) :
												 echo wp_kses_post( $atts['bio'] ); ?>
												<div class="divider-lg-60 divider-20"></div>
											<?php endif; //bio
											if ( !empty( $atts['social_icons'] ) ) :
												//get icons-social shortcode to render icons in team member item
												$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
												if ( !empty( $shortcodes_extension ) ) {
													echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
												}
											endif; //icons
											?>

										</div>
									</div>
								</div>
							</div>
						</article><!-- #post-## -->
					
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
				?>
				<div class="col-12">
					<div class="fw-divider-space hidden-xs hidden-sm hidden-md hidden-lg hidden-xl" style="margin-top: 40px;"></div>
				</div>
			</div>
		</div>
	</section>
<?php
the_content();
get_footer();