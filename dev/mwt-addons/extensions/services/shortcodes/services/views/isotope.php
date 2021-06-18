<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */

//1 - col-*-12
//2 - col-*-6
//3 - col-*-4
//4 - col-*-3
//6 - col-*-2

//bootstrap col-lg-* class
$xl_class = '';
switch ( $atts['layout']['isotope']['responsive_xl'] ) :
	case ( 1 ) :
		$xl_class = 'col-xl-12';
		break;
	
	case ( 2 ) :
		$xl_class = 'col-xl-6';
		break;
	
	case ( 3 ) :
		$xl_class = 'col-xl-4';
		break;
	
	case ( 4 ) :
		$xl_class = 'col-xl-3';
		break;
	//6
	default:
		$xl_class = 'col-xl-2';
endswitch;

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
		$margin_class = 'c-gutter-0';
		$space = '0';
		break;
	
	case ( 1 ) :
		$margin_class = 'c-gutter-1 c-mb-1';
		$space = '1';
		break;
	
	case ( 2 ) :
		$margin_class = 'c-gutter-2 c-mb-2';
		$space = '2';
		break;
	
	case ( 10 ) :
		$margin_class = 'c-gutter-10 c-mb-10';
		$space = '10';
		break;
	case ( 30 ) :
		$margin_class = 'c-gutter-30 c-mb-30';
		$space = '30';
		break;
	case ( 40 ) :
		$margin_class = 'c-gutter-40 c-mb-40';
		$space = '40';
		break;
	case ( 50 ) :
		$margin_class = 'c-gutter-50 c-mb-50';
		$space = '50';
		break;
	case ( 60 ) :
		$margin_class = 'c-gutter-60 c-mb-60';
		$space = '60';
		break;

endswitch;

$unique_id = uniqid();

$categories = fw_ext_extension_get_listing_categories( $atts['cat'], 'services' );
$sort_classes = fw_ext_extension_get_sort_classes( $posts->posts, $categories, '', 'services' );
$background = ( !empty($atts['background_color']) && $margin_class === 'c-gutter-0 c-mb-0' ) ? $atts['background_color'] : '';

if ( $atts['show_filters'] ) : ?>
	<div class="filters isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
		<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'mwt' ); ?></a>
		<?php
		foreach ( $categories as $category ) {
			?>
			<a href="#"
			   data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
			<?php
		} //foreach
		?>
	</div>
	<?php
endif; //showfilters check

?>

<div class=" row shortcode-service isotope-wrapper masonry-layout  <?php echo esc_attr( $margin_class.' '.$background ); ?>"
    <?php if ( $atts['show_filters'] ) : ?>
        data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>"
    <?php endif; // filters
	$align= esc_attr( $atts['align'] );
	?>
>
    <?php while ( $posts->have_posts() ) : $posts->the_post();?>
        <div
            class="isotope-item <?php echo esc_attr( $align . ' ' . $xl_class . ' ' .$lg_class . ' ' . $md_class . ' ' . $sm_class . ' ' . $xs_class . ' ' . $sort_classes[get_the_ID()] ); ?>">
            <?php
            include( fw()->extensions->get( 'services' )->locate_view_path( esc_attr( $atts['item_layout'] ) ) );
            ?>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); // reset the query ?>
</div><!-- eof .isotope-wrapper -->
<div class="<?php echo esc_attr( 'mt--' . $space ); ?>"></div>
