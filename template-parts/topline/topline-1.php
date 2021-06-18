<?php
/**
 * The template part for selected header
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = digiboost_get_options();
$section = digiboost_get_section_options( $options, 'topline_' );


//topline section with social icons and search button
?>
<section class="page_topline ds  c-gutter-0 s-py-15 s-borderbottom  d-xl-none"
	<?php echo ( !empty( $section['section_id'] ) ) ? 'id="' . esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="' . esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-12 text-center">
				<ul class="top-includes">
					<?php if ( !empty( $options['header_search'] )  && class_exists('WooCommerce') ): ?>
						<li>
							<div class="dropdown">
								<a href="#" class="dropdown-toggle" id="dropdownMenuButton4" data-toggle="dropdown"
								   aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-search"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right p-lg-40 p-20 ls"
								     aria-labelledby="dropdownMenuButton4">
									<div class="widget widget_search">
										<?php get_product_search_form(); ?>
									</div>
								</div>
							</div>
						</li>
					<?php endif; ?>
					<?php if ( class_exists( 'WC_Widget_Cart' ) && !is_cart() && !is_checkout()  && class_exists('WooCommerce') && !empty($options['header_shopping_cart']) ) : ?>
						<li>

							<div class="dropdown dropdown-shopping-cart">
								<a class="dropdown-toggle" href="#" role="button" id="dropdown-cart3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php
									echo '<span class="badge bg-maincolor cart-count">';
									if ( WC()->cart->get_cart_contents_count() !== 0 ) {
										echo esc_html( WC()->cart->get_cart_contents_count() );
									}
									echo '</span>';
									
									?>
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right p-lg-40 p-20 ls" aria-labelledby="dropdown-cart3">
									<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
								</div>

							</div><!-- eof woo cart -->
						</li>
					<?php endif; //woocommerce ?>
					<?php if ( !empty( $options['register_modal']['show_register_modal'] ) ): ?>
						<li>
							<a class="login-form-btn" href="#" data-toggle="modal" data-target="#login-form">
								<i class="fa fa-user" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php
					if ( !empty ( $options['meta_phone'] ) && !empty ( $options['fw'] ) ) : ?>
						<li>
							<h6>
								<?php echo esc_html( $options['meta_phone'] ); ?>
							</h6>
						</li>
					<?php endif;
					if ( !empty ( $options['meta_email'] ) && !empty ( $options['fw'] ) ) : ?>
						<li>
							<h6>
								<?php echo esc_html( $options['meta_email'] ); ?>
							</h6>
						</li>
					<?php endif;
					if ( !empty ( $options['meta_address'] ) && !empty ( $options['fw'] ) ) : ?>
						<li>
							<h6>
								<?php echo esc_html( $options['meta_address'] ); ?>
							</h6>
						</li>
					<?php endif; ?>

				</ul>
			</div>
			
		</div>
	</div>
</section><!-- .page_topline -->