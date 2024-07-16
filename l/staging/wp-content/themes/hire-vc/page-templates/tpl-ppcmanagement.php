<?php
/*
Template Name: PPC Management - Template
*/
if( isset($_GET['session_id']) && !empty( $_GET['session_id'] ) ){
  require get_template_directory().'/stripe-php/init.php';
}
get_header();
global $post;
$webpDir  = WP_CONTENT_DIR.'/uploads-webpc/uploads/';
$webpUrl  = content_url().'/uploads-webpc/uploads/';

if( isset($_GET['session_id']) && !empty( $_GET['session_id'] ) ){
    echo '<div class="form-pop-up-box open-pop" id="str-strpop"><div class="container"><div class="form-box-outer payment-sc">
    <span class="pop-close" onclick="closevcForm(\'str-strpop\');"></span>';
    try{
      $stripe = new \Stripe\StripeClient(STRIPE_API_KEY);  
      $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);
      updateVcTransationStatus( $_GET['session_id'], $session->payment_intent, $session->status );
      //echo '<pre>'; print_r( $session ); echo '</pre>';
      echo '<h3>Your Payment has been Successful!</h3>';
      echo '<p><b>Reference Number: </b> '.$session->id.'</p>';
      echo '<p><b>Transaction ID: </b> '.$session->payment_intent.'</p>';
      echo '<p><b>Paid Amount: </b> '.$session->currency.' '.($session->amount_total/100).'</p>';
      echo '<p><b>Payment Status: </b> '.$session->status.'</p>';      
    }catch (Exception $e){
      http_response_code(500);
      echo json_encode(['error' => $e->getMessage()]);
    }
    echo '</div></div></div>';
}
?>
<section class="banner-section">
  <div class="container">
    <div class="two-box">
      <div class="flex-2 content-box">
        <p class="pTitle">Be the Leader in Online Presence</p>
        <?php 
        while( have_posts() ) : the_post();
          the_content(); 
        endwhile;
        ?>
        <div class="margin-t-60">
          <a class="yellow-btn" href="#pricing-plans">I’m Interested</a>
        </div>
      </div>

      <div class="flex-2 videbox">
        <?php 
        $vcBanner = get_field('ppc-banner');
        if( isset($vcBanner['banner-type']) && ($vcBanner['banner-type'] == "image") ){
          echo '<div class="banner-image" style="display:block;">';
          if( $vcBanner['image'] ){
            echo pxlGetPtag( $vcBanner['image'] );
          }
          echo '</div>';          
        }else{ 
        ?>
        <div class="videoSc" id="has-yt-video">
          <div class="inner">
            <button id="myBtn">
              Open Modal  
              <div class="playsc"><span class="playicon"></span></div>
            </button>
            <div class="topVideo srp-1">
              <div id="myDIV" class="contbox2">
                <div class="videoWrapper js-videoWrapper">
                  <div class="videoPopup">
                    <div id="contentPopup" class="popup-wrapper">
                      <div class="popWrap">
                        <div class="popup-content">
                          <span class="close"></span>
                          <iframe id="video" class="videoIframe js-videoIframe" allowfullscreen 
                          data-src="<?php echo $vcBanner['vsrc']; ?>">
                          </iframe>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="videoPoster lazy-background" id="play-button">
                  Play video
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<div class="client-logo-box-section dis-flex items-center justify-sb">
  <div class="container">
    <div class="partwrap dis-flex">
      <div class="logo-heading">
        <h4>Our expertise & reviews</h4>
      </div>
      <div class="logo-box-outer dis-flex">
        <div class="logo-box logo1"></div>
        <div class="logo-box logo2"></div>
        <div class="logo-box logo3"></div>
        <div class="logo-box logo4"></div>
        <div class="logo-box logo5"></div>
      </div>
    </div>
  </div>
</div>
<!-- Banner Section Ends -->  

<?php 
$benefits = get_field('ppc-benefits');
if( isset( $benefits['needed'] ) && $benefits['needed'] == "yes" ) :
?>
<!-- Benefits Section Start From Here  -->  
<section class="ppc-benefits bg-cream padding-t-150 padding-b-150" id="benefits">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $benefits['content']; ?>
    </div>
    <div class="dis-flex margin-t-50 items-center justify-sb">
      <div class="flex-2 content-box">
        <div class="dis-flex justify-sb">
          <?php 
          $cards = $benefits['cards'];
          if( $cards ){
            $color = ['', 'yellow', 'red', 'blue', 'purple', 'lt-blue','', 'yellow', 'red', 'blue', 'purple', 'lt-blue'];
            $i = 0;
            foreach( $cards as $row ){
            echo '<div class="outer-box">
            <div class="content-wrap ">
              <div class="nocount '.$color[$i].'"><i></i></div>
              '.$row['content'].'
            </div>
            </div>';    
            $i++;
            }
          }
          ?>          
        </div>
      </div>
      <div class="flex-2">
        <?php 
        if( $benefits['image'] ){
          echo pxlGetPtag( $benefits['image'] );
        }   
        ?>       
      </div>
    </div>
  </div>
</section>
<!-- Benefits Section Ends  --> 
<?php endif; ?>

<?php 
$channels = get_field('channels');
if( isset( $channels['needed'] ) && $channels['needed'] == "yes" ) :
?>
<!-- PPC Channels Section Start From Here  --> 
<section class="ppc-channels padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php $channels['content']; ?>
      <h2>Mastery of All PPC Channels is Our Specialty</h2>
      <p>Our PPC experts are skilled in crafting and managing campaigns across all major PPC channels, including Google Ads,<br> Bing Ads, Facebook Ads, LinkedIn Ads, and more.</p>
    </div>
    <?php 
    $slogos = $channels['in-channels'];
    if( $slogos ){
    ?>
    <div class="dis-flex col-box-outer margin-t-80 items-center justify-sb">
    <?php 
    foreach ($slogos as $row) {
      echo '<div class="flex-6">';
      if($row['image']){
        echo pxlGetPtag( $row['image'] );
      }
      echo '</div>';
    } 
    ?>      
    </div>
    <?php }  ?>
  </div>
</section>
<!-- PPC Channels Section Ends Here  --> 
<?php endif; ?>
<!-- 3 Columns Section Start From Here  --> 

<?php 
$campaign = get_field('campaign');
if( isset( $campaign['needed'] ) && $campaign['needed'] == "yes" ) :
?>
<section class="three-column-icon-section bg-cream padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $campaign['content']; ?>      
    </div>
    <?php 
    $cards = $campaign['cards'];
    if( $cards ){
    echo '<div class="dis-flex col-box-outer">';
    foreach( $cards as $row ){
      echo '<div class="flex-3 box-3">
        <div class="box">';
        if( $row['icon'] ){
          echo pxlGetPtag( $row['icon'] );
        }
        echo $row['text'];
        echo '</div></div>';
    }
    echo '</div>';  
    }
    ?>
  </div>
</section>
<!-- 3 Columns Section Ends Here  --> 
<?php endif; ?>

<?php 
$activities = get_field('activities');
if( isset( $activities['needed'] ) && $activities['needed'] == "yes" ) :
?>
<!-- Our PPC Activities Section Start From Here  --> 
<section class="whoWe padding-t-150 padding-b-150" id="ppc-activities">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $activities['content']; ?>
    </div>
    <div class="wrkSctn margin-t-80">
      <?php 
      if( $activities['image-d'] ){
        echo '<picture class="desktop">
        <img loading="lazy" src="'.$activities['image-d']['url'].'" alt="Valuecoders"
          width="'.$activities['image-d']['width'].'" height="'.$activities['image-d']['height'].'">
      </picture>';
      }

      if( $activities['image-m'] ){
        echo '<picture class="mobile">
        <img loading="lazy" src="'.$activities['image-m']['url'].'" alt="Valuecoders"
          width="'.$activities['image-m']['width'].'" height="'.$activities['image-m']['height'].'">
      </picture>';
      }
      ?>
    </div>
  </div>
</section>
<!-- Our PPC Activities Section Ends Here  --> 
<?php endif; ?>

<?php 
$process = get_field('our-process');
if( isset( $process['needed'] ) && $process['needed'] == "yes" ) :
?>
<!-- Our Process Section Start From Here  --> 
<section class="step-icon-img-section bg-cream padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $process['content']; ?>      
    </div>
    <?php 
    $steps = $process['steps'];
    if( $steps ){
      echo '<div class="dis-flex col-box-outer margin-t-100 hiring-step-sprite">';
      $i = 0;
      foreach( $steps as $row ){ $i++;
      echo '<div class="flex-4 icon-box">
        <i class="icon icon'.$i.'"></i>
        '.$row['text'].'
      </div>';  
      }
      echo '</div>';
    }
    ?>
    <picture class="desktop">
      <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/ppc/our-hiring-process-img.webp">
      <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/ppc/our-hiring-process-img.png">
      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/ppc/our-hiring-process-img.png" alt="Valuecoders"
        width="1206" height="52">
    </picture>
    <picture class="mobile">
      <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/ppc/our-hiring-mobile-img.webp">
      <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/ppc/our-hiring-mobile-img.png">
      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/ppc/our-hiring-mobile-img.png" alt="Valuecoders"
        width="9" height="680">
    </picture>
  </div>
</section>
<!-- Our Process Section Ends Here  --> 
<?php endif; ?>

<?php
$ctestimonials = get_field('testimonials');
if( isset( $ctestimonials['needed'] ) && $ctestimonials['needed'] == "yes" ) :
?>
<!-- PPC Testimonial Section Start From Here  --> 
<section class="ppc-testimonial-sec padding-t-150 padding-b-150" id="ppc-testimonial">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $ctestimonials['content']; ?>      
    </div>
    <?php if( $ctestimonials['cards'] ){ ?>
    <div class="ppc-test margin-t-100">
      <div class="glider-contain ppc-testimonial">
        <div class="glider" id="glider">
          <?php foreach ($ctestimonials['cards'] as $row){ ?>
          <div class="slide-item">
            <div class="dis-flex justify-sb content">
              <div class="flex-2 caseimg">
                <?php 
                if( $row['image'] ){
                  echo pxlGetPtag( $row['image'] );
                } 
                ?>
                
              </div>
              <div class="flex-2 casetext">
                <?php echo $row['text']; ?>
              </div>
            </div>
          </div>
          <?php } ?>          
        </div>
        <div class="prev-next-btn">
          <button class="glider-prev">
          </button>
          <button class="glider-next">
          </button>
        </div>
        <div role="tablist" class="dots"></div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>
<!--  PPC Testimonial Section Ends Here  -->
<?php endif; ?> 

<?php 
$cs = get_field('case-studies');
if( isset( $cs['needed'] ) && $cs['needed'] == "yes" ) :
?>
<!-- Case Study Section Start From Here  --> 
<section class="case-study bg-cream padding-t-150 padding-b-150" id="case-studies">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $cs['content']; ?>
      
    </div>
    <?php 
    $csds = $cs['cards'];
    if( $csds ){
    ?>
    <div class="dis-flex justify-sb  margin-t-100">
      <?php 
      $i = 0;
      foreach( $csds as $row ){ $i++;
        echo '<div class="flex-2"><div class="case-img">';
        if( $row['image'] ){
          echo pxlGetPtag( $row['image'] );
        }
        echo '</div><div class="case-content">
        <span class="csbtn">Case Study '.$i.'</span>
        '.$row['text'].'
        </div>
      </div>';
      } 
      ?>
    </div>
    <?php } ?>
  </div>
</section>
<!--  Case Study Section Ends Here  --> 
<?php endif; ?>

<?php 
$comparision = get_field('comparision');
if( isset( $comparision['needed'] ) && $comparision['needed'] == "yes" ) :
?>
<!-- Comparision Section Start From Here  --> 
<section class="campare-sec padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $comparision['content']; ?>      
    </div>
    <div class="dis-flex  margin-t-100">
      <div class="flex-2">
        <h3>ValueCoders</h3>
        <div class="compare-list">
          <?php echo $comparision['vc-content']; ?>          
        </div>
      </div>
      <div class="flex-2">
        <h3>Freelance PPC Experts</h3>
        <div class="compare-list">
          <?php echo $comparision['otr-content']; ?>
          
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<!--  Comparision Section Ends Here  --> 
<?php endif; ?>

<?php 
$truth = get_field('truth-abt');
if( isset( $truth['needed'] ) && $truth['needed'] == "yes" ) :
?>
<!-- The Truth About PPC Services Section Start From Here  --> 
<section class="whoWe ppc-services bg-cream padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $truth['content']; ?>
    </div>
    <div class="wrkSctn margin-t-80">
      <?php
      if( $truth['image'] ){
        echo '<picture>
        <img loading="lazy" src="'.$truth['image']['url'].'" alt="Valuecoders"
          width="'.$truth['image']['width'].'" height="'.$truth['image']['height'].'">
      </picture>';
      }
      ?>
    </div>
  </div>
  </div>
</section>
<!-- The Truth About PPC Services Section Ends Here  --> 
<?php endif; ?>

<?php
$faqs = get_field('faqs');
if( isset( $faqs['needed'] ) && $faqs['needed'] == "yes" ) :
?>
<!-- FAQ'S Section Start From Here  --> 
<section class="faq-section  padding-t-150 padding-b-150" id="faq">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $faqs['content']; ?>      
    </div>
    <div class="faq-outer" itemscope itemtype="https://schema.org/FAQPage">
      <?php 
      $faqdata = $faqs['faq'];
      if( $faqdata ){        
        $i = 0;
        foreach( $faqdata as $row ){ $i++;
        $isActive = ( $i === 1 ) ? ' active' : '';  
        echo '<div class="faq-accordion-item-outer '.$isActive.'" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">';
        echo '<h3 class="faq-accordion-toggle">'.$row['title'].'</h3>
        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
          itemtype="https://schema.org/Answer">
          '.$row['text'].'
        </div>';
        echo '</div>';
        }        
      }
      ?>
    </div>
  </div>
</section>
<!-- FAQ'S Section Ends Here  --> 
<?php endif; ?>

<?php 
$sreport = get_field('sample-report');
if( isset( $sreport['needed'] ) && $sreport['needed'] == "yes" ) :
?>
<!-- Sample Tab Section Start From Here -->
<section class="sample-reports bg-cream padding-t-150 padding-b-150" id="reports">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $sreport['content']; ?>      
    </div>
    <?php if( $sreport['cards'] ){ ?>
    <div class="prod-tabs margin-t-80">
      <nav id="tabs">
        <ul>
          <?php 
          $i = 0;
          foreach ($sreport['cards'] as $row) { $i++;
          $isActive = ( $i === 1 )  ? ' class="active"' : '';
          echo '<li '.$isActive.'><a href="#tab'.$i.'">'.$row['text'].'</a></li>';
          } 
          ?>
        </ul>
      </nav>
      <div id="tab-contents">
        <?php 
        $i = 0;
        foreach ($sreport['cards'] as $row) { $i++;
        $isActive = ( $i === 1 )  ? ' active' : '';
        ?>
        <div id="tab<?php echo $i; ?>" class="tab-contents <?php echo $isActive; ?>">
          <div class="dis-flex">
            <div class="image-box">
              <?php 
              if( $row['image'] ){
                echo pxlGetPtag( $row['image'] );
              }
              ?>              
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <?php } ?>
    <div class="downbtn"><a class="downlaodbtn" onclick="showPopReport();" href="javascript:void(0);"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/ppc/downloadbtn.svg" alt="Valuecoders"
      width="19" height="19">Download Sample Report</a></div>
  </div>
</section>
<!-- Sample Tab Section Ends Here -->
<?php endif; ?>

<?php 
$pricingRow = get_field('price-plan');
if( isset( $pricingRow['needed'] ) && $pricingRow['needed'] == "yes" ) :
?>
<!--Pricing Table Section Start From Here-->
<section class="pricing-plan padding-t-150 padding-b-150" id="pricing-plans">
  <div class="container">
  <div class="head-txt text-center">
    <?php echo $pricingRow['content']; ?>    
  </div>
  <div class="price-table margin-t-80">
  <div class="price-row">
  <div class="columns">
    <ul class="price aln-left">
      <li class="price-header"><h2>Plan Features</h2></li>
      <?php 
      $planFeature = $pricingRow['features'];
      if( $planFeature ){
        foreach ($planFeature as $row ){
          echo '<li>'.$row['feature'].'</li>';
        }
      }
      ?>      
    </ul>
  </div>
  <div class="columns">
    <ul class="price">
      <li class="price-header OKAY">
        <h4><?php echo $pricingRow['p1-name']; ?></h4>
        <h3><?php echo $pricingRow['p1-pricing']; ?></h3>
        <div>
      </li>
      <?php 
      $planone = $pricingRow['plan-1'];
      if( $planone ){
        foreach($planone as $row) {
          echo '<li><span>'.parsePlanText($row['feature']).'</span></li>';
        }
      }
      ?>
      <li><div><a onclick="showpricepopup('basic');" href="javascript:void(0);" class="price_btn">Order Now</a></div> </li>
    </ul>
    </div>
    <div class="columns">
      <ul class="price">
        <li class="price-header OKAY">
          <h4><?php echo $pricingRow['p2-name']; ?></h4>
          <h3><?php echo $pricingRow['p2-pricing']; ?></h3>
          <div>
        </li>
        <?php 
        $plantwo = $pricingRow['plan-2'];
        if( $plantwo ){
          foreach($plantwo as $row) {
            echo '<li><span>'.parsePlanText($row['feature']).'</span></li>';
          }
        }
        ?>
        <li><div><a onclick="showpricepopup('premium');" href="javascript:void(0);" class="price_btn">Order Now</a></div></li>
      </ul>
      </div>
      <div class="columns">
        <ul class="price">
          <li class="price-header OKAY">
            <h4><?php echo $pricingRow['p3-name']; ?></h4>
            <h3><?php echo $pricingRow['p3-pricing']; ?></h3>
            <div>
          </li>
          <?php 
          $planthree = $pricingRow['plan-3'];
          if( $planthree ){
            foreach($planthree as $row) {
              echo '<li><span>'.parsePlanText($row['feature']).'</span></li>';
            }
          }
          ?>
          <li> <div><a onclick="showpricepopup('elite');" href="javascript:void(0);" class="price_btn">Order Now</a></div></li>
        </ul>
        </div>
      </div>
    </div>
    <div class="price-mobile-table margin-t-80">
      <div class="price-accordion-item">
        <h3 class="price-accordion-toggle"><?php echo $pricingRow['p1-name']; ?> (<?php echo $pricingRow['p1-pricing']; ?>)</h3>
        <div class="price-accordion-content">
          <ul>
            <?php 
            $planone = $pricingRow['plan-1'];
            if( $planone ){
              $i = 0;
              foreach($planone as $row){ $i++;
                echo '<li>'.$planFeature[$i]['feature'].'</li>';
                echo '<li><span>'.parsePlanText($row['feature']).'</span></li>';
              }
            }
            ?>
          </ul>
        </div>
        <div class="text-center"><a onclick="showpricepopup('basic');" href="javascript:void(0);" class="order-now">Order Now</a></div>
      </div>
      <div class="price-accordion-item active">
        <h3 class="price-accordion-toggle"><?php echo $pricingRow['p2-name']; ?> (<?php echo $pricingRow['p2-pricing']; ?>)</h3>
        <div class="price-accordion-content">
          <ul>
            <?php 
            $plantwo = $pricingRow['plan-2'];
            if( $plantwo ){
              $i = 0;
              foreach($plantwo as $row){ $i++;
                echo '<li>'.$planFeature[$i]['feature'].'</li>';
                echo '<li><span>'.parsePlanText($row['feature']).'</span></li>';
              }
            }
            ?>
          </ul>
        </div>
        <div class="text-center"><a onclick="showpricepopup('premium');" href="javascript:void(0);" class="order-now">Order Now</a></div>
      </div>
      <div class="price-accordion-item">
        <h3 class="price-accordion-toggle"><?php echo $pricingRow['p3-name']; ?> (<?php echo $pricingRow['p3-pricing']; ?>)</h3>
        <div class="price-accordion-content">
          <ul>
            <?php 
            $planthree = $pricingRow['plan-3'];
            if( $planthree ){
              $i = 0;
              foreach($planthree as $row){ $i++;
                echo '<li>'.$planFeature[$i]['feature'].'</li>';
                echo '<li><span>'.parsePlanText($row['feature']).'</span></li>';
              }
            }
            ?>
          </ul>
        </div>
        <div class="text-center"><a onclick="showpricepopup('elites');" href="javascript:void(0);" class="order-now">Order Now</a></div>
      </div>
    </div>
    <div class="book-con margin-t-60">
        <div><h3>Still Not Decided? Get In Touch With Us</h3></div>
        <div><a onclick="showPopFormbook();" href="javascript:void(0);" class="con-btn">Book A Consultation</a></div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>