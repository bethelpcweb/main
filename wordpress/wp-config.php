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
define('DB_NAME', 'bethel');

/** MySQL database username */
define('DB_USER', 'bde142f2a3cdf9');

/** MySQL database password */
define('DB_PASSWORD', '792bbc51');

/** MySQL hostname */
define('DB_HOST', 'us-cdbr-azure-west-b.cleardb.com');

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
define('AUTH_KEY',         'e?LAr^s6o4HhlZCr(y8TOeM^OsJWVDRJN|`OIF@A%8,brh!`wrD>GKgTb*VX*De>');
define('SECURE_AUTH_KEY',  'g x9yR}^hPCIw#{HS@!nquB%A3FlH!X4zi,;(24 Ot?B/TBVeQh]P8uYiC(^w|UH');
define('LOGGED_IN_KEY',    'I}FWH,KPQ(R?oAsIn))N=)7^pmw1JsoC6e={$U0:b9)ak$r~svsGmZxw1Lc)gV(_');
define('NONCE_KEY',        '02G#/%O:@.]I;:<e>)F]GIOWKdH{y_]UK.W-Q6J.z_|x:Us!v3y6lOlJ1GEpeI&O');
define('AUTH_SALT',        'Tppidg]v$LTjk(FsjW{S{BPU%*j--LJ0~O0FY$J!5[raW8nhC&`7L$TTM&t$RL>4');
define('SECURE_AUTH_SALT', '~?cjMdS! A|@(]uW<|_|EE#vUFuwlq,2.Ub[~<qJk(5R-T@P3l-noHa(BG(MoL )');
define('LOGGED_IN_SALT',   'P;mv_Vkm!d{/GeHj|yh.S?g>SSygbVZ)9[>fDlSfX]bcZ$j50][;Q0-4FMH[5e%6');
define('NONCE_SALT',       '=g&_gf}}b@L5e{.]nZ/;mNRkp+U23ZXF vY#Iv|8lQ>4T!Z[O4@1X+Y9XBvDcK^[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpdev_';

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
