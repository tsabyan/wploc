<?php

/**
 * The main template file
 *
 * @package WPLoc_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container">
        <div class="content-area">

            <?php
            if (have_posts()) :

                // Check if it's the blog homepage
                if (is_home() && ! is_front_page()) :
            ?>
                    <header class="page-header">
                        <h1 class="page-title"><?php single_post_title(); ?></h1>
                    </header>
                <?php
                endif;

                // Start the Loop
                while (have_posts()) :
                    the_post();
                ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php
                            if (is_singular()) :
                                the_title('<h1 class="entry-title">', '</h1>');
                            else :
                                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                            endif;

                            if ('post' === get_post_type()) :
                            ?>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <span class="byline">
                                        <?php echo esc_html__('by', 'wploc-theme'); ?>
                                        <?php the_author(); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </header><!-- .entry-header -->

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php
                            if (is_singular()) :
                                the_content();

                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'wploc-theme'),
                                    'after'  => '</div>',
                                ));
                            else :
                                the_excerpt();
                            ?>
                                <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more">
                                    <?php echo esc_html__('Read More', 'wploc-theme'); ?>
                                </a>
                            <?php endif; ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-<?php the_ID(); ?> -->

                <?php
                endwhile;

                // Pagination
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => esc_html__('&larr; Previous', 'wploc-theme'),
                    'next_text' => esc_html__('Next &rarr;', 'wploc-theme'),
                ));

            else :
                ?>
                <section class="no-results not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('Nothing Found', 'wploc-theme'); ?></h1>
                    </header>

                    <div class="page-content">
                        <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for.', 'wploc-theme'); ?></p>
                    </div>
                </section>
            <?php
            endif;
            ?>

        </div><!-- .content-area -->
    </div><!-- .site-container -->
</main><!-- #primary -->

<?php
get_footer();
