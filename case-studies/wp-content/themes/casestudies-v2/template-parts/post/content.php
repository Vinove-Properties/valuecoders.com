<?php
  /**
   * Template part for displaying posts
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package WordPress
   * @subpackage Twenty_Seventeen
   * @since Twenty Seventeen 1.0
   * @version 1.2
   */
  
  ?>
  <div class="flex-style">
  <div class="flex-2 col-box">
    <div class="dis-flex">
      <?php //$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>
      <?php 
        $featured_img_url 	= get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); 
        $big_image 			= get_field('full_size_image');
        if( $big_image ){
        	$featured_img_url = $big_image['url'];
        }
        ?>
      <div class="flex-2">
        <a href="<?php the_permalink();?>">
          <div class="img-box img1" style="background-image:url('<?php echo $featured_img_url;?>')">
          <img src="<?php echo $featured_img_url;?>"/>
        </div>
      </div>
      <div class="flex-2 bg-light-theme content-box">
      <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
      <?php //the_excerpt();?>
      <p><?php $shortdesc = get_field('short_description','',false);
        echo wp_trim_words( $shortdesc, 20, '...' );
        ?></p>
      <div class="dis-flex other-details">
      <div class="flex-2 clr-white">Country</div>
      <div class="flex-2">India</div>
      <div class="flex-2 clr-white">Core tech</div>
      <div class="flex-2">.Net, React, Flutter</div>
      </div>
      <!--<ul>
        <?php 
          //$tags = get_the_tags(get_the_ID());
          //foreach( $tags as $tag ) {
          //echo "<li>".$tag->name."</li>";                      
          //}?>
        </ul>-->
      <a href="<?php the_permalink();?>" class="learn-more margin-t-50">Learn More <i class="round-arrow-icon"></i></a>
      </div>
    </div>
  </div>
  <div class="flex-2 col-box">
    <?php //$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>
    <?php 
      $featured_img_url 	= get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); 
      $big_image 			= get_field('full_size_image');
      if( $big_image ){
      	$featured_img_url = $big_image['url'];
      }
      ?>
    <div class="img-box img2" style="background-image:url('<?php echo $featured_img_url;?>')">
      <div class="content-box">
        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
        <p><?php $shortdesc = get_field('short_description','',false);
          echo wp_trim_words( $shortdesc, 20, '...' );
          ?></p>
        <div class="dis-flex other-details">
          <div class="flex-2 clr-white">Country</div>
          <div class="flex-2">India</div>
          <div class="flex-2 clr-white">Core tech</div>
          <div class="flex-2">.Net, React, Flutter</div>
        </div>
        <a href="<?php the_permalink();?>" class="learn-more margin-t-50">Learn More <i class="round-arrow-icon"></i></a>
      </div>
    </div>
  </div>
    </div>
