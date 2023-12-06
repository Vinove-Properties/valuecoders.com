	<div class="container">
		<div class="dis-flex">
			<div class="left-box bg-dark-theme">
				<h2>We’d Love To Hear <br> From You</h2>
				<div class="side-dash1 list-box">
					<h3>Fill up your details</h3>
					<p>Get Custom Solutions, Recommendations,Estimates. Confidentiality & Same Day Response Guaranteed!</p>
				</div>
				<div class="side-dash2 list-box">
					<h3>What’s next?</h3>
					<p>One of our Account Managers will contact you shortly</p>
					<div class="dis-flex profile-outer">
						<div class="profile-pic"><i class="pic1"></i></div>
						<div class="profile-pic"><i class="pic2"></i></div>
						<div class="profile-pic"><i class="pic3"></i></div>
						<div class="profile-pic"><i class="pic4"></i></div>
					</div>
				</div>
			</div>
			<div class="form-box-outer right-box bg-voilet">
				<form action="https://www.valuecoders.com/sendmail1.php" enctype="multipart/form-data" method="POST">
					<div class="form-inner dis-flex">
						<div class="form-text-cont">
							<div class="user-input">
								<input type="text" id="focusInput" pattern="^[a-zA-Z0-9-]" placeholder="Full Name" class="input-field" value="" name="cont_name" required />
							</div>
						</div>
						<div class="form-text-cont">
							<div class="user-input">
								<input type="text" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$" placeholder="Email Address" class="input-field" value="" name="cont_email" />
							</div>
						</div>
						<div class="form-text-cont">
							<div class="user-input">
								<input type="text" class="input-field" placeholder="Phone Number" value="" name="cont_phpne" required />
							</div>
						</div>
						<div class="form-text-cont">
							<div class="user-input">
								<input class="input-field input-skype" type="text" placeholder="Country" value="" name="cont_country" />
							</div>
						</div>
						<div class="form-text-cont width-full">
							<div class="user-input">
								<textarea class="input-field comment-input" placeholder="Project Brief" name="texteareacostm"></textarea>
								<div class="drop-input attachment_brw" id="uploadcontact" >
									<div id="dropcontact">
										<a href="#" class="drop-box clr-white">BROWSE | DROP FILES HERE</a>
										<input type="file" name="upl"  style="display:none;" />
									</div>
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
						<input type="submit" id="submitButton" class="checkout-submit" value="Enquire Now" />
					</div>
				</form>
			</div>
		</div>
	</div>



	<script>
		function validateMquiz(){
    let que     = document.getElementById("j-quiz").textContent;
    let ans     = document.getElementById("j-quiz-ans").value;
    let qerror  = document.getElementById("captchaerror");
    if( eval(que) == ans ){
        qerror.textContent = "";
        return true;
    }else{
        qerror.textContent = "Invalid Answer";
        return false;
    }
}


var jQuizExists = document.getElementById("j-quiz");
if (jQuizExists) {
	generateWsQuiz();
}
function generateWsQuiz() {
	let n1 = Math.floor(Math.random() * 9) + 1;
	let n2 = Math.floor(Math.random() * 9) + 1;
	document.getElementById("j-quiz").textContent = n1 + " + " + n2;
}


	</script>