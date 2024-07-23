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
const LISTCOUNTRY = ["Afghanistan (AFG)","Albania (ALB)","Algeria (DZA)","Andorra (AND)","Angola (AGO)","Anguilla (AIA)","Antigua & Barbuda (ATG)","Argentina (ARG)","Armenia (ARM)","Aruba (ABW)","Australia (AUS)","Austria (AUT)","Azerbaijan (AZE)","Bahamas (BHS)","Bahrain (BHR)","Bangladesh (BGD)","Barbados (BRB)","Belarus (BLR)","Belgium (BEL)","Belize (BLZ)","Benin (BEN)","Bermuda (BMU)","Bhutan (BTN)","Bolivia (BOL)","Bosnia & Herzegovina (BIH)","Botswana (BWA)","Brazil (BRA)","British Virgin Islands (VGB)","Brunei (BRN)","Bulgaria (BGR)","Burkina Faso (BFA)","Burundi (BDI)","Cambodia (KHM)","Cameroon (CMR)","Canada (CAN)","Cape Verde (CPV)","Cayman Islands (CYM)","Central Arfrican Republic (CAF)","Chad (TCD)","Chile (CHL)","China (CHN)","Colombia (COL)","Congo (COG)","Cook Islands (COK)","Costa Rica (CRI)","Cote D Ivoire (CIV)","Croatia (HRV)","Cuba (CUB)","Curacao (CUW)","Cyprus (CYP)","Czech Republic (CZE)","Denmark (DNK)","Djibouti (DJI)","Dominica (DMA)","Dominican Republic (DOM)","Ecuador (ECU)","Egypt (EGY)","El Salvador (SLV)","Equatorial Guinea (GNQ)","Eritrea (ERI)","Estonia (EST)","Ethiopia (ETH)","Falkland Islands (FLK)","Faroe Islands (FRO)","Fiji (FJI)","Finland (FIN)","France (FRA)","French Polynesia (PYF)","French West Indies","Gabon (GAB)","Gambia (GMB)","Georgia (GEO)","Germany (DEU)","Ghana (GHA)","Gibraltar (GIB)","Greece (GRC)","Greenland (GRL)","Grenada (GRD)","Guam (GUM)","Guatemala (GTM)","Guernsey (GGY)","Guinea (GIN)","Guinea Bissau (GNB)","Guyana (GUY)","Haiti (HTI)","Honduras (HND)","Hong Kong (HKG)","Hungary (HUN)","Iceland (ISL)","India (IND)","Indonesia (IDN)","Iran (IRN)","Iraq (IRQ)","Ireland (IRL)","Isle of Man (IMN)","Israel (ITA)","Italy (ITA)","Jamaica (JAM)","Japan (JPN)","Jersey (JEY)","Jordan (JOR)","Kazakhstan (KAZ)","Kenya (KEN)","Kiribati (KIR)","Kosovo (KOS)","Kuwait (KWT)","Kyrgyzstan (KGZ)","Laos (LAO)","Latvia (LVA)","Lebanon (LBN)","Lesotho (LSO)","Liberia (LBR)","Libya (LBY)","Liechtenstein (LIE)","Lithuania (LTU)","Luxembourg (LUX)","Macau (MAC)","Macedonia (MKD)","Madagascar (MDG)","Malawi (MWI)","Malaysia (MYS)","Maldives (MDV)","Mali (MLI)","Malta (MLT)","Marshall Islands (MHL)","Mauritania (MRT)","Mauritius (MUS)","Mexico (MEX)","Micronesia (FSM)","Moldova (MDA)","Monaco (MCO)","Mongolia (MNG)","Montenegro (MNE)","Montserrat (MSR)","Morocco (MAR)","Mozambique (MOZ)","Myanmar (MMR)","Namibia (NAM)","Nauru (NRU)","Nepal (NPL)","Netherlands (NLD)","Netherlands Antilles (ANT)","New Caledonia (NCL)","New Zealand (NZL)","Nicaragua (NIC)","Niger (NER)","Nigeria (NGA)","North Korea (PRK)","Norway (NOR)","Oman (OMN)","Pakistan (PAK)","Palau (PLW)","Palestine (PSE)","Panama (PAN)","Papua New Guinea (PNG)","Paraguay (PRY)","Peru (PER)","Philippines (PHL)","Poland (POL)","Portugal (PRT)","Puerto Rico (PRI)","Qatar (QAT)","Reunion (REU)","Romania (ROU)","Russia (RUS)","Rwanda (RWA)","Saint Pierre & Miquelon (SPM)","Samoa (WSM)","San Marino (SMR)","Sao Tome and Principe (STP)","Saudi Arabia (SAU)","Senegal (SEN)","Serbia (SRB)","Seychelles (SYC)","Sierra Leone (SLE)","Singapore (SGP)","Slovakia (SVK)","Slovenia (SVN)","Solomon Islands (SLB)","Somalia (SOM)","South Africa (ZAF)","South Korea (KOR)","South Sudan (SSD)","Spain (ESP)","Sri Lanka (LKA)","St Kitts & Nevis (KNA)","St Lucia (LCA)","St Vincent (VCT)","Sudan (SDN)","Suriname (SUR)","Swaziland (SWZ)","Sweden (SWE)","Switzerland (CHE)","Syria (SYR)","Taiwan (TWN)","Tajikistan (TJK)","Tanzania (TZA)","Thailand (THA)","Timor L'Este (TLS)","Togo (TGO)","Tonga (TON)","Trinidad & Tobago (TTO)","Tunisia (TUN)","Turkey (TUR)","Turkmenistan (TKM)","Turks & Caicos (TCA)","Tuvalu (TUV)","Uganda (UGA)","Ukraine (UKR)","United Arab Emirates (UAE)","United Kingdom (UK)","United States of America (USA)","Uruguay (URY)","Uzbekistan (UZB)","Vanuatu (VUT)","Vatican City (VAT)","Venezuela (VEN)","Vietnam (VNM)","Virgin Islands (VIR)","Yemen (YEM)","Zambia (ZMB)","Zimbabwe (ZWE)"];

function showPopForm(){
	document.getElementById("vc-fxdform").classList.add("open-pop");
}

function close_vpop(){
	document.getElementById("vc-fxdform").classList.remove("open-pop");
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
    	if( input.name == "user-name"  ){
			showError(input, `Please Fill Name`);	
		}else if( input.name == "user-req"  ){
			showError(input, `Please Fill Requirement`);	
		}else if( input.name == "user-phone"  ){
			showError(input, `Please Fill Phone`);	
		}else if( input.name == "user-country"  ){
			showError(input, `Please Fill Country`);
		}else if( input.name == "user-email"  ){
			showError(input, `Please Fill Email`);	
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
}

function checkURequirement(input){
  	checkLength(input.target,3,1500);
}

function checkEmailEvent(input){
	//console.log(input);
	checkEmail(input.target);
}


function checkPhone(input){
  checkLength(input.target,6,20);
  phonenumber(input.target);
}

function checkfoucsoutPhone(input){
    phonenumber(input.target);
}


const bnName 	= document.getElementById('bn-name'),
bnEmail 		= document.getElementById('bn-email'),
bnPhone 		= document.getElementById('bn-phone'),
bnCountry 		= document.getElementById('bn-country'),
bnReq 			= document.getElementById('bn-req');

if( bnCountry ){
	autocomplete(bnCountry, LISTCOUNTRY);	
}

bnName.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Name"));
bnName.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Name"));
bnName.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Name"));
bnName.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Name"));

bnEmail.addEventListener("keyup", checkEmailEvent.bind(bnEmail));
bnEmail.addEventListener("keypress", checkEmailEvent.bind(bnEmail));
bnEmail.addEventListener("keydown", checkEmailEvent.bind(bnEmail));
bnEmail.addEventListener("focusout", checkEmailEvent.bind(bnEmail));

//bnPhone.addEventListener("keyup", checkPhone.bind(bnPhone));
//bnPhone.addEventListener("keypress", checkPhone.bind(bnPhone));
bnPhone.addEventListener("keydown", ws_checkphonenumber);
//bnPhone.addEventListener("focusout", checkfoucsoutPhone.bind(bnPhone));

bnCountry.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Country"));
bnCountry.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Country"));
bnCountry.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Country"));
bnCountry.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Country"));


bnReq.addEventListener("keyup", checkURequirement.bind(bnReq));
bnReq.addEventListener("keypress", checkURequirement.bind(bnReq));
bnReq.addEventListener("keydown", checkURequirement.bind(bnReq));
bnReq.addEventListener("focusout", checkURequirement.bind(bnReq));

function validateBannerForm(){
	checkRequired([bnName, bnEmail, bnCountry, bnReq]);
	if(		
		(vcSpaceChecker(bnName.value.trim()) === true) && 
		(vcSpaceChecker(bnEmail.value.trim()) === true) && 
		//(vcSpaceChecker(bnPhone.value.trim()) === true) &&
		(vcSpaceChecker(bnCountry.value.trim()) === true) &&
		(vcSpaceChecker(bnReq.value.trim()) === true)
	){
	const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if( !sre.test(bnEmail.value.trim()) ){
	    showError(bnEmail, 'Please Fill Email');
		return false;
	}

	let hForm 		= document.getElementById("banner-form");
	let btn 		= document.getElementById("bnr-submit");
	hForm.classList.add('in-process');
	btn.innerText 	= "Please wait...";
	btn.disabled 	= true;
	hForm.submit();	
	}
	return false;
}

const ftName 	= document.getElementById('ft-name'),
ftEmail 		= document.getElementById('ft-email'),
ftPhone 		= document.getElementById('ft-phone'),
ftCountry 		= document.getElementById('ft-country'),
ftReq 			= document.getElementById('ft-req');

if( ftCountry ){
	autocomplete(ftCountry, LISTCOUNTRY);	
}

ftName.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Name"));
ftName.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Name"));
ftName.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Name"));
ftName.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Name"));

ftEmail.addEventListener("keyup", checkEmailEvent.bind(ftEmail));
ftEmail.addEventListener("keypress", checkEmailEvent.bind(ftEmail));
ftEmail.addEventListener("keydown", checkEmailEvent.bind(ftEmail));
ftEmail.addEventListener("focusout", checkEmailEvent.bind(ftEmail));

// ftPhone.addEventListener("keyup", checkPhone.bind(ftPhone));
// ftPhone.addEventListener("keypress", checkPhone.bind(ftPhone));
ftPhone.addEventListener("keydown", ws_checkphonenumber);
// ftPhone.addEventListener("focusout", checkfoucsoutPhone.bind(ftPhone));

ftCountry.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Country"));
ftCountry.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Country"));
ftCountry.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Country"));
ftCountry.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Country"));


ftReq.addEventListener("keyup", checkURequirement.bind(ftReq));
ftReq.addEventListener("keypress", checkURequirement.bind(ftReq));
ftReq.addEventListener("keydown", checkURequirement.bind(ftReq));
ftReq.addEventListener("focusout", checkURequirement.bind(ftReq));

function _footerFormValidator(){
	checkRequired([ftName, ftEmail, ftCountry, ftReq]);	
	if(
	(vcSpaceChecker(ftName.value.trim()) === true) && 
	(vcSpaceChecker(ftEmail.value.trim()) === true) && 
	//(vcSpaceChecker(bnPhone.value.trim()) === true) &&
	(vcSpaceChecker(ftCountry.value.trim()) === true) &&
	(vcSpaceChecker(ftReq.value.trim()) === true)
	){
	const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if( !sre.test(ftEmail.value.trim()) ){
	    showError(ftEmail, 'Please Fill Email');
		return false;
	}

	let hForm 		= document.getElementById("footer-contact-form");
	let btn 		= document.getElementById("footer-submitButton");
	hForm.classList.add('in-process');
	btn.value 		= "Please wait...";
	btn.disabled 	= true;
	hForm.submit();	
	}
	return false;
}

const poName 	= document.getElementById('po-name'),
poEmail 		= document.getElementById('po-email'),
poPhone 		= document.getElementById('po-phone'),
poCountry 		= document.getElementById('po-country'),
poReq 			= document.getElementById('po-req');

if( poCountry ){
	autocomplete(poCountry, LISTCOUNTRY);	
}

poName.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Name"));
poName.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Name"));
poName.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Name"));
poName.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Name"));

poEmail.addEventListener("keyup", checkEmailEvent.bind(poEmail));
poEmail.addEventListener("keypress", checkEmailEvent.bind(poEmail));
poEmail.addEventListener("keydown", checkEmailEvent.bind(poEmail));
poEmail.addEventListener("focusout", checkEmailEvent.bind(poEmail));

// poPhone.addEventListener("keyup", checkPhone.bind(poPhone));
// poPhone.addEventListener("keypress", checkPhone.bind(poPhone));
// poPhone.addEventListener("keydown", ws_checkphonenumber);
// poPhone.addEventListener("focusout", checkfoucsoutPhone.bind(poPhone));

poCountry.addEventListener("keyup", strInputValidation.bind(null, "Please Fill Country"));
poCountry.addEventListener("keypress", strInputValidation.bind(null, "Please Fill Country"));
poCountry.addEventListener("keydown", strInputValidation.bind(null, "Please Fill Country"));
poCountry.addEventListener("focusout", strInputValidation.bind(null, "Please Fill Country"));


poReq.addEventListener("keyup", checkURequirement.bind(poReq));
poReq.addEventListener("keypress", checkURequirement.bind(poReq));
poReq.addEventListener("keydown", checkURequirement.bind(poReq));
poReq.addEventListener("focusout", checkURequirement.bind(poReq));

function _popFormValidator(){
	checkRequired([poName, poEmail, poCountry, poReq]);	
	if(
	(vcSpaceChecker(poName.value.trim()) === true) && 
	(vcSpaceChecker(poEmail.value.trim()) === true) && 
	//(vcSpaceChecker(bnPhone.value.trim()) === true) &&
	(vcSpaceChecker(poCountry.value.trim()) === true) &&
	(vcSpaceChecker(poReq.value.trim()) === true)
	){
	const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if( !sre.test(poEmail.value.trim()) ){
	    showError(ftEmail, 'Please Fill Email');
		return false;
	}

	let hForm 		= document.getElementById("pop-contact-form");
	let btn 		= document.getElementById("pop-submitButton");
	hForm.classList.add('in-process');
	btn.value 		= "Please wait...";
	btn.disabled 	= true;
	hForm.submit();	
	}
	return false;
}

