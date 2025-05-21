////Glider section 
var gliderCase = document.getElementsByClassName("work-glider");
//gliderCase &&
if( gliderCase.length > 0 ){
  window.addEventListener("load", function () {
    new Glider(document.querySelector(".work-glider"), { slidesToShow: 1, dots: ".dots2", draggable: !3, itemWidth: 100, duration: 1, arrows: { prev: ".glider-prev", next: ".glider-next" } });
  });  
}


var gliderPress = document.getElementsByClassName("press-glider");
//gliderPress &&
if( gliderPress.length > 0 ){
window.addEventListener("load", function () {
    new Glider(document.querySelector(".press-glider"), { slidesToShow: 1, dots: ".dots", draggable: !3, itemWidth: 100, duration: 1, arrows: { prev: ".glider-prev", next: ".glider-next" } });
});
}
//Sticky Section


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

	const elmCaseAns = document.querySelectorAll(".case-answer");
	if (elmCaseAns.length > 0) {
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
  if( document.getElementById('tabs1') ){
    var myTabs1 = tabs({
    el: '#tabs1',
    tabNavigationLinks: '.tab-link',
    tabContentContainers: '.tab-content'
    });
    myTabs1.init();  
  }
  

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

  if( document.getElementById('tabs2') ){
  var myTabs2 = tabs2({
  el2: '#tabs2',
  tabNavigationLinks2: '.tab-link',
  tabContentContainers2: '.tab-content'
  });
  myTabs2.init2();    
  }
  



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



 
  





  



