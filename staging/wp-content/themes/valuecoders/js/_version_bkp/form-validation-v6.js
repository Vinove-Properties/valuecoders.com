const form 			= document.getElementById('contact-form-section');
const username 		= document.getElementById('cont_name');
const email 		= document.getElementById('cont_email');
const phone 		= document.getElementById('cont_phpne');
const pExtension 	= document.getElementById('in_ext');

const countriesData = document.getElementById('cont_country');
const uRequirement 	= document.getElementById('user-req');

const weHelp 		= document.getElementById('inp-we-help');
const expDate 		= document.getElementById('inp-expdate');
const inpResources 	= document.getElementById('inp-resources');
const inpHlong 		= document.getElementById('inp-howlong');

const captcha   	= document.getElementById('j-quiz-ans');


//Show input error messages
function showError(input, message , spDiv = false){
    const formControl   = input.parentElement;
    const fldPapa      	= input.closest('.form-text-cont');
    fldPapa.classList.add("verror");
    //formControl.className = 'user-input form-control verror';
    //formControl.classList.add('verror');
    const small = fldPapa.querySelector('small');
    small.innerText = message;
}

function doNotingonFocus(input) {
    const formControl = input.parentElement;
    formControl.className = 'user-input form-control';
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
    if(re.test(input.value.trim())) {
        // if( input.value.length > 49 ){
        //     showError(input, `Value not be more then 50 characters`);
        // }else{
        //     showSucces(input);    
        // }
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
            showError( inputtxt, 'Phone Number is not valid', "phone-error" );
        }
        
    }
}

username.addEventListener("keyup", checkUseName);
username.addEventListener("keypress", checkUseName);
username.addEventListener("focusout", checkUseName);
username.addEventListener("keydown", ws_validateStr);
username.addEventListener("keyup", function(e){
	let backSpace 	= e.keyCode || e.charCode;
	if( (username.value.length >= 10) && (backSpace !== 8) ){		
		console.log( username.value.length );
		e.preventDefault();
		return;
	}
	let unameval = username;	
	unameval.value = unameval.value.replace(/[^a-zA-Z .]/g, '');	
});

username.addEventListener("focusin", function(){
	doNotingonFocus(username);
});

countriesData.addEventListener("keyup", checkCont);
countriesData.addEventListener("keypress", checkCont);
countriesData.addEventListener("keydown", checkCont);
//countriesData.addEventListener("focusout", checkCont);
countriesData.addEventListener("focusout", function(){
    //console.log( "VAL >> " + countriesData.value );
    if( countriesData.value.length > 0 ){
        doNotingonFocus(countriesData);
        const fldPapa      = countriesData.closest('.form-text-cont');
        fldPapa.className = 'form-text-cont';
    }else{
        checkCont;
    }
    
});

// countriesData.addEventListener("focusout", function(){
//     console.log( countriesData.value.length );
// });

phone.addEventListener("keyup", checkPhone);
phone.addEventListener("keypress", checkPhone);
phone.addEventListener("keydown", ws_checkphonenumber);
phone.addEventListener("focusout", checkPhone);

var getKeyCode = function (str) {
    return str.charCodeAt(str.length - 1);
}

pExtension.addEventListener("keydown", function( e ){
	let thisLenght 	= pExtension.value.length;
	let backSpace 	= e.keyCode || e.charCode;
	let pattForZip 	= /[0-9]/;
	let currentCode = e.which || e.code;
	//alert( "COde Is : "+currentCode );
	if( !pattForZip.test(currentCode) && (backSpace !== 8) ){		
        e.preventDefault();
        return;
    }

	if( (thisLenght >= 5) && (backSpace !== 8) ){
		e.preventDefault();
	}
    

});

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
	//console.log( username.value );
	checkLength(username,2,15);
}

function checkCont(event){
  checkLength(countriesData,1,255);
}

function checkPhone(event){
  checkLength(phone,8,18);
  phonenumber(phone);
}

function checkURequirement(event){
  checkLength(uRequirement,3,1500);
}


//checkRequired fields
function checkRequired(inputArr){
	//console.log( inputArr );
    let opt = false; 
    inputArr.forEach(function(input){
    	let e = input.value.trim();
        if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){
			if( input.name == "user-name"  ){
				showError(input, `Please Fill Name`);
			}else if( input.name == "user-req" ){
				showError(input, `Please Fill Requirement`);
			}else if( input.name == "user-phone"  ){
				showError(input, `Please Fill Phone`);
			}else if( input.name == "user-email"  ){
				showError(input, `Please Fill Email`);
			}else if( input.name == "captcha" ){
                validateMquiz();
            }else{
				showError(input,`This Field is required`)	
			}
        }else{
        	//checkLength(username,2,15);	
		    checkEmail(email);
		    //checkLength(countriesData,1,255);
		    checkLength(phone,8,18);
            /*if( input.name != "captcha" ){
            	showSucces(input);
            }*/
            //validateMquiz();
        }
    });
}

//check input Length
function checkLength(input, min ,max) {
	let e = input.value.trim();
	//console.log( input.name +" :VALUE: " + input.value.length );
    if( input.value.length < min ){
    	if( input.name == "user-name"  ){    		
			showError(input, `Please Fill Name`);
		}else if( input.name == "user-req"  ){
			showError(input, `Please Fill Requirement`);	
		}else if( input.name == "user-phone"  ){
			//console.log( input.value.length );
			showError(input, `Please Fill Phone`);	
		}else if( input.name == "user-email"  ){
			showError(input, `Please Fill Email`);	
		}else if( input.name == "user-country"  ){
			showError(input, `Please Fill Country`);	
		}else{
			showError(input, `Value must be at least ${min} characters`);
		}    
    }else {
    	if( vcSpaceChecker( input.value.trim() ) === false){
			showError(input, `Please Enter Valid Value`);
    	}else{
    		showSucces(input);
    	}
        // if( input.name == "user-name" ){
        //     if( input.value.length > 49 ){
        //         showError(input, `Value not be more then 50 characters`);
        //     }else{
        //         showSucces(input);    
        //     }	
		// }else{
        //     showSucces(input);
        // }
        
    }
}

function validateMquiz(){
    let que     = document.getElementById("j-quiz").textContent;
    let ans     = document.getElementById("j-quiz-ans").value;
    let qerror  = document.getElementById("captchaerror");
    //console.log(ans);
    if( eval(que) == ans ){
        qerror.textContent = "";
        return true;
    }else{
        if( ans == "" ){
            qerror.textContent = "Please Fill The Answer";
        }else{
            qerror.textContent = "Invalid Answer";
        }
        
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

function checkRequiredCF(inputArr) {
    inputArr.forEach(function(input){
    	let e = input.value.trim();
    	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){
			if( input.name == "expected-date" ){
				showErrorCF(input,"Please select expected start date");
			}else if( input.name == "count-resources" ){
				showErrorCF(input, `Please select number of engineers would you like to add`);	
			}else if( input.name == "howlong" ){
				showErrorCF(input, `Please select how long will you need these engineers`);	
			}else if( input.name == "we-help" ){
				showErrorCF(input, `Please select this field`);	
			}
    	}
    });
}

function vcStepOneCheckert(){
    let reqFlds = [username, email, phone];
	checkRequired( reqFlds );
	let stepOne = document.getElementById('vc-fstep1');
	let stepTwo = document.getElementById('vc-fstep2');
	if(
		( vcSpaceChecker(email.value.trim()) === true ) && 
		( vcSpaceChecker(username.value.trim()) === true ) && 
		( vcSpaceChecker(phone.value.trim()) === true ) 
	){ 
		const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        let eCount = 0;
		reqFlds.forEach(function(input){
	    	if( input.value == "" ){
	    	eCount++;
	    	}
    	});
        if( eCount === 0 ){
            stepOneValidation = true;
        }

        if( !sre.test(email.value.trim()) ){
			stepOneValidation = false;
		}

	}else{
		stepOneValidation = false;
	}

	if( stepOneValidation === true ){
		let extVal 	= document.getElementById('in_ext').value;
		let pCode 	= document.getElementById('pcode').value;
		stepOne.style.display = "none";
		stepTwo.style.display = "block";
        document.getElementById('span-name').innerHTML = username.value;
        document.getElementById('span-email').innerHTML = email.value;
        if( extVal ){
        	document.getElementById('span-phone').innerHTML = pCode +' '+phone.value + ' ('+extVal+')';
        }else{
        	document.getElementById('span-phone').innerHTML = pCode +' '+phone.value;	
        }        
	}
}

function dovcstep_one(){
	let stepOne = document.getElementById('vc-fstep1');
	let stepTwo = document.getElementById('vc-fstep2');
	if( stepOne.style.display && (stepOne.style.display == "none") ){
		stepOne.style.display = "block";
		stepTwo.style.display = "none";	
	}
}

function vcCmnFormValidation(){
	let cf_array = [weHelp,expDate];
	if( weHelp.value == "Team Extension" ){
	cf_array = [weHelp, expDate, inpResources, inpHlong];
	}else if( (weHelp.value == "None of the above") || (weHelp.value == "Other Technology Needs") ){
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
            prDiv.classList.remove("verror");	
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
			//console.log( el );
			//el.classList.remove("open-close");
		}
	});
	
	
	const bcArrow = Array.from(
    document.querySelectorAll("span.arrow-btn")).filter(el => !el.closest("#"+target));

    bcArrow.forEach(hd => hd.classList.remove("rotate"));

	

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
const phoneInputField = document.querySelector("#pcode");
   	window.intlTelInput(phoneInputField, 
   	{
  	initialCountry: "in"
	});
   	document.addEventListener("DOMContentLoaded", function() {
			let title 		= document.getElementsByClassName('iti__selected-flag');
			let phoneInp 	= document.getElementById('pcode');
			title 			= title[0].getAttribute('title');
			let res 		= title.replace(/\D/g, "");
			phoneInp.value = '+'+res + ' ';
	});

	document.addEventListener('click', function (event) {
	let phoneInp 	= document.getElementById('pcode');
	let countryInp 	= document.getElementById('cont_country');
	if(event.target.matches('.iti__country')){
	//console.log( event.target.getAttribute("data-country-code") );
	let title 		= document.getElementsByClassName('iti__selected-flag');	
	title 			= title[0].getAttribute('title');
	let res 		= title.replace(/\D/g, "");
	phoneInp.value = '+'+res;
	countryInp.value = event.target.getAttribute("data-country-code");
	document.getElementById("cont_phpne").focus();
	event.preventDefault();
	}	
	}, false);

function ws_checkphonenumber(e) {
    let keyArray = [46, 8, 9, 27, 13, 187, 189, 16, 17];
    
    -1 !== keyArray.indexOf(e.keyCode) || 65 == e.keyCode && !0 === e.ctrlKey || 86 == e.keyCode && !0 === e.ctrlKey || 67 == e.keyCode && !0 === e.ctrlKey || 88 == e.keyCode && !0 === e.ctrlKey || e.keyCode >= 35 && e.keyCode <= 39 || (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault()
}

function ws_validateStr( e ) {
	let backSpace 	= e.keyCode || e.charCode;
	if( (username.value.length >= 50) && (backSpace !== 8) ){
		e.preventDefault();
		return false;
	}

	var theEvent = e || window.event;
	if (theEvent.type === "paste") {
		key = event.clipboardData.getData("text/plain");
	}else{
		var key = theEvent.keyCode || theEvent.which;
	}

    if ( key > 64 && key < 91 || 8 == key || 9 == key || 32 == key || 37 == key || 39 == key || 38 == key || 40 == key)
        return !0;
    e.preventDefault()
}