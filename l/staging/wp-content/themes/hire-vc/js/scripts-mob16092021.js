function validate_name1() {
    var e = document.getElementById("user-name1").value.trim();
    if (!/^[A-Za-z ]{2,}/.test(e)) return document.getElementById("user-name1").classList.remove("user_name_valid"), document.getElementById("user-name1").classList.add("user_name_err"), document.getElementById("user-name1").focus(), !1;
    document.getElementById("user-name1").classList.remove("user_name_err"), document.getElementById("user-name1").classList.add("user_name_valid")
}

function validate_email1() {
    var e = document.getElementById("user-email1").value.trim();
    if (!/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(e)) return document.getElementById("user-email1").classList.remove("user_name_valid"), document.getElementById("user-email1").classList.add("user_name_err"), document.getElementById("user-email1").focus(), !1;
    document.getElementById("user-email1").classList.remove("user_name_err"), document.getElementById("user-email1").classList.add("user_name_valid")
}

function isNumberKey1(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function validate_phone1() {
  var e = document.getElementById("user-phone1").value.trim();
    if (!(/^[ 0123456789a-zA-Z().+-]+$/.test(e) && e.length >= 6)) return document.getElementById("user-phone1").classList.remove("user_name_valid"), document.getElementById("user-phone1").classList.add("user_name_err"), document.getElementById("user-phone1").focus(), !1;
    document.getElementById("user-phone1").classList.remove("user_name_err"), document.getElementById("user-phone1").classList.add("user_name_valid")
}

function validate_req1() {
  var e = document.getElementById("user-req1").value.trim();
    if (!/^[0123456789A-Za-z. ]{2,}/.test(e)) return document.getElementById("user-req1").classList.remove("user_name_valid"), document.getElementById("user-req1").classList.add("user_name_err"), document.getElementById("user-req1").focus(), !1;
    document.getElementById("user-req1").classList.remove("user_name_err"), document.getElementById("user-req1").classList.add("user_name_valid")
}

function validate_country_top() {
  var c = document.getElementById("myInput").value.trim();
  if(/^[A-Za-z()]{2,}/.test(c)){
    return document.getElementById("myInput").classList.remove("user_name_err"), document.getElementById("myInput").classList.add("user_name_valid");
  } 
  document.getElementById("myInput").classList.remove("user_name_valid"), document.getElementById("myInput").classList.add("user_name_err"), document.getElementById("myInput").focus(), !1;
}

document.getElementById("submitsidebar_form").addEventListener('click',function(event){
        var 
        e = document.getElementById("user-name1").value.trim(),
        r = document.getElementById("user-email1").value.trim(),
        s = document.getElementById("user-phone1").value.trim(),
        c = document.getElementById("myInput").value.trim(),
        a = document.getElementById("user-req1").value.trim();
        
        if(!/^[A-Za-z ]{2,}/.test(e)){
          document.getElementById("user-name1").classList.add("user_name_err");
          document.getElementById("user-name1").focus();
          event.preventDefault();
          
        }else if(!/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(r)){
          document.getElementById("user-email1").classList.add("user_name_err");
          document.getElementById("user-email1").focus();
          event.preventDefault();
        }else if(!/^[ 0123456789a-zA-Z().+-]+$/.test(s)){
          document.getElementById("user-phone1").classList.add("user_name_err");
          document.getElementById("user-phone1").focus();
          event.preventDefault();
        }else if(!/^[A-Za-z()]{2,}/.test(c)){
          document.getElementById("myInput").classList.add("user_name_err");
          document.getElementById("myInput").focus();
          event.preventDefault();
        }else if(a == ""){
          document.getElementById("user-req1").classList.add("user_name_err");
          document.getElementById("user-req1").focus();
          event.preventDefault();
        }
        else{
          document.getElementById("sidebar_form").submit();
        }
});
window.addEventListener('scroll', function() {
window.pageYOffset>80?document.querySelector(".headerRow").classList.add("headact"):document.querySelector(".headerRow").classList.remove("headact")
});


function validate_name(){
    var e = document.getElementById("user-name").value.trim();
    if (!/^[A-Za-z ]{2,}/.test(e)) return document.getElementById("user-name").classList.remove("user_name_valid"), document.getElementById("user-name").classList.add("user_name_err"), document.getElementById("user-name").focus(), !1;
    document.getElementById("user-name").classList.remove("user_name_err"), document.getElementById("user-name").classList.add("user_name_valid")
}

function validate_email() {
    var e = document.getElementById("user-email").value.trim();
    if (!/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(e)) return document.getElementById("user-email").classList.remove("user_name_valid"), document.getElementById("user-email").classList.add("user_name_err"), document.getElementById("user-email").focus(), !1;
    document.getElementById("user-email").classList.remove("user_name_err"), document.getElementById("user-email").classList.add("user_name_valid")
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function validate_phone() {
  var e = document.getElementById("user-phone").value.trim();
    if (!(/^[ 0123456789a-zA-Z().+-]+$/.test(e) && e.length >= 6)) return document.getElementById("user-phone").classList.remove("user_name_valid"), document.getElementById("user-phone").classList.add("user_name_err"), document.getElementById("user-phone").focus(), !1;
    document.getElementById("user-phone").classList.remove("user_name_err"), document.getElementById("user-phone").classList.add("user_name_valid")
}

function validate_country() {
  var c = document.getElementById("myInput2").value.trim();
  if(/^[A-Za-z()]{2,}/.test(c)){
    return document.getElementById("myInput2").classList.remove("user_name_err"), document.getElementById("myInput2").classList.add("user_name_valid");
  } 
  document.getElementById("myInput2").classList.remove("user_name_valid"), document.getElementById("myInput2").classList.add("user_name_err"), document.getElementById("myInput2").focus(), !1;
}

function validate_req(){
  var e = document.getElementById("user-req").value.trim();
    if (!/^[0123456789A-Za-z. ]{2,}/.test(e)) return document.getElementById("user-req").classList.remove("user_name_valid"), document.getElementById("user-req").classList.add("user_name_err"), document.getElementById("user-req").focus(), !1;
    document.getElementById("user-req").classList.remove("user_name_err"), document.getElementById("user-req").classList.add("user_name_valid")
}

document.getElementById("submitF").addEventListener('click',function(event){
  var 
  e = document.getElementById("user-name").value.trim(),
  r = document.getElementById("user-email").value.trim(),
  s = document.getElementById("user-phone").value.trim(),
  c = document.getElementById("myInput2").value.trim(),
  a = document.getElementById("user-req").value.trim();
  
  if(!/^[A-Za-z ]{2,}/.test(e)){
    document.getElementById("user-name").classList.add("user_name_err");
    document.getElementById("user-name").focus();
    event.preventDefault();
    
  }else if(!/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(r)){
    document.getElementById("user-email").classList.add("user_name_err");
    document.getElementById("user-email").focus();
    event.preventDefault();
  }else if(!/^[ 0123456789a-zA-Z().+-]+$/.test(s)){
    document.getElementById("user-phone").classList.add("user_name_err");
    document.getElementById("user-phone").focus();
    event.preventDefault();
  }else if(!/^[A-Za-z()]{2,}/.test(c)){
    document.getElementById("myInput2").classList.add("user_name_err");
    document.getElementById("myInput2").focus();
    event.preventDefault();
  }else if(a == ""){
    document.getElementById("user-req").classList.add("user_name_err");
    document.getElementById("user-req").focus();
    event.preventDefault();
  }
  else{
    document.getElementById("footer-form").submit();
  }
});