<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - regular item layout
 */
?>
<div class="vertical-item item-gallery content-absolute content-show-hover text-center text-center cs">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="item-media">
            <?php
            $full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
            the_post_thumbnail('digiboost-small-width');
            ?>
        </div>
    <?php endif; //has_post_thumbnail ?>
    <div class="item-content ">
        <div class="links-wrap">
            <a class="link-anchor" href="<?php the_permalink(); ?>"></a>
        </div>
    </div>
</div>