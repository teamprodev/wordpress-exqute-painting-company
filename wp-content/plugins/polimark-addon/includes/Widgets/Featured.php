<?php

namespace Layerdrops\Polimark\Widgets;


class Featured extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-featured';
    }

    public function get_title()
    {
        return __('Featured', 'polimark-addon');
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
            'title',
            [
                'label' => __('Section Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Awesome title', 'polimark-addon'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sub_text',
            [
                'label' => __('Section Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'polimark-addon'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );




        $feature_box = new \Elementor\Repeater();
        $feature_box->add_control(
            'title',
            [
                'label' => __('Box Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Awesome title', 'polimark-addon'),
                'label_block' => true,
            ]
        );
        $feature_box->add_control(
            'text',
            [
                'label' => __('Box Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'polimark-addon'),
                'label_block' => true,
            ]
        );
        $feature_box->add_control(
            'image',
            [
                'label' => __('Box Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $feature_box->add_control(
            'url',
            [
                'label' => __('Box URL', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'feature_boxes',
            [
                'label' => __('Feature Boxes', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $feature_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome title', 'polimark-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'content_two_section',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_two'
                ]
            ]
        );


        $feature_box_two = new \Elementor\Repeater();
        $feature_box_two->add_control(
            'title',
            [
                'label' => __('Box Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Awesome title', 'polimark-addon'),
                'label_block' => true,
            ]
        );
        $feature_box_two->add_control(
            'image',
            [
                'label' => __('Box Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $feature_box_two->add_control(
            'url',
            [
                'label' => __('Box URL', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'feature_boxes_two',
            [
                'label' => __('Feature Boxes', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $feature_box_two->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome title', 'polimark-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'layout_three_content',
            [
                'label' => __('Icon Box Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );

        $icon_lists = new \Elementor\Repeater();

        $icon_lists->add_control(
            'title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Education', 'polimark-addon'),
                'label_block' => true,
            ]
        );
        $icon_lists->add_control(
            'icon',
            [
                'label' => __('Select Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_fa_icons(),
            ]
        );
        $icon_lists->add_control(
            'url',
            [
                'label' => __('Box URL', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'icon_lists',
            [
                'label' => __('Icon Lists', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $icon_lists->get_controls(),
                'default' => [
                    [
                        'title' => __('Education', 'polimark-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <section class="featured-one">
                <div class="container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="block-heading text-center">
                            <?php if (!empty($settings['sub_text'])) : ?>
                                <p class="block-heading__text">
                                    <?php echo wp_kses($settings['sub_text'], 'polimark_allowed_tags'); ?>
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
                        <?php foreach ($settings['feature_boxes'] as $box) : ?>
                            <div class="col-md-12 col-lg-4">
                                <div class="featured-one__card">
                                    <div class="featured-one__card__inner">
                                        <div class="featured-one__card__image">
                                            <?php echo wp_get_attachment_image($box['image']['id'], 'polimark_370x228'); ?>
                                        </div><!-- /.featured-one__image -->
                                        <div class="featured-one__card__content">
                                            <?php if (!empty($box['title'])) : ?>
                                                <h2 class="featured-one__card__title">
                                                    <?php if (!empty($box['url'])) : ?>
                                                        <a href="<?php echo esc_url($box['url']); ?>"><?php echo wp_kses($box['title'], 'polimark_allowed_tags'); ?></a>
                                                    <?php else : ?>
                                                        <?php echo wp_kses($box['title'], 'polimark_allowed_tags'); ?>
                                                    <?php endif; ?>
                                                </h2><!-- /.featured-one__card__title -->
                                            <?php endif; ?>

                                            <?php if (!empty($box['text'])) : ?>
                                                <div class="featured-one__card__text">
                                                    <?php echo wp_kses($box['text'], 'polimark_allowed_tags'); ?>
                                                </div><!-- /.featured-one__card__text -->
                                            <?php endif; ?>
                                            <?php if (!empty($box['url'])) : ?>
                                                <a href="<?php echo esc_url($box['url']); ?>" class="featured-one__card__link"><i class="fa fa-angle-right"></i></a>
                                            <?php endif; ?>

                                        </div><!-- /.featured-one__content -->

                                    </div><!-- /.featured-one__card__inner -->

                                </div><!-- /.featured-one__card -->

                            </div><!-- /.col-md-12 col-lg-4 -->
                        <?php endforeach; ?>
                    </div><!-- /.row -->
                </div><!-- /.container -->

            </section><!-- /.featured-one -->
        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>
            <!--featured Section-->
            <section class="featured-two">
                <div class="container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="block-heading text-center">
                            <?php if (!empty($settings['sub_text'])) : ?>
                                <p class="block-heading__text">
                                    <?php echo wp_kses($settings['sub_text'], 'polimark_allowed_tags'); ?>
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
                        <?php foreach ($settings['feature_boxes_two'] as $box) : ?>
                            <div class="col-md-12 col-lg-4">
                                <div class="featured-two__card">
                                    <div class="featured-two__card__inner">
                                        <div class="featured-two__card__image">
                                            <?php echo wp_get_attachment_image($box['image']['id'], 'polimark_370x452'); ?>
                                        </div><!-- /.featured-one__image -->
                                        <div class="featured-two__card__content">
                                            <div class="featured-two__card__content__inner">
                                                <?php if (!empty($box['title'])) : ?>
                                                    <h2 class="featured-two__card__title">
                                                        <?php if (!empty($box['url'])) : ?>
                                                            <a href="<?php echo esc_url($box['url']); ?>"><?php echo wp_kses($box['title'], 'polimark_allowed_tags'); ?></a>
                                                        <?php else : ?>
                                                            <?php echo wp_kses($box['title'], 'polimark_allowed_tags'); ?>
                                                        <?php endif; ?>
                                                    </h2><!-- /.featured-two__card__title -->
                                                <?php endif; ?>

                                                <?php if (!empty($box['url'])) : ?>
                                                    <a href="<?php echo esc_url($box['url']); ?>" class="featured-two__card__link"><i class="fa fa-angle-right"></i></a>
                                                <?php endif; ?>
                                            </div><!-- /.featured-two__card__content__inner -->
                                        </div><!-- /.featured-two__content -->

                                    </div><!-- /.featured-two__card__inner -->

                                </div><!-- /.featured-two__card -->

                            </div><!-- /.col-md-12 col-lg-4 -->
                        <?php endforeach; ?>
                    </div><!-- /.row -->

                </div><!-- /.container -->
            </section><!-- /.featured-two -->

        <?php endif; ?>

        <?php if ('layout_three' === $settings['layout_type']) : ?>
            <!--Discover Section-->
            <section class="featured-icon">
                <?php foreach ($settings['icon_lists'] as $list) : ?>

                    <div class="featured-icon__card">
                        <i class="<?php echo esc_attr($list['icon']); ?>"></i>
                        <?php if (!empty($list['title'])) : ?>
                            <h3 class="featured-icon__card__title">
                                <?php if (!empty($list['url'])) : ?>
                                    <a href="<?php echo esc_url($list['url']); ?>">
                                        <?php echo wp_kses($list['title'], 'polimark_allowed_tags'); ?>
                                    </a>
                                <?php else : ?>
                                    <?php echo wp_kses($list['title'], 'polimark_allowed_tags'); ?>
                                <?php endif; ?>
                            </h3><!-- /.featured-icon__card__title -->
                        <?php endif; ?>

                    </div><!-- /.featured-icon__card -->

                <?php endforeach; ?>

            </section><!-- /.featured-icon -->

        <?php endif; ?>


<?php
    }

    protected function _content_template()
    {
    }
}
