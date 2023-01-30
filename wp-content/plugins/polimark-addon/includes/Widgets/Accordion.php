<?php

namespace Layerdrops\Polimark\Widgets;


class Accordion extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-accordion';
    }

    public function get_title()
    {
        return __('Accordion', 'polimark-addon');
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


        $accordion_lists = new \Elementor\Repeater();

        $accordion_lists->add_control(
            'title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Title', 'polimark-addon'),
                'label_block' => true,
            ]
        );

        $accordion_lists->add_control(
            'text',
            [
                'label' => __('Add Paragraph', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Accordion Paragraph text', 'polimark-addon')
            ]
        );

        $accordion_lists->add_control(
            'status',
            [
                'label' => __('Is Active?', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'polimark-addon'),
                'label_off' => __('No', 'polimark-addon'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'accordion_lists',
            [
                'label' => __('Accordion Box', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $accordion_lists->get_controls(),
                'default' => [
                    [
                        'title' => __('My Progress', 'polimark-addon'),
                        'text' => __('Accordion Paragraph text', 'polimark-addon'),
                        'status' => 'no'
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <div class="faq-block">
            <ul class="accordion-box m-0 list-unstyled clearfix" id="<?php echo esc_attr(uniqid()); ?>">
                <?php foreach ($settings['accordion_lists'] as $accordion_list) : ?>
                    <?php $get_status = $accordion_list['status']; ?>
                    <!--Block-->
                    <li class="accordion block <?php echo esc_attr(('yes' == $get_status) ? 'active-block' : ''); ?>">
                        <div class="acc-btn <?php echo esc_attr(('yes' === $get_status) ? 'active' : ''); ?> ">
                            <?php echo wp_kses($accordion_list['title'], 'polimark_allowed_tags'); ?>
                            <div class="acc-btn__icon"></div><!-- /.acc-btn__icon -->
                        </div>
                        <div class="acc-content <?php echo esc_attr(('yes' == $get_status) ? 'current' : ''); ?>">
                            <div class="content">
                                <div class="text"><?php echo wp_kses($accordion_list['text'], 'polimark_allowed_tags'); ?></div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div><!-- /.faq-block -->

<?php
    }

    protected function _content_template()
    {
    }
}
