
<footer class="footer bg-jacarta">
<?php 

function get_client_ip_user() {
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)) { $ip = $client; }
    elseif(filter_var($forward, FILTER_VALIDATE_IP)) { $ip = $forward; }
    else { $ip = $remote; }

    return $ip;
}

?>
<script>
function ratenow(){
    var x = document.getElementById("star");
    var y = document.getElementById("rated");
    
 if (x.style.display === "block") {
   x.style.display = "none";
   y.style.display = "block";
 } else {
   x.style.display = "block";
   y.style.display = "none";
 }
}
 
</script>
    <div class="container">
        <div class="dis-flex">
            <div class="footer-left">
                <span class="copy">Copyright © 2004 - <?php echo date('Y'); ?>. All Rights Reserved. ValueCoders.com</span>
                <span class="footer-link">Become a Partner <span class="divider">|</span> <a href="https://www.valuecoders.com/privacy-policy">Privacy Policy</a> <span class="divider">|</span> <a href="https://www.valuecoders.com/terms-of-service">Terms of Service</a> <span class="divider">|</span> <a href="https://www.valuecoders.com/why-india">Why India?</a> <span class="divider">|</span> <a href="https://www.valuecoders.com/faq">FAQ</a> <span class="divider">|</span> <a href="https://www.valuecoders.com/disclaimer">Disclaimer</a> <span class="divider">|</span> <a href="https://www.valuecoders.com/gdpr-compliance">GDPR</a></span>
                <span class="theme-setting nav-toggle"><span class="theme">Theme</span> <span class="lighter-theme" id="themeBtn"><i class="icon icon1"></i> Light</span> <span class="divider">|</span> <span class="dark-theme" id="themeDarkBtn"><i class="icon icon2"></i> Dark</span> <span class="divider">|</span> <span class="auto-theme" id="themeAuto"><i class="icon icon3"></i> Auto</span></span>
            </div>
            <div class="footer-middle">
<!----------------- rating section ----------------->
<script>
let stars = [] //array to hold stars
function star(event) {
  let icons = document.querySelectorAll('.star') // grab all icons
  let idx = Array.from(icons).indexOf(event.target) // get index of selected icon
  if (stars.includes(event.target.id)) { // if selected icon is in array of stars
    stars.splice(idx, stars.length ) // remove that icon and all following icons fro array
    for (let i = idx; i <= icons.length - 1; i++) { // loop thru all icons and set class and color
      icons[i].className = "fa fa-star-o star";
      icons[i].style.color = "black";
    }
  } else { // if selected icon is not in array of stars
    stars = [] // clear array
    for (let i = 0; i <= idx; i++) { // loop thru all icons and set class and color
      stars.push(icons[i].id) // add icon to array of stars
      icons[i].className = "fa fa-star star";
      icons[i].style.color = "#60B741";
    }
  }
  ////////////////////////////////////////
  var total_points = stars.length.toString();
   var user_ip = '<?=get_client_ip_user()?>';
   var rating_page_url = "<?=get_permalink()?>";
       
var data = "total_points=" + total_points + "&user_ip=" + user_ip + "&rating_page_url=" + rating_page_url;
   var xhttp = new XMLHttpRequest();
   
   xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       resobj = JSON.parse(this.responseText);
        document.getElementById("rate_msg").innerHTML = resobj.data;
       }
     };
     
   xhttp.open("POST", "<?=site_url()?>/wp-admin/admin-ajax.php?action=rateus", true);
   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

   xhttp.send(data);
  ////////////////////////////////////////////
 // document.getElementById("demo").innerHTML = stars.length.toString(); // set number of stars as length of array of stars
}
</script>
 <style>
.footer .star-icon {
    background: url(<?=get_template_directory_uri()?>/images/footer-icons.png) 0 0 no-repeat;
    width: 18px;
    height: 15px;
    display: inline-block;
}
 </style>
<span class="star-outer" id="star">
    <span class="star-inner star-hover">
        <i class="star-icon" onclick="star(event)" onmouseover="changerate('one')"></i> 
        <i class="star-icon" onclick="star(event)" onmouseover="changerate('two')"></i> 
        <i class="star-icon" onclick="star(event)" onmouseover="changerate('three')"></i> 
        <i class="star-icon" onclick="star(event)" onmouseover="changerate('four')"></i> 
        <i class="star-icon" onclick="star(event)" onmouseover="changerate('five')"></i> 
    </span>
    <span id="rate_msg"></span>
   
</span>
<!-- <span id="star" class="stars star-outer" style="display:none">
  <i class="fa fa-star-o star" id="star1" onclick="star(event)"></i>
  <i class="fa fa-star-o star" id="star2" onclick="star(event)"></i>
  <i class="fa fa-star-o star" id="star3" onclick="star(event)"></i>
  <i class="fa fa-star-o star" id="star4" onclick="star(event)"></i>
  <i class="fa fa-star-o star" id="star5" onclick="star(event)"></i>
  <span id="rate_msg">Please Select a Rating</span>
</span> -->

<!----------------- end rating section ------------------->


                <span class="star-outer" id="rated">
                    <i class="star-icon"></i> 4.9 out of 5.0 by
                </span>
                <span class="client-outer">
                    <a href="javascript:void(0)" onclick="ratenow()" class="rate-us">Rate us</a> 1218 clients on over 10800+ projects
                </span>
            </div>
            <div class="footer-last">
                <a href="https://www.facebook.com/ValueCoders"><i class="social-icon facebook"></i></a>
                <a href="https://twitter.com/ValueCoders"><i class="social-icon twitter"></i></a>
                <a href="https://www.linkedin.com/company/valuecoders"><i class="social-icon linked-in"></i></a>
                <a href="https://www.instagram.com/valuecodersofficial_/?igshid=qfk286mq0wee"><i class="social-icon insta"></i></a>
                <a href="https://www.youtube.com/channel/UCCnijyLczGPUGI8aBkK3pTw?sub_confirmation=1"><i class="social-icon you-tube"></i></a>
            </div>
        </div>
    </div>
</footer>