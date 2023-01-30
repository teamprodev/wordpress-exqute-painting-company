<?php

namespace Layerdrops\Polimark\Widgets;


class Welcome extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-welcome';
    }

    public function get_title()
    {
        return __('Welcome', 'polimark-addon');
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
            'paragraph',
            [
                'label' => __('Paragraph', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'bubble_text',
            [
                'label' => __('Bubble Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Add Bubble text', 'polimark-addon'),
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


        $list_items = new \Elementor\Repeater();

        $list_items->add_control(
            'list_item',
            [
                'label' => __('Select Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('default Text', 'polimark-addon'),
                'label_block' => true,
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
                        'list_item' => __('default Text', 'polimark-addon'),
                    ],
                ],
                'title_field' => '{{{ list_item }}}',
            ]
        );

        $this->add_control(
            'images',
            [
                'label' => __('Add Images', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>

        <!--About Section-->
        <section class="about-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Image Column-->
                    <div class="image-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner">
                            <?php foreach ($settings['images'] as $image) : ?>
                                <div class="image-block wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms"><img src="<?php echo esc_attr($image['url']); ?>" alt=""></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!--Text Column-->
                    <div class="text-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner">
                            <div class="sec-title">
                                <h2><?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?></h2>
                                <div class="lower-text"><?php echo wp_kses($settings['sub_title'], 'polimark_allowed_tags'); ?></div>
                            </div>
                            <div class="text">
                                <p><?php echo wp_kses($settings['paragraph'], 'polimark_allowed_tags'); ?></p>
                            </div>
                            <div class="text clearfix">
                                <ul class="list-unstyled m-0">
                                    <?php foreach ($settings['list_items'] as $list_item) : ?>
                                        <li><?php echo esc_html($list_item['list_item']); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="since"><span class="txt"><?php echo wp_kses($settings['bubble_text'], 'polimark_allowed_tags'); ?></span></div>
                            </div>
                            <div class="link-box">
                                <a class="theme-btn btn-style-one" href="<?php echo esc_html($settings['button_url']['url']); ?>">
                                    <i class="btn-curve"></i>
                                    <span class="btn-title"><?php echo esc_html($settings['button_label']); ?></span>
                                </a>
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
