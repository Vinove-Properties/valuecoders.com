var activestep1 = document.querySelector("#step1");	
activestep1.addEventListener('click', function (event) {	
    document.querySelector('.order-form').style.display="block";
    document.querySelector('.continue-btn').style.display="block";
    document.querySelector('.detail-form ').style.display="none";
    document.querySelector('.submit-btn').style.display="none";
    var stepclass = document.getElementById('step2');	  
      stepclass.classList.remove("active");
	  
});	
function changeFunc(selectedCount){
let optionList = document.getElementById('hire-tech-select-'+selectedCount);

var optionss = [".NET", "C/C++", "Django", "Firebase", "Go Lang", "Graph QL", "JAVA", "Laravel", "Node", "PHP", "Python", "ROR", "Symfony", "Angular", "HTML/CSS", "Power BI", "React JS", "Vue JS", "Android", "Flutter", "Ionic", "IOS", "Kotlin", "React Native", "Swift", "Xamarin", "Cryptocurreny", "Ethereum", "ICO", "Smart Contract", "Solidity", "Drupal", "Kentico", "Sitecore", "Sitefinity", "Umbraco", "Wordpress", "Chatbot", "Dialog Flow", "RPA", "Tensor Flow", "MEAN", "MERN", "Magento", "Shopify", "Azure", "AWS" ];

for(var i = 0; i < optionss.length; i++) {
    var opt = optionss[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    optionList.appendChild(el);
}
}
    // sidebar
    var hasUg = document.getElementById("rate-card-sec");
    if (hasUg) {
        window.addEventListener('scroll', function() {
            var items = document.querySelectorAll("#rate-card-sec .tab-content");
            items.forEach(function(item) {
                if (document.documentElement.scrollTop >= (item.getBoundingClientRect().top + window
                        .scrollY - 100)) {
                    let id = item.getAttribute("id");
                    let qli = document.querySelectorAll("#rate-card-sec .tabsli li a");
                    qli.forEach(function(qitem) {
                        qitem.classList.remove("visible");
                    });
                    document.querySelector('#rate-card-sec .tabsli li a[href="#' + id + '"]').classList.add(
                        "visible");
                }
            });
        });
    }


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

    // for select option
    var x, i, j, l, ll, selElmnt, a, b, c;
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 0; j < ll; j++) {
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    document.addEventListener("click", closeAllSelect);

    // for checkbox option
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
    
        clicks=0;
		Clickappend = 0;
        const fruits = [Clickappend];
function addRow (str) {
    //alert(str);
	Clickappend++;
    var _checkAddRow = false;
    //var parm = '#hire-for-'+str;
    //var  parent = document.querySelector(parm);
  // alert(parent);
    if(clicks < 40){
		
         //var bx = parent.querySelector('input[name = "time_'+str+'"]:checked').value;
        
        
        console.log('brfore',clicks);

        if(checkRadioBtn('time_'+str)){
            // if(clicks == 0 ){
            //  var techSelected = document.querySelector('.select-selected').innerHTML;
            //      if(techSelected != 'Select the technology'){
            //         _checkAddRow = true;
            //         console.log(0,"aaa");
            //      }
            // }else {
                var selectedId = '#hire-tech-select-'+str
                var country_select = document.querySelector(selectedId);
                var techSelected = country_select.options[country_select.selectedIndex].text;
                if(techSelected != 'Select the technology'){
                    console.log(1,"bbb",selectedId,techSelected);
                    _checkAddRow = true;
                 }
            // }
        }
      console.log(_checkAddRow);
       
        if(_checkAddRow){
             clicks++;
        console.log('after',clicks);
        document.querySelector('#content').insertAdjacentHTML(
            'beforeend',
            '<div id="hire-box-section-'+Clickappend+'" data-linkeditem="hire-box-'+Clickappend+'" class="hire-box"><div class="tech-box"><div class="select-option-box"><label class="label">Technology'+Clickappend+'</label><select onchange="resetTime('+Clickappend+')" onclick="changeFunc('+Clickappend+')" id="hire-tech-select-'+Clickappend+'" class="technology-box" name="technology[]"><option value="" disabled selected>Select the technology</option></select></div></div><a href="https://www.valuecoders.com/contact" target="_blank" class="form-caption">Need Help<span>,</span> Get in Touch!</a><div class="time-box"><span class="title">Hire For</span><div class="hire-for" id="hire-for-'+Clickappend+'"><div><input type="radio" data-hourly-price="30" id="40_'+Clickappend+'" value="40" name="time_'+Clickappend+'" onclick="checkHour(40,'+Clickappend+');"><label class="for-time" for="40_'+Clickappend+'">40 hrs</label></div><div><input type="radio" data-hourly-price="27" onclick="checkHour(80,'+Clickappend+');" id="80_'+Clickappend+'" value="80" name="time_'+Clickappend+'" ><label class="for-time" for="80_'+Clickappend+'">80 hrs</label></div><div><input type="radio" data-hourly-price="25" id="120_'+Clickappend+'" value="120" name="time_'+Clickappend+'" onclick="checkHour(120,'+Clickappend+');"><label class="for-time" for="120_'+Clickappend+'">120 hrs</label></div><div><input type="radio" id="160_'+Clickappend+'" value="160" name="time_'+Clickappend+'" onclick="checkHour(160,'+Clickappend+');"><label class="for-time dedicated" for="160_'+Clickappend+'">Dedicated</label></div></div><span class="form-caption">(160 hrs per month)</span></div><div id="multiselect_'+Clickappend+'" class="multiselect" style="display:none;"><div class="select-option-box"><label class="label">Experience</label><div class="custom-select"><select id="multiselect_dedicated_developer-'+Clickappend+'" name="multiselect_dedicated_developer[]" onchange="checkHour(160,'+Clickappend+')"><option value="" disabled selected>Select The Developer</option><option value="2200" data-hourly-price="2200" selected>Junior Level (1-3 Years Experienced)</option><option value="2800" data-hourly-price="2800">Mid Level (4-5 Years Experienced)</option><option value="3600" data-hourly-price="3600">Senior Level (5-7 Years Experienced)</option><option value="4500" data-hourly-price="4500">Technical Lead (8+ Years Experienced)</option></select></div></div></div> <div class="hire-btn add-btn add-btn-'+Clickappend+'" onclick="addRow('+Clickappend+')"></div><input class="hire-btn remove-btn remove-btn-'+Clickappend+'"  data-id="'+Clickappend+'" onclick="removeRow(this)"></div>');

        // to toggle add and remove icons start

        document.querySelectorAll('.hire-btn').forEach(function(el) {
           el.style.display = 'none';
        });

        var totalIconList =  document.querySelectorAll('.hire-btn').length;

        document.querySelector('.add-btn-'+Clickappend).style.display = 'block';       
        
        document.querySelectorAll('.remove-btn').forEach(function(el) {
           el.style.display = 'block';
        });
        
        document.querySelector('.remove-btn-'+Clickappend).style.display = 'none';

        
fruits.push(Clickappend);
console.log("ttttttttttttt");
console.log(fruits);
        // to toggle add and remove icons end
        var clickCount=Clickappend;
        document.getElementById('clickCount').value=clickCount;
        var listNode = document.getElementById('selected-tech-list'),
                liNode = document.createElement("li"),
                txtNode = document.createTextNode("Linode");            
            liNode.appendChild(txtNode);        
            liNode.setAttribute('id','hire-box-'+Clickappend);
            liNode.style.display = 'none';
            listNode.appendChild(liNode);
        } else{
            uncheckRadioBtn('time_'+str);
            alert("Data Missing!!!");

        }
    } else{
        alert("limit exceeds");
    }
}

function checkRadioBtn(radioName){
     var radios = document.getElementsByName(radioName);
     console.log(radioName);
     console.log(radios);
     for (var i = 0, len = radios.length; i < len; i++) {
          if (radios[i].checked) {
              return true;
          }
     }

     return false;
 }

 function uncheckRadioBtn(radioName){
     var radios = document.getElementsByName(radioName);
     console.log(radioName);
     console.log(radios);
     for (var i = 0, len = radios.length; i < len; i++) {
         radios[i].checked = false;
     }
 }

function removeproductRow (input) {
	clicks--;
    var indxid = $(input).data("id");
    const index = fruits.indexOf(indxid);
    var ulnodelistval = document.querySelectorAll("#selected-tech-list li:not([style*=none])").length;
	if(ulnodelistval == 1){
	var numbersit = [40,80,120,160];
	//document.getElementById('hire-box-'+indxid).remove();
	var dropDown3 = document.getElementById('hire-tech-select-'+indxid);
             dropDown3.selectedIndex = 0;	
	numbersit.forEach(function(numberp) {
	document.getElementById(numberp+'_'+indxid).parentElement.classList.remove('active');
	document.getElementById(numberp+'_'+indxid).checked = false;
	document.getElementById('clickCount').value = indxid;
    });
	 document.querySelector('.remove-btn').style.display = 'none';
     document.querySelector('.add-btn').style.display = 'block';  
	 document.querySelector("#selected-tech-list li").style.display='none'
	 
	 var element = document.getElementById("order-summary-right-box");
            element.classList.add("no-content");
            var elements = document.getElementById("continue-btn");
            elements.classList.add("disabl");
            document.getElementById('continue-btn').disabled = true;
            document.getElementById('orderno').style.display = 'block';
            document.getElementById('adonsouter1').style.display = 'none';
            document.getElementById('adonsouter2').style.display = 'none';
            document.getElementById('adonsouter3').style.display = 'none';
            document.getElementById("add-on-checkbox").checked = false;
            var dropDown1 = document.getElementById("add-ons-selector-section1");
             dropDown1.selectedIndex = 0;
             document.getElementById("add-on-order-extraPrice").innerHTML = "$0";
             var dropDown2 = document.getElementById("add-ons-selector-section2");
             dropDown2.selectedIndex = 0;
             document.getElementById("add-on-order-discount-extraPrice").innerHTML = "$0";
             var dropDown4 = document.getElementById("add-ons-selector-section3");
             dropDown4.selectedIndex = 0;
             document.getElementById("multiselect_"+indxid).style.display = 'none';
             document.getElementById("add-on-order-adiscount-extraPrice").innerHTML = "$0";
            document.getElementById('teamdisc').value = '';
            document.getElementById('add-on-advancediscount').value = '';
            document.getElementById('add-on-discount').value = '';
            document.getElementById('teamadisc').value = '';
            document.getElementById('addon-timezone-extraprice').value = '';
            document.getElementById('add-on-timeset').value = '';
            var selectedId = '#add-ons-selector-section1';
    var selectedId1 = document.querySelector(selectedId);
	var selectedIdd = '#add-ons-selector-section2';
    var selectedId2 = document.querySelector(selectedIdd);
    var selectedIddd = '#add-ons-selector-section3';
    var selectedId3 = document.querySelector(selectedIddd);
            document.querySelector("#tech-hour-price-"+indxid).innerHTML="$0";
    //document.getElementById("finalPrice").dataset.totalPrice="$0";
            
	}else if(ulnodelistval > 1){
    document.getElementById('hire-box-section-'+indxid).remove();
    document.getElementById('hire-box-'+indxid).remove();
    var selectedId = '#add-ons-selector-section1';
    var selectedId1 = document.querySelector(selectedId);
	var selectedIdd = '#add-ons-selector-section2';
    var selectedId2 = document.querySelector(selectedIdd);
    var selectedIddd = '#add-ons-selector-section3';
    var selectedId3 = document.querySelector(selectedIddd);
	 if (index > -1) { // only splice array when item is found
    fruits.splice(index, 1); // 2nd parameter means remove one item only
     }
	}
addOnSelector(selectedId1);
addOndiscountSelector(selectedId2);
addOnadvancediscountSelector(selectedId3);
calculateTotalPrice();
}

function removeRow (input) {
    clicks--;
    var indxid = $(input).data("id");
    console.log(indxid);
    const index = fruits.indexOf(indxid);
if (index > -1) { // only splice array when item is found
    fruits.splice(index, 1); // 2nd parameter means remove one item only
}
   // console.log(clicks);
    // if(clicks == 0){
     //alert(input.parentNode);
    // }
    document.getElementById('content').removeChild(input.parentNode);
    document.getElementById(input.parentNode.dataset.linkeditem).remove();
    document.getElementById('clickCount').value=document.getElementById('content').children.length;

    var testData = !!document.getElementById("clickCount");
    var selectedId = '#add-ons-selector-section1';
    var selectedId1 = document.querySelector(selectedId);
	var selectedIdd = '#add-ons-selector-section2';
    var selectedId2 = document.querySelector(selectedIdd);
    var selectedIddd = '#add-ons-selector-section3';
    var selectedId3 = document.querySelector(selectedIddd);
	var ulnodelistval = document.querySelectorAll("#selected-tech-list li:not([style*=none])").length;
    
    if(ulnodelistval == 0){
        var element = document.getElementById("order-summary-right-box");
            element.classList.add("no-content");
            var elements = document.getElementById("continue-btn");
            elements.classList.add("disabl");
            document.getElementById('continue-btn').disabled = true;
            document.getElementById('orderno').style.display = 'block';
            document.getElementById('adonsouter1').style.display = 'none';
            document.getElementById('adonsouter2').style.display = 'none';
            document.getElementById('adonsouter3').style.display = 'none';
            document.getElementById("add-on-checkbox").checked = false;
            var dropDown1 = document.getElementById("add-ons-selector-section1");
             dropDown1.selectedIndex = 0;
             document.getElementById("add-on-order-extraPrice").innerHTML = "$0";
             var dropDown2 = document.getElementById("add-ons-selector-section2");
             dropDown2.selectedIndex = 0;
             document.getElementById("add-on-order-discount-extraPrice").innerHTML = "$0";
             var dropDown3 = document.getElementById("add-ons-selector-section3");
             dropDown3.selectedIndex = 0;
             document.getElementById("add-on-order-adiscount-extraPrice").innerHTML = "$0";
            document.getElementById('teamdisc').value = '';
            document.getElementById('add-on-advancediscount').value = '';
            document.getElementById('add-on-discount').value = '';
            document.getElementById('teamadisc').value = '';
            document.getElementById('addon-timezone-extraprice').value = '';
            document.getElementById('add-on-timeset').value = '';
    }
    
    console.log("AAAADDDD",testData);
addOnSelector(selectedId1);
addOndiscountSelector(selectedId2);
addOnadvancediscountSelector(selectedId3);    
calculateTotalPrice();

     // var input = document.createElement("input");
     //    input.setAttribute("type", "hidden");
     //    input.setAttribute("name", "clickCount");
     //    input.setAttribute("id", "clickCount");
     //    input.setAttribute("value", clicks);
     //    document.getElementById("content").appendChild(input);
}
function checkHour(val,count){
	var numbers = [40,80,120,160];
 var _checkFlag = false;

    if(checkRadioBtn('time_'+count)){
        // if(count == 0 ){
        // var techSelected = document.querySelector('.select-selected').innerHTML;
        //     if(techSelected != 'Select the technology'){
        //         _checkFlag = true;
        //     }
        // } else {
        var selectedId = '#hire-tech-select-'+count;
        var country_select = document.querySelector(selectedId);
        var techSelected = country_select.options[country_select.selectedIndex].text;
            if(techSelected != 'Select the technology'){
                _checkFlag = true;
            }
        // }
    }

   if(_checkFlag){

        console.log("val",val,'count',count);

       if(val==160){
           document.getElementById('multiselect_'+count).style.display = 'block'; 
       }else{
           
           document.getElementById('multiselect_'+count).style.display = 'none'; 
       }
	   
	    numbers.forEach(function(number) {
			   if(number == val){
		   const child = document.getElementById(+number+'_'+count);
           child.parentElement.classList.add('active');
			   } else {
				document.getElementById(+number+'_'+count).parentElement.classList.remove('active');   
			   }
           
           
		   });

      
       var clkCount=document.getElementById('clickCount').value; 
    //   alert(clkCount);
       var totalCount= hourlyPrice = liNumber = 0;
       for(var i=0; i<=44; i++){
       if(!fruits.includes(i))
       { continue; }


            var liNumber = i;
            console.log('i',i);

            

                var selectedId = '#hire-tech-select-'+i;
                var country_select = document.querySelector(selectedId);
                var techSelected = country_select.options[country_select.selectedIndex].text;
                console.log(techSelected);            
             
			 numbers.forEach(function(number) {
			   
             if(document.getElementById(number+'_'+i).checked) {  
                totalCount =parseInt(document.getElementById(number+'_'+i).value);
                hourlyPrice =parseInt(document.getElementById(number+'_'+i).dataset.hourlyPrice);
             }
           
		     });
			 
			 
             if(document.getElementById('160_'+i).checked){
                totalCount =parseInt(document.getElementById('160_'+i).value);
                hourlyPrice =parseInt(document.getElementById('160_'+i).dataset.hourlyPrice);

                var selectedId = '#multiselect_dedicated_developer-'+i
                var multiselect_dedicated_developer = document.querySelector(selectedId);
                hourlyPrice = multiselect_dedicated_developer.options[multiselect_dedicated_developer.selectedIndex].getAttribute('data-hourly-price');
                // multiselect_dedicated_developer-
             }

             var element = document.getElementById("order-summary-right-box");
            element.classList.remove("no-content");
            var elements = document.getElementById("continue-btn");
            elements.classList.remove("disabl");
            document.getElementById('continue-btn').disabled = false;
            document.getElementById('orderno').style.display = 'none';
           if(totalCount == 160){
				var pricedisplay = techSelected+" (Dedicated)";
				var pricesum = hourlyPrice;
				
			}else{
				var pricedisplay = techSelected+" ("+totalCount+" hrs @ "+ "$"+hourlyPrice+"/hrs)" ;
				var pricesum = hourlyPrice*totalCount;
			}

            var liSpan = '<span id="hire-tech-'+liNumber+'" class="order-number order-tech-name">0'+parseInt(liNumber+1)+'. NET (80 hrs @ $27/hr)</span><span id="tech-hour-price-'+liNumber+'" class="order-price">$0<span class="close"></span></span>';

            document.getElementById('hire-box-'+liNumber).innerHTML = liSpan;        
            // document.getElementById('hire-tech-'+count).textContent = "0"+parseInt(liNumber+1)+"."+techSelected+" ("+totalCount+" hrs @ "+ hourlyPrice+"/hrs)" 
            document.getElementById('hire-tech-'+liNumber).textContent = pricedisplay;
            document.getElementById("tech-hour-price-"+liNumber).innerHTML="$"+pricesum+'<span data-id="'+liNumber+'" onclick="removeproductRow(this)" id="tech-hour-priceclose-'+liNumber+'" class="close remove-btn-'+liNumber+'"  ></span>';
            document.getElementById('hire-box-'+liNumber).style.display = 'block'; 
       }
       // document.getElementById("order-price").textContent="$"+hourlyPrice*totalCount;
    var selectedId = '#add-ons-selector-section1';
    var selectedId1 = document.querySelector(selectedId);
	var selectedIdd = '#add-ons-selector-section2';
    var selectedId2 = document.querySelector(selectedIdd);
    var selectedIddd = '#add-ons-selector-section3';
    var selectedId3 = document.querySelector(selectedIddd);
        addOnSelector(selectedId1);
        addOndiscountSelector(selectedId2);
        addOnadvancediscountSelector(selectedId3);
        calculateTotalPrice();
        console.log(totalCount);
        console.log(hourlyPrice);
        console.log(techSelected);
    }else {
         uncheckRadioBtn('time_'+count);
        alert("Please Select the Technology");
    }
}

function addOnCheck() {
   var addOnCheck = document.getElementById("add-on-checkbox");
       if(addOnCheck.checked == true){
            console.log("aaa");
            addOnCheck.checked = false;
       }else{
            console.log("aaa");
            addOnCheck.checked = true;
       }
       console.log(addOnCheck.checked);
}

function myFunction() {
  var checkBox = document.getElementById("add-on-checkbox");
  var elements = document.getElementsByClassName("add-ons-selector-outer");
  if (checkBox.checked == true){
    var displayState = 'block';
    console.log("True");
     for (var i = 0; i < elements.length; i++){
        elements[i].style.display = displayState;
    }
    // text.style.display = "block";
  } else {
    var displayState = 'none';
    console.log('false');
    for (var i = 0; i < elements.length; i++){
        elements[i].style.display = displayState;
    }
    var dropDown1 = document.getElementById("add-ons-selector-section1");
             dropDown1.selectedIndex = 0;
             document.getElementById("add-on-order-extraPrice").innerHTML = "$0";
             var dropDown2 = document.getElementById("add-ons-selector-section2");
             dropDown2.selectedIndex = 0;
             document.getElementById("add-on-order-discount-extraPrice").innerHTML = "$0";
             var dropDown3 = document.getElementById("add-ons-selector-section3");
             dropDown3.selectedIndex = 0;
             document.getElementById("add-on-order-adiscount-extraPrice").innerHTML = "$0";
            document.getElementById('teamdisc').value = '';
            document.getElementById('add-on-advancediscount').value = '';
            document.getElementById('add-on-discount').value = '';
            document.getElementById('teamadisc').value = '';
            document.getElementById('addon-timezone-extraprice').value = '';
            document.getElementById('add-on-timeset').value = '';
     // text.style.display = "none";
  }
  calculateTotalPrice();
}

function calculateTotalPrice(){
    
    var priceBox    = document.getElementsByClassName("order-price");
    var elements    = document.getElementsByClassName("add-ons-selector-outer");

    var addonPrice  = document.getElementById("addon-timezone-extraprice").value;
    var addondiscountPrice  = document.getElementById('teamdisc').value;
    var addonadiscountPrice  = document.getElementById('teamadisc').value;
    
	var totalPriceCount = priceBox.length;
    var totalOrderPrice = addOnPriceTotal = finalPrice = 0 ;
    
    var parents = [];
    
    for (i = 0; i < totalPriceCount; i++) {
        var elem = priceBox[i];              
            totalOrderPrice+=parseInt(priceBox[i].innerText.replace(/[^0-9]/g,''));  
    }

	adonstotal = addonPrice/100;
	var caladons = totalOrderPrice*adonstotal;

	adonsdiscounttotal = addondiscountPrice/100;
	var caladonsdiscount = totalOrderPrice*adonsdiscounttotal;
	
	adonsadiscounttotal = addonadiscountPrice/100;
	var caladonsadiscount = totalOrderPrice*adonsadiscounttotal;
	
    //console.log(totalOrderPrice + adonstotal - caladonsadiscount - caladonsdiscount);
    finalPrice = totalOrderPrice + caladons - caladonsdiscount - caladonsadiscount;
   
	//finalPrice = totalOrderPrice - caladonsdiscount;
    console.log(totalOrderPrice);
    //console.log("add",addOnPriceTotal);
    document.getElementById("finalPrice").textContent="$"+finalPrice;
    document.getElementById("finalPrice").dataset.totalPrice=finalPrice;
}

//*Form Validation Code Starts*/
const vcform    = document.getElementById('vc-lead-form');
const fname     = document.getElementById('first_name');
const lname     = document.getElementById('last_name');
const email     = document.getElementById('txtEmail');
const phone     = document.getElementById('phone_no');
const country   = document.getElementById('country');
const txtid     = document.getElementById('txt_id');
const comment      = document.getElementById('comment');

function getTechData(btn_id) {
	if(btn_id == 'continue-btn'){
	  var stepclass = document.getElementById('step2');
      var stepclass1 = document.getElementById('step1');	  
      stepclass.classList.add("active");
	  stepclass1.classList.add("pointer");
	}
    let form = document.querySelector('.order-form');
    let form2 = document.querySelector('.detail-form');
    let data = new FormData(form);
	data.delete('technology[]');
	data.delete('multiselect_dedicated_developer[]');
    let data2 = new FormData(form2);
    var object = {};
	var objects = {};
	
    //object['finalPrice'] = document.getElementById("finalPrice").textContent;
    data.forEach((value, key) => object[key] = value);
    data2.forEach((value, key) => objects[key] = value);
    var json = JSON.stringify(object);
	var jsons = JSON.stringify(objects);
    console.log(json)
	console.log(jsons)
  	//document.getElementById("orderFormData2").value = dedicated.join(",");
    document.getElementById("orderFormData").value = json;
    document.querySelector('.order-form').style.display="none";
    document.querySelector('.continue-btn').style.display="none";
    document.querySelector('.detail-form ').style.display="block";
    document.querySelector('.submit-btn').style.display="block";
   if(btn_id == 'submit-btn'){
	   
	    // alert(json);
    // document.querySelector('.order-summary-form').submit();
	//alert(ValidationEvent());
    //if(ValidationEvent()){   	
      //  document.getElementById('submit-btn').click();
		
   // }
   
//document.getElementById("submit-btn").addEventListener('click',function (){
    //ValidationEvent();
	
	//alert("first");
    // Storing Field Values In Variables
	checkRequired([fname,email,lname,phone,country,txtid,comment]);
	if(
        ( vcSpaceChecker(fname.value.trim()) === true ) &&
        ( vcSpaceChecker(lname.value.trim()) === true ) &&
        ( vcSpaceChecker(email.value.trim()) === true ) &&
        ( vcSpaceChecker(phone.value.trim()) === true ) &&
        ( vcSpaceChecker(country.value.trim()) === true ) &&
        ( vcSpaceChecker(txtid.value.trim()) === true )
        
    ){
        const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if( !sre.test(email.value.trim()) ){
            return false;
        }
        const phreg = /^[0-9]*$/;
        if( !phreg.test(phone.value.trim()) && phone.value.length == 10){
			showError(phone, 'Phone Number is not valid');
            return false;
        }
        if( checkLength(comment,3,1500) === false ){
            return false;
        }
		
    var inputtech = document.getElementsByName('technology[]');
	var inputdedicatedd = document.getElementsByName('multiselect_dedicated_developer[]');
	var inputtimezone = document.getElementById("add-on-timeset").value;   
	var inputtimezoneprice = document.getElementById("addon-timezone-extraprice").value;
	var inputteamdiscounttext = document.getElementById("add-on-discount").value;
	var inputteamdiscountprice = document.getElementById("teamdisc").value;
	var inputadteamdiscounttext = document.getElementById("add-on-advancediscount").value;
	var inputadteamdiscountprice = document.getElementById("teamadisc").value;
    var techno = [];
	var dedicated = [];
	for (var i = 0; i < inputtech.length; i++) {
                var a = inputtech[i];
                k = "array[" + i + "].value= "
                                   + a.value + " ";
								  techno.push(a.value);
                                   //a.value = "";
            }
	for (var i = 0; i < inputdedicatedd.length; i++) {
                var b = inputdedicatedd[i];
                g = "array[" + i + "].value= "
                                   + b.value + " ";
								  dedicated.push(b.value);
                                  // b.value = "";
								   
            }	
			//alert(JSON.stringify(techno));
	//sessionStorage.setItem("technologtItem", JSON.stringify(techno));
	//sessionStorage.setItem("dedicatedItem", JSON.stringify(dedicated));
	//sessionStorage.setItem("timeItem", json);
	//sessionStorage.setItem("customerdetail", jsons);
	//sessionStorage.setItem("settimezone",inputtimezone);
    var techitems = JSON.stringify(techno);	
	var dedicaytditems = JSON.stringify(dedicated);
	var timeItems = json;
	var customerdetails = jsons;
	var setaddtimezone = inputtimezone;  
	var setaddtimezoneprice = inputtimezoneprice;
	//alert(setaddtimezone);
	//document.getElementById("orderFormData1").value = JSON.stringify(techno);
   // console.log(techitems);
	console.log(dedicaytditems);
	xhr = new XMLHttpRequest();
    xhr.open( 'POST', 'https://www.valuecoders.com/v2wp/payment-data/', true );
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.onreadystatechange = function() {
	   if (this.readyState == 4 && this.status == 200) {
		  // Response
		  var response = this.responseText;  
           console.log(response);
	   }
	};
	var responseContainer = document.getElementById('paymentResponse'); 
	let ms = Date.now(); 
var createCheckoutSession = function (stripe) {
    return fetch("https://www.valuecoders.com/v2wp/stripe-charge", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            checkoutSession: 1,
            Name:"Engagement Options",
            ID:ms,
            Price:document.getElementById("finalPrice").dataset.totalPrice,
            Currency:"USD",
            // ExtraData:document.getElementById("orderFormData").value,
        }),
    }).then(function (result) {
        return result.json();
    });
};
    // Handle any errors returned from Checkout
var handleResult = function (result) {
    if (result.error) {
      responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }
    
};
// Specify Stripe publishable key to initialize Stripe.js
var stripe = Stripe('pk_test_51LGh6VSEGcajMbiYLXW0AgfZCipCcBmDPXTWCEKaewlNfMzD8bpO8LACFLQwsikvy9YXU49bg8fE3IKx2m5zI8F000KlW5MLC6');
createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
});
	var params = 'techitem='+techitems+'&dedicateditm='+dedicaytditems+'&times='+timeItems+'&customers='+customerdetails+'&addons='+setaddtimezone+'&addonsprice='+setaddtimezoneprice+'&tdtext='+inputteamdiscounttext+'&tdprice='+inputteamdiscountprice+'&atdtext='+inputadteamdiscounttext+'&atdprice='+inputadteamdiscountprice;
	//var params = 'techitem='+techitems+'&dedicateditm='+dedicaytditems+'&times='+timeItems+'&customers='+customerdetails;
	xhr.send(params);
	
		
  
    }else{
        return false;   
    }
	
   }
}



function vcSpaceChecker( input ){
    if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{1,}/.test( input ) ){
        return false;
    }else{
        return true;
    }
}

//checkRequired fields
function checkRequired(inputArr){
    inputArr.forEach(function(input){ 
        console.log( input.name );
        let e = input.value.trim();
        if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){

            if( input.name == "firstName" ){
                showError(input, `Please Fill First Name`);
            }else if( input.name == "cont_phone" ){
                showError(input, `Please Fill Phone`);
            }else if( input.name == "cont_email" ){
                showError(input, `Please Fill Email`);
            }else if( input.name == "lastname" ){
                showError(input, `Please Fill Last Name`);    
            }else if( input.name == "cont_country" ){
                showError(input, `Please Fill Country Name`);    
            }else if( input.name == "cont_tax" ){
                showError(input, `Please Fill Tax ID`);    
            }else if( input.name == "texteareacostm" ){
                showError(input, `Please Fill Comment`); 
            }
        }else{
            
            checkEmail(email);
            checkLength(fname,2,255);
            checkLength(lname,2,255);
            checkLength(comment,3,1500);
            checkLength(country,1,100);
            checkLength(txtid,1,100);
            checkfoucsoutPhone(phone);
            checkLength(phone,8,20);
            
        }
    });
}

//Show input error messages
function showError(input, message, spDiv = false ) {
    let formControl = input.parentElement;
    let small = formControl.querySelector('small.error-msg-section');    
    if( spDiv !== false ){
    small = document.getElementById(spDiv);
    }
    formControl.classList.add('ws-error');
    small.innerText = message;
}

//show success colour
function showSucces(input, spDiv = false){
    let formControl = input.parentElement;
    let small       = formControl.querySelector('small.error-msg-section');    
    if( spDiv !== false ){
    small = document.getElementById(spDiv);
    }
    formControl.classList.remove('ws-error');
    small.innerText = '';
}

//check email is valid
function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())) {
        showSucces(input)
    }else {
        if( input.value == '' ){
            showError(input,'Please Fill Email');
        }else{
            showError(input,'Email is not valid');  
        }
    }
}
function phonenumber(inputtxt){
	
    if( (/^[0-9]*$/.test(inputtxt.value.trim()) && inputtxt.value.length >= 10) ){   
        showSucces( inputtxt )
    }else{
        if( inputtxt.value == '' ){
            showError(inputtxt,'Please Fill Phone');
        }else{
            showError( inputtxt, 'Phone Number is not valid');
        }
        
    }
}
fname.addEventListener("keyup", checkUseName);
fname.addEventListener("keypress", checkUseName);
fname.addEventListener("keydown", ws_validateStr);
fname.addEventListener("focusout", checkUseName);

lname.addEventListener("keyup", checkCont);
lname.addEventListener("keypress", checkCont);
lname.addEventListener("keydown", ws_validateStr);
lname.addEventListener("focusout", checkCont);

country.addEventListener("keyup", checkcountry);
country.addEventListener("keypress", checkcountry);
country.addEventListener("keydown", ws_validateStr);
country.addEventListener("focusout", checkcountry);

txtid.addEventListener("keyup", checktxtid);
//txtid.addEventListener("keydown", ws_validateStr);
txtid.addEventListener("keypress", checktxtid);
txtid.addEventListener("focusout", checktxtid);

phone.addEventListener("keyup", checkPhone);
phone.addEventListener("keydown", ws_checkphonenumber);
phone.addEventListener("keypress", checkPhone);
phone.addEventListener("focusout", checkfoucsoutPhone);

comment.addEventListener("keyup", checkURequirement);
comment.addEventListener("keypress", checkURequirement);
comment.addEventListener("keydown", checkURequirement);
comment.addEventListener("focusout", checkURequirement);
comment.addEventListener("focusin", checkURequirement);

email.addEventListener("keyup", checkEmailEvent);
email.addEventListener("keydown", checkEmailEvent);
email.addEventListener("keypress", checkEmailEvent);
email.addEventListener("focusout", checkEmailEvent);
function checkURequirement(event){
    checkLength(comment,3,1500);
}
function checkcountry(event){
  checkLength(country,1,100);
}

function checktxtid(event){
  checkLength(txtid,1,100);
}
function ws_validateStr( e ) {
    if ( e.keyCode > 64 && e.keyCode < 91 || 8 == e.keyCode || 9 == e.keyCode || 32 == e.keyCode )
        return !0;
    e.preventDefault()
}
function checkEmailEvent(event){
    checkEmail(email);
}
function checkUseName(event){
  checkLength(fname,2,255);
}

function checkCont(event){
  checkLength(lname,2,255);
}


function checkPhone(event){
    checkLength(phone,8,20);
    phonenumber(phone);
}

function checkfoucsoutPhone(event){
    phonenumber(phone);
}
//check input Length
function checkLength(input, min ,max) {
    if(input.value.length < min) {
        if( input.name == "firstName"  ){            
            showError(input, `Please Fill First Name`);
		} else if( input.name == "lastname" ){
            showError(input, `Please Fill Last Name`);    
        }else if( input.name == "cont_phone"  ){
            showError(input, `Please Fill Phone`, "phone-error");
        }else if( input.name == "cont_email"  ){
            showError(input, `Please Fill Email`);
		}else if( input.name == "cont_country"  ){
            showError(input, `Please Fill Country Name`);
        }else if( input.name == "cont_tax"  ){
            showError(input, `Please Fill Tax ID`);
        }else if( input.name == "texteareacostm"  ){
            showError(input, `Please Fill Comment`);			
        }else{
            showError(input,`This Field is required`)   
        } 
        return false;
    }else {
        if( input.name == "cont_phone" ){
            showSucces(input);
        }
		if( input.name == "cont_email" ){
            showSucces(input);
        }
		else{
            showSucces(input);
        }
        return true;
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
function resetTime(selectedCount){
   // checkHour(80,0)
    if(checkRadioBtn('time_'+selectedCount)){
       var radios = document.getElementsByName('time_'+selectedCount);
        for (var i = 0, len = radios.length; i < len; i++) {
          if (radios[i].checked) {
              radios[i].click();
          }
     }
    }
}

function checkRadioBtn(radioName){
     var radios = document.getElementsByName(radioName);
     console.log(radioName);
     console.log(radios);
     for (var i = 0, len = radios.length; i < len; i++) {
          if (radios[i].checked) {
              return true;
          }
     }

     return false;
 }

function addOnSelector(sel) {
var priceBoxs    = document.getElementsByClassName("order-price");
    
	var totalPriceCounts = priceBoxs.length;
    var totalOrderPrices = 0;
    var parents = [];
    for (i = 0; i < totalPriceCounts; i++) {
        var elem = priceBoxs[i];              
            totalOrderPrices+=parseInt(priceBoxs[i].innerText.replace(/[^0-9]/g,''));  
    }
	
	
    var opt = sel.options[sel.selectedIndex];
    var price = opt.dataset.extraPrice
    var vals = opt.value  
	at = price/100;
	var caladonss = totalOrderPrices*at;
  document.getElementById("add-on-timeset").value = vals;
  document.getElementById("addon-timezone-extraprice").value = price;
  document.getElementById("add-on-order-extraPrice").innerHTML = "$"+caladonss+" ("+price+"% Extra)";
  document.getElementById("add-on-order-extraPrice").dataset.totalExtraPrice=price;

  calculateTotalPrice();
}

function addOndiscountSelector(sel) {
   var priceBoxs    = document.getElementsByClassName("order-price");
    
	var totalPriceCounts = priceBoxs.length;
    var totalOrderPrices = 0;
    var parents = [];
    for (i = 0; i < totalPriceCounts; i++) {
        var elem = priceBoxs[i];              
            totalOrderPrices+=parseInt(priceBoxs[i].innerText.replace(/[^0-9]/g,''));  
    }
    var opt = sel.options[sel.selectedIndex];
    var price = opt.dataset.extraPrice
	atdiscount = price/100;
	var caladonss = totalOrderPrices*atdiscount;
    var vals = opt.value
  document.getElementById("add-on-discount").value = vals;
  document.getElementById("add-on-order-discount-extraPrice").innerHTML = "$"+caladonss+" ("+price+"% Discount)";
  document.getElementById("add-on-order-discount-extraPrice").dataset.totalExtraPrice=price;
  document.getElementById("teamdisc").value=price;

  calculateTotalPrice();
}

function addOnadvancediscountSelector(sel) {
   var priceBoxs    = document.getElementsByClassName("order-price");
    
	var totalPriceCounts = priceBoxs.length;
    var totalOrderPrices = 0;
    var parents = [];
    for (i = 0; i < totalPriceCounts; i++) {
        var elem = priceBoxs[i];              
            totalOrderPrices+=parseInt(priceBoxs[i].innerText.replace(/[^0-9]/g,''));  
    }

    var opt = sel.options[sel.selectedIndex];
    var price = opt.dataset.extraPrice
	aatdiscount = price/100;
	var caladonss = totalOrderPrices*aatdiscount;

    var vals = opt.value
  document.getElementById("add-on-advancediscount").value = vals;
  document.getElementById("add-on-order-adiscount-extraPrice").innerHTML = "$"+caladonss+" ("+price+"% Discount)";
  document.getElementById("add-on-order-adiscount-extraPrice").dataset.totalExtraPrice=price;
  document.getElementById("teamadisc").value=price;

  calculateTotalPrice();
}



// validation starts 

function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
     var lblError = document.getElementById("lblError_phone");
      document.querySelector('input[name=cont_phone]').classList.remove("error-field");
      lblError.innerHTML = "";
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
          if (document.querySelector('input[name=cont_phone]').value.length > 9 ){
            document.querySelector('input[name=cont_phone]').classList.add("error-field");
            lblError.innerHTML = "Limit Reached.";
            return false //disable key press
        }
        if (unicode<48||unicode>57){
            document.querySelector('input[name=cont_phone]').classList.add("error-field");
            lblError.innerHTML = "Only Numbers allowed.";
            return false //disable key press
        } //if not a number
           
    }
}

function Validatetaxid(e,errorId,fieldname) {
        var keyCode = e.keyCode || e.which;
 
        var lblError = document.getElementById(errorId);
        lblError.innerHTML = "";
 
        //Regex for Valid Characters i.e. Alphabets.
        var regex = /^[0-9a-zA-Z]+$/;
 
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
         document.querySelector('input[name='+fieldname+']').classList.remove("error-field");
        if (!isValid) {
            document.querySelector('input[name='+fieldname+']').classList.add("error-field");
            lblError.innerHTML = "Only Alpha allowed.";
        }
 
        return isValid;
    }
    
function ValidateName(e,errorId,fieldname) {
        var keyCode = e.keyCode || e.which;
 
        var lblError = document.getElementById(errorId);
        lblError.innerHTML = "";
 
        //Regex for Valid Characters i.e. Alphabets.
        var regex = /^[A-Za-z]+$/;
 
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
         document.querySelector('input[name='+fieldname+']').classList.remove("error-field");
        if (!isValid) {
            document.querySelector('input[name='+fieldname+']').classList.add("error-field");
            //lblError.innerHTML = "Only Alphabets allowed.";
        }
 
        return isValid;
    }

   function ValidateEmail() {
        var email = document.getElementById("txtEmail").value;
        var lblError = document.getElementById("lblError_email");
        lblError.innerHTML = "";
        if(email== ''){
            lblError.innerHTML = "";
            return true
        }
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(email)) {
            lblError.innerHTML = "Invalid email address.";
            document.getElementById("txtEmail").classList.add("error-field");
        } else{
            document.getElementById("txtEmail").classList.remove("error-field");
        }
    }

    /*function blockSpecialCountry() {
		    var fieldname = 'cont_country';
            var k = event.keyCode;
            var lblError = document.getElementById('lblError_country');
            var _validCheckCountry = (k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k==32  || (k < 48 && k > 57);
      
            
            lblError.innerHTML = '';
              document.querySelector('input[name='+fieldname+']').classList.remove("error-field");
			  
            if(!_validCheckCountry){
                lblError.innerHTML = "Special Char and Numbers are not allowed.";
                document.querySelector('input[name='+fieldname+']').classList.add("error-field");
                return false;
            }
            // return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8  || (k < 48 && k > 57));
        }*/
		
	function blockSpecialtxt() {
		    var fieldname = 'cont_tax'; 
            var k = event.keyCode;
            var lblError = document.getElementById('lblError_tax');
            var validChecktxtid = (k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32  || (k < 48 && k > 57);
            
           // if(fieldname == 'cont_tax'){
			//	alert("fds");
             //   var _validCheckCountry = (k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k==32  || (k > 48 && k < 57);
           // }
            
            lblError.innerHTML = '';
              document.querySelector('input[name='+fieldname+']').classList.remove("error-field");
			  
            if(!validChecktxtid){
                lblError.innerHTML = "Special Char and Numbers are not allowed.";
                document.querySelector('input[name='+fieldname+']').classList.add("error-field");
                return false;
            }
            // return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8  || (k < 48 && k > 57));
        }	
        function spaceTrimFunction(){
              document.querySelector('input[name=cont_country]').value = document.querySelector('input[name=cont_country]').value.trim();
              console.log("FFFFF");
        }

// validatons ends 
     // for popup
        let hasFreeTrial = document.querySelector('.has-free-trial');
        if( hasFreeTrial !== null ){
            hasFreeTrial.onclick = function (e) {
                var popbtn = document.querySelector('.free-trail-pop-up');
                var popbdy = document.querySelector('body');
                popbtn.classList.toggle('open-pop');
                popbdy.classList.add('body-pop');
                e.preventDefault();
            }
        }
        let popClose = document.querySelector('.pop-close');
        if( popClose !== null ){
            popClose.onclick = function (e) {
                var popcls = document.querySelector('.free-trail-pop-up');
                var popbdycls = document.querySelector('body');
                popcls.classList.remove('open-pop');
                popbdycls.classList.remove('body-pop');
                e.preventDefault();
            }    
        }