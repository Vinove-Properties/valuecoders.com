<?php 
global $post;
$cy = "$";
$pRow = get_field('price-plan', $post->ID);
if( isset( $pRow['needed'] ) && $pRow['needed'] == "yes" ){
  if( isset( $pRow['currency'] ) && !empty( $pRow['currency'] )  ){
    $cy = $pRow['currency'];
  }
}

$actionPage = getTplPageURL('page-templates/tpl-payment_init.php');
?>
<div class="form-pop-up-box form-pop-up-box3" id="op-leadform">
  <div class="container">
    <div class="form-box-outer price-box width-100" id="str-prepayfrm" style="display:block;">
      <span class="pop-close" onclick="closevcForm('op-leadform');"></span>
      <form action="<?php echo $actionPage; ?>" enctype="multipart/form-data" onsubmit="return validateOrderProcess();" method="POST" id="op-ppcform">
      <div class="dis-flex justify-sb">
      
      <div class="left-box">
        <div class="head-txt">
          <h2>Select Your Plan</h2>
        </div>
        
          <div class="form-inner dis-flex">
            <div class="form-text-cont">
              <div class="user-input">
                <input type="text"  placeholder="Full Name" id="op-name" class="input-field" value="" name="cont_name"/>
                <label>Full Name</label>
                <small>Please Fill Name</small>
              </div>
              
            </div>
            <div class="form-text-cont">
              <div class="user-input">
                <input type="text"  placeholder="Email" id="op-email" class="input-field" value="" name="cont_email" />
                <label>Email</label>
                <small>Please Fill Email</small>
              </div>              
            </div>
            <div class="form-text-cont">
              <div class="user-input">
                <input type="text" class="input-field"  id="op-phone" placeholder="Phone Numbe" value="" name="cont_phpne" />
                <label>Phone Number</label>
                <small>Please Fill Phone</small>
              </div>              
            </div>
            <div class="form-text-cont">
              <div class="user-input">
                <input class="input-field" type="text" id="op-country" placeholder="Country" value="" name="cont_country" />
                <label>Country</label>
                <small>This Field Is Required</small>
              </div>              
            </div>
            <div class="form-text-cont width-full">
              <div class="user-input">
                <textarea class="input-field comment-input" id="pop-requirement" placeholder="Comments (optional)" name="user-req"></textarea>
                <small>Please Fill Requirement</small>
              </div>
              
            </div>
          </div><!--//.form-inner-->
      </div>
      <div class="right-box">
        <span class="order-head">Order Summary</span>
        <div class="order-summary-form">
          <div id="plans-ul" class="form-text-cont width-full">
            <div class="select-box active input-field" onclick="apnSelect('plans-ul');">
              <input type="hidden" id="plan-type" name="plan-type" value="Basic Plan">
              <input type="hidden" id="op-plan" name="op-plan" value="500">
              <input type="hidden" id="op-currency" name="op-currency" value="INR">
              <span class="error"></span>
              <a href="javascript:void(0);" class="select-first" id="label-plan">Basic Plan (<?php echo $cy; ?>500/month)</a> 
              <span class="arrow-btn"></span>
            </div>
            <div class="select-list">
              <ul class="in-options">
                <li onclick="setoptValue('Basic Plan (<?php echo $cy; ?>500/month)','label-plan','op-plan','plans-ul', 500);">Basic Plan (<?php echo $cy; ?>500/month)</li>
                <li onclick="setoptValue('Premium Plan (<?php echo $cy; ?>1,000/month)','label-plan','op-plan','plans-ul', 1000);">Premium Plan (<?php echo $cy; ?>1,000/month)</li>
                <li onclick="setoptValue('Elite Plan (<?php echo $cy; ?>2,500/month)','label-plan','op-plan','plans-ul', 2500);">Elite Plan (<?php echo $cy; ?>2,500/month)</li>
              </ul>
            </div>
            <small>Please Fill</small>
          </div>
          <div class="total-price-box">
            <span class="total-txt">Total</span>
            <span class="total-price" id="ttl-amount">$1,000</span>
          </div>
          <input type="hidden" name="frmqueryString" id="frmqueryString-pop" value="<?php echo utnHeaderString(); ?>">
          <input type="hidden" name="page_url" value="<?php the_permalink(); ?>">
          <input type="submit" id="op-submit" class="rate-btn checkout-submit" value="Continue">        
        </div>
        <div class="order-footer">
          <div class="order-text">
            <span>Non Disclosure <br>Agreement</span>
            <span>24X7 <br>Support</span>
            <span class="has-free-trial">100% Money Back<br> Guaranteed</span>
          </div>
          <div class="order-logo">
            <img src="<?php bloginfo('template_url'); ?>/assets-v2/images/ppc/order-card-image.png" alt="Valuecoders">
          </div>
        </div>
      </div><!-- .right-box-->
      
    </div>
    </form>
  </div>
</div>
</div>