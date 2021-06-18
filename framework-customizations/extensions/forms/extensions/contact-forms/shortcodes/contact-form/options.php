<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type' => 'unique',
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'digiboost' ),
				'options' => array(
					'form' => array(
						'label'        => false,
						'type'         => 'form-builder',
						'value'        => array(
							'json' => apply_filters( 'fw:ext:forms:builder:load-item:form-header-title', true )
								? json_encode( array(
									array(
										'type'      => 'form-header-title',
										'shortcode' => 'form_header_title',
										'width'     => '',
										'options'   => array(
											'title'    => '',
											'subtitle' => '',
										)
									)
								) )
								: '[]'
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'digiboost' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Contact Form Options', 'digiboost' ),
						'type'    => 'tab',
						'options' => array(
							'background_color'    => array(
								'type'    => 'select',
								'value'   => 'ls',
								'label'   => esc_html__( 'Form Background color', 'digiboost' ),
								'desc'    => esc_html__( 'Select background color', 'digiboost' ),
								'help'    => esc_html__( 'Select one of predefined background colors', 'digiboost' ),
								'choices' => array(
									''                              => esc_html__( 'No background', 'digiboost' ),
									'px-lg-70 py-lg-100 px-20 py-60 muted-bg' => esc_html__( 'Muted', 'digiboost' ),
									'px-lg-70 py-lg-100 px-20 py-60 bordered'      => esc_html__( 'With Border', 'digiboost' ),
									'px-lg-70 py-lg-100 px-20 py-60 ls'               => esc_html__( 'Light', 'digiboost' ),
									'px-lg-70 py-lg-100 px-20 py-60 ls ms'            => esc_html__( 'Light Grey', 'digiboost' ),
									'px-lg-70 py-lg-100 px-20 py-60 ds'               => esc_html__( 'Dark Grey', 'digiboost' ),
									'px-lg-70 py-lg-100 px-20 py-60 ds ms'            => esc_html__( 'Dark', 'digiboost' ),
									'px-lg-70 py-lg-100 px-20 py-60 cs'               => esc_html__( 'Main color', 'digiboost' ),
									'px-lg-70 py-lg-100 px-20 py-60 cs cs2'   => esc_html__( 'Second Main color', 'digiboost' ),
								),
							),
							'columns_padding'     => array(
								'type'    => 'select',
								'value'   => 'c-gutter-30',
								'label'   => esc_html__( 'Columns gutter', 'digiboost' ),
								'desc'    => esc_html__( 'Choose columns horizontal padding (gutter) value inside form', 'digiboost' ),
								'choices' => array(
									'c-gutter-30' => esc_html__( '30px - default', 'digiboost' ),
									'c-gutter-10'  => esc_html__( '10px', 'digiboost' ),
									'c-gutter-20'  => esc_html__( '20px', 'digiboost' ),
									'c-gutter-40'  => esc_html__( '40px', 'digiboost' ),
									'c-gutter-50'  => esc_html__( '50px', 'digiboost' ),
									'c-gutter-60'  => esc_html__( '60px', 'digiboost' ),
								),
							),
							'columns_margin_bottom'     => array(
								'type'    => 'select',
								'value'   => 'c-mb-15',
								'label'   => esc_html__( 'Columns bottom margins', 'digiboost' ),
								'desc'    => esc_html__( 'Choose columns bottom margin value inside form', 'digiboost' ),
								'choices' => array(
									'c-mb-15' => esc_html__( '15px - default', 'digiboost' ),
									'c-mb-5'  => esc_html__( '5px', 'digiboost' ),
									'c-mb-10'  => esc_html__( '10px', 'digiboost' ),
									'c-mb-20'  => esc_html__( '20px', 'digiboost' ),
									'c-mb-25'  => esc_html__( '25px', 'digiboost' ),
									'c-mb-30'  => esc_html__( '30px', 'digiboost' ),
									'c-mb-40'  => esc_html__( '40px', 'digiboost' ),
								),
							),
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'digiboost' ),
										'help'  => esc_html__( 'We recommend you to use an email that you verify often', 'digiboost' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'digiboost' ),
									),
								),
							),
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group'       => array(
										'type'    => 'group',
										'options' => array(
											'subject_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message', 'digiboost' ),
												'desc'  => esc_html__( 'This text will be used as subject message for the email', 'digiboost' ),
												'value' => esc_html__( 'Contact Form', 'digiboost' ),
											),
										)
									),
									'submit-button-group' => array(
										'type'    => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'digiboost' ),
												'desc'  => esc_html__( 'This text will appear in submit button', 'digiboost' ),
												'value' => esc_html__( 'Send', 'digiboost' ),
											),
											'reset_button_text'  => array(
												'type'  => 'text',
												'label' => esc_html__( 'Reset Button', 'digiboost' ),
												'desc'  => esc_html__( 'This text will appear in reset button. Leave blank if reset button not needed', 'digiboost' ),
												'value' => esc_html__( 'Clear', 'digiboost' ),
											),
										)
									),
									'success-group'       => array(
										'type'    => 'group',
										'options' => array(
											'success_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'digiboost' ),
												'desc'  => esc_html__( 'This text will be displayed when the form will successfully send', 'digiboost' ),
												'value' => esc_html__( 'Message sent!', 'digiboost' ),
											),
										)
									),
									'failure_message'     => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'digiboost' ),
										'desc'  => esc_html__( 'This text will be displayed when the form will fail to be sent', 'digiboost' ),
										'value' => esc_html__( 'Oops something went wrong.', 'digiboost' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer Options', 'digiboost' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					)
				),
			),
		),
	)
);