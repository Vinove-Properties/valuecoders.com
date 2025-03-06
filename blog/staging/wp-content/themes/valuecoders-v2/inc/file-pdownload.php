<?php 
global $post;
//$guidename = get_post_meta($post->ID,'guide_name',true);
$guidename  = (!empty(get_post_meta($post->ID,'guide_name',true))) ? get_post_meta($post->ID,'guide_name',true) :  get_the_title($post->ID);
$pdfTagLine   = get_post_meta($post->ID,'pdf-dwtagline',true);
?>
<div class="modal <?php if(isset($_GET['ep-action']) && !empty($_GET['ep-action'])){ echo 'show-modal epaction'; } ?>">
<section class="pop-up-section">
<span class="close-button">×</span>
<div class="container" id="formid">
	<div style="text-align: center;">	
	<h2>Download Your FREE e-Guide NOW!</h2>
	<?php 
	if( $pdfTagLine ){
		echo '<p>'.$pdfTagLine.'</p>';
	}else{
		echo '<p>Discover What, Why & How of "'.$guidename.'" with this FREE e-Guide!</p>';
	}
	?>
	</div>
<div class="left-right-box">
<div class="afterverify">
<?php 
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
$emails 	= $_GET['email'];
$hashval 	= $_GET['hash'];
$result 	= $wpdb->get_results("SELECT * FROM `wp_ebookdata` where hashcode = '".$hashval."' AND email = '".$emails."'");
if (count($result) > 0){
foreach($result as $results){
?>
<h3>Thank you for verifying your email id. Please click on Download button to download your e-guide</h3>
<?php 
$pdflink 	= get_field('vc-post-pdf');
$pdf 		= get_post_meta($post->ID,'post_pdf',true);
$url 		= site_url();
if(!empty($pdf)){
?>
<button> <a href="<?php echo  wp_get_attachment_url( $pdf ); ?>" download>Download Now</a></button>
<?php 
}else{ 
	if( str_contains($pdflink, 'valuecoders.com') ){
		$pLink = $pdflink;
	}else{
		$pLink = $url.'/wp-content/uploads/post-pdf/'.$pdflink.'.pdf';
	}	
?>
<button><a href="<?php echo $pLink; ?>" download>Download Now</a></button>
<?php  
} 
}
} 
}else {?>
</div>
<div class="rightnew">
<div class="left-img">
<picture>
<source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/dev-img/ebook-pop.webp">
<img loading="lazy" src="<?php bloginfo('template_url'); ?>/dev-img/ebook-pop.webp" alt="Valuecoders" width="245" height="472">
</picture>
</div>
<div class="right-img">
<p id="responce" style="color:#fff;"></p>
<form method="post" id="vc-lead-form" class="orderform">
<p>Fill out the form below to download the e-Guide now.</p>
<div class="">
<input type="text" maxlength="50" name="firstName" id="first_name" placeholder="Enter your full name"
class="input-field" onkeypress="return ValidateName(event,'lblError_firstname','firstName');"
value="">
<small class="error-msg-section" id="lblError_firstname"></small>
</div>
<div class="">
<input type="email" placeholder="Enter your Email Address"
pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$"
maxlength="50" id="txtEmail" class="input-field" value=""
name="email">
<small class="error-msg-section" id="lblError_email"></small>
</div>
<div class="">
<input type="text" placeholder="Enter your Country"
maxlength="25" class="input-field" value="" name="country"
id="country" onkeypress="return ValidateName(event,'lblError_country','country');" required>
<small class="error-msg-section" id="lblError_country"></small>
</div>
<div class="">
<input type="tel" placeholder="Enter your Phone Number"
class="input-field" value="" name="phone" id="phone_no"
maxlength="10">
<small class="error-msg-section" id="lblError_phone"></small>
</div>
<!-- <input type="hidden" value="<?php //echo $pdf;?>" name="pdflink"
id="pdflink">-->
<input type="hidden" value="<?php echo $post->ID;?>" name="postid"
id="postid">
<input type="hidden" value="<?php echo $post->post_name;?>"
name="posttitle" id="posttitle">
<input type="button" id="ebook-btn" value="Download Our e-Guide" onclick="ValidationEvent(this.id)">
</form>
</div>
</div>
<?php } ?>
</div>
</div>

</section>
</div>