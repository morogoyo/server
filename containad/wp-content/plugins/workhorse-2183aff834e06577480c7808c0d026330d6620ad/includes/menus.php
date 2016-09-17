<?php

add_action('admin_menu', 'workhorse_add_menu_items');
function workhorse_add_menu_items()
{
    add_menu_page('Work Horse', 'Work Horse', 6, 'workhorse');
    
    add_submenu_page('workhorse', 'Posting', 'Posting', 1, 'workhorse', 'workhorse_posting');
    add_submenu_page('workhorse', 'Projects', 'Projects', 1, 'workhorse_projects', 'workhorse_projects');
    add_submenu_page('workhorse', 'Shortcodes', 'Shortcodes', 2, 'workhorse_shortcodes', 'workhorse_shortcodes');
    add_submenu_page('workhorse', 'Lists', 'Lists', 2, 'workhorse_lists', 'workhorse_lists');
    add_submenu_page('workhorse', 'Settings', 'Settings', 2, 'workhorse_settings', 'workhorse_settings');
    add_submenu_page('workhorse', 'Users', 'Users', 2, 'workhorse_users', 'workhorse_users');
    
    add_submenu_page('workhorse', 'Builder', 'Builder', 0, 'workhorse_builder', 'workhorse_builder');
    add_submenu_page('workhorse', 'Noindex Tags', 'Noindex Tags', 0, 'workhorse_noindex', 'workhorse_noindex');
    add_submenu_page('workhorse', 'Keyword Generator', 'Keyword Generator', 0, 'workhorse_keyword_generator', 'workhorse_keyword_generator');
}

add_action('admin_menu', function () {
    global $submenu;

    $submenu['workhorse'][] = array('FAQ', 0, 'http://bit.ly/workhorsefaq');
});