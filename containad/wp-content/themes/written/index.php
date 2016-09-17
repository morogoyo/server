<?php get_header(); ?>
    <section class="content">
        <?php if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() );
            endwhile;
            written_content_nav( 'nav-below' );
        else : ?>
            <article id="post-0" class="post no-results not-found">
            <?php if ( current_user_can( 'edit_posts' ) ) : ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'No posts are found', 'written' ); ?></h1>
                </header>
                <div class="entry-content">
                    <p><?php printf( __( 'Feel free to <a href="%s">comment this article</a>.', 'written' ), admin_url( 'post-new.php' ) ); ?></p>
                </div>
            <?php else : ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'written' ); ?></h1>
                </header>
                <div class="entry-content">
                    <p><?php _e( 'Sorry, content not found.', 'written' ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
                <div class="author-bio">
                    <?php $username = get_userdata( $post->post_author ); ?>
                    <h3><?php echo $username->user_nicename; ?></h3>
                    <p><?php echo $username->user_description; ?></p>
                    <p class="author-name"><a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php echo $username->user_nicename; ?></a></p>
                </div>
            </article>
        <?php endif; ?>
    </section>
<?php get_sidebar();
get_footer(); ?>