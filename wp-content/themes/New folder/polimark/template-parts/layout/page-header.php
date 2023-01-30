<?php

/**
 * Template part for displaying Page Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package polimark
 */
?>

<?php $polimark_page_sub_title = !empty(get_post_meta(get_the_ID(), 'polimark_set_header_sub_title', true)) ? get_post_meta(get_the_ID(), 'polimark_set_header_sub_title', true) : get_theme_mod('page_header_subtext'); ?>
<?php $polimark_page_title_text = !empty(get_post_meta(get_the_ID(), 'polimark_set_header_title', true)) ? get_post_meta(get_the_ID(), 'polimark_set_header_title', true) : get_the_title();
$polimark_page_header_bg = empty(get_post_meta(get_the_ID(), 'polimark_set_header_image', true)) ? get_theme_mod('page_header_bg_image') : get_post_meta(get_the_ID(), 'polimark_set_header_image', true); ?>

<?php $polimark_page_header_class = (empty($polimark_page_sub_title)) ? 'page-header-only-title' : ' '; ?>

<section class="page-header <?php echo esc_attr($polimark_page_header_class); ?>">
    <div class="image-layer"></div><!-- /.image-layer -->
    <div class="container">

        <h2 class="page-header__title <?php echo esc_attr(empty($polimark_page_header_bg) ? 'page-header__title--full' : ' '); ?>">
            <?php if (!is_page()) : ?>
                <?php polimark_page_title(); ?>
            <?php else : ?>
                <?php echo wp_kses($polimark_page_title_text, 'polimark_allowed_tags') ?>
            <?php endif; ?>
        </h2>
        <?php if (!empty($polimark_page_sub_title)) : ?>
            <p class="page-header__text <?php echo esc_attr(empty($polimark_page_header_bg) ? 'page-header__text--full' : ' '); ?>"><?php echo wp_kses($polimark_page_sub_title, 'polimark_allowed_tags'); ?></p>
        <?php endif; ?>
        <?php $polimark_page_meta_breadcumb_status = empty(get_post_meta(get_the_ID(), 'polimark_show_page_breadcrumb', true)) ? 'on' : get_post_meta(get_the_ID(), 'polimark_show_page_breadcrumb', true); ?>

        <?php if (function_exists('bcn_display') && 'on' == get_theme_mod('breadcrumb_opt', 'off') && 'on' == $polimark_page_meta_breadcumb_status) : ?>
            <div class="breadcrumbs page-header__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php bcn_display(); ?>
            </div>
        <?php endif; ?>
    </div><!-- /.container -->
</section><!-- /.page-header -->