<?php

namespace Layerdrops\Polimark\Metaboxes;


class Event
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'polimark_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'event_option',
            'title'        => __('Event Options', 'polimark-addon'),
            'object_types' => array('event'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));


        $general->add_field(array(
            'name' => __('Select Date', 'polimark-addon'),
            'id' => $prefix . 'event_date',
            'type' => 'text_date',
        ));
        $general->add_field(array(
            'name' => __('Add Time', 'polimark-addon'),
            'id' => $prefix . 'event_time',
            'type' => 'text',
        ));
        $general->add_field(array(
            'name' => __('Event Venue', 'polimark-addon'),
            'id' => $prefix . 'event_venue',
            'type' => 'text',
        ));
        $general->add_field(array(
            'name' => __('Event Location', 'polimark-addon'),
            'id' => $prefix . 'event_location',
            'type' => 'text',
        ));
        $general->add_field(array(
            'name' => __('Location Map URL', 'polimark-addon'),
            'id' => $prefix . 'location_map',
            'type' => 'text',
        ));

        $speaker_options = $general->add_field(array(
            'name' => __('Event Speakers', 'linoor-addon'),
            'id' => $prefix . 'event_speakers',
            'type' => 'group',
        ));

        $general->add_group_field($speaker_options, array(
            'name' => __('Speaker Image', 'linoor-addon'),
            'id' => $prefix . 'speaker_image',
            'type' => 'file',
        ));
        $general->add_group_field($speaker_options, array(
            'name' => __('Speaker Name', 'linoor-addon'),
            'id' => $prefix . 'speaker_name',
            'type' => 'text',
        ));
        $general->add_group_field($speaker_options, array(
            'name' => __('Speaker Designation', 'linoor-addon'),
            'id' => $prefix . 'speaker_designation',
            'type' => 'text',
        ));
    }
}
