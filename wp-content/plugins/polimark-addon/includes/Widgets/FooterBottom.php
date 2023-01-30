<?php

namespace Layerdrops\Polimark\Widgets;


class FooterBottom extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-bottom';
    }

    public function get_title()
    {
        return __('Footer Bottom', 'polimark-addon');
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
            'copytext',
            [
                'label' => __('Add Copyright Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'nav_menu',
            [
                'label' => __('Select Nav Menu', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_nav_menu(),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <section class="footer-bottom">
                <div class="container">
                    <?php if (!empty($settings['copytext'])) : ?>
                        <p class="footer-bottom__copytext"><?php echo wp_kses($settings['copytext'], 'polimark_allowed_tags'); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($settings['nav_menu'])) : ?>
                        <?php wp_nav_menu(array(
                            'menu' => $settings['nav_menu'],
                            'menu_class' => 'footer-bottom__menu list-unstyled'
                        )); ?>

                    <?php endif; ?>

                </div><!-- /.container -->
            </section><!-- /.footer-bottom -->
        <?php endif; ?>
<?php
    }

    protected function _content_template()
    {
    }
}
