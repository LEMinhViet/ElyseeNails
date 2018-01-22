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
define('DB_NAME', 'elysee_nails');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

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
define('AUTH_KEY',         'wh3 1erO^T#Cc(W-}U7(v<EY~JXJX&Qcv7HDxwM!1FtTs$)N*}d~k!FN]Q/~4$(S');
define('SECURE_AUTH_KEY',  '&YVxnw$aetK*?HGYLVsx=w+aR.3da&=)IH rM=5ETQyJ%D[>RSYE~StlW%Eal2fx');
define('LOGGED_IN_KEY',    'RAG&kO7^_5*u+WW]Z.m8_Rlp)dv ;IU3&E3sYDB[{>8]T$*zF}h( AJO75hld#0)');
define('NONCE_KEY',        '-*2_Ge6:%1=tT^MDXmemaeCH%!^L%9E}se/!Ih;n!,WZI@/G}- _!_mRZ`>i>]vv');
define('AUTH_SALT',        '!s/%6sEpLp3WJe0LP.TGb*wSFUIbPg#]|_3}Kz<5!MlmfN}:Ch.<.Q><RK^,UY#5');
define('SECURE_AUTH_SALT', 'Us<*s+4n2OB.+ .i=0sz 8y-%A Je/  ^#E#nyc<f=9YGxL 90&;p[uP<,tf&2C%');
define('LOGGED_IN_SALT',   'uGs}E?w/9VKvi6+^do2$9-+`ZF0frhQ/ubD(P.5rwl!lo:Vn=&CFl7JJ7SJ$lhk5');
define('NONCE_SALT',       ';^n1L`cF@~nHt+OzjOOwdow`XQ6Ie uUpjYY(]*x2^|N4;DK,u!ZS$B_!OGCCz7m');

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
