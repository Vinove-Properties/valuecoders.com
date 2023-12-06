<?php
/*
Template Name: Disclaimer Page Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="small-banner-section for-disclaimer-banner">
    <div class="container text-center">
        <h1>Legal Disclaimer</h1>
    </div>
</section>
<section class="disclaimer-section padding-t-150 padding-b-150 bg-light-theme">
    <div class="container">
        <h2>Legal Disclaimer for ValueCoders</h2>
        <ul>
            <li>All the knowledge presented on the website including images, text, website layout and design, company logo, trademarks, articles, reviews, photographs, pictures is protected by copyright and other intellectual property laws.</li>
            <li>Anyone visiting ValueCoders' website is not allowed to transfer, modify, share, publish, transmit, sell, reproduce the content available on the website. When accessing ValueCoders, you obey to adhere the copyright and all the restrictions related to the website.</li>
            <li>Anyone found accountable will have to face the prosecution under the intellectual property laws.</li>
        </ul>
    </div>
</section>
<?php get_footer(); ?>