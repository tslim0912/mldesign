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
define( 'AUTH_KEY',         'F)H@>p5{/|~h`{RmzxA3Z`hv8=7}aeX eF1D.s]:CIbEc{To-Tn)zxY7=N3q<!_1' );
define( 'SECURE_AUTH_KEY',  '#d,F[,V8l~) F19@zT7HZ9U?Xh$[l_zZh^fiMsOeuEmmtpc<aPOBo3C>? 8,eGg@' );
define( 'LOGGED_IN_KEY',    ';Ap`Pc,R)SYI}l=ms_8=W}U7EUoYnej DUFF%Vy<BT_Qq[)V;zGwnfew,T+-H`zW' );
define( 'NONCE_KEY',        'Mfv{,@26NDx4AXfPz.5p>5Jvyr^+Dw1JGmc)P@gL5!g Fz?AuZ%o?t8Kh%D:Xd(t' );
define( 'AUTH_SALT',        'Nq@7=p)&zErrkyMTTE2cyHFOR&L$Z:A%cdjTg1CpQ&E> zB57^?TT+Om+iJ<8cw:' );
define( 'SECURE_AUTH_SALT', '>2>!b4 AK[&wJt+p(RW]rH0|cO0J:PG#=3&3;,WE_~.U!028RD6RB>SF#!&?7qH=' );
define( 'LOGGED_IN_SALT',   'CE&wfOfcLZe4zeaGkas&GMN.Bt5p!&Z6U_7SJ0(umeD~d3*ooZ/]PAgV-R=64/g9' );
define( 'NONCE_SALT',       'f63!-_}_w!1c}$D[=@<GOg!?fnIL+1$|O!D:$HmM=k3ZCmYQ:D9.D,NZSX+Kj2L}' );

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
