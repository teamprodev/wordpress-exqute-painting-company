<?php

namespace Layerdrops\Polimark\Widgets;


class Twitter extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-twitter';
    }

    public function get_title()
    {
        return __('Twitter', 'polimark-addon');
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
                ]
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

        $this->add_control(
            'twitter_username',
            [
                'label' => __('Add Twitter Username', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Polimark', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'twitter_count',
            [
                'label' => __('Add Twitter Count', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('10', 'polimark-addon'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <section class="twitter-one">
                <div class="container">
                    <div class="twitter-one__icon">
                        <i class="fab fa-twitter"></i>
                    </div><!-- /.twitter-one__icon -->
                    <?php echo do_shortcode('[custom-twitter-feeds include="date,text,author" showbutton=false screenname=' . $settings['twitter_username'] . ' num=' . $settings['twitter_count'] . ']'); ?>
                </div><!-- /.container -->

            </section><!-- /.twitter-one -->

        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
