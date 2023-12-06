<?php require_once 'common/inc/config.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Outsourcing Software Development Company - @ValueCoders</title>
	<meta name="description" content="ValueCoders offers software development outsourcing services and help business with software engineering, smart teams & smart automation. 17+ years of experience. 2500+ clients globally." />
	<meta name="keywords" content="software outsourcing company, software development outsourcing, software engineering company in india, software outsourcing company India, offshore software development, software outsourcing services" />
	<meta property="og:title" content="Outsourcing Software Development Company - @ValueCoders" />

	<?php require_once 'include/header-files.php'; ?>
	<link rel="preload stylesheet" type="text/css" href="scss/footer-form.css" defer/>

</head>
<body id="themeAdd" class="day">

<section class="contact-us-section padding-t-150 padding-b-150 bg-dark-theme">
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
				<form id="contact-form-section" action="https://www.valuecoders.com/sendmail1.php" class="contact-form-section" enctype="multipart/form-data" method="POST">
					<div class="form-inner dis-flex">
						<div class="form-text-cont">
							<div class="user-input">
								<input type="text" autocomplete="off"id="cont_name" pattern="^[a-zA-Z0-9-]" placeholder="Full Name" class="input-field" value="" name="cont_name" required />
									 <small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont">
							<div class="user-input">
								<input type="text" autocomplete="off" id="cont_email" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$" placeholder="Email Address" class="input-field" value="" name="cont_email" />
								 <small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont">
							<div class="user-input">
								<input type="text" class="input-field" id="cont_phpne" placeholder="Phone Number" value="" name="cont_phpne" required />
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont cont_country_section">
							<div class="user-input">
								<input class="input-field input-skype" id="cont_country" type="text" placeholder="Country" value="" name="cont_country" />
								<small>Error Message</small>
							</div>
						</div>
						<div class="form-text-cont width-full">
							<div class="user-input">
								<textarea class="input-field comment-input" placeholder="Project Brief" name="texteareacostm"></textarea>
								<div class="drop-input attachment_brw" id="uploadcontact" >
									<div id="dropcontact">
										<!-- <a href="javascript:void(0)" class="drop-box clr-white fileUploadBtn">BROWSE | DROP FILES HERE</a> -->
										<!-- <input type="file" name="upl"  style="display:none;" /> -->
										<!-- <input type="file" id="fileInput" name="upl" style="display: none;" multiple /> -->
									<!-- 	<p><input type="button" value="Select File(s)" onclick="file_explorer();" /></p>
        								<input type="file" id="selectfile" multiple /> -->

        								<!-- custom code start -->
        								<!-- custom code end -->
									</div>
								</div>
								<div id="drop-area">
									  <form class="my-form">
									    <!-- <p>BROWSE | DROP FILES HERE</p> -->
									    <input type="file" id="fileElem" multiple accept=".jpg, .jpeg, .png , .pdf , .docx , .doc" onchange="handleFiles(this.files)">
									    <label class="button" for="fileElem">BROWSE | DROP FILES HERE</label>
									  </form>
									  <progress style="display: none;" id="progress-bar" max=100 value=0></progress>									
									</div>
								<div id="gallery" /></div>
							</div>
						</div>

					</div>
					<div class="form-group">
						<div class="quizQ">
							<span id="j-quiz">1 + 4</span>
							<a href="javascript:void(0);" class="refreshbtn" onclick="if (!window.__cfRLUnblockHandlers) return false; generateWsQuiz();"></a>
						</div>
						<span class="equal">=</span>
						<div class="quizAns">
							<input type="number" name="captcha" placeholder="??" id="j-quiz-ans" onkeypress="if (!window.__cfRLUnblockHandlers) return false; cap_limit(event, this);">
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
</section>
<script type="text/javascript">
	
function autocomplete(inp, arr) {
	  /*the autocomplete function takes two arguments,
	  the text field element and an array of possible autocompleted values:*/
	  var currentFocus;
	  /*execute a function when someone writes in the text field:*/
	  inp.addEventListener("input", function(e) {
	      var a, b, i, val = this.value;
	      /*close any already open lists of autocompleted values*/
	      closeAllLists();
	      if (!val) { return false;}
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

// const uploadFile = (files) => {
//   console.log("Uploading file...");
//   const API_ENDPOINT = "https://file.io";
//   const request = new XMLHttpRequest();
//   const formData = new FormData();

//   request.open("POST", API_ENDPOINT, true);
//   request.onreadystatechange = () => {
//     if (request.readyState === 4 && request.status === 200) {
//       console.log(request.responseText);
//     }
//   };
  
//   for (let i = 0; i < files.length; i++) {
//     formData.append(files[i].name, files[i])
//   }
//   request.send(formData);
// };
// fileInput.addEventListener("change", event => {
//   const files = event.target.files;
//   uploadFile(files);
// });
// var clickMe = document.querySelector('.fileUploadBtn');

// clickMe.addEventListener('click', function (event) {
// 	el = document.getElementById('fileInput');
// 	if (el.onclick) {
// 	   el.onclick();
// 	} else if (el.click) {
// 	   el.click();
// 	}
// });

</script>
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
        }
 
        xhttp.send(form_data);
    }
}
</script>
<script type="text/javascript">
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
	console.log(eventName);
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

function updateProgress(fileNumber, percent) {
  uploadProgress[fileNumber] = percent
  let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
  progressBar.value = total
}

function handleFiles(files) {
  files = [...files]
  initializeProgress(files.length)
  files.forEach(uploadFile)
  files.forEach(previewFile)
}

function previewFile(file) {
  let reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onloadend = function() {
    let img = document.createElement('img')
    img.src = reader.result
    document.getElementById('gallery').appendChild(img)
  }
}

function uploadFile(file, i) {
  // var url = 'ajax.php'
  // var xhr = new XMLHttpRequest()
  // var formData = new FormData()
  // xhr.open('POST', url, true)
  // xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')

  // // Update progress (can be used to show progress indicator)
  // xhr.upload.addEventListener("progress", function(e) {
  //   updateProgress(i, (e.loaded * 100.0 / e.total) || 100)
  // })

  // xhr.addEventListener('readystatechange', function(e) {
  //   if (xhr.readyState == 4 && xhr.status == 200) {
  //     updateProgress(i, 100) // <- Add this
  //   }
  //   else if (xhr.readyState == 4 && xhr.status != 200) {
  //     // Error. Inform the user
  //   }
  // })

  // // formData.append('upload_preset', 'ujpu6gyk')
  // formData.append('file', file)
  // xhr.send(formData)

  // if(files_obj != undefined) {
	    var form_data = new FormData();
	    form_data.append('file', file)
	    var xhttp = new XMLHttpRequest();
	    xhttp.open("POST", "ajax.php", true);
	    xhttp.onload = function(event) {
	        if (xhttp.status == 200) {
	            // alert(this.responseText);
	            console.log("success");
	        } else {
	            // alert("Error " + xhttp.status + " occurred when trying to upload your file.");
	             console.log("error");
	        }
	    }

	    xhttp.send(form_data);
	// }
}
</script>
<script type="text/javascript">
	const form = document.getElementById('contact-form-section');
	const username = document.getElementById('cont_name');
	const email = document.getElementById('cont_email');
	const phone = document.getElementById('cont_phpne');

//Show input error messages
function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = 'user-input form-control verror';
    const small = formControl.querySelector('small');
    small.innerText = message;
}

//show success colour
function showSucces(input) {
    const formControl = input.parentElement;
     const small = formControl.querySelector('small');
    formControl.className = 'user-input form-control success';
   small.innerText = 'success';
}

//check email is valid
function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())) {
        showSucces(input)
    }else {
        showError(input,'Email is not invalid');
    }
}


//checkRequired fields
function checkRequired(inputArr) {
    inputArr.forEach(function(input){
        if(input.value.trim() === ''){
            showError(input,`${getFieldName(input)} is required`)
            showError(input,`This Field is required`)
        }else {
            showSucces(input);
        }
    });
}


//check input Length
function checkLength(input, min ,max) {
    if(input.value.length < min) {
        // showError(input, `${getFieldName(input)} must be at least ${min} characters`);
        showError(input, `Name must be at least ${min} characters`);
    }else if(input.value.length > max) {
        showError(input, `Name must be les than ${max} characters`);
    }else {
        showSucces(input);
    }
}

//get FieldName
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

function phonenumber(inputtxt)
{
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if(phoneno.test(inputtxt.value.trim())) {
        showSucces(input)
    }else {
        showError(input,'Phone Number is not invalid');
    }
}


// check passwords match
function checkPasswordMatch(input1, input2) {
    if(input1.value !== input2.value) {
        showError(input2, 'Passwords do not match');
    }
}
//Event Listeners
var clickMe = document.querySelector('#submitButton');
// This will run when the .click-me element is clicked
clickMe.addEventListener('click', function (event) {
	console.log("KAA");
	checkRequired([username, email,phone,cont_country]);
	// checkRequired([username]);
	// checkRequired([email]);

    checkLength(username,3,15);	
    checkEmail(email);
});
// form.addEventListener('submit',function(e) {
//     // e.preventDefault();
//     // console.log("Karthik");
//     // // checkRequired([username, email, password, password2]);
//     // checkRequired([username]);
//     // checkLength(username,3,15);
//     // // checkLength(password,6,25);
//     // // checkEmail(email);
//     // // checkPasswordMatch(password, password2);
// });
</script>

</body>
</html>

