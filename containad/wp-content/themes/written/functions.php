<?php 
if ( ! isset( $content_width ) )
    $content_width = 650;

function written_setup() {
    load_theme_textdomain( 'written', get_template_directory() . '/langs' );
    add_editor_style();
    add_theme_support( 
        'automatic-feed-links'
    );
    add_theme_support( 
        'post-formats', 
        array( 
            'aside', 
            'image', 
            'link', 
            'quote', 
            'status' 
        )
    );
    register_nav_menu( 
        'container', 
        __( 'container Menu', 'written'
        )
    );
    add_theme_support( 
        'custom-background', array(
            'default-color' => 'fefefe',
        )
    );
    add_theme_support( 'title-tag' );
    add_theme_support( 
        'post-thumbnails'
    );
    set_post_thumbnail_size( 
        650, 
        9999 
    );
}
add_action( 'after_setup_theme', 'written_setup' );
require( get_template_directory() . '/inc/custom-header.php' );

function written_scripts() {
    wp_enqueue_style( 'written-style', get_stylesheet_uri() );

    wp_enqueue_script( 'written-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

    wp_enqueue_script( 'written-ie-html5', get_template_directory_uri() . '/js/html5.js', array(), '1.0', true );

    wp_enqueue_script( 'written-it-css-media-queries', get_template_directory_uri() . '/js/css3-mediaqueries.js', array(), '1.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'written_scripts' );

function written_scripts_styles() {
    if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'written' ) ) {
        $subsets = 'latin,latin-ext';
        $subset = _x( 'no-subset', 'Source Sans Pro font: add new subset (greek, cyrillic, vietnamese)', 'written' );
        if ( 'cyrillic' == $subset )
            $subsets .= ',cyrillic,cyrillic-ext';
        elseif ( 'greek' == $subset )
            $subsets .= ',greek,greek-ext';
        elseif ( 'vietnamese' == $subset )
            $subsets .= ',vietnamese';
        $protocol = is_ssl() ? 'https' : 'http';
        $query_args = array(
            'family' => 'Source+Sans+Pro:400,700,400italic',
            'subset' => $subsets,
        );
        wp_enqueue_style( 
            'written-fonts', 
            add_query_arg( 
                $query_args, 
                "$protocol://fonts.googleapis.com/css"
            ), 
            array(), 
            null 
        );
    }
    wp_enqueue_style( 
        'written-style', 
        get_stylesheet_uri()
    );
}
add_action( 'wp_enqueue_scripts', 'written_scripts_styles' );

if ( ! function_exists( 'written_comment' ) ) : 
    function written_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) : 
            case 'pingback' :
            case 'trackback' : ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <p><?php _e( 'Pingback:', 'written' ); comment_author_link(); edit_comment_link( __( '(Edit)', 'written' ), '<span class="edit-link">', '</span>' ); ?></p>
        <?php break;
            default : 
                global $post; ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <article id="comment-<?php comment_ID(); ?>" class="comment">
                <header class="comment-meta comment-author vcard">
                    <?php echo get_avatar( $comment, 44 );
                        printf( '<cite class="fn">%1$s %2$s</cite>',
                            get_comment_author_link(),
                            ( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'written' ) . '</span>' : ''
                        );
                        printf( '<a href="%1$s" class="comment-date"><time pubdate datetime="%2$s">%3$s</time></a>',
                            esc_url( get_comment_link( $comment->comment_ID ) ),
                            get_comment_time( 'c' ),
                            sprintf( __( '%1$s at %2$s', 'written' ), get_comment_date(), get_comment_time() )
                        ); ?>
                </header>
                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'written' ); ?></p>
                <?php endif; ?>
                <section class="comment-content comment">
                    <?php comment_text();
                    edit_comment_link( __( 'Edit', 'written' ), '<p class="edit-link">', '</p>' ); ?>
                </section>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'written' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </article>
        <?php break;
        endswitch;
    }
endif;

function written_wp_title( $title, $sep ) {
    global $paged, $page;
    if ( is_feed() )
        return $title;
    $title .= get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'written' ), max( $paged, $page ) );
    return $title;
}
add_filter( 'wp_title', 'written_wp_title', 10, 2 );

function written_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'written_page_menu_args' );

function written_widgets_init() {
    register_sidebar(
        array(
            'name' => __( 'container Sidebar', 'written' ),
            'id' => 'sidebar-1',
            'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'written' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name' => __( 'First Front Page Widget Area', 'written' ),
            'id' => 'sidebar-2',
            'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'written' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name' => __( 'Second Front Page Widget Area', 'written' ),
            'id' => 'sidebar-3',
            'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'written' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'written_widgets_init' );

if ( ! function_exists( 'written_content_nav' ) ) : 
    function written_content_nav( $nav_id ) {
        global $wp_query;
        if ( $wp_query->max_num_pages > 1 ) : ?>
            <nav id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
                <h3 class="assistive-text"><?php _e( 'Post navigation', 'written' ); ?></h3>
                <ul>
                    <li class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'written' ) ); ?></li>
                    <li class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'written' ) ); ?></li>
                </ul>
            </nav>
        <?php endif;
    }
endif;

if ( ! function_exists( 'written_entry_meta' ) ) : 
    function written_entry_meta() {
        $categories_list = get_the_category_list( __( ', ', 'written' ) );
        $tag_list = get_the_tag_list( '', __( ', ', 'written' ) );
        if ( $tag_list ) {
            $utility_text = __( '%1$s <br> Tags: %2$s.', 'written' );
        } elseif ( $categories_list ) {
            $utility_text = __( '%1$s.', 'written' );
        } else {
            $utility_text = __( '%3$s.', 'written' );
        }
        printf(
            $utility_text,
            $categories_list,
            $tag_list
        );
    }
endif;

if ( ! function_exists( 'written_author_meta' ) ) : 
    function written_author_meta() {
        $categories_list = get_the_category_list( __( ', ', 'written' ) );
        $tag_list = get_the_tag_list( '', __( ', ', 'written' ) );
        $date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark" class="entry-date"><time datetime="%3$s" pubdate>%4$s</time></a>',
            esc_url( get_permalink() ),
            esc_attr( get_the_time() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() )
        );
        $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_attr( sprintf( __( 'View all posts by %s', 'written' ), get_the_author() ) ),
            get_the_author()
        );
            $utility_text = __( '<span class="by-author"> by %4$s</span>, %3$s', 'written' );
        printf(
            $utility_text,
            $categories_list,
            $tag_list,
            $date,
            $author
        );
    }
endif;

function written_body_class( $classes ) {
    $background_color = get_background_color();
    if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
        $classes[] = 'full-width';
    if ( is_page_template( 'page-templates/front-page.php' ) ) {
        $classes[] = 'template-front-page';
        if ( has_post_thumbnail() )
            $classes[] = 'has-post-thumbnail';
        if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
            $classes[] = 'two-sidebars';
    }
    if ( empty( $background_color ) )
        $classes[] = 'custom-background-empty';
    elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
        $classes[] = 'custom-background-white';
    if ( wp_style_is( 'written-fonts', 'queue' ) )
        $classes[] = 'custom-font-enabled';
    if ( ! is_multi_author() )
        $classes[] = 'single-author';
    return $classes;
}
add_filter( 'body_class', 'written_body_class' );

function written_content_width() {
    if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
        global $content_width;
        $content_width = 1200;
    }
}
add_action( 'template_redirect', 'written_content_width' );

function written_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'written_customize_register' );

function written_customize_preview_js() {
    wp_enqueue_script( 'written-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'written_customize_preview_js' );