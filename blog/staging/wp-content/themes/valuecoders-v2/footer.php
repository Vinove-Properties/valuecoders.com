</main>
<?php //get_template_part('inc/cmn', 'footer'); ?>
<?php $site_url = "https://www.valuecoders.com/"; ?>
<section class="experts-talk-first-section">
  <div class="container">
    <?php 
    if( is_single() ){
    echo '<h2>Subscribe to our blog</h2>';  
    echo do_shortcode('[email-subscribers-form id="1"]');
    }else{
    ?>
    <div class="head-txt text-center">
      <h2>Got a Project in Mind?</h2>
      <p>Let's embark on a journey to transform your idea into a compelling digital presence.</p>
    </div>
    <div class="cta-wrap margin-t-50  justify-center">
    <div class="cta-btn">
    <div class="btn-sec">
    <a href="https://www.valuecoders.com/contact" class="btn rounded"><span class="text-white"> Talk To Our Experts</span></a>
    </div>
    </div>
    </div>
    <?php } ?>
  </div>
</section>
<footer class="footer">
  <div class="container">
    <div class="dis-flex footer-top">
      <div class="count-sec">
        <div class="count-col">
          <h5>24,859,684+</h5>
          <p>LEADS DRIVEN FOR CLIENTS</p>
        </div>
        <div class="count-col">
          <h5>$6,021,182,299+</h5>
          <p>REVENUE DRIVEN FOR CLIENTS</p>
        </div>
        <div class="count-col">
          <h5>3,212,407</h5>
          <p>HOURS OF EXPERTISE</p>
        </div>
        <div class="count-col">
          <h5>675+</h5>
          <p>EXPERTS ON STAFF</p>
        </div>
      </div>
      <div class="subs-box">
        <ul>
          <li>
            <picture>
              <img loading="lazy" src="<?php bloginfo('template_url') ?>/images/fotaw-01.svg" alt="Valuecoders" width="107" height="60">
            </picture>
          </li>
          <li>
            <picture>
              <img loading="lazy" src="<?php bloginfo('template_url') ?>/images/fotaw-02.svg" alt="Valuecoders" width="107" height="60">
            </picture>
          </li>
          <li>
            <picture>
              <img loading="lazy" src="<?php bloginfo('template_url') ?>/images/fotaw-03.svg" alt="Valuecoders" width="107" height="60">
            </picture>
          </li>
          <li>
            <picture>
              <img loading="lazy" src="<?php bloginfo('template_url') ?>/images/fotaw-04.svg" alt="Valuecoders" width="107" height="60">
            </picture>
          </li>
        </ul>
      </div>
    </div>
    <div class="dis-flex footer-middle">
      <div class="flex-5">
        <h4>Company</h4>
        <ul>
          <li><a href="<?php echo $site_url.'about'; ?>">About Us</a></li>
          <li><a href="<?php echo $site_url.'in-media'; ?>">In Media</a></li>
          <li><a href="https://www.valuecoders.com/case-studies/">Case Studies</a></li>
          <li><a href="https://www.valuecoders.com/blog/">Our Blog</a></li>
          <li><a href="<?php echo $site_url.'testimonials'; ?>">Testimonial & Clients</a></li>
        </ul>
      </div>
      <div class="flex-5">
        <h4>Our Expertise</h4>
        <ul>
          <li><a href="<?php echo $site_url.'outsource-software-product-development-services'; ?>">Software Product Engineering</a></li>
          <li><a href="<?php echo $site_url.'application-development'; ?>">Application Development</a></li>
          <li><a href="<?php echo $site_url.'it-staff-augmentation-services'; ?>">Staff Augmentation</a></li>
          <li><a href="<?php echo $site_url.'ecommerce-development-services'; ?>">eCommerce Development</a></li>
          <li><a href="<?php echo $site_url.'cloud-services'; ?>">Cloud Services</a></li>
          <li><a href="<?php echo $site_url.'ai'; ?>">AI & ML</a></li>
        </ul>
      </div>
      <div class="flex-5">
        <h4>Hire Developers</h4>
        <ul>
          <li><a href="<?php echo $site_url.'hire-developers/hire-ai-engineers'; ?>">Hire AI Engineers</a></li>
          <li><a href="<?php echo $site_url.'hire-developers/hire-backend-developers'; ?>">Hire Backend Developers</a></li>
          <li><a href="<?php echo $site_url.'hire-developers/hire-front-end-developers'; ?>">Hire Frontend Developers</a></li>
          <li><a href="<?php echo $site_url.'hire-developers/hire-ecommerce-developers'; ?>">Hire eCommerce Developers</a></li>
          <li><a href="<?php echo $site_url.'hire-developers/hire-blockchain-developers'; ?>">Hire Blockchain Developers</a></li>
          <li><a href="<?php echo $site_url.'hire-developers/hire-mobile-app-developers'; ?>">Hire Mobile Developers</a></li>          
        </ul>
      </div>
      <div class="flex-5">
        <h4>Solutions</h4>
        <ul>
          <li><a href="<?php echo $site_url.'offshore-software-development-center-india'; ?>">Offshore Development Center</a></li>
          <li><a href="<?php echo $site_url.'offshore-software-development-services-company'; ?>">Offshore Software Development</a></li>
          <li><a href="<?php echo $site_url.'nearshore-software-development-services'; ?>">Nearshore Software Development</a></li>
        </ul>
      </div>
      <div class="flex-5">
        <h4>Clients We Serve</h4>
        <ul>
          <li><a href="<?php echo $site_url.'startup-product-development'; ?>">For Startups</a></li>
          <li><a href="<?php echo $site_url.'enterprise-software-development-services'; ?>">For Enterprises</a></li>
          <li><a href="<?php echo $site_url.'agencies-software-development-services'; ?>">For Agencies</a></li>
        </ul>
      </div>
    </div>
    <div class="dis-flex footer-bottom">
    <div class="flex-4 logo-box">
        <h3>PROUDLY BROUGHT TO YOU BY ValueCoders</h3>
        <div class="dis-flex">
          <a href="https://www.invoicera.com/">
            <picture>
              <img loading="lazy" src="<?php bloginfo('template_url') ?>/images/inv-logo.svg" width="156" height="40" alt="Invoicera">
            </picture>
          </a>
          <a href="https://www.workstatus.io/">
            <picture>
            <img loading="lazy" src="<?php bloginfo('template_url') ?>/images/ws-logo.svg" width="188" height="26" alt="Workstatus"> 
          </picture>
          </a>
        </div>
      </div>
      <div class="flex-4 social-box">
        <h3>Follow Us</h3>
        <div class="dis-flex">
          <a href="https://www.facebook.com/ValueCoders" target="_blank">
            <picture>
              <img loading="lazy" src="<?php bloginfo('template_url') ?>/images/soc-01.svg" width="29" height="29" alt="facebook">
            </picture>
          </a>
          <a href="https://x.com/ValueCoders" target="_blank">
            <picture>
              <img loading="lazy" src="<?php bloginfo('template_url') ?>/images/soc-02.svg" width="29" height="29" alt="twitter">
            </picture>
          </a>
          <a href="https://www.linkedin.com/company/valuecoders" target="_blank">
            <picture>
              <img loading="lazy" src="<?php bloginfo('template_url') ?>/images/soc-03.svg" width="29" height="29" alt="linkedin">
            </picture>
          </a>
          <a href="https://www.instagram.com/valuecodersofficial_/?igshid=qfk286mq0wee" target="_blank">
            <picture>
              <img loading="lazy" src="<?php bloginfo('template_url') ?>/images/soc-04.svg" width="29" height="29" alt="instagram">
            </picture>
          </a>
          <a href="https://www.youtube.com/channel/UCCnijyLczGPUGI8aBkK3pTw?sub_confirmation=1" target="_blank">
            <picture>
              <img loading="lazy" src="<?php bloginfo('template_url') ?>/images/soc-05.svg" width="29" height="29" alt="youtube">
            </picture>
          </a>
        </div>
      </div>
      <div class="flex-4 copyright">
        <a href="//www.dmca.com/Protection/Status.aspx?ID=9f4af2d1-a5c5-4031-903c-b6dfb2c56625" target="_blank" 
        title="DMCA.com Protection Status" style="margin-left:0;margin-top: 20px; display:block" class="dmca-badge">
        <img src ="https://images.dmca.com/Badges/dmca-badge-w200-5x1-06.png?ID=9f4af2d1-a5c5-4031-903c-b6dfb2c56625"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
      </div>
    </div>
  </div>
  <div class="footer-copyright">Copyright © 2004 - 2025 ValueCoders, All Rights Reserved. A Vinove Company.</div>

</footer>
<div class="blogvideo-popup">
  <div id="gen-vpopup" class="popup-wrapper" style="display:none;">
    <div class="popWrap">
      <div class="popup-content">
      <span class="closeicon" onclick="closeGenVideo('gen-vpopup', false)">Close</span>
      <iframe id="gen-video" class="videoIframe js-videoIframe" allowfullscreen="" src="#" allow='autoplay'></iframe>
      </div>
    </div>
  </div>
</div>
<div class="popup-section">
  <div id="intentPopup" class="popup-wrapper exit-intent-popup">
    <div class="popWrap">
      <div class="popup-content">
        <span class="closeicon" onclick="closeIntPopUp('intentPopup', false);">      
        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/cross-image.svg" alt="Valuecoders" width="11" height="11"></span>
        <h2>Stay With Us</h2>
        <h3>Are you looking for the perfect 
          partner for your next software project?
        </h3>
        <p>Let's discuss how we can bring your vision to life.</p>
        <div class="ctasec">
          <a href="https://www.valuecoders.com/contact" class="book-btn">Book a Free Consultation</a>
          <a href="javascript:void(0);" onclick="closeIntPopUp('intentPopup', true);" class="subscribe-btn">Subscribe to our newsletter</a>
        </div>
      </div>
    </div>
  </div>
</div>



<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "LocalBusiness",
  "@id": "ValueCoders",
  "url": "https://www.valuecoders.com/blog",
  "name": "ValueCoders | On-Demand Software Development Company",
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
  "image": "https://www.valuecoders.com/blog/wp-content/uploads/2019/08/logo-2-1.png.webp",
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
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "How to Measure and Improve Digital Marketing ROI",
  "description": "Measuring the profitability of digital marketing campaigns is necessary for any business’s success. Here, you will learn how to calculate the ROI accurately to assess and improve the effectiveness of digital marketing campaigns.",
  "image": "https://www.valuecoders.com/blog/wp-content/uploads/2025/01/HoDigital-Marketing-ROI_-432x225.webp",
  "author": {
    "@type": "Person",
    "name": "Author Name",
    "url": "https://www.valuecoders.com/blog/author/alan-cooper/"
  },
  "publisher": {
    "@type": "Organization",
    "name": "ValueCoders",
    "logo": {
      "@type": "ImageObject",
      "url": "https://www.valuecoders.com/blog/wp-content/uploads/2019/08/logo-2-1.png.webp"
    }
  },
  "url": "https://www.valuecoders.com/blog/analytics/how-to-boost-digital-marketing-roi/",
  "datePublished": "2025-01-14",
  "dateModified": "2025-01-14"
}
</script>



<?php wp_footer(); ?>
</body>
</html>