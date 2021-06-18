<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name = $ext_team_settings['taxonomy_name'];

$pID = get_the_ID();
$atts = fw_get_db_post_option($pID);


?>
<div class="vertical-item content-padding padding-small content-up content-box-shadow item-team text-center">
    <?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
            <?php
            $full_image_src = wp_get_attachment_url( get_post_thumbnail_id( $pID ) );
            the_post_thumbnail('digiboost-rectangle');
            ?>
		</div>
    <?php endif; //has_post_thumbnail ?>
	<div class="item-content <?php echo esc_attr($background);?>">
		<h5 class="text-capitalize links-maincolor">
			<a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
			</a>
		</h5>
        <?php if ( ! empty( $atts['position'] ) ) : ?>
			<p class="small-text"><?php echo wp_kses_post( $atts['position'] ); ?></p>
        <?php endif; //position ?>
        <?php if ( ! empty( $atts['social_icons'] ) ) : ?>
            <?php
            //get icons-social shortcode to render icons in team member item
            $shortcodes_extension = fw()->extensions->get( 'shortcodes' );
            if ( ! empty( $shortcodes_extension ) ) {
                echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
            }
            ?>
        <?php endif; //social icons ?>
	</div>
</div>




