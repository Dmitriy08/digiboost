<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = digiboost_get_options();
$section = digiboost_get_section_options( $options, 'topline_' );

//topline section with contact info and search button
?>
<section class="page_topline c-my-10 <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( !empty( $section['section_id'] ) ) ? 'id="'. esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="'. esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
	<div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
		<div class="row align-items-center">
			<div class="col-md-10 text-md-left text-center">
				<ul class="top-includes">
					<?php if ( ! empty ( $options['meta_phone'] ) ) : ?>
					<li>
						<span class="icon-inline">
							<span class="icon-styled color-main">
								<i class="fa fa-phone"></i>
							</span>
							<strong class="color-darkgrey">
								<?php esc_html_e( 'Phone:', 'digiboost' ); ?>
							</strong>
							<span>
								 <?php echo esc_html( $options['meta_phone'] ); ?>
							</span>
						</span>
					</li>
					<?php endif; ?>
					<?php if ( ! empty ( $options['meta_email'] ) ) : ?>
					<li>
						<span class="icon-inline">
							<span class="icon-styled color-main">
								<i class="fa fa-envelope"></i>
							</span>
							<strong class="color-darkgrey">
								<?php esc_html_e( 'Email:', 'digiboost' ); ?>
							</strong>
							<span>
								<a href="mailto:<?php echo esc_attr( $options['meta_email'] ); ?>">
									<?php echo esc_html( $options['meta_email'] ); ?>
								</a>
							</span>
						</span>
					</li>
					<?php endif; ?>
					<?php if ( ! empty ( $options['meta_address'] ) ) : ?>
					<li>
						<span class="icon-inline">
							<span class="icon-styled color-main">
								<i class="fa fa-map-marker"></i>
							</span>
							<strong class="color-darkgrey">
								<?php esc_html_e( 'Address:', 'digiboost' ); ?>
							</strong>
							<span>
								<?php echo esc_html( $options['meta_address'] ); ?>
							</span>
						</span>
					</li>
					<?php endif; ?>
				</ul>
			</div>

			<div class="col-md-2 text-md-right text-center">
				<!--modal search-->
				<span>
					<a href="#" class="search_modal_button">
						<i class="fa fa-search"></i>
					</a>
				</span>

			</div>
		</div>
	</div>
</section><!-- .page_topline -->
