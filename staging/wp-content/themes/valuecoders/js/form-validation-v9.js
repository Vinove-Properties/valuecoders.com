//pxl-logoslide
if( document.getElementById("pxl-logoslider") ){
	new Glide('.logoslide', { type: 'carousel', autoplay: 1, animationDuration: 10000, animationTimingFunc: 'linear', gap: 0, startAt: 0, perView: 1 }).mount();
}

document.addEventListener('DOMContentLoaded', function() {	
	//window.scrollTo(0, 60);
	window.scrollTo({ top: 60, behavior: 'smooth' });
});

const form 			= document.getElementById('contact-form-section');
const username 		= document.getElementById('cont_name');
const email 		= document.getElementById('cont_email');
const phone 		= document.getElementById('cont_phpne');

const countriesData = document.getElementById('cont_country');
const uRequirement 	= document.getElementById('user-req');

const weHelp 		= document.getElementById('select-wehelp');

const expDate 		= document.getElementById('inp-expdate'); //
const inpResources 	= document.getElementById('inp-resources');
const inpHlong 		= document.getElementById('inp-howlong');


NiceSelect.bind(document.getElementById("select-wehelp"),{placeholder:'Please select from the dropdown'});

// document.addEventListener('DOMContentLoaded', function(){
// username.focus();
// }, false);

function showError(input, message , spDiv = false){
    const formControl   = input.parentElement;
    const fldPapa      	= input.closest('.form-text-cont');
    fldPapa.classList.add("verror");
    const small = fldPapa.querySelector('small');
    small.innerText = message;
}

function doNotingonFocus(input) {
    const formControl = input.parentElement;
    formControl.className = 'user-input form-control';
}

function checkLettersSpacesDots(str) {
	return /^[a-zA-Z\s.,]+$/.test(str);
}

//show success colour
function showSucces(input){
	const formControl 	= input.parentElement;
    const fldPapa      	= input.closest('.form-text-cont');
    fldPapa.classList.remove("verror");
	const small 		= fldPapa.querySelector('small');
	formControl.classList.remove('verror');
	small.innerText = 'success';
}

//check email is valid
function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())){
        showSucces(input);
    }else {
    	if( input.value == '' ){
    		showError(input,'Please Fill Email');
    	}else{
    		showError(input,'Please fill valid email address');	
    	}
    }
}

function phonenumber(inputtxt){
    if( (/^[A-Za-z0123456789()\s.+-]+$/.test(inputtxt.value.trim()) && inputtxt.value.length >= 6) ){   
        showSucces( inputtxt, "phone-error" )
    }else{
        if( inputtxt.value == '' ){
            showError(inputtxt,'Please Fill Phone', "phone-error");
        }else{
            showError( inputtxt, 'Please Fill Valid Phone Number', "phone-error" );
        }        
    }
}

username.addEventListener("keypress", checkUseName);
username.addEventListener("focusout", checkUseName);
username.addEventListener("keydown", ws_validateStr);

username.addEventListener("focusin", function(){
	doNotingonFocus(username);
});

countriesData.addEventListener("keyup", checkCont);
countriesData.addEventListener("keypress", checkCont);
countriesData.addEventListener("keydown", ws_validateStr);
countriesData.addEventListener("focusout", checkCont);

weHelp.addEventListener("change", function(e){
	let val = e.target.value;
	if(val == "Team Extension"){
	uRequirement.placeholder = "What Is The Expected Start Date? \nHow Many Engineers Would You Like To Add?\nFor How Long Will You Need These Engineers?";	
	}else{
	uRequirement.placeholder = "";	
	}
	// if( val = "Dedicated Software Team" ){
	// }else if(val = "Software Development"){
	// }else if(val = "Other Technology Needs"){
	// }else if(val = "career"){
	// }else{}
	const fldPapa = weHelp.closest('.form-text-cont');
	if( weHelp.value !== "" ){
		fldPapa.classList.remove("verror");
		fldPapa.classList.add("is-selected");
	}
	//loadReCapJS();
});

var getKeyCode = function (str) {
    return str.charCodeAt(str.length - 1);
}

email.addEventListener("keyup", checkEmailEvent);
email.addEventListener("keydown", checkEmailEvent);
email.addEventListener("keypress",checkEmailEvent);
email.addEventListener("focusout", checkEmailEvent);
email.addEventListener("focusin", function(){
	doNotingonFocus(email);
});

	
uRequirement.addEventListener("keyup", checkURequirement);
uRequirement.addEventListener("keypress", checkURequirement);
uRequirement.addEventListener("keydown", checkURequirement);
uRequirement.addEventListener("focusout", checkURequirement);
uRequirement.addEventListener("focusin", checkURequirement);


function checkEmailEvent(event){
	checkEmail( email );
}
function checkUseName(event){
	//console.log( username.value.length );
	checkLength(username,2,49);
	if( checkLettersSpacesDots( username.value.trim() ) === false ){
       showError(username, "Please Fill Name");
    }
}

function checkCont(event){
  checkLength(countriesData,1,60);
}

function checkPhone(event){
	checkLength(phone,6,30);
	phonenumber(phone);
}

function checkURequirement(event){
	if( !document.body.classList.contains('career-opt') ){
		checkLength(uRequirement,3,1500);
	}
	loadReCapJS();
}

function checkRequired(inputArr){
    let opt = false; 
    inputArr.forEach(function(input){
    	let e = input.value.trim();
    	//console.log( input.name +" : "+ e );
        if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){
			if( input.name == "user-name"  ){
				showError(input, `Please Fill Name`);
			}else if( input.name == "user-req" ){
				showError(input, `Please Fill Requirement`);
			}else if( input.name == "user-phone" ){
				showError(input, `Please Fill Phone`);
			}else if( input.name == "user-email" ){
				showError(input, `Please Fill Email`);
			}else{
				showError(input,`This Field is required`)	
			}
        }else{
		    checkEmail(email);
		    checkLength(phone,6,18);
        }
    });
}

//check input Length
function checkLength(input, min ,max) {
	let e = input.value.trim();
	//console.log( input.name +" :VALUE: " + input.value.length + " : Min L " + min );
    if( input.value.length < min ){
    	if( input.name == "user-name"  ){    		
			showError(input, `Please Fill Name`);
		}else if( input.name == "user-req"  ){
			showError(input, `Please Fill Requirement`);	
		}else if( input.name == "user-phone"  ){
			//showError(input, `Please Fill Valid Phone Number`);	
		}else if( input.name == "user-email"  ){
			showError(input, `Please Fill Email`);	
		}else if( input.name == "user-country"  ){
			showError(input, `Please Fill Country`);	
		}else{
			showError(input, `Value must be at least ${min} characters`);
		}    
    }else{
    	if( input.value.length > max ){
    		if( input.name == "user-name" ){
    			showError(input, `Name not be more then ${max} characters`);
    		}    		
    	}else{
	    	showSucces(input);
    	}
    }
}

function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

function vcSpaceChecker( input ){
	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test( input ) ){
		return false;
	}else{
		return true;
	}
}

function showErrorCF(input, message){
    const formControl 	= input.parentElement;
    const small 		= formControl.querySelector('small');
    const fldPapa       = input.closest('.form-text-cont');
    fldPapa.classList.add("verror");
    formControl.classList.add("verror");
    small.innerText = message;
}

function resetErrorCF( emlID ){
	let prDiv 		= document.getElementById(emlID);
	let errorSmall 	= prDiv.getElementsByTagName('small');
	let errorDiv 	= prDiv.getElementsByClassName('select-box');
	if( errorSmall[0] ){
		errorSmall[0].innerHTML = "";
		errorDiv[0].classList.remove("verror");	
	}
}

async function vcCmnFormValidation(){
	checkRequired( [username, email, weHelp, countriesData, uRequirement] );
	if(	
	( vcSpaceChecker(username.value.trim()) === true ) && 
	( vcSpaceChecker(email.value.trim()) === true ) && 
	( vcSpaceChecker(weHelp.value.trim()) === true ) && 
	( vcSpaceChecker(countriesData.value.trim()) ===true ) && 
	( vcSpaceChecker(uRequirement.value.trim()) ===true ) 
	){ 
	const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if( !sre.test(email.value.trim()) ){
		return false;
	}

	let rcToken = new Promise( (resolve, reject) =>{
	grecaptcha.ready(function(){
		grecaptcha.execute('6LfpW60nAAAAAO38ivvX-w6ZqaRR4FcrjuaeBc6w', {action:'validate_captcha'}).then(function(token){
			resolve( token );
		});
	});
	});
	let pxlToken = await rcToken;
	if( pxlToken ){
		let rcFld1 = document.getElementById('g-recaptcha-response');
        if( rcFld1 ){
        	rcFld1.value = pxlToken;
        }
	}

	var form 	= document.getElementById("contact-form-section");
	var formBtn = document.getElementById("submitButton");
	form.classList.add('in-process');
	formBtn.value = "Please wait...";
	formBtn.disabled = true;
	form.submit();
	}else{
		return false;	
	}
}

function checkphonenumber(e) {
	let inkeys = [46, 8, 9, 27, 13, 187, 189, 16, 17]
    inkeys.includes(e.keyCode, inkeys) || 65 == e.keyCode && !0 === e.ctrlKey || 86 == e.keyCode && !0 === e.ctrlKey || 67 == e.keyCode && !0 === e.ctrlKey || 88 == e.keyCode && !0 === e.ctrlKey || e.keyCode >= 35 && e.keyCode <= 39 || (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault()
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
function ws_checkphonenumber(e) {
    let keyArray = [46, 8, 9, 27, 13, 187, 189, 16, 17];    
    -1 !== keyArray.indexOf(e.keyCode) || 65 == e.keyCode && !0 === e.ctrlKey || 86 == e.keyCode && !0 === e.ctrlKey || 67 == e.keyCode && !0 === e.ctrlKey || 88 == e.keyCode && !0 === e.ctrlKey || e.keyCode >= 35 && e.keyCode <= 39 || (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault()
}

function ws_validateStr( e ) {
	let backSpace = e.keyCode || e.charCode;
	//alert( backSpace );
	const passKeys = [8, 46, 37, 39];
	if( (username.value.length >= 50) && !passKeys.includes(backSpace) ){
		e.preventDefault();
		return false;
	}

	var theEvent = e || window.event;
	if (theEvent.type === "paste") {
		key = event.clipboardData.getData("text/plain");
	}else{
		var key = theEvent.keyCode || theEvent.which;
	}

    if ( key > 64 && key < 91 || 8 == key || 46 == key || 9 == key || 32 == key || 37 == key || 39 == key || 38 == key || 40 == key)
        return !0;
    e.preventDefault()
}


var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","zMonaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
function autocomplete(inp, arr) {
  var currentFocus;
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      //cont_countryautocomplete-list
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      var sCounter = 0;
      for (i = 0; i < arr.length; i++){
        var re = new RegExp(val, 'i');
        if (arr[i].match(re)){
 		 sCounter++;	
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          b.addEventListener("click", function(e) {
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
          //a.setAttribute("class", "autocomplete-items has-item");
        }else{
          //a.setAttribute("class", "autocomplete-items has-noitm");
        }
      }
      if( sCounter > 0 ){
      	a.setAttribute("class", "autocomplete-items has-item");
      }else{
      	a.setAttribute("class", "autocomplete-items");
      }
  });
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        currentFocus++;
        addActive(x);
      } else if (e.keyCode == 38) { //up
        currentFocus--;
        addActive(x);
      } else if (e.keyCode == 13) {
        e.preventDefault();
        if (currentFocus > -1) {
          if (x) x[currentFocus].click();
        }
      }
  });
  
  phone.addEventListener('focusin',function(e){
  	closeAllLists(e.target);
  });
  email.addEventListener('focusin',function(e){
  	closeAllLists(e.target);
  });

  function addActive(x) {
    if (!x) return false;
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
autocomplete(document.getElementById("cont_country"), countries);

/*Handle File uploader*/
function upload_file(e){
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
	xhttp.open("GET", vcObj.web_url+"/delete_file.php?delete=1&imageName="+imageName, true);
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

    var form_data = new FormData();
    form_data.append('file', file)
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", vcObj.web_url+"/file-uploader.php", true);
    xhttp.onload = function(event){
        if (xhttp.status == 200) {
        	let response =  JSON.parse(xhttp.responseText);	        	
        	console.log( file.name );
        	const fileName = file.name;
            const dotIndex = fileName.lastIndexOf('.');
            const baseName = fileName.substring(0, dotIndex);
            const extension = fileName.substring(dotIndex);
            
            let trimmedBaseName = baseName;
            if (baseName.length > 60) {
                trimmedBaseName = baseName.substring(0, 60);
            }
            const trimmedFileName = trimmedBaseName + extension;

        	//console.log( response );
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
			  	let indiv 		= document.createElement('div');
			  	indiv.classList.add("ad-file");
		        indiv.innerHTML = '<span class="up-file">'+trimmedFileName+'</span><button type="button" onclick="return removeMe(this,this.value);" value="'+response.file+'"></button>';
				document.getElementById('gallery').appendChild(indiv);
				}
        	}else{
        		setFileError( response.message );
        	}
        }else{
            console.log("error");
        }
        gloader.classList.remove("active");
    }
    xhttp.send(form_data);
}