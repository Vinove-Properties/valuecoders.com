<?php 
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

/**
 * Disable the unnessory code from header's
 */
function disable_unused_code() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 remove_action('wp_head', 'wp_shortlink_wp_head');
 remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10,0);
 // Remove the REST API lines from the HTML Header
 remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
 remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
 add_filter( 'show_recent_comments_widget_style', '__return_false', 99 );
}
add_action( 'init', 'disable_unused_code' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 /** This filter is documented in wp-includes/formatting.php */
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}

function smartwp_remove_wp_block_library_css(){
 wp_dequeue_style( 'wp-block-library' );
 wp_dequeue_style( 'wp-block-library-theme' );
 wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );


function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
  //wp_deregister_script( 'jquery' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

add_action( 'wp_default_scripts', 'remove_jquery_migrate' );
function remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];

		if ( $script->deps ) { // Check whether the script has any dependencies
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
 }

remove_filter ('acf_task_overview', 'wpautop');

// define the wpcf7_mail_sent callback 
function action_wpcf7_mail_sent( $contact_form ) { 
    if($_POST['_wpcf7']==2822){
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
        
        $varHttpRef = $_SERVER['HTTP_REFERER']; 
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

        @mail("vivek.avasthi@mail.vinove.com", "vc casestudy zoho api response2", $body, $headers);
        /*@mail("nitin.baluni@mail.vinove.com", "vc casestudy zoho api response2 - error", $body, $headers);*/

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

            @mail("vivek.avasthi@mail.vinove.com", "valuecoders test1.1", $body1, $headers);
            /*@mail("nitin.baluni@mail.vinove.com", "valuecoders vc casestudy zoho api response1 - success", $body1, $headers);*/

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
    
    add_action('ampforwp_after_post_content','amp_query_form');

    function amp_query_form(){ ?>

        <article class="amp-wp-article">
            <h2>Get In Touch</h2>
            <p>Request a free consultation and get a no obligation quote for your project within 8 Business hours</p>
            <form target="_top" action-xhr="<?php echo admin_url('admin-ajax.php?action=amp_form_submition') ?>" method="post" name="contact-us-form" custom-validation-reporting="show-all-on-submit">
             <div class="form-container">
              <div class="form-input">
                <span>Name:</span>
                <input type="text"
                  name="user-name"
                  id="name5"
                  required
                  pattern="\w+\s\w+">
                <span visible-when-invalid="valueMissing"
                  validation-for="name5"></span>
                <span visible-when-invalid="patternMismatch"
                  validation-for="name5">
                  Please enter your first and last name (e.g. Jane Miller)
                </span>
              </div>

              <div class="form-input">
                <span>Email:</span>
                <input type="email"
                  name="user-email"
                  id="email5"
                  required>
                <span visible-when-invalid="valueMissing"
                  validation-for="email5"></span>
                <span visible-when-invalid="typeMismatch"
                  validation-for="email5"></span>
              </div>

              <div class="form-input">
                <span>Contact No:</span>
                <input type="number"
                  name="user-phone"
                  id="user-phone"
                  required>
                <span visible-when-invalid="valueMissing"
                  validation-for="user-phone"></span>
                <span visible-when-invalid="typeMismatch"
                  validation-for="user-phone"></span>
              </div>
         
              <div class="form-input">
                <span>User Requirement:</span>
                <br>
                <textarea class="user-req" name="user-req" cols="10" rows="4"></textarea>
              </div>

              <input class="send_message" type="submit"
                value="Send Message">
            
                <div submit-success>
            <template type="amp-mustache">
              {{message}}
            </template>
          </div>
          <div submit-error>
            <template type="amp-mustache">
              {{message}}
            </template>
          </div>
          </div>
            </form>
        </article>
<?php 
}

add_filter( 'manage_taxonomies_for_post_columns', 'technology_used_type_columns' );
function technology_used_type_columns( $taxonomies ) {
    $taxonomies[] = 'technology';
    $taxonomies[] = 'service';
    $taxonomies[] = 'industry';
    return $taxonomies;
}

add_filter('manage_posts_columns', 'add_img_column');
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);

function add_img_column($columns) {
    $columns['img'] = 'Featured Image';
    return $columns;
}

function manage_img_column($column_name, $post_id) {
    if( $column_name == 'img' ) {
        echo get_the_post_thumbnail($post_id, 'thumbnail');
    }
    return $column_name;
}
?>
