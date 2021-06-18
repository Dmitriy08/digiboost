<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts The shortcode attributes
 */

$icon_array = digiboost_get_unyson_icon_type_v2_array( $atts, 'icon' );
$icon_styled_class = digiboost_get_unyson_icon_styled_class( $atts );



switch ( $atts['layout'] ) :
	case '2':
?>
<div class="pricing-plan box-shadow <?php echo esc_attr( $atts['featured'] ); ?>">
    <div class="plan-header">
        <?php if( ! empty( $atts['icon'] ) ) : ?>
			<div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
				<?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
			</div>
        <?php endif; ?>
    </div>
	<?php if( ! empty( $atts['title'] ) ) : ?>
		<div class="plan-title">
			<p>
				<?php echo wp_kses_post( $atts['title'] ); ?>
			</p>
		</div>
	<?php endif; ?>
	<div class="price-wrap bg-maincolor color-darkgrey">
		<?php if( ! empty( $atts['currency'] ) ) : ?>
			<span class="plan-sign"><?php echo wp_kses_post( $atts['currency'] ); ?></span>
		<?php endif; ?>
		<?php if( ! empty( $atts['price'] ) ) : ?>
			<span class="plan-price"><?php echo wp_kses_post( $atts['price'] ); ?></span>
		<?php endif; ?>
		<?php if( ! empty( $atts['price_after'] ) ) : ?>
			<span class="plan-decimals"><?php echo wp_kses_post( $atts['price_after'] ); ?></span>
		<?php endif; ?>
	</div>
	<?php if( ! empty( $atts['features'] ) ) : ?>
		<div class="plan-features">
			<ul class="list-styled">
				<?php foreach( ( $atts['features'] ) as $feature ) : ?>
					<li class="<?php echo esc_attr( $feature['feature_checked'] ); ?>">
						<?php echo wp_kses_post( $feature['feature_name'] ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
	<div class="plan-button">
		<a href="<?php echo esc_attr( $atts['link'] ) ?>"
		   target="<?php echo esc_attr( $atts['target'] ) ?>"
		   class="<?php echo esc_attr( $atts['color']. ' ' . $atts['size'] ); ?>"><?php echo esc_html( $atts['label'] );?></a>
	</div>
</div>
<?php
	//2
	break;
	case '3':
?>
<div class="pricing-plan box-shadow <?php echo esc_attr( $atts['featured'] ); ?>">
    <div class="plan-header bg-maincolor">
		<?php if( ! empty( $atts['icon'] ) ) : ?>
			<div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
				<?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
			</div>
		<?php endif; ?>
    </div>
	<?php if( ! empty( $atts['title'] ) ) : ?>
		<div class="plan-title">
			<p>
				<?php echo wp_kses_post( $atts['title'] ); ?>
			</p>
		</div>
	<?php endif; ?>
	<div class="price-wrap color-darkgrey">
        <?php if( ! empty( $atts['currency'] ) ) : ?>
            <span class="plan-sign"><?php echo wp_kses_post( $atts['currency'] ); ?></span>
        <?php endif; ?>
        <?php if( ! empty( $atts['price'] ) ) : ?>
            <span class="plan-price"><?php echo wp_kses_post( $atts['price'] ); ?></span>
        <?php endif; ?>
        <?php if( ! empty( $atts['price_after'] ) ) : ?>
            <span class="plan-decimals"><?php echo wp_kses_post( $atts['price_after'] ); ?></span>
        <?php endif; ?>
	</div>
	<?php if( ! empty( $atts['features'] ) ) : ?>
		<div class="plan-features">
			<ul class="list-styled">
				<?php foreach( ( $atts['features'] ) as $feature ) : ?>
					<li class="<?php echo esc_attr( $feature['feature_checked'] ); ?>">
						<?php echo wp_kses_post( $feature['feature_name'] ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
	<div class="plan-button">
		<a href="<?php echo esc_attr( $atts['link'] ) ?>"
		   target="<?php echo esc_attr( $atts['target'] ) ?>"
		   class="<?php echo esc_attr( $atts['color']. ' ' . $atts['size'] ); ?>"><?php echo esc_html( $atts['label'] );?></a>
	</div>
</div>
<?php
	//3
	break;
	default:
?>
<div class="pricing-plan box-shadow <?php echo esc_attr( $atts['featured'] ); ?>">
    <div class="plan-header">
		<?php if( ! empty( $atts['icon'] ) ) : ?>
			<div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
				<?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
			</div>
		<?php endif; ?>
    </div>
	<?php if( ! empty( $atts['title'] ) ) : ?>
		<div class="plan-title">
			<p>
				<?php echo wp_kses_post( $atts['title'] ); ?>
			</p>
		</div>
	<?php endif; ?>
	<div class="price-wrap color-darkgrey">
        <?php if( ! empty( $atts['currency'] ) ) : ?>
            <span class="plan-sign"><?php echo wp_kses_post( $atts['currency'] ); ?></span>
        <?php endif; ?>
        <?php if( ! empty( $atts['price'] ) ) : ?>
            <span class="plan-price"><?php echo wp_kses_post( $atts['price'] ); ?></span>
        <?php endif; ?>
        <?php if( ! empty( $atts['price_after'] ) ) : ?>
            <span class="plan-decimals"><?php echo wp_kses_post( $atts['price_after'] ); ?></span>
        <?php endif; ?>
	</div>
	<?php if( ! empty( $atts['features'] ) ) : ?>
		<div class="plan-features">
			<ul class="list-styled">
				<?php foreach( ( $atts['features'] ) as $feature ) : ?>
					<li class="<?php echo esc_attr( $feature['feature_checked'] ); ?>">
						<?php echo wp_kses_post( $feature['feature_name'] ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
	<div class="plan-button">
		<a href="<?php echo esc_attr( $atts['link'] ) ?>"
		   target="<?php echo esc_attr( $atts['target'] ) ?>"
		   class="<?php echo esc_attr( $atts['color']. ' ' . $atts['size'] ); ?>"><?php echo esc_html( $atts['label'] );?></a>
	</div>
</div>
<?php endswitch;