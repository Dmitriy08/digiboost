<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = digiboost_get_options();
$section = digiboost_get_section_options( $options, 'header_' );

//toplogo section with contact and search button
?>
<section class="page_toplogo c-my-10 <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( !empty( $section['section_id'] ) ) ? 'id="'. esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="'. esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
	<div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">

		<div class="row align-items-center">
			<div class="col-12">

                <div class="d-lg-flex justify-content-lg-end align-items-lg-center">

                    <div class="mr-auto">
                        <?php get_template_part( 'template-parts/logo/header-logo' ); ?>
                    </div>

                    <div class="d-sm-flex justify-lg-content-end justify-content-sm-between align-items-center">
	                    <?php if ( ! empty ( $options['meta_phone'] ) ) : ?>
                        <div class="media">
                            <div class="icon-styled bordered round color-main fs-20">
                                <i class="fa fa-map-marker"></i>
                            </div>

                            <div class="media-body">
                                <h4>
                                    <strong><?php esc_attr_e( 'Phone:', 'digiboost' ); ?></strong>
                                </h4>
                                <p>
	                                <?php echo esc_html( $options['meta_phone'] ); ?>
                                </p>
                            </div>
                        </div><!-- .media -->
	                    <?php endif; ?>

	                    <?php if ( ! empty ( $options['meta_email'] ) ) : ?>
                        <div class="media">
                            <div class="icon-styled bordered round color-main fs-20">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h4>
                                    <strong><?php esc_attr_e( 'E-mail:', 'digiboost' ); ?></strong>
                                </h4>
                                <p>
                                    <a href="mailto:<?php echo esc_attr( $options['meta_email'] ); ?>">
		                                <?php echo esc_html( $options['meta_email'] ); ?>
                                    </a>
                                </p>
                            </div>
                        </div><!-- .media -->
	                    <?php endif; ?>

                    </div><!-- .d-none -->

                </div><!-- .d-lg-flex -->

            </div>
		</div>
	</div>
</section><!-- .page_toplogo -->
