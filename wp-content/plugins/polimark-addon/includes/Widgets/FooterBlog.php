<?php

namespace Layerdrops\Polimark\Widgets;


class FooterBlog extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-blog';
    }

    public function get_title()
    {
        return __('Footer Blog Posts', 'polimark-addon');
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
            'content_section',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Add Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore', 'polimark-addon')
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
                        'max' => 6,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 2,
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="footer-widget blog-widget">
            <div class="widget-content">
                <h3 class="footer-widget__title"><?php echo esc_html($settings['title']); ?></h3>

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
                    <div class="footer-widget__news">
                        <div class="image-box">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('polimark_90x90'); ?>
                            </a>
                        </div>
                        <div class="content-box">
                            <ul class="list-unstyled footer-widget__news__meta">
                                <?php
                                $post_category =  get_the_terms(get_the_ID(), 'category'); ?>
                                <?php if ($post_category) : ?>
                                    <li><?php echo esc_html($post_category[0]->name); ?></li>
                                <?php endif; ?>
                                <li><?php echo get_the_date('M d, Y'); ?></li>
                            </ul>
                            <h3>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                        </div><!-- /.content-box -->

                    </div>
                <?php endwhile; ?>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
