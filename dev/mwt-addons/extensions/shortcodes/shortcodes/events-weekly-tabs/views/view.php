<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
$class = $atts['class'];
$atts['id'] = uniqid('id-');
$date_format = get_option('date_format');
$time_format = get_option('time_format');

$e = new Digiboost_Unyson_Events_Extends();
?>
<div class="bootstrap-tabs">
	<ul class="nav nav-tabs <?php echo esc_attr( $class ); ?>" role="tablist">
		<?php foreach ( $e->days_of_week as $index => $day ) : ?>
			<li class="nav-item <?php echo ( 0 === $index ) ? 'active' : '' ?>">
				<a
						id="tab_link-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>"
						class="nav-link<?php echo ( 0 === $index ) ? ' active' : '' ?>"
						href="#tab-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>"
						role="tab"
						data-toggle="tab"
						aria-controls="tab-<?php echo esc_attr( $atts['id'] . '-' . $index ); ?>"
						aria-expanded="<?php echo( 0 === $index ) ? 'true' : 'false' ?>"
				>
					<?php echo esc_html( $day ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<div class="tab-content">
		<?php foreach ( $e->days_of_week as $index => $day_of_week ) : ?>
			<div class="tab-pane fade <?php echo ( 0 === $index ) ? 'show active' : '' ?>"
				 id="tab-<?php echo esc_attr( $atts['id'] . '-' . $index ); ?>"
				 role="tabpanel"
				 aria-labelledby="tab_link-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>"
			>
				<?php
					if( ! empty( $e->weekly_events_ids_with_start_dates[$day_of_week] ) ) {
						foreach ( $e->weekly_events_ids_with_start_dates[$day_of_week] as $event ) :
							$thumbnail = get_the_post_thumbnail( $event['id'] );
							$title = get_the_title( $event['id'] );
							$date_from = date( $date_format, $event['from_timestamp'] );
							$date_to = date( $date_format, $event['to_timestamp'] );
							$time_from = date( $time_format, $event['from_timestamp'] );
							$time_to = date( $time_format, $event['to_timestamp'] );
							?>

							<div class="media bordered">
								<?php if ( ! empty( $thumbnail ) ) : ?>
									<a href="<?php echo esc_url( get_the_permalink( $event['id'] ) ); ?>">
										<?php echo wp_kses_post( $thumbnail ); ?>
									</a>
								<?php endif; //thumbnail ?>


								<div class="media-body">

									<div class="pull-right">
										<a class="btn btn-outline-maincolor" href="<?php echo esc_url( get_the_permalink( $event['id'] ) ); ?>">
											<?php esc_attr_e( 'Info', 'digiboost' ); ?>
										</a>
									</div>

								<?php if ( ! empty( $title ) ) : ?>
									<h5>
										<a href="<?php echo esc_url( get_the_permalink( $event['id'] ) ); ?>">
											<?php echo wp_kses_post( $title ); ?>
										</a>
									</h5>
								<?php endif; //title ?>
									<div class="item-meta">
									<i class="fa fa-calendar color-main2"></i>
									<?php echo esc_html( $date_from ); ?>
									-
									<?php echo esc_html( $date_to ); ?>

									<i class="fa fa-clock-o color-main2"></i>
									<?php echo esc_html( $time_from );  ?>
									-
									<?php echo esc_html( $time_to ); ?>

									<?php if ( ! empty( $event['users'] ) ) : ?>
										<i class="fa fa-user color-main2"></i>
										<?php foreach ( $event['users'] as $user_id ) :
											$user = get_userdata( $user_id );
											echo esc_html( $user->display_name );
										endforeach; //users ?>
									<?php endif; //users ?>

									</div><!--.item-meta -->
								</div><!-- .media-body -->
							</div><!-- .media -->

						<?php
						endforeach; //event
						} else {
							echo esc_html__( 'No data on ', 'digiboost');
							echo wp_kses_post( $day_of_week );
						}
				?>
			</div><!-- .eof tab-pane -->
		<?php endforeach; ?>
	</div><!-- .tab-content -->
</div><!-- .bootstrap-tabs -->