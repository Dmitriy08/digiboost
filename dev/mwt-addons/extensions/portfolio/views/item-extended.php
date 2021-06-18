<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Portfolio - extended item layout
 */

//wrapping in div for carousel layout
?>



<div class="vertical-item content-padding padding-small content-up content-box-shadow item-team text-center">
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
    <div class="item-content <?php echo esc_attr($background);?>">
        <h5 class="text-capitalize links-maincolor">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h5>
        <?php
        digiboost_the_excerpt( array(
            'length' => 15,
            'before' => '<p>',
            'after'  => '</p>',
            'more'  => '',
        ) );
        ?>
    </div>
</div>