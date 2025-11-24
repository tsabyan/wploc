<?php

/**
 * Custom Heading Widget
 */

if (!defined('ABSPATH')) {
    exit;
}

class WPLoc_Heading_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'wploc_heading';
    }

    public function get_title()
    {
        return esc_html__('WPLoc Heading', 'wploc-elements');
    }

    public function get_icon()
    {
        return 'eicon-t-letter';
    }

    public function get_categories()
    {
        return ['wploc-elements'];
    }

    public function get_keywords()
    {
        return ['heading', 'title', 'text', 'custom'];
    }

    protected function register_controls()
    {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'wploc-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_text',
            [
                'label' => esc_html__('Heading Text', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('WPLoc Heading', 'wploc-elements'),
                'placeholder' => esc_html__('Enter your heading', 'wploc-elements'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'heading_tag',
            [
                'label' => esc_html__('HTML Tag', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'div',
                    'span' => 'span',
                    'p' => 'p',
                ],
                'default' => 'h2',
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => esc_html__('Enter subtitle', 'wploc-elements'),
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'wploc-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__('Text Color', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .wploc-heading' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .wploc-heading',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .wploc-subtitle' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .wploc-subtitle',
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label' => esc_html__('Alignment', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'wploc-elements'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'wploc-elements'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'wploc-elements'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .wploc-heading-wrapper' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $heading_tag = $settings['heading_tag'];
?>
        <div class="wploc-heading-wrapper">
            <<?php echo esc_html($heading_tag); ?> class="wploc-heading">
                <?php echo esc_html($settings['heading_text']); ?>
            </<?php echo esc_html($heading_tag); ?>>
            <?php if (!empty($settings['subtitle'])) : ?>
                <p class="wploc-subtitle"><?php echo esc_html($settings['subtitle']); ?></p>
            <?php endif; ?>
        </div>
    <?php
    }

    protected function content_template()
    {
    ?>
        <#
            var headingTag=settings.heading_tag;
            #>
            <div class="wploc-heading-wrapper">
                <{{{ headingTag }}} class="wploc-heading">
                    {{{ settings.heading_text }}}
                </{{{ headingTag }}}>
                <# if (settings.subtitle) { #>
                    <p class="wploc-subtitle">{{{ settings.subtitle }}}</p>
                    <# } #>
            </div>
    <?php
    }
}
