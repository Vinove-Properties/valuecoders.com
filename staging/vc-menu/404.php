<?php require_once 'common/inc/config.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page Not Found - @ValueCoders</title>
	<meta name="description" content="Page Not Found" />
	<meta name="keywords" content="" />
	<meta property="og:title" content="Page Not Found - @ValueCoders" />

	<?php require_once 'include/header-files.php'; ?>
	<link rel="preload stylesheet" type="text/css" href="css/index.min.css" defer/>
</head>
<body id="themeAdd">
<?php require_once 'include/menu.php'; ?>


<section class="not-found-section">
	<div class="container">
		<div class="dis-flex items-center">
			<div class="flex-2">
				<h2>This Page Does Not Exist.</h2>
				<span class="suggest">Lost? We Suggest....</span>
				<ul>
					<li>Please check the web address for typos, else</li>
					<li>Visit the <a href="https://www.valuecoders.com/">home page</a></li>
					<li>Connect with us at : <a href="mailto:sales@valuecoders.com" title="sales@valuecoders.com">sales@valuecoders.com</a></li>
				</ul>
			</div>
			<div class="flex-2">
				<picture class="dark-theme-img">
					<source type="image/webp" srcset="<?=HOST_URL?>images/not-found-banner.webp">
					<source type="image/png" srcset="<?=HOST_URL?>images/not-found-banner.png">
					<img loading="lazy" src="<?=HOST_URL?>images/not-found-banner.png" alt="Valuecoders" width="832" height="513"> 
				</picture>
				<picture class="lighter-theme-img">
					<source type="image/webp" srcset="<?=HOST_URL?>images/not-found-banner-light.webp">
					<source type="image/png" srcset="<?=HOST_URL?>images/not-found-banner-light.png">
					<img loading="lazy" src="<?=HOST_URL?>images/not-found-banner-light.png" alt="Valuecoders" width="832" height="513"> 
				</picture>
			</div>
		</div>
	</div>
</section>



<?php require_once 'include/footer.php'; ?>

</body>
</html>

