<?php

global $workhorse_db_version;
$workhorse_db_version = '0.8';

function workhorse_update_db_check() {
    global $workhorse_db_version;
    if ( get_site_option( 'workhorse_db_version' ) != $workhorse_db_version ) {
        workhorse_install();
    }
}
add_action('plugins_loaded', 'workhorse_update_db_check');

function workhorse_uninstall() {
	wp_clear_scheduled_hook('workhorse_parse_tasks_hook');

	workhorse_wp_config_delete();
}


function workhorse_wp_config_put($slash = '') {
    $config = file_get_contents (ABSPATH . "wp-config.php");
    $config = preg_replace ("/^([\r\n\t ]*)(\<\?)(php)?/i", "<?php define('WP_MEMORY_LIMIT', '5000M');\n", $config);
    $config = preg_replace ("/^([\r\n\t ]*)(\<\?)(php)?/i", "<?php define('WP_MAX_MEMORY_LIMIT', '5000M');\n", $config);
    file_put_contents (ABSPATH . $slash . "wp-config.php", $config);
}

function workhorse_wp_config_delete($slash = '') {
    $config = file_get_contents (ABSPATH . "wp-config.php");
    $config = preg_replace ("/( ?)(define)( ?)(\()( ?)(['\"])WP_MEMORY_LIMIT(['\"])( ?)(,)( ?)(['\"])(\w*)(['\"])( ?)(\))( ?);/i", "", $config);
    $config = preg_replace ("/( ?)(define)( ?)(\()( ?)(['\"])WP_MAX_MEMORY_LIMIT(['\"])( ?)(,)( ?)(['\"])(\w*)(['\"])( ?)(\))( ?);/i", "", $config);
    file_put_contents (ABSPATH . $slash . "wp-config.php", $config);
}

function workhorse_install() {
	global $wpdb;
	global $workhorse_db_version;
	global $wp_rewrite;

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	// Config
	workhorse_wp_config_put();

	// Roles
	add_role('workhorse_user', 'Work Horse User');

	// Scheduler
	//wp_schedule_event(time(), 'every_minute', 'workhorse_parse_tasks_hook');
	
	// Tasks table
	$table_name = $wpdb->prefix . 'workhorse_tasks';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		`id` mediumint(9) NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(255) NOT NULL,
		`content` MEDIUMTEXT NOT NULL,
		`options` LONGTEXT NOT NULL,
		`iteration` INT UNSIGNED NOT NULL,
		`spintax_iterations` INT UNSIGNED NOT NULL,
		`max_iterations` INT UNSIGNED NOT NULL,
		`state` VARCHAR(30) NOT NULL DEFAULT 'Draft',
		`created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
		`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		`finished_at` TIMESTAMP NOT NULL,
		`deleted_at` TIMESTAMP NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	dbDelta($sql);

	// Shortcodes table
	$table_name = $wpdb->prefix . 'workhorse_shortcodes';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		shortcode VARCHAR(255) NOT NULL,
		type VARCHAR(40) NOT NULL,
		content LONGTEXT NOT NULL,
		created_at TIMESTAMP NOT NULL,
		updated_at TIMESTAMP NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	dbDelta($sql);

	// Tags noindex

	// Lists table
	$table_name = $wpdb->prefix .'workhorse_lists';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE `$table_name` (
		`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(50) NOT NULL,
		`list` LONGTEXT NOT NULL,
		`size` MEDIUMINT(8) UNSIGNED NOT NULL,
		`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (`id`)
	) $charset_collate;";

	dbDelta($sql);

	// Geo codes
	include_once 'geo/installer.php';
	
	// Update WorkHorse DB Schema
	$installed_ver = get_option("workhorse_db_version");
	if ($installed_ver && $installed_ver != $workhorse_db_version) {
		update_option( "workhorse_db_version", $workhorse_db_version );
	}
	else add_option('workhorse_db_version', $workhorse_db_version);

	// Rebuild URL rules
	$wp_rewrite->flush_rules();
}

function workhorse_install_data() {
	global $wpdb;
	
	
}