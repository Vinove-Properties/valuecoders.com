<?php 
  $formBtn 	= ( isset($args['tpl']) && !empty( $args['tpl'] ) )  ? $args['tpl'] : ""; 
  $hasBtnText = ( isset($args['btn-text']) && !empty( $args['btn-text'] ) )  ? $args['btn-text'] : ""; 
  ?>
<div class="flex-2 header-form">
  <div class="form-right-box">
    <div class="head">
      <h3>Get In Touch</h3>
      <p>Our team will get back to you within 8 business hours or less.</p>
    </div>
    <div class="top-right-form-box">
      <form id="hire-sb-form" 
        action="<?php bloginfo('url'); ?>/sendmail1.php" 
        class="contact-form-section" 
        enctype="multipart/form-data" method="POST" onsubmit="hireFormValidation(); return false;" accept-charset="UTF-8">
        <div class="form-inner dis-flex">
          <div class="form-text-cont">
            <div class="lbl-row"><label for="sb_cont_name">Full Name*</label></div>
            <div class="user-input">
              <input type="text" autocomplete="off" id="sb_cont_name" placeholder="Enter Your Full Name" class="input-field" value="" maxlength="50" name="user-name">
              <small>Please Fill Name</small>
            </div>
          </div>
          <div class="form-text-cont">
            <div class="lbl-row"><label for="sb_cont_email">Email Address*</label></div>
            <div class="user-input">
              <input type="text" autocomplete="off" id="sb_cont_email" placeholder="Enter Your Email Address" class="input-field" value="" maxlength="50" name="user-email">
              <small>Error Message</small>
            </div>
          </div>
          <div class="form-text-cont">
            <div class="lbl-row">
              <label for="sb_cont_phpne">Phone no <span style="font-size:12px;">(Optional)</span></label>
            </div>
            <div class="user-input">
              <input type="text" autocomplete="off" class="input-field" id="sb_cont_phpne" placeholder="Enter Your Phone Number" value="" maxlength="30" name="user-phone">
              <small>Please Fill Phone</small>
            </div>
          </div>
          <div class="form-text-cont cont_country_section">
            <div class="lbl-row"><label for="cont_country_sb">Country*</label></div>
            <div class="user-input">
              <input class="input-field input-skype" autocomplete="off" id="cont_country_sb" type="text" placeholder="Enter Your Country" value="" maxlength="30" name="user-country">
              <small>Please Fill Country</small>
            </div>
          </div>
          <div class="textarea-box">
            <div class="form-text-cont width-full">
              <div class="lbl-row">
                <label for="sb_user_req">Project Brief*</label>
              </div>
              <div class="user-input">
                <textarea class="input-field comment-input" autocomplete="off" id="sb_user_req" placeholder="Enter your Project Brief" name="user-req"></textarea>
                <small>Please Fill Requirement</small>
                <div class="drop-input attachment_brw" id="sb-uploadcontact">
                  <div id="sb-dropcontact"></div>
                </div>
                <div id="sb-drop-area" class="drop-area">
                  <input type="file" name="files[]" id="sbfileElem" multiple accept="image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,.txt" onchange="sbhandleFiles(this.files)" 
                    style="display:none;">
                  <button class="button" id="sbbrowse-btn" type="button" 
                    onclick="document.getElementById('sbfileElem').click()">BROWSE | DROP FILES HERE</button>
                  <input type="hidden" name="up-counter" id="sbuplcounter" value="0">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="sbgloader" class="gal-loader">
          <div class="loader"></div>
          <div id="sbgallery" class="gallery"></div>
        </div>
        <p id="sb-file-type-error"></p>
        <?php /* ?>
        <div class="cta-wrap margin-t-50 justify-center">
          <div class="user-input cta-btn checkout text-center">
            <input type="hidden" name="Uploadedfilename" id="sbUploadedfilename" value="">
            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
            <input type="hidden" name="frmqueryString" value="">
            <input type="hidden" name="page_url" value="<?php the_permalink(); ?>">
            <button type="submit" id="hire-submitButton" class="checkout-submit" value="Start My Trial">Start My Trial</button>
            <span class="arrow-wrap">
            <span class="arrow primera"></span>
            <span class="arrow segunda next"></span>
            <span class="arrow last"></span>
            </span>
          </div>
        </div>
        <?php */ ?>
        <div class="button-section margin-t-50">
          <div class="btn-div">
            <div class="cta-wrap">
              <div class="user-input cta-btn checkout text-center">
                <input type="hidden" name="Uploadedfilename" id="sbUploadedfilename" value="">
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                <input type="hidden" name="frmqueryString" value="">
                <input type="hidden" name="page_url" value="<?php the_permalink(); ?>">
                <input type="hidden" name="is_free_trial" value="false">
                <button type="submit" id="hire-submitButton" class="checkout-submit" value="Hire Experts">
                Hire Experts</button>
				<span class="devide">OR</span>
				        <a href="javascript:void(0);" onclick="consultCTA_cb();" target="_self" class="req">
                Book A Call</a>
              </div>
            </div>
          </div>
          
        </div>
      </form>
    </div>
  </div>
</div>