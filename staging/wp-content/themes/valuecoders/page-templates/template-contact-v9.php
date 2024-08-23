<?php
/*
Template Name: Contact Page - V9 Template
*/ 
$queryLink = vcGetThisPageUrl();
get_header();
?>
<div class="contact-wrap">
  <section class="contact-us-section full-width-form padding-b-150">
    <div class="container">
      <div class="dis-flex form-outer">
        <div class="form-left">
          <div class="bg-voilet">
            <div class="form-box-outer right-box">
              <div class="lf-top">
                <div class="head-txt">
                  <div class="logo-box"><a href="https://www.valuecoders.com"></a></div>
                  <div class="head-box">
                    <h1>Get In Touch</h1>
                    <p>Our team will get back to you within 8 business hours or less.</p>
                  </div>
                </div>
                <div class="lf-right">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cnbnr-02.svg" alt="pixel" width="104" height="92">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/lf-02.svg" alt="pixel" width="97" height="95">
                </div>
              </div>
              <div class="soc-box dis-flex items-center">
                <!-- 
                  <a href="https://calendly.com/valuecoders/dedicated-teams" target="_blank"><i><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/soc-01.svg" alt="valuecoders" width="20" height="20"></i><span>Book A Call</span></a> 
                -->

                <a href="https://wa.me/918882108080" target="_blank"><i><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/soc-02.svg" alt="valuecoders" width="20" height="20"> </i><span>WhatsApp</span></a>
                <a href="mailto:sales@valuecoders.com" target="_blank"><i><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/soc-03.svg" alt="valuecoders" width="20" height="20"></i><span>Email us</span></a>
              </div>
              <form action="<?php bloginfo('url'); ?>/sendmail1.php" enctype="multipart/form-data" method="POST" id="contact-form-section" onsubmit="vcCmnFormValidation(); return false;">
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
                        <label for="select-wehelp">Select your service*</label>
                        <select class="wide selectize" name="we-help" id="select-wehelp" style="display:none;">
                          <option value="">Select</option>
                          <option value="Software Development" title="For custom software development and fixed cost projects.">Software Development</option>
                          <option value="Team Extension" title="Augment your team with expert software engineers.">Team Extension (Staff Augmentation)</option>
                          <option value="Dedicated Software Team" title="Dedicated autonomous software teams comprising of multiple skills.">Dedicated Software Team</option>
                          <option value="Other Technology Needs" title="Any other world-class technology solution that you may need.">Other Technology Needs</option>
                          <option value="career" title="Join the team of experts & work in ValueCoders.">Looking for a Job/Careers</option>
                          <option value="None of the above" title="Connect with our business consultant to discuss your requirements.">None of the Above</option>
                        </select>
                        <small>Error Message</small>
                      </div>
                    </div>
                    <div class="form-text-cont width-full">
                      <div class="lbl-row-new">
                        <label id="lbl-requirement">
                          <div class="info-wrap">
                            How can we help?*
                            <!-- <div class="info-tip">
                              <div class="info-content">
                                <p>How Can We Help with software Development?
                                </p>
                                <p>How to help with team Extension?</p>
                                <p>Help wit hiring Dedicated Software Team?</p>
                              </div>
                              </div> -->
                          </div>
                        </label>
                      </div>
                      <div id="cf-requirement" class="user-input">
                        <textarea class="input-field comment-input" id="user-req" placeholder="" 
                          name="user-req"></textarea>
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
                      <input type="hidden" name="page_url" value="<?php echo $queryLink; ?>">
                      <input type="hidden" name="vform-type" value="contact">
                      <input type="hidden" id="e-ticket-id" name="e-ticket-id" value="">
                      <input type="submit" id="submitButton" class="checkout-submit  nxt-btn" value="Send Your Query" />
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- .form-left -->
        <div class="right-contactbox">
          <p>Trusted by startups and Fortune 500 companies</p>
          <div class="row-box">
            <div class="col-box dis-flex">
              <div class="icon"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-01.svg" alt="pixel" width="40" height="40"></div>
              <div class="desp">
                <h4>19+ years of experience</h4>
                <p>We can handle projects of all complexities.</p>
              </div>
            </div>
            <div class="col-box dis-flex">
              <div class="icon"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-02.svg" alt="pixel" width="40" height="40"></div>
              <div class="desp">
                <h4>2500+ satisfied customers</h4>
                <p>Startups to Fortune 500, we have worked with all.</p>
              </div>
            </div>
            <div class="col-box dis-flex">
              <div class="icon"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-03.svg" alt="pixel" width="40" height="40"></div>
              <div class="desp">
                <h4>675+ in-house team</h4>
                <p>Top 1% industry talent to ensure your digital success.</p>
              </div>
            </div>
          </div>
         
          <div class="client-section">
            <div class="client-row">
              <div class="client-stack">
                <ul>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl01.svg" alt="Valuecoders" width="55" height="22">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl02.svg" alt="Valuecoders" width="78" height="22">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl03.svg" alt="Valuecoders" width="80" height="13">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl04.svg" alt="Valuecoders" width="81" height="20">
                    </picture>
                  </li>
                  <li>
                    <picture>
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl05.svg" alt="Valuecoders" width="86" height="28">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl06.svg" alt="Valuecoders" width="82" height="29">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl07.svg" alt="Valuecoders" width="76" height="17">
                    </picture>
                  </li>
                  
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl08.svg" alt="Valuecoders" width="77" height="19">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl09.svg" alt="Valuecoders" width="86" height="14">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl10.svg" alt="Valuecoders" width="72" height="36">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl11.svg" alt="Valuecoders" width="81" height="21">
                    </picture>
                  </li>
                  <li>
                    <picture>
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl12.svg" alt="Valuecoders" width="67" height="25">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl13.svg" alt="Valuecoders" width="82" height="20">
                    </picture>
                  </li>
                  <li>
                    <picture>
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl144.svg" alt="Valuecoders" width="82" height="20">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl15.svg" alt="Valuecoders" width="85" height="22">
                    </picture>
                  </li>
              
                </ul>

              </div>
            </div>
            <!--<div class="client-row">
              <div class="client-stack award-animate-slide-to-right hover:pause">
              <ul>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl08.svg" alt="Valuecoders" width="77" height="19">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl09.svg" alt="Valuecoders" width="86" height="14">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl10.svg" alt="Valuecoders" width="72" height="36">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl11.svg" alt="Valuecoders" width="81" height="21">
                    </picture>
                  </li>
                  <li>
                    <picture>
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl12.svg" alt="Valuecoders" width="67" height="25">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl13.svg" alt="Valuecoders" width="82" height="20">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="<?php bloginfo('template_url'); ?>/v4.0/lazy" src="images/cont-cl14.svg" alt="Valuecoders" width="81" height="22">
                    </picture>
                  </li>
                  <li>
                    <picture>
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-cl15.svg" alt="Valuecoders" width="85" height="22">
                    </picture>
                  </li>
                </ul>
              </div>
            </div>-->
            
          </div>
          
        </div>
      </div>
      <!-- dis-flex form-outer -->	
    </div>
  </section>
  <?php //get_template_part('include/testimonials', 'v4.0'); ?>
  <section class="address-details bg-light padding-t-120 padding-b-120">
    <div class="container">
      <div class="head-txt text-center">
        <h2>Serving Clients in 38+ Countries</h2>
        <p>We are making an impact worldwide with our global presence and exceptional software solutions.
        </p>
      </div>
      <div class="dis-flex add-flex">
        <div class="left-column">
          <div class="flex-wrap">
            <div class="dis-flex phone-box">
              <div class="country"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/vflag-01.svg" alt="valuecoders" width="25" height="25">India</div>
              <div class="phone"><a href="tel:+918882108080">+91 888 210 8080 <span>(Sales)</span></a>
                <a href="tel:+917042020782">+91 704 202 0782 <span>(HR)</span></a>
              </div>
            </div>
          </div>
          <div class="flex-wrap">
            <div class="dis-flex phone-box">
              <div class="country"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/vflag-02.svg" alt="valuecoders" width="25" height="25">USA</div>
              <div class="phone"><a href="tel:+1 415 230 0123">+1 415 230 0123</a>
              </div>
            </div>
          </div>
          <div class="flex-wrap">
            <div class="dis-flex phone-box">
              <div class="country"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/vflag-03.svg" alt="valuecoders" width="25" height="25">UK</div>
              <div class="phone"><a href="tel:+44 20 3239 2299">+44 20 3239 2299</a>
              </div>
            </div>
          </div>
          <div class="flex-wrap">
            <div class="dis-flex phone-box">
              <div class="country"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/vflag-04.svg" 
                alt="valuecoders" width="25" height="25">UAE</div>
              <div class="phone"><a href="https://wa.me/971544954255">+971 544954255 <span>(WhatsApp)</span></a>

              </div>
            </div>
          </div>
          <div class="flex-wrap">
            <div class="dis-flex phone-box">
              <div class="country"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/vflag-05.svg" alt="valuecoders" width="25" height="25">AUS</div>
              <div class="phone"><a href="tel:+61 2 8005 8080">+61 2 8005 8080</a>
              </div>
            </div>
          </div>
        </div>
        <div class="right-column">
          <div class="address-row dis-flex">
            <div class="address-col two-line">
              <span class="bold">Gurugram: </span>
              <p>10th Floor, Tower-B, Unitech Cyber Park, Sector - 39, Gurugram, Haryana- 122001</p>
            </div>
            <div class="address-col two-line">
              <span class="bold">Noida: </span>
              <p>11th Floor, Max Square, Noida-Greater Noida Expy, Sector 129, Noida, Uttar Pradesh 201304</p>
            </div>
          </div>
          <div class="address-row">
            <div class="address-col">
              <span class="bold">USA:  </span>
              <p>5900 Balcones Drive, STE 100, Austin , TX 78731, USA</p>
            </div>
          </div>
          <div class="address-row">
            <div class="address-col">
              <span class="bold">UK: </span>
              <p>167-169 Great Portland Street, 5th Floor, London W1W 5PF, United Kingdom</p>
            </div>
          </div>
          <div class="address-row">
            <div class="address-col">
              <span class="bold">UAE: </span>
              <p>541, 8W, Level 5, Dubai Airport Free Zone, Dubai, United Arab Emirates</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>