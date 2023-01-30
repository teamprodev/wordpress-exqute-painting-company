<?php

namespace Layerdrops\Polimark;

class Assets
{

    /**
     * Class constructor
     */
    function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_assets']);
        add_action('admin_enqueue_scripts', [$this, 'register_assets']);
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts()
    {
        return [
            'swiper' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/swiper/js/swiper.min.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/swiper/js/swiper.min.js'),
                'deps'    => ['jquery']
            ],
            'appear' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/appear/appear.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/appear/appear.js'),
                'deps'    => ['jquery']
            ],
            'jquery-ajaxchimp' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js'),
                'deps'    => ['jquery']
            ],
            'knob' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/knob/knob.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/knob/knob.js'),
                'deps'    => ['jquery']
            ],
            'isotope' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/isotope/isotope.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/isotope/isotope.js'),
                'deps'    => ['jquery']
            ],
            'jquery-fancybox' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/jquery-fancybox/jquery.fancybox.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/jquery-fancybox/jquery.fancybox.js'),
                'deps'    => ['jquery']
            ],
            'jquery-easing' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/jquery-easing/jquery.easing.min.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/jquery-easing/jquery.easing.min.js'),
                'deps'    => ['jquery']
            ],
            'wow' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/wow/wow.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/wow/wow.js'),
                'deps'    => ['jquery']
            ],
            'owl-carousel' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/owl-carousel/owl.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/owl-carousel/owl.js'),
                'deps'    => ['jquery']
            ],
            'mixitup' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/mixitup/mixitup.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/mixitup/mixitup.js'),
                'deps'    => ['jquery']
            ],
            'tweetie' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/tweetie/tweetie.min.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/tweetie/tweetie.min.js'),
                'deps'    => ['jquery']
            ],
            'jarallax' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/jarallax/jarallax.min.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/jarallax/jarallax.min.js'),
                'deps'    => ['jquery']
            ],
            'countdown' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/countdown/countdown.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/countdown/countdown.js'),
                'deps'    => ['jquery']
            ],
            'polimark-addon-script' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/js/polimark-addon.js',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/js/polimark-addon.js'),
                'deps'    => ['jquery', 'jquery-ui-core', 'jquery-ui-selectmenu']
            ]
        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles()
    {
        return [
            'swiper' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/swiper/css/swiper.min.css',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/swiper/css/swiper.min.css')
            ],
            'animate' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/animate/animate.min.css',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/animate/animate.min.css')
            ],
            'reey-font' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/reey-font/stylesheet.css',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/reey-font/stylesheet.css')
            ],
            'jquery-fancybox' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/jquery-fancybox/jquery.fancybox.min.css',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/jquery-fancybox/jquery.fancybox.min.css')
            ],
            'owl-carousel' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/owl-carousel/owl.css',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/owl-carousel/owl.css')
            ],
            'jarallax' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/jarallax/jarallax.css',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/jarallax/jarallax.css')
            ],
            'jquery-ui' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/vendors/jquery-ui/jquery-ui.css',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/vendors/jquery-ui/jquery-ui.css')
            ],
            'polimark-addon-style' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/css/polimark-addon.css',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/css/polimark-addon.css')
            ],
            'polimark-addon-admin-style' => [
                'src'     => POLIMARK_ADDON_ASSETS . '/css/polimark-addon-admin.css',
                'version' => filemtime(POLIMARK_ADDON_PATH . '/assets/css/polimark-addon-admin.css')
            ]
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets()
    {
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;

            wp_register_script($handle, $script['src'], $deps, $script['version'], true);
        }

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;

            wp_register_style($handle, $style['src'], $deps, $style['version']);
        }
    }
}
