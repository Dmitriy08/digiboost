<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till main content section
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="//gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>
<?php
$options = digiboost_get_options();

//if is page and Unyson is installed - overriding global header options from page settings
if	( function_exists( 'fw_get_db_post_option' ) && is_page() )  {
    $page_options = fw_get_db_post_option( get_the_ID(), 'header_page' );
    if ( ! empty( $page_options['header_page_styles'] ) ) {
        $options = array_merge( $options, $page_options['header_page_custom_styles'] );
    }
}
?>

<body <?php body_class(); ?> data-slide-speed="<?php digiboost_slide_speed(); ?>">
<?php
if ( function_exists( 'wp_body_open' ) ) :
	wp_body_open();
endif;
//wide or boxed layout
$layout = $options['layout'];
$canvas_class = '';
$box_wrapper_class = '';
if ( !empty ( $layout['boxed'] ) ) {
	$canvas_class = 'boxed';
	$box_wrapper_class = 'container';
	$body_background_image = $layout['boxed_options']['body_background_image'];
	$body_cover = $layout['boxed_options']['body_cover'];
	$boxed_extra_margins = $layout['boxed_options']['boxed_extra_margins'];
	if ( $body_cover ) {
		$canvas_class .= ' s-parallax';
	}
	if ( $boxed_extra_margins ) {
		$box_wrapper_class .= ' top-bottom-margins';
	}
}

//page preloader
$preloader_type = $options['preloader']['preloader_type'];

if ( !( $preloader_type === 'disabled' ) ) :
	$preloader_class_suffix = is_bool( strpos( $preloader_type, 'image' ) ) ? 'css' : 'image';
	$preloader_image = ( $preloader_type == 'image_custom' ) ? $options['preloader']['image_custom']['options'] : false;
	?>
	<!-- page preloader -->
	<div class="preloader">
		<div class="preloader_<?php echo esc_attr( $preloader_class_suffix . ' ' . $options['preloader_custom_class'] ); ?> animate-spin"<?php echo ( !empty( $preloader_image ) ) ? ' style="background-image: url(' . esc_url( $preloader_image['url'] ) . ')"' : '' ?>></div>
	</div>
<?php endif; //preloader_enabled ?>


<?php if ( defined( 'FW' ) ) : ?>
	<!-- Unyson messages modal -->


	<!-- Login Modal -->
	<div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby="login-form" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl modal-lg modal-sm" role="document">
			<?php
			$background = ( !empty( $options['register_modal']['show']['background_color'] ) ) ? $options['register_modal']['show']['background_color'] : '';
			?>
			<div class="modal-content <?php echo esc_attr( $background ); ?> container-px-0">
				<div class="container ">
					<div class="row align-items-center c-gutter-0">
						<?php
						if ( !empty( $options['register_modal']['show']['image_login'] ) ) {
							?>
							<div class="col-lg-6 d-none d-lg-block">
								<img src="<?php echo esc_url( $options['register_modal']['show']['image_login']['url'] ); ?>"
								     alt="<?php echo esc_attr( 'img' ) ?>">
							</div>
							<?php
						}
						$class_login_form_column = ( !empty( $options['register_modal']['show']['image_login'] ) ) ? 'col-lg-6' : 'col-8 offset-2';
						?>

						<div class="<?php echo esc_attr( $class_login_form_column ) ?>">
							<div class="form-wrapper text-center p-lg-40 p-20">
								<?php
								if ( !is_user_logged_in() ) :
									echo '<h5>' . esc_html__( 'Sign in', 'digiboost' ) . '</h5>';
									wp_login_form( array(
										'label_username' => esc_html__( 'Your Login', 'digiboost' ),
										'label_password' => esc_html__( 'Your Password', 'digiboost' ),
										'label_remember' => esc_html__( 'Remember Me', 'digiboost' ),
										'label_log_in' => esc_html__( 'Log In', 'digiboost' ),
									) );
								else:
									echo '<div class="many-buttons">';
									$html = '<a href="' . esc_url( wp_logout_url() ) . '" class="btn btn-maincolor m-0">' . esc_html__( 'Log out', 'digiboost' ) . '</a>';
									if ( current_user_can( 'read' ) ) {
										$html .= ' <a href="' . esc_url( admin_url() ) . '" class="btn btn-darkgrey mt-10 mx-0">' . esc_html__( 'Site Admin', 'digiboost' ) . '</a>';
									}
									echo wp_kses_post( $html );
									echo '</div>';
								endif; //is_user_logged_in
								?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


<?php endif; ?>

<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas" class="<?php echo esc_attr( $canvas_class ); ?>"
	<?php echo ( !empty( $body_background_image ) ) ? ' style="background-image:url(' . esc_url( $body_background_image['url'] ) . ');"' : ''; ?>>
	<div id="box_wrapper" class="<?php echo esc_attr( $box_wrapper_class ); ?>">
		<!-- template sections -->
		
		<?php
		do_action( 'digiboost_slider' );
		
		$header = digiboost_get_predefined_template_part( 'header' );
		get_template_part( 'template-parts/header/' . esc_attr( $header ) );
		
		
		if ( !is_front_page() && !is_404() && !is_page_template( '404.php' ) ) {
			$title = digiboost_get_predefined_template_part( 'title' );
			get_template_part( 'template-parts/title/' . esc_attr( $title ) );
		}
		
		//not opening section if is single post with video format
		//and if this is not full width page template
		//and if not 404 page
		if (
		!is_page_template( 'page-templates/full-width.php' )
		&& !is_page_template( '404.php' )
		&& !is_404()
		&& !is_singular( 'fw-team' )
		&& !is_singular( 'fw-services' )
		) :
		?>
		<section class="<?php echo esc_attr( $options['version'] ); ?> page_content s-py-xl-110 s-py-md-90 s-py-60 c-gutter-60">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="fw-divider-space hidden-xs hidden-sm hidden-md hidden-lg hidden-xl" style="margin-top: 40px;"></div>
					</div>
<?php if ( is_home() ) {
	$blog_slider_options = digiboost_get_option( 'blog_slider_switch', '' );
	$blog_slider_enabled = false;
	if ( !empty( $blog_slider_options ) ) {
		$blog_slider_enabled = $blog_slider_options['blog_slider_enabled'];
	}
	$blog_posts_widget_option = digiboost_get_option( 'blog_posts_widget_switch', '' );
	if ( $blog_slider_enabled ) {
		do_action( 'digiboost_blog_slider' );
	}
	if ( $blog_posts_widget_option ) {
		do_action( 'digiboost_posts_widget' );
	}
}
endif; //!full-width ?>