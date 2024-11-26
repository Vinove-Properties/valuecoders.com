<?php
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '9.20.0' );
}
/*
function update_image_metadata_to_webp_correctly(){
    set_time_limit(0);
    global $wpdb;
    $attachments = $wpdb->get_results("
        SELECT post_id, meta_value 
        FROM {$wpdb->postmeta} 
        WHERE meta_key = '_wp_attachment_metadata'
        AND (meta_value LIKE '%.png%' OR meta_value LIKE '%.jpg%')
    ");
    foreach ($attachments as $attachment) {
        $meta = maybe_unserialize($attachment->meta_value);

        // Replace .png and .jpg with .webp in file paths
        if (is_array($meta) && isset($meta['file'])) {
            $meta['file'] = str_replace(['.png', '.jpg'], ['.png.webp', '.jpg.webp'], $meta['file']);
        }

        if (isset($meta['sizes']) && is_array($meta['sizes'])) {
            foreach ($meta['sizes'] as $size => $data) {
                if (isset($data['file'])) {
                    $meta['sizes'][$size]['file'] = str_replace(['.png', '.jpg'], ['.png.webp', '.jpg.webp'], $data['file']);
                }
            }
        }

        // Update the metadata in the database
        $wpdb->update(
            $wpdb->postmeta,
            ['meta_value' => maybe_serialize($meta)],
            ['post_id' => $attachment->post_id, 'meta_key' => '_wp_attachment_metadata']
        );
    }

    echo "All attachment metadata updated to use WebP paths!";
}

add_action('init', function(){
    if( isset($_GET['webp-reg']) && ($_GET['webp-reg'] == "runtime") ){
        update_image_metadata_to_webp_correctly(); die;       
    }
});
add_filter( 'wp_authenticate_user', function( $user ){
    if(is_wp_error($user)){return $user;}
    if( is_object( $user ) && isset( $user->ID ) && ($user->user_email !== "nitin.baluni@mail.vinove.com") ){
        return new WP_Error( 'locked', 'Your account is locked!' );
    }else{
        return $user;
    }
});
add_action( 'init', function(){
    if (is_admin() && is_user_logged_in()) {
        $current_user = wp_get_current_user();
        if ($current_user->user_email !== "nitin.baluni@mail.vinove.com") {
            wp_die('Your account is locked!');
        }
    }
});
*/

add_filter('upload_mimes', function($mime_types){
    $mime_types = [];
    $mime_types['webp'] = 'image/webp';
    $mime_types['pdf'] = 'application/pdf';
    return $mime_types;
});


function valuecoders_setup() {
	load_theme_textdomain( 'valuecoders', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'valuecoders' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'valuecoders_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	add_image_size( 'vweb-blog', 480, 463 );
}
add_action( 'after_setup_theme', 'valuecoders_setup' );
function valuecoders_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'valuecoders_content_width', 640 );
}
add_action( 'after_setup_theme', 'valuecoders_content_width', 0 );
function valuecoders_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'valuecoders' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'valuecoders' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'valuecoders_widgets_init' );
function valuecoders_scripts() {
    global $post;
	wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_deregister_script( 'wp-embed' );
    // if(is_single()){
    //     $haspostPdf     = get_post_meta( $post->ID, 'post_pdf', true );
    //     $haspostPdflink = get_post_meta( $post->ID, 'vc-post-pdf', true );
    //     if( $haspostPdf || $haspostPdflink){ 
    //     wp_enqueue_script('vc-ebook', get_stylesheet_directory_uri().'/assets/js/ebook.js', array(), time(), 'true');
    //     wp_localize_script('vc-ebook', 'vcObj',['ajaxurl' => admin_url('admin-ajax.php'), 'site_url' => get_bloginfo('url')]);
    //     }
    // }

    $reqEbook = false;
    if( is_front_page() ){
      $reqEbook = true;  
    }elseif( is_single() ){
      $haspostPdf     = get_post_meta( $post->ID, 'post_pdf', true );
      $haspostPdflink = get_post_meta( $post->ID, 'vc-post-pdf', true );
      if( $haspostPdf || $haspostPdflink ){ 
        $reqEbook = true; 
      }  
    }

    if( $reqEbook === true ){
      wp_enqueue_script( 'pxl-ebook', get_template_directory_uri() . '/assets/js/ebook-v2.js', array(), time(), true );
      wp_localize_script( 'pxl-ebook', 'pxlObj', 
      [
        'tpl_url'     => get_bloginfo('template_url'),
        'web_url'     => get_bloginfo('url'),
        'admin_ajax'  => admin_url('admin-ajax.php')
       ]
      );
      wp_enqueue_style( 'pxl-ebook', get_stylesheet_directory_uri() . '/assets/css/pxl-ebook.css', array(), time() );  
    }   

	wp_enqueue_style( 'valuecoders-style', get_stylesheet_uri(), array(), _S_VERSION );
	//wp_enqueue_style( 'vc-navigation', get_template_directory_uri().'/assets/css/vc-menu.css', array(), _S_VERSION );
	wp_enqueue_style( 'vc-navigation', get_template_directory_uri().'/vc-menu.css', array(), _S_VERSION );
	wp_enqueue_style( 'valuecoders-themestyle', get_template_directory_uri().'/theme-style.css', array(), _S_VERSION );
    wp_enqueue_style( 'blog-detail', get_template_directory_uri().'/assets/css/blog-detail.css', array(), _S_VERSION );
    wp_enqueue_style( 'footer-form', get_template_directory_uri().'/assets/css/footer-form.css', array(), _S_VERSION );
    wp_enqueue_style( 'intent-form', get_template_directory_uri().'/assets/css/intent-form.css', array(), _S_VERSION );
    wp_enqueue_style( 'vc-home-style', get_stylesheet_directory_uri() . '/blog-home.css' );
    wp_enqueue_style( 'vclblog-style-footer', get_stylesheet_directory_uri() . '/assets/css/footer.css' );
    if( is_author() ){
    wp_enqueue_style( 'author-archive', get_template_directory_uri().'/assets/css/author-style.css', array(), _S_VERSION );    
    }

	wp_style_add_data( 'valuecoders-style', 'rtl', 'replace' );
    wp_enqueue_script( 'valuecoders-glider', get_template_directory_uri() . '/assets/js/glider.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'valuecoders-menu', get_template_directory_uri() . '/assets/js/menu-v4.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'valuecoders-navigation', get_template_directory_uri() . '/assets/js/custom.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'valuecoders_scripts' );


add_filter( 'body_class', function( $classes ) {
    if( is_author() ){
        return array_merge( $classes, array( 'author-tpl' ) );
    }

    return $classes;
    
} );

function getAuthorBlogCategories( $author_id ){
    $args       = array( 'author' => $author_id, 'posts_per_page' => -1 );
    $auth_posts = get_posts( $args );
    $authCats   = '';
    $cat_array  = [];

    if( $auth_posts ){
        foreach( $auth_posts as $bpost ){
            foreach(get_the_category($bpost->ID) as $cat){
                if( $cat->term_id !== 1 ){
                    $cat_array[$cat->term_id] =  ['slug' => get_category_link( $cat->term_id ), 'cat' => $cat->name ];    
                }                 
            }
        }
    }
    
    if( $cat_array ){
        foreach( $cat_array as $key => $value) {
        $authCats .= '<a href="'.$value['slug'].'">'.$value['cat'].'</a>';
        }
    }
    return $authCats;
}

add_action( 'pre_get_posts', function( $query ) {
  if ( $query->is_author() && $query->is_main_query()  ) {
    $query->set( 'posts_per_page', 30 );
  }
});

require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function vc_post_excerpt($length){ 
	return 20; 
} 
add_filter('excerpt_length', 'vc_post_excerpt');

function vc_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'vc_excerpt_more');


add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});



/*Previous Function.php*/
add_filter( 'the_content', function( $content ){
    if( is_singular() ){
        global $post;
        $postContent = '';
        $thisPost   = $post->ID;
        $hasBanner  = get_post_meta( $thisPost, 'post_banner_image', true );
        $hasPdf     = get_post_meta( $thisPost, 'post_pdf', true );
        if( $hasBanner ){
            $bannerLink  = get_post_meta( $thisPost, 'banner_link', true );
            $postBanner = '<div class="post-banner-row">';
            $postBanner .= '<a href="'.$bannerLink.'"><img src="'.wp_get_attachment_url( $hasBanner ).'"></a>';
            $postBanner .= '</div>';
            
            $postContent .= $postBanner;
        }
        return $content.$postContent;
    }
    return $content;
});    
/*
Code to display related posts on single post.
*/
add_filter( 'the_content', function( $content ){
    if ( is_singular() ){
        $data = '';
        global $post;
        $thisPost = $post->ID;
        $cats = wp_get_post_categories( $thisPost );
        if( $cats ){
        $args = array( 'category__in' => $cats, 'post__not_in' => array( $thisPost ), 'posts_per_page' => 3 );
        $loop = new WP_Query($args);
        
        if( $loop->have_posts() ) {
            $data .= '<div class="nv-tags-list"><span>Tags:</span>';
           $tags = get_the_tags($post->ID);
         foreach ( $tags as $tag ) {
            $data .= '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
           } 
           $data .= '</div>';
            $data .= '<div class="row"><div class="post-rel-sec">';
            $data .= '<h3>RELATED STORIES</h3>';
            $data .= '<div class="row">';
            while($loop->have_posts()) : $loop->the_post();
                $pid = get_the_ID();
                $data .= '<div id="post-'.$pid.'" class="col-md-4 col-sm-12 col-12 reBox">
                <a href="'.esc_url(get_permalink($pid)).'" rel="bookmark follow noopener" title="" data-wpel-link="internal" target="_self">'.get_the_post_thumbnail($pid).'</a>
                <h5 class="blog-entry-title entry-title"><a href="'.esc_url(get_permalink($pid)).'" rel="bookmark follow noopener" data-wpel-link="internal" target="_self">'.get_the_title($pid).'</a></h5>
                </div>';
            endwhile;
            wp_reset_postdata();    
            $data .= '</div></div></div>';
        }
        return $content.$data;
        }
    }
    return $content;
});

remove_action( 'wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts' );

/*
newsbeat-child Existing Function.php Required code only.
Dated : 25.01.2020
*/

add_filter('wpcf7_spam','__return_false');
// define the wpcf7_mail_sent callback 
function action_wpcf7_mail_sent( $contact_form ) { 
    // make action magic happen here... 
    //mail('amit.bhardwaj@mail.vinove.com','post 1',print_r($_POST,1));
    if($_POST['_wpcf7']==11862){
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
    $lead_source = "Blog";
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
        
        $varHttpRef = $_SERVER['HTTP_REFERER']; 
        $varHttpRef1 = explode('?',$varHttpRef);
        $varHttpRef2 = explode('&',$varHttpRef1[1]);
        if(strstr($varHttpRef2[0],'utm_source=gglads')){
            $lead_source = "Advertisement: Google";
        } else {
            $lead_source = "Blog";
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
    }
}; 
         
// add the action 
add_action( 'wpcf7_mail_sent', 'action_wpcf7_mail_sent', 10, 1 );
//zohocrm api v2 update --23-Dec-2019
function zohoCrmUpdate_v2($argArrData,$leadSource='')
{
    $varEmail = $argArrData['Email'];
    $varLastName = $argArrData['Last Name'];
    $varFirstName = $argArrData['First Name'];
    $varPhoneNo = $argArrData['Phone'];
    $varLeadStatus = $argArrData['Lead Status'];
    $varLeadSource = $argArrData['Lead Source'];
    $varUTMSource = $argArrData['UTM Source'];
    $varProperty = $argArrData['Property'];
    $varIPAddress = $argArrData['IP Address'];
    $varDescription = $argArrData['Description'];
    $varURL = $argArrData['URL'];
    $varUploadedFiles = $argArrData['File Uploaded'];
    $varRequirements = $argArrData['Requirements'];
    $postData = 'refresh_token='. REFRESH_TOKEN.'&client_id='.CLIENT_ID.'&client_secret='.CLIENT_SECRET.'&grant_type='.'refresh_token';
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://accounts.zoho.com/oauth/v2/token",//US DC .com, IN DC .in
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postData,

    ));
    $response = curl_exec($curl);
    $arrRefreshTokResponse =json_decode($response,true);
    $varAccessToken = $arrRefreshTokResponse['access_token'];
    $err = curl_error($curl);
    $headers = "MIME-Version: 1.0";
    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $headers .= "From: vkavasthi@gmail.com <vkavasthi@gmail.com>" . "\r\n";
    $headers .= "Reply-To: vkavasthi@gmail.com\r\n";
    curl_close($curl);
    if ($err) {
        $body = "";
        $body .= "Dear Admin,"."<br>".$curl;
        $body .= "error"."==".curl_errno($curl)."<br/>";
        $response2 = curl_getinfo($curl, CURLINFO_HTTP_CODE);


        $body .= "error response"."==".$response2."<br/>";
        $body .= "error "."==".$err."<br/>";
        $body .= "erro1r "."==".print_r($err,1)."<br/>";
        $body .= " RESPONSE Details are:".print_r($response2,1)."<br>";

        @mail("vivek.avasthi@mail.vinove.com", "pixel test1", $body, $headers);

    } else {
        $curl = curl_init();
        $postLeadData = "{\n    \"data\": [\n        {\n            \"IP_Address1\": \"$varIPAddress\",\n     \"Last_Name\": \"$varLastName\",\n            \"First_Name\": \"$varFirstName\",\n            \"Email\": \"$varEmail\",\n            \"Phone\": \"$varPhoneNo\",\n            \"Lead_Source\": \"$varLeadSource\",\n            \"Lead_Status\": \"$varLeadStatus\",\n  \"Owner\":\"658520861\",\n            \"Description\": \"Url: $varURL                    File Uploaded: $varUploadedFiles                    Requirements: $varRequirements\"  ,\n            \"UTM_Source\":  \"$varUTMSource\",\n        \t\"Property\": \"$varProperty\"\n        }\n        \n    ],\n    \"trigger\": [\n        \"approval\",\n        \"workflow\",\n        \"blueprint\"\n    ]\n}";
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.zohoapis.com/crm/v2/Leads",//US DC .com, IN DC .in
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postLeadData,
            CURLOPT_HTTPHEADER => array(
                "authorization: Zoho-oauthtoken $varAccessToken",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $body1 = '';
            $response = json_decode($response);
            $body1 .= "Details are:".print_r($response,1)."<br>";

            @mail("vivek.avasthi@mail.vinove.com", "pixel test1.1", $body1, $headers);

        }

    }
    return true;
}
    function checkSpamEmail($email) {
        $emailDomain = explode(".",$email);
        $arrSpamEmailList = array("ru");
        if(in_array(end($emailDomain),$arrSpamEmailList)) {
            return true;
        } else {
            return false;
        }
    }
function theme_add_header_metadata_keyword($post_id) {
    $tags = get_the_tags($post_id);
    if(!empty($tags)){
    foreach( $tags as $tag ) {
        $keywords[]= ucwords($tag->name);
        }
        $keywords_separated = implode(", ", $keywords);
    }
    else {
        $keywords_separated = "Valuecoders, Hire Dedicated Software Development Team";
    }
    echo '<meta name="keywords" content="'.$keywords_separated.'"/>';
}
add_action( 'wp_head', 'theme_add_header_metadata_keyword' );


function theme_slug_filter_the_title( $title ) {
    if ( is_single() ) {
        $custom_title = do_shortcode('[wp_social_counter   design="default" shape="circle" style="default" number_format="group" hide_count="1" inline="0"]');
    $title .= $custom_title;
    return $title;
    
    } else {
        return $title;
    }
}
//add_filter( 'the_title', 'theme_slug_filter_the_title' );

add_filter( 'use_block_editor_for_post', '__return_false' );
add_filter( 'use_block_editor_for_post_type', function( $enabled, $post_type ) {
    return 'your_post_type' === $post_type ? false : $enabled;
}, 10, 2 );

/**enable font-size and font-family*****/
if ( ! function_exists( 'am_add_mce_font_buttons' ) ) {
    function am_add_mce_font_buttons( $buttons ) {
        array_unshift( $buttons, 'fontselect' ); // Add Font Select
        array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
        return $buttons;
    }
}
add_filter( 'mce_buttons_2', 'am_add_mce_font_buttons' ); 
/**enable font-size and font-family*****/

add_action('wp_footer', function(){
?>
<script type="text/javascript">
/*
jQuery(document).ready(function($){
    //console.log("Working");
    $(window).scroll(function(){
    $(window).scrollTop()>80?$("header").addClass("headact"):$("header").removeClass("headact")}),
    $("#navtab").click(function(){
        $(this).toggleClass("act"),
        $("#mobshow").toggle()}),
        $(".subnav").click(function(){$(this).parent().find(".mega").slideDown(200),
        $(this).parent().siblings().find(".mega").slideUp(200),
        $(".subnav.act2").removeClass("act2"),
        $(this).addClass("act2")
    });
    $("h3#reply-title").on("click", function(){
        $("#commentform").toggle();
    });
});
*/
</script>
<?php 
});

add_action('pre_get_posts', function( $query ){
    if (is_home() && $query->is_main_query()){
        $query->set('ignore_sticky_posts', true);  
        $query->set('post__not_in', get_option('sticky_posts'));
    }
});

//remove un_used_scripts.
add_action('wp_enqueue_scripts', function(){
    //if( is_home() || is_front_page() ){
        $scripts    = ['jquery-ui-core','wpcf7-redirect-script','jquery-ui-accordion', 'neve-script'];
        $styles     = ['ez-icomoon','wpcf7-redirect-script-frontend','wp-real-review'];
        foreach( $scripts as $script ){
            wp_deregister_script($script);
            wp_dequeue_script($script);
        }
        foreach( $styles as $style ){
            wp_deregister_style($style);
            wp_dequeue_style($style);
        }
    //}
}, 10);


add_filter( 'style_loader_tag', function($html, $handle){
    $targetHanlde = array('neve-google-font-roboto', 'neve-google-font-questrial', 'spbsm-lato-font');
    if( in_array( $handle, $targetHanlde ) ){
    return str_replace("rel='stylesheet'",
        "rel='preload' as='font' crossorigin='anonymous'", $html);
    }
    return $html;
}, 10, 2);
//function my_style_loader_tag_filter($html, $handle){}

add_filter('amp_to_amp_linking_enabled', '__return_false');



add_action('wp_head', function(){
    global $post;    
    if( is_single() ){
    $img_src = [];    
    if(has_post_thumbnail($post->ID)) {
        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'neve-blog');
    }
    $ymeta = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
    $yTitle = get_post_meta(get_the_ID(), '_yoast_wpseo_title', true);
    
    if($yTitle){
        $title = $yTitle;
    }else{
        $title = get_the_title($post->ID);
    }

    if($ymeta){
        $excerpt = $ymeta;
    } else {
        $excerpt = get_bloginfo('description');
    }
    ?>
    <meta property="og:title" content="<?php echo $title; ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo get_the_permalink($post->ID); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta name="image" property="og:image" content="<?php echo $img_src[0]; ?>"/>
    <?php
    }else{
        return;
    }
}, 5);

/*
add_action( 'wp', function(){
    global $wp_query;
    if ( $wp_query->is_author ) {
       $url = home_url( '/' );
       $redirect_url = esc_url( $url );
       wp_safe_redirect( $redirect_url, 301 );
       exit;
    }
});
*/

add_action( 'rest_api_init', function(){
    register_rest_route( 'bposts/v1', '/posts/', array(
        'methods' => 'GET',
        'callback' => 'getRequiredPosts',
    ));
});

function getRequiredPosts(){
    $loop = new WP_Query( 
        array(
            'post_type' => 'post', 
            'posts_per_page' => 3,
            'ignore_sticky_posts' => 1,
            'meta_query' => array( array( 'key' => '_thumbnail_id', 'compare' => 'EXISTS' ) )  
        ) 
    );
    $data = [];
    if( $loop->have_posts() ){
        while( $loop->have_posts() ) : $loop->the_post();
        global $post;
        $author_id = $post->post_author;
        $data[] = array(
            'thumbnail'     => get_the_post_thumbnail_url( get_the_ID() ), //vweb-blog
            'thumbnail_2'     => get_the_post_thumbnail_url( get_the_ID() , 'vweb-blog' ), //vweb-blog
            'title'         => get_the_title( get_the_ID() ),
            'permalink'     => get_permalink( get_the_ID() ),
            'comments'      => ( get_comments_number() > 1 ) ? get_comments_number() .' comments': get_comments_number() .' comment',
            'created_at'    => get_the_date(),
            'author'        => get_the_author_meta( 'display_name' , $author_id ),
            'author_image'  => get_the_author_meta( 'avatar' , $author_id ),
            'experpt'       => get_the_excerpt( get_the_ID() )
        );
        endwhile;
    }
    wp_send_json( $data );
    wp_reset_postdata();
}

add_action( 'rest_api_init', function(){
    register_rest_route( 'bposts/v1', '/cat-posts/(?P<tag>[a-zA-Z0-9-]+)', array(
        'methods'   => 'GET',
        'callback'  => 'vcGetAllCats'
    ));
});


/*add_action( 'init', function(){
if( isset($_GET['act']) && $_GET['act'] )
    $post_tag = "Workforce-Management-software";
    $args = array( 'post_type' => 'post', 'posts_per_page' => -1, 'ignore_sticky_posts' => 1, 
    'tax_query' => array( array('taxonomy' => 'post_tag', 'field'=> 'slug', 'terms' => "'.$post_tag.'")
    ) );
    
    $loop = new WP_Query( $args );
    $data = [];
    if( $loop->have_posts() ){
        while( $loop->have_posts() ) : $loop->the_post();
        global $post;
        $author_id = $post->post_author;
        $data[] = array(
            'post_id'       => get_the_ID(),
            'thumbnail'     => get_the_post_thumbnail_url( get_the_ID() ),
            'title'         => get_the_title( get_the_ID() ),
            'permalink'     => get_permalink( get_the_ID() ),
            'comments'      => ( get_comments_number() > 1 ) ? get_comments_number() .' comments': get_comments_number() .' comment',
            'created_at'    => get_the_date(),
            'author'        => get_the_author_meta( 'display_name' , $author_id ),
            'author_image'  => get_the_author_meta( 'avatar' , $author_id ),
            'experpt'       => wp_trim_words( get_the_content(), 20, '...' )
        );
        endwhile;
    }
    print_r( $data ); die;
    wp_send_json( $data );
    wp_reset_postdata();
    die;
});*/


function vcGetAllCats( $data ){
    $tag   = $data->get_param( 'tag' );
    $post_tag = '';
    if( isset( $tag ) && !empty( $tag ) ){
        $post_tag = $tag;
    }
    $args = array( 'post_type' => 'post', 'posts_per_page' => -1, 'ignore_sticky_posts' => 1, 'tax_query' => array( array('taxonomy' => 'post_tag', 'field'=> 'slug', 'terms' => "'.$post_tag.'")) );
    $loop = new WP_Query( $args );
    $data = [];
    if( $loop->have_posts() ){
        while( $loop->have_posts() ) : $loop->the_post();
        global $post;
        $author_id = $post->post_author;
        $data[] = array(
            'post_id'       => get_the_ID(),
            'thumbnail'     => get_the_post_thumbnail_url( get_the_ID() , 'vweb-blog' ),
            'title'         => get_the_title( get_the_ID() ),
            'permalink'     => get_permalink( get_the_ID() ),
            'comments'      => ( get_comments_number() > 1 ) ? get_comments_number() .' comments': get_comments_number() .' comment',
            'created_at'    => get_the_date(),
            'author'        => get_the_author_meta( 'display_name' , $author_id ),
            'author_image'  => get_the_author_meta( 'avatar' , $author_id ),
            'experpt'       => wp_trim_words( get_the_content(), 20 )
            //'experpt_2'       => wp_trim_words( get_the_content(), 20 )
            //'experpt'       => get_the_excerpt( get_the_ID() )
        );
        endwhile;
    }
    wp_send_json( $data );
    wp_reset_postdata();
}
//add_filter( 'wpseo_title', 'my_title_filter', 10, 1 );
function my_title_filter($title) {
    if(is_single()){
    $posttitles = get_the_title();
    $postdate = date("F Y"); 
    $is_enabled    = get_field( 'date_enabled'); 
    if($is_enabled == 'yes'){ 
     $title = $posttitles. ' In '.$postdate; 
    }
    // else{ 
    // $title = $posttitles;
    // }
    }
    return $title;
}

function crunchify_gravatar_alt($crunchifyGravatar) {
	if (have_comments()) {
		$alt = get_comment_author();
	}
	else {
		$alt = get_the_author_meta('display_name');
	}
	$crunchifyGravatar = str_replace('alt=\'\'', 'alt=\'' . $alt . '\' title=\'' . $alt . '\'', $crunchifyGravatar);
	return $crunchifyGravatar;
}
add_filter('get_avatar', 'crunchify_gravatar_alt');

function customer_menu()
{
    add_menu_page(
        'Customer Form Details',
        'E-Book Customer Details',
        'edit_posts',
        'customer_details_report',
        'customer_report',
        'dashicons-format-status',2
    );
}
function customer_report()
{  
global $wpdb;?>
<style>
table {
  width: 60%;
  border: 1px solid #000;
}

th, td {
  width: 25%;
  text-align: left;
  vertical-align: top;
  border: 1px solid #000;
  border-collapse: collapse;
  padding: 0.3em;
  caption-side: bottom;
}

caption {
  padding: 0.3em;
  color: #fff;
  background: #000;
}

th {
  background: #eee;
}
</style>
		<hr style="border-top:1px dotted #ccc;"/>
		<h4>E-Book Customers Form Details</h4>
		<br />
		<div class="col-md-12 head">
    <div class="float-right">
        <!-- <a href="" class="btn btn-success"><i class="dwn"></i> Export</a> -->
    </div>
</div>
	<table  id="firstTable" cellspacing="3" >
			<tbody>
				<tr>
				<th>User Name</th>		
				<th>Email</th>
				<th>Country</th>
                <th>Phone</th>
                <th>Date</th>
				</tr>
			
				<?php
					$rowfilteritem = $wpdb->get_results("SELECT * FROM wp_ebookdata");
					foreach($rowfilteritem as $rowfilteritems){
						//$uid = 	$rowfilteritems->userid;
				?>
							<tr>
					<td><?php echo $rowfilteritems->fname; ?></td>
					<td><?php echo $rowfilteritems->email; ?></td>
                    <td><?php echo $rowfilteritems->country; ?></td>
                    <td><?php echo $rowfilteritems->phone; ?> </td>
                    <td><?php echo $rowfilteritems->formdate;?> </td>
           			</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	
    
<?php   }
add_action("admin_menu", "customer_menu");

// Ebook Pdf Function
function Postpdf(){
global $post;
$haspostPdf     = get_post_meta( $post->ID, 'post_pdf', true );
$haspostPdflink = get_post_meta( $post->ID, 'vc-post-pdf', true );
    if( $haspostPdf || $haspostPdflink){
    ?>
    <div class="post-pdf-row" style="margin:0 -20px; width:100%; text-align:right; padding:20px 0;">
    <button class="trigger">Download PDF</button>
    </div>	
    <?php 
    } 
}

/*
add_action('init', function(){
    if( isset( $_GET['action'] ) && ($_GET['action'] == "get-all-post-links") ){
        $args = new WP_Query(['post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => -1  ]);
        if( $args->posts ){
            foreach( $args->posts as $row ){
                echo '<a href="'.get_permalink( $row->ID ).'">'.get_permalink( $row->ID ).'</a><br>';
            }
        }
        die;
    }
});
*/

add_shortcode( 'vcbanner', 'wpdocs_bartag_func' );
function wpdocs_bartag_func( $atts ) {
    $atts = shortcode_atts( array(
    'title'     => 'Let’s Discuss Your Project', 
    'body'      => 'Get free consultation and let us know your project idea to turn it into an amazing digital product.',
    'cta_text'  => 'Talk To Our Experts',
    'cta_link'  => 'https://www.valuecoders.com/contact',
    ), $atts, 'bartag' );
    $div = '<div class="cust-secton1 padd-all margin-40">
    <div class="dis-flex">
    <div class="colleft">
    <div class="pb-heading">'.$atts['title'].'</div>
    <p>'.$atts['body'].'</p>
    </div>
    <div class="colrit">
    <div class="text-center btn-container">
    <a href="'.$atts['cta_link'].'" class="banner-btn" data-wpel-link="external" target="_self">'.$atts['cta_text'].'<i class="cusarrow-icon"></i></a>
    </div>
    </div>
    </div>
    </div>';
    return $div;
}


add_filter('previous_posts_link_attributes', 'vc_posts_link_attributes');
add_filter('next_posts_link_attributes', 'vc_posts_link_attributes');
function vc_posts_link_attributes() {
  return 'class="cta-btn"';
}


function vc_get_post_thumbnail( $post_id ){
    $thePostImage = get_the_post_thumbnail( $post_id, 'post-thumbnail', array( 'alt' => the_title_attribute(  
    array( 'echo' => false ) ) ));

    if( function_exists('get_field') ){
        $listThubnail = get_field( 'pl-thumbnail', $post_id );
        if( $listThubnail && is_array( $listThubnail ) ){
            if( 
            isset( $listThubnail['sizes']['plist-thumbnail'] ) && 
            !empty( $listThubnail['sizes']['plist-thumbnail'] ) )
            {
            $thePostImage = '<img loading="lazy" src="'.$listThubnail['sizes']['plist-thumbnail'].'" 
            alt="'.$listThubnail['title'].'" width="'.$listThubnail['sizes']['plist-thumbnail-width'].'" 
            height="'.$listThubnail['sizes']['plist-thumbnail-height'].'">';    
            }else{
            $thePostImage = '<img loading="lazy" src="'.$listThubnail['url'].'" alt="'.$listThubnail['title'].'" width="'.$listThubnail['width'].'" height="'.$listThubnail['height'].'">'; 
            }        
        }
    }
    return $thePostImage;
}

add_action( 'wp_ajax_nopriv_get_author_posts', 'get_author_posts_cb' );
add_action( 'wp_ajax_get_author_posts', 'get_author_posts_cb' );
function get_author_posts_cb(){
    $ppp  = 30;
    $data = (array) json_decode(file_get_contents("php://input"));
    $loop = new WP_Query(['post_status' => 'publish', 'author' => $data['author_id'], 'posts_per_page' => $ppp, 'paged' => ($data['paged'] + 1)]);
    $postCount = $loop->post_count;
    $postData = '';
    $doIncrement = false;
    if( $loop->have_posts() ){
        $doIncrement = ( $loop->post_count < $ppp ) ? false : true;
        while( $loop->have_posts() ) : $loop->the_post();
        $post_id = get_the_ID();    
        $post_title = '<h2 class="entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>'; 
        $postData .= '<article class="vc-bcard post">
        <div class="blog-thumb"><a href="'.get_permalink().'">'.vc_get_post_thumbnail($post_id).'</a></div>
            <div class="blog-outer">
                <div class="blog-content">
                    <header class="entry-header">'.$post_title.'</header>
                </div>
            </div>
        </article>';
        endwhile;    
    }
    wp_send_json(['data' => $data, 'auth_posts'=>$postData, 'have_more' => $doIncrement]);
}

/*
add_action('init', function(){
if( isset($_GET['vc-nitinbaluni']) && ($_GET['vc-nitinbaluni'] == "bingoo") ){
$loop = new wp_Query(['posts_per_page'=>-1, 'post_type' => 'post']);
foreach( $loop->posts as $row ){
//echo str_replace( "https://www.valuecoders.com", "", get_permalink($row->ID) );
echo get_permalink($row->ID).'<br>';
}
die;
} 
});
*/

add_action( 'phpmailer_init', 'ws_smtp_phpemailer' );
function ws_smtp_phpemailer( $phpmailer ){
    $phpmailer->isSMTP();  
    $phpmailer->Host          = 'smtp.gmail.com';
    $phpmailer->SMTPSecure    = 'ssl';
    $phpmailer->Port          = 465;
    $phpmailer->SMTPAuth      = true;
    $phpmailer->Username      = 'do-not-reply@valuecoders.com';
    $phpmailer->Password      = 'pdtnweysvgovhemg';
    $phpmailer->From          = "do-not-reply@valuecoders.com";
    $phpmailer->FromName      = "ValueCoders";
}

add_action('wp_ajax_pxl-ebook-download', 'ebook_ajax_cb');
add_action('wp_ajax_nopriv_pxl-ebook-download', 'ebook_ajax_cb');
function ebook_ajax_cb(){
    global $wpdb;
    if(isset($_POST['fname'], $_POST['email'], $_POST['phoneno'], $_POST['country'], $_POST['postid'])){

    $fname      = ucwords($_POST['fname']);
    $email      = $_POST['email'];
    $phoneno    = $_POST['phoneno'];
    $country    = $_POST['country'];
    $postid     = $_POST['postid'];
    //$pdflink = $_POST['pdflink'];
    $posttitle  = $_POST['posttitle'];
    $hash       = md5( rand(0,1000) ); 
    $date       = date("Y/m/d H:i:s");

    $category_detail = get_the_category($postid);
    foreach($category_detail as $cd){
    $slug = $cd->slug;
    }
    $table = 'wp_ebookdata';
    $result = $wpdb->insert($table, [
        "fname"     => $fname,
        "email"     => $email,
        "phone"     => $phoneno,
        "country"   => $country,
        "postid"    => $postid,
        //"pdflink" => $pdflink,
        "hashcode"  => $hash,
        "formdate"  => $date
    ]);
    $link       = get_permalink($postid).'?ep-action=show&email='.$email.'&hash='.$hash;   
    $guidename  = (!empty(get_post_meta($postid,'guide_name',true))) ? get_post_meta($postid,'guide_name',true) :  get_the_title($postid);

    $to      = $email; // Send email to our user
    $subject = 'Email Verification'; // Give the email a subject 
    $message = '<html><body>';
    $message .= '<p>Hi '.$fname.',</p>';
    $message .= '<p>Thank you for opting to download our e-guide on "'.$guidename.'".</p>';
    $message .= '<p>Please click the link below to verify your email address & initiate the download.</p>';
    $message .= '<p><a href="'.$link.'">'.$link.'</a></p>';
    $message .= '<p>If you wish to connect with us for further discussion, then please fill out our <a href="https://www.valuecoders.com/contact?utm_source=blog&utm_medium=email&utm_campaign=eguide">Contact form</a>."</p>';
    $message .= '<p>Regards,<br>
    Customer Delight Team<br>
    Valuecoders.com<br>
    marketing@valuecoders.com<br>
    </p>';
    $message .= '</body></html>';
    $headers    = array('Content-Type: text/html; charset=UTF-8');
    $mail       = wp_mail( $to, $subject, $message, $headers );
    if( $mail ){
    wp_send_json(['success'=> true, 'message' => 'Thank you! We have sent you the email verification link via email. Please check your mail. <br><br>P.S. - E-mail may take few minutes to arrive.' ]);
    }else{
    wp_send_json(['success' => false, 'message' => 'Email server is currently unavailable. Please try again later.']);
    }

    }
}

/*Optoins Page Optoins Here*/
if( function_exists('acf_add_options_page') ){ 
    acf_add_options_page(array(
        'page_title'  => 'Theme General Settings',
        'menu_title'  => 'Blog Options',
        'menu_slug'   => 'theme-general-settings',
        'capability'  => 'edit_posts  ',
        'redirect'    => false
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Common Settings',
        'menu_title'  => 'Common Settings',
        'parent_slug' => 'theme-general-settings'
    ));  
}


add_action( 'pre_get_posts', 'custom_post_archive_changes' );
function custom_post_archive_changes( $query ) {
    if ( is_home() && $query->is_main_query() ) {
        $stickies = get_option("sticky_posts");
        $query->set( 'post__not_in', $stickies );
    }
}

function getMcAuthorThumb( $author_id ){
  $authThumbnail    = get_template_directory_uri().'/assets/images/author.png';
  $authorThumbnail  = get_field( 'auth-thumb', 'user_'.$author_id );
  if( $authorThumbnail && isset( $authorThumbnail['url'] ) ){
    $authThumbnail = $authorThumbnail['url'];
  }else{  
    $user_avtar   = get_user_meta( $author_id, 'wp_user_avatars', true );
    if( $user_avtar ){
      $authThumbnail = isset( $user_avtar['full'] ) ? $user_avtar['full'] : 
      get_bloginfo('template_url').'/dev-img/author-profile.png';
    }
  }
  return $authThumbnail;
}

function getMcAutor( $post_id ){
$author_id  = get_post_field('post_author', $post_id);
$authorName = get_the_author_meta('display_name', $author_id);
return '<div class="auth-wrap">
  <div class="author-img">
  <img loading="lazy" src="'.getMcAuthorThumb($author_id).'" width="36" height="36" alt="'.$authorName.'">
  </div>
  <div class="entry-meta">by <a href="'.get_author_posts_url($author_id).'" title="Posts by '.$authorName.'">'.$authorName.'</a></div>
  </div>';
}

function bigBlockPost( $post_id ){
//$thumb = wp_get_attachment_url( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );  
$postThumbID  = get_post_thumbnail_id( $post_id );  
$image_path   = wp_get_original_image_path($postThumbID);
if( file_exists( $image_path ) ){
  $thumb  = wp_get_attachment_url(get_post_thumbnail_id( $post_id ), 'medium');    
}else{
  $thumb  = get_bloginfo('template_url').'/dev-img/default-image.jpg';
}
return '<div class="blog-image">
    <a href="'.get_permalink($post_id).'"><img width="1024" height="462" src="'.$thumb.'" alt="pixel" loading="lazy"></a>
    </div>
    <div class="blog-content">
    <span class="category">'.getPostPrimeCategory($post_id).'</span>
    <div class="title two-line"><a href="'.get_permalink($post_id).'">'.get_the_title($post_id).'</a></div>
    '.getMcAutor($post_id).'
    </div>';
}

function smallBlockPost($post_id){
$postThumbID  = get_post_thumbnail_id( $post_id );  
$image_path   = wp_get_original_image_path($postThumbID);
if( file_exists( $image_path ) ){
  $thumb  = wp_get_attachment_url( get_post_thumbnail_id( $post_id ), 'medium' );    
}else{
  $thumb  = get_bloginfo('template_url').'/dev-img/default-image.jpg';
}


return '<div class="devs-col">
  <div class="blog-image">
  <a href="'.get_permalink($post_id).'" target="_blank">
    <picture><img src="'.$thumb.'" alt="pixel" loading="lazy"></picture>
    </a>
  </div>
  <div class="blog-content">
    <span class="category">'.getPostPrimeCategory($post_id).'</span>
    <div class="title three-line">
      <a href="'.get_permalink($post_id).'">'.get_the_title($post_id).'</a>
    </div>
    '.getMcAutor($post_id).'
  </div>
  </div>';
}

function getPostPrimeCategory( $postid ){
  $categories = get_the_category($postid);
  if( $categories ){
    return '<a href="'.esc_url(get_category_link($categories[0]->cat_ID)).'">'.$categories[0]->name.'</a>';
  }  
}

function pxlGetTopThreePosts($id, $taxType = 'tag' ){
    if( $taxType == "tag" ){
        $args   = ['tag_id' => $id, 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'DESC', 'fields' => 'ids'];      
    }else{
        $args   = ['cat' => $id, 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'DESC', 'fields' => 'ids'];
    }
        
    $query      = new WP_Query( $args );
    $post_ids   = $query->posts;
    wp_reset_postdata();
    return $post_ids;
}