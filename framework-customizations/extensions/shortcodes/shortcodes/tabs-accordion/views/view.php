<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<div class="bootstrap-tabs tabs-accardion <?php echo esc_attr( $atts['small_tabs'] ); ?>">

	<ul class="nav nav-tabs" role="tablist">
		<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
			<li class="nav-item">
				<a
					id="tab_link-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>"
					class="nav-link<?php echo ( 0 === $index ) ? ' active' : '' ?>"
					href="#tab-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>"
					role="tab"
					data-toggle="tab"
					aria-controls="tab-<?php echo esc_attr( $atts['id'] . '-' . $index ); ?>"
					aria-expanded="<?php echo( 0 === $index ) ? 'true' : 'false' ?>"
				>
					<div class="media">
						<?php
						$icon_array = digiboost_get_unyson_icon_type_v2_array( $tab, 'icon' );
						$icon_styled_class = digiboost_get_unyson_icon_styled_class( $tab );

						?>
						<div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
							<?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
						</div>

						<div class="media-body">
							<h6>
								<?php echo esc_html( $tab['tab_title'] ); ?>
							</h6>
							<p>
								<?php echo esc_html( $tab['tab_description'] ); ?>
							</p>
						</div>
					</div>

				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<div class="tab-content border-none p-0">
		<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
			<div class="tab-pane fade <?php echo ( 0 === $index ) ? 'show active' : '' ?>"
			 	id="tab-<?php echo esc_attr( $atts['id'] . '-' . $index ); ?>"
				role="tabpanel"
				aria-labelledby="tab_link-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>"
			>
				<?php
					echo fw_ext( 'shortcodes' )->get_shortcode( 'accordion' )->render( $tab );
				?>
			</div><!-- .eof tab-pane -->
		<?php endforeach; ?>
	</div>
</div>