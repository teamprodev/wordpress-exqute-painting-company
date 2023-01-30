<?php

namespace Layerdrops\Polimark\Widgets;


class VolunteerFeature extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-volunteer-feature';
    }

    public function get_title()
    {
        return __('Volunteer Feature', 'polimark-addon');
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


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'block_heading_title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'block_heading_tagline',
            [
                'label' => __('Tagline', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Tagline', 'polimark-addon'),
            ]
        );

        $feature_text = new \Elementor\Repeater();

        $feature_text->add_control(
            'text',
            [
                'label' => __('Add text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );


        $this->add_control(
            'feature_text',
            [
                'label' => __('Feature Items', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $feature_text->get_controls(),
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' == $settings['layout_type']) : ?>
            <section class="volunteer-feature">
                <div class="container">
                    <?php if (!empty($settings['block_heading_title'])) : ?>
                        <div class="block-heading text-center">
                            <?php if (!empty($settings['block_heading_tagline'])) : ?>
                                <p class="block-heading__text">
                                    <?php echo wp_kses($settings['block_heading_tagline'], 'polimark_allowed_tags'); ?>
                                </p><!-- /.block-heading__text -->
                            <?php endif; ?>
                            <?php if (!empty($settings['block_heading_title'])) : ?>
                                <h2 class="block-heading__title">
                                    <?php echo wp_kses($settings['block_heading_title'], 'polimark_allowed_tags'); ?>
                                </h2><!-- /.block-heading__title -->
                            <?php endif; ?>
                        </div><!-- /.block-heading -->
                    <?php endif; ?>

                    <div class="row">
                        <?php foreach ($settings['feature_text'] as $feature_text) : ?>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="volunteer-feature-card">
                                    <i class="polimark-icon-tick"></i>
                                    <p><?php echo wp_kses($feature_text['text'], 'polimark_allowed_tags'); ?></p>
                                </div><!-- /.volunteer-feature-card -->
                            </div><!-- /.col-md-6 col-lg-4 -->
                        <?php endforeach; ?>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section><!-- /.volunteer-feature -->
        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
