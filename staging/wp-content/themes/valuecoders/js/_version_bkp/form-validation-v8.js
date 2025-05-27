const form 			= document.getElementById('contact-form-section');
const username 		= document.getElementById('cont_name');
const email 		= document.getElementById('cont_email');
const phone 		= document.getElementById('cont_phpne');

const countriesData = document.getElementById('cont_country');
const uRequirement 	= document.getElementById('user-req');

const weHelp 		= document.getElementById('select-wehelp');
const expDate 		= document.getElementById('inp-expdate');
const inpResources 	= document.getElementById('inp-resources');
const inpHlong 		= document.getElementById('inp-howlong');

NiceSelect.bind(document.getElementById("select-wehelp"),{placeholder:'Please Select from the dropdown'});
NiceSelect.bind(document.getElementById("inp-expdate"),{placeholder:'Please Select from the dropdown'});
NiceSelect.bind(document.getElementById("inp-resources"),{placeholder:'Please Select from the dropdown'});
NiceSelect.bind(document.getElementById("inp-howlong"),{placeholder:'Please Select from the dropdown'});

document.addEventListener('DOMContentLoaded', function(){
username.focus();
}, false);


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
	const fldPapa = weHelp.closest('.form-text-cont');
	if( weHelp.value !== "" ){
		fldPapa.classList.remove("verror");
		fldPapa.classList.add("is-selected");
	}
	loadReCapJS();
});

inpResources.addEventListener("change", function(e){
	let fldPapa = inpResources.closest('.form-text-cont');
	if( inpResources.value !== "" ){
		fldPapa.classList.remove("verror");
		fldPapa.classList.add("is-selected");
	}
});

inpHlong.addEventListener("change", function(e){
	let fldPapa = inpHlong.closest('.form-text-cont');
	if( inpHlong.value !== "" ){
		fldPapa.classList.remove("verror");
		fldPapa.classList.add("is-selected");
	}
});

expDate.addEventListener("change", function(e){
	let fldPapa = expDate.closest('.form-text-cont');
	let expdiv = expDate.closest('.exp-div-row');
	
	if( expDate.value !== "" ){
		fldPapa.classList.remove("verror");
		expdiv.classList.remove("verror");
		fldPapa.classList.add("is-selected");
	}

	let rdates = document.getElementById("radio-date");		
	if( (expDate.value !== "") &&  (expDate.value == "Specify a date") ){
		rdates.style.display = "block";
	}else{
		rdates.style.display = "none";
	}
});

/*
Optional Phone Fld
phone.addEventListener("keyup", checkPhone);
phone.addEventListener("keypress", checkPhone);
phone.addEventListener("focusout", checkPhone);
*/
//phone.addEventListener("keydown", ws_checkphonenumber);

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
	/*
	evt = (event) ? event : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    	event.preventDefault();
    }
    */	
	checkLength(phone,6,30);
	phonenumber(phone);
}

function checkURequirement(event){
	if( !document.body.classList.contains('career-opt') ){
		checkLength(uRequirement,3,1500);
	}
}


//checkRequired fields
function checkRequired(inputArr){
	//console.log( inputArr );
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
        	//checkLength(username,2,15);	
		    checkEmail(email);
		    //checkLength(countriesData,1,255);
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
    		/*if( vcSpaceChecker( input.value.trim() ) === false){
				showError(input, `Please Enter Valid Value NIK`);
	    	}else{
	    		showSucces(input);
	    	}	*/
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
    	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{1,}/.test(e) ){
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

function clearPerFilledValidation(){
	let list = document.querySelectorAll("#vc-fstep2 .form-text-cont");
	list.forEach(box => {
  	box.classList.remove('verror');
	});
	let tempList = document.querySelectorAll("#vc-fstep2 .exp-div-row");
	tempList[0].classList.remove('verror');	
}

async function vcStepOneCheckert(){
    //let reqFlds = [username, email, countriesData, phone, weHelp];
    let reqFlds = [username, email, countriesData, weHelp];
	checkRequired( reqFlds );
	let stepOne = document.getElementById('vc-fstep1');
	let stepTwo = document.getElementById('vc-fstep2');
	if(
		( vcSpaceChecker(email.value.trim()) === true ) && 
		( vcSpaceChecker(username.value.trim()) === true ) && 
		//( vcSpaceChecker(phone.value.trim()) === true ) &&
		( vcSpaceChecker(weHelp.value.trim()) === true )
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
        
        if( checkLettersSpacesDots( username.value.trim() ) === false || (username.value.length > 49) ){
        	showError(username, "Please input valid name.");
        	stepOneValidation = false;
        }

        if( !sre.test(email.value.trim()) ){
			stepOneValidation = false;
		}

		/*
		if( phone.value.trim().length < 6 ){
			stepOneValidation = false;
		}
		*/


	}else{
		stepOneValidation = false;
	}

	if( stepOneValidation === true ){
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

		let stBtn   = document.getElementById("btn-step-one");
		stBtn.classList.add("active");
		stBtn.innerHTML = "Please wait..";
		stBtn.disabled 	= true;
		let mob 	 	= phone.value.trim();
		let ucountry 	= document.getElementById('cont_country');
		let leadId 		= document.getElementById('zlead-id');
		let reCapFld 	= document.getElementById('g-recaptcha-response');

		let data 	= {
		name: username.value.trim(),
		email: email.value.trim(),
		phone: mob,
		country: ucountry.value.trim(),
		how_can: weHelp.value.trim(),
		lead_id: leadId.value,
		grecaptcha: reCapFld.value,
		_doing_ajax: true
		}
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", vcObj.web_url+'/sendmail1.php', true); 
		xhttp.setRequestHeader("Content-Type", "application/json");
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			let response = JSON.parse(this.responseText);
			if( response.success === true ){
				if( ("is_job" in response) && (response.is_job === true) ){
					//window.location.replace(vcObj.web_url+"/careers"); //return false;
					document.body.classList.add('career-opt');
				}else{
					document.body.classList.remove('career-opt');
				}
				stBtn.classList.remove("active");
				stBtn.disabled 	= false;
				stBtn.innerHTML = "Save and Continue";

				let tExtn 		= document.getElementById("team-ext-col");
				let leadInput 	= document.getElementById("zlead-id");
				let expFld 		= document.getElementById("exp-date-col");				
				let careerFld 	= document.getElementById("career-col");
				let lblReq 		= document.getElementById("lbl-requirement");
				let eTicketID   = document.getElementById("e-ticket-id"); 

				if( "ticket_id" in response ){
					eTicketID.value = response.ticket_id;
				}
				leadInput.value = response.lead_id;

				stepOne.style.display = "none";
				stepTwo.style.display = "block";
				clearPerFilledValidation();
		        document.getElementById('span-name').innerHTML = username.value;
		        document.getElementById('span-email').innerHTML = email.value;
		        
		        if( weHelp.value == "Team Extension" ){
		        	document.getElementById('span-wehelp').innerHTML = "Team Extension (Staff Augmentation)";
		        }else{
		        	document.getElementById('span-wehelp').innerHTML = weHelp.value.trim();	
		        }
		        
		        if( weHelp.value == "Team Extension" ){
					tExtn.style.display = "block";
					careerFld.style.display = "none";
				}else{
					if( weHelp.value == "career" ){
						expFld.style.display = "none";
						careerFld.style.display = "block";
						lblReq.innerHTML = "Message (optional)";
					}else{
						expFld.style.display = "block";
						careerFld.style.display = "none";
						lblReq.innerHTML = "Requirement*";
					}
					tExtn.style.display = "none";
				}
		        document.getElementById('span-phone').innerHTML = phone.value;	
		        document.getElementById('span-country').innerHTML = countriesData.value;			        
	        }else{
	        	window.location.replace(response.thank_url);

	        }
		}
		};
		xhttp.send(JSON.stringify(data));
	}
}

function dovcstep_one(){
	let stepOne = document.getElementById('vc-fstep1');
	let stepTwo = document.getElementById('vc-fstep2');
	let infoTxt = document.getElementById('uinfo');
	let tFld 	= document.getElementById('cont_name');
	
	if( stepOne.style.display && (stepOne.style.display == "none") ){
		infoTxt.innerText = "Contact Information";
		setTimeout(function(){ tFld.focus(); }, 10);		
		stepOne.style.display = "block";
		stepTwo.style.display = "none";	
	}
}

async function vcCmnFormValidation(){
	//let cmnFld 		= [username, email, phone, countriesData, uRequirement];
	let cmnFld 		= [username, email, countriesData, uRequirement];
	let cf_array 	= [weHelp,expDate];
	let reqCheck  	= true;

	if( weHelp.value == "Team Extension" ){
	cf_array = [weHelp, expDate, inpResources, inpHlong];
	reqCheck = (vcSpaceChecker(uRequirement.value.trim()) === true ) ? true : false; 
	}
	else if( (weHelp.value == "None of the above") || (weHelp.value == "Other Technology Needs") ){
	cf_array = [expDate];
	reqCheck = (vcSpaceChecker(uRequirement.value.trim()) === true ) ? true : false;
	}
	else if( weHelp.value == "career" ){
	cf_array = [];
	cmnFld = [username, email, phone, countriesData];
	}else{
	reqCheck = (vcSpaceChecker(uRequirement.value.trim()) === true ) ? true : false;	
	}
	
	checkRequired( cmnFld );
	checkRequiredCF( cf_array );

	if(
	( vcSpaceChecker(email.value.trim()) === true ) && 
	( vcSpaceChecker(username.value.trim()) === true ) && 
	//( vcSpaceChecker(phone.value.trim()) === true ) && 
	( vcSpaceChecker(countriesData.value.trim()) ===true ) && 
	( reqCheck === true ) 
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
		//alert("Do submit");
		//return false;
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