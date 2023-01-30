<?php

namespace Layerdrops\Polimark\Widgets;


class Portfolio extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-portfolio';
    }

    public function get_title()
    {
        return __('Portfolio', 'polimark-addon');
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
                    'layout_four' => __('Layout Four', 'polimark-addon'),
                    'layout_five' => __('Layout Five', 'polimark-addon'),
                ]
            ]
        );


        $this->end_controls_section();

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
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
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
                        'max' => 12,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 6,
                ],
                'condition' => [
                    'layout_type' => 'layout_one'
                ],
            ]
        );

        $this->add_control(
            'show_filter',
            [
                'label' => __('Enable Filter', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'polimark-addon'),
                'label_off' => __('Hide', 'polimark-addon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'category_count',
            [
                'label' => __('Number Of Category', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 0,
                        'max' => 8,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 6,
                ],
                'condition' => [
                    'show_filter' => 'yes'
                ]
            ]
        );



        $this->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'polimark-addon'),
                'label_block' => true,
                'condition' => [
                    'layout_type' => 'layout_four'
                ],
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __('Button Url', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'polimark-addon'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'layout_type' => 'layout_four'
                ],
            ]
        );

        $this->add_control(
            'bg_shapes',
            [
                'label' => __('Background Shapes', 'zimed-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <!-- Gallery Section -->
            <section class="gallery-section">
                <div class="auto-container">
                    <!--MixitUp Galery-->
                    <div class="mixitup-gallery">
                        <div class="upper-row clearfix">
                            <?php if (!empty($settings['title'])) : ?>
                                <div class="sec-title">
                                    <h2><?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?></h2>
                                </div>
                            <?php endif; ?>

                            <?php

                            $portfolio_category = get_terms('portfolio_cat', array(
                                'hide_empty' => true,
                                'number' => $settings['category_count']['size'],
                            ));

                            ?>

                            <?php if ('yes' === $settings['show_filter'] && !empty($portfolio_category) && !is_wp_error($portfolio_category)) : ?>
                                <!--Filter-->
                                <div class="filters clearfix">
                                    <ul class="filter-tabs filter-btns clearfix ml-0 list-unstyled">
                                        <li class="active filter" data-role="button" data-filter="all"><?php esc_html_e('All', 'polimark-addon'); ?><sup>[<?php echo esc_html($settings['post_count']['size']); ?>]</sup></li>
                                        <?php foreach ($portfolio_category as $category) : ?>
                                            <li class="filter" data-role="button" data-filter=".<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?><sup>[<?php echo esc_html($category->count); ?>]</sup>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="filter-list row">
                            <?php
                            $post_query = new \WP_Query(array(
                                'post_type' => 'portfolio',
                                'posts_per_page' => $settings['post_count']['size'],
                            ));
                            ?>
                            <?php while ($post_query->have_posts()) : ?>
                                <?php $post_query->the_post(); ?>
                                <?php $category =  get_the_terms(get_the_iD(), 'portfolio_cat'); ?>
                                <!-- Gallery Item -->
                                <div class="gallery-item mix all <?php
                                                                    foreach ($category as $cat) {
                                                                        echo esc_attr(' ' . $cat->slug);
                                                                    }
                                                                    ?> col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <figure class="image"><?php the_post_thumbnail('polimark_370X426'); ?></figure>
                                        <a href="<?php echo esc_url(get_the_post_thumbnail_url(get_the_iD(), 'full')); ?>" class="lightbox-image overlay-box" data-fancybox="gallery"></a>
                                        <div class="cap-box">
                                            <div class="cap-inner">
                                                <div class="cat"><span><?php echo esc_html($category[0]->name); ?></span></div>
                                                <div class="title">
                                                    <h5><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'polimark_allowed_tags'); ?></a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>

                    </div>

                </div>
            </section>
        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>
            <!-- Gallery Section -->
            <section class="gallery-section-two">
                <div class="auto-container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>
                </div>
                <!--Porfolio Tabs-->
                <div class="project-tab">
                    <div class="auto-container">
                        <div class="tab-btns-box">

                            <?php
                            $portfolio_layout_two_category_count = 1;
                            $portfolio_layout_two_category_active_class = '';

                            $portfolio_two_category = get_terms('portfolio_cat', array(
                                'hide_empty' => true,
                                'number' => $settings['category_count']['size'],
                            ));

                            ?>
                            <?php if ('yes' === $settings['show_filter'] && !empty($portfolio_two_category) && !is_wp_error($portfolio_two_category)) : ?>

                                <!--Tabs Header-->
                                <div class="tabs-header">
                                    <ul class="product-tab-btns clearfix ml-0 list-unstyled">

                                        <!--Filter-->

                                        <?php foreach ($portfolio_two_category as $category) : ?>
                                            <?php if (1 == $portfolio_layout_two_category_count) {
                                                $portfolio_layout_two_category_active_class = 'active-btn';
                                            } else {
                                                $portfolio_layout_two_category_active_class = '';
                                            } ?>
                                            <li class="p-tab-btn <?php echo esc_attr($portfolio_layout_two_category_active_class); ?>" data-tab="#p-tab-<?php echo esc_attr($portfolio_layout_two_category_count); ?>"><?php echo esc_html($category->name); ?><sup>[<?php echo esc_html($category->count); ?>]</sup></li>
                                            <?php $portfolio_layout_two_category_count++; ?>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <!--Tabs Content-->
                    <div class="p-tabs-content">
                        <?php $portfolio_layout_two_post_count = 1;
                        $portfolio_layout_two_post_active_class = ''; ?>
                        <?php if (!empty($portfolio_two_category) && !is_wp_error($portfolio_two_category)) : ?>
                            <?php foreach ($portfolio_two_category as $category) : ?>
                                <?php if (1 == $portfolio_layout_two_post_count) {
                                    $portfolio_layout_two_post_active_class = 'active-tab';
                                } else {
                                    $portfolio_layout_two_post_active_class = '';
                                } ?>
                                <!--Portfolio Tab / Active Tab-->
                                <div class="p-tab <?php echo esc_attr($portfolio_layout_two_post_active_class); ?>" id="p-tab-<?php echo esc_attr($portfolio_layout_two_post_count); ?>">
                                    <div class="project-carousel owl-theme owl-carousel">
                                        <?php
                                        $portfolio_layout_two_query = new \WP_Query(array(
                                            'post_type' => 'portfolio',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'portfolio_cat',
                                                    'field'    => 'slug',
                                                    'terms'    => $category->slug,
                                                ),
                                            ),
                                            'posts_per_page' => -1,
                                        ));
                                        ?>

                                        <?php while ($portfolio_layout_two_query->have_posts()) : ?>
                                            <?php $portfolio_layout_two_query->the_post(); ?>

                                            <?php $portfolio_layout_two =  get_the_terms(get_the_iD(), 'portfolio_cat'); ?>

                                            <!-- Gallery Item -->
                                            <div class="gallery-item">
                                                <div class="inner-box">
                                                    <figure class="image"><?php the_post_thumbnail('polimark_470X426'); ?></figure>
                                                    <a href="<?php echo esc_url(get_the_post_thumbnail_url(get_the_iD(), 'full')); ?>" class="lightbox-image overlay-box" data-fancybox="gallery"></a>
                                                    <div class="cap-box">
                                                        <div class="cap-inner">
                                                            <div class="cat"><span><?php echo esc_html($portfolio_layout_two[0]->name); ?></span></div>
                                                            <div class="title">
                                                                <h5><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'polimark_allowed_tags'); ?></a></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                </div>
                                <?php $portfolio_layout_two_post_count++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>


                    </div>

                </div>
            </section>
        <?php endif; ?>


        <?php if ('layout_three' === $settings['layout_type']) : ?>

            <!-- Gallery Section -->
            <section class="gallery-section-two alternate">
                <div class="auto-container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>

                </div>
                <!--Porfolio Tabs-->
                <div class="project-tab">
                    <div class="auto-container">
                        <div class="tab-btns-box">

                            <?php
                            $portfolio_layout_two_category_count = 1;
                            $portfolio_layout_two_category_active_class = '';

                            $portfolio_two_category = get_terms('portfolio_cat', array(
                                'hide_empty' => true,
                                'number' => $settings['category_count']['size'],
                            ));

                            ?>
                            <?php if ('yes' === $settings['show_filter'] && !empty($portfolio_two_category) && !is_wp_error($portfolio_two_category)) : ?>
                                <!--Tabs Header-->
                                <div class="tabs-header">
                                    <ul class="product-tab-btns clearfix ml-0 list-unstyled">

                                        <!--Filter-->
                                        <li class="filters clearfix">
                                            <ul class="filter-tabs filter-btns clearfix m-0 list-unstyled">

                                                <?php foreach ($portfolio_two_category as $category) : ?>
                                                    <?php if (1 == $portfolio_layout_two_category_count) {
                                                        $portfolio_layout_two_category_active_class = 'active-btn';
                                                    } else {
                                                        $portfolio_layout_two_category_active_class = '';
                                                    } ?>
                                                    <li class="p-tab-btn <?php echo esc_attr($portfolio_layout_two_category_active_class); ?>" data-tab="#p2-tab-<?php echo esc_attr($portfolio_layout_two_category_count); ?>"><?php echo esc_html($category->name); ?><sup>[<?php echo esc_html($category->count); ?>]</sup></li>
                                                    <?php $portfolio_layout_two_category_count++; ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>

                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="auto-container">
                        <!--Tabs Content-->
                        <div class="p-tabs-content">

                            <?php $portfolio_layout_two_post_count = 1;
                            $portfolio_layout_two_post_active_class = ''; ?>
                            <?php if (!empty($portfolio_two_category) && !is_wp_error($portfolio_two_category)) : ?>
                                <?php foreach ($portfolio_two_category as $category) : ?>
                                    <?php if (1 == $portfolio_layout_two_post_count) {
                                        $portfolio_layout_two_post_active_class = 'active-tab';
                                    } else {
                                        $portfolio_layout_two_post_active_class = '';
                                    } ?>
                                    <!--Portfolio Tab / Active Tab-->
                                    <div class="p-tab <?php echo esc_attr($portfolio_layout_two_post_active_class); ?>" id="p2-tab-<?php echo esc_attr($portfolio_layout_two_post_count); ?>">
                                        <div class="project-carousel-two owl-theme owl-carousel">
                                            <?php
                                            $portfolio_layout_two_query = new \WP_Query(array(
                                                'post_type' => 'portfolio',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'portfolio_cat',
                                                        'field'    => 'slug',
                                                        'terms'    => $category->slug,
                                                    ),
                                                ),
                                                'posts_per_page' => -1,
                                            ));
                                            ?>

                                            <?php while ($portfolio_layout_two_query->have_posts()) : ?>
                                                <?php $portfolio_layout_two_query->the_post(); ?>

                                                <?php $portfolio_layout_two =  get_the_terms(get_the_iD(), 'portfolio_cat'); ?>

                                                <!-- Gallery Item -->
                                                <div class="gallery-item">
                                                    <div class="inner-box">
                                                        <figure class="image"><?php the_post_thumbnail('polimark_370X426'); ?></figure>
                                                        <a href="<?php echo esc_url(get_the_post_thumbnail_url(get_the_iD(), 'full')); ?>" class="lightbox-image overlay-box" data-fancybox="gallery"></a>
                                                        <div class="cap-box">
                                                            <div class="cap-inner">
                                                                <div class="cat"><span><?php echo esc_html($portfolio_layout_two[0]->name); ?></span></div>
                                                                <div class="title">
                                                                    <h5><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'polimark_allowed_tags'); ?></a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                            <?php wp_reset_postdata(); ?>
                                        </div>
                                    </div>
                                    <?php $portfolio_layout_two_post_count++; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </section>


        <?php endif; ?>

        <?php if ('layout_four' === $settings['layout_type']) : ?>

            <section class="portfolio-masonary">
                <div class="container">
                    <?php if (!empty($settings['title'])) : ?>
                        <h3><?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?></h3>
                        <hr class="porfolio-masonary__separator">
                    <?php endif; ?>


                    <?php

                    $portfolio_category = get_terms('portfolio_cat', array(
                        'hide_empty' => true,
                        'number' => $settings['category_count']['size'],
                    ));

                    ?>

                    <div class="portfolio-masonary__filter-wrapper mixitup-gallery">
                        <?php if ('yes' === $settings['show_filter'] && !empty($portfolio_category) && !is_wp_error($portfolio_category)) : ?>
                            <ul class="ml-0 post-filter filter-btns clearfix filters has-dynamic-filter-counter">
                                <li class="active filter" data-role="button" data-filter=".filter-item"><?php esc_html_e('All', 'polimark-addon'); ?></li>
                                <?php foreach ($portfolio_category as $category) : ?>
                                    <li class="filter" data-role="button" data-filter=".<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        <?php endif; ?>

                        <a href="<?php echo esc_url(get_post_type_archive_link('portfolio')); ?>" class="portfolio-masonary__more"><?php echo esc_html__('View All', 'polimark-addon'); ?></a>
                        <!-- /.portfolio-masonary__more -->
                    </div><!-- /.portfolio-masonary__filter-wrapper -->

                    <div class="row filter-layout masonary-layout">
                        <?php
                        $post_query = new \WP_Query(array(
                            'post_type' => 'portfolio',
                            'orderby' => 'date',
                            'order' => 'ASC',
                            'posts_per_page' => $settings['post_count']['size'],
                        ));
                        ?>

                        <?php while ($post_query->have_posts()) : ?>
                            <?php $post_query->the_post(); ?>
                            <?php $category =  get_the_terms(get_the_iD(), 'portfolio_cat'); ?>


                            <div class="col-lg-6 filter-item masonary-item <?php
                                                                            foreach ($category as $cat) {
                                                                                echo esc_attr(' ' . $cat->slug);
                                                                            }
                                                                            ?> ">
                                <div class="portfolio-masonary__box">
                                    <?php the_post_thumbnail('polimark_570X0'); ?>
                                    <div class="portfolio-masonary__box-content">
                                        <p><?php echo esc_html($category[0]->name); ?></p>
                                        <h4><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'polimark_allowed_tags'); ?></a></h4>
                                    </div><!-- /.portfolio-masonary__box-content -->
                                </div><!-- /.portfolio-masonary__box -->
                            </div><!-- /.col-lg-6 -->

                        <?php endwhile; ?>
                    </div><!-- /.row -->
                    <?php if (!empty($settings['button_label'])) : ?>
                        <div class="text-center">
                            <a class="theme-btn btn-style-one" href="<?php echo esc_url($settings['button_url']['url']); ?>">
                                <i class="btn-curve"></i>
                                <span class="btn-title"><?php echo esc_html($settings['button_label']); ?></span>
                            </a>
                        </div><!-- /.text-center -->
                    <?php endif; ?>
                </div><!-- /.container -->
            </section><!-- /.portfolio-masonary -->
        <?php endif; ?>
        <?php if ('layout_five' === $settings['layout_type']) : ?>

            <section class="portfolio-horizontal">
                <?php $bg_shapes_count = 1;
                foreach ($settings['bg_shapes'] as $bg_shape) {
                    echo '<img src="' . $bg_shape['url'] . '" class="portfolio-horizontal__shape-' . $bg_shapes_count . '" alt="">';
                    $bg_shapes_count++;
                }
                ?>
                <div class="auto-container">
                    <div class="owl-carousel owl-theme portfolio-horizontal__carousel">
                        <?php
                        $portfolio_horizontal_query = new \WP_Query(array(
                            'post_type' => 'portfolio',
                            'orderby' => 'date',
                            'order' => 'ASC',
                            'posts_per_page' => $settings['post_count']['size'],
                        ));
                        ?>
                        <?php while ($portfolio_horizontal_query->have_posts()) : ?>
                            <?php $portfolio_horizontal_query->the_post(); ?>
                            <?php $portfolio_horizontal_category =  get_the_terms(get_the_iD(), 'portfolio_cat'); ?>

                            <div class="item">
                                <div class="portfolio-horizontal__card">
                                    <a href="<?php echo esc_url(get_the_post_thumbnail_url(get_the_iD(), 'full')); ?>" class="lightbox-image"><?php the_post_thumbnail('polimark_380X0'); ?></a>
                                    <span class="portfolio-horizontal__category"><?php echo esc_html($portfolio_horizontal_category[0]->name); ?></span>
                                    <h3 class="portfolio-horizontal__card__title">
                                        <a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'polimark_allowed_tags'); ?></a>
                                    </h3><!-- /.portfolio-horizontal__card__title -->
                                </div><!-- /.portfolio-horizontal__card -->
                            </div><!-- /.item -->

                        <?php endwhile; ?>
                    </div><!-- /.owl-carousel owl-theme portfolio-horizontal__carousel -->
                </div><!-- /.auto-container -->
            </section><!-- /.portfolio-horizontal -->
        <?php endif; ?>


<?php
    }

    protected function _content_template()
    {
    }
}
