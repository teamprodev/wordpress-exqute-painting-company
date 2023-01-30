<?php

namespace Layerdrops\Polimark\Widgets;


class Blog extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-blog';
    }

    public function get_title()
    {
        return __('Blog', 'polimark-addon');
    }

    public function get_icon()
    {
        return 'eicon-cogs';
    }

    public function get_categories()
    {
        return ['polimark-category'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'layout_section',
            [
                'label' => __('Layout', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'layout_type',
            [
                'label' => __('Select Layout', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'layout_one',
                'options' => [
                    'layout_one' => __('Layout One', 'polimark-addon'),
                    'layout_two' => __('Layout Two', 'polimark-addon'),
                    'layout_three' => __('Layout Three', 'polimark-addon'),
                ]
            ]
        );



        $this->add_control(
            'pagination_status',
            [
                'label' => __('Enable Pagination?', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'polimark-addon'),
                'label_off' => __('No', 'polimark-addon'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );




        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Post Options', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'tagline',
            [
                'label' => __('Tagline', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Tagline', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'post_count',
            [
                'label' => __('Number Of Posts', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 0,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 6,
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' == $settings['layout_type']) : ?>

            <!-- News Section -->
            <section class="blog-two">
                <div class="container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="block-heading text-center">
                            <?php if (!empty($settings['tagline'])) : ?>
                                <p class="block-heading__text">
                                    <?php echo wp_kses($settings['tagline'], 'polimark_allowed_tags'); ?>
                                </p><!-- /.block-heading__text -->
                            <?php endif; ?>
                            <?php if (!empty($settings['title'])) : ?>
                                <h2 class="block-heading__title">
                                    <?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?>
                                </h2><!-- /.block-heading__title -->
                            <?php endif; ?>
                        </div><!-- /.block-heading -->
                    <?php endif; ?>

                    <div class="row">
                        <?php
                        $blog_post_one_query_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $blog_post_one_query_args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true,
                            'paged'          => $blog_post_one_query_paged,
                            'posts_per_page' => $settings['post_count']['size']
                        );
                        $blog_post_one_query = new \WP_Query($blog_post_one_query_args);
                        ?>
                        <?php while ($blog_post_one_query->have_posts()) :
                            $blog_post_one_query->the_post(); ?>
                            <!--News Block-->
                            <div class="col-lg-4 col-md-6 col-sm-12">

                                <div class="blog-two__card">
                                    <div class="blog-two__image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('polimark_370x228'); ?>

                                            <div class="blog-two__date">
                                                <?php echo get_the_date('d M'); ?>
                                            </div><!-- /.blog-two__date -->
                                        </a>
                                    </div><!-- /.blog-two__image -->
                                    <div class="blog-two__content">
                                        <ul class="blog-two__meta list-unstyled">
                                            <?php if (function_exists('polimark_posted_by')) : ?>
                                                <li><?php polimark_posted_by(); ?></li>
                                            <?php endif; ?>
                                            <?php if (function_exists('polimark_comment_count') && !is_single() && !post_password_required() && (comments_open() || get_comments_number())) : ?>
                                                <li><?php polimark_comment_count(); ?></li>
                                            <?php endif; ?>
                                        </ul><!-- /.blog-two__meta -->
                                        <h3 class="blog-two__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <?php if (function_exists('polimark_excerpt')) : ?>
                                            <div class="blog-two__text">
                                                <?php polimark_excerpt(20); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div><!-- /.blog-two__content -->
                                </div><!-- /.blog-two__card -->
                            </div>
                        <?php endwhile; ?>
                        <?php if ('yes' == $settings['pagination_status']) : ?>
                            <div class="col-lg-12">
                                <div class="blog-pagination blog-post-pagination justify-content-center">
                                    <?php polimark_custom_query_pagination($blog_post_one_query_paged, $blog_post_one_query->max_num_pages); ?>
                                </div><!-- /.blog-post-pagination -->
                            </div><!-- /.col-lg-12 -->
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>


<?php
    }

    protected function _content_template()
    {
    }
}
