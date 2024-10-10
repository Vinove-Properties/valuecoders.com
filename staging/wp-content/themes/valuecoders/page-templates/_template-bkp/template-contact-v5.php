<?php
/*
Template Name: Contact Page - v5 {FLAGS} Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="contact-us-section full-width-form padding-t-150 padding-b-150">


	<div class="container">		
		<div class="bg-voilet">
			<div class="form-box-outer right-box" style="padding-top:40px;">
				<div class="head-txt">
					<div class="logo-box"></div>
					<div class="head-box">
						<h1>Get In Touch</h1>
						<p>Hire Us And Work With The World-Class Software Development Teams.</p>
					</div>
				</div>
				<form action="<?php bloginfo('url'); ?>/sendmail1.php" enctype="multipart/form-data" method="POST" id="contact-form-section"  onsubmit="return vcCmnFormValidation();"  style="margin-top:40px;">
					<div id="vc-fstep1" class="step-one">
					<div class="step-head active">
						<h2>Your Information</h2>
					</div>	
					<div class="form-inner dis-flex">
						<div class="form-text-cont">
							<div class="lbl-row">
								<label for="cont_name">Full Name*</label>
							</div>
							<div class="user-input">
								<input type="text" id="cont_name" placeholder="Enter your full name" class="input-field" value="" maxlength="50" name="user-name" />
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont">
							<div class="lbl-row">
								<label for="cont_email">Email Address*</label>
								<span class="req-block">Required Fields*</span>
							</div>							
							<div class="user-input">
								<input type="text" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$" placeholder="Enter your email address" class="input-field" value="" maxlength="50" name="user-email" id="cont_email" />
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont cont_country_section">
							<div class="row-left">
								<label for="cont_phpne">Phone no*</label>
								<input type="hidden" id="cont_country" value="in" name="user-country">
								<div class="user-input">
										<input id="pcode" type="text" name="cprefix" class="pcode-prefix" 
										onkeydown="return false;" 
										onmousedown="return false;">
										<input id="cont_phpne" type="tel" maxlength="12" name="user-phone" class="input-field flg-input">
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

						<div class="form-text-cont">
							<div class="lbl-row"><label for="user-company">Company Name*</label></div>
							<div class="user-input">
								<input class="input-field input-skype" id="user_company" type="text" placeholder="Enter your Company Name" maxlength="50" autocomplete="off" value="" name="user-company" />
								<small>Error Message</small>
							</div>
						</div>

						
						<a class="nxt-btn" href="javascript:void(0);" onclick="vcStepOneCheckert();">Save and Continue</a>
						</div>
						<br>
						<br>
						<div class="step-head">
						<h2>Your Requirements</h2>
						</div>
						</div><!--//Setp 1 Ends Here -->

						<div id="vc-fstep2" class="step-two" style="display:none;">
						<div class="step-head-outer">

							<div class="step-head contact-info">
								<h2>Contact Information</h2>
								<a href="javascript:void(0);" onclick="dovcstep_one();" class="edit-txt">Edit</a>
							</div>

							<div class="form-text-selected-outer dis-flex">
								<div class="form-text-selected">
									<label for="focusInput">Full Name:</label>
									<div class="user-input-selected">
										<span id="span-name"></span>
									</div>
								</div>
								<div class="form-text-selected">
									<label>Email Address:</label>
									<div class="user-input-selected">
										<span id="span-email"></span>
									</div>
								</div>
								<div class="form-text-selected">
									<label>Phone No :</label>
									<div class="user-input-selected">
										<span id="span-phone"></span>
									</div>
								</div>
								<div class="form-text-selected">
									<label>Company:</label>
									<div class="user-input-selected">
										<span id="span-company"></span>
									</div>
								</div>

							</div>
						</div>
						<div class="step-head active">
							<h2>Your Requirements</h2>
						</div>
						<div id="help-ul" class="form-text-cont width-full">
							<div class="lbl-row">
								<label>How can we help?*</label>
							</div>							
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

						<div id="exp-date-row" class="form-text-cont width-full">
							<div class="lbl-row">
								<label>What is the expected start date?*</label>
							</div>						
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
						<div class="radio-date opt-div" id="radio-date" style="display:none; margin-bottom:30px;">
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
						<div class="form-text-cont width-full opt-div" id="team-ext-col" style="display:none;">
						<div id="many-eng" class="form-text-cont width-full">
							<div class="lbl-row">
								<label>How many engineers would you like to add?*</label>
							</div>
							
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
							<div class="lbl-row">
								<label>For how long will you need these engineers?*</label>
							</div>
							
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
							<div class="lbl-row">
								<label>Requirement*</label>
							</div>
							
							<div class="user-input">
								<textarea class="input-field comment-input" placeholder="What Can We Do For You?" id="user-req" name="user-req"></textarea>
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
					<div class="nda-button">
						<input type="checkbox" id="ndaButton" name="nda" value="Send me NDA">
						<label for="ndaButton">Send me NDA
							<div class="info-box">
								<em>i</em>
								<span class="info">A Non Disclosure Agreement is a legally binding contract that establishes a confidential relationship. The party or parties signing the agreement agree that sensitive information they may obtain will not be made available to any others. An NDA may also be referred to as a confidentiality agreement. (credit: Investopedia)</span>
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
						<input type="hidden" name="frmqueryString" value="<?php the_permalink(); ?>">
						<input type="hidden" name="page_url" value="<?php the_permalink(); ?>">
						<input type="hidden" name="vform-type" value="contact">
						<input type="submit" id="submitButton" class="checkout-submit" value="Send your request" />
					</div>
					<p class="note">Note : We Respect Your Privacy! Your details will never be shared with anyone for marketing purposes.</p>
					</div><!-- //Step - 2 #Ends -->
				</form>
			</div>

			<div class="trusted-logos">
				<div class="dis-flex items-center justify-sb">
					<span class="text-box">Trusted By</span>
					<div class="logo-box">
						<picture>
							<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/trusted-logos.webp">
							<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/trusted-logos.png">
							<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/trusted-logos.png" 
							alt="Valuecoders" width="786" height="104"> 
						</picture>

					</div>
				</div>
			</div>

		</div>
		<div class="form-footer dis-flex">
			<div class="left-block">
				<a href="mailto:sales@valuecoders.com"> <span class="title">Email Us</span> sales@valuecoders.com</a>
				<a href="tel:+917042020782"><span class="title">Whatsapp</span> +91 704 202 0782</a>
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
<style type="text/css">
.cont_country_section{
position: relative;
}
.autocomplete-items {
    position: absolute;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    top: 100%;
    left: 0;
    right: 0;
    overflow: auto;
    min-height: 50px;
    height: 150px;
    /*background: #181732;*/
}
.autocomplete-items div {
    padding: 10px;
    cursor: pointer;
    color: #000;
    border-bottom: 1px solid #d4d4d4;
}
.err{
    border:1px solid red !important;
    color:red;
}
.onfcs{
    border:0px solid red !important;
    color:black;
}
#drop-area.highlight {
  /*border-color: purple;*/
}
p {
  margin-top: 0;
}
.my-form {
  margin-bottom: 10px;
}
#gallery img {
    width: auto;
    height: 54px;
    margin-bottom: 10px;
    margin-right: 10px;
    vertical-align: middle;
}
/*#gallery img {
  width: 100px;
  margin-bottom: 10px;
  margin-right: 10px;
  vertical-align: middle;
}*/
.button {
 /* display: inline-block;
  padding: 10px;
  background: #ccc;
  cursor: pointer;
  border-radius: 5px;
  border: 1px solid #ccc;*/
  background: #60b741;
    border: 0;
    outline: 0;
    color: #1d1c39;
    padding: 12px 27px;
    font-size: 18px;
    font-weight: 500;
    text-transform: capitalize;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    cursor: pointer;
    transition: all .3s ease-in-out;
    letter-spacing: .5px;
    border-radius: 4px;
    font-weight: 600;
}
.button:hover {
  background: #ddd;
}
#fileElem {
  display: none;
}
.form-control.success input {
    border-color: #2ecc71;
}

.form-control.success small{
	visibility: hidden;
}

.form-control.verror input {
    border-color: #e74c3c;    
}

.user-input.form-control.verror:focus-visible{
	border-color: #e74c3c !important;  
}
.form-control.verror small{
    visibility: visible;
}
.user-input.form-control.success input {
    color: #60b741!important;
}
.user-input.form-control.verror input {
   color: red!important;
}
button {
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
	text-decoration:underline;
}
<but
</style>
<script type="text/javascript">
function upload_file(e) {
    e.preventDefault();
    ajax_file_upload(e.dataTransfer.files);
}
  
function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        files = document.getElementById('selectfile').files;
        ajax_file_upload(files);
    };
}
  
function ajax_file_upload(files_obj) {
	let gloader = document.getElementById('gloader');
	gloader.classList.add("active");
    if(files_obj != undefined) {
        var form_data = new FormData();
        for(i=0; i<files_obj.length; i++) {
            form_data.append('file[]', files_obj[i]);
        }
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "ajax.php", true);
        xhttp.onload = function(event) {
            if (xhttp.status == 200) {
                alert(this.responseText);
            } else {
                alert("Error " + xhttp.status + " occurred when trying to upload your file.");
            }
            gloader.classList.add("active");
        }
 
        xhttp.send(form_data);
    }
}

// ************************ Drag and drop ***************** //
let dropArea = document.getElementById("drop-area")

// Prevent default drag behaviors
;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false)   
  document.body.addEventListener(eventName, preventDefaults, false)
})

// Highlight drop area when item is dragged over it
;['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, highlight, false)
})

;['dragleave', 'drop'].forEach(eventName => {
	//console.log(eventName);
  	dropArea.addEventListener(eventName, unhighlight, false)
})

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false)

function preventDefaults (e) {
  e.preventDefault()
  e.stopPropagation()
}

function highlight(e) {
  dropArea.classList.add('highlight')
}

function unhighlight(e) {
  dropArea.classList.remove('active')
}

function handleDrop(e) {
  var dt = e.dataTransfer
  var files = dt.files

  handleFiles(files)
}

let uploadProgress = []
let progressBar = document.getElementById('progress-bar')

function initializeProgress(numFiles) {
  progressBar.value = 0
  uploadProgress = []

  for(let i = numFiles; i > 0; i--) {
    uploadProgress.push(0)
  }
}

function setFileError( msg ){
	let fcontainer = document.getElementById('file-type-error');
	fcontainer.innerHTML = msg;
	setTimeout(function(){
		fcontainer.innerHTML = "";
	}, 3000);
}

function updateProgress(fileNumber, percent) {
  uploadProgress[fileNumber] = percent
  let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
  progressBar.value = total
}

function handleFiles(files){
	//alert( files.length );
	setFileError("");
	let uldCounter 	= document.getElementById("uplcounter");
	if( parseInt(uldCounter.value) >= 10 ){
		setFileError( "You can not upload more then 10 media files." );
		return;
	}
	let allFcount = (files.length + parseInt(uldCounter.value))
	if( parseInt(allFcount) > 10 ){
		setFileError( "You can not upload more then 10 media files." );
		return;
	}

	let preuploaded = document.getElementById('Uploadedfilename').value;
	if( preuploaded ){
		let prefiles = preuploaded.split(",");
		if( prefiles.length > 10 ){
			setFileError( "You can not upload more then 10 media files." );
			return;	
		}
	}	
	if( files.length > 10 ){
		setFileError( "You can not upload more then 10 media files." );
		return;
	}
	files = [...files]
	initializeProgress(files.length)
	files.forEach(uploadFile)
	//files.forEach(previewFile)
}
//Remove Fle
function removeMe(e,imageName){
	let uldCounter = document.getElementById("uplcounter");
	let gloader 	= document.getElementById('gloader');
	let gallery 	= document.getElementById('gallery');	
	//gloader.classList.add("show-me");
	setFileError("");
	const xhttp = new XMLHttpRequest(); 
	xhttp.open("GET", "<?php bloginfo('url'); ?>/delete_file.php?delete=1&imageName="+imageName, true);
	xhttp.onreadystatechange = function () {
	        if (this.readyState == 4 && this.status == 200) {
	        	let counterValue = parseInt(uldCounter.value);
        		counterValue--;
        		uldCounter.value = counterValue;

	        	var fileName=document.getElementById('Uploadedfilename').value;
	        	newStr = fileName.replace(imageName, '');
	        	document.getElementById('Uploadedfilename').value=newStr;
	            console.log(this.responseText);
	            e.parentNode.remove();
	            if(!gallery.hasChildNodes()){gloader.classList.remove("show-me");}
	        }
	    }
	xhttp.send();
 
}
//End Remove Fle

function uploadFile(file, i) {
		setFileError("");
		let uldCounter 	= document.getElementById("uplcounter");
		if( parseInt(uldCounter.value) >= 10 ){
			setFileError( "You can not upload more then 10 media files." );
			return;
		}

		let gloader 	= document.getElementById('gloader');
		gloader.classList.add("show-me");
		gloader.classList.add("active");
		
		const fileSize = file.size / 1024 / 1024;
		if( fileSize > 20 ){
			setFileError("ERROR Uploaded document exceeds the maximum size limit of 20 MB");
			gloader.classList.remove("active");
			return;
		}

  		// if(files_obj != undefined) {
	    var form_data = new FormData();
	    form_data.append('file', file)
	    var xhttp = new XMLHttpRequest();
	    xhttp.open("POST", "<?php bloginfo('url'); ?>/file-uploader.php", true);
	    xhttp.onload = function(event) {
	        if (xhttp.status == 200) {
	        	let response =  JSON.parse(xhttp.responseText);	        	
	        	console.log( response );
	        	if( response.status == true ){
	        		let counterValue = parseInt(uldCounter.value);
	        		counterValue++;
	        		uldCounter.value = counterValue;
	        		let existingVal = document.getElementById('Uploadedfilename').value;
					if( existingVal == '' ){
						document.getElementById('Uploadedfilename').value = response.file;						
					}else{
						document.getElementById('Uploadedfilename').value = existingVal + response.file;
					}

				let reader = new FileReader()
				  reader.readAsDataURL(file)
				  reader.onloadend = function() {
				  	let indiv 	= document.createElement('div');
				  	let icon 	= '';
				  	console.log( file.type );
				  	switch (file.type) {
						case 'application/pdf':
						    icon = "<?php bloginfo('template_url') ?>/dev-img/pdf_gy.png";     
						    break;
						case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
						    icon = "<?php bloginfo('template_url') ?>/dev-img/doc_gy.png"; 
						    break;
						case 'text/plain':
						    icon = "<?php bloginfo('template_url') ?>/dev-img/doc_gy.png"; 
						    break;    
						case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
						    icon =  "<?php bloginfo('template_url') ?>/dev-img/xls_gy.png"; 
						    break;
						case 'application/vnd.ms-excel':
						    icon =  "<?php bloginfo('template_url') ?>/dev-img/xls_gy.png"; 
						    break;    
						case 'image/vnd.adobe.photoshop':
						    icon = "<?php bloginfo('template_url') ?>/dev-img/psd_gy.png";
						    break;
						case 'application/x-zip-compressed':
						    icon = "<?php bloginfo('template_url') ?>/dev-img/zip_gy.png";
						    break;
						case 'application/zip':
						    icon = "<?php bloginfo('template_url') ?>/dev-img/zip_gy.png";
						    break;						    
						default:
							icon = "<?php bloginfo('template_url') ?>/dev-img/def-thumb.png";
							break;
					}
					//if size exceed than 10 MB
				        if(file.size > 10000000 && file.type == 'image/jpeg') {
				           	icon = "<?php bloginfo('template_url') ?>/dev-img/jpg_gy.png" ;
				        } else if(file.size > 10000000 && file.type == 'image/png') {
				           	icon = "<?php bloginfo('template_url') ?>/dev-img/png_gy.png";
				        }
				        indiv.innerHTML = '<img src="'+icon+'" height="55" width="55"><button type="button" onclick="return removeMe(this,this.value);" value="'+response.file+'">X</button></span>';
						document.getElementById('gallery').appendChild(indiv);
					}

// End Preview File
	        	}else{
	        		setFileError( response.message );
	        	}
	        }else{
	            console.log("error");
	        }
	        gloader.classList.remove("active");
	    }
	    xhttp.send(form_data);
	// }
}
</script>
<style type="text/css">
li.iti__country{z-index: 9999;}
.flg-container{z-index: -9; pointer-events: none;}
</style>
<?php get_footer(); ?>