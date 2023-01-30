<?php

namespace Layerdrops\Polimark\Widgets;


class FooterNavMenu extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-nav-menu';
    }

    public function get_title()
    {
        return __('Footer Nav Menus', 'polimark-addon');
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
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore', 'polimark-addon')
            ]
        );

        $nav_menus = new \Elementor\Repeater();

        $nav_menus->add_control(
            'nav_menu',
            [
                'label' => __('Select Nav Menu', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_nav_menu(),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'nav_menus',
            [
                'label' => __('Nav Menus', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $nav_menus->get_controls(),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="footer-widget links-widget">
            <div class="widget-content">
                <h3 class="footer-widget__title"><?php echo esc_html($settings['title']); ?></h3>
                <?php foreach ($settings['nav_menus'] as $nav_menu) : ?>
                    <?php wp_nav_menu(array(
                        'menu' => $nav_menu['nav_menu'],
                        'menu_class' => 'footer-widget__menu list-unstyled m-0'
                    )); ?>
                <?php endforeach; ?>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
