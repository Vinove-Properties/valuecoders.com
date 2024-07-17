function showError(input, message) {
    const formControl = input.closest('div.user-input');
    formControl.classList.add("verror") ;    
    const small = formControl.querySelector('small');
    small.innerText = message;
}

function checkLettersSpacesDots(str) {
	return /^[a-zA-Z\s.,]+$/.test(str);
}

function doNotingonFocus(input) {
    const formControl = input.parentElement;
    formControl.className = 'user-input form-control';
}

function showSucces(input){
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.classList.add("success") ;
    formControl.classList.remove("verror");
	small.innerText = '';	
}

function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())) {
        showSucces(input);
    }else {
    	if( input.value == '' ){
    		showError(input,'Please Fill Email');
    	}else{
    		showError(input,'Please fill valid email address');	
    	}
    }
}

function urlCheck(input){
    const regex 	= /^(https?:\/\/)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(\/[a-zA-Z0-9-._~:?#@!$&'()*+,;=]*)*\/?$/;   
    //const regex 	= /^(((http|https):\/\/|)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,6}(:[0-9]{1,5})?(\/.*)?)$/;

    if( regex.test(input.value.trim()) ){
        showSucces(input);
    }else {
    	if( input.value == '' ){
    		showError(input,'Please Fill website url');
    	}else{
    		showError(input,'Please fill valid website url');	
    	}
    }
    return regex.test(input);
}

function ws_validateStr( e ) {
	let backSpace = e.keyCode || e.charCode;
	const passKeys = [8, 46, 37, 39];
	// if( (username.value.length >= 50) && !passKeys.includes(backSpace) ){
	// 	e.preventDefault();
	// 	return false;
	// }
	var theEvent = e || window.event;
	if (theEvent.type === "paste") {
		key = event.clipboardData.getData("text/plain");
	}else{
		var key = theEvent.keyCode || theEvent.which;
	}

    if( key > 64 && key < 91 || 8 == key || 46 == key || 9 == key || 32 == key || 37 == key || 39 == key || 38 == key || 40 == key)
    return !0;
    e.preventDefault()
}

function phonenumber(inputtxt){
    if( (/^[A-Za-z0123456789()\s.+-]+$/.test(inputtxt.value.trim()) && inputtxt.value.length >= 6) ){		
		showSucces( inputtxt );
	}else{
		if( inputtxt.value == '' ){
    		showError(inputtxt,'Please Fill Phone');
    	}else{
    		showError( inputtxt, 'Phone Number is not valid' );
    	}
		
	}
}

function phonenumber(inputtxt){
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

function ws_checkphonenumber(e) {
  let keyArray = [46, 8, 9, 27, 13,
        187, 189, 16, 17
    ]; - 1 !== keyArray.indexOf(e
            .keyCode) || 65 == e
        .keyCode && !0 === e.ctrlKey ||
        86 == e.keyCode && !0 === e
        .ctrlKey || 67 == e.keyCode && !
        0 === e.ctrlKey || 88 == e
        .keyCode && !0 === e.ctrlKey ||
        e.keyCode >= 35 && e.keyCode <=
        39 || (e.shiftKey || e.keyCode <
            48 || e.keyCode > 57) && (e
            .keyCode < 96 || e.keyCode >
            105) && e.preventDefault()
}

function checkRequired( inputArr ){
    inputArr.forEach(function(input){
    	let e = input.value.trim();
        if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){
			if( (input.name == "fullname") || (input.name == "name") ){
				showError(input, `Please Fill Name`);
			}else if( input.name == "requirement"  ){
				showError(input, `Please Fill Requirement`);
			}else if( input.name == "phone"  ){
				showError(input, `Please Fill Phone`);
			}else if( input.name == "user-country"  ){
			    showError(input, `Please Fill Country`);	
			}else if( input.name == "email"  ){
				showError(input, `Please Fill Email`);
			}else if( input.name == "website"  ){
				showError(input, `Please Fill Website URL`);
			}else if( input.name == "company"  ){
				showError(input, `Please Fill Company`);	
			}else if( input.name == "fname"  ){
				showError(input, `Please Fill First Name`);	
			}else if( input.name == "lname"  ){
				showError(input, `Please Fill Last Name`);	
			}else{
				showError(input,`This Field is required`)	
			}
        }
    });
}

//check input Length
function checkLength(input, min ,max) {
	let e = input.value.trim();
    if( (input.value.length < min) ) {
    	if( input.name == "fullname"  ){
			showError(input, `Please Fill Name`);	
		}else if( input.name == "requirement"  ){
			showError(input, `Please Fill Requirement`);	
		}else if( input.name == "phone"  ){
			//showError(input, `Please Fill Phone`);	
		}else if( input.name == "user-country"  ){
			showError(input, `Please Fill Country`);
		}else if( input.name == "email"  ){
			showError(input, `Please Fill Email`);	
		}else if( input.name == "company"  ){
			showError(input, `Please Fill Company`);	
		}else if( input.name == "fname"  ){
			showError(input, `Please Fill First Name`);	
		}else if( input.name == "lname"  ){
			showError(input, `Please Fill Last Name`);	
		}else if( input.name == "website"  ){
			showError(input, `Please Fill Website URL`);	
		}else{
			showError(input, `Value must be at least ${min} characters`);
		}    
    }else {
        if( input.value.length > max ){

    	}else{
	    	showSucces(input);
    	}
    }
}

function vcSpaceChecker( input ){
	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test( input ) ){
		return false;
	}else{
		return true;
	}
}

function checkUseName(input, msg = "Please Fill Name"){
 	checkLength(input.target,2,49);
	if( checkLettersSpacesDots(input.target.value.trim() ) === false ){
       showError(input.target, msg);
    }
}

function strInputValidation(msg = "Please Fill This Field", input){
 	checkLength(input.target,2,49);
	// if( checkLettersSpacesDots(input.target.value.trim() ) === false ){
    //    showError(input.target, msg);
    // }
}

function checkURequirement(input){
	loadReCapJS();
  	checkLength(input.target,3,1500);
}

function checkEmailEvent(input){
	//console.log(input);
	checkEmail(input.target);
}

function urlkEvent(input){
	urlCheck(input.target);
}

function checkPhone(input){
  checkLength(input.target,6,20);
  phonenumber(input.target);
}

function checkfoucsoutPhone(input){
    phonenumber(input.target);
}

// const bnWebsite 	= document.getElementById('bn-website');
// const bnEmail 		= document.getElementById('bn-email');
// const bnPhone 		= document.getElementById('bn-phone');

// bnWebsite.addEventListener("keyup", urlkEvent.bind(bnEmail));
// bnWebsite.addEventListener("keypress", urlkEvent.bind(bnEmail));
// bnWebsite.addEventListener("keydown", urlkEvent.bind(bnEmail));
// bnWebsite.addEventListener("focusout", urlkEvent.bind(bnEmail));

// bnEmail.addEventListener("keyup", checkEmailEvent.bind(bnEmail));
// bnEmail.addEventListener("keypress", checkEmailEvent.bind(bnEmail));
// bnEmail.addEventListener("keydown", checkEmailEvent.bind(bnEmail));
// bnEmail.addEventListener("focusout", checkEmailEvent.bind(bnEmail));

// bnPhone.addEventListener("keyup", checkPhone.bind(bnPhone));
// bnPhone.addEventListener("keypress", checkPhone.bind(bnPhone));
// bnPhone.addEventListener("keydown", ws_checkphonenumber);
// bnPhone.addEventListener("focusout", checkfoucsoutPhone.bind(bnPhone));

// function getAuditReport(){
// 	checkRequired([bnWebsite, bnEmail, bnPhone]);	
// 	if(		
// 		( vcSpaceChecker(bnWebsite.value.trim()) === true ) && 
// 		( vcSpaceChecker(bnEmail.value.trim()) === true ) && 
// 		( vcSpaceChecker(bnPhone.value.trim()) === true ) 
// 	){
// 	return true;
// 	}
// 	return false;
// }


const ldName 	= document.getElementById('ld-name');
const ldEmail 	= document.getElementById('ld-email');
const ldPhone 	= document.getElementById('ld-phone');
const ldWebsite = document.getElementById('ld-website');
const ldReq 	= document.getElementById('ld-req');

ldName.addEventListener("keyup", checkUseName.bind(ldName));
ldName.addEventListener("keypress", checkUseName.bind(ldName));
ldName.addEventListener("keydown", ws_validateStr);
ldName.addEventListener("focusout", checkUseName.bind(ldName));

ldEmail.addEventListener("keyup", checkEmailEvent.bind(ldEmail));
ldEmail.addEventListener("keypress", checkEmailEvent.bind(ldEmail));
ldEmail.addEventListener("keydown", checkEmailEvent.bind(ldEmail));
ldEmail.addEventListener("focusout", checkEmailEvent.bind(ldEmail));

ldPhone.addEventListener("keyup", checkPhone.bind(ldPhone));
ldPhone.addEventListener("keypress", checkPhone.bind(ldPhone));
ldPhone.addEventListener("keydown", ws_checkphonenumber);
ldPhone.addEventListener("focusout", checkfoucsoutPhone.bind(ldPhone));

// ldWebsite.addEventListener("keyup", urlkEvent.bind(ldWebsite));
// ldWebsite.addEventListener("keypress", urlkEvent.bind(ldWebsite));
// ldWebsite.addEventListener("keydown", urlkEvent.bind(ldWebsite));
// ldWebsite.addEventListener("focusout", urlkEvent.bind(ldWebsite));

ldWebsite.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Website URL"));
ldWebsite.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Website URL"));
ldWebsite.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Website URL"));
ldWebsite.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Website URL"));

ldReq.addEventListener("keyup", checkURequirement.bind(ldReq));
ldReq.addEventListener("keypress", checkURequirement.bind(ldReq));
ldReq.addEventListener("keydown", checkURequirement.bind(ldReq));
ldReq.addEventListener("focusout", checkURequirement.bind(ldReq));

async function validateLeadForm(){
	checkRequired([ldName, ldEmail, ldPhone, ldWebsite, ldReq]);
	if(		
		(vcSpaceChecker(ldName.value.trim()) === true) && 
		(vcSpaceChecker(ldEmail.value.trim()) === true) && 
		(vcSpaceChecker(ldPhone.value.trim()) === true) &&
		(vcSpaceChecker(ldWebsite.value.trim()) === true) &&
		(vcSpaceChecker(ldReq.value.trim()) === true)
	){
	const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if( !sre.test(ldEmail.value.trim()) ){
	    showError(ldEmail, 'Please Fill Email');
		return false;
	}
			
	let rcToken = new Promise( (resolve, reject) => {
		grecaptcha.ready(function(){
			grecaptcha.execute('6LdOHZcjAAAAAPTetYrbEoZhdueRkAVucKDbOj7S', {action:'validate_captcha'}).then(function(token){
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
	let hForm 		= document.getElementById("pc-leadform");
	let btn 		= document.getElementById("pc-leadform-submit");
	hForm.classList.add('in-process');
	btn.innerText 	= "Please wait...";
	btn.disabled 	= true;
	hForm.submit();	
	}
	return false;
}

const prFname 	= document.getElementById('pr-fname');
const prLname 	= document.getElementById('pr-lname');
const prEmail 	= document.getElementById('pr-email');
const prPhone 	= document.getElementById('pr-phone');
const prCompany = document.getElementById('pr-company');
const prWebsite = document.getElementById('pr-website');
const prReq 	= document.getElementById('pr-requirement');

prFname.addEventListener("keyup", strInputValidation.bind(null, "Please Fill First Name"));
prFname.addEventListener("keypress", strInputValidation.bind(null, "Please Fill First Name"));
prFname.addEventListener("keydown", ws_validateStr);
prFname.addEventListener("focusout", strInputValidation.bind(null, "Please Fill First Name"));

prLname.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Last Name"));
prLname.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Last Name"));
prLname.addEventListener("keydown", ws_validateStr);
prLname.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Last Name"));

prEmail.addEventListener("keyup", checkEmailEvent.bind(prEmail));
prEmail.addEventListener("keypress", checkEmailEvent.bind(prEmail));
prEmail.addEventListener("keydown", checkEmailEvent.bind(prEmail));
prEmail.addEventListener("focusout", checkEmailEvent.bind(prEmail));

prPhone.addEventListener("keyup", checkPhone.bind(prPhone));
prPhone.addEventListener("keypress", checkPhone.bind(prPhone));
prPhone.addEventListener("keydown", ws_checkphonenumber);
prPhone.addEventListener("focusout", checkfoucsoutPhone.bind(prPhone));

prCompany.addEventListener("keyup", strInputValidation.bind(null, "Please Company Name"));
prCompany.addEventListener("keypress", strInputValidation.bind(null, "Please Company Name"));
prCompany.addEventListener("keydown", ws_validateStr);
prCompany.addEventListener("focusout", strInputValidation.bind(null, "Please Company Name"));

// prWebsite.addEventListener("keyup", urlkEvent.bind(prWebsite));
// prWebsite.addEventListener("keypress", urlkEvent.bind(prWebsite));
// prWebsite.addEventListener("keydown", urlkEvent.bind(prWebsite));
// prWebsite.addEventListener("focusout", urlkEvent.bind(prWebsite));

prWebsite.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Website URL"));
prWebsite.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Website URL"));
prWebsite.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Website URL"));
prWebsite.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Website URL"));

prReq.addEventListener("keyup", checkURequirement.bind(prReq));
prReq.addEventListener("keypress", checkURequirement.bind(prReq));
prReq.addEventListener("keydown", checkURequirement.bind(prReq));
prReq.addEventListener("focusout", checkURequirement.bind(prReq));

async function _getProposal(){
	checkRequired([prFname, prLname, prEmail, prPhone, prCompany, prWebsite, prReq]);
	if(		
		(vcSpaceChecker(prFname.value.trim()) === true) && 
		(vcSpaceChecker(prLname.value.trim()) === true) && 
		(vcSpaceChecker(prEmail.value.trim()) === true) &&
		(vcSpaceChecker(prPhone.value.trim()) === true) &&
		(vcSpaceChecker(prCompany.value.trim()) === true) &&
		(vcSpaceChecker(prWebsite.value.trim()) === true) &&
		(vcSpaceChecker(prReq.value.trim()) === true)
	){
		const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if( !sre.test(prEmail.value.trim()) ){
		    showError(prEmail, 'Please Fill Email');
			return false;
		}
				
		let rcToken = new Promise( (resolve, reject) => {
			grecaptcha.ready(function(){
				grecaptcha.execute('6LdOHZcjAAAAAPTetYrbEoZhdueRkAVucKDbOj7S', {action:'validate_captcha'}).then(function(token){
					resolve( token );
				});
			});
		});
		let pxlToken = await rcToken;
		if( pxlToken ){
			let rcFld1 = document.getElementById('g-recaptcha-response-pr');
	        if( rcFld1 ){
	        	rcFld1.value = pxlToken;
	        }
		}
		let hForm 		= document.getElementById("pc-prform");
		let btn 		= document.getElementById("pc-prform-submit");
		hForm.classList.add('in-process');
		btn.value 		= "Please wait...";
		btn.disabled 	= true;
		hForm.submit();			
		return false;		
	}
	return false;
}