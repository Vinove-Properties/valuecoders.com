var fcountries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","zMonaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
function fautocomplete(inp, arr) {
  var currentFocus;
  inp.addEventListener("input", function(e) {
      //alert(this.value);
      var a, b, i, val = this.value;
      fcloseAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      //cont_countryautocomplete-list
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "fautocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      var sCounter = 0;
      for (i = 0; i < arr.length; i++){
        var re = new RegExp(val, 'i');
        if (arr[i].match(re)){
            //alert("he");
 		 sCounter++;	
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          b.addEventListener("click", function(e) {
              inp.value = this.getElementsByTagName("input")[0].value;
              fcloseAllLists();
          });
          a.appendChild(b);
          //a.setAttribute("class", "autocomplete-items has-item");
        }else{
          //a.setAttribute("class", "autocomplete-items has-noitm");
        }
      }
      if( sCounter > 0 ){
      	a.setAttribute("class", "autocomplete-items has-data");
      }else{
      	a.setAttribute("class", "autocomplete-items");
      }
  });
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        currentFocus++;
        faddActive(x);
      } else if (e.keyCode == 38) { //up
        currentFocus--;
        faddActive(x);
      } else if (e.keyCode == 13) {
        e.preventDefault();
        if (currentFocus > -1) {
          if (x) x[currentFocus].click();
        }
      }
  });
  
  

  function faddActive(x) {
    if (!x) return false;
    fremoveActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    x[currentFocus].classList.add("autocomplete-active");
  }
  function fremoveActive(x) {
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function fcloseAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
      fcloseAllLists(e.target);
  });
}
fautocomplete(document.getElementById("gt-country"), fcountries);
fautocomplete(document.getElementById("op-country"), fcountries);
fautocomplete(document.getElementById("dr-country"), fcountries);

function showError(input, message) {
    if(input.name == "requirement"){
    const formControl = input.closest('div.form-head-cont');
    formControl.classList.add("verror") ;
    } 
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
    if(input.name == "requirement"){
    const formControl = input.closest('div.form-head-cont');
    formControl.classList.add("success") ;
    formControl.classList.remove("verror") ;
    }
    const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'user-input form-control success';
	small.innerText = 'success';
}

function checkEmail(input){
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())) {
        showSucces(input)
    }else {
    	if( input.value == '' ){
    		showError(input,'Please Fill Email');
    	}else{
    		showError(input,'Please fill valid email address');	
    	}
    }
}

function ws_validateStr(e, inFld) {
	let backSpace = e.keyCode || e.charCode;
	const passKeys = [8, 46, 37, 39];
	if( (inFld.value.length >= 50) && !passKeys.includes(backSpace) ){
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

function ws_validatecountry( e ) {
	let backSpace = e.keyCode || e.charCode;
	const passKeys = [8, 46, 37, 39];
	if( (countriesData.value.length >= 50) && !passKeys.includes(backSpace) ){
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

function checkLength(input, min ,max) {
	//console.log(input.name);
	let e = input.value.trim();
    //if( (input.value.length < min) || (!/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e)) ) {
    if( (input.value.length < min) ) {
    	if( input.name == "fullname"  ){
			showError(input, `Please Fill Name`);	
		}else if( input.name == "requirement"  ){
			showError(input, `Please Fill Requirement`);	
		}else if( input.name == "phone"  ){
			showError(input, `Please Fill Phone`);	
		}else if( input.name == "user-country"  ){
			showError(input, `Please Fill Country`);
		}else if( input.name == "email"  ){
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

function checkEmailEvent(inFld){
	checkEmail(inFld);
}

function checkUseName(inFld){
 	checkLength(inFld,2,49);
	if( checkLettersSpacesDots(inFld.value.trim() ) === false ){
    	showError(inFld, "Please Fill Name.");
    }
}

function checkPhone(inFld){
  checkLength(inFld,6,30);
  phonenumber(inFld);
}

function checkRequired(inputArr) {
    inputArr.forEach(function(input){
    	let e = input.value.trim();
        if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){
			if( input.name == "fullname"){
				showError(input, `Please Fill Name`);
			}else if( input.name == "requirement"  ){
				showError(input, `Please Fill Requirement`);
			}else if( input.name == "phone"  ){
				showError(input, `Please Fill Phone`);
			}else if( input.name == "user-country"  ){
			    showError(input, `Please Fill Country`);	
			}else if( input.name == "email"  ){
				showError(input, `Please Fill Email`);
			}else{
				showError(input,`This Field is required`)	
			}
        }
        /*
        else{
	    	checkLength(username,3,15);
	    	checkLength(phone,6,30);
		    checkEmail(email);
        }
        */
    });
}

function vcSpaceChecker( input ){
	if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test( input ) ){
		return false;
	}else{
		return true;
	}
}

/*Common Function ENDS here*/

const inpEvents = ['keyup', 'keypress', 'focusout'];
const gtName 	= document.getElementById('gt-name');
const gtEmail 	= document.getElementById('gt-email');
const gtCountry = document.getElementById('gt-country');

const opName 	= document.getElementById('op-name');
const opEmail 	= document.getElementById('op-email');
const opCountry = document.getElementById('op-country');

const drName 		= document.getElementById('dr-name');
const drEmail 	= document.getElementById('dr-email');
const drCountry = document.getElementById('dr-country');


inpEvents.forEach(function(event){
	gtName.addEventListener( event, () => { checkUseName( gtName ) } );
	gtEmail.addEventListener( event, () => { checkEmailEvent( gtEmail ) } );
	gtCountry.addEventListener( event, () => { checkLength( gtCountry, 2, 40 ) } );

	opName.addEventListener( event, () => { checkUseName( opName ) } );
	opEmail.addEventListener( event, () => { checkEmailEvent( opEmail ) } );
	opCountry.addEventListener( event, () => { checkLength( opCountry, 2, 40 ) } );

	drName.addEventListener( event, () => { checkUseName( drName ) } );
	drEmail.addEventListener( event, () => { checkEmailEvent( drEmail ) } );
	drCountry.addEventListener( event, () => { checkLength( drCountry, 2, 40 ) } );
});
gtName.addEventListener( 'keydown', ( event ) => { ws_validateStr( event,  gtName ) } );
gtCountry.addEventListener( 'keydown', ( event ) => { ws_validateStr( event,  gtCountry ) } );
gtEmail.addEventListener( 'keydown', () => { checkEmailEvent( gtEmail ) } );

opName.addEventListener( 'keydown', ( event ) => { ws_validateStr( event,  opName ) } );
opCountry.addEventListener( 'keydown', ( event ) => { ws_validateStr( event,  opCountry ) } );
opEmail.addEventListener( 'keydown', () => { checkEmailEvent( opEmail ) } );


const gtPhone 	= document.getElementById('gt-phone');
const opPhone 	= document.getElementById('op-phone');
const drPhone 	= document.getElementById('dr-phone');
['keyup','keypress','focusout'].forEach(function(event){
	gtPhone.addEventListener( event, () => { checkPhone( gtPhone ) } );
	opPhone.addEventListener( event, () => { checkPhone( opPhone ) } );
	drPhone.addEventListener( event, () => { checkPhone( drPhone ) } );
});
gtPhone.addEventListener( 'keydown', ( event ) => { ws_checkphonenumber( event ) } );
opPhone.addEventListener( 'keydown', ( event ) => { ws_checkphonenumber( event ) } );
drPhone.addEventListener( 'keydown', ( event ) => { ws_checkphonenumber( event ) } );


function validateLeadForm(){
	checkRequired( [gtName, gtEmail, gtCountry, gtPhone] );
	if(
		( vcSpaceChecker(gtName.value.trim()) === true ) && 
		( vcSpaceChecker(gtEmail.value.trim()) === true ) && 
		( vcSpaceChecker(gtCountry.value.trim()) ===true ) && 
		( vcSpaceChecker(gtPhone.value.trim()) === true ) 
	){
		let sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if( !sre.test(gtEmail.value.trim()) ){
		    showError(gtEmail, 'Please Fill Email');
			return false;
		}

	    if(gtPhone.value.length < 6){
			showError(gtPhone, 'Phone Number is not valid');
	        return false;
	    }

		let form 		= document.getElementById("ppc-leadf");
		let btn 		= document.getElementById("leadf-btn");
		form.classList.add('in-process');
		btn.value 		= "Please wait...";
		btn.disabled 	= true;
		form.submit();
	}else{
		return false;
	}
	return false;
}

function validateReportForm(){
	checkRequired( [drName, drEmail, drCountry, drPhone] );
	if(
		( vcSpaceChecker(drName.value.trim()) === true ) && 
		( vcSpaceChecker(drEmail.value.trim()) === true ) && 
		( vcSpaceChecker(drCountry.value.trim()) ===true ) && 
		( vcSpaceChecker(drPhone.value.trim()) === true ) 
	){
		let sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if( !sre.test(drEmail.value.trim()) ){
		    showError(drEmail, 'Please Fill Email');
			return false;
		}

	    if(drPhone.value.length < 6){
			showError(drPhone, 'Phone Number is not valid');
	        return false;
	    }

		let form 		= document.getElementById("dwnr-form");
		let btn 		= document.getElementById("dwnreport-btn");
		form.classList.add('in-process');
		btn.value 		= "Please wait...";
		btn.disabled 	= true;
		//form.submit();
	}else{
		return false;
	}
	return false;
}

function validateOrderProcess(){
	checkRequired( [opName, opEmail, opCountry, opPhone] );
	if(
		( vcSpaceChecker(opName.value.trim()) === true ) && 
		( vcSpaceChecker(opEmail.value.trim()) === true ) && 
		( vcSpaceChecker(opCountry.value.trim()) ===true ) && 
		( vcSpaceChecker(opPhone.value.trim()) === true ) 
	){
		let sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if( !sre.test(opEmail.value.trim()) ){
		    showError(opEmail, 'Please Fill Email');
			return false;
		}

	    if(opPhone.value.length < 6){
			showError(gtPhone, 'Phone Number is not valid');
	        return false;
	    }	    

		let form 		= document.getElementById("op-ppcform");
		let btn 		= document.getElementById("op-submit");
		form.classList.add('in-process');
		btn.value 		= "Please wait...";
		btn.disabled 	= true;
		
		let ppform      = document.getElementById("str-prepayfrm");
		form.submit();
    /*
    let payform     = document.getElementById("stripe-payme");
    ppform.style.display    = 'none';
    payform.style.display   = 'block';
    stripe_initialize();
    */
	}else{
		return false;
	}
	return false;
}