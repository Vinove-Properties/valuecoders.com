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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="/valuecoders-v2/js/intlTelInput.js"></script>


</head>
<body id="themeAdd">
<?php require_once 'include/menu.php'; ?>

<section class="contact-us-section full-width-form padding-t-150 padding-b-150">


	<div class="container">
		<div class="bg-voilet">
			<div class="form-box-outer right-box">
				<div class="head-txt text-center">
					<h1>Get in touch</h1>
					<p>Hire us and work with the world-class software development teams.</p>
				</div>
				<form action="https://www.valuecoders.com/sendmail1.php" enctype="multipart/form-data" method="POST">
					<div class="form-inner dis-flex">
						<div class="form-text-cont">
							<label for="focusInput">Full Name*</label>
							<div class="user-input">
								<input type="text" id="cont_name" placeholder="Enter your full name" class="input-field" value="" name="user-name" />
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont">
							<label>Email Address*</label>
							<div class="user-input">
								<input type="text" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$" placeholder="Enter your email address" class="input-field" value="" name="user-email" id="cont_email" />
								<small>Error Message</small>
							</div>
						</div>					
						<div class="form-text-cont">
							<label>Skype ID</label>
							<div class="user-input">
								<input type="text" class="input-field" placeholder="Enter your Skype ID" value="" id="cont_phpne" 
								name="user-phone"/>
							</div>
						</div>

						<div class="country-form form-text-cont">
							<label>Phone no*</label>
							<div id="lookup">
								<input id="phone" type="tel" name="phone" class="input-field">
							</div>
						</div>

						<!-- #new Fields Add Here -->
						<div id="help-ul" class="form-text-cont width-full">
							<label>How can we help?</label>
							<div class="select-box active input-field" onclick="apnSelect('help-ul');">
								<a href="javascript:void(0);" class="select-first" id="label-wehelp">Please Select from the dropdown</a> <span class="arrow-btn"></span>
							</div>
							<div class="select-list">
								<ul class="in-options">
									<li onclick="setoptValue('Team Extension', 'team-ext-col', 'label-wehelp', 
									'inp-we-help', 'help-ul');">Team Extension (Staff Augmentation)
										<div class="info-box">
											<em>i</em>
											<span class="info">Augment your team with worldclass software engineers.</span>
										</div>
									</li>
									<li onclick="setoptValue('Dedicated Software Team', 'target-div', 'label-wehelp', 'inp-we-help', 'help-ul');">Dedicated Software Team
										<div class="info-box">
											<em>i</em>
											<span class="info">Augment your team with worldclass software engineers.</span>
										</div>
									</li>
									<li onclick="setoptValue('Software Development', 'target-div', 'label-wehelp', 'inp-we-help', 'help-ul');">Software Development
										<div class="info-box">
											<em>i</em>
											<span class="info">Augment your team with worldclass software engineers.</span>
										</div>
									</li>
									<li onclick="setoptValue('Other Technology Needs', 'target-div', 'label-wehelp', 'inp-we-help', 'help-ul');">Other Technology Needs
										<div class="info-box">
											<em>i</em>
											<span class="info">Augment your team with worldclass software engineers.</span>
										</div>
									</li>
									<li onclick="setoptValue('None of the above', 'target-div', 'label-wehelp', 
									'inp-we-help', 'help-ul');">None of the above
										<div class="info-box">
											<em>i</em>
											<span class="info">Augment your team with worldclass software engineers.</span>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="form-text-cont width-full opt-div" id="team-ext-col" style="display:none;">
						<div id="many-eng" class="form-text-cont width-full">
							<label>How many engineers would you like to add?</label>
							<div class="select-box active input-field"  onclick="apnSelect('many-eng');">
							<a href="javascript:void(0);" id="label-resource-count" class="select-first">Please Select from the dropdown</a> <span class="arrow-btn"></span>
							</div>
							<div class="select-list">
								<ul class="in-options">
									<li onclick="setoptValue('More than 10', 'sub-opt', 'label-resource-count', 'inp-resources', 'many-eng');">More than 10</li>
									<li onclick="setoptValue('More than 20', 'sub-opt', 'label-resource-count', 'inp-resources', 'many-eng');">More than 20</li>
								</ul>
							</div>
						</div>

						<div id="how-long" class="form-text-cont width-full">
							<label>For how long will you need these engineers?</label>
							<div class="select-box active input-field" onclick="apnSelect('how-long');">
								<a href="javascript:void(0);" id="label-howlong" class="select-first">Please Select from the dropdown</a> 
								<span class="arrow-btn"></span>
							</div>
							<div class="select-list">
								<ul class="in-options">
									<li onclick="setoptValue('1-3 Months', 'sub-opt', 'label-howlong', 'inp-howlong', 
									'how-long');">1-3 Months</li>
									<li onclick="setoptValue('3-6 Months', 'sub-opt', 'label-howlong', 'inp-howlong', 
									'how-long');">3-6 Months</li>
									<li onclick="setoptValue('6+ Months', 'sub-opt', 'label-howlong', 'inp-howlong', 
									'how-long');">6+ Months</li>
								</ul>
							</div>
						</div>
						</div>

						<div id="exp-date-row" class="form-text-cont width-full">
							<label>What is the expected start date?</label>
							<div class="select-box active input-field" onclick="apnSelect('exp-date-row');">
								<a href="javascript:void(0);" id="label-expdate" class="select-first">Please Select from the dropdown</a> 
								<span class="arrow-btn"></span>
							</div>
							<div class="select-list">
								<ul class="in-options">
									<li onclick="setoptValue('I am already late, Immediately', 'sub-opt', 'label-expdate', 'inp-expdate', 
									'exp-date-row');">I am already late, Immediately</li>
									<li onclick="setoptValue('When I get internal funding/approval', 'sub-opt', 'label-expdate', 'inp-expdate', 
									'exp-date-row');">When I get internal funding/approval</li>
									<li onclick="setoptValue('Specify a date', 'sub-opt', 'label-expdate', 'inp-expdate', 
									'exp-date-row');">Specify a date</li>
									<li onclick="setoptValue('I don\'t know', 'sub-opt', 'label-expdate', 'inp-expdate', 
									'exp-date-row');">I don't know</li>
									
								</ul>
							</div>

							<div class="radio-date">
								<div class="radio-date-list">
									<input type="radio" id="oneMonth" name="month" value="1 month" checked>
									<label for="oneMonth">1 month</label>
								</div>
								<div class="radio-date-list">
									<input type="radio" id="twoMonth" name="month" value="2 months">
									<label for="twoMonth">2 months</label>
								</div>
								<div class="radio-date-list">
									<input type="radio" id="threeMonth" name="month" value="3 months">
									<label for="threeMonth">3 months</label>
								</div>
								<div class="radio-date-list">
									<input type="radio" id="sixMonth" name="month" value="6 months">
									<label for="sixMonth">6 months</label>
								</div>
							</div>
						</div>

						<div class="form-text-cont width-full">
							<label>Requirement*</label>
							<div class="user-input">
								<textarea class="input-field comment-input" placeholder="Project Brief" id="user-req" name="user-req"></textarea>
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
					</div>

					<div class="gal-loader">
						<div class="loader"></div>
						<div id="gallery">
							<div>
								<img src="https://www.valuecoders.com/common/images-2/pdf_gy.png" height="55" width="55">
								<button type="button" onclick="return removeMe(this,this.value);" value="1651823927_8021509220220119170917MRSAAKANSHA30YFemale.PDF,">X</button>
							</div>
							<div>
								<img src="https://www.valuecoders.com/common/images-2/pdf_gy.png" height="55" width="55">
								<button type="button" onclick="return removeMe(this,this.value);" value="1651823927_V5578Neeraj-Rai-Appointment-letter-VC.pdf,">X</button>
							</div>
							<div>
								<img src="https://www.valuecoders.com/common/images-2/pdf_gy.png" height="55" width="55">
								<button type="button" onclick="return removeMe(this,this.value);" value="1651823933_V5634-Nitin-Baluni-Annual-PMS-Form-April-2022.pdf,">X</button>
							</div>
							<div>
								<img src="https://www.valuecoders.com/common/images-2/pdf_gy.png" height="55" width="55">
								<button type="button" onclick="return removeMe(this,this.value);" value="1651823933_V5599-Priyanka-Panwar-Annual-PMS-Form-April-2022.pdf,">X</button>
							</div>
							<div>
								<img src="https://www.valuecoders.com/common/images-2/pdf_gy.png" height="55" width="55">
								<button type="button" onclick="return removeMe(this,this.value);" value="1651823933_V5599Offer-Letter.pdf,">X</button>
							</div>
							<div>
								<img src="https://www.valuecoders.com/common/images-2/pdf_gy.png" height="55" width="55">
								<button type="button" onclick="return removeMe(this,this.value);" value="1651823933_V5623Offer-Letter.pdf,">X</button>
							</div>
							<div>
								<img src="https://www.valuecoders.com/common/images-2/pdf_gy.png" height="55" width="55">
								<button type="button" onclick="return removeMe(this,this.value);" value="1651823943_wp-rocket3106-Plugin.zip,">X</button>
							</div>
							<div>
								<img src="https://www.valuecoders.com/common/images-2/pdf_gy.png" height="55" width="55">
								<button type="button" onclick="return removeMe(this,this.value);" value="1651823972_Estimation-1.xls,">X</button>
							</div>
							<div>
								<img src="https://www.valuecoders.com/common/images-2/pdf_gy.png" height="55" width="55">
								<button type="button" onclick="return removeMe(this,this.value);" value="1651823976_1648553812OVERVIEW-AP.pdf,">X</button>
							</div>
							<div>
								<img src="https://www.valuecoders.com/common/images-2/pdf_gy.png" height="55" width="55">
								<button type="button" onclick="return removeMe(this,this.value);" value="1651824041_php-icon.png,">X</button>
							</div>
						</div>
					</div>

					<div class="nda-button">
						<input type="checkbox" id="ndaButton" name="nda" value="Send me NDA">
						<label for="ndaButton">
							Send me NDA
							<div class="info-box">
								<em>i</em>
								<span class="info">A non-disclosure agreement (NDA) is a legally binding contract that establishes a confidential relationship. The party or parties signing the agreement agree that sensitive information they may obtain will not be made available to any others. An NDA may also be referred to as a confidentiality agreement. (credit: Investopedia)</span>
							</div>
						</label>
					</div>

					<!--Quiz  -->
					<div class="form-group">
						<div class="quizQ">
							<span id="j-quiz"></span>
							<a href="javascript:void(0)" ;="" class="refreshbtn" onclick="generateWsQuiz();"></a>
						</div>
						<span class="equal">=</span>
						<div class="quizAns">
							<input type="text" name="captcha" placeholder="??" id="j-quiz-ans">
							<!-- <span class="error" id="captchaerror">Invalid Answer</span> -->
						</div>
					</div>

					<div class="user-input checkout">
						<input type="submit" id="submitButton" class="checkout-submit" value="Send your request" />
					</div>

					<p class="note">Note : We Respect Your Privacy! Your details will never be shared with anyone for marketing purposes.</p>


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
				<span class="title">Email Us</span>
				<a href="mailto:sales@valuecoders.com">sales@valuecoders.com</a>
				<span class="title">Whatsapp</span>
				<a href="tel:+917042020782">+917042020782</a>
			</div>
			<div class="mid-block dis-flex">
				<div class="flex-2">
					<span class="title">INDIA</span>
					<a href="tel:+917042020782">+91 704 202 0782</a>
				</div>
				<div class="flex-2">
					<span class="title">UK</span>
					<a href="tel:+442032392299">+44 20 3239 2299</a>
				</div>
				<div class="flex-2">
					<span class="title">USA</span>
					<a href="tel:+14152300123">+1 415 230 0123</a>
				</div>
				<div class="flex-2">
					<span class="title">AUS</span>
					<a href="tel:+61280058080">+61 2 8005 8080</a>
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


<script>

function setoptValue( val, target, label, input, parent_col){
	let prDiv 		= document.getElementById( parent_col );
	let arrow 		= prDiv.getElementsByClassName('arrow-btn');
	let select 		= prDiv.getElementsByClassName('in-options');	
	let labelSpan 	= document.getElementById( label );
	let inputSpan 	= document.getElementById( input );	
	let divTarget 	= document.getElementById( target );		
	
	if( target !== "sub-opt" ){
		[].forEach.call(document.querySelectorAll('.opt-div'), function (el) {
			el.style.display = 'none';
		});	
	}
	
	if( divTarget ){
		divTarget.style.display = "block";
	}

	arrow[0].classList.toggle('rotate');
	select[0].classList.toggle('open-close');
	labelSpan.innerHTML = val;
	inputSpan.value = val;
}

function apnSelect(target){
	let divTarget 	= document.getElementById( target );
	let arrow 		= divTarget.getElementsByClassName('arrow-btn');
	let select 		= divTarget.getElementsByClassName('in-options');	
	arrow[0].classList.toggle('rotate');
	select[0].classList.toggle('open-close');
}

</script>


<!-- add -->
<script>
      	const phoneInputField = document.querySelector("#phone");
       	window.intlTelInput(phoneInputField, {
      	utilsScript: "http://localhost/valuecoders-v2/js/utils.js",
    	});
       	document.addEventListener("DOMContentLoaded", function() {
  			let title 		= document.getElementsByClassName('iti__selected-flag');
  			let phoneInp 	= document.getElementById('phone');
  			title 			= title[0].getAttribute('title');
  			let res 		= title.replace(/\D/g, "");
  			phoneInp.value = '+'+res + ' ';
		});

		document.addEventListener('click', function (event) {
		let phoneInp 	= document.getElementById('phone');	
		if (event.target.matches('.iti__country')){
		let title 		= document.getElementsByClassName('iti__selected-flag');	
		title 			= title[0].getAttribute('title');
		let res 		= title.replace(/\D/g, "");
  			phoneInp.value = '+'+res + ' ';
		}
		event.preventDefault();
		}, false);
	
		var jQuizExists = document.getElementById("j-quiz");
		if (jQuizExists) {
			generateWsQuiz();
		}
		function generateWsQuiz() {
			let n1 = Math.floor(Math.random() * 9) + 1;
			let n2 = Math.floor(Math.random() * 9) + 1;
			document.getElementById("j-quiz").textContent = n1 + " + " + n2;
		}
		function ws_numcheck(evt, val) {
			var theEvent = evt || window.event;
			if (theEvent.type === "paste") {
				key = event.clipboardData.getData("text/plain");
			} else {
				var key = theEvent.keyCode || theEvent.which;
				key = String.fromCharCode(key);
			}
			var regex = /[0-9]|\./;
			if (!regex.test(key) || val.value.length > 1) {
				theEvent.returnValue = false;
				if (theEvent.preventDefault) theEvent.preventDefault();
			}
		}


    </script>
</body>
</html>

