<?php

/**
 * Template part for displaying Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package polimark
 */

$polimark_page_id     = get_queried_object_id();
$polimark_custom_header_status = !empty(get_post_meta($polimark_page_id, 'polimark_custom_header_status', true)) ? get_post_meta($polimark_page_id, 'polimark_custom_header_status', true) : 'off';
$polimark_custom_header_id = '';

if (is_page() && 'on' === $polimark_custom_header_status) {
    $polimark_custom_header_id = get_post_meta($polimark_page_id, 'polimark_select_custom_header', true);
} elseif (true == get_theme_mod('header_custom')) {
    $polimark_custom_header_id = get_theme_mod('header_custom_post');
} else {
    $polimark_custom_header_id = 'default_header';
}

$polimark_dynamic_header = isset($_GET['custom_header_id']) ? $_GET['custom_header_id'] : $polimark_custom_header_id; ?>

<?php if ('default_header' == $polimark_dynamic_header) : ?>

    <!-- Main Header -->
    <?php $polimark_sticky_menu_class = get_theme_mod('header_stricked_menu', true) && !is_admin_bar_showing() ? 'sticky-menu' : ''; ?>
    <header class="main-header header-style-one <?php echo esc_attr($polimark_sticky_menu_class); ?>">
        <!-- Header Upper -->
        <div class="header-upper">
            <div class="inner-container clearfix">
                <!--Logo-->
                <div class="logo-box">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php
                            $polimark_logo_size = get_theme_mod('header_logo_width', 133);
                            $polimark_custom_logo_id = get_theme_mod('custom_logo');
                            $polimark_logo = wp_get_attachment_image_src($polimark_custom_logo_id, 'full');
                            if (has_custom_logo()) {
                                echo '<img width="' . esc_attr($polimark_logo_size) . '" src="' . esc_url($polimark_logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                            } else {
                                echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
                            } ?>
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
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                                'fallback_cb' => 'polimark_menu_fallback_callback',
                                'menu_class' => 'navigation clearfix',
                            )
                        );
                        ?>
                    </nav>
                </div>
                <div class="header-right">
                    <?php $polimark_search_btn_status = get_theme_mod('header_search_btn', false); ?>
                    <?php if ($polimark_search_btn_status) : ?>
                        <a href="#" class="search-btn search-toggler"><i class="polimark-icon-magnifying-glass"></i></a>
                    <?php endif; ?>
                    <?php $polimark_login_btn_status = get_theme_mod('header_login_btn_switch', false); ?>
                    <?php if ($polimark_login_btn_status) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('header_login_btn_link', '#')); ?>" class="login-btn"><i class="polimark-icon-avatar"></i></a>
                    <?php endif; ?>
                    <?php if (true === get_theme_mod('header_btn_switch', false)) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('header_btn_link', '#')); ?>" class="thm-btn">
                            <?php echo wp_kses(get_theme_mod('header_btn_text', 'Donate Now'), 'polimark_allowed_tags'); ?>
                            <i class="fa fa-angle-right"></i>
                        </a><!-- /.thm-btn -->
                    <?php endif; ?>
                </div><!-- /.header-right -->
            </div>
        </div>
        <!--End Header Upper-->
    </header>
    <!-- End Main Header -->

    <!--Search Popup-->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler">
        </div><!-- /.search-popup__overlay -->
        <div class="search-popup__inner">
            <?php echo get_search_form(); ?>
        </div><!-- /.search-popup__inner -->
    </div><!-- /.search-popup -->

    <!--Mobile Menu-->
    <div class="side-menu__block">
        <div class="side-menu__block-overlay">
        </div><!-- /.side-menu__block-overlay -->
        <div class="side-menu__block-inner ">
            <div class="side-menu__top justify-content-between">
                <div class="logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php
                        $polimark_logo_size = get_theme_mod('header_logo_width', 198);
                        $polimark_custom_logo_id = get_theme_mod('custom_logo');
                        $polimark_logo = wp_get_attachment_image_src($polimark_custom_logo_id, 'full');
                        if (has_custom_logo()) {
                            echo '<img width="' . esc_attr($polimark_logo_size) . '" src="' . esc_url($polimark_logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                        } else {
                            echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
                        } ?>
                    </a>
                </div>
                <a href="#" class="side-menu__toggler side-menu__close-btn"></a>
            </div><!-- /.side-menu__top -->

            <nav class="mobile-nav__container">
                <!-- content is loading via js -->
            </nav>
            <?php $polimark_mobile_menu_content = get_theme_mod('polimark_mobile_menu_text'); ?>
            <?php if (!empty($polimark_mobile_menu_content)) : ?>
                <div class="side-menu__sep"></div><!-- /.side-menu__sep -->
            <?php endif; ?>
            <div class="side-menu__content">
                <?php if (!empty($polimark_mobile_menu_content)) : ?>
                    <?php echo wp_kses($polimark_mobile_menu_content, 'polimark_allowed_tags'); ?>
                <?php endif; ?>
                <div class="side-menu__social">
                    <?php $polimark_mobile_menu_social = get_theme_mod('mobile_menu_social_icons'); ?>
                    <?php if (!empty($polimark_mobile_menu_social)) : ?>
                        <?php foreach ($polimark_mobile_menu_social as $social_icon) : ?>
                            <a href="<?php echo esc_url($social_icon['link_url']); ?>"><i class="fab <?php echo esc_attr($social_icon['link_icon']); ?>"></i></a>
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

<?php else : ?>
    <?php echo do_shortcode('[polimark-header id="' . $polimark_dynamic_header . '"]');
    ?>
<?php endif; ?>