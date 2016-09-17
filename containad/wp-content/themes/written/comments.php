<?php 
if ( post_password_required() )
    return; ?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title"><?php printf( _n( '1 Comment &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'written' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h2>
        <ol class="commentlist">
            <?php wp_list_comments( array( 'callback' => 'written_comment', 'style' => 'ol' ) ); ?>
        </ol>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below" class="navigation" role="navigation">
                <ul>
                    <h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'written' ); ?></h1>
                    <li class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'written' ) ); ?></li>
                    <li class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'written' ) ); ?></li>
                </ul>
            </nav>
        <?php endif;
        elseif ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="nocomments"><?php _e( 'Comments are closed.', 'written' ); ?></p>
    <?php endif;
    comment_form(); ?>
</div>