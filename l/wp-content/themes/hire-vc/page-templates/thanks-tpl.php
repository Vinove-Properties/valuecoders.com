<?php 
/*
Template Name: Thank you Page Template
*/
get_header();
global $post;
//$page_id = $post->ID;
$msg = "";
?>
<section class="thanks-sec">
    <div class="hire-container">
         <div class="row">
            <div class="thanks-box">
                <?php 
                while ( have_posts() ) : the_post(); 
                  the_content();
                endwhile;
                ?>
            </div>
         </div>
   </div>
   <div class="call-detail">
      <div class="hire-container">
        <div class="row">
          <ul>
            <li>
              <h3>INDIA</h3>
              <p>T: <a href="tel:+91 7042020782">+91 7042020782</a><br>
              2nd Floor Plot no 55 P, Sector 44 Gurugram</p>
            </li>
            <li>
              <h3>US</h3>
              <p><a href="tel:(415) 230-0123">(415) 230-0123</a></p>
            </li>
            <li>
              <h3>AUSTRALIA</h3>
              <p>T: <a href="tel:(02) 8005 8080">(02) 8005 8080</a></p>
            </li>
            <li>
              <h3>UK</h3>
              <p>T: <a href="tel:020 3239 2299">020 3239 2299</a></p>
            </li>
          </ul>
        </div>
      </div>
    </div>
</section>
<?php get_footer(); ?>