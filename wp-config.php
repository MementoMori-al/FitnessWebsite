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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'FitnessWebsite_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@UfJ-U|ji!}r(;%4_RQ65ivfI7c4yh>@hO]%4i50FtaA9>&0;aa/d*Z]Vrwq7!uZ' );
define( 'SECURE_AUTH_KEY',  'AH;S~Mg-Xh&4aQD!g1U$TO}WBa+m,V$cnp]O:Y%/`n,IIISVv#~WZ<G*bE|!!&3;' );
define( 'LOGGED_IN_KEY',    'r}KZPe#2$o*${5VOsp<M*wfH;hF[{M SY+9uU6O<B/z,Dk?Dzal2bFI]s.^Ed]5&' );
define( 'NONCE_KEY',        'mc3|VpQ.yVM VCMY|L^:R]dA&4d_^dZ0(^$mzPJn`<n_B1YiIjj$J11N>q.]pPP!' );
define( 'AUTH_SALT',        '$Q%7E?q>SY(W8KkuI|d3n?y_:js/RjI;k_b%NYgUiv#-fUPsJ}=;#8=x$HOfM`h<' );
define( 'SECURE_AUTH_SALT', ':8A^3alVzTuDQzCHMzQ_~qdQI~7IUF>,iFx:-_.XSr5N83q$ARL@]JAadoMDD7_I' );
define( 'LOGGED_IN_SALT',   '!d&g,8[]Z0Om:G>--t&[?_Aq[,V7]K]sjVWRwz6+Z1lrEUI+(Zd_.mZB8OKY!NZR' );
define( 'NONCE_SALT',       'pk)Bcy$t+ywAo*l/KmdO{d87jzqLl^KMPZE~kGM9N%k)6-~BLUD%~+W;y|}9hV{O' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
