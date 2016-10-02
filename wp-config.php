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

// One wp-config.php file for multiple environments setup from http://www.messaliberty.com/2010/01/how-to-create-a-single-wp-config-file-for-local-and-remote-wordpress-development/
if (
		preg_match('/^(192\.168\.|10\.|172\.(1[6-9]|2[0-9]|3[0-2]))/', $_SERVER['REMOTE_ADDR']) || // Request IP is in a private block
		preg_match('/^([a-z-_0-9]+\.)*[a-z-_0-9]+\.dev(?!\.)/', $_SERVER['SERVER_NAME']) // Request Domain follows the pattern [xxx.]xxx.dev
	) {
	define('WP_ENV', 'local');
} elseif (preg_match('/staging.distinctionssalon\.com/', $_SERVER['HTTP_HOST'])) { // staging_server_domain
	define('WP_ENV', 'staging');
} else {
	define('WP_ENV', 'production');
}

if ( WP_ENV == 'local' ) {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'dsalon_wp_local');

	/** MySQL database username */
	define('DB_USER', 'root'); // local_db_user

	/** MySQL database password */
	define('DB_PASSWORD', 'root'); // local_db_password

	/** MySQL hostname */
	define('DB_HOST', 'localhost'); // local_db_host

	define('WP_SITEURL', "http://distinctionssalon.dev"); // local_site_url

	define('WP_HOME', "http://distinctionssalon.dev"); // local_home_url

} elseif ( WP_ENV == 'staging') {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'ds_staging'); // staging_db_name

	/** MySQL database username */
	define('DB_USER', 'adm_staging'); // staging_db_user

	/** MySQL database password */
	define('DB_PASSWORD', 'vp9PtUjWEzdtc8'); // staging_db_password

	/** MySQL hostname */
	define('DB_HOST', '107.180.48.129'); // staging_db_host

	define('WP_SITEURL', "http://staging.distinctionssalon.com"); // staging_site_url

	define('WP_HOME', "http://staging.distinctionssalon.com"); // staging_home_url

} else {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'ds_production'); // production_db_name

	/** MySQL database username */
	define('DB_USER', 'adm_production'); // production_db_user

	/** MySQL database password */
	define('DB_PASSWORD', 'i9MkmFwCu6WAXi'); // production_db_password

	/** MySQL hostname */
	define('DB_HOST', '107.180.48.129'); // production_db_host

	define('WP_SITEURL', "http://distinctionssalon.com"); // production_site_url

	define('WP_HOME', "http://distinctionssalon.com"); // production_home_url

}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '5Mrh>0c*1Af|Ad+u4);gW5qzyJ3@CX dn[^S/^mP@l#2kvJTAP}pM;mxC>E4Pc$g');
define('SECURE_AUTH_KEY',  '+J&36J=7Orh)^xE`o7~.tu<Q!~4+K<C9)a`F.6zY0B5VyoID}w<+Sy-Gu*WsH;C9');
define('LOGGED_IN_KEY',    '5$d:PW~|Ww>$Jw>kmd!bI|^z{Qfuz^hoc$ 6Xti9a@9?9e`mb9OK%[~?fc7t1EbA');
define('NONCE_KEY',        't+n]| f2N0~F59s9X(QQ1Fy,2pbc;4wd^,>j2c3M!*L;t))h|-BBsFLpN1gMDP)n');
define('AUTH_SALT',        'CF1tdd31m]@coI&Q5C}u?l|:q8Q:?u*wTdtz~>NWkd8-](G(cS(+TeEBe+uS%6F[');
define('SECURE_AUTH_SALT', 'Z}1{Sc4DA$((;hWJAvGe2|/J&1td2X:EA]_z  -,8Bl(Mfk,h],pYF+(IX)BzP9V');
define('LOGGED_IN_SALT',   ',khajH$w;G}k@U}z%C]TLCO6Bu#:-wskOTP[eE@$2{&tg9D6!0N1w;V{[T8+ Wkj');
define('NONCE_SALT',       '/v.v4lrnBl+@VbmK.BbX-q:tUhh`vdKro/^]M2+-K);+v ~-o,m=k079k{K74Kkt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dsalon_';

/** Set reasonable number of post revisions to maintain per post. */
define( 'WP_POST_REVISIONS', 15 );

ini_set('memory_limit', '64M');

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
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');