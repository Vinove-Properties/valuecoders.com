<?php 
$formBtn 	= ( isset($args['tpl']) && !empty( $args['tpl'] ) )  ? $args['tpl'] : ""; 
$hasBtnText = ( isset($args['btn-text']) && !empty( $args['btn-text'] ) )  ? $args['btn-text'] : ""; 
?>
<form id="hire-sb-form" action="<?php bloginfo('url'); ?>/sendmail1.php" class="contact-form-section" enctype="multipart/form-data" 
method="POST" onsubmit="return hireFormValidation();">
	<div class="form-inner dis-flex">
		<div class="form-text-cont">
			<div class="lbl-row">
				<label for="sb_cont_name">Full Name*</label>
			</div>

			<div class="user-input">
				<input type="text" autocomplete="off" id="sb_cont_name" placeholder="Enter Your Full Name" class="input-field" value="" maxlength="50" name="user-name">
				<small>Please Fill Name</small>
			</div>
		</div>

		<div class="form-text-cont">
			<div class="lbl-row">
				<label for="sb_cont_email">Email Address*</label>
			</div>

			<div class="user-input">
				<input type="text" autocomplete="off" id="sb_cont_email" placeholder="Enter Your Email Address" class="input-field" value="" maxlength="50" name="user-email">
				<small>Error Message</small>
			</div>
		</div>

		<div class="form-text-cont">
			<div class="lbl-row">
				<label for="sb_cont_phpne">Phone no*</label>
			</div>

			<div class="user-input">
				<input type="text" autocomplete="off" class="input-field" id="sb_cont_phpne" placeholder="Enter Your Phone Number" value="" maxlength="30" name="user-phone">
				<small>Please Fill Phone</small>
			</div>
		</div>

		<div class="form-text-cont cont_country_section">
			<div class="lbl-row">
				<label for="cont_country_sb">Country*</label>
			</div>

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
	<div class="user-input checkout text-center">
		<input type="hidden" name="Uploadedfilename" id="sbUploadedfilename" value="">
		<input type="hidden" name="frmqueryString" value="">
		<input type="hidden" name="page_url" value="<?php the_permalink(); ?>">
		<button type="submit" id="hire-submitButton" class="checkout-submit green-bdr-btn" value="Hire Software Developers ">
		<?php echo ( $formBtn == "hire" ) ? $hasBtnText : "Enquire Now" ?> <i class="arrow-icon green"></i></button>
	</div>
</form>