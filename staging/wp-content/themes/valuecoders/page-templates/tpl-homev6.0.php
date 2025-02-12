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
  <video class="row-lg vd-lazy" id="background-video" loop autoplay muted playsinline>
    <source src="<?php _vers_six('video/home-video.mp4'); ?>" type="video/mp4">
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
      <div class="text"><i><img loading="lazy" src="<?php _vers_six('images/home-images/star-one.svg'); ?>" width="22" height="20" alt="star"></i>
        <strong>4.5/5</strong>based on 500+ reviews on
      </div>
      <div class="awlogo"><a href="#"></a><a href="#"></a><a href="#"></a></div>
    </div>
    <div class="stats">
      <div class="stat">
        <h2>675+</h2>
        <p>Developers</p>
      </div>
      <div class="stat">
        <h2>4200+</h2>
        <p>Projects Delivered</p>
      </div>
      <div class="stat">
        <h2>97%</h2>
        <p>Client Satisfaction</p>
      </div>
    </div>
    <div class="bottom-section">
      <div class="bottom-card">
        <picture><img loading="lazy" src="<?php _vers_six('images/home-images/award-01.svg'); ?>" width="285" height="197" alt="valuecoders"></picture>
      </div>
      <div class="bottom-card highlight">
        <h4>Trusted By</h4>
        <h2>2500 <br>Companies</h2>
        <p>Globally</p>
        <a href="#" class="is-arrow">See our clients
        </a>
      </div>
      <div class="bottom-card">
        <picture><img loading="lazy" src="<?php _vers_six('images/home-images/award-02.svg'); ?>" width="285" height="170" alt="valuecoders"></picture>
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
              <img src="'._getvers_six('images/home-images/tabicon0'.$i.'.svg').'" class="normal" alt="valuecoders">
              <img src="'._getvers_six('images/home-images/iconhov0'.$i.'.svg').'" class="hover" alt="valuecoders">
              '.$tab['title'].'</li>';  
            }
            echo '</ul>';
            echo '<div class="tab-content">';
            $i = 0;
            foreach( $workWith['tabs'] as $elm ){ $i++;
            $active = ( $i === 1 ) ? 'active' : '';
            $link = (isset($elm['link']) && !empty($elm['link'])) ? '<a href="'.vc_siteurl($elm['link']).'" class="is-arrow">Get Details</a>' : '';
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
          <i><img src="<?php _vers_six('images/home-images/vc-fav.svg'); ?>" width="40" height="40" alt="valuecoders"></i>
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
          <img loading="lazy" src="<?php _vers_six('images/home-images/cta-image.png'); ?>" width="420" height="394" alt="valuecoders">
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
                <h3>'.$sol['title'].'</h3>
                <div class="overlay-text">
                  <div class="content-box">'.$sol['text'].'</div>
                </div>
              </div>
            </div>';
            }
            ?>
        </div>
        <!-- Progress Bar -->
        <div class="progress-container">
          <div class="progress-bar solution-progress-bar"></div>
        </div>
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
          <img loading="lazy" src="<?php _vers_six('images/home-images/cta-image02.png'); ?>" width="538" height="430" alt="valuecoders">
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
            foreach( $techElm['stack'] as $tech ){
            echo '<li><a href="'.vc_siteurl($tech['link']).'">
            <span class="tech-img">'.vc_pictureElm($tech['icon']).'</span>
            '.$tech['title'].'</a></li>';
            }
            echo '</ul>';  
            }
            ?>
        </div>
      </div>
    </div>
    <div class="explore-sc text-center margin-t-80"><a class="explore-btn" href="">Explore all Technologies</a></div>
  </div>
</section>
<?php endif; ?>
<?php 
$trendElm = get_field('tech-trends');
if( isset($trendElm['required']) && ($trendElm['required'] == "yes") ) :
?>
<section class="tabs-section techno-tabs padding-t-120 padding-b-120" id="tabs-section-2">
  <div class="container">
    <div class="top-section b-100"><?php echo $trendElm['content']; ?></div>
    <div class="tab-flex">
      <?php 
        if( $trendElm['tabs'] ){
        ?>
      <div class="tabs-container">
        <ul class="tabs">
          <?php 
          $i = 0;
          foreach( $trendElm['tabs'] as $tab ) { 
              $i++;
              $active   = ($i === 1) ? 'active' : '';  
              $imgUrl   = !empty($tab['icon']['url']) ? $tab['icon']['url'] : 'placeholder.jpg';
              $himgUrl  = !empty($tab['hicon']['url']) ? $tab['hicon']['url'] : 'placeholder.jpg';
              echo '<li class="tab '.$active.'" data-target="telm-'.$i.'">
              <img src="'.$imgUrl.'" class="normal" alt="'.$tab['title'].'"><img src="'.$himgUrl.'" class="hover" alt="'.$tab['title'].'"> '.$tab['title'].'</li>';
          }
          ?>        
        </ul>
        <div class="tab-content">
          <?php 
            $i = 0;
            foreach( $trendElm['tabs'] as $tab ){ $i++;
            $active = ( $i === 1 ) ? 'active' : '';  
            echo '<div class="content '.$active.'" id="telm-'.$i.'">
              <div class="dis-flex">
                <div class="flex-2 img-div">'.vc_pictureElm($tab['image']).'</div>
                <div class="flex-2 content-div">'.$tab['text'].'<a href="'.vc_siteurl($tab['link']).'" class="is-arrow">Find Out More</a></div>
              </div>
            </div>';
            } 
            ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php endif;

$stories = get_field('vstories');
if( isset($stories['required']) && ($stories['required'] === "yes") ) :
?>
<section class="success-slider-section padding-t-120 padding-b-120">
  <div class="container">
    <div class="top-section b-100"><?php echo $stories['content']; ?></div>
    <?php 
    if( $stories['cards'] ){
    echo '<div class="dis-flex glider-contain success-slider" id="success-glider">
    <div class="glider">';
    foreach( $stories['cards'] as $row ){    
    $cat = ( isset($row['cat']) && !empty($row['cat']) ) ? '<span class="category">'.$row['cat'].'</span>' : '';
    echo '<div class="industry-card">
    <div class="card-bg" style="background-image:url('.$row['thumb']['url'].');">
    '.$cat.'<a class="move" href="'.$row['link'].'"></a>
    </div>
    <div class="card-content">'.$row['content'].'</div>
    </div>';
    }
    echo '</div><!--//.glider -->
    <div class="test-button">
      <button aria-label="Previous" class="test-prev">«</button>
      <button aria-label="Next" class="test-next">»</button>
      <div role="tablist" class="dots"></div>
    </div>   
    </div></div>';
    }
    ?>    
  </div>
</section>
<?php 
endif;

$loop = [];
$response = wp_remote_get('https://www.valuecoders.com/blog/wp-json/bposts/v1/cat-posts/'.preg_replace('/\s+/', '','ai-development-company').'?var='.time());
if(is_array( $response ) && !is_wp_error( $response )){
  $data   = json_decode($response['body']);
  if( count( $data ) > 1 ){
    $loop = json_decode($response['body']); 
  }
} 
if( count($loop) > 0 ) :
echo '<section class="latest-insight light-background  padding-t-120 padding-b-120"><div class="container">';
echo '<div class="top-section b-100">
      <div class="dis-flex items-center justify-sb  top-content">
        <div class="flex-2">
          <h2>Featured Insights</h2>
          <p>From latest happenings in the tech world to detailed guides on how to turn your vision into an amazing product, we are here to guide you at every step.</p>
        </div>
        <div class="flex-2 text-right">
        <a href="https://www.valuecoders.com/blog/" class="is-arrow">Over 1000 articles on tech and talent</a>
        </div>
      </div>
    </div>';
echo '<div class="insight-row">';
$breakPoint = 0;
foreach( $loop as $blogPost ){ 
$breakPoint++;
$authThumb = (!empty($blogPost->author_image)) ? $blogPost->author_image : get_bloginfo('template_url').'/v6.0/images/home-images/author.svg';
echo '<div class="card">
      <div class="card-image">
        <span class="category">AI & ML</span>
        <picture>
          <source type="image/webp" srcset="'.$blogPost->thumbnail.'">
          <img loading="lazy" src="'.$blogPost->thumbnail.'" width="400" height="200" alt="valuecoders">
        </picture>
      </div>
      <div class="card-content">
        <h3><a href="'.$blogPost->permalink.'">'.$blogPost->title.'</a></h3>
        <p>'.$blogPost->experpt.'</p>
        <div class="author">
          <img src="'.$authThumb.'" alt="Author avatar">
          <span>'.$blogPost->author.'</span>
        </div>
      </div>
    </div>';
if( $breakPoint === 3 ) break;    
}
echo '</div>';
echo '</div></section>';
endif;
?>
<?php 
  $faqs       = get_field('tpl-faq');
  if( isset($faqs['is_enabled']) && ($faqs['is_enabled'] == "yes") ) :
  ?>
<section class="faq-section padding-t-120 padding-b-120">
  <div class="container">
    <div class="top-section b-100"><?php echo $faqs['content'];  ?></div>
    <?php
      if( $faqs['faq'] ){
        echo '<div class="faq-outer" itemscope itemtype="https://schema.org/FAQPage">';
        foreach ($faqs['faq'] as $row){
          //$faqCount++;
          echo '<div class="faq-accordion-item-outer" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
          <h3 class="faq-accordion-toggle" itemprop="name">'.$row['question'].'</h3>
          <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">'.$row['answer'].'</div></div>
          </div>';
        }
        echo '</div>';
      } 
      ?>
  </div>
</section>
<?php endif; ?>
<section class="client-testimonial light-background  padding-t-120 padding-b-120">
  <div class="container">
    <div class="top-section b-100">
      <h2>What Our Clients Have to Say About Us</h2>
      <p>Clients trust us, and we take great pride in delivering quality solutions that exceed their expectations.
      </p>
    </div>
    <div class="popup-section">
      <div id="yt-player-pop" class="popup-wrapper" style="display:none;">
        <div class="popWrap">
          <div class="popup-content">
            <span class="closeicon" onclick="closeYT_video();">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/cross-image.svg" alt="Valuecoders" 
              width="11" height="11"></span>
            <iframe class="yt-player" id="cmn-ytplayer" style="display:none;"></iframe>    
          </div>
        </div>
      </div>
    </div>
    <div class="client-out">
      <div class="dis-flex client-slider" id="client-slider">
        <div class="glider">
          <!-- Repeat this structure for each slide -->
          <div class="test-row">
            <picture>
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/testblue-01.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/images/home-images/testblue-01.png" alt="Valuecoders" width="290" height="328">
            </picture>
          </div>
          <div class="test-row">
            <div class="vid-wrap">
              <div class="client-videos" id="cvbox-1">
                <div class="client-video-box">
                  <a class="frame-mask" href="javascript:void(0);" 
                    onclick="playTetiVideoV4('cmn-ytplayer', 'https://www.youtube.com/embed/d78gD-wwVTg?autoplay=1?rel=0', this)">
                    <picture>
                      <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/test-01.png">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/test-01.png" alt="Valuecoders" width="290" height="328">
                    </picture>
                    <div class="playBtn">
                      <div class="playsc"><span class="playicon"></span></div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="content-box">
                <p>The Project managers took a lot of time to understand our project before coming up with a contract or what they thought we needed. I had the reassurance from the start that the project managers knew what type of project I wanted and what my needs were. That is reassuring, and that's why we chose ValueCoders.</p>
                <h5>James Kelly</h5>
                <span class="designtn">Co-founder, Miracle Choice</span>
                <span class="star-image"></span>
              </div>
            </div>
          </div>
          <div class="test-row">
            <picture>
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/testblue-02.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/images/home-images/testblue-02.png" alt="Valuecoders" width="290" height="328">
            </picture>
          </div>
          <div class="test-row">
            <div class="vid-wrap">
              <div class="client-videos" id="cvbox-2">
                <div class="client-video-box">
                  <a class="frame-mask" href="javascript:void(0);" 
                    onclick="playTetiVideoV4('cmn-ytplayer', 'https://www.youtube.com/embed/e7nbilPZzBE?autoplay=1', this)">
                    <picture>
                      <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/test-02.png">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/test-02.png" alt="Valuecoders" width="290" height="328">
                    </picture>
                    <div class="playBtn">
                      <div class="playsc"><span class="playicon"></span></div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="content-box">
                <p>ValueCoders provided us with exceptional services in creating a one-of-a-kind portal. Impressed with how efficient and quick the team was in coming up with creative solutions. They added all functionalities in the portal that we wanted.</p>
                <h5>Judith Mueller</h5>
                <span class="designtn">Executive Director, Mueller Health Foundation</span>
                <span class="star-image"></span>
              </div>
            </div>
          </div>
          <div class="test-row">
            <picture>
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/test-03.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/images/home-images/test-03.png" alt="Valuecoders" width="290" height="328">
            </picture>
          </div>
          <div class="test-row">
            <div class="vid-wrap">
              <div class="client-videos" id="cvbox-3">
                <div class="client-video-box">
                  <a class="frame-mask" href="javascript:void(0);" 
                    onclick="playTetiVideoV4('cmn-ytplayer', 'https://www.youtube.com/embed/W7Bxt2Up0NQ?autoplay=1', this)">
                    <picture>
                      <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/testblue-03.png">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/testblue-03.png" alt="Valuecoders" width="290" height="328">
                    </picture>
                    <div class="playBtn">
                      <div class="playsc"><span class="playicon"></span></div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="content-box">
                <p>ValueCoders had great technical expertise, both in front-end and back-end development. Other project management was well organized. Account management was friendly and always available. I would give ValueCoders ten out of ten!</p>
                <h5>Kris Bruynson</h5>
                <span class="designtn">Director, Storloft</span>
                <span class="star-image"></span>
              </div>
            </div>
          </div>
          <div class="test-row">
            <picture>
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/test-04.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/images/home-images/test-04.png" alt="Valuecoders" width="290" height="328">
            </picture>
          </div>
          <div class="test-row">
            <div class="vid-wrap">
              <div class="client-videos" id="cvbox-4">
                <div class="client-video-box">
                  <a class="frame-mask" href="javascript:void(0);" 
                    onclick="playTetiVideoV4('cmn-ytplayer', 'https://www.youtube.com/embed/aErqOtvMClY?autoplay=1', this)">
                    <picture>
                      <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/testblue-04.png">
                      <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/home-images/testblue-04.png" alt="Valuecoders" width="290" height="328">
                    </picture>
                    <div class="playBtn">
                      <div class="playsc"><span class="playicon"></span></div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="content-box">
                <p>Huge thank you to ValueCoders; they have been a massive help in enabling us to start developing our project within a few weeks, so it's been great! There have been two small bumps in the road, but overall, It's been a fantastic service. I have already recommended it to one of my friends.</p>
                <h5>Mohammed Mirza</h5>
                <span class="designtn">Director, LOCALMASTERCHEFS LTD</span>
                <span class="star-image"></span>
              </div>
            </div>
          </div>
          <!-- End slide structure -->
        </div>
        <!-- Progress Bar -->
        <div class="progress-container">
          <div class="progress-bar client-progress-bar"></div>
        </div>
        <!-- Navigation Buttons -->
        <div class="prev-next-btn">
          <button class="cl-prev" aria-label="Previous"></button>
          <button class="cl-next" aria-label="Next"></button>
        </div>
        <!-- Hidden Dots -->
        <div class="dots"></div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>