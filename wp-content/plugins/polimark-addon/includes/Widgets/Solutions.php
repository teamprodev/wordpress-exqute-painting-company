<?php

namespace Layerdrops\Polimark\Widgets;


class Solutions extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-solutions';
    }

    public function get_title()
    {
        return __('Solutions', 'polimark-addon');
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
            'main_content',
            [
                'label' => __('Block Content', 'polimark-addon'),
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
                'label' => __('Sub Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Default Text', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'tab_section',
            [
                'label' => __('Tabs', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $tabs = new \Elementor\Repeater();

        $tabs->add_control(
            'title',
            [
                'label' => __('Add Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $tabs->add_control(
            'text',
            [
                'label' => __('Add Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );


        $tabs->add_control(
            'status',
            [
                'label' => __('Is Active?', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'polimark-addon'),
                'label_off' => __('No', 'polimark-addon'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => __('Tabs', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $tabs->get_controls(),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'list_section',
            [
                'label' => __('Check Lists', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $lists = new \Elementor\Repeater();

        $lists->add_control(
            'title',
            [
                'label' => __('Add Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'lists',
            [
                'label' => __('Lists', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $lists->get_controls(),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <!--Agency Section-->
        <section class="agency-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Left Column-->
                    <div class="left-col col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner">
                            <div class="sec-title">
                                <h2><?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?></h2>
                            </div>

                            <!--Default Tabs-->
                            <div class="default-tabs tabs-box">

                                <!--Tab Btns-->
                                <ul class="tab-btns tab-buttons clearfix m-0 list-unstyled">
                                    <?php $tab_title_count = 1; ?>
                                    <?php foreach ($settings['tabs'] as $tab_one) : ?>
                                        <?php $get_title_status = $tab_one['status']; ?>
                                        <li data-tab="#agency-tab-<?php echo esc_attr($tab_title_count); ?>" class="tab-btn <?php echo esc_attr(('yes' == $get_title_status) ? 'active-btn' : ''); ?>"><span><?php echo esc_html($tab_one['title']); ?></span></li>
                                        <?php $tab_title_count++; ?>
                                    <?php endforeach; ?>
                                </ul>

                                <!--Tabs Container-->
                                <div class="tabs-content">
                                    <?php $tab_content_count = 1; ?>
                                    <?php foreach ($settings['tabs'] as $tab_two) : ?>
                                        <?php $get_content_status = $tab_two['status']; ?>
                                        <!--Tab-->
                                        <div class="tab <?php echo esc_attr(('yes' == $get_content_status) ? 'active-tab' : ''); ?>" id="agency-tab-<?php echo esc_attr($tab_content_count); ?>">
                                            <div class="content">
                                                <div class="text"><?php echo wp_kses($tab_two['text'], 'polimark_allowed_tags'); ?></div>
                                            </div>
                                        </div>
                                        <?php $tab_content_count++; ?>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Right Column-->
                    <div class="right-col col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner">
                            <div class="text"><?php echo wp_kses($settings['sub_title'], 'polimark_allowed_tags'); ?></div>
                            <div class="featured-block-two clearfix">
                                <div class="image"><img src="<?php echo esc_url($settings['image']['url']); ?>" alt=""></div>
                                <div class="text">
                                    <ul class="m-0 list-unstyled">
                                        <?php foreach ($settings['lists'] as $list) : ?>
                                            <li><?php echo esc_html($list['title']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
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
