////Glider section 
var gliderCase = document.getElementsByClassName("work-glider");
		gliderCase &&
				window.addEventListener("load", function () {
					new Glider(document.querySelector(".work-glider"), { slidesToShow: 1, dots: ".dots2", draggable: !3, itemWidth: 100, duration: 1, arrows: { prev: ".glider-prev", next: ".glider-next" } });
				});

var gliderPress = document.getElementsByClassName("press-glider");
gliderPress &&
        window.addEventListener("load", function () {
            new Glider(document.querySelector(".press-glider"), { slidesToShow: 1, dots: ".dots", draggable: !3, itemWidth: 100, duration: 1, arrows: { prev: ".glider-prev", next: ".glider-next" } });
        });




//Sticky Section

window.addEventListener("scroll", function () {
    document.querySelectorAll(".case-answer").forEach(function (e) {
        if (document.documentElement.scrollTop >= e.getBoundingClientRect().top + window.scrollY - 100) {
            let t = e.getAttribute("id");
            document.querySelectorAll(".question-list li a").forEach(function (e) {
                e.classList.remove("active");
            }),
                document.querySelector('.question-list li a[href="#' + t + '"]').classList.add("active");
        }
    });
});

var $window = window,
buyerGiude = document.getElementById("case-study");
if (buyerGiude) {
var stickybuyers = document.getElementById("case-question"),
	buyersAns = document.getElementById("case-answer-part");
window.addEventListener("scroll", function () {
	if (screen.width > 991) {
		var e = buyersAns.getBoundingClientRect().top + window.scrollY;
		document.documentElement.scrollTop > e - 10 ? stickybuyers.classList.add("sticky") : stickybuyers.classList.remove("sticky");
		var t = buyersAns.offsetHeight;
		t += parseInt(window.getComputedStyle(buyersAns).getPropertyValue("margin-top"));
		var n = e + (t += parseInt(window.getComputedStyle(buyersAns).getPropertyValue("margin-bottom")));
		document.documentElement.scrollTop + (stickybuyers.offsetHeight + 20) > n ? stickybuyers.classList.add("btomfixed") : stickybuyers.classList.remove("btomfixed");
	} else stickybuyers.classList.remove("sticky"), stickybuyers.classList.remove("btomfixed");
});
}


// for header menu
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
      [].forEach.call(allMM, function(el) {
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
                          hMenu.style.zIndex = "0";
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
              hMenu.style.zIndex = "999";
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
      faqContainers[i].addEventListener("click", function () {
          faqToggle.classList.toggle("active");
      });
  }
  }
});

if(document.querySelector(".hamberger-menu")){
  document.querySelector('.hamberger-menu').onclick = function (e) {
      var nav = document.querySelector('.hamberger-menu');
      nav.classList.toggle('open-close');
      vmRestDefault();
      vmRestHireDefault();
      e.preventDefault();
  }
}



// Focus Input
function focusFunction() {
	document.getElementById("focusInput").focus();
}

// Start tab 1
(function() {
	'use strict';
	var tabs = function(options) {
	  var el = document.querySelector(options.el);
	  var tabNavigationLinks = el.querySelectorAll(options.tabNavigationLinks);
	  var tabContentContainers = el.querySelectorAll(options.tabContentContainers);
	  var activeIndex = 0;
	  var initCalled = false;
	  var init = function() {
		if (!initCalled) {
		  initCalled = true;
		  el.classList.remove('no-js');
		  for (var i = 0; i < tabNavigationLinks.length; i++) {
			var link = tabNavigationLinks[i];
			handleClick(link, i);
		  }
		}
	  };
	  var handleClick = function(link, index) {
		link.addEventListener('click', function(e) {
		  e.preventDefault();
		  goToTab(index);
		});
	  };
	  var goToTab = function(index) {
		if (index !== activeIndex && index >= 0 && index <= tabNavigationLinks.length) {
		  tabNavigationLinks[activeIndex].classList.remove('is-active');
		  tabNavigationLinks[index].classList.add('is-active');
		  tabContentContainers[activeIndex].classList.remove('is-active');
		  tabContentContainers[index].classList.add('is-active');
		  activeIndex = index;
		}
	  };
	  return {
		init: init,
		goToTab: goToTab
	  };
  
	};
	window.tabs = tabs;
  })();
  var myTabs1 = tabs({
	el: '#tabs1',
	tabNavigationLinks: '.tab-link',
	tabContentContainers: '.tab-content'
  });
  myTabs1.init();

//  Start tab 2
(function() {
	'use strict';
	var tabs2 = function(options) {
	  var el2 = document.querySelector(options.el2);
	  var tabNavigationLinks2 = el2.querySelectorAll(options.tabNavigationLinks2);
	  var tabContentContainers2 = el2.querySelectorAll(options.tabContentContainers2);
	  var activeIndex2 = 0;
	  var initCalled2 = false;
	  var init2 = function() {
		if (!initCalled2) {
		  initCalled2 = true;
		  el2.classList.remove('no-js');
		  for (var i = 0; i < tabNavigationLinks2.length; i++) {
			var link = tabNavigationLinks2[i];
			handleClick(link, i);
		  }
		}
	  };
	  var handleClick = function(link, index) {
		link.addEventListener('click', function(e) {
		  e.preventDefault();
		  goToTab(index);
		});
	  };
	  var goToTab = function(index) {
		if (index !== activeIndex2 && index >= 0 && index <= tabNavigationLinks2.length) {
		  tabNavigationLinks2[activeIndex2].classList.remove('is-active');
		  tabNavigationLinks2[index].classList.add('is-active');
		  tabContentContainers2[activeIndex2].classList.remove('is-active');
		  tabContentContainers2[index].classList.add('is-active');
		  activeIndex2 = index;
		}
	  };
	  return {
		init2: init2,
		goToTab: goToTab
	  };
  
	};
	window.tabs2 = tabs2;
  })();
  var myTabs2 = tabs2({
	el2: '#tabs2',
	tabNavigationLinks2: '.tab-link',
	tabContentContainers2: '.tab-content'
  });
  myTabs2.init2();



  //Star rating

  function changerate(starno){
  var starthover = document.getElementById("starthover");
  starthover.classList.remove("one");
  starthover.classList.remove("two");
  starthover.classList.remove("three");
  starthover.classList.remove("four");
  starthover.classList.remove("five");
  starthover.classList.add(starno);

}
function ratenow(){
    var x = document.getElementById("star");
    var y = document.getElementById("rated");

 if (x.style.display === "block") {
   x.style.display = "none";
   y.style.display = "block";
   document.getElementById('ratebtn').innerHTML = 'Rate Us';
 } else {
  document.getElementById('ratebtn').innerHTML = 'Click to rate';
  
   x.style.display = "block";
   y.style.display = "none";
 }
}

//Preload image



 
  





  



