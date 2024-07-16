<?php 
//echo '<pre>'; print_r($_SERVER); die;
$actionLink = ( isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'localhost') ) ? 'http://localhost/valuecoders-landing/wp/sendmail-l7.php' : 'https://www.valuecoders.com/sendmail-l7.php'
?>
<div class="form-pop-up-box form-pop-up-box2" id="ppc-leadform">
  <div class="container">
    <div class="form-box-outer width-685">
      <span class="pop-close" onclick="closevcForm('ppc-leadform');"></span>
      <div class="head-txt text-center"><h2>Get In Touch</h2></div>
      <form action="<?php echo $actionLink; ?>" enctype="multipart/form-data" onsubmit="return validateLeadForm();" method="POST" id="ppc-leadf">
        <div class="form-inner dis-flex">
          <div class="form-text-cont">
            <div class="user-input">
              <input type="text" placeholder="Full Name" id="gt-name" class="input-field" value="" name="user-name" />
              <label>Full Name</label>
              <small>Please Fill Name</small>
            </div>
            
          </div>
          <div class="form-text-cont">
            <div class="user-input">
              <input type="text"  placeholder="Email" id="gt-email" class="input-field" value="" name="user-email" />
              <label>Email</label>
              <small>Please Fill Email</small>
            </div>            
          </div>
          <div class="form-text-cont">
            <div class="user-input">
              <input type="text" class="input-field" id="gt-phone" placeholder="Phone Numbe" value="" name="user-phone" />
              <label>Phone Number</label>
              <small>Please Fill Phone</small>
            </div>
            
          </div>
          <div class="form-text-cont">
            <div class="user-input">
              <input class="input-field input-skype" type="text" id="gt-country" placeholder="Country" value="" name="user-country" />
              <label>Country</label>
              <small>This Field Is Required</small>
            </div>
            
          </div>
          <div id="help-ul" class="form-text-cont width-full">
            <div class="select-box active input-field" onclick="apnSelect('help-ul');">
              <input type="hidden" id="team-size" name="user-budget" value="">
              <span class="error"></span>
              <a href="javascript:void(0);" class="select-first" id="label-wehelp">Monthly Ad Budget</a> 
              <span class="arrow-btn"></span>
            </div>
            <div class="select-list">
              <ul class="in-options">
                <li onclick="setoptValue('Less than $2000', 'label-wehelp', 'team-size', 'help-ul');">Less than $2000</li>
                <li onclick="setoptValue('$2001-$5000', 'label-wehelp', 'team-size', 'help-ul');">$2001-$5000</li>
                <li onclick="setoptValue('$5000-$10,000', 'label-wehelp', 'team-size', 'help-ul');">$5000-$10,000</li>
                <li onclick="setoptValue('More than $10,000', 'label-wehelp', 'team-size', 'help-ul');">More than $10,000</li>
              </ul>
            </div>
            <small>This Field Is Required</small>
          </div>
          <div class="form-text-cont width-full">
            <div class="user-input">
              <textarea class="input-field comment-input"  placeholder="Comments (optional)" name="user-req"></textarea>
            </div>
            <small>Please Fill Requirement</small>
          </div>
        </div>
        <div class="user-input checkout">
          <input type="hidden" name="frmqueryString" id="frmqueryString-pop" value="<?php echo utnHeaderString(); ?>">
          <input type="hidden" name="page_url" value="<?php the_permalink(); ?>">
          <input type="hidden" name="type" value="ppc-lead">
          <input type="submit" id="leadf-btn" class="checkout-submit" value="Book A Consultation " />
        </div>
      </form>
    </div>
  </div>
</div>