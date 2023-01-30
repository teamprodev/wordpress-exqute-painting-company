<?php

namespace Layerdrops\Polimark;

/**
 * The admin class
 */
class Admin
{

    /**
     * Initialize the class
     */
    function __construct()
    {
        new Metaboxes\Page();
        new Metaboxes\Event();
        new Metaboxes\Team();
        new Metaboxes\Portfolio();
        new Metaboxes\Testimonial();
    }
}
