<?php if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}
/**
 * Widget Posts - title item layout
 */

//wrapping in div for carousel layout
?>
<div class="vertical-item gallery-title-item">
    <?php if (get_the_post_thumbnail()) : ?>
		<div class="item-media">
            <?php
            $full_image_src = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            the_post_thumbnail('digiboost-rectangle2');
            ?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
    <?php endif; //eof thumbnail check ?>
</div>
<div class="item-title">
	<h6>
		<a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
		</a>
	</h6>
	<div class="item-meta">
		<span class="date">
			<i class="fa fa-clock-o" aria-hidden="true"></i>
			<?php echo get_the_date(); ?>
		</span>
	</div>

</div><!-- eof vertical-item -->
