(function() {
    if( document.getElementById("temp-epf-title") ){
        let ebTitle = document.getElementById("temp-epf-title").getAttribute('data-title');
        if( ebTitle ){
            if( document.getElementById("eguide-title") ){
                document.getElementById("eguide-title").innerHTML = ebTitle;
            }    
        }
    }
})();

var modal       = document.querySelector(".modal");
var trigger     = document.querySelector(".trigger");
var imgtrigger  = document.querySelector(".imgtrigger");
var imgtrigger1 = document.querySelector(".imgtrigger1");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

if( trigger !== null ){
    trigger.addEventListener("click", toggleModal);    
}

if( imgtrigger !== null ){
    imgtrigger.addEventListener("click", toggleModal);
}

if( imgtrigger1 !== null ){
    imgtrigger1.addEventListener("click", toggleModal);    
}

if( closeButton !== null ){
    closeButton.addEventListener("click", toggleModal);
}
window.addEventListener("click", windowOnClick);

//*Form Validation Code Starts*/
const vcform    = document.getElementById('vc-lead-form');
const fname     = document.getElementById('first_name');
const email     = document.getElementById('txtEmail');
const phone     = document.getElementById('phone_no');
const country   = document.getElementById('country');

function ValidationEvent(e){
    checkRequired([fname, email, phone, country]);
    if (
        (vcSpaceChecker(fname.value.trim()) === true) &&
        (vcSpaceChecker(email.value.trim()) === true) &&
        (vcSpaceChecker(phone.value.trim()) === true) &&
        (vcSpaceChecker(country.value.trim()) === true)

    ) {
        const sre =
            /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!sre.test(email.value.trim())) {
            return false;
        }
        if (checkLength(phone, 6, 20) === false) {
            return false;
        }
        let name = document.getElementById('first_name').value;
        let emailid = document.getElementById('txtEmail').value;
        let phoneno = document.getElementById('phone_no').value;
        let countryname = document.getElementById('country').value;
       // let pdflink = document.getElementById('pdflink').value;
        let postid = document.getElementById('postid').value;
        let thisBtn = document.getElementById('pxldebtn');
        thisBtn.value = "Please wait...";
        thisBtn.disabled = true;
        let posttitle = document.getElementById('posttitle').value;
        var form = document.querySelector('.orderform');
        var data = new FormData(form);
        var object = {};
        data.forEach((value, key) => object[key] = value);
        var json = JSON.stringify(object);
        xhr = new XMLHttpRequest();
        xhr.open('POST', pxlObj.web_url+'/verify/', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('vc-lead-form').style.display = 'none';
                var response = this.responseText;
                document.getElementById("responce").innerHTML = response;

            }
        };

        xhr.send("fname=" + name + "&email=" + emailid + "&phoneno=" + phoneno + "&country=" + countryname +
            "&postid=" + postid + "&posttitle=" + posttitle);
    } else {
        return false;
    }
}

function vcSpaceChecker(input) {
    if (!/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{1,}/.test(input)) {
        return false;
    } else {
        return true;
    }
}

//checkRequired fields
function checkRequired(inputArr) {
    inputArr.forEach(function(input) {
        let e = input.value.trim();
        if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){
            if (input.name == "firstName") {
                showError(input, `Please Fill Full Name`);
            } else if (input.name == "phone") {
                showError(input, `Please Fill Phone`);
            } else if (input.name == "email") {
                showError(input, `Please Fill Email`);
            } else if (input.name == "country") {
                showError(input, `Please Fill Country Name`);
            }
        } else {
            checkEmail(email);
            checkLength(phone, 6, 20);
        }
    });
}

//Show input error messages
function showError(input, message, spDiv = false) {
    let formControl = input.parentElement;
    let small = formControl.querySelector('small.error-msg-section');
    if (spDiv !== false) {
        small = document.getElementById(spDiv);
    }
    formControl.classList.add('ws-error');
    small.innerText = message;
}

//show success colour
function showSucces(input, spDiv = false) {
    let formControl = input.parentElement;
    let small = formControl.querySelector('small.error-msg-section');
    if (spDiv !== false) {
        small = document.getElementById(spDiv);
    }
    formControl.classList.remove('ws-error');
    small.innerText = '';
}

//check email is valid
function checkEmail(input) {
    const re =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(input.value.trim())) {
        showSucces(input)
    } else {
        if (input.value == '') {
            showError(input, 'Please Fill Email');
        } else {
            showError(input, 'Email is not valid');
        }
    }
}

function phonenumber(inputtxt) {
    if( (/^[A-Za-z0123456789()\s.+-]+$/.test(inputtxt.value.trim()) && inputtxt.value.length >= 6) ){       
        showSucces(inputtxt)
    } else {
        if (inputtxt.value == '') {
            showError(inputtxt, 'Please Fill Phone', 'lblError_phone');
        } else {
            showError(inputtxt, 'Phone Number is not valid', 'lblError_phone');
        }

    }
}
fname.addEventListener("keyup", checkUseName);
fname.addEventListener("keypress", checkUseName);
//fname.addEventListener("keydown", ws_validateStr);
fname.addEventListener("focusout", checkUseName);

country.addEventListener("keyup", checkcountry);
country.addEventListener("keypress", checkcountry);
country.addEventListener("keydown", checkcountry);
country.addEventListener("focusout", checkcountry);

phone.addEventListener("keyup", checkPhone);
phone.addEventListener("keypress", checkPhone);
phone.addEventListener("keydown", ws_checkphonenumber);
phone.addEventListener("focusout", checkPhone);

email.addEventListener("focusout", checkEmailEvent);


function checkcountry(event) {
    checkLength(country, 1, 100);
}


function ws_validateStr(e) {
    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode != 32) {
        return true;
    } else {
        return false;
    }

}

function checkEmailEvent(event) {
    checkEmail(email);
}

function checkUseName(event) {
    checkLength(fname, 3, 255);
}

function checkPhone(event) {
    checkLength(phone, 6, 20);
    phonenumber(phone);
}

//check input Length
function checkLength(input, min, max) {
    if (input.value.length < min) {
        if (input.name == "firstName") {
            showError(input, `Please Fill Full  Name`);
        } else if (input.name == "phone") {
            showError(input, `Please Fill Phone`, "lblError_phone");
        } else if (input.name == "email") {
            showError(input, `Please Fill Email`);
        } else if (input.name == "country") {
            showError(input, `Please Fill Country`);
        } else {
            showError(input, `This Field is required`)
        }
        return false;
    } else {
        if (input.name == "phone") {
            showSucces(input);
        }
        if (input.name == "email") {
            showSucces(input);
        } else {
            showSucces(input);
        }
        return true;
    }
}

function ws_checkphonenumber(e) {
    let keyArray = [46, 8, 9, 27, 13, 187, 189, 16, 17];

    -
    1 !== keyArray.indexOf(e.keyCode) || 65 == e.keyCode && !0 === e.ctrlKey || 86 == e.keyCode && !0 === e.ctrlKey ||
        67 == e.keyCode && !0 === e.ctrlKey || 88 == e.keyCode && !0 === e.ctrlKey || e.keyCode >= 35 && e.keyCode <=
        39 || (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e
        .preventDefault()
}

// validation starts 

function numbersonly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode
    var lblError = document.getElementById("lblError_phone");
    document.querySelector('input[name=phone]').classList.remove("error-field");
    lblError.innerHTML = "";
    if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
        if (document.querySelector('input[name=phone]').value.length > 9) {
            document.querySelector('input[name=phone]').classList.add("error-field");
            lblError.innerHTML = "Limit Reached.";
            return false //disable key press
        }
        if (unicode < 48 || unicode > 57) {
            document.querySelector('input[name=phone]').classList.add("error-field");
            lblError.innerHTML = "Only Numbers allowed.";
            return false //disable key press
        } //if not a number

    }
}

function ValidateName(e, errorId, fieldname) {
    var keyCode = e.keyCode || e.which;

    var lblError = document.getElementById(errorId);
    lblError.innerHTML = "";

    //Regex for Valid Characters i.e. Alphabets.
    var regex = /^[a-zA-Z ]+$/;

    //Validate TextBox value against the Regex.
    var isValid = regex.test(String.fromCharCode(keyCode));
    document.querySelector('input[name=' + fieldname + ']').classList.remove("error-field");
    if (!isValid) {
        document.querySelector('input[name=' + fieldname + ']').classList.add("error-field");
        lblError.innerHTML = "Only Alphabets allowed.";
    }

    return isValid;
}

function ValidateEmail() {
    var email = document.getElementById("txtEmail").value;
    var lblError = document.getElementById("lblError_email");
    lblError.innerHTML = "";
    if (email == '') {
        lblError.innerHTML = "";
        return true
    }
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (!expr.test(email)) {
        lblError.innerHTML = "Invalid email address.";
        document.getElementById("txtEmail").classList.add("error-field");
    } else {
        document.getElementById("txtEmail").classList.remove("error-field");
    }
}

function blockSpecialCountry() {
    var fieldname = 'country';
    var k = event.keyCode;
    var lblError = document.getElementById('lblError_country');
    var _validCheckCountry = (k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k < 48 && k > 57);


    lblError.innerHTML = '';
    document.querySelector('input[name=' + fieldname + ']').classList.remove("error-field");

    if (!_validCheckCountry) {
        lblError.innerHTML = "Special Char and Numbers are not allowed.";
        document.querySelector('input[name=' + fieldname + ']').classList.add("error-field");
        return false;
    }
    // return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8  || (k < 48 && k > 57));
}

function spaceTrimFunction() {
    document.querySelector('input[name=country]').value = document.querySelector('input[name=country]').value.trim();
    console.log("FFFFF");
}


/*Theme Version -v2 Updates*/

function geteBookpopup( title, pdfLink ){
    let modal           = document.getElementById("eb-modal");
    let eTitle          = document.getElementById("eguide-title");
    let inputeTitle     = document.getElementById("input-etitle");    
    let pdfeLink        = document.getElementById("pdf-elink");
    
    eTitle.innerText    = title;
    inputeTitle.value   = title;
    pdfeLink.value      = pdfLink;
    modal.classList.add("show-modal");
}

function _eBookDownload(e){
    checkRequired( [fname, email, phone, country] );
    if(
        (vcSpaceChecker(fname.value.trim()) === true) &&
        (vcSpaceChecker(email.value.trim()) === true) &&
        (vcSpaceChecker(phone.value.trim()) === true) &&
        (vcSpaceChecker(country.value.trim()) === true)
    ){
        const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if( !sre.test(email.value.trim()) ){
            return false;
        }

        if (checkLength(phone, 6, 20) === false){
            return false;
        }
        
        let thisBtn         = document.getElementById('pxldebtn');
        thisBtn.value       = "Please wait...";
        var formData    = new FormData(e);
        var obj         = {};
        formData.forEach((value, key) => obj[key] = value); 
        fetch( pxlObj.admin_ajax+"?action=_ebookRequest", {
            method: 'POST',
            headers: {'Accept': 'application/json', 'Content-Type': 'application/json'},
            body: JSON.stringify(obj)
        })
        .then(response => response.json())
        .then(data => {
            if( data.success === true ){                
                thisBtn.disabled    = true;
                document.getElementById('elm-eForm').style.display = 'none';
                var response = data.message;
                document.getElementById("responce").innerHTML = response;
            }else{
                thisBtn.value           = "Download Our e-Guide";
                thisBtn.disabled        = false;
                let errElm              = document.getElementById('errResp');
                errElm.style.display    = 'block';
                errResp.innerHTML       = data.message;
                setTimeout(function(){
                    errElm.style.display    = 'none';
                    errResp.innerHTML       = "";    
                },3000)
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
        return false;
    }else{
        return false;
    }
} 