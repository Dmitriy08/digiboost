<?php if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

/**
 * @var array $atts
 */
?>
<div class="text-block <?php echo esc_attr($atts['with_border']);?>">
    <?php echo do_shortcode( $atts['text'] ); ?>
</div>
