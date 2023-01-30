<?php

namespace Layerdrops\Polimark\Widgets;


class DonationForm extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-donation-form';
    }

    public function get_title()
    {
        return __('Donation Form', 'polimark-addon');
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

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Select Forms', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'select_give_form',
            [
                'label'       => esc_html__('Select your Donation Form', 'polimark-addon'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => polimark_post_query('give_forms'),
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label'       => esc_html__('Donate Button Text', 'polimark-addon'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Donate', 'polimark-addon'),
            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'layout_one_content_section',
            [
                'label' => __('Layout One Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->add_control(
            'layout_one_title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'layout_two_content_section',
            [
                'label' => __('Layout Two Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_two'
                ]
            ]
        );

        $this->add_control(
            'layout_two_title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'layout_two_tagline',
            [
                'label' => __('Tagline', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Default Tagline', 'polimark-addon'),
            ]
        );
        $this->add_control(
            'layout_two_gallery',
            [
                'label' => __('Add Images', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::GALLERY,
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' == $settings['layout_type']) : ?>

            <section class="donation-form-one">
                <div class="container">
                    <div class="inner-container">
                        <?php if (!empty($settings['layout_one_title'])) : ?>
                            <h3 class="donation-form-one__title">
                                <?php echo wp_kses($settings['layout_one_title'], 'polimark_allowed_tags'); ?>
                            </h3><!-- /.donation-form-one__title -->
                        <?php endif; ?>
                        <div class="donation-form-one__form">
                            <?php echo do_shortcode('[give_form show_goal="false" show_title="false" show_content="none" continue_button_title=' . $settings['button_label'] . ' display_style="modal" id=' . $settings['select_give_form'] . ']'); ?>
                        </div><!-- /.donation-form-one__form -->
                    </div><!-- /.inner-container -->
                </div><!-- /.container -->
            </section><!-- /.donation-form-one -->


        <?php endif; ?>

        <?php if ('layout_two' == $settings['layout_type']) : ?>
            <section class="donation-form-two">
                <div class="container">
                    <div class="donation-form-two__gallery">
                        <?php foreach ($settings['layout_two_gallery'] as $image) : ?>
                            <?php echo wp_get_attachment_image($image['id'], 'full'); ?>
                        <?php endforeach; ?>
                    </div><!-- /.donation-form-two__gallery -->
                    <div class="inner-container">
                        <?php if (!empty($settings['layout_two_title'])) : ?>
                            <div class="block-heading text-center">
                                <?php if (!empty($settings['layout_two_tagline'])) : ?>
                                    <p class="block-heading__text">
                                        <?php echo wp_kses($settings['layout_two_tagline'], 'polimark_allowed_tags'); ?>
                                    </p><!-- /.block-heading__text -->
                                <?php endif; ?>
                                <?php if (!empty($settings['layout_two_title'])) : ?>
                                    <h2 class="block-heading__title">
                                        <?php echo wp_kses($settings['layout_two_title'], 'polimark_allowed_tags'); ?>
                                    </h2><!-- /.block-heading__title -->
                                <?php endif; ?>
                            </div><!-- /.block-heading -->
                        <?php endif; ?>
                        <div class="donation-form-two__form">
                            <?php echo do_shortcode('[give_form show_goal="false" show_title="false" show_content="none" continue_button_title=' . $settings['button_label'] . ' display_style="onpage" id=' . $settings['select_give_form'] . ']'); ?>
                        </div><!-- /.donation-form-one__form -->
                    </div><!-- /.inner-container -->
                </div><!-- /.container -->
            </section><!-- /.donation-form-one -->

        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
