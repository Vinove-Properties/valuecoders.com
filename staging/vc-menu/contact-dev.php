<?php require_once 'common/inc/config.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Us - Software Solutions Firm - @ValueCoders</title>
	<meta name="description" content="Contact Us - Software Solutions Firm - @ValueCoders" />
	<meta name="keywords" content="software outsourcing company, software development outsourcing, software engineering company in india, software outsourcing company India, offshore software development, software outsourcing services" />
	<meta property="og:title" content="Contact Us - Software Solutions Firm - @ValueCoders" />

	<?php require_once 'include/header-files.php'; ?>
	<link rel="preload stylesheet" type="text/css" href="css/contact-form.min.css" defer/>

	<!-- add -->
	<link rel="preload stylesheet" type="text/css" href="css/form-county.css" defer/>
    <script src="/valuecoders-v2/js/intlTelInput.js"></script>

</head>
<body id="themeAdd">
<?php require_once 'include/menu.php'; ?>

<section class="contact-us-section full-width-form padding-t-150 padding-b-150">

	<div class="container">

		<div class="step-info-box">
			<div class="step-box step-active">
				<span class="num">1</span>
				<span class="step-info">Your Information</span>
			</div>
			<div class="step-box">
				<span class="num">2</span>
				<span class="step-info">Project Details</span>
			</div>
		</div>

		<div class="bg-voilet">
			<div class="form-box-outer right-box">
				<div class="head-txt">
					<div class="logo-box"></div>
					<div class="head-box">
						<h1>Get in touch</h1>
						<p>Hire us and work with the world-class software development teams.</p>
					</div>
				</div>
				<form action="/sendmail1.php" enctype="multipart/form-data" method="POST" id="contact-form-section"  onsubmit="return vcCmnFormValidation();"  style="margin-top:40px;">

					<!-- step-1 -->
					<div class="step-one">
						<div class="step-head active">
							<h2>Your Information</h2>
						</div>

						<div class="form-inner dis-flex">
							<div class="form-text-cont">
								<div class="lbl-row">
									<label for="focusInput">Full Name*</label>
									<span class="req-block">Required Field*</span>
								</div>
								<div class="user-input success">
									<input type="text" id="cont_name" placeholder="Enter your full name" class="input-field" value="" maxlength="50" name="user-name">
									<small>Error Message</small>
								</div>
							</div>
							<div class="form-text-cont">
								<div class="for-require-text">
									<label>Email Address*</label>
									<!-- <span class="required">Required Fields *</span> -->
								</div>
								<div class="user-input">
									<input type="text" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$" placeholder="Enter your email address" class="input-field" value="" maxlength="50" name="user-email" id="cont_email" />
									<small>Error Message</small>
								</div>
							</div>


							<div class="form-text-cont cont_country_section">
								<div class="row-left">
									<label for="cont_phpne">Phone no*</label>
									<input type="hidden" id="cont_country" value="in" type="tel" name="user-country">
									<div class="user-input">
										<input id="pcode" type="text" name="cprefix" class="pcode-prefix" onkeydown="return false;">
										<input id="cont_phpne" type="tel" maxlength="12" name="pppp" class="input-field flg-input">
										<small>Error Message</small>
									</div>
								</div>
								<div class="row-right no-erro-fld">
									<label id="in-ext">Extension</label>
									<div class="user-input">
										<input class="input-field input-extension" id="in_ext" type="text" placeholder="" autocomplete="off" value=""  maxlength="5" name="user-extension" />
									</div>
								</div>
							</div>

								<!-- old -->
							<!-- <div class="form-text-cont cont_country_section verror">
								<div class="row-left">
									<label>Phone no*</label>
									<div class="user-input">
										<input id="phone" type="tel" name="phone" class="input-field flg-input">
										<small>Please Fill Phone</small>
									</div>
								</div>
								<div class="row-right">
									<label>Extension</label>
									<div class="user-input">
										<input class="input-field input-extension" id="" type="text" placeholder="" autocomplete="off" value="" name="user-extension" />
									</div>
								</div>
							</div> -->

							<!-- new -->
							<!-- <div class="form-text-cont">
								<label>Company Name*</label>
								<div class="user-input">
									<input class="input-field" id="" type="text" placeholder="Enter your Company Name" autocomplete="off" value="" name="user-country" />
									<small>Error Message</small>
								</div>
							</div> -->
							<div class="nxt-btn-box">
								<a hre="#" class="nxt-btn">Next</a>
							</div>

						</div>
					</div>

<br><br>
					<div class="step-head">
						<h2>Your Requirements</h2>
					</div>

					<!-- step-2 -->
					<div class="step-two">
						<!-- Contact Information -->
						<div class="step-head-outer">

							<div class="step-head contact-info">
								<h2>Contact Information</h2>
								<a href="#" class="edit-txt">Edit</a>
							</div>

							<div class="form-text-selected-outer dis-flex">
								<div class="form-text-selected">
									<label for="focusInput">Full Name:</label>
									<div class="user-input-selected">
										<span class="input-select-field">Cameron Williamson</span>
									</div>
								</div>
								<div class="form-text-selected">
									<label>Email Address:</label>
									<div class="user-input-selected">
										<span class="input-select-field">cameronwilli72@gmail.com</span>
									</div>
								</div>
								<div class="form-text-selected">
									<label>Phone No :</label>
									<div class="user-input-selected">
										<span class="input-select-field">input(406) 555-0120</span>
									</div>
								</div>
								<div class="form-text-selected">
									<label>Country:</label>
									<div class="user-input-selected">
										<span class="input-select-field">2972 Westheimer Rd. Santa Ana</span>
									</div>
								</div>
							</div>
						</div>

						<div class="step-head active">
							<h2>Your Requirements</h2>
						</div>

						<!-- #new Fields Add Here -->
						<div id="help-ul" class="form-text-cont width-full">
							<label>How can we help?*</label>
							<div class="select-box input-field" onclick="apnSelect('help-ul');">
								<input type="hidden" id="inp-we-help" name="we-help" value="">
								<small></small>
								<a href="javascript:void(0);" class="select-first" id="label-wehelp">Please Select from the dropdown</a> <span class="arrow-btn"></span>
							</div>
							<div class="select-list">
								<ul class="in-options">
									<li onclick="setoptValue('Software Development', 'target-div', 'label-wehelp', 'inp-we-help', 'help-ul', this);">Software Development
										<div class="info-box">
											<em>i</em>
											<span class="info">For custom software development and fixed cost projects.</span>
										</div>
									</li>

									<li onclick="setoptValue('Team Extension', 'team-ext-col', 'label-wehelp', 
									'inp-we-help', 'help-ul', this);">Team Extension (Staff Augmentation)
										<div class="info-box">
											<em>i</em>
											<span class="info">Augment your team with expert software engineers.</span>
										</div>
									</li>

									<li onclick="setoptValue('Dedicated Software Team', 'target-div', 'label-wehelp', 'inp-we-help', 'help-ul', this);">Dedicated Software Team
										<div class="info-box">
											<em>i</em>
											<span class="info">Dedicated autonomous software product engineering teams comprising of multiple skills.</span>
										</div>
									</li>
									
									<li onclick="setoptValue('Other Technology Needs', 'target-div', 'label-wehelp', 'inp-we-help', 'help-ul', this);">Other Technology Needs
										<div class="info-box">
											<em>i</em>
											<span class="info">Any other world-class technology solution that you may need.</span>
										</div>
									</li>

									<li onclick="setoptValue('None of the above', 'target-div', 'label-wehelp', 
									'inp-we-help', 'help-ul', this);">None of the above
										<div class="info-box">
											<em>i</em>
											<span class="info">Connect with our business consultant to discuss your requirements.</span>
										</div>
									</li>
								</ul>
							</div>
						</div>


						<div class="form-text-cont width-full opt-div" id="team-ext-col" style="display:none;">
							<div id="many-eng" class="form-text-cont width-full">
								<label>How many engineers would you like to add?*</label>
								<div class="select-box input-field"  onclick="apnSelect('many-eng');">
								<input type="hidden" id="inp-resources" name="count-resources" value="">
								<small></small>	
								<a href="javascript:void(0);" id="label-resource-count" class="select-first">Please Select from the dropdown</a> <span class="arrow-btn"></span>
								</div>
								<div class="select-list">
									<ul class="in-options">
										<li onclick="setoptValue('1', 'sub-opt', 'label-resource-count', 'inp-resources', 'many-eng', this);">1</li>
										<li onclick="setoptValue('2-5', 'sub-opt', 'label-resource-count', 'inp-resources', 'many-eng', this);">2-5</li>
										<li onclick="setoptValue('6-10', 'sub-opt', 'label-resource-count', 'inp-resources', 'many-eng', this);">6-10</li>
										<li onclick="setoptValue('11-20', 'sub-opt', 'label-resource-count', 'inp-resources', 'many-eng', this);">11-20</li>
										<li onclick="setoptValue('More than 20', 'sub-opt', 'label-resource-count', 'inp-resources', 'many-eng', this);">More than 20</li>
										<li onclick="setoptValue('I don\'t know', 'sub-opt', 'label-resource-count', 'inp-resources', 'many-eng', this);">I don't know</li>
									</ul>
								</div>
							</div>

							<div id="how-long" class="form-text-cont width-full">
								<label>For how long will you need these engineers?*</label>
								<div class="select-box input-field" onclick="apnSelect('how-long');">
									<input type="hidden" id="inp-howlong" name="howlong" value="">
									<small></small>
									<a href="javascript:void(0);" id="label-howlong" class="select-first">Please Select from the dropdown</a> 
									<span class="arrow-btn"></span>
								</div>
								<div class="select-list">
									<ul class="in-options">
										<li onclick="setoptValue('1-3 Months', 'sub-opt', 'label-howlong', 'inp-howlong', 
										'how-long', this);">1-3 Months</li>
										<li onclick="setoptValue('3-6 Months', 'sub-opt', 'label-howlong', 'inp-howlong', 
										'how-long', this);">3-6 Months</li>
										<li onclick="setoptValue('6+ Months', 'sub-opt', 'label-howlong', 'inp-howlong', 
										'how-long', this);">6+ Months</li>
									</ul>
								</div>
							</div>
						</div>
						<div id="temp-tem-ext-dv"></div>

						<div class="form-text-cont width-full">
							<label>Requirement*</label>
							<div class="user-input">
								<textarea class="input-field comment-input" placeholder="What can we do for you?" id="user-req" name="user-req"></textarea>
								<small>Error Message</small>
								<div class="drop-input attachment_brw" id="uploadcontact">
									<div id="dropcontact"></div>
								</div>
								<div id="drop-area">
									<input type="file" name="files[]" id="fileElem" multiple accept="image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,.txt" onchange="handleFiles(this.files)">								
									<label class="button" for="fileElem">BROWSE | DROP FILES HERE</label>
									<input type="hidden" name="up-counter" id="uplcounter" value="0">
									<progress style="display:none;" id="progress-bar" max=100 value=0></progress>			
								</div>
							</div>
						</div>
						<div id="gloader" class="gal-loader">
							<div class="loader"></div>
							<div id="gallery"></div>
						</div>
						<p id="file-type-error"></p>
						
						<div id="exp-date-row" class="form-text-cont width-full">
							<label>What is the expected start date?*</label>
							<div class="select-box input-field" onclick="apnSelect('exp-date-row');">
								<input type="hidden" id="inp-expdate" name="expected-date" value="">
								<small></small>
								<a href="javascript:void(0);" id="label-expdate" class="select-first">Please Select from the dropdown</a> 
								<span class="arrow-btn"></span>
							</div>
							
							<div class="select-list">
								<ul class="in-options">
								<li onclick="setoptValue('I am already late', 'rb-other', 'label-expdate', 'inp-expdate', 'exp-date-row', this);">I am already late</li>
								<li onclick="setoptValue('Immediately', 'rb-other', 'label-expdate', 'inp-expdate', 'exp-date-row', this);">Immediately</li>
								<li onclick="setoptValue('When I get internal funding/approval', 'rb-other', 'label-expdate', 'inp-expdate', 'exp-date-row', this);">When I get internal funding/approval</li>
								<li onclick="setoptValue('Specify a date', 'radio-date', 'label-expdate', 'inp-expdate', 
								'exp-date-row', this);">Specify a date</li>
								<li onclick="setoptValue('I don\'t know', 'rb-other', 'label-expdate', 'inp-expdate', 
								'exp-date-row', this);">I don't know</li>
								</ul>
							</div>
							<div class="radio-date opt-div" id="radio-date" style="display:none;">
								<div class="radio-date-list">
									<input type="radio" id="oneMonth" name="expected-month" value="1 month" checked>
									<label for="oneMonth">1 month</label>
								</div>
								<div class="radio-date-list">
									<input type="radio" id="twoMonth" name="expected-month" value="2 months">
									<label for="twoMonth">2 months</label>
								</div>
								<div class="radio-date-list">
									<input type="radio" id="threeMonth" name="expected-month" value="3 months">
									<label for="threeMonth">3 months</label>
								</div>
								<div class="radio-date-list">
									<input type="radio" id="sixMonth" name="expected-month" value="6 months">
									<label for="sixMonth">6 months</label>
								</div>
							</div>
						</div>

						<div class="nda-button">
							<input type="checkbox" id="ndaButton" name="nda" value="Send me NDA">
							<label for="ndaButton">Send me NDA
								<div class="info-box">
									<em>i</em>
									<span class="info">A non-disclosure agreement (NDA) is a legally binding contract that establishes a confidential relationship. The party or parties signing the agreement agree that sensitive information they may obtain will not be made available to any others. An NDA may also be referred to as a confidentiality agreement. (credit: Investopedia)</span>
								</div>
							</label>
						</div>
						<div class="form-group">
							<div class="quizQ">
								<span id="j-quiz"></span>
								<a href="javascript:void(0)" ;="" class="refreshbtn" onclick="generateWsQuiz();"></a>
							</div>
							<span class="equal">=</span>
							<div class="quizAns">
								<input type="text" name="captcha" placeholder="??" id="j-quiz-ans" 
								onkeypress="cap_limit(this);">
								<span class="error" id="captchaerror"></span>
							</div>
						</div>
						<div class="user-input checkout">
							<input type="hidden" name="Uploadedfilename" id="Uploadedfilename" value="">
							<input type="hidden" name="frmqueryString" value="">
							<input type="hidden" name="page_url" value="">
							<!--
							<div class="h-captcha" data-sitekey="9ed407d3-0ac1-4710-9f3e-9850bb57f5d8"></div> 
							<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
							<input type="hidden" name="action" value="validate_captcha">
							-->
							
							<input type="submit" id="submitButton" class="checkout-submit" value="Send your request" />
						</div>
						<div class="akshay-hiddne">
						</div>
						<p class="note">Note : We Respect Your Privacy! Your details will never be shared with anyone for marketing purposes.</p>

					</div>
					<!-- step close -->
				</form>
			</div>

			<div class="trusted-logos">
				<div class="dis-flex items-center justify-sb">
					<span class="text-box">Trusted By</span>
					<div class="logo-box">
						<picture>
							<source type="image/webp" srcset="<?=HOST_URL?>images/trusted-logos.webp">
							<source type="image/png" srcset="<?=HOST_URL?>images/trusted-logos.png">
							<img loading="lazy" src="<?=HOST_URL?>images/trusted-logos.png" alt="Valuecoders" width="786" height="104"> 
						</picture>

					</div>
				</div>
			</div>

		</div>


		<div class="form-footer dis-flex">
			<div class="left-block">
				<a href="mailto:sales@valuecoders.com"> <span class="title">Email Us</span> sales@valuecoders.com</a>
				<a href="tel:+917042020782"><span class="title">Whatsapp</span> +91 7042020782</a>
			</div>
			<div class="mid-block dis-flex">
				<div class="flex-2">
					<a href="tel:+917042020782"><span class="title">INDIA</span> +91 704 202 0782</a>
				</div>
				<div class="flex-2">
					<a href="tel:+442032392299"><span class="title">UK</span> +44 20 3239 2299</a>
				</div>
				<div class="flex-2">
					<a href="tel:+14152300123"><span class="title">USA</span> +1 415 230 0123</a>
				</div>
				<div class="flex-2">
					<a href="tel:+61280058080"><span class="title">AUS</span> +61 2 8005 8080</a>
				</div>
			</div>
			<div class="last-block">
				<ul>
					<li><strong>Gurugram :</strong> 2nd Floor, 55P, Sector 44, Gurugram 122003, Haryana</li>
					<li><strong>Noida :</strong>  3rd Floor, Fusion Square, 5A & 5B, Sector 126, Noida 201303</li>
					<li><strong>Mohali :</strong> Bestech Business Tower, B- 4th floor 401, Sahibzada Ajit Singh Nagar, Punjab 160062</li>
				</ul>
			</div>
		</div>


	</div>
</section>

<?php require_once 'include/footer.php'; ?>
<script defer src="<?=HOST_URL?>js/form-validation.js"></script>


<script>
	const phoneInputField = document.querySelector("#pcode");
       	window.intlTelInput(phoneInputField, {
      	utilsScript: "http://localhost/valuecoders-v2/js/utils.js",
    	});
       	document.addEventListener("DOMContentLoaded", function() {
  			let title 		= document.getElementsByClassName('iti__selected-flag');
  			let phoneInp 	= document.getElementById('pcode');
  			title 			= title[0].getAttribute('title');
  			let res 		= title.replace(/\D/g, "");
  			phoneInp.value = '+'+res + ' ';
		});

		document.addEventListener('click', function (event) {
		let phoneInp 	= document.getElementById('pcode');	
		if (event.target.matches('.iti__country')){
		let title 		= document.getElementsByClassName('iti__selected-flag');	
		title 			= title[0].getAttribute('title');
		let res 		= title.replace(/\D/g, "");
  			phoneInp.value = '+'+res + ' ';
		}
		event.preventDefault();
	}, false);

</script>

</body>
</html>

