<?php

namespace Layerdrops\Polimark\Widgets;


class CallToAction extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-call-to-action';
    }

    public function get_title()
    {
        return __('Call To Action', 'polimark-addon');
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
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Contents', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
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

        $this->end_controls_section();
        $this->start_controls_section(
            'layout_two_content_section',
            [
                'label' => __('Contents', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_two'
                ]
            ]
        );

        $layout_two_box = new \Elementor\Repeater();

        $layout_two_box->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $layout_two_box->add_control(
            'title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );



        $layout_two_box->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'polimark-addon'),
                'label_block' => true,
            ]
        );

        $layout_two_box->add_control(
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


        $this->add_control(
            'layout_two_box',
            [
                'label' => __('Call Two Action Box', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $layout_two_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome Title', 'linoor-addon'),
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

        <?php if ('layout_one' == $settings['layout_type']) : ?>
            <section class="call-to-action">
                <div class="container">
                    <div class="inner-container">
                        <h3 class="call-to-action__title">
                            <?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?>
                        </h3><!-- /.call-to-action__title -->
                        <div class="call-to-action__button">
                            <a class="thm-btn" href="<?php echo esc_attr($settings['button_url']['url']); ?>">
                                <?php echo esc_html($settings['button_label']); ?>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div><!-- /.call-to-action__button -->
                    </div><!-- /.inner-container -->
                </div><!-- /.container -->
            </section><!-- /.call-to-action -->
        <?php endif; ?>
        <?php if ('layout_two' == $settings['layout_type']) : ?>
            <section class="call-to-action-two">
                <?php foreach ($settings['layout_two_box'] as $box) : ?>
                    <div class="inner-container">
                        <div class="call-to-action-two__background-image" style="background-image: url(<?php echo esc_attr($box['background_image']['url']); ?>);"></div><!-- /.call-to-action-two__background-image -->
                        <h3 class="call-to-action-two__title">
                            <?php echo wp_kses($box['title'], 'polimark_allowed_tags'); ?>
                        </h3><!-- /.call-to-action__title -->
                        <div class="call-to-action-two__button">
                            <a class="thm-btn" href="<?php echo esc_attr($box['button_url']['url']); ?>">
                                <?php echo esc_html($box['button_label']); ?>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div><!-- /.call-to-action__button -->
                    </div><!-- /.inner-container -->
                <?php endforeach; ?>
            </section><!-- /.call-to-action -->
        <?php endif; ?>
<?php
    }

    protected function _content_template()
    {
    }
}
