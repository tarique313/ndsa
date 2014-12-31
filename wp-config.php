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
define('DB_NAME', 'ndsa');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root123');

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
define('AUTH_KEY',         '(.<PKu{T61@WmySQ5V+p.R/XKESI:JK%|X]TC2Rdx.a:5]DaMXM+t^/DP> iD?xO');
define('SECURE_AUTH_KEY',  'Rm-yHQE=+-&U-Ixf5g(#<Thpw~[sp=QI1ZCPUiEI+rZzy[~u-{W&o7|z8w+#1oqU');
define('LOGGED_IN_KEY',    'T>hamvm%dac+6| $Vv{B]Ezvd5|!U6tEhsrk24m$C;qfKV#bUz1[kvm4 }MD-MaP');
define('NONCE_KEY',        'D2iK%B<XiZM)$TR-Jf|3;`G:H;czh?R8yBR}hUA8Oe0B:yK`xuv0XO9|vrrqx7K.');
define('AUTH_SALT',        'toCor2 OXynp@|YZ$&lN(l;[-ejCYf7@-scg/$eyh,l}D&&?itdU.f;`xHa.o9ZO');
define('SECURE_AUTH_SALT', 'SXm[*,KhM,w&g?%E4#5K.|RTi29R/cPY0Bd[rb~/2<uqP~Zar,AU#de=1@_JW_!2');
define('LOGGED_IN_SALT',   '+m##| [K`J+[a~TRN&=A{RAp1Ay|)qm#n+gA&/pR-Ux<!v8tJRCU/||T~34(+<sH');
define('NONCE_SALT',       'TSU|Q4CP_^, 2x)BXHb2GE_l?^zx9%Ib(n+)Fgcz+t2 #tiCav4b4 NgW[=?.r0G');

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
 
define('FS_METHOD', 'direct');
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

