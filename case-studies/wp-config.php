<?php
define( 'WP_CACHE', false ); // Added by WP Rocket
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'valuecoc_case_studies');

/** MySQL database username */
define('DB_USER', 'valuecoc_case_st');

/** MySQL database password */
define('DB_PASSWORD', 'vcAdmin^&*()12');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
//define('SITE_ROOT_URL','https://valuecoders.com/case-studies/');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '7g2)$)=AE,3D/VD;P1}~(*`,1A4q&qq1$;O|rP 0kiv_oIwl[[<EAIgRA^$l`8]M');
define('SECURE_AUTH_KEY',  'd%!m1o3Zi7zXKL*a>~F7~{`#vnmz3JPM?JmQ13(P:qk(Jbq6wk>O&F`&K[`(`$~!');
define('LOGGED_IN_KEY',    'iruJdO?vs.(ZV`YX -cwEflANst1 ^dT}!6O/]WG_ @%qmwviA3^?%4fNG%kr:if');
define('NONCE_KEY',        '<L+esYIM)HLMn+hzaW#tLi;358Rj3@_>>gvm33VGp/ort=`>[ViM,hQ6Wli%yb]6');
define('AUTH_SALT',        '^dFUg80&>IUWY1Dm2(e[#9^5bBf16F5J~LM/yGNYL1xKh7Wnu?}p?WHY-5kK`e4,');
define('SECURE_AUTH_SALT', 'M<!hTFm**mX(:I=ZCrp$yyoG2Y.i)xatCdAKrLi<t ;eje^U&mHk&5&pf3DWula)');
define('LOGGED_IN_SALT',   '+JcFEFHcS~f)o27-&eJ5ahgQ4D{~ 3*9w&sJR5nnzTP_:T:})E8~}ojs%4a5IFW_');
define('NONCE_SALT',       'vP|M2*W,7$efSf2(S2u40]H&hNcvU*KukEw/3q=E9aSU>pZ9_3.~`QRe}79TIEq)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define( 'WP_DEBUG_LOG', true );
define( 'WP_MEMORY_LIMIT', '256M' );

define('CLIENT_ID','1000.BMJ414JAF95SXHD4YKRK0FJ3JC57VH');
define('CLIENT_SECRET','e9a796ffde50de7a3198d63f134196d125bae343d0');
define('ACESS_TOKEN','1000.cae698c21d5f8adc4f5f8e1ae60a3c39.6008000ac10c5df23ebf773f63194b81');
define('REFRESH_TOKEN','1000.b4d2d568df487f80bc73675a27101c45.d7cc4b483d0157d16f672e86dc354d62');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
