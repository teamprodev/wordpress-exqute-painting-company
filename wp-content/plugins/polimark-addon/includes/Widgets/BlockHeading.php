<?php

namespace Layerdrops\Polimark\Widgets;


class BlockHeading extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-block-heading';
    }

    public function get_title()
    {
        return __('Block Heading', 'polimark-addon');
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
            'title',
            [
                'label' => __('Add Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Heading', 'polimark-addon')
            ]
        );

        $this->add_control(
            'tagline',
            [
                'label' => __('Add Tagline', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Tagline', 'polimark-addon')
            ]
        );

        $this->add_control(
            'text_alignment',
            [
                'label' => __('Text Alignment', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'left',
                'options' => [
                    'left' => __('Text Left', 'polimark-addon'),
                    'right' => __('Text Right', 'polimark-addon'),
                    'center' => __('Text Center', 'polimark-addon'),
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <?php if (!empty($settings['title'])) : ?>
            <div class="block-heading text-<?php echo esc_attr($settings['text_alignment']); ?>">
                <?php if (!empty($settings['tagline'])) : ?>
                    <p class="block-heading__text">
                        <?php echo wp_kses($settings['tagline'], 'polimark_allowed_tags'); ?>
                    </p><!-- /.block-heading__text -->
                <?php endif; ?>
                <?php if (!empty($settings['title'])) : ?>
                    <h2 class="block-heading__title">
                        <?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?>
                    </h2><!-- /.block-heading__title -->
                <?php endif; ?>
            </div><!-- /.block-heading -->
        <?php endif; ?>
<?php
    }

    protected function _content_template()
    {
    }
}
