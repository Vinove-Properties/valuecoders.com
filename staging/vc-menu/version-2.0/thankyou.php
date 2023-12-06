<?php require_once '../common/inc/config.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thankyou | Valuecoders - @ValueCoders</title>
	<meta name="description" content="ValueCoders is a Software Company from India offering the best Software services at affordable rates. We have state-of-the-art infrastructure, 17+ years of experience, dedicated development teams, ISO certification, 100% money-back guarantee & worldwide clientele. CONTACT US TODAY!" />
	<meta name="keywords" content="Staff Augmentation, Staff Augmentation Services, Staff Augmentation Companies, Staff Augmentation Consulting" />
	<meta property="og:title" content="Thankyou | Valuecoders - @ValueCoders" />
    <?php require_once '../include/header-files.php'; ?>
	<link rel="preload stylesheet" type="text/css" href="../css/thankyou.min-2.0.css" defer/>

	<style>
		
		#loading {
			display: inline-block;
			width: 50px;
			height: 50px;
			border: 5px solid rgb(26 108 97 / 56%);
			border-radius: 50%;
			border-top-color: #fff;
			animation: spin 1s ease-in-out infinite;
			-webkit-animation: spin 1s ease-in-out infinite;
			position: fixed;
			top: 50%;
			left: 50%;
			z-index: 99;
		}

		@keyframes spin {
		to {
			-webkit-transform: rotate(360deg);
		}
		}

		@-webkit-keyframes spin {
		to {
			-webkit-transform: rotate(360deg);
		}
		}


	</style>
</head>
<body id="themeAdd" class="">
<?//php require_once '../include/menu.php'; ?>


<div id="loading"></div>


<section class="thank-you-box-icon">
    <div class="container">
        <div class="wrap-80 bg-voilet text-center">
          <div class=icon_text>
        <div class="thank-you-icon">
        <picture>
			<source type="image/webp" srcset="<?=HOST_URL?>images/thumb_thankyou_icon.webp">
			<source type="image/png" srcset="<?=HOST_URL?>images/thumb_thankyou_icon.png">
			<img loading="lazy" src="<?=HOST_URL?>images/thumb_thankyou_icon.png" alt="Valuecoders" width="166" height="166">
		</picture>
        </div>
        <div class="thank-you-text">
            <h1>Thank You!</h1>
            <p>Your enquiry has been accepted and is now being routed to the appropriate member of our staff. Thank you for your interest in our company.</p>
        </div>
    </div>
	
	<div class="social-con">
        <div class="dark-theme-img">
	<ul class="dis-flex">
	
	<li><a href="https://www.facebook.com/ValueCoders"><img src="<?=HOST_URL?>images/facebookicon.png"></a></li>
	<li><a href="https://www.instagram.com/valuecodersofficial_/?igshid=qfk286mq0wee"><img src="<?=HOST_URL?>images/instagramicon.png"></a></li>
	<li><a href="https://twitter.com/ValueCoders"><img src="<?=HOST_URL?>images/Twitter.png"></a></li>
	<li><a href="https://www.linkedin.com/valuecoders"><img src="<?=HOST_URL?>images/linkedinicon.png"></a></li>
	</ul>
</div>
<div class="lighter-theme-img">
    <ul class="dis-flex">
	
	<li><a href="https://www.facebook.com/ValueCoders"><img src="<?=HOST_URL?>images/facebook_light_ icon.png"></a></li>
	<li><a href="https://www.instagram.com/valuecodersofficial_/?igshid=qfk286mq0wee"><img src="<?=HOST_URL?>images/instagram_light_ icon.png"></a></li>
	<li><a href="https://twitter.com/ValueCoders"><img src="<?=HOST_URL?>images/twitter_light_ icon.png"></a></li>
	<li><a href="https://www.linkedin.com/valuecoders"><img src="<?=HOST_URL?>images/linkedin_light_icon.png"></a></li>
	</ul>   
    </div>
	</div>
    <div class="para-txt">
	    	<p>Copyright © 2022 ValueCoders. All rights reserved.</p>
</div>

 </div>
</div>
</section>
<script defer src="js/script.js"></script>


<script>
	document.onreadystatechange = function() {
		if (document.readyState !== "complete") {
			document.querySelector(
				"body").style.visibility = "hidden";
			document.querySelector(
				"#loading").style.visibility = "visible";
		} else {
			document.querySelector(
				"#loading").style.display = "none";
			document.querySelector(
				"body").style.visibility = "visible";
		}
	};
</script>
</body>
</html>