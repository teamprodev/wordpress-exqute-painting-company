<?php

namespace Layerdrops\Polimark\Widgets;


class Team extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-team';
    }

    public function get_title()
    {
        return __('Team', 'polimark-addon');
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
                    'layout_three' => __('Layout Three', 'polimark-addon'),
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
            'tagline',
            [
                'label' => __('Tagline', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('A cute tagline', 'polimark-addon'),
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Post Options', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'post_count',
            [
                'label' => __('Number Of Posts', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 0,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 6,
                ],
            ]
        );

        $this->add_control(
            'select_category',
            [
                'label' => __('Post Category', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_taxonoy('team_cat')
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' == $settings['layout_type']) : ?>
            <!-- Team Section -->
            <section class="team-one">
                <div class="container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="block-heading text-center">
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


                    <div class="row">
                        <?php echo do_shortcode('[polimark-team post_count="' . $settings['post_count']['size'] . '" select_category="' . $settings['select_category'] . '" ]'); ?>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section>
        <?php endif; ?>
        <?php if ('layout_two' == $settings['layout_type']) : ?>
            <!-- Team Section -->
            <section class="team-two">
                <div class="container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="block-heading text-center">
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

                    <div class="row">
                        <?php echo do_shortcode('[polimark-team-two post_count="' . $settings['post_count']['size'] . '" select_category="' . $settings['select_category'] . '" ]'); ?>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section>
        <?php endif; ?>

        <?php if ('layout_three' == $settings['layout_type']) : ?>

            <div class="team-two-carousel">
                <div class="container-fluid">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="block-heading text-center">
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
                    <div class="team-two-carousel__owl owl-carousel owl-theme">
                        <?php echo do_shortcode('[polimark-team-three post_count="' . $settings['post_count']['size'] . '" select_category="' . $settings['select_category'] . '" ]'); ?>
                    </div><!-- /.team-two-carousel__owl owl-carousel owl-theme -->
                </div><!-- /.container-fluid -->
            </div><!-- /.team-two-carousel -->

        <?php endif; ?>
<?php
    }

    protected function _content_template()
    {
    }
}
