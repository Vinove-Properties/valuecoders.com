<?php 
/*
Template Name: Version - 8 Template
*/
get_header(); ?>
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
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/blogo-01.svg" alt="Valuecoders" width="100" height="57">
        </picture>
      </div>
      <div class="logobox">
        <picture>
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/blogo-02.svg" alt="Valuecoders" width="100" height="57">
        </picture>
      </div>
      <div class="logobox">
        <picture>
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/blogo-03.svg" alt="Valuecoders" width="100" height="57">
        </picture>
      </div>
      <div class="logobox">
        <picture>
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/blogo-04.svg" alt="Valuecoders" width="100" height="57">
        </picture>
      </div>
    </div>
  </div>
  <div class="flex-2 banner-form">
    <div class="form-box">
      <div class="form-outer">
        <div class="form-head">
          <h3>Request A Proposal</h3>
          <p>Assure Response in 1 business days</p>
        </div>
        <form>
          <div class="form-wrap">
            <div class="form-group width-full">
              <div class="user-input">
                <label>Full Name</label>
                <input class="form-input" type="text" id="ft-name" placeholder="Enter Your Name" name="user-name" maxlength="30">
                <small>Please Fill Name.</small>
              </div>
            </div>
            <div class="form-group width-full">
              <div class="user-input">
                <label>Email</label>
                <input type="text" class="form-input" id="ft-email" placeholder="Enter Your Email" name="user-email" maxlength="50">
                <small></small>
              </div>
            </div>
            <div class="form-group  width-full">
              <div class="user-input">
                <label>Phone No.</label>
                <input id="ft-phone" type="tel" placeholder="(Optional)" name="user-phone" maxlength="12" class="form-input input-field">
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
                <textarea class="form-input comment-input" autocomplete="off" id="user-req" placeholder="" name="user-req"></textarea>
                <small>Please Fill Requirement</small>
                <div class="drop-input attachment_brw" id="uploadcontact">
                  <div id="dropcontact"></div>
                </div>
                <div id="drop-area">
                  <input type="file" name="files[]" id="fileElem" multiple=""
                    accept="image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,.txt"
                    onchange="handleFiles(this.files)" style="display:none;">
                  <button class="button" id="browse-btn" type="button"
                    onclick="document.getElementById('fileElem').click()">Browse |  Drop Files Here</button>
                  <input type="hidden" name="up-counter" id="uplcounter" value="0">
                </div>
              </div>
            </div>
            <div class="form-group  width-full">
              <button type="submit" class="btn btn-big btn-primary btn-padding-x test-1" name="ws-form-sub" id="pxl-submit-top" value="ws-landing">Hire Software Developers</button>
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
  <div class="glider-contain customer-testimonial-slider">
    <div class="glider" id="glider">
      <div class="slide-item">
        <div class="content-box-outer">
          <div class="content-box">
            <p>We have been working with ValueCoders for the last year now and have deployed multiple developers at different points in time. We are really happy with the support we get from ValueCoders and the resources they provide.</p>
          </div>
          <div class="cust-img-box dis-flex">
            <div class="profile">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/profile-small-1.webp">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/profile-small-1.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/profile-small-1.png" alt="Valuecoders" width="48" height="48">
              </picture>
            </div>
            <div class="profile-text">
              <h5>Darrell Steward</h5>
              <h6>President & CEO MasterCard</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="slide-item">
        <div class="content-box-outer">
          <div class="content-box">
            <p>We have been working with ValueCoders for the last year now and have deployed multiple developers at different points in time. We are really happy with the support we get from ValueCoders and the resources they provide.</p>
          </div>
          <div class="cust-img-box dis-flex">
            <div class="profile">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/profile-small-1.webp">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/profile-small-1.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/profile-small-1.png" alt="Valuecoders" width="48" height="48">
              </picture>
            </div>
            <div class="profile-text">
              <h5>Darrell Steward</h5>
              <h6>President & CEO MasterCard</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="slide-item">
        <div class="content-box-outer">
          <div class="content-box">
            <p>We have been working with ValueCoders for the last year now and have deployed multiple developers at different points in time. We are really happy with the support we get from ValueCoders and the resources they provide.</p>
          </div>
          <div class="cust-img-box dis-flex">
            <div class="profile">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/profile-small-1.webp">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/profile-small-1.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/profile-small-1.png" alt="Valuecoders" width="48" height="48">
              </picture>
            </div>
            <div class="profile-text">
              <h5>Darrell Steward</h5>
              <h6>President & CEO MasterCard</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div role="tablist" class="dots"></div>
  </div>
</div>
</section>

<?php 
$searchEnds = get_field('card-one');
if( isset($searchEnds['is_enable']) && ($searchEnds['is_enable'] == "yes") ) :
?>
<section class="result-driven padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center"><?php echo $searchEnds['content']; ?></div>
    <?php 
    if( $searchEnds['cards'] ){
      echo '<div class="dis-flex result-row">';
      foreach( $searchEnds['cards'] as $card ){
      echo '<div class="flex-3">
        <div class="box">'.pxlGetPtag($card['icon']).$card['text'].'</div>
      </div>';
      }
      echo '<div class="btn-div text-center">
      <a onclick="showPopForm();" href="javascript:void(0);" class="yellow-btn">'.$searchEnds['cta-text'].'</a>
      </div>';
      echo '</div>';
    }
    ?>
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
          <div class="flex-2 margin-t-50">
            <div class="dis-flex items-center">
              <span class="icon">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v2-icon1.png" alt="Valuecoders" width="48"
                height="54">
              </span>
              <span class="icon-txt">Experienced<br> software developers</span>
            </div>
          </div>
          <div class="flex-2 margin-t-50">
            <div class="dis-flex items-center">
              <span class="icon">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v2-icon2.png" alt="Valuecoders" width="55"
                height="55">
              </span>
              <span class="icon-txt">Flexible engagement<br> options</span>
            </div>
          </div>
          <div class="flex-2 margin-t-50">
            <div class="dis-flex items-center">
              <span class="icon">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v2-icon3.png" alt="Valuecoders" width="54"
                height="54">
              </span>
              <span class="icon-txt">Cost-effective<br> solutions</span>
            </div>
          </div>
          <div class="flex-2 margin-t-50">
            <div class="dis-flex items-center">
              <span class="icon">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v2-icon4.png" alt="Valuecoders" width="55"
                height="54">
              </span>
              <span class="icon-txt">Daily/weekly/monthly<br> reporting</span>
            </div>
          </div>
          <div class="flex-2 margin-t-50">
            <div class="dis-flex items-center">
              <span class="icon">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v2-icon5.png" alt="Valuecoders" width="59"
                height="54">
              </span>
              <span class="icon-txt">160 man hours<br> guaranteed</span>
            </div>
          </div>
          <div class="flex-2 margin-t-50">
            <div class="dis-flex items-center">
              <span class="icon">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v2-icon6.png" alt="Valuecoders" width="50"
                height="50">
              </span>
              <span class="icon-txt">Smooth <br> communication</span>
            </div>
          </div>
          <div class="flex-2 margin-t-50">
            <div class="dis-flex items-center">
              <span class="icon">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v2-icon7.png" alt="Valuecoders" width="44"
                height="54">
              </span>
              <span class="icon-txt">Complementary <br> development manager</span>
            </div>
          </div>
          <div class="flex-2 margin-t-50">
            <div class="dis-flex items-center">
              <span class="icon">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v2-icon8.png" alt="Valuecoders" width="50"
                height="50">
              </span>
              <span class="icon-txt">Ongoing internal L&D<br> programs</span>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-2 text-right right-box">        
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/hire-dash-image.webp">
          <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/hire-dash-image.png">
          <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/hire-dash-image.png" alt="Valuecoders" 
          width="778" height="525">
        </picture>        
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
      <a class="yellow-btn" href="javascript:void(0);" onclick="showPopFormOp();">Contact Us Now</a>
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
      <a class="yellow-btn" href="#"><?php echo $hireCard['cta-text']; ?></a>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="vc-chartbook bg-cream padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center">
      <h2>Weigh Your Options Well</h2>
      <p>Take A Calculated Call On Outsourcing</p>
    </div>
    <div class="chart-flex padding-t-120">
      <div class="chart-col">
        <h3>Factors that matter </h3>
        <ul>
          <li>Government policies</li>
          <li>Long notice period</li>
          <li>Taxation</li>
          <li>Compensation package </li>
          <li>Probability of being sued</li>
          <li>H1-B benefits </li>
          <li>Loss incurred </li>
        </ul>
      </div>
      <div class="chart-col">
        <h3>Local Hiring</h3>
        <ul>
          <li>Rigid</li>
          <li>Yes</li>
          <li>Tedious</li>
          <li>High</li>
          <li>High</li>
          <li>Rigid</li>
          <li>50,000$ approx.</li>
        </ul>
      </div>
      <div class="chart-col">
        <h3>Remote hiring <span>With <strong> VC </strong></span> 
        <img src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/rocket.gif" width="50" height="50" alt=""> 
        </h3>
        <ul>
          <li>Flexible</li>
          <li>Just 5 days</li>
          <li>VE’s responsibility</li>
          <li>Nil</li>
          <li>Nil</li>
          <li>H1-B benefits without H1-B hurdles  </li>
          <li>0$</li>
          <a class="yellow-btn" href="#">Outsource to India</a>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="vetting-process padding-t-120 padding-b-120">
<div class="container">
  <div class="head-txt text-center">
    <h2>Your success starts with our vetting process.</h2>
    <p>Our rigorous screening process guarantees top-tier developers for exceptional results.
    </p>
  </div>
  <div class="process-tabs margin-t-80">
    <nav id="tabs" class="process-tb">
      <ul>
        <li class="active"><a href="#tab1"><span>1</span><img src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/process-01.svg" width="303" height="50" alt=""></a></li>
        <li><a href="#tab2"><span>2</span><img src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/process-02.svg" width="262" height="50" alt=""></a></li>
        <li><a href="#tab3"><span>3</span><img src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/process-03.svg" width="221" height="50" alt=""></a></li>
        <li><a href="#tab4"><span>4</span><img src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/process-04.svg" width="181" height="50" alt=""></a></li>
        <li><a href="#tab5"><span>5</span><img src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/process-05.svg" width="143" height="50" alt=""></a></li>
        <li><img src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/process-06.svg" width="103" height="50" alt=""></li>
      </ul>
    </nav>
    <div id="tab-contents" class="tab-data">
      <div id="tab1" class="tab-contents active">
        <div class="dis-flex">
          <div class="flex-2">
            <h3>Written test</h3>
            <p>If all goes well, we examine creativity and problem-solving with some written tests.</p>
          </div>
          <div class="flex-2">
            <h3>Job Application</h3>
            <p>We receive more than 1 million applications from talented developers each year.</p>
          </div>
        </div>
      </div>
      <div id="tab2" class="tab-contents">
        <div class="dis-flex">
          <div class="flex-2">
            <h3>Test 2</h3>
            <p>If all goes well, we examine creativity and problem-solving with some written tests.</p>
          </div>
          <div class="flex-2">
            <h3>Job Application</h3>
            <p>We receive more than 1 million applications from talented developers each year.</p>
          </div>
        </div>
      </div>
      <div id="tab3" class="tab-contents">
        <div class="dis-flex">
          <div class="flex-2">
            <h3>Test 3</h3>
            <p>If all goes well, we examine creativity and problem-solving with some written tests.</p>
          </div>
          <div class="flex-2">
            <h3>Job Application</h3>
            <p>We receive more than 1 million applications from talented developers each year.</p>
          </div>
        </div>
      </div>
      <div id="tab4" class="tab-contents">
        <div class="dis-flex">
          <div class="flex-2">
            <h3>Test 4</h3>
            <p>If all goes well, we examine creativity and problem-solving with some written tests.</p>
          </div>
          <div class="flex-2">
            <h3>Job Application</h3>
            <p>We receive more than 1 million applications from talented developers each year.</p>
          </div>
        </div>
      </div>
      <div id="tab5" class="tab-contents">
        <div class="dis-flex">
          <div class="flex-2">
            <h3>Test 5</h3>
            <p>If all goes well, we examine creativity and problem-solving with some written tests.</p>
          </div>
          <div class="flex-2">
            <h3>Job Application</h3>
            <p>We receive more than 1 million applications from talented developers each year.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<section class="three-column-icon-section tools-developer bg-cream  padding-t-120 padding-b-120">
  <div class="container">
    <div class="head-txt text-center">
      <h2>Technology & Development Stacks</h2>
      <p>We Are An Expert App Development Company And Use The Best Technologies And Platforms To Deliver
        High-Quality Products.
      </p>
    </div>
    <div class="dis-flex col-box-outer margin-t-60 ">
      <div class="flex-4 box-4">
        <div class="box">
          <picture class="dark-light-img">
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-01.webp">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-01.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-01.png" alt="Valuecoders" width="29"
              height="46">
          </picture>
          <h3>Mobile Technologies</h3>
          <ul>
            <li>PHP</li>
            <li>ASP.Net</li>
            <li>Angular</li>
            <li>React</li>
            <li>Java</li>
            <li>Vue</li>
          </ul>
        </div>
      </div>
      <div class="flex-4 box-4">
        <div class="box">
          <picture class="dark-light-img">
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-02.webp">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-02.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-02.png" alt="Valuecoders" width="35"
              height="45">
          </picture>
          <h3>Front-end Technologies</h3>
          <ul>
            <li>PHP</li>
            <li>ASP.Net</li>
            <li>Angular</li>
            <li>React</li>
            <li>Java</li>
            <li>Vue</li>
          </ul>
        </div>
      </div>
      <div class="flex-4 box-4">
        <div class="box">
          <picture class="dark-light-img">
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-03.webp">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-03.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-03.png" alt="Valuecoders" width="35"
              height="35">
          </picture>
          <h3>Back-end Technologies</h3>
          <ul>
            <li>PHP</li>
            <li>ASP.Net</li>
            <li>Angular</li>
            <li>React</li>
            <li>Java</li>
            <li>Vue</li>
          </ul>
        </div>
      </div>
      <div class="flex-4 box-4">
        <div class="box">
          <picture class="dark-light-img">
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-04.webp">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-04.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/tech-icon-04.png" alt="Valuecoders" width="46"
              height="46">
          </picture>
          <h3>Other Technologies</h3>
          <ul>
            <li>PHP</li>
            <li>ASP.Net</li>
            <li>Angular</li>
            <li>React</li>
            <li>Java</li>
            <li>Vue</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="industry-casestudy-sec padding-t-120 padding-b-120" id="industry">
<div class="container">
  <div class="head-txt text-center">
    <h2>Our App Development Work Samples</h2>
  </div>
  <div class="case-study-sec margin-t-50">
    <div class="glider-contain">
      <div class="glider industry-case-sec">
        <div class="slide-item">
          <div class="dis-flex content">
            <div class="caseimg">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/work-sample/bio-plant.webp">
                <source type="image/jpeg" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/work-sample/bio-plant.png">
                <img src="<?php bloginfo('template_url'); ?>/assets-v2/images/work-sample/bio-plant.png" loading="lazy" alt="Case Study"
                  width="1344" height="574">
              </picture>
            </div>
            <div class="casetext">
              <h3>Bioplant Traceability System</h3>
              <p>It’s a traceability system to maintain the status of a plant. We can create rooms for new plants and then shift for inventory etc. It is a comprehensive product suite that can increase transparency and accountability by monitoring key data points during cultivation, harvest, extraction, packaging, transport, and dispensing.
              </p>
            </div>
          </div>
        </div>
        <div class="slide-item">
          <div class="dis-flex content">
            <div class="caseimg">
              <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/work-sample/bio-plant.webp">
                <source type="image/jpeg" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/work-sample/bio-plant.png">
                <img src="<?php bloginfo('template_url'); ?>/assets-v2/images/work-sample/bio-plant.png" loading="lazy" alt="Case Study"
                  width="1344" height="574">
              </picture>
            </div>
            <div class="casetext">
              <h3>Bioplant Traceability System</h3>
              <p>It’s a traceability system to maintain the status of a plant. We can create rooms for new plants and then shift for inventory etc. It is a comprehensive product suite that can increase transparency and accountability by monitoring key data points during cultivation, harvest, extraction, packaging, transport, and dispensing.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="prev-next-btn">
        <button class="glider-prev"></button>
        <button class="glider-next"></button>
      </div>
    </div>
  </div>
</div>
</section>
<section class="team-engage bg-cream padding-b-120 padding-t-120">
<div class="container">
  <div class="head-txt text-center">
    <h2>A team of <strong>1050+</strong> For any kind of Engagement</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
  </div>
  <div class="dis-flex justify-sb items-center process-row margin-t-80">
    <div class="col-right content-col">
      <div class="process-step">
        <div class="step-sec dis-flex">
          <div class="step-icon">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-01.png">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-01.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-01.png" alt="Valuecoders" width="50"
                height="50">
            </picture>
          </div>
          <div class="step-desc">
            <h3>Staff Augementation</h3>
            <p>Instantly expand your team with our skilled software developers, working directly under your management.</p>
          </div>
        </div>
        <div class="step-sec dis-flex">
          <div class="step-icon">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-01.png">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-01.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-01.png" alt="Valuecoders" width="50"
                height="50">
            </picture>
          </div>
          <div class="step-desc">
            <h3>Software Development Teams</h3>
            <p>Access dedicated, pre-built teams with the exact expertise your project needs, integrating seamlessly with your organization.</p>
          </div>
        </div>
        <div class="step-sec dis-flex">
          <div class="step-icon">
            <picture>
              <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-01.png">
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-01.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-01.png" alt="Valuecoders" width="50"
                height="50">
            </picture>
          </div>
          <div class="step-desc">
            <h3>Software Outsourcing</h3>
            <p>Entrust your entire software project to us—from concept to launch and beyond. We build and deliver within timeline.</p>
          </div>
        </div>
      </div>
      <a class="yellow-btn" href="#">Contact Us Now</a>
    </div>
    <div class="col-left">
      <picture>
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-main.png">
        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-main.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets-v2/images/v8/team-main.png" alt="Valuecoders" width="607"
          height="540">
      </picture>
    </div>
  </div>
</div>
</section>
<section class="step-icon-img-section  padding-t-120 padding-b-120">
      <div class="container">
        <div class="head-txt text-center">
          <h2>Hire Software Developers In 4 Easy Steps</h2>
          <p>Below are the simple steps we follow when you decide to hire our dedicated software developers who are adept at delivering dynamic, custom, and scalable solution</p>
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
    <section class="three-column-icon-section bg-cream padding-t-120 padding-b-120">
      <div class="container">
        <div class="head-txt text-center">
          <h2>Choose From Our Hiring Models</h2>
          <p>With us, you can choose from multiple hiring models that best suit your needs.</p>
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
    <section class="contact-us-section padding-t-120 padding-b-60">
      <div class="container">
        <div class="dis-flex justify-sb">
          <div class="left-box">
            <h2>Talk To Our Consultants</h2>
            <p>Get Custom Solutions & Recommendations, Estimates.</p>
            <div class="side-dash1 list-box">
              <h3>Fill up your details</h3>
              <p>Your data is 100% confidential
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
            <form id="contact-form-section" action="https://www.valuecoders.com/staging/sendmail1.php" class="contact-form-section" enctype="multipart/form-data" method="POST" onsubmit="vcCmnFormValidation(false); return false;">
              <div class="form-inner dis-flex">
                <div class="form-text-cont">
                  <div class="user-input">
                    <label>Full Name</label>
                    <input type="text" autocomplete="off" id="cont_name" placeholder="Full Name" class="input-field" value="" name="user-name">
                    <small>Error Message</small>
                  </div>
                </div>
                <div class="form-text-cont">
                  <div class="user-input">
                    <label>Email Address</label>
                    <input type="text" autocomplete="off" id="cont_email" placeholder="Email Address" class="input-field" value="" name="user-email">
                    <small>Error Message</small>
                  </div>
                </div>
                <div class="form-text-cont">
                  <div class="user-input">
                    <label>Phone Number</label>
                    <input type="text" autocomplete="off" class="input-field" id="cont_phpne" placeholder="Phone Number (Optional)" value="" name="user-phone">
                    <small>Error Message</small>
                  </div>
                </div>
                <div class="form-text-cont cont_country_section">
                  <div class="user-input">
                    <label>Country</label>
                    <input class="input-field input-skype" autocomplete="off" id="cont_country" type="text" placeholder="Country" value="" name="user-country">
                    <small>Error Message</small>
                  </div>
                </div>
                <div class="form-text-cont width-full">
                  <label>Description</label>
                  <div class="user-input">
                    <textarea class="input-field comment-input" autocomplete="off" id="user-req" placeholder="Project Brief" name="user-req"></textarea>
                    <small>Error Message</small>
                    <div class="drop-input attachment_brw" id="uploadcontact">
                      <div id="dropcontact"></div>
                    </div>
                    <div id="drop-area">
                      <input type="file" name="files[]" id="fileElem" multiple="" accept="image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,.txt" onchange="handleFiles(this.files)">
                      <button class="button" id="browse-btn" type="button" onclick="document.getElementById('fileElem').click()">Browse | Drop Files Here</button>
                      <input type="hidden" name="up-counter" id="uplcounter" value="0">
                    </div>
                  </div>
                </div>
              </div>
              <div id="gloader" class="gal-loader">
                <div class="loader"></div>
                <div id="gallery"></div>
              </div>
              <p id="file-type-error"></p>
              <div class="form-group justify-right">
                <div class="btn-sec">
                  <div class="user-input cta-btn checkout">
                    <div class="user-input btn rounded checkout">
                      <input type="submit" id="submitButton" class="checkout-submit" value="Enquire Now">
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
</section>
<?php get_footer(); ?>