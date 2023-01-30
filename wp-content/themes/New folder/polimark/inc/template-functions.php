<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package polimark
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function polimark_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'polimark_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function polimark_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'polimark_pingback_header');



if (!function_exists('polimark_menu_fallback_callback')) {
	function polimark_menu_fallback_callback()
	{
		return false;
	}
}


if (!function_exists('polimark_page_title')) :

	// Page Title
	function polimark_page_title()
	{
		if (is_home()) {
			echo esc_html__('Our Blog', 'polimark');
		} elseif (is_archive()) {
			esc_html(the_archive_title());
		} elseif (is_page()) {
			esc_html(the_title());
		} elseif (is_single()) {
			if (is_singular('event')) {
				esc_html_e('Event Details', 'polimark');
			} else {
				esc_html(the_title());
			}
		} elseif (is_category()) {
			esc_html(single_cat_title());
		} elseif (is_search()) {
			echo esc_html__('Search result for: “', 'polimark') . esc_html(get_search_query()) . '”';
		} elseif (is_404()) {
			echo esc_html__('Page Not Found', 'polimark');
		} else {
			esc_html(the_title());
		}
	}

endif;


/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function polimark_search_form($form)
{
	$form = '<form role="search" method="get" class="searchform" action="' . esc_url(home_url('/')) . '" >
        <input type="text" value="' . esc_attr(get_search_query()) . '" name="s" placeholder="' . esc_attr__('Search here...', 'polimark') . '">
        <button type="submit"><i class="icon polimark-icon-magnifying-glass"></i></button>
    </form>';

	return $form;
}
add_filter('get_search_form', 'polimark_search_form');

if (!function_exists('polimark_excerpt')) :

	// Post's excerpt text
	function polimark_excerpt($get_limit_value, $echo = true)
	{
		$opt = $get_limit_value;
		$excerpt_limit = !empty($opt) ? $opt : 40;
		$excerpt = wp_trim_words(get_the_content(), $excerpt_limit, '');
		if ($echo == true) {
			echo esc_html($excerpt);
		} else {
			return esc_html($excerpt);
		}
	}

endif;



// custom kses allowed html
if (!function_exists('polimark_kses_allowed_html')) :
	function polimark_kses_allowed_html($tags, $context)
	{
		switch ($context) {
			case 'polimark_allowed_tags':
				$tags = array(
					'a' => array('href' => array(), 'class' => array()),
					'b' => array(),
					'br' => array(),
					'span' => array('class' => array()),
					'img' => array('class' => array()),
					'i' => array('class' => array()),
					'p' => array('class' => array()),
					'ul' => array('class' => array()),
					'li' => array('class' => array()),
					'div' => array('class' => array()),
					'strong' => array()
				);
				return $tags;
			default:
				return $tags;
		}
	}

	add_filter('wp_kses_allowed_html', 'polimark_kses_allowed_html', 10, 2);

endif;


if (!function_exists('polimark_comment_form_fields')) :

	function polimark_comment_form_fields($fields)
	{
		$comment_field = $fields['comment'];
		unset($fields['comment']);
		unset($fields['cookies']);
		$fields['comment'] = $comment_field;
		return $fields;
	}

endif;

add_filter('comment_form_fields', 'polimark_comment_form_fields');

/**
 * making array of custom icon classes
 * which is saved in transient
 * @return array
 */
if (!function_exists('polimark_get_fa_icons')) :

	function polimark_get_fa_icons()
	{
		$data = get_transient('polimark_fa_icons');

		if (empty($data)) {
			global $wp_filesystem;
			require_once(ABSPATH . '/wp-admin/includes/file.php');
			WP_Filesystem();

			$fontAwesome_file =   get_parent_theme_file_path('/assets/vendors/fontawesome/css/all.min.css');
			$template_icon_file = get_parent_theme_file_path('/assets/vendors/polimark-icons/polimark-icons.css');
			$content = '';

			if ($wp_filesystem->exists($fontAwesome_file)) {
				$content = $wp_filesystem->get_contents($fontAwesome_file);
			} // End If Statement

			if ($wp_filesystem->exists($template_icon_file)) {
				$content .= $wp_filesystem->get_contents($template_icon_file);
			} // End If Statement

			$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s*{\s*content/';
			$pattern_two = '/\.(polimark-icon-(?:\w+(?:-)?)+):before\s*{\s*content/';

			$subject = $content;

			preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
			preg_match_all($pattern_two, $subject, $matches_two, PREG_SET_ORDER);

			$all_matches = array_merge($matches, $matches_two);

			$icons = array();

			foreach ($all_matches as $match) {
				// $icons[] = array('value' => $match[1], 'label' => $match[1]);
				$icons[] = $match[1];
			}


			$data = $icons;
			set_transient('polimark_fa_icons', $data, 2592000); // saved for one month

		}



		return array_combine($data, $data); // combined for key = value
	}


endif;




if (!function_exists('polimark_post_query')) {
	function polimark_post_query($post_type)
	{
		$post_list = get_posts(array(
			'post_type' => $post_type,
			'showposts' => -1,
		));
		$posts = array();

		if (!empty($post_list) && !is_wp_error($post_list)) {
			foreach ($post_list as $post) {
				$options[$post->ID] = $post->post_title;
			}
			return $options;
		}
	}
}


if (!function_exists('polimark_get_nav_menu')) {
	function polimark_get_nav_menu()
	{
		$menu_list = get_terms(array(
			'taxonomy' => 'nav_menu',
			'hide_empty' => true,
		));
		$options = [];
		if (!empty($menu_list) && !is_wp_error($menu_list)) {
			foreach ($menu_list as $menu) {
				$options[$menu->term_id] = $menu->name;
			}
			return $options;
		}
	}
}


/**
 * render footer from default or page builder
 * hooked into polimark_footer
 * location: footer.php
 *
 */

function polimark_render_footer()
{
	get_template_part('template-parts/layout/default-footer');
}

add_action('polimark_footer', 'polimark_render_footer');
