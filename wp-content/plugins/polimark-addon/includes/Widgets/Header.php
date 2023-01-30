<?php

namespace Layerdrops\Polimark\Widgets;


class Header extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-header';
    }

    public function get_title()
    {
        return __('Header', 'polimark-addon');
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
                'label' => __('Layout Type', 'polimark-addon'),
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
            'logo_section',
            [
                'label' => __('Site Logo', 'polimark-addon'),
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
            'sticky_logo',
            [
                'label' => __('Add Sticky Logo', 'polimark-addon'),
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
                    '{{WRAPPER}} .header-upper .logo-box .logo .main-logo-image' => 'width: {{WIDTH}}px;height: {{HEIGHT}}px',
                    '{{WRAPPER}} .side-menu__top .logo img' => 'width: {{WIDTH}}px;height: {{HEIGHT}}px',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'nav_section',
            [
                'label' => __('Navigation', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'nav_menu',
            [
                'label' => __('Select Nav Menu', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_nav_menu(),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'others_section',
            [
                'label' => __('Others', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'topbar_status',
            [
                'label' => __('Enable Topbar?', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'polimark-addon'),
                'label_off' => __('No', 'polimark-addon'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'search_status',
            [
                'label' => __('Enable Search?', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'polimark-addon'),
                'label_off' => __('No', 'polimark-addon'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'login_btn_status',
            [
                'label' => __('Enable Login Btn?', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'polimark-addon'),
                'label_off' => __('No', 'polimark-addon'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );


        $this->add_control(
            'login_btn_url',
            [
                'label' => __('Login Page URL'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('#', 'polimark-addon'),
                'label_block' => true,
                'condition' => [
                    'login_btn_status' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'btn_status',
            [
                'label' => __('Enable Donate Btn?', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'polimark-addon'),
                'label_off' => __('No', 'polimark-addon'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );


        $this->add_control(
            'btn_text',
            [
                'label' => __('Donate Button Text'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Donate Now', 'polimark-addon'),
                'label_block' => true,
                'condition' => [
                    'btn_status' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'btn_url',
            [
                'label' => __('Donate Button URL'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('#', 'polimark-addon'),
                'label_block' => true,
                'condition' => [
                    'btn_status' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'topbar_section',
            [
                'label' => __('Topbar Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'topbar_status' => 'yes'
                ]
            ]
        );



        $topbar_infos = new \Elementor\Repeater();

        $topbar_infos->add_control(
            'topbar_icon',
            [
                'label' => __('Select Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_fa_icons(),
                'default' => 'polimark-icon-email',
                'label_block' => true,
            ]
        );

        $topbar_infos->add_control(
            'topbar_text',
            [
                'label' => __('Add Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default Text', 'polimark-addon'),
            ]
        );
        $topbar_infos->add_control(
            'topbar_url',
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
            'topbar_infos',
            [
                'label' => __('Topbar Infos', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $topbar_infos->get_controls(),
            ]
        );


        $topbar_social_icons = new \Elementor\Repeater();

        $topbar_social_icons->add_control(
            'social_icon',
            [
                'label' => __('Select Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_fa_icons(),
                'default' => 'fa-facebook-f',
                'label_block' => true,
            ]
        );

        $topbar_social_icons->add_control(
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
            'topbar_social_icons',
            [
                'label' => __('Social Icons', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $topbar_social_icons->get_controls(),
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

        $this->start_controls_section(
            'mobile_menu_section',
            [
                'label' => __('Mobile Drawer', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'mobile_menu_logo',
            [
                'label' => __('Mobile Drawer Logo', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );



        $this->add_control(
            'mobile_menu_text',
            [
                'label' => __('Mobile Drawer Content'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'polimark-addon'),
                'label_block' => true,
            ]
        );

        $mobile_menu_social_icons = new \Elementor\Repeater();

        $mobile_menu_social_icons->add_control(
            'social_icon',
            [
                'label' => __('Select Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_fa_icons(),
                'default' => 'fa-facebook-f',
                'label_block' => true,
            ]
        );

        $mobile_menu_social_icons->add_control(
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
            'mobile_menu_social_icons',
            [
                'label' => __('Social Icons', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $mobile_menu_social_icons->get_controls(),
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
        $settings = $this->get_settings_for_display();
?>






        <!-- Main Header -->
        <?php $polimark_sticky_menu_class = get_theme_mod('header_stricked_menu', true) && !is_admin_bar_showing() ? 'sticky-menu' : ''; ?>

        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <header class="main-header header-style-one <?php echo esc_attr($polimark_sticky_menu_class); ?>">

                <?php if ('yes' == $settings['topbar_status']) : ?>
                    <div class="topbar">
                        <div class="container-fluid">
                            <div class="topbar__infos">
                                <?php foreach ($settings['topbar_infos'] as $topbar_info) : ?>
                                    <div class="topbar__infos-item">
                                        <i class="<?php echo esc_attr($topbar_info['topbar_icon']); ?>"></i>
                                        <a href="<?php echo esc_url($topbar_info['topbar_url']['url']); ?>"><?php echo wp_kses($topbar_info['topbar_text'], 'polimark_allowed_tags'); ?></a>
                                    </div><!-- /.topbar__infos-item -->
                                <?php endforeach; ?>
                            </div><!-- /.topbar__infos -->

                            <div class="topbar__social">
                                <?php foreach ($settings['topbar_social_icons'] as $topbar_social) : ?>
                                    <a href="<?php echo esc_url($topbar_social['social_url']['url']); ?>" class="fab <?php echo esc_attr($topbar_social['social_icon']); ?>"></a>
                                <?php endforeach; ?>
                            </div><!-- /.topbar__social -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.topbar -->
                <?php endif; ?>

                <!-- Header Upper -->
                <div class="header-upper">
                    <div class="inner-container clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php
                                    $polimark_custom_logo = $settings['logo']['url'];
                                    echo '<img class="main-logo-image" src="' . esc_url($polimark_custom_logo) . '" alt="' . esc_attr(get_bloginfo('name')) . '">'; ?>

                                </a>
                            </div>
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="toggle-icons"></span></div>
                        </div>
                        <div class="nav-outer">

                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'menu' => $settings['nav_menu'],
                                        'menu_class' => 'navigation clearfix',
                                    )
                                );
                                ?>
                            </nav>
                        </div>
                        <div class="header-right">
                            <?php if ('yes' === $settings['search_status']) : ?>
                                <a href="#" class="search-btn search-toggler"><i class="polimark-icon-magnifying-glass"></i></a>
                            <?php endif; ?>
                            <?php if ('yes' === $settings['login_btn_status']) : ?>
                                <a href="<?php echo esc_url($settings['login_btn_url']); ?>" class="login-btn"><i class="polimark-icon-avatar"></i></a>
                            <?php endif; ?>
                            <?php if ('yes' === $settings['btn_status']) : ?>
                                <a href="<?php echo esc_url($settings['btn_url']); ?>" class="thm-btn">
                                    <?php echo wp_kses($settings['btn_text'], 'polimark_allowed_tags'); ?>
                                    <i class="fa fa-angle-right"></i>
                                </a><!-- /.thm-btn -->
                            <?php endif; ?>
                        </div><!-- /.header-right -->
                    </div>
                </div>
                <!--End Header Upper-->


            </header>
            <!-- End Main Header -->

        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>
            <header class="main-header header-style-one header-style-two <?php echo esc_attr($polimark_sticky_menu_class); ?>">

                <?php if ('yes' == $settings['topbar_status']) : ?>
                    <div class="topbar">
                        <div class="container-fluid">
                            <div class="topbar__infos">
                                <?php foreach ($settings['topbar_infos'] as $topbar_info) : ?>
                                    <div class="topbar__infos-item">
                                        <i class="<?php echo esc_attr($topbar_info['topbar_icon']); ?>"></i>
                                        <a href="<?php echo esc_url($topbar_info['topbar_url']['url']); ?>"><?php echo wp_kses($topbar_info['topbar_text'], 'polimark_allowed_tags'); ?></a>
                                    </div><!-- /.topbar__infos-item -->
                                <?php endforeach; ?>
                            </div><!-- /.topbar__infos -->

                            <div class="topbar__social">
                                <?php foreach ($settings['topbar_social_icons'] as $topbar_social) : ?>
                                    <a href="<?php echo esc_url($topbar_social['social_url']['url']); ?>" class="fab <?php echo esc_attr($topbar_social['social_icon']); ?>"></a>
                                <?php endforeach; ?>
                            </div><!-- /.topbar__social -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.topbar -->
                <?php endif; ?>

                <!-- Header Upper -->
                <div class="header-upper">
                    <div class="inner-container clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php
                                    $polimark_custom_logo = $settings['logo']['url'];
                                    echo '<img class="main-logo-image" src="' . esc_url($polimark_custom_logo) . '" alt="' . esc_attr(get_bloginfo('name')) . '">'; ?>

                                </a>
                            </div>
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="toggle-icons"></span></div>
                        </div>
                        <div class="nav-outer">

                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'menu' => $settings['nav_menu'],
                                        'menu_class' => 'navigation clearfix',
                                    )
                                );
                                ?>
                            </nav>
                        </div>
                        <div class="header-right">
                            <?php if ('yes' === $settings['search_status']) : ?>
                                <a href="#" class="search-btn search-toggler"><i class="polimark-icon-magnifying-glass"></i></a>
                            <?php endif; ?>
                            <?php if ('yes' === $settings['login_btn_status']) : ?>
                                <a href="<?php echo esc_url($settings['login_btn_url']); ?>" class="login-btn"><i class="polimark-icon-avatar"></i></a>
                            <?php endif; ?>
                            <?php if ('yes' === $settings['btn_status']) : ?>
                                <a href="<?php echo esc_url($settings['btn_url']); ?>" class="thm-btn">
                                    <?php echo wp_kses($settings['btn_text'], 'polimark_allowed_tags'); ?>
                                    <i class="fa fa-angle-right"></i>
                                </a><!-- /.thm-btn -->
                            <?php endif; ?>
                        </div><!-- /.header-right -->
                    </div>
                </div>
                <!--End Header Upper-->


            </header>
            <!-- End Main Header -->

        <?php endif; ?>

        <?php if ('yes' === $settings['search_status']) : ?>
            <!--Search Popup-->
            <div class="search-popup">
                <div class="search-popup__overlay search-toggler">
                </div><!-- /.search-popup__overlay -->
                <div class="search-popup__inner">
                    <?php echo get_search_form(); ?>
                </div><!-- /.search-popup__inner -->
            </div><!-- /.search-popup -->
        <?php endif; ?>


        <!--Mobile Menu-->
        <div class="side-menu__block">
            <div class="side-menu__block-overlay">
            </div><!-- /.side-menu__block-overlay -->
            <div class="side-menu__block-inner ">
                <div class="side-menu__top justify-content-between">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php
                            $polimark_sidemenu_logo = $settings['mobile_menu_logo']['url'];
                            echo '<img height="' . esc_attr($settings['logo_dimension']['height']) . '" width="' . esc_attr($settings['logo_dimension']['width']) . '" src="' . esc_url($polimark_sidemenu_logo) . '" alt="' . esc_attr(get_bloginfo('name')) . '">'; ?>
                        </a>
                    </div>
                    <a href="#" class="side-menu__toggler side-menu__close-btn"></a>
                </div><!-- /.side-menu__top -->


                <nav class="mobile-nav__container">
                    <!-- content is loading via js -->
                </nav>
                <?php $polimark_mobile_menu_content = $settings['mobile_menu_text']; ?>
                <?php if (!empty($polimark_mobile_menu_content)) : ?>
                    <div class="side-menu__sep"></div><!-- /.side-menu__sep -->
                <?php endif; ?>
                <div class="side-menu__content">
                    <?php if (!empty($polimark_mobile_menu_content)) : ?>
                        <?php echo wp_kses($polimark_mobile_menu_content, 'polimark_allowed_tags'); ?>
                    <?php endif; ?>
                    <div class="side-menu__social">
                        <?php $polimark_mobile_menu_social = $settings['mobile_menu_social_icons']; ?>
                        <?php if (!empty($polimark_mobile_menu_social)) : ?>
                            <?php foreach ($polimark_mobile_menu_social as $social_icon) : ?>
                                <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><i class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></i></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div><!-- /.side-menu__content -->
            </div><!-- /.side-menu__block-inner -->
        </div><!-- /.side-menu__block -->

        <?php $polimark_back_to_top_status = get_theme_mod('scroll_to_top', false); ?>
        <?php if (true === $polimark_back_to_top_status) : ?>
            <span data-target="html" class="scroll-to-target scroll-to-top"><i class="fa <?php echo esc_attr(get_theme_mod('scroll_to_top_icon', 'fa-angle-up')); ?>"></i></span>

        <?php endif; ?>



<?php
    }

    protected function _content_template()
    {
    }
}
