<?php get_header(); ?>
<section class="hero-section" style="background-image:url(<?php bloginfo('template_url'); ?>/v3.0/images/resource-detail-banner.jpg);">
      <div class="container">
        <div class="content-wrap">
          <div class="dis-flex">
            <div class="left-box">
              <h1><?php the_title(); ?></h1>
              <?php 
              if( get_field('rbanner-text') ){
              	echo '<p>'.get_field('rbanner-text').'</p>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="client-logo-box-section bg-light dis-flex items-center justify-sb">
      <div class="container">
        <div class="dis-flex">
          <div class="logo-heading">
            <h4>Trusted by startups<br> and Fortune 500 companies</h4>
          </div>
          <div class="logo-box-outer dis-flex">
          </div>
        </div>
      </div>
    </div>
    <section class="tab-scroll-section resource-tab padding-t-100 padding-b-100">
      <div class="container">
        <div id="tabs1" class="dis-flex tab-contents justify-sb no-js">
          <div class="left-tabs">
            <div class="sticky-tab"> <h3>Table of Contents</h3>
              <div class="tab-nav">              
              <?php dynamic_sidebar('vcr-toc'); ?>
            </div>
            </div><!-- sticky-tab -->
          </div>
          <div  class="right-tabs">
            <article class="main-article">
              <section class="post-content post-animation">
                <div class="text"><?php the_content(); ?></div>
                <div class="vc-relpost">
                  <h2>Related Topics</h2>
                  <div class="dis-flex">
                    <article class="grid-33">
                      <div class="featured-image">
                        <a href="#" class="thumb hover-effect">
                        <span class="fullimage cover" role="img" aria-label="Hybrid Workplace | How it Works, Pros, Cons, Everything to Know!" style="background-image: url(https://www.valuecoders.com/beta_blog/wp-content/uploads/2022/11/nft-feature-image.png);"></span>
                        </a>
                      </div>
                      <h3><a href="#">Lorem dolor sed viverra ipsum nunc aliquet bibendum enim facilisis. Egestas dui id</a></h3>
                    </article>
                    <article class="grid-33">
                      <div class="featured-image">
                        <a href="#" class="thumb hover-effect">
                        <span class="fullimage cover" role="img" aria-label="Hybrid Workplace | How it Works, Pros, Cons, Everything to Know!" style="background-image: url(https://www.valuecoders.com/beta_blog/wp-content/uploads/2022/11/nft-feature-image.png);"></span>
                        </a>
                      </div>
                      <h3><a href="#">Lorem dolor sed viverra ipsum nunc aliquet bibendum enim facilisis. Egestas dui id</a></h3>
                    </article>
                    <article class="grid-33">
                      <div class="featured-image">
                        <a href="#" class="thumb hover-effect">
                        <span class="fullimage cover" role="img" aria-label="Hybrid Workplace | How it Works, Pros, Cons, Everything to Know!" style="background-image: url(https://www.valuecoders.com/beta_blog/wp-content/uploads/2022/11/nft-feature-image.png);"></span>
                        </a>
                      </div>
                      <h3><a href="#">Lorem dolor sed viverra ipsum nunc aliquet bibendum enim facilisis. Egestas dui id</a></h3>
                    </article>
                  </div>
                </div>
              </section>
            </article>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>
