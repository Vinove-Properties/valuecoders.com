//Sticky Section
let vcbColRight = document.querySelector(".vcb-col-right");
if( vcbColRight ){
  window.addEventListener("scroll", function (){
    document.querySelectorAll(".vcb-col-right").forEach(function (e) {
        if (document.documentElement.scrollTop >= e.getBoundingClientRect().top + window.scrollY - 100) {
            let hasEml = document.querySelector(".question-list");
            if( hasEml ){
              let t = e.getAttribute("id");
              let qla = document.querySelectorAll(".question-list li a");
              if( qla !== null ){
                qla.forEach(function (e) {
                  e.classList.remove("active");
                }),
                document.querySelector('.question-list li a[href="#' + t + '"]').classList.add("active");  
              }  
            }            
        }
    });
  });
}

var $window = window,
buyerGiude = document.getElementById("stickytoc");
if (buyerGiude) {
    var stickybuyers = document.getElementById("vcb-col-left"),
    buyersAns = document.getElementById("vcb-col-right");
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


//popup script//

var contentPopup  = document.getElementById('contentPopup');
var btn           = document.getElementById("myBtn");
var span          = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    contentPopup.style.display = "block";
}
span.onclick = function() {
    contentPopup.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == contentPopup) {
        contentPopup.style.display = "none";
    }
}

var newsletterPopup = document.getElementById('newsletterPopup');
var btn = document.getElementById("myBtn2");
var span = document.getElementsByClassName("closeicon")[0];
btn.onclick = function() {
    newsletterPopup.style.display = "block";
}
span.onclick = function() {
    newsletterPopup.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == newsletterPopup) {
        newsletterPopup.style.display = "none";
    }
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

function load_author_posts( e, author_id ){
  var clickCounter  = e.getAttribute("data-counter");
  let ajaxUrl       = e.getAttribute("data-ajax-url");
  if( e.classList.contains('no-more-posts') ) return false;

  const moreBtn     = document.getElementById("showmoreposts");
  moreBtn.innerHTML = "Loading...";
  var xhttp     = new XMLHttpRequest();
  xhttp.open("POST", ajaxUrl+'?action=get_author_posts', true);
  xhttp.setRequestHeader("Content-Type", "application/json");
  xhttp.onreadystatechange = function() {
    if( this.readyState == 4 && this.status == 200 ){
      let response = JSON.parse(this.responseText);
      console.log( response );      
      document.getElementById("auth-posts").insertAdjacentHTML('beforeend',response.auth_posts);
      if( response.have_more === true ){
        clickCounter++;
        e.setAttribute("data-counter", clickCounter);
        moreBtn.innerHTML = "Show More Posts";  
      }else{
        moreBtn.innerHTML = "No More Posts";
        e.classList.add('no-more-posts');
      }
      
    }
  };  
  xhttp.send(JSON.stringify({'author_id':author_id, 'paged': parseInt(e.getAttribute("data-counter"))}) );
}

function switchCat( tab_ul, tabcon, e ){
    let TabElms = document.getElementById(tab_ul).querySelectorAll('li');
    TabElms.forEach(function(elm){
        elm.classList.remove("active");
    });
    e.classList.add("active");
    let TabElmc = document.getElementById(tab_ul).querySelectorAll('.tabc-elm');
    TabElmc.forEach(function(elm){
        elm.classList.remove("active");
    });
    document.getElementById(tabcon).classList.add("active");
    let viewElm = document.getElementById(tab_ul).getElementsByClassName("view-all-link")[0];
    viewElm.setAttribute('href', e.dataset.link);
}

const showDivButtons    = document.querySelectorAll('.mobile-active');
const hiddenDivs        = document.querySelectorAll('.blog-cat');
showDivButtons.forEach((button, index) => {
  button.addEventListener('click', () => { 
    hiddenDivs[index].classList.toggle('is-visible');
  });
});

function _playYTmedia(video){
    let iframe = document.getElementById("gen-video");
    let ipopup = document.getElementById("gen-vpopup");
    iframe.setAttribute('src', video+"?autoplay=1");
    setTimeout(function(){        
        ipopup.style.display = "block";    
    }, 200);
    
}


function closeGenVideo(){
    let iframe = document.getElementById("gen-video");
    let ipopup = document.getElementById("gen-vpopup");
    iframe.setAttribute('src', "");    
    ipopup.style.display = "none";
}