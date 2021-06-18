<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//custom template parts

	//header
$headers_array = array();
$current_header_customizer = digiboost_get_option('page_header', '1' );
//first element - inherit from customizer
$headers_array[0] = esc_html__( 'Default - Global Header from customizer', 'digiboost' );
$headers_default_array = digiboost_get_predefined_headers_array();
//pushing all default headers
foreach( $headers_default_array as $key => $value ) {
	$headers_array[ $key ] = $value;
}

	//footer
$footers_array = array();
$current_footer_customizer = digiboost_get_option('page_footer', '1' );
//first element - inherit from customizer
$footers_array[0] = esc_html__( 'Default - Global Footer from customizer', 'digiboost' );
$footers_default_array = digiboost_get_predefined_footers_array();
//pushing all default footers
foreach( $footers_default_array as $key => $value ) {
	$footers_array[ $key ] = $value;
}

$options_class = new Digiboost_Options();
$defaults = $options_class->get_default_options_array();
$page_header_options = digiboost_get_header_options_array_for_customizer_and_page( $defaults );
$page_footer_options = digiboost_get_footer_options_array_for_customizer_and_page( $defaults );
//page header layout is separate option - unset it
unset( $page_header_options['header_layout']['options']['page_header'] );

//page footer layout is separate option - unset it
unset( $page_footer_options['footer_layout'] );

$options = array(
	'page-options-section' => array(
		'title'   => esc_html__( 'Featured Additional Options', 'digiboost' ),
		'type'    => 'box',
		'context' => 'normal',
		'options' => array(
			'hide_title' => array(
				'type'  => 'switch',
				'value' => false,
				'label' => esc_html__('Hide Title section', 'digiboost'),
				'desc'  => esc_html__('You can hide title section with breadcrumbs', 'digiboost'),
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('Show', 'digiboost'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('Hide', 'digiboost'),
				),
			),
			'header' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Override Default Header', 'digiboost' ),
				'desc'    => esc_html__( 'Select one of predefined theme headers for this page', 'digiboost' ),
				'help'    => esc_html__( 'You can override chosen header from customizer here', 'digiboost' ),
				'choices' => $headers_array,
				'blank'   => false, // (optional) if true, image can be deselected
			),
			'header_page' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'header_page_styles' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => esc_html__( 'Custom header options', 'digiboost' ),
						'desc'         => esc_html__( 'Enable custom header layout styles for page', 'digiboost' ),
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__( 'Disabled', 'digiboost' ),
						),
						'right-choice' => array(
							'value' => 'header_page_custom_styles',
							'label' => esc_html__( 'Enabled', 'digiboost' ),
						),
					),
				),
				'choices' => array(
					//adding 'header_absolute' option
					'header_page_custom_styles' => $page_header_options
				),
			),
			'footer' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Override Default Footer', 'digiboost' ),
				'desc'    => esc_html__( 'Select one of predefined theme footers for this page', 'digiboost' ),
				'help'    => esc_html__( 'You can override chosen footer from customizer here', 'digiboost' ),
				'choices' => $footers_array,
				'blank'   => false, // (optional) if true, image can be deselected
			),
			'footer_page' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'footer_page_styles' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => esc_html__( 'Custom footer options', 'digiboost' ),
						'desc'         => esc_html__( 'Enable custom footer layout styles for page', 'digiboost' ),
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__( 'Disabled', 'digiboost' ),
						),
						'right-choice' => array(
							'value' => 'footer_page_custom_styles',
							'label' => esc_html__( 'Enabled', 'digiboost' ),
						),
					),
				),
				'choices' => array(
					'footer_page_custom_styles' => $page_footer_options
				),
			),
		),
	),
);
//page slider
$slider_extension = fw()->extensions->get( 'slider' );
//returning if no slider - only options for page is slider options
if ( empty ( $slider_extension ) ) {
	return;
}

$choices = '';
if ( ! empty ( $slider_extension ) ) {
	$choices = $slider_extension->get_populated_sliders_choices();
}

if ( ! empty( $choices ) ) {
	//adding empty value to disable slider
	$choices_no_slider = array( 0 => esc_html__( 'No Slider', 'digiboost' ) );

	array_push( $options['page-options-section']['options'], array(
			'slider_id' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Select Slider', 'digiboost' ),
				'choices' => $choices_no_slider + $choices
			),
		)
	);
} else {
	array_push( $options['page-options-section']['options'], array(
			'slider_id' => array( // make sure it exists to prevent notices when try to get ['slider_id'] somewhere in the code
				'type' => 'hidden',
			),
			'no-forms'  => array(
				'type'  => 'html-full',
				'label' => false,
				'desc'  => false,
				'html'  =>
					'<div>' .
					'<h1 style="font-weight:100; text-align:center;">' . esc_html__( 'No Sliders Available', 'digiboost' ) . '</h1>' .
					'<p style="text-align:center">' .
					'<em>' .
					str_replace(
						array(
							'{br}',
							'{add_slider_link}'
						),
						array(
							'<br/>',
							fw_html_tag( 'a', array(
								'href'   => admin_url( 'post-new.php?post_type=' . fw()->extensions->get( 'slider' )->get_post_type() ),
								'target' => '_blank',
							), esc_html__( 'create a new Slider', 'digiboost' ) )
						),
						esc_html__( 'No Sliders created yet. Please go to the {br}Sliders page and {add_slider_link}.', 'digiboost' )
					) .
					'</em>' .
					'</p>' .
					'</div>'
			)
		)
	);
}
