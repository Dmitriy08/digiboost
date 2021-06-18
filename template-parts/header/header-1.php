<?php
/**
 * The template part for selected header
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = digiboost_get_options();
$section = digiboost_get_section_options( $options, 'header_' );
if ( class_exists( 'WooCommerce' )
	&& !empty( $options['header_search'] )
	|| !empty( $options['header_shopping_cart'] ) ):
	get_template_part( 'template-parts/topline/topline-1' );
endif;
?>
<?php
//header_absolute wrapper
if ( !empty( $options['header_absolute'] ) ) : ?>
	<div class="header_absolute"><!-- .header_absolute open -->
<?php endif; //header_absolute?>

	<header class="page_header s-py-10 <?php echo esc_attr( $section['section_class'] ); ?>"
		<?php echo ( !empty( $section['section_id'] ) ) ? 'id="' . esc_attr( $section['section_id'] ) . '"' : ''; ?>
		<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="' . esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
	>
		<div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
			<div class="row align-items-center">
				<div class="col-xl-2 col-lg-3 col-md-7 col-9">
					<?php get_template_part( 'template-parts/logo/header-logo' ); ?>
				</div>
				<div class="col-xl-10 col-lg-9 col-md-5 col-1">
					<!-- main nav start -->
					<div class="nav-wrap">
						<nav class="top-nav">
							<?php
							if ( has_nav_menu( 'primary' ) ) :
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_class' => 'sf-menu nav',
									'container' => 'ul'
								) );
							endif;
							?>
						</nav>
						<?php if ( class_exists( 'WooCommerce' )
							&& !empty( $options['header_search'] )
							|| !empty( $options['header_shopping_cart'] ) ):
							?>
							<div class=" d-none d-xl-flex align-items-center">
								<?php
								if ( !empty( $options['header_search'] ) && class_exists( 'WooCommerce' ) ):
									?>
									<div class="widget widget_search">
										<?php get_product_search_form(); ?>
									</div>
								<?php endif;//header search widget
								if ( !empty( $options['header_shopping_cart'] ) && class_exists( 'WooCommerce' ) && !is_cart() && !is_checkout() ):
									?>
									<div class="dropdown dropdown-shopping-cart">
										<a class="dropdown-toggle" href="#" role="button" id="dropdown-cart"
										   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<?php
											echo '<span class="badge cart-count">';
											if ( WC()->cart->get_cart_contents_count() !== 0 ) {
												echo esc_html( WC()->cart->get_cart_contents_count() );
											}
											echo '</span>';
											?>
											<i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo esc_html( 'View cart' ) ?>
										</a>
										<div class="dropdown-menu dropdown-menu-right p-lg-40 p-20 ls"
										     aria-labelledby="dropdown-cart">
											<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
										</div>
									</div><!-- eof woo cart -->
								<?php endif;//header shopping cart
								?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- header toggler -->
		<span class="toggle_menu"><span></span></span>
	</header>
<?php
if ( !empty( $options['header_absolute'] ) ) {
	echo '</div><!--.header_absolute-->';
}
