<?php if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

global $wp_embed;
$unique_id = uniqid();


$link = $atts['media_link'];
$video_side = $atts['media_video'];
$video_frame = $video_side ? wp_oembed_get( $video_side ) : false;
$video_type = ( !empty( $atts['video_type'] ) ) ? $atts['video_type'] : '';
$bg_image = ( !empty( $atts['image'] ) ) ? $atts['image'] : '';
switch ( $video_type ):
	case 'default':
		?>
		<div class="video-shortcode static">
			<div class="embed-responsive embed-responsive-3by2">
				<a href="<?php echo esc_url( $link ); ?>" <?php echo ( !empty( $video_frame ) ) ? ' class="embed-placeholder" data-iframe="' . esc_attr( $video_frame ) . '"' : '' ?>>
					<img src="<?php echo esc_url($atts['image']['url'])?>" alt="<?php echo esc_attr($atts['image']['attachment_id'])?>">
				</a>
			</div>
		</div>
	<?php
		break;
	case 'popup':
		?>
		<div class="video-shortcode">
			<img src="<?php echo esc_url($atts['image']['url'])?>" alt="<?php echo esc_attr($atts['image']['attachment_id'])?>">
			<a href="<?php echo esc_url( $link ); ?>" <?php echo ( !empty( $video_frame ) ) ? ' class="photoswipe-link" data-iframe="' . esc_attr( $video_frame ) . '"' : '' ?>><i class="fa fa-play" aria-hidden="true"></i></a>
		</div>
		<?php
		break;
endswitch;
?>
