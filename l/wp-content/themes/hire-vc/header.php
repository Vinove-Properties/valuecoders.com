<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>

<?php 
if(is_page_template('page-templates/tpl-ppcmanagement.php')){
$cy = "$";
$pRow = get_field('price-plan', $post->ID);
if( isset( $pRow['needed'] ) && $pRow['needed'] == "yes" ){
  if( isset( $pRow['currency'] ) && !empty( $pRow['currency'] )  ){
    $cy = $pRow['currency'];
  }
}   
//echo '<script src="https://js.stripe.com/v3/"></script>'; ?>
<script>
var lp_site_url = "<?php echo get_bloginfo('url'); ?>";
const ppcPlans = {
   basic:{
      price : 500,
      plan_name : 'Basic Plan',
      plan_fld : 'Basic Plan (<?php echo $cy; ?>500/month)'
   },
   premium:{
      price : 1000,
      plan_name : 'Premium Plan',
      plan_fld : 'Premium Plan (<?php echo $cy; ?>1,000/month)'
   },
   elite:{
      price : 2500,
      plan_name : 'Elite Plan',
      plan_fld : 'Elite Plan (<?php echo $cy; ?>2,500/month)' 
   },
   currency : 'INR',
   cr_sign : '<?php echo $cy; ?>'
}
</script>
<?php 
//echo '<script src="'.get_bloginfo('template_url').'/js/checkout.js" STRIPE_PUBLISHABLE_KEY="'.STRIPE_PUBLISHABLE_KEY.'" defer></script>';
}
?>

<?php /* ?>   
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5VBGP37');</script>
<?php */ ?>

<?php if( is_page_template( 'page-templates/tpl-pagenavigation.php' ) ) : ?>
<script>
const navToggler = document.querySelector('.nav-toggler');
const navMenu = document.querySelector('.site-navbar ul');
const navLinks = document.querySelectorAll('.site-navbar a');
allEventListners();
function allEventListners() {
navToggler.addEventListener('click', togglerClick);
navLinks.forEach( elem => elem.addEventListener('click', navLinkClick));
}
function togglerClick() {
navToggler.classList.toggle('toggler-open');
navMenu.classList.toggle('open');
}
function navLinkClick() {
if(navMenu.classList.contains('open')) {
navToggler.click();
}
}
</script>
<?php endif; ?>
<!-- End Google Tag Manager -->
<style>
.nav-toggler{display:none !important;}
.picture.lighter-theme-img {
    display: block;
    margin: 0 auto 2rem 14rem;
}

</style>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5VBGP37');</script>
<!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5VBGP37"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>

<?php 
if( is_page_template( 'page-templates/tpl-version2.0.php' ) ) { ?>
<header>
   <div class="container">
      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="ValueCoders" width="425" height="54" />
   </div>
</header>
<?php 
}elseif( is_page_template( 'page-templates/tpl-version4.0.php' ) ) { ?>
<header>
<div class="container">

<?php 
$isMeTpl = get_field('lp-phoneno');
if( isset( $isMeTpl['enable'] ) && ($isMeTpl['enable'] == "yes") ) {
$showOn = (isset($isMeTpl['show-on']) && !empty($isMeTpl['show-on'])) ? $isMeTpl['show-on'] : '';
?>
<div class="dis-flex items-center">
<div class="head-right">
<img id="do-load" loading="lazy" src="https://www.valuecoders.com/wp-content/themes/valuecoders/dev-img/logo-light.svg"
  alt="ValueCoders" width="250" height="88">
</div>
<div class="head-left <?php echo $showOn; ?>">
<a class="phonedesk" href="tel:<?php echo $isMeTpl['phone'] ?>">
   <span class="phone"><?php echo $isMeTpl['phone'] ?></span>
</a>
<a class="phonemobile" href="tel:<?php echo $isMeTpl['phone'] ?>">
   <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/phone-mobile.png" alt="Valuecoders" width="50"height="50">
</a>
</div>
</div>
<?php }else{ ?>
<img loading="lazy" src="https://www.valuecoders.com/wp-content/themes/valuecoders/dev-img/logo-light.svg" alt="ValueCoders" 
width="250" height="88">
<?php } ?>
</div>
</header>
<?php }elseif( is_page_template( 'page-templates/tpl-version4.12.php' ) ){ ?>
<header>
   <div class="container">
     <img id="do-load" loading="lazy" src="https://www.valuecoders.com/wp-content/themes/valuecoders/dev-img/logo-light.svg"
       alt="ValueCoders" width="250" height="88">
   </div>
 </header>
<?php 
}elseif( is_page_template( 'page-templates/tpl-ppcmanagement.php' ) ){ 
?>
<header>
<div class="container">
  <div class="dis-flex items-center">
    <div class="head-left">
      <picture class="logo-desk">
        <img id="do-load" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/ppc/logo.svg" alt="ValueCoders" width="185" height="32">
      </picture>
      <picture class="logo-mobile">
        <img id="do-load" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/ppc/logo-v2.svg" alt="ValueCoders" width="200" height="49">
      </picture>
    </div>
    <div class="head-right">
      <ul>
        <li><a href="#benefits">Benefits</a></li>
        <li><a href="#ppc-activities">PPC Activities</a></li>
        <li><a href="#case-studies">Case Studies</a></li>
        <li><a href="#ppc-testimonial">Testimonials</a></li>
        <li><a href="#faq">FAQ</a></li>
        <li><a href="#reports">Reports</a></li>
        <li><a href="#pricing-plans">Pricing Plans</a></li>
        <li class="contact-nav"><a href="#pricing-plans">Contact Us</a></li>
      </ul>
    </div>
  </div>
</div>
</header>
<?php }elseif( is_page_template( 'page-templates/tpl-version6.0.php' ) ){ ?>
<header>
      <div class="container">
        <div class="dis-flex items-center">
          <div class="head-right">
            <img id="do-load" loading="lazy" 
            src="https://www.valuecoders.com/wp-content/themes/valuecoders/dev-img/logo-light.svg" alt="ValueCoders" 
            width="250" height="88">
          </div>
          
          <?php 
          $hasCall = get_field('call-header');
          if($hasCall){ ?>          
          <div class="head-left">
            <a class="phonedesk" href="tel:<?php echo $hasCall ?>">
              <span class="phone"><?php echo $hasCall ?></span>
            </a>
            <a class="phonemobile" href="tel:<?php echo $hasCall ?>">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/phone-mobile.webp">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/phone-mobile.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/phone-mobile.png" alt="Valuecoders" width="70" height="70">
              </picture>
            </a>
          </div>
          <?php } ?>
        </div>
      </div>
    </header>
<?php 
}else{ ?>
<header class="headerRow ">
   <div class="custom-container">
      <div class="row">
         <div class="logonew">
            <a href="javascript:void(0);" title="ValueCoders - Software Deveploment Company">
            <img class="firstlogo" src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="Hire Dedicated Developers - Logo" width="425" height="54" />
            <img class="threadlogo" src="<?php bloginfo('template_url'); ?>/images/logo-blue.svg" alt="Hire Dedicated Developers - Logo" width="425" height="54" />
            </a>
         </div>
        <?php if( !isset( $_GET['l'] ) ) : ?>
        <?php if( is_page_template( 'page-templates/tpl-pagenavigation.php' ) ) : ?>
         <nav class="site-navbar">
            <ul>
               <li><a href="#services">Services</a></li>
               <li><a href="#technologies">Technologies</a></li>
               <li><a href="#hiring-process">Hiring Process</a></li>
               <li><a href="#partners-awards">Partners & Awards</a></li>
               <li><a href="#contact-us">Contact Us</a></li>
            </ul>
            <button class="nav-toggler"><span></span></button>
         </nav>
         <?php endif; ?>

         <?php
         if( !wp_is_mobile() ) :
         $navType = get_field('vcl-pagetype');
         if( $navType == "hire" ){ 
         ?>
          <nav class="site-navbar">
            <ul>
               <li><a href="#services">Services</a></li>
               <li><a href="#hiring-process">Hiring Process</a></li>
               <li><a href="#partners-awards">Partners & Awards</a></li>
               <li><a href="#contact-us">Contact Us</a></li>
            </ul>
            <button class="nav-toggler"><span></span></button>
         </nav>
         <?php 
         }
         
         if( $navType == "development" ){ 
         ?>
          <nav class="site-navbar">
            <ul>
               <li><a href="#services">Services</a></li>
               <li><a href="#engagement-options">Engagement Options</a></li>
               <li><a href="#partners-awards">Partners & Awards</a></li>
               <li><a href="#contact-us">Contact Us</a></li>
            </ul>
            <button class="nav-toggler"><span></span></button>
         </nav>   
         <?php } 
         endif;
         ?>
        <?php endif; ?>
      </div>
   </div>
</header>
<?php } ?>