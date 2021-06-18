<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<ul class="list-bordered no-top-border no-bottom-border">
	<?php foreach ( $atts['icons'] as $icon ): ?>
		<li>
			<?php
			//get teaser shortcode to render teasers inside a row
			echo fw_ext( 'shortcodes' )->get_shortcode( 'icon' )->render( $icon );
			?>
		</li>
	<?php endforeach; ?>
</ul>