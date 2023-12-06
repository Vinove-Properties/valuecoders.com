
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
    <div class="container">
        <div class="dis-flex">
        <div class="footer-left">
            <?php
            $copyRight = "&copy;"; 
            if( is_user_logged_in() ){
            $is_staging = (isset( $_SERVER['PHP_SELF']) && (strpos( $_SERVER['PHP_SELF'],'v2wp') !== false)) ? true : false;
                if( $is_staging === true ){
                    $copyRight = "<a href='".get_edit_post_link()."'>&copy;</a>";
                }          
                if( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "localhost") ){
                    $copyRight = "<a href='".get_edit_post_link()."'>&copy;</a>";
                }
            }
            ?>
            <span class="copy">Copyright <?php echo $copyRight; ?> 2004 - <?php echo date('Y'); ?>. All Rights Reserved. ValueCoders.com</span>
            <span class="footer-link">
            <a href="<?php echo site_url('/partnership-program'); ?>">Become a Partner</a> <span class="divider">|</span> 
            <a href="<?php echo site_url('/privacy-policy'); ?>">Privacy Policy</a> <span class="divider">|</span> 
            <a href="<?php echo site_url('/terms-of-service'); ?>">Terms of Service</a> <span class="divider">|</span> 
            <a href="<?php echo site_url('/why-india'); ?>">Why India?</a> <span class="divider">|</span> 
            <a href="<?php echo site_url('/faq'); ?>">FAQ</a> <span class="divider">|</span> 
            <a href="<?php echo site_url('/disclaimer'); ?>">Disclaimer</a> <span class="divider">|</span> 
            <a href="<?php echo site_url('/gdpr-compliance'); ?>">GDPR</a> 
            </span>
        </div>
        <div class="footer-middle">
<!-- rating section -->
<script type="text/javascript">
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
 // document.getElementById("demo").innerHTML = stars.length.toString(); // set number of stars as length of array of stars
}
</script>
<span class="star-outer" id="star" style="display:none">
    <span class="star-inner star-hover" id="starthover">
        <i class="star-icon vlazy" onclick="star(event)" onmouseover="changerate('one')"></i> 
        <i class="star-icon vlazy" onclick="star(event)" onmouseover="changerate('two')"></i> 
        <i class="star-icon vlazy" onclick="star(event)" onmouseover="changerate('three')"></i> 
        <i class="star-icon vlazy" onclick="star(event)" onmouseover="changerate('four')"></i> 
        <i class="star-icon vlazy" onclick="star(event)" onmouseover="changerate('five')"></i> 
    </span>
    <span id="rate_msg"></span>
</span>
    <span class="star-outer" id="rated">
    <i class="star-icon vlazy"></i>
    <i class="star-icon vlazy"></i>
    <i class="star-icon vlazy"></i>
    <i class="star-icon vlazy"></i>
    <i class="star-icon vlazy"></i>
    4.9 out of 5.0 by
    </span>
    <span class="client-outer">
    <a href="javascript:void(0)" onclick="ratenow()" id="ratebtn" class="rate-us">Rate us</a> 1218 clients on over 10800+ projects
    </span>
    </div>
    <div class="footer-last">
    <picture>
    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/footer-iso-logo.webp">
    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/footer-iso-logo.png">
    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/footer-iso-logo.png" alt="Valuecoders" width="97" height="69">
    </picture>    
    <a href="https://www.facebook.com/ValueCoders" target="_blank"><i class="social-icon facebook vlazy"></i></a>
    <a href="https://twitter.com/ValueCoders" target="_blank"><i class="social-icon twitter vlazy"></i></a>
    <a href="https://www.linkedin.com/company/valuecoders" target="_blank"><i class="social-icon linked-in vlazy"></i></a>
    <a href="https://www.instagram.com/valuecodersofficial_/?igshid=qfk286mq0wee" target="_blank"><i class="social-icon insta vlazy"></i></a>
    <a href="https://www.youtube.com/channel/UCCnijyLczGPUGI8aBkK3pTw?sub_confirmation=1" target="_blank"><i class="social-icon you-tube vlazy"></i></a>
    </div>
    </div>
    </div>
</footer>