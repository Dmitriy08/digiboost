<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 *  Portfolio - regular item layout
 */

?>


<div class="vertical-item item-gallery content-absolute vertical-center content-show-hover <?php echo esc_attr($background);?>">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="item-media">
            <?php
            $full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
            the_post_thumbnail($image_size);
            ?>
            <div class="media-links">
                <a class="abs-link" href="<?php the_permalink(); ?>"></a>
            </div>
        </div>
    <?php endif; //has_post_thumbnail ?>
    <div class="item-content ">
        <div class="links-wrap">
            <a class="link-anchor" href="<?php the_permalink(); ?>"></a>
        </div>
    </div>
</div>