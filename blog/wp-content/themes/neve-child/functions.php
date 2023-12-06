<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'neve_child_load_css' ) ):
    /**
     * Load CSS file.
     */
    function neve_child_load_css() {
        global $post;
        //wp_enqueue_style('neve-child-font-awesome', trailingslashit( get_stylesheet_directory_uri() ).'assets/css/font-awesome.min.css', array(), NEVE_VERSION );
        wp_enqueue_style( 'neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', 
        array(), NEVE_VERSION );
        
        wp_enqueue_style( 'vc-menu', trailingslashit( get_stylesheet_directory_uri() ).'assets/css/vc-menu.css',array(), NEVE_VERSION );
        wp_enqueue_style( 'vc-leadform', trailingslashit( get_stylesheet_directory_uri() ).'assets/css/footer-form.css',array(), NEVE_VERSION );

        if(is_single()){
            wp_enqueue_script('vc-silk-slider',get_stylesheet_directory_uri().'/assets/js/slick.min.js',array('jquery'),
            '1.8.1','true');
            $haspostPdf     = get_post_meta( $post->ID, 'post_pdf', true );
            $haspostPdflink = get_post_meta( $post->ID, 'vc-post-pdf', true );
		     if( $haspostPdf || $haspostPdflink){ 
            wp_enqueue_script('vc-ebook',get_stylesheet_directory_uri().'/assets/js/ebook.js',array('jquery'),
            '1.8.9','true');
		     }
            $sliderScript = "jQuery(document).ready(function($){
            jQuery('.creview-slider').slick({dots:false,infinite:true,speed:300,slidesToShow:1,adaptiveHeight:true});
            })";
            wp_add_inline_script( 'vc-silk-slider', $sliderScript );
        }
        /*
        wp_enqueue_style( 'vc-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        array(), NEVE_VERSION );
        */
        /*
        wp_enqueue_style('pixelcrayons-neve-child', trailingslashit( get_stylesheet_directory_uri() ) . 
        'pixelcrayons-style.css', array( 'neve-style' ), NEVE_VERSION );
        */
    }
endif;
add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 20 );
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

       // if( $hasPdf ){
         //   $postPdf = '<div class="post-pdf-row" style="margin:0 -20px; width:100%; text-align:center; padding:20px 0;">';
           // $postPdf .= '<button class="">Download PDF</button>';
            //$postPdf .= '</div>';
            //$postContent .= $postPdf;
        //}

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
            'thumbnail'     => get_the_post_thumbnail_url( get_the_ID() ),
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
            'thumbnail'     => get_the_post_thumbnail_url( get_the_ID() ),
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
function Postpdf() {
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