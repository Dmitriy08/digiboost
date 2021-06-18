<?php if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

/**
 * Shortcode Product - extended item layout
 */

$show_button = ( !empty( $atts['button']['show_button'] ) && !empty( $atts['button']['button']['label'] ) ) ? true : false;
$icon = ( !empty( $atts['button']['button']['icon'] ) ) ? '<i class="' . esc_attr( $atts['button']['button']['icon'] ) . '"></i>' : '';

$price = get_post_meta( get_the_ID(), '_price' );
$simbol = get_woocommerce_currency_symbol();
$content = get_the_content();
$trimmed_content = wp_trim_words( $content, 20, '' );

?>


<div class=" side-item no-content-padding">
	<div class="row align-center text-center text-sm-left">
		<div class="col-xs-12  col-lg-5 col-xl-7">
			<div class="item-media">
				<?php
				the_post_thumbnail('digiboost-rectangle-horizontal');
				?>
			</div>
		</div>
	   <div class="col-xs-12  col-lg-7 col-xl-5">
		   <div class="item-content">
			   <h3 class="links-maincolor">
				   <a href="<?php the_permalink(); ?>">
					   <?php the_title(); ?>
				   </a>
			   </h3>
			   <div class="text-block with-border">
				   <?php
				   echo esc_html($trimmed_content);
				   ?>
			   </div>
			   <div class="product-features">
				   <?php
				   $prices_sale = get_post_meta( get_the_ID(), '_sale_price' );
				   $prices_regular = get_post_meta( get_the_ID(), '_regular_price' );
				   if(!empty($prices_sale)){
					   $add_class= 'with-sale-price';
				   }else{
					   $add_class= '';
				   }
				   ?>
				   <span class="price <?php echo esc_attr($add_class);?>">
	                <?php
	
					if ( !empty ( $prices_regular ) ) {
						foreach ( $prices_regular as $price_regular ) :
							echo '<span class="price-regular">'.esc_html($simbol.$price_regular).'</span>';
						endforeach;
					}
	
	
					if ( !empty ( $prices_sale ) ) {
						foreach ( $prices_sale as $price_sale ) :
							echo '<span class="divider-price">-</span><span class="price-sale">'.esc_html($simbol.$price_sale).'</span>';
						endforeach;
					}
					?>
	            </span>
			   </div>
			   <?php if ( $show_button ) : ?>
				   <a href="<?php the_permalink(); ?>"
				      class="<?php echo esc_attr( $atts['button']['button']['color'] . ' ' . $atts['button']['button']['size'] ); ?>"><?php echo esc_html( $atts['button']['button']['label'] ); echo wp_kses_post($icon);?></a>
			   <?php endif; ?>
		   </div>
	   </div>
	</div>
</div>
