
const vcTailerd = document.getElementById("tailored-slide");
                  if( vcTailerd ){
                  window.addEventListener("load", function() {
                   document.querySelector("#tailored-slide .glider").addEventListener("glider-slide-visible",
                   function(event) {
                   var glider = Glider(this);
                   });
                   window._ = new Glider(document.querySelector("#tailored-slide .glider"), {
                       slidesToShow: 3,
                       slidesToScroll: 3,
                       draggable: true,
                       scrollLock: false,
                       dots: "#tailored-slide .dots",
                       dragDistance: false,
                       arrows: { 
                  prev: '.tail-prev',
                  next: '.tail-next'
                  },
                  
                       responsive: [{
                               breakpoint: 320,
                               settings: {
                                   slidesToShow: 1,
                                   duration: 2.25
                               }
                           },
                           {
                               breakpoint: 767,
                               settings: {
                                   slidesToShow: 1,
                                   itemWidth: 150,
                                   duration: 1.25
                               }
                           },
                           {
                               breakpoint: 1024,
                               settings: {
                                   slidesToShow: 2,
                                   itemWidth: 150,
                                   duration: 1.25
                               }
                           },
                           {
                               breakpoint: 1400,
                               settings: {
                                   slidesToShow: 3,
                                   itemWidth: 150,
                                   duration: 3
                               }
                           },
                       ],
                     
                  
                   });
              
                  });
                    
              }

//document.addEventListener('touchstart', onTouchStart, {passive: true});
function gliderDoAutoPlay(glider, selector, delay = 2000, repeat = true){
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

function isMobileDevice(){
    var check = false;
    (function(a){
        if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
    return check;
}

function vmRestDefault(){
    let allArrow = document.querySelectorAll(".arrow-btn");
    if( allArrow ){
        [].forEach.call(allArrow, function(el) {
            el.classList.remove("rot");
        });    
    }
    
    let allMM = document.querySelectorAll(".menu-mega");
    if( allMM ){
        [].forEach.call(allMM, function(el) {
            el.classList.remove("m-active");
        });    
    }
}

function vmRestHireDefault(){
    let allArrow = document.querySelectorAll(".hr-arrow-btn");
    if( allArrow ){
        [].forEach.call(allArrow, function(el) {
            el.classList.remove("rot");
        });
    }
    
    let allMM = document.querySelectorAll(".hr-menu-mega");
    if( allMM ){
        [].forEach.call(allMM, function(el){
            el.classList.remove("m-active");
        });
    }
}

function vmRestSubDefault(){
    let allArrow = document.querySelectorAll(".list-item .arrow-btn");
    if( allArrow ){
        [].forEach.call(allArrow, function(el) {
            el.classList.remove("rot");
        });    
    }

    let allsevenfive = document.querySelectorAll(".width-75");
    if( allsevenfive ){
        [].forEach.call(allsevenfive, function(el) {
            el.style.display = "none";
        });    
    }    
}

(function(){
    if( isMobileDevice() ){
        let deskOnly = document.querySelectorAll(".od-row");
        deskOnly.forEach(function(elm){
            elm.innerHTML = "";
        });
        document.body.classList.add('vc-is-mobile');    
        document.addEventListener('click', event => {
            const hMenu = document.getElementsByClassName("hamberger-menu")[0];
            if(event.target.classList.contains('arrow-btn')){
                if( event.target.nextElementSibling ){
                    if( event.target.classList.contains('rot') ){
                        event.target.classList.remove("rot");
                        event.target.nextElementSibling.classList.remove("m-active");
                    }else{
                        vmRestDefault();
                        event.target.classList.add("rot");
                        event.target.nextElementSibling.classList.add("m-active");    
                    }                    
                }else{
                    let inArrow = event.target.dataset.tget;
                    if( (inArrow !== "") && document.getElementById(inArrow) ){
                        if( event.target.classList.contains('rot') ){
                            event.target.classList.remove("rot");
                            document.getElementById(inArrow).style.display = "none";
                        }else{
                            vmRestSubDefault();
                            event.target.classList.add("rot");
                            document.getElementById(inArrow).style.display = "block";
                            //hMenu.style.zIndex = "0";
                        }
                    }                    
                }
            }

            if(event.target.classList.contains('hr-arrow-btn')){
                let hrLinkRow = event.target.parentElement.nextElementSibling;
                if( hrLinkRow ){
                    if( event.target.classList.contains('rot') ){
                        event.target.classList.remove("rot");
                        hrLinkRow.classList.remove("m-active");
                    }else{
                        vmRestHireDefault();
                        event.target.classList.add("rot");
                        hrLinkRow.classList.add("m-active");    
                    }
                }                
            }

            if(event.target.classList.contains('mback')){
                vmRestSubDefault();                
                //hMenu.style.zIndex = "999";
            }
        });
    }else{
        let tabs = document.getElementsByClassName("text-column");
        for (j = 0; j < tabs.length; j++) {
        tabs[j].addEventListener("mouseover", clickTab);
        }

        function clickTab(e) {
        var tabID = e.currentTarget.id;
        var inSection = e.currentTarget.getAttribute("data-section");
        var pageID = tabID.replace("a", "b");
        var pages = document.getElementById(inSection).getElementsByClassName("header-menu");
        var intabs = document.getElementById(inSection).getElementsByClassName("text-column");
        for (i = 0; i < pages.length; i++) {
        intabs[i].classList.remove("active");
        pages[i].classList.remove("active");
        }
        e.currentTarget.classList.add("active");
        let pActive = "mrow mrow-" + e.currentTarget.getAttribute("data-mrow");
        let masCol = document.getElementsByClassName(pActive).item(0);
        if (masCol) {
        masCol.classList.add("active");
        }
        var currentPage = document.querySelector("#" + pageID);
        currentPage.classList.add("active");
        }
    }
})();

// header

if(document.querySelector(".header-two")) {
var lastScrollTop = 0;    
window.addEventListener("scroll", function () {
    window.pageYOffset > 10 ? 
    document.querySelector(".header-two").classList.add("header-bg") : 
    document.querySelector(".header-two").classList.remove("header-bg");
    let scrollST = window.pageYOffset || document.documentElement.scrollTop;

    if( scrollST > lastScrollTop ){
        document.querySelector(".header-two").classList.remove("sc-up");
        document.querySelector(".header-two").classList.add("sc-down");        
    }else{
        document.querySelector(".header-two").classList.remove("sc-down");
        document.querySelector(".header-two").classList.add("sc-up");
    }
    lastScrollTop = scrollST <= 0 ? 0 : scrollST; // For Mobile or negative scrolling
});


}


document.addEventListener("DOMContentLoaded", function () {
    if(document.querySelector(".header-two")) {
    let faqContainers   = document.getElementsByClassName("hamberger-menu");
    let faqToggle       = document.getElementsByClassName("mob-nav")[0];
    for (var i = 0; i < faqContainers.length; i++) {
        faqContainers[i].addEventListener("click", function (){            
            faqToggle.classList.toggle("active");
        });
    }
    }
});


function submenu(){
    var x = document.getElementById("dropdownmwrap");
    var y = document.getElementById("dropdownmwrap1");
    if( x.style.display === "block" ){
        x.style.display = "none";
        y.style.display = "block";
    }else{
        x.style.display = "block";
        y.style.display = "none";
    }
}
function submenuback() {
    var x = document.getElementById("dropdownmwrap");
    var y = document.getElementById("dropdownmwrap1");
    x.style.display = "none";
    y.style.display = "block";
}

function innermenu(e, id){
	var sm = document.getElementById(id);
	e.classList.toggle('active');
	if (sm.style.display === "block") {
	  sm.style.display = "none";
	} else {
	  sm.style.display = "block";
  }
}
if(document.querySelector(".hamberger-menu")){
    document.querySelector('.hamberger-menu').onclick = function (e) {
    	var nav = document.querySelector('.hamberger-menu');
    	nav.classList.toggle('open-close');
        vmRestDefault();
        vmRestHireDefault();
        vmRestSubDefault();
    	e.preventDefault();
    }
}

// trial pop
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


let opFreeTrial = document.querySelector('.open-free-trial');
if( opFreeTrial !== null ){
    opFreeTrial.onclick = function (e) {
        var popbtn2 = document.querySelector('.free-trail-pop-up');
        var popbdy2 = document.querySelector('body');
        popbtn2.classList.toggle('open-pop');
        popbdy2.classList.add('body-pop');
        e.preventDefault();
    }    
}

// client slider
window.addEventListener("load", function (){
    if(document.querySelector(".client-testimonial-slider")){
    
    document.querySelector(".client-testimonial-slider .glider").addEventListener("glider-slide-visible", 
    function (event) {
    Glider(this);
    });
    var clGlider = new Glider(document.querySelector(".client-testimonial-slider .glider"), {
        slidesToShow: 3,
        slidesToScroll: 1,
        draggable: true,
        scrollLock: false,
        dots: ".client-testimonial-slider .dots",
        dragDistance: false,
        responsive: [
            { breakpoint: 320, settings: { slidesToShow: 1, slidesToScroll: 1, duration: 0.25 } },
            { breakpoint: 767, settings: { slidesToShow: 2, slidesToScroll: 1, itemWidth: 150, duration: 0.25 } },
            { breakpoint: 1024, settings: { slidesToShow: 3, slidesToScroll: 1, itemWidth: 150, duration: 0.25 } },
        ],
    });
    gliderDoAutoPlay( clGlider, ".client-testimonial-slider .glider", 5000 );
    }
});

/*
//Dual Theme Functionality removed
var mthemeBtn = document.getElementById("themeBtn");
if( mthemeBtn ){
    mthemeBtn.addEventListener("click", lightTheme);   
}
//document.getElementById("themeBtn").addEventListener("click", lightTheme);
function lightTheme() {
    var element = document.getElementById("themeAdd");
    var lightimg = document.getElementById("themeBtn");
    var darkimg = document.getElementById("themeDarkBtn");
    var autoimg = document.getElementById("themeAuto");
    element.classList.remove("auto-theme");
    element.classList.add("day");
    lightimg.classList.add("lightimg");
    darkimg.classList.remove("darkimg");
    autoimg.classList.remove("autoimg");
    localStorage.setItem("theme", "lightTheme");
    document.cookie = "theme_type=day";
}

var mthemeDarkBtn = document.getElementById("themeDarkBtn");
if( mthemeDarkBtn ){
    mthemeDarkBtn.addEventListener("click", darkTheme);    
}
function darkTheme() {
    var element = document.getElementById("themeAdd");
    var lightimg = document.getElementById("themeBtn");
    var darkimg = document.getElementById("themeDarkBtn");
    var autoimg = document.getElementById("themeAuto");
    element.classList.remove("day");
    element.classList.remove("auto-theme");
    lightimg.classList.remove("lightimg");
    darkimg.classList.add("darkimg");
    autoimg.classList.remove("autoimg");
    localStorage.setItem("theme", "darkTheme");
    document.cookie = "theme_type=null";
}

var mthemeAuto = document.getElementById("themeAuto");
if( mthemeAuto ){
    mthemeAuto.addEventListener("click", autoTheme);
}

function autoTheme() {
    var element = document.getElementById("themeAdd");
    var lightimg = document.getElementById("themeBtn");
    var darkimg = document.getElementById("themeDarkBtn");
    var autoimg = document.getElementById("themeAuto");
    element.classList.remove("day");
    element.classList.add("auto-theme");
    lightimg.classList.remove("lightimg");
    darkimg.classList.remove("darkimg");
    autoimg.classList.add("autoimg");
    document.cookie = "theme_type=auto";
}
function themeToggle() {
    let theme = localStorage.getItem("theme");
    if (theme && theme === "darkTheme") {
        darkTheme();
    } else if (theme && theme === "lightTheme") {
        lightTheme();
    }
}
themeToggle();
window.matchMedia("(prefers-color-scheme: dark)").addListener(function (e) {
    if (e.matches) {
        darkTheme();
    } else {
        lightTheme();
    }
});
*/

// input focus
function focusFunction() {
    document.getElementById("cont_name").focus();
}
// faq
var faqItem = document.getElementsByClassName("faq-accordion-item-outer");
var faqHD   = document.getElementsByClassName("faq-accordion-toggle");
for (i = 0; i < faqHD.length; i++) {
    faqHD[i].addEventListener("click", toggleFaqItem, false);
}
function toggleFaqItem(){
    if( this.parentNode.classList.contains('active') ){
        this.parentNode.className = "faq-accordion-item-outer";
        return;
    }
    //let itemClass = this.parentNode.className;
    for (i = 0; i < faqItem.length; i++) {
        faqItem[i].className = "faq-accordion-item-outer";
    }    
    if (this.parentNode.className == "faq-accordion-item-outer") {        
        this.parentNode.className = "faq-accordion-item-outer active";
    }
}
// tabs accordian
(function () {
    "use strict";
    var tabs = function (options) {
        var el = document.querySelector(options.el);
        var tabNavigationLinks = el.querySelectorAll(options.tabNavigationLinks);
        var tabContentContainers = el.querySelectorAll(options.tabContentContainers);
        var activeIndex = 0;
        var initCalled = false;
        var init = function () {
            if (!initCalled) {
                initCalled = true;
                el.classList.remove("no-js");
                for (var i = 0; i < tabNavigationLinks.length; i++) {
                    var link = tabNavigationLinks[i];
                    handleClick(link, i);
                }
            }
        };
        var handleClick = function (link, index) {
            link.addEventListener("click", function (e) {
                e.preventDefault();
                goToTab(index);
            });
        };
        var goToTab = function (index) {
            if (index !== activeIndex && index >= 0 && index <= tabNavigationLinks.length) {
                tabNavigationLinks[activeIndex].classList.remove("is-active");
                tabNavigationLinks[index].classList.add("is-active");
                tabContentContainers[activeIndex].classList.remove("is-active");
                tabContentContainers[index].classList.add("is-active");
                activeIndex = index;
            }
        };
        return { init: init, goToTab: goToTab };
    };
    window.tabs = tabs;
})();
var mTabOne = document.getElementById("tabs1");
if (mTabOne) {
    var myTabs1 = tabs({ el: "#tabs1", tabNavigationLinks: ".tab-link", tabContentContainers: ".tab-content" });
    myTabs1.init();
}
(function () {
    "use strict";
    var tabs2 = function (options) {
        var el2 = document.querySelector(options.el2);
        var tabNavigationLinks2 = el2.querySelectorAll(options.tabNavigationLinks2);
        var tabContentContainers2 = el2.querySelectorAll(options.tabContentContainers2);
        var activeIndex2 = 0;
        var initCalled2 = false;
        var init2 = function () {
            if (!initCalled2) {
                initCalled2 = true;
                el2.classList.remove("no-js");
                for (var i = 0; i < tabNavigationLinks2.length; i++) {
                    var link = tabNavigationLinks2[i];
                    handleClick(link, i);
                }
            }
        };
        var handleClick = function (link, index) {
            link.addEventListener("click", function (e) {
                e.preventDefault();
                goToTab(index);
            });
        };
        var goToTab = function (index) {
            if (index !== activeIndex2 && index >= 0 && index <= tabNavigationLinks2.length) {
                tabNavigationLinks2[activeIndex2].classList.remove("is-active");
                tabNavigationLinks2[index].classList.add("is-active");
                tabContentContainers2[activeIndex2].classList.remove("is-active");
                tabContentContainers2[index].classList.add("is-active");
                activeIndex2 = index;
            }
        };
        return { init2: init2, goToTab: goToTab };
    };
    window.tabs2 = tabs2;
})();
var mTabTwo = document.getElementById("tabs2");
if (mTabTwo) {
    var myTabs2 = tabs({ el: "#tabs2", tabNavigationLinks: ".tab-link", tabContentContainers: ".tab-content" });
    myTabs2.init();
}
/*
var mTabThree = document.getElementById("tabs3");
if (mTabThree) {
    var myTabs3 = tabs({ el: "#tabs3", tabNavigationLinks: ".tab-link", tabContentContainers: ".tab-content" });
    myTabs3.init();
}
*/

function swapTabTechnology( thisElm, nextElm ){
    document.getElementById(thisElm).classList.add("is-active");
    document.getElementById(nextElm).classList.remove("is-active");

    document.getElementById("content-"+nextElm).classList.remove("is-active");
    document.getElementById("content-"+thisElm).classList.add("is-active");

    document.getElementById("head-"+nextElm).classList.remove("is-active");
    document.getElementById("head-"+thisElm).classList.add("is-active");
}

var hasUg =  document.getElementById("has-ug");
if( hasUg ){
window.addEventListener('scroll', function(){
  var items = document.querySelectorAll("#has-ug .tab-content");
  items.forEach(function (item) {
    if( document.documentElement.scrollTop >= (item.getBoundingClientRect().top + window.scrollY - 100)  ){
      let id = item.getAttribute("id");
      let qli = document.querySelectorAll("#has-ug .tab-nav a");
      qli.forEach(function (qitem) {
        qitem.classList.remove("is-active");
      });
      document.querySelector('#has-ug .tab-nav a[href="#' + id + '"]').classList.add("is-active");
    }
  });
});
}

let hasHomeaslder = document.getElementById("hasHome-award-slider");
if( hasHomeaslder ){
window.addEventListener("load", function () {
    document.querySelector(".home-award-slider .glider").addEventListener("glider-slide-visible", function (event) {
        var glider = Glider(this);
    });
    document.querySelector(".home-award-slider .glider").addEventListener("glider-slide-hidden", function (event) {});
    document.querySelector(".home-award-slider .glider").addEventListener("glider-refresh", function (event) {});
    document.querySelector(".home-award-slider .glider").addEventListener("glider-loaded", function (event) {});
    window._ = new Glider(document.querySelector(".home-award-slider .glider"), {
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        scrollLock: false,
        dots: ".home-award-slider .dots",
        dragDistance: false,
    });

});    
}
/*
let hasservVideo = document.getElementById("has-serv-video");
if( hasservVideo ){
    document.querySelector('.second-level-section .playicon').onclick = function (e) {
        let navi = document.querySelector('.second-level-section .right-box');
        navi.classList.add('play-video');
        e.preventDefault();
    }    
}
*/

function initDefBGimage(){
    let imgDefer = document.querySelectorAll('div[data-src]');
    let style = "background-image: url({url})";
    for(var i = 0; i < imgDefer.length; i++) {
        imgDefer[i].setAttribute('style', style.replace("{url}", imgDefer[i].getAttribute('data-src')));
    }
}
window.onload = initDefBGimage;

/*Lazy Loading BG Image*/
document.addEventListener("DOMContentLoaded", 
function(){
    var lazyloadImages;    
    if("IntersectionObserver" in window){
    lazyloadImages = document.querySelectorAll(".vlazy");
    var imageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var image = entry.target;
          image.classList.remove("vlazy");
          imageObserver.unobserve(image);
        }
      });
    });

    lazyloadImages.forEach(function(image) {
      imageObserver.observe(image);
    });
    }else{
    var lazyloadThrottleTimeout;
    lazyloadImages = document.querySelectorAll(".vlazy");
    function lazyload(){
        if(lazyloadThrottleTimeout) {
            clearTimeout(lazyloadThrottleTimeout);
        }    

        lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('vlazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
        }, 20);
    }
    document.addEventListener("scroll", lazyload);
    window.addEventListener("resize", lazyload);
    window.addEventListener("orientationChange", lazyload);
    }
})

/*Remove Element - day Light Theme*/
document.addEventListener("DOMContentLoaded", 
function(){
    /*
    if( document.getElementById("themeAdd").classList.contains("day") ){
        let dtElm = document.querySelectorAll(".dark-theme-img");
        dtElm.forEach(function(elm){
            elm.remove();
        });
    }else{
        let ltElm = document.querySelectorAll(".lighter-theme-img");
        ltElm.forEach(function(elm){
            elm.remove();
        });
    }
    */
    var tsloadThrottleTimeout;
    var isLoaded    = false;
    function vcloadTeckStack(){
        if(tsloadThrottleTimeout){
            clearTimeout( tsloadThrottleTimeout );
        }
        tsloadThrottleTimeout = setTimeout(function(){
        let scrollTop   = window.pageYOffset;
        let elm         = document.getElementById('load-tech-stack');       
        if( elm ){
            if( elm.offsetTop < (window.innerHeight + scrollTop) ){
            if( isLoaded == false ){
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                if (xhr.readyState === 4){
                    let dropElm = document.getElementById('tech-stack-bx');
                    let preHtml = dropElm.innerHTML
                    dropElm.innerHTML = preHtml + xhr.responseText;
                }
                };
                var pageID = document.getElementById("themeAdd").dataset.mpid;
                if( document.body.classList.contains('page-template-hire-dotnet-developers') ){               
                    xhr.open('GET', vcObj.admin_ajax+"?action=cmn-technologies&page_id="+pageID);
                }else if( document.body.classList.contains('page-template-template-services') ){
                    xhr.open('GET', vcObj.admin_ajax+"?action=cmn-servtechstacks&page_id="+pageID);
                }else if( document.body.classList.contains('page-template-template-hirepage') ){
                    if( pageID == 8024 ){
                        xhr.open('GET', vcObj.admin_ajax+"?action=cmn-stacks&tpl="+vcObj.page_tpl);
                    }else{
                        xhr.open('GET', vcObj.admin_ajax+"?action=cmn-hiretechstacks&page_id="+pageID);    
                    }                    
                }else{
                    xhr.open('GET', vcObj.admin_ajax+"?action=cmn-stacks&tpl="+vcObj.page_tpl);
                    //Home page listings
                }                
                xhr.send();
                isLoaded =  true;
            }
            }
            if(!elm){
              document.removeEventListener("scroll", vcloadTeckStack);
              window.removeEventListener("resize", vcloadTeckStack);
              window.removeEventListener("orientationChange", vcloadTeckStack);
            }    
        }        
        }, 20);
    }
    document.addEventListener("scroll", vcloadTeckStack);
    window.addEventListener("resize", vcloadTeckStack);
    window.addEventListener("orientationChange", vcloadTeckStack);
});


document.addEventListener("DOMContentLoaded", function(){
    var gsloadThrottleTimeout;
    var gisLoaded    = false;
    function gvcloadTeckStack(){
        if(gsloadThrottleTimeout){
            clearTimeout( gsloadThrottleTimeout );
        }
        gsloadThrottleTimeout = setTimeout(function(){
        let scrollTop   = window.pageYOffset;
        let elm         = document.getElementById('glob-techstacks');       
        if( elm ){
            if( elm.offsetTop < (window.innerHeight + scrollTop) ){
            if( gisLoaded == false ){
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                if (xhr.readyState === 4){
                    let dropElm = document.getElementById('glob-tech-stack-bx');
                    let preHtml = dropElm.innerHTML
                    dropElm.innerHTML = preHtml + xhr.responseText;
                }
                };
                var gpageID = document.getElementById("themeAdd").dataset.mpid;
                xhr.open('GET', vcObj.admin_ajax+"?action=cmn-technologies265&page_id="+gpageID);
                
                xhr.send();
                gisLoaded =  true;
            }
            }
            if(!elm){
              document.removeEventListener("scroll", gvcloadTeckStack);
              window.removeEventListener("resize", gvcloadTeckStack);
              window.removeEventListener("orientationChange", gvcloadTeckStack);
            }    
        }        
        }, 20);
    }
    document.addEventListener("scroll", gvcloadTeckStack);
    window.addEventListener("resize", gvcloadTeckStack);
    window.addEventListener("orientationChange", gvcloadTeckStack);
});


window.addEventListener("load", function () {
    let hasTpa = document.getElementById("has-tpa");
    if( hasTpa ){
        hasTpa.nextElementSibling.classList.add("default-light");
    }
});

let hasDelProcessCol = document.getElementById("col-delivery-process");
if( hasDelProcessCol ){
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
}




let hasServBslider = document.getElementById("tpl-services-slider");
if( hasServBslider ){
    window.addEventListener("load", function () {
        new Glider(document.querySelector(".service-banner-client .glider"), {
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        scrollLock: false,
        dots: ".service-banner-client .dots",
        dragDistance: false,
        });    
    }); 
}
   

var faqHD       = document.getElementsByClassName("accordion-toggle");
if( faqHD.length > 0 ){
    for (i = 0; i < faqHD.length; i++){
      faqHD[i].addEventListener("click", dataAccordionItem, false);
    }    
    function dataAccordionItem(){
        let tempElmId = this.parentNode.closest(".accordion-section");
        console.log("bingooo");
        if( tempElmId.id ){
            var accorItem   = document.getElementById(tempElmId.id).getElementsByClassName("accordionItem");    
        }else{
            var accorItem   = document.getElementsByClassName("accordionItem");
        }
        if( this.parentNode.classList.contains('active') ){
            //this.parentNode.className = "accordionItem";
            return;
        }
        //let itemClass = this.parentNode.className;
        for (i = 0; i < accorItem.length; i++ ){
            accorItem[i].className = "accordionItem";
        }    
        if( this.parentNode.className == "accordionItem" ){        
            this.parentNode.className = "accordionItem active";
        }
    }
}


function playTetiVideo( iframeID, vsource, e){
    let allArrow = document.querySelectorAll(".yt-player");
    if( allArrow ){
        [].forEach.call(allArrow, function(el) {
            el.style.display = "none";
            el.setAttribute("src", "");
        });    
    }

    let cVideo = document.querySelectorAll(".client-videos");
    if( cVideo ){
        [].forEach.call(cVideo, function(el) {
            el.classList.remove = "active";
        });    
    }
    let thisCol = document.getElementById("cvbox-"+iframeID);
    thisCol.classList.add = "active";
    
    let thisFrame = document.getElementById("ytiframe-"+iframeID);
    thisFrame.style.display = "block";
    thisFrame.setAttribute("src", vsource);   
}

/*Accordian Section Dynamic Height*/
let acc_row = document.querySelectorAll('.accordion-section .col-left');
if( acc_row ){
    [].forEach.call(acc_row, function(elms){
        let elmHead     = elms.querySelector('.head-txt');
        if( elmHead ){
            let hdiff = (elms.clientHeight - elmHead.clientHeight);
            let iWrap = elms.querySelector('.image-wrap');
            if( iWrap ){
            iWrap.style.height = hdiff+"px";            
            }
        }
    });
}

const hasMarqeecomp = document.getElementById("marquee-comp");
if( hasMarqeecomp ){
new Glide('.glide', {
type: 'carousel',
autoplay: 1,
animationDuration: 15000,
animationTimingFunc: 'linear',
perView: 1 }).mount();    
}

var $window = window, buyerGiude = document.getElementById("trial-section");
if(buyerGiude){
var stickybuyers = document.getElementById("trial-question"),
buyersAns = document.getElementById("trial-answer-part");
window.addEventListener("scroll", function (){
    if (screen.width > 991) {
        var e = buyersAns.getBoundingClientRect().top + window.scrollY;
        document.documentElement.scrollTop > e - 10 ? stickybuyers.classList.add("sticky") : stickybuyers.classList.remove("sticky");
        var t = buyersAns.offsetHeight;
        t += parseInt(window.getComputedStyle(buyersAns).getPropertyValue("margin-top"));
        var n = e + (t += parseInt(window.getComputedStyle(buyersAns).getPropertyValue("margin-bottom")));
        document.documentElement.scrollTop + (stickybuyers.offsetHeight + 20) > n ? stickybuyers.classList.add("btomfixed") : stickybuyers.classList.remove("btomfixed");
    } else stickybuyers.classList.remove("sticky"), stickybuyers.classList.remove("btomfixed");
});

window.addEventListener("scroll", function () {
    document.querySelectorAll(".trial-answer").forEach(function (e) {
        if (document.documentElement.scrollTop >= e.getBoundingClientRect().top + window.scrollY - 100) {
            let t = e.getAttribute("id");
            document.querySelectorAll(".question-list li a").forEach(function (e) {
                e.classList.remove("active");
            }),
            document.querySelector('.question-list li a[href="#' + t + '"]').classList.add("active");
        }
    });
});

}



var ft_faqItem = document.getElementsByClassName("trial-accordion-item-outer");
var ft_faqHD   = document.getElementsByClassName("trial-accordion-toggle");
for (i = 0; i < ft_faqHD.length; i++) {
ft_faqHD[i].addEventListener("click", ft_toggleFaqItem, false);
}
function ft_toggleFaqItem(){
if( this.parentNode.classList.contains('active') ){
  this.parentNode.className = "trial-accordion-item-outer";
  return;
}
//let itemClass = this.parentNode.className;
for (i = 0; i < ft_faqItem.length; i++) {
  ft_faqItem[i].className = "trial-accordion-item-outer";
}    
if (this.parentNode.className == "trial-accordion-item-outer") {        
  this.parentNode.className = "trial-accordion-item-outer active";
}
}

/*home Page version 4.0 req JS*/
function playTetiVideoV4( iframeID, vsource, e){
    let thisFrame   = document.getElementById(iframeID);
    let ytPop       = document.getElementById("yt-player-pop");
    ytPop.style.display = "block";
    thisFrame.setAttribute("src", vsource);
    thisFrame.style.display = "block";       
}

function closeYT_video(){
    let ytPop       = document.getElementById("yt-player-pop");
    let thisFrame   = document.getElementById("cmn-ytplayer");
    ytPop.style.display = "none";
    thisFrame.setAttribute("src", "");
    thisFrame.style.display = "none";
}

if( document.getElementById("home-tpl-logoslide") ){
new Glide('.logoslide', {type: 'carousel', autoplay: 1, animationDuration: 10000, animationTimingFunc: 'linear', perView: 1 }).mount();    
}

if( document.getElementById("ht-testlider") ){
const testGlide = new Glide("#ht-testlider",{
    type: "carousel", 
    autoplay: 5000, 
    animationDuration: 300, 
    hoverpause: false, 
    gap: 0
    }).mount();
}

if( document.getElementById("htpl-glider") ){
window.addEventListener("load", function() {
document.querySelector(".industry-slider .glider").addEventListener("glider-slide-visible",
function(event) {
var glider = Glider(this);
});
const indGLider = new Glider(document.querySelector(".industry-slider .glider"), {
    slidesToShow: 4,
    slidesToScroll: 1,
    draggable: true,
    scrollLock: false,
    dots: ".industry-slider .dots",
    dragDistance: false,
    arrows: {
    prev: '.glider-prev',
    next: '.glider-next'
    },
    responsive: [{
            breakpoint: 320,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                duration: 2.25
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 2.25
            }
        },
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 2.25
            }
        },
        {
            breakpoint: 1400,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 2.25
            }
        },
    ],


});

document.querySelector('.glider').addEventListener('glider-slide-visible', function(event){
  var imgs_to_anticipate = 3;
  var glider = Glider(this);
  //var slides = glider.slides;
  // for(var i = 0; i < slides.length; i++) {
  //     let sthis = slides[i];
  //     if( sthis.classList.contains('active') ){
  //     let activeSlide = sthis.getAttribute("data-img-hover");
  //     document.querySelector(".bannerIMG").setAttribute("src", activeSlide);
  //     }
  //}
  let activeSlide = glider.slides[glider.slide].getAttribute("data-img-hover");
  document.querySelector(".bannerIMG").setAttribute("src", activeSlide)
});

});

const titleBoxes    = document.querySelectorAll(".ind-box");
const bannerImg     = document.querySelector(".bannerIMG");

titleBoxes.forEach((box) =>{
    box.addEventListener("mouseover", () => {
        const imgPath = box.getAttribute("data-img-hover");
        console.log( imgPath );
        bannerImg.setAttribute("src", imgPath);
    });
    /*
    box.addEventListener("mouseout", () => {
        const lastHoverImg = box.getAttribute("src");
        bannerImg.setAttribute("src", lastHoverImg);
        box.removeChild(box.lastChild);
    });
    */

});
}

function hireTbl_showMore(e){
    e.classList.toggle('active');
    if (e.innerHTML === 'View More'){ 
        e.innerHTML = 'View Less';
    }else{
        e.innerHTML = 'View More';
    }
    document.getElementById("vhire-tbl-elm").classList.toggle('show-all');
}


/* Intent Popup */
const CookieService = {
    setCookie(name, value, days) {
        let expires = '';
        if(days){
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = '; expires=' + date.toUTCString();
        }
        document.cookie = name + '=' + (value || '')  + expires + ';';
    },

    getCookie(name){
        const cookies = document.cookie.split(';');
        for (const cookie of cookies) {
            if (cookie.indexOf(name + '=') > -1) {
                return cookie.split('=')[1];
            }
        }
        return null;
    }
};

const exit = e => {
    const shouldExit =
        [...e.target.classList].includes('exit-intent-popup') || // user clicks on mask
        e.target.className === 'close' || // user clicks on the close icon
        e.keyCode === 27; // user hits escape

    if (shouldExit) {
        document.querySelector('.exit-intent-popup').classList.remove('visible');
    }
};
const mouseEvent = e => {
    const shouldShowExitIntent = 
        !e.toElement && 
        !e.relatedTarget &&
        e.clientY < 10;

    if (shouldShowExitIntent){
        document.removeEventListener('mouseout', mouseEvent);
        document.querySelector('.exit-intent-popup').classList.add('visible');
        CookieService.setCookie('exitIntentShown', true, 30);
    }
}

var intPopupElm = document.getElementById("intentPopup");
if( intPopupElm ){
    if (!CookieService.getCookie('exitIntentShown')) {
        setTimeout(() => {
            document.addEventListener('mouseout', mouseEvent);
            document.addEventListener('keydown', exit);
            document.querySelector('.exit-intent-popup').addEventListener('click', exit);
        }, 0);
    }    
}

function closeIntPopUp(elm, subFld = false){
  let divTarget   = document.getElementById(elm);
  divTarget.classList.remove('visible');
  if( subFld === true ){
    document.getElementById('myBtn2').click();
  }
}

//Service New Version script Start From Here

var tabMC       = document.querySelectorAll("#service-tabs .tablist");
                  var tabPanesMc  = document.getElementsByClassName("tab-contents");
                  function activateTabFx(e){
                  e.preventDefault();  
                  tabMC.forEach(function(label, index){
                   label.classList.remove("active");
                  });
                  
                  [].forEach.call(tabPanesMc, function(pane, index){
                   pane.classList.remove("active");
                  }); 
                  
                  if( e.target === this || this.contains(e.target)){
                   var clickedTab = this.getAttribute("data-tab");
                   this.classList.add("active");
                   document.querySelector(clickedTab).classList.add("active");
                  }    
                  }
                  
                  tabMC.forEach(function(label, index){
                  label.addEventListener("click", activateTabFx);
                  }); 




                  const sdMethod = document.getElementById("sd-metho");
if( sdMethod ){
    const cards = document.querySelectorAll('.card');  
    cards.forEach((card) => {
        card.addEventListener('mouseover', () => {
        if (!card.hasAttribute('active')) {
            updateActiveCard(card);
        }
        });
    });

    function updateActiveCard(activeCard) {
        cards.forEach((card) => {
        if (card === activeCard) {
        card.setAttribute('active', '');
        } else {
        card.removeAttribute('active');
        }
        })
    }    
}
const cardsDM = document.querySelectorAll('.card');
if( cardsDM ){
    [...cardsDM].forEach((card)=>{
    card.addEventListener( 'click', function() {
     card.classList.toggle('is-flipped');
    });
    });    
}
