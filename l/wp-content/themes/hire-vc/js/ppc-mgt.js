var testimonial =  document.getElementById("ppc-testimonial");
if( testimonial ){
  window.addEventListener("load", function() {
  document.querySelector(".ppc-testimonial .glider").addEventListener("glider-slide-visible",
  function(event) {
  var glider = Glider(this);
  });
  window._ = new Glider(document.querySelector(".ppc-testimonial .glider"), {
  slidesToShow: 1,
  slidesToScroll: 1,
  draggable: true,
  scrollLock: false,
  dots: ".ppc-testimonial .dots",
  dragDistance: false,
  arrows: {prev: '#ppc-testimonial .glider-prev', next: '#ppc-testimonial .glider-next'}
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
    for (i = 0; i < faqItem.length; i++) {
        faqItem[i].className = "faq-accordion-item-outer";
    }
    if (this.parentNode.className == "faq-accordion-item-outer") {
        this.parentNode.className = "faq-accordion-item-outer active";
    }
}

//pricing Script
var priceItem = document.getElementsByClassName("price-accordion-item");
var priceHD = document.getElementsByClassName("price-accordion-toggle");
for (i = 0; i < priceHD.length; i++) {
  priceHD[i].addEventListener("click", togglepriceItem, false);
}

function togglepriceItem() {
    for (i = 0; i < priceItem.length; i++) {
      priceItem[i].className = "price-accordion-item";
    }
    if (this.parentNode.className == "price-accordion-item") {
        this.parentNode.className = "price-accordion-item active";
    }
}



//Video Script
var hasYTvideo = document.getElementById("has-yt-video");
if( hasYTvideo ){
  var tag = document.createElement("script");
  tag.src = "//www.youtube.com/player_api";
  var player,
  firstScriptTag = document.getElementsByTagName("script")[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  var ytPlayButton = document.getElementById("play-button");
  function onPlayerReady(e){ 
      let osHomePage = document.getElementsByClassName("page__home")[0];
      if( !osHomePage ){
          document.getElementById("myDIV").classList.remove("contbox2");       
      }
      //document.getElementById("myDIV").classList.remove("contbox2"),
      player.playVideo();
  }
  ytPlayButton.addEventListener("click", function () {
      let e = document.getElementById("video").getAttribute("data-src");
      document.getElementById("video").setAttribute("src", e), (player = new YT.Player("video", { events: { onReady: onPlayerReady } }));
  });

  var contentPopup    = document.getElementById('contentPopup');
  var btn             = document.getElementById("myBtn");
  var span            = document.getElementsByClassName("close")[0];
  if( contentPopup ){
  btn.onclick = function() {        
      contentPopup.style.display = "block";
      let e = 'https://www.youtube.com/embed/aSKZ6S5m-JA?enablejsapi=1&html5=1&mute=1';
      document.getElementById("video").setAttribute("src", e), (player = new YT.Player("video", { events: { onReady: onPlayerReady } }));
  }
  span.onclick = function(){
      contentPopup.style.display = "none";
  }
  window.onclick = function(event) {
      if (event.target == contentPopup) {
          contentPopup.style.display = "none";
      }
  }    
  }
  
} 

//Invoicing Software Tab Script start from here//

// Define variables
var tabLabels = document.querySelectorAll("#tabs li");
var tabPanes = document.getElementsByClassName("tab-contents");

function activateTab(e) {
e.preventDefault();

// Deactivate all tabs
tabLabels.forEach(function(label, index){
  label.classList.remove("active");
});
[].forEach.call(tabPanes, function(pane, index){
  pane.classList.remove("active");
});

// Activate current tab
e.target.parentNode.classList.add("active");
var clickedTab = e.target.getAttribute("href");
document.querySelector(clickedTab).classList.add("active");
}

// Apply event listeners
tabLabels.forEach(function(label, index){
label.addEventListener("click", activateTab);
});

function showPopForm(){
    let popbtn = document.querySelector('.form-pop-up-box');
    let popbdy = document.querySelector('body');
    popbtn.classList.toggle('open-pop');
    popbdy.classList.add('body-pop');
}

//Just for popup form view


function showPopFormbook(){
    let popbtn = document.querySelector('.form-pop-up-box2');
    let popbdy = document.querySelector('body');
    popbtn.classList.toggle('open-pop');
    popbdy.classList.add('body-pop');
}

function showPopReport(){
    let popbtn = document.getElementById("ppc-downreport");
    let popbdy = document.querySelector('body');
    popbtn.classList.toggle('open-pop');
    popbdy.classList.add('body-pop');
}

function showpricepopup( plan ){
    let popbtn = document.querySelector('.form-pop-up-box3');
    let popbdy = document.querySelector('body');
    popbtn.classList.toggle('open-pop');
    popbdy.classList.add('body-pop');

    
    let hdType          = document.getElementById('plan-type');
    let hdPrice         = document.getElementById('op-plan');

    let ttlAmount       = document.getElementById('ttl-amount');
    let inpval          = ppcPlans[plan]['price'];
    
    ttlAmount.innerHTML = ppcPlans.cr_sign+inpval.toLocaleString('en-US');

    let lblPlan         = document.getElementById('label-plan');
    lblPlan.innerHTML   = ppcPlans[plan]['plan_fld'];

    hdType.value        = ppcPlans[plan]['plan_name'];
    hdPrice.value       = ppcPlans[plan]['price'];
    
    let itmName         = document.getElementById('itm-name');
    itmName.innerHTML   = ppcPlans[plan]['plan_name'];

    let itmprice        = document.getElementById('itm-price');
    itmprice.innerHTML  = ppcPlans.cr_sign+inpval.toLocaleString('en-US')+' '+ppcPlans.currency;
    
}

function closevcForm(thisform){
    let inForm = document.getElementById( thisform );
    inForm.classList.remove('open-pop');
}

function setoptValue( val, label, input, parent_col, inpval = null){
    //console.log( parent_col );
    let prDiv       = document.getElementById( parent_col );
    let arrow       = prDiv.getElementsByClassName('arrow-btn');
    let select      = prDiv.getElementsByClassName('in-options');   
    let labelSpan   = document.getElementById( label );
    let inputSpan   = document.getElementById( input );
    let erroSpan    = prDiv.getElementsByClassName('error');
    let selBox      = prDiv.getElementsByClassName('select-box');

    arrow[0].classList.toggle('rotate');
    select[0].classList.toggle('open-close');
    erroSpan[0].innerHTML = "";
    selBox[0].classList.remove('ws-error');
    labelSpan.innerHTML = val;
    
    if( inpval !== null ){
        let ttlAmount   = document.getElementById('ttl-amount');
        inputSpan.value = inpval;
        ttlAmount.innerHTML = ppcPlans.cr_sign+inpval.toLocaleString('en-US');
        
    }else{
        inputSpan.value = val;    
    }
}

function apnSelect(target){
    let divTarget   = document.getElementById( target );
    let arrow       = divTarget.getElementsByClassName('arrow-btn');
    let select      = divTarget.getElementsByClassName('in-options');   
    arrow[0].classList.toggle('rotate');
    select[0].classList.toggle('open-close');
}