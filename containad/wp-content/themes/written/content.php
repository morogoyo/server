    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_post_thumbnail();
            if ( is_single() ) : ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php written_author_meta();
                else : ?>
                <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'written' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                <?php written_author_meta();
            endif; ?>
        </header>
        <?php if ( is_search() ) : ?>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div>
        <?php else : ?>
            <div class="entry-content">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'written' ) );
                wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'written' ), 'after' => '</div>' ) ); ?>
            </div>
        <?php endif; ?>
        <footer class="entry-meta">
            <?php if ( comments_open() ) : ?>
                <div class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'written' ) . '</span>', __( '1', 'written' ), __( '%', 'written' ) ); ?></div>
            <?php endif;
            written_entry_meta();
            if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
                <div class="author-info">
                    <div class="author-avatar">
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'written_author_bio_avatar_size', 68 ) ); ?>
                    </div>
                    <div class="author-description">
                        <h2><?php printf( __( 'About %s', 'written' ), get_the_author() ); ?></h2>
                        <p><?php the_author_meta( 'description' ); ?></p>
                        <p class="author-link"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'written' ), get_the_author() ); ?></a></p>
                    </div>
                </div>
            <?php endif; ?>
        </footer>
        <p><?php edit_post_link( __( 'Edit', 'written' ), '<span class="edit-link">', '</span>' ); ?></p>
    </article>