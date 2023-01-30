<?php

namespace Layerdrops\Polimark\Widgets;


class ImageBox extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-image-box';
    }

    public function get_title()
    {
        return __('Image Box', 'polimark-addon');
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
            'images',
            [
                'label' => __('Add Images', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::GALLERY,
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => __('Select Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_fa_icons(),
            ]
        );




        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <section class="image-box">
            <div class="image-box__icon">
                <i class="<?php echo esc_attr($settings['icon']); ?>"></i>
            </div><!-- /.image-box__icon -->
            <div class="image-box__images">
                <?php foreach ($settings['images'] as $image) : ?>
                    <?php echo wp_get_attachment_image($image['id'], 'polimark_270x169'); ?>
                <?php endforeach; ?>
            </div><!-- /.image-box__images -->
        </section><!-- /.image-box -->
<?php
    }

    protected function _content_template()
    {
    }
}
