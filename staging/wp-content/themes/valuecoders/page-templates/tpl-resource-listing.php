<?php
/*
Template Name: Resource Post Listing Template
*/ 
global $post;
get_header();
?>
<section class="hero-section" style="background-image:url(<?php bloginfo('template_url'); ?>/v3.0/images/resource-banner.jpg);">
 <div class="container">
    <div class="content-wrap">
       <div class="dis-flex">
          <div class="left-box">
             <?php 
		      while( have_posts() ) : the_post();
		      the_content();
		      endwhile;   
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
<section id="has-ug" class="tab-scroll-section resource-tab padding-t-100 padding-b-100">
 <div class="container">
    <div id="scroll-box" class="dis-flex tab-contents justify-sb no-js">
       	<div class="left-tabs" id="left-scroll">
          <div class="sticky-tab">
             <h3>Categories</h3>
             <?php 
               $ws_categories = get_categories( array(
               'hide_empty' => false,   
               'orderby' => 'name',
               'order'   => 'ASC'
               ) );
               if( $ws_categories ){
               echo '<div class="tab-nav">';
               $i = 0;
               foreach( $ws_categories as $row ){ $i++;
                  $is_active = ( $i === 1 ) ? 'is-active' : '';
                  echo '<a href="#ug'.$i.'" class="tab-link '.$is_active.'">'.$row->name.'</a>';
               }
               echo '</div>';
               }
               ?>             
          </div>
       	</div>
       	<div  class="right-tabs" id="right-scroll">
			<?php 
			if( $ws_categories ) : 
			$ic = 0;
			foreach( $ws_categories as $row ) : 
			$ic++;
			$thumbnail_id  = get_field( 'category_image', 'term_'.$row->term_id ); 
			?>
          <div class="tab-content" id="ug<?php echo $ic; ?>">
			<?php
			if( $row->description ){
				echo '<p>'.$row->description.'</p>';
			}
			if( $thumbnail_id && is_array($thumbnail_id) ){
				echo vc_pictureElm( $thumbnail_id );
			}
			?>
			<?php 
			$posts = get_posts(['numberposts' => 5, 'category' => $row->term_id]);
			if( $posts ){
			echo '<div class="rerow">';
			 foreach( $posts as $wpost ) {
			    echo '<div class="recol">
			    <h5>'.get_field('rpost-type', $wpost->ID ).'</h5>
			    <h4><a href="'.get_permalink($wpost->ID).'">'.$wpost->post_title.'</a></h4>
			    <p>'.get_field('listing-text', $wpost->ID).'</p>
			    </div>';
			}
			echo '</div>';
			}
			?> 
          </div>
          <?php endforeach; endif; ?>
       	</div>
    </div>
 </div>
</section>
<?php get_footer(); ?>