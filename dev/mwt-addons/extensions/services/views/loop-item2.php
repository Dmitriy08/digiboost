<?php if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

$icon_array = fw_ext_services_get_icon_array();

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

<div class="icon-box <?php echo esc_attr( $text_align.' '.$background ); ?>  box-shadow">
	<a href="<?php the_permalink(); ?>">
		<div class="icon-styled fs-52">
			<?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
		</div>
	</a>
	<h5 class="text-uppercase">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h5>
	<?php
	if($show_excerpt) :
		if ( function_exists( 'digiboost_the_excerpt' ) ) {
			digiboost_the_excerpt( array(
				'length' => 9,
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
			   class="<?php echo esc_attr( $atts['button']['button']['color'].' '.$atts['button']['button']['size'] ); ?>"><?php echo esc_html( $atts['button']['button']['label'] ); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
		</div>
	<?php endif; ?>
</div>




