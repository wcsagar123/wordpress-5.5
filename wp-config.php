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
define( 'DB_NAME', 'wordpress_5_5_1' );

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
define( 'AUTH_KEY',         'kc40U5x{lyYmY&_kb+-.4CJuhi/6UMTz}s0bvlWFcvi%P&tvf)[]kh8O5U=0#ly*' );
define( 'SECURE_AUTH_KEY',  'WmZ&Wb/NVw-QiqRyokVjI]V{^P_YM^CRFVfKB|Ia8,?PPPOV2.TLbLT4ljAWMMJ4' );
define( 'LOGGED_IN_KEY',    'PLbSnFpGbz+wbg$:2}nx*B -c685ASN#EcaeZrD+71RLGvK9EP(}_}igkIdO]avu' );
define( 'NONCE_KEY',        'B!*0O!/Z8mh]Mt%9)+WqI>0zzU]^5d^/<@LSpyI[pcq~l-rJ.b4dJR<x-e**&Qxk' );
define( 'AUTH_SALT',        'd~*C6BsVw7h$s}}W.pBQ~Bb~(!YO$1-JdY$8tL5|BR<W)bzA,+;bA[_cJ;~xQ.ZM' );
define( 'SECURE_AUTH_SALT', '!@Uu+R|9^QZAEeo[ZLM{69*XoJ63Kgt`>AJ:#,Fg9_lQD^4xbi<gdKe[smLHc;G9' );
define( 'LOGGED_IN_SALT',   'cLa/KxB&X[!SLNPWS>6oaWt]EVN6l{H|b0wnC7|tf+oki$)t.E^#l]ZjR@CGV?&`' );
define( 'NONCE_SALT',       '_ky$ZDKb*R,E!K>bXA%uS-igL <<p*K:bkz%iQ#}<!WoACACx{[s!U}X?vj11+I ' );

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
