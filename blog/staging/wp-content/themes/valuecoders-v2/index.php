<?php 
get_header();

$popularPosts = get_field('pop-posts', 'option');
$popularPosts = explode(',', $popularPosts);

$catBlockOne  = get_field('row-c1', 'option');
$catBlockTwo  = get_field('row-c2', 'option'); 
?>
<section class="blog-main-page">
  <div class="container">
  <div class="mobile-active"><span class="blogtog" href="javascript:void(0)">Blog Home</span></div>
    <div class="blog-cat hidden" id="blog-cat">
      <ul>
        <li><a href="<?php echo get_category_link(4784); ?>">AI & ML</a></li>
        <li><a href="<?php echo get_category_link(4459); ?>">Analytics</a></li>
        <li><a href="<?php echo get_category_link(5265); ?>">Cloud Services</a></li>
        <li><a href="<?php echo get_category_link(4733); ?>">Data Engineering</a></li>
        <li><a href="<?php echo get_category_link(1481); ?>">Ecommerce</a></li>
        <li><a href="<?php echo get_category_link(4457); ?>">Industries</a></li>
        <li><a href="<?php echo get_category_link(4460); ?>">On Demand Teams</a></li>
      </ul>
    </div>
    <div class="top-content">
      <h1>Software Innovation Starts Here</h1>
      <p>Tap into the power of our top 1% software engineers and 675+ digital transformation experts.<br>Get insights to drive your business forward in today’s competitive landscape.
</p>
    </div>
    <div class="search-blogs">
      <div class="ser-left"><span class="ftin">Featured In</span> <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/vc-featured-logos.svg" alt="Valuecoders">
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
          <a href="'.get_permalink().'"><img width="1024" height="462" src="'.$stkThumb.'" alt="valuecoders" loading="lazy"></a>
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
              <img width="1024" height="462" src="'.$stkThumb.'" alt="valuecoders" loading="lazy"></a>              
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
          <img loading="lazy"  src="<?php bloginfo('template_url'); ?>/dev-img/cta-ws.svg" alt="valuecoders" width="214" height="176">
        </picture>
        <div class="cus-cont">
          <div class="cushed">Manage teams and projects efficiently with Workstatus.</div>
          <div class="btn-container">
            <a target="_blank" class="white-btn blue pxl-ext" 
            href="https://www.workstatus.io" data-wpel-link="internal" rel="follow noopener">Start Free Trial</a>
          </div>
        </div>
      </div>
      <div class="detail-subsbox subs-box">
        <h3>Subscribe to our blog</h3>
        <p>Be a part of a thriving community of 10000+ tech enthusiasts and learners.</p>
        <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
      </div>
    </div>

    <?php 
    $videoBlock  = get_field('px-videos', 'option');
    if( isset( $videoBlock['required'] ) && ($videoBlock['required'] == "yes") ) : ?>
    <div class="pc-blog-list videos-post">
      <div class="main-intro">
        <h2><?php echo $videoBlock['title']; ?></h2>
        <a href="https://www.youtube.com/@Valuecoders" class="view-all-link" target="_blank" rel="noopener">View All</a>
      </div>
      <div class="blog-posts-list three-columns">
        <?php 
        if( $videoBlock['videos'] ){
          $i = 0;
          foreach( $videoBlock['videos'] as $video ){$i++;
          $viidThumb = ( $video['thumb'] ) ? $video['thumb']['url'] : 
          get_bloginfo('template_url').'/dev-img/default-image.jpg';
          echo '<div class="blog-post-col medium-size">
          <div class="blog-image">
            <span class="play-btn" onclick="_playYTmedia(\''.$video['link'].'\')">
            <img alt="play btn" loading="lazy" src="'.get_bloginfo('template_url').'/assets/images/play-btn.png">
            </span>
            <picture>
            <img class="video-thumb" src="'.$viidThumb.'" alt="valuecoders" loading="lazy">
            </picture>
          </div>
          <div class="blog-content">
            <div class="title two-line"><a href="javascript:void(0);" class="igl_link" onclick="_playYTmedia(\''.$video['link'].'\')">'.$video['title'].'</a></div>
          </div>
          </div>';
          if( $i == 3 ){ 
            echo '</div><!--//.blog-posts-list three-columns--><div class="blog-posts-list three-columns">';
          }
          }
        }
        ?>        
      </div>
    </div>
    <?php endif; ?>
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
<?php 
if( 
  isset($catBlockOne['required']) && 
  ($catBlockOne['required'] == "yes") && 
  is_array( $catBlockOne['cat-tab'] ) && 
  (count($catBlockOne['cat-tab']) > 0)  
) :
$getActiveCat = $catBlockOne['cat-tab'][0]['link'];
?>
<div class="pc-blog-list" id="cat-sec-1">
<div class="main-intro">
<h2><?php echo $catBlockOne['title']; ?></h2>
<a href="<?php echo $getActiveCat; ?>" class="view-all-link" target="_blank" rel="noopener">View All</a>
</div>
  <div class="devs-category">
    <?php   
    echo '<ul class="tabing_panel">';
    $tb = 0;
    foreach( $catBlockOne['cat-tab'] as $tab ){
      $tb++;
      $isActive = ( $tb === 1 ) ? 'active' : ''; 
      echo '<li onclick="switchCat(\'cat-sec-1\', \'term_ID-'.$tab['tag-posts']->term_id.'\', this);" 
      data-link="'.$tab['link'].'" class="'.$isActive.'">'.$tab['tag-posts']->name.'</li>';
    }
    echo '</ul>';    
    ?>
  </div> 
  <?php 
  $tc = 0;  
  foreach( $catBlockOne['cat-tab'] as $catBlock ){
    if( $catBlock['tag-posts'] ){ $tc++;
    $isActive = ( $tc === 1 ) ? 'active' : '';   
    $catID      = $catBlock['tag-posts']->term_id;
    $postBlock  = pxlGetTopThreePosts( $catID, 'tag' );
    ?>     
    <div class="blog-posts-list two-columns developsc tabc-elm <?php echo $isActive; ?>" id="term_ID-<?php echo $catID; ?>">
      <div class="blog-post-col big-size">
      <?php
      if( isset($postBlock[0]) ){
        echo bigBlockPost( $postBlock[0] );
      }
      ?>
      </div>
      <div class="blog-post-col medium-size">
      <div class="develop-row wid-75" id="pc1-sp">
        <?php 
        if( isset($postBlock[1] ) ){
          echo smallBlockPost($postBlock[1]);
        }

        if( isset( $postBlock[2] ) ){
          echo smallBlockPost($postBlock[2]);
        }
        ?>
      </div>
      
      <div class="develop-row wid-35 bg-yellow">
        <div class="devs-col">
          <div class="blog-image">
            <?php 
            if( $catBlockOne['e-image'] ){
            echo '<picture>
            <img src="'.$catBlockOne['e-image']['url'].'" 
            height="'.$catBlockOne['e-image']['height'].'" 
            width="'.$catBlockOne['e-image']['width'].'" 
            alt="valuecoders" loading="lazy">
            </picture>';  
            }
            ?>
          </div>
          <div class="blog-content">
            <div class="title three-line"><?php echo $catBlockOne['e-title']; ?></div>
            <p><?php echo $catBlockOne['e-text']; ?></p>
            <div class="btn-container">
              <a class="white-btn blue pxl-ext" 
              onclick="geteBookpopup('<?php echo $catBlockOne['e-title']; ?>', '<?php echo $catBlockOne['e-link']; ?>')" href="javascript:void(0);">Download Now</a>
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
    <?php 
    }
  }
  ?>
</div>
<?php endif; ?>

<?php 
if( 
  isset($catBlockTwo['required']) && 
  ($catBlockTwo['required'] == "yes") && 
  is_array( $catBlockTwo['cat-tab'] ) && 
  (count($catBlockTwo['cat-tab']) > 0)  
) :
$getActiveCat = $catBlockTwo['cat-tab'][0]['link'];
?>
<div class="pc-blog-list" id="cat-sec-2">
<div class="main-intro">
<h2><?php echo $catBlockTwo['title']; ?></h2>
<a href="<?php echo $getActiveCat; ?>" class="view-all-link" target="_blank" rel="noopener">View All</a>
</div>
  <div class="devs-category">
    <?php   
    echo '<ul class="tabing_panel">';
    $tb = 0;
    foreach( $catBlockTwo['cat-tab'] as $tab ){
      $tb++;
      $isActive = ( $tb === 1 ) ? 'active' : ''; 
      echo '<li onclick="switchCat(\'cat-sec-2\', \'term_ID-'.$tab['tag-posts']->term_id.'\', this);" 
      data-link="'.$tab['link'].'" class="'.$isActive.'">'.$tab['tag-posts']->name.'</li>';
    }
    echo '</ul>';    
    ?>
  </div> 
  <?php 
  $tc = 0;  
  foreach( $catBlockTwo['cat-tab'] as $catBlock ){
    if( $catBlock['tag-posts'] ){ $tc++;
    $isActive = ( $tc === 1 ) ? 'active' : '';   
    $catID      = $catBlock['tag-posts']->term_id;
    $postBlock  = pxlGetTopThreePosts( $catID, 'tag' );
    ?>     
    <div class="blog-posts-list two-columns developsc tabc-elm <?php echo $isActive; ?>" id="term_ID-<?php echo $catID; ?>">
      <div class="blog-post-col big-size">
      <?php
      if( isset($postBlock[0]) ){
        echo bigBlockPost( $postBlock[0] );
      }
      ?>
      </div>
      <div class="blog-post-col medium-size">
      <div class="develop-row wid-75" id="pc2-sp">
        <?php 
        if( isset($postBlock[1] ) ){
          echo smallBlockPost($postBlock[1]);
        }

        if( isset( $postBlock[2] ) ){
          echo smallBlockPost($postBlock[2]);
        }
        ?>
      </div>
      <div class="develop-row wid-35 bg-blue">
        <div class="devs-col">
          <div class="blog-image">
            <?php 
            if( $catBlockTwo['e-image'] ){
            echo '<picture>
            <img src="'.$catBlockTwo['e-image']['url'].'" 
            height="'.$catBlockTwo['e-image']['height'].'" 
            width="'.$catBlockTwo['e-image']['width'].'" 
            alt="valuecoders" loading="lazy">
            </picture>';  
            }
            ?>
          </div>
          <div class="blog-content">
            <div class="title three-line"><?php echo $catBlockTwo['e-title']; ?></div>
            <p><?php echo $catBlockTwo['e-text']; ?></p>
            <div class="btn-container">
              <a class="white-btn blue pxl-ext" 
              onclick="geteBookpopup('<?php echo $catBlockTwo['e-title']; ?>', '<?php echo $catBlockTwo['e-link']; ?>')" 
              href="javascript:void(0);">Download Now</a>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <?php 
    }
  }
  ?>
</div>
<?php 
endif; 

endif; // Ignore For Paged ?>
<div class="cta-flex subscribe-footer">
  <div class="detail-subsbox subs-box">
    <div class="subs-head">
      <h3>Subscribe to our blog</h3>
      <p>Be a part of a thriving community of 10000+ tech enthusiasts and learners.</p>
    </div>
    <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
  </div>
</div>
</div>
</section>
<div id="eb-modal" 
class="modal <?php echo (isset($_GET['ep-action']) && ($_GET['ep-action'] == "show")) ? 'show-modal epaction': ''; ?>">
  <section class="pop-up-section">
    <span class="close-button">×</span>
    <div class="container" id="formid">
      <h2>Download Your FREE e-Guide NOW!</h2>
      <p>Discover What, Why & How of "<span id="eguide-title"></span>" with this FREE e-Guide!</p>
      <div class="left-right-box">        
        <?php 
        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
          echo '<div class="afterverify">';  
          global $wpdb; 
          $email    = $_GET['email'];
          $hashval  = $_GET['hash'];
          $result   = $wpdb->get_row( $wpdb->prepare("SELECT * FROM `wp_ebookdata` where hashcode = '%s' AND 
          email = '%s'", $hashval, $email ) );
          if($result){
            $eData = unserialize( $result->pdflink );
            if( isset( $eData['file'] ) && !empty( $eData['file'] ) ){
            echo '<h3>Thank you for verifying your email id. Please click on Download button to download your e-guide</h3>';
            echo '<button id="temp-epf-title" data-title="'.$eData['title'].'"><a href="'.$eData['file'].'" download>Download Now</a></button>';  
            }         
          }
          echo '</div>';
        }else{
        ?>        
        <div class="rightnew">
          <div class="left-img">
            <picture>
              <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/dev-img/VC-Download-Now-Woman.png">
              <img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/VC-Download-Now-Woman.png" 
              alt="valuecoders" width="215" height="176">
            </picture>
          </div>
          <div class="right-img">
            <p id="responce" style="color:#fff;"></p>
            <form method="post" onsubmit="return _eBookDownload( this );" id="elm-eForm" class="orderform eguide-section">
              <p>Fill out the form below to download the e-Guide now.</p>
              <div class="">
                <input type="text" maxlength="50" name="firstName" id="first_name" placeholder="Enter your full name"
                class="input-field" onkeypress="return ValidateName(event,'lblError_firstname','firstName');" value="">
                <small class="error-msg-section" id="lblError_firstname"></small>
              </div>
              <div class="">
                <input type="email" placeholder="Enter your Email Address" maxlength="50" id="txtEmail" 
                class="input-field" value="" name="email">
                <small class="error-msg-section" id="lblError_email"></small>
              </div>
              <div class="country-fld">
                <input type="text" placeholder="Enter your Country"
                maxlength="25" class="input-field" value="" name="country" id="country" 
                onkeypress="return ValidateName(event,'lblError_country','country');">
                <small class="error-msg-section" id="lblError_country"></small>
              </div>
              <div class="">
                <input type="tel" placeholder="Enter your Phone Number" class="input-field" value="" name="phone" 
                id="phone_no" maxlength="20">
                <small class="error-msg-section" id="lblError_phone"></small>
              </div>
              <input type="hidden" value="" name="pd-elink" id="pdf-elink">
              <input type="hidden" value="" name="posttitle" id="input-etitle">              
              <input type="submit" id="ebook-btn" name="submit-me" value="Download Our e-Guide">
              <p id="errResp" style="padding:20px 10px;background:#fff;color:#f21010;margin-top:20px;display: none;"></p>
            </form>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
</div>
<?php get_footer();