<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache
 define('WP_MAX_MEMORY_LIMIT', '5000M');
 define('WP_MEMORY_LIMIT', '5000M');
 define('WP_MAX_MEMORY_LIMIT', '5000M');
 define('WP_MEMORY_LIMIT', '5000M');



/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
define('WP_ALLOW_REPAIR', false);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'containad');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'LzvO&q8n/V|{>XtfRys1ye6}k0kZKD>9|ij zg420s?o}uD6=cB@Ht+m2m|+5^WN');
define('SECURE_AUTH_KEY',  'im;P#e/ScjBxUo4Q;qsiZgfpa!>-%@gaoF4!xu:Dv2Ubj2c@m!1gZ(7C!&;UwVJ)');
define('LOGGED_IN_KEY',    '.=cF>vH-*~JoP#re!-wEf43z]uOhCd#4&t7<_2`}[E2_})rOi>BCtr]Z#6Lxg~;h');
define('NONCE_KEY',        'CG`~C .t^!a>doU#/~1c.!x_[BTWv{6pi6K~qpb-w:Il67Y?|TP?qy*uED/{`i-e');
define('AUTH_SALT',        '#Z{SzDm`M4.rd[&S;Z+(7?~CzWa?w=aKO<_a<:e.vJ`r;At5k47{3qDAuTw:rI!B');
define('SECURE_AUTH_SALT', 'otgC73vkT03.BCn3jXdsFq+my,2F 9H3!QV~Ilw<M;~+d<^C/<et2BZsI0DiI$So');
define('LOGGED_IN_SALT',   'k-l,KGd_wsKI3!E}H@la)RL*sSQOuvn}bZU36w:!7F}-FP!I=PC?McMP}%5:J1^D');
define('NONCE_SALT',       'sWjUa-9H{.ql0hQMClVjaqO2^qj&dX.MvghZ&zpGw- OhMr;FeuAByhPdM1o#BUp');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
