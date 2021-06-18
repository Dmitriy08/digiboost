<?php
/**
 * Template Name: 404
 * The template for displaying 404 pages (Not Found)
 */

get_header();

$options = digiboost_get_options();
$section = digiboost_get_section_options($options, '404_');
?>
<section class="page_404 <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( !empty( $section['section_id'] ) ) ? 'id="'. esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="'. esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
	<div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
		<div class="row<?php echo esc_attr( $section['section_row_class_suffix'] ); ?>">
			<div class="col-12 text-center">
                <h1 class="main-text-404 color-main">
                <?php echo esc_html( '404' ); ?>
                </h1>
                <p>
                    <?php echo (!empty($options['404_text'])) ? esc_html($options['404_text']) : ''?>
                </p>
                <div class="fw-divider-space divider-30 divider-lg-55"></div>
                <div class="many-buttons">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-maincolor medium-btn"><?php esc_html_e( 'go home', 'digiboost' ); ?></a>
                    <a id="back-btn" href="#" class="btn btn-outline-maincolor medium-btn"><?php esc_html_e( 'go back', 'digiboost' ); ?></a>
                </div>
            </div>
		</div>
	</div><!--eof #content -->
</section>
<?php
get_footer();