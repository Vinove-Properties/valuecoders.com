const sbform 			= document.getElementById('hire-sb-form');
const sbusername 		= document.getElementById('sb_cont_name');
const sbemail 			= document.getElementById('sb_cont_email');
const sbphone 			= document.getElementById('sb_cont_phpne');
const sbcountriesData 	= document.getElementById('cont_country_sb');
const sbuRequirement 	= document.getElementById('sb_user_req');


function sbshowError(input, message){
	const formControl   = input.parentElement;
	const fldPapa      	= input.closest('.form-text-cont');
	fldPapa.classList.add("verror");
	const small 		= fldPapa.querySelector('small');
	small.innerText 	= message;
}

function sbdoNotingonFocus(input){
    const formControl = input.parentElement;
    formControl.className = 'user-input form-control';
}

function sbshowSucces(input){
	const formControl 	= input.parentElement;
    const fldPapa      	= input.closest('.form-text-cont');
    fldPapa.classList.remove("verror");
	const small 		= fldPapa.querySelector('small');
	formControl.classList.remove('verror');
	small.innerText = 'success';
}

function sbcheckEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())){
        sbshowSucces(input);
    }else{
    	if( input.value == '' ){
    		sbshowError(input,'Please Fill Email');
    	}else{
    		sbshowError(input,'Email is not valid');	
    	}
    }
}

function sbphonenumber(inputtxt){
	if( (/^[A-Za-z0123456789()\s.+-]+$/.test(inputtxt.value.trim()) && inputtxt.value.length >= 6) ){	
		sbshowSucces( inputtxt )
	}else{
		if( inputtxt.value == '' ){
    		sbshowError(inputtxt,'Please Fill Phone');
    	}else{
    		sbshowError( inputtxt, 'Phone Number is not valid' );
    	}
		
	}
}

sbusername.addEventListener("keyup", sbcheckUseName);
sbusername.addEventListener("keypress", sbcheckUseName);
sbusername.addEventListener("keydown", sbvalidateStrVc);
sbusername.addEventListener("focusout", sbcheckUseName);

sbcountriesData.addEventListener("keyup", sbcheckCont);
sbcountriesData.addEventListener("keypress", sbcheckCont);
sbcountriesData.addEventListener("keydown", sbvalidateStrVc);
sbcountriesData.addEventListener("focusout", sbcheckCont);

sbphone.addEventListener("keyup", sbcheckPhone);
sbphone.addEventListener("keypress", sbcheckPhone);
sbphone.addEventListener("keydown", sbcheckPhone);
sbphone.addEventListener("focusout", sbcheckPhone);

sbemail.addEventListener("keyup", sbcheckEmailEvent);
sbemail.addEventListener("keydown", sbcheckEmailEvent);
sbemail.addEventListener("keypress",sbcheckEmailEvent);
sbemail.addEventListener("focusout", sbcheckEmailEvent);
sbemail.addEventListener("focusin", function(){
	sbdoNotingonFocus(sbemail);
});


sbuRequirement.addEventListener("keyup", sbcheckURequirement);
sbuRequirement.addEventListener("keypress", sbcheckURequirement);
sbuRequirement.addEventListener("keydown", sbcheckURequirement);
sbuRequirement.addEventListener("focusout", sbcheckURequirement);
sbuRequirement.addEventListener("focusin", sbcheckURequirement);

function sbcheckEmailEvent(event){
	sbcheckEmail(sbemail);
}
function sbcheckUseName(event){
  sbcheckLength(sbusername,3,15);
}

function sbcheckCont(event){
  sbcheckLength(sbcountriesData,1,255);
}

function sbcheckPhone(event){
  sbcheckLength(sbphone,10,10);
  sbphonenumber(sbphone);
}

function sbcheckURequirement(event){
	if( event.type === "focusout" ){
		loadReCapJS();
	}
  	sbcheckLength(sbuRequirement,3,1500);
}


function sbcheckRequired(inputArr) {
    inputArr.forEach(function(input){
    	let e = input.value.trim();
        if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){
			if( input.name == "user-name"  ){
				sbshowError(input, `Please Fill Name`);
			}else if( input.name == "user-req"  ){
				sbshowError(input, `Please Fill Requirement`);
			}else if( input.name == "user-phone"  ){
				sbshowError(input, `Please Fill Phone`);
			}else if( input.name == "user-email"  ){
				sbshowError(input, `Please Fill Email`);
			}else if( input.name == "user-country" ){
				sbshowError(input, `Please Fill Country`);	
			}else{
				sbshowError(input,`This Field is required`)	
			}
        }else {
        	sbcheckLength(sbusername,3,15);	
		    sbcheckEmail(sbemail);
		    sbcheckLength(sbcountriesData,3,255);
        }
    });
}


//check input Length
function sbcheckLength(input, min ,max) {
	//console.log(input.name);
	let e = input.value.trim();
    //if( (input.value.length < min) || (!/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e)) ) {
	if( input.value.length < min ){  	
    	if( input.name == "user-name"  ){
			sbshowError(input, `Please Fill Name`);	
		}else if( input.name == "user-req"  ){
			sbshowError(input, `Please Fill Requirement`);	
		}else if( input.name == "user-phone"  ){
			sbshowError(input, `Please Fill Phone`);	
		}else if( input.name == "user-email"  ){
			sbshowError(input, `Please Fill Email`);	
		}else if( input.name == "user-country"  ){
			sbshowError(input, `Please Fill Country`);	
		}else{
			sbshowError(input, `Value must be at least ${min} characters`);
		}    
    }else {
        sbshowSucces(input);
    }
}

function sbvcSpaceChecker( input ){
	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{1,}/.test( input ) ){
		return false;
	}else{
		return true;
	}
}

async function hireFormValidation(){
	sbcheckRequired( [sbusername, sbemail, sbphone, sbcountriesData, sbuRequirement] );
	if(
		( sbvcSpaceChecker(sbemail.value.trim()) === true ) && 
		( sbvcSpaceChecker(sbusername.value.trim()) === true ) && 
		( sbvcSpaceChecker(sbphone.value.trim()) === true ) && 
		( sbvcSpaceChecker(sbcountriesData.value.trim()) ===true ) && 
		( sbvcSpaceChecker(sbuRequirement.value.trim()) === true ) 
	){
		const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if( !sre.test(sbemail.value.trim()) ){
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

		let form 	= document.getElementById("hire-sb-form");
		let formBtn = document.getElementById("hire-submitButton");
		form.classList.add('in-process');
		formBtn.innerHTML 	= "Please wait...";
		formBtn.disabled 	= true;
		form.submit(); 
		//return false;
	}else{
		return false;	
	}
}


function sbvalidateStrVc( e ) {
	let backSpace = e.keyCode || e.charCode;
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