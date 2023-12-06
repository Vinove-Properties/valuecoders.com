<div class="form-pop-up-box" id="ppc-downreport">
  <div class="container">
    <div class="form-box-outer">
      <span class="pop-close" onclick="closevcForm('ppc-downreport');"></span>
      <div class="head-txt text-center">
      <h2>Get In Touch</h2>
      </div>
      <form action="" onsubmit="return validateReportForm();" id="dwnr-form" enctype="multipart/form-data" method="POST">
        <div class="form-inner dis-flex">
          <div class="form-text-cont width-full">
            <div class="user-input">
              <input type="text" placeholder="Full Name" class="input-field" value="" name="cont_name" id="dr-name" />
              <label>Full Name</label>
              <small>Please Fill Name</small>
            </div>            
          </div>
          <div class="form-text-cont width-full">
            <div class="user-input">
              <input type="text" placeholder="Email" class="input-field" value="" name="cont_email" id="dr-email" />
              <label>Email</label>
              <small>Please Fill Email</small>
            </div>            
          </div>
          <div class="form-text-cont width-full">
            <div class="user-input">
              <input type="text" class="input-field" placeholder="Phone Number" value="" name="cont_phpne" id="dr-phone" />
              <label>Phone Number</label>
              <small>Please Fill Phone</small>
            </div>            
          </div>
          <div class="form-text-cont width-full">
            <div class="user-input">
              <input class="input-field" type="text" placeholder="Country" value="" name="cont_country" id="dr-country" />
              <label>Country</label>
              <small>This Field Is Required</small>
            </div>            
          </div>
        </div>
        <div class="user-input checkout">
          <input type="submit" id="dwnreport-btn" class="checkout-submit" value="Send your request" />
        </div>
      </form>
    </div>
  </div>
</div>