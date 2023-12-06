//window.addEventListener('DOMContentLoaded',function(){(function($){ @ })(jQuery);});
var $ = jQuery;
jQuery(document).ready(function($){
$(".techno").slick({dots:!0,infinite:!0,slidesToShow:5,slidesToScroll:2,autoplay:!1,autoplaySpeed:3e3,speed:1e3,cssEase:"linear",responsive:[{breakpoint:1024,settings:{slidesToShow:5,slidesToScroll:2,infinite:!0,dots:!0}},{breakpoint:990,settings:{slidesToShow:3,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:2,slidesToScroll:2}}]});
$(".partner").slick({
dots:!0,infinite:!0,slidesToShow:5,slidesToScroll:2,autoplay:!1,autoplaySpeed:3e3,speed:1e3,cssEase:"linear",
responsive:[
{breakpoint:1024,settings:{slidesToShow:5,slidesToScroll:2,infinite:!0,dots:!0}},
{breakpoint:990,settings:{slidesToShow:3,slidesToScroll:2}},
{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:2}},
{breakpoint:481,settings:{slidesToShow:1,slidesToScroll:1}}
]
});
$(window).scroll(function(){$(window).scrollTop()>80?$("header").addClass("headact"):$("header").removeClass("headact")});

/*TopFrom Submit Button Click*/
$("#submitsidebar_form").click(function(){
    var 
        e = $.trim($("#user-name1").val()),
        r = $.trim($("#user-email1").val()),
        s = $.trim($("#user-phone1").val()),
        c = $.trim($("#myInput").val()),
        a = $.trim($("#user-req1").val());
        return /^[A-Za-z ]{2,}/.test(e)
        ? /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(r)
            ? /^[ 0123456789a-zA-Z().+-]+$/.test(s)
                ? /^[A-Za-z()]{2,}/.test(c)
                  ? "" == a ? ($("#user-req1").addClass("user_name_err"), $("#user-req1").focus(), !1)
                    : void $("#sidebar_form").submit()
                  : ($("#myInput").addClass("user_name_err"), $("#myInput").focus(), !1)
                : ($("#user-phone1").addClass("user_name_err"), $("#user-phone1").focus(), !1)
            : ($("#user-email1").addClass("user_name_err"), $("#user-email1").focus(), !1)
        : ($("#user-name1").addClass("user_name_err"), $("#user-name1").focus(), !1);
});
});
/*Top Form DropZone */
Dropzone.options.myDropzone = {
	url:'https://www.valuecoders.com/upload-file-sidebar.php',
	autoProcessQueue: true,
	maxFilesize: 20,
	createImageThumbnails: true,
	thumbnailWidth: 30,
	thumbnailHeight: 30,
	thumbnailMethod: 'crop',
	acceptedFiles: 'image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,image/jpeg',
	addRemoveLinks: true,
	dictCancelUpload: 'Cancel',
	previewsContainer: '#prv-show',
	dictDefaultMessage: 'Browse | Drop Files Here',
	dictRemoveFile: '',
	timeout:420000,
    success: function(file, response){
        file.previewElement.querySelector(".thumb").title = file.name;
        let existingVal = document.getElementById('frmSidebarFileUploadedfilename').value;
        if(existingVal == ''){
        	document.getElementById('frmSidebarFileUploadedfilename').value = response;
        }else{          
        	document.getElementById('frmSidebarFileUploadedfilename').value = existingVal + response;
        }
    },
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.  
        this.on('addedfile',function(file){
        document.getElementById('submitsidebar_form').innerHTML = 'Please wait...';
        document.getElementById('submitsidebar_form').disabled = true;
        document.getElementById('submitsidebar_form').style.cursor = 'wait';
        switch (file.type) {
          case 'application/pdf':
              this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/pdf_gy.png");     
              break;
          case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
              this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/doc_gy.png"); 
              break;
          case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
              this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/xls_gy.png"); 
              break;
          case 'image/vnd.adobe.photoshop':
              this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/psd_gy.png");
              break;
          case 'application/zip':
              this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/zip_gy.png");
              break;
        }

        //if size exceed than 10 MB
        if(file.size > 10000000 && file.type == 'image/jpeg') {
            this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/jpg_gy.png");
        } else if(file.size > 10000000 && file.type == 'image/png') {
            this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/png_gy.png");
        } else {
          console.log(file.size);
        }

    });// end of on function

        this.on('complete', function(file) {
          document.getElementById('submitsidebar_form').innerHTML = 'Send Your Request';
          document.getElementById('submitsidebar_form').disabled = false;
          document.getElementById('submitsidebar_form').style.cursor = 'pointer';
        });
        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            console.log('data '+data);
        });

    },
	previewTemplate:`<li class="dz-preview dz-file-preview" style="display:inline-block;margin:0 10px 0 10px;">
	<img src="https://www.valuecoders.com/common/images-2/cross-icon-new.png" alt="Click me to remove the file." data-dz-remove style="margin:5px 0 0 11px;"/>
	<div class="dz-details">    
	<img class="thumb" data-dz-thumbnail />
	<div class="dz-size" data-dz-size></div>
	</div>
	<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
	<div class="dz-error-message"><span data-dz-errormessage></span></div>
	</li>`
}

/*Footer Form Dropzone*/
Dropzone.options.myAwesomeDropzone= {
    url: 'https://www.valuecoders.com/upload-file.php',
    autoProcessQueue: true,
    maxFilesize: 20,
    createImageThumbnails: true,
    thumbnailWidth: 30,
    thumbnailHeight: 30,
    thumbnailMethod: 'contain',
    acceptedFiles: 'image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls',
    addRemoveLinks: true,
    dictCancelUpload: 'Cancel',
    previewsContainer: '#prv-show-footer',
    dictDefaultMessage: 'Browse | Drop Files Here',
    dictRemoveFile: '',
    timeout:420000,
    success: function(file, response){
        file.previewElement.querySelector(".thumb").title = file.name;      
        let existingVal = document.getElementById('Uploadedfilename').value;
        if(existingVal == ''){
          document.getElementById('Uploadedfilename').value = response;
        }else{
          document.getElementById('Uploadedfilename').value = existingVal + response;
        }
    },
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.  
        //send all the form data along with the files:
        this.on('addedfile', function(file) {
         document.getElementById('submitF').innerHTML = 'Please wait...';
         document.getElementById('submitF').disabled = true;
         document.getElementById('submitF').style.cursor = 'wait'; 
        switch (file.type) {
          case 'application/pdf':
              this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/pdf_gy.png");     
              break;
          case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
              this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/doc_gy.png"); 
              break;
          case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
              this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/xls_gy.png"); 
              break;
          case 'image/vnd.adobe.photoshop':
              this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/psd_gy.png");
              break;
          case 'application/zip':
              this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/zip_gy.png");
              break;
        }

        //if size exceed than 10 MB
        if(file.size > 10000000 && file.type == 'image/jpeg') {
            this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/jpg_gy.png");
        } else if(file.size > 10000000 && file.type == 'image/png') {
            this.emit("thumbnail", file, "https://www.valuecoders.com/common/images-2/png_gy.png");
        } else {
          console.log(file.size);
        }
    });// end of on function

        this.on('complete', function(file) {
          document.getElementById('submitF').innerHTML = 'Send Your Request';
          document.getElementById('submitF').disabled = false;
          document.getElementById('submitF').style.cursor = 'pointer';
        });
        this.on("sendingmultiple", function(data, xhr, formData) {
        });
    },
    previewTemplate: `<li class="dz-preview dz-file-preview" style="display:inline-block;margin:0 10px 0 10px;">
    <img src="https://www.valuecoders.com/common/images-2/cross-icon-new.png" alt="Click me to remove the file." data-dz-remove style="margin:5px 0 0 11px;"/>
  <div class="dz-details">   
    <img class="thumb" data-dz-thumbnail />
    <div class="dz-size" data-dz-size></div>
  </div>
  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
  <div class="dz-error-message"><span data-dz-errormessage></span></div>
</li>`
}

/*Top Form Validation Start Here*/
function validate_name1() {
var e = $.trim($("#user-name1").val());
if (!/^[A-Za-z ]{2,}/.test(e)) return $("#user-name1").removeClass("user_name_valid"), $("#user-name1").addClass("user_name_err"), $("#user-name1").focus(), !1;
$("#user-name1").removeClass("user_name_err"), $("#user-name1").addClass("user_name_valid")
}

function validate_email1() {
var e = $.trim($("#user-email1").val());
if (!/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(e)) return $("#user-email1").removeClass("user_name_valid"), $("#user-email1").addClass("user_name_err"), $("#user-email1").focus(), !1;
$("#user-email1").removeClass("user_name_err"), $("#user-email1").addClass("user_name_valid")
}

function isNumberKey1(evt){
var charCode = (evt.which) ? evt.which : evt.keyCode
return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function isNumberKey(evt){
var charCode = (evt.which) ? evt.which : evt.keyCode
return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function validate_phone1() {
var e = $.trim($("#user-phone1").val());
if (!(/^[ 0123456789a-zA-Z().+-]+$/.test(e) && e.length >= 6)) return $("#user-phone1").removeClass("user_name_valid"), $("#user-phone1").addClass("user_name_err"), $("#user-phone1").focus(), !1;
$("#user-phone1").removeClass("user_name_err"), $("#user-phone1").addClass("user_name_valid")
}

function validate_req1() {
var e = $.trim($("#user-req1").val());
if (!/^[0123456789A-Za-z. ]{2,}/.test(e)) return $("#user-req1").removeClass("user_name_valid"), $("#user-req1").addClass("user_name_err"), $("#user-req1").focus(), !1;
$("#user-req1").removeClass("user_name_err"), $("#user-req").addClass("user_name_valid")
}

function validate_country_top() {
var c = $.trim($("#myInput").val());
if(/^[A-Za-z()]{2,}/.test(c)){
return $("#myInput").removeClass("user_name_err"), $("#myInput").addClass("user_name_valid");
} 
$("#myInput").removeClass("user_name_valid"), $("#myInput").addClass("user_name_err"), $("#myInput").focus(), !1;
}

/*Footer Form Validation Starts Here*/
function validate_name(){
var e=$.trim($("#user-name").val());if(!/^[A-Za-z ]{2,}/.test(e))return $("#user-name").removeClass("user_name_valid"),$("#user-name").addClass("user_name_err"),$("#user-name").focus(),!1;$("#user-name").removeClass("user_name_err"),$("#user-name").addClass("user_name_valid")
}
function validate_email(){
var e=$.trim($("#user-email").val());if(!/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(e))return $("#user-email").removeClass("user_name_valid"),$("#user-email").addClass("user_name_err"),$("#user-email").focus(),!1;$("#user-email").removeClass("user_name_err"),$("#user-email").addClass("user_name_valid")
}
function validate_phone(){
var e=$.trim($("#user-phone").val());if(!(/^[ 0123456789a-zA-Z().+-]+$/.test(e)&&e.length>=6))return $("#user-phone").removeClass("user_name_valid"),$("#user-phone").addClass("user_name_err"),$("#user-phone").focus(),!1;$("#user-phone").removeClass("user_name_err"),$("#user-phone").addClass("user_name_valid")
}
function validate_req(){
var e=$.trim($("#user-req").val());if(!/^[0123456789A-Za-z. ]{2,}/.test(e))return $("#user-req").removeClass("user_name_valid"),$("#user-req").addClass("user_name_err"),$("#user-req").focus(),!1;$("#user-req").removeClass("user_name_err"),$("#user-req").addClass("user_name_valid")
}
function validate_country(){
var c = $.trim($("#myInput2").val());
if(/^[A-Za-z()]{2,}/.test(c)){
return $("#myInput2").removeClass("user_name_err"), $("#myInput2").addClass("user_name_valid");
} 
$("#myInput2").removeClass("user_name_valid"), $("#myInput2").addClass("user_name_err"), $("#myInput2").focus(), !1;
}

$("#submitF").click(function(){
        var 
        e = $.trim($("#user-name").val()),
        r = $.trim($("#user-email").val()),
        s = $.trim($("#user-phone").val()),
        c = $.trim($("#myInput2").val()),
        a = $.trim($("#user-req").val());
        return /^[A-Za-z ]{2,}/.test(e)
        ? /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,17}|[0-9]{1,3})(\]?)$/.test(r)
            ? /^[ 0123456789a-zA-Z().+-]+$/.test(s)
                ? /^[A-Za-z()]{2,}/.test(c)
                  ? "" == a ? ($("#user-req").addClass("user_name_err"), $("#user-req").focus(), !1)
                    : void $("#footer-form").submit()
                  : ($("#myInput2").addClass("user_name_err"), $("#myInput2").focus(), !1)
                : ($("#user-phone").addClass("user_name_err"), $("#user-phone").focus(), !1)
            : ($("#user-email").addClass("user_name_err"), $("#user-email").focus(), !1)
        : ($("#user-name").addClass("user_name_err"), $("#user-name").focus(), !1);
});

function autocomplete(inp, arr) {
  var currentFocus;
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      for (i = 0; i < arr.length; i++) {
        var re = new RegExp(val, 'i');
        if (arr[i].match(re))
         {
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          b.addEventListener("click", function(e) {
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
        }
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
var countries = ["Afghanistan (AFG)","Albania (ALB)","Algeria (DZA)","Andorra (AND)","Angola (AGO)","Anguilla (AIA)","Antigua & Barbuda (ATG)","Argentina (ARG)","Armenia (ARM)","Aruba (ABW)","Australia (AUS)","Austria (AUT)","Azerbaijan (AZE)","Bahamas (BHS)","Bahrain (BHR)","Bangladesh (BGD)","Barbados (BRB)","Belarus (BLR)","Belgium (BEL)","Belize (BLZ)","Benin (BEN)","Bermuda (BMU)","Bhutan (BTN)","Bolivia (BOL)","Bosnia & Herzegovina (BIH)","Botswana (BWA)","Brazil (BRA)","British Virgin Islands (VGB)","Brunei (BRN)","Bulgaria (BGR)","Burkina Faso (BFA)","Burundi (BDI)","Cambodia (KHM)","Cameroon (CMR)","Canada (CAN)","Cape Verde (CPV)","Cayman Islands (CYM)","Central Arfrican Republic (CAF)","Chad (TCD)","Chile (CHL)","China (CHN)","Colombia (COL)","Congo (COG)","Cook Islands (COK)","Costa Rica (CRI)","Cote D Ivoire (CIV)","Croatia (HRV)","Cuba (CUB)","Curacao (CUW)","Cyprus (CYP)","Czech Republic (CZE)","Denmark (DNK)","Djibouti (DJI)","Dominica (DMA)","Dominican Republic (DOM)","Ecuador (ECU)","Egypt (EGY)","El Salvador (SLV)","Equatorial Guinea (GNQ)","Eritrea (ERI)","Estonia (EST)","Ethiopia (ETH)","Falkland Islands (FLK)","Faroe Islands (FRO)","Fiji (FJI)","Finland (FIN)","France (FRA)","French Polynesia (PYF)","French West Indies","Gabon (GAB)","Gambia (GMB)","Georgia (GEO)","Germany (DEU)","Ghana (GHA)","Gibraltar (GIB)","Greece (GRC)","Greenland (GRL)","Grenada (GRD)","Guam (GUM)","Guatemala (GTM)","Guernsey (GGY)","Guinea (GIN)","Guinea Bissau (GNB)","Guyana (GUY)","Haiti (HTI)","Honduras (HND)","Hong Kong (HKG)","Hungary (HUN)","Iceland (ISL)","India (IND)","Indonesia (IDN)","Iran (IRN)","Iraq (IRQ)","Ireland (IRL)","Isle of Man (IMN)","Israel (ITA)","Italy (ITA)","Jamaica (JAM)","Japan (JPN)","Jersey (JEY)","Jordan (JOR)","Kazakhstan (KAZ)","Kenya (KEN)","Kiribati (KIR)","Kosovo (KOS)","Kuwait (KWT)","Kyrgyzstan (KGZ)","Laos (LAO)","Latvia (LVA)","Lebanon (LBN)","Lesotho (LSO)","Liberia (LBR)","Libya (LBY)","Liechtenstein (LIE)","Lithuania (LTU)","Luxembourg (LUX)","Macau (MAC)","Macedonia (MKD)","Madagascar (MDG)","Malawi (MWI)","Malaysia (MYS)","Maldives (MDV)","Mali (MLI)","Malta (MLT)","Marshall Islands (MHL)","Mauritania (MRT)","Mauritius (MUS)","Mexico (MEX)","Micronesia (FSM)","Moldova (MDA)","Monaco (MCO)","Mongolia (MNG)","Montenegro (MNE)","Montserrat (MSR)","Morocco (MAR)","Mozambique (MOZ)","Myanmar (MMR)","Namibia (NAM)","Nauru (NRU)","Nepal (NPL)","Netherlands (NLD)","Netherlands Antilles (ANT)","New Caledonia (NCL)","New Zealand (NZL)","Nicaragua (NIC)","Niger (NER)","Nigeria (NGA)","North Korea (PRK)","Norway (NOR)","Oman (OMN)","Pakistan (PAK)","Palau (PLW)","Palestine (PSE)","Panama (PAN)","Papua New Guinea (PNG)","Paraguay (PRY)","Peru (PER)","Philippines (PHL)","Poland (POL)","Portugal (PRT)","Puerto Rico (PRI)","Qatar (QAT)","Reunion (REU)","Romania (ROU)","Russia (RUS)","Rwanda (RWA)","Saint Pierre & Miquelon (SPM)","Samoa (WSM)","San Marino (SMR)","Sao Tome and Principe (STP)","Saudi Arabia (SAU)","Senegal (SEN)","Serbia (SRB)","Seychelles (SYC)","Sierra Leone (SLE)","Singapore (SGP)","Slovakia (SVK)","Slovenia (SVN)","Solomon Islands (SLB)","Somalia (SOM)","South Africa (ZAF)","South Korea (KOR)","South Sudan (SSD)","Spain (ESP)","Sri Lanka (LKA)","St Kitts & Nevis (KNA)","St Lucia (LCA)","St Vincent (VCT)","Sudan (SDN)","Suriname (SUR)","Swaziland (SWZ)","Sweden (SWE)","Switzerland (CHE)","Syria (SYR)","Taiwan (TWN)","Tajikistan (TJK)","Tanzania (TZA)","Thailand (THA)","Timor L'Este (TLS)","Togo (TGO)","Tonga (TON)","Trinidad & Tobago (TTO)","Tunisia (TUN)","Turkey (TUR)","Turkmenistan (TKM)","Turks & Caicos (TCA)","Tuvalu (TUV)","Uganda (UGA)","Ukraine (UKR)","United Arab Emirates (UAE)","United Kingdom (UK)","United States of America (USA)","Uruguay (URY)","Uzbekistan (UZB)","Vanuatu (VUT)","Vatican City (VAT)","Venezuela (VEN)","Vietnam (VNM)","Virgin Islands (VIR)","Yemen (YEM)","Zambia (ZMB)","Zimbabwe (ZWE)"];
autocomplete(document.getElementById("myInput"), countries);
autocomplete(document.getElementById("myInput2"), countries);