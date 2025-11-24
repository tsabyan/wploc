<?php

/**
 * WPLoc Theme Functions
 *
 * @package WPLoc_Theme
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function wploc_theme_setup()
{
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Enable support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add support for full and wide align images
    add_theme_support('align-wide');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'wploc-theme'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'wploc_theme_setup');

/**
 * Enqueue scripts and styles
 */
function wploc_theme_scripts()
{
    // Enqueue theme stylesheet
    wp_enqueue_style('wploc-theme-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue comment reply script if needed
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'wploc_theme_scripts');

/**
 * Elementor Support
 */
function wploc_theme_elementor_support()
{
    // Add Elementor support for post types
    add_post_type_support('page', 'elementor');
    add_post_type_support('post', 'elementor');
}
add_action('after_setup_theme', 'wploc_theme_elementor_support');

/**
 * Register Elementor locations
 */
function wploc_theme_register_elementor_locations($elementor_theme_manager)
{
    $elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'wploc_theme_register_elementor_locations');

/**
 * Set content width
 */
if (! isset($content_width)) {
    $content_width = 1200;
}

/**
 * Add body classes for Elementor
 */
function wploc_theme_body_classes($classes)
{
    // Add class if Elementor is being used on this page
    if (class_exists('\Elementor\Plugin')) {
        $document = \Elementor\Plugin::$instance->documents->get(get_the_ID());
        if ($document && $document->is_built_with_elementor()) {
            $classes[] = 'elementor-page';
        }
    }
    return $classes;
}
add_filter('body_class', 'wploc_theme_body_classes');

/**
 * Excerpt length
 */
function wploc_theme_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'wploc_theme_excerpt_length');

/**
 * Excerpt more
 */
function wploc_theme_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'wploc_theme_excerpt_more');
