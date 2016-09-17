<?php
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         '>+ >U1#m5ds/F6mVqr(8S/.k{CTy+9~_P>)B~uao[]lskGw0o$+N_{N@eI0(=-[:');
define('SECURE_AUTH_KEY',  'VsJ5Na_+,mszt{mp&H aE;IxR2S_PbYbrM5n~@9jPvF=R^BGM3BU:k!1Akl,Qj;f');
define('LOGGED_IN_KEY',    'M|f4B;qh3p?9s>,7nc]2v4k:rfChGiHR]hjLOzw)R1$Bw[3GR*z{Rx<|$y:F{`Ka');
define('NONCE_KEY',        '@y<%Q`*fvDjI.$%OJ|w57Z?A7 5D:C|W^Verk)I<%[/=Vt ]+c Hx^QFsGSG}?n.');
define('AUTH_SALT',        'EH*:f+m*;r1sU:G I`M!!S(@?]o]%Tj`Xg9NY2%j&9Vd(MJn/co,_zIOW[qn9FX[');
define('SECURE_AUTH_SALT', 'FfL[lvG4yu{Q&LH!F%[!/=_D}_3$-^3m;?6#`=!iWET_,z&`~&p9z94{-1Qog^G7');
define('LOGGED_IN_SALT',   '(9OQ_1imm>Z?z/ltnTOu33]qU&9W+!DXe~NPj)fP6.bRKJZ g[GT{DJR~iI7v[k_');
define('NONCE_SALT',       'lYlVou0@xXE{[8ptBUu(;t4}4Cs%i}GG3g-zaQ,bV38-r7W_t>:;-EDc}#o oxF0');

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
