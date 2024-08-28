<?php 
/*
Template Name: Version - 8 Template
*/
get_header(); 
$formOpt = get_field('form-opts');
?>
<section class="banner-img-section">
<picture class="main--featured--image__wrapper">
<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/v8-banner.webp">
<source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/v8-banner.png">
<img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/v8-banner.png" alt="Valuecoders" 
width="1920" height="920">
</picture>
<img class="bannerboy" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/banner-boy.png" 
alt="Valuecoders" width="449" height="637">
<div class="container">
<div class="two-box">
  <div class="flex-2 content-box">
    <?php the_content(); ?>
    <div class="clintlogo">
      <div class="logobox">
        <picture>
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/blogo-01.svg" alt="Valuecoders" 
          width="100" height="57">
        </picture>
      </div>
      <div class="logobox">
        <picture>
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/blogo-02.svg" alt="Valuecoders" 
          width="100" height="57">
        </picture>
      </div>
      <div class="logobox">
        <picture>
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/blogo-03.svg" alt="Valuecoders" 
          width="100" height="57">
        </picture>
      </div>
      <div class="logobox">
        <picture>
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/blogo-04.svg" alt="Valuecoders" 
          width="100" height="57">
        </picture>
      </div>
    </div>
  </div>
  <div class="flex-2 banner-form">
    <div class="form-box">
      <div class="form-outer">
        <div class="form-head">
          <?php 
          echo (isset($formOpt['bf-heading']) && !empty($formOpt['bf-heading'])) ? $formOpt['bf-heading'] : 
          '<h3>Request A Proposal</h3><p>Assure Response in 1 business days</p>'; 
          ?>
        </div>
        <form method="POST" action="https://www.valuecoders.com/sendmail-l7.php" id="banner-form" 
        onsubmit="return validateBannerForm();">
          <div class="form-wrap">
            <div class="form-group width-full">
              <div class="user-input">
                <label>Full Name</label>
                <input class="form-input" type="text" id="bn-name" placeholder="Enter Your Name" name="user-name" maxlength="30">
                <small>Please Fill Name.</small>
              </div>
            </div>
            <div class="form-group width-full">
              <div class="user-input">
                <label>Email</label>
                <input type="text" class="form-input" id="bn-email" placeholder="Enter Your Email" name="user-email" 
                maxlength="50">
                <small></small>
              </div>
            </div>
            <div class="form-group  width-full">
              <div class="user-input">
                <label>Phone No.</label>
                <input id="bn-phone" type="tel" placeholder="(Optional)" name="user-phone" maxlength="12" class="form-input input-field">
                <small id="phone-error-vs"></small>
              </div>
            </div>
            <div class="form-group width-full">
              <div class="user-input">
                <label>Select Country</label>
                <input type="text" id="bn-country" class="form-input" placeholder="Select your Country" name="user-country" maxlength="50">
                <small></small>
              </div>
            </div>
            <div class="form-group  width-full form-textarea">
              <div class="user-input">
              <label>Your Requirements</label>
              <textarea class="form-input comment-input" autocomplete="off" id="bn-req" placeholder="" name="user-req"></textarea>
              <small>Please Fill Requirement</small>
              <!-- 
              <div class="drop-input attachment_brw" id="uploadcontact">
                <div id="dropcontact"></div>
              </div> 
              -->
              <div id="drop-area" class="dropzone">
                <input type="file" name="files[]" id="fileElem" multiple=""
                  accept="image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,.txt"
                  onchange="handleFiles(this.files)" style="display:none;">
                <button class="button" id="browse-btn" type="button" 
                onclick="document.getElementById('fileElem').click()">Browse |  Drop Files Here</button>
                <input type="hidden" name="up-counter" id="uplcounter" value="0">
              </div>
              </div>
              <div id="gloader" class="gal-loader">
                <div class="loader"></div>
                <div id="gallery"></div>
              </div>
              <p id="file-type-error"></p>
            </div>
            <div class="form-group  width-full">
              <input type="hidden" name="Uploadedfilename" id="Uploadedfilename" value="">
              <input type="hidden" name="form-action" value="lp">
              <input type="hidden" name="page_url" value="<?php bloginfo('url'); ?>">
              <button type="submit" class="btn btn-big btn-primary btn-padding-x test-1" name="ws-form-sub" id="bnr-submit" 
              value="ws-landing">
              <?php 
              echo (isset($formOpt['bf-cta']) && !empty($formOpt['bf-cta'])) ? $formOpt['bf-cta'] : 
              'Hire Software Developers'; 
              ?></button>
              <span class="privc"><i></i>100% Privacy Guaranteed</span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<div class="client-logo-box-section">
<div class="container">
  <div class="dis-flex">
    <picture>
      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/clinet-image.svg" alt="Valuecoders" 
      width="1021" height="68">
    </picture>
  </div>
</div>
</div>

<section class="customer-testimonial-section padding-t-120 padding-b-120">
<div class="container">
  <div class="head-txt text-center">
    <h2>What People Say After Using Our Services</h2>
    <p>We always on delivering best-in-class app development services that will be loved by our clients.</p>
  </div>
  <?php 
    // if( $isDmPage === true ){
    //   $clReviews = get_field('dm-client-reviews');
    // }else{
    //   $clReviews = get_field('client-review-v4', 'option');  
    // }
    
    $clReviews = get_field('client-review-v4', 'option');
    if( $clReviews ){ 
    // echo '<pre>';
    // print_r($clReviews);
    // echo '</pre>';  
    ?>
    <div class="glider-contain customer-testimonial-slider">
      <div class="glider" id="why-glider">
        <?php 
        foreach( $clReviews as $row){ 
        $rating = ( isset($row['rating']) && !empty($row['rating']) ) ? $row['rating'] : 5;
        ?>
        <div class="slide-item">
          <div class="content-box-outer">
            <div class="content-box <?php echo " str-".$rating; ?>">
              <p><?php echo $row['content']; ?></p>
            </div>
            <div class="cust-img-box dis-flex">
              <div class="profile">
              <?php echo pxlGetPtag($row['thumbnail']); ?>
              </div>
              <div class="profile-text">
                <h5><?php echo $row['client_name']; ?></h5>
                <h6><?php echo $row['designation']; ?></h6>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div role="tablist" class="dots"></div>
    </div>
    <?php } ?>
</div>
</section>

<?php 
$searchEnds = get_field('card-one');
//echo '<pre>'; print_r($searchEnds); die;
if( isset($searchEnds['is_enable']) && ($searchEnds['is_enable'] == "yes") ) :
?>  
<section class="our-challenges padding-t-120 padding-b-120">
<div class="container">
  <div class="head-txt text-center"><?php echo $searchEnds['content']; ?></div>
  <div class="chal-section">
    <div class="dis-flex justify-sb chall-row">
      <div class="flex-2">
        <?php 
        if( $searchEnds['image'] ){
          echo pxlGetPtag( $searchEnds['image'] );
        }
        ?>        
      </div>
      <div class="flex-2 chall-content">
        <?php 
        if( $searchEnds['cards'] ){
        echo '<ul>';
        foreach( $searchEnds['cards'] as $point ){
        $icon = ($point['icon']) ? '<i>'.pxlGetPtag($point['icon']).'</i>' : '';
        echo '<li>'.$icon.$point['text'].'</li>';
        }
        echo '</ul>';
        }
        ?>        
      </div>
    </div>
    <div class="chcta dis-flex justify-sb">
      <p><?php echo $searchEnds['cta-section']; ?></p>
      <a class="yellow-btn" href="javascript:void(0);" onclick="showPopForm();"><?php echo $searchEnds['cta-text']; ?></a>
    </div>
  </div>
</div>
</section>
<?php endif; ?>

<?php 
$whyVC = get_field('wc-value');
if( isset($whyVC['is_enable']) && ($whyVC['is_enable'] == "yes") ) :
?>
<section class="icon-with-img-section bg-cream padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $whyVC['section-content']; ?>
    </div>
    <div class="dis-flex col-box-outer margin-t-60 items-center">
      <div class="flex-2">
        <div class="dis-flex icon-box-outer">
          <?php 
          if( isset($whyVC['listing']) && (count( $whyVC['listing'] ) > 0) ){
            foreach( $whyVC['listing'] as $list ) {
            echo '<div class="flex-2 margin-t-50">
            <div class="dis-flex items-center">
              <span class="icon">'.pxlGetPtag($list['icon']).'</span>
              <span class="icon-txt">'.$list['text'].'</span>
            </div>
          </div>';    
            }  
          }
          ?>
        </div>
      </div>
      <div class="flex-2 text-right right-box">
        <?php 
        if( isset($whyVC['image']) && is_array( $whyVC['image'] ) ){
          echo pxlGetPtag( $whyVC['image'] );
        }else{
        ?>        
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/hire-dash-image.webp">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/hire-dash-image.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/hire-dash-image.png" alt="Valuecoders" 
          width="778" height="525">
        </picture>        
        <?php } ?>
      </div>
    </div>
    
    <div class="count-box-section  margin-t-70">
      <div class="count-box-outer dis-flex">
        <div class="count-box flex-4">
          <span class="count-box-big">18+</span>
          <span class="count-box-small">Years in Business</span>
        </div>
        <div class="count-box flex-4">
          <span class="count-box-big">650+</span>
          <span class="count-box-small">Software Developers</span>
        </div>
        <div class="count-box flex-4">
          <span class="count-box-big">2000+</span>
          <span class="count-box-small">Man Years Experience</span>
        </div>
        <div class="count-box flex-4">
          <span class="count-box-big">2500+</span>
          <span class="count-box-small">Satisfied Customers</span>
        </div>
      </div>
    </div>
    <div class="margin-t-70 text-center">
      <span class="txtadd">Talk to our consultants</span>
      <a class="yellow-btn" href="javascript:void(0);" onclick="showPopForm();">Contact Us Now</a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$hireCard = get_field('card-two');
if( isset($hireCard['is_enable']) && ($hireCard['is_enable'] == "yes") ) :
?>
<section class="three-column-icon-section  padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center"><?php echo $hireCard['content']; ?></div>
    <?php 
    if( $hireCard['cards'] ){
      echo '<div class="dis-flex col-box-outer margin-t-60">';
        foreach( $hireCard['cards'] as $card ){
          echo '<div class="flex-3 box-3">
          <div class="box bg-blue-opacity-light">'.pxlGetPtag($card['icon']).$card['text'].'</div>
          </div>';
        }
      echo '</div>';
    }  
    ?>
    <div class="margin-t-70 text-center">
      <span class="txtadd">Talk to our Consultants</span>
      <a class="yellow-btn" onclick="showPopForm();" href="javascript:void(0);"><?php echo $hireCard['cta-text']; ?></a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$calCall = get_field('calc-call');
if( isset($calCall['is_enable']) && ($calCall['is_enable'] == "yes") ) :
?>
<section class="vc-chartbook bg-cream padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center"><?php echo $calCall['content']; ?></div>
    <?php 
    if( $calCall['cards'] ){
      $i = 0;  
      echo '<div class="chart-flex padding-t-60">';
      foreach( $calCall['cards'] as $row ){
        echo '<div class="chart-col">';
        echo $row['text'];
        if(++$i === count( $calCall['cards'] )){
          echo '<div class="col-btn">
          <a class="yellow-btn" onclick="showPopForm();" href="javascript:void(0);">'.$calCall['cta-text'].'</a></div>';
        }
        echo '</div>';
      }
      echo '</div>';
    }
    ?>    
  </div>
</section>
<?php endif; ?>

<?php 
$vetPro = get_field('vet-process');
if( isset($vetPro['is_enable']) && ($vetPro['is_enable'] == "yes") ) :
?>
<section class="vetting-process padding-t-120 padding-b-120">
<div class="container">
  <div class="head-txt text-center">
    <?php echo $vetPro['content']; ?>    
  </div>
  <div class="process-tabs margin-t-80">
    <?php 
    if( $vetPro['process'] ){
    echo '<nav id="tabs" class="process-tb"><ul>';
    $i = 0;
    $stars = [0,303,262,221,181,143];
    foreach( $vetPro['process'] as $pro ){ 
    $i++;
    $active = ( $i === 1 )  ? 'active' : '';
    echo '<li class="'.$active.'"><a href="#tab'.$i.'">
    <span>'.$i.'</span><img src="'.get_bloginfo('template_url').'/assets-v2/images/v8/process-0'.$i.'.svg" 
    width="'.$stars[$i].'" height="50" alt=""></a></li>';
    }
    echo '<li><a href="#tab6"><img class="inactive" src="'.get_bloginfo('template_url').'/assets-v2/images/v8/process-06.svg" width="103" height="50" alt=""><img class="active-img" src="'.get_bloginfo('template_url').'/assets-v2/images/v8/yel-shape.png" width="103" height="50" alt=""></a></li>';
    echo '</ul></nav>';  
    echo '<div id="tab-contents" class="tab-data">';
    $i = 0;
    foreach( $vetPro['process'] as $pro ){ $i++;
    $active = ( $i === 1 )  ? 'active' : '';
    echo '<div id="tab'.$i.'" class="tab-contents '.$active.'">
        <div class="dis-flex">
          <div class="flex-2">'.$pro['text'].'</div>
        </div>
      </div>';  
    }
    echo '<div id="tab6" class="tab-contents">
        <div class="dis-flex">
          <div class="flex-2">
          <h3>Done!</h3>
          <p>The top 1% of tech talent are hired and can start client delivery.</p>
          </div>
        </div>
      </div>';  
    echo '</div>';
    }
    ?>
  </div>
</div>
</section>
<?php endif; ?>

<?php 
$devStacks = get_field('dev-stacks');
if( isset($devStacks['is_enable']) && ($devStacks['is_enable'] == "yes") ) :
?>
<section class="three-column-icon-section tools-developer bg-cream  padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $devStacks['section_heading']; ?>
    </div>
    <?php 
    if( $devStacks['cards'] ){
    echo '<div class="dis-flex col-box-outer margin-t-60">';
    foreach( $devStacks['cards'] as $card){
    echo '<div class="flex-4 box-4"><div class="box">'.pxlGetPtag($card['icon']).$card['text'].'</div></div>';
    }
    echo '</div>';  
    }
    ?>
  </div>
</section>
<?php endif; ?>

<?php 
$csSlider = get_field('work-sample');
if( isset($csSlider['is_enable']) && $csSlider['is_enable'] == "yes" ) :
?>
<section class="industry-casestudy-sec padding-t-120 padding-b-120" id="industry">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $csSlider['title']; ?>
    </div>
    <?php 
      if( $csSlider['slides'] ){
        echo '<div class="case-study-sec margin-t-50">
        <div class="glider-contain">
          <div class="glider industry-case-sec">';
          foreach( $csSlider['slides'] as $row ){
          echo '<div class="slide-item">
              <div class="dis-flex content">
                <div class="caseimg">'.pxlGetPtag($row['thumbnail']).'</div>
                <div class="casetext">'.$row['title'].'</div>
              </div>
            </div>';  
          }
          echo '</div>
          <div class="prev-next-btn">
            <button class="glider-prev"></button>
            <button class="glider-next"></button>
          </div>
        </div>
      </div>';
      }
      ?>
  </div>
</section>
<?php endif; ?>

<?php 
$inDev = get_field('inhouse-developers');
if( isset($inDev['is_enable']) && $inDev['is_enable'] == "yes" ) :
?>
<section class="team-engage bg-cream padding-b-120 padding-t-120">
  <div class="container">
    <div class="head-txt text-center"><?php echo $inDev['section_heading']; ?></div>
    <div class="dis-flex justify-sb items-center process-row margin-t-80">
      <div class="col-right content-col">
        <div class="process-step">
          <?php 
          if($inDev['rows']){
          foreach( $inDev['rows'] as $row ){
          echo '<div class="step-sec dis-flex">
            <div class="step-icon">'.pxlGetPtag($row['icon']).'</div>
            <div class="step-desc">'.$row['text'].'</div>
          </div>';
          }  
          } 
          ?>
        </div>
        <a class="yellow-btn" onclick="showPopForm();" href="javascript:void(0);">Contact Us Now</a>
      </div>
      <div class="col-left"><?php echo pxlGetPtag( $inDev['image'] ); ?></div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$hireStep = get_field('col-hirestep');
if( isset($hireStep['is_enable']) && $hireStep['is_enable'] == "yes" ) :
?>
<section class="step-icon-img-section  padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center">
    <?php echo $hireStep['content']; ?>        
    </div>
    <div class="our-process margin-t-100">
      <picture  class="desktop">
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hiring-image.png">
        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hiring-image.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hiring-image.png" alt="Valuecoders">
      </picture>
      <div class="dis-flex col-box-outer margin-t-80">
        <div class="flex-4">
          <div class="box">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-01.png">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-01.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-01.png" alt="Valuecoders" width="39"
                height="39">
            </picture>
            <span class="step">STEP-1</span>
            <h3>Inquiry</h3>
            <p>We get on a call to understand your requirements and evaluate mutual fitment.</p>
          </div>
        </div>
        <div class="flex-4">
          <div class="box">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-02.png">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-02.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-02.png" alt="Valuecoders" width="39"
                height="39">
            </picture>
            <span class="step">STEP-2</span>
            <h3>Select Developers</h3>
            <p>We give you access to our 650+ skilled developers to personally interview and select the best candidate for your team.</p>
          </div>
        </div>
        <div class="flex-4">
          <div class="box">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-03.png">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-03.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-03.png" alt="Valuecoders" width="39"
                height="39">
            </picture>
            <span class="step">STEP-3</span>
            <h3>Team Integration</h3>
            <p>Our developers are now a part of your team. Assign tasks and receive daily updates for seamless collaboration and accountability.</p>
          </div>
        </div>
        <div class="flex-4">
          <div class="box">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-04.png">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-04.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/hd-04.png" alt="Valuecoders" width="39"
                height="39">
            </picture>
            <span class="step">STEP-4</span>
            <h3>Team Scaling</h3>
            <p>We provide you with the flexibility to scale your team, whether it be expanding or reducing team size.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$hireModel = get_field('hire-model');
if( isset($hireModel['is_enable']) && ($hireModel['is_enable'] == "yes") ) :
?>    
<section class="three-column-icon-section bg-cream padding-t-120 padding-b-120">
<div class="container">
  <div class="head-txt text-center"><?php echo $hireModel['content']; ?>
  </div>
  <div class="dis-flex col-box-outer margin-t-60">
    <div class="flex-3 box-3">
      <div class="box">
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.webp">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-1.png" alt="Valuecoders"
            width="64" height="61">
        </picture>
        <h3>Dedicated Team</h3>
        <div class="content-box">
          <p>It is an expert autonomous team comprising of different roles (e.g. project manager,
            software engineers, QA engineers, and other roles) capable of delivering technology
            solutions rapidly and efficiently. The roles are defined for each specific project and
            management is conducted jointly by a Scrum Master and the client's product owner.
          </p>
          <ul>
            <li>Agile processes</li>
            <li>Transparent pricing</li>
            <li>Monthly billing</li>
            <li>Maximum flexibility</li>
            <li>Suitable for startups, MVPs and software </li>
            <li>product companies</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="flex-3 box-3">
      <div class="box">
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.webp">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-2.png" alt="Valuecoders"
            width="64" height="61">
        </picture>
        <h3>Team Augmentation</h3>
        <div class="content-box">
          <p>Suitable for every scale of business and project, team augmentation helps add required
            talent to you team to fill the talent gap. The augmented team members work as part of
            your local or distributed team, attending your regular daily meetings and reporting
            directly to your managers. This helps businesses scale immediately and on-demand.
          </p>
          <ul>
            <li>Scale on-demand</li>
            <li>Quick & cost-effective</li>
            <li>Monthly billing</li>
            <li>Avoid hiring hassles</li>
            <li>Transparent pricing</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="flex-3 box-3">
      <div class="box">
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.webp">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/light-dot-net-modal-icon-3.png" alt="Valuecoders"
            width="64" height="61">
        </picture>
        <h3>Project Based</h3>
        <div class="content-box">
          <span class="content-head">Fixed Price Model:</span>
          <p>When project specifications, scope, deliverables and acceptance criteria are clearly
            defined, we can evaluate and offer a fixed quote for the project. This is mostly
            suitable for small-mid scale projects with well documented specifications.
          </p>
          <span class="content-head">Time & Material Model:</span>
          <p>Suitable for projects that have undefined or dynamic scope requirements or complicated
            business requirements due to which the cost estimation is not possible. Therefore,
            developers can be hired per their time.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php endif; ?>

<section class="contact-us-section padding-t-120 padding-b-60">
  <div class="container">
    <div class="dis-flex justify-sb">
      <div class="left-box">
        <h2>Talk To Our Consultants</h2>
        <p>Get Custom Solutions & Recommendations, Estimates.</p>
        <div class="side-dash1 list-box">
          <h3>Fill up your details</h3>
          <p>Your data is 100% confidential</p>
        </div>
        <div class="side-dash2 list-box">
          <h3>What’s next?</h3>
          <p>One of our Account Managers will contact you<br> shortly</p>
          <div class="dis-flex  items-center award-logo">
            <div class="logo-box">
              <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/fimage-01.svg" alt="Valuecoders" width="41" height="40"> 
              </picture>
            </div>
            <div class="logo-box">
              <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/fimage-02.svg" alt="Valuecoders" width="41" height="40"> 
              </picture>
            </div>
            <div class="logo-box">
              <picture>
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/fimage-03.svg" alt="Valuecoders" width="41" height="40"> 
              </picture>
            </div>
          </div>
        </div>
      </div>
      <div class="right-box">
        <form id="footer-contact-form" action="https://www.valuecoders.com/sendmail-l7.php" class="contact-form-section" 
        enctype="multipart/form-data" method="POST" onsubmit="return _footerFormValidator();">
          <div class="form-inner dis-flex">
            <div class="form-text-cont">
              <div class="user-input">
                <label>Full Name</label>
                <input type="text" autocomplete="off" id="ft-name" placeholder="Full Name" class="input-field" value="" 
                name="user-name">
                <small>Error Message</small>
              </div>
            </div>
            <div class="form-text-cont">
              <div class="user-input">
                <label>Email Address</label>
                <input type="text" autocomplete="off" id="ft-email" placeholder="Email Address" class="input-field" value="" 
                name="user-email">
                <small>Error Message</small>
              </div>
            </div>
            <div class="form-text-cont">
              <div class="user-input">
                <label>Phone Number</label>
                <input type="text" autocomplete="off" class="input-field" id="ft-phone" placeholder="Phone Number (Optional)" 
                value="" name="user-phone">
                <small>Error Message</small>
              </div>
            </div>

            <div class="form-text-cont cont_country_section">
              <div class="user-input">
                <label>Country</label>
                <input class="input-field input-skype" autocomplete="off" id="ft-country" type="text" placeholder="Country" 
                value="" name="user-country">
                <small>Error Message</small>
              </div>
            </div>
            <div class="form-text-cont width-full">
              <label>Description</label>
              <div class="user-input">
                <textarea class="input-field comment-input" autocomplete="off" id="ft-req" placeholder="Project Brief" name="user-req"></textarea>
                <small>Error Message</small>                
                <div id="drop-area-fo" class="dropzone">
                  <input type="file" name="files[]" id="fileElem-fo" multiple=""
                  accept="image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,.txt"
                  onchange="handleFilesFo(this.files)" style="display:none;">
                  <button class="button" id="browse-btn" type="button" 
                  onclick="document.getElementById('fileElem-fo').click()">Browse |  Drop Files Here</button>
                  <input type="hidden" name="up-counter" id="uplcounter-fo" value="0">
                </div>
                </div>
                <div id="gloader-fo" class="gal-loader">
                  <div class="loader"></div>
                  <div id="gallery-fo"></div>
                </div>
                <p id="file-type-error-fo"></p>
             </div>            
         </div> 
          <div class="form-group justify-right">
            <div class="btn-sec">
              <div class="user-input cta-btn checkout">
                <div class="user-input btn rounded checkout">
                  <input type="hidden" name="Uploadedfilename" id="Uploadedfilename-fo" value="">
                  <input type="hidden" name="form-action" value="lp">
                  <input type="hidden" name="page_url" value="<?php bloginfo('url'); ?>">
                  <input type="submit" id="footer-submitButton" class="checkout-submit" 
                  value="<?php echo (isset($formOpt['fo-cta']) && !empty($formOpt['fo-cta'])) ? $formOpt['fo-cta'] :  
                  'Enquire Now'; ?>">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>

<div class="footer-sec margin-t-60">
  <div class="footer-top address-sec">
    <div class="container">
      <div class="dis-flex">
        <div class="flex-4">
          <p><strong>Our Offices:</strong></p>
        </div>
        <div class="flex-4">
          <p><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/us-flag.svg" alt="Valuecoders" width="33" height="24"><strong>US</strong></p>
          <p>5900 Balcones Drive, STE 100, Austin, TX 78731, USA</p>
        </div>
        <div class="flex-4">
          <p><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/uk-flag.svg" alt="Valuecoders" width="33" height="24"><strong>UK</strong></p>
          <p>167-169 Great Portland Street, 5th Floor, London W1W 5PF, UK</p>
        </div>
        <div class="flex-4">
          <p><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/india-flag.svg" alt="Valuecoders" width="33" height="24"><strong>INDIA</strong></p>
          <p>2nd Floor, 55P, Sector 44, Gurugram 122003, Haryana, India</p>
        </div>
        <div class="flex-4">
          <p><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/india-flag.svg" alt="Valuecoders" width="33" height="24"><strong>INDIA</strong></p>
          <p>11th Floor, Max Square, Noida-Greater Noida Expy, Sector 129, Noida, Uttar Pradesh 201304</p>
        </div>
      </div>
    </div>
  </div>
</div>
</section> <!-- //contact-us-section -->

<div class="popup-box">
<div id="vc-fxdform" class="flex-2 banner-form form-pop-up-box">
  <div class="form-center">
    <div id="vc-frm-outer" class="form-box-outer">
      <span class="pop-close" onclick="return close_vpop();"></span>
      <div class="head-txt text-center">
        <div id="fh-cmn" style="display: block;">
          <h2>Share Your Requirements</h2>
          <p>We'll get back to you shortly!</p>
        </div>
        <div class="top-text text-center" id="fh-bookdemo" style="display:none;">
          <h2>Connect with Us</h2>
          <p>Get No Obligation Free Quote!</p>
        </div>
      </div>
      <div class="form-wrap">
        <div class="form-content">
          <?php echo (isset($formOpt['pp-text']) && !empty($formOpt['pp-text'])) ? $formOpt['pp-text'] : '';  ?>
          <picture>
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/form-companylogo.svg" alt="Valuecoders" width="528" height="56" data-lazy-src="<?php bloginfo('template_url'); ?>/assets-v2/images/form-companylogo.svg" data-ll-status="loaded" class="entered lazyloaded">
            <noscript><img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/form-companylogo.svg" alt="Valuecoders" width="528" height="56"></noscript>
          </picture>
        </div>
        <div id="vc-fxdform" class="form-section">
          <form method="POST" action="https://www.valuecoders.com/sendmail-l7.php" onsubmit="return _popFormValidator();" enctype="multipart/form-data" id="pop-contact-form" method="POST">
            <div class="form-inner dis-flex" id="pop-form">
              <div class="form-text-cont">
                <div class="user-input">
                  <input type="text" id="po-name" placeholder="Full Name" class="input-field" value="" name="user-name">
                  <small></small>
                </div>
                
              </div>
              <div class="form-text-cont">
                <div class="user-input">
                  <input type="text" id="po-email" placeholder="Email Address" class="input-field" value="" name="user-email">
                  <small></small>
                </div>
                
              </div>
              <div class="form-text-cont">
                <div class="user-input">
                  <input type="tel" maxlength="15" id="po-phone" class="input-field" placeholder="Phone Number (optional)" 
                  value="" name="user-phone">
                  <small></small>
                </div>
                
              </div>
              <div class="form-text-cont">
                <div class="user-input">
                <input class="input-field input-skype" id="po-country" type="text" placeholder="Country" value="" 
                name="user-country">
                <small></small>
                </div>                
              </div>
              <div class="form-text-cont width-full">
                <div class="user-input">
                <textarea class="input-field comment-input" id="po-req" placeholder="Your Requirements" name="user-req"></textarea>
                <small></small>
                </div>                
              </div>
            </div>
            <div class="user-input checkout">
              <input type="hidden" name="form-action" value="lp">
              <input type="hidden" name="page_url" value="<?php bloginfo('url'); ?>">
              <input type="submit" id="pop-submitButton" class="checkout-submit ch111" 
              value="<?php echo (isset($formOpt['pp-cta']) && !empty($formOpt['pp-cta'])) ? $formOpt['pp-cta'] : 
              'CONTACT US NOW'; ?>">
            </div>
            <span class="privc"><i></i>100% Privacy Guaranteed</span>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php get_footer(); ?>