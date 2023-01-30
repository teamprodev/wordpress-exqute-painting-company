<?php

namespace Layerdrops\Polimark;

class Utility
{
    public function __construct()
    {
        $this->register_image_size();
        add_filter('single_template', [$this, 'load_event_template']);
    }
    public function register_image_size()
    {
        add_image_size('polimark_brand_logo_150X80', 150, 80, true); // sponsor logo
        add_image_size('polimark_90x90', 90, 90, true); // footer blog
        add_image_size('polimark_370x228', 370, 228, true); // blog, event grid
        add_image_size('polimark_192x192', 192, 192, true); // team one grid
        add_image_size('polimark_320x320', 320, 320, true); // team two grid
        add_image_size('polimark_370x370', 370, 370, true); // gallery grid
        add_image_size('polimark_770x408', 770, 408, true); // event details
        add_image_size('polimark_60x60', 60, 60, true); // event speaker
        add_image_size('polimark_160x90', 160, 90, true); // about progress
        add_image_size('polimark_456x498', 456, 498, true); // event grid two
        add_image_size('polimark_270x169', 270, 169, true); // faq gallery
        add_image_size('polimark_370x452', 370, 452, true); // featured two
    }


    public function load_event_template($template)
    {
        global $post;

        if ('event' === $post->post_type && locate_template(array('single-event.php')) !== $template) {
            /*
            * This is a 'event' post
            * AND a 'single event template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return POLIMARK_ADDON_PATH . '/post-templates/single-event.php';
        }

        return $template;
    }
}
