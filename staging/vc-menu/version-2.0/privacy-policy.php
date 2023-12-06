<?php require_once '../common/inc/config.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Privacy Policy - @ValueCoders</title>
    <meta name="description" content="We respect your business, the importance of confidentiality, and data security. Visit us to view our Privacy Policy." />
    <meta name="keywords" content/>
    <meta property="og:title" content="Privacy Policy - @ValueCoders" />
    <?php require_once '../include/header-files.php'; ?>
    <link rel="preload stylesheet" type="text/css" href="<?=HOST_URL?>css/policy-disclaimer.min-2.0.css" defer/>
  </head>
  <body id="themeAdd">
    <?//php require_once '../include/menu.php'; ?>
    <section class="small-banner-section for-privacy-banner">
      <div class="container text-center">
        <h1>Privacy Policy</h1>
      </div>
    </section>
    <section class="privacy-policy-section padding-b-150">
      <div class="container">
        <div class="policy-outer">
          <h2>Privacy Policy for ValueCoders</h2>
          <ul>
            <li>ValueCoders will only help you with your project goals. The copyrights and artworks related to your project will remain your properties.</li>
            <li>ValueCoders will not re-use any of your artworks. They will neither be re-sold or used for any other sites.</li>
            <li>ValueCoders assures that all the shared information remains confidential. This includes original artwork, contacts, notes etc. </li>
            <li>Your Privacy will be protected by ValueCoders in all the interactions with us. The client email addresses are kept confidential and not shared with any other third parties. ValueCoders sends e-mailers to only those clients who wish to receive them.</li>
            <li>ValueCoders sends out regular Newletters for updates and events. Every order placed is followed by an e-mailer with the details of the order.</li>
            <li>You can choose the Unsubcribe link from our e-mailer to stop receiving more e-mail communication from us.</li>
          </ul>
        </div>
        <div class="policy-outer">
          <h2>ValueCoders data security</h2>
          <ul>
            <li>The information that ValueCoders collects online is completely safe. ValueCoders has put in place proper checks to prevent unauthorized access to data, maintain its accuracy and ensure its correct use. Processes at all levels have been put in place to secure the information collected online.</li>
            <li>ValueCoders does not sell, share or rent any personal or financial information. It is ensured that your purchase online on ValueCoders is completely safe. For a purchase made through PayPal, you can refer to the PayPal Privacy Policy.</li>
          </ul>
        </div>
        <div class="policy-outer">
          <h2>Information collected</h2>
          <ul>
            <li>Every product order/product request requires the ValueCoders client to submit some personal information like e-mail address, information related to the order including source files, and client notes. This information is only used to complete the order.</li>
            <li>This information is not disclosed to any third parties. ValueCoders uses the e-mail address provided by the client to notify about the status of the order. The e-mail address is kept completely confidential and not used for any other purpose.</li>
            <li>We use secure aggregate information to improve the design of our website.</li>
            <li>The individuals who visit a part of the website remain undisclosed to our designers when they are briefed about re-designing the website. Personal information shared with ValueCoders is not used in ways other than described above. Please do complete the contact form for any further queries that you may have.</h4>
          </ul>
        </div>
      </div>
    </section>
    <section class="contact-us-section padding-b-150">
      <?php require_once 'include/contact-form.php'; ?>
    </section>
    <?php require_once '../include/footer.php'; ?>
    <script>
      let hasHomeaslder = document.getElementById("footer-client-slider");
      if( hasHomeaslder ){
      window.addEventListener("load", function () {
      	document.querySelector(".footer-client-slider .glider").addEventListener("glider-slide-visible", function (event) {
      		var glider = Glider(this);
      	});
      	document.querySelector(".footer-client-slider .glider").addEventListener("glider-slide-hidden", function (event) {});
      	document.querySelector(".footer-client-slider .glider").addEventListener("glider-refresh", function (event) {});
      	document.querySelector(".footer-client-slider .glider").addEventListener("glider-loaded", function (event) {});
      	window._ = new Glider(document.querySelector(".footer-client-slider .glider"), {
      		slidesToShow: 1,
      		slidesToScroll: 1,
      		draggable: true,
      		scrollLock: false,
      		dots: ".contact-us-section .dots",
      		dragDistance: false,
      	});
      
      });    
      }
      
    </script>
  </body>
</html>