<?php

define( 'V_ENV', 'localhost' );

if( V_ENV == "localhost" ){
	define( 'DB_NAME', 'staging-valuecoders.com');
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', '' );
	define( 'DB_HOST', 'localhost' );	
	define( 'WP_HOME', 'http://localhost/valuecoders.com/staging/' );
	define( 'WP_SITEURL', 'http://localhost/valuecoders.com/staging/' );
}else{
	define( 'WP_CACHE', false );
	define( 'DB_NAME', 'pixelcrayons-com-site-dev-db' );
	define( 'DB_USER', 'pixelcrayons-com-site-dev-db-user' );
	define( 'DB_PASSWORD', 'VklvCkkVt4O4kxQ' );
}


define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );
define( 'WP_POST_REVISIONS', false );


define( 'AUTH_KEY',         '{KpI`LP(}Cye|3(7~V]NjT_J]NTzA4Os#r<~u&y@?6M32-YcBq0EZzzK[;4Li)t2' );
define( 'SECURE_AUTH_KEY',  '/*?,2{L%<~z1v,OY&Se=/xfF m()`|I$cae2#&7hv*/EP$1ITh32]/Z>lM=7b`m4' );
define( 'LOGGED_IN_KEY',    'gi(fqRIt41:+*i-&$?Mq}WG~MzB(zV]uA>oW2%5{pn^il^av!Us{fS.}-AzI83K>' );
define( 'NONCE_KEY',        '@D3_pG<15V,GY:()-kKEjU d U,5(vgpf@dyQ1tjRT`&1Dni/TDS%i0m)1?]zd5<' );
define( 'AUTH_SALT',        '7vG1#iSs8.Txfd$f~1/&Q- ]31];1A45L^v**WBuDDgp1|V{0x|vFQUAg-cxW[Zh' );
define( 'SECURE_AUTH_SALT', 'v[G=HA]BXlyhhR~RyK6:U$*Lg0t1Eq*@=F6syM+>IA5i1,B!F-,78e0_Nm?zUDK)' );
define( 'LOGGED_IN_SALT',   'CfjU!MSkh_Rjf)g)]3i:^/`b36&%jWn6=9s0oP!0XHCZ+QQOA?sJhTMv&]r1N:VM' );
define( 'NONCE_SALT',       ');r%cVW1L&-+WMwV[?6n=q/-6(ep35+tV=6-Z+f_GU0M[K5sXfOUaxMY#k;%yXGP' );

$table_prefix = 'wp_';





if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';