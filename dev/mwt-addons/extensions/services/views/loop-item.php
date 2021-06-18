<?php if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

if ( isset( $atts ) ) {
    $background = ( !empty( $atts['background_color'] ) ) ? $atts['background_color'] : '';
    $show_button = ( !empty( $atts['button']['show_button'] ) && !empty( $atts['button']['button']['label'] ) ) ? true : false;
    $show_excerpt = ( !empty($atts['show_excerpt'] ) ) ? true : false;
    $text_align = ( !empty( $atts['align'] ) ) ? $atts['align'] : '';
} else {
    $show_button = '';
    $show_excerpt = true;
    $background = 'ls';
    $text_align= 'text-center';
}

?>
<div class="vertical-item content-padding padding-small content-up content-box-shadow item-service <?php echo esc_attr( $text_align ); ?>">
    <?php if (has_post_thumbnail()) : ?>
        <div class="item-media">
            <?php the_post_thumbnail('digiboost-small-width'); ?>
            <div class="media-links">
                <a class="abs-link" href="<?php the_permalink(); ?>"></a>
            </div>
        </div>
    <?php endif; ?>
    <div class="item-content <?php echo esc_attr( $background ); ?>">
        <h5 class="text-capitalize">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h5>
        <?php
        if($show_excerpt) :
        if ( function_exists( 'digiboost_the_excerpt' ) ) {
            digiboost_the_excerpt( array(
                'length' => 15,
                'before' => '<p>',
                'after' => '</p>',
                'more' => '.',
            ) );
        } else {
            the_excerpt();
        }
        endif;
        ?>

        <?php if ( $show_button ) : ?>
            <div class="btn-service">
                <a href="<?php the_permalink(); ?>"
                   class="<?php echo esc_attr( $atts['button']['button']['color'].' '.$atts['button']['button']['size'] ); ?>"><?php echo esc_html( $atts['button']['button']['label'] ); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>



