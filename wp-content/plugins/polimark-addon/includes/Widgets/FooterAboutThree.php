<?php

namespace Layerdrops\Polimark\Widgets;


class FooterAboutThree extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-about-three';
    }

    public function get_title()
    {
        return __('Footer About Three', 'polimark-addon');
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
            'logo',
            [
                'label' => __('Add Logo', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'logo_dimension',
            [
                'label' => __('Logo Dimension', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
                'description' => __('Set Custom Logo Size.', 'polimark-addon'),
                'default' => [
                    'width' => '134',
                    'height' => '34',
                ],
            ]
        );


        $info_list = new \Elementor\Repeater();

        $info_list->add_control(
            'icon',
            [
                'label' => __('Select Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_fa_icons(),
                'label_block' => true,
            ]
        );
        $info_list->add_control(
            'text',
            [
                'label' => __('Add Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Info', 'polimark-addon'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'info_list',
            [
                'label' => __('Info List', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $info_list->get_controls(),
            ]
        );


        $this->add_control(
            'text',
            [
                'label' => __('Paragraph', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'polimark-addon'),
            ]
        );



        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <div class="footer-widget footer-about-three">
            <a href="<?php echo esc_url(home_url('/')); ?>"><img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" id="fLogo" src="<?php echo esc_attr($settings['logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a>
            <p><?php echo wp_kses($settings['text'], 'polimark_allowed_tags'); ?></p>

            <ul class="contact-info m-0 list-unstyled">
                <?php foreach ($settings['info_list'] as $list) : ?>
                    <li class="address">
                        <span class="icon <?php echo esc_attr($list['icon']); ?>"></span>
                        <?php echo wp_kses($list['text'], 'polimark_allowed_tags'); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div><!-- /.footer-widget footer-about-three -->


<?php
    }

    protected function _content_template()
    {
    }
}
