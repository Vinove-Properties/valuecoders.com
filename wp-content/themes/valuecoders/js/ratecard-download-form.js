// faq
var faqItem = document.getElementsByClassName("faq-accordion-item-outer");
var faqHD = document.getElementsByClassName("faq-accordion-toggle");
for (i = 0; i < faqHD.length; i++) {
    faqHD[i].addEventListener("click", toggleFaqItem, false);
}

function toggleFaqItem() {
    //let itemClass = this.parentNode.className;    
    for (i = 0; i < faqItem.length; i++) {
        faqItem[i].className = "faq-accordion-item-outer";
    }
    if (this.parentNode.className == "faq-accordion-item-outer") {
        this.parentNode.className = "faq-accordion-item-outer active";
    }
}
    
// Download Form Validation Start 
const footerform 			= document.getElementById('contact-form-section');
const footerusername 		= document.getElementById('fcont_name');
const footeremail 			= document.getElementById('fcont_email');
const footerphone 			= document.getElementById('cont_phpne');
const footeruRequirement 	= document.getElementById('fuser-req');
const fcaptcha   			= document.getElementById('f-quiz-ans');

//Show input error messages
function fshowError(input, message) {
    const formControle = input.closest('div.input-box-outer');
    formControle.classList.add("verror") ;
    const small = formControle.querySelector('small');
    small.innerText = message;
}

//function fdoNotingonFocus(input) {
  //  const formControl = input.parentElement;
    //formControl.className = 'user-input form-control';
//}

function fcheckLettersSpacesDots(str) {
	return /^[a-zA-Z\s.,]+$/.test(str);
}
//show success colour
function fshowSucces(input){

	//const formControl = input.parentElement;
	const formControls = input.closest('div.input-box-outer');
	formControls.classList.add("success") ;
    formControls.classList.remove("verror") ;
	const small = formControls.querySelector('small');
	//formControl.className = 'user-input form-control success';
	small.innerText = '';
}

//check email is valid
function fcheckEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())) {
        fshowSucces(input)
    }else {
    	if( input.value == '' ){
    		fshowError(input,'Please Fill Email');
    	}else{
    		fshowError(input,'Please fill valid email address');	
    	}
    }
}

function fphonenumber(inputtxt){
	if( (/^[0-9]*$/.test(inputtxt.value.trim()) && inputtxt.value.length >= 6) ){	
		fshowSucces( inputtxt )
	}else{
		if( inputtxt.value == '' ){
            fshowError(inputtxt,'Please Fill Phone', "phone-error");
        }else{
            fshowError( inputtxt, 'Please Fill Valid Phone Number', "phone-error" );
        } 
		
	}
}



footerusername.addEventListener("keypress", fcheckUseName);
footerusername.addEventListener("focusout", fcheckUseName);
footerusername.addEventListener("keydown", fws_validateStr);
//footerusername.addEventListener("focusin", function(){
//	fdoNotingonFocus(footerusername);
//});

footerphone.addEventListener("keyup", fcheckPhone);
footerphone.addEventListener("keydown", fws_checkphonenumber);
footerphone.addEventListener("keypress", fcheckPhone);
footerphone.addEventListener("focusout", fcheckfoucsoutPhone);

footeremail.addEventListener("keyup", fcheckEmailEvent);
footeremail.addEventListener("keydown", fcheckEmailEvent);
footeremail.addEventListener("keypress", fcheckEmailEvent);
footeremail.addEventListener("focusout", fcheckEmailEvent);
//footeremail.addEventListener("focusin", function(){
//	fdoNotingonFocus(footeremail);
//});

footeruRequirement.addEventListener("keyup", fcheckURequirement);
footeruRequirement.addEventListener("keypress", fcheckURequirement);
footeruRequirement.addEventListener("keydown", fcheckURequirement);
footeruRequirement.addEventListener("focusout", fcheckURequirement);
footeruRequirement.addEventListener("focusin", fcheckURequirement);

fcaptcha.addEventListener("focusout", fvalidateMquiz);
function fcheckCont(event){
  fcheckLength(fcountriesData,1,60);
}

function fws_checkphonenumber(e) {
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


function fcheckEmailEvent(event){
	fcheckEmail(footeremail);
}
function fcheckUseName(event){
  fcheckLength(footerusername,2,49);
	if( fcheckLettersSpacesDots( footerusername.value.trim() ) === false ){
       fshowError(footerusername, "Please Fill Name");
    }
}

function fcheckPhone(event){
  fcheckLength(footerphone,6,30);
  fphonenumber(footerphone);
}
function fcheckfoucsoutPhone(event){
    fphonenumber(footerphone);
}
function fcheckURequirement(event){
  fcheckLength(footeruRequirement,3,1500);
}


//fcheckRequired fields
function fcheckRequired(inputArr) {

    inputArr.forEach(function(input){
    	let e = input.value.trim();
        if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){
			if( input.name == "fullname"  ){
				fshowError(input, `Please Fill Name`);
			}else if( input.name == "requirement"  ){
				fshowError(input, `Please Fill Requirement`);
			}else if( input.name == "cont_phpne"  ){
				fshowError(input, `Please Fill Phone`);
			}else if( input.name == "email"  ){
				fshowError(input, `Please Fill Email`);
			}else if( input.name == "captcha" ){
                fvalidateMquiz();
            }else{
				fshowError(input,`This Field is required`)	
			}
        }else {
        //	fcheckLength(footerusername,3,15);	
		    fcheckEmail(footeremail);
		    fcheckfoucsoutPhone(footerphone);
		    // if( input.name != "captcha" ){
              //  fshowSucces(input);
            //}
            fvalidateMquiz();
		    //fcheckLength(countriesData,3,255);
        }
    });
}


//check input Length
function fcheckLength(input, min ,max) {
	//console.log(input.name);
	let e = input.value.trim();
    if( (input.value.length < min) || (!/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e)) ) {
    	if( input.name == "fullname"  ){
			fshowError(input, `Please Fill Name`);	
		}else if( input.name == "requirement"  ){
			fshowError(input, `Please Fill Requirement`);	
		}else if( input.name == "cont_phpne"  ){
			fshowError(input, `Please Fill Phone`);	
		}else if( input.name == "email"  ){
			fshowError(input, `Please Fill Email`);	
		}    
    }else {
       	if( input.value.length > max ){
    		if( input.name == "fullname" ){
    			fshowError(input, `Name not be more then ${max} characters`);
    		}    		
    	}else{
	    	fshowSucces(input);
    	}
    }
}

function fvalidateMquiz(){
    let fque     = document.getElementById("f-quizz").textContent;
    let fans     = document.getElementById("f-quiz-ans").value;
    let fqerror  = document.getElementById("fcaptchaerror");
    if( eval(fque) == fans ){
        fqerror.textContent = "";
        return true;
    }else{
        fqerror.textContent = "Invalid Answer";
        return false;
    }
}


function fvcSpaceChecker( input ){
	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test( input ) ){
		return false;
	}else{
		return true;
	}
}


function vcCmnDownloadFormValidation(){
	//alert("hello");
	fcheckRequired( [footerusername, footeremail, footerphone, footeruRequirement, fcaptcha] );
	if(
		( fvcSpaceChecker(footeremail.value.trim()) === true ) && 
		( fvcSpaceChecker(footerusername.value.trim()) === true ) && 
		( fvcSpaceChecker(footerphone.value.trim()) === true ) && 
		( fvcSpaceChecker(footeruRequirement.value.trim()) === true ) 
	){
		const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if( !sre.test(footeremail.value.trim()) ){
			return false;
		}
     	//const phreg = /^[0-9]*$/;
        if(footerphone.value.length < 6 ){
			fshowError(footerphone, 'Phone Number is not valid');
            return false;
        }
        
        //if( !phreg.test(fcaptcha.value.trim())){
		//	fvalidateMquiz();
          //  return false;
        //}
		
		if( fvalidateMquiz() === false){
            return false;
        }
     	var form 	= document.getElementById("contact-form-section");
		var formBtn = document.getElementById("downloadbutton");
	    form.classList.add('in-process');
		formBtn.value = "Please wait...";
		/*
		alert("Do Submit");
		return false;
		*/
		formBtn.disabled = true;
		apnSelectrm('exp-date-row');
		//	var divTarget1 	= document.getElementById('exp-date-row');
		//var arrows1 		= divTarget1.getElementsByClassName('arrow-btn');
		//	var selects1 		= divTarget1.closest('div.select-list');
		//	selects1.classList.remove('open-close');
		let fname = document.getElementById('fcont_name').value;
        let emailid = document.getElementById('fcont_email').value;
        let phoneno = document.getElementById('cont_phpne').value;
        let budget = document.getElementById('budgets').value;
        let fuserreq = document.getElementById('fuser-req').value;
        let checkval = document.getElementById('checkajax').value;
        //alert(pdflink);
       // alert(json);
        xhr = new XMLHttpRequest();
        xhr.open('POST', footerform.dataset.ajxurl+'download-sendmail.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				document.getElementById('popmail').classList.remove("popnone") ;
				var fname1 = document.getElementById('fcont_name').value = '';
				var emailid1 = document.getElementById('fcont_email').value= '';
				var phoneno1 = document.getElementById('cont_phpne').value = '';
				var budget1 = document.getElementById('budgets').value = '';
				var fuserreq1 = document.getElementById('fuser-req').value = '';
				var checkval1 = document.getElementById('checkajax').value = '';
				var fquiz1 = document.getElementById('f-quiz-ans').value = '';
				var formBtnn = document.getElementById("downloadbutton");
				// form.classList.add('in-process');
				formBtnn.value = "Submit";
				formBtnn.disabled = false;
				// document.getElementById('vc-lead-form').style.display = 'none';
				//var response = this.responseText;
				//document.getElementById("responce").innerHTML = response;
			}
        };
        xhr.send("fname=" + fname + "&email=" + emailid + "&phoneno=" + phoneno + "&budget=" + budget +
            "&fuserreq=" + fuserreq + "&issubmitted=" + checkval);
	}else{
		return false;	
	}
}

var jQuizExists = document.getElementById("f-quizz");


if (jQuizExists) {
	fgenerateWsQuizz();
}
function fgenerateWsQuizz() {
	let n1 = Math.floor(Math.random() * 9) + 1;
	let n2 = Math.floor(Math.random() * 9) + 1;
	document.getElementById("f-quizz").textContent = n1 + " + " + n2;
}

function fcap_limit( evt, val ){
  var theEvent = evt || window.event;
    if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
    }else{
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
    }

    var regex = /[0-9]|\./;
    if( !regex.test(key) || (val.value.length > 1) ){ 
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();        
    }
}

function fws_validateStr( e ) {
	let backSpace = e.keyCode || e.charCode;
	//alert( backSpace );
	const passKeys = [8, 46, 37, 39];
	if( (footerusername.value.length >= 50) && !passKeys.includes(backSpace) ){
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



function fcheckPhonenumber(e) {
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

function fws_numcheck(evt, val) {
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

var closeButton = document.querySelector("#popclose");
closeButton.addEventListener("click", closepopup);

function closepopup(){
    document.getElementById('popmail').classList.add("popnone") ;
}


function apnSelect(target){
	let divTarget 	= document.getElementById( target );
	let arrows 		= divTarget.getElementsByClassName('arrow-btn');
	let selects 		= divTarget.getElementsByClassName('select-list');	
	arrows[0].classList.toggle('rotate');
	selects[0].classList.toggle('open-close');
}
function apnSelectrm(target){
	let divTarget 	= document.getElementById( target );
	let arrows 		= divTarget.getElementsByClassName('arrow-btn');
	let selects 		= divTarget.getElementsByClassName('select-list');	
	arrows[0].classList.remove('rotate');
	selects[0].classList.remove('open-close');
}

function setoptValue( val, target, label, parent_col){
   
	let prDiv 		= document.getElementById( parent_col );
	let arrow 		= prDiv.getElementsByClassName('arrow-btn');
	let select 		= prDiv.getElementsByClassName('in-options');	
	let labelSpan 	= document.getElementById( label );
	//let inputSpan 	= document.getElementById( input );	
	let divTarget 	= document.getElementById( target );		
	let arrowz		= prDiv.getElementsByClassName('arrow-btn');
	let selectz 		= prDiv.getElementsByClassName('select-list');
	if( target !== "sub-opt" ){
		[].forEach.call(document.querySelectorAll('.opt-div'), function (el) {
			el.style.display = 'none';
		});	
	}
	
	if( divTarget ){
		divTarget.style.display = "block";
	}

	arrowz[0].classList.toggle('rotate');
	selectz[0].classList.toggle('open-close');
		document.getElementById('budgets').value = val;
	labelSpan.innerHTML = val;
	//inputSpan.value = val;

}