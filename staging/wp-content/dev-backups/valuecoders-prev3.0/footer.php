<?php 
if( isset($_SERVER['SCRIPT_FILENAME']) && (strpos($_SERVER['SCRIPT_FILENAME'], "404.php") === false ) ){
$footerOpts 		= get_field('footer-opts');
$footerOptsEn 		= isset($footerOpts['is_enabled']) ? $footerOpts['is_enabled'] : '';
if( $footerOptsEn != "no" ) :
?>
<section class="contact-us-section padding-b-150 <?php //echo $footerOpts['sc_background']; ?>" id="form">
<?php get_template_part('inc/contact','form'); ?>
</section>
<?php 
endif; 
}
?>

<?php  
//if( is_page_template( 'page-templates/template-hirepage.php' ) ) : 
$relatedServices = get_field('rel-services');
if( $relatedServices ){
echo '<section class="related-tags-section">
<div class="container">
<h3>Related Services :</h3>
<div class="tags-outer">';
foreach($relatedServices as $row){
   echo '<a href="'.$row['link'].'">'.$row['services'].'</a>';
}
echo '</div></div></section>';
}
//endif;
?>
   
<?php 
if( !is_page_template( 'page-templates/template-thankyou.php' ) ){
   require_once 'include/footer.php';
}
?>

<?php wp_footer(); ?>

<?php 
global $post;
$ogImage = 'https://www.valuecoders.com/common/images-2/home-og.png';
if( has_post_thumbnail( $post->ID ) ){
	$attachment_image   = wp_get_attachment_url( get_post_thumbnail_id() );
	$ogImage 			  = esc_attr( $attachment_image );
}
$ymetaDescription 	= get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
$ymetaTitle          = get_post_meta($post->ID, '_yoast_wpseo_title', true);
$rName 				   = get_post_meta($post->ID, 'sch-review-name', true);
if( empty($rName) ){
	$rName = "On demand Software Teams";
}
?>
<script type="application/ld+json">
{
"@context" : "http://schema.org",
"@type" : "Review",
"name" : "ValueCoders - <?php echo $rName; ?>",
"url" : "<?php the_permalink(); ?>",
"image" : "<?php echo $ogImage; ?>",
"author" : {"@type": "Person", "name": "ValueCoders"},
"reviewBody" : "<?php echo $ymetaDescription; ?>",
"reviewRating" : {
   "@type" : "Rating",
   "ratingValue" : "5"
},
"itemReviewed" : {
   "@type" : "LocalBusiness",
   "name" : "ValueCoders | On-Demand Software Development Company",
   "priceRange" : "$18 - $49",
   "image" : "<?php echo $ogImage; ?>",
   "address" : {
       "@type" : "PostalAddress",
       "streetAddress" : "2nd Floor, 55P, Sector 44,",
       "addressLocality" : "Gurugram",
       "addressRegion" : "IN",
       "postalCode" : "122003",
       "telephone" : "+917042020782",
       "addressCountry" : {
           "@type" : "Country",
           "name" : "India"
       }
   },
    "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9",
    "bestRating": "5",
    "worstRating": "1",
    "ratingCount": "28",
    "reviewCount": "568"
    }
}
}
</script>
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "ProfessionalService",
"priceRange" : "$18 - $49",
"name": "On-Demand Software Development Company",
"url": "<?php the_permalink(); ?>",
"image": "<?php echo $ogImage; ?>",
"description": "<?php echo $ymetaDescription; ?>",
"telephone": "+917042020782",
"areaServed": ["Noida","Gurugram", "Bangalore"],
"address": {
   "@type": "PostalAddress",
   "streetAddress": "2nd Floor, 55P, Sector 44,",
   "addressLocality": "Gurugram",
   "addressRegion": "IN",
   "postalCode":"122003"
}
}
</script>
<script type="application/ld+json">
   {
   "@context": "https://schema.org/", 
   "@type": "Product", 
   "name" : "<?php echo $ymetaTitle; ?>",
   "image": "<?php echo $ogImage; ?>",
   "description": "<?php echo $ymetaDescription; ?>",
   "brand": {
   "@type": "Brand",
   "name": "Valuecoders.com"
   },
   "aggregateRating": {
   "@type": "AggregateRating",
   "ratingValue": "4.9",
   "bestRating": "5",
   "worstRating": "1",
   "ratingCount": "1968"
   },
   "offers": {
   "@type": "Offer",
   "url": "<?php the_permalink(); ?>",
   "priceCurrency": "USD",
   "price": "20",
   "priceValidUntil": "2023-11-20",
   "itemCondition": "https://schema.org/NewCondition",
   "availability": "https://schema.org/InStock"
   }
   }
</script>
</body>
</html>
