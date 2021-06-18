<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
    return;
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

$xl_class = '';
switch ( $atts['layout']['isotope-tiled']['responsive_xl'] ) :
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
switch ( $atts['layout']['isotope-tiled']['responsive_lg'] ) :
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
switch ( $atts['layout']['isotope-tiled']['responsive_md'] ) :
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
switch ( $atts['layout']['isotope-tiled']['responsive_sm'] ) :
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
switch ( $atts['layout']['isotope-tiled']['responsive_xs'] ) :
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
switch ( $atts['layout']['isotope-tiled']['margin'] ) :
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
$background = ( !empty($atts['background_color']) ) ? $atts['background_color'] : '';

$count=0;

if ( $atts['show_filters'] ) {
    //get all terms for filter
    $all_categories = array();
    $categories     = array();
    // Start the Loop.
    while ( $posts->have_posts() ) : $posts->the_post();
        $post_categories = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
        if ( ! empty( $post_categories ) ) {
            $all_categories[] = $post_categories;
        }
    endwhile;
    $posts->wp_reset_postdata();
    if ( ! empty( $all_categories ) ) {
        foreach ( $all_categories as $post_categories ) :
            foreach ( $post_categories as $category ) :
                $categories[] = $category;
            endforeach;
        endforeach;
    }
    $categories = array_unique( $categories, SORT_REGULAR );
    if ( count( $categories ) > 1 ) : ?>
        <div class="filters gallery-filters filters-bordered isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
            <a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'digiboost' ); ?></a>
            <?php foreach ( $categories as $category ) : ?>
                <a href="#"
                   data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
            <?php endforeach; ?>
        </div><!-- eof isotope_filters -->
    <?php endif; //count subcategories check
} //count subcategories check
?>

<div class="isotope-wrapper shortcode-gallery isotope row masonry-layout <?php echo esc_attr( $margin_class ); ?>"
     data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
    <?php while ( $posts->have_posts() ) : $posts->the_post();
        $post_terms       = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
        $post_terms_class = '';
        if ( ! empty ( $post_terms ) ) :
            foreach ( $post_terms as $post_term ) :
                $post_terms_class .= $post_term->slug . ' ';
            endforeach;
        endif;
        $count ++;
        if($count == 1 || $count == 4){
            $image_size='digiboost-tiled-1';
        }elseif ($count == 2 || $count == 5){
            $image_size='digiboost-tiled-3';
        }elseif ( $count == 3 || $count == 6){
            $image_size='digiboost-tiled-2';
        }else{
            $count = 1;
        }
        ?>
        <div
                class="isotope-item <?php echo esc_attr( 'item-layout-' . $atts['item_layout'] . ' ' . $xl_class . ' ' .$lg_class . ' ' . $md_class . ' ' . $sm_class . ' ' . $xs_class . ' ' . $post_terms_class ); ?>">
            <?php
            //include item layout view file
            if ( has_post_thumbnail() ) {
                include( fw()->extensions->get( 'portfolio' )->locate_view_path( esc_attr( $atts['item_layout'] ) ) );
            } else {
                include( fw()->extensions->get( 'portfolio' )->locate_view_path( 'item-extended' ) );
            }
            ?>
        </div>
    <?php endwhile; ?>
</div><!-- eof .isotope-wrapper -->
<div class="<?php echo esc_attr( 'mt--' . $space ); ?>"></div>
