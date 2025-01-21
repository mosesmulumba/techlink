<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pius' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9rU>WYv(G E$M/.ara`j7Xj7]1O&pJuwSkm,~OaRew<vrVOA{](k-o)U`v6Kn*ZL' );
define( 'SECURE_AUTH_KEY',  '=.6^@==vPrNtAD6fGY8Um<#eb)`}(o^CZX?.;j{2oN-W.MO4r#N(uMMS%?~CdFxB' );
define( 'LOGGED_IN_KEY',    '^`/hd`lPPQpG[mBX}@pv`wPP+g~FkJ$TMD>:On}I)$Iabv#QSZ1UGO5$i3!E(jtm' );
define( 'NONCE_KEY',        ':e$#ZZ_sgWRPnCP$~aM`*_&sW[OcEEuu2`bG$/RmY1%G*F/7[rNT`&RP7Mk{n 6!' );
define( 'AUTH_SALT',        'a}kTyEIwiJ;(hHIgyw^6BYL8=Biz|ff3{*_~fhw)VJ#jzuiUy]?Fma< ua^Vt.de' );
define( 'SECURE_AUTH_SALT', '|lP}HF0G(}!jjiGhF]XTMEQs-iDxH<Wg9 CR/hWe{{b]|a/(85E{#@Ty:s/@-GH1' );
define( 'LOGGED_IN_SALT',   'RT%.?*G,)Tu>oqoE{:H5h%t`d4^:b |]0r5o(hQi;kDTH3-Hs-fa_^y?J$0_!C.&' );
define( 'NONCE_SALT',       'n;|)7O/=d2d6|k`crMM5S,0NJL*rf^ _v$ k2WWl*kfM1`DyFo;k_A#1|&X0/QLY' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
