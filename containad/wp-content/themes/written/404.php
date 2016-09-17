<?php get_header(); ?>
        <section class="content">
            <article id="post-0" class="post error404 no-results not-found">
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'Error: page not found', 'written' ); ?></h1>
                </header>
                <div class="entry-content">
                    <p><?php _e( 'The page is not found.', 'written' ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </article>
        </section>
<?php get_footer(); ?>