<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'rmpress');/*REPLACE*/
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');/*REPLACE*/
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'root');/*REPLACE*/
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'y3|O+U<Iz6c#dUx%wW`0!=fY#I&d5z+:iC1&h4Lrn;mMWQ8+gke-!ZhrMA.XoZF*');
define('SECURE_AUTH_KEY',  '_8VD:.uIM_nXE%w{>zTi^CoxxBM%~2OU)=`/t k-8`TKKjFJI^xf&OlJ!6#a2pt=');
define('LOGGED_IN_KEY',    'eLmY>80gIXh];w-<302QjN_||$_n*.Gf/`:B=7rL6%;2Y-1 2QxH4Tbi [-K+v[B');
define('NONCE_KEY',        'e54-/Xi[Aw`yZ2mTQ*3/wFDEE%N;IvL03;K52t;8PU ,yn8Pake]mNysvF!O)`gX');
define('AUTH_SALT',        ';J/k>hAf ETnfB-=bOe?SA/_E+Ry8~cwK0pswC5x/IZG*7*DSDf<|4t/G~@5P@3y');
define('SECURE_AUTH_SALT', 'Tvn+|vEXS lN6y082YDv0w&{W_Y3|oKlZ1_-w9.T45XE2kcUf~+xcr0--iay(rnG');
define('LOGGED_IN_SALT',   'yP1O1ub5x8Xc-MS^JcC8Q^gZ=2=R}Vv6,VB@YQ+GohT(U5!@-NSW{;^+6-h;/,6N');
define('NONCE_SALT',       '=t8NH&4Q*L2MBI !GUw _J~DH72dxZXO&z+IN@%6gu0PVav;[ euINwcj]09!>K=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/**
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */

// 
if(preg_match('/rosemontdev/i', $_SERVER['HTTP_HOST'])){
	$uriParts = explode('/', $_SERVER['REQUEST_URI'] );
	$uriParts = array_filter($uriParts);
	$uriParts = array_values($uriParts);
	$devslug = $uriParts[0];
	$devslug = "/$devslug";
}
else{
	$devslug = null;
}



// WOULD ALSO NEED TO CHECK FOR HTTPS

$serverHttp = "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "");
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', "{$serverHttp}://" . $_SERVER['SERVER_NAME'] . "$devslug/wordpress");
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    "{$serverHttp}://" . $_SERVER['SERVER_NAME'] . "$devslug");
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', "{$serverHttp}://" . $_SERVER['SERVER_NAME'] . "$devslug/content");
}



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
