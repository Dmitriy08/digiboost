<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Shortcode_Product extends FW_Shortcode {

	protected function _render( $atts, $content = null, $tag = '' ) {
		
	
		$terms = $atts['cat'];

		$tax_query = false;
		//if some terms are selected in options - creating tax_query
		if ( ! empty( $terms ) ) {
			$tax_query = array(
				array(
					'taxonomy' => 'product_cat',
					'terms' => $atts['cat'],
				),
			);
		}
	
		$posts = $this->fw_get_posts_with_info( array(
			'sort'  => 'post_date',
			'items' => $atts['number'],
			'tax_query'      => $tax_query,
		) );
		


		$view_path = $this->locate_path( '/views/carousel.php' );

		return fw_render_view( $view_path, array(
				'atts'  => $atts,
				'posts' => $posts
			)
		);

	}

	/**
	 * @param array $args
	 *
	 * @return array
	 */
	public function fw_get_posts_with_info( $args = array() ) {
		$defaults = array(
			'sort'        => 'recent',
			'items'       => 5,
			'image_post'  => true,
			'date_post'   => true,
			'date_format' => 'F jS, Y',
			'post_type'   => 'post',

		);

		extract( wp_parse_args( $args, $defaults ) );

		$query = new WP_Query( array(
			'post_type'           => 'product',
			'order '              => 'DESC',
			'tax_query'      => $tax_query,
			'posts_per_page'      => $items,
		) );

		//removed wp reset query

		return $query;
	}

	private function get_error_msg() {
		return '<p>' . esc_html__( 'No view found', 'digiboost' ) . '</p>';
	}
}