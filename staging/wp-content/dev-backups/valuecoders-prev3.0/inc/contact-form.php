<?php 
  $csrf_token = ( isset( $_SESSION['vc-csrf'] ) &&  is_array( $_SESSION['vc-csrf'] ) && ( count( $_SESSION['vc-csrf'] ) > 0  ) ) ? end( $_SESSION['vc-csrf'] ) : ''; 
  ?>
<div class="container">
  <div class="dis-flex">
    <div class="form-box-outer left-box bg-voilet">
      <h2>Book Free Consultation</h2>
      <p>Our consultants will respond back within 8 business hours or less.</p>
      <form id="contact-form-section" action="<?php bloginfo('url'); ?>/sendmail1.php" 
        class="contact-form-section" enctype="multipart/form-data" method="POST" onsubmit="return vcCmnFormValidation(false);">
        <div class="form-inner dis-flex">
          <div class="form-text-cont">
            <div class="user-input">
              <input type="text" autocomplete="off" id="cont_name" placeholder="Full Name" class="input-field" value="" name="user-name" />
              <small>Error Message</small>
            </div>
          </div>
          <div class="form-text-cont">
            <div class="user-input">
              <input type="text" autocomplete="off" id="cont_email" placeholder="Email Address" class="input-field" value="" name="user-email" />
              <small>Error Message</small>
            </div>
          </div>
          <div class="form-text-cont">
            <div class="user-input">
              <input type="text" autocomplete="off" class="input-field" id="cont_phpne" placeholder="Phone Number" value="" name="user-phone" />
              <small>Error Message</small>
            </div>
          </div>
          <div class="form-text-cont cont_country_section">
            <div class="user-input">
              <input class="input-field input-skype" autocomplete="off" id="cont_country" type="text" placeholder="Country" value="" name="user-country" />
              <small>Error Message</small>
            </div>
          </div>
          <div class="form-text-cont width-full">
            <div class="user-input">
              <textarea class="input-field comment-input" autocomplete="off" id="user-req" placeholder="Project Brief" name="user-req"></textarea>
              <small>Error Message</small>
              <div class="drop-input attachment_brw" id="uploadcontact" >
                <div id="dropcontact"></div>
              </div>
              <div id="drop-area">
                <input type="file" name="files[]" id="fileElem" multiple accept="image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,.txt" onchange="handleFiles(this.files)">
                <button class="button" id="browse-btn" type="button" 
                  onclick="document.getElementById('fileElem').click()">BROWSE | DROP FILES HERE</button>
                <input type="hidden" name="up-counter" id="uplcounter" value="0">
              </div>
            </div>
          </div>
        </div>
        <div id="gloader" class="gal-loader">
          <div class="loader"></div>
          <div id="gallery"></div>
        </div>
        <p id="file-type-error"></p>
        <div class="form-group">
          <div class="quizQ">
            <span id="j-quiz"></span>
            <a href="javascript:void(0);" class="refreshbtn" onclick="generateWsQuiz();"></a>
          </div>
          <span class="equal">=</span>
          <div class="quizAns">
            <input type="number" name="captcha" placeholder="??" id="j-quiz-ans" 
              onkeypress="cap_limit(event, this);">
            <span class="error" id="captchaerror"></span>
          </div>
        </div>
        <div class="user-input checkout">
          <input type="hidden" name="Uploadedfilename" id="Uploadedfilename" value="">
          <input type="hidden" name="frmqueryString" value="">
          <input type="hidden" name="page_url" value="<?php the_permalink(); ?>">
          <input type="hidden" name="vc_csrf" value="<?php echo $csrf_token; ?>">
          <input type="submit" id="submitButton" class="checkout-submit" value="Enquire Now" />
        </div>
      </form>
    </div>
    <div class="right-box bg-dark-theme">
      <div class="footer-client-box" id="footer-client-slider-bot">
        <div class="glider-contain footer-client-slider">
          <div class="glider">
		  <div class="slide-item" style="height: 0;">
			 <p>We have worked with ValueCoders for more than a year, and their skilled team has allowed us to scale up during certain projects thereby allowing our full time team to focus on core platform functionality. Recommended.
              <div class="client-box dis-flex">
                <div class="client-img">
                  <picture>
                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image01.webp">
                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image01.png">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image01.png" alt="Valuecoders" width="110" height="110">
                  </picture>
                </div>
                <div class="client-detail">
                  <h5>Adam Watts</h5>
                  <h6>President &amp; COO, Fintex Advisors</h6>
                </div>
              </div>
            </div>
			<div class="slide-item" style="height: 0;">
			 <p>The team at ValueCoders has been a fantastic asset within our startup business. We had the option to interview before hiring. The team is attentive, talented, & very adaptable to the changing circumstances of business.
              <div class="client-box dis-flex">
                <div class="client-img">
                  <picture>
                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image02.webp">
                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image02.png">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image02.png" alt="Valuecoders" width="110" height="109">
                  </picture>
                </div>
                <div class="client-detail">
                  <h5>Andrew North</h5>
                  <h6>Managing Director, BlueLane Holdings Ltd.</h6>
                </div>
              </div>
            </div>
            <div class="slide-item" style="height: 0;">
			 <p>ValueCoders is very professional development team. I used their expertise in the building of an online comparison tool. I would highly recommend the ValueCoders as they go the extra mile to deliver a good product.</p>
              <div class="client-box dis-flex">
                <div class="client-img">
                  <picture>
                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image03.webp">
                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image03.png">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image03.png" alt="Valuecoders" width="110" height="109">
                  </picture>
                </div>
                <div class="client-detail">
                  <h5>Gerald van Kooten</h5>
                  <h6>Partner at Anders Invest B.V.</h6>
                </div>
              </div>
            </div>
            <div class="slide-item" style="height: 0;">
			 <p>I engaged with ValueCoders in January of this year to provide software development expertise for our 20/20 B.E.S.T Safety Software and the results have been fantastic! They have dedicated & knowledgeable software teams.</p>
              <div class="client-box dis-flex">
                <div class="client-img">
                  <picture>
                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image04.webp">
                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image04.png">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image04.png" alt="Valuecoders" width="110" height="109">
                  </picture>
                </div>
                <div class="client-detail">
                  <h5>Dave Jefferson</h5>
                  <h6>Founder JEMs Software</h6>
                </div>
              </div>
            </div>
            <div class="slide-item" style="height: 0;">
			 <p>ValueCoders is our go-to partner to help us realize our software needs. They are supportive, friendly, and always ready to help us when we face difficulties in the project. I will rate them 10/10. Highly recommended!</p>
              <div class="client-box dis-flex">
                <div class="client-img">
                  <picture>
                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image05.webp">
                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image05.png">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image05.png" alt="Valuecoders" width="110" height="111">
                  </picture>
                </div>
                <div class="client-detail">
                  <h5>Michelle Fno</h5>
                  <h6>CEO, Miscato Limited</h6>
                </div>
              </div>
            </div>
            <div class="slide-item" style="height: 0;">
			 <p>ValueCoders has been able to establish the continuity of the development process. On balance, we can say that it was the right decision to outsource the development to India and that ValueCoders was the right choice.</p>
              <div class="client-box dis-flex">
                <div class="client-img">
                  <picture>
                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image06.webp">
                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image06.png">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image06.png" alt="Valuecoders" width="110" height="111">
                  </picture>
                </div>
                <div class="client-detail">
                  <h5>Gerald Lindhorst</h5>
                  <h6>Director Gleichklang Limited</h6>
                </div>
              </div>
            </div>
            <div class="slide-item" style="height: 0;">
			 <p>At ValueCoders, they have a problem-solving culture. We worked as a team, not as a client and developers. They stay connected and report on a regular basis. In the end, it all culminated in an awesome product.</p>
              <div class="client-box dis-flex">
                <div class="client-img">
                  <picture>
                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image07.webp">
                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image07.png">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image07.png" alt="Valuecoders" width="110" height="109">
                  </picture>
                </div>
                <div class="client-detail">
                  <h5>Benoît D'heygere</h5>
                  <h6>Founder at Refuge</h6>
                </div>
              </div>
            </div>
            <div class="slide-item" style="height: 0;">
			 <p>ValueCoders is a remarkable offshore IT company with highly skilled developers. They have provided me with expected positive outcomes for every project they undertook. I highly recommend ValueCoders to others.</p>
              <div class="client-box dis-flex">
                <div class="client-img">
                  <picture>
                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image08.webp">
                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image08.png">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/footer-slide/slide-image08.png" alt="Valuecoders" width="110" height="109">
                  </picture>
                </div>
                <div class="client-detail">
                  <h5>Antonio Santos</h5>
                  <h6>Head of Web Technology at Candor Renting SA</h6>
                </div>
              </div>
            </div>
          </div>
          <div role="tablist" class="dots"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function autocomplete(inp, arr) {
  	  var currentFocus;
  	  inp.addEventListener("input", function(e) {
  	      var a, b, i, val = this.value;
  	      closeAllLists();
  	      if (!val) { 
  	      	return false;
  	      }
  	      currentFocus = -1;
  	      /*create a DIV element that will contain the items (values):*/
  	      a = document.createElement("DIV");
  	      a.setAttribute("id", this.id + "autocomplete-list");
  	      a.setAttribute("class", "autocomplete-items");
  	      /*append the DIV element as a child of the autocomplete container:*/
  
  	      this.parentNode.appendChild(a);
  	      /*for each item in the array...*/
  	      for (i = 0; i < arr.length; i++) {
  	        /*check if the item starts with the same letters as the text field value:*/
  	        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
  				a.classList.add('has-data');
  				/*create a DIV element for each matching element:*/
  				b = document.createElement("DIV");
  				/*make the matching letters bold:*/
  				b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
  				b.innerHTML += arr[i].substr(val.length);
  				/*insert a input field that will hold the current array item's value:*/
  				b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
  				/*execute a function when someone clicks on the item value (DIV element):*/
  				b.addEventListener("click", function(e) {
  				/*insert the value for the autocomplete text field:*/
  				inp.value = this.getElementsByTagName("input")[0].value;
  				/*close the list of autocompleted values,
  				(or any other open lists of autocompleted values:*/
  				closeAllLists();
  				});
  				a.appendChild(b);
  	        }
  	      }
  	  });
  	  /*execute a function presses a key on the keyboard:*/
  	  inp.addEventListener("keydown", function(e) {
  	      var x = document.getElementById(this.id + "autocomplete-list");
  	      if (x) x = x.getElementsByTagName("div");
  	      if (e.keyCode == 40) {
  	        /*If the arrow DOWN key is pressed,
  	        increase the currentFocus variable:*/
  	        currentFocus++;
  	        /*and and make the current item more visible:*/
  	        addActive(x);
  	      } else if (e.keyCode == 38) { //up
  	        /*If the arrow UP key is pressed,
  	        decrease the currentFocus variable:*/
  	        currentFocus--;
  	        /*and and make the current item more visible:*/
  	        addActive(x);
  	      } else if (e.keyCode == 13) {
  	        /*If the ENTER key is pressed, prevent the form from being submitted,*/
  	        e.preventDefault();
  	        if (currentFocus > -1) {
  	          /*and simulate a click on the "active" item:*/
  	          if (x) x[currentFocus].click();
  	        }
  	      }
  	  });
  	  function addActive(x) {
  	    /*a function to classify an item as "active":*/
  	    if (!x) return false;
  	    /*start by removing the "active" class on all items:*/
  	    removeActive(x);
  	    if (currentFocus >= x.length) currentFocus = 0;
  	    if (currentFocus < 0) currentFocus = (x.length - 1);
  	    /*add class "autocomplete-active":*/
  	    x[currentFocus].classList.add("autocomplete-active");
  	  }
  	  function removeActive(x) {
  	    /*a function to remove the "active" class from all autocomplete items:*/
  	    for (var i = 0; i < x.length; i++) {
  	      x[i].classList.remove("autocomplete-active");
  	    }
  	  }
  	  function closeAllLists(elmnt) {
  	    /*close all autocomplete lists in the document,
  	    except the one passed as an argument:*/
  	    var x = document.getElementsByClassName("autocomplete-items");
  	    for (var i = 0; i < x.length; i++) {
  	      if (elmnt != x[i] && elmnt != inp) {
  	        x[i].parentNode.removeChild(x[i]);
  	      }
  	    }
  	  }
  	  /*execute a function when someone clicks in the document:*/
  	  document.addEventListener("click", function (e) {
  	      closeAllLists(e.target);
  	      });
  }
  
  /*An array containing all the country names in the world:*/
  var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
  
  /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("cont_country"), countries);
  let hasHireForm = document.getElementById("cont_country_sb");
  if( hasHireForm ){
  	autocomplete(hasHireForm, countries);	
  }
  
  
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
  
  /*
  let uploadProgress = []
  let progressBar = document.getElementById('progress-bar')
  
  function initializeProgress(numFiles) {
    progressBar.value = 0
    uploadProgress = []
  
    for(let i = numFiles; i > 0; i--) {
      uploadProgress.push(0)
    }
  }
  */
  
  function setFileError( msg, eid = 'file-type-error' ){
  	let fcontainer = document.getElementById(eid);
  	fcontainer.innerHTML = msg;
  	setTimeout(function(){
  		fcontainer.innerHTML = "";
  	}, 3000);	
  }
  
  /*
  function updateProgress(fileNumber, percent) {
    uploadProgress[fileNumber] = percent
    let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
    progressBar.value = total
  }
  */
  
  function handleFiles(files){
  	setFileError("");
  	let uldCounter 	= document.getElementById("uplcounter");
  	if( parseInt(uldCounter.value) >= 10 ){
  		//console.log("case 1");
  		setFileError( "You can not upload more then 10 media files." );
  		return;
  	}
  	let allFcount = (files.length + parseInt(uldCounter.value))
  	if( parseInt(allFcount) > 10 ){
  		//console.log("case 2");
  		setFileError( "You can not upload more then 10 media files." );
  		return;
  	}
  
  	let preuploaded = document.getElementById('Uploadedfilename').value;
  	if( preuploaded ){
  		let prefiles = preuploaded.split(",");
  		if( prefiles.length > 10 ){
  			//console.log("case 3");
  			setFileError( "You can not upload more then 10 media files." );
  			return;	
  		}
  	}	
  	if( files.length > 10 ){
  		//console.log("case 4");
  		setFileError( "You can not upload more then 10 media files." );
  		return;
  	}
  	files = [...files]
  	//initializeProgress(files.length)
  	files.forEach(uploadFile)
  	//files.forEach(previewFile)
  }
  
  function sbhandleFiles(files){
  	setFileError("", "sb-file-type-error");
  	let uldCounter 	= document.getElementById("sbuplcounter");
  	if( parseInt(uldCounter.value) >= 10 ){
  		setFileError( "You can not upload more then 10 media files." , "sb-file-type-error" );
  		return;
  	}
  	let allFcount = (files.length + parseInt(uldCounter.value))
  	if( parseInt(allFcount) > 10 ){
  		setFileError( "You can not upload more then 10 media files.", "sb-file-type-error" );
  		return;
  	}
  
  	let preuploaded = document.getElementById('sbUploadedfilename').value;
  	if( preuploaded ){
  		let prefiles = preuploaded.split(",");
  		if( prefiles.length > 10 ){
  			setFileError( "You can not upload more then 10 media files.", "sb-file-type-error" );
  			return;	
  		}
  	}	
  	if( files.length > 10 ){
  		setFileError( "You can not upload more then 10 media files.", "sb-file-type-error" );
  		return;
  	}
  	files = [...files]
  	//initializeProgress(files.length)
  	files.forEach(function(obj){
  		uploadFile(obj, true);
  	});
  }
  
  //Remove Fle
  function removeMe(e,imageName, issb){
  	let uldCounter = (issb === true) ? document.getElementById("sbuplcounter") : document.getElementById("uplcounter");
  	setFileError("");
  	const xhttp = new XMLHttpRequest(); 
  	xhttp.open("GET", "<?php bloginfo('url'); ?>/delete_file.php?delete=1&imageName="+imageName, true);
  	xhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
          	let counterValue = parseInt(uldCounter.value);
      		counterValue--;
      		uldCounter.value = counterValue;
      		let flElm = (issb === true) ? 'sbUploadedfilename' : 'Uploadedfilename';
          	let fileName = document.getElementById(flElm).value;
          	newStr = fileName.replace(imageName, '');
          	document.getElementById(flElm).value = newStr;
              e.parentNode.remove();
              if( uldCounter.value == 0 ){
              	if( issb == true ){
              		document.getElementById("sbgloader").classList.remove("show-me");
              	}else{
              		document.getElementById("gloader").classList.remove("show-me");
              	}
              }
          }
  	}
  	xhttp.send();
   
  }
  //End Remove Fle
  
  function uploadFile(file, issb = false){ 
  		let errorTag = ( issb === true ) ? "sb-file-type-error" : "file-type-error";
  		setFileError("",errorTag);
  		let uldCounter 	= ( issb === true ) ? document.getElementById("sbuplcounter") : document.getElementById("uplcounter");
  		if( parseInt(uldCounter.value) >= 10 ){
  			setFileError( "You can not upload more then 10 media files.", errorTag );
  			return;
  		}
  		let gloader = ( issb === true ) ? document.getElementById("sbgloader") : document.getElementById("gloader");
  
  		gloader.classList.add("show-me");
  		gloader.classList.add("active");
  		
  		const fileSize = file.size / 1024 / 1024;
  		if( fileSize > 20 ){
  			setFileError("ERROR Uploaded document exceeds the maximum size limit of 20 MB", errorTag);
  			gloader.classList.remove("active");
  			return;
  		}
  
    		// if(files_obj != undefined) {
  	    let form_data = new FormData();
  	    form_data.append('file', file)
  
  	    var xhttp = new XMLHttpRequest();
  	    xhttp.open("POST", "<?php bloginfo('url'); ?>/file-uploader.php", true);
  	    xhttp.onload = function(event) {
  	    	//setFileError( xhttp.response );
  	        if (xhttp.status == 200) {
  	        	let response =  JSON.parse(xhttp.responseText);	        	
  	        	console.log( response );
  	        	if( response.status == true ){
  	        		let counterValue = parseInt(uldCounter.value);
  	        		counterValue++;
  	        		uldCounter.value = counterValue;
  
  	        		let inpElm = ( issb === true ) ? 'sbUploadedfilename' : 'Uploadedfilename';
  	        		let existingVal = document.getElementById(inpElm).value;		        		
  					if( existingVal == '' ){
  						document.getElementById(inpElm).value = response.file;						
  					}else{
  						document.getElementById(inpElm).value = existingVal + response.file;
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
  
  				        if( issb === true ){
  				        	indiv.innerHTML = '<img src="'+icon+'" height="55" width="55"><button type="button" onclick="return removeMe(this,this.value,true);" value="'+response.file+'">X</button></span>';	
  				        }else{
  				        	indiv.innerHTML = '<img src="'+icon+'" height="55" width="55"><button type="button" onclick="return removeMe(this,this.value,false);" value="'+response.file+'">X</button></span>';
  				        }
  
  				        if( issb === true ){
  						document.getElementById('sbgallery').appendChild(indiv);
  				        }else{
  				        document.getElementById('gallery').appendChild(indiv);	
  				        }
  						
  					}
  
  // End Preview File
  	        	}else{
  	        		//alert("123");
  	        		setFileError( response.message, errorTag );
  	        	}
  	        }else{
  	            console.log("error");
  	        }
  	        gloader.classList.remove("active");
  	    }
  	    xhttp.send(form_data);
  	// }
  }
  
  const form 			= document.getElementById('contact-form-section');
  const username 		= document.getElementById('cont_name');
  const email 		= document.getElementById('cont_email');
  const phone 		= document.getElementById('cont_phpne');
  const countriesData = document.getElementById('cont_country');
  const uRequirement 	= document.getElementById('user-req');
  const captcha   	= document.getElementById('j-quiz-ans');
  
  //Show input error messages
  function showError(input, message) {
      const formControl = input.parentElement;
      formControl.className = 'user-input form-control verror';
      const small = formControl.querySelector('small');
      small.innerText = message;
  }
  
  function doNotingonFocus(input) {
      const formControl = input.parentElement;
      formControl.className = 'user-input form-control';
  }
  
  //show success colour
  function showSucces(input){
  	const formControl = input.parentElement;
  	const small = formControl.querySelector('small');
  	formControl.className = 'user-input form-control success';
  	small.innerText = 'success';
  }
  
  //check email is valid
  function checkEmail(input) {
      const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(re.test(input.value.trim())) {
          showSucces(input);
      }else {
      	if( input.value == '' ){
      		showError(input,'Please Fill Email');
      	}else{
      		showError(input,'Email is not valid');	
      	}
      }
  }
  
  function phonenumber(inputtxt){
  	//console.log( inputtxt.value.trim() );
  	//console.log( inputtxt.value.length );
  	//var phoneno = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
  	//if(phoneno.test(inputtxt.value.trim())) {
  		
  	if( (/^[A-Za-z0123456789()\s.+-]+$/.test(inputtxt.value.trim()) && inputtxt.value.length >= 6) ){	
  		showSucces( inputtxt )
  	}else{
  		if( inputtxt.value == '' ){
      		showError(inputtxt,'Please Fill Phone');
      	}else{
      		showError( inputtxt, 'Phone Number is not valid' );
      	}
  		
  	}
  }
  
  username.addEventListener("keyup", checkUseName);
  username.addEventListener("keypress", checkUseName);
  username.addEventListener("keydown", checkUseName);
  username.addEventListener("focusout", checkUseName);
  
  countriesData.addEventListener("keyup", checkCont);
  countriesData.addEventListener("keypress", checkCont);
  countriesData.addEventListener("keydown", checkCont);
  countriesData.addEventListener("focusout", checkCont);
  
  phone.addEventListener("keyup", checkPhone);
  phone.addEventListener("keypress", checkPhone);
  phone.addEventListener("keydown", checkPhone);
  phone.addEventListener("focusout", checkPhone);
  
  email.addEventListener("keyup", checkEmailEvent);
  email.addEventListener("keypress", checkEmailEvent);
  email.addEventListener("keydown", checkEmailEvent);
  email.addEventListener("focusout", checkEmailEvent);
  email.addEventListener("focusin", function(){
  	doNotingonFocus(email);
  });
  
  captcha.addEventListener("focusout", validateMquiz);
  
  uRequirement.addEventListener("keyup", checkURequirement);
  uRequirement.addEventListener("keypress", checkURequirement);
  uRequirement.addEventListener("keydown", checkURequirement);
  uRequirement.addEventListener("focusout", checkURequirement);
  uRequirement.addEventListener("focusin", checkURequirement);
  
  function checkEmailEvent(event){
  	checkEmail(email);
  }
  function checkUseName(event){
    checkLength(username,3,15);
  }
  
  function checkCont(event){
    checkLength(countriesData,1,255);
  }
  
  function checkPhone(event){
    checkLength(phone,10,10);
    phonenumber(phone);
  }
  
  function checkURequirement(event){
    checkLength(uRequirement,3,1500);
  }
  
  
  //checkRequired fields
  function checkRequired(inputArr) {
      inputArr.forEach(function(input){
      	let e = input.value.trim();
          if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){
  			if( input.name == "user-name"  ){
  				showError(input, `Please Fill Name`);
  			}else if( input.name == "user-req"  ){
  				showError(input, `Please Fill Requirement`);
  			}else if( input.name == "user-phone"  ){
  				showError(input, `Please Fill Phone`);
  			}else if( input.name == "user-email"  ){
  				showError(input, `Please Fill Email`);
  			}else if( input.name == "user-country" ){
  				showError(input, `Please Fill Country`);	
  			}else if( input.name == "captcha" ){
                  validateMquiz();
              }else{
  				showError(input,`This Field is required`)	
  			}
          }else {
          	checkLength(username,3,15);	
  		    checkEmail(email);
  		    checkLength(countriesData,3,255);
              if( input.name != "captcha" ){
                  showSucces(input);
              }
          }
      });
  }
  
  
  //check input Length
  function checkLength(input, min ,max) {
  	//console.log(input.name);
  	let e = input.value.trim();
      //if( (input.value.length < min) || (!/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e)) ) {
      if( input.value.length < min ){  
      	if( input.name == "user-name"  ){
  			showError(input, `Please Fill Name`);	
  		}else if( input.name == "user-req"  ){
  			showError(input, `Please Fill Requirement`);	
  		}else if( input.name == "user-phone"  ){
  			showError(input, `Please Fill Phone`);	
  		}else if( input.name == "user-email"  ){
  			showError(input, `Please Fill Email`);	
  		}else if( input.name == "user-country"  ){
  			showError(input, `Please Fill Country`);	
  		}else{
  			showError(input, `Value must be at least ${min} characters`);
  		}    
      }else {
          showSucces(input);
      }
  }
  
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
  
  //get FieldName
  function getFieldName(input) {
      return input.id.charAt(0).toUpperCase() + input.id.slice(1);
  }
  
  function vcSpaceChecker( input ){
  	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{1,}/.test( input ) ){
  		return false;
  	}else{
  		return true;
  	}
  }
  
  function vcCmnFormValidation( hasQuiz ){
  	checkRequired( [username, email, phone, countriesData, uRequirement, captcha] );
  	if(
  		( vcSpaceChecker(email.value.trim()) === true ) && 
  		( vcSpaceChecker(username.value.trim()) === true ) && 
  		( vcSpaceChecker(phone.value.trim()) === true ) && 
  		( vcSpaceChecker(countriesData.value.trim()) ===true ) && 
  		( vcSpaceChecker(uRequirement.value.trim()) === true ) &&
  		( vcSpaceChecker(captcha.value.trim()) === true ) 
  	){
  		const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  		if( !sre.test(email.value.trim()) ){
  		return false;
  		}
  		if( validateMquiz() === false){
      return false;            
      }
  		var form 	= document.getElementById("contact-form-section");
  		var formBtn = document.getElementById("submitButton");
  		form.classList.add('in-process');
  		formBtn.value = "Please wait...";
  		formBtn.disabled = true;
  		form.submit(); 
  	}else{
  		//alert("Ittheee @");
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
  
  function cap_limit(event, element ){
  	if(event.which < 48 || event.which > 57) {
  		event.preventDefault();
  	}
  	var max_chars = 2;
  	if(element.value.length > max_chars) {
  	element.value = element.value.substr(0, max_chars);
  	}
  }
  
  function ws_numcheck(evt, val) {
  	var theEvent = evt || window.event;
  	if (theEvent.type === "paste") {
  		key = event.clipboardData.getData("text/plain");
  	}else{
  		var key = theEvent.keyCode || theEvent.which;
  		key = String.fromCharCode(key);
  	}
  	//var regex = /[0-9]|\./;
  	var regex = /^\d+$/;
  	/*if(!regex.test(key) || (val.value.length > 2) ){*/
  	if(!regex.test(key) || (val.value.length > 2) ){
  		theEvent.returnValue = false;
  		if (theEvent.preventDefault) theEvent.preventDefault();
  	}
  }
  
  let hasHomeaslderw = document.getElementById("footer-client-slider-bot");
  if( hasHomeaslderw ){
  window.addEventListener("load", function () {

  /*
  document.querySelector(".footer-client-slider .glider").addEventListener("glider-slide-visible", function (event){
  var glider = Glider(this);
  });
  */
  const gliderID  = new Glider(document.querySelector(".footer-client-slider .glider"), {
  slidesToShow: 1,
  slidesToScroll: 1,
  draggable: true,
  scrollLock: false,
  dots: ".contact-us-section .dots",
  dragDistance: false,
  });


  gliderslideAutoPaly(gliderID, '.footer-client-slider .glider', 5000);
    function gliderslideAutoPaly(glider, selector, delay = 2000, repeat = true) {
    let autoplay = null;
    const slidesCount = glider.track.childElementCount;
    let nextIndex = 1;
    let pause = true;

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
    //if (!pause){
        clearInterval(autoplay);
        pause = false;
        videoPlayed = true;
    //}
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
  }
</script>