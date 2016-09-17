<?php 
/* 
    Template Name: Full-width Page Template, No Sidebar 
*/
get_header(); ?>
    <section class="content">
        <?php while ( have_posts() ) : the_post();
            get_template_part( 'content', 'page' );
            comments_template( '', TRUE );
        endwhile; ?>
    </section>
<?php get_footer(); ?>