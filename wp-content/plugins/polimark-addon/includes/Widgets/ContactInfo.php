<?php

namespace Layerdrops\Polimark\Widgets;


class ContactInfo extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-contact-info';
    }

    public function get_title()
    {
        return __('Contact Info', 'polimark-addon');
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
                'default' => __('Default Title', 'polimark-addon')
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => __('Select Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_fa_icons(),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('Add Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'polimark-addon')
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>

        <div class="contact-info">
            <div class="contact-info__icon">
                <i class="<?php echo esc_attr($settings['icon']); ?>"></i>
            </div><!-- /.contact-info__icon -->
            <h3 class="contact-info__title">
                <?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?>
            </h3><!-- /.contact-info__title -->
            <p class="contact-info__text">
                <?php echo wp_kses($settings['text'], 'polimark_allowed_tags'); ?>
            </p><!-- /.contact-info__text -->
        </div><!-- /.contact-info -->

<?php
    }

    protected function _content_template()
    {
    }
}
