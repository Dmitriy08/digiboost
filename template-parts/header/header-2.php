<?php
/**
 * The template part for selected header
 */

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$options = digiboost_get_options();
$section = digiboost_get_section_options( $options, 'header_' );

//get topline
get_template_part( 'template-parts/topline/topline-1' );
?>

<?php
//header_absolute wrapper
if ( !empty( $options['header_absolute'] ) ) : ?>
    <div class="header_absolute"><!-- .header_absolute open -->
<?php endif; //header_absolute?>
<header class="page_header header-1 justify-nav-end <?php echo esc_attr( $section['section_class'] ); ?>"
    <?php echo ( !empty( $section['section_id'] ) ) ? 'id="' . esc_attr( $section['section_id'] ) . '"' : ''; ?>
    <?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="' . esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
    <div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
        <div class="row align-items-center">
            <div class="col-xl-3 col-8">
                <?php get_template_part( 'template-parts/logo/header-logo' ); ?>
            </div>
            <div class="col-xl-9 col-4">
                <!-- main nav start -->
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