<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package valuecoders
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function valuecoders_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'valuecoders_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function valuecoders_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'valuecoders_pingback_header' );
//////////////////////// new menu ////////////////////////
//add_action("admin_menu", "addMenu");
function addMenu() {
    add_menu_page("Web Leads", "Web Leads", "manage_options", "web-leads", "webleadsfunc", null, 6);
}

/*
add_action("admin_menu", function(){
	add_menu_page('VC Leads', 'VC Leads', 'manage_options', "vc-leads", 'webleadsfunc',
	'dashicons-email-alt2', 80 );
	add_submenu_page( "vc-leads", "Lead Spam Check", "Lead Spam Check", "manage_options", "espam-check", "vcSpamLeadMenu");
});
*/

function storeSpamEmailCB( $inpEmail ){
	if( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "localhost") ){
		$spdb = new wpdb('phpmyadmin','root','vinove-blog', 'localhost');
	}else{
		$spdb = new wpdb('valuecoc_wpsite','W@89Uz*3J!gp6>dA','valuecoc_vclive0606', 'localhost');
	}
	$msg = ''; 
	if( $spdb->get_results("SELECT * FROM wp_vcspamemails WHERE email ='".$inpEmail."'") ){
			$msg = '<span class="error"><strong>'.$_POST['sp-email'].'</strong> Email address already exists</span>';
	}else{
		$is_ins = $spdb->insert('wp_vcspamemails', ['email' => $inpEmail] );
		if( $is_ins ){
			$msg = '<span class="success"><strong>'.$inpEmail.'</strong> Email added Successfully.</span>';
		}else{
			$msg = '<span class="success">Error while adding the record.</span>';
		}
	}
	return $msg;
}

function vcSpamLeadMenu(){
echo '<style>
#vcspn-mailer{margin-bottom:10px;}
span.success{color:green; display: block; background: #ffffff; padding: 10px; width: 40%; border-left: 5px solid green;}
span.error{color:red; display: block; background: #ffffff; padding: 10px; width: 40%; border-left: 5px solid red;}
.spm-emails li{padding:10px; border:1px solid #cccccc; width:31%; background:#000000; color: #fff; 
display:inline-block; position:relative;}
.spm-emails li.has-error{background:red; color:#ffffff;}
.spm-emails li a{position:absolute; right:10px; text-decoration:none; display:none;}
.spm-emails li:hover{background: #ffffff; color: #000000;}
.spm-emails li:hover a{display:inline-block;}
h3{background:red; color: #ffffff; padding: 10px; width: 97%;}
</style>';
if( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "localhost") ){
$spdb = new wpdb('phpmyadmin','root','vinove-blog', 'localhost');
}else{
$spdb = new wpdb('valuecoc_wpsite','W@89Uz*3J!gp6>dA','valuecoc_vclive0606', 'localhost');
}

$msg = '';
if( isset( $_GET['rec-id'] ) && !empty( $_GET['rec-id'] ) ){
	$rid = $_GET['rec-id'];
	if( $spdb->delete('wp_vcspamemails', ['id'=>$rid]) ){
		$msg = '<span class="success">Record Deleted Successfully.</span>';		
	}
}
if( isset( $_GET['addsemail'] ) && !empty( $_GET['addsemail'] ) ){
	$semail = $_GET['addsemail'];
	$msg = storeSpamEmailCB( $semail );
}
if( isset( $_POST['do-rsemail'] ) ){
	$inpEmail = ( isset( $_POST['sp-email'] ) ) ? $_POST['sp-email'] : '';
	if( ! isset( $_POST['vcespam_nonce'] )  || ! wp_verify_nonce( $_POST['vcespam_nonce'], 'vcespam-action' ) ){
		print 'Sorry, your nonce did not verify.';
		die;
	}else{
		$msg = storeSpamEmailCB( $inpEmail );
	}	
}	
echo '<h1>Add Spam Email Address</h1>';
echo '<form action="'.admin_url('admin.php?page=espam-check').'" method="post" id="vcspn-mailer">
  <label for="uemail">Email Adress</label><br>
  <input class="form-input-tip" placeholder="Enter Email Address" type="email" id="uemail" name="sp-email" value="" style="width:42%; margin-top:5px; padding:5px 10px;" required><br><br>';
  wp_nonce_field( 'vcespam-action', 'vcespam_nonce' );
  echo '<input class="button button-primary button-large" type="submit" value="Add Spam Email" name="do-rsemail">
</form> ';
echo $msg;
$spmEmails = [];
$data = $spdb->get_results("SELECT * FROM wp_vcspamemails ORDER BY id DESC");
if( $data ){
	echo '<h3>SPAM Email List</h3>';
	echo '<ul class="spm-emails">';
	foreach( $data as $row ){
		$spmEmails[] = $row->email;
		echo '<li>'.$row->email.'<a href="'.admin_url('admin.php?page=espam-check&rec-id='.$row->id).'">Delete</a></li>';
	}
	echo '</ul>';	
}
$leads = $spdb->get_results("SELECT id,email, source, ip, count(*) as hits FROM wp_webleads WHERE 
email is not null AND source not like '%/v2wp%' AND email not like '%yopmail%' AND
email not like '%valuecoders.com%' AND email not like '%vinove.com%' GROUP BY email HAVING count(*) > 5 ORDER BY id DESC");
echo '<h3>SPAM Email Prediction</h3>';
if($leads){
	echo '<ul class="spm-emails">';
	foreach( $leads as $row ){
		if( filter_var($row->email, FILTER_VALIDATE_EMAIL) ){
			$hasError = ( in_array( $row->email, $spmEmails ) ) ? "has-error" : '';
			if( $hasError == "" ){
				echo '<li class="'.$hasError.'">'.$row->email.' ('.$row->hits.')<a href="'.admin_url('admin.php?page=espam-check&addsemail='.$row->email).'">Report Spam</a></li>';	
			}else{
				echo '<li class="'.$hasError.'">'.$row->email.' ('.$row->hits.')</li>';
			}			
		}		
	}
	echo '</ul>';
}
}

function webleadsfunc(){
	require get_template_directory() . '/inc/leadpage.php';	
}
///////////////////////// end ne menu //////////////////////
/////////////////////////// rate us /////////////////
add_action( 'wp_ajax_nopriv_rateus', 'rateus' );
add_action( 'wp_ajax_rateus', 'rateus' );

function rateus(){
	global $wpdb; 
	$data = $_POST;
	 $ip = $data['user_ip'];
	 $purl = $data['rating_page_url'];
	 $total_query = "SELECT COUNT(*) FROM post_rating where user_ip='".$ip."' and rating_page_url='".$purl."'";
	$total = $wpdb->get_var( $total_query );
	if($total>0){
		wp_send_json_success( 'Already Rated' );
	}
	else{	
		$res = $wpdb->insert('post_rating', array(
			'total_points' => $data['total_points'],
			'user_ip' => $data['user_ip'],
			'rating_page_url' => $data['rating_page_url'], 
		));
		if($res){
			wp_send_json_success( 'Rated Successfully' );
		}
		  else{
			wp_send_json_error( 'Error' );
		  } 
	}

	 
}

///////////////////////// end rate us ////////////////////
////////////////////////////// custom meta box start //////////////////
function custom_meta_box_markup()
{
	 global $post;
	// $selected_post_id = get_post_meta( $post->ID, "selected_post_id_0", true );
	// print_r($selected_post_id);
$oldids = array();
	for ($i = 0; $i <= 3; $i++) { 
		$keydata = "selected_post_id_".$i;
		$oldids[] = get_post_meta( $post->ID, $keydata, true );
		 
	}
    ?>
	<script>
	 jQuery(document).ready(function ($) {
		var limit = 2;
$('.single-checkbox').on('change', function(evt) {
	alert('checked');
   if($(this).siblings(':checked').length >= limit) {
       this.checked = false;
   }
   else{
	   alert('You can select only 3 Posts');
   }
});
});
	</script>
	<input type="hidden" name="oldids" id="oldids" value="<?php echo implode(",",$oldids); ?>">
    <label for="my_meta_box_text"></label>
    <input type="text" name="my_meta_box_text" id="my_meta_box_text" size="14" /> <button type="button" class="button tagadd listblog">Get Blog</button>
	<div id="sections_meta_box">

	</div>
    <?php
}

function add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "Blog", "custom_meta_box_markup", "page", "side", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box");


add_action('wp_ajax_getblog', 'getblog');
function getblog() {  
	global $post;
	$cat = $_POST['cat'];
 	$url = "https://valuecoders.com/blog/wp-json/bposts/v1/cat-posts";
	$data = file_get_contents($url.'/'.$cat);
		$blogPosts = json_decode( $data );
		$htmldata = "<script> jQuery(document).ready(function ($) { var limit = 3; $('.single-checkbox').on('change', function(evt) { if($(this).siblings(':checked').length >= limit) { this.checked = false; } }); }); </script>";
		$oldids = explode(',',$_POST['oldids']);
		if(count($blogPosts)>0){
			foreach( $blogPosts as $post ){
				$checktext = '';
				if(in_array($post->post_id, $oldids)){
				   $checktext = 'checked';
				}
				   $htmldata.= '<input type="checkbox" '.$checktext.' name="post_id[]" value="'.$post->post_id.'" class="single-checkbox" id="checkbox-'.$post->post_id.'"> <label for="checkbox-'.$post->post_id.'">'.$post->title.'</label><br>';
			   } 
		}
		else{
			$htmldata = "no data found";
		}
	wp_send_json_success( $htmldata );
}
//Add script
add_action('admin_head','ajax_script');
function ajax_script(){ ?>
 
    <script>
    jQuery(document).ready(function ($) {

        $('.listblog').on('click', function () {
            var cat = $('#my_meta_box_text').val();
			var oldids = $('#oldids').val();
            $.post(ajaxurl, {action: 'getblog', cat: cat, oldids: oldids}, function (data) {
                $('#sections_meta_box').html(data.data);
				
            });
        }); 
    });
    </script>
<?php
}

function save_meta_blog(){
 
    global $post;
  
    if(isset($_POST["post_id"])):
         foreach($_POST["post_id"] as $key => $selectedpost){
			update_post_meta($post->ID, 'selected_post_id_'.$key, $selectedpost);
		 }
       
     
    endif;
}
 
add_action('save_post', 'save_meta_blog');

//////////////////////////// meta box end ///////////////////////////