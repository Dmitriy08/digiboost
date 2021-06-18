<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/** Responsive Visibility **/
$extra_class = digiboost_unyson_options_get_responsive_css_classes( $atts );

if ( 'line' === $atts['style']['ruler_type'] ): ?>
	<div class="fw-divider-line <?php echo esc_attr( $extra_class ); ?>"><hr/></div>
<?php endif;

if ( 'word' === $atts['style']['ruler_type'] ): ?>
	<span class="fw-divider-word <?php echo esc_attr( $extra_class ); ?>"><?php echo esc_html($atts['style']['word']['text'])?></span>
<?php endif;

	if ( 'line_styled' === $atts['style']['ruler_type'] ): ?>
	<div class="fw-divider-line-styled  <?php echo esc_attr( $extra_class.' '.$atts['style']['line_styled']['background_color'].' '.$atts['style']['line_styled']['position'] ); ?>"></div>
<?php endif; ?>

<?php if ( 'space' === $atts['style']['ruler_type'] ): ?>
	<div class="fw-divider-space <?php echo esc_attr( $extra_class ); ?>" style="margin-top: <?php echo (int) $atts['style']['space']['height']; ?>px;"></div>
<?php endif; ?>