<?php

namespace Layerdrops\Polimark\Widgets;


class FooterTop extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-top';
    }

    public function get_title()
    {
        return __('Footer Top', 'polimark-addon');
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
                    'width' => '198',
                    'height' => '38',
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-top .logo-box .logo img' => 'width: {{WIDTH}}px;height: {{HEIGHT}}px',
                ],
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


        $this->end_controls_section();
    }

    protected function render()
    {


        $settings = $this->get_settings_for_display(); ?>

        <section class="footer-top">
            <div class="container">
                <div class="logo-box">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php
                            $polimark_custom_logo = $settings['logo']['url'];
                            echo '<img class="main-logo-image" src="' . esc_url($polimark_custom_logo) . '" alt="' . esc_attr(get_bloginfo('name')) . '">'; ?>
                        </a>
                    </div><!-- /.logo -->
                </div><!-- /.logo-box -->

                <div class="footer-top__social">
                    <?php foreach ($settings['social_icons'] as $footer_social) : ?>
                        <a href="<?php echo esc_url($footer_social['social_url']['url']); ?>" class="fab <?php echo esc_attr($footer_social['social_icon']); ?>"></a>
                    <?php endforeach; ?>
                </div><!-- /.footer__social -->

            </div><!-- /.container -->
        </section><!-- /.footer-top -->

<?php
    }

    protected function _content_template()
    {
    }
}
