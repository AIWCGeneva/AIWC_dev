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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'aiwc_db');

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
define('AUTH_KEY',         ')KA~SW1%$<OWS#Q  t4iS#?0Z;`2|`tm Q:o2+% eBB7.NHAL~-+L07552jS-@u-');
define('SECURE_AUTH_KEY',  'gWdDuni+0S^k%5h2p*t RGgnWLSrQ/vjFft?CjfBEe}ZYDBtVG2~e(DCuYM(htG)');
define('LOGGED_IN_KEY',    '5Pa@0>T>J9A6^Cnzw]Nr d1pS#0t_,|jmt~qHEJ3`w[h!`{t~i*JWD*O=cl4|w:U');
define('NONCE_KEY',        '&snmio2pK}5~Yl,TP@PwyA-)g3l}x-R6.b[d0E>=uy!+Hh}c4j@Y4vgP-j^STXcT');
define('AUTH_SALT',        'uG+@kp1z-%aPcbQyEc#U2WBDP=MtTL3tZ+7W{%Tp m.Z5HU|4F~HN:!I-yCr.#:}');
define('SECURE_AUTH_SALT', '%{6!Rd^Xre+9(a8/$ER:@nEMlS!)-z_zKgQZ(zq$7 2jW IrFXS_+v+Va%:4g~4E');
define('LOGGED_IN_SALT',   '!-%+@Gr-0?qmgpRVUg#JKJTrzvA-97-*?ms;+?,c)A<-e!n+!=~+_Zu,/|@+/on#');
define('NONCE_SALT',       '%N*_>tdOLPB0Va B2-uFo]qej%^M~;p6pN}7kLg>Wrw@|w7{lp3[z>v0R;oJ_NCa');

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
