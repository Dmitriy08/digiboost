<?php

// share buttons
if ( ! function_exists( 'digiboost_share_this' ) ) :
	/**
	 * Share article through social networks.
	 * works only if the appropriate plugin is active
	 *
	 * bool $only_buttons
	 */
	function digiboost_share_this( $only_buttons = false ) {
		if ( function_exists( 'mwt_share_this' ) ) {
			mwt_share_this( $only_buttons );
		}
	} //digiboost_share_this()
endif; //function_exists