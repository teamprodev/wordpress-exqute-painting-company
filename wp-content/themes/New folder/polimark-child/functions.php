<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;


/**
 * Setup My Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function polimark_child_theme_setup()
{
    load_child_theme_textdomain('polimark-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'polimark_child_theme_setup');

if (!function_exists('polimark_child_thm_parent_css')) :
    function polimark_child_thm_parent_css()
    {
        // loading parent styles
        wp_enqueue_style('polimark-parent-style', get_template_directory_uri() . '/style.css', array('polimark-fonts', 'polimark-icons', 'bootstrap', 'fontawesome'));

        // loading child style based on parent style
        wp_enqueue_style('polimark-style', get_stylesheet_directory_uri() . '/style.css', array('polimark-parent-style', 'polimark-main'));
    }

endif;
add_action('wp_enqueue_scripts', 'polimark_child_thm_parent_css');

// END ENQUEUE PARENT ACTION