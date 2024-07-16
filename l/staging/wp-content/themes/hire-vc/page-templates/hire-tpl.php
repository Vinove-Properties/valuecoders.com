<?php 
/*
Template Name: Hire Page Template
*/
get_header();
global $post;
$page_id    = $post->ID;
$pageType   = get_post_meta( $page_id, 'is_page_type', true );
$pageType   = ( $pageType ) ? $pageType : 'software-devel-page';
?>
<section class=" iso_pgN banner-form parpal-theam <?php echo $pageType; ?>">
   <div class="tec_banner_sec new-banner">
      <!-- <div id="particles-js"></div> --> 
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <?php while( have_posts() ) : the_post(); ?>   
               <article class="banner-text">
               <?php the_content(); ?>
               </article>
               <?php endwhile; ?>   
               <?php
               require_once get_template_directory().'/common/inc/hire_form.inc.php';
               ?>
            </div>
         </div>
      </div>
   </div>
<?php 
$services = get_field('our_services', $page_id);
//dd($services); exit();
if( $services ) :
$slideEffect = array('slideInLeft', 'slideInDown', 'slideInRight', 'slideInLeft', 'slideInDown', 'slideInRight');   
?>   
 <section class="services-sec">
      <div class="container">         
         <div class="row">
            <div class="col-lg-12 heading-area">
               <h2>Our Services </h2>
            </div>
         </div>
         <div class="row">
            <?php 
               $index = 0;
               foreach( $services as $service ){
                  //echo '<div class="col-sm-6 col-md-4  wow '.$slideEffect[$index].' animated" data-wow-delay=".1s">';
                  echo '<div class="col-sm-6 col-md-4">
                  <div class="serbox">
                  <i class="'.$service['icon'].'"></i> 
                  <h3>'.$service['title'].'</h3>
                  <p>'.$service['description'].'</p>
                  </div>
                  </div>';
                  $index++;
               } 
            ?>
            <div class="col-sm-12 text-center">
               <a href="#page_direct" class="cont-button"> contact us today </a>
            </div>
         </div>
      </div>
   </section>
   <?php endif; // END of Service Section ?>
   <?php 
   $show_tec_dev = get_post_meta($page_id,'tec_dev_stack_widget', true);
   if( $show_tec_dev ){
      if( $pageType == "mobile-devel-page" ){
         dynamic_sidebar( 'tech-stack-mobile' );
      }else{
         dynamic_sidebar( 'tech-stack' );
      }           
   }
   //require_once get_template_directory().'/common/inc/technology.inc.php';
   ?>
   <?php 
   $industries = get_field('multiple_industries', $page_id);
   if( $industries ) :
   $indRow = array_chunk( $industries, 4 );
   ?>
   <section class="industries-area">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 heading-area">
               <h2>We Serve Multiple Industries, Globally</h2>
            </div>
         </div>
         <div class="row">
         <?php
         /*
         <div class="logobox wow slideInDown animated" data-wow-delay=".1s">
         */
         ?>
         <div class="logobox">
         <img src="<?php bloginfo('template_url') ?>/common/images/valuecoder.png">
         </div>

         <div class="col-sm-6 col-md-6">
         <ul class="leftbox">
         <?php 
         foreach( $indRow[0] as $row ){
            echo '<li class="textbox">
            <i class="'.$row['icon'].'"></i>
            <h3>'.$row['title'].'</h3>
            <p>'.$row['description'].'</p>
            </li>';
         }
         ?>
         </ul>
         </div>
         <div class="col-sm-6 col-md-6">            
         <ul class="rightbox">
         <?php 
         $i = 4;
         foreach( $indRow[1] as $row ){
            echo '<li class="textbox">
            <i class="'.$row['icon'].'"></i>
            <h3>'.$row['title'].'</h3>
            <p>'.$row['description'].'</p>
            </li>';
         }
         ?>   
         </ul>
         </div>
         </div>
         <!--------------------------expertise-------------------------->
         <?php //require_once get_template_directory().'/common/inc/expertise2-inc.php'; ?>
         <!--------------------------expertise---------------------------->
         <div class="row">
            <div class="col-lg-12 text-center">
               <a href="#page_direct" class="cont-button"> contact us today </a>
            </div>
         </div>
      </div>
   </section>
   <?php endif; ?>
   <div class="clearfix"></div>
   <!-- 
      <section class="keybenefits">
      <div class="container">
      <div class="row">
      <div class="col-lg-12 heading-area">
      <h2> Key Benefits </h2>
      </div>
      </div>
      <?php //require_once 'common/inc/key-benefits-inc.php';?>
      </div>
      </section>
   -->
   <section class="whychoose-sec">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 heading-area">
               <h2> Why Choose Valuecoders?</h2>
            </div>
         </div>
         <!---------------------------why-choose--------------------------->
         <?php 
         $our_features = get_field('why_vc', 'option');
         if( $our_features ) :
         //require_once get_template_directory(). '/common/inc/why-choose2-inc.php'; 
         ?>
         <div class="row">
         <?php 
         $i = 0;
         foreach( $our_features as $row) {
            $i++;
            $fadeEffect = ( $i % 2 === 0 ) ? " fadeInUp " : " fadeInDown ";
            //echo '<div class="col-sm-6 col-md-4 wow '.$fadeEffect.' animated" data-wow-delay=".1s">';
            echo '<div class="col-sm-6 col-md-4">
            <div class="whybox">
            <i class="'.$row['icon'].'"></i>
            <h3>'.$row['title'].'</h3>
            <p>'.$row['description'].'</p> 
            </div>
            </div>';
         } 
         ?>            
         </div>
         <?php endif; ?>
         <!--------------------------why-choose---------------------------->
         <div class="col-lg-12 text-center">
            <a href="#page_direct" class="cont-button"> Let's Discuss Your Project  </a>
         </div>
      </div>
   </section>


   <!--------------------------exp-------------------------->
   <?php 
   dynamic_sidebar('tech-experience');
   //require_once get_template_directory(). '/common/inc/about-comp-inc.php';
   ?>
   <!--------------------------exp---------------------------->

   <!-- <section class="choosefrom-sec">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 heading-area">
               <h2> Choose from a variety of hiring models </h2>
               <p>We provide the flexibility of choosing the best suited engagement model to all our clients. </p>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="dedicated-box">
                  <div class="textbox">
                     <i class="icon-1"></i>
                     <h3> Dedicated team </h3>
                     <p> If you represent a company with regular large projects, or if your need ongoing work, ask about a retainer. It’s a pay-as-you-go monthly rolling contract. You’ll get our technical infrastructure, expertise, processes and execution abilities as easily as if we were located in your office.</p>
                  </div>
                  <ul>
                     <li>No hidden costs</li>
                     <li>80 or 160 hours of guaranteed production every month for part-time and full-time hires respectively</li>
                     <li>Monthly billing</li>
                     <li>Pay only for measurable work done</li>
                     <li>No setup fees</li>
                     <li>Dedicated team is better than Fixed-cost</li>
                  </ul>
               </div>
            </div>
            <div class="col-md-6">
               <div class="dedicated-box">
                  <div class="textbox">
                     <i class="icon-2"></i>
                     <h3>Fixed-price </h3>
                     <p>When you have a clear and well-defined project requirement, you may go with our fixed-price model. We could make an agreement of certain amount that you will be billed for a defined amount of task, making this as simple and transparent as possible. </p>
                  </div>
                  <ul>
                     <li>Know exactly what you’re getting up front, and how much it will be</li>
                     <li>Requires no change in price unless your needs change</li>
                     <li>Can be split and paid in milestones</li>
                     <li>Upgrade or cancel anytime</li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-12 text-center">
               <h4>Interested?</h4>
               <a href="https://www.valuecoders.com/contact" class="cont-button"> Let's Discuss Your Project  </a>
            </div>
         </div>
      </div>
   </section> -->
<!--------------------------exp-------------------------->
<?php //require_once get_template_directory(). '/common/inc/hiring-process-inc.php';?>
<!--------------------------exp---------------------------->
<?php 
$howData = get_field( 'how_it_works' );
if( $howData['hw_title_1'] || $howData['hw_title_2'] || $howData['hw_title_3'] ) :
?>
<section class="proccess">
   <div class="container text-center">
      <div class="row">
         <div class="col-lg-12 heading-area">
            <h2>How it Works?</h2>
         </div>
      </div>
      <div class="container">
         <!--
         <ul class="nav nav-pills">
            <li class="active"> <a href="javascript:void(0)" data-toggle="tab1">Dedicated Team</a> </li>
            <li <a href="javascript:void(0)" data-toggle="tab2">Fixed price</a></li>
         </ul>
         -->
         <div class="tab-content clearfix">
            <div class="tab-pane active" id="tab1">
               <ul  class="process_list">
                  <li>
                     <label class="stepNo">01</label>
                     <div class="content">
                        <div class="content_head"><?php echo $howData['hw_title_1']; ?></div>
                        <div class="content-body">
                           <?php 
                           if( $howData['hw_listing_1'] ){
                              echo '<ul>';
                                 foreach( $howData['hw_listing_1'] as $row ){
                                    echo '<li>'.$row['hw_listing_1'].'</li>';
                                 }
                              echo '</ul>';
                           }
                           ?>
                           <p><?php echo $howData['hw_btext_1']; ?></p>
                        </div>
                     </div>
                  </li>
                  <li>
                     <label class="stepNo">02</label>
                     <div class="content">
                        <div class="content_head"><?php echo $howData['hw_title_2']; ?></div>
                        <div class="content-body">
                           <?php 
                           if( $howData['hw_listing_2'] ){
                              echo '<ul>';
                                 foreach( $howData['hw_listing_2'] as $row ){
                                    echo '<li>'.$row['hw_listing_1'].'</li>';
                                 }
                              echo '</ul>';
                           }
                           ?>
                           <p><?php echo $howData['hw_btext_2']; ?></p>
                        </div>
                     </div>
                  </li>
                  <li>
                     <label class="stepNo">03</label>
                     <div class="content">
                        <div class="content_head"><?php echo $howData['hw_title_3']; ?></div>
                        <div class="content-body">
                           <?php 
                           if( $howData['hw_listing_3'] ){
                              echo '<ul>';
                                 foreach( $howData['hw_listing_3'] as $row ){
                                    echo '<li>'.$row['hw_listing_1'].'</li>';
                                 }
                              echo '</ul>';
                           }
                           ?>
                           <p><?php echo $howData['hw_btext_3']; ?></p>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<?php endif; ?>
<!-- Our Work Samples Starts -->
<?php 
$workSamples = get_field( 'work_sample', $page_id );
if( $workSamples ) :
?>
<section class="application_development_sec">
   <div class="row">
      <div class="col-lg-12 heading-area">
         <h2>Our Work Samples</h2>
      </div>
   </div>
   <div class="container">
      <div class="work-samples-box wid100p">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <?php 
               $i = 0;
               foreach( $workSamples as $sample ) : $i++; ?>
               <div class="item <?php echo ( $i === 1 ) ? "active":""; ?>">
                  <div class="casestudy">
                     <div class="casetext">
                        <?php echo $sample['sm_description']; ?>
                     </div>
                      <div class="casebox">
                      <?php 
                      if( $sample['sm_thumbnail'] ){
                        echo '<img src="'.$sample['sm_thumbnail']['url'].'">';
                      }
                      ?>  
                     </div>
                  </div>
               </div>
               <?php endforeach; ?>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
               <span class="glyphicon arroicon"><img src="<?php bloginfo('template_url') ?>/common/images/left-icon.png" width="33" height="59"></span>
               <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
               <span class="glyphicon arroicon"><img src="<?php bloginfo('template_url') ?>/common/images/right-icon.png" width="33" height="59"></span>
               <span class="sr-only"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
            </a> 
         </div>
      </div>
   </div>
</section>
<?php endif; ?>

<!---------------------------testimonials--------------------------->
<?php 
//require_once get_template_directory(). '/common/inc/testimonials.inc.php';
$testimonials = get_field('client_testimonial', 'option');
if( $testimonials ) :
?>
<section class="client_testimonila_sec">
 <div class="container">
   <div class="row">
    <div class="col-lg-12 heading-area">
     <h2>Client Testimonials</h2>
   </div>
 </div>
 <div class="slick_testimonial">
   <ul class="compare-slider list-unstyled list-inline ">
   <?php foreach ( $testimonials as $row ) { ?>
   <li>
   <div class="image-container">
   <div class="item">
   <div class="development_services_inner ">
   <span>
   <div class="test-dp">
   <?php 
   if( $row['thumbnail'] ){
      echo '<img src="'.$row['thumbnail']['url'].'" alt="Testimonials" title="Testimonials">';
   } 
   ?>   
   </div>
   <?php echo $row['content']; ?>
   </span>
   <div class="test-name">
   <h5><?php echo $row['client_name']; ?></h5>
   <p><?php echo $row['designation']; ?></p>
   </div>
   </div>
   </div>
   </div>
   </li>
   <?php } ?>
   </ul>
</div>
</div>
</section>
<script type="text/javascript">
  $(".compare-slider").slick({
    dots:!0,
    infinite:!0,
    prevArrow:!1,
    nextArrow:!1,
    slidesToShow:2,
    slidesToScroll:2,
    autoplay:!1,
    responsive:[{breakpoint:1366,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:1024,settings:{slidesToShow:1,slidesToScroll:1}}]
})
</script>
<?php endif; ?>
<!--------------------------testimonials---------------------------->
<footer class="footeFormr">
   <?php require_once get_template_directory(). '/common/inc/iosfrm.inc.php'; ?>
</footer>
<section class="get_outer">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <?php require_once get_template_directory(). '/common/inc/contactfrm.inc.php'; ?>
         </div>
      </div>
   </div>
</section>
<script>
function showShareURL(){
   $("#share_url").show();
   $("#label_share_url").hide();
}
</script>
<?php get_footer(); ?>