<?php 
$dmOpt    = get_field('is_dmtpl');
$isDmPage = ( $dmOpt && ($dmOpt == "yes") ) ? true : false;
?>
<div class="container">
<div class="dis-flex" id="contact-sec">
	<div class="left-box bg-dark-theme">
		<?php 
		$pType = get_field('epage-type'); 
		if( ($pType == "type1") || is_page_template( 'page-templates/tpl-version6.0.php' ) ){
		if( is_page_template( 'page-templates/tpl-version6.0.php' ) ){ ?>
		<h2>Ready to Experience the Difference?</h2>
		<p>Start your <strong>7-Day Trial</strong> today</p>
		<div class="side-dash1 list-box">
			<h3>Fill up your details</h3>
			<p>Your data is 100% confidential.</p>
		</div>
		<div class="side-dash2 list-box">
					<h3>What’s next?</h3>
					<p>Schedule an online meeting with our experts to disucss your requirements.</p>
					<div class="dis-flex profile-outer">
						<div class="profile-pic"><i class="pic1"></i></div>
						<div class="profile-pic"><i class="pic2"></i></div>
						<div class="profile-pic"><i class="pic3"></i></div>
					</div>
				</div>
		<?php }else{ ?>
		<h2>Talk To Our Consultants</h2>
		<p>Get Custom Solutions & Recommendations, Estimates.</p>
		<br><br>
		<div class="side-dash1 list-box">
			<h3>Fill up your details</h3>
			<p>Your data is 100% confidential</p>
		</div>
		<div class="side-dash2 list-box">
			<h3>What's next?</h3>
			<p>One of our Account Managers will contact you shortly</p>
            <div class="dis-flex profile-outer">
            <div class="profile-pic"><i class="pic1"></i></div>
            <div class="profile-pic"><i class="pic2"></i></div>
            <div class="profile-pic"><i class="pic3"></i></div>
            </div>
            <?php /* ?>
			<div class="dis-flex profile-outer" style="display:none;">
				<div class="profile-pic"><i class="pic1"></i></div>
				<!-- <div class="profile-pic"><i class="pic2"></i></div> -->
				<div class="profile-pic"><i class="pic3"></i></div>
				<div class="profile-pic"><i class="pic4"></i></div>
			</div>
			<?php */ ?>
		</div>

		<?php
		} 
		}else{ 
			$clReviews = get_field('client-reviews', 'option');
			if( $clReviews ) :
			?>
			<div class="glider-contain footer-slider">
				<div class="glider">
					<?php foreach( $clReviews as $review ){ ?>
					<div class="slide-item">
						<div class="client-profile">
						<?php if($review['thumbnail']){
						echo '<img loading="lazy" src="'.$review['thumbnail']['url'].'" 
						alt="'.$review['client_name'].'" width="173" 
						height="173">';
						} 
						?>
						</div>
						<span class="title"><?php echo $review['designation']; ?></span>
						<p><?php echo $review['content']; ?></p>
						<div class="star-img">
							<img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/stars-footer.png" alt="ValueCoders" width="179" height="28">
						</div>
					</div>
					<?php } ?>
				</div>
				<div role="tablist" class="dots"></div>
			</div>
		<?php 
		endif;
		} ?>
	</div>
	<div class="form-box-outer right-box bg-voilet">
		<div class="form-head-box">
			<?php 
			if( is_page_template( 'page-templates/tpl-version6.0.php' ) ){ 
				echo '<span class="form-head">Start Your Journey with Us - Fill in Your Details!</span>';
			}else{
				echo '<span class="form-head">Get in Touch</span><p>Guaranteed response within one business day!</p>';
			} 
			?>
		</div>
		<form action="https://www.valuecoders.com/sendmail-l7.php" id="cmn-form" onsubmit="return vcCmnFormValidation();" enctype="multipart/form-data" method="POST">
			<div class="form-inner dis-flex" id="ftr-cmn">
				<div class="form-text-cont">
					<div class="user-input">
					<input type="text" id="cont_name" placeholder="Full Name" class="input-field" value="" 
					name="user-name" />
					</div>
					<small></small>
				</div>
				
				<div class="form-text-cont">
					<div class="user-input">
					<input type="text" id="cont_email" placeholder="Email Address" class="input-field" value="" name="user-email" />
					</div>
					<small></small>
				</div>
				
				<div class="form-text-cont">
					<div class="user-input">
						<?php 
                        global $post;
                        $phoneOpt = get_field( 'frm-phone-fld', $post->ID );
                        ?>
						<input type="tel" class="input-field" id="cont_phpne" 
						placeholder="<?php echo (isset($phoneOpt) && ($phoneOpt == "no")) ? 'Phone Number (optional)':'Phone Number' ?>" value="" name="user-phone" maxlength="15" />
					</div>
					<small></small>
				</div>

				<div class="form-text-cont">
					<div class="user-input">
					<input class="input-field input-skype" id="cont_country" type="text" placeholder="Country" value="" name="user-country" />
					</div>
					<small></small>
				</div>

				<div class="form-text-cont width-full">
					<div class="user-input">
					<textarea class="input-field comment-input" id="cont_req" placeholder="Project Brief" name="user-req"></textarea>
					</div>
					<small></small>
				</div>
			</div>

			<div class="user-input checkout">
			<input type="hidden" name="type" value="footer-form" />
			<input type="hidden" name="frmqueryString" id="frmqueryString" value="<?php echo utnHeaderString(); ?>" />
			<input type="hidden" name="is-dmtpl" value="<?php echo ( $isDmPage === true ) ? "true" : "false";  ?>">
			<?php 
			$btnText = 'Enquire Now';
			if( is_page_template( 'page-templates/tpl-version6.0.php' ) ){
			echo '<input type="hidden" id="bookcall-frm" name="is-bookcall" value="1">';
			$btnText = 'SUBMIT';
			} 
			?>
			<input type="submit" id="submitButton" class="checkout-submit" value="<?php echo $btnText; ?>" />
			</div>
		</form>
	</div>
</div>
</div>