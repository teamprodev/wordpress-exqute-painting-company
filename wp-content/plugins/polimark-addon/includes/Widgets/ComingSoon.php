<?php

namespace Layerdrops\Polimark\Widgets;


class ComingSoon extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'polimark-coming-soon';
    }

    public function get_title()
    {
        return __('Coming Soon', 'polimark-addon');
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
                    'layout_two' => __('Layout Two', 'polimark-addon'),
                    'layout_three' => __('Layout Three', 'polimark-addon'),
                ]
            ]
        );


        $this->end_controls_section();
        $this->start_controls_section(
            'layout_one_content',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Add Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('Add Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Text', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'countdown_time',
            [
                'label' => __('Add Countdown Time', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Date and Time', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'countdown_time_year',
            [
                'label' => __('Enable Year Count', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Enable', 'polimark-addon'),
                'label_off' => __('Disable', 'polimark-addon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'layout_two_content',
            [
                'label' => __('Content', 'polimark-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_two'
                ]
            ]
        );

        $this->add_control(
            'layout_two_title',
            [
                'label' => __('Add Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'layout_two_sub_title',
            [
                'label' => __('Add Sub Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Text', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'layout_two_summery',
            [
                'label' => __('Add Summery', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Text', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'layout_two_countdown_time',
            [
                'label' => __('Add Countdown Time', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Date and Time', 'polimark-addon'),
            ]
        );

        $this->add_control(
            'layout_two_countdown_time_year',
            [
                'label' => __('Enable Year Count', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Enable', 'polimark-addon'),
                'label_off' => __('Disable', 'polimark-addon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $feature_items = new \Elementor\Repeater();

        $feature_items->add_control(
            'title',
            [
                'label' => __('Title', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default title', 'polimark-addon'),
                'label_block' => true,
            ]
        );
        $feature_items->add_control(
            'text',
            [
                'label' => __('Text', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'polimark-addon'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'feature_items',
            [
                'label' => __('Feature Items', 'polimark-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $feature_items->get_controls(),
                'default' => [
                    [
                        'title' => __('Default Title', 'polimark-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <section class="coming-soon">
                <div class="container">
                    <div class="inner-container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <h3 class="coming-soon__title"><?php echo wp_kses($settings['title'], 'polimark_allowed_tags'); ?></h3><!-- /.coming-soon__title -->
                                <p class="coming-soon__text"><?php echo wp_kses($settings['text'], 'polimark_allowed_tags'); ?></p><!-- /.coming-soon__text -->
                            </div>
                            <div class="col-lg-6">
                                <?php
                                $coundown_year_status = 'yes' == $settings['countdown_time_year'] ? true : false;
                                ?>
                                <ul class="countdown-one__list coming-soon__countdown list-unstyled ml-0" data-leading-zeros="true" data-enable-years="<?php echo esc_attr($coundown_year_status); ?>" data-deadline-date="<?php echo esc_attr($settings['countdown_time']); ?>">
                                    <!-- loading via js -->
                                </ul><!-- /.countdown-one__list list-unstyled -->
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                    </div><!-- /.inner-container -->
                </div><!-- /.container -->
            </section><!-- /.coming-soon -->
        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>
            <section class="coming-soon-two">
                <?php if (!empty($settings['layout_two_title'])) : ?>
                    <div class="block-heading text-left">
                        <?php if (!empty($settings['layout_two_sub_title'])) : ?>
                            <p class="block-heading__text">
                                <?php echo wp_kses($settings['layout_two_sub_title'], 'polimark_allowed_tags'); ?>
                            </p><!-- /.block-heading__text -->
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_title'])) : ?>
                            <h2 class="block-heading__title">
                                <?php echo wp_kses($settings['layout_two_title'], 'polimark_allowed_tags'); ?>
                            </h2><!-- /.block-heading__title -->
                        <?php endif; ?>
                    </div><!-- /.block-heading -->
                <?php endif; ?>

                <?php if (!empty($settings['layout_two_summery'])) : ?>
                    <div class="coming-soon-two__content">
                        <?php echo wp_kses($settings['layout_two_summery'], 'polimark_allowed_tags'); ?>
                    </div><!-- /.coming-soon-two__content -->
                <?php endif; ?>
                <div class="row">
                    <?php foreach ($settings['feature_items'] as $item) : ?>
                        <div class="col-sm-12 col-md-6">
                            <div class="coming-soon-two__item">
                                <h3 class="coming-soon-two__item__title">
                                    <i class="fa fa-arrow-circle-right"></i>
                                    <?php echo wp_kses($item['title'], 'polimark_allowed_tags'); ?>
                                </h3><!-- /.coming-soon-two__item__title -->
                                <p class="coming-soon-two__item__text">
                                    <?php echo wp_kses($item['text'], 'polimark_allowed_tags'); ?>
                                </p><!-- /.coming-soon-two__item__text -->
                            </div><!-- /.coming-soon-two__item -->
                        </div><!-- /.col-sm-12 col-md-6 -->
                    <?php endforeach; ?>
                    <?php
                    $layout_two_coundown_year_status = 'yes' == $settings['layout_two_countdown_time_year'] ? true : false;
                    ?>
                    <ul class="countdown-one__list coming-soon-two__countdown list-unstyled ml-0" data-leading-zeros="true" data-enable-years="<?php echo esc_attr($layout_two_coundown_year_status); ?>" data-deadline-date="<?php echo esc_attr($settings['layout_two_countdown_time']); ?>">
                        <!-- loading via js -->
                    </ul><!-- /.countdown-one__list list-unstyled -->
                </div><!-- /.row -->
            </section><!-- /.coming-soon-two -->
        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
