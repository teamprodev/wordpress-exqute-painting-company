<?php

namespace Layerdrops\Polimark\Widgets;


class Sponsors extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-sponsors';
    }

    public function get_title()
    {
        return __('Sponsors', 'polimark-addon');
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

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $sponsor_images = new \Elementor\Repeater();

        $sponsor_images->add_control(
            'image',
            [
                'label' => __('Add Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $sponsor_images->add_control(
            'link',
            [
                'label' => __('Add Link', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'sponsor_images',
            [
                'label' => __('Box Items', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $sponsor_images->get_controls(),
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' == $settings['layout_type']) : ?>
            <!--Sponsors Section-->
            <section class="sponsors-section">
                <div class="sponsors-outer">
                    <!--Sponsors-->
                    <div class="container">
                        <!--Sponsors Carousel-->
                        <div class="sponsors-carousel owl-theme owl-carousel">
                            <?php foreach ($settings['sponsor_images'] as $image) : ?>
                                <div class="slide-item">
                                    <figure class="image-box"><a href="<?php echo esc_url($image['link']); ?>">
                                            <?php echo wp_get_attachment_image($image['image']['id'], 'polimark_brand_logo_150X80'); ?>
                                        </a></figure>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
