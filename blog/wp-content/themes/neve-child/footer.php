<?php
  /**
   * The template for displaying the footer
   *
   * Contains the closing of the "wrapper" div and all content after.
   *
   * @package Neve
   * @since   1.0.0
   */
  do_action( 'neve_before_primary_end' );
  ?>
</main><!--/.neve-main-->
<?php do_action( 'neve_after_primary' ); ?>
<?php
  /*
  if ( apply_filters( 'neve_filter_toggle_content_parts', true, 'footer' ) === true ) {
    neve_before_footer_trigger();
    do_action( 'neve_do_footer' );
    neve_after_footer_trigger();
  }
  */
  ?>
<?php 
require_once 'wpinstance-form.php';
?>  
<footer class="footer bg-jacarta">
  <div class="container">
    <div class="dis-flex">
      <div class="footer-left">
        <span class="copy">Copyright © 2004 - 2022. All Rights Reserved. ValueCoders.com</span>
        <span class="footer-link"><a href="https://www.valuecoders.com/partnership-program">Become a Partner</a> <span class="divider">|</span> <a href="https://www.valuecoders.com/privacy-policy">Privacy Policy</a> <span class="divider">|</span> <a href="https://www.valuecoders.com/terms-of-service">Terms of Service</a> <span class="divider">|</span> <a href="https://www.valuecoders.com/why-india">Why India?</a> <span class="divider">|</span> <a href="https://www.valuecoders.com/faq">FAQ</a> <span class="divider">|</span> <a href="https://www.valuecoders.com/disclaimer">Disclaimer</a> <span class="divider">|</span> <a href="https://www.valuecoders.com/gdpr-compliance">GDPR</a></span>
        <span class="theme-setting nav-toggle"><span class="theme">Theme</span> <span class="lighter-theme" id="themeBtn"><i class="icon icon1"></i> Light</span> <span class="divider">|</span> <span class="dark-theme" id="themeDarkBtn"><i class="icon icon2"></i> Dark</span> <span class="divider">|</span> <span class="auto-theme" id="themeAuto"><i class="icon icon3"></i> Auto</span></span>
      </div>
      <div class="footer-last">
        <a href="https://www.facebook.com/ValueCoders"><i class="social-icon facebook"></i></a>
        <a href="https://twitter.com/ValueCoders"><i class="social-icon twitter"></i></a>
        <a href="https://www.linkedin.com/company/valuecoders"><i class="social-icon linked-in"></i></a>
        <a href="https://www.instagram.com/valuecodersofficial_/?igshid=qfk286mq0wee"><i class="social-icon insta"></i></a>
        <a href="https://www.youtube.com/channel/UCCnijyLczGPUGI8aBkK3pTw?sub_confirmation=1"><i class="social-icon you-tube"></i></a>
      </div>
    </div>
  </div>
</footer>
</div><!--/.wrapper-->
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/custom.js"></script>
</body>
</html>