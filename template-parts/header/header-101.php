<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = digiboost_get_options();
$section = digiboost_get_section_options( $options, 'header_' );

//get topline
get_template_part( 'template-parts/topline/topline-2' );
get_template_part( 'template-parts/toplogo/toplogo-1' );

?>

<header class="page_header_side header_slide <?php echo esc_attr( $section['section_class'] ); ?>">
	<span class="toggle_menu toggle_menu_side header-slide"><span></span></span>
	<div class="scrollbar-macosx">
		<div class="side_header_inner">

			<div class="header-side-menu">
				<nav class="mainmenu_side_wrapper">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'nav menu-click',
						'container'      => 'ul'
					) );
					?>
				</nav>
			</div>

			<div class="text-center">
			<?php
				if ( !empty ( $options['social_icons'] ) && !empty ( $options['fw'] ) ) : ?>
					<span class="social-icons">
				<?php
				//get icons-social shortcode to render icons in team member item
				digiboost_shortcode_render( 'icons_social', array( 'social_icons' => $options['social_icons'] ) );
				?>
				</span>
			<?php endif; //social_icons ?>
			</div>

			<div class="widget widget_search mb-60">
				<?php get_search_form(); ?>
			</div>

			<div class="widget widget_icons_list links-maincolor">
				<ul class="list-unstyled">
					<?php if ( ! empty ( $options['meta_phone'] ) ) : ?>
						<li class="icon-inline">
							<div class="icon-styled color-darkgrey icon-top fs-14">
								<i class="fa fa-phone"></i>
							</div>
							<p>
								<strong class="color-darkgrey">
									<?php esc_html_e( 'Phone:', 'digiboost' ); ?>
								</strong>
								<span>
									 <?php echo esc_html( $options['meta_phone'] ); ?>
								</span>
							</p>
						</li>
					<?php endif; ?>
					<?php if ( ! empty ( $options['meta_email'] ) ) : ?>
						<li class="icon-inline">
							<div class="icon-styled color-darkgrey icon-top fs-14">
								<i class="fa fa-envelope"></i>
							</div>
							<p>
							<strong class="color-darkgrey">
								<?php esc_html_e( 'Email:', 'digiboost' ); ?>
							</strong>
								<span>
									<a href="mailto:<?php echo esc_attr( $options['meta_email'] ); ?>">
										<?php echo esc_html( $options['meta_email'] ); ?>
									</a>
								</span>
							</p>
						</li>
					<?php endif; ?>
					<?php if ( ! empty ( $options['meta_address'] ) ) : ?>
						<li class="icon-inline">
							<div class="icon-styled color-darkgrey icon-top fs-14">
								<i class="fa fa-map-marker"></i>
							</div>
							<p>
								<strong class="color-darkgrey">
									<?php esc_html_e( 'Address:', 'digiboost' ); ?>
								</strong>
								<span>
									<?php echo esc_html( $options['meta_address'] ); ?>
								</span>
							</p>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</header><!-- .page_header_side -->

