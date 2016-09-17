<?php get_header(); ?>
    <section class="content">
        <?php if ( have_posts() ) : 
            the_post(); ?>
            <header class="archive-header">
                <h1 class="archive-title"><?php printf( __( 'Author Archives: %s', 'written' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
            </header>
            <?php rewind_posts();
            written_content_nav( 'nav-above' );
            if ( get_the_author_meta( 'description' ) ) : ?>
            <div class="author-info">
                <div class="author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'written_author_bio_avatar_size', 60 ) ); ?>
                </div>
                <div class="author-description">
                    <h2><?php printf( __( 'About %s', 'written' ), get_the_author() ); ?></h2>
                    <p><?php the_author_meta( 'description' ); ?></p>
                </div>
            </div>
            <?php endif;
            while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() );
            endwhile;
            written_content_nav( 'nav-below' );
            else : 
                get_template_part( 'content', 'none' );
        endif; ?>
    </section>
<?php get_sidebar();
get_footer(); ?>