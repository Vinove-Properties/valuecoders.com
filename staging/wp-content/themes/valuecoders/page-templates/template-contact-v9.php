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
            <div class="form-box-outer right-box">
              <div class="lf-top">
                <div class="head-txt">
                  <div class="logo-box"><a href="https://www.valuecoders.com"></a></div>
                  <div class="head-box">
                    <h1>Get In Touch</h1>
                    <p>Our consultants will respond back within 8 business hours or less.</p>
                  </div>
                </div>
                <div class="lf-right">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/lf-01.svg" alt="pixel" width="94" height="84">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/lf-02.svg" alt="pixel" width="95" height="84">
                </div>
              </div>
              <div class="soc-box dis-flex items-center">
                <a href="tel:+918882108080"><i><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/soc-01.svg" alt="valuecoders" width="20" height="20"></i>Book A Call</a>
                <a href="https://wa.me/918882108080"><i><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/soc-02.svg" alt="valuecoders" width="20" height="20"> </i>WhatsApp</a>
                <a href="mailto:sales@valuecoders.com"><i><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/soc-03.svg" alt="valuecoders" width="20" height="20"></i>Email us</a>
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
                      <input type="hidden" name="page_url" value="<?php the_permalink(); ?>">
                      <input type="hidden" name="vform-type" value="contact">
                      <input type="hidden" id="e-ticket-id" name="e-ticket-id" value="">
                      <input type="submit" id="submitButton" class="checkout-submit  nxt-btn" value="Send Now" />
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
          <div class="slide-logo  dis-flex items-center justify-sb" id="pxl-logoslider">
            <div class="container">
              <div class="dis-flex">
                <div class="logo-section">
                  <div class="logoslide">
                    <div class="glide__track" data-glide-el="track">
                      <div class="glide__slides">
                        <div class="glide__slide">
                          <picture>
                            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-client-logo.svg" width="" height="" alt="pixelcrayons">
                          </picture>
                        </div>
                        <div class="glide__slide">
                          <picture>
                            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/cont-client-logo.svg" width="" height="" alt="pixelcrayons">
                          </picture>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- dis-flex form-outer -->	
    </div>
  </section>
  <?php get_template_part('include/testimonials', 'v4.0'); ?>
  <section class="globe-around bg-light padding-t-120 padding-b-120">
    <div class="container">
      <div class="heading text-center">
        <h2>Serving Clients in 38+ Countries</h2>
        <p>We are making an impact worldwide with our global presence and exceptional software solutions.</p>
      </div>
      <div class="dis-flex  margin-t-80 row">
        <div class="flex-5">
          <div class="cont-full">
            <div class="box hover-ef">
              <a href="tel:+918882108080">
                <div class="flag-d">
                  <div class="img"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/flag-01.svg" alt="valuecoders" width="30" height="19"></div>
                  <div class="cont"><span>India</span></div>
                </div>
              </a>
            </div>
            <div class="detail-full">
              <div class="box">
                <div class="row-div">
                  <a href="https://wa.me/918882108080">
                    <div class="flag-d">
                      <div class="img">
                        <img class="wtsapp entered lazyloaded" loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/wtsapp.svg" alt="valuecoders" width="30" height="19">
                      </div>
                      <div class="cont"><span class="num">+91 888 210 8080</span></div>
                    </div>
                  </a>
                </div>
                <div class="row-div">
                  <a href="tel:+918882108080">
                    <div class="flag-d">
                      <div class="img">
                        <img class="entered lazyloaded" loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/phone.svg" alt="valuecoders" width="30" height="19">
                      </div>
                      <div class="cont"><span class="num">+91 888 210 8080</span></div>
                    </div>
                  </a>
                </div>
                <div class="row-div">
                  <div class="flag-d">
                    <div class="img">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/map-pin.svg" alt="valuecoders" width="14" height="19">
                    </div>
                    <div class="cont addrs"><span class="num">Gurugram : 10th Floor,
                      Tower-B, Unitech
                      Cyber Park, Sector - 39,
                      Gurugram, Haryana-
                      122001</span>
                    </div>
                  </div>
                </div>
                <div class="row-div">
                  <div class="flag-d">
                    <div class="img">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/map-pin.svg" alt="valuecoders" width="14" height="19">
                    </div>
                    <div class="cont addrs"><span class="num">Noida : 11th Floor, Max Square, Noida-Greater Noida Expy, Sector 129, Noida, Uttar Pradesh 201304</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex-5">
          <div class="cont-full">
            <div class="box hover-ef">
              <a href="tel:+14152300123">
                <div class="flag-d">
                  <div class="img"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/flag-02.svg" alt="valuecoders" width="30" height="19"></div>
                  <div class="cont addrs"><span>United States</span></div>
                </div>
              </a>
            </div>
            <div class="detail-full">
              <div class="box">
                <div class="row-div">
                  <a href="tel:+14152300123">
                    <div class="flag-d">
                      <div class="img">
                        <img class="wtsapp entered lazyloaded" loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/phone.svg" alt="valuecoders" width="30" height="19">
                      </div>
                      <div class="cont"><span class="num">+1 415 230 0123</span></div>
                    </div>
                  </a>
                </div>
                <div class="row-div">
                  <div class="flag-d">
                    <div class="img">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/map-pin.svg" alt="valuecoders" width="14" height="19">
                    </div>
                    <div class="cont addrs"><span class="num">5900 Balcones Drive, STE 100, Austin , TX 78731, USA</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex-5">
          <div class="cont-full">
            <div class="box hover-ef">
              <a href="tel:+442032392299">
                <div class="flag-d">
                  <div class="img">
                    <div class="img"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/flag-03.svg" alt="valuecoders" width="30" height="19"></div>
                  </div>
                  <div class="cont addrs"><span>United Kingdom</span></div>
                </div>
              </a>
            </div>
            <div class="detail-full">
              <div class="box">
                <div class="row-div">
                  <a href="tel:+442032392299">
                    <div class="flag-d">
                      <div class="img">
                        <img class="wtsapp entered lazyloaded" loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/phone.svg" alt="valuecoders" width="30" height="19">
                      </div>
                      <div class="cont"><span class="num">+44 20 3239 2299</span></div>
                    </div>
                  </a>
                </div>
                <div class="row-div">
                  <div class="flag-d">
                    <div class="img">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/map-pin.svg" alt="valuecoders" width="14" height="19">
                    </div>
                    <div class="cont addrs"><span class="num">167-169 Great Portland Street, 5th Floor, London W1W 5PF, United Kingdom</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex-5">
          <div class="cont-full">
            <div class="box hover-ef">
              <a href="#">
                <div class="flag-d">
                  <div class="img">
                    <div class="img"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/flag-04.svg" alt="valuecoders" width="30" height="19"></div>
                  </div>
                  <div class="cont addrs"><span>UAE</span> <span class="num"></span></div>
                </div>
              </a>
            </div>
            <div class="detail-full">
              <div class="box">
                <div class="row-div">
                  <div class="flag-d">
                    <div class="img">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/map-pin.svg" alt="valuecoders" width="14" height="19">
                    </div>
                    <div class="cont addrs"><span class="num">541, 8W, Level 5, Dubai Airport Free Zone, Dubai, United Arab Emirates</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex-5">
          <div class="cont-full">
            <div class="box hover-ef">
              <a href="tel:+61280058080">
                <div class="flag-d">
                  <div class="img"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/flag-05.svg" alt="valuecoders" width="30" height="19"></div>
                  <div class="cont addrs"><span>Australia</span></div>
                </div>
              </a>
            </div>
            <div class="detail-full">
              <div class="box">
                <div class="row-div">
                  <a href="tel:+61280058080">
                    <div class="flag-d">
                      <div class="img">
                        <img class="wtsapp entered lazyloaded" loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/phone.svg" alt="valuecoders" width="30" height="19">
                      </div>
                      <div class="cont"><span class="num">+61 2 8005 8080</span></div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>