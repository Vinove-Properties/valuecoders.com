<?php
/*
Template Name: Contact Page - V9 Template
*/ 
get_header();
?>
<div class="contact-wrap">
<section class="contact-us-section full-width-form padding-b-150">
	<div class="container">
		<div class="dis-flex form-outer">
		<div class="form-left">
		<div class="bg-voilet">
			<div class="form-box-outer right-box" style="padding-top:100px;">
				<div class="head-txt">
					<div class="logo-box"><a href="<?php bloginfo('url'); ?>"></a></div>
					<div class="head-box">
					<h1>Get In Touch</h1>
					<p>Our consultants will respond back within 8 business hours or less.</p>
					</div>
				</div>
			<form action="<?php bloginfo('url'); ?>/sendmail1.php" enctype="multipart/form-data" method="POST" id="contact-form-section" onsubmit="vcCmnFormValidation(); return false;"  style="margin-top:40px;">
					<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
					<div id="vc-fstep1" class="step-one version-8">
					<!-- <div class="step-head active">
						<div><h2 id="uinfo">Your Information</h2>
						<span>(Step 1 of 2)</span></div>
						<span class="req-block">Required Fields*</span>
					</div>	 -->

					<div class="form-inner dis-flex">
						<div class="form-text-cont">
							<div class="lbl-row">
								<label for="cont_name">Full Name *</label>								
							</div>
							<div class="user-input">
								<input type="text" id="cont_name" placeholder="Enter your full name" class="input-field" value="" maxlength="50" name="user-name" />
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont">
							<div class="lbl-row">
								<label for="cont_email">Email Address *</label>
								
							</div>							
							<div class="user-input">
								<input type="text" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$" class="input-field" value="" maxlength="50" name="user-email" id="cont_email" placeholder="Enter your email address" />
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont">
							<div class="lbl-row">
								<label for="cont_country">Country *</label>
							</div>
							<div class="user-input">
								<input type="text" class="input-field" id="cont_country" value="" name="user-country" maxlength="50" autocomplete="off" 
								placeholder="Select your country">
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont">
							<div class="lbl-row">
								<label for="cont_phpne">Phone Number (Optional)</label>
							</div>
							<div class="user-input">
								<input id="cont_phpne" type="tel" maxlength="30" name="user-phone" class="input-field flg-input" 
								placeholder="Enter your phone number">
								<small>Error Message</small>
							</div>
						</div>	
						<div class="form-text-cont step-one-select">
							<div class="user-input">
								<label for="select-wehelp">How can we help? *</label>
								<select class="wide selectize" name="we-help" id="select-wehelp" style="display:none;">
									<option value="">Select</option>
									<option value="Software Development" title="For custom software development and fixed cost projects.">Software Development</option>	
									<option value="Team Extension" title="Augment your team with expert software engineers.">Team Extension (Staff Augmentation)</option>
									<option value="Dedicated Software Team" title="Dedicated autonomous software product engineering teams comprising of multiple skills.">Dedicated Software Team</option>
									<option value="Other Technology Needs" title="Any other world-class technology solution that you may need.">Other Technology Needs</option>
									<option value="career" title="Join the team of Experts & work in ValueCoders.">Looking for a Job/Careers</option>
									<option value="None of the above" title="Connect with our business consultant to discuss your requirements.">None of the above</option>
								</select>
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont width-full">
							<div class="lbl-row-new">
								<label id="lbl-requirement">Requirement*</label>
							</div>
							
							<div class="user-input">
								<textarea class="input-field comment-input" id="user-req" name="user-req"></textarea>
								<small>Error Message</small>
								<div class="drop-input attachment_brw" id="uploadcontact">
								<div id="dropcontact"></div>
								</div>
								<div id="drop-area">
								<input type="file" name="files[]" id="fileElem" multiple accept="image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,.txt" onchange="handleFiles(this.files)">
								<button class="button" id="browse-btn" type="button" 
								onclick="document.getElementById('fileElem').click()">BROWSE | DROP FILES HERE</button>
								<input type="hidden" name="up-counter" id="uplcounter" value="0">
								<progress style="display:none;" id="progress-bar" max=100 value=0></progress>			
								</div>
							</div>
							<div id="gloader" class="gal-loader">
								<div class="loader"></div>
								<div id="gallery"></div>
							</div>
							<p id="file-type-error"></p>
						</div>
						<div class="user-input checkout">
							<input type="hidden" name="Uploadedfilename" id="Uploadedfilename" value="">
							<input type="hidden" name="frmqueryString" value="<?php the_permalink(); ?>">
							<input type="hidden" name="page_url" value="<?php the_permalink(); ?>">
							<input type="hidden" name="vform-type" value="contact">
							<input type="hidden" id="e-ticket-id" name="e-ticket-id" value="">
							<input type="submit" id="submitButton" class="checkout-submit" value="Send your request" />
						</div>

						</div>
						<br>
						<br>
						</div><!--//Setp 1 Ends Here -->

						<?php /* ?>
						<div id="vc-fstep2" class="step-two" style="display:none;">					
						<div class="nda-button">
						<input type="checkbox" id="ndaButton" name="nda" value="Send me NDA">
						<label for="ndaButton">Send me NDA
						<span class="info-box">
						<em>i</em>
						<span class="info">A Non Disclosure Agreement is a legally binding contract that establishes a confidential relationship. The party or parties signing the agreement agree that sensitive information they may obtain will not be made available to any others. An NDA may also be referred to as a confidentiality agreement. (credit: Investopedia)</span>
						</span>
						</label>
						</div>

						<p class="note">Note : We Respect Your Privacy! Your details will never be shared with anyone for marketing purposes.</p>
						</div><!-- //Step - 2 #Ends -->
						<?php */ ?>
				</form>
			</div>
		</div>
		</div><!-- .form-left -->
		<div class="slider-right od-row">
		<span class="client-head">TRUSTED BY STARTUPS AND FORTUNE 500 COMPANIES</span>
		<?php 
		if( isset( $_GET['theme'] ) &&  ($_GET['theme'] == "light") ){ ?>	
		<picture>
        <img src="<?php bloginfo('template_url'); ?>/images/contact-client-logo-image-light.svg" class="Client Logo" width="364" height="274" alt="ValueCoders">
		</picture>
		<?php }else{ ?>
		<picture>
		<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/contact-client-logo-image.svg" class="Client Logo" width="364" height="274" loading="lazy" alt="ValueCoders">
		</picture>	
		<?php }
		?>		
		</div>	
	</div><!-- dis-flex form-outer -->	
</div>	
</section>	

<section class="form-footer-section">
<div class="container">
<div class="form-footer dis-flex">
  <div class="mid-block dis-flex">
    <div class="flex-3">
      <a href="tel:+918882108080"><span class="title">INDIA</span> +91 888 210 8080 (Sales)</a>
      <a href="tel:+917042020782" style="margin-top: 5px; ">+91 704 202 0782 (HR)</a>
    </div>
    <div class="flex-3">
      <a href="tel:+442032392299"><span class="title">UK</span> +44 20 3239 2299</a>       
    </div>
	<div class="flex-3">
      <!--<a href="tel:+97145232446"><span class="title">UAE</span> +971 4-523- 2446</a>-->
      <a href="https://wa.me/918882108080"><span class="title">WhatsApp</span> +91 888 210 8080</a>
    </div>
    <div class="flex-3">
      <a href="tel:+14152300123"><span class="title">USA</span> +1 415 230 0123</a>            
    </div>
    <div class="flex-3">
      <a href="tel:+61280058080"><span class="title">AUS</span> +61 2 8005 8080</a>            
    </div>
	<div class="flex-3">
      <!--<a href="https://wa.me/918882108080"><span class="title">WhatsApp</span> +91 888 210 8080</a>-->            
    </div>
  </div>
  <div class="last-block">
    <ul class="faddress-col">
      <li><strong>Gurugram : </strong>10th Floor, Tower-B, Unitech Cyber Park, Sector - 39, Gurugram, Haryana-122001</li>
      <li><strong>Noida :</strong> 11th Floor, Max Square, Noida-Greater Noida Expy, Sector 129, Noida, Uttar Pradesh 201304</li>
      <li><strong>US :</strong> 5900 Balcones Drive, STE 100, Austin , TX 78731, USA</li>
      <li><strong>UK :</strong> 167-169 Great Portland Street, 5th Floor, London W1W 5PF, United Kingdom</li>
      <li><strong>UAE :</strong> 541, 8W, Level 5, Dubai Airport Free Zone, Dubai, United Arab Emirates</li>
    </ul>
  </div>
</div>
</div>
</section>
</div>
<?php get_footer(); ?>