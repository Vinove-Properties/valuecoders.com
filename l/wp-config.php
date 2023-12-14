<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

define( 'DB_NAME', 'valuecoders-com-landing-prod-db' );
define( 'DB_USER', 'valuecoders-com-landing-prod-db-user' );
define( 'DB_PASSWORD', '9IhyLdaluehLtJA' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

define('AUTH_KEY',         'fV-p;!FNEGMbUt!.[; hfR_?&6~f(;g)BK7sK=/4Tf9q5msEjG=+]dV4/.U=q^JW');
define('SECURE_AUTH_KEY',  'KRZJlDF!:@bs4c>.bRn?X[V~QK?6`?);sp&{h=.+aK++SPFjnqc07j(Sz(KQ|[g?');
define('LOGGED_IN_KEY',    '!y/x)&Tx(V;|]5>?mV*UxL>-ls=C+}Ka0qKjk9J$.GsjxhsLXJ +`76U-a,d01]o');
define('NONCE_KEY',        'M1#|kl#maxTs|w(q:s`<-Q&(kaey|HC&oS!^meHH %O7+bI8[D*y4+x|0wJl#K)e');
define('AUTH_SALT',        '+R9Y8X-.1|rW(.KvZRVGoojYV]Rn+QVj;Y.?DXVDH[%tw`bnd1nB35==Ku}l]ht]');
define('SECURE_AUTH_SALT', '+L0^{jV*n>grPuwSnV+Glme-uxK+U2a6@m#7$jd{0?_lO9cjrx@1AF!(|r/$%-L+');
define('LOGGED_IN_SALT',   'KV~o8E*+&|eMO?F8+&oU`mcx(jRaM4EIoKhz-}6#-KdRXyh~4^v6XyOew48wftXW');
define('NONCE_SALT',       'x7)k3=8]g|2&PseAhukws-PB%|s]).3-Poe49AE8+e!gs0]vG?=x.(nh<NYix5O@');


define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', true );
define( 'FS_METHOD', 'direct' );
define( 'WP_POST_REVISIONS', false );
define( 'WP_HOME', 'https://www.valuecoders.com/l/' );
define( 'WP_SITEURL', 'https://www.valuecoders.com/l/' );
define( 'WP_MEMORY_LIMIT', '256M' );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';