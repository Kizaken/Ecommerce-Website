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
define('DB_NAME', 're:quest');

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
define('AUTH_KEY',         'az&XrFVbeIC>rLkQz+Bck20h)~nVlAJ-+)<{PA2utDqJ<LYq9]1DPUaG<_KDWkV^');
define('SECURE_AUTH_KEY',  '>!J#w<L![TIr36.Q|RpWA&rw?z{*8fiKEIg{~d8:K_j8c<8c&DK}!NZ!96J:zeo2');
define('LOGGED_IN_KEY',    ')ls/94qu==9P.Q7~n9(W)XTIjw#wG{Q{2SHt(h{sg-J SH,ll@)5G},J0C~ZHWFM');
define('NONCE_KEY',        ' [gmqjm}{qlOaC`idi(Bn#eT37H??w#G/a1X<YsRRaVU %L!f6aA8#R5}~_]%Bj;');
define('AUTH_SALT',        'F>h1y{^(}:9s/2~2@`[`vdAd.;D~a7]boF_$:f%mN#6H@(t?WaOg~)x>@t8P3 es');
define('SECURE_AUTH_SALT', '}Kwd>W0R0pel0zIV0apSYY6Dvfs9^[}??W#Wp[fbSK^M=j6_D7rS>[|NP*b^aR@b');
define('LOGGED_IN_SALT',   'H|.8w.QAJ}])AYurZ%t$Ez~w@=MosEnzsZN)::x2A^g#|h|Kv:|yGhDM|2E6R[4b');
define('NONCE_SALT',       'Sy5$ei#kb N(]OBBW/.Ct[$P#1Ca?SveAvo6w5slC.3vyj>.9Q(yL21Kf#v{gaE?');

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
