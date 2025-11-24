<?php
/**
 * Plugin Name: WPLoc Elements
 * Description: Adds custom elements and widgets for Elementor page builder
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://github.com/tsabyan/wploc
 * Plugin URI: https://github.com/tsabyan/wploc
 * Text Domain: wploc-elements
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('WPLOC_ELEMENTS_VERSION', '1.0.0');
define('WPLOC_ELEMENTS_PATH', plugin_dir_path(__FILE__));
define('WPLOC_ELEMENTS_URL', plugin_dir_url(__FILE__));

/**
 * Main WPLoc Elements Class
 */
final class WPLoc_Elements {

    /**
     * Instance
     */
    private static $_instance = null;

    /**
     * Instance
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     */
    public function __construct() {
        add_action('plugins_loaded', [$this, 'init']);
    }

    /**
     * Initialize the plugin
     */
    public function init() {
        // Check if Elementor is installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_elementor']);
            return;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, '3.0.0', '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
        }

        // Register widgets
        add_action('elementor/widgets/register', [$this, 'register_widgets']);

        // Register widget categories
        add_action('elementor/elements/categories_registered', [$this, 'register_widget_categories']);

        // Register widget styles
        add_action('elementor/frontend/after_enqueue_styles', [$this, 'widget_styles']);

        // Register widget scripts
        add_action('elementor/frontend/after_register_scripts', [$this, 'widget_scripts']);
    }

    /**
     * Admin notice for missing Elementor
     */
    public function admin_notice_missing_elementor() {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'wploc-elements'),
            '<strong>' . esc_html__('WPLoc Elements', 'wploc-elements') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'wploc-elements') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice for minimum Elementor version
     */
    public function admin_notice_minimum_elementor_version() {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'wploc-elements'),
            '<strong>' . esc_html__('WPLoc Elements', 'wploc-elements') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'wploc-elements') . '</strong>',
            '3.0.0'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Register widget categories
     */
    public function register_widget_categories($elements_manager) {
        $elements_manager->add_category(
            'wploc-elements',
            [
                'title' => esc_html__('WPLoc Elements', 'wploc-elements'),
                'icon' => 'fa fa-plug',
            ]
        );
    }

    /**
     * Register widgets
     */
    public function register_widgets($widgets_manager) {
        // Include widget files
        $heading_file = WPLOC_ELEMENTS_PATH . 'widgets/wploc-heading.php';
        $button_file = WPLOC_ELEMENTS_PATH . 'widgets/wploc-button.php';
        $card_file = WPLOC_ELEMENTS_PATH . 'widgets/wploc-card.php';
        
        if (file_exists($heading_file)) {
            require_once $heading_file;
        }
        if (file_exists($button_file)) {
            require_once $button_file;
        }
        if (file_exists($card_file)) {
            require_once $card_file;
        }

        // Register widgets if classes exist
        if (class_exists('WPLoc_Heading_Widget')) {
            $widgets_manager->register(new \WPLoc_Heading_Widget());
        }
        if (class_exists('WPLoc_Button_Widget')) {
            $widgets_manager->register(new \WPLoc_Button_Widget());
        }
        if (class_exists('WPLoc_Card_Widget')) {
            $widgets_manager->register(new \WPLoc_Card_Widget());
        }
    }

    /**
     * Enqueue widget styles
     */
    public function widget_styles() {
        wp_enqueue_style(
            'wploc-elements',
            WPLOC_ELEMENTS_URL . 'assets/css/wploc-elements.css',
            [],
            WPLOC_ELEMENTS_VERSION
        );
    }

    /**
     * Enqueue widget scripts
     */
    public function widget_scripts() {
        wp_register_script(
            'wploc-elements',
            WPLOC_ELEMENTS_URL . 'assets/js/wploc-elements.js',
            ['jquery'],
            WPLOC_ELEMENTS_VERSION,
            true
        );
    }
}

// Initialize the plugin
WPLoc_Elements::instance();
