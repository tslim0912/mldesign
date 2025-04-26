<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //

define( 'WP_HOME', 'http://localhost/mldesign' );
define( 'WP_SITEURL', 'http://localhost/mldesign' );

/** The name of the database for WordPress */
define( 'DB_NAME', 'mldesign' );

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
define( 'AUTH_KEY',         'l} 5xMos9>@ex^>zAy!Vb.CfbQ@-kaQb*S_yl#T&~8XmKz,,$.*VEP9L?9H6dT,3' );
define( 'SECURE_AUTH_KEY',  '9ds[:Nn6*emr].0iB%V!e?i#]EPo7k{pI. o{-;qIz8|${lebXb2FB&G{ |ai9!#' );
define( 'LOGGED_IN_KEY',    'H;zYpAU.;wIH}}R80m-I,+({oM$KTy/Pk(n.)qL-q8pN%d+Eymw[-@sdLB@traq ' );
define( 'NONCE_KEY',        'jAHA@$^OLC+uOy;]9g7*5-_d,FsyNM;{$wM$+@oU&x`Ky$IQzg2,g9/Mx8e5}%N*' );
define( 'AUTH_SALT',        '#wIxXqac+$idi!u_QG<Uo{}zUnytQ7&0Ho6-Gubxk+rZ^&{SoHIVueQ.0&ZK7lhE' );
define( 'SECURE_AUTH_SALT', 'BSwXE5!:S81p3,wy 0[DP6a:W1oN@ PD(%xJ:bBsJ]-ZH`~a#SH~qDZozY^C/Lv`' );
define( 'LOGGED_IN_SALT',   'v.M2Hi)@6UPxMGkB4Wu8<{wD3X=;r2s{u_sZ(oV~|A%6fyJ0_R+ u8s1(6<299jy' );
define( 'NONCE_SALT',       '=tc;{4>WRe@tNK+YYeP8-)<z/u[!m8$DRB{V9N^eQhc.uiIf_`gR~E`Dv)1Vgns8' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'mld_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
