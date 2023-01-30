<?php

namespace Layerdrops\Polimark\Widgets;


class Gallery extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-gallery';
    }

    public function get_title()
    {
        return __('Gallery', 'polimark-addon');
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
            ]
        );

        $gallery_images = new \Elementor\Repeater();

        $gallery_images->add_control(
            'image',
            [
                'label' => __('Add Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );


        $this->add_control(
            'gallery_images',
            [
                'label' => __('Box Items', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $gallery_images->get_controls(),
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' == $settings['layout_type']) : ?>
            <!-- Gallery Section-->
            <section class="gallery-section">
                <div class="sponsors-outer">
                    <!-- Gallery -->
                    <div class="container">
                        <div class="row">
                            <?php foreach ($settings['gallery_images'] as $image) : ?>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="gallery-item">
                                        <figure class="image-box"><a class="fancy-lightbox-image" href="<?php echo esc_url($image['image']['url']); ?>">
                                                <?php echo wp_get_attachment_image($image['image']['id'], 'polimark_370x370'); ?>
                                                <span class="gallery-item__arrow"></span><!-- /.gallery-item__arrow -->
                                            </a></figure>
                                    </div>
                                </div><!-- /.col-lg-4 col-md-6 col-sm-12 -->
                            <?php endforeach; ?>
                        </div><!-- /.row -->

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
