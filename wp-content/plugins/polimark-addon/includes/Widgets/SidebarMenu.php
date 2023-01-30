<?php

namespace Layerdrops\Polimark\Widgets;


class SidebarMenu extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-sidebar-menu';
    }

    public function get_title()
    {
        return __('Sidebar Menu', 'polimark-addon');
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
        <div class="sidebar-menu">
            <?php if ($settings['title']) : ?>
                <h3 class="sidebar-menu__title">
                    <?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?>
                </h3><!-- /.sidebar-menu__title -->
            <?php endif; ?>

            <nav class="sidebar-menu__menu">
                <?php
                wp_nav_menu(
                    array(
                        'menu' => $settings['nav_menu'],
                        'menu_class' => 'sidebar-menu__menu__ul',
                    )
                );
                ?>
            </nav>

        </div><!-- /.sidebar-menu -->
<?php
    }

    protected function _content_template()
    {
    }
}
