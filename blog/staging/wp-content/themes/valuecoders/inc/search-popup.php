<div class="search_header">
<div class="searchdiv">
<button  class="searchsubmit" value="search" id="myBtn"></button>
<div id="contentPopup" class="popup-wrapper">
<div class="popWrap">
<div class="popup-content">
<span class="close"></span>
<?php $site_url = trailingslashit( get_bloginfo('url') ); ?>   
<form action="<?php echo $site_url; ?>" method="get" class="search_box">
<input type="search" placeholder="Type to start your search..." class="search" name="s" id="search" value="<?php the_search_query(); ?>" />
<button  class="searchsubmit" value="search"></button>
</form>
</div>
<div>
</div>
</div>

</div>

<div id="newsletter-col">
<button class="newsletter" value="search" id="myBtn2"></button>
<div id="newsletterPopup" class="popup-wrapper">
<div class="popWrap">
<div class="popup-content">
<span class="closeicon"></span>
<h3>Like What You’re Reading?</h3>
<?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
</div>
</div>
</div>
</div>
</div>
</div>