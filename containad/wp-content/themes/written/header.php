<!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title( '|', TRUE, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <header id="header" class="site-header" role="banner">
        <h1 class="blog-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        <nav id="site-navigation" class="container-navigation" role="navigation">
            <h3 class="menu-toggle"><?php _e( 'Menu', 'written' ); ?></h3>
            <p class="skip-link assistive-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'written' ); ?>"><?php _e( 'Skip to content', 'written' ); ?></a></p>
            <?php wp_nav_menu ( 
                array( 
                    'theme_location' => 'container', 
                    'container' => '',
                    'menu_class' => 'nav-menu'
                )
            ); ?>
        </nav>
        <?php $header_image = get_header_image();
        if ( ! empty( $header_image ) && ! is_404() ) : ?>
            <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" class="header-image"><a href="<img src="<?php echo esc_url( $header_image ); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ); ?>"></a></h2>
     
  <?php endif; ?>

    </header>
    <div id="container" class="wrapper">