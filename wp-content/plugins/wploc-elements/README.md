# WPLoc Elements

A WordPress plugin that adds custom widgets/elements to Elementor page builder.

## Description

This plugin extends Elementor with three custom widgets:

- **WPLoc Heading** - Enhanced heading widget with subtitle support
- **WPLoc Button** - Advanced button widget with icons and hover effects
- **WPLoc Card** - Card/Info box widget with image, title, description, and CTA button

## Requirements

- WordPress 5.0 or higher
- Elementor 3.0.0 or higher
- PHP 7.0 or higher

## Installation

1. Upload the `wploc-elements` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The custom widgets will appear in Elementor editor under "Custom Elements" category

## Features

### WPLoc Heading Widget

- Customizable heading text and HTML tag (H1-H6, div, span, p)
- Optional subtitle
- Full typography controls
- Color customization
- Text alignment options

### WPLoc Button Widget

- Button text and link
- Icon support with position control (left/right)
- Normal and hover state styling
- Border and border radius controls
- Padding and alignment options
- Typography customization

### WPLoc Card Widget

- Featured image
- Title and description
- Call-to-action button
- Full styling controls for all elements
- Hover effects
- Box shadow and border options
- Responsive padding

## Usage

1. Edit a page with Elementor
2. Find "Custom Elements" category in the widgets panel
3. Drag and drop the desired custom widget
4. Customize the widget settings in the left panel
5. Preview and publish

## Customization

### Adding New Widgets

To add a new custom widget:

1. Create a new file in `/widgets/` directory (e.g., `custom-new-widget.php`)
2. Define your widget class extending `\Elementor\Widget_Base`
3. Register the widget in the main plugin file:
   ```php
   require_once CUSTOM_ELEMENTOR_ELEMENTS_PATH . 'widgets/custom-new-widget.php';
   $widgets_manager->register(new \Custom_Elementor_New_Widget());
   ```

### Styling

Edit `/assets/css/custom-elements.css` to customize the default styles.

### JavaScript

Add custom JavaScript functionality in `/assets/js/custom-elements.js`.

## File Structure

```
wploc-elements/
├── assets/
│   ├── css/
│   │   └── custom-elements.css
│   └── js/
│       └── custom-elements.js
├── widgets/
│   ├── custom-heading.php
│   ├── custom-button.php
│   └── custom-card.php
├── wploc-elements.php
└── README.md
```

## Support

For issues, questions, or contributions, please contact the plugin author.

## Changelog

### 1.0.0

- Initial release
- Added WPLoc Heading widget
- Added WPLoc Button widget
- Added WPLoc Card widget

## License

This plugin is licensed under the GPL v2 or later.
