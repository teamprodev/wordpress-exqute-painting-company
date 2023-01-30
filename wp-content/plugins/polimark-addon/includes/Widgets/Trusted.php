<?php

namespace Layerdrops\Polimark\Widgets;


class Trusted extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-trusted';
    }

    public function get_title()
    {
        return __('Trusted', 'polimark-addon');
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
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'polimark-addon'),
            ]
        );


        $this->add_control(
            'image',
            [
                'label' => __('Add Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );

        $list_items = new \Elementor\Repeater();

        $list_items->add_control(
            'title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'list_items',
            [
                'label' => __('List Items', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $list_items->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome Title', 'polimark-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'box_section',
            [
                'label' => __('Boxes', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'box_title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );


        $box_items = new \Elementor\Repeater();

        $box_items->add_control(
            'title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );
        $box_items->add_control(
            'text',
            [
                'label' => __('Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Default Text', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'box_items',
            [
                'label' => __('Box Items', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $box_items->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome Title', 'polimark-addon'),
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

        <!-- Trusted Section -->
        <section class="trusted-section">
            <div class="auto-container">
                <div class="outer-container">
                    <div class="row clearfix">
                        <div class="left-col col-xl-5 col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                <div class="col-header">
                                    <div class="header-inner">
                                        <span><?php echo wp_kses($settings['box_title'], 'polimark_allowed_tags'); ?></span>
                                    </div>
                                </div>
                                <div class="features">
                                    <?php $box_counter = 1; ?>
                                    <?php foreach ($settings['box_items'] as $box_item) : ?>
                                        <div class="feature">
                                            <div class="count"><span>0<?php echo esc_html($box_counter); ?></span></div>
                                            <h5><?php echo esc_html($box_item['title']); ?></h5>
                                            <div class="sub-text"><?php echo esc_html($box_item['text']); ?></div>
                                        </div>
                                        <?php $box_counter++; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="right-col col-xl-7 col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                <div class="sec-title">
                                    <h2><?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?></h2>
                                    <div class="lower-text"><?php echo wp_kses($settings['sub_title'], 'polimark_allowed_tags'); ?></div>
                                </div>
                                <div class="featured-block-two clearfix">
                                    <div class="image"><img src="<?php echo esc_attr($settings['image']['url']); ?>" alt=""></div>
                                    <div class="text">
                                        <ul class="m-0 list-unstyled">
                                            <?php foreach ($settings['list_items'] as $list_item) : ?>
                                                <li> <?php echo esc_html($list_item['title']); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
<?php
    }

    protected function _content_template()
    {
    }
}
