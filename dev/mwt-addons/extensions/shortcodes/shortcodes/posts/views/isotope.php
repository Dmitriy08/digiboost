<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */
$add_class = '';
$background = ( !empty($atts['background_color']) ) ? $atts['background_color'] : '';
$image_size='digiboost-rectangle-horizontal';
$excerpt_size=15;
$title_size=7;
//1 - col-*-12
//2 - col-*-6
//3 - col-*-4
//4 - col-*-3
//6 - col-*-2

//bootstrap col-lg-* class
$lg_class = '';
switch ( $atts['layout']['isotope']['responsive_lg'] ) :
	case ( 1 ) :
		$lg_class = 'col-lg-12';
		break;

	case ( 2 ) :
		$lg_class = 'col-lg-6';
		break;

	case ( 3 ) :
		$lg_class = 'col-lg-4';
		break;

	case ( 4 ) :
		$lg_class = 'col-lg-3';
		break;
	//6
	default:
		$lg_class = 'col-lg-2';
endswitch;

//bootstrap col-md-* class
$md_class = '';
switch ( $atts['layout']['isotope']['responsive_md'] ) :
	case ( 1 ) :
		$md_class = 'col-md-12';
		break;

	case ( 2 ) :
		$md_class = 'col-md-6';
		break;

	case ( 3 ) :
		$md_class = 'col-md-4';
		break;

	case ( 4 ) :
		$md_class = 'col-md-3';
		break;
	//6
	default:
		$md_class = 'col-md-2';
endswitch;

//bootstrap col-sm-* class
$sm_class = '';
switch ( $atts['layout']['isotope']['responsive_sm'] ) :
	case ( 1 ) :
		$sm_class = 'col-sm-12';
		break;

	case ( 2 ) :
		$sm_class = 'col-sm-6';
		break;

	case ( 3 ) :
		$sm_class = 'col-sm-4';
		break;

	case ( 4 ) :
		$sm_class = 'col-sm-3';
		break;
	//6
	default:
		$sm_class = 'col-sm-2';
endswitch;

//bootstrap col-xs-* class
$xs_class = '';
switch ( $atts['layout']['isotope']['responsive_xs'] ) :
	case ( 1 ) :
		$xs_class = 'col-xs-12';
		break;

	case ( 2 ) :
		$xs_class = 'col-xs-6';
		break;

	case ( 3 ) :
		$xs_class = 'col-xs-4';
		break;

	case ( 4 ) :
		$xs_class = 'col-xs-3';
		break;
	//6
	default:
		$xs_class = 'col-xs-2';
endswitch;

//column paddings class
//margin values:
//0
//1
//2
//10
//30
$margin_class = '';
switch ( $atts['layout']['isotope']['margin'] ) :
	case ( 0 ) :
		$margin_class = 'c-gutter-0 c-mb-0';
		break;

	case ( 1 ) :
		$margin_class = 'c-gutter-1 c-mb-1';
		break;

	case ( 2 ) :
		$margin_class = 'c-gutter-2 c-mb-2';
		break;

	case ( 10 ) :
		$margin_class = 'c-gutter-10 c-mb-10';
		break;
    case ( 30 ) :
        $margin_class = 'c-gutter-30 c-mb-30';
        break;
    case ( 60 ) :
        $margin_class = 'c-gutter-60 c-mb-60';
        break;
	//6
	default:
		$margin_class = 'c-gutter-15 c-mb-15';
endswitch;

$unique_id = uniqid();

?>
<div class="isotope-wrapper blog-shortcode isotope row masonry-layout <?php echo esc_attr( $margin_class ); ?>"
	 data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
	<?php while ( $posts->have_posts() ) : $posts->the_post();
		?>
		<div
			class="isotope-item <?php echo esc_attr( 'item-layout-' . $atts['item_layout'] . ' ' . $lg_class . ' ' . $md_class . ' ' . $sm_class . ' ' . $xs_class  ); ?>">
			<?php
			//include item layout view file. If no thumbnail - layout is always extended
			$filepath = get_template_directory() . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/' . $atts['item_layout'] . '.php';
			if ( ! ( has_post_thumbnail() ) ) {
				$filepath = get_template_directory() . '/framework-customizations/extensions/shortcodes/shortcodes/posts/views/item-extended.php';
			}
			if ( file_exists( $filepath ) ) {
				include( $filepath );
			} else {
				$filepath = plugin_dir_path( __FILE__ ) . $atts['item_layout'] . '.php';
				if ( ! ( has_post_thumbnail() ) ) {
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
