<div class="hireform">
   <div class="formHeading">
      <?php 
      if( is_page_template( 'page-templates/free-trial-tpl.php' ) ) {
         echo '<h3>Request 2 Weeks Trial</h3>';
      } else {
          if(basename(get_page_template()) === 'page.php'){
            echo '<h3>Connect with Us</h3>';
          }else{
            echo '<h3>Request a free quote</h3>';
          }
         
      } 
      ?>
      <?php 
      if(basename(get_page_template()) === 'page.php'){
      echo '<p>Assured Response in 1 Business Day!</p>';    
      }else{
      echo '<p>Guaranteed response within one business day!</p>';    
      }
      ?>
      
   </div>
   <div id='alert'>
      <div class=' alert alert-block alert-info fade in center'></div>
   </div>
   <form id="sidebar_form" method="post" enctype="multipart/form-data" action="https://www.valuecoders.com/sendmail-l7.php">
      <input type="hidden" name="frmqueryString" id="frmqueryString1" value="<?php echo utnHeaderString(); ?>" />
      <div class="name">
<input type="text" placeholder="Name" id="user-name1" name="user-name" onblur="validate_name1()" onfocus="clearvalidation()">
</div>
<div class="email">
<input type="email" placeholder="Email" id="user-email1" name="user-email" onblur="validate_email1()" onfocus="clearvalidationEmail()">
<?php echo hiddenBoatField("input"); ?>
</div>
<div class="phone">
<input type="phone" placeholder="Phone" id="user-phone1" name="user-phone" onblur="validate_phone1()" onfocus="clearvalidationPhone()">
</div>
<div class="autocomplete">
<input id="myInput" type="text" name="user-country" placeholder="Country" onfocusout="validate_country1()" onfocus="clearvalidationCountry()">
</div>
      <div class="textarea">
        <textarea placeholder="Requirement" id="user-req1" name="user-req" onfocusout="validate_req1()" onfocus="clearvalidationReq()"></textarea>
        <?php if( !wp_is_mobile() ) : ?>
        <div class="attact-file">
        <ul class="dropzone-previews" id="prv-show"></ul>
        <div class="arrow_box_change dropzone" id="myDropzone"></div>
        </div>
        <?php endif; ?>
      </div>
      <input type="hidden" id="g-recaptcha-response" name="g-recaptcha">
      <input type="hidden" name="frmSidebar" value="sidebar" />
      <input type="hidden" name="frmSidebarFileUploadedfilename" id="frmSidebarFileUploadedfilename" value="" />
      <input type='hidden' id="zc_gad" name="zc_gad" value=""/>
      <button id="submitsidebar_form">Contact Us Now</button>
   </form>
   <div class="clearfix"></div>
</div>