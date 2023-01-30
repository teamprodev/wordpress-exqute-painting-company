<?php

namespace Layerdrops\Polimark\Metaboxes;


class Page
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'page_metabox']);
    }

    function page_metabox()
    {
        $prefix = 'polimark_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'page_option',
            'title'        => __('General Options', 'polimark-addon'),
            'object_types' => array('page'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $general->add_field(array(
            'name' => __('Enable Custom Header', 'polimark-addon'),
            'id' => $prefix . 'custom_header_status',
            'type' => 'radio',
            'options' => array(
                'on' => __('On', 'polimark-addon'),
                'off'   => __('Off', 'polimark-addon'),
            ),
        ));


        $general->add_field(array(
            'name' => __('Select Custom Header', 'polimark-addon'),
            'id' => $prefix . 'select_custom_header',
            'type' => 'pw_select',
            'options' => polimark_post_query('header'),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'custom_header_status',
                'data-conditional-value' => 'on',
            ),
        ));

        $general->add_field(array(
            'name' => __('Enable Custom Footer', 'polimark-addon'),
            'id' => $prefix . 'custom_footer_status',
            'type' => 'radio',
            'options' => array(
                'on' => __('On', 'polimark-addon'),
                'off'   => __('Off', 'polimark-addon'),
            ),
        ));


        $general->add_field(array(
            'name' => __('Select Custom Footer', 'polimark-addon'),
            'id' => $prefix . 'select_custom_footer',
            'type' => 'pw_select',
            'options' => polimark_post_query('footer'),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'custom_footer_status',
                'data-conditional-value' => 'on',
            ),
        ));


        $general->add_field(array(
            'name' => __('Show Page Banner', 'polimark-addon'),
            'id' => $prefix . 'show_page_banner',
            'type' => 'radio',
            'default' => 'on',
            'options' => array(
                'on' => __('On', 'polimark-addon'),
                'off' => __('Off', 'polimark-addon'),
            ),
        ));

        $general->add_field(array(
            'name' => __('Enable BreadCrumb', 'polimark-addon'),
            'id' => $prefix . 'show_page_breadcrumb',
            'type' => 'radio',
            'default' => 'on',
            'options' => array(
                'on' => __('On', 'polimark-addon'),
                'off' => __('Off', 'polimark-addon'),
            ),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'show_page_banner',
                'data-conditional-value' => 'on',
            ),
        ));

        $general->add_field(array(
            'name' => __('Header Title', 'polimark-addon'),
            'id' => $prefix . 'set_header_title',
            'type' => 'text',
            'attributes' => array(
                'data-conditional-id' => $prefix . 'show_page_banner',
                'data-conditional-value' => 'on',
            ),
        ));

        $general->add_field(array(
            'name' => __('Header Sub Title', 'polimark-addon'),
            'id' => $prefix . 'set_header_sub_title',
            'type' => 'text',
            'attributes' => array(
                'data-conditional-id' => $prefix . 'show_page_banner',
                'data-conditional-value' => 'on',
            ),
        ));

        $general->add_field(array(
            'name' => __('Header Image', 'polimark-addon'),
            'id' => $prefix . 'set_header_image',
            'type' => 'file',
            'attributes' => array(
                'data-conditional-id' => $prefix . 'show_page_banner',
                'data-conditional-value' => 'on',
            ),
        ));

        $color_options = new_cmb2_box(array(
            'id'           => $prefix . 'page_color_option',
            'title'        => __('Color Options', 'polimark-addon'),
            'object_types' => array('page'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));


        $color_options->add_field(array(
            'name' => __('Base Color', 'polimark-addon'),
            'id' => $prefix . 'base_color',
            'type'    => 'colorpicker',
        ));
        $color_options->add_field(array(
            'name' => __('Primary Color', 'polimark-addon'),
            'id' => $prefix . 'primary_color',
            'type'    => 'colorpicker',
        ));
        $color_options->add_field(array(
            'name' => __('black Color', 'polimark-addon'),
            'id' => $prefix . 'black_color',
            'type'    => 'colorpicker',
        ));
    }
}
