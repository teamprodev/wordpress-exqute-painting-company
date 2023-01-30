<?php

namespace Layerdrops\Polimark\Frontend;

/**
 * Shortcode handler class
 */
class Shortcodes
{

    /**
     * Initializes the class
     */
    function __construct()
    {
        add_shortcode('polimark-footer', [$this, 'render_footer_shortcode']);
        add_shortcode('polimark-header', [$this, 'render_header_shortcode']);
        add_shortcode('polimark-team', [$this, 'render_team_shortcode']);
        add_shortcode('polimark-team-two', [$this, 'render_team_two_shortcode']);
        add_shortcode('polimark-team-three', [$this, 'render_team_three_shortcode']);
        add_shortcode('polimark-event', [$this, 'render_event_shortcode']);
        add_shortcode('polimark-event-two', [$this, 'render_event_two_shortcode']);
        add_shortcode('polimark-service-two', [$this, 'render_service_two_shortcode']);
        add_shortcode('polimark-pricing', [$this, 'render_pricing_shortcode']);
        add_shortcode('polimark-testimonials', [$this, 'render_testimonials_shortcode']);
    }

    /**
     * Shortcode handler class
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_footer_shortcode($atts, $content = '')
    {
        // the query
        $query_args = array(
            'p' => $atts['id'],
            'post_type' => 'footer',
        );
        $post_query = new \WP_Query($query_args); ?>

        <?php if ($post_query->have_posts()) : ?>
            <!-- the loop -->
            <?php while ($post_query->have_posts()) : $post_query->the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
            <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php esc_html__('Sorry, no posts matched your criteria.', 'polimark-addon'); ?></p>
        <?php endif;
    }

    /**
     * shortcode handler for header
     * @param array $atts
     * @param string $content
     */
    public function render_header_shortcode($atts, $content = '')
    {
        // the query
        $query_args = array(
            'p' => $atts['id'],
            'post_type' => 'header',
        );
        $post_query = new \WP_Query($query_args); ?>

        <?php if ($post_query->have_posts()) : ?>
            <!-- the loop -->
            <?php while ($post_query->have_posts()) : $post_query->the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
            <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php esc_html__('Sorry, no posts matched your criteria.', 'polimark-addon'); ?></p>
        <?php endif;
    }

    /**
     * Shortcode for team post one
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_team_shortcode($atts, $content = '')
    {
        ob_start(); ?>

        <?php
        $post_query = new \WP_Query(array(
            'post_type' => 'team',
            'posts_per_page' => $atts['post_count'],
            'tax_query' => array(
                array(
                    'taxonomy' => 'team_cat',
                    'field' => 'term_id',
                    'terms' => $atts['select_category']
                )
            )
        ));
        while ($post_query->have_posts()) :
            $post_query->the_post(); ?>
            <!--Service Block-->
            <div class=" col-lg-6 col-md-12 col-sm-12">
                <div class="team-card">

                    <div class="team-card__top">
                        <div class="team-card__image">
                            <?php the_post_thumbnail('polimark_192x192'); ?>
                        </div><!-- /.team-card__image -->
                        <div class="team-card__meta">
                            <h3 class="team-card__title">
                                <?php the_title(); ?>
                            </h3><!-- /.team-card__title -->
                            <p class="team-card__tagline">
                                <?php echo wp_kses(get_post_meta(get_the_ID(), 'polimark_tagline', true), 'polimark_allowed_tags'); ?>
                            </p><!-- /.team-card__tagline -->
                            <p class="team-card__designation">
                                <?php echo wp_kses(get_post_meta(get_the_ID(), 'polimark_designation', true), 'polimark_allowed_tags'); ?>
                            </p><!-- /.team-card__designation -->
                            <ul class="list-unstyled team-card__social">
                                <?php $team_socials = get_post_meta(get_the_ID(), 'polimark_team_social', true); ?>
                                <?php if (!empty($team_socials)) : ?>
                                    <?php foreach ($team_socials as $social) : ?>
                                        <li><a href="<?php echo esc_url($social['polimark_link']); ?>"><span class="fab <?php echo esc_attr($social['polimark_icon']); ?>"></span></a></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul><!-- /.list-unstyled team-card__social -->
                        </div>
                    </div><!-- /.team-card__top -->
                    <div class="team-card__text">
                        <?php echo wp_kses(get_post_meta(get_the_ID(), 'polimark_desceptions', true), 'polimark_allowed_tags'); ?>
                    </div><!-- /.team-card__text -->
                    <img src="<?php echo esc_attr(get_post_meta(get_the_ID(), 'polimark_signeture_image', true)); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                </div>
            </div><!-- /.team-card -->
        <?php endwhile;
        wp_reset_postdata();

        return ob_get_clean();
    }
    /**
     * Shortcode for team post two
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_team_two_shortcode($atts, $content = '')
    {
        ob_start(); ?>

        <?php
        $post_query = new \WP_Query(array(
            'post_type' => 'team',
            'posts_per_page' => $atts['post_count'],
            'tax_query' => array(
                array(
                    'taxonomy' => 'team_cat',
                    'field' => 'term_id',
                    'terms' => $atts['select_category']
                )
            )
        ));
        while ($post_query->have_posts()) :
            $post_query->the_post(); ?>
            <!--Service Block-->
            <div class=" col-lg-4 col-md-6 col-sm-12">
                <div class="team-card-two">
                    <div class="team-card-two__image">
                        <?php the_post_thumbnail('polimark_320x320'); ?>
                        <div class=" team-card-two__social">
                            <div class="team-card-two__social__icon">
                                <i class="fa fa-share-alt"></i>
                            </div><!-- /.team-card-two__social__icon -->
                            <div class="team-card-two__social__content">
                                <?php $team_socials = get_post_meta(get_the_ID(), 'polimark_team_social', true); ?>
                                <?php if (!empty($team_socials)) : ?>
                                    <?php foreach ($team_socials as $social) : ?>
                                        <div class="team-card-two__social__item"><a href="<?php echo esc_url($social['polimark_link']); ?>"><span class="fab <?php echo esc_attr($social['polimark_icon']); ?>"></span></a></div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div><!-- /.team-card-two__social__content -->
                        </div><!-- /.team-card-two__social -->
                    </div><!-- /.team-card-two__image -->
                    <div class="team-card-two__content">
                        <h3 class="team-card-two__title">
                            <?php the_title(); ?>
                        </h3><!-- /.team-card-two__title -->
                        <p class="team-card-two__designation">
                            <?php echo wp_kses(get_post_meta(get_the_ID(), 'polimark_designation', true), 'polimark_allowed_tags'); ?>
                        </p><!-- /.team-card-two__designation -->
                    </div><!-- /.team-card-two__content -->
                </div>
            </div><!-- /.team-card -->
        <?php endwhile;
        wp_reset_postdata();

        return ob_get_clean();
    }
    /**
     * Shortcode for team post two
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_team_three_shortcode($atts, $content = '')
    {
        ob_start(); ?>

        <?php
        $post_query = new \WP_Query(array(
            'post_type' => 'team',
            'posts_per_page' => $atts['post_count'],
            'tax_query' => array(
                array(
                    'taxonomy' => 'team_cat',
                    'field' => 'term_id',
                    'terms' => $atts['select_category']
                )
            )
        ));
        while ($post_query->have_posts()) :
            $post_query->the_post(); ?>
            <!--Team Block-->
            <div class="item">
                <div class="team-card-two">
                    <div class="team-card-two__image">
                        <?php the_post_thumbnail('polimark_320x320'); ?>
                        <div class=" team-card-two__social">
                            <div class="team-card-two__social__icon">
                                <i class="fa fa-share-alt"></i>
                            </div><!-- /.team-card-two__social__icon -->
                            <div class="team-card-two__social__content">
                                <?php $team_socials = get_post_meta(get_the_ID(), 'polimark_team_social', true); ?>
                                <?php if (!empty($team_socials)) : ?>
                                    <?php foreach ($team_socials as $social) : ?>
                                        <div class="team-card-two__social__item"><a href="<?php echo esc_url($social['polimark_link']); ?>"><span class="fab <?php echo esc_attr($social['polimark_icon']); ?>"></span></a></div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div><!-- /.team-card-two__social__content -->
                        </div><!-- /.team-card-two__social -->
                    </div><!-- /.team-card-two__image -->
                    <div class="team-card-two__content">
                        <h3 class="team-card-two__title">
                            <?php the_title(); ?>
                        </h3><!-- /.team-card-two__title -->
                        <p class="team-card-two__designation">
                            <?php echo wp_kses(get_post_meta(get_the_ID(), 'polimark_designation', true), 'polimark_allowed_tags'); ?>
                        </p><!-- /.team-card-two__designation -->
                    </div><!-- /.team-card-two__content -->
                </div>
            </div><!-- /.team-card -->
        <?php endwhile;
        wp_reset_postdata();

        return ob_get_clean();
    }
    /**
     * Shortcode for event post
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_event_shortcode($atts, $content = '')
    {
        ob_start(); ?>

        <?php
        $post_query = new \WP_Query(array(
            'post_type' => 'event',
            'posts_per_page' => $atts['post_count'],
            'tax_query' => array(
                array(
                    'taxonomy' => 'event_cat',
                    'field' => 'term_id',
                    'terms' => $atts['select_category']
                )
            )
        ));
        while ($post_query->have_posts()) :
            $post_query->the_post(); ?>
            <!--Service Block-->
            <div class=" col-lg-4 col-md-6 col-sm-12">
                <div class="recent-events-card">
                    <div class="recent-events-card__image">
                        <?php the_post_thumbnail('polimark_370x228'); ?>
                        <div class="recent-events-card__date">
                            <?php
                            $recent_event_date = get_post_meta(get_the_ID(), 'polimark_event_date', true);
                            $recentDateTimeFormatted = \DateTime::createFromFormat('m/d/Y', $recent_event_date);
                            echo esc_html($recentDateTimeFormatted->format('d M')); ?>
                        </div><!-- /.single-event-post__date -->
                    </div><!-- /.recent-events-card__image -->
                    <div class="recent-events-card__content">
                        <ul class="list-unstyled single-event-post__meta">
                            <li><i class="far fa-clock"></i> <?php echo esc_html(get_post_meta(get_the_ID(), 'polimark_event_time', true)); ?></li>
                            <li><i class="fa fa-location-arrow"></i><?php echo esc_html(get_post_meta(get_the_ID(), 'polimark_event_location', true)); ?></li>
                        </ul><!-- /.list-unstyled -->
                        <h3 class="recent-events-card__title">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="recent-events-card__link">
                            <?php esc_html_e('Read More', 'polimark-addon'); ?>
                        </a>

                    </div><!-- /.recent-events-card__content -->
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();

        return ob_get_clean();
    }
    /**
     * Shortcode for event two post
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_event_two_shortcode($atts, $content = '')
    {
        ob_start(); ?>

        <?php
        $post_query = new \WP_Query(array(
            'post_type' => 'event',
            'posts_per_page' => $atts['post_count'],
            'tax_query' => array(
                array(
                    'taxonomy' => 'event_cat',
                    'field' => 'term_id',
                    'terms' => $atts['select_category']
                )
            )
        ));
        while ($post_query->have_posts()) :
            $post_query->the_post(); ?>
            <!--Service Block-->
            <div class=" col-lg-12 col-md-12 col-sm-12">
                <div class="event-card">
                    <div class="event-card__inner">
                        <div class="event-card__image">
                            <?php the_post_thumbnail('polimark_456x498'); ?>
                        </div><!-- /.event-card__image -->
                        <div class="event-card__content">
                            <div class="event-card__date">
                                <i class="far fa-clock"></i>
                                <?php
                                $recent_event_date = get_post_meta(get_the_ID(), 'polimark_event_date', true);
                                $recentDateTimeFormatted = \DateTime::createFromFormat('m/d/Y', $recent_event_date);
                                echo esc_html($recentDateTimeFormatted->format('j F Y')); ?>
                            </div><!-- /.event-card__date -->
                            <h3 class="event-card__title">
                                <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                        </div><!-- /.event-card__content -->
                    </div><!-- /.event-card__inner -->
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();

        return ob_get_clean();
    }
    /**
     * Shortcode for testimonials post
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_testimonials_shortcode($atts, $content = '')
    {
        ob_start(); ?>

        <?php
        $post_query = new \WP_Query(array(
            'post_type' => 'testimonial',
            'posts_per_page' => $atts['post_count'],
        ));
        while ($post_query->have_posts()) :
            $post_query->the_post(); ?>
            <!--testimonial Block-->
            <div class="testimonial-card <?php echo esc_attr($atts['extra_class']); ?>">
                <div class="testimonial-card__content">
                    <div class="testimonial-card__content-inner">
                        <p><?php echo wp_kses(wp_trim_words(get_post_meta(get_the_ID(), 'polimark_content', true), $atts['word_count'], ''), 'polimark_allowed_tags'); ?></p>
                        <div class="testimonial-card__arrow"></div><!-- /.testimonial-card__arrow -->
                    </div><!-- /.testimonial-card__content-inner -->
                </div><!-- /.testimonial-card__content -->
                <div class="testimonial-card__image">
                    <?php the_post_thumbnail('polimark_60x60'); ?>
                </div><!-- /.testimonial-card__image -->
                <div class="testimonial-card__meta">
                    <h3 class="testimonial-card__title">
                        <?php the_title(); ?>
                    </h3>
                    <span class="testimonial-card__designation">
                        <?php echo wp_kses(get_post_meta(get_the_ID(), 'polimark_designation', true), 'polimark_allowed_tags'); ?>
                    </span><!-- /.testimonial-card__designation -->
                </div><!-- /.testimonial-card__meta -->
            </div>
        <?php endwhile;
        wp_reset_postdata();

        return ob_get_clean();
    }
    /**
     * Shortcode for service post two
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_service_two_shortcode($atts, $content = '')
    {
        ob_start();
        $post_query = new \WP_Query(array(
            'post_type' => 'service',
            'posts_per_page' => $atts['post_count'],
            'tax_query' => array(
                array(
                    'taxonomy' => 'service_cat',
                    'field' => 'term_id',
                    'terms' => $atts['select_category']
                )
            )
        ));
        while ($post_query->have_posts()) :
            $post_query->the_post(); ?>
            <!--Service Block-->
            <div class="service-block-two col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="bottom-curve"></div>
                    <div class="icon-box"><span class="<?php echo esc_attr(get_post_meta(get_the_iD(), 'polimark_select_service_icon', true)); ?>"></span></div>
                    <h5><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'polimark_allowed_tags'); ?></a></h5>
                    <div class="text"><?php echo wp_kses(polimark_excerpt(10), 'polimark_allowed_tags'); ?></div>
                    <div class="link-box"><a href="<?php the_permalink(); ?>"><span class="fa fa-angle-right"></span></a></div>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
        return ob_get_clean();
    }
    /**
     * Shortcode For pricing post one
     *
     * @param array $atts
     * @param string $content
     *
     * @return string
     **/
    public function render_pricing_shortcode($atts, $content = "")
    {
        ob_start();

        $post_query = new \WP_Query(array(
            'post_type' => 'pricing',
            'posts_per_page' => $atts['post_count'],
            'tax_query' => array(
                array(
                    'taxonomy' => 'pricing_cat',
                    'field' => 'term_id',
                    'terms' => $atts['select_category']
                )
            )
        ));
        while ($post_query->have_posts()) :
            $post_query->the_post(); ?>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="pricing-card">
                    <div class="pricing-card__icon">
                        <i class="<?php echo esc_attr(get_post_meta(get_the_ID(), "polimark_pricing_icon", true)); ?>"></i>
                    </div><!-- /.pricing-card__icon -->
                    <p class="pricing-card__name"><?php the_title(); ?></p>
                    <h3 class="pricing-card__amount">
                        <?php echo esc_html(get_post_meta(get_the_ID(), "polimark_pricing_currency", true)); ?>
                        <?php echo esc_html(get_post_meta(get_the_ID(), "polimark_pricing_renewal_fee", true)); ?>
                    </h3><!-- /.pricing-card__amount -->
                    <div class="pricing-card__bottom">
                        <?php $pricing_feature = get_post_meta(get_the_ID(), 'polimark_plan_options', true); ?>
                        <ul class="list-unstyled pricing-card__list">
                            <?php foreach ($pricing_feature as $feature) : ?>
                                <li>
                                    <?php $feature_tick_icon =  !empty($feature['polimark_feature_status']) && 'on' == $feature['polimark_feature_status'] ? "flaticon-check" : "flaticon-delete unavailable" ?>
                                    <i class="<?php echo esc_attr($feature_tick_icon); ?>"></i>
                                    <?php echo esc_html($feature['polimark_feature_name']); ?>

                                </li>
                            <?php endforeach; ?>
                        </ul><!-- /.list-unstyled pricing-card__list -->
                        <a class="theme-btn btn-style-one" href="<?php echo esc_url(get_post_meta(get_the_ID(), 'polimark_pricing_btn_url', true)); ?>">
                            <i class="btn-curve"></i>
                            <span class="btn-title"><?php echo esc_html(get_post_meta(get_the_ID(), 'polimark_pricing_btn_label', true)); ?></span>
                        </a>
                    </div><!-- /.pricing-card__bottom -->
                </div><!-- /.pricing-card -->
            </div><!-- /.col-sm-12 col-md-12 col-lg-4 -->

<?php endwhile;
        wp_reset_postdata();

        return ob_get_clean();
    }
}
