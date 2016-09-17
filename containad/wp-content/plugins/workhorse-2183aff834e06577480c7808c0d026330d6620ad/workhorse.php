<?php
/*
Plugin Name: Work Horse
Plugin URI: 
Description: Creates a large number of pages/posts and customize them to rank in Google.
Author: Work Horse Team
Version: 1.6.1
*/

define('WORKHORSE_ROOT', dirname(__FILE__));
define('WORKHORSE_DIR', substr(WORKHORSE_ROOT, strpos(WORKHORSE_ROOT, 'wp-content') - 1));

include_once 'bootstrap.php';

register_activation_hook(__FILE__, 'workhorse_install');
register_activation_hook(__FILE__, 'workhorse_install_data');

// Features

register_deactivation_hook(__FILE__, 'workhorse_uninstall');