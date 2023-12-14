<?php
define( 'DB_NAME', 'valuecoders-com-site-prod-db' );
define( 'DB_USER', 'valuecoders-com-site-prod-db-user' );
define( 'DB_PASSWORD', '9MBjL7MMeOhbsKN' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

define('AUTH_KEY',         'BNVKx:4+cuz67W9AZTn//ftMd{rGO,znIq3~uSb6:!.!)l)vX6x/:GC&Y+7FErq=');
define('SECURE_AUTH_KEY',  'QWm!vU+q./N(W>2*hp~<X|p5w%rg$*5/=-Q3SC#S^EB^t-1<24?&R!3lr,kPTRiI');
define('LOGGED_IN_KEY',    'rFo7IP%xpV6(nq[jx|Jgyrj/8)d@:eSK/H^-0r_hP%uts=T=ZgF_)6Q1E*usFo7.');
define('NONCE_KEY',        'VMC.%7V-X&nJ]WnCj&vr!wEQc-BD@iK-RzWRwZ)cL>&#a+U:(QCn:;K&[3>aUWA@');
define('AUTH_SALT',        'NKMSA RCA^,cY~r?YZ ?dCjEc{fk-W;I^_B}PUl%iE8~4+p<1k!UP 41|NyAX{T^');
define('SECURE_AUTH_SALT', 'R(W{%7B*$NI^b.X0#fh]KH]9 wnc,-v<$[M,9V^tm xd5j#>LWA%O,F~!0u;C8^]');
define('LOGGED_IN_SALT',   '6hu0yugq&cor1l-#i~&loA$Y`ci|So<(J]-g>w|45nq5+*s1l=gY|N-QS27?SUZW');
define('NONCE_SALT',       '8h;{wJ_Mj,!u<v=~szFxQ7CStg8~Ot*.W9zV0-yC|CL~/rsN;p:Id,[RI(ix+Nz5');

define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', true );
define( 'FS_METHOD', 'direct' );
define( 'WP_POST_REVISIONS', false );
define( 'WP_HOME', 'https://www.valuecoders.com' );
define( 'WP_SITEURL', 'https://www.valuecoders.com' );

define( 'WP_MEMORY_LIMIT', '256M' );
define('DISALLOW_FILE_EDIT', true);

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
