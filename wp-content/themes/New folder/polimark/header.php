<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package polimark
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php $polimark_preloader_status = get_theme_mod('preloader', false); ?>
	<?php if (true === $polimark_preloader_status) : ?>
		<!-- Preloader -->
		<div class="preloader">
			<div class="icon"></div>
		</div>
	<?php endif; ?>

	<div class="page-wrapper">
		<div id="page" class="site">

			<!-- theme header -->
			<?php get_template_part('template-parts/layout/default', 'header'); ?>

			<?php $polimark_page_header_status = empty(get_post_meta(get_the_ID(), 'polimark_show_page_banner', true)) ? 'on' : get_post_meta(get_the_ID(), 'polimark_show_page_banner', true);
			?>

			<?php if (is_page() && 'on' === $polimark_page_header_status) : ?>
				<?php get_template_part('template-parts/layout/page', 'header'); ?>
			<?php elseif (!is_page()) : ?>
				<?php get_template_part('template-parts/layout/page', 'header'); ?>
			<?php endif; ?>