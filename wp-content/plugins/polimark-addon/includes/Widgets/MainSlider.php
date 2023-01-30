<?php

namespace Layerdrops\Polimark\Widgets;


class MainSlider extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-main-slider';
    }

    public function get_title()
    {
        return __('Main Slider', 'polimark-addon');
    }

    public function get_icon()
    {
        return 'eicon-cogs';
    }

    public function get_categories()
    {
        return ['polimark-category'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'layout_section',
            [
                'label' => __('Layout', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'layout_type',
            [
                'label' => __('Select Layout', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'layout_one',
                'options' => [
                    'layout_one' => __('Layout One', 'polimark-addon'),
                    'layout_two' => __('Layout Two', 'polimark-addon'),
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'layout_one_content_section',
            [
                'label' => __('Slider Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'layout_type',
                            'operator' => '==',
                            'value' => 'layout_one'
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'summery',
            [
                'label' => __('Summery Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'layout_one_background_image',
            [
                'label' => __('Background Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'layout_one_person_image',
            [
                'label' => __('Person Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'layout_one_person_name',
            [
                'label' => __('Person Name', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Jessica Brown', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'mailchimp_url',
            [
                'label' => __('Add Mailchimp URL'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'mailchimp_email',
            [
                'label' => __('Add Email Field Placeholder'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Email Address', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'mailchimp_zip',
            [
                'label' => __('Add Zip Field Placeholder'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Zip Code', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'mailchimp_button',
            [
                'label' => __('Add Mailchimp Button Label'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Sign Up', 'polimark-addon'),
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'content_section_two',
            [
                'label' => __('Banner Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'layout_type',
                            'operator' => '==',
                            'value' => 'layout_two'
                        ]
                    ]
                ]
            ]
        );



        $slider = new \Elementor\Repeater();


        $slider->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $slider->add_control(
            'title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
            ]
        );

        $slider->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'linoor-addon'),
            ]
        );

        $slider->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $slider->add_control(
            'button_url',
            [
                'label' => __('Button Url', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'linoor-addon'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_label' => false,
            ]
        );

        $this->add_control(
            'sliders',
            [
                'label' => __('Social Icons', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $slider->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome Title', 'linoor-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' === $settings['layout_type']) : ?>

            <!-- Banner Section -->

            <section class="slider-one">
                <div class="slider-one__bg float-bob-x" style="background-image: url(<?php echo esc_url($settings['layout_one_background_image']['url']); ?>); "></div><!-- /.slider-one__bg float-bob-x -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider-one__content">
                                <?php if (!empty($settings['sub_title'])) : ?>
                                    <p class="slider-one__sub-title">
                                        <?php echo wp_kses($settings['sub_title'], 'polimark_allowed_tags'); ?>
                                    </p><!-- /.slider-one__sub-title -->
                                <?php endif; ?>
                                <?php if (!empty($settings['title'])) : ?>
                                    <h2 class="slider-one__title">
                                        <?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?>
                                    </h2><!-- /.slider-one__sub-title -->
                                <?php endif; ?>
                                <?php if (!empty($settings['summery'])) : ?>
                                    <p class="slider-one__summery">
                                        <?php echo wp_kses($settings['summery'], 'polimark_allowed_tags'); ?>
                                    </p><!-- /.slider-one__sub-title -->
                                <?php endif; ?>
                                <?php if (!empty($settings['mailchimp_url'])) : ?>
                                    <form class="slider-one__form mc-form" data-url="<?php echo esc_url($settings['mailchimp_url']); ?>">
                                        <div class="slider-one__form__inputs">
                                            <input type="email" name="EMAIL" value="" placeholder="<?php echo esc_html($settings['mailchimp_email']); ?>">
                                            <input type="text" placeholder="<?php echo esc_html($settings['mailchimp_zip']); ?>" name="ZIP">
                                        </div><!-- /.slider-one__form__inputs -->
                                        <button type="submit" class="thm-btn slider-one__form__btn">
                                            <?php echo esc_html($settings['mailchimp_button']); ?>
                                            <i class="fa fa-angle-right"></i>
                                        </button>
                                    </form><!-- /.slider-one__form -->
                                <?php endif; ?>
                            </div><!-- /.slider-one__content -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                    <?php if (!empty($settings['layout_one_person_image']['url'])) : ?>
                        <div class="slider-one__image fadeIn wow" data-wow-duration="1500ms">
                            <?php if (!empty($settings['layout_one_person_name'])) : ?>
                                <h3 class="slider-one__image__name">
                                    <?php echo wp_kses($settings['layout_one_person_name'], 'polimark_allowed_tags'); ?>
                                </h3><!-- /.slider-one__image__name -->
                            <?php endif; ?>
                            <img class="float-bob-y-2" src="<?php echo esc_attr($settings['layout_one_person_image']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($settings['layout_one_person_image']['id'], '_wp_attachment_image_alt', true)); ?>">
                        </div><!-- /.slider-one__image -->
                    <?php endif; ?>
                </div><!-- /.container -->
            </section><!-- /.slider-one -->

            <!--End Banner Section -->

        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>

            <!-- Banner Section -->

            <section class="slider-two">
                <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
    "effect": "fade",
    "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
      },
    "autoplay": {
        "delay": 5000
    }}'>
                    <div class="swiper-wrapper">

                        <?php foreach ($settings['sliders'] as $slider) : ?>
                            <div class="swiper-slide">
                                <div class="image-layer" style="background-image: url(<?php echo esc_url($slider['background_image']['url']); ?>);"></div><!-- /.image-layer -->

                                <div class="container">
                                    <?php if (!empty($slider['sub_title'])) : ?>
                                        <h3 class="slider-two__sub__title">
                                            <?php echo wp_kses($slider['sub_title'], 'polimark_allowed_tags'); ?>
                                        </h3><!-- /.slider-two__sub__title -->
                                    <?php endif; ?>
                                    <?php if (!empty($slider['title'])) : ?>
                                        <h3 class="slider-two__title">
                                            <?php echo wp_kses($slider['title'], 'polimark_allowed_tags'); ?>
                                        </h3><!-- /.slider-two__title -->
                                    <?php endif; ?>
                                    <?php if (!empty($slider['button_label'])) : ?>
                                        <a href="<?php echo esc_url($slider['button_url']['url']); ?>" class="thm-btn">
                                            <?php echo wp_kses($slider['button_label'], 'polimark_allowed_tags'); ?>
                                            <i class="fa fa-angle-right"></i>
                                        </a><!-- /.thm-btn -->
                                    <?php endif; ?>
                                </div><!-- /.container -->
                            </div><!-- /.swiper-slide -->
                        <?php endforeach; ?>

                    </div><!-- /.swiper-wrapper -->

                    <div class="swiper-pagination" id="main-slider-pagination"></div>

                </div><!-- /.swiper-container thm-swiper__slider -->
            </section><!-- /.slider-two -->

            <!--End Banner Section -->

        <?php endif; ?>
<?php
    }

    protected function _content_template()
    {
    }
}
