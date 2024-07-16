/*CMN Function's here*/
function pop_checkLength(input, min ,max) {
	let e = input.value.trim();
    if( input.value.length < min ){
    	if( input.name == "user-name"  ){    		
			pop_showError(input, `Please Fill Name`);
		}else if( input.name == "user-req"  ){
			pop_showError(input, `Please Fill Requirements`);	
		}else if( input.name == "user-phone"  ){
			pop_showError(input, `Please Fill Valid Phone Number`);	
		}else if( input.name == "user-email"  ){
			pop_showError(input, `Please Fill Email`);	
		}else if( input.name == "user-country"  ){
			pop_showError(input, `Please Fill Country`);	
		}else{
			pop_showError(input, `Value must be at least ${min} characters`);
		}    
    }else{
    	if( input.value.length > max ){
    		if( input.name == "user-name" ){
    			pop_showError(input, `Name not be more then ${max} characters`);
    		}    		
    	}else{
    		if( pop_vcSpaceChecker( input.value.trim() ) === false){
				pop_showError(input, `Please Enter Valid Value`);
	    	}else{
	    		pop_showSucces(input);
	    	}	
    	}
    }
}

function pop_checkRequired(inputArr){
    let opt = false; 
    inputArr.forEach(function(input){
    	let e = input.value.trim();
        if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){
			if( input.name == "user-name"  ){
				pop_showError(input, `Please Fill Name`);
			}else if( input.name == "user-req" ){
				pop_showError(input, `Please Fill Requirements`);
			}else if( input.name == "user-phone"  ){
				pop_showError(input, `Please Fill Phone`);
			}else if( input.name == "user-email"  ){
				pop_showError(input, `Please Fill Email`);
			}else if( input.name == "user-country"  ){
				pop_showError(input, `Please Fill Country`);
			}else{
				pop_showError(input,`This Field is required`)	
			}
        }else{
		    //pop_checkEmail(email);
		    //pop_checkLength(phone,6,18);
        }
    });
}

function pop_checkUseName(event){
	pop_checkLength(popusername,2,49);
	if( pop_checkLettersSpacesDots( popusername.value.trim() ) === false ){
       pop_showError(popusername, "Please input valid name.");
    }
}

function pop_countryCheck(event){
	pop_checkLength(popcountry,2,49);
	if( pop_checkLettersSpacesDots( popcountry.value.trim() ) === false ){
       pop_showError(popcountry, "Please input Country.");
    }
}

function pop_showError(input, message , spDiv = false){
    const formControl   = input.parentElement;
    const fldPapa      	= input.closest('.form-text-cont');
    fldPapa.classList.add("verror");
    const small = fldPapa.querySelector('small');
    small.innerText = message;
}

function pop_doNotingonFocus(input) {
    const formControl 	= input.parentElement;
    const fldPapa      	= input.closest('.form-text-cont');
    fldPapa.classList.remove("verror");
}

function pop_checkLettersSpacesDots(str) {
	return /^[a-zA-Z\s.,]+$/.test(str);
}

//show success colour
function pop_showSucces(input){
	const formControl 	= input.parentElement;
    const fldPapa      	= input.closest('.form-text-cont');
    fldPapa.classList.remove("verror");
	const small 		= fldPapa.querySelector('small');
	formControl.classList.remove('verror');
	small.innerText = '';
}

function pop_checkEmail( input ){
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())) {
        pop_showSucces(input);
    }else {
    	if( input.value == '' ){
    		pop_showError(input,'Please Fill Email');
    	}else{
    		pop_showError(input,'Please fill valid email address.');	
    	}
    }
}

function pop_phonenumber(inputtxt){
    if( (/^[A-Za-z0123456789()\s.+-]+$/.test(inputtxt.value.trim()) && inputtxt.value.length >= 6) ){   
        pop_showSucces( inputtxt, "phone-error" )
    }else{
        if( inputtxt.value == '' ){
            pop_showError(inputtxt,'Please Fill Phone', "phone-error");
        }else{
            pop_showError( inputtxt, 'Please Fill Valid Phone Number', "phone-error" );
        }        
    }
}

function pop_vcSpaceChecker( input ){
	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test( input ) ){
		return false;
	}else{
		return true;
	}
}

function pop_ws_validateStr( e ) {
	let backSpace = e.keyCode || e.charCode;
	//alert( backSpace );
	const passKeys = [8, 46, 37, 39];
	if( (popusername.value.length >= 50) && !passKeys.includes(backSpace) ){
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

function pop_checkEmailEvent(event){
	pop_checkEmail(popemail);
}

function pop_checkPhone(event){
	evt = (event) ? event : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    	event.preventDefault();
    }
	
	pop_checkLength(popphone,8,18);
	pop_phonenumber(popphone);
}

function ws_checkpop_phonenumber(e) {
    let keyArray = [46, 8, 9, 27, 13, 187, 189, 16, 17];
    
    -1 !== keyArray.indexOf(e.keyCode) || 65 == e.keyCode && !0 === e.ctrlKey || 86 == e.keyCode && !0 === e.ctrlKey || 67 == e.keyCode && !0 === e.ctrlKey || 88 == e.keyCode && !0 === e.ctrlKey || e.keyCode >= 35 && e.keyCode <= 39 || (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault()
}

function pop_checkURequirement(event){
  pop_checkLength(popuRequirement,3,1500);
}

/*Form Dec*/
const popform 			= document.getElementById('cmn-pop-form');
const popusername 		= document.getElementById('pop-name');
const popemail 			= document.getElementById('pop-email');
const popphone 			= document.getElementById('pop-phone');
const popcountry 		= document.getElementById('pop-country');
const popuRequirement 	= document.getElementById('pop-requirement');

popusername.addEventListener("keypress", pop_checkUseName);
popusername.addEventListener("focusout", pop_checkUseName);
popusername.addEventListener("keydown", pop_ws_validateStr);
popusername.addEventListener("focusin", function(){
	pop_doNotingonFocus(popusername);
});

popemail.addEventListener("keyup", pop_checkEmailEvent);
popemail.addEventListener("keydown", pop_checkEmailEvent);
popemail.addEventListener("keypress",pop_checkEmailEvent);
popemail.addEventListener("focusout", pop_checkEmailEvent);
popemail.addEventListener("focusin", function(){
	pop_doNotingonFocus(popemail);
});

if( !document.body.classList.contains('opt-pfld') ){
	popphone.addEventListener("keyup", pop_checkPhone);
	popphone.addEventListener("keypress", pop_checkPhone);
	popphone.addEventListener("focusout", pop_checkPhone);
}
popphone.addEventListener("keydown", ws_checkpop_phonenumber);

popcountry.addEventListener("keypress", pop_countryCheck);
popcountry.addEventListener("focusout", pop_countryCheck);
popcountry.addEventListener("keydown", pop_ws_validateStr);
popcountry.addEventListener("focusin", function(){
	pop_doNotingonFocus(popcountry);
});

popuRequirement.addEventListener("keyup", pop_checkURequirement);
popuRequirement.addEventListener("keypress", pop_checkURequirement);
popuRequirement.addEventListener("keydown", pop_checkURequirement);
popuRequirement.addEventListener("focusout", pop_checkURequirement);
popuRequirement.addEventListener("focusin", pop_checkURequirement);

function vcPopFormValidation(){
	let phoneCheck = true;
	if( document.body.classList.contains('opt-pfld') ){
		pop_checkRequired( [popusername, popemail, popcountry, popuRequirement] );
	}else{
		phoneCheck = (pop_vcSpaceChecker(popphone.value.trim()) === true ) ? true : false; 
		pop_checkRequired( [popusername, popemail, popphone, popcountry, popuRequirement] );
	}
	
	if(
	( pop_vcSpaceChecker(popemail.value.trim()) === true ) && 
	( pop_vcSpaceChecker(popusername.value.trim()) === true ) && 
	( phoneCheck === true ) && 
	( pop_vcSpaceChecker(popcountry.value.trim()) ===true ) && 
	( pop_vcSpaceChecker(popuRequirement.value.trim()) === true )
	){ 
	//alert("Goo"); return false;

	const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if( !sre.test(popemail.value.trim()) ){
		return false;
	}
	let errCount = 0 
	let errorCheck = document.querySelectorAll('#pop-form .form-text-cont.verror');
    [].forEach.call(errorCheck, function(div){
        errCount++;
    });
    if( errCount > 0 ) return false;
    
	popform.classList.add('in-process');
	let formBtn 		= document.getElementById("submitButton-pop");
	formBtn.value 		= "Please wait...";
	formBtn.disabled 	= true;
	popform.submit();
	}
	return false;
}