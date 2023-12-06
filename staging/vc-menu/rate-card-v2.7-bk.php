<?php 
require_once 'common/inc/config.inc.php'; 
//require('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rate Card - @ValueCoders</title>
    <meta name="description"
    content="Need to augment the software talent pool of your team? Why not hire from India’s Leading IT Staff Augmentation Company with 17+ Years of Experience, 650+ Experts" />
    <meta name="keywords"
    content="Staff Augmentation, Staff Augmentation Services, Staff Augmentation Companies, Staff Augmentation Consulting" />
    <meta property="og:title" content="Rate Card - @ValueCoders" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php require_once 'include/header-files.php'; ?>
     <!-- Stripe JavaScript library -->
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="preload stylesheet" type="text/css" href="<?=HOST_URL?>css/rate-card.min.css" defer />
	<style>
	.ws-error input{border-color:red !important;}
	.ws-error textarea{border-color:red !important;}
	</style>
</head>
<style>
</style>

<body id="themeAdd" class="for-rate-card ">
<?php
 $var = 	$_REQUEST['orderFormData'];
 $va = json_decode($var, true);
 echo "<pre>";print_r($va);echo "</pre>";
    ?>
    <section class="rate-card-section tab-header">
        <div class="container-fluid">
            <div class="content-container " id="rate-card-sec">
                <aside class="content-sidebar">
                    <nav class="content-navigation">
                        <div class="vtabs">
                            <ul class="tabsli">
                                <li>
                                    <a href="#home" class="visible">
                                       <div class="active-line"> Home </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#about">
                                      <div class="active-line">  About</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#talent">
                                      <div class="active-line">  Talent Solutions</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#expect">
                                      <div class="active-line">  What To Expect</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#process">
                                      <div class="active-line">  Process</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#skill">
                                      <div class="active-line">  Skill Set</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#rate">
                                      <div class="active-line">  Rate Card</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#add">
                                      <div class="active-line">  Add Ons</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#ValueCoders">
                                      <div class="active-line">  ValueCoders vs Others</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#faq">
                                      <div class="active-line">  FAQ’s</div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#get-in-touch">
                                      <div class="active-line">  Get in Touch</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#order">
                                       <div class="active-line"> Order Now <span>New</span> </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </aside>
                <article class="content">
                    <section class="tab-content" id="home">
                        <div class="heading-container">
                            <span>Talent Solutions</span>
                            <h1 class="heading">RATE CARD</h1>
                        </div>
                    </section>
                    <section class="tab-content" id="about">
                        <h2>Who is <span>ValueCoders?</span></h2>
                        <p>ValueCoders is a reputed IT company based in India with an impressive track record of
                            success. Since our inception in
                            2004, we have been delivering IT outsourcing services worldwide. We combine business domain
                            knowledge, proven methodologies, and technology expertise of 650+ skilled software
                            professionals to yield high-quality solutions that add value to businesses.</p>
                        <p>At ValueCoders, we embrace a well-established set of cultural and professional values which
                            represent our highest aspirations for how we engage as colleagues, fellows, alumni,
                            partners, and board members.</p>
                        <div class="card-container">
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?=HOST_URL?>images/rate-about-icon1.webp">
                                        <source type="image/png" srcset="<?=HOST_URL?>images/rate-about-icon1.png">
                                        <img loading="lazy" src="<?=HOST_URL?>images/rate-about-icon1.svg"
                                            alt="Valuecoders">
                                    </picture>
                                </div>
                                <div class="card-text">
                                    <h3>4,200+</h3>
                                    <p>Customer Retention</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?=HOST_URL?>images/rate-about-icon2.webp">
                                        <source type="image/png" srcset="<?=HOST_URL?>images/rate-about-icon2.png">
                                        <img loading="lazy" src="<?=HOST_URL?>images/rate-about-icon2.svg"
                                            alt="Valuecoders">
                                    </picture>
                                </div>
                                <div class="card-text">
                                    <h3>2,000+</h3>
                                    <p>Man Years Experience</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?=HOST_URL?>images/rate-about-icon3.webp">
                                        <source type="image/png" srcset="<?=HOST_URL?>images/rate-about-icon3.png">
                                        <img loading="lazy" src="<?=HOST_URL?>images/rate-about-icon3.svg"
                                            alt="Valuecoders">
                                    </picture>
                                </div>
                                <div class="card-text">
                                    <h3>2,500+</h3>
                                    <p>Happy Customers</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?=HOST_URL?>images/rate-about-icon4.webp">
                                        <source type="image/png" srcset="<?=HOST_URL?>images/rate-about-icon4.png">
                                        <img loading="lazy" src="<?=HOST_URL?>images/rate-about-icon4.svg"
                                            alt="Valuecoders">
                                    </picture>
                                </div>
                                <div class="card-text">
                                    <h3>17+</h3>
                                    <p>Years in Business</p>
                                </div>
                            </div>
                        </div>


                    </section>
                    <section class="tab-content" id="talent">
                        <h2>Our Talent Solutions</h2>
                        <p>ValueCoders is a reputed IT company based in India with an impressive track record of
                            success. Since our inception in 2004, we have been delivering IT outsourcing services
                            worldwide. We combine business domain knowledge, proven methodologies, and technology
                            expertise of 650+ skilled software professionals to yield high-quality solutions that add
                            value to businesses.</p>
                        <div class="card-container">
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?=HOST_URL?>images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?=HOST_URL?>images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?=HOST_URL?>images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>
                                </div>
                                <div class="card-text">
                                    <h3>Pre-vetted Talent</h3>
                                    <p>At ValueCoders, you can choose from a large pool of qualified and experienced
                                        talents curated after a stringent vetting process.</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?=HOST_URL?>images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?=HOST_URL?>images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?=HOST_URL?>images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Quick Hiring </h3>
                                    <p>You can start interviewing within just two days of sharing your requirements and
                                        onboarding takes place in not more than two weeks.</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?=HOST_URL?>images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?=HOST_URL?>images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?=HOST_URL?>images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Right Match of Talent</h3>
                                    <p>Our process makes sure that you get only the best-fit talent. Our first interview
                                        to selection ratio is around 93%</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?=HOST_URL?>images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?=HOST_URL?>images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?=HOST_URL?>images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Economical Pricing</h3>
                                    <p>With ValueCoders, you save up to 50% on salaries of resources as compared to your
                                        local talent without compromising on the quality.</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?=HOST_URL?>images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?=HOST_URL?>images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?=HOST_URL?>images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Timezone Compatibility</h3>
                                    <p>Our resources work in your timezone or at least with the overlap of 4 hours in
                                        order to ensure that all the deliveries are on time.</p>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?=HOST_URL?>images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?=HOST_URL?>images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?=HOST_URL?>images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Remote Onboarding & Support</h3>
                                    <p>We take care of all the onboarding formalities like IT & admin support, Payroll
                                        management, etc to make sure that your resource is ready to start working from
                                        the first day.</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?=HOST_URL?>images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?=HOST_URL?>images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?=HOST_URL?>images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Simple Contracts</h3>
                                    <p>With simple, monthly payout, you get complete peace of mind without worrying
                                        about any compliance or legal aspects.</p>
                                </div>
                            </div>
                        </div>


                    </section>
                    <section class="tab-content" id="expect">
                        <h2>What To Expect From Resources?</h2>
                        <p>Our strict vetting process ensures that you get only the best talent in India. Here are some
                            qualities that you can expect from the hired resource:</p>

                        <picture class="darker-theme">
                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-expect-dark.webp">
                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-expect-dark.png">
                            <img loading="lazy" src="<?=HOST_URL?>images/rate-expect-dark.png"
                                alt="Expect From Resources">
                        </picture>
                        <picture class="lighter-theme">
                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-expect.webp">
                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-expect.png">
                            <img loading="lazy" src="<?=HOST_URL?>images/rate-expect.png" alt="Expect From Resources">
                        </picture>


                    </section>

                    <section class="tab-content" id="process">
                        <h2>Hiring Process</h2>
                        <p>We believe in 100% transparency and customer delight. You may choose to screen the candidates
                            or take a no obligation 2-week trial before hiring developers with us. </p>
                        <div class="step-icon-img-section">
                            <div class="head-txt">
                                <div class="dis-flex col-box-outer margin-t-100 hiring-step-sprite">
                                    <div class="flex-4 icon-box">
                                        <div class="icon-img">
                                            <picture class="dark-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon1.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon1.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-process-icon1.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon1.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon1.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-process-icon1.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                        </div>
                                        <h3>Inquiry</h3>
                                        <p>We get on a call to understand your requirements and evaluate mutual fitment.
                                        </p>
                                    </div>
                                    <div class="flex-4 icon-box">
                                        <div class="icon-img">
                                            <picture class="dark-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon2-light.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon2-light.png">
                                                <img loading="lazy"
                                                    src="<?=HOST_URL?>images/rate-process-icon2-light.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon2.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon2.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-process-icon2.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                        </div>
                                        <h3>Align engineer(s)</h3>
                                        <p>We align engineer(s) and initiate the development process.</p>
                                    </div>
                                    <div class="flex-4 icon-box">
                                        <div class="icon-img">
                                            <picture class="dark-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon3-light.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon3-light.png">
                                                <img loading="lazy"
                                                    src="<?=HOST_URL?>images/rate-process-icon3-light.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon3.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon3.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-process-icon3.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                        </div>
                                        <h3>Trial Phase</h3>
                                        <p>The engineer(s) work on your project and we seek ongoing feedback.</p>
                                    </div>
                                    <div class="flex-4 icon-box final-step">
                                        <div class="icon-img">
                                            <picture class="dark-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon4-light.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon4-light.png">
                                                <img loading="lazy"
                                                    src="<?=HOST_URL?>images/rate-process-icon4-light.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon4.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon4.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-process-icon4.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                        </div>
                                        <h3>Add engineer(s) to your team</h3>
                                        <p>Based on the trial phase, you add the engineer(s) to your team.</p>
                                    </div>
                                </div>
                                <picture class="dark-theme-img process-img">
                                    <source type="image/webp" srcset="<?=HOST_URL?>images/our-hiring-process-img2.webp">
                                    <source type="image/png" srcset="<?=HOST_URL?>images/our-hiring-process-img2.png">
                                    <img loading="lazy" src="<?=HOST_URL?>images/our-hiring-process-img2.png"
                                        alt="Valuecoders" width="1620" height="315">
                                </picture>
                                <picture class="lighter-theme-img process-img">
                                    <source type="image/webp"
                                        srcset="<?=HOST_URL?>images/our-hiring-process-img-for-lighter2.webp">
                                    <source type="image/png"
                                        srcset="<?=HOST_URL?>images/our-hiring-process-img-for-lighter2.png">
                                    <img loading="lazy"
                                        src="<?=HOST_URL?>images/our-hiring-process-img-for-lighter2.png"
                                        alt="Valuecoders" width="1620" height="315">
                                </picture>
                                <!-- <picture class="lighter-theme">
                                    <source type="image/webp"
                                        srcset="<?=HOST_URL?>images/our-hiring-process-img-for-lighter.webp">
                                    <source type="image/png"
                                        srcset="<?=HOST_URL?>images/our-hiring-process-img-for-lighter.png">
                                    <img loading="lazy" src="<?=HOST_URL?>images/our-hiring-process-img-for-lighter.png"
                                        alt="Valuecoders" width="1620" height="315">
                                </picture> -->
                                <div class="dis-flex justify-center hiring-step-sprite">
                                    <div class="flex-4 icon-box text-center not-step">
                                        <div class="icon-img">
                                            <picture class="dark-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon5-light.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon5-light.png">
                                                <img loading="lazy"
                                                    src="<?=HOST_URL?>images/rate-process-icon5-light.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon5.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-process-icon5.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-process-icon5.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                        </div>
                                        <h3>Not Satisfied</h3>
                                        <p>If you are not satisfied with the engineer, we are happy to understand the
                                            gap(s) and replace the engineer(s).)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="tab-content" id="skill">
                        <h2>Skill Set</h2>
                        <p>We work with various technologies and platforms to lend flexibility to your software
                            development and outsourcing needs.</p>
                        <div class="card-container">
                            <div class="card">
                                <h3>Backend</h3>
                                <div class="icon-container">
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-net-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-net-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-net-dark.svg"
                                                alt=".NET">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-net.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-net.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-net.svg" alt=".NET">
                                        </picture>
                                        <h4>.NET</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-java-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-java-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-java-dark.svg"
                                                alt="java">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-java.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-java.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-java.svg" alt="java">
                                        </picture>
                                        <!-- <img src="images/rate-skill-java.svg" alt="Java" /> -->
                                        <h4>Java</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-php-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-php-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-php-dark.svg"
                                                alt="php">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-php.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-php.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-php.svg" alt="php">
                                        </picture>
                                        <!-- <img src="images/rate-skill-php.svg" alt="PHP" /> -->
                                        <h4>PHP</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-larvel-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-larvel-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-larvel-dark.svg"
                                                alt="larvel">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-larvel.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-larvel.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-larvel.svg" alt="larvel">
                                        </picture>
                                        <!-- <img src="images/rate-skill-larvel.svg" alt="Laravel" /> -->
                                        <h4>Laravel</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-python-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-python-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-python-dark.svg"
                                                alt="python">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-python.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-python.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-python.svg" alt="python">
                                        </picture>
                                        <!-- <img src="images/rate-skill-python.svg" alt="Python" /> -->
                                        <h4>Python</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-node-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-node-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-node-dark.svg"
                                                alt="node">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-node.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-node.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-node.svg" alt="node">
                                        </picture>
                                        <!-- <img src="images/rate-skill-node.svg" alt="Node.Js" /> -->
                                        <h4>Node.Js</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <h3>Frontend & Full Stack</h3>
                                <div class="icon-container">
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-angular-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-angular-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-angular-dark.svg"
                                                alt="angular">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-angular.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-angular.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-angular.svg" alt="angular">
                                        </picture>
                                        <!-- <img src="images/rate-skill-angular.svg" alt="Angular" /> -->
                                        <h4>Angular</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-vue-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-vue-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-vue-dark.svg"
                                                alt="vue">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-vue.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-vue.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-vue.svg" alt=".NET">
                                        </picture>
                                        <!-- <img src="images/rate-skill-vue.svg" alt="vue" /> -->
                                        <h4>Vue</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-devops-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-devops-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-devops-dark.svg"
                                                alt="devops">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-devops.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-devops.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-devops.svg" alt="devops">
                                        </picture>
                                        <!-- <img src="images/rate-skill-devops.svg" alt="Devops" /> -->
                                        <h4>Devops</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-react-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-react-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-react-dark.svg"
                                                alt="react">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-react.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-react.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-react.svg" alt="react">
                                        </picture>
                                        <!-- <img src="images/rate-skill-react.svg" alt="react" /> -->
                                        <h4>React</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-mean-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-mean-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-mean-dark.svg"
                                                alt="mean">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-mean.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-mean.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-mean.svg" alt="mean">
                                        </picture>
                                        <!-- <img src="images/rate-skill-mean.svg" alt="Mean" /> -->
                                        <h4>Mean</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-mern-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-mern-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-mern-dark.svg"
                                                alt="mern">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-mern.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-mern.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-mern.svg" alt="mern">
                                        </picture>
                                        <!-- <img src="images/rate-skill-mern.svg" alt="Mern" /> -->
                                        <h4>Mern</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <h3>Mobility</h3>
                                <div class="icon-container">
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-andriod-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-andriod-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-andriod-dark.svg"
                                                alt="andriod">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-andriod.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-andriod.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-andriod.svg" alt="andriod">
                                        </picture>
                                        <!-- <img src="images/rate-skill-andriod.svg" alt="andriod" /> -->
                                        <h4>Andriod</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-apple-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-apple-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-apple-dark.svg"
                                                alt="apple">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-apple.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-apple.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-apple.svg" alt="apple">
                                        </picture>
                                        <!-- <img src="images/rate-skill-apple.svg" alt="IOS" /> -->
                                        <h4>IOS</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-xamarine-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-xamarine-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-xamarine-dark.svg"
                                                alt="xamarine">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-xamarine.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-xamarine.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-xamarine.svg" alt="xamarine">
                                        </picture>
                                        <!-- <img src="images/rate-skill-xamarine.svg" alt="Xamarin" /> -->
                                        <h4>Xamarin</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-react-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-react-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-react-dark.svg"
                                                alt="React Native">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-react.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-react.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-react.svg" alt="React Native">
                                        </picture>
                                        <!-- <img src="images/rate-skill-react.svg" alt="React" /> -->
                                        <h4>React Native</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-ionic-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-ionic-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-ionic-dark.svg"
                                                alt="ionic">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-ionic.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-ionic.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-ionic.svg" alt="ionic">
                                        </picture>
                                        <!-- <img src="images/rate-skill-ionic.svg" alt="Ionic" /> -->
                                        <h4>Ionic</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-flutter-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-flutter-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-flutter-dark.svg"
                                                alt="flutter">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-flutter.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-flutter.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-flutter.svg" alt="flutter">
                                        </picture>
                                        <!-- <img src="images/rate-skill-flutter.svg" alt="Flutter" /> -->
                                        <h4>Flutter</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <h3>eCommerce & CMS</h3>
                                <div class="icon-container">
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-magento-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-magento-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-magento-dark.svg"
                                                alt="magento">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-magento.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-magento.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-magento.svg" alt="magento">
                                        </picture>
                                        <!-- <img src="images/rate-skill-magento.svg" alt="Magento" /> -->
                                        <h4>Magento</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-drupal-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-drupal-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-drupal-dark.svg"
                                                alt="drupal">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-drupal.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-drupal.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-drupal.svg" alt="drupal">
                                        </picture>
                                        <!-- <img src="images/rate-skill-drupal.svg" alt="Drupal" /> -->
                                        <h4>Drupal</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-sitecore-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-sitecore-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-sitecore-dark.svg"
                                                alt="sitecore">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-sitecore.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-sitecore.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-sitecore.svg" alt="sitecore">
                                        </picture>
                                        <!-- <img src="images/rate-skill-sitecore.svg" alt="Sitecore" /> -->
                                        <h4>Sitecore</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-sitefinity-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-sitefinity-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-sitefinity-dark.svg"
                                                alt="sitefinity">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-sitefinity.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-sitefinity.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-sitefinity.svg" alt="sitefinity">
                                        </picture>
                                        <!-- <img src="images/rate-skill-sitefinity.svg" alt="Sitefinity" /> -->
                                        <h4>Sitefinity</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-umbraco-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-umbraco-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-umbraco-dark.svg"
                                                alt="umbraco">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-umbraco.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-umbraco.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-umbraco.svg" alt="umbraco">
                                        </picture>
                                        <!-- <img src="images/rate-skill-umbraco.svg" alt="Umbraco" /> -->
                                        <h4>Umbraco</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-wordpress-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-wordpress-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-wordpress-dark.svg"
                                                alt="wordpress">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-wordpress.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-wordpress.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-wordpress.svg" alt="wordpress">
                                        </picture>
                                        <!-- <img src="images/rate-skill-wordpress.svg" alt="Wordpress" /> -->
                                        <h4>Wordpress</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <h3>Machine Learning</h3>
                                <div class="icon-container">
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-chatBot-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-chatBot-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-chatBot-dark.svg"
                                                alt="chatBot">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-chatBot.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-chatBot.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-chatBot.svg" alt="chatBot">
                                        </picture>
                                        <!-- <img src="images/rate-skill-chatBot.svg" alt="ChatBot" /> -->
                                        <h4>ChatBot</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-AL-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-AL-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-AL-dark.svg"
                                                alt="AL">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-AL.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-AL.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-AL.svg" alt="AL">
                                        </picture>
                                        <!-- <img src="images/rate-skill-AL.svg" alt="JaAI / MLva" /> -->
                                        <h4>AI / ML</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-tenseflow-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-tenseflow-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-tenseflow-dark.svg"
                                                alt="tenseflow">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-tenseflow.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-tenseflow.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-tenseflow.svg" alt="tenseflow">
                                        </picture>
                                        <!-- <img src="images/rate-skill-tenseflow .svg" alt="Tensorflow" /> -->
                                        <h4>Tensorflow</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <h3>Blockchain</h3>
                                <div class="icon-container">
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-etherum-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-etherum-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-etherum-dark.svg"
                                                alt="etherum">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-etherum.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-etherum.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-etherum.svg" alt="etherum">
                                        </picture>
                                        <!-- <img src="images/rate-skill-etherum.svg" alt="Ethereum" /> -->
                                        <h4>Ethereum</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-hyperledger-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-hyperledger-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-hyperledger-dark.svg"
                                                alt="hyperledger">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-hyperledger.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-hyperledger.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-hyperledger.svg" alt="hyperledger">
                                        </picture>
                                        <!-- <img src="images/rate-skill-hyperledger.svg" alt="Hyperledger" /> -->
                                        <h4>Hyperledger</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?=HOST_URL?>images/rate-skill-smart-dark.webp">
                                            <source type="image/png"
                                                srcset="<?=HOST_URL?>images/rate-skill-smart-dark.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-smart-dark.svg"
                                                alt="smart">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?=HOST_URL?>images/rate-skill-smart.webp">
                                            <source type="image/png" srcset="<?=HOST_URL?>images/rate-skill-smart.png">
                                            <img loading="lazy" src="<?=HOST_URL?>images/rate-skill-smart.svg" alt="smart">
                                        </picture>
                                        <!-- <img src="images/rate-skill-smart.svg" alt="Smart Contract" /> -->
                                        <h4>Smart Contract</h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </section>
                    <section class="tab-content rate-sample-profile-section" id="rate">
                        <div class="rate-container">
                            <h3>For Hourly</h3>
                            <div class="dis-flex sample-block-outer">
                                <div class="flex-4">
                                    <div class="sample-block">
                                        <h4>For 40 Hours</h4>
                                        <h5>from <strong>$30/ hr</strong></h5>
                                        <h6>*Validity 30 days</h6>
                                    </div>
                                </div>
                                <div class="flex-4">
                                    <div class="sample-block">
                                        <h4>For 80 Hours</h4>
                                        <h5>from <strong>$27/ hr</strong></h5>
                                        <h6>*Validity 90 days</h6>
                                    </div>
                                </div>
                                <div class="flex-4">
                                    <div class="sample-block">
                                        <h4>For 120 Hours</h4>
                                        <h5>from <strong>$25/ hr</strong></h5>
                                        <h6>*Validity 120 days</h6>
                                    </div>
                                </div>
                            </div>

                            <h3>For Dedicated Developer</h3>
                            <div class="dis-flex sample-block-outer">
                                <div class="flex-4">
                                    <div class="sample-block">
                                        <h4>Junior Level</h4>
                                        <h5>from <strong>$2200/ mo</strong></h5>
                                        <h6>1-3 years Experienced</h6>
                                    </div>
                                </div>
                                <div class="flex-4">
                                    <div class="sample-block">
                                        <h4>For 80 Hours</h4>
                                        <h5>from <strong>$2800/ mo</strong></h5>
                                        <h6>4-5 years Experienced</h6>
                                    </div>
                                </div>
                                <div class="flex-4">
                                    <div class="sample-block">
                                        <h4>For 120 Hours</h4>
                                        <h5>from <strong>$3600/ mo</strong></h5>
                                        <h6>5-7 years Experienced</h6>
                                    </div>
                                </div>
                                <div class="flex-4">
                                    <div class="sample-block">
                                        <h4>For 120 Hours</h4>
                                        <h5>from <strong>$4500/ mo</strong></h5>
                                        <h6>8+ years Experienced</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="tab-content" id="add">
                        <div class="faq-section">
                            <h2>Add Ons</h2>

                            <div class="faq-outer" itemscope itemtype="https://schema.org/FAQPage">
                                <div class="faq-accordion-item-outer active" itemscope itemprop="mainEntity"
                                    itemtype="https://schema.org/Question">
                                    <h3 class="faq-accordion-toggle">Timezone</h3>
                                    <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                        itemtype="https://schema.org/Answer">
                                        <div class="dis-flex justify-sb ">
                                            <p>AU / US Partial Shift (4 hours overlap with local timezone)</p>
                                            <p>5% extra</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>AU / US Full Shift (100% working in local timezone)</p>
                                            <p>10% extra</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>IST Full Shift (100% working in local timezone)</p>
                                            <p>No additional cost</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                    itemtype="https://schema.org/Question">
                                    <h3 class="faq-accordion-toggle">Team Discount</h3>
                                    <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                        itemtype="https://schema.org/Answer">
                                        <div class="dis-flex justify-sb ">
                                            <p>AU / US Partial Shift (4 hours overlap with local timezone)</p>
                                            <p>5% extra</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>AU / US Full Shift (100% working in local timezone)</p>
                                            <p>10% extra</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>IST Full Shift (100% working in local timezone)</p>
                                            <p>No additional cost</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                    itemtype="https://schema.org/Question">
                                    <h3 class="faq-accordion-toggle">Advance Payment Discount</h3>
                                    <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                        itemtype="https://schema.org/Answer">
                                        <div class="dis-flex justify-sb ">
                                            <p>AU / US Partial Shift (4 hours overlap with local timezone)</p>
                                            <p>5% extra</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>AU / US Full Shift (100% working in local timezone)</p>
                                            <p>10% extra</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>IST Full Shift (100% working in local timezone)</p>
                                            <p>No additional cost</p>
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>

                    </section>
                    <section class="tab-content" id="ValueCoders">
                        <h2>ValueCoders vs Others</h2>
                        <p>There are three primary ways of developing software. One option is to hire full-time
                            employees to perform the work. A second option is to hire freelancers or contract workers
                            through websites like Toptal & Upwork. A third option is to outsource work to a reputed firm
                            like ValueCoders.</p>
                        <div class="three-column-logo-box-section">
                            <div class="dis-flex col-box-outer">
                                <div class="flex-3">
                                    <div class="list-box-outer">
                                        <div class="head-box clr-white">

                                            <picture class="dark-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-logo-vc.webp">
                                                <source type="image/png" srcset="<?=HOST_URL?>images/rate-logo-vc.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-logo-vc.png"
                                                    alt="Valuecoders" width="239" height="41">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-logo-vc-light.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-logo-vc-light.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-logo-vc-light.png"
                                                    alt="Valuecoders" width="239" height="41">
                                            </picture>
                                        </div>
                                        <div class="list-box">
                                            <ul>
                                                <li>ValueCoders is an award-winning Indian software engineering company
                                                    focused on providing outsourced software development and software
                                                    engineering teams.</li>
                                                <li>With a 97%+ customer satisfaction rate, we are recognized as one of
                                                    the top software outsourcing companies in India. </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-3">
                                    <div class="list-box-outer">
                                        <div class="head-box clr-white bg-voilet">

                                            <picture class="dark-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-toptal-logo.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-toptal-logo.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-toptal-logo.png"
                                                    alt="Valuecoders" width="132" height="41">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-toptal-logo-light.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-toptal-logo-light.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-toptal-logo-light.png"
                                                    alt="Valuecoders" width="132" height="41">
                                            </picture>
                                        </div>
                                        <div class="list-box">
                                            <ul>
                                                <li>Toptal is a platform for hiring freelancers. It was initially a
                                                    dedicated software developers marketplace. Currently, it serves
                                                    multiple niches, from design to financial services. </li>
                                                <li>Toptal sells itself as “an exclusive network of the top freelance
                                                    software developers, designers, finance experts, product managers,
                                                    and project managers.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-3">
                                    <div class="list-box-outer">
                                        <div class="head-box clr-white bg-voilet">
                                            <picture class="dark-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-upwork-logo.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-upwork-logo.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-upwork-logo.png"
                                                    alt="Valuecoders" width="141" height="43">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?=HOST_URL?>images/rate-upwork-logo-light.webp">
                                                <source type="image/png"
                                                    srcset="<?=HOST_URL?>images/rate-upwork-logo-light.png">
                                                <img loading="lazy" src="<?=HOST_URL?>images/rate-upwork-logo-light.png"
                                                    alt="Valuecoders" width="141" height="43">
                                            </picture>
                                        </div>
                                        <div class="list-box">
                                            <ul>
                                                <li>Upwork is a freelancing platform that connects a person with a
                                                    corporate problem, and the freelancers with a solution to that
                                                    problem.</li>
                                                <li> Besides posting your job offer, you can buy predefined projects
                                                    posted by service providers.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                    <section class="tab-content" id="faq">
                        <div class="faq-section">
                            <h2>Frequently Asked Questions</h2>
                            <div class="dis-flex">

                                <div class="faq-outer flex-2" itemscope itemtype="https://schema.org/FAQPage">
                                    <div class="faq-accordion-item-outer " itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How do you compare with freelance platforms
                                            like Upwork and other Indian software outsourcing companies</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Unlike most other companies, we take responsibility for our talent. We
                                                pre-vet the talent and employ all our team 100% full time. There are
                                                ongoing training programmes and multiple internal teams e.g. HR,
                                                accounting, admin, legal to ensure the entire process is encapsulated as
                                                a managed “IT outsourcing” experience for you. Much like cloud hosting,
                                                we intend to offer Talent as a Service (TaaS) without you having to
                                                worry about the under-lying hiring, vetting and day to day management
                                                processes.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How does the process work?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How would I track productivity?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How do you communicate?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer " itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">Do you offer project based quotes?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How experienced is your team?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How can I renew?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">Can I talk to the developer(s) directly?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">What if I need more than 160 hours?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="faq-outer flex-2" itemscope itemtype="https://schema.org/FAQPage">
                                    <div class="faq-accordion-item-outer " itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">Do you offer skills such as testing/quality
                                            assurance, UI/UX designing, business analysis also?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">What if I am not satisfied with the work done?
                                        </h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">What is your refund (money back guarantee)
                                            policy?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How does your payment work?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer " itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How can I pay?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">Can I buy < 40 hours block?</h3>
                                                <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                                    itemtype="https://schema.org/Answer">
                                                    <p>Freelancers sometimes cause delays due to lack of backup, or
                                                        there can be quality issues. When you hire an agency, they make
                                                        sure that your project is delivered on time with the required
                                                        quality.</p>
                                                    <p>ValueCoders is a software development agency with 17+ years of
                                                        experience in delivering projects to more than 2500 global
                                                        clients and has a workforce of 450+ experts.</p>
                                                </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">Is there a minimum contract duration?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">In case of dedicated hires, what is your leave
                                            policy?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Freelancers sometimes cause delays due to lack of backup, or there can be
                                                quality issues. When you hire an agency, they make sure that your
                                                project is delivered on time with the required quality.</p>
                                            <p>ValueCoders is a software development agency with 17+ years of experience
                                                in delivering projects to more than 2500 global clients and has a
                                                workforce of 450+ experts.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <section class="get-in-touch-section tab-content" id="get-in-touch">
                        <div class="rate-container">
                            <div class="dis-flex">
                                <div class="left-box">
                                    <h2>Get In Touch</h2>
                                    <p>If you have any questions or would like to schedule a discovery call, please
                                        email us your details and we will get in touch with you within 48 business
                                        hours.</p>
                                    <p>If you would like to interview some of our talents, please share the Job
                                        Description or Roles & Responsibilities of the talent that you are looking to
                                        hire.</p>
                                    <p>We will match the right talent, share the profiles with you and schedule an
                                        interview based on the time preference within days.</p>
                                </div>
                                <div class="right-box">
                                    <a href="#" class="rate-btn">Order Now</a>
                                    <span class="block or">or</span>
                                    <a href="#" class="rate-btn rate-btn-white">Schedule a call with a consultant</a>
                                    <span class="block">Get guaranteed response within 8 Hrs.</span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="order-section tab-content" id="order">

                        <div class="rate-container">

                            <div class="dis-flex step-outer">
                                <div class="step active">
                                    <span class="circle"></span>
                                    <span class="step-text">Step 1 <br>
                                        (Choose your options)</span>
                                </div>
                                <div class="step">
                                    <span class="circle"></span>
                                    <span class="step-text">Step 2 <br>
                                        (Fill the form)</span>
                                </div>
                            </div>

                            <div class="head-content">
                                <p>Want to hire dedicated developer to scale your business? We are happy to help you.
                                    Get skilled, pre-vetted and trained professionals dedicatedly working on your
                                    project.</p>
                            </div>

                            <div class="dis-flex form-box-outer">

                                <div class="left-box">
                                    <div class="head-box">
                                        <h2>Engagement Options</h2>
                                        <p>Choose from different engagement options that suit best your business needs.
                                        </p>
                                    </div>
                                    <form class="order-form" method="post">
                                        <div id="content">
                                        <div id="hire-box-section-0" data-linkeditem="hire-box-0" class="hire-box">
                                            <div class="tech-box">
                                                <label class="label">Technology</label>
                                                <!-- <div class="custom-select tech-select-box"> -->
                                                <div class="select-option-box">
                                                    <select class="technology-box" id="hire-tech-select-0" name="technology_0" onchange="resetTime(0)">
                                                        <option value="" disabled>Select the technology</option>
                                                        <option value="1">Android</option>
                                                        <option value="2">PHP</option>
                                                        <option value="3">Node js</option>
                                                        <option value="4">Tech 4</option>
                                                    </select>
                                                </div>
                                                <a href="#" class="form-caption">Need Help, Get in Touch!</a>
                                            </div>
                                            <div class="time-box">
                                                <span class="title">Hire For</span>
                                                <div class="hire-for">
                                                    <div>
                                                        <input type="radio" id="40_0" data-hourly-price="30" value="40" name="time_0" onclick="checkHour(40,0);">
                                                        <label class="for-time" for="40_0">40 hrs</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" onclick="checkHour(80,0);" data-hourly-price="27" id="80_0" value="80" name="time_0" >
                                                        <label class="for-time" for="80_0">80 hrs</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="120_0" value="120" data-hourly-price="25" name="time_0" onclick="checkHour(120,0);">
                                                        <label class="for-time" for="120_0">120 hrs</label>
                                                    </div>
                                                    <div>
                                                       <input type="radio" id="160_0" value="160" name="time_0" onclick="checkHour(160,0);">
                                                        <label class="for-time dedicated" for="160_0">Dedicated</label>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="clickCount" value="0">
                                                <span class="form-caption">(160 hrs per month)</span>
                                            </div>
                                            <div id="multiselect_0" class="multiselect" style="display:none;"> 
                                                <div class="select-option-box">
                                                    <label class="label">Experience</label>
                                                    <select id="multiselect_dedicated_developer-0" name="multiselect_dedicated_developer-0" onchange="checkHour(160,0)">
                                                        <option value=""> Select The Developer</option>
                                                        <option value="1" data-hourly-price="220">Junior Level (1-3 Years Experienced)</option>
                                                        <option value="2" data-hourly-price="280">Mid Level (4-5 Years Experienced)</option>
                                                        <option value="3" data-hourly-price="360">Senior Level (5-7 Years Experienced)</option>
                                                        <option value="4" data-hourly-price="4500">Technical Lead (8+ Years Experienced)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- button -->
                                            <div class="hire-btn add-btn add-btn-0" onclick="addRow()"></div>
                                            <input class="hire-btn remove-btn remove-btn-0" style="display:none;"  onclick="removeRow(this)">
                                        </div>
                                        </div>

                                       <!--- <div class="hire-box">
                                            <div class="tech-box">
                                                <label class="label">Technology</label>
                                                <div class="custom-select">
                                                    <select name="technology">
                                                        <option value="1">Android</option>
                                                        <option value="2">Technology</option>
                                                        <option value="3">Technology</option>
                                                    </select>
                                                </div>
                                                <a href="#" class="form-caption">Need Help, Get in Touch!</a>
                                            </div>
                                            <div class="time-box">
                                                <span class="title">Hire For</span>
                                                <div class="hire-for">
                                                    <span class="for-time">40 hrs</span>
                                                    <span class="for-time">80 hrs</span>
                                                    <span class="for-time">120 hrs</span>
                                                    <span class="for-time dedicated active">Dedicated</span>
                                                </div>
                                                <span class="form-caption">(160 hrs per month)</span>
                                            </div>

                                            <div class="exp-box">
                                                <label class="label">Experience</label>
                                                <div class="custom-select">
                                                    <select>
                                                        <option value="1">Junior Level (1-3 Years Experienced)</option>
                                                        <option value="2">Mid Level (4-5 Years Experienced)</option>
                                                        <option value="3">Senior Level (5-7 Years Experienced)</option>
                                                        <option value="4">Technical Lead (8+ Years Experienced)</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="multiselect">
                                                <label class="label">Skills</label>
                                                <div class="select-box" onclick="showCheckboxes()">
                                                    <select>
                                                        <option>Choose Skills</option>
                                                    </select>
                                                    <div class="over-select"></div>
                                                </div>
                                                <div id="checkboxes">
                                                    <label for="one">
                                                        <input type="checkbox" id="one">Swift
                                                    </label>
                                                    <label for="two">
                                                        <input type="checkbox" id="two">React
                                                    </label>
                                                    <label for="three">
                                                        <input type="checkbox" id="three">Node JS
                                                    </label>
                                                    <label for="four">
                                                        <input type="checkbox" id="four">Kotlin
                                                    </label>
                                                    <label for="five">
                                                        <input type="checkbox" id="five">Windows
                                                    </label>
                                                </div>
                                            </div>

                                            
                                            <div class="hire-btn remove-btn"></div>
                                        </div>-->
                                    </form>

<br>
                                    <form class="detail-form" method="post" style="display:none;" id="vc-lead-form" onsubmit="return ValidationEvent();">
                                        <div class="head-box">
                                            <h2>Enter Details</h2>
                                            <p>Choose from different engagement options that suit best your business
                                                needs.</p>
                                        </div>

                                        <div class="dis-flex detail-form-outer">

                                            <div class="input-box-outer">
                                                <div class="input-box">
                                                    <input type="text" maxlength="50" pattern="^[a-zA-Z0-9-]" name="firstName" id="first_name" placeholder="First Name" class="input-field" onkeypress="return ValidateName(event,'lblError_firstname','firstName');" value="" required />
                                                    <label>First Name</label>
                                                    <small class="error-msg-section" id="lblError_firstname"></small>
                                                </div>
                                            </div>
                                            <div class="input-box-outer">
                                                <div class="input-box">
                                                    <input type="text" maxlength="40" pattern="^[a-zA-Z0-9-]" name="lastname" id="last_name" placeholder="Last Name"
                                                        class="input-field" value="" onkeypress="return ValidateName(event,'lblError_lastname','lastname');" required />
                                                    <label>Last Name</label>
                                                    <small class="error-msg-section" id="lblError_lastname"></small>
                                                </div>
                                            </div>
                                            <div class="input-box-outer">
                                                <div class="input-box">
                                                    <input type="text"
                                                        pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$"
                                                        placeholder="Email" maxlength="50" id="txtEmail"  class="input-field" value=""
                                                        name="cont_email" />
                                                    <label>Email</label>
                                                      <small class="error-msg-section" id="lblError_email"></small>
                                                </div>
                                            </div>

                                            <div class="input-box-outer">
                                                <div class="input-box">
                                                    <input type="text" class="input-field" placeholder="Phone" value=""
                                                        name="cont_phpne" id="phone_no" maxlength="10"  required />
                                                    <label>Phone</label>
                                                    <small class="error-msg-section" id="lblError_phone"></small>
                                                </div>
                                            </div>
                                            <div class="input-box-outer">
                                                <div class="input-box">
                                                    <input type="text" maxlength="25" class="input-field" placeholder="Country"
                                                        value="" name="cont_country" id="country" />
                                                    <label>Country</label>
                                                    <small class="error-msg-section" id="lblError_country"></small>
                                                </div>
                                            </div>
                                            <div class="input-box-outer">
                                                <div class="input-box">
                                                    <input type="text" class="input-field" maxlength="15"  placeholder="Tax ID" value=""
                                                        name="cont_tax" id="txt_id" />
                                                    <label>Tax ID</label>
                                                    <small class="error-msg-section" id="lblError_tax"></small>
                                                </div>
                                            </div>
                                            <div class="input-box-outer width-full">
                                                <div class="input-box">
                                                    <textarea class="input-field" placeholder="Comments"
                                                        name="texteareacostm" id="comment"></textarea>
                                                    <label>Comments</label>
													<small class="error-msg-section" id="lblError_tax"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="order-summary-right-box" class="right-box no-content">
                                    <span class="order-head">Order Summary</span>
                                    <form class="order-summary-form" method="post">
                                        <div class="technology-list">

                                            <!-- NA -->
                                            <div class="dis-flex order-list">
                                                <span class="order-number">
                                                    N/A
                                                </span>
                                            </div>

                                            <!-- Price -->
                                            <div class="dis-flex order-list selected-tech">
                                                <ul id="selected-tech-list">
                                                    <li id="hire-box-0" style="display:none">
                                                        <span id="hire-tech-0" class="order-number order-tech-name">
                                                            01. Android (80 hrs @ $27/hr)
                                                        </span>
                                                        <span id="tech-hour-price-0" class="order-price" id="order-price">
                                                            $0
                                                        <span class="close"></span>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Add Ons -->
                                            <div class="add-ons">
                                                <label>Add Ons</label>
                                                <span class="checkbox">
                                                    <input id="add-on-checkbox" type="checkbox" name="addons" value="addons" onclick="myFunction()">
                                                    <span class="checkmark"></span>
                                                </span>
                                            </div>

                                            <!-- Add Ons Selector-->
                                            <div class="add-ons-selector-outer" style="display: none;">
                                                <div class="add-ons-selector">
                                                    <div class="select-option-box">
                                                        <label>Timezone</label>
                                                        <!-- <div class="custom-select"> -->
                                                            <select id="add-ons-selector-section" class="add-ons-selector-section" name="add-ons-selector-options" onchange="addOnSelector(this)">
                                                                <option value="0" data-extra-price="0">Select The Time Zone</option>
                                                                <option value="1" data-extra-price="100">Timezone 1</option>
                                                                <option value="2" data-extra-price="500" >Timezone 2</option>
                                                                <option value="3" data-extra-price="1000">Timezone 3</option>
                                                            </select>
                                                        <!-- </div> -->
                                                    </div>

                                                    <span class="price">
                                                        <span id="add-on-order-extraPrice" data-total-extra-price class="add-on-order-price" name="add-ons-selector-options">
                                                            $0
                                                            <!-- <span class="close"></span> -->
                                                        </span>
                                                    </span>

                                                </div>
                                            </div>

                                           <!--  <div class="add-ons-selector" style="display:none;">
                                                <label>Team Discount</label>
                                                <div class="custom-select">
                                                    <select>
                                                        <option value="1">Team Discount Ad...</option>
                                                        <option value="2">Team Discount Ad...</option>
                                                        <option value="3">Team Discount Ad...</option>
                                                    </select>
                                                </div>
                                                <span class="price">
                                                    <span class="order-price">
                                                        $2160
                                                        <span class="close"></span>
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="add-ons-selector" style="display:none">
                                                <label>Advance Payment Discount</label>
                                                <div class="custom-select">
                                                    <select>
                                                        <option value="1">Advance Payment Discount</option>
                                                        <option value="2">Advance Payment Discount</option>
                                                        <option value="3">Advance Payment Discount</option>
                                                    </select>
                                                </div>
                                                <span class="price">N/A</span>
                                            </div> -->
                                        </div>

                                        <div class="total-price-box">
                                            <span class="total-txt">Total</span>
                                            <span id="finalPrice" data-total-price="0" class="total-price">$0</span>
                                        </div>
                                        <input type="hidden" id="orderFormData" name="orderFormData" class="orderFormData" value="">
                                        <input type="button" id="continue-btn" class="rate-btn continue-btn" onclick="getTechData(this.id)" value="Continue">
                                        <input type="button" id="submit-btn" class="rate-btn submit-btn" onclick="getTechData(this.id)" value="Submit" style="display: none;">

										<!-- <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
           data-key="<?php //echo $pkey;?>"
           data-amount="<?php //echo 200*100; ?>"
           data-name="<?php //echo "test"; ?>"
           data-description="<?php //echo "testing";?>"
           data-image=""
           data-currecncy="usd"
           data-email="<?php //echo "akshay@gmail.com";?>">           
           </script>  -->
           <script>
            // document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
           </script>  
            <!--<button id="payButton" type="submit" class="btn btn-danger rate-btn submit-btn" style="display:none" >Pay With Card</button>-->
                                    </form>

                                    <div class="order-footer">
                                        <div class="order-text">
                                            <span>Non Disclosure<br> Agreement</span>
                                            <span>24X7 <br>Support</span>
                                            <span class="has-free-trial">100% Money Back<br> Guaranteed</span>
                                        </div>
                                        <div class="order-logo">
                                            <img src="images/order-footer-logo.png" alt="Valuecoders">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
            </div>
        </div>
    </section>
       <!-- pop -->
    <div class="free-trail-pop-up">
        <div class="pop-up-inner">
            <span class="pop-close"></span>
            <div class="pop-up-box">
                <h2>100% Money Back Guaranteed</h2>
                <p>Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt mollit dolore cillum minim tempor enim. Elit aute irure tempor cupidatat incididunt sint deserunt ut voluptate aute id deserunt nisi. Nulla Lorem mollit cupidatat irure. Laborum magna nulla duis ullamco cillum dolor. Voluptate exercitation incididunt aliquip deserunt reprehenderit elit mollit cupidatat irure. Laborum magna nulla duis ullamco cillu laborum.</p>
            </div>
        </div>
    </div>
    <script>

    // sidebar
    var hasUg = document.getElementById("rate-card-sec");
    if (hasUg) {
        window.addEventListener('scroll', function() {
            var items = document.querySelectorAll("#rate-card-sec .tab-content");
            items.forEach(function(item) {
                if (document.documentElement.scrollTop >= (item.getBoundingClientRect().top + window
                        .scrollY - 100)) {
                    let id = item.getAttribute("id");
                    let qli = document.querySelectorAll("#rate-card-sec .tabsli li a");
                    qli.forEach(function(qitem) {
                        qitem.classList.remove("visible");
                    });
                    document.querySelector('#rate-card-sec .tabsli li a[href="#' + id + '"]').classList.add(
                        "visible");
                }
            });
        });
    }


    // faq
    var faqItem = document.getElementsByClassName("faq-accordion-item-outer");
    var faqHD = document.getElementsByClassName("faq-accordion-toggle");
    for (i = 0; i < faqHD.length; i++) {
        faqHD[i].addEventListener("click", toggleFaqItem, false);
    }

    function toggleFaqItem() {
        //let itemClass = this.parentNode.className;    
        for (i = 0; i < faqItem.length; i++) {
            faqItem[i].className = "faq-accordion-item-outer";
        }
        if (this.parentNode.className == "faq-accordion-item-outer") {
            this.parentNode.className = "faq-accordion-item-outer active";
        }
    }

    // for select option
    var x, i, j, l, ll, selElmnt, a, b, c;
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 0; j < ll; j++) {
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    document.addEventListener("click", closeAllSelect);

    // for checkbox option
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
    </script>
	<script>
        clicks=0;
function addRow () {
    var _checkAddRow = false;
    if(clicks < 5){
        console.log('brfore',clicks);

        if(checkRadioBtn('time_'+clicks)){
            // if(clicks == 0 ){
            //  var techSelected = document.querySelector('.select-selected').innerHTML;
            //      if(techSelected != 'Select the technology'){
            //         _checkAddRow = true;
            //         console.log(0,"aaa");
            //      }
            // }else {
                var selectedId = '#hire-tech-select-'+clicks
                var country_select = document.querySelector(selectedId);
                var techSelected = country_select.options[country_select.selectedIndex].text;
                if(techSelected != 'Select The technology'){
                    console.log(1,"bbb",selectedId,techSelected);
                    _checkAddRow = true;
                 }
            // }
        }
      console.log(_checkAddRow);
       
        if(_checkAddRow){
             clicks++;
        console.log('after',clicks);
        document.querySelector('#content').insertAdjacentHTML(
            'beforeend',
            '<div id="hire-box-section-'+clicks+'" data-linkeditem="hire-box-'+clicks+'" class="hire-box"><div class="tech-box"><div class="select-option-box"><label class="label">Technology'+clicks+'</label><select onchange="resetTime('+clicks+')" id="hire-tech-select-'+clicks+'" class="technology-box" name="technology_'+clicks+'"><option value="" disabled selected>Select the technology</option><option value="1">Android</option><option value="2">PHP</option><option value="3">Node js</option></select></div></div><a href="#" class="form-caption">Need Help, Get in Touch!</a><div class="time-box"><span class="title">Hire For</span><div class="hire-for"><div><input type="radio" data-hourly-price="30" id="40_'+clicks+'" value="40" name="time_'+clicks+'" onclick="checkHour(40,'+clicks+');"><label class="for-time" for="40_'+clicks+'">40 hrs</label></div><div><input type="radio" data-hourly-price="27" onclick="checkHour(80,'+clicks+');" id="80_'+clicks+'" value="80" name="time_'+clicks+'" ><label class="for-time" for="80_'+clicks+'">80 hrs</label></div><div><input type="radio" data-hourly-price="25" id="120_'+clicks+'" value="120" name="time_'+clicks+'" onclick="checkHour(120,'+clicks+');"><label class="for-time" for="120_'+clicks+'">120 hrs</label></div><div><input type="radio" id="160_'+clicks+'" value="160" name="time_'+clicks+'" onclick="checkHour(160,'+clicks+');"><label class="for-time dedicated" for="160_'+clicks+'">Dedicated</label></div></div><span class="form-caption">(160 hrs per month)</span></div><div id="multiselect_'+clicks+'" class="multiselect" style="display:none;"><div class="select-option-box"><label class="label">Experience</label><div class="custom-select"><select id="multiselect_dedicated_developer-'+clicks+'" name="multiselect_dedicated_developer-'+clicks+'" onchange="checkHour(160,'+clicks+')"><option value="">Select Developer</option><option value="1" data-hourly-price="220">Junior Level (1-3 Years Experienced)</option><option value="2" data-hourly-price="280">Mid Level (4-5 Years Experienced)</option><option value="3" data-hourly-price="360">Senior Level (5-7 Years Experienced)</option><option value="4" data-hourly-price="4500">Technical Lead (8+ Years Experienced)</option></select></div></div></div> <div class="hire-btn add-btn add-btn-'+clicks+'" onclick="addRow()"></div><input class="hire-btn remove-btn remove-btn-'+clicks+'"  onclick="removeRow(this)"></div>');

        // to toggle add and remove icons start

        document.querySelectorAll('.hire-btn').forEach(function(el) {
           el.style.display = 'none';
        });

        var totalIconList =  document.querySelectorAll('.hire-btn').length;

        document.querySelector('.add-btn-'+clicks).style.display = 'block';       
        
        document.querySelectorAll('.remove-btn').forEach(function(el) {
           el.style.display = 'block';
        });
        
        document.querySelector('.remove-btn-'+clicks).style.display = 'none';


        // to toggle add and remove icons end
        var clickCount=clicks;
        document.getElementById('clickCount').value=clickCount;
        var listNode = document.getElementById('selected-tech-list'),
                liNode = document.createElement("li"),
                txtNode = document.createTextNode("Linode");            
            liNode.appendChild(txtNode);        
            liNode.setAttribute('id','hire-box-'+clicks);
            liNode.style.display = 'none';
            listNode.appendChild(liNode);
        } else{
            uncheckRadioBtn('time_'+clicks);
            //alert("Data Missing!!!");

        }
    } else{
        alert("limit exceeds");
    }
}

function checkRadioBtn(radioName){
     var radios = document.getElementsByName(radioName);
     console.log(radioName);
     console.log(radios);
     for (var i = 0, len = radios.length; i < len; i++) {
          if (radios[i].checked) {
              return true;
          }
     }

     return false;
 }

 function uncheckRadioBtn(radioName){
     var radios = document.getElementsByName(radioName);
     console.log(radioName);
     console.log(radios);
     for (var i = 0, len = radios.length; i < len; i++) {
         radios[i].checked = false;
     }
 }

function removeRow (input) {
    clicks--;
    console.log(clicks);
    // if(clicks == 0){
     
    // }
    document.getElementById('content').removeChild(input.parentNode);
    document.getElementById(input.parentNode.dataset.linkeditem).remove();
    document.getElementById('clickCount').value=document.getElementById('content').children.length;

    var testData = !!document.getElementById("clickCount");
    console.log("AAAADDDD",testData);


     // var input = document.createElement("input");
     //    input.setAttribute("type", "hidden");
     //    input.setAttribute("name", "clickCount");
     //    input.setAttribute("id", "clickCount");
     //    input.setAttribute("value", clicks);
     //    document.getElementById("content").appendChild(input);
}

function checkHour(val,count){

    var _checkFlag = false;

    if(checkRadioBtn('time_'+count)){
        // if(count == 0 ){
        // var techSelected = document.querySelector('.select-selected').innerHTML;
        //     if(techSelected != 'Select the technology'){
        //         _checkFlag = true;
        //     }
        // } else {
        var selectedId = '#hire-tech-select-'+count;
        var country_select = document.querySelector(selectedId);
        var techSelected = country_select.options[country_select.selectedIndex].text;
            if(techSelected != 'Select The technology'){
                _checkFlag = true;
            }
        // }
    }

   if(_checkFlag){

        console.log("val",val,'count',count);

       if(val==160){
           document.getElementById('multiselect_'+count).style.display = 'block'; 
       }else{
           
           document.getElementById('multiselect_'+count).style.display = 'none'; 
       }

       if(val==40){
           const child = document.getElementById('40_'+count);
           child.parentElement.classList.add('active');
           document.getElementById('160_'+count).parentElement.classList.remove('active');
           document.getElementById('80_'+count).parentElement.classList.remove('active');
           document.getElementById('120_'+count).parentElement.classList.remove('active');
       }else if(val==80){
           const child = document.getElementById('80_'+count);
           child.parentElement.classList.add('active');
           document.getElementById('160_'+count).parentElement.classList.remove('active');
           document.getElementById('40_'+count).parentElement.classList.remove('active');
           document.getElementById('120_'+count).parentElement.classList.remove('active');
       }else if(val==120){
           const child = document.getElementById('120_'+count);
           child.parentElement.classList.add('active');
           document.getElementById('160_'+count).parentElement.classList.remove('active');
           document.getElementById('80_'+count).parentElement.classList.remove('active');
           document.getElementById('40_'+count).parentElement.classList.remove('active');
       }else if(val==160){
           const child = document.getElementById('160_'+count);
           child.parentElement.classList.add('active');
           document.getElementById('120_'+count).parentElement.classList.remove('active');
           document.getElementById('80_'+count).parentElement.classList.remove('active');
           document.getElementById('40_'+count).parentElement.classList.remove('active');
       }
       var clkCount=document.getElementById('clickCount').value; 
       var totalCount= hourlyPrice = liNumber = 0;
       for(var i=0; i<=clkCount; i++){

            var liNumber = i;
            console.log('i',i);

            // if(i == 0 ){
            //      var techSelected = document.querySelector('.select-selected').innerHTML
            // }else {
                 // var techSelected = document.getElementsByName('technology_'+i).selectedIndex;

                var selectedId = '#hire-tech-select-'+i
                var country_select = document.querySelector(selectedId);
                var techSelected = country_select.options[country_select.selectedIndex].text;
                console.log(techSelected);



            // }

             if(document.getElementById('40_'+i).checked) {  
                totalCount =parseInt(document.getElementById('40_'+i).value);
                hourlyPrice =parseInt(document.getElementById('40_'+i).dataset.hourlyPrice);
             }else if(document.getElementById('80_'+i).checked){
                totalCount =parseInt(document.getElementById('80_'+i).value);
                hourlyPrice =parseInt(document.getElementById('80_'+i).dataset.hourlyPrice);
             }
             else if(document.getElementById('120_'+i).checked){
                totalCount =parseInt(document.getElementById('120_'+i).value);
                hourlyPrice =parseInt(document.getElementById('120_'+i).dataset.hourlyPrice);
             }
             else if(document.getElementById('160_'+i).checked){
                totalCount =parseInt(document.getElementById('160_'+i).value);
                hourlyPrice =parseInt(document.getElementById('160_'+i).dataset.hourlyPrice);

                var selectedId = '#multiselect_dedicated_developer-'+i
                var multiselect_dedicated_developer = document.querySelector(selectedId);
                hourlyPrice = multiselect_dedicated_developer.options[multiselect_dedicated_developer.selectedIndex].getAttribute('data-hourly-price');
                // multiselect_dedicated_developer-
             }

             var element = document.getElementById("order-summary-right-box");
            element.classList.remove("no-content");

            //  var liSpan = '<span id="hire-tech-'+count+'" class="order-number order-tech-name">0'+parseInt(liNumber+1)+'. Android (80 hrs @ $27/hr)</span><span id="tech-hour-price-'+count+'" class="order-price">$0<span class="close"></span></span>';

            // document.getElementById('hire-box-'+count).innerHTML = liSpan;        
            // // document.getElementById('hire-tech-'+count).textContent = "0"+parseInt(liNumber+1)+"."+techSelected+" ("+totalCount+" hrs @ "+ hourlyPrice+"/hrs)" 
            // document.getElementById('hire-tech-'+count).textContent = techSelected+" ("+totalCount+" hrs @ "+ hourlyPrice+"/hrs)" 
            // document.getElementById("tech-hour-price-"+count).textContent="$"+hourlyPrice*totalCount;
            // document.getElementById('hire-box-'+count).style.display = 'block';  


            var liSpan = '<span id="hire-tech-'+liNumber+'" class="order-number order-tech-name">0'+parseInt(liNumber+1)+'. Android (80 hrs @ $27/hr)</span><span id="tech-hour-price-'+liNumber+'" class="order-price">$0<span class="close"></span></span>';

            document.getElementById('hire-box-'+liNumber).innerHTML = liSpan;        
            // document.getElementById('hire-tech-'+count).textContent = "0"+parseInt(liNumber+1)+"."+techSelected+" ("+totalCount+" hrs @ "+ hourlyPrice+"/hrs)" 
            document.getElementById('hire-tech-'+liNumber).textContent = techSelected+" ("+totalCount+" hrs @ "+ hourlyPrice+"/hrs)" 
            document.getElementById("tech-hour-price-"+liNumber).textContent="$"+hourlyPrice*totalCount;
            document.getElementById('hire-box-'+liNumber).style.display = 'block'; 
       }
       // document.getElementById("order-price").textContent="$"+hourlyPrice*totalCount;
        calculateTotalPrice();
        console.log(totalCount);
        console.log(hourlyPrice);
        console.log(techSelected);
    }else {
         uncheckRadioBtn('time_'+count);
        alert("Please Select the Technology");
    }
}

function addOnCheck() {
   var addOnCheck = document.getElementById("add-on-checkbox");
       if(addOnCheck.checked == true){
            console.log("aaa");
            addOnCheck.checked = false;
       }else{
            console.log("aaa");
            addOnCheck.checked = true;
       }
       console.log(addOnCheck.checked);
}

function myFunction() {
  var checkBox = document.getElementById("add-on-checkbox");
  var elements = document.getElementsByClassName("add-ons-selector");
  if (checkBox.checked == true){
    var displayState = 'block';
    console.log("True");
     for (var i = 0; i < elements.length; i++){
        elements[i].style.display = displayState;
    }
    // text.style.display = "block";
  } else {
    var displayState = 'none';
    console.log('false');
    for (var i = 0; i < elements.length; i++){
        elements[i].style.display = displayState;
    }
     // text.style.display = "none";
  }
  calculateTotalPrice();
}

function calculateTotalPrice(){
    
    var priceBox    = document.getElementsByClassName("order-price");
    var elements    = document.getElementsByClassName("add-ons-selector");

    var addonPrice  = document.getElementsByClassName('add-on-order-price');
    var addonPriceLength = addonPrice.length;

    var totalPriceCount = priceBox.length;
    var totalOrderPrice = addOnPriceTotal = finalPrice = 0 ;
    var parents = [];
    
    for (i = 0; i < totalPriceCount; i++) {
        var elem = priceBox[i];              
            totalOrderPrice+=parseInt(priceBox[i].innerText.replace(/[^0-9]/g,''));  
    }

    for (i = 0; i < addonPriceLength; i++) {
        var elem = addonPrice[i];  
        if(elements[i].style.display != "none"){
            addOnPriceTotal+=parseInt(addonPrice[i].innerText.replace(/[^0-9]/g,''));
        }        
    }
    console.log(totalOrderPrice + addOnPriceTotal);
    finalPrice = totalOrderPrice + addOnPriceTotal;
    console.log(totalOrderPrice);
    console.log("add",addOnPriceTotal);
    document.getElementById("finalPrice").textContent="$"+finalPrice;
    document.getElementById("finalPrice").dataset.totalPrice=finalPrice;
}

function getTechData(btn_id) {
    let form = document.querySelector('.order-form');
    let form2 = document.querySelector('.detail-form');
    let data = new FormData(form);
    let data2 = new FormData(form2);
    // for (let entry of data) {
    //     // console.log(entry);
    // }
    var object = {};
    object['finalPrice'] = document.getElementById("finalPrice").textContent;
    data.forEach((value, key) => object[key] = value);
    data2.forEach((value, key) => object[key] = value);
    var json = JSON.stringify(object);
    console.log(json)


    document.getElementById("orderFormData").value = json;
    document.querySelector('.order-form').style.display="none";
    document.querySelector('.continue-btn').style.display="none";
    document.querySelector('.detail-form ').style.display="block";
    document.querySelector('.submit-btn').style.display="block";
   if(btn_id == 'submit-btn'){
   // alert(json);
    // document.querySelector('.order-summary-form').submit();
	//alert(ValidationEvent());
    if(ValidationEvent()){   	
        document.getElementById('submit-btn').click();
    }
   }
}

//*Form Validation Code Starts*/
const vcform    = document.getElementById('vc-lead-form');
const fname     = document.getElementById('first_name');
const lname     = document.getElementById('last_name');
const email     = document.getElementById('txtEmail');
const phone     = document.getElementById('phone_no');
const country   = document.getElementById('country');
const txtid     = document.getElementById('txt_id');
const comment      = document.getElementById('comment');

function vcSpaceChecker( input ){
    if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{1,}/.test( input ) ){
        return false;
    }else{
        return true;
    }
}
function ValidationEvent() {
    // Storing Field Values In Variables
	checkRequired([fname,email,lname,phone,country,txtid,comment]);
	if(
        ( vcSpaceChecker(fname.value.trim()) === true ) &&
        ( vcSpaceChecker(lname.value.trim()) === true ) &&
        ( vcSpaceChecker(email.value.trim()) === true ) &&
        ( vcSpaceChecker(phone.value.trim()) === true ) &&
        ( vcSpaceChecker(country.value.trim()) === true ) &&
        ( vcSpaceChecker(txtid.value.trim()) === true )
        
    ){
        const sre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if( !sre.test(email.value.trim()) ){
            return false;
        }
        if( checkLength(phone,8,20) === false ){
            return false;
        }
var buyBtn = document.getElementById('submit-btn');
var responseContainer = document.getElementById('paymentResponse'); 
let ms = Date.now();   
// Create a Checkout Session with the selected product
var createCheckoutSession = function (stripe) {
    return fetch("stripe_pay/stripe_charge.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            checkoutSession: 1,
            Name:"Engagement Options",
            ID:ms,
            Price:document.getElementById("finalPrice").dataset.totalPrice,
            Currency:"USD",
            // ExtraData:document.getElementById("orderFormData").value,
        }),
    }).then(function (result) {
        return result.json();
    });
};
    // Handle any errors returned from Checkout
var handleResult = function (result) {
    if (result.error) {
        responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }
    buyBtn.disabled = false;
    buyBtn.textContent = 'Buy Now';
};

// Specify Stripe publishable key to initialize Stripe.js
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

buyBtn.addEventListener("click", function (evt) {
    buyBtn.disabled = true;
    buyBtn.textContent = 'Please wait...';
    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });
});    
    }else{
        return false;   
    }

}

//checkRequired fields
function checkRequired(inputArr){
    inputArr.forEach(function(input){ 
        console.log( input.name );
        let e = input.value.trim();
        if( !/^[A-Za-z0-9!@#$%^&*()".,;:{}<>?\[\]\-+=' ]{2,}/.test(e) ){

            if( input.name == "firstName" ){
                showError(input, `Please Fill First Name`);
            }else if( input.name == "cont_phpne" ){
                showError(input, `Please Fill Phone`);
            }else if( input.name == "cont_email" ){
                showError(input, `Please Fill Email`);
            }else if( input.name == "lastname" ){
                showError(input, `Please Fill Last Name`);    
            }else if( input.name == "cont_country" ){
                showError(input, `Please Fill Country Name`);    
            }else if( input.name == "cont_tax" ){
                showError(input, `Please Fill Txt ID`);    
            }else if( input.name == "texteareacostm" ){
                showError(input, `Please Fill Comment`); 
            }
        }else{
            
            checkEmail(email);
            
            checkLength(phone,8,20);
            
        }
    });
}

//Show input error messages
function showError(input, message, spDiv = false ) {
    let formControl = input.parentElement;
    let small = formControl.querySelector('small.error-msg-section');    
    if( spDiv !== false ){
    small = document.getElementById(spDiv);
    }
    formControl.classList.add('ws-error');
    small.innerText = message;
}

//show success colour
function showSucces(input, spDiv = false){
    let formControl = input.parentElement;
    let small       = formControl.querySelector('small.error-msg-section');    
    if( spDiv !== false ){
    small = document.getElementById(spDiv);
    }
    formControl.classList.remove('ws-error');
    small.innerText = '';
}

//check email is valid
function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())) {
        showSucces(input)
    }else {
        if( input.value == '' ){
            showError(input,'Please Fill Email');
        }else{
            showError(input,'Email is not valid');  
        }
    }
}
function phonenumber(inputtxt){
	
    if( (/^[A-Za-z0123456789()\s.+-]+$/.test(inputtxt.value.trim()) && inputtxt.value.length >= 10) ){   
        showSucces( inputtxt )
    }else{
        if( inputtxt.value == '' ){
            showError(inputtxt,'Please Fill Phone');
        }else{
            showError( inputtxt, 'Phone Number is not valid');
        }
        
    }
}
fname.addEventListener("keyup", checkUseName);
fname.addEventListener("keypress", checkUseName);
fname.addEventListener("keydown", ws_validateStr);
fname.addEventListener("focusout", checkUseName);

lname.addEventListener("keyup", checkCont);
lname.addEventListener("keypress", checkCont);
lname.addEventListener("keydown", ws_validateStr);
lname.addEventListener("focusout", checkCont);

country.addEventListener("keyup", checkcountry);
country.addEventListener("keydown", checkcountry);
country.addEventListener("keypress", blockSpecialCountry);
country.addEventListener("focusout", spaceTrimFunction);

txtid.addEventListener("keyup", checktxtid);
txtid.addEventListener("keydown", checktxtid);
txtid.addEventListener("keypress", blockSpecialtxt);
txtid.addEventListener("focusout", checktxtid);

phone.addEventListener("keyup", checkPhone);
phone.addEventListener("keypress", checkPhone);
phone.addEventListener("keydown", ws_checkphonenumber);
phone.addEventListener("focusout", checkPhone);

comment.addEventListener("keyup", checkURequirement);
comment.addEventListener("keypress", checkURequirement);
comment.addEventListener("keydown", checkURequirement);
comment.addEventListener("focusout", checkURequirement);
comment.addEventListener("focusin", checkURequirement);

email.addEventListener("focusout", checkEmailEvent);
email.addEventListener("focusin", function(){
    doNotingonFocus(email);
});
function checkURequirement(event){
    checkLength(comment,3,1500);
}
function checkcountry(event){
  checkLength(country,1,15);
}

function checktxtid(event){
  checkLength(txtid,1,15);
}
function ws_validateStr( e ) {
    if ( e.keyCode > 64 && e.keyCode < 91 || 8 == e.keyCode || 9 == e.keyCode || 32 == e.keyCode )
        return !0;
    e.preventDefault()
}
function checkEmailEvent(event){
    checkEmail(email);
}
function checkUseName(event){
  checkLength(fname,1,15);
}

function checkCont(event){
  checkLength(lname,1,255);
}


function checkPhone(event){
    checkLength(phone,8,20);
    phonenumber(phone);
}

//check input Length
function checkLength(input, min ,max) {
    if(input.value.length < min) {
        if( input.name == "firstName"  ){            
            showError(input, `Please Fill First Name`);
		} else if( input.name == "lastname" ){
            showError(input, `Please Fill Last Name`);    
        }else if( input.name == "cont_phpne"  ){
            showError(input, `Please Fill Phone`, "phone-error");
        }else if( input.name == "cont_email"  ){
            showError(input, `Please Fill Email`);
		}else if( input.name == "cont_country"  ){
            showError(input, `Please Fill Country`);
        }else if( input.name == "cont_tax"  ){
            showError(input, `Please Fill Tax ID`);
        }else if( input.name == "texteareacostm"  ){
            showError(input, `Please Fill Comment`);			
        }else{
            showError(input,`This Field is required`)   
        } 
        return false;
    }else {
        if( input.name == "cont_phpne" ){
            showSucces(input);
        }
		if( input.name == "cont_email" ){
            showSucces(input);
        }
		else{
            showSucces(input);
        }
        return true;
    }
}
function ws_checkphonenumber(e) {
    let keyArray = [46, 8, 9, 27, 13, 187, 189, 16, 17];
    
    -1 !== keyArray.indexOf(e.keyCode) || 65 == e.keyCode && !0 === e.ctrlKey || 86 == e.keyCode && !0 === e.ctrlKey || 67 == e.keyCode && !0 === e.ctrlKey || 88 == e.keyCode && !0 === e.ctrlKey || e.keyCode >= 35 && e.keyCode <= 39 || (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault()
}
function resetTime(selectedCount){
   // checkHour(80,0)
    if(checkRadioBtn('time_'+selectedCount)){
       var radios = document.getElementsByName('time_'+selectedCount);
        for (var i = 0, len = radios.length; i < len; i++) {
          if (radios[i].checked) {
              radios[i].click();
          }
     }
    }
}

function checkRadioBtn(radioName){
     var radios = document.getElementsByName(radioName);
     console.log(radioName);
     console.log(radios);
     for (var i = 0, len = radios.length; i < len; i++) {
          if (radios[i].checked) {
              return true;
          }
     }

     return false;
 }

function addOnSelector(sel) {
    var opt = sel.options[sel.selectedIndex];
    var price = opt.dataset.extraPrice

  document.getElementById("add-on-order-extraPrice").innerHTML = "$ " + price;
  document.getElementById("add-on-order-extraPrice").dataset.totalExtraPrice=price;

  calculateTotalPrice();
}





// validation starts 

function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
     var lblError = document.getElementById("lblError_phone");
      document.querySelector('input[name=cont_phpne]').classList.remove("error-field");
      lblError.innerHTML = "";
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
          if (document.querySelector('input[name=cont_phpne]').value.length > 9 ){
            document.querySelector('input[name=cont_phpne]').classList.add("error-field");
            lblError.innerHTML = "Limit Reached.";
            return false //disable key press
        }
        if (unicode<48||unicode>57){
            document.querySelector('input[name=cont_phpne]').classList.add("error-field");
            lblError.innerHTML = "Only Numbers allowed.";
            return false //disable key press
        } //if not a number
           
    }
}

function ValidateName(e,errorId,fieldname) {
        var keyCode = e.keyCode || e.which;
 
        var lblError = document.getElementById(errorId);
        lblError.innerHTML = "";
 
        //Regex for Valid Characters i.e. Alphabets.
        var regex = /^[A-Za-z]+$/;
 
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
         document.querySelector('input[name='+fieldname+']').classList.remove("error-field");
        if (!isValid) {
            document.querySelector('input[name='+fieldname+']').classList.add("error-field");
            lblError.innerHTML = "Only Alphabets allowed.";
        }
 
        return isValid;
    }

   function ValidateEmail() {
        var email = document.getElementById("txtEmail").value;
        var lblError = document.getElementById("lblError_email");
        lblError.innerHTML = "";
        if(email== ''){
            lblError.innerHTML = "";
            return true
        }
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(email)) {
            lblError.innerHTML = "Invalid email address.";
            document.getElementById("txtEmail").classList.add("error-field");
        } else{
            document.getElementById("txtEmail").classList.remove("error-field");
        }
    }

    function blockSpecialCountry() {
		    var fieldname = 'cont_country';
            var k = event.keyCode;
            var lblError = document.getElementById('lblError_country');
            var _validCheckCountry = (k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k==32  || (k < 48 && k > 57);
      
            
            lblError.innerHTML = '';
              document.querySelector('input[name='+fieldname+']').classList.remove("error-field");
			  
            if(!_validCheckCountry){
                lblError.innerHTML = "Special Char and Numbers are not allowed.";
                document.querySelector('input[name='+fieldname+']').classList.add("error-field");
                return false;
            }
            // return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8  || (k < 48 && k > 57));
        }
		
	function blockSpecialtxt() {
		    var fieldname = 'cont_tax'; 
            var k = event.keyCode;
            var lblError = document.getElementById('lblError_tax');
            var _validCheckCountry = (k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k==32  || (k < 48 && k > 57);
            
            if(fieldname == 'cont_tax'){
                var _validCheckCountry = (k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k==32  || (k > 48 && k < 57);
            }
            
            lblError.innerHTML = '';
              document.querySelector('input[name='+fieldname+']').classList.remove("error-field");
			  
            if(!_validCheckCountry){
                lblError.innerHTML = "Special Char and Numbers are not allowed.";
                document.querySelector('input[name='+fieldname+']').classList.add("error-field");
                return false;
            }
            // return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8  || (k < 48 && k > 57));
        }	
        function spaceTrimFunction(){
              document.querySelector('input[name=cont_country]').value = document.querySelector('input[name=cont_country]').value.trim();
              console.log("FFFFF");
        }

// validatons ends 
     // for popup
        let hasFreeTrial = document.querySelector('.has-free-trial');
        if( hasFreeTrial !== null ){
            hasFreeTrial.onclick = function (e) {
                var popbtn = document.querySelector('.free-trail-pop-up');
                var popbdy = document.querySelector('body');
                popbtn.classList.toggle('open-pop');
                popbdy.classList.add('body-pop');
                e.preventDefault();
            }
        }
        let popClose = document.querySelector('.pop-close');
        if( popClose !== null ){
            popClose.onclick = function (e) {
                var popcls = document.querySelector('.free-trail-pop-up');
                var popbdycls = document.querySelector('body');
                popcls.classList.remove('open-pop');
                popbdycls.classList.remove('body-pop');
                e.preventDefault();
            }    
        }
</script>

<style type="text/css">
    
    ul#selected-tech-list {
        width: 100%;
    }
    span.order-price {
        float: right;
    }
    .order-section .input-box-outer .input-field.error-field {
        border-color: red !important;
        color: red !important;
    }
    .error-msg-section{
        color: red;
    }
    .order-section .form-box-outer .select-items {
        position: absolute;
        background-color: #fff;
        top: 110%;
        left: 0;
        right: 0;
        z-index: 9;
        box-shadow: 1px 1px 10px #cecece;
        border-radius: 0 0 10px 10px;
    }
    .order-section .right-box.no-content{    
        -webkit-filter: blur(5px);
        -moz-filter: blur(5px);
        -o-filter: blur(5px);
        -ms-filter: blur(5px);
        filter: blur(5px);
        width: 100px;
        height: 100px;
        background-color: transparent;
        pointer-events: none;
    }
    .select-option-box select option{
        color: #000;
        cursor: pointer;
        user-select: none;
        padding: 15px;
        border-bottom: 1px #a9b1be solid;
        font-size: 14px;
    }
</style>
