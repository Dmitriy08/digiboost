<?php
/**
 * The template part for selected footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = digiboost_get_options();
$section = digiboost_get_section_options( $options, 'footer_' );

?>
<footer class="page_footer footer-1 <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( !empty( $section['section_id'] ) ) ? 'id="'. esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="'. esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
	<div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
		<div class="row<?php echo esc_attr( $section['section_row_class_suffix'] ); ?>">
			<div class="col-xl-4 col-12 text-sm-left text-center d-flex flex-column justify-content-start justify-content-xl-center">
				<?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
			</div>
			<div class="col-xl-4 col-12 text-center text-sm-left">
				<?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
			</div>
			<div class="col-xl-4 col-12 text-center text-sm-left">
				<?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
			</div>
		</div>
	</div>
</footer><!-- .page_footer -->