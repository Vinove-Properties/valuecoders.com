
// header
window.addEventListener("scroll", function () {
    window.pageYOffset > 10 ? document.querySelector(".header-two").classList.add("header-bg") : document.querySelector(".header-two").classList.remove("header-bg");
});
// menu
var tabs = document.getElementsByClassName("text-column");
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
document.addEventListener("DOMContentLoaded", function () {
    var faqContainers = document.getElementsByClassName("hamberger-menu");
    var faqToggle = document.getElementsByClassName("mob-nav")[0];
    for (var i = 0; i < faqContainers.length; i++) {
        faqContainers[i].addEventListener("click", function () {
            faqToggle.classList.toggle("active");
        });
    }
});


function submenu() {
    var x = document.getElementById("dropdownmwrap");
    var y = document.getElementById("dropdownmwrap1");
    if (x.style.display === "block") {
        x.style.display = "none";
        y.style.display = "block";
    } else {
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
document.querySelector('.hamberger-menu').onclick = function (e) {
	var nav = document.querySelector('.hamberger-menu');
	nav.classList.toggle('open-close');
	e.preventDefault();
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
window.addEventListener("load", function () {
    document.querySelector(".client-testimonial-slider .glider").addEventListener("glider-slide-visible", function (event) {
        var glider = Glider(this);
    });
    document.querySelector(".client-testimonial-slider .glider").addEventListener("glider-slide-hidden", function (event) {});
    document.querySelector(".client-testimonial-slider .glider").addEventListener("glider-refresh", function (event) {});
    document.querySelector(".client-testimonial-slider .glider").addEventListener("glider-loaded", function (event) {});
    window._ = new Glider(document.querySelector(".client-testimonial-slider .glider"), {
        slidesToShow: 3,
        slidesToScroll: 3,
        draggable: false,
        scrollLock: false,
        dots: "false",
        dragDistance: false,
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
          },
        responsive: [
            { breakpoint: 320, settings: { slidesToShow: 1, slidesToScroll: 1, duration: 0.25 } },
            { breakpoint: 767, settings: { slidesToShow: 2, slidesToScroll: 2, itemWidth: 150, duration: 0.25 } },
            { breakpoint: 1024, settings: { slidesToShow: 3, slidesToScroll: 3, itemWidth: 150, duration: 0.25 } },
        ],
    });

});

// change theme
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
function toggleFaqItem() {
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

// tabs accordian 3
(function () {
    "use strict";
    var tabs3 = function (options) {
        var el3 = document.querySelector(options.el3);
        var tabNavigationLinks3 = el3.querySelectorAll(options.tabNavigationLinks3);
        var tabContentContainers3 = el3.querySelectorAll(options.tabContentContainers3);
        var activeIndex3 = 0;
        var initCalled3 = false;
        var init3 = function () {
            if (!initCalled3) {
                initCalled3 = true;
                el3.classList.remove("no-js");
                for (var i = 0; i < tabNavigationLinks3.length; i++) {
                    var link = tabNavigationLinks3[i];
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
            if (index !== activeIndex3 && index >= 0 && index <= tabNavigationLinks3.length) {
                tabNavigationLinks3[activeIndex3].classList.remove("is-active");
                tabNavigationLinks3[index].classList.add("is-active");
                tabContentContainers3[activeIndex3].classList.remove("is-active");
                tabContentContainers3[index].classList.add("is-active");
                activeIndex3 = index;
            }
        };
        return { init3: init3, goToTab: goToTab };
    };
    window.tabs3 = tabs3;
})();
var mTabThree = document.getElementById("tabs3");
if (mTabThree) {
    var myTabs3 = tabs({ el: "#tabs3", tabNavigationLinks: ".tab-link", tabContentContainers: ".tab-content" });
    myTabs3.init();
}

// has-ug
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

// home award slider
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

// play video
document.querySelector('.second-level-section .playicon').onclick = function (e) {
	let navi = document.querySelector('.second-level-section .right-box');
	navi.classList.add('play-video');
	e.preventDefault();
}


