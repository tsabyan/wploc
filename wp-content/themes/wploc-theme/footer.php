    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="site-container">
            <div class="site-info">
                <?php
                printf(
                    esc_html__('© %1$s %2$s. All rights reserved.', 'wploc-theme'),
                    date('Y'),
                    get_bloginfo('name')
                );
                ?>
            </div><!-- .site-info -->
        </div>
    </footer><!-- #colophon -->
    </div><!-- #page -->

    <?php wp_footer(); ?>

    </body>

    </html>
