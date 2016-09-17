<?php get_header(); ?>
    <section class="content">
        <?php if ( have_posts() ) : ?>
            <header class="archive-header">
                <h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'written' ), '<span>' . single_tag_title( '', FALSE ) . '</span>' ); ?></h1>
            <?php if ( tag_description() ) : ?>
                <div class="archive-meta"><?php echo tag_description(); ?></div>
            <?php endif; ?>
            </header>
            <?php while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() );
            endwhile;
            written_content_nav( 'nav-below' );
            else : 
                get_template_part( 'content', 'none' );
        endif; ?>
    </section>
<?php get_sidebar();
get_footer(); ?>