<?php 
/*
Template Name: Home Page V6.0 Template
*/ 
global $post;
$thisPostID = $post->ID;
$vcBtn 			= get_field('vc-cta', $thisPostID);
get_header();
?>
<section class="hero-section">
<video class="row-lg vd-lazy" id="background-video" preload="yes"  loop autoplay loop muted playsinline>
<source src="<?php _vers_six('video/home-video.mp4'); ?>" type="video/mp4" type="video/mp4">
</video>
<div class="container">
<div class="dis-flex">
  <div class="left-box">
    <?php the_content(); ?>
    <div class="for-client-logo-box  dis-flex">
      <div class="logo-box logo1"></div>
      <div class="logo-box logo2"></div>
      <div class="logo-box logo3"></div>
      <div class="logo-box logo4"></div>
    </div>
  </div>
</div>
<a class="scroll-next" href="#serv"><span class="scroll-downicon">scroll down</span></a>
</div>
</section>
<section class="award-section padding-t-50 padding-b-120 ">
  <div class="container">
    <div class="top-logo">
      <div class="text"><i><img loading="lazy" src="<?php _vers_six('images/home-images/star-one.svg'); ?>" width="22" height="20"></i>
        <strong>4.5/5</strong>based on 19,000+ reviews on
      </div>
      <div class="awlogo"><a href="#"></a><a href="#"></a><a href="#"></a></div>
    </div>
    <div class="stats">
      <div class="stat"><h2>450+</h2><p>Developers</p></div>
      <div class="stat"><h2>2500+</h2><p>Projects Delivered</p></div>
      <div class="stat"><h2>97%</h2><p>Client Satisfaction</p></div>
    </div>
    <div class="bottom-section">
      <div class="bottom-card">
        <picture><img loading="lazy" src="<?php _vers_six('images/home-images/award-01.svg'); ?>" width="285" height="197"></picture>
      </div>
      <div class="bottom-card highlight">
        <h4>Trusted By</h4>
        <h2>500 <br>Companies</h2>
        <p>all over the world</p>
        <a href="#" class="is-arrow">View Customers</a>
      </div>
      <div class="bottom-card">
        <picture><img loading="lazy" src="<?php _vers_six('images/home-images/award-02.svg'); ?>" width="285" height="170"></picture>
      </div>
    </div>
  </div>
</section>

<?php 
$workWith = get_field('work-with');
if( isset($workWith['is_enabled']) && ($workWith['is_enabled'] == "yes") ) :
?>
<section class="tabs-section padding-t-120 padding-b-120" id="tabs-section-1">
<div class="container">
<div class="tab-flex">
  <div class="tabs-container">
    <div class="top-section"><?php echo $workWith['content']; ?></div>
    <?php 
    if( $workWith['tabs'] ){
      echo '<ul class="tabs">';
      $i = 0;
      foreach( $workWith['tabs'] as $tab ){ $i++;
        $active = ( $i === 1 ) ? 'active' : '';
        echo '<li class="tab '.$active.'" data-target="welm-'.$i.'">
        <img src="'._getvers_six('images/home-images/tabicon0'.$i.'.svg').'" class="normal">
        <img src="'._getvers_six('images/home-images/iconhov0'.$i.'.svg').'" class="hover">
        '.$tab['title'].'</li>';  
      }
      echo '</ul>';
      echo '<div class="tab-content">';
      $i = 0;
      foreach( $workWith['tabs'] as $elm ){ $i++;
      $active = ( $i === 1 ) ? 'active' : '';
      $link = (isset($elm['link']) && !empty($elm['link'])) ? '<a href="'.vc_siteurl($elm['link']).'" class="is-arrow">Explore to Get the details</a>' : '';
      echo '<div class="content '.$active.'" id="welm-'.$i.'">'.$elm['content'].$link.'</div>';  
      }
      echo '</div>';
    }
    ?>    
  </div>
  <?php 
  if( $workWith['tabs'] ){
  echo '<div class="image-container">';
  $i = 0;
  foreach( $workWith['tabs'] as $elm ){ $i++;
    $active = ( $i === 1 ) ? 'active' : '';    
    echo '<img src="'.$elm['image']['url'].'" alt="'.$elm['title'].'" class="tab-image '.$active.'" id="img-welm-'.$i.'">';
  }  
  echo '</div>';  
  }
  ?>  
</div>
</div>
</section>
<?php endif; ?>

<?php 
$servCol = get_field('we-serv');
// echo '<pre>';
// print_r($servCol);
// echo '</pre>';
if( isset($servCol['is_enabled']) && ($servCol['is_enabled'] == "yes") ) :
?>
<section class="service-scroller padding-t-120 padding-b-120" id="serv">
<div class="container">
<div class="service-wrap">
<div class="left-panel">
<div class="top-section"><?php echo $servCol['content']; ?></div>
<div class="ser-button">
  <i><img src="<?php _vers_six('images/home-images/vc-fav.svg'); ?>" width="40" height="40"></i>
  <?php echo $servCol['sub-content']; ?>
  <div class="btn-container"><a href="<?php echo site_url('contact'); ?>" class="cta-button yellow">GET STARTED</a></div>
</div>
</div>
<div class="right-panel">
<?php 
if( $servCol['con-box'] ){
  foreach( $servCol['con-box'] as $block ){
  echo '<div class="content-box">';
  if( $block['image'] ){
  echo '<div class="img-sec">'.vc_pictureElm($block['image']).'</div>';
  }  
  echo '<div class="text-box">'.$block['content'].'</div>';
  if( $block['link'] ){
  echo '<a class="move" href="'.vc_siteurl($block['link']).'"></a>';  
  }  
  echo '</div>';  
  }  
}
?>
</div>
<!--//.right-panel -->
</div>
</div>
</section>
<?php endif; ?>

<?php 
$ctaOne = get_field('blockcta-1');
if( isset($ctaOne['required']) && ($ctaOne['required'] == "yes") ) :
?>
<section class="cta-section">
<div class="container">
<div class="cta-wrap">
  <div class="left-sec">
    <div class="top-section"><?php echo $ctaOne['content']; ?></div>
  </div>
  <div class="right-sec">
    <?php 
    if( $ctaOne['thumb'] ){
      echo vc_pictureElm( $ctaOne['thumb'] );
    }else{
    ?>
    <picture>
      <source type="image/webp" srcset="<?php _vers_six('images/home-images/cta-image.png'); ?>">
      <img loading="lazy" src="<?php _vers_six('images/home-images/cta-image.png'); ?>"width="420" height="394">
    </picture>
    <?php } ?>
  </div>
</div>
</div>
</section>
<?php endif; ?>

<?php 
$itInt = get_field('it-initative');
if( isset($itInt['required']) && ($itInt['required'] == "yes") ) :
?>
<section class="it-services padding-t-120 padding-b-120">
  <div class="container">
  <div class="top-section b-100"><?php echo $itInt['content']; ?></div>
  <?php 
  if( $itInt['cards'] ){
  echo '<div class="services-grid">';
  foreach( $itInt['cards'] as $card ){
    echo '<div class="service-card">
      <div class="service-icon">'.vc_pictureElm($card['icon']).'</div>
      <div class="service-content">'.$card['text'].'</div>
    </div>';
  }
  echo '</div>';  
  }
  ?>
  </div>
</section>
<?php endif; ?>

<?php 
$solElm = get_field('vc-solution');
if( isset($solElm['required']) && ($solElm['required'] == "yes") ) :
?>
<section class="solution-slide-section padding-t-120 padding-b-120">
<div class="container">
  <div class="top-section b-100"><?php echo $solElm['content'] ?></div>
  <?php if( $solElm['sol'] ) {  ?>
  <div class="solution-out">
    <div class="dis-flex solution-slider" id="solution-slide">
      <div class="glider">
        <?php 
        foreach( $solElm['sol'] as $sol ){
        echo '<div class="flex-5">
          <div class="box-5" style="background-image:url('.$sol['image']['url'].');">
            <h3>eLearning</h3>
            <div class="overlay-text">
              <div class="content-box">'.$sol['text'].'</div>
            </div>
          </div>
        </div>';
        }
        ?>
      </div>
      <!-- Progress Bar -->
      <div class="progress-container"><div class="progress-bar solution-progress-bar"></div></div>
      <!-- Navigation Buttons -->
      <div class="prev-next-btn">
        <button class="tail-prev" aria-label="Previous"></button>
        <button class="tail-next" aria-label="Next"></button>
      </div>
      <!-- Hidden Dots -->
      <div class="dots"></div>
    </div>
  </div>
  <?php } ?>
</div>
</section>
<?php endif; ?>
<?php get_template_part('inc/cmn', 'whyusv6.0'); ?>

<?php 
$ctaTwo = get_field('blockcta-2');
if( isset($ctaTwo['required']) && ($ctaTwo['required'] == "yes") ) :
?>
<section class="cta-section">
<div class="container">
<div class="cta-wrap">
  <div class="left-sec">
    <div class="top-section"><?php echo $ctaTwo['content']; ?></div>
  </div>
  <div class="right-sec">
    <?php 
    if( $ctaTwo['thumb'] ){
      echo vc_pictureElm( $ctaTwo['thumb'] );
    }else{
    ?>
    <picture>
        <source type="image/webp" srcset="<?php _vers_six('images/home-images/cta-image02.png'); ?>">
        <img loading="lazy" src="<?php _vers_six('images/home-images/cta-image02.png'); ?>" width="538" height="430">
      </picture>
    <?php } ?>
  </div>
</div>
</div>
</section>
<?php endif; ?>
<?php get_template_part('inc/cmn', 'industryv6.0'); ?>

<?php 
$techElm = get_field('tech-elms');
if( isset($techElm['required']) && ($techElm['required'] == "yes") ) :
?>
<section class="animated-tech padding-t-120 padding-b-120">
<div class="container">
  <div class="top-section b-100"><?php echo $techElm['content']; ?></div>
  <div class="tech-section">
    <div class="tech-row">
      <div class="tech-stack animate-slide-to-left hover:pause">
        <?php 
        if( $techElm['stack'] ){
        echo '<ul>';

        echo '</ul>';  
        }
        ?>
        <ul>
          <li>
            <a href="#">
              <span class="tech-img">
                <picture>
                  <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/tech-01.png">
                  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/tech-01.png"width="62" height="62">
                </picture>
              </span>
              Javascript
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="explore-sc text-center margin-t-80"><a class="explore-btn" href="">Explore all Technologies</a></div>
</div>
</section>
<?php endif; ?>

<section class="tabs-section techno-tabs padding-t-120 padding-b-120" id="tabs-section-2">
      <div class="container">
        <div class="top-section b-100">
          <h2>Improve and Innovate with the Tech Trends</h2>
          <p>Our team can assist you in transforming your business with the latest tech capabilities to stay ahead of the curve.</p>
        </div>
        <div class="tab-flex">
          <div class="tabs-container">
            <ul class="tabs">
              <li class="tab active" data-target="ai"><img src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/tech-icon.svg">Artificial Intelligence</li>
              <li class="tab" data-target="blockc"><img src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/tech-icon.svg">Blockchain</li>
              <li class="tab" data-target="cvision"><img src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/tech-icon.svg">Computer Vision</li>
              <li class="tab" data-target="iot"><img src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/tech-icon.svg">Internet of Things</li>
              <li class="tab" data-target="mixedr"><img src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/tech-icon.svg">Mixed Reality</li>
            </ul>
            <div class="tab-content">
              <div class="content active" id="ai">
                <div class="dis-flex">
                  <div class="flex-2 img-div">
                    <picture>
                      <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/technology-01.png">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/technology-01.png"width="484" height="282">
                    </picture>
                  </div>
                  <div class="flex-2 content-div">
                    <h3>Design Services</h3>
                    <p>Our design team creates user-centric experiences that captivate audiences.</p>
                    <ul>
                      <li>MVP & SaaS Development</li>
                      <li>CTO as a Service </li>
                      <li>Data Analytics & DevOps</li>
                      <li>Technology Consulting</li>
                    </ul>
                    <a href="#" class="is-arrow">Find Out More</a>
                  </div>
                </div>
              </div>
              <div class="content" id="blockc">
                <div class="dis-flex">
                  <div class="flex-2 img-div">
                    <picture>
                      <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/technology-01.png">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/technology-01.png"width="484" height="282">
                    </picture>
                  </div>
                  <div class="flex-2 content-div">
                    <h3>Blockchain</h3>
                    <p>Our design team creates user-centric experiences that captivate audiences.</p>
                    <ul>
                      <li>MVP & SaaS Development</li>
                      <li>CTO as a Service </li>
                      <li>Data Analytics & DevOps</li>
                      <li>Technology Consulting</li>
                    </ul>
                    <a href="#" class="is-arrow">Find Out More</a>
                  </div>
                </div>
              </div>
              <div class="content" id="cvision">
                <div class="dis-flex">
                  <div class="flex-2 img-div">
                    <picture>
                      <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/technology-01.png">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/technology-01.png"width="484" height="282">
                    </picture>
                  </div>
                  <div class="flex-2 content-div">
                    <h3>Computer Vision</h3>
                    <p>Our design team creates user-centric experiences that captivate audiences.</p>
                    <ul>
                      <li>MVP & SaaS Development</li>
                      <li>CTO as a Service </li>
                      <li>Data Analytics & DevOps</li>
                      <li>Technology Consulting</li>
                    </ul>
                    <a href="#" class="is-arrow">Find Out More</a>
                  </div>
                </div>
              </div>
              <div class="content" id="iot">
                <div class="dis-flex">
                  <div class="flex-2 img-div">
                    <picture>
                      <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/technology-01.png">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/technology-01.png"width="484" height="282">
                    </picture>
                  </div>
                  <div class="flex-2 content-div">
                    <h3>Internet of Things</h3>
                    <p>Our design team creates user-centric experiences that captivate audiences.</p>
                    <ul>
                      <li>MVP & SaaS Development</li>
                      <li>CTO as a Service </li>
                      <li>Data Analytics & DevOps</li>
                      <li>Technology Consulting</li>
                    </ul>
                    <a href="#" class="is-arrow">Find Out More</a>
                  </div>
                </div>
              </div>
              <div class="content" id="mixedr">
                <div class="dis-flex">
                  <div class="flex-2 img-div">
                    <picture>
                      <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/technology-01.png">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/technology-01.png"width="484" height="282">
                    </picture>
                  </div>
                  <div class="flex-2 content-div">
                    <h3>Mixed Reality</h3>
                    <p>Our design team creates user-centric experiences that captivate audiences.</p>
                    <ul>
                      <li>MVP & SaaS Development</li>
                      <li>CTO as a Service </li>
                      <li>Data Analytics & DevOps</li>
                      <li>Technology Consulting</li>
                    </ul>
                    <a href="#" class="is-arrow">Find Out More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<section class="success-slider-section  padding-t-120 padding-b-120">
<div class="container">
<div class="top-section b-100">
  <h2>Success Stories</h2>
  <p>Get what you are looking for to fulfill your software development and outsourcing needs at ValueCoders.</p>
</div>
<div class="dis-flex glider-contain success-slider" id="success-glider">
  <div class="glider">
    <div class="industry-card">
      <div class="card-bg" style="background-image:url(<?php bloginfo('template_url'); ?>/v6.0/images/home-images/success-01.png);"><span class="category">IT Consulting & Strategy</span>
        <a class="move" href="#"></a>
      </div>
      <div class="card-content">
        <h4>Innovate software for travel & Tourism...</h4>
        <p>The client wanted to build a web portal where customers could purchase motorcycles online and dealers could access and manage their agent accounts.</p>
      </div>
    </div>
    <div class="industry-card">
      <div class="card-bg" style="background-image:url(<?php bloginfo('template_url'); ?>/v6.0/images/home-images/success-02.png);"> <span class="category">Website Development</span>
        <a class="move" href="#"></a>
      </div>
      <div class="card-content">
        <h4>Best Travel Platform</h4>
        <p>The smart integrated platform is founded on the pillars...</p>
      </div>
    </div>
    <div class="industry-card">
      <div class="card-bg" style="background-image:url(<?php bloginfo('template_url'); ?>/v6.0/images/home-images/test-01.jpg);"><span class="category">IT Consulting & Strategy</span>
        <a class="move" href="#"></a>
      </div>
      <div class="card-content">
        <h4>Change Slider prtal</h4>
        <p>The client wanted to build a web portal where customers could purchase motorcycles online and dealers could access and manage their agent accounts.</p>
      </div>
    </div>
    <div class="industry-card">
      <div class="card-bg" style="background-image:url(<?php bloginfo('template_url'); ?>/v6.0/images/home-images/success-02.png);"> <span class="category">Website Development</span>
        <a class="move" href="#"></a>
      </div>
      <div class="card-content">
        <h4>Travel Platform portal</h4>
        <p>The smart integrated platform is founded on the pillars...</p>
      </div>
    </div>
    <div class="industry-card">
      <div class="card-bg" style="background-image:url(<?php bloginfo('template_url'); ?>/v6.0/images/home-images/test-01.jpg);"><span class="category">IT Notice</span>
        <a class="move" href="#"></a>
      </div>
      <div class="card-content">
        <h4>Slider prtal</h4>
        <p>The client wanted to build a web portal where customers could purchase motorcycles online and dealers could access and manage their agent accounts.</p>
      </div>
    </div>
    <div class="industry-card">
      <div class="card-bg" style="background-image:url(<?php bloginfo('template_url'); ?>/v6.0/images/home-images/success-02.png);"> <span class="category">Website Devops</span>
        <a class="move" href="#"></a>
      </div>
      <div class="card-content">
        <h4>Platform portal</h4>
        <p>The smart integrated platform is founded on the pillars...</p>
      </div>
    </div>
  </div>
  <div class="test-button">
    <button aria-label="Previous" class="test-prev">«</button>
    <button aria-label="Next" class="test-next">»</button>
    <div role="tablist" class="dots"></div>
  </div>
</div>
</div>
</section>
<section class="latest-insight light-background  padding-t-120 padding-b-120">
<div class="container">
<div class="top-section b-100">
  <div class="dis-flex items-center justify-sb  top-content">
    <div class="flex-2">
      <h2>Our latest insights.</h2>
      <p>Get what you are looking for to fulfill your software development .</p>
    </div>
    <div class="flex-2 text-right">
      <a href="#" class="is-arrow">Over 1,100 articles on technology and talent</a>
    </div>
  </div>
</div>
<div class="insight-row">
  <div class="card">
    <div class="card-image">
      <span class="category">AI & ML</span>
      <picture>
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/insight-01.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/insight-01.png"width="400" height="200">
      </picture>
    </div>
    <div class="card-content">
      <h3>Red Flags in Software Outsourcing: 7 Warning Signs You Can’t Ignore</h3>
      <p>So, you decided to outsource your software development project....</p>
      <div class="author">
        <img src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/author.svg" alt="Author avatar">
        <span>by Ankita</span>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-image">
      <span class="category">AI & ML</span>
      <picture>
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/insight-01.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/insight-01.png"width="400" height="200">
      </picture>
    </div>
    <div class="card-content">
      <h3>Red Flags in Software Outsourcing: 7 Warning Signs You Can’t Ignore</h3>
      <p>So, you decided to outsource your software development project....</p>
      <div class="author">
        <img src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/author.svg" alt="Author avatar">
        <span>by Ankita</span>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-image">
      <span class="category">AI & ML</span>
      <picture>
        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/insight-01.png">
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/insight-01.png"width="400" height="200">
      </picture>
    </div>
    <div class="card-content">
      <h3>Red Flags in Software Outsourcing: 7 Warning Signs You Can’t Ignore</h3>
      <p>So, you decided to outsource your software development project....</p>
      <div class="author">
        <img src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/author.svg" alt="Author avatar">
        <span>by Ankita</span>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<?php get_footer(); ?>