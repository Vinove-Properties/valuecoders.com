<?php 
get_header();

$popularPosts = get_field('pop-posts', 'option');
$popularPosts = explode(',', $popularPosts);

//print_r($popularPosts); die;

$catBlockOne  = get_field('row-c1', 'option');
$catBlockTwo  = get_field('row-c2', 'option'); 
?>

<section class="blog-main-page">
  <div class="container">
    <div class="blog-cat">
      <ul>
        <li class="active mobhide"><a href="<?php echo site_url(); ?>">Blog Home</a></li>
        <li><a href="<?php echo get_category_link(3479); ?>">Dedicated Teams</a></li>
        <li><a href="<?php echo get_category_link(1396); ?>">Digital Marketing</a></li>
        <li><a href="<?php echo get_category_link(3199); ?>">Digital Transformation</a></li>
        <li><a href="<?php echo get_category_link(87); ?>">eCommerce</a></li>
        <li><a href="<?php echo get_category_link(3480); ?>">Industries</a></li>
        <li><a href="<?php echo get_category_link(2414); ?>">Software Development</a></li>
      </ul>
    </div>
    <div class="top-content">
      <h1>Smart marketing starts here.</h1>
      <p>Join over 200,000 marketing managers, and get the best digital marketing insights, <br>strategies, and tips delivered straight to your inbox!</p>
    </div>
    <div class="search-blogs">
      <div class="ser-left">Featured In <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/images/blog-part.svg" alt="Valuecoders">
      </div>
      <div class="searchBox">
        <form action="<?php echo site_url(); ?>" method="get" class="search-form"> 
          <input type="text" name="s" class="search-field" placeholder="Search the blog..." id="search-form" value="<?php the_search_query(); ?>" />
          <button type="submit" class="submit" aria-label="Submit">Search</button>
        </form>
      </div>
    </div>
    <?php if( !is_paged() ) : ?>
    <?php 
    //$sticky_posts = get_option('sticky_posts');
    if( $popularPosts ) :
    $popQuery = new WP_Query([
    'post_type'       => 'post',
    'post__in'        => $popularPosts,
    'orderby'         => 'post__in',
    'posts_per_page'  => 5,
    'ignore_sticky_posts' => 1
    ]);
    if( $popQuery->have_posts() ){
    echo '<div class="pc-blog-list popular-post">';
    echo '<div class="main-intro"><h2>Popular Posts</h2></div>';
    echo '<div class="blog-posts-list two-columns">';
    $st = 0;
    while( $popQuery->have_posts()){ 
      $popQuery->the_post();
      $st++;
      $cat = getPostPrimeCategory( get_the_ID() );
      $stkThumb   = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
      if( $st === 1 ){
        echo '<div class="blog-post-col big-size postid-'.get_the_ID().'">
        <div class="blog-image">
          <a href="'.get_permalink().'"><img width="1024" height="462" src="'.$stkThumb.'" alt="pixel" loading="lazy"></a>
        </div>
        <div class="blog-content">
          <span class="category">'.$cat.'</span>
          <div class="title two-line"><a href="'.get_permalink().'">'.get_the_title().'</a></div>
          <div class="content">'.get_field('pp-cont', 'option').'</div>
          '.getMcAutor(get_the_ID()).'
        </div>
        </div>';
      echo '<div class="blog-post-col small-size">';  
      }else{
        echo '<div class="blog-posts-list postid-'.get_the_ID().'">
          <div class="blog-post-col">
            <div class="blog-image">
              <a href="">
              <img width="1024" height="462" src="'.$stkThumb.'" alt="pixel" loading="lazy"></a>              
            </div>
            <div class="blog-content">
              <span class="category">'.$cat.'</span>
              <div class="title three-line"><a href="'.get_permalink().'">'.get_the_title().'</a></div>
              '.getMcAutor(get_the_ID()).'
            </div>
          </div>
        </div>';
      }
      if( $st === 5 ) break;
    }
    echo '</div>';
    wp_reset_postdata();
    echo '</div>';
    echo '</div>';  
    }  
    endif;
    ?>
    <div class="cta-flex">
      <div class="custom-left">
        <picture>
          <img loading="lazy"  src="<?php bloginfo('template_url'); ?>/assets/images/home-custom.svg" alt="pixel" width="214" height="176">
        </picture>
        <div class="cus-cont">
          <div class="cushed">Elevate Projects with Top Management Tools</div>
          <div class="btn-container">
            <a target="_blank" class="white-btn blue pxl-ext" href="https://www.pixelcrayons.com/contact-us" data-wpel-link="internal" rel="follow noopener">Start Free Trial</a>
          </div>
        </div>
      </div>
      <div class="detail-subsbox subs-box">
        <h3>Subscribe to our blog</h3>
        <p>Stay up to date with the latest marketing, sales, and SEO tips and news</p>
        <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
      </div>
    </div>
    <div class="pc-blog-list videos-post">
      <div class="main-intro">
        <h2>Watch Now</h2>
        <a href="#" class="view-all-link" target="_blank" rel="noopener">View All</a>
      </div>
      <div class="blog-posts-list  three-columns">
        <div class="blog-post-col medium-size">
          <div class="blog-image">
            <span class="play-btn">
            <img alt="play btn" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/images/play-btn.png">
            </span>
            <picture><a href="#" target="_blank"><img class="video-thumb"   src="<?php bloginfo('template_url'); ?>/assets/images/video-thumb01.png" alt="pixel" loading="lazy">  </a>   </picture>
          </div>
          <div class="blog-content">
            <span class="category"><a href="">Digital Marketing</a></span>
            <div class="title"><a href="#">Balancing Paid & Organic Search: Tips 
              & Tricks!</a>
            </div>
            <div class="auth-wrap">
              <span class="time-read">2 minute</span>
            </div>
          </div>
        </div>
        <div class="blog-post-col medium-size">
          <div class="blog-image">
            <span class="play-btn">
            <img alt="play btn" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/images/play-btn.png">
            </span>
            <picture><a href="#" target="_blank"><img class="video-thumb"  src="<?php bloginfo('template_url'); ?>/assets/images/video-thumb01.png" alt="pixel" loading="lazy">  </a>   </picture>
          </div>
          <div class="blog-content">
            <span class="category"><a href="">Digital Marketing</a></span>
            <div class="title"><a href="#">Balancing Paid & Organic Search: Tips 
              & Tricks!</a>
            </div>
            <div class="auth-wrap">
              <span class="time-read">2 minute</span>
            </div>
          </div>
        </div>
        <div class="blog-post-col medium-size">
          <div class="blog-image">
            <span class="play-btn">
            <img alt="play btn" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/images/play-btn.png">
            </span>
            <picture><a href="#" target="_blank"><img class="video-thumb"   src="<?php bloginfo('template_url'); ?>/assets/images/video-thumb01.png" alt="pixel" loading="lazy">  </a>   </picture>
          </div>
          <div class="blog-content">
            <span class="category"><a href="">Digital Marketing</a></span>
            <div class="title"><a href="#">Balancing Paid & Organic Search: Tips 
              & Tricks!</a>
            </div>
            <div class="auth-wrap">
              <span class="time-read">2 minute</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; //Ignore For Paged ?>
    <div class="pc-blog-list latest">
      <div class="main-intro"><h2>Latest</h2></div>
      <div class="blog-posts-list two-columns list-view">      
      <?php
      if( have_posts() ) : 
      while ( have_posts() ) : the_post(); 
      $post_thumb   = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );  
      ?>
      <div class="blog-post-col medium-size">
      <div class="blog-image"><?php pxlCardThumbnail(); ?></div>
      <div class="blog-content">
        <span class="category"><?php echo getPostPrimeCategory( get_the_ID() ); ?></span>
        <div class="title two-line">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
        <?php echo getMcAutor( get_the_ID() ); ?>
      </div>
      </div>
      <?php 
      endwhile;      
      global $wp_query;
      $pagination_args = array(
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => __('Previous', 'pxlblog'),
        'next_text' => __('Next', 'pxlblog')      
      );
      echo '<div class="pagination-section">'.paginate_links( $pagination_args ).'</div>';
      else :
      //get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>      
      </div>
    </div>
    <?php if( !is_paged() ) : ?>
    <div class="pc-blog-list">
      <div class="main-intro">
        <h2>Mobile App Development</h2>
        <a href="#" class="view-all-link" target="_blank" rel="noopener">
        View All
        </a>
      </div>
      <div class="devs-category">
        <ul class="tabing_panel">
          <li class="active">Android</li>
          <li class="">iOS</li>
          <li class="">React Native</li>
          <li class="">Flutter</li>
          <li class="">App Development</li>
        </ul>
      </div>
      <div class="blog-posts-list  two-columns developsc">
        <div class="blog-post-col big-size">
          <div class="blog-image">
            <a href="" data-wpel-link="internal" rel="follow noopener"><img width="1024" height="462" src="<?php bloginfo('template_url'); ?>/assets/images/dm-image.png" alt="pixel" loading="lazy"> </a>
          </div>
          <div class="blog-content">
            <span class="category"><a href="" data-wpel-link="internal" rel="follow noopener">Digital Marketing</a></span>
            <div class="title two-line"><a href="" data-wpel-link="internal" rel="follow noopener">10 Reasons Your Agency Needs White Label Digital Marketing Service</a></div>
            <div class="auth-wrap">
              <div class="author-img">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/images/varun-bhagat.png" width="36" height="36" alt="Varun Bhagat">
              </div>
              <div class="entry-meta">
                by
                <a href="#" title="Posts by Varun Bhagat" rel="author noopener follow" data-wpel-link="internal">Varun Bhagat</a>
              </div>
            </div>
          </div>
        </div>
        <div class="blog-post-col medium-size">
          <div class="develop-row wid-75">
            <div class="devs-col">
              <div class="blog-image">
                <picture><a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/grid-01.png" alt="pixel" loading="lazy"> </a> </picture>
              </div>
              <div class="blog-content">
                <span class="category"><a href="" data-wpel-link="internal" target="_blank" rel="noopener follow">Industries</a></span>
                <div class="title three-line"><a href="#">Building Topical Authority? How to
                  Get It Right the First Time?</a>
                </div>
                <div class="auth-wrap">
                  <div class="author-img">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/images/varun-bhagat.png" width="36" height="36" alt="Varun Bhagat">
                  </div>
                  <div class="entry-meta">
                    by
                    <a href="#" title="Posts by Varun Bhagat" rel="author noopener follow" data-wpel-link="internal" target="_blank">Varun Bhagat</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="devs-col">
              <div class="blog-image">
                <picture><a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/grid-01.png" alt="pixel" loading="lazy"> </a> </picture>
              </div>
              <div class="blog-content">
                <span class="category"><a href="" data-wpel-link="internal" target="_blank" rel="noopener follow">Industries</a></span>
                <div class="title three-line"><a href="#">Building Topical Authority? How to
                  Get It Right the First Time?</a>
                </div>
                <div class="auth-wrap">
                  <div class="author-img">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/images/varun-bhagat.png" width="36" height="36" alt="Varun Bhagat">
                  </div>
                  <div class="entry-meta">
                    by
                    <a href="#" title="Posts by Varun Bhagat" rel="author noopener follow" data-wpel-link="internal" target="_blank">Varun Bhagat</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="develop-row wid-35 bg-yellow">
            <div class="devs-col">
              <div class="blog-image">
                <picture><a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/cta-img01.png" alt="pixel" loading="lazy"> </a> </picture>
              </div>
              <div class="blog-content">
                <div class="title three-line"><a href="#">From an amazing
                  idea to an amazing
                  app that</a>
                </div>
                <p>Learn the secret to how to
                  enter the world of mobile
                  apps .....
                </p>
                <div class="btn-container">
                  <a target="_blank" class="white-btn blue pxl-ext" href="https://www.valuecoders.com/contact" data-wpel-link="internal" rel="noopener follow">Download Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pc-blog-list">
      <div class="main-intro">
        <h2>Mobile App Development</h2>
        <a href="#" class="view-all-link" target="_blank" rel="noopener">
        View All
        </a>
      </div>
      <div class="devs-category">
        <ul class="tabing_panel">
          <li class="active">Android</li>
          <li class="">iOS</li>
          <li class="">React Native</li>
          <li class="">Flutter</li>
          <li class="">App Development</li>
        </ul>
      </div>
      <div class="blog-posts-list  two-columns developsc">
        <div class="blog-post-col big-size">
          <div class="blog-image">
            <a href="" data-wpel-link="internal" rel="follow noopener"><img width="1024" height="462" src="<?php bloginfo('template_url'); ?>/assets/images/dm-image.png" alt="pixel" loading="lazy"> </a>
          </div>
          <div class="blog-content">
            <span class="category"><a href="" data-wpel-link="internal" rel="follow noopener">Digital Marketing</a></span>
            <div class="title two-line"><a href="" data-wpel-link="internal" rel="follow noopener">10 Reasons Your Agency Needs White Label Digital Marketing Service</a></div>
            <div class="auth-wrap">
              <div class="author-img">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/images/varun-bhagat.png" width="36" height="36" alt="Varun Bhagat">
              </div>
              <div class="entry-meta">
                by
                <a href="#" title="Posts by Varun Bhagat" rel="author noopener follow" data-wpel-link="internal">Varun Bhagat</a>
              </div>
            </div>
          </div>
        </div>
        <div class="blog-post-col medium-size">
          <div class="develop-row wid-75">
            <div class="devs-col">
              <div class="blog-image">
                <picture><a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/grid-01.png" alt="pixel" loading="lazy"> </a> </picture>
              </div>
              <div class="blog-content">
                <span class="category"><a href="" data-wpel-link="internal" target="_blank" rel="noopener follow">Industries</a></span>
                <div class="title three-line"><a href="#">Building Topical Authority? How to
                  Get It Right the First Time?</a>
                </div>
                <div class="auth-wrap">
                  <div class="author-img">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/images/varun-bhagat.png" width="36" height="36" alt="Varun Bhagat">
                  </div>
                  <div class="entry-meta">
                    by
                    <a href="#" title="Posts by Varun Bhagat" rel="author noopener follow" data-wpel-link="internal" target="_blank">Varun Bhagat</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="devs-col">
              <div class="blog-image">
                <picture><a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/grid-01.png" alt="pixel" loading="lazy"> </a> </picture>
              </div>
              <div class="blog-content">
                <span class="category"><a href="" data-wpel-link="internal" target="_blank" rel="noopener follow">Industries</a></span>
                <div class="title three-line"><a href="#">Building Topical Authority? How to
                  Get It Right the First Time?</a>
                </div>
                <div class="auth-wrap">
                  <div class="author-img">
                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/images/varun-bhagat.png" width="36" height="36" alt="Varun Bhagat">
                  </div>
                  <div class="entry-meta">
                    by
                    <a href="#" title="Posts by Varun Bhagat" rel="author noopener follow" data-wpel-link="internal" target="_blank">Varun Bhagat</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="develop-row wid-35 bg-yellow">
            <div class="devs-col">
              <div class="blog-image">
                <picture><a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/cta-img01.png" alt="pixel" loading="lazy"> </a> </picture>
              </div>
              <div class="blog-content">
                <div class="title three-line"><a href="#">From an amazing
                  idea to an amazing
                  app that</a>
                </div>
                <p>Learn the secret to how to
                  enter the world of mobile
                  apps .....
                </p>
                <div class="btn-container">
                  <a target="_blank" class="white-btn blue pxl-ext" href="https://www.valuecoders.com/contact" data-wpel-link="internal" rel="noopener follow">Download Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <div class="cta-flex subscribe-footer">
      <div class="detail-subsbox subs-box">
        <div class="subs-head">
          <h3>Subscribe to our blog</h3>
          <p>Stay up to date with the latest marketing, sales, and SEO tips and news</p>
        </div>
        <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer();