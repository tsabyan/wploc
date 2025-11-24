<?php

/**
 * Template for displaying single posts
 *
 * @package Custom_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container">
        <div class="content-area">

            <?php
            while (have_posts()) :
                the_post();
            ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                        <div class="entry-meta">
                            <span class="posted-on">
                                <?php echo get_the_date(); ?>
                            </span>
                            <span class="byline">
                                <?php echo esc_html__('by', 'custom-theme'); ?>
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                    <?php the_author(); ?>
                                </a>
                            </span>
                            <?php if (has_category()) : ?>
                                <span class="cat-links">
                                    <?php echo esc_html__('in', 'custom-theme'); ?>
                                    <?php the_category(', '); ?>
                                </span>
                            <?php endif; ?>
                        </div><!-- .entry-meta -->
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

                    <?php if (has_tag()) : ?>
                        <footer class="entry-footer">
                            <div class="tags-links">
                                <?php the_tags('<strong>' . esc_html__('Tags:', 'custom-theme') . '</strong> ', ', ', ''); ?>
                            </div>
                        </footer><!-- .entry-footer -->
                    <?php endif; ?>
                </article><!-- #post-<?php the_ID(); ?> -->

            <?php
                // Post navigation
                the_post_navigation(array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'custom-theme') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'custom-theme') . '</span> <span class="nav-title">%title</span>',
                ));

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </div><!-- .content-area -->
    </div><!-- .site-container -->
</main><!-- #primary -->

<?php
get_footer();
