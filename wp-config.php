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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Coreorient' );

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
define( 'AUTH_KEY',         'nl=>Mg)6`~2hbR7?T34l?e]<=jJ>XV;5kx=X^3k]eam5#*7)Mqd7[B9b$,:5V@ir' );
define( 'SECURE_AUTH_KEY',  'hl!S!s:.-[ Z9Fz#;_F7>p=YEr6v?xOLA0I!rB8arR|{sFs~#Uzkfc]iqnxb&$rv' );
define( 'LOGGED_IN_KEY',    'a(oVRHB=c8-E1thS~Qd#ZTKgVGjeHnY_]r`@w;WyUXlz?TI-j&]3wQMZR|tzV]?n' );
define( 'NONCE_KEY',        'xgN#&|nP-QT%~c>J8fK_|)C]WdZWuJ~{%WWF[xw0gsGkGw=Zm>6,$*hla`QLdT:x' );
define( 'AUTH_SALT',        ',whCDIbaC_V9u&R9j<s;h[hnv/vy*lspg[2@|?_Ste^{k{qy_?x~Su^=Jr|uo#DN' );
define( 'SECURE_AUTH_SALT', 'qSHXS]orx8$bKPAGt6T( 2@JEe@tq}T3Yy@]cVJ)C*oEG5%fea?ORIS?T_EV}x~@' );
define( 'LOGGED_IN_SALT',   ';wc7~79$IO%;2}cYSPjHFc+xc.3W#rS1@[HrJ|w,h{sW[/R:8M1)YF2;-0IoX2L2' );
define( 'NONCE_SALT',       'jz+?^jPBSRC9aT:,jS&LZW|%wR`4YDes[{KtBD2y*EWVbk.|Pv8#qpj%C$)?#V 6' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
