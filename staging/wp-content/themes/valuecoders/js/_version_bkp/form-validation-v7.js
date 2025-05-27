const form 			= document.getElementById('contact-form-section');
const username 		= document.getElementById('cont_name');
const email 		= document.getElementById('cont_email');
const phone 		= document.getElementById('cont_phpne');
const pExtension 	= document.getElementById('in_ext');

const countriesData = document.getElementById('cont_country');
const uRequirement 	= document.getElementById('user-req');

const weHelp 		= document.getElementById('select-wehelp');
const expDate 		= document.getElementById('inp-expdate');
const inpResources 	= document.getElementById('inp-resources');
const inpHlong 		= document.getElementById('inp-howlong');

const captcha   	= document.getElementById('j-quiz-ans');

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

/*
if( vcObj.is_mobile == "true" ){
	function onlyLettersSpacesDots(str) {
		return /^[a-zA-Z\s.,]+$/.test(str);
	}
	username.addEventListener("keydown", function(e){ 
	username.value = "";
	let format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;		
	if( onlyLettersSpacesDots(username.value) === false ){
		username.value = "";
	}
	});
}else{
	username.addEventListener("keydown", ws_validateStr);
}

function preventString(e){
	let backSpace 	= e.keyCode || e.charCode;
	if( (username.value.length >= 49) && (backSpace !== 8) ){		
		e.preventDefault();
		return false;
	}
	let unameval = username;	
	unameval.value = unameval.value.replace(/[^a-zA-Z .]/g, '');
}
*/

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

weHelp.addEventListener("change", function(e){
	const fldPapa = weHelp.closest('.form-text-cont');
	if( weHelp.value !== "" ){
		fldPapa.classList.remove("verror");
		fldPapa.classList.add("is-selected");
	}
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
phone.addEventListener("keyup", checkPhone);
phone.addEventListener("keypress", checkPhone);
phone.addEventListener("keydown", ws_checkphonenumber);
phone.addEventListener("focusout", checkPhone);

var getKeyCode = function (str) {
    return str.charCodeAt(str.length - 1);
}

pExtension.addEventListener("keydown", function( evt ){
	var theEvent = evt || window.event;
	if (theEvent.type === "paste") {
		key = event.clipboardData.getData("text/plain");
	}else{
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode(key);
	}
	let backSpace 	= evt.keyCode || evt.charCode;
	let pattForZip 	= /[0-9]/;
	let thisLenght 	= pExtension.value.length;
	const passKeys 	= [8, 46, 37, 39, 9];
	if( !pattForZip.test(key) && !passKeys.includes(backSpace) ){
        evt.preventDefault();
        return;
    }

	if( (thisLenght >= 5) && !passKeys.includes(backSpace) ){
		evt.preventDefault();
	}
});

email.addEventListener("keyup", checkEmailEvent);
email.addEventListener("keydown", checkEmailEvent);
email.addEventListener("keypress",checkEmailEvent);
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
	//console.log( username.value.length );
	checkLength(username,2,49);
	if( checkLettersSpacesDots( username.value.trim() ) === false ){
       showError(username, "Please input valid name.");
    }
}

function checkCont(event){
  checkLength(countriesData,1,255);
}

function checkPhone(event){
	evt = (event) ? event : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    	event.preventDefault();
    }
	
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
    	//console.log( input.name +" : "+ e );
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
		    checkLength(phone,6,18);
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
    		if( vcSpaceChecker( input.value.trim() ) === false){
				showError(input, `Please Enter Valid Value`);
	    	}else{
	    		showSucces(input);
	    	}	
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

function clearPerFilledValidation(){
	let list = document.querySelectorAll("#vc-fstep2 .form-text-cont");
	list.forEach(box => {
  	box.classList.remove('verror');
	});
	let tempList = document.querySelectorAll("#vc-fstep2 .exp-div-row");
	tempList[0].classList.remove('verror');	
}

function vcStepOneCheckert(){
    let reqFlds = [username, email, phone, weHelp];
	checkRequired( reqFlds );
	let stepOne = document.getElementById('vc-fstep1');
	let stepTwo = document.getElementById('vc-fstep2');
	if(
		( vcSpaceChecker(email.value.trim()) === true ) && 
		( vcSpaceChecker(username.value.trim()) === true ) && 
		( vcSpaceChecker(phone.value.trim()) === true ) &&
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

		if( phone.value.trim().length < 6 ){
			stepOneValidation = false;
		}


	}else{
		stepOneValidation = false;
	}

	if( stepOneValidation === true ){
		let stBtn   = document.getElementById("btn-step-one");
		stBtn.classList.add("active");
		stBtn.innerHTML = "Please wait..";
		stBtn.disabled 	= true;
		let pcode 	 	= document.getElementById("pcode");
		let mob 	 	= pcode.value+phone.value.trim();
		let ucountry 	= document.getElementById('cont_country');
		let leadId 		= document.getElementById('zlead-id');
		
		if( pExtension.value ){
			mob = mob + " ("+pExtension.value+")";
		}
		let data 	= {
		name: username.value.trim(),
		email: email.value.trim(),
		phone: mob,
		country: ucountry.value.trim(),
		how_can: weHelp.value.trim(),
		lead_id: leadId.value,
		_doing_ajax: true
		}
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", vcObj.web_url+'/sendmail1.php', true); 
		xhttp.setRequestHeader("Content-Type", "application/json");
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			let response = JSON.parse(this.responseText);
			if( response.success === true ){
				stBtn.classList.remove("active");
				stBtn.disabled 	= false;
				stBtn.innerHTML = "Save and Continue";
				let extVal 		= document.getElementById('in_ext').value;
				let pCode 		= document.getElementById('pcode').value;
				let tExtn 		= document.getElementById("team-ext-col");
				let leadInput 	= document.getElementById("zlead-id");
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
				}else{
					tExtn.style.display = "none";
				}
		        if( extVal ){
		        	document.getElementById('span-phone').innerHTML = pCode +' '+phone.value + ' ('+extVal+')';
		        }else{
		        	document.getElementById('span-phone').innerHTML = pCode +' '+phone.value;	
		        }
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
		/*
		alert("Do submit");
		return false;
		*/
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

function cap_limit(event, element ){
	if(event.which < 48 || event.which > 57) {
	event.preventDefault();
	}
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
	function ws_getdialCode( code ){
	    let dialCode = "";
	    let intlCountries = [["af","93"],["al","355"],["dz","213"],["as","1"],["ad","376"],["ao","244"],["ai","1"],["ag","1"],["ar","54"],["am","374"],["aw","297"],["au","61"],["at","43"],["az","994"],["bs","1"],["bh","973"],["bd","880"],["bb","1"],["by","375"],["be","32"],["bz","501"],["bj","229"],["bm","1"],["bt","975"],["bo","591"],["ba","387"],["bw","267"],["br","55"],["io","246"],["vg","1"],["bn","673"],["bg","359"],["bf","226"],["bi","257"],["kh","855"],["cm","237"],["ca","1"],["cv","238"],["bq","599"],["ky","1"],["cf","236"],["td","235"],["cl","56"],["cn","86"],["cx","61"],["cc","61"],["co","57"],["km","269"],["cd","243"],["cg","242"],["ck","682"],["cr","506"],["ci","225"],["hr","385"],["cu","53"],["cw","599"],["cy","357"],["cz","420"],["dk","45"],["dj","253"],["dm","1"],["do","1"],["ec","593"],["eg","20"],["sv","503"],["gq","240"],["er","291"],["ee","372"],["et","251"],["fk","500"],["fo","298"],["fj","679"],["fi","358"],["fr","33"],["gf","594"],["pf","689"],["ga","241"],["gm","220"],["ge","995"],["de","49"],["gh","233"],["gi","350"],["gr","30"],["gl","299"],["gd","1"],["gp","590"],["gu","1"],["gt","502"],["gg","44"],["gn","224"],["gw","245"],["gy","592"],["ht","509"],["hn","504"],["hk","852"],["hu","36"],["is","354"],["in","91"],["id","62"],["ir","98"],["iq","964"],["ie","353"],["im","44"],["il","972"],["it","39"],["jm","1"],["jp","81"],["je","44"],["jo","962"],["kz","7"],["ke","254"],["ki","686"],["xk","383"],["kw","965"],["kg","996"],["la","856"],["lv","371"],["lb","961"],["ls","266"],["lr","231"],["ly","218"],["li","423"],["lt","370"],["lu","352"],["mo","853"],["mk","389"],["mg","261"],["mw","265"],["my","60"],["mv","960"],["ml","223"],["mt","356"],["mh","692"],["mq","596"],["mr","222"],["mu","230"],["yt","262"],["mx","52"],["fm","691"],["md","373"],["mc","377"],["mn","976"],["me","382"],["ms","1"],["ma","212"],["mz","258"],["mm","95"],["na","264"],["nr","674"],["np","977"],["nl","31"],["nc","687"],["nz","64"],["ni","505"],["ne","227"],["ng","234"],["nu","683"],["nf","672"],["kp","850"],["mp","1"],["no","47"],["om","968"],["pk","92"],["pw","680"],["ps","970"],["pa","507"],["pg","675"],["py","595"],["pe","51"],["ph","63"],["pl","48"],["pt","351"],["pr","1"],["qa","974"],["re","262"],["ro","40"],["ru","7"],["rw","250"],["bl","590"],["sh","290"],["kn","1"],["lc","1"],["mf","590"],["pm","508"],["vc","1"],["ws","685"],["sm","378"],["st","239"],["sa","966"],["sn","221"],["rs","381"],["sc","248"],["sl","232"],["sg","65"],["sx","1"],["sk","421"],["si","386"],["sb","677"],["so","252"],["za","27"],["kr","82"],["ss","211"],["es","34"],["lk","94"],["sd","249"],["sr","597"],["sj","47"],["sz","268"],["se","46"],["ch","41"],["sy","963"],["tw","886"],["tj","992"],["tz","255"],["th","66"],["tl","670"],["tg","228"],["tk","690"],["to","676"],["tt","1"],["tn","216"],["tr","90"],["tm","993"],["tc","1"],["tv","688"],["vi","1"],["ug","256"],["ua","380"],["ae","971"],["gb","44"],["us","1"],["uy","598"],["uz","998"],["vu","678"],["va","39"],["ve","58"],["vn","84"],["wf","681"],["eh","212"],["ye","967"],["zm","260"],["zw","263"],["ax","358"]];
	    intlCountries.forEach(function(data){
	        let inCode = data[0];
	        if( inCode == code ){
	            dialCode = data[1];
	        }
	    });
	    return dialCode;
    }
	const phoneInputField = document.querySelector("#pcode");
   	//window.intlTelInput(phoneInputField,{initialCountry:"in"});
   	intlTelInput(phoneInputField, {
    initialCountry: "auto",
    geoIpLookup: function(cb){
    let inCountry = "";    
    fetch('https://ipinfo.io/json')
    .then( res => res.json() )
    .then(
        data => {
        inCountry = (data && data.country) ? data.country : "gb";
        let conCode = inCountry.toLowerCase();        
        cb(conCode);
        setTimeout( function(){
            let iDialCode = ws_getdialCode( conCode );
            let phoneInp  = document.getElementById('pcode');
            let countryInp 	= document.getElementById('cont_country');
            countryInp.value = inCountry;
            phoneInp.value = '+'+iDialCode;
        }, 10 );
        
        }
    )
    },
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
		phoneInp.value 	= '+'+res;
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