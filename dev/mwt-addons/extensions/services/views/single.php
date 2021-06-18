<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying single service
 *
 */

get_header();
$pID = get_the_ID();

//no columns on single service page
$column_classes = fw_ext_extension_get_columns_classes();
$atts = fw_get_db_post_option(get_the_ID());
//getting taxonomy name
$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

?>
    <section class="ls s-py-xl-150 s-py-lg-130 s-py-md-90 s-py-60 c-gutter-60">
        <div class="container">
            <div class="row">
                <div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
                    <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>">
                            <div class="vertical-item text-center text-sm-left box-shadow content-padding">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="item-media">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="item-content">
                                    <?php the_content();
                                    if(!empty($atts['features'])){
                                        foreach ($atts['features'] as $feature){
                                            digiboost_shortcode_render( 'progress_bar',  $feature  );
                                        }
                                    }

                                    if(!empty($atts['about'])){
                                        echo wp_kses_post($atts['about']);
                                    }
                                    ?>
                                </div>
                            </div>
                        </article><!-- #post-## -->
                    <?php endwhile; ?>
                </div><!--eof #content -->
                <?php if ( $column_classes['sidebar_class'] ): ?>
                    <!-- main aside sidebar -->
                    <aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
                        <?php get_sidebar(); ?>
                    </aside>
                    <!-- eof main aside sidebar -->
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php
get_footer();