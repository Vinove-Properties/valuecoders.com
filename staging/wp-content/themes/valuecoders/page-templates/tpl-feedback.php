<?php 
/*
Template Name: Sales Feedback Template
*/ 
get_header('nonav');
?>
<section class="banner-section">
  <div class="container">
  	<?php the_content(); ?>
  </div>
</section>
 <section class="consult-sec">
	<div class="container">
		<div class="consult-flex dis-flex">
		  <?php if( is_page(18346) ){ ?>
      <div class="consult-col">
            <div class="con-wrap">
              <div class="con-text">
                <h3>Happy with the Discussion let’s get started</h3>
                <p>Let’s complete the paperwork to start.</p>
              </div>
              <div class="btn-sec">
                <a href="javascript:void(0);" onclick="showPopForm('intentPopup-pw')" class="btn rounded">
                <span class="text-white">Fill a Form Now</span>
              </a>
              </div>
            </div>
          </div>  
      <?php }else{ ?>
      <div class="consult-col">
		    <div class="con-wrap">
		      <div class="con-text">
		        <h3>Ready to start?</h3>
            <p>Please take a moment to provide your details for the paperwork.</p>
		      </div>
		      <div class="btn-sec">
		        <a href="javascript:void(0);" onclick="showPopForm('intentPopup-pw')" class="btn rounded">
		        <span class="text-white">Enter Details</span>
		        </a>
		      </div>
		    </div>
		  </div>
      <?php } ?>

      <?php if( is_page(18346) ){ ?>
      <div class="consult-col">
        <div class="con-wrap">
          <div class="con-text">
            <h3>Need to bring your Partners/Decision Makers on final Call</h3>
            <p>Let’s Set up a Date & Time for the Call.</p>
          </div>
          <div class="btn-sec">
            <a href="#" class="btn rounded"><span class="text-white">Schedule A Call</span></a>
          </div>
        </div>
      </div>  
      <?php }else{ ?>
      <div class="consult-col">
        <div class="con-wrap">
          <div class="con-text">
            <h3>Need more information?</h3>
            <p>We understand that making a decision takes time. Schedule another call to discuss further details or invite additional team members or decision makers.</p>
          </div>
          <div class="btn-sec">
            <a href="#" class="btn rounded"><span class="text-white">Schedule A Call</span></a>
          </div>
        </div>
      </div>  
      <?php } ?>  
		  
		  <div class="consult-col">
		    <div class="con-wrap">
		      <div class="con-text">
		        <h3>Not ready to start yet?</h3>
		        <p>Your feedback is important to us. Please share your thoughts to help us improve our services.</p>
		      </div>
		      <div class="btn-sec">
		        <a href="javascript:void(0);" onclick="showPopForm('intentPopup-fb')" class="btn rounded">
              <span class="text-white">Fill a Feedback Form</span>
            </a>
		      </div>
		    </div>
		  </div>
		</div>
    <div class="primnenbt">
    <p>Contact Us: For any immediate questions, please reach out to us at <a href="mailto:sales@valuecoders.com">sales@valuecoders.com</a> or call <a href="tel:+918882108080">+91 888 210 8080</a>.</p>
    </div>
	</div>
</section>
<div class="popup-section consult-popup">
<div id="intentPopup-pw" class="popup-wrapper" style="display:none;">
<div class="popWrap">
  <div class="popup-content">
    <span class="closeicon" onclick="close_vpop('intentPopup-pw')">
    <img loading="lazy" src="<?php bloginfo('template_url') ?>/dev-img/consult-cross.svg" alt="Valuecoders" width="11" height="11"></span>
    <div class="top-head">
      <h2>Details for Paperwork</h2>
      <p>Rest assured, the below-mentioned details will remain confidential.</p>
    </div>
    <div class="form-box">
      <form method="POST" id="elm-paperwork-form" action="<?php echo site_url('/script-feedback.php'); ?>" 
        onsubmit="return _handleRespFeedback();">
        <div class="form-wrap">
          <div class="form-group">
            <div class="user-input">
              <label>Full Name *</label>
              <input class="form-input" type="text" id="pw-name" placeholder="Enter Your Name" name="user-name" 
              maxlength="30" data-err="Please Fill Name">
              <small>Please Fill Name.</small>
            </div>
          </div>
          <div class="form-group">
            <div class="user-input">
              <label>Email *</label>
              <input type="text" class="form-input" id="pw-email" placeholder="Enter Your Email" name="user-email" 
              maxlength="50" data-err="Please Fill Email">
              <small></small>
            </div>
          </div>
          <div class="form-group">
            <div class="user-input">
              <label>Company Name *</label>
              <input type="text" class="form-input" id="pw-company" placeholder="Enter Company Name" name="user-company" 
              maxlength="100" data-err="Please Fill Company">
              <small></small>
            </div>
          </div>
          <div class="form-group">
            <div class="user-input">
              <label>Company Address *</label>
              <input type="text" class="form-input" id="pw-address" placeholder="Enter Company Address" name="address" 
              maxlength="200" data-err="Please Fill Company Address">
              <small></small>
            </div>
          </div>

          <div class="form-group">
            <div class="user-input">
              <label>Name of Signing Authority *</label>
              <input type="text" class="form-input" id="pw-authority" placeholder="Enter Company Name" 
              name="authority" maxlength="50" data-err="Please Fill Name of Signing Authority">
              <small></small>
            </div>
          </div>
          <div class="form-group">
            <div class="user-input">
              <label>Title/Position *</label>
              <input type="text" class="form-input" id="pw-position" placeholder="Enter Title/Position" 
              name="position" maxlength="50" data-err="Please Fill Title/Position">
              <small></small>
            </div>
          </div>

          <div class="form-group">
            <div class="user-input sel-input">
              <label>Expected Turnaround Time *</label>
              <select class="wide selectize" name="expected-time" id="exp-time">
                <option value="">Expected Turnaround Time</option>
                <option value="Immediately">Immediately</option>
                <option value="Within a Week">Within a Week</option>
                <option value="Others">Others please specify</option>
              </select>
              <small></small>
            </div>            
          </div>

          <div class="form-group">
            <div class="user-input">
              <label>Phone No.</label>
              <input id="ft-phone" type="tel" placeholder="(Optional)" name="user-phone" maxlength="12" class="form-input input-field">
              <small id="phone-error-vs"></small>
            </div>
          </div>

          <div id="cond-requirement" class="form-group width-full" style="display:none;">
            <div class="user-input">
              <label>Please Specify Your Requirements *</label>
              <input type="text" class="form-input" id="pw-requirement" placeholder="Enter Your Requirements" name="requirement" 
              data-err="Please Fill Your Requirements">
              <small></small>
            </div>
          </div>

          <div class="form-group width-full">
            <input class="styled-checkbox" id="intent" type="checkbox" value="value1">
            <label for="intent">"I confirm my intent to work with ValueCoders and request to receive the agreement for signature.</label>
          </div>
          <div class="form-group  width-full">
            <input type="hidden" name="frm-type" value="paperwork">
            <button type="submit" class="btn btn-big btn-primary btn-padding-x test-1" name="ws-form-sub" 
            id="pxl-submit-top" value="ws-landing">Submit Now</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>

<div class="popup-section consult-popup">
<div id="intentPopup-fb" class="popup-wrapper" style="display:none;">	
<div class="popWrap">
  <div class="popup-content">
	<span class="closeicon" onclick="close_vpop('intentPopup-fb')">
    <img loading="lazy" src="<?php bloginfo('template_url') ?>/dev-img/consult-cross.svg" alt="Valuecoders" width="11" height="11"></span>
    <div class="top-head">
      <h2>Feedback</h2>
      <p>Your feedback is essential for our growth and improvement.</p>
    </div>
    <form method="POST" id="elm-rating-form" action="<?php echo site_url('/script-feedback.php'); ?>" onsubmit="return _handleRating();">
    <div class="form-box">      
        <div class="form-wrap">
          <div class="form-group">
            <div class="user-input">
              <label>Full Name *</label>
              <input class="form-input" type="text" id="rt-name" placeholder="Enter Your Name" name="user-name" 
              maxlength="30" data-err="Please Fill Name">
              <small></small>
            </div>
          </div>
          <div class="form-group">
            <div class="user-input">
              <label>Email *</label>
              <input type="text" class="form-input" id="rt-email" placeholder="Enter Your Email" name="user-email" 
              maxlength="50" data-err="Please Fill Email">
              <small></small>
            </div>
          </div>
        </div>      
    </div>
    <div class="rate-section">
      <div class="rating-section">
        <h3>Rating on Initial Discussions</h3>
        <!-- <p>How satisfied were you with the initial connection and communication with our team? Rating Scale (1-5, where 1 is very dissatisfied and 5 is very satisfied)</p> -->
        <div id="rate-str" class="rate-star">
          <p>How would you rate your overall experience with our team during the requirement discussion stage?</p>
          <div class="star-rating">
            <input type="radio" id="5-stars" name="rating" value="5" />
            <label for="5-stars" class="star"></label>
            <input type="radio" id="4-stars" name="rating" value="4" />
            <label for="4-stars" class="star"></label>
            <input type="radio" id="3-stars" name="rating" value="3" />
            <label for="3-stars" class="star"></label>
            <input type="radio" id="2-stars" name="rating" value="2" />
            <label for="2-stars" class="star"></label>
            <input type="radio" id="1-star" name="rating" value="1" />
            <label for="1-star" class="star"></label>
          </div>
          <small class="rt-err" id="no-rating-err"></small>
        </div>
      </div>
      <div class="rating-section">
        <h3>Reasons for Not Proceeding</h3>
        <p>What are the main reasons for not proceeding with the project at this time?</p>
        <ul class="unstyled centered">
          <li>
            <input name="rt-reson[]" class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="Budget constraints">
            <label for="styled-checkbox-1">Budget constraints</label>
          </li>
          <li>
            <input name="rt-reson[]" class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="Timeline issues">
            <label for="styled-checkbox-2">Timeline issues</label>
          </li>
          <li>
            <input name="rt-reson[]" class="styled-checkbox" id="styled-checkbox-3" type="checkbox" value="Not a priority at the moment">
            <label for="styled-checkbox-3">Not a priority at the moment</label>
          </li>
          <li>
            <input name="rt-reson[]" class="styled-checkbox" id="styled-checkbox-4" type="checkbox" value="Waiting for internal approvals">
            <label for="styled-checkbox-4">Waiting for internal approvals</label>
          </li>
          <li>
            <input name="rt-reson[]" class="styled-checkbox" id="styled-checkbox-5" type="checkbox" value="other">
            <label for="styled-checkbox-5">Other</label>
          </li>
        </ul>
      </div>
      <div class="form-box" id="elm-otr-reason" style="padding:20px 0 20px 0; display: none;">
      <div class="form-wrap">
        <div class="form-group width-full">
          <div class="user-input">
          <label>Other Reason</label>
          <textarea class="form-input" id="rt-rtext" placeholder="Enter Your Other Reason" name="reason-text" 
          data-err="Please Fill This Field"></textarea>          
          <small></small>
          </div>
        </div>
      </div>
      </div>
      <div class="form-group width-full">
      <input type="hidden" name="frm-type" value="feedback">
      <button type="submit" class="btn btn-big btn-primary btn-padding-x test-1" name="ws-form-sub" id="fd-submit" value="ws-landing">Submit Now</button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>