<?php
/*
Template Name: Cost - Calculators Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="cost-banner">
  <div class="container">
    <?php while( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile; ?>
  </div>
</section>
<section class="vc-cost-calc">
  <div class="container">


   <div class="cost-wrap">


    <div class="cost-left">
<h2>Estimate The Cost of Telecom Software Development </h2>
<p>Answer a few simple questions about the IT consulting support you need. We will analyze your needs and provide a tailored cost estimation for your case.</p>
<div class="img-wrap">
<img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/cost-image.svg" alt="valuecoders" width="384" height="325">
</div>


    </div>



    <div class="cost-right">
    <form id="cost-calc-form">
      <div class="steps-navigation" id="stepsNav"></div>
      <div id="calculatorForm"></div>
      <div class="step last-step" id="stepFinal">
        <h3>Your Contact Data</h3>

        <div class="submit-form">

        <div class="user-input">

        <label><span class="fname">Full Name:</span>
        <input type="text" name="uname" id="fullName" value="Jhon Doe" required>
        <span class="error-msg" id="fullNameError">Please fill in the required fields.</span>
        </label>

</div>

<div class="user-input">

        <label><span class="fname">Company Name:</span>
        <input type="text" name="company" id="companyName" value="Valuecoders" required>
        <span class="error-msg" id="companyNameError">Please fill in the required fields.</span>
        </label>  
</div>              

<div class="user-input">
        <label><span class="fname">Work Email:</span>
        <input type="email" name="email" id="workEmail" value="jhon.doe@yopmail.com" required>
        <span class="error-msg" id="workEmailError">Please fill in the required fields.</span>
        </label>  
</div>           
<div class="user-input">   
        <label><span class="fname">Phone Number:</span><input type="text" name="phone"  value="0000000000" id="phoneNumber"></label>

</div>

</div>


      </div>
      <div class="button-group">
        <button type="button" id="prevBtn" onclick="changeStep(-1)" class="hidden">Back</button>
        <button type="button" id="nextBtn" onclick="changeStep(1)">Next</button>
        <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
        <button type="submit" id="submitBtn" class="hidden">Finish</button>
      </div>
      <div id="sub-outpur"></div>
    </form>
</div>
</div>


  </div>
</section>




<?php get_footer(); ?>
