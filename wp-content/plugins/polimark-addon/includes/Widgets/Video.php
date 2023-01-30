<?php

namespace Layerdrops\Polimark\Widgets;


class Video extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-video';
    }

    public function get_title()
    {
        return __('Video', 'polimark-addon');
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
            'content_section',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_one'
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
            'sub_text',
            [
                'label' => __('Sub Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'polimark-addon'),
            ]
        );


        $this->add_control(
            'video_url',
            [
                'label' => __('Video Url', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('#', 'polimark-addon'),
                'default' => '#',
            ]
        );

        $this->add_control(
            'video_text',
            [
                'label' => __('Video Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Default Text', 'polimark-addon'),
            ]
        );


        $this->add_control(
            'image',
            [
                'label' => __('Add Background Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );


        $this->end_controls_section();
        $this->start_controls_section(
            'layout_two_content_section',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_two'
                ]
            ]
        );

        $this->add_control(
            'layout_two_video_url',
            [
                'label' => __('Video Url', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('#', 'polimark-addon'),
                'default' => '#',
            ]
        );

        $this->add_control(
            'layout_two_image',
            [
                'label' => __('Add Background Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <?php if ('layout_one' === $settings['layout_type']) : ?>

            <section class="video-one jarallax" data-jarallax data-speed="0.3" data-imgPosition="100% 100%">
                <img src="<?php echo esc_attr($settings['image']['url']); ?>" class="jarallax-img" alt="<?php echo esc_attr(get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true)); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <?php if (!empty($settings['title'])) : ?>
                                <div class="block-heading text-left">
                                    <?php if (!empty($settings['sub_title'])) : ?>
                                        <p class="block-heading__text">
                                            <?php echo wp_kses($settings['sub_title'], 'polimark_allowed_tags'); ?>
                                        </p><!-- /.block-heading__text -->
                                    <?php endif; ?>
                                    <?php if (!empty($settings['title'])) : ?>
                                        <h2 class="block-heading__title">
                                            <?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?>
                                        </h2><!-- /.block-heading__title -->
                                    <?php endif; ?>
                                    <?php if (!empty($settings['sub_text'])) : ?>
                                        <p class="block-heading__paragraph">
                                            <?php echo wp_kses($settings['sub_text'], 'polimark_allowed_tags'); ?>
                                        </p><!-- /.block-heading__title -->
                                    <?php endif; ?>
                                </div><!-- /.block-heading -->
                            <?php endif; ?>
                        </div><!-- /.col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="video-one__box">
                                <?php if (!empty($settings['video_url'])) : ?>
                                    <a href="<?php echo esc_url($settings['video_url']); ?>" class="lightbox-image video-one__btn">
                                        <i class="fa fa-play"></i>
                                        <span class="ripple"></span><!-- /.ripple -->
                                    </a><!-- /.lightbox-image -->
                                <?php endif; ?>
                                <?php if (!empty($settings['video_text'])) : ?>
                                    <p class="video-one__text">
                                        <?php echo wp_kses($settings['video_text'], 'polimark_allowed_tags'); ?>
                                    </p><!-- /.video-one__text -->
                                <?php endif; ?>
                            </div><!-- /.video-one__box -->
                        </div><!-- /.col-lg-8 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section><!-- /.video-one -->

        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>
            <section class="video-two ">
                <div class="container">
                    <div class="inner-container " style="background-image: url(<?php echo esc_attr($settings['layout_two_image']['url']); ?>);">
                        <?php if (!empty($settings['layout_two_video_url'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_two_video_url']); ?>" class="lightbox-image video-two__btn">
                                <i class="fa fa-play"></i>
                                <span class="ripple"></span><!-- /.ripple -->
                            </a><!-- /.lightbox-image -->
                        <?php endif; ?>
                    </div><!-- /.inner-container -->
                </div><!-- /.container -->
            </section><!-- /.video-two -->
        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
