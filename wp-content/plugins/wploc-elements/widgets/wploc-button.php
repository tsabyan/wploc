<?php

/**
 * Custom Button Widget
 */

if (!defined('ABSPATH')) {
    exit;
}

class WPLoc_Button_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'wploc_button';
    }

    public function get_title()
    {
        return esc_html__('WPLoc Button', 'wploc-elements');
    }

    public function get_icon()
    {
        return 'eicon-button';
    }

    public function get_categories()
    {
        return ['wploc-elements'];
    }

    public function get_keywords()
    {
        return ['button', 'link', 'cta', 'custom'];
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
            'button_text',
            [
                'label' => esc_html__('Button Text', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Click Here', 'wploc-elements'),
                'placeholder' => esc_html__('Enter button text', 'wploc-elements'),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Link', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'wploc-elements'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Icon', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'icon_position',
            [
                'label' => esc_html__('Icon Position', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'right',
                'options' => [
                    'left' => esc_html__('Left', 'wploc-elements'),
                    'right' => esc_html__('Right', 'wploc-elements'),
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Button Style', 'wploc-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('button_tabs');

        // Normal Tab
        $this->start_controls_tab(
            'button_normal',
            [
                'label' => esc_html__('Normal', 'wploc-elements'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .wploc-button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Background Color', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0073aa',
                'selectors' => [
                    '{{WRAPPER}} .wploc-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            'button_hover',
            [
                'label' => esc_html__('Hover', 'wploc-elements'),
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .wploc-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__('Background Color', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#005a87',
                'selectors' => [
                    '{{WRAPPER}} .wploc-button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .wploc-button',
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .wploc-button',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wploc-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wploc-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_align',
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
                    '{{WRAPPER}} .wploc-button-wrapper' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('button', 'class', 'wploc-button');

        if (!empty($settings['button_link']['url'])) {
            $this->add_link_attributes('button', $settings['button_link']);
        }
?>
        <div class="wploc-button-wrapper">
            <a <?php echo $this->get_render_attribute_string('button'); ?>>
                <?php if ($settings['icon_position'] === 'left' && !empty($settings['button_icon']['value'])) : ?>
                    <span class="button-icon icon-left">
                        <?php \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']); ?>
                    </span>
                <?php endif; ?>
                <span class="button-text"><?php echo esc_html($settings['button_text']); ?></span>
                <?php if ($settings['icon_position'] === 'right' && !empty($settings['button_icon']['value'])) : ?>
                    <span class="button-icon icon-right">
                        <?php \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']); ?>
                    </span>
                <?php endif; ?>
            </a>
        </div>
    <?php
    }

    protected function content_template()
    {
    ?>
        <#
            var iconHTML=elementor.helpers.renderIcon(view, settings.button_icon, {}, 'i' , 'object' );
            #>
            <div class="wploc-button-wrapper">
                <a class="wploc-button" href="{{ settings.button_link.url }}">
                    <# if (settings.icon_position==='left' && iconHTML.rendered) { #>
                        <span class="button-icon icon-left">{{{ iconHTML.value }}}</span>
                        <# } #>
                            <span class="button-text">{{{ settings.button_text }}}</span>
                            <# if (settings.icon_position==='right' && iconHTML.rendered) { #>
                                <span class="button-icon icon-right">{{{ iconHTML.value }}}</span>
                                <# } #>
                </a>
            </div>
    <?php
    }
}
