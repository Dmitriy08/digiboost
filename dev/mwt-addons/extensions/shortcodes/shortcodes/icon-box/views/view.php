<?php if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$icon_array = digiboost_get_unyson_icon_type_v2_array( $atts, 'icon' );
$icon_styled_class = digiboost_get_unyson_icon_styled_class( $atts );

$title = $atts['title'];
$content = $atts['content'];
$link = $atts['link'];
$show_button = ( !empty( $link ) && !empty( $atts['button']['show_button'] ) && !empty( $atts['button']['button']['label'] ) ) ? true : false;
$box_shadow = ( !empty( $atts['shadow'] ) ) ? $atts['shadow'] : '';

switch ( $atts['style'] ) :
    case 'top':
        ?>
    <div class="icon-box <?php echo esc_attr( trim( $atts['background_color'] . ' ' . $atts['text_align'] . ' ' . $atts['class']. ' ' . $box_shadow ) ); ?>">
        <?php if ( $link ) : ?>
        <a href="<?php echo esc_url( $link ); ?>">
    <?php endif; ?>
        <div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
            <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
        </div>
        <?php if ( $link ) : ?>
        </a>
    <?php endif; ?>
        <?php if ( $title ) : ?>
        <<?php echo esc_html( $atts['heading_tag'] ); ?> class="<?php echo esc_attr( $atts['title_text_weight'] ); ?>">
        <?php if ( $link ) : ?>
            <a href="<?php echo esc_url( $link ); ?>">
        <?php endif; ?>
        <?php echo wp_kses_post( $atts['title'] ); ?>
        <?php if ( $link ) : ?>
            </a>
        <?php endif; ?>
        </<?php echo esc_html( $atts['heading_tag'] ); ?>>
    <?php endif; ?>
        <?php if ( $content ) : ?>
        <p><?php echo wp_kses_post( $atts['content'] ); ?></p>
    <?php endif; ?>
        <?php if ( $show_button ) : ?>
        <a href="<?php echo esc_url( $link ); ?>"
           class="<?php echo esc_attr( $atts['button']['button']['color'] ); ?>"><?php echo esc_html( $atts['button']['button']['label'] ); ?></a>
    <?php endif; ?>
        </div><!-- .icon-box -->
        <?php
        break;
    case 'left':
        ?>
        <div class="media <?php echo esc_attr( trim( $atts['background_color'] . ' ' . $atts['text_align'] . ' ' . $atts['class']. ' ' . $box_shadow ) ); ?>">
            <?php if ( $link ) : ?>
            <a href="<?php echo esc_url( $link ); ?>">
                <?php endif; ?>
                <div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
                    <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
                </div>
                <?php if ( $link ) : ?>
            </a>
        <?php endif; ?>
            <div class="media-body">
                <?php if ( $title ) : ?>
                <<?php echo esc_html( $atts['heading_tag'] ); ?>
                class="<?php echo esc_attr( $atts['title_text_weight'] ); ?>">
                <?php if ( $link ) : ?>
                <a href="<?php echo esc_url( $link ); ?>">
                    <?php endif; ?>
                    <?php echo wp_kses_post( $atts['title'] ); ?>
                    <?php if ( $link ) : ?>
                </a>
            <?php endif; ?>
            </<?php echo esc_html( $atts['heading_tag'] ); ?>>
        <?php endif; ?>
            <?php if ( $content ) : ?>
                <p><?php echo wp_kses_post( $atts['content'] ); ?></p>
            <?php endif; ?>
            <?php if ( $show_button ) : ?>
                <a href="<?php echo esc_url( $link ); ?>"
                   class="<?php echo esc_attr( $atts['button']['button']['color'] ); ?>"><?php echo esc_html( $atts['button']['button']['label'] ); ?></a>
            <?php endif; ?>
        </div>
        </div><!-- .media -->
        <?php
        //left
        break;
    case 'right':
        ?>
        <div class="media right-icon <?php echo esc_attr( trim( $atts['background_color'] . ' ' . $atts['text_align'] . ' ' . $atts['class']. ' ' . $box_shadow ) ); ?>">
            <div class="media-body">
                <?php if ( $title ) : ?>
                <<?php echo esc_html( $atts['heading_tag'] ); ?>>
                <?php if ( $link ) : ?>
                <a href="<?php echo esc_url( $link ); ?>">
                    <?php endif; ?>
                    <?php echo wp_kses_post( $atts['title'] ); ?>
                    <?php if ( $link ) : ?>
                </a>
            <?php endif; ?>
            </<?php echo esc_html( $atts['heading_tag'] ); ?>>
            <?php endif; ?>
            <?php if ( $content ) : ?>
                <p><?php echo wp_kses_post( $atts['content'] ); ?></p>
            <?php endif; ?>
            <?php if ( $show_button ) : ?>
                <a href="<?php echo esc_url( $link ); ?>"
                   class="<?php echo esc_attr( $atts['button']['button']['color'] ); ?>"><?php echo esc_html( $atts['button']['button']['label'] ); ?></a>
            <?php endif; ?>
        </div>
        <?php if ( $link ) : ?>
        <a href="<?php echo esc_url( $link ); ?>">
    <?php endif; ?>
        <div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
            <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
        </div>
        <?php if ( $link ) : ?>
        </a>
    <?php endif; ?>
        </div><!-- .media -->
        <?php
        //right
        break;
endswitch;