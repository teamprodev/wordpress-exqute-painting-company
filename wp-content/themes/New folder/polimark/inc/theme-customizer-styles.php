<?php

/**
 * polimark functions for getting inline styles from theme customizer
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package polimark
 */

if (!function_exists('polimark_theme_customizer_styles')) :
    function polimark_theme_customizer_styles()
    {

        // polimark color option

        $polimark_inline_style = '';
        $polimark_inline_style .= ':root {--polimark-color-base: ' . get_theme_mod('theme_base_color', sanitize_hex_color('#f5381f')) . '; --polimark-color-primary: ' . get_theme_mod('theme_primary_color', sanitize_hex_color('#32369a')) . '; --polimark-color-black: ' . get_theme_mod('theme_black_color', sanitize_hex_color('#11134f')) . '; }';

        $polimark_inner_banner_bg = get_theme_mod('page_header_bg_image');
        $polimark_inline_style .= '.page-header .image-layer { background-image: url(' . $polimark_inner_banner_bg . '); } ';

        $polimark_preloader_icon = get_theme_mod('preloader_image');
        if ($polimark_preloader_icon) {
            $polimark_inline_style .= '.preloader .icon { background-image: url(' . $polimark_preloader_icon . '); } ';
        }

        if (is_page()) {

            $polimark_page_base_color = empty(get_post_meta(get_the_ID(), 'polimark_base_color', true)) ? get_theme_mod('theme_base_color', sanitize_hex_color('#f5381f')) : get_post_meta(get_the_ID(), 'polimark_base_color', true);

            $polimark_page_primary_color = empty(get_post_meta(get_the_ID(), 'polimark_primary_color', true)) ? get_theme_mod('theme_primary_color', sanitize_hex_color('#32369a')) : get_post_meta(get_the_ID(), 'polimark_primary_color', true);

            $polimark_page_black_color = empty(get_post_meta(get_the_ID(), 'polimark_black_color', true)) ? get_theme_mod('theme_black_color', sanitize_hex_color('#11134f')) : get_post_meta(get_the_ID(), 'polimark_black_color', true);

            $polimark_inline_style .= ':root {--polimark-color-base: ' . $polimark_page_base_color . '; --polimark-color-primary: ' . $polimark_page_primary_color . '; --polimark-color-black: ' . $polimark_page_black_color . '; }';

            $polimark_page_header_bg = empty(get_post_meta(get_the_ID(), 'polimark_set_header_image', true)) ? get_theme_mod('page_header_bg_image') : get_post_meta(get_the_ID(), 'polimark_set_header_image', true);

            $polimark_inline_style .= '.page-header .image-layer { background-image: url(' . $polimark_page_header_bg . '); }';
        }


        wp_add_inline_style('polimark-main', $polimark_inline_style);
    }
endif;

add_action('wp_enqueue_scripts', 'polimark_theme_customizer_styles');
