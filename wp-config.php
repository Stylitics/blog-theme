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

define('WP_HOME','http://blog.stylitics.com//');
define('WP_SITEURL','http://blog.stylitics.com/');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'stylitics-new');

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
define('AUTH_KEY',         '0bS&:SF}~)uGFnQb-|BBG#X[RgzM{9HN&Bn6 LqTCw/R>e$b=Jn4iNMbf::)$6k`');
define('SECURE_AUTH_KEY',  'xc:6`hlvwBg5!(Y.@ef99JCS #wT5k8qP$OM%z+Orv&Wy(=zw#HTN&&B]?@>qvT&');
define('LOGGED_IN_KEY',    'I+q$5|5mBm||9@+CsX8GQECpnb-Chyg&(A||y7;sH!h-_dXnS@L9d*xZkYg8%-)p');
define('NONCE_KEY',        '0<,lcv_<)l%*&aWzT-qmg65$O^Y|L>0M}m|UJ+@^QG>mZg YC@![fuk^-&9t3^5_');
define('AUTH_SALT',        'Z-D>%YOY=xUbBd#K5n4z<Z|T8=.`f:o*]-& |zxTVe._Ec]V+-F?jsPW|#f/u+`Z');
define('SECURE_AUTH_SALT', 'Ne|NKW/(7g7;IS2qW78f-5M!HD%)B8MBlC]h^A<Hp+d<C7_uy%L{j|E6Hy+G1xtj');
define('LOGGED_IN_SALT',   'R~!Hh+9s^UK5c8N@K@0z-d Ra@{abLrT:MqxX32QuohgW>D2EuQhkl0;UgX?15pU');
define('NONCE_SALT',       '>Cb4_br}mL|33-C^t>7nZ{98$._pVU?]IXJI/XT ^K-J{+M 7hXW@1#6}rqf#PsE');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wptest_';

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
