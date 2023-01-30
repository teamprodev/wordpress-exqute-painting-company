<?php

namespace Layerdrops\Polimark\Widgets;


class FooterCopyrightTwo extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-copyright-two';
    }

    public function get_title()
    {
        return __('Footer CopyRight Two', 'polimark-addon');
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


        $social_icons = new \Elementor\Repeater();

        $social_icons->add_control(
            'social_icon',
            [
                'label' => __('Select Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_fa_icons(),
                'default' => 'fa-facebook-f',
                'label_block' => true,
            ]
        );

        $social_icons->add_control(
            'social_url',
            [
                'label' => __('Add Url', 'polimark-addon'),
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
            'social_icons',
            [
                'label' => __('Social Icons', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $social_icons->get_controls(),
                'default' => [
                    [
                        'social_icon' => 'fa-facebook-f',
                        'social_url' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                    ],
                ],
                'title_field' => '{{{ social_icon }}}',
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('Add Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('&copy; Layerdrops', 'polimark-addon')
            ]
        );

        $this->add_control(
            'shape_image',
            [
                'label' => __('Shape Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <div class="footer-bottom footer-bottom--two">
            <img src="<?php echo esc_attr($settings['shape_image']['url']); ?>" alt="" class="footer-bottom--two__shape">
            <div class="auto-container">
                <div class="inner">
                    <ul class="social-links clearfix list-unstyled m-0">
                        <?php foreach ($settings['social_icons'] as $social_icon) : ?>
                            <li><a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><span class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></span></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="copyright"><?php echo wp_kses($settings['text'], 'polimark_allowed_tags'); ?></div>
                </div>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
