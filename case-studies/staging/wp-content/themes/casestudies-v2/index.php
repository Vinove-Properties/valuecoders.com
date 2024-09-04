<?php get_header(); ?>
<section class="full-width-two-column">
  <div class="row">
    <div class="container">
      <div class="headingsec">
        <h1>Success stories</h1>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="container">
      <ul class="nav nav-tabs tab-item" role="tablist">
        <li class="nav-item ">
          <a class="nav-link active" href="javascript:void(0);" role="tab" data-target="#services" data-toggle="tabajax" 
            data-id="8">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0);" role="tab" data-target="#industries" data-toggle="tabajax" data-id="12">Industries</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0);" role="tab" data-target="#technologies" data-toggle="tabajax" data-id="16">Technologies</a>
        </li>
      </ul>
    </div>
    <!-- Tab panes -->
    <input type="hidden" value="service" id="current_tag_selected"/>
    <input type="hidden" value="8" id="already_post_count"/>
    <div class="tab-content">
      <div class="loading-overlay" style="display:none;">
      </div>
      <div role="tabpanel" class="tab-pane active" id="services">
        <div class="services_button mt-2">
          <div class="container">
            <?php
              $term = 'service';
              $taxonomies = get_terms(array('taxonomy'=>'category','hide_empty'=>true,'child_of'=>8));	 
              if ( !empty($taxonomies) ) :
              $output = '<ul class="list-inline">';
              foreach( $taxonomies as $category ) {
              //if( $category->parent == 0 ) {							            
              $output.= '<li class="taxonomy_filter list-inline-item mt-2" data-id="'.$category->term_id.'"><span class="badge badge-pill badge-primary">'. esc_attr( $category->name ) .'</span></li>';
              foreach( $taxonomies as $subcategory ) {
              if($subcategory->parent == $category->term_id) {
              $output.= '<li class="list-inline-item"><span class="badge badge-pill badge-primary">'. esc_attr( $subcategory->name ) .'</span></li>';
              }
              }
              //$output.='</optgroup>';
              //}
              }
              $output.='</ul>';
              echo $output;
              endif;
              ?>
          </div>
        </div>
        <div class="dis-flex margin-t-100 in-container">
          <?php 
            //echo $published_posts = wp_count_posts()->publish; die;
            $counter = 1;
            $args = array(
            'post_type' => 'post',
            'post_status'=>'publish',
            'order'=>'DESC',
            'posts_per_page'=>8, 
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
            ?>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="industries"></div>
      <div role="tabpanel" class="tab-pane fade" id="technologies"></div>
    </div>
  </div>
</section>
<section>
  <div class="custom">
            <div class="row load-posts">
               <div class="nopost"></div>
               <div class="lode_mor_btn hidepost">
                  <span class="ajax-loader"><img src="https://www.valuecoders.com/case-studies/wp-content/themes/casestudies-v2/assets/img/ajax-loader.gif" height="32" width="32" alt="Loader" id="loaderImg" style="display: none;"></span>
                  <div class="cta-wrap justify-center">
                     <div class="cta-btn">
                        <a href="javascript:void(0);" id="load_more_post">
                        Load More
                        <span class="arrow-wrap">
                        <span class="arrow primera"></span>
                        <span class="arrow segunda next"></span>
                        <span class="arrow last"></span>
                        </span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</section>
<?php 
get_footer();