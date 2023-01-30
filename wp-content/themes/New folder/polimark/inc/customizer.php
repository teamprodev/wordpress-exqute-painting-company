<?php

/**
 * polimark Theme Customizer
 *
 * @package polimark
 */


$polimark_config_id = 'polimark_customize';

Kirki::add_config($polimark_config_id, array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
));


/**
 * theme option panel master
 */

Kirki::add_panel('polimark_theme_opt', array(
	'priority'    => 240,
	'title'       => esc_html__('Polimark Options', 'polimark'),
	'description' => esc_html__('Polimark Theme options panel', 'polimark'),
));

/**
 * General options
 */
Kirki::add_section('polimark_theme_general', array(
	'title'          => esc_html__('General Settings', 'polimark'),
	'description'    => esc_html__('Polimark General Settings.', 'polimark'),
	'panel'          => 'polimark_theme_opt',
	'priority'       => 160,
));


// theme base color
Kirki::add_field($polimark_config_id, [
	'type'        => 'color',
	'settings'    => 'theme_base_color',
	'label'       => __('Select Theme Base color', 'polimark'),
	'section'     => 'polimark_theme_general',
	'default'     => sanitize_hex_color('#f5381f'),
]);

// theme primary color
Kirki::add_field($polimark_config_id, [
	'type'        => 'color',
	'settings'    => 'theme_primary_color',
	'label'       => __('Select Theme Primary color', 'polimark'),
	'section'     => 'polimark_theme_general',
	'default'     => sanitize_hex_color('#32369a'),
]);


// theme black color
Kirki::add_field($polimark_config_id, [
	'type'        => 'color',
	'settings'    => 'theme_black_color',
	'label'       => __('Select Theme Black color', 'polimark'),
	'section'     => 'polimark_theme_general',
	'default'     => sanitize_hex_color('#11134f'),
]);

// general options fields

Kirki::add_field($polimark_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'preloader',
	'label'       => esc_html__('Preloader Visibility', 'polimark'),
	'section'     => 'polimark_theme_general',
	'default'     => false,
	'priority'    => 10
]);





Kirki::add_field($polimark_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'scroll_to_top',
	'label'       => esc_html__('Back to top Visibility', 'polimark'),
	'section'     => 'polimark_theme_general',
	'default'     => false,
	'priority'    => 10
]);

Kirki::add_field($polimark_config_id, [
	'type'        => 'select',
	'settings'    => 'scroll_to_top_icon',
	'label'       => esc_html__('Select Back to top icon', 'polimark'),
	'section'     => 'polimark_theme_general',
	'default'     => 'fa-angle-up',
	'priority'    => 10,
	'multiple'    => 0,
	'choices'     => polimark_get_fa_icons(),
	'active_callback'  => function () {
		$switch_value = get_theme_mod('scroll_to_top', true);

		if (true === $switch_value) {
			return true;
		}
		return false;
	},
]);




// background image
Kirki::add_field($polimark_config_id, [
	'type'        => 'image',
	'settings'    => 'preloader_image',
	'label'       => esc_html__('Custom Preloader Image', 'polimark'),
	'section'     => 'polimark_theme_general',
]);

// background image
Kirki::add_field($polimark_config_id, [
	'type'        => 'image',
	'settings'    => 'error_404_image',
	'label'       => esc_html__('Custom 404 Image', 'polimark'),
	'section'     => 'polimark_theme_general',
]);

// page header background image
Kirki::add_field($polimark_config_id, [
	'type'        => 'image',
	'settings'    => 'page_header_bg_image',
	'label'       => esc_html__('Page Header Background Image', 'polimark'),
	'section'     => 'polimark_theme_general',
]);


Kirki::add_field($polimark_config_id, [
	'type'     => 'text',
	'settings' => 'page_header_subtext',
	'label'    => esc_html__('Page Header Sub Text', 'polimark'),
	'section'  => 'polimark_theme_general',
	'default'  => esc_html__('Pore et dolore magna aliqu sit ame spor incididunt ut labore', 'polimark'),
	'priority' => 10,
]);


/**
 * Header options
 */

Kirki::add_section('polimark_theme_header', array(
	'title'          => esc_html__('Header Settings', 'polimark'),
	'description'    => esc_html__('Polimark Header Settings.', 'polimark'),
	'panel'          => 'polimark_theme_opt',
	'priority'       => 160,
));



// set logo width
Kirki::add_field($polimark_config_id, [
	'type'        => 'text',
	'settings'    => 'header_logo_width',
	'label'       => __('Add Logo size in px', 'polimark'),
	'section'     => 'polimark_theme_header',
	'default'     => esc_html(198),
]);




Kirki::add_field($polimark_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'header_btn_switch',
	'label'       => esc_html__('Donate Btn Visibility', 'polimark'),
	'section'     => 'polimark_theme_header',
	'default'     => true,
	'priority'    => 10,
]);


Kirki::add_field($polimark_config_id, [
	'type'     => 'text',
	'settings' => 'header_btn_text',
	'label'    => esc_html__('Donate Btn Text', 'polimark'),
	'section'  => 'polimark_theme_header',
	'default'  => esc_html__('Btn Text', 'polimark'),
	'priority' => 10,
	'active_callback'  => function () {
		$switch_value = get_theme_mod('header_btn_switch', true);

		if (true === $switch_value) {
			return true;
		}
		return false;
	},
]);

Kirki::add_field($polimark_config_id, [
	'type'     => 'link',
	'settings' => 'header_btn_link',
	'label'    => __('Donate Btn Link', 'polimark'),
	'section'  => 'polimark_theme_header',
	'default'  => '#',
	'priority' => 10,
	'active_callback'  => function () {
		$switch_value = get_theme_mod('header_btn_switch', true);

		if (true === $switch_value) {
			return true;
		}
		return false;
	},
]);

Kirki::add_field($polimark_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'header_login_btn_switch',
	'label'       => esc_html__('Login Btn Visibility', 'polimark'),
	'section'     => 'polimark_theme_header',
	'default'     => true,
	'priority'    => 10,
]);



Kirki::add_field($polimark_config_id, [
	'type'     => 'link',
	'settings' => 'header_login_btn_link',
	'label'    => __('Login Page Link', 'polimark'),
	'section'  => 'polimark_theme_header',
	'default'  => '#',
	'priority' => 10,
	'active_callback'  => function () {
		$switch_value = get_theme_mod('header_login_btn_switch', true);

		if (true === $switch_value) {
			return true;
		}
		return false;
	},
]);


// stricky switch
Kirki::add_field($polimark_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'header_stricked_menu',
	'label'       => esc_html__('Stricky Header', 'polimark'),
	'section'     => 'polimark_theme_header',
	'description'    => esc_html__('If you are logged in and your top WordPress Admin bar is active this setting will not effect. But while logged out you will see your sticky menu is toggling by this', 'polimark'),
	'default'     => true,
	'priority'    => 10,
]);

// header banner breadcrumb
Kirki::add_field($polimark_config_id, [
	'type'        => 'switch',
	'settings'    => 'header_search_btn',
	'label'       => esc_html__('Search Button Visibility', 'polimark'),
	'section'     => 'polimark_theme_header',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__('Enable', 'polimark'),
		'off' => esc_html__('Disable', 'polimark'),
	],
]);

// header banner breadcrumb
Kirki::add_field($polimark_config_id, [
	'type'        => 'switch',
	'settings'    => 'breadcrumb_opt',
	'label'       => esc_html__('Breadcrumb Visibility', 'polimark'),
	'section'     => 'polimark_theme_header',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__('Enable', 'polimark'),
		'off' => esc_html__('Disable', 'polimark'),
	],
]);



// Footer options fields
Kirki::add_field($polimark_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'header_custom',
	'label'       => esc_html__('Enable Custom Header', 'polimark'),
	'section'     => 'polimark_theme_header',
	'default'     => false,
	'priority'    => 10,
]);

// Get Footer Custom Post
Kirki::add_field($polimark_config_id, [
	'type'        => 'select',
	'settings'    => 'header_custom_post',
	'label'       => esc_html__('Select Header Type', 'polimark'),
	'choices'     => polimark_post_query('header'),
	'section'     => 'polimark_theme_header',
	'priority'    => 10,
	'active_callback' => function () {
		if (true == post_type_exists('header') && true == get_theme_mod('header_custom')) {
			return true;
		} else {
			return false;
		}
	},
]);


/**
 * Mobile Menu
 */

Kirki::add_section('polimark_theme_mobile_menu', array(
	'title'          => esc_html__('Mobile Menu Settings', 'polimark'),
	'description'    => esc_html__('polimark Mobile Menu Settings.', 'polimark'),
	'panel'          => 'polimark_theme_opt',
	'priority'       => 160,
));

Kirki::add_field($polimark_config_id, [
	'type'     => 'textarea',
	'settings' => 'polimark_mobile_menu_text',
	'label'    => esc_html__('Mobile Menu Content', 'polimark'),
	'section'  => 'polimark_theme_mobile_menu',
	'default'  => esc_html__('Lorem Ipsum is simply dummy text the printing and setting industry. Lorm Ipsum has been the industry', 'polimark'),
	'priority' => 10,
]);

Kirki::add_field($polimark_config_id, [
	'type'        => 'repeater',
	'label'       => esc_html__('Select Social Icons', 'polimark'),
	'section'     => 'polimark_theme_mobile_menu',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__('Social Icons', 'polimark'),
	],
	'button_label' => esc_html__('Add new Icon', 'polimark'),
	'settings'     => 'mobile_menu_social_icons',
	'default'      => [
		[
			'link_icon' => 'fa-facebook',
			'link_url' => esc_url('http://facebook.com'),
		],
	],
	'fields' => [
		'link_icon'  => [
			'type'        => 'select',
			'label'       => esc_html__('Social Icon', 'polimark'),
			'description' => esc_html__('Select Social Icons', 'polimark'),
			'default'     => 'fa-facebook',
			'choices'     => polimark_get_fa_icons(),
		],
		'link_url' => [
			'type'        => 'text',
			'label'       => esc_html__('Link Url', 'polimark'),
			'description' => esc_html__('Add social profile links', 'polimark'),
			'default'     => esc_url('https://facebook.com/'),
		],
	]
]);




/**
 * Footer options
 */

Kirki::add_section('polimark_theme_footer', array(
	'title'          => esc_html__('Footer Settings', 'polimark'),
	'description'    => esc_html__('polimark Footer Settings.', 'polimark'),
	'panel'          => 'polimark_theme_opt',
	'priority'       => 160,
));

// Footer options fields
Kirki::add_field($polimark_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'footer_custom',
	'label'       => esc_html__('Enable Custom Footer', 'polimark'),
	'section'     => 'polimark_theme_footer',
	'default'     => false,
	'priority'    => 10,
]);

// Get Footer Custom Post
Kirki::add_field($polimark_config_id, [
	'type'        => 'select',
	'settings'    => 'footer_custom_post',
	'label'       => esc_html__('Select Footer Type', 'polimark'),
	'choices'     => polimark_post_query('footer'),
	'section'     => 'polimark_theme_footer',
	'priority'    => 10,
	'active_callback' => function () {
		if (true == post_type_exists('footer') && true == get_theme_mod('footer_custom')) {
			return true;
		} else {
			return false;
		}
	},
]);


Kirki::add_field($polimark_config_id, [
	'type'     => 'text',
	'settings' => 'footer_copytext',
	'label'    => esc_html__('Text Control', 'polimark'),
	'section'  => 'polimark_theme_footer',
	'default'  => esc_html__('&copy; All right reserved', 'polimark'),
	'priority' => 10,
	'sanitize_callback' => function ($input) {
		return wp_kses($input, 'polimark_allowed_tags');;
	},
	'active_callback' => function () {
		if (false == get_theme_mod('footer_custom')) {
			return true;
		}
	},
]);
