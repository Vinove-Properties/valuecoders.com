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
 * DB Logs 
 * 15 June : valuecoc_livev30
 * 16 June : valuecoc_v30_1606 
 * 16 June Evening : valuecoc_v3_1606
 * 21 June : valuecoc_v30_2106
 * 27 June : valuecoc_live270623
 * 05 July : valuecoc_live050723
 * 13 July : valuecoc_live130723
 * 19 July : valuecoc_live190723
 * 26 July : valuecoc_live260723
 * 02 Aug : valuecoc_live020823
 * 16 Aug : valuecoc_live160823
 * 20 sep : valuecoc_live2009
 * 25 sep : valuecoc_live2509
 * 11 OCT : valuecoc_live1110
 * 25 OCT :  valuecoc_live2510 
 * 16 NOV :  valuecoc_live1611
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'valuecoc_live0512ev' ); //valuecoc_live0412

/** Database username */
define( 'DB_USER', 'valuecoc_wpsite' );

/** Database password */
define( 'DB_PASSWORD', 'W@89Uz*3J!gp6>dA' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'BNVKx:4+cuz67W9AZTn//ftMd{rGO,znIq3~uSb6:!.!)l)vX6x/:GC&Y+7FErq=');
define('SECURE_AUTH_KEY',  'QWm!vU+q./N(W>2*hp~<X|p5w%rg$*5/=-Q3SC#S^EB^t-1<24?&R!3lr,kPTRiI');
define('LOGGED_IN_KEY',    'rFo7IP%xpV6(nq[jx|Jgyrj/8)d@:eSK/H^-0r_hP%uts=T=ZgF_)6Q1E*usFo7.');
define('NONCE_KEY',        'VMC.%7V-X&nJ]WnCj&vr!wEQc-BD@iK-RzWRwZ)cL>&#a+U:(QCn:;K&[3>aUWA@');
define('AUTH_SALT',        'NKMSA RCA^,cY~r?YZ ?dCjEc{fk-W;I^_B}PUl%iE8~4+p<1k!UP 41|NyAX{T^');
define('SECURE_AUTH_SALT', 'R(W{%7B*$NI^b.X0#fh]KH]9 wnc,-v<$[M,9V^tm xd5j#>LWA%O,F~!0u;C8^]');
define('LOGGED_IN_SALT',   '6hu0yugq&cor1l-#i~&loA$Y`ci|So<(J]-g>w|45nq5+*s1l=gY|N-QS27?SUZW');
define('NONCE_SALT',       '8h;{wJ_Mj,!u<v=~szFxQ7CStg8~Ot*.W9zV0-yC|CL~/rsN;p:Id,[RI(ix+Nz5');

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
define( 'WP_DEBUG_LOG', true );
define( 'FS_METHOD', 'direct' );
define( 'WP_POST_REVISIONS', false );
define( 'WP_MEMORY_LIMIT', '256M' );
define('DISALLOW_FILE_EDIT', true);
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
