<?php

namespace Layerdrops\Polimark\Widgets;


class About extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-about';
    }

    public function get_title()
    {
        return __('About', 'polimark-addon');
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


        $this->end_controls_section();

        $this->start_controls_section(
            'layout_one_content',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );


        $this->add_control(
            'block_heading_title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'block_heading_tagline',
            [
                'label' => __('Tagline', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Tagline', 'polimark-addon'),
            ]
        );


        $this->add_control(
            'text',
            [
                'label' => __('Summery', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Some special text', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'polimark-addon'),
                'label_block' => true,
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
                'show_label' => false,
            ]
        );

        $gallery = new \Elementor\Repeater();

        $gallery->add_control(
            'image',
            [
                'label' => __('Add Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gallery',
            [
                'label' => __('Gallery Image List', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $gallery->get_controls(),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'layout_two_content',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_two'
                ]
            ]
        );


        $this->add_control(
            'layout_two_block_heading_title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'layout_two_block_heading_tagline',
            [
                'label' => __('Tagline', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Tagline', 'polimark-addon'),
            ]
        );


        $this->add_control(
            'layout_two_text',
            [
                'label' => __('Summery', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Some special text', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'layout_two_button_label',
            [
                'label' => __('Button Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'polimark-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'layout_two_button_url',
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
                'show_label' => false,
            ]
        );


        $this->add_control(
            'layout_two_image',
            [
                'label' => __('Add Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );


        $layout_two_icon_box = new \Elementor\Repeater();
        $layout_two_icon_box->add_control(
            'icon',
            [
                'label' => __('Add Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_fa_icons(),
            ]
        );
        $layout_two_icon_box->add_control(
            'title',
            [
                'label' => __('Add Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 123,
                'label_block' => true,
            ]
        );

        $layout_two_icon_box->add_control(
            'text',
            [
                'label' => __('Add Text'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'polimark-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'layout_two_icon_boxes',
            [
                'label' => __('Icon Boxes', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $layout_two_icon_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Default Title', 'polimark-addon'),
                        'text' => __('Default Text', 'polimark-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'layout_three_content',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );


        $this->add_control(
            'layout_three_block_heading_title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'layout_three_block_heading_tagline',
            [
                'label' => __('Tagline', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Tagline', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'layout_three_image',
            [
                'label' => __('Add Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'layout_three_image_caption',
            [
                'label' => __('Add Image Caption', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );


        $layout_three_check_box = new \Elementor\Repeater();

        $layout_three_check_box->add_control(
            'title',
            [
                'label' => __('Add Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 123,
                'label_block' => true,
            ]
        );

        $layout_three_check_box->add_control(
            'text',
            [
                'label' => __('Add Text'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default Text', 'polimark-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'layout_three_check_boxes',
            [
                'label' => __('Check Boxes', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $layout_three_check_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Default Title', 'polimark-addon'),
                        'text' => __('Default Text', 'polimark-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );


        $this->add_control(
            'layout_three_background_image',
            [
                'label' => __('Add Background Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <?php if ('layout_one' == $settings['layout_type']) : ?>
            <section class="about-one">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-one__content">
                                <?php if (!empty($settings['block_heading_title'])) : ?>
                                    <div class="block-heading text-left">
                                        <?php if (!empty($settings['block_heading_tagline'])) : ?>
                                            <p class="block-heading__text">
                                                <?php echo wp_kses($settings['block_heading_tagline'], 'polimark_allowed_tags'); ?>
                                            </p><!-- /.block-heading__text -->
                                        <?php endif; ?>
                                        <?php if (!empty($settings['block_heading_title'])) : ?>
                                            <h2 class="block-heading__title">
                                                <?php echo wp_kses($settings['block_heading_title'], 'polimark_allowed_tags'); ?>
                                            </h2><!-- /.block-heading__title -->
                                        <?php endif; ?>
                                    </div><!-- /.block-heading -->
                                <?php endif; ?>

                                <?php if (!empty($settings['text'])) : ?>
                                    <div class="about-one__text">
                                        <?php echo wp_kses($settings['text'], 'polimark_allowed_tags'); ?>
                                    </div><!-- /.about-one__text -->
                                <?php endif; ?>

                                <?php if (!empty($settings['button_label'])) : ?>
                                    <a href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn about-one__btn">
                                        <?php echo esc_html($settings['button_label']); ?>
                                        <i class="fa fa-angle-right"></i>
                                    </a><!-- /.thm-btn about-one__btn -->

                                <?php endif; ?>


                            </div><!-- /.about-one__content -->

                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="about-one__gallery">
                                <?php $gallery_count = 1; ?>
                                <?php foreach ($settings['gallery'] as $gallery) : ?>
                                    <img class="about-one__gallery-<?php echo esc_attr($gallery_count); ?>" src="<?php echo esc_attr($gallery['image']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true)); ?>">
                                    <?php $gallery_count++; ?>
                                <?php endforeach; ?>
                            </div><!-- /.about-one__gallery -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->

                </div><!-- /.container -->

            </section><!-- /.about-one -->
        <?php endif; ?>


        <?php if ('layout_two' == $settings['layout_type']) : ?>
            <section class="about-two">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-two__image">
                                <img src="<?php echo esc_attr($settings['layout_two_image']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($settings['layout_two_image']['id'], '_wp_attachment_image_alt', true)); ?>">
                            </div><!-- /.about-two__image -->
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="about-two__content">
                                <?php if (!empty($settings['layout_two_block_heading_title'])) : ?>
                                    <div class="block-heading text-left">
                                        <?php if (!empty($settings['layout_two_block_heading_tagline'])) : ?>
                                            <p class="block-heading__text">
                                                <?php echo wp_kses($settings['layout_two_block_heading_tagline'], 'polimark_allowed_tags'); ?>
                                            </p><!-- /.block-heading__text -->
                                        <?php endif; ?>
                                        <?php if (!empty($settings['layout_two_block_heading_title'])) : ?>
                                            <h2 class="block-heading__title">
                                                <?php echo wp_kses($settings['layout_two_block_heading_title'], 'polimark_allowed_tags'); ?>
                                            </h2><!-- /.block-heading__title -->
                                        <?php endif; ?>
                                    </div><!-- /.block-heading -->
                                <?php endif; ?>

                                <?php if (!empty($settings['layout_two_text'])) : ?>
                                    <div class="about-two__text">
                                        <?php echo wp_kses($settings['layout_two_text'], 'polimark_allowed_tags'); ?>
                                    </div><!-- /.about-two__text -->
                                <?php endif; ?>

                                <ul class="about-two__icons">
                                    <?php foreach ($settings['layout_two_icon_boxes'] as $box) : ?>
                                        <li class="about-two__icons-item">
                                            <i class="<?php echo esc_attr($box['icon']); ?>"></i>
                                            <div class="about-two__icons-content">
                                                <h3 class="about-two__icons-title">
                                                    <?php echo wp_kses($box['title'], 'polimark_allowed_tags'); ?>
                                                </h3><!-- /.about-two__icons-title -->
                                                <p class="about-two__icons-text">
                                                    <?php echo wp_kses($box['text'], 'polimark_allowed_tags'); ?>
                                                </p>
                                            </div><!-- /.about-two__icons-content -->
                                        </li>
                                    <?php endforeach; ?>
                                </ul><!-- /.about-two__icons -->

                                <?php if (!empty($settings['layout_two_button_label'])) : ?>
                                    <a href="<?php echo esc_url($settings['layout_two_button_url']['url']); ?>" class="thm-btn about-two__btn">
                                        <?php echo esc_html($settings['layout_two_button_label']); ?>
                                        <i class="fa fa-angle-right"></i>
                                    </a><!-- /.thm-btn about-one__btn -->

                                <?php endif; ?>
                            </div><!-- /.about-two__content -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->

                </div><!-- /.container -->

            </section><!-- /.about-two -->

        <?php endif; ?>

        <?php if ('layout_three' == $settings['layout_type']) : ?>

            <section class="about-three" style="background-image: url(<?php echo esc_attr($settings['layout_three_background_image']['url']); ?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-three__content">
                                <?php if (!empty($settings['layout_three_block_heading_title'])) : ?>
                                    <div class="block-heading text-left">
                                        <?php if (!empty($settings['layout_three_block_heading_tagline'])) : ?>
                                            <p class="block-heading__text">
                                                <?php echo wp_kses($settings['layout_three_block_heading_tagline'], 'polimark_allowed_tags'); ?>
                                            </p><!-- /.block-heading__text -->
                                        <?php endif; ?>
                                        <?php if (!empty($settings['layout_three_block_heading_title'])) : ?>
                                            <h2 class="block-heading__title">
                                                <?php echo wp_kses($settings['layout_three_block_heading_title'], 'polimark_allowed_tags'); ?>
                                            </h2><!-- /.block-heading__title -->
                                        <?php endif; ?>
                                    </div><!-- /.block-heading -->
                                <?php endif; ?>
                                <ul class="about-three__list">
                                    <?php foreach ($settings['layout_three_check_boxes'] as $list) : ?>
                                        <li class="about-three__list__item">
                                            <i class="fa fa-check"></i>
                                            <div class="about-three__list__content">
                                                <h3 class="about-three__list__title">
                                                    <?php echo wp_kses($list['title'], 'polimark_allowed_tags'); ?>
                                                </h3><!-- /.about-three__list__title -->
                                                <p class="about-three__list__text">
                                                    <?php echo wp_kses($list['text'], 'polimark_allowed_tags'); ?>
                                                </p><!-- /.about-three__list__text -->
                                            </div><!-- /.about-three__list__content -->
                                        </li><!-- /.about-three__list__item -->
                                    <?php endforeach; ?>
                                </ul><!-- /.about-three__list -->
                            </div><!-- /.about-three__content -->
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="about-three__image">
                                <div class="about-three__image__caption">
                                    <?php echo wp_kses($settings['layout_three_image_caption'], 'polimark_allowed_tags'); ?>
                                </div><!-- /.about-three__image__caption -->
                                <img src="<?php echo esc_attr($settings['layout_three_image']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($settings['layout_three_image']['id'], '_wp_attachment_image_alt', true)); ?>">
                            </div><!-- /.about-three__image -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section><!-- /.about-three -->

        <?php endif; ?>
<?php
    }

    protected function _content_template()
    {
    }
}
