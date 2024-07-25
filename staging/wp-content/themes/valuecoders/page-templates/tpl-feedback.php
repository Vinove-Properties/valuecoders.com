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
		  <div class="consult-col">
		    <div class="con-wrap">
		      <div class="con-text">
		        <h3>Need to bring your Partners/
		          Decision Makers on final Call
		        </h3>
		        <p>Let’s Set up a Date & Time for the Call.</p>
		      </div>
		      <div class="btn-sec">
		        <a href="#" class="btn rounded"><span class="text-white">Schedule A Call</span></a>
		      </div>
		    </div>
		  </div>
		  <div class="consult-col">
		    <div class="con-wrap">
		      <div class="con-text">
		        <h3>Not Ready to Start yet?</h3>
		        <p>Leave you feedback here!</p>
		      </div>
		      <div class="btn-sec">
		        <a href="javascript:void(0);" onclick="showPopForm('intentPopup-fb')" class="btn rounded"><span class="text-white">Fill a Form Now</span></a>
		      </div>
		    </div>
		  </div>
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
      <p>Assure Response in 1 business days</p>
    </div>
    <div class="form-box">
      <form onsubmit="return _handleRespFeedback();">
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
              maxlength="50" data-err="Please Fill Company">
              <small></small>
            </div>
          </div>
          <div class="form-group">
            <div class="user-input">
              <label>Company Address *</label>
              <input type="text" class="form-input" id="ft-email" placeholder="Enter Company Address" name="user-email" maxlength="50">
              <small></small>
            </div>
          </div>
          <div class="form-group">
            <div class="user-input">
              <label>Expected Turnaround Time *</label>
              <input type="text" class="form-input" id="ft-email" placeholder="Select Expected Turnaround Time" name="user-email" maxlength="50">
              <small></small>
            </div>
          </div>
          <div class="form-group">
            <div class="user-input">
              <label>Name of Signing Authority *</label>
              <input type="text" class="form-input" id="ft-email" placeholder="Enter Company Name" name="user-email" maxlength="50">
              <small></small>
            </div>
          </div>
          <div class="form-group">
            <div class="user-input">
              <label>Title/Position *</label>
              <input type="text" class="form-input" id="ft-email" placeholder="Enter Title/Position" name="user-email" maxlength="50">
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
          <div class="form-group  width-full">
            <input class="styled-checkbox" id="intent" type="checkbox" value="value1">
            <label for="intent">"I confirm my intent to work with ValueCoders and request to receive the agreement for signature.</label>
          </div>
          <div class="form-group  width-full">
            <button type="submit" class="btn btn-big btn-primary btn-padding-x test-1" name="ws-form-sub" id="pxl-submit-top" value="ws-landing">Submit Now</button>
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
      <h2>Details for Paperwork</h2>
      <p>Assure Response in 1 business days</p>
    </div>
    <div class="form-box">
      <form>
        <div class="form-wrap">
          <div class="form-group">
            <div class="user-input">
              <label>Full Name *</label>
              <input class="form-input" type="text" id="ft-name" placeholder="Enter Your Name" name="user-name" maxlength="30">
              <small>Please Fill Name.</small>
            </div>
          </div>
          <div class="form-group">
            <div class="user-input">
              <label>Email *</label>
              <input type="text" class="form-input" id="ft-email" placeholder="Enter Your Email" name="user-email" maxlength="50">
              <small></small>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="rate-section">
      <div class="rating-section">
        <h3>Feedback on Initial Discussions</h3>
        <p>How satisfied were you with the initial connection and communication with our team? Rating Scale (1-5, where 1 is very dissatisfied and 5 is very satisfied)</p>
        <div class="rate-star">
          <p>How would you rate our team's persistence and follow-up?</p>
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
        </div>
      </div>
      <div class="rating-section">
        <h3>Reasons for Not Proceeding</h3>
        <p>What are the main reasons for not proceeding with the project at this time? Checkboxes (multiple selections allowed)</p>
        <ul class="unstyled centered">
          <li>
            <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
            <label for="styled-checkbox-1">Budget constraints</label>
          </li>
          <li>
            <input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value2">
            <label for="styled-checkbox-2">Timeline issues</label>
          </li>
          <li>
            <input class="styled-checkbox" id="styled-checkbox-3" type="checkbox" value="value3">
            <label for="styled-checkbox-3">Not a priority at the moment</label>
          </li>
          <li>
            <input class="styled-checkbox" id="styled-checkbox-4" type="checkbox" value="value4">
            <label for="styled-checkbox-4">Waiting for internal approvals</label>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>