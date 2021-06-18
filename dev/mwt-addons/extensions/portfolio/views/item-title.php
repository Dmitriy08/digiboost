<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - title item layout
 */

//wrapping in div for carousel layout
?>

<div class="vertical-item content-padding padding-small content-up content-box-shadow item-team text-center ">
    <div class="item-media">
        <?php
        $full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        the_post_thumbnail($image_size);
        ?>
        <div class="media-links">
            <a class="abs-link" href="<?php the_permalink(); ?>"></a>
        </div>
    </div>
    <?php
    digiboost_the_categories( array(
        'items_separator' => ' ',
    ) );
    ?>
    <div class="item-content <?php echo esc_attr($background);?>">
        <h5 class="text-capitalize links-maincolor">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h5>
    </div>
</div>


