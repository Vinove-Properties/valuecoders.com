const vcTailerd = document.getElementById("tailored-slide");
if (vcTailerd) {
    window.addEventListener("load", function () {
        document.querySelector("#tailored-slide .glider").addEventListener("glider-slide-visible", function (event) {
            var glider = Glider(this);
        });
        window._ = new Glider(document.querySelector("#tailored-slide .glider"), {
            slidesToShow: 3,
            slidesToScroll: 3,
            draggable: !0,
            scrollLock: !1,
            dots: "#tailored-slide .dots",
            dragDistance: !1,
            arrows: { prev: ".tail-prev", next: ".tail-next" },
            responsive: [
                { breakpoint: 320, settings: { slidesToShow: 1, duration: 2.25 } },
                { breakpoint: 767, settings: { slidesToShow: 1, itemWidth: 150, duration: 1.25 } },
                { breakpoint: 1024, settings: { slidesToShow: 2, itemWidth: 150, duration: 1.25 } },
                { breakpoint: 1400, settings: { slidesToShow: 3, itemWidth: 150, duration: 3 } },
            ],
        });
    });
}
function gliderDoAutoPlay(glider, selector, delay = 2000, repeat = !0) {
    let autoplay = null;
    const slidesCount = glider.track.childElementCount;
    let nextIndex = 1;
    let pause = !0;
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
    var videoPlayed = !1;
    element.addEventListener(
        "click",
        (event) => {
            clearInterval(autoplay);
            pause = !1;
            videoPlayed = !0;
        },
        300
    );
    element.addEventListener(
        "mouseover",
        (event) => {
            if (pause && videoPlayed === !1) {
                clearInterval(autoplay);
                pause = !1;
            }
        },
        300
    );
    element.addEventListener(
        "mouseout",
        (event) => {
            if (!pause && videoPlayed === !1) {
                slide();
                pause = !0;
            }
        },
        300
    );
}
function isMobileDevice_NANA() {
    var check = !1;
    (function (a) {
        if (
            /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(
                a
            ) ||
            /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
                a.substr(0, 4)
            )
        )
            check = !0;
    })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
}
function isMobileDevice_NA2() {
    return screen.width < 1139 ? !0 : !1;
}
function isMobileDevice() {
    console.log(screen.width + navigator.userAgent);
    const userAgent = navigator.userAgent || navigator.vendor || window.opera;
    const regex = /Mobi|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i;
    if (/iPad|Macintosh/i.test(userAgent) && "ontouchend" in document) {
        console.log("iPad");
        return !0;
    }
    return regex.test(navigator.userAgent);
}
if (isMobileDevice()) {
    console.log("Moile");
} else {
    console.log("DeskTOP #");
}
function vmRestDefault() {
    let allArrow = document.querySelectorAll(".arrow-btn");
    if (allArrow) {
        [].forEach.call(allArrow, function (el) {
            el.classList.remove("rot");
        });
    }
    let allMM = document.querySelectorAll(".menu-mega");
    if (allMM) {
        [].forEach.call(allMM, function (el) {
            el.classList.remove("m-active");
        });
    }
}
function vmRestSerDefault() {
    let allArrow = document.querySelectorAll(".ser-arrow-btn");
    if (allArrow) {
        [].forEach.call(allArrow, function (el) {
            el.classList.remove("rot");
        });
    }
    let allMM = document.querySelectorAll(".sub-service");
    if (allMM) {
        [].forEach.call(allMM, function (el) {
            el.classList.remove("m-active");
        });
    }
}
function vmRestTechDefault() {
    let allArrow = document.querySelectorAll(".tech-arrow-btn");
    if (allArrow) {
        [].forEach.call(allArrow, function (el) {
            el.classList.remove("rot");
        });
    }
    let allMM = document.querySelectorAll(".sub-tech");
    if (allMM) {
        [].forEach.call(allMM, function (el) {
            el.classList.remove("m-active");
        });
    }
}
function vmRestHireDefault() {
    let allArrow = document.querySelectorAll(".hr-arrow-btn");
    if (allArrow) {
        [].forEach.call(allArrow, function (el) {
            el.classList.remove("rot");
        });
    }
    let allMM = document.querySelectorAll(".hr-submenu");
    if (allMM) {
        [].forEach.call(allMM, function (el) {
            el.classList.remove("m-active");
        });
    }
}
function vmRestSubDefault() {
    let allArrow = document.querySelectorAll(".list-item .arrow-btn");
    if (allArrow) {
        [].forEach.call(allArrow, function (el) {
            el.classList.remove("rot");
        });
    }
    let allsevenfive = document.querySelectorAll(".width-75");
    if (allsevenfive) {
        [].forEach.call(allsevenfive, function (el) {
            el.style.display = "none";
        });
    }
}
(function () {
    if (isMobileDevice()) {
        let deskOnly = document.querySelectorAll(".od-row");
        deskOnly.forEach(function (elm) {
            elm.innerHTML = "";
        });
        document.body.classList.add("vc-is-mobile");
        document.addEventListener("click", (event) => {
            const hMenu = document.getElementsByClassName("hamberger-menu")[0];
            if (event.target.classList.contains("arrow-btn")) {
                if (event.target.nextElementSibling) {
                    if (event.target.classList.contains("rot")) {
                        event.target.classList.remove("rot");
                        event.target.nextElementSibling.classList.remove("m-active");
                    } else {
                        vmRestDefault();
                        event.target.classList.add("rot");
                        event.target.nextElementSibling.classList.add("m-active");
                    }
                } else {
                    let inArrow = event.target.dataset.tget;
                    if (inArrow !== "" && document.getElementById(inArrow)) {
                        if (event.target.classList.contains("rot")) {
                            event.target.classList.remove("rot");
                            document.getElementById(inArrow).style.display = "none";
                        } else {
                            vmRestSubDefault();
                            event.target.classList.add("rot");
                            document.getElementById(inArrow).style.display = "block";
                        }
                    }
                }
            }
            if (event.target.classList.contains("hr-arrow-btn")) {
                let hrLinkRow = event.target.parentElement.nextElementSibling;
                if (hrLinkRow) {
                    if (event.target.classList.contains("rot")) {
                        event.target.classList.remove("rot");
                        hrLinkRow.classList.remove("m-active");
                    } else {
                        vmRestHireDefault();
                        event.target.classList.add("rot");
                        hrLinkRow.classList.add("m-active");
                    }
                }
            }
            if (event.target.classList.contains("ser-arrow-btn")) {
                let serLinkRow = event.target.parentElement.nextElementSibling;
                if (serLinkRow) {
                    if (event.target.classList.contains("rot")) {
                        event.target.classList.remove("rot");
                        serLinkRow.classList.remove("m-active");
                    } else {
                        vmRestSerDefault();
                        event.target.classList.add("rot");
                        serLinkRow.classList.add("m-active");
                    }
                }
            }
            if (event.target.classList.contains("tech-arrow-btn")) {
                let techLinkRow = event.target.parentElement.nextElementSibling;
                if (techLinkRow) {
                    if (event.target.classList.contains("rot")) {
                        event.target.classList.remove("rot");
                        techLinkRow.classList.remove("m-active");
                    } else {
                        vmRestTechDefault();
                        event.target.classList.add("rot");
                        techLinkRow.classList.add("m-active");
                    }
                }
            }
            if (event.target.classList.contains("mback")) {
                vmRestSubDefault();
            }
        });
    } else {
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
if (document.querySelector(".header-two")) {
    var lastScrollTop = 0;
    window.addEventListener("scroll", function () {
        window.pageYOffset > 10 ? document.querySelector(".header-two").classList.add("header-bg") : document.querySelector(".header-two").classList.remove("header-bg");
        let scrollST = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollST > lastScrollTop) {
            document.querySelector(".header-two").classList.remove("sc-up");
            document.querySelector(".header-two").classList.add("sc-down");
        } else {
            document.querySelector(".header-two").classList.remove("sc-down");
            document.querySelector(".header-two").classList.add("sc-up");
        }
        lastScrollTop = scrollST <= 0 ? 0 : scrollST;
    });
}
document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector(".header-two")) {
        let faqContainers = document.getElementsByClassName("hamberger-menu");
        let faqToggle = document.getElementsByClassName("mob-nav")[0];
        for (var i = 0; i < faqContainers.length; i++) {
            faqContainers[i].addEventListener("click", function () {
                faqToggle.classList.toggle("active");
            });
        }
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
function innermenu(e, id) {
    var sm = document.getElementById(id);
    e.classList.toggle("active");
    if (sm.style.display === "block") {
        sm.style.display = "none";
    } else {
        sm.style.display = "block";
    }
}
if (document.querySelector(".hamberger-menu")) {
    document.querySelector(".hamberger-menu").onclick = function (e) {
        var nav = document.querySelector(".hamberger-menu");
        nav.classList.toggle("open-close");
        vmRestDefault();
        vmRestHireDefault();
        vmRestSerDefault();
        vmRestSubDefault();
        e.preventDefault();
    };
}
let hasFreeTrial = document.querySelector(".has-free-trial");
if (hasFreeTrial !== null) {
    hasFreeTrial.onclick = function (e) {
        var popbtn = document.querySelector(".free-trail-pop-up");
        var popbdy = document.querySelector("body");
        popbtn.classList.toggle("open-pop");
        popbdy.classList.add("body-pop");
        e.preventDefault();
    };
}
let popClose = document.querySelector(".pop-close");
if (popClose !== null) {
    popClose.onclick = function (e) {
        var popcls = document.querySelector(".free-trail-pop-up");
        var popbdycls = document.querySelector("body");
        popcls.classList.remove("open-pop");
        popbdycls.classList.remove("body-pop");
        e.preventDefault();
    };
}
let opFreeTrial = document.querySelector(".open-free-trial");
if (opFreeTrial !== null) {
    opFreeTrial.onclick = function (e) {
        var popbtn2 = document.querySelector(".free-trail-pop-up");
        var popbdy2 = document.querySelector("body");
        popbtn2.classList.toggle("open-pop");
        popbdy2.classList.add("body-pop");
        e.preventDefault();
    };
}
window.addEventListener("load", function () {
    if (document.querySelector(".client-testimonial-slider")) {
        document.querySelector(".client-testimonial-slider .glider").addEventListener("glider-slide-visible", function (event) {
            Glider(this);
        });
        var clGlider = new Glider(document.querySelector(".client-testimonial-slider .glider"), {
            slidesToShow: 3,
            slidesToScroll: 1,
            draggable: !0,
            scrollLock: !1,
            dots: ".client-testimonial-slider .dots",
            dragDistance: !1,
            responsive: [
                { breakpoint: 320, settings: { slidesToShow: 1, slidesToScroll: 1, duration: 0.25 } },
                { breakpoint: 767, settings: { slidesToShow: 2, slidesToScroll: 1, itemWidth: 150, duration: 0.25 } },
                { breakpoint: 1024, settings: { slidesToShow: 3, slidesToScroll: 1, itemWidth: 150, duration: 0.25 } },
            ],
        });
        gliderDoAutoPlay(clGlider, ".client-testimonial-slider .glider", 5000);
    }
});
function focusFunction() {
    document.getElementById("cont_name").focus();
}
var faqItem = document.getElementsByClassName("faq-accordion-item-outer");
var faqHD = document.getElementsByClassName("faq-accordion-toggle");
for (i = 0; i < faqHD.length; i++) {
    faqHD[i].addEventListener("click", toggleFaqItem, !1);
}
function toggleFaqItem() {
    if (this.parentNode.classList.contains("active")) {
        this.parentNode.className = "faq-accordion-item-outer";
        return;
    }
    for (i = 0; i < faqItem.length; i++) {
        faqItem[i].className = "faq-accordion-item-outer";
    }
    if (this.parentNode.className == "faq-accordion-item-outer") {
        this.parentNode.className = "faq-accordion-item-outer active";
    }
}
(function () {
    "use strict";
    var tabs = function (options) {
        var el = document.querySelector(options.el);
        var tabNavigationLinks = el.querySelectorAll(options.tabNavigationLinks);
        var tabContentContainers = el.querySelectorAll(options.tabContentContainers);
        var activeIndex = 0;
        var initCalled = !1;
        var init = function () {
            if (!initCalled) {
                initCalled = !0;
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
        var initCalled2 = !1;
        var init2 = function () {
            if (!initCalled2) {
                initCalled2 = !0;
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
function swapTabTechnology(thisElm, nextElm) {
    document.getElementById(thisElm).classList.add("is-active");
    document.getElementById(nextElm).classList.remove("is-active");
    document.getElementById("content-" + nextElm).classList.remove("is-active");
    document.getElementById("content-" + thisElm).classList.add("is-active");
    document.getElementById("head-" + nextElm).classList.remove("is-active");
    document.getElementById("head-" + thisElm).classList.add("is-active");
}
var hasUg = document.getElementById("has-ug");
if (hasUg) {
    window.addEventListener("scroll", function () {
        var items = document.querySelectorAll("#has-ug .tab-content");
        items.forEach(function (item) {
            if (document.documentElement.scrollTop >= item.getBoundingClientRect().top + window.scrollY - 100) {
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
if (hasHomeaslder) {
    window.addEventListener("load", function () {
        document.querySelector(".home-award-slider .glider").addEventListener("glider-slide-visible", function (event) {
            var glider = Glider(this);
        });
        document.querySelector(".home-award-slider .glider").addEventListener("glider-slide-hidden", function (event) {});
        document.querySelector(".home-award-slider .glider").addEventListener("glider-refresh", function (event) {});
        document.querySelector(".home-award-slider .glider").addEventListener("glider-loaded", function (event) {});
        window._ = new Glider(document.querySelector(".home-award-slider .glider"), { slidesToShow: 1, slidesToScroll: 1, draggable: !0, scrollLock: !1, dots: ".home-award-slider .dots", dragDistance: !1 });
    });
}
function initDefBGimage() {
    let imgDefer = document.querySelectorAll("div[data-src]");
    let style = "background-image: url({url})";
    for (var i = 0; i < imgDefer.length; i++) {
        imgDefer[i].setAttribute("style", style.replace("{url}", imgDefer[i].getAttribute("data-src")));
    }
}
window.onload = initDefBGimage;
document.addEventListener("DOMContentLoaded", function () {
    var lazyloadImages;
    if ("IntersectionObserver" in window) {
        lazyloadImages = document.querySelectorAll(".vlazy");
        var imageObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var image = entry.target;
                    image.classList.remove("vlazy");
                    imageObserver.unobserve(image);
                }
            });
        });
        lazyloadImages.forEach(function (image) {
            imageObserver.observe(image);
        });
    } else {
        var lazyloadThrottleTimeout;
        lazyloadImages = document.querySelectorAll(".vlazy");
        function lazyload() {
            if (lazyloadThrottleTimeout) {
                clearTimeout(lazyloadThrottleTimeout);
            }
            lazyloadThrottleTimeout = setTimeout(function () {
                var scrollTop = window.pageYOffset;
                lazyloadImages.forEach(function (img) {
                    if (img.offsetTop < window.innerHeight + scrollTop) {
                        img.src = img.dataset.src;
                        img.classList.remove("vlazy");
                    }
                });
                if (lazyloadImages.length == 0) {
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
});
document.addEventListener("DOMContentLoaded", function () {
    var tsloadThrottleTimeout;
    var isLoaded = !1;
    function vcloadTeckStack() {
        if (tsloadThrottleTimeout) {
            clearTimeout(tsloadThrottleTimeout);
        }
        tsloadThrottleTimeout = setTimeout(function () {
            let scrollTop = window.pageYOffset;
            let elm = document.getElementById("load-tech-stack");
            if (elm) {
                if (elm.offsetTop < window.innerHeight + scrollTop) {
                    if (isLoaded == !1) {
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4) {
                                let dropElm = document.getElementById("tech-stack-bx");
                                let preHtml = dropElm.innerHTML;
                                dropElm.innerHTML = preHtml + xhr.responseText;
                            }
                        };
                        var pageID = document.getElementById("themeAdd").dataset.mpid;
                        if (document.body.classList.contains("page-template-hire-dotnet-developers")) {
                            xhr.open("GET", vcObj.admin_ajax + "?action=cmn-technologies&page_id=" + pageID);
                        } else if (document.body.classList.contains("page-template-template-services")) {
                            xhr.open("GET", vcObj.admin_ajax + "?action=cmn-servtechstacks&page_id=" + pageID);
                        } else if (document.body.classList.contains("page-template-template-hirepage")) {
                            if (pageID == 8024) {
                                xhr.open("GET", vcObj.admin_ajax + "?action=cmn-stacks&tpl=" + vcObj.page_tpl);
                            } else {
                                xhr.open("GET", vcObj.admin_ajax + "?action=cmn-hiretechstacks&page_id=" + pageID);
                            }
                        } else {
                            xhr.open("GET", vcObj.admin_ajax + "?action=cmn-stacks&tpl=" + vcObj.page_tpl);
                        }
                        xhr.send();
                        isLoaded = !0;
                    }
                }
                if (!elm) {
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
document.addEventListener("DOMContentLoaded", function () {
    var gsloadThrottleTimeout;
    var gisLoaded = !1;
    function gvcloadTeckStack() {
        if (gsloadThrottleTimeout) {
            clearTimeout(gsloadThrottleTimeout);
        }
        gsloadThrottleTimeout = setTimeout(function () {
            let scrollTop = window.pageYOffset;
            let elm = document.getElementById("glob-techstacks");
            if (elm) {
                if (elm.offsetTop < window.innerHeight + scrollTop) {
                    if (gisLoaded == !1) {
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4) {
                                let dropElm = document.getElementById("glob-tech-stack-bx");
                                let preHtml = dropElm.innerHTML;
                                dropElm.innerHTML = preHtml + xhr.responseText;
                            }
                        };
                        var gpageID = document.getElementById("themeAdd").dataset.mpid;
                        xhr.open("GET", vcObj.admin_ajax + "?action=cmn-technologies265&page_id=" + gpageID);
                        xhr.send();
                        gisLoaded = !0;
                    }
                }
                if (!elm) {
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
    if (hasTpa) {
        hasTpa.nextElementSibling.classList.add("default-light");
    }
});
let hasDelProcessCol = document.getElementById("col-delivery-process");
if (hasDelProcessCol) {
    var tabLabels = document.querySelectorAll("#tabs li");
    var tabPanes = document.getElementsByClassName("tab-contents");
    function activateTab(e) {
        e.preventDefault();
        tabLabels.forEach(function (label, index) {
            label.classList.remove("active");
        });
        [].forEach.call(tabPanes, function (pane, index) {
            pane.classList.remove("active");
        });
        e.target.parentNode.classList.add("active");
        var clickedTab = e.target.getAttribute("href");
        document.querySelector(clickedTab).classList.add("active");
    }
    tabLabels.forEach(function (label, index) {
        label.addEventListener("click", activateTab);
    });
}
let hasServBslider = document.getElementById("tpl-services-slider");
if (hasServBslider) {
    window.addEventListener("load", function () {
        new Glider(document.querySelector(".service-banner-client .glider"), { slidesToShow: 1, slidesToScroll: 1, draggable: !0, scrollLock: !1, dots: ".service-banner-client .dots", dragDistance: !1 });
    });
}
var faqHD = document.getElementsByClassName("accordion-toggle");
if (faqHD.length > 0) {
    for (i = 0; i < faqHD.length; i++) {
        faqHD[i].addEventListener("click", dataAccordionItem, !1);
    }
    function dataAccordionItem() {
        let tempElmId = this.parentNode.closest(".accordion-section");
        console.log("bingooo");
        if (tempElmId.id) {
            var accorItem = document.getElementById(tempElmId.id).getElementsByClassName("accordionItem");
        } else {
            var accorItem = document.getElementsByClassName("accordionItem");
        }
        if (this.parentNode.classList.contains("active")) {
            return;
        }
        for (i = 0; i < accorItem.length; i++) {
            accorItem[i].className = "accordionItem";
        }
        if (this.parentNode.className == "accordionItem") {
            this.parentNode.className = "accordionItem active";
        }
    }
}
function playTetiVideo(iframeID, vsource, e) {
    let allArrow = document.querySelectorAll(".yt-player");
    if (allArrow) {
        [].forEach.call(allArrow, function (el) {
            el.style.display = "none";
            el.setAttribute("src", "");
        });
    }
    let cVideo = document.querySelectorAll(".client-videos");
    if (cVideo) {
        [].forEach.call(cVideo, function (el) {
            el.classList.remove = "active";
        });
    }
    let thisCol = document.getElementById("cvbox-" + iframeID);
    thisCol.classList.add = "active";
    let thisFrame = document.getElementById("ytiframe-" + iframeID);
    thisFrame.style.display = "block";
    thisFrame.setAttribute("src", vsource);
}
let acc_row = document.querySelectorAll(".accordion-section .col-left");
if (acc_row) {
    [].forEach.call(acc_row, function (elms) {
        let elmHead = elms.querySelector(".head-txt");
        if (elmHead) {
            let hdiff = elms.clientHeight - elmHead.clientHeight;
            let iWrap = elms.querySelector(".image-wrap");
            if (iWrap) {
                iWrap.style.height = hdiff + "px";
            }
        }
    });
}
const hasMarqeecomp = document.getElementById("marquee-comp");
if (hasMarqeecomp) {
    new Glide(".glide", { type: "carousel", autoplay: 1, animationDuration: 15000, animationTimingFunc: "linear", perView: 1 }).mount();
}
var $window = window,
    buyerGiude = document.getElementById("trial-section");
if (buyerGiude) {
    var stickybuyers = document.getElementById("trial-question"),
        buyersAns = document.getElementById("trial-answer-part");
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
var ft_faqHD = document.getElementsByClassName("trial-accordion-toggle");
for (i = 0; i < ft_faqHD.length; i++) {
    ft_faqHD[i].addEventListener("click", ft_toggleFaqItem, !1);
}
function ft_toggleFaqItem() {
    if (this.parentNode.classList.contains("active")) {
        this.parentNode.className = "trial-accordion-item-outer";
        return;
    }
    for (i = 0; i < ft_faqItem.length; i++) {
        ft_faqItem[i].className = "trial-accordion-item-outer";
    }
    if (this.parentNode.className == "trial-accordion-item-outer") {
        this.parentNode.className = "trial-accordion-item-outer active";
    }
}
function playTetiVideoV4(iframeID, vsource, e) {
    let thisFrame = document.getElementById(iframeID);
    let ytPop = document.getElementById("yt-player-pop");
    ytPop.style.display = "block";
    thisFrame.setAttribute("src", vsource);
    thisFrame.style.display = "block";
}
function closeYT_video() {
    let ytPop = document.getElementById("yt-player-pop");
    let thisFrame = document.getElementById("cmn-ytplayer");
    ytPop.style.display = "none";
    thisFrame.setAttribute("src", "");
    thisFrame.style.display = "none";
}
if (document.getElementById("home-tpl-logoslide")) {
    new Glide(".logoslide", { type: "carousel", autoplay: 1, animationDuration: 10000, animationTimingFunc: "linear", perView: 1 }).mount();
}
if (document.getElementById("ht-testlider")) {
    const testGlide = new Glide("#ht-testlider", { type: "carousel", autoplay: 5000, animationDuration: 300, hoverpause: !1, gap: 0 }).mount();
}
if (document.getElementById("htpl-glider")) {
    window.addEventListener("load", function () {
        document.querySelector(".industry-slider .glider").addEventListener("glider-slide-visible", function (event) {
            var glider = Glider(this);
        });
        const indGLider = new Glider(document.querySelector(".industry-slider .glider"), {
            slidesToShow: 4,
            slidesToScroll: 1,
            draggable: !0,
            scrollLock: !1,
            dots: ".industry-slider .dots",
            dragDistance: !1,
            arrows: { prev: ".glider-prev", next: ".glider-next" },
            responsive: [
                { breakpoint: 320, settings: { slidesToShow: 1, slidesToScroll: 1, duration: 2.25 } },
                { breakpoint: 767, settings: { slidesToShow: 2, slidesToScroll: 1, itemWidth: 150, duration: 2.25 } },
                { breakpoint: 1024, settings: { slidesToShow: 4, slidesToScroll: 1, itemWidth: 150, duration: 2.25 } },
                { breakpoint: 1400, settings: { slidesToShow: 4, slidesToScroll: 1, itemWidth: 150, duration: 2.25 } },
            ],
        });
        document.querySelector(".glider").addEventListener("glider-slide-visible", function (event) {
            var imgs_to_anticipate = 3;
            var glider = Glider(this);
            let activeSlide = glider.slides[glider.slide].getAttribute("data-img-hover");
            document.querySelector(".bannerIMG").setAttribute("src", activeSlide);
        });
    });
    const titleBoxes = document.querySelectorAll(".ind-box");
    const bannerImg = document.querySelector(".bannerIMG");
    titleBoxes.forEach((box) => {
        box.addEventListener("mouseover", () => {
            const imgPath = box.getAttribute("data-img-hover");
            console.log(imgPath);
            bannerImg.setAttribute("src", imgPath);
        });
    });
}
function hireTbl_showMore(e) {
    e.classList.toggle("active");
    if (e.innerHTML === "View More") {
        e.innerHTML = "View Less";
    } else {
        e.innerHTML = "View More";
    }
    document.getElementById("vhire-tbl-elm").classList.toggle("show-all");
}
const CookieService = {
    setCookie(name, value, days) {
        let expires = "";
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + ";";
    },
    getCookie(name) {
        const cookies = document.cookie.split(";");
        for (const cookie of cookies) {
            if (cookie.indexOf(name + "=") > -1) {
                return cookie.split("=")[1];
            }
        }
        return null;
    },
};
const exit = (e) => {
    const shouldExit = [...e.target.classList].includes("exit-intent-popup") || e.target.className === "close" || e.keyCode === 27;
    if (shouldExit) {
        document.querySelector(".exit-intent-popup").classList.remove("visible");
    }
};
const mouseEvent = (e) => {
    const shouldShowExitIntent = !e.toElement && !e.relatedTarget && e.clientY < 10;
    if (shouldShowExitIntent) {
        document.removeEventListener("mouseout", mouseEvent);
        document.querySelector(".exit-intent-popup").classList.add("visible");
        CookieService.setCookie("exitIntentShown", !0, 30);
    }
};
var intPopupElm = document.getElementById("intentPopup");
if (intPopupElm) {
    if (!CookieService.getCookie("exitIntentShown")) {
        setTimeout(() => {
            document.addEventListener("mouseout", mouseEvent);
            document.addEventListener("keydown", exit);
            document.querySelector(".exit-intent-popup").addEventListener("click", exit);
        }, 0);
    }
}
function closeIntPopUp(elm, subFld = !1) {
    let divTarget = document.getElementById(elm);
    divTarget.classList.remove("visible");
    if (subFld === !0) {
        document.getElementById("myBtn2").click();
    }
}
var tabMC = document.querySelectorAll("#service-tabs .tablist");
var tabPanesMc = document.getElementsByClassName("tab-contents");
function activateTabFx(e) {
    e.preventDefault();
    tabMC.forEach(function (label, index) {
        label.classList.remove("active");
    });
    [].forEach.call(tabPanesMc, function (pane, index) {
        pane.classList.remove("active");
    });
    if (e.target === this || this.contains(e.target)) {
        var clickedTab = this.getAttribute("data-tab");
        this.classList.add("active");
        document.querySelector(clickedTab).classList.add("active");
    }
}
tabMC.forEach(function (label, index) {
    label.addEventListener("click", activateTabFx);
});
const sdMethod = document.getElementById("sd-metho");
if (sdMethod) {
    const cards = document.querySelectorAll(".card");
    cards.forEach((card) => {
        card.addEventListener("mouseover", () => {
            if (!card.classList.contains("active")) {
                updateActiveCard(card);
            }
        });
    });
    function updateActiveCard(activeCard) {
        cards.forEach((card) => {
            if (card === activeCard) {
                card.classList.add("active");
            } else {
                card.classList.remove("active");
            }
        });
    }
}
const cardsDM = document.querySelectorAll(".card");
if (cardsDM) {
    [...cardsDM].forEach((card) => {
        card.addEventListener("click", function () {
            card.classList.toggle("is-flipped");
        });
    });
}
function _morePPCTable() {
    var elm = document.getElementById("pxl-ppc-table");
    elm.classList.toggle("active");
}
(function () {
    "use strict";
    var tabsComponent = function (options) {
        var container = document.querySelector(options.el),
            tabLinks = container.querySelectorAll(options.tabNavigationLinks),
            tabContents = container.querySelectorAll(options.tabContentContainers),
            currentIndex = 0,
            initialized = !1,
            addHoverEvent = function (tabLink, index) {
                if (!isMobileDevice()) {
                    tabLink.addEventListener("mouseover", function (event) {
                        event.preventDefault();
                        switchTab(index);
                    });
                }
            },
            switchTab = function (index) {
                if (index !== currentIndex && index >= 0 && index < tabLinks.length) {
                    tabLinks[currentIndex].classList.remove("is-active");
                    tabContents[currentIndex].classList.remove("is-active");
                    tabLinks[index].classList.add("is-active");
                    tabContents[index].classList.add("is-active");
                    currentIndex = index;
                }
            };
        return {
            init: function () {
                if (!initialized) {
                    initialized = !0;
                    container.classList.remove("no-js");
                    for (var i = 0; i < tabLinks.length; i++) {
                        if (tabLinks[i].classList.contains("is-active")) {
                            currentIndex = i;
                        }
                        addHoverEvent(tabLinks[i], i);
                    }
                }
            },
            goToTab: switchTab,
        };
    };
    window.tabs = tabsComponent;
})();
const menuElm = ["menu-serv", "mnu-sol", "menu-inds", "mnu-tech", "mnu-hire"];
menuElm.forEach(function (elm) {
    if (document.getElementById(elm)) {
        var e = tabs({ el: "#" + elm, tabNavigationLinks: ".tab-link", tabContentContainers: ".tab-content" });
        e.init();
    }
});
const menuItemElm = document.querySelectorAll(".menu-item-has-children");
const anchorsLnk = document.querySelectorAll("a.mst-link");
function addClass() {
    anchorsLnk.forEach((anchor) => anchor.classList.remove("active"));
    this.classList.add("active");
}
function removeActiveClass() {
    setTimeout(() => {
        if (!document.querySelector(".menu-item-has-children:hover")) {
            anchorsLnk.forEach((anchor) => anchor.classList.remove("active"));
        }
    }, 100);
}
if (anchorsLnk) {
    anchorsLnk.forEach((anchor) => {
        anchor.addEventListener("mouseover", addClass);
    });
}
if (menuItemElm) {
    menuItemElm.forEach((item) => {
        item.addEventListener("mouseleave", removeActiveClass);
    });
}
function _expandListing(e) {
    e.closest("div").classList.toggle("show-li");
    e.classList.toggle("expanded-btn");
    if (e.innerText === "See More") {
        e.innerText = "See Less";
    } else {
        e.innerText = "See More";
    }
}
document.addEventListener("scroll", function () {
    const rightColumn = document.getElementById("valc-toc");
    if (rightColumn) {
        const stickySection = document.querySelector(".entire-sticky");
        const containerRect = stickySection.getBoundingClientRect();
        const rightOffset = window.innerWidth - containerRect.right;
        if (containerRect.top <= 80 && containerRect.bottom >= 0) {
            rightColumn.classList.add("fixed");
            rightColumn.style.right = `${rightOffset}px`;
        } else {
            rightColumn.classList.remove("fixed");
            rightColumn.style.right = "0";
        }
    }
});
const cmnIndustriesv5 = document.getElementById("induscater-glider");
if (cmnIndustriesv5) {
    window.addEventListener("load", function () {
        document.querySelector(".indcater-slider .glider").addEventListener("glider-slide-visible", function (event) {
            var glider = Glider(this);
        });
        window._ = new Glider(document.querySelector(".indcater-slider .glider"), {
            slidesToShow: 3,
            slidesToScroll: 1,
            draggable: !0,
            scrollLock: !1,
            dots: ".indcater-slider .dots",
            dragDistance: !0,
            arrows: { prev: "#ind-movers .ind-prev", next: "#ind-movers .ind-next" },
            responsive: [
                { breakpoint: 320, settings: { slidesToShow: 1, duration: 2.25 } },
                { breakpoint: 767, settings: { slidesToShow: 2, itemWidth: 150, duration: 1.25 } },
                { breakpoint: 1024, settings: { slidesToShow: 3, itemWidth: 150, duration: 1.25 } },
                { breakpoint: 1400, settings: { slidesToShow: 3, itemWidth: 150, duration: 3 } },
            ],
        });
    });
}
if (document.getElementById("technology-glider")) {
    window.addEventListener("load", function () {
        var gliderElement = document.querySelector(".technology-slider .glider");
        if (gliderElement) {
            new Glider(gliderElement, {
                slidesToShow: 4,
                slidesToScroll: 4,
                draggable: !0,
                scrollLock: !1,
                dots: ".technology-slider .dots",
                dragDistance: !0,
                arrows: { prev: "#technology-glider .tech-prev", next: "#technology-glider .tech-next" },
                responsive: [
                    { breakpoint: 320, settings: { slidesToShow: 1, slidesToScroll: 1, duration: 0.25 } },
                    { breakpoint: 767, settings: { slidesToShow: 2, slidesToScroll: 1, itemWidth: 150, duration: 0.25 } },
                    { breakpoint: 1024, settings: { slidesToShow: 3, slidesToScroll: 1, itemWidth: 150, duration: 0.25 } },
                    { breakpoint: 1400, settings: { slidesToShow: 3, slidesToScroll: 1, itemWidth: 150, duration: 0.25 } },
                ],
            });
        }
    });
}
var tabMC = document.querySelectorAll("#hiring-models .tablist");
tabMC.forEach(function (label, index) {
    label.addEventListener("click", tabHireModels);
});
function tabHireModels(e) {
    var tabPanesMc = document.getElementsByClassName("tab-contents");
    e.preventDefault();
    tabMC.forEach(function (label, index) {
        label.classList.remove("active");
    });
    [].forEach.call(tabPanesMc, function (pane, index) {
        pane.classList.remove("active");
    });
    if (e.target === this || this.contains(e.target)) {
        var clickedTab = this.getAttribute("data-tab");
        this.classList.add("active");
        document.querySelector(clickedTab).classList.add("active");
    }
}
function toggleTOCMenu() {
    const hamburgerMenu = document.getElementById("valc-toc");
    const hamburgerButton = document.getElementById("toc-hb");
    hamburgerMenu.classList.toggle("active");
    hamburgerButton.classList.toggle("show");
}
document.addEventListener("DOMContentLoaded", function () {
    var targetElement = document.getElementById("toc-hb");
    window.addEventListener("scroll", function () {
        if (targetElement) {
            var scrollPos = window.scrollY || window.pageYOffset;
            var targetOffset = targetElement.offsetTop;
            if (scrollPos > targetOffset) {
                document.body.classList.add("hb-toc");
            } else {
                document.body.classList.remove("hb-toc");
            }
        }
    });
});
const links = document.querySelectorAll(".toc-wrap a");
links.forEach((link) => {
    link.addEventListener("click", () => {
        links.forEach((item) => item.classList.remove("active"));
        link.classList.add("active");
    });
});




//Version 4.0 Home page script

if (document.getElementById("industries-glider-v6")){
    const indGlider     = document.getElementById("indGlider");    
    const indLoader     = document.getElementById("industries-glider-v6-loader"); 
    window.addEventListener("load", function() {
    var gliderElement = document.querySelector(".industries-slider .glider");
        if (gliderElement) {      
            new Glider(gliderElement, {
                slidesToShow: 6, 
                slidesToScroll: 1,
                draggable: true,
                scrollLock: true,
                duration: 2.25,
                dots: ".industries-slider .dots",
                arrows: { prev: '#industries-glider-v6 .test-prev', next: '#industries-glider-v6 .test-next' },      
                responsive: [
                    {breakpoint: 320, settings: { slidesToShow: 2, slidesToScroll: 1, duration: 2.25 }},
                    {breakpoint: 767, settings: { slidesToShow: 1, slidesToScroll: 1, itemWidth: '50%', duration: 2.25 }},
                    {breakpoint: 1024, settings: { slidesToShow: 3, slidesToScroll: 1, itemWidth: '33.33%', duration: 2.25 }},
                    {breakpoint: 1400, settings: { slidesToShow: 6, slidesToScroll: 1, itemWidth: '16.66%', duration: 2.25 }}
                ]
            });
        }
    });
    indLoader.style.display = 'none';
    indGlider.style.visibility = 'visible';
    indGlider.style.position = 'relative';  // Reset position
}

function _vcTabSelector(sectionSelector) {
    const sections = document.querySelectorAll(sectionSelector);
    sections.forEach((section) => {
      const tabs        = section.querySelectorAll(".tab");
      const contents    = section.querySelectorAll(".content");
      const images      = section.querySelectorAll(".tab-image");
      tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            const target = tab.getAttribute("data-target");
            tabs.forEach((t) => t.classList.remove("active"));
            contents.forEach((content) => content.classList.remove("active"));
            images.forEach((image) => image.classList.remove("active"));

            tab.classList.add("active");
            section.querySelector(`#${target}`).classList.add("active");
            if( section.querySelector(`#img-${target}`) ){
                section.querySelector(`#img-${target}`).classList.add("active");  
            }          
        });
      });
    });
}
document.addEventListener("DOMContentLoaded", () => {
    _vcTabSelector(".tabs-section");
     _vcTabSelector(".tab-with-slide");
});


if (document.getElementById("solution-slide")) {
window.addEventListener("load", () => {
const gliderElement = document.querySelector(".solution-slider .glider");
const progressBar   = document.querySelector(".solution-progress-bar");
if (gliderElement && progressBar) {
let glider;

glider = new Glider(gliderElement, {
slidesToShow: 5,
slidesToScroll: 1,
draggable: true,
duration: 2.25,
dots: ".dots",
arrows: {
  prev: ".tail-prev",
  next: ".tail-next",
},
responsive: [
  {
    breakpoint: 1024,
    settings: {
      slidesToShow: 5,
      slidesToScroll: 1,
    },
  },
  {
    breakpoint: 768,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 1,
    },
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
    },
  },
],
});

// Update progress bar
function updateProgress() {
const currentSlide = glider.slide;
const totalSlides = glider.slides.length;
const slidesToShow = glider.opt.slidesToShow;
const maxSlides = totalSlides - slidesToShow;
const progress = (currentSlide / maxSlides) * 100;
progressBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
}

// Initialize progress bar
updateProgress();

// Update progress bar when slides change
gliderElement.addEventListener("glider-slide-visible", updateProgress);

// Add smooth transition when slides move
gliderElement.addEventListener("glider-refresh", () => {
gliderElement.style.transition = "transform 0.5s ease";
});

// Handle arrow clicks
const prevArrow = document.querySelector(".tail-prev");
const nextArrow = document.querySelector(".tail-next");

prevArrow.addEventListener("click", () => {
setTimeout(updateProgress, 50); // Small delay to ensure glider state is updated
});

nextArrow.addEventListener("click", () => {
setTimeout(updateProgress, 50); // Small delay to ensure glider state is updated
});

// Handle window resize
let resizeTimer;
window.addEventListener("resize", () => {
clearTimeout(resizeTimer);
resizeTimer = setTimeout(() => {
  glider.refresh(true);
  updateProgress();
}, 250);
});
}
});
}


if (document.getElementById("success-glider")) {
window.addEventListener("load", function () {
var gliderElement = document.querySelector(".success-slider .glider");
if (gliderElement) {
  new Glider(gliderElement, {
    slidesToShow: 2,
    slidesToScroll: 2,
    draggable: true,
    scrollLock: true,
    duration: 2.25,
    dots: ".success-slider .dots",
    arrows: { 
      prev: "#success-glider .test-prev", 
      next: "#success-glider .test-next" 
    },
    responsive: [
      // Mobile first: 320px and below
      {
        breakpoint: 320,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          duration: 2.25,
        },
      },
      // Tablets: 767px and below
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          duration: 2.25,
        },
      },
      // Laptops: 1024px and below
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          duration: 2.25,
        },
      },
      // Large screens: 1400px and below
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          duration: 2.25,
        },
      },
    ],
  });
}
});
}


if (document.getElementById("client-slider")) {
    window.addEventListener("load", () => {
    const gliderElement = document.querySelector(".client-slider .glider");
    const progressBar = document.querySelector(".client-progress-bar");
    
    if (gliderElement && progressBar) {
    let glider; // Declare glider variable
    
    glider = new Glider(gliderElement, {
      slidesToShow: 3,
      slidesToScroll: 3,
      draggable: true,
      duration: 2.25,
      dots: ".dots",
      arrows: {
        prev: ".cl-prev",
        next: ".cl-next",
      },
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 979,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
      ],
    });
    
    // Update progress bar
    function updateProgress() {
      const currentSlide = glider.slide;
      const totalSlides = glider.slides.length;
      const slidesToShow = glider.opt.slidesToShow;
      const maxSlides = totalSlides - slidesToShow;
      const progress = (currentSlide / maxSlides) * 100;
      progressBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
    }
    
    // Initialize progress bar
    updateProgress();
    
    // Update progress bar when slides change
    gliderElement.addEventListener("glider-slide-visible", updateProgress);
    
    // Add smooth transition when slides move
    gliderElement.addEventListener("glider-refresh", () => {
      gliderElement.style.transition = "transform 0.5s ease";
    });
    
    // Handle arrow clicks
    const prevArrow = document.querySelector(".cl-prev");
    const nextArrow = document.querySelector(".cl-next");
    
    prevArrow.addEventListener("click", () => {
      setTimeout(updateProgress, 50); // Small delay to ensure glider state is updated
    });
    
    nextArrow.addEventListener("click", () => {
      setTimeout(updateProgress, 50); // Small delay to ensure glider state is updated
    });
    
    // Handle window resize
    let resizeTimer;
    window.addEventListener("resize", () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
        glider.refresh(true);
        updateProgress();
      }, 250);
    });
    }
    });
    } 


    //Industry Page Script Added from here*//


      
      window.addEventListener("load", function () {
      var tabSliderSection = document.getElementById("ind-tabslider");
      
      if (tabSliderSection) {
      var gliderElement = tabSliderSection.querySelector(".tabs-slider .glider");
      
      if (gliderElement) {
      gliderElement.addEventListener("glider-slide-visible", function (event) {
        var glider = Glider(this);
        // Optional: Do something when a slide becomes visible
      });
      
      window._ = new Glider(gliderElement, {
        slidesToShow: 3,
        slidesToScroll: 1,
        draggable: true,
        scrollLock: false,
        dots: tabSliderSection.querySelector(".tabs-slider .dots"),
        arrows: {
          prev: tabSliderSection.querySelector(".glider-prev"),
          next: tabSliderSection.querySelector(".glider-next")
        },
        responsive: [
          {
            // For desktops
            breakpoint: 1400,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            // For tablets (2 tabs)
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            // For mobile (1 tab)
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
      }
      }
      });


               
document.addEventListener("DOMContentLoaded", function () {
  const dataDrivingSection = document.querySelector(".data-driving");

  if (dataDrivingSection) {
    const accordionItems = dataDrivingSection.querySelectorAll(".home-accordion-item");
    const contentPanels = dataDrivingSection.querySelectorAll(".acr-panel");

    accordionItems.forEach((item, index) => {
      item.addEventListener("click", function () {
        // Remove active class from all accordion items and panels
        accordionItems.forEach(i => i.classList.remove("active"));
        contentPanels.forEach(p => p.classList.remove("active"));

        // Add active class to clicked item and matching panel
        this.classList.add("active");
        if (contentPanels[index]) {
          contentPanels[index].classList.add("active");
        }
      });
    });
  }
});
