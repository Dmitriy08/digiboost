<?php
/**
 * The template part for selected header
 */

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$options = digiboost_get_options();
$section = digiboost_get_section_options( $options, 'header_' );
//if is page and Unyson is installed - overriding global header options from page settings
if ( function_exists( 'fw_get_db_post_option' ) && is_page() ) {
    $page_options = fw_get_db_post_option( get_the_ID(), 'header_page' );
    if ( !empty( $page_options['header_page_styles'] ) ) {
        $options = array_merge( $options, $page_options['header_page_custom_styles'] );
    }
}

?>


<section class="page_toplogo s-py-30 c-mb-10 c-mb-lg-0 <?php echo esc_attr( $section['section_class'] ); ?>">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-center text-md-left">
                <ul class="top-includes">
                    <?php
                    if ( !empty ( $options['social_icons'] ) && !empty ( $options['fw'] ) ) : ?>
                        <li>
                            <?php
                            //get icons-social shortcode to render icons in team member item
                            digiboost_shortcode_render( 'icons_social', array( 'social_icons' => $options['social_icons'] ) );
                            ?>
                        </li>
                    <?php endif; //social_icons
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
            <div class="col-lg-3 col-md-4 offset-lg-1 col-6 offset-md-0 offset-3 text-center">
                <?php get_template_part( 'template-parts/logo/header-logo' ); ?>
            </div>
            <div class="col-md-4 text-center text-md-right mb-0">
                <ul class="top-includes">
                    <?php if ( !empty( $options['register_modal']['show_register_modal'] ) ): ?>
                        <li>
                            <a class="login-form-btn" href="#" data-toggle="modal" data-target="#login-form">
                                <i class="fa fa-user-o"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ( !empty( $options['contact_modal']['show_contact_modal'] ) ): ?>
                        <li>
                            <a class="contact-form-btn" href="#" data-toggle="modal" data-target="#contact-form">
                                <i class="fa fa-envelope-o"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if ( !empty( $options['header_search'] ) ): ?>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" id="dropdownMenuButton2" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-search"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                     aria-labelledby="dropdownMenuButton2">
                                    <div class="widget widget_search">
                                        <?php get_search_form(); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
</section>
<?php
//header_absolute wrapper
if ( !empty( $options['header_absolute'] ) ) : ?>
<div class="header_absolute"><!-- .header_absolute open -->
    <?php endif; //header_absolute?>
<header class="page_header nav-narrow <?php echo esc_attr( $section['section_class'] ); ?>"
    <?php echo ( !empty( $section['section_id'] ) ) ? 'id="' . esc_attr( $section['section_id'] ) . '"' : ''; ?>
    <?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="' . esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
    <div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
        <div class="row align-items-center">
            <div class="col-xl-10 offset-xl-1 ">
                <div class="nav-wrap">

                    <!-- main nav start -->
                    <nav class="top-nav justify-nav-center">
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
                    <?php
                    if ( !empty( $options['header_button']['show_button'] ) && !empty( $options['header_button']['button']['label'] ) ):
                        ?>
                        <span class="text-left">
                               <a href="<?php echo esc_attr( $options['header_button']['button']['link'] ) ?>"
                                  target="<?php echo esc_attr( $options['header_button']['button']['target'] ) ?>"
                                  class="<?php echo esc_attr( $options['header_button']['button']['color'] . ' ' . $options['header_button']['button']['size'] ); ?>"><?php echo esc_html( $options['header_button']['button']['label'] ); ?></a>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- header toggler -->
        <span class="toggle_menu"><span></span></span>
    </div>
</header>
<?php
if ( !empty( $options['header_absolute'] ) ) {
    echo '</div><!--.header_absolute-->';
}?>