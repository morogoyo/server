<?php 
/* 
    Template Name: Front Page Template 
*/ 
get_header(); ?>
    <div id="container" class="wrapper">
        <section class="content">
            <?php while ( have_posts() ) : the_post(); 
                if ( has_post_thumbnail() ) : ?>
                    <div class="entry-page-image"><?php the_post_thumbnail(); ?></div>
                <?php endif;
                get_template_part( 'content', 'page' );
            endwhile; ?>
        </section>
    <?php get_sidebar( 'front' );
get_footer(); ?>