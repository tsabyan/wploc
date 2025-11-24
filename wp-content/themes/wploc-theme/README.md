# WPLoc Theme

A simple, minimalist WordPress theme designed to work seamlessly with Elementor page builder.

## Features

- ✅ **Elementor Compatible**: Full support for Elementor page builder
- ✅ **Minimalist Design**: Clean, modern, and lightweight
- ✅ **Responsive**: Mobile-friendly and adaptive layout
- ✅ **Fast Loading**: Minimal CSS and no unnecessary JavaScript
- ✅ **SEO Friendly**: Semantic HTML5 markup
- ✅ **Customizable**: Support for custom logo and menus
- ✅ **Post & Page Templates**: Standard templates for all content types

## Installation

1. Download the theme folder
2. Upload to `/wp-content/themes/` directory
3. Activate the theme in WordPress Admin → Appearance → Themes
4. Install and activate Elementor plugin (recommended)

## Elementor Usage

When using Elementor:

- Pages built with Elementor will automatically display in full-width
- Header and footer are still displayed (you can create custom ones with Elementor Pro)
- All Elementor widgets and features are fully supported

## Customization

### Setting up a Menu

1. Go to Appearance → Menus
2. Create a new menu or edit existing one
3. Assign it to "Primary Menu" location

### Adding a Custom Logo

1. Go to Appearance → Customize
2. Navigate to Site Identity
3. Upload your logo

## Theme Structure

```
wploc-theme/
├── style.css          # Main stylesheet with theme info
├── functions.php      # Theme functionality and Elementor support
├── header.php         # Header template
├── footer.php         # Footer template
├── index.php          # Main template (fallback)
├── page.php           # Page template (Elementor uses this)
├── single.php         # Single post template
└── README.md          # This file
```

## Requirements

- WordPress 5.9 or higher
- PHP 7.4 or higher
- Elementor plugin (optional but recommended)

## Support

For issues or questions, please refer to WordPress and Elementor documentation.

## License

GNU General Public License v2 or later

---

Built with ❤️ for simplicity and performance.
