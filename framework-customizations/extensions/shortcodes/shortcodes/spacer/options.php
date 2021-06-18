<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//$dividers-height: 0 10 20 25 30 40 50 60 70 80 90 100 120; - _variables_template.scss
$dividers_height = array( '0', '10', '20', '25', '30', '35', '40', '45', '50', '55', '60', '65', '70', '80', '85', '90', '100', '110', '115', '120', '125', '130' ,'140', '145', '150' );
//
//sm: 576px,
//md: 768px,
//lg: 992px,
//xl: 1200px
//
$breakpoints = array( 'sm', 'md', 'lg', 'xl', 'xxl' );

$choices = array( '' => '-' );
foreach ( $dividers_height as $height ) {
	$choices[$height] = $height . esc_html__( 'px', 'digiboost' );
}

$height_options = array(
	'all' => array(
		'type' => 'select',
		'value' => '',
		'label' => esc_html__( 'Height', 'digiboost' ),
		'choices' => $choices,
	)
);

foreach ( $breakpoints as $breakpoint) {
	$choices = array( '' => '-' );
	foreach ( $dividers_height as $height ) {
		$choices[$height] = $height . esc_html__( 'px', 'digiboost' );
	}
	$height_options[$breakpoint] = array(
		'type' => 'select',
		'value' => '',
		'label' => esc_html__( 'Height on ', 'digiboost' ) . strtoupper( $breakpoint ) . esc_html__( ' screens', 'digiboost' ),
		'choices' => $choices,
	);
}

$options = array_merge( array(
	'unique_id' => array(
		'type' => 'unique',
		'length' => 7
	),
), $height_options );
