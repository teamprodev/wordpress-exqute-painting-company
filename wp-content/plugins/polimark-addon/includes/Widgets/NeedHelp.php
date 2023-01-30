<?php

namespace Layerdrops\Polimark\Widgets;


class NeedHelp extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-need-help';
    }

    public function get_title()
    {
        return __('Need Help', 'polimark-addon');
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
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Heading', 'polimark-addon')
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('Add Summery', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Tagline', 'polimark-addon')
            ]
        );

        $this->add_control(
            'phone_number',
            [
                'label' => __('Add Phone', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('00 00 00 00', 'polimark-addon')
            ]
        );




        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="need-help">
            <h2 class="need-help__title">
                <?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?>
            </h2><!-- /.need-help__title -->
            <p class="need-help__text">
                <?php echo wp_kses($settings['text'], 'polimark_allowed_tags'); ?>
            </p><!-- /.need-help__text -->
            <div class="need-help__phone">
                <i class="polimark-icon-telephone"></i><!-- /.polimark-icon-phone-ringing -->
                <?php echo wp_kses($settings['phone_number'], 'polimark_allowed_tags'); ?>
            </div><!-- /.need-help__phone -->
        </div><!-- /.need-help -->
<?php
    }

    protected function _content_template()
    {
    }
}
