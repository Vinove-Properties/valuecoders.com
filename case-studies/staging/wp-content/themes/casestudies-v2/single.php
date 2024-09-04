<?php
  /**
   * The template for displaying all single posts
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
   *
   * @package WordPress
   * @subpackage Twenty_Seventeen
   * @since Twenty Seventeen 1.0
   * @version 1.0
   */
  get_header(); ?>
<?php
  $postid = get_the_ID();
  $postttile= get_the_title();
  $post_meta = get_post_meta($postid);
  $yellow_title = $post_meta['headingText'][0];
  $white_title = $post_meta['subheadingText'][0];
  /*
  if(!empty($yellow_title) && !empty($white_title) ){
        $custom_title = "<h1><span>".$yellow_title."</span> ".$white_title."</h1>";
  }else{
        $custom_title = "<h1>".get_the_title()."</h1>";
  }
  */
  $custom_title = "<h1>".get_the_title()."</h1>";
  $content = get_the_content();
  //$content = $post_meta['short_description'][0];
  
  $uploads            = wp_upload_dir();
  $upload_baseurl 		= $uploads['baseurl']."/"; 
  $webp_uploads_path 	= $uploads['baseurl']."-webpc/uploads/";
  
  //$bg_image_id = $post_meta['background_image_url'][0];
  $bg_image_id = $post_meta['post_detail_image'][0];
  if(!empty($bg_image_id)){
      $image_attributes = wp_get_attachment_metadata($bg_image_id);
      $file_name = $image_attributes['file'];
      $final_bg_image = array(
      'jpeg' 	  => $upload_baseurl.$file_name,
      'webp' 	  => content_url('/smush-webp/').$file_name.".webp",
      'orginal' => $upload_baseurl.$file_name
      );
  }else{
  $default_image_path = get_template_directory_uri()."/assets/img/";
  $default_jpeg = 'casebanner.png';
  $default_webp = 'casebanner.webp';
  $final_bg_image = array(
        'jpeg' => $default_image_path.$default_jpeg,
        'webp' => $default_image_path.$default_webp,
      );
  }
  
  $term_list = get_the_terms($postid, 'post_tag'); //technology
  
  /*echo '<pre>'; print_r($term_list); echo '<pre>';*/
  
  $technology_list ='<ul>';
  foreach($term_list as $term_single) {
  $technology_list .= '<li class="'.$term_single->slug.'" title="'.$term_single->name.'">'.$term_single->name.'</li>';
  }
  $technology_list .='</ul>';
  $term_list = get_the_terms($postid, 'location');
  $name ='';
  foreach($term_list as $term_single) {
     $name .= ucfirst($term_single->slug).', ';
  }
  $location = rtrim($name, ', ');
  // echo "<br>{$location}";
  $term_list = get_the_terms($postid, 'service');
  $name ='';
  foreach($term_list as $term_single) {
     $name .= ucfirst($term_single->name).', ';
  }
  $service = rtrim($name, ', ');
  //echo "<br>{$service}";
  $term_list = get_the_terms($postid, 'industry');
  $name ='';
  foreach($term_list as $term_single) {
     $name .= ucfirst($term_single->name).', ';
  }
  $industry = rtrim($name, ', ');
  
  //client requirement section
  $client_requirement = $post_meta['client_requirement'][0];
  $requirement_line_2 = $post_meta['requirement_line_2'][0];
  
  
  
  //$case_study_catalog = $post_meta['case_study_catalog'][0];
  
  //$case_study_catalog_count = count(get_field("case_study_catalog"));
  
  $task_overview = $post_meta['task_overview'][0];
  //echo "<br>{$task_overview}";
  $task_problem = $post_meta['problem'][0];
  $our_approach = $post_meta['our_approach'][0];
  $full_paragraph = $post_meta['full_paragraph'][0];
  
  $ux_development_and_testing = $post_meta['ux_development_and_testing'][0];
  
  
  $front_end_technology = maybe_unserialize($post_meta['front_end_technology'][0]);
  if(!empty($front_end_technology))
  foreach ($front_end_technology as $frontend) {
    $frontend_term = get_term( $frontend, 'technology' );
    $frontend_icon .= '<i class="icon '.$frontend_term->slug.'"></i>';
  }
  
  
  $frontend_content = $post_meta['frontend_content'][0];
  
  $back_end_technology = maybe_unserialize($post_meta['backend_technology'][0]);
  if(!empty($back_end_technology))
  foreach ($back_end_technology as $backend) {
    $backend_term = get_term( $backend, 'technology' );
    $backend_icon .= '<i class="icon '.$backend_term->slug.'"></i>';
  }
  
  $backend_content = $post_meta['backend_content'][0];
  
  $ux_development_testing_summary = $post_meta['ux_development_testing_summary'][0];
  
  $final_result = $post_meta['final_result'][0];
  $slider_images = maybe_unserialize($post_meta['slider_images'][0]);
  if(!empty($slider_images)){
    foreach ($slider_images as $image_id) {
      $image_attributes = wp_get_attachment_metadata($image_id);
        $file_name = $image_attributes['file'];
        $arrayName[] = array(
          'jpeg' => $upload_baseurl.$file_name,
          'webp' => $webp_uploads_path.$file_name.".webp",
          'orginal' => $upload_baseurl.$file_name
         );
    }
  }
  
  $appr_image = $post_meta['right_image'][0];
  if(!empty($appr_image)){
  $image_attributes = wp_get_attachment_metadata($appr_image);
  $file_name = $image_attributes['file'];
  $approach_right_image = array(
        'jpeg' => $upload_baseurl.$file_name,
        'webp' => $webp_uploads_path.$file_name.".webp",
        'orginal' => $upload_baseurl.$file_name
       );
  
  $approach_html = '<picture class="imgbox">';
  $approach_html .= '<source type="image/webp" srcset="'.$approach_right_image['webp'].'">';
  $approach_html .= '<source type="image/jpeg" srcset="'.$approach_right_image['jpeg'].'">';
  $approach_html .= '<img src="'.$approach_right_image['orginal'].'" alt="'.$postttile.'">';
  $approach_html .= '</picture>';
  }
  
  $final_image = $post_meta['final_image'][0];
  if(!empty($final_image)){
  $image_attributes = wp_get_attachment_metadata($final_image);
  $file_name = $image_attributes['file'];
  $final_image = array(
        'jpeg' => $upload_baseurl.$file_name,
        'webp' => $webp_uploads_path.$file_name.".webp",
        'orginal' => $upload_baseurl.$file_name
       );
  
  $final_image_html = '<picture class="imgbox">';
  $final_image_html .= '<source type="image/webp" srcset="'.$final_image['webp'].'">';
  $final_image_html .= '<source type="image/jpeg" srcset="'.$final_image['jpeg'].'">';
  $final_image_html .= '<img src="'.$final_image['orginal'].'" alt="'.$postttile.'">';
  $final_image_html .= '</picture>';
  }
  
  $final_key_points = $post_meta['key_points'][0];
  $final_summary_application_url = $post_meta['summary_application_url'][0];
  
  
  $ux_image_image = $post_meta['ux_image'][0];
  if(!empty($ux_image_image)){
  $image_attributes = wp_get_attachment_metadata($ux_image_image);
  $file_name = $image_attributes['file'];
  $ux_image_image = array(
        'jpeg' => $upload_baseurl.$file_name,
        'webp' => $webp_uploads_path.$file_name.".webp",
        'orginal' => $upload_baseurl.$file_name
       );
  
  $ux_image_image_html .= '<div class="requirment-img">';
  $ux_image_image_html .= '<picture class="imgbox">';
  $ux_image_image_html .= '<source type="image/webp" srcset="'.$ux_image_image['webp'].'">';
  $ux_image_image_html .= '<source type="image/jpeg" srcset="'.$ux_image_image['jpeg'].'">';
  $ux_image_image_html .= '<img src="'.$ux_image_image['orginal'].'" alt="'.$postttile.'">';
  $ux_image_image_html .= '</picture>';
  $ux_image_image_html .= '</div>';
  }
  
  $requirment_image = $post_meta['requirement_image'][0];
  if(!empty($requirment_image)){
  $image_attributes = wp_get_attachment_metadata($requirment_image);
  $file_name = $image_attributes['file'];
  $requirment_image = array(
  'jpeg' => $upload_baseurl.$file_name,
  'webp' => $webp_uploads_path.$file_name.".webp",
  'orginal' => $upload_baseurl.$file_name
  );
  
  $requirment_image_html .= '<div class="requirment-img">';
  $requirment_image_html .= '<picture class="imgbox">';
  $requirment_image_html .= '<source type="image/webp" srcset="'.$requirment_image['webp'].'">';
  $requirment_image_html .= '<source type="image/jpeg" srcset="'.$requirment_image['jpeg'].'">';
  $requirment_image_html .= '<img src="'.$requirment_image['orginal'].'" alt="'.$postttile.'">';
  $requirment_image_html .= '</picture>';
  $requirment_image_html .= '</div>';
  }
  
  $case_study_catalog = $post_meta['case_study_catalog'][0];
  
  $app_store_link = $post_meta['app_store_link'][0];
  $google_play_link = $post_meta['google_play_link'][0];
  //print_r($approach_right_image);
  // $bg_css .= '<style type="text/css">';
  // if( isset( $final_bg_image['webp'] ) && !empty( $final_bg_image['webp'] ) ){
  //  $bg_css .= 'background-image: url("'.$final_bg_image['webp'].'")';
  // }else{
   // $bg_css .= 'background-image: url("'.$final_bg_image['jpeg'].'")';
  //}
  
  //$bg_css .= '.no-webp .casebanner{background-image: url("'.$final_bg_image['jpeg'].'")';
  // if( file_exists( $final_bg_image['webp'] ) ){
  // $bg_css .= 'background-image: url("'.$final_bg_image['webp'].'")';  
  // }else{
  $bg_css = 'background-image: url("'.$final_bg_image['jpeg'].'")';
  // }
  // $bg_css .= '</style>';
  //echo $bg_css;
  $glbHassolution = get_field( 'how_software_works', $postid );
  ?>  
<section class="hero-section vlazy" style='<?php echo $bg_css; ?>'>
  <div class="container">
    <?php echo $custom_title; ?>
    <?php 
      if(!empty($content)){
        echo '<p>'.$content.'</p>';
      }
      ?>
    <div class="tech-use">
      <span>Technology Used:</span>
      <?php echo $technology_list; ?>
    </div>
  </div>
</section>
<?php 
$fgVarTwo = get_field( 'v2-options' );
$hasOpts  = false;
if( isset( $fgVarTwo['is_enabled'] ) && ( $fgVarTwo['is_enabled'] == "yes" ) ){
$hasOpts = true;
}

/*
$project_synopsis = get_field('project_synopsis');
$project_req      = get_field('project_req');
$hasSyn = ( isset( $project_synopsis['is_enabled'] ) && !empty($project_synopsis['is_enabled']) ) ? $project_synopsis['is_enabled'] : 'no';
$hasReq = ( isset( $project_req['is_enabled'] ) && !empty($project_req['is_enabled']) ) ? $project_req['is_enabled'] : 'no';
$nwFlds = get_field('v2-options');
*/
?>
<section class="case-section padding-t-120 padding-b-120">
  <div class="container">
    <div class="case-wrap" id="case-study">
      <div class="case-sticky">
        <div class="left-bar" id="case-question">
          <div class="bor-line">
            <h3>CASE STUDY</h3>
            <ul class="question-list">
              <?php 
              if( $hasOpts === true ){
                $li_count = 0; 
                if( $fgVarTwo['sections'] ){
                  foreach( $fgVarTwo['sections'] as $sections ){ 
                  $li_count++;
                  $isActive = ( $li_count === 1 ) ? 'active' : '';
                  $optID = "option-".$li_count;
                  echo '<li><a href="#'.$optID.'" class="'.$isActive.'">'.$sections['title'].'</a></li>';  
                  }
                }  
              }
              /*
              if( $hasSyn == "yes" ){
                echo '<li><a href="#ans_synopsis" class="active">Project Synopsis</a></li>';
              }
              if( $hasReq == "yes" ){
                $thisActive = ( ($hasSyn == "no") ) ? "active" : "";
                echo '<li><a href="#ans_req" class="'.$thisActive.'">Project Requirements</a></li>';
              }
              */
              ?>
              
              <li><a href="#ans_1" class="<?php echo ( ($hasOpts === false ) ) ? 'active' : ''; ?>">Key challenges</a></li>
              <?php if( $glbHassolution ) : ?>
              <li><a href="#ans_sol" class="">Solution Implementation</a></li>
              <?php endif; ?>
              <li><a href="#ans_3" class="">Results</a></li>

              <?php  /*
                if( !wp_is_mobile() ) :
                $case_study_catalog_count = count(get_field("related_post_to_show"));
                $posts = get_field('related_post_to_show');
                if($case_study_catalog_count>1){ ?>
              <li><a href="#ans_4" class="">Work speaks louder than words</a></li>
              <?php } 
                endif;*/
                ?>

            </ul>
            <div class="share">
              <button id="shareDiv" class="searchBtn" onClick="fun()"><i></i>Share</button>
              <div id="myDIV">
                <div class="social-share">
					      <?php echo do_shortcode('[addtoany]'); ?>
                </div>
              </div>
            </div>
        </div>
        <div class="rightcustom margin-40">
          <h2>Simplify and scale<br> your processes<br> with ValueCoders</h2>
          <div class="text-center btn-container">
            <a href="https://www.valuecoders.com/contact" class="banner-btn" data-wpel-link="internal">Talk To Our Experts<i class="cusarrow-icon"></i></a>
          </div>
        </div>
              </div>

        <div class="right-bar" id="case-answer-part">
              <?php 
              if( $hasOpts === true ){
                $li_count = 0; 
                if( $fgVarTwo['sections'] ){
                  foreach( $fgVarTwo['sections'] as $sections ){
                    $li_count++;
                    $isActive = ( $li_count === 1 ) ? 'active' : '';
                    $optID = "option-".$li_count;
                    echo '<div class="case-answer '.$optID.'" id="'.$optID.'">
                    <h2>'.$sections['title'].'</h2>'.
                    $sections['content'].'</div>';
                  }  
                }                
              }
              ?>
              <div class="case-answer ans_1" id="ans_1">
                <h2>Key challenges</h2>
                <!--Repeater items starts Key Challenges-->
                <!-- while loop starts -->
                <?php if(get_field('key_challenges')!='')echo get_field('key_challenges','',true);?>
                <?php 
                  $keyChallenge_rows = get_field('key_challenges_1');
                  // echo "<pre>";print_r($rows);
                  if(!empty($keyChallenge_rows[0])){
                  if($keyChallenge_rows)
                  {
                      foreach($keyChallenge_rows as $row)
                          {
                  ?>
                <ul>
                  <li>
                    <span></span>
                    <?php echo $row['item_1'];?>
                  </li>
                  <li>
                    <span></span>
                    <?php echo $row['item_2'];?>
                  </li>
                  <?php if($row['item_3']!=''){?>        
                  <li>
                    <span></span>
                    <?php echo $row['item_3'];?>
                  </li>
                  <?php }?>  
                  <?php if($row['item_4']!=''){?>        
                  <li>
                    <span></span>
                    <?php echo $row['item_4'];?>
                  </li>
                  <?php }?> 
                  <?php if($row['item_5']!=''){?>        
                  <li>
                    <span></span>
                    <?php echo $row['item_5'];?>
                  </li>
                  <?php }?>
                  <?php if($row['item_6']!=''){?>        
                  <li>
                    <span></span>
                    <?php echo $row['item_6'];?>
                  </li>
                  <?php }?>
                  <?php if($row['item_7']!=''){?>        
                  <li>
                    <span></span>
                    <?php echo $row['item_7'];?>
                  </li>
                  <?php }?>                                
                </ul>
                <?php }}}//end of condition?>
              </div>
                <?php if( $glbHassolution ) : ?>
              <div class="case-answer ans_sol" id="ans_sol">
                <h2>Solution Implementation</h2>
                <?php echo get_field('how_software_works','',true);?>
              </div>
                <?php endif; ?>
              <div class="case-answer ans_3" id="ans_3">
                <h2>Results</h2>
                <p> <?php if(get_field('results_text_part_1')!='')echo get_field('results_text_part_1','',true);?></p>
                <?php 
                  $business_solution_bg = get_field('small_image');
                  $images = get_field('results_benefits_image_1');
                  
                  ?>
                <div class="case-slider">
                  <div class="glider-content">
                    <div class="press-glider">
                      <?php 
                        $in = 0;
                        foreach( $images as $image ){ ?>
                      <div class="press-row">
                      <img src="<?php echo $image['url'];?>" alt="<?php echo $postttile; ?>" width="<?php echo $image['width'];?>" height="<?php echo $image['height'];?>"/>
                      </div>
                      <?php 
                        $in++;
                        } ?>
                    </div>
                    <div role="tablist" class="dots"></div>
                  </div>
                </div>
              </div>
              
              <?php /*
                if( !wp_is_mobile() ) :
                $case_study_catalog_count = count(get_field("related_post_to_show"));
                $posts = get_field('related_post_to_show');
                if($case_study_catalog_count>1){
                ?>
              <div class="case-answer ans_4" id="ans_4">
                <h2>Work speaks louder than words</h2>
                <p>Request a free consultation and get a no obligation quote for your project within 8 Business hours.
                </p>
                <div class="case-slider">
                  <div class="glider-content">
                    <div class="work-glider">
                      <?php
                        if( $posts ):
                        $i=1;  
                        foreach( $posts as $post): // variable must be called $post (IMPORTANT) 
                        setup_postdata($post);
                        ?>
                      <?php
                        $product_image      = get_field('full_size_image');
                        $image_attributes   = wp_get_attachment_metadata($product_image['id']);
                        $file_name          = $image_attributes['file'];
                        $smush_upload_path  = content_url()."/smush-webp/";
                        
                        $product_image = array(
                        'jpeg'    => $upload_baseurl.$file_name,
                        'webp'    => $smush_upload_path.$file_name.".webp",
                        'orginal' => $upload_baseurl.$file_name
                        );
                        ?>
                      <div class="work-row">
                        <div class="imgcol">
                          <?php
                            $titlep = get_the_title();
                            if(@getimagesize($product_image['webp'])){
                                         echo '<picture>';
                                         echo '<source type="image/webp" srcset="'.$product_image['webp'].'">';
                                         echo '<source type="image/jpeg" srcset="'.$product_image['jpeg'].'">';
                                         echo '<img src="'.$product_image['orginal'].'" alt="'.$titlep.'">';
                                         echo '</picture>';
                                         }else{
                                         echo "<img src=".$product_image['jpeg']." alt='$titlep'>";
                                         }
                                         ?>
                        </div>
                        <div class="text-col">
                          <h2><?php the_title(); ?></h2>
                          <p><?php echo get_field('short_description','',false);?>
                          </p>
                          <a class="green-btn" href="<?php the_permalink(); ?>"" role="button" data-slide="prev">View Casestudy<i class="arrow-icon"></i></a>
                        </div>
                      </div>
                      <?php 
                        $i++; 
                        endforeach;
                        wp_reset_postdata();           
                        endif;
                        ?>
                    </div>
                    <div role="tablist" class="dots2"></div>
                  </div>
                </div>
              </div>
              <?php }
               
                endif; //end wp_is_mobile(); */
                ?> 
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<?php 
$isEnabled = get_field( 'cs_needed' );
if( isset( $isEnabled ) && ($isEnabled == "yes") ) :
?>
<section class="full-width-two-column">
<div class="dis-flex  in-container">
  <?php 
  $case_study_catalog_count = count(get_field("related_post_to_show"));
  $inPosts = get_field('related_post_to_show');
  if( $case_study_catalog_count > 3 ) :
  $counter = 1;
  $args = array(
  'post_type' => 'post',
  'post_status'=>'publish',
  'order'=>'DESC',
  'post__in' => $inPosts,
  'posts_per_page'=>4, 
  );
  query_posts($args);
  if(have_posts()):
  echo '<div class="flex-row">';  
  while(have_posts()): the_post();
  //get_template_part( 'template-parts/post/content');
  get_template_part( 'template-parts/post/content', 'v2', array('counter' => $counter ) );
  $counter++;
  endwhile;
  wp_reset_query();             
  echo '</div>'; //flex-row Close
  endif;
  endif;
  ?>
  </div>
</section>
<?php endif; ?>

<script>
  function preloadImages(urls, allImagesLoadedCallback){
  	var loadedCounter = 0;
    var toBeLoadedNumber = urls.length;
    urls.forEach(function(url){
    	preloadImage(url, function(){
      	loadedCounter++;
       console.log('Number of loaded images: ' + loadedCounter);
        if(loadedCounter == toBeLoadedNumber){
        	allImagesLoadedCallback();
        }
      });
    });
    function preloadImage(url, anImageLoadedCallback){
        var img = new Image();
        img.src = url;
        img.onload = anImageLoadedCallback;
    }
  } 
  preloadImages([
  	'<?php echo $final_bg_image['jpeg'] ?>',
  ], function(){
  	console.log('All images were loaded');
  });
</script>
<?php get_footer();