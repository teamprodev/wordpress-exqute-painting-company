<?php

namespace Layerdrops\Polimark\Widgets;


class FooterAbout extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-about';
    }

    public function get_title()
    {
        return __('Footer About', 'polimark-addon');
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
                'placeholder' => __('Add paragraph text', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('Paragraph', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'polimark-addon'),
            ]
        );

        $contact_infos = new \Elementor\Repeater();

        $contact_infos->add_control(
            'icon',
            [
                'label' => __('Select Icon', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => polimark_get_fa_icons(),
                'default' => 'fa-facebook-f',
                'label_block' => true,
            ]
        );
        $contact_infos->add_control(
            'text',
            [
                'label' => __('Add Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Sample Text', 'polimark-addon'),
            ]
        );

        $contact_infos->add_control(
            'url',
            [
                'label' => __('Add Url', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'polimark-addon'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_label' => false,
            ]
        );

        $this->add_control(
            'contact_infos',
            [
                'label' => __('Contact Infos', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $contact_infos->get_controls(),
                'default' => [
                    [
                        'text' => __('sample text', 'polimark-addon'),
                        'icon' => 'polimark-icon-envelope',
                        'url' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="footer-widget footer-widget__about">
            <div class="widget-content">
                <?php if (!empty($settings['title'])) : ?>
                    <h3 class="footer-widget__title"><?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?></h3>
                <?php endif; ?>
                <?php if (!empty($settings['text'])) : ?>
                    <p class="footer-widget__text"><?php echo wp_kses($settings['text'], 'polimark_allowed_tags'); ?></p>
                <?php endif; ?>
                <ul class="list-unstyled footer-widget__infos">
                    <?php foreach ($settings['contact_infos'] as $info) : ?>
                        <li>
                            <i class="<?php echo esc_attr($info['icon']); ?>"></i>
                            <a href="<?php echo esc_url($info['url']['url']); ?>">
                                <?php echo wp_kses($info['text'], 'polimark_allowed_tags'); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
