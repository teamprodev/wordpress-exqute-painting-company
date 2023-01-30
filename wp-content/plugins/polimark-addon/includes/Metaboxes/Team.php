<?php

namespace Layerdrops\Polimark\Metaboxes;


class Team
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'polimark_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'team_option',
            'title'        => __('Team Options', 'polimark-addon'),
            'object_types' => array('team'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $general->add_field(array(
            'name' => __('Desceptions', 'polimark-addon'),
            'id' => $prefix . 'desceptions',
            'type' => 'textarea',
        ));

        $general->add_field(array(
            'name' => __('Designation', 'polimark-addon'),
            'id' => $prefix . 'designation',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => __('Tagline', 'polimark-addon'),
            'id' => $prefix . 'tagline',
            'type' => 'text',
        ));


        $general->add_field(array(
            'name' => __('Signeture Image', 'polimark-addon'),
            'id' => $prefix . 'signeture_image',
            'type' => 'file',
        ));

        $team_social = $general->add_field(array(
            'name' => __('Social Profiles', 'polimark-addon'),
            'id' => $prefix . 'team_social',
            'type' => 'group',
        ));

        $general->add_group_field($team_social, array(
            'name' => __('Icon', 'polimark-addon'),
            'id' => $prefix . 'icon',
            'type' => 'pw_select',
            'default' => 'fa-facebook-f',
            'options' => polimark_get_fa_icons(),
        ));

        $general->add_group_field($team_social, array(
            'name' => __('Link URL', 'polimark-addon'),
            'id' => $prefix . 'link',
            'type' => 'text',
        ));
    }
}
