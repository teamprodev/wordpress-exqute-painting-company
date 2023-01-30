<?php

namespace Layerdrops\Polimark\Widgets;


class FooterSubscribe extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-subscribe';
    }

    public function get_title()
    {
        return __('Footer Subscribe', 'polimark-addon');
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
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Widget Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore', 'polimark-addon')
            ]
        );

        $this->add_control(
            'paragraph',
            [
                'label' => __('Paragraph Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Some Text', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'mailchimp_url',
            [
                'label' => __('Add Mailchimp URL', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'mc_input_label',
            [
                'label' => __('Input Field Label', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Your Email Address', 'polimark-addon'),

            ]
        );
        $this->add_control(
            'mc_button_label',
            [
                'label' => __('Submit Button Label', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Register now', 'polimark-addon'),

            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {


        $settings = $this->get_settings_for_display(); ?>
        <?php if ('layout_one' == $settings['layout_type']) : ?>
            <div class="footer-widget newsletter-widget">
                <div class="widget-content">
                    <h3 class="footer-widget__title"><?php echo esc_html($settings['title']); ?></h3>
                    <div class="text"><?php echo esc_html($settings['paragraph']); ?></div>
                    <div class="newsletter-form">
                        <form class="mc-form" data-url="<?php echo esc_html($settings['mailchimp_url']); ?>">
                            <div class="form-group clearfix">
                                <input type="email" name="EMAIL" value="" placeholder="<?php echo esc_html($settings['mc_input_label']); ?>">
                                <button type="submit" class="thm-btn">
                                    <?php echo esc_html($settings['mc_button_label']); ?>
                                    <i class="fa fa-angle-right"></i>
                                </button>
                            </div>
                        </form>
                        <div class="mc-form__response"></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
