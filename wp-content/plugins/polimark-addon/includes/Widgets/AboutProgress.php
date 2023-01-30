<?php

namespace Layerdrops\Polimark\Widgets;


class AboutProgress extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-about-progress';
    }

    public function get_title()
    {
        return __('About Progress', 'polimark-addon');
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
            'layout_type',
            [
                'label' => __('Select Layout', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'layout_one',
                'options' => [
                    'layout_one' => __('Layout One', 'polimark-addon'),
                    'layout_two' => __('Layout Two', 'polimark-addon'),
                ]
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Add Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Title', 'polimark-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Add Sub Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'polimark-addon'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'summery',
            [
                'label' => __('Add Summery', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'polimark-addon'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('Add Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'image_caption',
            [
                'label' => __('Add Image Caption', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'list_items_content',
            [
                'label' => __('List Items Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $list_items = new \Elementor\Repeater();

        $list_items->add_control(
            'title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Check Lists', 'polimark-addon'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'list_items',
            [
                'label' => __('Check Lists', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $list_items->get_controls(),
                'default' => [
                    [
                        'title' => __('Check Lists', 'polimark-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );


        $this->end_controls_section();
        $this->start_controls_section(
            'progress_list_content',
            [
                'label' => __('Progress Bar Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $progress_lists = new \Elementor\Repeater();

        $progress_lists->add_control(
            'title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('My Progress', 'polimark-addon'),
                'label_block' => true,
            ]
        );

        $progress_lists->add_control(
            'count',
            [
                'label' => __('Add Count', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 6,
                ],
            ]
        );

        $this->add_control(
            'progress_lists',
            [
                'label' => __('Progress Box', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $progress_lists->get_controls(),
                'default' => [
                    [
                        'title' => __('My Progress', 'polimark-addon'),
                        'count' => '70',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>


        <?php if ('layout_one' == $settings['layout_type']) : ?>
            <section class="about-progress">
                <?php if (!empty($settings['title'])) : ?>
                    <div class="block-heading text-left">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <p class="block-heading__text">
                                <?php echo wp_kses($settings['sub_title'], 'polimark_allowed_tags'); ?>
                            </p><!-- /.block-heading__text -->
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="block-heading__title">
                                <?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?>
                            </h2><!-- /.block-heading__title -->
                        <?php endif; ?>
                    </div><!-- /.block-heading -->
                    <?php if (!empty($settings['summery'])) : ?>
                        <div class="about-progress__summery">
                            <?php echo wp_kses($settings['summery'], 'polimark_allowed_tags'); ?>
                        </div><!-- /.about-progress__summery -->
                    <?php endif; ?>
                    <?php if (!empty($settings['list_items'])) : ?>
                        <ul class="about-progress__list">
                            <?php foreach ($settings['list_items'] as $list_item) : ?>
                                <li>
                                    <i class="polimark-icon-confirmation"></i>
                                    <?php echo wp_kses($list_item['title'], 'polimark_allowed_tags'); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul><!-- /.about-progress__summery -->
                    <?php endif; ?>

                    <?php if (!empty($settings['image_caption']) || !empty($settings['image'])) : ?>
                        <div class="about-progress__image">
                            <?php if (!empty($settings['image'])) :  ?>
                                <?php echo wp_get_attachment_image($settings['image']['id'], 'polimark_160x90'); ?>
                            <?php endif; ?>

                            <?php if (!empty($settings['image_caption'])) :  ?>
                                <h2 class="about-progress__image-caption">
                                    <?php echo wp_kses($settings['image_caption'], 'polimark_allowed_tags'); ?>
                                </h2><!-- /.about-progress__image-caption -->
                            <?php endif; ?>

                        </div><!-- /.about-progress__image -->
                    <?php endif; ?>

                    <?php foreach ($settings['progress_lists'] as $progress_list) : ?>
                        <div class="progress-box">
                            <div class="bar-title"><?php echo wp_kses($progress_list['title'], 'linoor_allowed_tags'); ?></div>
                            <div class="bar">
                                <div class="bar-inner count-bar " data-percent="<?php echo esc_attr($progress_list['count']['size']); ?>%">
                                    <div class="count-box ">
                                        <span class="count-text" data-stop="<?php echo esc_attr($progress_list['count']['size']); ?>" data-speed="1500"><?php echo esc_attr($progress_list['count']['size']); ?></span>%
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php endif; ?>
            </section><!-- /.about-progress -->
        <?php endif; ?>


<?php
    }

    protected function _content_template()
    {
    }
}
