<?php require_once 'common/inc/config.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hire PHP Developers | Dedicated PHP developers / Programmers India - @ValueCoders</title>
    <meta name="description"
      content="Want to hire PHP developers for your web development project? Hire PHP programmers / developers from us & build scalable & secure web apps. 17+ Yrs | 4200+ projects | Strict NDAs | dedicated PHP Programmers." />
    <meta name="keywords"
      content="Hire PHP developers, Hire PHP programmers, Hire PHP developers India, Hire PHP programmers India, Offshore PHP developers, Offshore PHP programmers, Offshore PHP developers India, Offshore PHP programmers India, Dedicated PHP developers, dedicated PHP Programmers" />
    <meta property="og:title"
      content="Hire PHP Developers | Dedicated PHP developers / Programmers India - @ValueCoders" />
    <?php require_once 'include/header-files.php'; ?>
    <link rel="preload stylesheet" type="text/css" href="css/menu-v3.12.min.css" defer />
  </head>
  <body>
    <?php 
    require_once 'version-2.0/include/menu-v3.12.php'; // For Blog & Case Studies
    //require_once '../include/menu-v3.12inner.php'; // for Inner pages
    ?>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php require_once 'include/footer.php'; ?>
    <script>
      let hasHomeaslder = document.getElementById("footer-client-slider");
      if (hasHomeaslder) {
          window.addEventListener("load", function() {
              document.querySelector(".footer-client-slider .glider").addEventListener("glider-slide-visible",
                  function(event) {
                      var glider = Glider(this);
                  });
              document.querySelector(".footer-client-slider .glider").addEventListener("glider-slide-hidden",
                  function(event) {});
              document.querySelector(".footer-client-slider .glider").addEventListener("glider-refresh", function(
                  event) {});
              document.querySelector(".footer-client-slider .glider").addEventListener("glider-loaded", function(
                  event) {});
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