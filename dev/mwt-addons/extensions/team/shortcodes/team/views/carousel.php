<?php if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */

$unique_id = uniqid();

$categories = fw_ext_extension_get_listing_categories( $atts['cat'], 'team' );
$sort_classes = fw_ext_extension_get_sort_classes( $posts->posts, $categories, '', 'team' );
$background = ( !empty( $atts['background_color'] ) ) ? $atts['background_color'] : '';

$loop = $atts['layout']['carousel']['loop'];
$nav = $atts['layout']['carousel']['nav'];
$nav_position = $atts['layout']['carousel']['nav_position'];
$dots = $atts['layout']['carousel']['dots'];
$center = $atts['layout']['carousel']['center'];
$autoplay = $atts['layout']['carousel']['autoplay'];
$responsive_xl = $atts['layout']['carousel']['responsive_xl'];
$responsive_lg = $atts['layout']['carousel']['responsive_lg'];
$responsive_md = $atts['layout']['carousel']['responsive_md'];
$responsive_sm = $atts['layout']['carousel']['responsive_sm'];
$responsive_xs = $atts['layout']['carousel']['responsive_xs'];
$margin = $atts['layout']['carousel']['margin'];

if ( $atts['show_filters'] ) : ?>
    <div class="filters carousel_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
        <a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'mwt' ); ?></a>
        <?php
        foreach ( $categories as $category ) {
            ?>
            <a href="#"
               data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
            <?php
        } //foreach
        ?>
    </div>
<?php
endif; //showfilters check
?>
<div class="owl-carousel owl-shadowitems shortcode-team <?php echo esc_attr($nav_position)?>"
     data-loop="<?php echo esc_attr( $loop ); ?>"
     data-nav="<?php echo esc_attr( $nav ); ?>"
     data-dots="<?php echo esc_attr( $dots ); ?>"
     data-center="<?php echo esc_attr( $center ); ?>"
     data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
     data-speed="<?php digiboost_slide_speed(); ?>"
     data-responsive-xl="<?php echo esc_attr( $responsive_xl ); ?>"
     data-responsive-lg="<?php echo esc_attr( $responsive_lg ); ?>"
     data-responsive-md="<?php echo esc_attr( $responsive_md ); ?>"
     data-responsive-sm="<?php echo esc_attr( $responsive_sm ); ?>"
     data-responsive-xs="<?php echo esc_attr( $responsive_xs ); ?>"
     data-margin="<?php echo esc_attr( $margin ); ?>"
    <?php if ( $atts['show_filters'] ) : ?>
        data-filters=".carousel_filters-<?php echo esc_attr( $unique_id ); ?>"
    <?php endif; // filters ?>
>
    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
        <div class="owl-carousel-item <?php echo esc_attr( $sort_classes[ get_the_ID() ] ); ?>">
            <?php
            include( fw()->extensions->get( 'team' )->locate_view_path( 'loop-item' ) );
            ?>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); // reset the query ?>
</div>