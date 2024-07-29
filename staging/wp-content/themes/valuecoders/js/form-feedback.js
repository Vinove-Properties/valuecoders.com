if(document.querySelector(".header-two")) {
var lastScrollTop = 0;    
window.addEventListener("scroll", function () {
    window.pageYOffset > 10 ? 
    document.querySelector(".header-two").classList.add("header-bg") : 
    document.querySelector(".header-two").classList.remove("header-bg");
    let scrollST = window.pageYOffset || document.documentElement.scrollTop;

    if( scrollST > lastScrollTop ){
        document.querySelector(".header-two").classList.remove("sc-up");
        document.querySelector(".header-two").classList.add("sc-down");        
    }else{
        document.querySelector(".header-two").classList.remove("sc-down");
        document.querySelector(".header-two").classList.add("sc-up");
    }
    lastScrollTop = scrollST <= 0 ? 0 : scrollST; // For Mobile or negative scrolling
});
}

function showPopForm(elm){
	document.getElementById(elm).style.display = "block";
}

function close_vpop(elm){
	document.getElementById(elm).style.display = "none";
}

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
        	if( input.hasAttribute("data-err") ){
        		showError(input, input.getAttribute("data-err"));	
        	}else{
        		showError(input,`This Field is required`);
        	}
        }
    });
}

function checkLength(input, min ,max) {
	let e = input.value.trim();	
    if( (input.value.length < min) ){
    	if( input.hasAttribute("data-err") ){
        	showError(input, input.getAttribute("data-err"));	
    	}else{
    		showError(input, `Value must be at least ${min} characters`);
    	}
    }else{
    	showSucces(input);        
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
 	checkLength( input.target,1,100);
}

function checkURequirement(input){
  	checkLength(input.target,3,1500);
}

function checkEmailEvent(input){
	checkEmail(input.target);
}


function checkPhone(input){
  checkLength(input.target,6,20);
  phonenumber(input.target);
}

function checkfoucsoutPhone(input){
    phonenumber(input.target);
}

const pwName 	= document.getElementById('pw-name'),
pwEmail 		= document.getElementById('pw-email'),
pwCompany 		= document.getElementById('pw-company'),
pwAddress 		= document.getElementById('pw-address'),
pwExpTime 		= document.getElementById('exp-time'),
pwExpReq 		= document.getElementById('pw-requirement'),
pwAuthority 	= document.getElementById('pw-authority'),
pwPosition 		= document.getElementById('pw-position');

pwName.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Name"));
pwName.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Name"));
pwName.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Name"));
pwName.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Name"));

pwEmail.addEventListener("keyup", checkEmailEvent.bind(pwEmail));
pwEmail.addEventListener("keypress", checkEmailEvent.bind(pwEmail));
pwEmail.addEventListener("keydown", checkEmailEvent.bind(pwEmail));
pwEmail.addEventListener("focusout", checkEmailEvent.bind(pwEmail));

pwCompany.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Company Name"));
pwCompany.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Company Name"));
pwCompany.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Company Name"));
pwCompany.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Company Name"));

pwAddress.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Company Address"));
pwAddress.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Company Address"));
pwAddress.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Company Address"));
pwAddress.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Company Address"));


pwAuthority.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Name of Signing Authority"));
pwAuthority.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Name of Signing Authority"));
pwAuthority.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Name of Signing Authority"));
pwAuthority.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Name of Signing Authority"));

pwExpReq.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Your Requirements"));
pwExpReq.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Your Requirements"));
pwExpReq.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Your Requirements"));
pwExpReq.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Your Requirements"));


pwPosition.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Title/Position"));
pwPosition.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Title/Position"));
pwPosition.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Title/Position"));
pwPosition.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Title/Position"));


if( pwExpTime ){
	NiceSelect.bind(pwExpTime,{placeholder:'Please select from the dropdown'});	
	pwExpTime.addEventListener("change", function(e){
		let val 	= e.target.value;
		let conReq 	= document.getElementById("cond-requirement");
		if( val == "Others" ){
			conReq.style.display = "block";
		}else{
			conReq.style.display = "none";
		}
		const fldPapa = pwExpTime.closest('.user-input');
		if( pwExpTime.value !== "" ){
			fldPapa.classList.remove("verror");
			//fldPapa.classList.add("is-selected");
		}
	});
}

function _handleRespFeedback(){
	let reqFieldArray = [pwName, pwEmail, pwCompany, pwAddress, pwExpTime, pwAuthority, pwPosition];
	if( pwExpTime.value == "Others" ){
	reqFieldArray.push( pwExpReq );	
	}
	checkRequired(reqFieldArray);

	if(	
	( vcSpaceChecker(pwName.value.trim()) === true ) && 
	( vcSpaceChecker(pwEmail.value.trim()) === true ) &&
	( vcSpaceChecker(pwCompany.value.trim()) === true ) &&
	( vcSpaceChecker(pwAddress.value.trim()) === true ) &&
	( vcSpaceChecker(pwExpTime.value.trim()) === true )
	){		
	const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if( !sre.test(pwEmail.value.trim()) ){
	return false;
	}

	var form 	= document.getElementById("elm-paperwork-form");
	var formBtn = document.getElementById("pxl-submit-top");
	form.classList.add('in-process');
	formBtn.textContent = "Please wait...";
	formBtn.disabled = true;
	form.submit();
	}
	return false;
}

function RatingRadioClicked( e ){
	let rtErr 	= document.getElementById('no-rating-err');
	let strElm 	= document.getElementById('rate-str');
	strElm.classList.remove("verror");
	rtErr.innerText = "";
}

const rtName 	= document.getElementById('rt-name'),
rtEmail 		= document.getElementById('rt-email'),
rtReason 		= document.getElementById('rt-rtext'),
radios 		= document.getElementsByName('rating');
for (var i = 0; i < radios.length; i++) {
    radios[i].addEventListener('click', RatingRadioClicked);
}

const elmCheckBox = document.querySelectorAll('.styled-checkbox');
const elmReasonot = document.getElementById('elm-otr-reason');

elmCheckBox.forEach(function(checkbox) {
	checkbox.addEventListener('change', function(event){
		let elmValue = event.target.value;
	    if(event.target.checked && (elmValue == "other") ){
	    	elmReasonot.style.display = "block";
	    }

	    if( !event.target.checked && (elmValue == "other") ){
	    	elmReasonot.style.display = "none";
	    }
	});
});


rtName.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Name"));
rtName.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Name"));
rtName.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Name"));
rtName.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Name"));

rtEmail.addEventListener("keyup", checkEmailEvent.bind(rtEmail));
rtEmail.addEventListener("keypress", checkEmailEvent.bind(rtEmail));
rtEmail.addEventListener("keydown", checkEmailEvent.bind(rtEmail));
rtEmail.addEventListener("focusout", checkEmailEvent.bind(rtEmail));

rtReason.addEventListener("keyup", strInputValidation.bind(null, "Please Fill This Field"));
rtReason.addEventListener("keypress", strInputValidation.bind(null, "Please Fill This Field"));
rtReason.addEventListener("keydown", strInputValidation.bind(null, "Please Fill This Field"));
rtReason.addEventListener("focusout", strInputValidation.bind(null, "Please Fill This Field"));

function _handleRating(){
	let otherCheck = document.getElementById("styled-checkbox-5");
	if( otherCheck.checked ){
		checkRequired([rtName, rtEmail, rtReason]);
	}else{
		checkRequired([rtName, rtEmail]);
	}
	
	let rating = false;
	let radios = document.getElementsByName('rating');
	for (var i = 0; i < radios.length; i++) {
		if (radios[i].checked) {
			rating  = true;
		}
	}
	if( rating === false ){
		let rtErr 	= document.getElementById('no-rating-err');
		let strElm 	= document.getElementById('rate-str');
		strElm.classList.add("verror");
		rtErr.innerText = "Please select rating";
	}

	if(	
	( vcSpaceChecker(rtName.value.trim()) === true ) && 
	( vcSpaceChecker(rtEmail.value.trim()) === true )
	){		
	const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if( !sre.test(rtEmail.value.trim()) ){
		return false;
	}

	var form 	= document.getElementById("elm-rating-form");
	var formBtn = document.getElementById("fd-submit");
	form.classList.add('in-process');
	formBtn.textContent = "Please wait...";
	formBtn.disabled = true;
	form.submit();
	}
	return false;
}