function gliderDoAutoPlay(glider, selector, delay = 2000, repeat = true) {
    let autoplay        = null;
    const slidesCount   = glider.track.childElementCount;
    let nextIndex       = 1;
    let pause           = true;
    function slide() {
    autoplay = setInterval(() => {
        if (nextIndex >= slidesCount) {
            if (!repeat) {
                clearInterval(autoplay);
            } else {
                nextIndex = 0;
            }
        }
        glider.scrollItem(nextIndex++);
    }, delay);
    }
    slide();
    var element = document.querySelector(selector);
    var videoPlayed = false;
    element.addEventListener('click', (event) => { 
        clearInterval(autoplay);
        pause = false;
        videoPlayed = true;
    }, 300);

    element.addEventListener('mouseover', (event) => {
    if(pause && ( videoPlayed === false) ) {
        clearInterval(autoplay);
        pause = false;
    }
    }, 300);

    element.addEventListener('mouseout', (event) => {
    if (!pause && ( videoPlayed === false)) {
        slide();
        pause = true;
    }
    }, 300);
}
window.addEventListener("load", function() {
/*
document.querySelector(".customer-testimonial-slider .glider").addEventListener("glider-slide-visible",
function(event) {
var glider = Glider(this);
});
*/

var glider = new Glider(document.querySelector(".customer-testimonial-slider .glider"), {
  slidesToShow: 4,
  slidesToScroll: 1,
  draggable: true,
  scrollLock: false,
  dots: ".customer-testimonial-slider .dots",
  dragDistance: false,
  responsive: [{
          breakpoint: 320,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              duration: 0.25
          }
      },
      {
          breakpoint: 767,
          settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              itemWidth: 150,
              duration: 0.25
          }
      },
      {
          breakpoint: 1024,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              itemWidth: 150,
              duration: 0.25
          }
      },
      {
          breakpoint: 1400,
          settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
              itemWidth: 150,
              duration: 0.25
          }
      },
  ]
});
gliderDoAutoPlay(glider,'.customer-testimonial-slider .glider', 5000 );      
});

function showPopFormOp( isCallBtn = false ){
    let div_list = document.querySelectorAll('.form-text-cont.verror');
    [].forEach.call(div_list, function(div){
        div.classList.remove('verror');
    });

    let popbdy      = document.querySelector('body');
    let popIdr      = document.getElementById("vc-fxdform");
    let popOcon     = document.getElementById("vc-frm-outer");
    
    let closeElm    = document.getElementsByClassName('pop-close');
    if( closeElm[0] ){
    closeElm[0].parentNode.removeChild(closeElm[0]);  
    }

    popOcon.insertAdjacentHTML('afterbegin', '<span class="pop-close" onclick="return close_vpop();"></span>');
    popbdy.classList.add('body-pop');    
    popIdr.classList.add('form-pop-up-box');
    popIdr.style.display = "block";

    let bookdemoFrm = document.getElementById('fh-bookdemo');
    let cmnFrm      = document.getElementById('fh-cmn');

    if( isCallBtn === true ){      
    let bcField = document.getElementById('bookcall-frm');
      bcField.value = 1;
      cmnFrm.style.display = "none";
      bookdemoFrm.style.display = "block";
    }else{
      cmnFrm.style.display = "block";
      bookdemoFrm.style.display = "none";
    }
}

function close_vpop(){
  let div_list = document.querySelectorAll('.form-text-cont.verror');
    [].forEach.call(div_list, function(div){
        div.classList.remove('verror');
    });
    let popbdy      = document.querySelector('body');
    let popIdr      = document.getElementById("vc-fxdform");
    popbdy.classList.remove('body-pop');    
    popIdr.classList.remove('form-pop-up-box');
    //popIdr.style.display = "none";

    let bcField = document.getElementById('bookcall-frm');
    bcField.value = 0;

    let bookdemoFrm = document.getElementById('fh-bookdemo');
    let cmnFrm      = document.getElementById('fh-cmn');
    
    cmnFrm.style.display = "block";
    bookdemoFrm.style.display = "none";
}

var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","zMonaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
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

if( document.getElementById("pop-country") ){
autocomplete(document.getElementById("pop-country"), countries);  
}

if( document.getElementById("cont_country") ){
autocomplete(document.getElementById("cont_country"), countries);  
}

var industry =  document.getElementById("industry");
if( industry ){
window.addEventListener("load", function () {
document.querySelector(".industry-case-sec.glider").addEventListener("glider-slide-visible", function (event) {
  var glider2 = Glider(this);
});
document.querySelector(".industry-case-sec.glider").addEventListener("glider-slide-hidden", function (event) {});
document.querySelector(".industry-case-sec.glider").addEventListener("glider-refresh", function (event) {});
document.querySelector(".industry-case-sec.glider").addEventListener("glider-loaded", function (event) {});
window._ = new Glider(document.querySelector(".industry-case-sec.glider"), {
  slidesToShow: 1,
  slidesToScroll: 1,
  draggable: false,
  scrollLock: false,
  rewind: false,
  dots: "false",
  dragDistance: false,
  arrows: {
    prev: '#industry .glider-prev',
    next: '#industry .glider-next'
  },
});
});
};
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

document.addEventListener("DOMContentLoaded", function() {
  var elements = document.querySelectorAll(".scroll-counter")

  elements.forEach(function(item) {
    // Add new attributes to the elements with the '.scroll-counter' HTML class
    item.counterAlreadyFired = false
    item.counterSpeed = item.getAttribute("data-counter-time") / 45
    item.counterTarget = +item.innerText
    item.counterCount = 0
    item.counterStep = item.counterTarget / item.counterSpeed

    item.updateCounter = function() {
      item.counterCount = item.counterCount + item.counterStep
      item.innerText = Math.ceil(item.counterCount)

      if (item.counterCount < item.counterTarget) {
        setTimeout(item.updateCounter, item.counterSpeed)
      } else {
        item.innerText = item.counterTarget
      }
    }
  })

  var isElementVisible = function isElementVisible(el) {
    var scroll = window.scrollY || window.pageYOffset
    var boundsTop = el.getBoundingClientRect().top + scroll
    var viewport = {
      top: scroll,
      bottom: scroll + window.innerHeight,
    }
    var bounds = {
      top: boundsTop,
      bottom: boundsTop + el.clientHeight,
    }
    return (
      (bounds.bottom >= viewport.top && bounds.bottom <= viewport.bottom) ||
      (bounds.top <= viewport.bottom && bounds.top >= viewport.top)
    )
  }

  // Funciton that will get fired uppon scrolling
  var handleScroll = function handleScroll() {
    elements.forEach(function(item, id) {
      if (true === item.counterAlreadyFired) return
      if (!isElementVisible(item)) return
      item.updateCounter()
      item.counterAlreadyFired = true
    })
  }
  window.addEventListener("scroll", handleScroll)
})

let hoverCountry = document.getElementsByClassName('country-list');
if( hoverCountry.length > 0 ){
    hoverCountry[0].onmouseover = function(event) {
        document.body.classList.add('country-bg');
    }
    hoverCountry[0].onmouseout = function(event) {
        document.body.classList.remove('country-bg');
    }
}