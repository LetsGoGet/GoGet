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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'uGqZ_?{%`,tZBHY#v:mke!HZQ><8)88`zlz4S[$ p{}7vWGFb.61EE)~<R?[QEYp' );
define( 'SECURE_AUTH_KEY',  '`:-{FN|.L]7W~3^<T:)VPDlN3[bd1.Z*3Kj_dqc(iFi$YtMWYOj&aaHDfrkg;w~m' );
define( 'LOGGED_IN_KEY',    ';Oct[mWMQN|VStl-fRiC(KcuYYW5bHp]b`+~p=Y1QT/(l$?^wx0#%X}*iz[I0z5c' );
define( 'NONCE_KEY',        '2if%1wO zE=E7VrBD.7 6wK!86!_@-7^Ab4SM52`mxoyw@^3:C3DT3>i7pQpbuku' );
define( 'AUTH_SALT',        '0ZI3oU{`4:oP-y<Y.^}XXdlf#H#<~n9;]yL|Q3OB9=I{oSG-=|>< QpcOK ]6Q-?' );
define( 'SECURE_AUTH_SALT', 'w?:zDwe(r ,X:]N_Nf@#GpmMLkg#FkCO*$3Ce[#]vx6_`zjaTQ<8{dJ_1/Th1YSr' );
define( 'LOGGED_IN_SALT',   '_!Q&ba-(m4{<cQ:0l[IU.T}v[5GfEgFWX$86e7>v2`G#+5{Z@:MfCP2.eKT=6@o<' );
define( 'NONCE_SALT',       'jTbv(]|SxM#|38].Msre`i_MSbA]M2YO6PFW49vwCz;G*of]!ABrV9>3zo4K{>vy' );

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
 * visit the documentation
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define('WP_DEBUG_DISPLAY', false);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
