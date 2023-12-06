<?php 
require('stripe/init.php');
$pkey="pk_test_51L7tygSDijDNdgCaOjiJN2Udr8Gsjp6cn5vojFDcWcEmJGTZKeyKfhZKuXvV5rNLdjilZpl0nACcCaTNfm8pwJmt00d3YszbXh";
$skey = "sk_test_51L7tygSDijDNdgCaDy7c6SikTcLagl3P3yX7V0tNz9YlT2t9tiOU0drk0AEdlGWGt9lwDF6Un6rDTJptwdUvgJQy00I5hAm8bm";

\Stripe\Stripe::setApiKey($skey);
?>