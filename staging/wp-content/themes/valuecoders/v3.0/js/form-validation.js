const form 			= document.getElementById('contact-form-section');
const username 		= document.getElementById('cont_name');
const email 		= document.getElementById('cont_email');
const phone 		= document.getElementById('cont_phpne');
const countriesData = document.getElementById('cont_country');
const uRequirement 	= document.getElementById('user-req');

const weHelp 		= document.getElementById('inp-we-help');
const expDate 		= document.getElementById('inp-expdate');
const inpResources 	= document.getElementById('inp-resources');
const inpHlong 		= document.getElementById('inp-howlong');

const captcha   = document.getElementById('j-quiz-ans');

NiceSelect.bind(document.getElementById("select-wehelp"),{placeholder:'Please Select from the dropdown'});
NiceSelect.bind(document.getElementById("inp-expdate"),{placeholder:'Please Select from the dropdown'});
NiceSelect.bind(document.getElementById("inp-resources"),{placeholder:'Please Select from the dropdown'});
NiceSelect.bind(document.getElementById("inp-howlong"),{placeholder:'Please Select from the dropdown'});

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
        showSucces(input)
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

//email.addEventListener("keyup", checkEmailEvent);
//email.addEventListener("keypress", checkEmailEvent);
//email.addEventListener("keydown", checkEmailEvent);
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
            validateMquiz();
        }
    });
}


//check input Length
function checkLength(input, min ,max) {
	//console.log(input.name);
	let e = input.value.trim();
    if( (input.value.length < min) || (!/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e)) ) {
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
	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test( input ) ){
		return false;
	}else{
		return true;
	}
}

function showErrorCF(input, message){
    const formControl 	= input.parentElement;
    const small 		= formControl.querySelector('small');
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

function checkRequiredCF(inputArr) {
    inputArr.forEach(function(input){
    	let e = input.value.trim();
    	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){
			if( input.name == "expected-date" ){
				showErrorCF(input,"Please select expected start date");
			}else if( input.name == "count-resources"  ){
				showErrorCF(input, `Please select number of engineers would you like to add`);	
			}else if( input.name == "howlong"  ){
				showErrorCF(input, `Please select how long will you need these engineers`);	
			}else if( input.name == "we-help"  ){
				showErrorCF(input, `Please select this field`);	
			}
    	}
    });
}

function vcCmnFormValidation(){
	let cf_array = [weHelp,expDate];
	if( weHelp.value == "Team Extension" ){
	cf_array = [weHelp, expDate, inpResources, inpHlong];
	}else if( weHelp.value == "None of the above" ){
	cf_array = [weHelp];	
	}
	checkRequired( [username, email, phone, countriesData, uRequirement, captcha] );
	checkRequiredCF(cf_array);
	if(
		( vcSpaceChecker(email.value.trim()) === true ) && 
		( vcSpaceChecker(username.value.trim()) === true ) && 
		( vcSpaceChecker(phone.value.trim()) === true ) && 
		( vcSpaceChecker(countriesData.value.trim()) ===true ) && 
		( vcSpaceChecker(uRequirement.value.trim()) === true ) 
	){
		const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if( !sre.test(email.value.trim()) ){
			return false;
		}
		let eCount = 0;
		cf_array.forEach(function(input){
	    	if( input.value == "" ){
	    	eCount++;
	    	}
    	});
		
		if( eCount > 0 ){
			return false;
		}
		
		if( validateMquiz() === false){
            return false;
        }

		var form 	= document.getElementById("contact-form-section");
		var formBtn = document.getElementById("submitButton");
		form.classList.add('in-process');
		formBtn.value = "Please wait...";
		/*
		alert("Do Submit");
		return false;
		*/
		formBtn.disabled = true;
		form.submit(); 
	}else{
		return false;	
	}
}

function edElmPosition( pos ){
	let selectFld 	= document.getElementById("exp-date-row");
	let afterPos 	= document.getElementById("file-type-error");
	let inPos 		= document.getElementById("team-ext-col");
	//alert( selectFld.outerHTML );
	if( pos == "stay" ){
		inPos.insertAdjacentHTML("afterend", selectFld.outerHTML);
	}else{
		afterPos.insertAdjacentHTML("afterend", selectFld.outerHTML);
	}
	selectFld.remove();
}

function setoptValue( val, target, label, input, parent_col, elm ){
	let prDiv 		= document.getElementById( parent_col );
	let arrow 		= prDiv.getElementsByClassName('arrow-btn');
	let select 		= prDiv.getElementsByClassName('in-options');	
	let labelSpan 	= document.getElementById( label );
	let inputSpan 	= document.getElementById( input );	
	let divTarget 	= document.getElementById( target );		
	

	if( val !== "" ){
		let errorSmall 	= prDiv.getElementsByTagName('small');
		let errorDiv 	= prDiv.getElementsByClassName('select-box');
		if( errorSmall[0] ){
			errorSmall[0].innerHTML = "";
			errorDiv[0].classList.remove("verror");	
		}
	}



	document.querySelectorAll('#'+parent_col+' .select-box')[0].classList.add('active');

	[].forEach.call(document.querySelectorAll('#'+parent_col+' .in-options li'), function (el) {
		el.classList.remove("active");
	});	
	elm.classList.add("active");
	let srtDate = document.getElementById("exp-date-row");
	if( (val == "Other Technology Needs") || (val == "None of the above") ){
		srtDate.style.display = "none";
	}else{
		srtDate.style.display = "block";
	}

	if( target !== "sub-opt" ){ 
		/*
		//Postion Change Issue
		if( target === "team-ext-col" ){
			edElmPosition( "stay" );
		}else if( target === "target-div" ){
			edElmPosition( "away" );
		}
		*/

		if( target == 'target-div' ){
			resetErrorCF("exp-date-row");	
			document.getElementById("label-resource-count").innerHTML = "Please Select from the dropdown";
			document.getElementById("label-howlong").innerHTML = "Please Select from the dropdown";
			
			document.querySelectorAll('#team-ext-col .select-box')[0].classList.remove('active');
			document.querySelectorAll('#team-ext-col .select-box')[1].classList.remove('active');
			
			document.getElementById("inp-resources").value = "";
			document.getElementById("inp-howlong").value = "";

			[].forEach.call(document.querySelectorAll('#team-ext-col.opt-div'), function (el) {
				el.style.display = 'none';
			});	
		}else if( target == 'rb-other' ){
			document.getElementById('oneMonth').checked = true;
			[].forEach.call(document.querySelectorAll('#radio-date.opt-div'), function (el) {
				el.style.display = 'none';
			});	
		}else{
			[].forEach.call(document.querySelectorAll('#'+target+'.opt-div'), function (el) {
				el.style.display = 'none';
			});		
		}
		
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
	

	[].forEach.call(document.querySelectorAll('ul.in-options.open-close'), function (el) {
		if( el.classList.contains("open-close")){
			if(!divTarget.querySelector('ul.in-options.open-close')){
				el.classList.remove("open-close");
			}
			console.log( el );
			//el.classList.remove("open-close");
		}
	});

	arrow[0].classList.toggle('rotate');
	select[0].classList.toggle('open-close');
}

function checkphonenumber(e) {
	let inkeys = [46, 8, 9, 27, 13, 187, 189, 16, 17]
    inkeys.includes(e.keyCode, inkeys) || 65 == e.keyCode && !0 === e.ctrlKey || 86 == e.keyCode && !0 === e.ctrlKey || 67 == e.keyCode && !0 === e.ctrlKey || 88 == e.keyCode && !0 === e.ctrlKey || e.keyCode >= 35 && e.keyCode <= 39 || (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault()
}
document.addEventListener('click', function(event) {
	//console.log( event.target );
	if(!event.target.matches('div.select-box, a.select-first')) {
		[].forEach.call(document.querySelectorAll('ul.in-options.open-close'), function (el) {
			if( el.classList.contains("open-close")){
				el.classList.remove("open-close");	
			}
		});
		[].forEach.call(document.querySelectorAll('span.arrow-btn'), function (el) {
			if( el.classList.contains("rotate")){
				el.classList.remove("rotate");	
			}
		});
	}
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

function cap_limit( element ){
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