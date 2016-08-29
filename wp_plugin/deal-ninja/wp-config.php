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
if (!session_id()) {
    session_start();
}
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dealninja_wp');

/** MySQL database username */
define('DB_USER', 'levar');

/** MySQL database password */
define('DB_PASSWORD', 'lb0315lb');

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
define('AUTH_KEY',         'Lr>=@bEd^_c}n?Xr!]s_Pt};Ufd9_,z7FtVdirqlIoKpv3&4nejxy7W<hrrs5[<[');
define('SECURE_AUTH_KEY',  '[&-v6}x`$X<>W)Jp|_R<yrf,0{!^&}=J uX>6c1;{9_IGD-CHiSIo6sx*fyY9d)w');
define('LOGGED_IN_KEY',    '_2yI26,zmrjMumtl83g|Vkso6%I7$MLM<_^gvjka>U$+|@NW3gD9,8M]0{zXz9P6');
define('NONCE_KEY',        'd[+v7rKVX<G=SHrZ&T.tG99{bh!vwHC!1YEgR|| 41<AZRC_]~2FC}cnc:KT9qkG');
define('AUTH_SALT',        ':Qb{n?4z8B}YHYzC?{^+Jugb}?j)f|S8Pah-y% NydPv2 ~dNXnB#,ND0,Pph.I$');
define('SECURE_AUTH_SALT', '$:Z^YA2EE(+Z{x<22q z[88_U6?f7nrC: Gn[g@p[2}!wkD~N $!#gPF:Ut1kq`.');
define('LOGGED_IN_SALT',   '/_3G4W_|G&wfqVNe-.T)!?$^,oX($PgSI|5P4yN/Zv0SfX5(qs|6 )Qf2Wb44Ga-');
define('NONCE_SALT',       '!|; kexxf^64G)JZ$@rP%r=Hbg$y~zPyYe&m/8rusqGJ[M3F>u>?B1a^#r(9_Srk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dealninja_';

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
