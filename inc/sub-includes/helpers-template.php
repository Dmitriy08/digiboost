<?php


/**
 *
 * Returning walker for change comments HTML
 */
if (!function_exists('digiboost_return_comments_walker')) :
    function digiboost_return_comments_walker()
    {
        return new Digiboost_Comments_Walker;
    }
endif;


if (!function_exists('digiboost_the_attached_image')) :
    /**
     * Print the attached image with a link to the next attached image.
     */
    function digiboost_the_attached_image()
    {
        $post = get_post();
        /**
         * Filter the default attachment size.
         *
         * @param array $dimensions {
         *     An array of height and width dimensions.
         *
         * @type int $height Height of the image in pixels. Default 810.
         * @type int $width Width of the image in pixels. Default 810.
         * }
         */
        $attachment_size = apply_filters('digiboost_attachment_size', array(810, 810));
        $next_attachment_url = wp_get_attachment_url();

        /*
         * Grab the IDs of all the image attachments in a gallery so we can get the URL
         * of the next adjacent image in a gallery, or the first image (if we're
         * looking at the last image in a gallery), or, in a gallery of one, just the
         * link to that image file.
         */
        $attachment_ids = get_posts(array(
            'post_parent' => $post->post_parent,
            'fields' => 'ids',
            'numberposts' => -1,
            'post_status' => 'inherit',
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'order' => 'ASC',
            'orderby' => 'menu_order ID',
        ));

        // If there is more than 1 attachment in a gallery...
        if (count($attachment_ids) > 1) {
            foreach ($attachment_ids as $attachment_id) {
                if ($attachment_id == $post->ID) {
                    $next_id = current($attachment_ids);
                    break;
                }
            }

            // get the URL of the next image attachment...
            if ($next_id) {
                $next_attachment_url = get_attachment_link($next_id);
            } // or get the URL of the first image attachment.
            else {
                $next_attachment_url = get_attachment_link(array_shift($attachment_ids));
            }
        }

        printf('<a href="%1$s" rel="attachment">%2$s</a>',
            esc_url($next_attachment_url),
            wp_get_attachment_image($post->ID, $attachment_size)
        );
    } //digiboost_the_attached_image()

endif;

if (!function_exists('digiboost_list_authors')) :
    /**
     * Print a list of all site authors who published at least one post.
     */
    function digiboost_list_authors($only_post_author = true)
    {
        if ($only_post_author) {
            $author_id = get_the_author_meta('ID');
            $author_ids = get_users(array(
                'fields' => 'ID',
                'include' => array(
                    $author_id
                )
            ));
        } else {
            // all authors with at least one post.
            $author_ids = get_users(array(
                'fields' => 'ID',
                'orderby' => 'post_count',
                'order' => 'DESC',
                'who' => 'authors',
            ));
        }


        foreach ($author_ids as $author_id) :
            $post_count = count_user_posts($author_id);

            // Move on if user has not published a post (yet).
            if (!$post_count) {
                continue;
            }
            $twitter_url = get_the_author_meta('twitter', $author_id);
            $facebook_url = get_the_author_meta('facebook', $author_id);
            $google_plus_url = get_the_author_meta('google_plus', $author_id);
            $author_bio = get_the_author_meta('description', $author_id);
            $custom_image_url = get_the_author_meta('custom_profile_image', $author_id);
            $author_position = get_the_author_meta('position', $author_id);
            // Not showing meta if no author bio
            if (!$author_bio) {
                continue;
            }

            ?>
            <div class="author-meta side-item content-padding bordered">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item-media">
                            <?php
                            if (!empty($custom_image_url)) {
                                echo '<img src="' . esc_url($custom_image_url) . '" alt="' . esc_attr(get_the_author_meta('display_name', $author_id)) . '">';
                            } else {
                                echo get_avatar($author_id, 700);
                            }
                            ?>
                        </div><!-- eof .item-media -->
                    </div><!-- eof .col-md-* -->
                    <div class="col-md-9">
                        <div class="item-content">
                            <h4 class="author-name"><?php echo wp_kses_post(get_the_author_meta('display_name', $author_id)); ?></h4>
                            <?php if ($author_bio) : ?>
                                <p class="author-bio">
                                    <?php echo wp_kses_post($author_bio); ?>
                                </p>
                            <?php endif; //author_bio
                            if ($twitter_url || $facebook_url || $google_plus_url) :
                                ?>
                                <span class="author-social">
									<?php if ($twitter_url) : ?>
                                        <a href="<?php echo esc_url($twitter_url) ?>"
                                           class="fa fa-twitter"></a>
                                    <?php endif; ?>
                                    <?php if ($facebook_url) : ?>
                                        <a href="<?php echo esc_url($facebook_url) ?>"
                                           class="fa fa-facebook"></a>
                                    <?php endif; ?>
                                    <?php if ($google_plus_url) : ?>
                                        <a href="<?php echo esc_url($google_plus_url) ?>"
                                           class="fa fa-google-plus"></a>
                                    <?php endif; ?>
								</span><!-- eof .author-social -->
                            <?php
                            endif; //author social
                            ?>
                        </div><!-- eof .item-content -->
                    </div><!-- eof .col-md-* -->
                </div>
                <!-- .author-info -->
            </div><!-- eof author-meta -->
        <?php
        endforeach;
    } //digiboost_list_authors()

endif;


if (!function_exists('digiboost_post_nav')) :
    /**
     * Display navigation to next/previous post when applicable.
     */
    function digiboost_post_nav()
    {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '',
            true);
        $next = get_adjacent_post(false, '', false);

        if (!$next && !$previous) {
            return;
        }
        $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);

        if (is_attachment() && 'attachment' == $previous->post_type) {
            return;
        }

        if ($previous && has_post_thumbnail($previous->ID)) {
            $prevthumb = wp_get_attachment_image_src(get_post_thumbnail_id($previous->ID), 'post-thumbnail');
            $prev_thumbnail = $prevthumb[0];
        } else {
            $prev_thumbnail = '';
        }

        if ($next && has_post_thumbnail($next->ID)) {
            $nextthumb = wp_get_attachment_image_src(get_post_thumbnail_id($next->ID), 'post-thumbnail');
            $next_thumbnail = $nextthumb[0];
        } else {
            $next_thumbnail = '';
        }
        ?>
        <nav class="post-navigation" role="navigation">
            <?php
            previous_post_link('%link', '' . '<div class="prev-item ds s-overlay cover-image"> <img src="'. esc_url($prev_thumbnail) .'" alt="">'.'<span>'.esc_html__('Previous Post', 'digiboost') .'</span>'. '<h5>%title</h5></div>');
            ?>

            <?php next_post_link('%link', '<div class="next-item ds s-overlay cover-image">  <img src="'.esc_url($next_thumbnail).'" alt="">'.'<span>'.esc_html__('Next Post', 'digiboost').'</span>'. '<h5>%title</h5>  </div>'); ?>

        </nav><!-- .navigation -->
    <?php } //digiboost_post_nav
endif;

if (!function_exists('digiboost_post_nav_2')) :
    /**
     * Display navigation to next/previous post when applicable.
     */
    function digiboost_post_nav_2()
    {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '',
            true);
        $next = get_adjacent_post(false, '', false);

        if (!$next && !$previous) {
            return;
        }
        ?>
        <nav class="navigation post-navigation items-nav links-grey" role="navigation">
            <?php
            $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
            $next = get_adjacent_post(false, '', false);

            if (is_attachment() && 'attachment' == $previous->post_type) {
                return;
            }

            if ($previous && has_post_thumbnail($previous->ID)) {
                $prevthumb = wp_get_attachment_image_src(get_post_thumbnail_id($previous->ID), 'post-thumbnail');
                $prev_thumbnail = $prevthumb[0];
            } else {
                $prev_thumbnail = '';
            }

            if ($next && has_post_thumbnail($next->ID)) {
                $nextthumb = wp_get_attachment_image_src(get_post_thumbnail_id($next->ID), 'post-thumbnail');
                $next_thumbnail = $nextthumb[0];
            } else {
                $next_thumbnail = '';
            }
            ?>
            <?php previous_post_link('%link', '<div class="media hero-bg  prev-item text-center" style="background-image: url(' . esc_url($prev_thumbnail) . '); "><div class="nav-overlay"></div><div class="nav-middle"><span class="nav">' . esc_html__('Prev', 'digiboost') . '</span><span class="title">%title</span></div></div>'); ?>
            <?php next_post_link('%link', '<div class="media hero-bg next-item text-center" style="background-image: url(' . esc_url($next_thumbnail) . '); "><div class="nav-overlay"></div><div class="nav-middle"><span class="nav">' . esc_html__('Next', 'digiboost') . '</span><span class="title">%title</span></div></div>'); ?>
        </nav><!-- .navigation -->
    <?php } //digiboost_post_nav_2
endif;


if (!function_exists('digiboost_posted_on')) : /**
 * Print HTML with meta information for the current post-date/time and author.
 */
    function digiboost_posted_on($included_keys = array('date', 'author', 'comments', 'categories', 'tags', 'sticky'))
    {

        $options = digiboost_get_options();
        $hide_author = $options['blog_hide_author'];
        $hide_date = $options['blog_hide_date'];
        $hide_comments = $options['blog_hide_comments_link'];
        $hide_categories = $options['blog_hide_categories'];
        $hide_tags = $options['blog_hide_tags'];

        if ($included_keys) {
            foreach ($included_keys as $key) {
                switch ($key) {
                    case 'author':
                        if (!$hide_author) :
                            digiboost_the_author(array(
                                'before' => '<span class="author vcard">',
                                'avatar' => '<i class="fa fa-user-o" aria-hidden="true"></i>',
                                'after' => '</span>',
                                'link_class' => 'url fn n',
                                'link_attributes' => 'rel="author"',
                            ));
                        endif; //!hide_author
                        break;
                    case 'date':
                        if (!$hide_date) :
                            digiboost_the_date(array(
                                'before' => '<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>',
                                'after' => '</span>',
                                'link_attributes' => 'rel="bookmark"',
                                'time_tag_class' => 'entry-date'
                            ));
                        endif; //!hide_date
                        break;
                    case 'comments':
                        if (!$hide_comments) :
                            digiboost_comments_counter(array(
                                'before' => '<span class="comments-link"><i class="fa fa-comment-o" aria-hidden="true"></i>',
                                'after' => '</span>',
                                'link_attributes' => 'rel="bookmark"',
                                'time_tag_class' => 'entry-comments'
                            ));
                        endif; //!hide_comments
                        break;
                    case 'categories':
                        if (!$hide_categories) :
                            digiboost_the_categories();
                        endif; //!hide_categories
                        break;
                    case 'tags':
                        if (!$hide_tags) :
                            the_tags('<span class="tagcloud">', '', '</span>');
                        endif; //!hide_tags
                        break;
                    case 'sticky':
                        digiboost_sticky_marker(array(
                            'sticky_symbol' => 'fa fa-thumb-tack',
                            'before' => '<span class="featured-post">',
                            'after' => esc_html__(' Sticky', 'digiboost') . '</span>',
                        ));
                        break;
                    case 'more_button':
                        digiboost_more_button(array(
                            'text' => wp_kses_post('Read More'),
                            'class' => 'btn btn-outline-maincolor medium-btn'
                        ));
                        break;
                }
            }
        }
    }

endif; //digiboost_posted_on

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 */
if (!function_exists('digiboost_post_thumbnail')) :
    function digiboost_post_thumbnail($small_image = false, $cover_image = '', $date_in_corner = false)
    {
        $pID = get_the_ID();

        //detecting featured video
        $embed_url = function_exists('fw_get_db_post_option') ? fw_get_db_post_option($pID, 'post-featured-video', '') : '';
        $iframe = '';
        if ($embed_url) {
            global $wp_embed;

            $width = '800';
            $height = '400
			';
            $iframe = $wp_embed->run_shortcode('[embed  width="' . $width . '" height="' . $height . '"]' . trim($embed_url) . '[/embed]');

        }// embed_url

        //detecting gallery
        $is_gallery = false;
        $gallery_css_class = '';
        if (get_post_format($pID) == 'gallery') {

            digiboost_shortcode_atts_gallery_trigger();
            $galleries_images = get_post_galleries_images($pID);
            digiboost_shortcode_atts_gallery_trigger(false);
            $galleries_images_count = count($galleries_images);

            if ($galleries_images_count) {
                $is_gallery = true;
                $gallery_css_class = 'item-media-gallery';
            }
        } //gallery post format

        if (post_password_required() || is_attachment() || (!has_post_thumbnail() && !$is_gallery && !$iframe)) {
            return false;
        }

        //adding additional wrap for small image layout feed
        if (!is_single() && $small_image) :
            ?>
            <div class="<?php echo esc_attr($small_image); ?>">
        <?php
        endif; //!is_single and small image

        if (!$iframe) :
            ?>

        <?php endif; //iframe
        ?>
        <div class="item-media entry-thumbnail post-thumbnail <?php echo esc_attr($gallery_css_class . ' ' . $cover_image); ?>">
            <?php
            // info in corner only for feed view and only for posts
            if ($date_in_corner && (!is_single()) && ('post' === get_post_type())) : ?>
                <div class="entry-meta-corner">
                    <?php
                    // Set up and print post meta information.
                    printf('<span class="date">
									<time class="entry-date" datetime="%1$s">
										<span class="day">%2$s</span><span class="month">%3$s</span>
									</time>
								</span>',

                        esc_attr(get_the_date('c')),
                        esc_html(get_the_date('j')),
                        esc_html(get_the_date('M'))
                    );

                    // Set up and print post meta information.
                    if (!post_password_required() && (comments_open() || get_comments_number())) :
                        ?>
                        <span class="comments-link">
								<i class="fa fa-comment color-main"></i>
								<?php comments_popup_link(esc_html__('0', 'digiboost'), esc_html__('1', 'digiboost'), esc_html__('%', 'digiboost')); ?>
						</span>
                    <?php
                    endif; //post_password_required
                    ?>
                </div><!-- .entry-meta-corner -->
            <?php endif; //!is_single && 'post'
            if (!is_single() && !$iframe && !('fw-portfolio' === get_post_type())) : ?>
                <div class="media-links">
                    <a class="abs-link" href="<?php the_permalink(); ?>"></a>
                </div>
            <?php endif; //!is_single check
            //featured image only for post
            if (!$is_gallery) :
                if ($iframe) : ?>
                    <div class="embed-responsive embed-responsive-21by9">
                    <?php if (has_post_thumbnail()): ?>
                        <a href="" data-iframe="<?php echo esc_attr($iframe) ?>" class="embed-placeholder">
                    <?php
                    else:
                        echo wp_kses($iframe, array('iframe' => array(
                            'width' => true,
                            'height' => true,
                            'src' => true,
                            'frameborder' => true,
                            'allowfullscreen' => true,
                        ),));
                    endif; //has_post_thumbnail inside iframe check
                endif; // iframe check

                if (
                    !(is_single() && !$small_image)
                    || ('fw-event' === get_post_type())
                    || (is_single() && $iframe)
                ) {
                    $atts = array();
                    if ($iframe) {
                        $atts['class'] = 'embed-responsive-item';
                    }
                    the_post_thumbnail('digiboost-full-width', $atts);
                } elseif (!is_single() && $small_image) {
                    the_post_thumbnail('digiboost-small-width');
                } else {

                    the_post_thumbnail();
                } //$current_position

                // creating post link for whole featured image

                if ($iframe):
                    if (has_post_thumbnail()) :
                        ?>
                        </a><!-- eof image link -->
                    <?php endif; //post thumbnail check for closing A tag
                    ?>
                    </div>
                <?php endif; //iframe check

            // gallery
            else :
                //featured image url
                $post_featured_image_src = wp_get_attachment_image_src(get_post_thumbnail_id($pID), 'post-thumbnail');
                ?>
                <div id="owl-carousel-<?php echo esc_attr($pID); ?>" class="owl-carousel"
                     data-margin="0"
                     data-nav="true"
                     data-dots="false"
                     data-themeclass="owl-theme entry-thumbnail-carousel"
                     data-center="false"
                     data-items="1"
                     data-loop="true"
                     data-autoplay="true"
                     data-speed="<?php digiboost_slide_speed(); ?>"
                     data-responsive-xs="1"
                     data-responsive-sm="1"
                     data-responsive-md="1"
                     data-responsive-lg="1"
                     data-responsive-xl="1"
                >
                    <?php
                    //adding featured image as a first element in carousel
                    if ($post_featured_image_src) : ?>
                        <div class="item">
                            <img src="<?php echo esc_attr($post_featured_image_src[0]); ?>"
                                 alt="<?php echo esc_attr(get_the_title($pID)); ?>">
                        </div>
                    <?php endif;
                    $count = 1;
                    foreach ($galleries_images as $gallerie) :
                        foreach ($gallerie as $src) :
                            //showing only 3 images from gallery
                            if ($count > 3) {
                                break 2;
                            }
                            ?>
                            <div class="item">
                                <img src="<?php echo esc_attr($src); ?>"
                                     alt="<?php echo esc_attr(get_the_title($pID)); ?>">
                            </div>
                            <?php
                            $count++;
                        endforeach;
                    endforeach; ?>
                </div>
            <?php
            endif; // $is_gallery
            ?>
        </div> <!-- .item-media -->
        <?php if (!$iframe) : ?>

    <?php
    endif; //iframe
        //closing additional wrap for small image layout feed
        if (!is_single() && $small_image) : ?>
            </div> <!-- eof .col-md-6 -->
        <?php endif;
    }
endif;//digiboost_post_thumbnail()


//pagination default args in one place
if (!function_exists('digiboost_get_default_pagination_args_array')) :
    function digiboost_get_default_pagination_args_array()
    {
        return array(
            'prev_text' => '<i class="fa fa-chevron-left"></i>',
            'next_text' => '<i class="fa fa-chevron-right"></i>',
        );
    }
endif;

//helper for actions - echo closing div
if (!function_exists('digiboost_echo_closing_div')) :
    function digiboost_echo_closing_div()
    {
        echo '</div>';
    }
endif;
