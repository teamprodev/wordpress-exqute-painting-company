<?php

namespace Layerdrops\Polimark\Widgets;


class ContactForm extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-contact-form';
    }

    public function get_title()
    {
        return __('Contact Form', 'polimark-addon');
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
            'select_wpcf7_form',
            [
                'label'       => esc_html__('Select your contact form 7', 'zeino-core'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => polimark_post_query('wpcf7_contact_form'),
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
        $this->add_control(
            'layout_one_tagline',
            [
                'label' => __('Tagline', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Tagline', 'polimark-addon'),
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
                'placeholder' => __('Awesome Tagline', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'layout_two_image',
            [
                'label' => __('Add Image', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' == $settings['layout_type']) : ?>

            <section class="contact-one">
                <div class="container">
                    <?php if (!empty($settings['layout_one_title'])) : ?>
                        <div class="block-heading text-center">
                            <?php if (!empty($settings['layout_one_tagline'])) : ?>
                                <p class="block-heading__text">
                                    <?php echo wp_kses($settings['layout_one_tagline'], 'polimark_allowed_tags'); ?>
                                </p><!-- /.block-heading__text -->
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_one_title'])) : ?>
                                <h2 class="block-heading__title">
                                    <?php echo wp_kses($settings['layout_one_title'], 'polimark_allowed_tags'); ?>
                                </h2><!-- /.block-heading__title -->
                            <?php endif; ?>
                        </div><!-- /.block-heading -->
                    <?php endif; ?>

                    <?php if (!empty($settings['select_wpcf7_form'])) : ?>
                        <div class="contact-one__form">
                            <?php echo do_shortcode('[contact-form-7 id="' . $settings['select_wpcf7_form'] . '" ]'); ?>
                        </div><!-- /.contact-one__form -->
                    <?php endif; ?>
                </div><!-- /.container -->
            </section>


        <?php endif; ?>

        <?php if ('layout_two' == $settings['layout_type']) : ?>
            <section class="volunteer-one">
                <div class="container">
                    <?php if (!empty($settings['layout_two_title'])) : ?>
                        <div class="block-heading text-left">
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

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="volunteer-one__form">
                                <?php echo do_shortcode('[contact-form-7 id="' . $settings['select_wpcf7_form'] . '" ]'); ?>
                            </div><!-- /.volunteer-one__form -->
                        </div><!-- /.col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="volunteer-one__image">
                                <img src="<?php echo esc_attr($settings['layout_two_image']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($settings['layout_two_image']['id'], '_wp_attachment_image_alt', true)); ?>">
                            </div><!-- /.volunteer-one__image -->
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->

                </div><!-- /.container -->
            </section><!-- /.volunteer-one -->
        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
