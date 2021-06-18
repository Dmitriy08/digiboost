<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var int $form_id
 * @var string $submit_button_text
 * @var array $extra_data
 */
?>
<div class="wrap-forms">
	<div class="row">
		<div class="col-12 col-sm-12  mt-lg-60 mt-30 mb-0">
			<input class="btn btn-outline-maincolor" type="submit" value="<?php echo esc_attr( $submit_button_text ) ?>"/>
			<?php if ( $extra_data['reset_button_text'] ) : ?>
				<input class="btn btn-outline-maincolor" type="reset" value="<?php echo esc_attr( $extra_data['reset_button_text'] ); ?>"/>
			<?php endif; ?>
		</div>
	</div>
</div>