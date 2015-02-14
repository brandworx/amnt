<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'amnt');

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
define('AUTH_KEY',         '1x}G_/)o:d3AkOmY0LM1kT~2dj3Y_QRM?[DE<l40N+AlrlZ-cczZ>7##~0_vL#&f');
define('SECURE_AUTH_KEY',  'hU9K]~Q&u,3X6vBh@v3*Ya>u^R&[La02~-hH{]LzU+|v&%aVcq|yEdg[,3C^`Kuw');
define('LOGGED_IN_KEY',    '1l{/Njjm~14;D}1j{@/;LfTbppu.dvUu4|JD-K+1`q9@b*y~FW|5gHCmXd{_smT$');
define('NONCE_KEY',        'DdpRd+WESCR>Qf0swh&QNy#|:}Jod2n`6&G:8+p=#1O5trsc<iD^cCIE-y2 YT+/');
define('AUTH_SALT',        '6+e!ZBJ ?g6ko>m5/-^v)?n0%+h^Uxy&?.A|GSLAU@6DB^h?ZTc|}|nzJnY2u81o');
define('SECURE_AUTH_SALT', 'wB`qPayzAa+d;X<*u<E<;=KlUp%OE|>@0#=HtFWtg!6sX_oz9GzH nirm2W<w}3f');
define('LOGGED_IN_SALT',   'B{C4$PQK6Nv21mPXEeZZ2G=t3E[{+4S8%A(HKp}84%,1;);+s+e8*Xy_%F],cVl8');
define('NONCE_SALT',       'p|wnR>urrY-0xBcykWW:n|-dlv3||-wD;bW)SgR<*Y/6~]I=FZT|M!*mTW<&<2_i');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
