<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<script>
	function fun() {
	var element = document.getElementById("myDIV");
	element.classList.toggle("open");

	var element = document.getElementById("shareDiv");
	element.classList.add("active");
 }</script>	
<script type="text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://gtm.valuecoders.com';f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PL37X57');</script>

<link type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/glider.css" rel="preload stylesheet" as="style" />	
</head>
<body id="themeAdd" <?php body_class(); ?> >
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PL37X57" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php wp_body_open(); 
$root_dir = ( $_SERVER['DOCUMENT_ROOT'] ) ? $_SERVER['DOCUMENT_ROOT'] : '';
//require_once $root_dir.'/vc-nevigation.php';
//require_once $root_dir.'/menu-v3.php';
require_once get_stylesheet_directory().'/menu-v3.12.php';
?>