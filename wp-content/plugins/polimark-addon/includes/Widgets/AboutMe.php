<?php

namespace Layerdrops\Polimark\Widgets;


class AboutMe extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-aboutme';
    }

    public function get_title()
    {
        return __('About Me', 'polimark-addon');
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
            'content_section',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'personal_image',
            [
                'label' => __('Add Thumbnail Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => __('Add Name', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Jhone Doe', 'polimark-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'qoute_text',
            [
                'label' => __('Personal Qoute', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Some special text', 'polimark-addon'),
            ]
        );


        $social_icons = new \Elementor\Repeater();

        $social_icons->add_control(
            'social_icon',
            [
                'label' => __('Select Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_fa_icons(),
                'default' => 'fa-facebook-f',
                'label_block' => true,
            ]
        );

        $social_icons->add_control(
            'social_url',
            [
                'label' => __('Add Url', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'polimark-addon'),
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
            'social_icons',
            [
                'label' => __('Social Icons', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $social_icons->get_controls(),
                'default' => [
                    [
                        'social_icon' => 'fa-facebook-f',
                        'social_url' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                    ],
                ],
                'title_field' => '{{{ social_icon }}}',
            ]
        );

        $text = new \Elementor\Repeater();

        $text->add_control(
            'text',
            [
                'label' => __('Add Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'polimark-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'summery_list',
            [
                'label' => __('Summery List', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $text->get_controls(),
            ]
        );



        $certificate = new \Elementor\Repeater();

        $certificate->add_control(
            'certificate_image',
            [
                'label' => __('Add Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'certificate_images',
            [
                'label' => __('Certificate Image List', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $certificate->get_controls(),
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>

        <section class="about-me-one">
            <div class="auto-container">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="about-me-one__image">
                            <img src="<?php echo esc_attr($settings['personal_image']['url']); ?>" alt="<?php echo esc_attr($settings['name']); ?>">
                        </div><!-- /.about-me-one__image -->
                    </div><!-- /.col-md-12 -->
                    <div class="col-md-12 col-lg-6">
                        <div class="about-me-one__content">
                            <div class="sec-title">
                                <h2><?php echo wp_kses($settings['name'], 'polimark_allowed_tags'); ?></h2>
                            </div>
                            <div class="about-me-one__social">
                                <?php foreach ($settings['social_icons'] as $social_icon) : ?>
                                    <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><i class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></i></a>
                                <?php endforeach; ?>
                            </div><!-- /.about-me-one__social -->

                            <?php foreach ($settings['summery_list'] as $summery) : ?>
                                <p class="about-me-one__text"><?php echo wp_kses($summery['text'], 'polimark_allowed_tags'); ?></p>

                            <?php endforeach; ?>

                            <p class="about-me-one__qoute"><?php echo wp_kses($settings['qoute_text'], 'polimark_allowed_tags'); ?></p>
                            <!-- /.about-me-one__qoute -->

                            <div class="row about-me-one__certificate-row">
                                <?php foreach ($settings['certificate_images'] as $image) : ?>
                                    <div class="col-md-6">
                                        <img src="<?php echo esc_attr($image['certificate_image']['url']); ?>" alt="<?php echo esc_attr($image['certificate_image']['id']); ?>">
                                    </div><!-- /.col-md-6 -->
                                <?php endforeach; ?>
                            </div><!-- /.row -->
                        </div><!-- /.about-me-one__content -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.auto-container -->
        </section><!-- /.about-me-one -->
<?php
    }

    protected function _content_template()
    {
    }
}
