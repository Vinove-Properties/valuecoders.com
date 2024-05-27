<?php
  /*
  Template Name: In Media Template
  */ 
  global $post;
  $thisPostID = $post->ID;
  get_header();
  ?>
<section class="hero-section for-media-banner-section" style="background-image:url(<?php bloginfo('template_url'); ?>/v4.0/images/media-banner.png);">
  <div class="container text-center">
    <div class="content-wrap">
      <?php 
        while( have_posts() ) : the_post();
        	the_content(); 
        endwhile; 
        ?>
    </div>
  </div>
</section>
<div class="media-img-box">
  <div class="container">
    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/inmedia-header-img.svg" 
      alt="about-exp-img" width="1398" height="210">
  </div>
</div>
<section class="award-partner-section  padding-t-120">
  <div class="container">
    <div class="text-center head-txt">
      <h2>Our Awards & Partnerships</h2>
      <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim Exercitation veniam consequat sunt nostrud amet.</p>
    </div>
    <div class="dis-flex award-img-box margin-t-80">
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw01.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw01.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw01.png" alt="Valuecoders" width="129" height="124"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw02.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw02.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw02.png" alt="Valuecoders" width="101" height="73"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw03.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw03.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw03.png" alt="Valuecoders" width="195" height="61"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw04.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw04.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw04.png" alt="Valuecoders" width="106" height="104"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw05.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw05.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw05.png" alt="Valuecoders" width="119" height="105"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw06.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw06.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw06.png" alt="Valuecoders" width="103" height="102"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw07.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw07.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw07.png" alt="Valuecoders" width="130" height="69"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw08.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw08.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw08.png" alt="Valuecoders" width="145" height="60"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw09.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw09.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw09.png" alt="Valuecoders" width="211" height="33"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw10.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw10.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw10.png" alt="Valuecoders" width="142" height="59"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw11.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw11.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw11.png" alt="Valuecoders" width="115" height="39"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw12.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw12.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw12.png" alt="Valuecoders" width="163" height="57"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw13.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw13.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw13.png" alt="Valuecoders" width="123" height="81"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw14.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw14.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw14.png" alt="Valuecoders" width="60" height="78"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw15.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw15.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw15.png" alt="Valuecoders" width="71" height="67"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw16.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw16.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw16.png" alt="Valuecoders" width="134" height="98"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw17.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw17.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw17.png" alt="Valuecoders" width="76" height="110"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw18.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw18.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw18.png" alt="Valuecoders" width="87" height="86"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw19.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw19.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw19.png" alt="Valuecoders" width="103" height="87"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw20.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw20.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v4.0/images/inm-aw20.png" alt="Valuecoders" width="130" height="83"> 
          </picture>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
  $inMedia = get_field('in-media');
  $inMediaEnable = $inMedia['is_enabled'];
  if( $inMediaEnable == 'yes' ) :
  ?>
<section class="three-column-media-section padding-t-150 padding-b-150">
  <div class="container">
    <div class="head-txt text-center">
      <?php echo $inMedia['top-content']; ?>
    </div>
    <?php 
      if( $inMedia['cards'] ){
      	echo '<div class="dis-flex col-box-outer margin-t-80">';
      	$ct = 0;
      	foreach( $inMedia['cards'] as $row ){ $ct++;
      		$defName = ( $row['pro-name'] ) ? $row['pro-name'] : "Test Name - ".$ct;
      		echo '<div class="flex-3">
      		<div class="media-box">';
      		$tlightlg 		= $row['logo-light'];
      		$tlightlgwp 	= $row['logo-light-wp'];
          if( $tlightlg ){
            echo vc_pictureElm( $tlightlg );
          }
      		/*
          if( $tlightlg && $tlightlgwp ){
      		echo '<picture>
      		<source type="image/webp" srcset="'.$tlightlgwp['url'].'">
      		<source type="'.$tlightlg['mime_type'].'" srcset="'.$tlightlg['url'].'">
      		<img loading="lazy" src="'.$tlightlg['url'].'" alt="ValueCoders" width="'.$tlightlg['width'].'" 
      		height="'.$tlightlg['height'].'"> 
      		</picture>';
      		}
          */
      		echo '<div class="content-box">
      		<p>'.$row['content'].'</p>
      		</div>
      		<div class="text-date-box">
      		<span class="logo-name"><a href="'.$row['link'].'" target="_blank">'.$defName.'</a></span>
      		<span class="date">'.$row['date'].'</span>
      		</div>
      		</div>
      		</div>';
      	}
      	echo '</div>';
      }
      ?>
  </div>
</section>
<?php endif; ?>
<?php get_template_part('include/testimonials', 'v4.0'); ?>
<?php get_footer(); ?>