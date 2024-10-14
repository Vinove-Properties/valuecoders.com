
//Menu Script Start//
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

function vmRestSerDefault(){
    let allArrow = document.querySelectorAll(".ser-arrow-btn");
    if( allArrow ){
        [].forEach.call(allArrow, function(el) {
            el.classList.remove("rot");
        });
    }
    
    let allMM = document.querySelectorAll(".sub-service");
    if( allMM ){
        [].forEach.call(allMM, function(el){
            el.classList.remove("m-active");
        });
    }
}

function vmRestTechDefault(){
    let allArrow = document.querySelectorAll(".tech-arrow-btn");
    if( allArrow ){
        [].forEach.call(allArrow, function(el) {
            el.classList.remove("rot");
        });
    }
    
    let allMM = document.querySelectorAll(".sub-tech");
    if( allMM ){
        [].forEach.call(allMM, function(el){
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
    
    let allMM = document.querySelectorAll(".hr-submenu");
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

            if(event.target.classList.contains('ser-arrow-btn')){
                let serLinkRow = event.target.parentElement.nextElementSibling;
                if( serLinkRow ){
                    if( event.target.classList.contains('rot') ){
                        event.target.classList.remove("rot");
                        serLinkRow.classList.remove("m-active");
                    }else{
                        vmRestSerDefault();
                        event.target.classList.add("rot");
                        serLinkRow.classList.add("m-active");    
                    }
                }                
            }



            if(event.target.classList.contains('tech-arrow-btn')){
                let techLinkRow = event.target.parentElement.nextElementSibling;
                if( techLinkRow ){
                    if( event.target.classList.contains('rot') ){
                        event.target.classList.remove("rot");
                        techLinkRow.classList.remove("m-active");
                    }else{
                        vmRestTechDefault();
                        event.target.classList.add("rot");
                        techLinkRow.classList.add("m-active");    
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
        vmRestSerDefault();
        vmRestSubDefault();
    	e.preventDefault();
    }
}


function isMobileDevice(){ 
    const userAgent = navigator.userAgent || navigator.vendor || window.opera;
    const regex = /Mobi|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i;
    if (/iPad|Macintosh/i.test(userAgent) && 'ontouchend' in document) { 
        console.log("iPad");
        return true;
    }
    return regex.test(navigator.userAgent);
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

(function() {
    "use strict";

    // Tabs component function
    var tabsComponent = function(options) {
        var container = document.querySelector(options.el), // Select the main container
            tabLinks = container.querySelectorAll(options.tabNavigationLinks), // Select all tab navigation links
            tabContents = container.querySelectorAll(options.tabContentContainers), // Select all tab content containers
            currentIndex = 0, // Initialize to the first tab
            initialized = false, // Flag to check if the component has been initialized

            // Function to handle mouseover event on tabs
            addHoverEvent = function(tabLink, index) {
                if (!isMobileDevice()) { // If not a mobile device, add the hover event
                    tabLink.addEventListener("mouseover", function(event) {
                        event.preventDefault(); // Prevent default behavior
                        switchTab(index); // Switch to the tab on hover
                    });
                }
            },

            // Function to switch to a different tab
            switchTab = function(index) {
                if (index !== currentIndex && index >= 0 && index < tabLinks.length) {
                    // Remove the active class from the current tab and its content
                    tabLinks[currentIndex].classList.remove("is-active");
                    tabContents[currentIndex].classList.remove("is-active");

                    // Add the active class to the new tab and its content
                    tabLinks[index].classList.add("is-active");
                    tabContents[index].classList.add("is-active");

                    // Update the currentIndex to the new tab
                    currentIndex = index;
                }
            };

        // Return an object with init and goToTab methods
        return {
            init: function() {
                if (!initialized) { // If not already initialized
                    initialized = true; // Set the initialized flag
                    container.classList.remove("no-js"); // Remove the no-js class from the container

                    // Find the initially active tab and set currentIndex
                    for (var i = 0; i < tabLinks.length; i++) {
                        if (tabLinks[i].classList.contains("is-active")) {
                            currentIndex = i; // Set the current index to the active tab
                        }
                        addHoverEvent(tabLinks[i], i); // Add hover events to all tab links
                    }
                }
            },
            goToTab: switchTab, // Public method to switch tabs
        };
    };

    // Attach the tabs component to the global window object
    window.tabs = tabsComponent;
})();


const menuElm = ["menu-serv", "mnu-sol", "menu-inds", "mnu-tech", "mnu-hire"];
menuElm.forEach(function(elm){
  if(document.getElementById(elm)){
    var e = tabs({el:"#"+elm, tabNavigationLinks:".tab-link",tabContentContainers:".tab-content"});
    e.init();
  }
});



/*Menu Active COde */
const menuItemElm   = document.querySelectorAll('.menu-item-has-children');
const anchorsLnk    = document.querySelectorAll('a.mst-link');
function addClass() {
    anchorsLnk.forEach(anchor => anchor.classList.remove('active'));
    this.classList.add('active');
}

function removeActiveClass() {
    setTimeout(() => {
    if(!document.querySelector('.menu-item-has-children:hover')){
        anchorsLnk.forEach(anchor => anchor.classList.remove('active'));
    }
    }, 100);
}
if( anchorsLnk ){
    anchorsLnk.forEach(anchor => {
        anchor.addEventListener('mouseover', addClass);    
    });    
}

if( menuItemElm ){
    menuItemElm.forEach(item => {
        item.addEventListener('mouseleave', removeActiveClass);
    });
}


//Menu Script Ends//