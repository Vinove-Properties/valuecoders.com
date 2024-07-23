window.addEventListener("load", function(){
document.querySelector(".customer-testimonial-slider .glider").addEventListener("glider-slide-visible",
function(event) {
var glider = Glider(this);
});
window._ = new Glider(document.querySelector(".customer-testimonial-slider .glider"), {
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
    ],


});

});

/*var tabLabels       = document.querySelectorAll("#tabs li a");
var tabPanes        = document.getElementsByClassName("tab-contents");
var currentIndex    = 0;
var tabCount        = tabLabels.length;
function activateTab(e) {
    e.preventDefault();
    tabLabels.forEach(function(label) {
      label.parentNode.classList.remove("active");
    });
    Array.from(tabPanes).forEach(function(pane) {
      pane.classList.remove("active");
    });    
    var clickedTab = e.currentTarget.getAttribute("href");
    e.currentTarget.parentNode.classList.add("active");
    document.querySelector(clickedTab).classList.add("active");
}

tabLabels.forEach(function(label) {
    label.addEventListener("click", activateTab);
});

function autoTab(){
    currentIndex = (currentIndex + 1) % tabCount; // Move to the next tab, and loop back to the start
    var nextTab = tabLabels[currentIndex];
    var event = new Event('click');
    nextTab.dispatchEvent(event);
}

// Start auto tabbing every 5 seconds
setInterval(autoTab, 5000);*/

var tabLabels = document.querySelectorAll("#tabs li a");
var tabPanes = document.getElementsByClassName("tab-contents");
var currentIndex = 0;
var tabCount = tabLabels.length;
var autoTabInterval;

function activateTab(e) {
    e.preventDefault();
    tabLabels.forEach(function(label) {
        label.parentNode.classList.remove("active");
    });
    Array.from(tabPanes).forEach(function(pane) {
        pane.classList.remove("active");
    });
    var clickedTab = e.currentTarget.getAttribute("href");
    e.currentTarget.parentNode.classList.add("active");
    document.querySelector(clickedTab).classList.add("active");
    currentIndex = Array.from(tabLabels).indexOf(e.currentTarget);
    resetAutoTab();
}

tabLabels.forEach(function(label) {
    label.addEventListener("click", activateTab);
});

function autoTab() {
    currentIndex = (currentIndex + 1) % tabCount;
    var nextTab = tabLabels[currentIndex];
    var event = new Event('click');
    nextTab.dispatchEvent(event);
}

function resetAutoTab() {
    clearInterval(autoTabInterval);
    autoTabInterval = setInterval(autoTab, 5000);
}

// Start auto tabbing every 5 seconds
autoTabInterval = setInterval(autoTab, 5000);


// glider industry-case-sec
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
}