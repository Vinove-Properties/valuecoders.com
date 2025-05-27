<?php
/*
Template Name: Cost - Calculators Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="cost-banner" style="padding-top:20px;">
  <div class="container">
    <?php /*while( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile; */ ?>
  </div>
</section>
<section class="vc-cost-calc">
  <div class="container">
    <div class="cost-wrap">
    <div class="cost-left">
      <div class="head-text"><?php the_field('calc-content'); ?></div>
      <div class="img-wrap">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/cost-image.svg" alt="valuecoders" width="384" height="325">
      </div>
    </div>
    <div class="cost-right">
    <div id="elm-thanku" class="sub-response" style="display:none;">
      <h2>Thank you for contacting us.</h2>
      <p>Our team will analyze the requirements and get back to you with the cost estimate, shortly!</p>
      <p>Do you want to learn more about ValueCoders?</p>
      <ul>
        <li>4200+ projects successfully implemented: <a href="https://www.valuecoders.com/case-studies/">check out our portfolio</a></li>
        <li>2500+ happy clients: see what they have to <a href=" https://www.valuecoders.com/testimonials">say about us</a></li>
        <li>Managing a community of 10000+ tech enthusiasts and learners: <a href=" https://www.valuecoders.com/blog">check our blog</a></li> 
      </ul>
    </div>  
    <form id="cost-calc-form" style="display:block;">
    <div class="steps-navigation" id="stepsNav"></div>
    <div id="calculatorForm"></div>
    <div class="step last-step" id="stepFinal">
    <h3>Your Contact Data</h3>
    <div class="submit-form">
      <div class="user-input">
        <label>
          <span class="fname">Full Name *</span>
          <input type="text" name="uname" id="cl-name" value="" data-err="Please Fill Name">
          <small class="error-message"></small>
        </label>
      </div>

      <div class="user-input">
        <label>
          <span class="fname">Company Name *</span>
          <input type="text" name="company" id="cl-company" value="">
          <small class="error-message"></small>
        </label>  
      </div>              

      <div class="user-input">
        <label>
          <span class="fname">Work Email *</span>
          <input type="email" name="email" id="cl-email" value="" data-err="Please Fill Email">
          <small class="error-message"></small>
        </label>  
      </div>           
      
      <div class="user-input">   
        <label>
          <span class="fname">Phone Number (Optional):</span>
          <input type="text" name="phone" value="" id="cl-phone">
          <small class="error-message"></small>
        </label>
      </div>
      <div class="user-input group-com">
        <div class="row">   
          <div class="labl">Preferred way of communication:</div>
          <label><input type="radio" name="communication" value="Any" checked>Any</label>
          <label><input type="radio" name="communication" value="Email">Email</label>
          <label><input type="radio" name="communication" value="Phone">Phone</label>
        </div>
      </div>
    </div>
    </div>
    <div class="button-group">
    <button type="button" id="prevBtn" onclick="changeStep(-1)" class="hidden">Back</button>
    <button type="button" id="nextBtn" onclick="changeStep(1)">Next</button>
    <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
    <button type="submit" id="submitBtn" class="hidden">Finish</button>
    </div>    
    </form>
    <div id="sub-outpur"></div>
    </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>