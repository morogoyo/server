    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'written' ) ); ?>
        </div>
        <footer class="entry-meta">
            <p><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'written' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a></p>
            <?php edit_post_link( __( 'Edit', 'written' ), '<span class="edit-link">', '</span>' ); ?>
        </footer>
    </article>