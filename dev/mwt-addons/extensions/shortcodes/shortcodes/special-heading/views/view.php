<?php if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */

if ( !$atts['headings'] ) {
	return;
}

foreach ( $atts['headings'] as $key => $heading ) :
	$class = '';
	//for headings
	if ( $heading['heading_tag'] !== 'p' ) :
		$class .= 'special-heading';
	else:
		$class .= 'special-heading';
	endif;
	
	//for counter
	if ( 'counter' === $heading['heading_type']['type'] ){
		$class_counter = 'counter';
		$class .= ' counter-heading';
	}else{
		$class_counter ='';
	}
	

	
	$icon_array = digiboost_get_unyson_icon_type_v2_array_for_special_heading( $atts, $key );
	$heading_align = ( !empty( $atts['heading_align'] ) ) ? $atts['heading_align'] : '';
	?>
	<<?php echo esc_html( $heading['heading_tag'] ); ?> class="<?php echo esc_attr( $class . ' ' . $heading_align ); ?>">
	<?php if ( !empty( $icon_array ) ) :
	echo wp_kses_post( $icon_array['icon_html'] );
endif; ?>
	<span class="<?php echo esc_attr( trim( $heading['heading_text_color'] . ' ' . $heading['heading_text_transform'] . ' ' . $heading['heading_text_size'] . ' ' . $class_counter ) );
	?>"
		<?php if ( 'counter' === $heading['heading_type']['type'] ):?>
		   data-from="0"
		  data-to="<?php echo esc_attr( $heading['heading_type']['counter']['count'] ); ?>"
		  data-speed="1500">
		<?php endif; ?>
	
	>
		<?php if ( 'counter' === $heading['heading_type']['type'] ){
			echo esc_html( $heading['heading_type']['counter']['count'] );
		}else{
			echo wp_kses_post( $heading['heading_type']['default']['heading_text'] );
		}
		?>
	</span>
	<?php if ( 'counter' === $heading['heading_type']['type'] && !empty($heading['heading_type']['counter']['coefficient']) ):
		echo '<span class="'.esc_attr( trim( $heading['heading_text_color'] . ' ' . $heading['heading_text_transform'] . ' ' . $heading['heading_text_size'] ) ).'">'.$heading['heading_type']['counter']['coefficient'].'</span>';
	endif; ?>

	</<?php echo esc_html( $heading['heading_tag'] ); ?>>
<?php endforeach; ?>