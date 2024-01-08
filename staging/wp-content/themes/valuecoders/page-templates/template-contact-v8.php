<?php
/*
Template Name: Contact Page - v8 {remove-flag} Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<div class="contact-wrap">
<section class="contact-us-section full-width-form padding-b-150">
	<div class="container">
		<div class="dis-flex form-outer">
		<div class="form-left">
		<div class="bg-voilet">
			<div class="form-box-outer right-box" style="padding-top:100px;">
				<div class="head-txt">
					<div class="logo-box"><a href="<?php bloginfo('url'); ?>"></a></div>
					<div class="head-box">
					<h1>Get In Touch</h1>
					<p>Our consultants will respond back within 8 business hours or less.</p>
					<!-- 
					<p>Hire Us And Work With The World-Class Software Development Teams.</p>
					-->
					</div>
				</div>
			<form action="<?php bloginfo('url'); ?>/sendmail1.php" enctype="multipart/form-data" method="POST" id="contact-form-section" onsubmit="vcCmnFormValidation(); return false;"  style="margin-top:40px;">
					<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
					<div id="vc-fstep1" class="step-one version-8">
					<div class="step-head active">
						<div><h2 id="uinfo">Your Information</h2>
						<span>(Step 1 of 2)</span></div>
						<span class="req-block">Required Fields*</span>
					</div>	
					<div class="form-inner dis-flex">
						<div class="form-text-cont">
							<div class="lbl-row">
								<label for="cont_name">Full Name *</label>								
							</div>
							<div class="user-input">
								<input type="text" id="cont_name" class="input-field" value="" maxlength="50" name="user-name" />
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont">
							<div class="lbl-row">
								<label for="cont_email">Email Address *</label>
								
							</div>							
							<div class="user-input">
								<input type="text" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$" class="input-field" value="" maxlength="50" name="user-email" id="cont_email" />
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont">
							<div class="lbl-row">
								<label for="cont_country">Country *</label>
							</div>
							<div class="user-input">
								<input type="text" class="input-field" id="cont_country" value="" name="user-country" maxlength="50" autocomplete="off">
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont">
							<div class="lbl-row">
								<label for="cont_phpne">Phone Number *</label>
							</div>
							<div class="user-input">
								<input id="cont_phpne" type="tel" maxlength="30" name="user-phone" class="input-field flg-input">
								<small>Error Message</small>
							</div>
						</div>	
						<div class="form-text-cont step-one-select">
							<div class="user-input">
								<label for="select-wehelp">How can we help? *</label>
								<select class="wide selectize" name="we-help" id="select-wehelp" style="display:none;">
									<option value="">Select</option>
									<option value="Software Development" title="For custom software development and fixed cost projects.">Software Development</option>	
									<option value="Team Extension" title="Augment your team with expert software engineers.">Team Extension (Staff Augmentation)</option>
									<option value="Dedicated Software Team" title="Dedicated autonomous software product engineering teams comprising of multiple skills.">Dedicated Software Team</option>
									<option value="Other Technology Needs" title="Any other world-class technology solution that you may need.">Other Technology Needs</option>
									<option value="career" title="Join the team of Experts & work in ValueCoders.">Looking for a Job/Careers</option>
									<option value="None of the above" title="Connect with our business consultant to discuss your requirements.">None of the above</option>
								</select>
								<small>Error Message</small>
							</div>
						</div>
						<div class="nxt-btn-box">
						<input type="hidden" name="z-leadid" id="zlead-id" value="0">	
						<button class="nxt-btn" id="btn-step-one" type="button" onclick="vcStepOneCheckert(); return false;">Continue</button>
						</div>
						</div>
						<br>
						<br>
						</div><!--//Setp 1 Ends Here -->

						<div id="vc-fstep2" class="step-two" style="display:none;">
						<div class="step-head-outer">
							<div class="step-head contact-info">
								<div class="h2-spn">
								<h2>Contact Information</h2>
								<span>(Step 1 of 2)</span>
								</div>
								<a href="javascript:void(0);" onclick="dovcstep_one();" tabindex="-1" class="edit-txt">Edit</a>
							</div>

							<div class="form-text-selected-outer dis-flex">
								<div class="form-text-selected sml-col">
									<label>Full Name:</label>
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
								<div class="form-text-selected sml-col">
									<label>Phone No :</label>
									<div class="user-input-selected">
										<span id="span-phone"></span>
									</div>
								</div>
								<div class="form-text-selected">
									<label>How can we help :</label>
									<div class="user-input-selected">
										<span id="span-wehelp"></span>
									</div>
								</div>
								<div class="form-text-selected sml-col">
									<label>Country :</label>
									<div class="user-input-selected">
										<span id="span-country"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="step-head active">
							<div>
							<h2>Your Requirements</h2>
							<span>(Step 2 of 2)</span>
							</div>
						</div>

					<div class="form-text-cont width-full" id="exp-date-col">
						<div class="exp-div-row">
						<label>What is the expected start date?*</label>
							<select name="expected-date" id="inp-expdate">
								<option value="">Select</option>
								<option value="I am already late">I am already late</option>
								<option value="Immediately">Immediately</option>
								<option value="When I get internal funding/approval">When I get internal funding/approval</option>
								<option value="Specify a date">Specify a date</option>
								<option value="I don't know">I don't know</option>
							</select>
							<small></small>
						</div><!-- //exp-div-row -->

						<div class="radio-date opt-div" id="radio-date" 
						style="display:none;margin-bottom:30px;">
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
							</div><!-- //radio-date opt-div -->
						</div>
					</div>
					<div style="clear:both;"></div>
					<div id="career-col" style="display:none; margin-bottom: 20px;">
						<div class="form-text-cont width-full">
							<div class="lbl-row-new"><label>Position of Interest</label></div>
							<input type="text" class="input-field" value="" name="career-int" maxlength="50" autocomplete="off">		
							<small></small>	
						</div>	
					</div>

					<div id="team-ext-col" style="display:none;">
						<div class="form-text-cont width-full">
							<div class="lbl-row-new"><label>How many engineers would you like to add?*</label></div>
							<select id="inp-resources" name="count-resources">
								<option value="">Select</option>
								<option value="1">1</option>
								<option value="2-5">2-5</option>
								<option value="6-10">6-10</option>
								<option value="11-20">11-20</option>
								<option value="More than 20">More than 20</option>
								<option value="I don't Know">I don't Know</option>
							</select>
							<small></small>	
						</div>

						<div id="how-long" class="form-text-cont width-full">
							<div class="lbl-row-new">
								<label>For how long will you need these engineers?*</label>
							</div>
							<select id="inp-howlong" name="howlong">
								<option value="">Select</option>
								<option value="1-3 Months">1-3 Months</option>
								<option value="3-6 Months">3-6 Months</option>
								<option value="6+ Months">6+ Months</option>								
							</select>
							<small></small>	
						</div>
						</div>
						<div id="temp-tem-ext-dv"></div>
						<div class="form-text-cont width-full">
							<div class="lbl-row-new">
								<label id="lbl-requirement">Requirement*</label>
							</div>
							
							<div class="user-input">
								<textarea class="input-field comment-input" id="user-req" name="user-req"></textarea>
								<small>Error Message</small>
								<div class="drop-input attachment_brw" id="uploadcontact">
								<div id="dropcontact"></div>
								</div>
								<div id="drop-area">
								<input type="file" name="files[]" id="fileElem" multiple accept="image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,.txt" onchange="handleFiles(this.files)">
								<button class="button" id="browse-btn" type="button" 
								onclick="document.getElementById('fileElem').click()">BROWSE | DROP FILES HERE</button>
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
							<span class="info-box">
								<em>i</em>
								<span class="info">A Non Disclosure Agreement is a legally binding contract that establishes a confidential relationship. The party or parties signing the agreement agree that sensitive information they may obtain will not be made available to any others. An NDA may also be referred to as a confidentiality agreement. (credit: Investopedia)</span>
							</span>
						</label>
					</div>
					<!-- 
					<div class="form-group">
						<div class="quizQ">
							<span id="j-quiz"></span>
							<a href="javascript:void(0)" ;="" class="refreshbtn" onclick="generateWsQuiz();"></a>
						</div>
						<span class="equal">=</span>
						<div class="quizAns">
							<input type="number" name="captcha" placeholder="??" id="j-quiz-ans" 
							onkeypress="cap_limit(event, this);">
							<span class="error" id="captchaerror"></span>
						</div>
					</div>
					-->
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
		</div>
		</div><!-- .form-left -->
		<div class="slider-right od-row">
		<span class="client-head">TRUSTED BY STARTUPS AND FORTUNE 500 COMPANIES</span>
		<?php 
		if( isset( $_GET['theme'] ) &&  ($_GET['theme'] == "light") ){ ?>	
		<picture>
        <img src="<?php bloginfo('template_url'); ?>/images/contact-client-logo-image-light.svg" class="Client Logo" width="364" height="274" alt="ValueCoders">
		</picture>
		<?php }else{ ?>
		<picture>
		<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/contact-client-logo-image.svg" class="Client Logo" width="364" height="274" loading="lazy" alt="ValueCoders">
		</picture>	
		<?php }
		?>		
		</div>	
	</div><!-- dis-flex form-outer -->	
</div>	
</section>	

<section class="form-footer-section">
<div class="container">
<div class="form-footer dis-flex">
  <div class="mid-block dis-flex">
    <div class="flex-3">
      <a href="tel:+918882108080"><span class="title">INDIA</span> +91 888 210 8080 (Sales)</a>
      <a href="tel:+917042020782" style="margin-top: 5px; ">+91 704 202 0782 (HR)</a>
    </div>
    <div class="flex-3">
      <a href="tel:+442032392299"><span class="title">UK</span> +44 20 3239 2299</a>       
    </div>
	<div class="flex-3">
      <!--<a href="tel:+97145232446"><span class="title">UAE</span> +971 4-523- 2446</a>-->
      <a href="https://wa.me/918882108080"><span class="title">WhatsApp</span> +91 888 210 8080</a>
    </div>
    <div class="flex-3">
      <a href="tel:+14152300123"><span class="title">USA</span> +1 415 230 0123</a>            
    </div>
    <div class="flex-3">
      <a href="tel:+61280058080"><span class="title">AUS</span> +61 2 8005 8080</a>            
    </div>
	<div class="flex-3">
      <!--<a href="https://wa.me/918882108080"><span class="title">WhatsApp</span> +91 888 210 8080</a>-->            
    </div>
  </div>
  <div class="last-block">
    <ul class="faddress-col">
      <li><strong>Gurugram :</strong> 1053A, 10th Floor, Tower-B, Unitech Cyber Park Sector - 39, Gurgaon 122001, Haryana</li>
      <li><strong>Noida :</strong> 3rd Floor, Fusion Square, 5A & 5B, Sector 126, Noida 201303</li>
      <li><strong>US :</strong> 5900 Balcones Drive, STE 100, Austin , TX 78731, USA</li>
      <li><strong>UK :</strong> 167-169 Great Portland Street, 5th Floor, London W1W 5PF, United Kingdom</li>
      <li><strong>UAE :</strong> 541, 8W, Level 5, Dubai Airport Free Zone, Dubai, United Arab Emirates</li>
    </ul>
  </div>
</div>
</div>
</section>
</div>
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

/*let hasctlder = document.getElementById("contact-slider");
if(hasctlder){
    window.addEventListener("load", function(){
    const gliderID = new Glider(document.querySelector(".contact-slider .glider"), {
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        scrollLock: false,
        dots: ".contact-us-section .dots",
        dragDistance: false,
    });
    gliderDoAutoPlayCP( gliderID, 5000);
    gliderDoAutoPlay( gliderID, ".client-testimonial-slider .glider", 5000 );
	function gliderDoAutoPlayCP(glider, selector, delay = 2000, repeat = true) {
    let autoplay        = null;
    const slidesCount   = glider.track.childElementCount;
    let nextIndex       = 1;
    let pause           = true;
    function slide() {
    autoplay = setInterval(() => {
        if (nextIndex >= slidesCount) {
            if (!repeat) {
                clearInterval(autoplay);
            } else {
                nextIndex = 0;
            }
        }
        glider.scrollItem(nextIndex++);
    }, delay);
    }
    slide();
    var element = document.querySelector(selector);
    var videoPlayed = false;
    element.addEventListener('click', (event) => { 
        clearInterval(autoplay);
        pause = false;
        videoPlayed = true;
    }, 300);

    element.addEventListener('mouseover', (event) => {
    if(pause && ( videoPlayed === false) ) {
        clearInterval(autoplay);
        pause = false;
    }
    }, 300);

    element.addEventListener('mouseout', (event) => {
    if (!pause && ( videoPlayed === false)) {
        slide();
        pause = true;
    }
    }, 300);
	}
    
    });
}*/
</script>
<?php get_footer(); ?>