<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png" type="image/x-icon">
	<?php if( !wp_is_mobile() ) : ?>
	<link rel="preload" href="<?php bloginfo('template_url'); ?>/fonts/notosans-medium-webfont.woff2" as="font" 
	type="font/woff2" crossorigin>
	<?php endif; ?>
	<?php 
	/*
	<script src="https://js.hcaptcha.com/1/api.js" async defer></script>
	*/
	/*
	<script src="https://www.google.com/recaptcha/api.js?render=6LfGLlIgAAAAALnkfRAsgxomxQss-sgJpeCqYrd3" defer></script>
	<script>
	grecaptcha.ready(function() {
	    grecaptcha.execute('6LfGLlIgAAAAALnkfRAsgxomxQss-sgJpeCqYrd3', {action:'validate_captcha'})
		.then(function(token) {
		document.getElementById('g-recaptcha-response').value = token;
	    });
	});
	</script>
	*/
	?>
<style>
.cont_country_section{position:relative}
.autocomplete-items{position:absolute;border-bottom:none;border-top:none;z-index:99;top:100%;left:0;right:0;
overflow:auto;min-height:50px;height:150px}
.autocomplete-items div{padding:10px;cursor:pointer;color:#000;border-bottom:1px solid #d4d4d4}
.err{border:1px solid red!important;color:red}
.onfcs{border:0 solid red!important;color:#000}
p{margin-top:0}
.my-form{margin-bottom:10px}
#gallery img{width:auto;height:54px;margin-bottom:10px;margin-right:10px;vertical-align:middle}
.button{background:#60b741;border:0;outline:0;color:#1d1c39;padding:12px 27px;font-size:18px;font-weight:500;text-transform:capitalize;-webkit-appearance:none;-moz-appearance:none;appearance:none;cursor:pointer;transition:all .3s ease-in-out;letter-spacing:.5px;border-radius:4px;font-weight:600}.button:hover{background:#ddd}
#fileElem{display:none}.form-control.success input{border-color:#2ecc71}
.form-control.success small{visibility:hidden}.form-control.verror input{border-color:#e74c3c}
.form-control small,
.user-input.form-control.verror:focus-visible{border-color:#e74c3c!important}.form-control.verror small{visibility:visible}
.user-input.form-control.success input{color:#60b741!important}.user-input.form-control.verror input{color:red!important}
.footer .star-icon{background:url(<?php echo get_template_directory_uri()?>/images/footer-icons.png) 0 0 no-repeat;
width:18px; height:15px; display:inline-block;}
.vlazy{background-image:none !important; background-color:#F1F1FA !important; background: none !important;}
body.page-template-template-services .php-usage-sprite .box-3 h3 a{text-decoration: none;}
body.page-template-template-services .php-usage-sprite .box-3 h3 a:hover{text-decoration:underline;}
body.page-template-template-testimonials .client-video-section iframe,
.keka-iframe iframe{ width:100%; }
.keka-iframe iframe{ border: 0; }
body.page-template-template-services .second-level-section .left-box p a{ color: #bdb7b7; }
body.page-template-template-services .second-level-section .left-box p a:hover{text-decoration:underline;}
<?php if( is_page('contact') ) : ?>
.cont_country_section{position:relative;}#gallery img,.my-form{margin-bottom:10px}.button,button{cursor:pointer}.autocomplete-items{position:absolute;border-bottom:none;border-top:none;z-index:99;top:100%;left:0;right:0;overflow:auto;min-height:50px;height:150px}.autocomplete-items div{padding:10px;cursor:pointer;color:#000;border-bottom:1px solid #d4d4d4}.err{border:1px solid red!important;color:red}.onfcs{border:0 solid red!important;color:#000}p{margin-top:0}#gallery img{width:auto;height:54px;margin-right:10px;vertical-align:middle}.button{background:#60b741;border:0;outline:0;color:#1d1c39;padding:12px 27px;font-size:18px;text-transform:capitalize;-webkit-appearance:none;-moz-appearance:none;appearance:none;transition:.3s ease-in-out;letter-spacing:.5px;border-radius:4px;font-weight:600}.button:hover{background:#ddd}#fileElem{display:none}.form-control.success input{border-color:#2ecc71}.form-control.success small{visibility:hidden}.form-control.verror input{border-color:#e74c3c}.user-input.form-control.verror:focus-visible{border-color:#e74c3c!important}.form-control.verror small{visibility:visible}.user-input.form-control.success input{color:#60b741!important}.user-input.form-control.verror input{color:red!important}button{background:0 0;color:inherit;border:none;padding:0;font:inherit;outline:inherit;text-decoration:underline}
@media only screen and (max-width: 991px){
.slider-right.od-row{display:none !important;}
}
<?php endif; ?>	
</style>
<?php wp_head(); ?>

<?php 
if( isStaggingVersion() === false ) : 
if( is_page_template(['page-templates/template-landing-thankyou.php','page-templates/calendly-thankyou.php'])){ ?>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5VBGP37');</script>
<?php }else{ ?>	
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.defer=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PL37X57');
</script>
<?php } ?>
<?php endif; ?>
</head>

<body id="themeAdd" <?php body_class(); ?> data-mpid="<?php global $post; echo $post->ID; ?>">
<?php 
if( isStaggingVersion() === false ) : 
if( is_page_template(['page-templates/template-landing-thankyou.php','page-templates/calendly-thankyou.php'])){ ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5VBGP37"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->	
<?php }else{ ?>	
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PL37X57" height="0" width="0" 
style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php } ?>
<?php endif; ?>

<?php 
if(!is_page_template( 'page-templates/template-contact-v8.php' )){
global $post;	
$pageCategory = get_post_meta( $post->ID, 'vc-mcategory', true);
//echo '<pre>'.$pageCategory.'</pre>';
get_template_part( 'include/menu', 'v3.12', ['pcat' => $pageCategory]); 	
}
?>