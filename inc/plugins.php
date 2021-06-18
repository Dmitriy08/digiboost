<?php

/**
 * TGM Plugin Activation
 */
require_once DIGIBOOST_THEME_PATH . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';

if ( ! function_exists( 'digiboost_action_register_required_plugins' ) ):
	/** @internal */
	function digiboost_action_register_required_plugins() {
		tgmpa( array(
			array(
				'name'     => 'Unyson',
				'slug'     => 'unyson',
				'required' => true,
			),
			array(
				'name'        => 'Snazzy Maps',
				'slug'        => 'snazzy-maps',
				'required'    => false,
				'recommended' => true,
			),
			array(
				'name'     => 'Classic editor',
				'slug'     => 'classic-editor',
				'required' => true,
			),
			array(
				'name'     => 'MWTemplates Theme Addons',
				'slug'     => 'mwt-addons',
				'source'   => esc_url( 'http://webdesign-finder.com/digiboost/plugins/mwt-addons.zip' ),
				'required' => true,
				'version'  => '1.0.0',
			),
			array(
				'name'     => 'MWTemplates Theme Helpers',
				'slug'     => 'mwt-helpers',
				'source'   => esc_url( 'http://webdesign-finder.com/digiboost/plugins/mwt-helpers.zip' ),
				'required' => true,
				'version'  => '1.0',
			),
			array(
				'name'     => 'MailChimp',
				'slug'     => 'mailchimp-for-wp',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'Comment Form Js Validation', 'digiboost' ),
				'slug'     => 'comment-form-js-validation',
				'required' => true,
			),
		),
			array(
				'domain'       => 'digiboost',
				'dismissable'  => false,
				'is_automatic' => false
			) );
	}
endif;
add_action( 'tgmpa_register', 'digiboost_action_register_required_plugins' );