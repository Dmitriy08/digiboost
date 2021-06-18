<?php if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$id = uniqid( 'testimonials-' );

?>

<?php

$loop = $atts['loop'];
$nav = $atts['nav'];
$nav_position = $atts['nav_position'];
$dots = $atts['dots'];
$center = $atts['center'];
$autoplay = $atts['autoplay'];
$responsive_xl = $atts['responsive_xl'];
$responsive_lg = $atts['responsive_lg'];
$responsive_md = $atts['responsive_md'];
$responsive_sm = $atts['responsive_sm'];
$responsive_xs = $atts['responsive_xs'];
$margin = $atts['margin'];
$background = ( !empty( $atts['background_color'] ) ) ? $atts['background_color'] : '';
$shadow = ( !empty( $atts['shadow'] ) ) ? $atts['shadow'] : '';

?>

<div class="shortcode-quote owl-shadowitems owl-carousel <?php echo esc_attr($nav_position)?>"
     data-loop="<?php echo esc_attr( $loop ); ?>"
     data-nav="<?php echo esc_attr( $nav ); ?>"
     data-dots="<?php echo esc_attr( $dots ); ?>"
     data-center="<?php echo esc_attr( $center ); ?>"
     data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
     data-speed="<?php digiboost_slide_speed(); ?>"
     data-responsive-xl="<?php echo esc_attr( $responsive_xl ); ?>"
     data-responsive-lg="<?php echo esc_attr( $responsive_lg ); ?>"
     data-responsive-md="<?php echo esc_attr( $responsive_md ); ?>"
     data-responsive-sm="<?php echo esc_attr( $responsive_sm ); ?>"
     data-responsive-xs="<?php echo esc_attr( $responsive_xs ); ?>"
     data-margin="<?php echo esc_attr( $margin ); ?>"
>
    <?php
    foreach ( $atts['testimonials'] as $testimonial ):
		$img = ( !empty( $testimonial['author_avatar'] ) ) ? $testimonial['author_avatar']['url'] : '';
		$name = ( !empty( $testimonial['author_name'] ) ) ? $testimonial['author_name'] : '';
		$position = ( !empty( $testimonial['author_position'] ) ) ? $testimonial['author_position'] : '';
		$content = ( !empty( $testimonial['author_content'] ) ) ? $testimonial['author_content'] : '';
	    ?>
    <div class="quote-item <?php echo esc_attr($background.' '.$shadow)?>">
	    <div class="quote-image">
		    <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $name ); ?>">
	    </div>
	    <div class="quote-content">
		    <p>
			   <?php echo esc_html($content); ?>
		    </p>
		    <h5 class="color-main text-capitalize">
			    <?php echo esc_html($name); ?>
		    </h5>
		    <span class="small-text">
			    <?php echo esc_html($position)?>
		    </span>
	    </div>
    </div>
  <?php  endforeach; ?>
</div> <!-- .testimonials-slider.owl-carousel -->
