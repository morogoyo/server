<?php get_header(); ?>
    <section class="content">
        <?php if ( have_posts() ) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'written' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            </header>
            <?php written_content_nav( 'nav-above' );
            while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() );
            endwhile;
            written_content_nav( 'nav-below' );
        else : ?>
            <article id="post-0" class="post no-results not-found">
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'written' ); ?></h1>
                </header>
                <div class="entry-content">
                    <p><?php _e( 'Sorry, content not found.', 'written' ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </article>
        <?php endif; ?>
    </section>
<?php get_sidebar();
get_footer(); ?>