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

//__new menu__//
add_action("admin_menu", "addMenu");
function addMenu() {
    //add_menu_page("Web Spam Leads", "Spam Leads", "manage_options", "web-leads", "webleadsfunc", null, 6);
    add_menu_page("Web Spam Leads", "Spam Leads", "manage_options", "vc-spam-leads", "vcSpamLeads_cb", 'dashicons-dismiss', 99);
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

function vcSpamLeads_cb(){
	require get_template_directory() . '/inc/spam-leadpage.php';	
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

/*Template Specific Function*/
function colServiceWhyChoose( $pageID ){
	$whyChoos = get_field('why-choose', $pageID);
	if( isset( $whyChoos['is_enable'] ) && ($whyChoos['is_enable'] == "yes") ){
	$htContent 	= $whyChoos['content'];
	$headText 	= fnextractHeadins('h2', $htContent ); 
	$sectionType = ( isset( $whyChoos['options'] ) && (count( $whyChoos['options'] ) > 6) ) ? 'accordian' : 'grid';
	if( $sectionType == "grid" ){
	$gridColumn = ( isset( $whyChoos['grid-column'] ) && !empty( $whyChoos['grid-column'] ) ) ? 'flex-'.$whyChoos['grid-column'] : 'flex-3';
	?>
	<section class="three-column-icon-section padding-t-120 padding-b-120 <?php echo $whyChoos['sc_background']; ?>" 
	id="v3-why-choose">
	      <div class="container">
	        <div class="dis-flex top-content">
	          <div class="flex-2"><?php echo $headText; ?></div>
	          <div class="flex-2"><?php echo preg_replace("/<h([1-2]{1})>.*?<\/h\\1>/si", '', $htContent); ?></div>
	        </div>
	        <div class="dis-flex col-box-outer margin-t-50">
	        	<?php 
						foreach( $whyChoos['options'] as $row ){
							$vcHasAnchor = vcHasAnchor($row['title'], $row['text']);
							echo '<div class="'.$gridColumn.' box-3'.$vcHasAnchor.'">
	            <div class="box">
	              <h3>'.$row['title'].'</h3>
	              <p>'.$row['text'].'</p>';
	              echo ( $vcHasAnchor !== false ) ? '<span class="box-link">'.$row['title'].'</span>' : '';
	            echo '</div></div>';
						}
						?>
	        </div>
	      </div>
	</section>
	<?php 
	}else{
	$blueBG = (isset($whyChoos['bl-bg']) && ($whyChoos['bl-bg'] == "yes")) ? "bg-blue-linear" : "";
	?>
	<section class="accordion-section padding-t-120 <?php echo $blueBG; ?>" id="acf-accor-why-choose">
	  <div class="dis-flex accordian-row">
	    <div class="col-left">
	      <div class="head-txt"><?php echo $whyChoos['content']; ?></div>
		  <div class="image-wrap">
				<?php 
				if( isset($whyChoos['image']) && !empty($whyChoos['image']) ){
				echo vc_pictureElm( $whyChoos['image'], 'ValueCoders', 'soft-img' );
				}
				?>
				</div>
	    </div>

	    <div class="col-right padding-b-120">
				<?php 
				if( $whyChoos['options'] ){
				$g = 0;
					foreach( $whyChoos['options'] as $row ){ 
						$g++;
	          $hasAnchor  = (vcHasAnchor( $row['title'] ) !== false ) ? ' has-link' : ''; 
	          $blnkTitle  = ( !empty($hasAnchor) ) ? strip_tags($row['title']) : $row['title'];
	          $aTitle     = (vcHasAnchor( $row['title'] ) !== false ) ? $row['title'] : '';
						$isActive = ( $g == 1 ) ? " active" : "";
						echo '<div class="accordionItem'.$isActive.'">
						<h3 class="accordion-toggle '.$hasAnchor.'"><span>'.$blnkTitle.'</span>'.$aTitle.'</h3>
						<div class="accordion-content">
						<p>'.$row['text'].'</p>
						</div>
						</div>';		
					}
				}
				?>
	    </div>
	  </div>
	</section>	
	<?php }
	}
}

function getServicesPageTechnologies( $pageID ){
$expframeworks 	= get_field('php_frame_work_section', $pageID);
$isBlockChain 	= get_field('bc_specific', $pageID);
$isBcContent  	= false;
if( isset($isBlockChain['is-enable']) && ($isBlockChain['is-enable'] == "yes") ){
	if( $isBlockChain['main-bc'] ){
		$isBcContent = ( $expframeworks ) ? $expframeworks['content'] : '';
		$expframeworks = get_field( 'php_frame_work_section', $isBlockChain['main-bc'] );	
	}	
}

if( $expframeworks ) :
$isfrEnable = $expframeworks['is_enable'];
if( $isfrEnable == "yes" ){
$sectionType 	= $expframeworks['section_type']; 
$techno 			= $expframeworks['techno'];
//echo '<pre>'; print_r($techno); die;
if( ($sectionType == "technology") && $techno ){
$hastechSidebar = ( isset($expframeworks['show-cat-lc']) && ($expframeworks['show-cat-lc'] == "no") ) ? " no-catbar " : "";
$maxClass 			= ( isset($expframeworks['show-cat-lc']) && ($expframeworks['show-cat-lc'] == "no") ) ? "" : " for-max-six-icon ";
$dtype = (isset($expframeworks['dtype']) && !empty($expframeworks['dtype'])) ? $expframeworks['dtype'] : '';
if( $dtype == "accordian" ){
if( count( $techno ) === 1 ){ ?>
  <section class="technology-section-ser bg-light ">
  <div class="dis-flex">
  <div class="left-box padding-t-120 padding-b-120">
    <?php 
    echo $expframeworks['content'];

    if( $techno[0]['in_technologies'] ){
    echo '<ul>';
    foreach( $techno[0]['in_technologies'] as $row ){
    $tech = (isset( $row['link']) && !empty($row['link'])) ? '<a href="'.vc_siteurl($row['link']).'">'.$row['title'].'</a>' : $row['title'];
    echo '<li>'.$tech.'</li>';
    }
    echo '</ul>';
    }
    ?>
  </div>
  <div class="right-box">
  <?php 
  if( $expframeworks['image'] ){
    echo vc_pictureElm($expframeworks['image']);
  }else{
  ?>
  <picture>
  <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.png">
  <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.png">
  <img loading="lazy" src="<?php bloginfo('template_url'); ?>/v3.0/images/technology-image.png" width="695" 
  height="607" alt="valuecoders">
  </picture>
  <?php } ?>
  </div>
  </div>  
  </section>
  <?php }else{ ?>
  <section class="accordion-section padding-t-120 <?php echo $expframeworks['sc_background']; ?>" id="serv-technology-accordian">
  <div class="dis-flex accordian-row">
  <div class="col-left">
  <div class="head-txt"><?php echo $expframeworks['content']; ?></div>
  <div class="image-wrap">
  <?php 
  if( isset($expframeworks['image']) && !empty($expframeworks['image']) ){
  echo vc_pictureElm( $expframeworks['image'], 'ValueCoders', 'soft-img' );
  }
  ?>    
</div>
  </div>
  <div class="col-right content-col padding-b-120">
  <?php 
  $rowCount = 0;
  foreach( $techno as $mrow ){ 
  echo '<div class="inner-box">
  <h3>'.$mrow['cat-name'].'</h3>';
  if( $mrow['in_technologies'] ){
    echo '<ul>';
    foreach( $mrow['in_technologies'] as $row ){
      $tech = (isset( $row['link']) && !empty($row['link'])) ? '<a href="'.vc_siteurl($row['link']).'">'.$row['title'].'</a>' : $row['title'];
      echo '<li>'.$tech.'</li>';
    }
    echo '</ul>';
  } 
  echo '</div>';
  }
  ?>  
  </div>
  </div>
  </section>
  <?php 
}
}else{
?>
<section class="tech-stacks padding-t-120 padding-b-120 <?php echo $expframeworks['sc_background']; ?> aaaa" id="serv-technology-grid">
  <div class="container">
    <div class="head-txt text-center"><?php echo $expframeworks['content']; ?></div>
    <div class="dis-flex col-box-outer margin-t-50">
    <?php
    if( $techno ){
    	$flexCount = ( count($techno) === 1 ) ? 'flex-1' : 'flex-3';
    	foreach( $techno as $trow ){
    		echo '<div class="'.$flexCount.' col-box"><div class="inner-box">';
    		echo '<h3>'.$trow['cat-name'].'</h3>';
    		if( $trow['in_technologies'] ){
    			echo '<ul>';
    			foreach( $trow['in_technologies'] as $row ){
    				if( $row['link'] ){
    					echo '<li><a href="'.vc_siteurl($row['link']).'">'.$row['title'].'</a></li>';
    				}else{
    					echo '<li>'.$row['title'].'</li>';	
    				}    				
    			}
    			echo '</ul>';
    		}
    		echo '</div></div>';
    	}
    }
    ?>          
    </div>
  </div>
</section>
<?php } 
}
}
endif;
}


function expert_talk_cta( $text, $btnText = "Contact Us", $itype = "one", $elmClasses = " padding-t-70 padding-b-70" ){
return '<section class="lets-discuss-cta bg-blue-linear '.$elmClasses.' ">
<div class="container">
  <div class="dis-flex justify-sb">
    <div class="left-sec">
      <div class="head-txt">'.$text.'</div>
      '.get_cmnCTA_v3($btnText, false).'
    </div>
    <div class="right-sec">
      <picture class="icon-box">
        <source type="image/webp" srcset="'.get_bloginfo('template_url').'/v4.0/images/cta-image.png">
        <source type="image/png" srcset="'.get_bloginfo('template_url').'/v4.0/images/cta-image.png">
        <img loading="lazy" src="'.get_bloginfo('template_url').'/images/cta-image.png" alt="valuecoders" width="345" height="206">
      </picture>
    </div>
  </div>
</div>
</section>';
}

function expert_talk_cta_v5( $text, $btnText = "Contact Us", $itype = "one", $elmClasses = " padding-t-70 padding-b-70" ){
return '<section class="lets-discuss-pro bg-blue-linear margin-t-70 '.$elmClasses.' ">
<div class="container">
  <div class="dis-flex justify-sb">
    <div class="left-sec">
      <div class="head-txt">'.$text.'</div>
      '.get_cmnCTA_v3($btnText, false).'
    </div>
    <div class="right-sec">
      <picture class="icon-box">
        <source type="image/webp" srcset="'.get_bloginfo('template_url').'/v5.0/images/cta-v5.png">
        <source type="image/png" srcset="'.get_bloginfo('template_url').'/v5.0/images/cta-v5.png">
        <img loading="lazy" src="'.get_bloginfo('template_url').'/v5.0/images/cta-v5.png" alt="valuecoders" width="293" height="175">
      </picture>
    </div>
  </div>
</div>
</section>';
}