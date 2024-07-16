function elementRemover( elmID ){
  if(document.contains(document.getElementById(elmID))) {
    document.getElementById(elmID).remove();
  } 
}
function validate_name1() {
  var e = document.getElementById("user-name1").value.trim();
  if (!/^[A-Za-z ]{2,}/.test(e)) return elementRemover("error_name_err"), document.getElementById("user-name1").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_name_err'>Please fill name</span>"), document.getElementById("user-name1").classList.remove("user_name_valid"), document.getElementById("user-name1").classList.add("user_name_err");
  elementRemover("error_name_err"), document.getElementById("user-name1").classList.remove("user_name_err"), document.getElementById("user-name1").classList.add("user_name_valid")
}
function clearvalidation(){
  elementRemover("error_name_err"),document.getElementById("user-name1").classList.remove("user_name_err");
}

function validate_email1() {
  var e = document.getElementById("user-email1").value.trim();
  if (!/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(e)) return elementRemover("error_email_err"), document.getElementById("user-email1").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_email_err'>Please fill email</span>"), document.getElementById("user-email1").classList.remove("user_name_valid"), document.getElementById("user-email1").classList.add("user_name_err");
  document.getElementById("user-email1").classList.remove("user_name_err"), document.getElementById("user-email1").classList.add("user_name_valid")
}

function clearvalidationEmail(){
  elementRemover("error_email_err"),document.getElementById("user-email1").classList.remove("user_name_err");
}

function isNumberKey1(evt){
  var charCode = (evt.which) ? evt.which : evt.keyCode
  return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function validate_phone1() {
var e = document.getElementById("user-phone1").value.trim();
  if (!(/^[ 0123456789a-zA-Z().+-]+$/.test(e) && e.length >= 6)) return elementRemover("error_phone_err"), document.getElementById("user-phone1").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_phone_err'>Please fill phone</span>"),document.getElementById("user-phone1").classList.remove("user_name_valid"), document.getElementById("user-phone1").classList.add("user_name_err");
  document.getElementById("user-phone1").classList.remove("user_name_err"), document.getElementById("user-phone1").classList.add("user_name_valid")
}

function clearvalidationPhone(){
    elementRemover("error_phone_err"),document.getElementById("user-phone1").classList.remove("user_name_err");
}

function validate_req1() {
var e = document.getElementById("user-req1").value.trim();
  if (!/^[0123456789A-Za-z. ]{2,}/.test(e)) return elementRemover("user_req_error"), document.getElementById("user-req1").insertAdjacentHTML('beforebegin',"<span class='error_red' id='user_req_error'>Please fill requirement</span>"),document.getElementById("user-req1").classList.remove("user_name_valid"), document.getElementById("user-req1").classList.add("user_name_err");
  document.getElementById("user-req1").classList.remove("user_name_err"), document.getElementById("user-req1").classList.add("user_name_valid")
}

function clearvalidationReq(){
    elementRemover("user_req_error"),document.getElementById("user-req1").classList.remove("user_name_err");
}

function validate_country1(){
      var c = document.getElementById("myInput").value.trim();
      if(/^[A-Za-z()]{2,}/.test(c)){
        return document.getElementById("myInput").classList.remove("user_name_err"), document.getElementById("myInput").classList.add("user_name_valid");
      }
      elementRemover("error_country_err"), document.getElementById("myInput").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_country_err'>Please fill country</span>"), document.getElementById("myInput").classList.remove("user_name_valid"), document.getElementById("myInput").classList.add("user_name_err");
}

function clearvalidationCountry(){
  elementRemover("error_country_err"),document.getElementById("myInput").classList.remove("user_name_err");  
}

var sbForm =  document.getElementById('submitsidebar_form');
if (typeof(sbForm) != 'undefined' && sbForm != null){
document.getElementById("submitsidebar_form").addEventListener('click',function (event){
 var 
      e = document.getElementById("user-name1").value.trim(),
      r = document.getElementById("user-email1").value.trim(),
      s = document.getElementById("user-phone1").value.trim(),
      c = document.getElementById("myInput").value.trim(),
      a = document.getElementById("user-req1").value.trim();
      var vstatus = true;
      if(!/^[A-Za-z ]{2,}/.test(e)){
        vstatus = false;
        elementRemover("error_name_err");
        document.getElementById("user-name1").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_name_err'>Please fill name</span>");
        document.getElementById("user-name1").classList.add("user_name_err");
        //document.getElementById("user-name1").focus();
        event.preventDefault();
        
      }

      if(!/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(r)){
        vstatus = false;
        elementRemover("error_email_err");
        document.getElementById("user-email1").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_email_err'>Please fill email</span>");
        document.getElementById("user-email1").classList.add("user_name_err");
        //document.getElementById("user-email1").focus();
        event.preventDefault();
      }
      if(!/^[ 0123456789a-zA-Z().+-]+$/.test(s)){
        vstatus = false;
        elementRemover("error_phone_err");
        document.getElementById("user-phone1").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_phone_err'>Please fill phone</span>");
        document.getElementById("user-phone1").classList.add("user_name_err");
        //document.getElementById("user-phone1").focus();
        event.preventDefault();
      }
      if(!/^[A-Za-z()]{2,}/.test(c)){
        vstatus = false;
        elementRemover("error_country_err");
        document.getElementById("myInput").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_country_err'>Please fill country</span>");
        document.getElementById("myInput").classList.add("user_name_err");
        //document.getElementById("myInput").focus();
        event.preventDefault();
      }
      if(a == ""){
        vstatus = false;
        elementRemover("user_req_error");
        document.getElementById("user-req1").insertAdjacentHTML('beforebegin',"<span class='error_red' id='user_req_error'>Please Fill Requirement</span>");
        document.getElementById("user-req1").classList.add("user_name_err");
        //document.getElementById("user-req1").focus();
        event.preventDefault();
      }
      if( vstatus == true ){
        document.getElementById('submitsidebar_form').innerHTML = 'Please wait...';
        document.getElementById('submitsidebar_form').disabled = true;
        document.getElementById('submitsidebar_form').style.cursor = 'wait';
        document.getElementById("sidebar_form").submit();
      }else{
        return false;
      }
});
}
window.addEventListener('scroll', function() {
window.pageYOffset>80?document.querySelector(".headerRow").classList.add("headact"):document.querySelector(".headerRow").classList.remove("headact")
});


/*Footer Form Validation : 24.06.2021*/
function validate_name(){
  var e = document.getElementById("user-name").value.trim();
  if (!/^[A-Za-z ]{2,}/.test(e)) return elementRemover("error_name_err"), document.getElementById("user-name").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_name_err'>Please fill name</span>"), document.getElementById("user-name").classList.remove("user_name_valid"), document.getElementById("user-name").classList.add("user_name_err");
  elementRemover("error_name_err"), document.getElementById("user-name").classList.remove("user_name_err"), document.getElementById("user-name").classList.add("user_name_valid")
}
function botclearvalidation(){
  elementRemover("error_name_err"),document.getElementById("user-name").classList.remove("user_name_err");
}

function validate_email(){
  var e = document.getElementById("user-email").value.trim();
  if (!/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(e)) return elementRemover("error_email_err"), document.getElementById("user-email").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_email_err'>Please fill email</span>"),  document.getElementById("user-email").classList.remove("user_name_valid"), document.getElementById("user-email").classList.add("user_name_err");
  document.getElementById("user-email").classList.remove("user_name_err"), document.getElementById("user-email").classList.add("user_name_valid")
}

function botclearvalidationEmail(){
  elementRemover("error_email_err"),document.getElementById("user-email").classList.remove("user_name_err");
}

function isNumberKey(evt){
  var charCode = (evt.which) ? evt.which : evt.keyCode
  return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function validate_phone(){
var e = document.getElementById("user-phone").value.trim();
  if (!(/^[ 0123456789a-zA-Z().+-]+$/.test(e) && e.length >= 6)) return elementRemover("error_phone_err"), document.getElementById("user-phone").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_phone_err'>Please fill phone</span>"), document.getElementById("user-phone").classList.remove("user_name_valid"), document.getElementById("user-phone").classList.add("user_name_err");
  document.getElementById("user-phone").classList.remove("user_name_err"), document.getElementById("user-phone").classList.add("user_name_valid")
}

function botclearvalidationPhone(){
    elementRemover("error_phone_err"),document.getElementById("user-phone").classList.remove("user_name_err");
}

function validate_req(){
var e = document.getElementById("user-req").value.trim();
  if (!/^[0123456789A-Za-z. ]{2,}/.test(e)) return elementRemover("user_req_error"), document.getElementById("user-req").insertAdjacentHTML('beforebegin',"<span class='error_red' id='user_req_error'>Please fill requirement</span>"), document.getElementById("user-req").classList.remove("user_name_valid"), document.getElementById("user-req").classList.add("user_name_err");
  document.getElementById("user-req").classList.remove("user_name_err"), document.getElementById("user-req").classList.add("user_name_valid")
}

function botclearvalidationReq(){
    elementRemover("user_req_error"),document.getElementById("user-req").classList.remove("user_name_err");
}

var submitFrm =  document.getElementById('submitF');
if (typeof(submitFrm) != 'undefined' && (submitFrm != null)){
  document.getElementById("submitF").addEventListener('click',function(event){
   var 
        e = document.getElementById("user-name").value.trim(),
        r = document.getElementById("user-email").value.trim(),
        s = document.getElementById("user-phone").value.trim(),
        a = document.getElementById("user-req").value.trim();
        var vstatus = true;

        if(!/^[A-Za-z ]{2,}/.test(e)){
          vstatus = false;
          elementRemover("error_name_err");
          document.getElementById("user-name").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_name_err'>Please fill name</span>");
          document.getElementById("user-name").classList.add("user_name_err");
          //document.getElementById("user-name").focus();
          event.preventDefault();
          
        }
        if(!/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(r)){
          vstatus = false;
          elementRemover("error_email_err");
          document.getElementById("user-email").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_email_err'>Please fill email</span>");
          document.getElementById("user-email").classList.add("user_name_err");
          //document.getElementById("user-email").focus();
          event.preventDefault();
        }
        if(!/^[ 0123456789a-zA-Z().+-]+$/.test(s)){
          vstatus = false;
          elementRemover("error_phone_err");
          document.getElementById("user-phone").insertAdjacentHTML('beforebegin',"<span class='error_red' id='error_phone_err'>Please fill phone</span>");
          document.getElementById("user-phone").classList.add("user_name_err");
          //document.getElementById("user-phone").focus();
          event.preventDefault();
        }
        if(a == ""){
          vstatus = false;
          elementRemover("user_req_error");
          document.getElementById("user-req").insertAdjacentHTML('beforebegin',"<span class='error_red' id='user_req_error'>Please fill requirement</span>");
          document.getElementById("user-req").classList.add("user_name_err");
          //document.getElementById("user-req").focus();
          event.preventDefault();
        }

        if( vstatus == true ){
          document.getElementById('submitF').innerHTML = 'Please wait...';
          document.getElementById('submitF').disabled = true;
          document.getElementById('submitF').style.cursor = 'wait'; 
          document.getElementById("footer-form").submit();
        }else{
          return false;
        }
  });
}  