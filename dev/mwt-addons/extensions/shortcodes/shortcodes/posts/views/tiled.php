<?php if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */

$background = ( !empty( $atts['background_color'] ) ) ? $atts['background_color'] : '';
$image_size = 'digiboost-rectangle-horizontal';
//$title_size = 7;


$unique_id = uniqid();
$column_class = '';
$count = 0;
?>
<div class=" blog-shortcode grid  row c-mb-50 c-gutter-60"
     data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
	<?php while ( $posts->have_posts() ) : $posts->the_post();
		$count++;
		if ( $count == 1 ) {
			$column_class = 'col-12';
			$excerpt_size = 40;
			$title_size = 18;
		} elseif ( $count == 2 ) {
			$column_class = 'col-lg-4';
			$excerpt_size = 10;
			$title_size = 8;
		} elseif ( $count == 3 ) {
			$column_class = 'col-lg-4';
			$excerpt_size = 10;
			$title_size = 8;
		} elseif ( $count == 4 ) {
			$column_class = 'col-lg-4';
			$excerpt_size = 10;
			$title_size = 6;
			$count = 0;
		}
		?>
		<div class="<?php echo esc_attr( $column_class ) ?>">
			<?php
			//include item layout view file. If no thumbnail - layout is always extended
			$filepath = get_template_directory() . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/' . $atts['item_layout'] . '.php';
			if ( !( has_post_thumbnail() ) ) {
				$filepath = get_template_directory() . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/item-extended.php';
			}
			if ( file_exists( $filepath ) ) {
				include( $filepath );
			} else {
				$filepath = plugin_dir_path( __FILE__ ) . $atts['item_layout'] . '.php';
				if ( !( has_post_thumbnail() ) ) {
					$filepath = plugin_dir_path( __FILE__ ) . 'item-extended.php';
				}
				if ( file_exists( $filepath ) ) {
					include( $filepath );
				} else {
					_e( 'View not found', 'digiboost' );
				}
			}
			?>
		</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); // reset the query ?>
</div><!-- eof .istotpe-wrapper -->
<div class="mt--50"></div>
