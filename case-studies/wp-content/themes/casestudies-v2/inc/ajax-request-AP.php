<?php 
   /*
    * @trilochan bhatt
    * Its handle all ajax request
    */
class Ajax_request_handle {

     function __construct() {

       add_action( 'wp_ajax_casestudy_service', array( $this, 'casestudy_filter_request' ));
       add_action( 'wp_ajax_nopriv_casestudy_service', array( $this, 'casestudy_filter_request' ));
 
       add_action( 'wp_ajax_casestudy_industry', array( $this, 'casestudy_filter_request' ));
       add_action( 'wp_ajax_nopriv_casestudy_industry', array( $this, 'casestudy_filter_request' ));

       add_action( 'wp_ajax_casestudy_technology', array( $this, 'casestudy_filter_request' ));
       add_action( 'wp_ajax_nopriv_casestudy_technology', array( $this, 'casestudy_filter_request' ));

       add_action( 'wp_ajax_casestudy_global', array( $this, 'casestudy_filter_request' ));
       add_action( 'wp_ajax_nopriv_casestudy_global', array( $this, 'casestudy_filter_request' ));

       add_action( 'wp_ajax_casestudy_load_more_posts', array( $this, 'casestudy_load_more_posts' ));
       add_action( 'wp_ajax_nopriv_casestudy_load_more_posts', array( $this, 'casestudy_load_more_posts' ));

       add_action( 'wp_ajax_casestudy_child_filter', array( $this, 'casestudy_child_filter_posts' ));
       add_action( 'wp_ajax_nopriv_casestudy_child_filter', array( $this, 'casestudy_child_filter_posts' ));

       add_action('wp_ajax_amp_form_submition', array( $this, 'casestudy_amp_form_submition' ));
       add_action('wp_ajax_nopriv_amp_form_submition', array( $this, 'casestudy_amp_form_submition' ));
     }

    function casestudy_amp_form_submition(){
    
    
    $domain_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    //$redirect_url = 'http://localhost/amp/thank-you.html';
    header("Content-type: application/json");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Origin: *");
    header("AMP-Access-Control-Allow-Source-Origin: ".$domain_url);
    /*/--Assuming all validations are good here--*/
    if( empty($redirect_url))
    {
        header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");

        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) 
        {
        $ip_addr = $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        //$ip_addr = '61.246.39.97';
        $user_email = trim($_POST['user-email']);
        $user_name = trim($_POST['user-name']);
        /*$firstn = trim($_POST['user-name']);
        $lastn = trim($_POST['user-name']);*/
        $user_phone = trim($_POST['user-phone']);
        $lead_source = "Case Studies";
        $utm_source = $_SERVER["HTTP_REFERER"];
        $utm_source = str_replace("&", "@", $utm_source);
        $requirement = trim($_POST['user-req']);
        $stpos = strpos($user_name," ");
        if($stpos===false) {
            $firstn = "";
            $lastn = $user_name;
        } else {
            $firstn = substr($user_name, 0,$stpos);
            $lastn = substr($user_name,($stpos+1));
        }

        $varHttpRef  = $_SERVER['HTTP_REFERER']; 
        $varHttpRef1 = explode('?',$varHttpRef);
        $varHttpRef2 = explode('&',$varHttpRef1[1]);
        if(strstr($varHttpRef2[0],'utm_source=gglads')){
            $lead_source = "Advertisement: Google";
        } else {
            $lead_source = "Case Studies";
        }
        $varDesc = "Url:".''."    
        File Uploaded :".'Not Uploaded'."
        Requirements: ".$requirement;        
        $arrZoho_v2 = array('Email' => $user_email,
                        'First Name'=>$firstn,
                        'Last Name'=> $lastn,
                        'Phone' => $user_phone,
                       // 'Country' => '',
                        'Lead Status' => 'Not Contacted Yet',
                        'Lead Source' => $lead_source,
                        'UTM Source' => $utm_source,
                        'Property' => 'ValueCoders',
                        'IP Address' => $ip_addr,
                        'Description'=> $varDesc,                           
                        'URL' => '',
                        'File Uploaded' => 'Not Uploaded',
                        'Requirements' => $requirement);
        $isSpam = checkSpamEmail($user_email);  
        if(!$isSpam) {            
            zohoCrmUpdate_v2($arrZoho_v2);
        }
        mail('vivek.avasthi@mail.vinove.com','post 1',print_r($arrZoho_v2,1));
        echo json_encode(array('message'=>'Thanks for your query. Our representative will get in touch with you soon'));
    }
    else
    {
        header("AMP-Redirect-To: ".$redirect_url);
        header("Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin");
        echo json_encode(array('message'=>'Thanks for your query. Our representative will get in touch with you soon'));        
    }        
    die();
    }

     function casestudy_child_filter_posts(){

      $taxonomy = $_POST['tag'];
      $term_id = $_POST['term_id'];

      /*
      $args = array(
      'posts_per_page' => -1,
      'order'=>'DESC',
      'post_type' => 'post', // you can change it according to your custom post type
      'tax_query' => array(
        array(
            'taxonomy' => $taxonomy, // you can change it according to your taxonomy
            'field' => 'term_id', // this can be 'term_id', 'slug' & 'name'
            'terms' => $term_id,
        )
      )
      );
      */
      $taxonomy = $_POST['tag'];
      $term_id = $_POST['term_id'];

      $args = array(
      'posts_per_page' => -1,
      'order'=>'DESC',
      'post_type' => 'post', // you can change it according to your custom post type
      'tax_query' => array(
          array(
              'taxonomy' => 'category', // you can change it according to your taxonomy
              'field' => 'term_id', // this can be 'term_id', 'slug' & 'name'
              'terms' => $term_id,
          )
      )
      );
      query_posts($args);
      if(have_posts()){
      while(have_posts()):
      the_post();
      get_template_part( 'template-parts/post/content');
      endwhile;
      }else{
      echo '<div class="casebox">Sorry! no content found.</div>';  
      }
      //endif;
          
      die;
     }

    function casestudy_load_more_posts(){
      $posts = $_POST['fetched_post'];
      $slug = $_POST['data_tag'];
      $args = array(  
              'post_type' => 'post', 
              'post_status'=>'publish',
              'order'=>'DESC',
              'taxonomy' =>  $slug, 
              'posts_per_page' => 8,
              'offset'=> $posts,               
      );
      query_posts($args);
      if(have_posts()):
      while(have_posts()):
      the_post();
      get_template_part( 'template-parts/post/content');
      endwhile;
      endif;
      wp_reset_postdata();
      die;
    }


     function casestudy_filter_request(){
      //$action = explode("_",$_GET['action']);
      $filter = $_POST['tab'];
      ?>
      <div class="services_button mt-2">
          <div class="container">
                <?php
              /*
              $taxonomies = get_terms( array(
                  'taxonomy' => $filter,
                  'hide_empty' => true
              ) );
              */
              $taxonomies = get_terms( array('taxonomy' => 'category', 'hide_empty' => true, 'child_of' => $filter ) );             
              if ( !empty($taxonomies) ) :
                  $output = '<ul class="list-inline">';
                  foreach( $taxonomies as $category ) {
                      //if( $category->parent == 0 ) {
                          $terms_array[] = $category->term_id;
                          //$output.= '<optgroup label="'. esc_attr( $category->name ) .'">';
                          $output.= '<li class="taxonomy_filter list-inline-item mt-2" data-id="'.$category->term_id.'"><span class="badge badge-pill badge-primary">'. esc_attr( $category->name ) .'</span></li>';
                          foreach( $taxonomies as $subcategory ) {
                              if($subcategory->parent == $category->term_id) {
                              //$output.= '<option value="'. esc_attr( $subcategory->term_id ) .'">
                                  //'. esc_html( $subcategory->name ) .'</option>';
                              $output.= '<li class="list-inline-item"><span class="badge badge-pill badge-primary">'. esc_attr( $subcategory->name ) .'</span></li>';
                              }
                          }
                          $output.='</optgroup>';
                      //}
                  }
                  $output.='</ul>';
                  echo $output;
              endif;
            ?>
            </div>
      </div>
      <div class="listing margin-t-100">
          
     
      <?php 
      // $cid = $_POST['cid'];
      /*$args = array(  
              'post_type' => 'post', 
              'paged' => $paged, 
              'posts_per_page' => 8, 
              'tax_query' => array( 
              array( 
              'taxonomy' => $filter, //or tag or custom taxonomy
              'field' => 'id', 
              'terms' => $terms_array, 
          ) 
        ) 
      );*/
      $args = array(  
              'post_type' => 'post', 
              'paged' => $paged, 
              'posts_per_page' => 8, 
              'tax_query' => array( 
              array( 
              'taxonomy' => 'category', //or tag or custom taxonomy
              'field' => 'id', 
              'terms' => $terms_array, 
          ) 
        ) 
      ); 
      query_posts($args);
      if(have_posts()):
      while(have_posts()):
      the_post();
      get_template_part( 'template-parts/post/content');
      endwhile;
      endif;
      wp_reset_postdata();
      ?>
      </div>              
      <?php 
      die;
     }

    }
new Ajax_request_handle();
?>
