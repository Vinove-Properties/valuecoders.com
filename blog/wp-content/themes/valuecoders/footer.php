</main>
<?php //get_template_part('inc/cmn', 'footer'); ?>

<section class="experts-talk-first-section">
  <div class="container">
    <div class="head-txt text-center">
      <h2>Got a Project in Mind?</h2>
      <p>Let's embark on a journey to transform your idea into a compelling digital presence.</p>
    </div>
    <div class="cta-wrap margin-t-50  justify-center">
      <div class="cta-btn">
        <a href="https://www.valuecoders.com/contact">
        Talk To Our Experts
        <span class="arrow-wrap">
        <span class="arrow primera"></span>
        <span class="arrow segunda next"></span>
        <span class="arrow last"></span>
        </span>
        </a>
      </div>
    </div>
  </div>
</section>

<footer class="footer bg-jacarta">
  <div class="container">
    <div class="dis-flex">
      <div class="footer-left">
          <?php
            $copyRight = "&copy;"; 
            if( is_user_logged_in() ){
            $copyRight = "<a href='".get_edit_post_link()."'>&copy;</a>";
            }
            ?>
        <span class="copy">Copyright <?php echo $copyRight; ?> 2004 - <?php echo date('Y'); ?>. All Rights Reserved. A Vinove Company.</span>
        <span class="footer-link">
        <a href="https://www.valuecoders.com/partnership-program">Become a Partner</a> <span class="divider">|</span>
        <a href="https://www.valuecoders.com/privacy-policy">Privacy Policy</a> <span class="divider">|</span>
        <a href="https://www.valuecoders.com/terms-of-service">Terms of Service</a> <span class="divider">|</span>
        <a href="https://www.valuecoders.com/why-india">Why India?</a> <span class="divider">|</span>
        <a href="https://www.valuecoders.com/faq">FAQ</a> <span class="divider">|</span>
        <a href="https://www.valuecoders.com/disclaimer">Disclaimer</a> <span class="divider">|</span>
        <a href="https://www.valuecoders.com/gdpr-compliance">GDPR</a>
        </span>
      </div>
      <div class="footer-last">
        <picture>
        <source type="image/webp" srcset="https://www.valuecoders.com/wp-content/themes/valuecoders/images/footer-iso-logo.webp">
        <source type="image/png" srcset="https://www.valuecoders.com/wp-content/themes/valuecoders/images/footer-iso-logo.png">
        <img loading="lazy" src="https://www.valuecoders.com/wp-content/themes/valuecoders/images/footer-iso-logo.png" 
        alt="Valuecoders" width="97" height="69">
        </picture>
        <a href="https://www.facebook.com/ValueCoders" target="_blank"><i class="social-icon facebook"></i></a>
        <a href="https://twitter.com/ValueCoders" target="_blank"><i class="social-icon twitter"></i></a>
        <a href="https://www.linkedin.com/company/valuecoders" target="_blank"><i class="social-icon linked-in"></i></a>
        <a href="https://www.instagram.com/valuecodersofficial_/?igshid=qfk286mq0wee" target="_blank"><i class="social-icon insta"></i></a>
        <a href="https://www.youtube.com/channel/UCCnijyLczGPUGI8aBkK3pTw?sub_confirmation=1" target="_blank"><i class="social-icon you-tube"></i></a>
      </div>
    </div>
  </div>
</footer>
<div class="popup-section">
<div id="intentPopup" class="popup-wrapper exit-intent-popup">
  <div class="popWrap">
    <div class="popup-content">
      <span class="closeicon" onclick="closeIntPopUp('intentPopup', false);">      
      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/cross-image.svg" alt="Valuecoders" width="11" height="11"></span>

      <h2>Stay With Us</h2>
      <h3>Are you looking for the perfect 
        partner for your next software project?
      </h3>
      <p>Let's discuss how we can bring your vision to life.</p>
      <div class="ctasec">
        <a href="https://www.valuecoders.com/contact" class="book-btn">Book a Free Consultation</a>
        <a href="javascript:void(0);" onclick="closeIntPopUp('intentPopup', true);" class="subscribe-btn">Subscribe to our newsletter</a>
      </div>
    </div>
  </div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>