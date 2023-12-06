function GliderSliderAuto(slider, miliseconds) {
  const slidesCount = slider.track.childElementCount;
  let slideTimeout = null;
  let nextIndex = 1;

  function slide () {
    slideTimeout = setTimeout(
    function () {
    if (nextIndex >= slidesCount ) {
    nextIndex = 0;
    }
    slider.scrollItem(nextIndex++);
    },
    miliseconds
    );
  }
  slider.ele.addEventListener('glider-animated', function() {
  window.clearInterval(slideTimeout);
  slide();
  });
  slide();
}

let hasClientSlider = document.querySelector(".client-testimonial-slider");
if( hasClientSlider ){
  // client slider
  window.addEventListener("load", function () {
      document.querySelector(".client-testimonial-slider .glider").addEventListener("glider-slide-visible", function (event) {
          var glider = Glider(this);
      });
      document.querySelector(".client-testimonial-slider .glider").addEventListener("glider-slide-hidden", function (event) {});
      document.querySelector(".client-testimonial-slider .glider").addEventListener("glider-refresh", function (event) {});
      document.querySelector(".client-testimonial-slider .glider").addEventListener("glider-loaded", function (event) {});
      let topGlider = new Glider(document.querySelector(".client-testimonial-slider .glider"), {
          slidesToShow: 1,
          slidesToScroll: 1,
          draggable: true,
          scrollLock: false,
          dots: ".client-testimonial-slider .dots",
          dragDistance: false,
      });
      GliderSliderAuto( topGlider, 5000 );
  });  
}


// Image slider
window.addEventListener("load", function () {
    document.querySelector(".image-slider-section .glider").addEventListener("glider-slide-visible", function (event) {
        var glider = Glider(this);
    });
    document.querySelector(".image-slider-section .glider").addEventListener("glider-slide-hidden", function (event) {});
    document.querySelector(".image-slider-section .glider").addEventListener("glider-refresh", function (event) {});
    document.querySelector(".image-slider-section .glider").addEventListener("glider-loaded", function (event) {});
    window._ = new Glider(document.querySelector(".image-slider-section .glider"), {
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        scrollLock: false,
        dots: "false",
        dragDistance: false,
        arrows: {
            prev: '.image-slider-section .glider-prev',
            next: '.image-slider-section .glider-next'
        },
    });

});

// Footer slider
window.addEventListener("load", function () {
    document.querySelector(".footer-slider .glider").addEventListener("glider-slide-visible", function (event) {
        var glider = Glider(this);
    });
    document.querySelector(".footer-slider .glider").addEventListener("glider-slide-hidden", function (event) {});
    document.querySelector(".footer-slider .glider").addEventListener("glider-refresh", function (event) {});
    document.querySelector(".footer-slider .glider").addEventListener("glider-loaded", function (event) {});
    let botGlider = new Glider(document.querySelector(".footer-slider .glider"), {
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        scrollLock: false,
        dots: ".footer-slider .dots",
        dragDistance: false,
    });
    GliderSliderAuto( botGlider, 5000 );
});


// pop up
/*
let hasFreeTrial = document.querySelector('.pop-up');
if( hasFreeTrial !== null ){
    hasFreeTrial.onclick = function (e) { alert("OKY");
        let div_list = document.querySelectorAll('.form-text-cont.verror');
        [].forEach.call(div_list, function(div){
            div.classList.remove('verror');
        });
        let popbtn = document.querySelector('.form-pop-up-box');
        let popbdy = document.querySelector('body');
        popbtn.classList.toggle('open-pop');
        popbdy.classList.add('body-pop');
        e.preventDefault();
    }
}
*/

function showPopForm(){
    let div_list = document.querySelectorAll('.form-text-cont.verror');
    [].forEach.call(div_list, function(div){
        div.classList.remove('verror');
    });
    let popbtn = document.querySelector('.form-pop-up-box');
    let popbdy = document.querySelector('body');
    popbtn.classList.toggle('open-pop');
    popbdy.classList.add('body-pop');
}

let popClose = document.querySelector('.pop-close');
if( popClose !== null ){
    popClose.onclick = function (e) {
        let popcls = document.querySelector('.form-pop-up-box');
        let popbdycls = document.querySelector('body');
        popcls.classList.remove('open-pop');
        popbdycls.classList.remove('body-pop');
        e.preventDefault();
    }    
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

autocomplete(document.getElementById("cont_country"), countries);
autocomplete(document.getElementById("pop-country"), countries);

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