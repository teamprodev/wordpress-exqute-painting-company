<?php

/**
 * Template part for displaying footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package polimark
 */
?>


<?php
$polimark_page_id     = get_queried_object_id();
$polimark_custom_footer_status = !empty(get_post_meta($polimark_page_id, 'polimark_custom_footer_status', true)) ? get_post_meta($polimark_page_id, 'polimark_custom_footer_status', true) : 'off';
$polimark_custom_footer_id = '';

if (is_page() && 'on' === $polimark_custom_footer_status) {
    $polimark_custom_footer_id = get_post_meta($polimark_page_id, 'polimark_select_custom_footer', true);
} elseif (true == get_theme_mod('footer_custom')) {
    $polimark_custom_footer_id = get_theme_mod('footer_custom_post');
} else {
    $polimark_custom_footer_id = 'default_footer';
}

$polimark_dynamic_footer = isset($_GET['custom_footer_id']) ? $_GET['custom_footer_id'] : $polimark_custom_footer_id;

?>

<?php if ('default_footer' == $polimark_dynamic_footer) : ?>
    <!-- Main Footer -->
    <div class="default-footer text-center">
        <div class="container">
            <p class="default-footer__text"><?php echo wp_kses(get_theme_mod('footer_copytext', esc_html__('&copy; Copyright 2021 by Layerdrops.com', 'polimark')), 'polimark_allowed_tags'); ?></p>
        </div><!-- /.container -->
    </div><!-- /.default-footer -->

<?php else : ?>
    <?php echo do_shortcode('[polimark-footer id="' . $polimark_dynamic_footer . '"]');
    ?>
<?php endif; ?>