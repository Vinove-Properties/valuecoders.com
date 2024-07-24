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
  <?php }
  endif; ?>
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
</head>
<body id="themeAdd" <?php body_class(); ?> data-ptemplate="<?php echo basename( get_page_template() ); ?>" data-gcaploaded="0">
<header class="header-two sc-up">
<div class="container">
  <div class="wrapper">
    <div class="header-item-left">
      <a href="<?php bloginfo('url'); ?>" class="brand">
        <div class="large">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/logo-light.svg" alt="Valuecoders" 
          class="dark-theme-logo" width="400" height="88">
        </div>
        <div class="small">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/logo-small.svg" alt="Valuecoders" 
          class="dark-theme-logo sm" width="80" height="80">
        </div>
      </a>
    </div>
  </div>
</div>
</header>