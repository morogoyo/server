<?php

/**
 * Plugin Name: My First plugin
 * Plugin URI: http://localhost/testSite
 * Description: just a test plugin
 * Version: 1.0.0
 * Author: Daniel Pataki
 * Author URI: http://localhost/testSite
 * License: GPL2
 */

add_action( 'wp_head', 'my_facebook_tags','bootstrap_cdn' );
function bootstrap_cdn(){
	
	echo '<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
	
	
	}


function my_facebook_tags() {
  if( is_single() ) {
  ?>
    <meta property="og:title" content="<?php the_title() ?>" />
    <meta property="og:site_name" content="<?php bloginfo( 'name' ) ?>" />
    <meta property="og:url" content="<?php the_permalink() ?>" />
    <meta property="og:description" content="<?php the_excerpt() ?>" />
    <meta property="og:type" content="article" />
    
    <?php 
      if ( has_post_thumbnail() ) :
        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); 
    ?>
      <meta property="og:image" content="<?php echo $image[0]; ?>"/>  
    <?php endif; ?>
    
  <?php
  }
}

?>
<?php



function add_my_custom_menu() {
    //add an item to the menu
    add_menu_page (
        'My Page',
        'My Title',
        'manage_options',
        'my-page',
        'my_admin_page_function',
        plugin_dir_url( __FILE__ ).'icons/rss-2x.png',
        '23.56'
    );
}
add_action( 'admin_menu', 'add_my_custom_menu' );

function my_admin_page_function() {
    ?>
    <div class="wrap">
        <h2>My Plugin Options</h2>
  <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form></div>
    <?php
}