<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php 
  if( isStaggingVersion() === false ){
    echo '<meta name="google-site-verification" content="x4jenxWHytNYoiEQI40yqtoX1fPPrGYhHxi8ahcm9FY" />';
  }
  ?>

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/dev-img/favicons.svg" type="image/x-icon">
	<?php 
	if( !wp_is_mobile() ) : 
  ?>
	<link rel="preload" href="<?php bloginfo('template_url'); ?>/v3.0/fonts/NotoSans-Regular.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php bloginfo('template_url'); ?>/v3.0/fonts/NotoSans-Bold.woff2" as="font" type="font/woff2" crossorigin>
	<?php endif; ?>
<style>
@media only screen and (max-width: 767px) {
body{font-family:sans-serif;}
#v4-solutions .img-box h3 a{color:#212121 !important;}
#v4-solutions .img-box:hover h3 a{color:#ffffff !important;}
}	
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
.form-footer-section .form-footer .flex-3:nth-child(3) .title{background-position: 0 -202px!important;
padding-left: 25px!important;}
.form-footer-section ul.faddress-col li{margin-top:10px;}
}
.nice-select .option, .nice-select span.current{text-transform: inherit !important;}
<?php endif; ?>	
@media only screen and (max-width: 991px){
.hero-img-section, 
.hero-section{background-image:none !important;}
}
.grecaptcha-badge{visibility:hidden;}
.glide { position: relative; width: 100%; box-sizing: border-box; } .glide * { box-sizing: inherit; } .glide__track { overflow: hidden; } .glide__slides { position: relative; width: 100%; list-style: none; backface-visibility: hidden; transform-style: preserve-3d; touch-action: pan-Y; overflow: hidden; padding: 0; white-space: nowrap; display: flex; flex-wrap: nowrap; will-change: transform; } .glide__slides--dragging { user-select: none; } .glide__slide { width: 100%; height: 100%; flex-shrink: 0; white-space: initial; user-select: none; -webkit-touch-callout: none; -webkit-tap-highlight-color: transparent; } .glide__slide a { user-select: none; -webkit-user-drag: none; -moz-user-select: none; -ms-user-select: none; } .glide__arrows { -webkit-touch-callout: none; user-select: none; } .glide__bullets { -webkit-touch-callout: none; user-select: none; } .glide--rtl { direction: rtl;}
body.page-template-template-contact-v8 .contact-us-section.full-width-form .head-txt .logo-box{
  background-image:url('<?php bloginfo('template_url'); ?>/dev-img/logo-small.svg');
}
a.ws-dotted{ border-bottom:1px dotted #000000; color:#000000; }
a.ws-dotted:hover{text-decoration: none !important; color: #656565;}
.client-img-section .right-box .award-sc .award-row .award-col p{display:none;}
#cf-requirement textarea::placeholder{white-space: pre-line;}
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

<script>
function loadReCapJS(){
  let pxBody    = document.querySelector("body");      
  let dValue    = pxBody.dataset.gcaploaded;
  if( dValue == 0 ){
    let scriptEle = document.createElement("script");
    scriptEle.setAttribute("src", "https://www.google.com/recaptcha/api.js?render=6LfpW60nAAAAAO38ivvX-w6ZqaRR4FcrjuaeBc6w");
    scriptEle.setAttribute("async", true);
    document.head.appendChild( scriptEle );          
    scriptEle.addEventListener("load", () => {
      console.log("File loaded")            
      if( typeof grecaptcha === 'undefined' ){
      grecaptcha = {};
      }
      grecaptcha.ready = function(cb){
        if(typeof grecaptcha === 'undefined'){
          const c = '___grecaptcha_cfg';
          window[c] = window[c] || {};
          (window[c]['fns'] = window[c]['fns']||[]).push(cb);
        }else{
          cb();
        }
      }
    });
    scriptEle.addEventListener("error", (ev) => {
    console.log("Error on loading file", ev);
    });  
  }
  pxBody.dataset.gcaploaded = 1;
}    
</script>

<script data-cfasync="false">
function _utm_getQueryParams() {
    const params = {};
    const queryString = window.location.search.substring(1);
    const queryArray = queryString.split("&");
    queryArray.forEach(function(item) {
        const [key, value] = item.split("=");
        params[key] = decodeURIComponent(value);
    });
    return params;
}

function _utm_setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

const _params    = _utm_getQueryParams();
const utmParams = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term'];
const utmValues = {};

utmParams.forEach(param => {
if (_params[param]) {
    _utm_setCookie(param, _params[param], 1);
}
});

function utm_getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

utmParams.forEach(param => {
    const value = utm_getCookie(param);
    if (value) {
        utmValues[param] = value;
    }
});
utmValues['utm_term'] = "<?php the_permalink(); ?>";
function _generateUtmLink(baseUrl, utmParams) {
    const url = new URL(baseUrl);
    Object.keys(utmParams).forEach(param => {
        if( utmValues[utmParams[param]] ){
            url.searchParams.append(utmParams[param], utmValues[utmParams[param]]);    
        }        
    });
    return url.toString();
}

function consultCTA_cb(){
  window.open( _generateUtmLink( 'https://calendly.com/valuecoders/consult', utmParams ), '_blank' );
}
</script>
<?php if( is_home() || is_front_page() ) : ?>
<link rel="preload" as="video" href="<?php bloginfo('template_url'); ?>/video/home-video.mp4">
<?php endif; 
global $post;   
$pageCategory = get_post_meta( $post->ID, 'vc-mcategory', true);
?>
</head>
<body id="themeAdd" class="hb-toc" <?php body_class(); ?> data-mpid="<?php echo $post->ID; ?>" 
data-ptemplate="<?php echo basename( get_page_template() ); ?>" data-gcaploaded="0" 
data-url="<?php the_permalink(); ?>" data-pcat="<?php echo $pageCategory; ?>">
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
if(!is_page_template(['page-templates/template-contact-v8.php','page-templates/template-contact-v9.php'])){
get_template_part( 'include/menu', 'v4.0', ['pcat' => $pageCategory, 'pid' => $post->ID]); 	
}
?>