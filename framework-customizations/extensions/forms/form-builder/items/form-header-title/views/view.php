<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $title
 * @var string $subtitle
 */

if ( empty( $title ) ) {
	return;
}
?>
<div class="col-12 form-title text-center text-sm-left form-builder-item">

		<h4><span class="big"><?php echo wp_kses_post( $title ); ?></span></h4>
		<?php if ( ! empty( $subtitle ) ) : ?>
			<p><?php echo wp_kses_post( $subtitle ); ?></p>
		<?php endif ?>

</div>