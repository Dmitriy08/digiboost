<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$row_class = ( $row_class = fw_ext( 'builder' )->get_config( 'grid.row.class' ) ) ? $row_class : 'row';
?>
<div class="<?php echo esc_attr( $row_class ); ?> sdasdas">
	<?php echo do_shortcode( $content ); ?>
</div>

