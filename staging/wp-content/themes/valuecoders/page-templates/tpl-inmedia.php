<?php
/*
Template Name: In Media Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section for-media-banner-section" style="background-image:url(<?php bloginfo('template_url'); ?>/v3.0/images/media-banner.png);">
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
<div class="bg-light media-img-box">
  <div class="container">
    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/inmedia-header-img.svg" 
    alt="about-exp-img" width="1398" height="210">
  </div>
</div>
<?php //vcTrustedStartups(); ?>

<section class="award-partner-section  padding-t-120">
  <div class="container">
    <div class="text-center head-txt">
      <h2>Our Awards & Partnerships</h2>
      <p>Recognized for our outstanding accomplishments and strong partnerships, reinforcing our position as a trusted leader in the field.</p>
    </div>
    <div class="dis-flex award-img-box margin-t-80">
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-01.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-01.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-01.png" alt="Valuecoders" width="73" height="125"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-02.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-02.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-02.png" alt="Valuecoders" width="134" height="97"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-03.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-03.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-03.png" alt="Valuecoders" width="101" height="101"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-04.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-04.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-04.png" alt="Valuecoders" width="191" height="80"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-05.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-05.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-05.png" alt="Valuecoders" width="172" height="92"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-06.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-06.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-06.png" alt="Valuecoders" width="115" height="40"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-07.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-07.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-07.png" alt="Valuecoders" width="164" height="58"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-08.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-08.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-08.png" alt="Valuecoders" width="130" height="84"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-09.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-09.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-09.png" alt="Valuecoders" width="172" height="92"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-10.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-10.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-10.png" alt="Valuecoders" width="104" height="88"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-11.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-11.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-11.png" alt="Valuecoders" width="61" height="59"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-12.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-12.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-12.png" alt="Valuecoders" width="142" height="60"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-13.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-13.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-13.png" alt="Valuecoders" width="87" height="87"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-14.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-14.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-14.png" alt="Valuecoders" width="71" height="68"> 
          </picture>
        </div>
      </div>
      <div class="flex-5">
        <div class="box">
          <picture>
            <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-15.png">
            <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/awards-15.png">
            <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/awards-15.png" alt="Valuecoders" width="123" height="83"> 
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
				if( $tlightlg && $tlightlgwp ){
				echo '<picture>
				<source type="image/webp" srcset="'.$tlightlgwp['url'].'">
				<source type="'.$tlightlg['mime_type'].'" srcset="'.$tlightlg['url'].'">
				<img loading="lazy" src="'.$tlightlg['url'].'" alt="ValueCoders" width="'.$tlightlg['width'].'" 
				height="'.$tlightlg['height'].'"> 
				</picture>';
				}
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
<?php cmnTestimonials_v3( $thisPostID ); ?>
<?php get_footer(); ?>