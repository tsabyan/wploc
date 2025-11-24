<?php

/**
 * Custom Card Widget
 */

if (!defined('ABSPATH')) {
    exit;
}

class WPLoc_Card_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'wploc_card';
    }

    public function get_title()
    {
        return esc_html__('WPLoc Card', 'wploc-elements');
    }

    public function get_icon()
    {
        return 'eicon-info-box';
    }

    public function get_categories()
    {
        return ['wploc-elements'];
    }

    public function get_keywords()
    {
        return ['card', 'box', 'info', 'custom'];
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
            'card_image',
            [
                'label' => esc_html__('Choose Image', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'card_title',
            [
                'label' => esc_html__('Title', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Card Title', 'wploc-elements'),
                'placeholder' => esc_html__('Enter card title', 'wploc-elements'),
            ]
        );

        $this->add_control(
            'card_description',
            [
                'label' => esc_html__('Description', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Card description goes here. Add some text to describe the card content.', 'wploc-elements'),
                'placeholder' => esc_html__('Enter description', 'wploc-elements'),
                'rows' => 5,
            ]
        );

        $this->add_control(
            'card_link',
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
            'button_text',
            [
                'label' => esc_html__('Button Text', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'wploc-elements'),
            ]
        );

        $this->end_controls_section();

        // Style Section - Card
        $this->start_controls_section(
            'card_style_section',
            [
                'label' => esc_html__('Card', 'wploc-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background',
            [
                'label' => esc_html__('Background Color', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .wploc-card' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'selector' => '{{WRAPPER}} .wploc-card',
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wploc-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_shadow',
                'selector' => '{{WRAPPER}} .wploc-card',
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__('Padding', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wploc-card-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Title
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__('Title', 'wploc-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .wploc-card-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .wploc-card-title',
            ]
        );

        $this->end_controls_section();

        // Style Section - Description
        $this->start_controls_section(
            'description_style_section',
            [
                'label' => esc_html__('Description', 'wploc-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Color', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .wploc-card-description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .wploc-card-description',
            ]
        );

        $this->end_controls_section();

        // Style Section - Button
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => esc_html__('Button', 'wploc-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0073aa',
                'selectors' => [
                    '{{WRAPPER}} .wploc-card-button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'wploc-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'transparent',
                'selectors' => [
                    '{{WRAPPER}} .wploc-card-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="wploc-card">
            <?php if (!empty($settings['card_image']['url'])) : ?>
                <div class="wploc-card-image">
                    <img src="<?php echo esc_url($settings['card_image']['url']); ?>" alt="<?php echo esc_attr($settings['card_title']); ?>">
                </div>
            <?php endif; ?>

            <div class="wploc-card-content">
                <?php if (!empty($settings['card_title'])) : ?>
                    <h3 class="wploc-card-title"><?php echo esc_html($settings['card_title']); ?></h3>
                <?php endif; ?>

                <?php if (!empty($settings['card_description'])) : ?>
                    <p class="wploc-card-description"><?php echo esc_html($settings['card_description']); ?></p>
                <?php endif; ?>

                <?php if (!empty($settings['card_link']['url']) && !empty($settings['button_text'])) : ?>
                    <a href="<?php echo esc_url($settings['card_link']['url']); ?>"
                        class="wploc-card-button"
                        <?php echo $settings['card_link']['is_external'] ? 'target="_blank"' : ''; ?>
                        <?php echo $settings['card_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                        <?php echo esc_html($settings['button_text']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php
    }

    protected function content_template()
    {
    ?>
        <div class="wploc-card">
            <# if (settings.card_image.url) { #>
                <div class="wploc-card-image">
                    <img src="{{ settings.card_image.url }}" alt="{{ settings.card_title }}">
                </div>
                <# } #>

                    <div class="wploc-card-content">
                        <# if (settings.card_title) { #>
                            <h3 class="wploc-card-title">{{{ settings.card_title }}}</h3>
                            <# } #>

                                <# if (settings.card_description) { #>
                                    <p class="wploc-card-description">{{{ settings.card_description }}}</p>
                                    <# } #>

                                        <# if (settings.card_link.url && settings.button_text) { #>
                                            <a href="{{ settings.card_link.url }}" class="wploc-card-button">
                                                {{{ settings.button_text }}}
                                            </a>
                                            <# } #>
                    </div>
        </div>
<?php
    }
}
