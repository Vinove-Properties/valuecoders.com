<?php 
if( 
is_page_template( 'page-templates/tpl-version2.0.php' ) || 
is_page_template( 'page-templates/tpl-version4.0.php' ) ||
is_page_template( 'page-templates/tpl-version6.0.php' )
){ 
$pType         = get_field('epage-type');
$faddress      = get_field('foo-address');
$hasfAddress   = ( isset( $faddress ) && ($faddress == 'yes') ) ? true : false;
?>
<section class="contact-us-section <?php echo ( $pType == "type2" ) ? " for-slider-footer " : ""; ?> padding-t-150 
<?php echo ( $hasfAddress === true ) ? "padding-b-60" : "padding-b-150" ?>">
<?php
require_once 'assets-v2/include/contact-form.php';
if( $hasfAddress === true ) : 
$usAddr     = get_field('uk-addr');
$isUKAddr   = (isset($usAddr) && ($usAddr == 'yes')) ? true : false;   
?>
<div class="footer-sec margin-t-60">
  <?php if( $isUKAddr === true ){ ?>
   <div class="footer-top address-sec">
    <div class="container">
      <div class="dis-flex">
      <div class="flex-4">
      <p><strong>Our Offices:</strong></p>
      </div>
      <div class="flex-4">
      <p><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/us-flag.svg" alt="Valuecoders" width="33" height="24"><strong>US</strong></p>  
      <p>5900 Balcones Drive, STE 100, Austin, TX 78731, USA</p>
      </div>
      <div class="flex-4">
      <p><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/uk-flag.svg" alt="Valuecoders" width="33" height="24"><strong>UK</strong></p>    
      <p>167-169 Great Portland Street, 5th Floor, London W1W 5PF, UK</p>
      </div>
      <div class="flex-4">
      <p><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/india-flag.svg" alt="Valuecoders" width="33" height="24"><strong>INDIA</strong></p>  
      <p>1001, 10th Floor, Tower-B, Unitech Cyber Park, Sector - 39, Gurgaon, Haryana, India- 122001</p>
      </div>
      <div class="flex-4">
      <p><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/india-flag.svg" alt="Valuecoders" width="33" height="24"><strong>INDIA</strong></p>  
      <p>3rd Floor, Fusion Square, 5A & 5B, Sector 126, Noida 201303, UP, India</p>
      </div>
      </div>
    </div>
   </div>
  <?php }else{ ?>
  <div class="footer-top">
  <div class="container">
    <div class="dis-flex">
      <div class="flex-4">
        <p><strong>Our Offices:</strong></p>
      </div>
      <div class="flex-4">
        <p><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/uae-flag.svg" alt="Valuecoders" width="33" height="24"><strong>UAE</strong></p>
        <p>541, 8W, Level 5, Dubai Airport Free Zone, Dubai, United Arab Emirates</p>
      </div>
      <div class="flex-4">
        <p><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/india-flag.svg" alt="Valuecoders" width="33" height="24"><strong>INDIA</strong></p>
        <p>1001, 10th Floor, Tower-B, Unitech Cyber Park, Sector - 39, Gurgaon, Haryana, India- 122001</p>
      </div>
      <div class="flex-4">
        <p><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/india-flag.svg" alt="Valuecoders" width="33" height="24"><strong>INDIA</strong></p>
        <p>3rd Floor, Fusion Square, 5A & 5B, Sector 126, Noida 201303, UP, India</p>
      </div>
    </div>
  </div>
  </div>
  <?php } ?>
</div>
<?php endif; ?>
</section>
<div class="footer-section">
<div class="container">
   <span class="copy copy-txt-row">
      Copyright &copy; 2004 - <?php echo date("Y"); ?>. All Rights Reserved. <a href="https://www.valuecoders.com/">ValueCoders.com</a> | <a href="https://www.valuecoders.com/privacy-policy">Privacy Policy</a>
   </span>
</div>
</div>
<?php }elseif(is_page_template( 'page-templates/tpl-version4.12.php' )){ ?>
<!-- footer Section -->
   <?php 
   $cBanner = get_field('rm-ctabanner');
   if( isset($cBanner['is_enable']) && ($cBanner['is_enable'] == "yes") ) :
   ?>
   <section class="ready-move padding-t-70 padding-b-70">
   <div class="container">
   <div class="head-txt text-center">
   <h2><?php echo $cBanner['text']; ?></h2>
   <a class="yellow-btn pop-up margin-t-50" onclick="showPopFormOp();" href="javascript:void(0);"><?php echo $cBanner['cta-txt']; ?></a>
   </div>
   </div>
   </section>
   <?php endif; ?> 
   <div class="footer-section">
   <div class="container">
     <span class="copy">Copyright &copy; 2004 - <?php echo date("Y"); ?>. All Rights Reserved. ValueCoders.com</span>
   </div>
   </div>
   <!--Footer Section End-->
<script>
// Award section Slider
let hasHomeaslder = document.getElementById("hasHome-award-slider");
if (hasHomeaslder) {
   window.addEventListener("load", function (){
   document.querySelector(".home-award-slider .glider").addEventListener("glider-slide-visible", function (event) {
   var glider = Glider(this);
   });
   window._ = new Glider(document.querySelector(".home-award-slider .glider"), { slidesToShow: 1, slidesToScroll: 1, 
   draggable: true, scrollLock: false, dots: ".home-award-slider .dots", dragDistance: false });
 });
}
</script>    
<?php }elseif( is_page_template( 'page-templates/tpl-ppcmanagement.php' ) ){ ?>
<div class="footer-section">
   <div class="container">
     <span class="copy">Copyright &copy; 2004 - <?php echo date("Y"); ?>. All Rights Reserved. ValueCoders.com</span>
   </div>
</div>
<?php
get_template_part( 'template-parts/ppcmgt', 'leadform' );
get_template_part( 'template-parts/ppc', 'orderform' );
get_template_part( 'template-parts/ppc', 'report' );
}else{ ?>
<footer class="home-footer">
         <div class="countries-no">
            <div class="row">
               <div class="col-lg-12">
                  <ul>
                     <li><h6>Email</h6>sales@valuecoders.com</li>
                     <li><h6>Whatsapp</h6>+917042020782</li>
                     <li><h6>India</h6>+917042020782</li>
                     <li><h6>USA</h6>(415) 230-0123</li>
                     <li><h6>UK</h6>020 3239 2299</li>
                     <li><h6>Aus</h6>(02) 8005 8080</li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="copyrightRow">
            <div class="row">
               <div class="col-lg-12 col-xl-5 copy-txt-row"><p>Copyright &copy; 2004 - <?php echo date('Y'); ?>. All Rights Reserved. <a href="https://www.valuecoders.com/">ValueCoders.com</a> | <a href="https://www.valuecoders.com/privacy-policy">Privacy Policy</a></p></div>
               <?php /* ?>
               <div class="col-lg-6 col-xl-4">
                  <div class="social-col">
                     <a href="https://www.facebook.com/ValueCoders" target="_blank">
                     <i class="fa fa-facebook" aria-hidden="true"></i>
                     </a>
                     <a href="https://twitter.com/ValueCoders" target="_blank">
                     <i class="fa fa-twitter" aria-hidden="true"></i>
                     </a>
                     <a href="https://www.linkedin.com/company/valuecoders" target="_blank">
                     <i class="fa fa-linkedin" aria-hidden="true"></i>
                     </a>
                     <a href="https://www.instagram.com/valuecodersofficial_/?igshid=qfk286mq0wee" target="_blank">
                     <i class="fa fa-instagram" aria-hidden="true"></i>
                     </a>
                     <a href="https://www.youtube.com/channel/UCCnijyLczGPUGI8aBkK3pTw?sub_confirmation=1" target="_blank">
                     <i class="fa fa-youtube" aria-hidden="true"></i>
                     </a>
                  </div>
               </div>
               <?php */ ?>
            </div>
         </div>
      </footer>
<?php } ?>      
<?php wp_footer(); ?>
<script type="text/javascript" src='https://crm.zoho.com/crm/javascript/zcga.js'> </script>
<style>
.copy-txt-row a{text-decoration:none; color:#6f6f6f;}
.copyrightRow .copy-txt-row a{color:#928f8f;}
.copy-txt-row a:hover{text-decoration:underline;}
</style>
</body>
</html>