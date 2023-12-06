<?php
$vcSiteUrl = "https://beta.vinove.com/valuecoders-v2/";
if( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "localhost") ){
$vcSiteUrl = "http://localhost/valuecoders-v2/"; 
}
define('HOST_URL', $vcSiteUrl);

$objArray['site_url'] = "https://www.workstatus.io";
if( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "localhost") ){
	$objArray['site_url'] = "http://localhost/valuecoders-v2/";
}elseif( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "https://beta.vinove.com/valuecoders-v2") ){
	$objArray['site_url'] = "https://beta.vinove.com/valuecoders-v2/";
}elseif( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "beta.vinove.com") ){
    $objArray['site_url'] = "https://beta.vinove.com/workstatus.io";
}
?>
<link rel="icon" href="<?=HOST_URL?>images/favicon.png" type="image/x-icon">
<?php if( !isMobile() ) : ?>
<link rel="preload" href="<?=HOST_URL?>fonts/notosans-medium-webfont.woff2" as="font" type="font/woff2" crossorigin>
<?php endif; ?>