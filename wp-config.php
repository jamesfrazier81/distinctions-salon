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
define('DB_NAME', 'dsalon_wp_local');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dsalon_';

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
