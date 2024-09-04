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
<script type="text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://gtm.valuecoders.com';f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PL37X57');</script>	
</head>
<body <?php body_class(); ?>>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PL37X57" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<?php wp_body_open(); ?>
<?php //if ( has_nav_menu( 'top' ) ) : ?>
	<?php get_template_part( 'template-parts/navigation/header', 'menu' ); ?>
<?php //endif; ?>
