
<?php 
if( isset($_SERVER['SCRIPT_FILENAME']) && (strpos($_SERVER['SCRIPT_FILENAME'], "404.php") === false ) ){
$footerOpts 		= get_field('footer-opts');
$footerOptsEn 		= isset($footerOpts['is_enabled']) ? $footerOpts['is_enabled'] : '';
if( $footerOptsEn != "no" ) :
?>
<section class="contact-us-section padding-t-120 padding-b-120" id="form">
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
echo '<section class="related-tags-section padding-t-50 padding-b-50 bg-light">
<div class="container">
<h3>Related Services :</h3>
<div class="tags-outer">';
foreach($relatedServices as $row){
   echo '<a href="'.$row['link'].'">'.$row['services'].'</a>';
}
echo '</div></div></section>';
}
//endif;
if( !is_page_template( 'page-templates/template-thankyou.php' ) ){
   require_once 'include/footer.php';
}

if( !is_page_template( 'page-templates/template-contact-v9.php' ) ) :
?>
<div class="popup-section">
   <div id="intentPopup" class="popup-wrapper exit-intent-popup">
      <div class="popWrap">
         <div class="popup-content">
            <span class="closeicon" onclick="closeIntPopUp('intentPopup', false);">
            <img loading="lazy" width="11" height="11" src="<?php bloginfo('template_url'); ?>/dev-img/cross-image.svg" alt="Cross Icon">
            </span>
            <h2>Stay With Us</h2>
            <h3>Are you looking for the perfect partner for your next software project?</h3>
            <p>Let's discuss how we can bring your vision to life.</p>
            <div class="ctasec"><a href="<?php echo site_url('/contact'); ?>" class="book-btn" rel="follow">Book a Free Consultation</a></div>
         </div>
      </div>
   </div>
</div>
<?php 
endif;
wp_footer(); ?>
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
   "address" : [
   {
   "@type" : "PostalAddress",
   "streetAddress" : "10th floor, Tower-B, UNITECH CYBER PARK, Durga Colony, Sector 39,",
   "addressLocality" : "Gurugram",
   "addressRegion" : "IN",
   "postalCode" : "122001",
   "telephone" : "+917042020782",
   "addressCountry" : {"@type" : "Country","name" : "India"}
   },
   {
   "@type" : "PostalAddress",
   "streetAddress" : "11th Floor, Max Square, Noida-Greater Noida Expy, Sector 129,",
   "addressLocality" : "Noida",
   "addressRegion" : "IN",
   "postalCode" : "201304",
   "telephone" : "+917042020782",
   "addressCountry" : {"@type" : "Country","name" : "India"}
   }
   ],
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
  "@context": "https://schema.org/",
  "@type": "LocalBusiness",
  "@id": "ValueCoders",
  "url": "https://www.valuecoders.com/",
  "name" : "ValueCoders - <?php echo $rName; ?>",
  "description": "Leading software development company specializing in on-demand solutions.",
  "address": [
    {
      "@type": "PostalAddress",
      "streetAddress": "10th floor, Tower-B, UNITECH CYBER PARK, Sector 39",
      "addressLocality": "Gurugram",
      "addressRegion": "Haryana",
      "postalCode": "122001",
      "addressCountry": "India"
    },
    {
      "@type": "PostalAddress",
      "streetAddress": "11th floor, Max Square, Noida-Greater Noida Expy",
      "addressLocality": "Noida",
      "addressRegion": "UP",
      "postalCode": "201304",
      "addressCountry": "India"
    }
  ],
  "telephone": "+917042020782",
  "openingHours": ["Mo-Fr 09:00-18:00"],
  "image": "https://www.valuecoders.com/wp-content/uploads/2022/05/IT-outsourcing-Company.jpg.webp",
  "priceRange": "$18 - $49",
  "areaServed": ["India"],
  "sameAs": [
    "https://www.facebook.com/ValueCoders",
    "https://twitter.com/ValueCoders",
    "https://www.instagram.com/valuecoder/",
    "https://www.linkedin.com/company/valuecoders",
    "https://www.youtube.com/valuecoders/"
  ]
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
"address": {
   "@type": "PostalAddress",
   "streetAddress": "10th floor, Tower-B, UNITECH CYBER PARK, Durga Colony, Sector 39,",
   "addressLocality": "Gurugram",
   "addressRegion": "IN",
   "postalCode":"122001"
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
<script>
silktideCookieBannerManager.updateCookieBannerConfig({
  background: {
    showBackground: false
  },
  cookieIcon: {
    position: "bottomRight"
  },
  cookieTypes: [
    {
      id: "necessary",
      name: "Necessary",
      description: "<p>These cookies are necessary for the website to function properly and cannot be switched off. They help with things like logging in and setting your privacy preferences.</p>",
      required: true,
      onAccept: function() {
        console.log('Add logic for the required Necessary here');
      }
    },
    {
      id: "analytical",
      name: "Analytical",
      description: "<p>These cookies help us improve the site by tracking which pages are most popular and how visitors move around the site.</p>",
      required: false,
      onAccept: function() {
        gtag('consent', 'update', {
          ad_storage: 'granted',
          ad_user_data: 'granted',
          ad_personalization: 'granted',
        });
        dataLayer.push({
          'event': 'consent_accepted_analytical',
        });
      },
      onReject: function() {
        gtag('consent', 'update', {
          ad_storage: 'denied',
          ad_user_data: 'denied',
          ad_personalization: 'denied',
        });
      }
    },
    {
      id: "advertising",
      name: "Advertising",
      description: "<p>These cookies provide extra features and personalization to improve your experience. They may be set by us or by partners whose services we use.</p>",
      required: true,
      onAccept: function() {
        console.log('Add logic for the required Advertising here');
      }
    }
  ],
  text: {
    banner: {
      description: "<p>We use cookies on our site to enhance your user experience, provide personalized content, and analyze our traffic. <a href=\"https://www.valuecoders.com/privacy-policy\" target=\"_blank\">Privacy policy</a></p>",
      acceptAllButtonText: "Accept all",
      acceptAllButtonAccessibleLabel: "Accept all cookies",
      rejectNonEssentialButtonText: "Reject non-essential",
      rejectNonEssentialButtonAccessibleLabel: "Reject non-essential",
      preferencesButtonText: "Preferences",
      preferencesButtonAccessibleLabel: "Toggle preferences"
    },
    preferences: {
      title: "Customize your cookie preferences",
      description: "<p>We respect your right to privacy. You can choose not to allow some types of cookies. Your cookie preferences will apply across our website.</p>",
      creditLinkText: " ",
      creditLinkAccessibleLabel: "Get this banner for free"
    }
  }
});
</script>
</body>
</html>