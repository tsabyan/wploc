<?php

/**
 * Template for displaying all pages
 * This is the template Elementor will use when building pages
 *
 * @package Custom_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();

        // Check if the page is built with Elementor
        $is_elementor_page = class_exists('\Elementor\Plugin') &&
            \Elementor\Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor();

        if ($is_elementor_page) :
            // For Elementor pages, display full-width content
            the_content();
        else :
            // For regular pages, wrap in container
    ?>
            <div class="site-container">
                <div class="content-area">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        </header><!-- .entry-header -->

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php
                            the_content();

                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'custom-theme'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-<?php the_ID(); ?> -->
                </div><!-- .content-area -->
            </div><!-- .site-container -->
    <?php
        endif;

    endwhile; // End of the loop.
    ?>
</main><!-- #primary -->

<?php
get_footer();
