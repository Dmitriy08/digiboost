<?php if (!defined('FW')) {
    die('Forbidden');
}
/**
 * Shortcode Posts - extended item layout
 */
$bg_color = $atts['background_color'];
$content_position = (!empty($atts['media_position'])) ? 'order-xl-1 order-md-1' : '';
$media_position = (!empty($atts['media_position'])) ? 'order-xl-2 order-md-2' : '';
$show_button = (!empty($atts['button']['show_button'])) ? true : false;

while ($posts->have_posts()) : $posts->the_post(); ?>
    <article <?php post_class("side-item content-box-shadow content-padding big-padding content-up"); ?>>
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-5 col-md-6 col-sm-12 <?php echo esc_attr($media_position); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="item-media">
                        <?php the_post_thumbnail('digiboost-rectangle2'); ?>
                        <div class="media-links">
                            <a class="abs-link" href="<?php the_permalink(); ?>"></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-6 col-sm-12 <?php echo esc_attr($content_position) ?>">
                <div class="item-content <?php echo esc_attr($bg_color); ?>">
                    <h4 class="text-capitalize">
                        <span class="big">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </span>
                    </h4>
                    <div class="divider-25 divider-lg-65"></div>
                    <div class="text-block with-border">
                        <?php
                        if (function_exists('digiboost_the_excerpt')) {
                            digiboost_the_excerpt(array(
                                'length' => 65,
                                'before' => '<p>',
                                'after' => '</p>',
                                'more' => '.',
                            ));
                        } else {
                            the_excerpt();
                        }
                        ?>
                    </div>
                    <?php if ($show_button) : ?>
                        <div class="divider-30 divider-lg-70"></div>
                        <a href="<?php the_permalink(); ?>"
                           class="<?php echo esc_attr($atts['button']['button']['color']); ?>"><?php echo esc_html($atts['button']['button']['label']); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </article>
<?php endwhile;