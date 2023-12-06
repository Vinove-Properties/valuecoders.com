//   header scroll
window.addEventListener('scroll', function() {
    window.pageYOffset>10?document.querySelector(".header").classList.add("header-bg"):document.querySelector(".header").classList.remove("header-bg");
});

// menu
const menu = document.querySelector('.menu');
const menuSection = menu.querySelector('.menu-section');
const menuArrow = menu.querySelector('.menu-mobile-arrow');
const menuClosed = menu.querySelector('.menu-mobile-close');
const menuToggle = document.querySelector('.menu-mobile-toggle');
const menuOverlay = document.querySelector('.overlay');
let subMenu;

if( menuSection ){
	menuSection.addEventListener('click', (e) => {
		if (!menu.classList.contains('active')) {
			return;
		}
		if (e.target.closest('.menu-item-has-children')) {
			const hasChildren = e.target.closest('.menu-item-has-children');
			showSubMenu(hasChildren);
		}
	});
}

if( menuArrow ){
	menuArrow.addEventListener('click', () => {
		hideSubMenu();
	});	
}

if( menuToggle ){
	menuToggle.addEventListener('click', () => {
		toggleMenu();
	});	
}

if( menuClosed ){
	menuClosed.addEventListener('click', () => {
		toggleMenu();
	});	
}

if( menuOverlay ){
	menuOverlay.addEventListener('click', () => {
		toggleMenu();
	});	
}

// Show & Hide Toggle Menu Function
function toggleMenu() {
	menu.classList.toggle('active');
	menuOverlay.classList.toggle('active');
}
// Show the Mobile Side Menu Function
function showSubMenu(hasChildren) {
	subMenu = hasChildren.querySelector('.menu-subs');
	subMenu.classList.add('active');
	subMenu.style.animation = 'slideLeft 0.5s ease forwards';
	const menuTitle = hasChildren.querySelector('i').parentNode.childNodes[0].textContent;
	menu.querySelector('.menu-mobile-title').innerHTML = menuTitle;
	menu.querySelector('.menu-mobile-header').classList.add('active');
}
// Hide the Mobile Side Menu Function
function hideSubMenu() {
	subMenu.style.animation = 'slideRight 0.5s ease forwards';
	setTimeout(() => {
		subMenu.classList.remove('active');
	}, 300);

	menu.querySelector('.menu-mobile-title').innerHTML = '';
	menu.querySelector('.menu-mobile-header').classList.remove('active');
}
// Windows Screen Resizes Function
window.onresize = function () {
	if (this.innerWidth > 991) {
		if (menu.classList.contains('active')) {
			toggleMenu();
		}
	}
};

// Client Testimonial
window.addEventListener('load',function(){
	document.querySelector('.client-testimonial-slider .glider').addEventListener('glider-slide-visible', function(event){
		var glider = Glider(this);
	});
	document.querySelector('.client-testimonial-slider .glider').addEventListener('glider-slide-hidden', function(event){
	});
	document.querySelector('.client-testimonial-slider .glider').addEventListener('glider-refresh', function(event){
	});
	document.querySelector('.client-testimonial-slider .glider').addEventListener('glider-loaded', function(event){
	});

	window._ = new Glider(document.querySelector('.client-testimonial-slider .glider'), {
		slidesToShow: 3,
		slidesToScroll: 1,
		draggable: false,
		dots: '.dots',
		dragDistance: false,
		responsive: [
			{
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
			},{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				itemWidth: 150,
				duration: 0.25
			  }
			}
		  ]
	});
});

// Day Night Theme
document.getElementById("themeBtn").addEventListener("click", lightTheme);
function lightTheme() {
   var element = document.getElementById("themeAdd");
   element.classList.remove("auto-theme");
   element.classList.add("day");
   localStorage.setItem("theme", "lightTheme");
   document.cookie = "theme_type=day";
}

document.getElementById("themeDarkBtn").addEventListener("click", darkTheme);
function darkTheme() {
   var element = document.getElementById("themeAdd");
   element.classList.remove("day");
   element.classList.remove("auto-theme");
   localStorage.setItem("theme", "darkTheme");
   document.cookie = "theme_type=null"
}

document.getElementById("themeAuto").addEventListener("click", autoTheme);
function autoTheme() {
   var element = document.getElementById("themeAdd");
   element.classList.remove("day");
   element.classList.add("auto-theme");
   document.cookie = "theme_type=auto";
}
//////////////themeToggle//////////////////
function themeToggle() {
	let theme = localStorage.getItem("theme");
	if (theme && theme === "darkTheme") {
		darkTheme();
	}
	else if (theme && theme === "lightTheme") {
		lightTheme();
	}
	
  
	//document.getElementById("theme").textContent = localStorage.getItem("theme");
  }
  themeToggle();

window.matchMedia('(prefers-color-scheme: dark)').addListener(function (e) {
	if(e.matches){
		darkTheme();
	}else{
		lightTheme();
	}
});
  ////////////////////////////////////////////
// Focus Input
function focusFunction() {
	document.getElementById("cont_name").focus();
}

// faq accordian
var faqItem = document.getElementsByClassName('faq-accordion-item-outer');
var faqHD = document.getElementsByClassName('faq-accordion-toggle');
for (i = 0; i < faqHD.length; i++) {
	faqHD[i].addEventListener('click', toggleFaqItem, false);
}
function toggleFaqItem() {
	var itemClass = this.parentNode.className;
	for (i = 0; i < faqItem.length; i++) {
		faqItem[i].className = 'faq-accordion-item-outer';
	}
	if (itemClass == 'faq-accordion-item-outer') {
		this.parentNode.className = 'faq-accordion-item-outer active';
	}
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

  var myTabs2 = tabs({
	el: '#tabs2',
	tabNavigationLinks: '.tab-link',
	tabContentContainers: '.tab-content'
  });
  myTabs2.init();
