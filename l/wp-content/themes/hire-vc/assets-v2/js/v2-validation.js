/*CMN Function's here*/
function checkLength(input, min ,max) {
	let e = input.value.trim();
    if( input.value.length < min ){
    	if( input.name == "user-name"  ){    		
			showError(input, `Please Fill Name`);
		}else if( input.name == "user-req"  ){
			showError(input, `Please Fill Requirements`);	
		}else if( input.name == "user-phone"  ){
			showError(input, `Please Fill Valid Phone Number`);	
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
    		/*
    		if( vcSpaceChecker( input.value.trim() ) === false){
				showError(input, `Please Enter Valid Value`);
	    	}else{
	    		showSucces(input);
	    	}
	    	*/
	    	showSucces(input);
    	}
    }
}

function checkRequired(inputArr){
    let opt = false; 
    inputArr.forEach(function(input){
    	let e = input.value.trim();
        if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{1,}/.test(e) ){
			if( input.name == "user-name"  ){
				showError(input, `Please Fill Name`);
			}else if( input.name == "user-req" ){
				showError(input, `Please Fill Requirements`);
			}else if( input.name == "user-phone"  ){
				showError(input, `Please Fill Phone`);
			}else if( input.name == "user-email"  ){
				showError(input, `Please Fill Email`);
			}else{
				showError(input,`This Field is required`)	
			}
        }else{
		    //checkEmail(email);
		    //checkLength(phone,6,18);
        }
    });
}

function checkUseName(event){
	checkLength(username,2,49);
	if( checkLettersSpacesDots( username.value.trim() ) === false ){
       showError(username, "Please input valid name.");
    }
}

function countryCheck(event){
	checkLength(country,1,49);
	if( checkLettersSpacesDots( country.value.trim() ) === false ){
       showError(country, "Please input Country.");
    }
}

function showError(input, message , spDiv = false){
    const formControl   = input.parentElement;
    const fldPapa      	= input.closest('.form-text-cont');
    fldPapa.classList.add("verror");
    const small = fldPapa.querySelector('small');
    small.innerText = message;
}

function doNotingonFocus(input) {
    const formControl 	= input.parentElement;
    const fldPapa      	= input.closest('.form-text-cont');
    fldPapa.classList.remove("verror");
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

function checkEmail( input ){
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

function vcSpaceChecker( input ){
	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test( input ) ){
		return false;
	}else{
		return true;
	}
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

function checkEmailEvent(event){
	checkEmail(email);
}

function checkPhone(event){
	evt = (event) ? event : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    	event.preventDefault();
    }
	
	checkLength(phone,8,18);
	phonenumber(phone);
}

function ws_checkphonenumber(e) {
    let keyArray = [46, 8, 9, 27, 13, 187, 189, 16, 17];
    
    -1 !== keyArray.indexOf(e.keyCode) || 65 == e.keyCode && !0 === e.ctrlKey || 86 == e.keyCode && !0 === e.ctrlKey || 67 == e.keyCode && !0 === e.ctrlKey || 88 == e.keyCode && !0 === e.ctrlKey || e.keyCode >= 35 && e.keyCode <= 39 || (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault()
}

function checkURequirement(event){
  checkLength(uRequirement,3,1500);
}

/*Form Dec*/
const form 			= document.getElementById('cmn-form');
const username 		= document.getElementById('cont_name');
const email 		= document.getElementById('cont_email');
const phone 		= document.getElementById('cont_phpne');
const country 		= document.getElementById('cont_country');
const uRequirement 	= document.getElementById('cont_req');

username.addEventListener("keypress", checkUseName);
username.addEventListener("focusout", checkUseName);
username.addEventListener("keydown", ws_validateStr);
username.addEventListener("focusin", function(){
	doNotingonFocus(username);
});

email.addEventListener("keyup", checkEmailEvent);
email.addEventListener("keydown", checkEmailEvent);
email.addEventListener("keypress",checkEmailEvent);
email.addEventListener("focusout", checkEmailEvent);
email.addEventListener("focusin", function(){
	doNotingonFocus(email);
});

if( !document.body.classList.contains('opt-pfld') ){
phone.addEventListener("keyup", checkPhone);
phone.addEventListener("keypress", checkPhone);
phone.addEventListener("focusout", checkPhone);
}
phone.addEventListener("keydown", ws_checkphonenumber);

//country.addEventListener("keypress", countryCheck);
country.addEventListener("focusout", countryCheck);
country.addEventListener("keydown", ws_validateStr);
country.addEventListener("focusin", function(){
	doNotingonFocus(country);
});

uRequirement.addEventListener("keyup", checkURequirement);
uRequirement.addEventListener("keypress", checkURequirement);
uRequirement.addEventListener("keydown", checkURequirement);
uRequirement.addEventListener("focusout", checkURequirement);
uRequirement.addEventListener("focusin", checkURequirement);

function vcCmnFormValidation(){
	let phoneCheck = true;
	if( document.body.classList.contains('opt-pfld') ){
		checkRequired( [username, email, country, uRequirement] );
	}else{
		phoneCheck = (vcSpaceChecker(phone.value.trim()) === true ) ? true : false; 
		checkRequired( [username, email, phone, country, uRequirement] );
	}

	if(
	( vcSpaceChecker(email.value.trim()) === true ) && 
	( vcSpaceChecker(username.value.trim()) === true ) && 
	( phoneCheck === true ) && 
	( vcSpaceChecker(country.value.trim()) ===true ) && 
	( vcSpaceChecker(uRequirement.value.trim()) === true )
	){
	//alert("Bingoo"); return false;
	const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if( !sre.test(email.value.trim()) ){
		return false;
	}
	let errCount = 0 
	let errorCheck = document.querySelectorAll('#ftr-cmn .form-text-cont.verror');
    [].forEach.call(errorCheck, function(div){
        errCount++;
    });
    if( errCount > 0 ) return false;
    
	form.classList.add('in-process');
	let formBtn 		= document.getElementById("submitButton");
	formBtn.value 		= "Please wait...";
	formBtn.disabled 	= true;
	form.submit();
	}
	return false;
}