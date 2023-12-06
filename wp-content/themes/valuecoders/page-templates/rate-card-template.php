<?php
/*
Template Name: ratecard Page Template
*/ 
?>
<?php 
require_once get_template_directory() .'/common/inc/config.inc.php'; 

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
    <?php require_once get_template_directory() .'/include/header-files.php'; ?>
     <!-- Stripe JavaScript library -->
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="preload stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/rate-card.min.css" defer />
	<style>
	.ws-error input{border-color:red !important;}
	.ws-error textarea{border-color:red !important;}
	.pointer {cursor: pointer;}
	</style>
</head>
<style>
</style>

<body id="themeAdd" class="for-rate-card demo-1198 ">

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
                                <!--<li>
                                    <a href="#add">
                                      <div class="active-line">  Add Ons</div>
                                    </a>
                                </li>-->
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

                                <!--<li>
                                    <a href="#get-in-touch">
                                      <div class="active-line">  Get in Touch</div>
                                    </a>
                                </li>-->
                                <li>
                                    <a href="#download">
                                      <div class="active-line">Download Rate Card</div>
                                    </a>
                                </li>
                                <!--<li>
                                    <a href="#order">
                                       <div class="active-line"> Order Now <span>New</span> </div>
                                    </a>
                                </li>-->

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
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon1.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon1.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon1.svg"
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
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon2.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon2.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon2.svg"
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
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon3.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon3.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon3.svg"
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
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon4.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon4.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-about-icon4.svg"
                                            alt="Valuecoders">
                                    </picture>
                                </div>
                                <div class="card-text">
                                    <h3>18+</h3>
                                    <p>Years in Business</p>
                                </div>
                            </div>
                        </div>


                    </section>
                    <section class="tab-content" id="talent">
                        <h2>Our Talent Solutions</h2>
                        <p>We specialize in helping companies hire the best Indian talent faster and more efficiently. Our large pool of highly skilled and experienced professionals can match your specific needs helping you save time and money while getting high-quality talent.</p>
                        <div class="card-container">
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>
                                </div>
                                <div class="card-text">
                                    <h3>Pre-vetted Talent</h3>
                                    <p>At ValueCoders, you can choose from a large pool of qualified and experienced talents curated after a stringent vetting process.</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Quick Hiring </h3>
                                    <p>You can start interviewing within just two days of sharing your requirements, and onboarding takes no more than two weeks.</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Right Match of Talent</h3>
                                    <p>Our process makes sure that you get only the best-fit talent. Our first interview-to-selection ratio is around 93%</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Economical Pricing</h3>
                                    <p>With ValueCoders, you save up to 50% on salaries of resources compared to your local talent without compromising on quality.</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Timezone Compatibility</h3>
                                    <p>Our resources work in your timezone or at least with the overlap of 4 hours to ensure that all the deliveries are on time.</p>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Remote Onboarding & Support</h3>
                                    <p>We take care of all the onboarding formalities, like IT & admin support, Payroll management, etc., to ensure that your resource is ready to start working from the first day.</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-img">
                                    <picture class="lighter-theme">
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-talent-icon.svg"
                                            alt="Valuecoders">
                                    </picture>

                                </div>
                                <div class="card-text">
                                    <h3>Simple Contracts</h3>
                                    <p>With simple, monthly payout, you get complete peace of mind without worrying about compliance or legal aspects.</p>
                                </div>
                            </div>
                        </div>


                    </section>
                    <section class="tab-content" id="expect">
                        <h2>What To Expect From Resources?</h2>
                        <p>We take pride in our strict vetting process, ensuring you get only the best talent in India. We carefully screen every candidate to make sure they meet your specific criteria and feel confident that you're getting the best of the best when you work with us. Here are some qualities that you can expect from the hired resources.</p>

                        <picture class="darker-theme">
                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-expect-dark.webp">
                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-expect-dark.png">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-expect-dark.png"
                                alt="Expect From Resources">
                        </picture>
                        <picture class="lighter-theme">
                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-expect.webp">
                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-expect.png">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-expect.png" alt="Expect From Resources">
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
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon1.webp">
                                                <source type="image/png"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon1.png">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon1.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon1.webp">
                                                <source type="image/png"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon1.png">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon1.svg"
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
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon2-light.webp">
                                                <source type="image/png"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon2-light.png">
                                                <img loading="lazy"
                                                    src="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon2-light.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon2.webp">
                                                <source type="image/png"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon2.png">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon2.svg"
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
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon3-light.webp">
                                                <source type="image/png"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon3-light.png">
                                                <img loading="lazy"
                                                    src="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon3-light.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon3.webp">
                                                <source type="image/png"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon3.png">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon3.svg"
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
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon4-light.webp">
                                                <source type="image/png"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon4-light.png">
                                                <img loading="lazy"
                                                    src="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon4-light.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon4.webp">
                                                <source type="image/png"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon4.png">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon4.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                        </div>
                                        <h3>Add engineer(s) to your team</h3>
                                        <p>Based on the trial phase, you add the engineer(s) to your team.</p>
                                    </div>
                                </div>
                                <picture class="dark-theme-img process-img">
                                    <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/our-hiring-process-img2.webp">
                                    <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/our-hiring-process-img2.png">
                                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/our-hiring-process-img2.png"
                                        alt="Valuecoders" width="1620" height="315">
                                </picture>
                                <picture class="lighter-theme-img process-img">
                                    <source type="image/webp"
                                        srcset="<?php echo get_template_directory_uri(); ?>/images/our-hiring-process-img-for-lighter2.webp">
                                    <source type="image/png"
                                        srcset="<?php echo get_template_directory_uri(); ?>/images/our-hiring-process-img-for-lighter2.png">
                                    <img loading="lazy"
                                        src="<?php echo get_template_directory_uri(); ?>/images/our-hiring-process-img-for-lighter2.png"
                                        alt="Valuecoders" width="1620" height="315">
                                </picture>
                                <!-- <picture class="lighter-theme">
                                    <source type="image/webp"
                                        srcset="<?php echo get_template_directory_uri(); ?>/images/our-hiring-process-img-for-lighter.webp">
                                    <source type="image/png"
                                        srcset="<?php echo get_template_directory_uri(); ?>/images/our-hiring-process-img-for-lighter.png">
                                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/our-hiring-process-img-for-lighter.png"
                                        alt="Valuecoders" width="1620" height="315">
                                </picture> -->
                                <div class="dis-flex justify-center hiring-step-sprite">
                                    <div class="flex-4 icon-box text-center not-step">
                                        <div class="icon-img">
                                            <picture class="dark-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon5-light.webp">
                                                <source type="image/png"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon5-light.png">
                                                <img loading="lazy"
                                                    src="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon5-light.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                            <picture class="lighter-theme-img">
                                                <source type="image/webp"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon5.webp">
                                                <source type="image/png"
                                                    srcset="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon5.png">
                                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-process-icon5.svg"
                                                    alt="Valuecoders">
                                            </picture>
                                        </div>
                                        <h3>Not Satisfied</h3>
                                        <p>If you are not satisfied with the engineer, we are happy to understand the
                                            gap(s) and replace the engineer(s).</p>
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
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-net-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-net-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-net-dark.svg"
                                                alt=".NET">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-net.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-net.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-net.svg" alt=".NET">
                                        </picture>
                                        <h4>.NET</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-java-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-java-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-java-dark.svg"
                                                alt="java">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-java.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-java.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-java.svg" alt="java">
                                        </picture>
                                        <!-- <img src="images/rate-skill-java.svg" alt="Java" /> -->
                                        <h4>Java</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-php-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-php-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-php-dark.svg"
                                                alt="php">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-php.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-php.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-php.svg" alt="php">
                                        </picture>
                                        <!-- <img src="images/rate-skill-php.svg" alt="PHP" /> -->
                                        <h4>PHP</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-larvel-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-larvel-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-larvel-dark.svg"
                                                alt="larvel">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-larvel.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-larvel.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-larvel.svg" alt="larvel">
                                        </picture>
                                        <!-- <img src="images/rate-skill-larvel.svg" alt="Laravel" /> -->
                                        <h4>Laravel</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-python-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-python-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-python-dark.svg"
                                                alt="python">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-python.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-python.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-python.svg" alt="python">
                                        </picture>
                                        <!-- <img src="images/rate-skill-python.svg" alt="Python" /> -->
                                        <h4>Python</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-node-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-node-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-node-dark.svg"
                                                alt="node">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-node.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-node.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-node.svg" alt="node">
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
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-angular-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-angular-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-angular-dark.svg"
                                                alt="angular">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-angular.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-angular.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-angular.svg" alt="angular">
                                        </picture>
                                        <!-- <img src="images/rate-skill-angular.svg" alt="Angular" /> -->
                                        <h4>Angular</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-vue-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-vue-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-vue-dark.svg"
                                                alt="vue">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-vue.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-vue.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-vue.svg" alt=".NET">
                                        </picture>
                                        <!-- <img src="images/rate-skill-vue.svg" alt="vue" /> -->
                                        <h4>Vue</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-devops-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-devops-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-devops-dark.svg"
                                                alt="devops">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-devops.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-devops.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-devops.svg" alt="devops">
                                        </picture>
                                        <!-- <img src="images/rate-skill-devops.svg" alt="Devops" /> -->
                                        <h4>Devops</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react-dark.svg"
                                                alt="react">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react.svg" alt="react">
                                        </picture>
                                        <!-- <img src="images/rate-skill-react.svg" alt="react" /> -->
                                        <h4>React</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mean-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mean-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mean-dark.svg"
                                                alt="mean">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mean.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mean.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mean.svg" alt="mean">
                                        </picture>
                                        <!-- <img src="images/rate-skill-mean.svg" alt="Mean" /> -->
                                        <h4>Mean</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mern-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mern-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mern-dark.svg"
                                                alt="mern">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mern.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mern.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-mern.svg" alt="mern">
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
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-andriod-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-andriod-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-andriod-dark.svg"
                                                alt="andriod">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-andriod.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-andriod.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-andriod.svg" alt="andriod">
                                        </picture>
                                        <!-- <img src="images/rate-skill-andriod.svg" alt="andriod" /> -->
                                        <h4>Andriod</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-apple-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-apple-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-apple-dark.svg"
                                                alt="apple">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-apple.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-apple.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-apple.svg" alt="apple">
                                        </picture>
                                        <!-- <img src="images/rate-skill-apple.svg" alt="IOS" /> -->
                                        <h4>IOS</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-xamarine-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-xamarine-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-xamarine-dark.svg"
                                                alt="xamarine">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-xamarine.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-xamarine.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-xamarine.svg" alt="xamarine">
                                        </picture>
                                        <!-- <img src="images/rate-skill-xamarine.svg" alt="Xamarin" /> -->
                                        <h4>Xamarin</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react-dark.svg"
                                                alt="React Native">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-react.svg" alt="React Native">
                                        </picture>
                                        <!-- <img src="images/rate-skill-react.svg" alt="React" /> -->
                                        <h4>React Native</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-ionic-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-ionic-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-ionic-dark.svg"
                                                alt="ionic">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-ionic.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-ionic.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-ionic.svg" alt="ionic">
                                        </picture>
                                        <!-- <img src="images/rate-skill-ionic.svg" alt="Ionic" /> -->
                                        <h4>Ionic</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-flutter-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-flutter-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-flutter-dark.svg"
                                                alt="flutter">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-flutter.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-flutter.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-flutter.svg" alt="flutter">
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
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-magento-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-magento-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-magento-dark.svg"
                                                alt="magento">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-magento.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-magento.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-magento.svg" alt="magento">
                                        </picture>
                                        <!-- <img src="images/rate-skill-magento.svg" alt="Magento" /> -->
                                        <h4>Magento</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-drupal-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-drupal-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-drupal-dark.svg"
                                                alt="drupal">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-drupal.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-drupal.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-drupal.svg" alt="drupal">
                                        </picture>
                                        <!-- <img src="images/rate-skill-drupal.svg" alt="Drupal" /> -->
                                        <h4>Drupal</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitecore-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitecore-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitecore-dark.svg"
                                                alt="sitecore">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitecore.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitecore.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitecore.svg" alt="sitecore">
                                        </picture>
                                        <!-- <img src="images/rate-skill-sitecore.svg" alt="Sitecore" /> -->
                                        <h4>Sitecore</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitefinity-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitefinity-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitefinity-dark.svg"
                                                alt="sitefinity">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitefinity.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitefinity.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-sitefinity.svg" alt="sitefinity">
                                        </picture>
                                        <!-- <img src="images/rate-skill-sitefinity.svg" alt="Sitefinity" /> -->
                                        <h4>Sitefinity</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-umbraco-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-umbraco-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-umbraco-dark.svg"
                                                alt="umbraco">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-umbraco.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-umbraco.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-umbraco.svg" alt="umbraco">
                                        </picture>
                                        <!-- <img src="images/rate-skill-umbraco.svg" alt="Umbraco" /> -->
                                        <h4>Umbraco</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-wordpress-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-wordpress-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-wordpress-dark.svg"
                                                alt="wordpress">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-wordpress.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-wordpress.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-wordpress.svg" alt="wordpress">
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
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-chatBot-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-chatBot-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-chatBot-dark.svg"
                                                alt="chatBot">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-chatBot.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-chatBot.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-chatBot.svg" alt="chatBot">
                                        </picture>
                                        <!-- <img src="images/rate-skill-chatBot.svg" alt="ChatBot" /> -->
                                        <h4>ChatBot</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-AL-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-AL-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-AL-dark.svg"
                                                alt="AL">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-AL.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-AL.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-AL.svg" alt="AL">
                                        </picture>
                                        <!-- <img src="images/rate-skill-AL.svg" alt="JaAI / MLva" /> -->
                                        <h4>AI / ML</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-tenseflow-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-tenseflow-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-tenseflow-dark.svg"
                                                alt="tenseflow">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-tenseflow.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-tenseflow.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-tenseflow.svg" alt="tenseflow">
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
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-etherum-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-etherum-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-etherum-dark.svg"
                                                alt="etherum">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-etherum.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-etherum.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-etherum.svg" alt="etherum">
                                        </picture>
                                        <!-- <img src="images/rate-skill-etherum.svg" alt="Ethereum" /> -->
                                        <h4>Ethereum</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-hyperledger-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-hyperledger-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-hyperledger-dark.svg"
                                                alt="hyperledger">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-hyperledger.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-hyperledger.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-hyperledger.svg" alt="hyperledger">
                                        </picture>
                                        <!-- <img src="images/rate-skill-hyperledger.svg" alt="Hyperledger" /> -->
                                        <h4>Hyperledger</h4>
                                    </div>
                                    <div class="icon-box">
                                        <picture class="darker-theme">
                                            <source type="image/webp"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-smart-dark.webp">
                                            <source type="image/png"
                                                srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-smart-dark.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-smart-dark.svg"
                                                alt="smart">
                                        </picture>
                                        <picture class="lighter-theme">
                                            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-smart.webp">
                                            <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/rate-skill-smart.png">
                                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/rate-skill-smart.svg" alt="smart">
                                        </picture>
                                        <!-- <img src="images/rate-skill-smart.svg" alt="Smart Contract" /> -->
                                        <h4>Smart Contract</h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </section>
                    <section class="tab-content rate-sample-profile-section" id="rate">
                        <h2> Check Out The Rate Card</h2>
                        <br><br>
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
                                        <h4>Mid Level</h4>
                                        <h5>from <strong>$2800/ mo</strong></h5>
                                        <h6>4-5 years Experienced</h6>
                                    </div>
                                </div>
                                <div class="flex-4">
                                    <div class="sample-block">
                                        <h4>Senior Level</h4>
                                        <h5>from <strong>$3600/ mo</strong></h5>
                                        <h6>5-7 years Experienced</h6>
                                    </div>
                                </div>
                                <div class="flex-4">
                                    <div class="sample-block">
                                        <h4>Technical Lead</h4>
                                        <h5>from <strong>$4500/ mo</strong></h5>
                                        <h6>8+ years Experienced</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--<section class="tab-content" id="add">
                        <div class="faq-section">
                            <h2>Add Ons</h2>

                            <div class="faq-outer" itemscope itemtype="https://schema.org/FAQPage">
                                <div class="faq-accordion-item-outer active" itemscope itemprop="mainEntity"
                                    itemtype="https://schema.org/Question">
                                    <h3 class="faq-accordion-toggle" itemprop="name">Timezone</h3>
                                    <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                        itemtype="https://schema.org/Answer">
                                        <div class="dis-flex justify-sb ">
                                            <p>IST Full Shift (100% working in local timezone)</p>
                                            <p>No additional cost</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>AU / US Full Shift (100% working in local timezone)</p>
                                            <p>10% extra</p>
                                        </div>
                                        
                                        <div class="dis-flex justify-sb ">
                                            <p>AU / US Partial Shift (4 hours overlap with local timezone)</p>
                                            <p>5% extra</p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                    itemtype="https://schema.org/Question">
                                    <h3 class="faq-accordion-toggle" itemprop="name">Team Discount</h3>
                                    <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                        itemtype="https://schema.org/Answer">
                                        <div class="dis-flex justify-sb ">
                                            <p>3-10 members</p>
                                            <p>2.5% off</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>11-15 members</p>
                                            <p>5% off</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>15-25 members</p>
                                            <p>7.5% off</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>25+ members</p>
                                            <p>10% off</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                    itemtype="https://schema.org/Question">
                                    <h3 class="faq-accordion-toggle" itemprop="name">Advance Payment Discount</h3>
                                    <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                        itemtype="https://schema.org/Answer">
                                        <div class="dis-flex justify-sb ">
                                            <p>Quarterly payments</p>
                                            <p>2.5% off</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>Half-yearly payment</p>
                                            <p>5% off</p>
                                        </div>
                                        <div class="dis-flex justify-sb ">
                                            <p>Yearly payment</p>
                                            <p> 7.5% off</p>
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>

                    </section>-->
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

                                           <img class="dark-theme-img" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/valuecoders-logo-img.svg" alt="Logo" width="180" height="31">
                                            <img class="lighter-theme-img" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/valuecoders-logo-img-light.svg" alt="Logo" width="180" height="31">
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

                                            
                                            <img class="dark-theme-img" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/toptal-logo-img.svg" alt="Logo" width="86" height="27">
                                            <img class="lighter-theme-img" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/toptal-logo-img-light.svg" alt="Logo" width="86" height="27">
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
                                            <img class="dark-theme-img" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/upwork-logo-img.svg" alt="Logo" width="89" height="27">
                                            <img class="lighter-theme-img" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/upwork-logo-img-light.svg" alt="Logo" width="89" height="27">
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
                    <section class="tab-content" id="faq" itemscope itemtype="https://schema.org/FAQPage">
                        <div class="faq-section">
                            <h2>Frequently Asked Questions</h2>
                            <div class="dis-flex">

                                <div class="faq-outer flex-2">
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">How do you compare with freelance platforms like Upwork and other Indian software outsourcing companies?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>If you're looking for a reliable and cost-effective IT software outsourcing partner, you've probably come across a few options, including freelance platforms, viz. Upwork and other Indian software outsourcing companies. So, how is ValueCoders different from these platforms?
</p>                                
                                        <p><strong>ValueCoders is a better option than others for the following reasons:</strong></p>
                                        <ul>
                                            <li>Higher quality of work - Since ValueCoders is a selective platform and only works with top talent, the quality of work is much higher than what you would find on other platforms/companies.
</li>
     
     <li>Competitive rates - The rates at ValueCoders are much more affordable than what you would find on other platforms. We offer fixed-price contracts with no hidden fees. For this, you can refer to the above rate card.
</li>
<li>Focused specialization - With ValueCoders, you know that all the developers on the platform specialize in Android development, iOS development, web development, or any other area of expertise. This saves you time and money.
</li>
<li>Round-the-clock support - Our team is available 24/7 to help our clients with any issues they may have.
</li>
<li>Hassle-free experience - We take care of all the logistics so our clients can focus on their core business activities.
</li>
<li>Feedback Mechanism- We take weekly and monthly feedback from our clients to ensure things are on track.
</li>
</ul>
<p>We have been in business for over 17+ years, and during that time, we've worked with some of the biggest names in the industry. Our clients know that when they work with us, they get a team of experienced professionals who will get the job done right.
</p>
                                        </div></div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">How does the process work?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>Our software development process is based on the Agile methodology. We follow strict guidelines to ensure your project is completed on time and within budget. Our experienced developers have a proven track record of delivering quality software products.
</p>
                                            <p><strong>Here's a brief overview of how our process works:</strong></p>
                                            <ol>
                                                <li>We begin by understanding the requirements of the project. This includes understanding the business goals, objectives, and timelines.</li>
                                                <li>Once we clearly understand the project requirements, we create a detailed action plan. This plan includes a timeline, milestones, and deliverables.</li>
                                                <li>We then allocate resources and assign tasks to the team of developers.</li>
                                                <li>The software development process begins with the coding phase. Our developers write high-quality code that meets the requirements of the project.</li>
                                                <li> Once the code is complete, we test it to ensure that it is error-free and meets all the quality standards.</li>
                                                <li>The software is then deployed to the client’s server.</li>
                                                <li>We provide ongoing support and maintenance to ensure that the software is always up-to-date.</li>
                                                
                                                </ol>

                                                <p>We have a team of experienced developers dedicated to providing the best possible service. Contact us today to learn more about our software development services.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">How would I track productivity?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
<p>Once you outsource your project to our company, we will provide you with a detailed project report on a weekly basis. This report will include information on the number of hours worked on the project, as well as a list of tasks completed and their corresponding deadlines.
</p>
<p>You will also be able to view this report online via our secure client portal. Additionally, our team is available 24/7 to answer any questions or address any concerns you may have. We want you to be completely satisfied with the work we are doing for you.
</p>
<p>Moreover, there are a few different tools you can use to help track productivity. One is the productivity tracker, which can help you keep track of how much work is getting done and how productive employees are. Another tool you can use is a time tracking tool, which can help you see how many hours employees are working and how effective they are with their time.</p>
<p>You can also try using a combination of these methods to get a complete picture of productivity at Valuecoders. By using multiple methods, you can get a better idea of what works well and what could be improved.</p></div>

                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">How do you communicate?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>Once you've outsourced your project to ValueCoders, you'll need to communicate with our team to ensure that the project is progressing as planned. We offer a variety of communication packages, so you can choose the one that best fits your needs.
</p>
                                            <p><strong>Email:</strong> You can always email us with questions or updates on your project. We will respond as soon as possible.</p>
                                            <p><strong>Instant Messaging:</strong> We offer instant messaging for all of our clients. This is a great way to stay in touch with us and get quick answers to your questions.</p>
                                            <p><strong>Online Project Management System:</strong> Our online project management system is a great way to keep track of your project's progress. You can see what tasks have been completed and what still needs to be done, and you can even leave comments for us.</p>
                                            <p>However, we offer hourly, daily, and weekly packages. We also offer a monthly package for those who need to stay in touch with us regularly.</p>
                                            <p>No matter how you communicate with us, we will always be available to answer your questions and provide updates on your project. We want to make sure that you are always kept in the loop so that you can be confident in our work.
</p></div>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer " itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">Do you offer project based quotes?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>We understand that every business is unique and has different needs, so we work with our clients to create custom quotes based on their specific requirements. We strive to provide the best possible service and value for our clients, and we're always available to answer any questions they may have.
</p>
                                            <p>Yes, we offer project-based quotes. We provide customized quotes for each project based on the project requirements. This allows our clients to get the most accurate estimate of the project cost. Whether you need a simple project quote or a more complex one, we can help you get the best value for your money. We understand the importance of getting the right project quote and will work with you to ensure you get the best possible price.</p>
                                            <p>Please send us a message describing the project, and we will be happy to provide you with a quote.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">How experienced is your team?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>Our team is a group of highly experienced professionals working in the IT industry for 17+ years. We have a deep understanding of the latest technologies and trends and are constantly striving to stay ahead of the curve.
</p>
                                            <p>We are passionate about our work and committed to providing our clients with the best possible service. We believe that our experience and knowledge are the keys to success, and we always look for new ways to improve our skills. We are confident in our ability to deliver high-quality work and are always ready to go the extra mile to ensure that our clients are happy with the results.</p>
                                            <p>Our team has a wide range of experience in the field. We have worked on 4200+ projects using the latest as well as established technologies for several clients globally, in a variety of industries. We have the expertise and knowledge to handle your project from start to finish.
</p></div>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">How can I renew?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>We can help you renew your respective tenure if you want. One of our accountants will do it via online process or provide you with a paper copy of the new rates, effective immediately. 
</p>
                                            <p>Since the process depends on the type of rate card you have, so you'll need to contact our account manager to discuss renewal options if you have a monthly or yearly rate card. After this, you'll be able to continue using all of the features and benefits that come with it.
</p>
                                        <p>Do remember any changes made to your account will be subject to our standard terms and conditions. If you have any questions or concerns, please do not hesitate to contact us.</p>
                                    </div>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">Can I talk to the developer(s) directly?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>Connecting with developers is important because it allows you to get feedback on your project, helps you find bugs, and also allows you to build a community around your project. It lets you keep track of changes made to your project, which is important for keeping your project up-to-date. It also allows you to get help when you need it, and it can also help you find new features or ideas for your project.</p>
                                            <p>Once you outsource your project to ValueCoders, you can easily connect with developers directly through our online platform. Our platform enables seamless communication between clients and developers so that you can start your project immediately. Our developers are highly skilled and experienced, so you can be confident that your project is in good hands.</p>
                                            <p>Moreover, you can use other platforms, such as GitHub, Stack Overflow, etc., to connect with our developers. Whatever method you use, make sure you connect with developers interested in your project and have the skill set you need. Connect with us today to get started on your next project.
</p></div>    
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">What if I need more than 160 hours?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>If you find that you need more than the 160 hours of development time that our rate card offers, don't worry - we can still help. We would be happy to discuss your project and see if it is a good fit for our team. Depending on the project, we will assign more than one developer.
</p>
                                            <p>There are a few ways to hire additional developers from us, even if the project exceeds the limit on our rate card.
</p>
<p>First, we offer discounts for projects that require more than 160 hours of development time. Simply contact us and let us know how many hours you need, and we'll provide a custom quote based on our current rates.</p>
<p>Second, if you have an ongoing project that regularly exceeds 160 hours, we can set up a retainer agreement. This means that you pay a fixed monthly fee for a certain number of hours of development time, and any hours over the limit are billed at a discounted rate. This is a great way to get the most bang for your buck if you know you'll need more than 160 hours of development time on a regular basis.</p>
<p>Lastly, we'll simply bill you for the additional hours at our standard hourly rate.</p>
<p>So, if you need more than 160 hours of development time, don't hesitate to reach out - we are here to help!
</p></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="faq-outer flex-2">
                                    <div class="faq-accordion-item-outer " itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">Do you also offer skills such as testing/quality assurance, UI/UX designing, and business analysis?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>Yes, we offer technical skill hiring for testing/quality assurance, UI/UX designing, and business analysis. We firmly believe that no project is complete without quality assurance, so all of our team members are trained and experienced in this critical area. Similarly, we understand the importance of user experience and work hard to ensure that all of our projects meet or exceed customer expectations in this regard.
</p>
                                            <p>We have a team of highly skilled professionals who can provide the best services for your project needs. We specialize in finding and vetting developers with the skills your business needs, whether it's for a short-term project or long-term growth. We also offer a money-back satisfaction guarantee, so if you're not happy with the results, you can get your money back.
</p></div>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">What if I am not satisfied with the work done?
                                        </h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>We always strive for complete satisfaction with our client's projects. However, if you are not satisfied with the work done by our team, we want to know at which stage you are facing issues. Our goal is always to satisfy our clients and deliver quality work.
</p>
                                            <p><strong>Here's what you can do if you're not happy with the work:</strong></p>

 
                    <ol>
                        <li>Talk to your project manager. They'll be able to address your concerns and ensure that the team is on track.</li>
                        <li>If you're still unsatisfied, we'll work with you to make changes to the project until you are happy with the results. We want you to be happy with our work, and we'll do whatever it takes to make that happen.</li>
                        <li>We would surely replace the engineer or specific team to serve you best.We value your feedback and want to ensure that you are completely satisfied with our service. Thank you for choosing our team.
</li>
                    </ol></div>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">What is your refund (money back guarantee) policy?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                        <div itemprop="text">    
                                        <p>At ValueCoders, we want all of our clients to be happy with the work we do for them. If you are unsatisfied with the project, our Feedback & Escalation Management team connects with you for its quick resolution.</p>
                                        <p>We want you to be confident in our abilities and know that we stand behind your work. So if you're not happy, simply let us know, and we'll make it right. That's our guarantee to you.</p>
                                        <p>Yes, we provide a project satisfaction guarantee - if you're unhappy with the project's progress, just drop a mail at sales@valuecoders.com.We want you to be 100% satisfied with your purchase. Our team is always available to help if you have any questions or concerns.</p>
                                        <p>Please note that we do not offer refunds but once escalation comes from you, we take full responsibility for handling all issues. </p>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">How does your payment work?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>At ValueCoders, we work on a very simple and efficient payment model for hiring software developers. We have a team of dedicated developers as well as a team who work on an hourly basis. Hence, you can pay them hourly or choose monthly options. </p>
                                            <p>For dedicated, if the client needs trial or wants to discuss pricing on a post-paid basis then it's dependent upon several factors like no. of developers assigned OR duration of engagement, etc. However, it is suggested to connect with our sales person or schedule a “call back” feature for further clarification.</p>
                                            <p>We have an NDA (Non-Disclosure Agreement) policy in place so that your intellectual property remains protected.  Moreover, we use a highly encrypted system to keep your information safe and secure, so you can be sure that your payment will reach its destination safely.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer " itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">How can I pay?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>The most common way is to pay via Bank Transfer (INDIA & INTL both). You can also opt for Transferwise & other payment options. For this, you need to connect with our sales team at <a href="mailto:sales@valuecoders.com">sales@valuecoders.com </a></p>
                                            <p>Our hourly & dedicated rates vary depending on the developer's skillset, but you can expect to pay somewhere between <strong>US $25 to US $50 per hour</strong>. It could reach <strong>US $2000 to US $6000</strong> as per the project complexity and developer’s experience. </p>
                                            <p>If you're looking to hire a developer for long-term, you can pay a monthly retainer fee. This will give you access to developers for a certain number of hours each month and is typically a better option than paying hourly or per project.</p>
                                            <p>We accept payments via bank transfer, PayPal, and credit card (Visa, Mastercard, and American Express). If you have any questions about our payment process, please don't hesitate to contact us at <a href="https://www.valuecoders.com/contact">https://www.valuecoders.com/contact</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">Can I buy < 40 hours block?</h3>
                                                <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                                    itemtype="https://schema.org/Answer">
                                                    <div itemprop="text">
                                                    <p>Our hourly rates for talent solutions start at 40 hours. If you need less than 40 hours, we recommend that you try one of our other services. We also offer <strong>pay-as-you-go</strong> developer hiring services, so you can pay for only what you need.
</p>
                                                    <p>If you require less than 40 hours of development work, you can purchase a block of time from our team of expert developers. This way, you only pay for the development work that you need and can scale up or down as your business needs change.
</p>
<p>To learn more about our pay-as-you-go developer hiring services, contact us today. We'll be happy to discuss your specific needs and provide a custom quote.</p></div>
                                                </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">Is there a minimum contract duration?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>At ValueCoders, we believe that our clients should only be committed for as long as they need our services. We do not have a minimum contract duration, and clients are free to discontinue our services at any time.
</p>
                                            <p>However, we do require a minimum commitment of two weeks for all new clients. This allows us to get a better understanding of your specific needs and tailor our services to better suit you. This is also to protect our clients from any unforeseen issues that may come up within the first few weeks or months of working together. We want to be sure that our clients are happy with our work and that we can deliver on our promises.
</p>
<p>After the initial two-week period, you are free to discontinue our services at any time with no minimum contract duration required.</p></div>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle" itemprop="name">In the case of dedicated hires, what is your leave policy?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <div itemprop="text">
                                            <p>We understand that our dedicated hires may need to take time off for personal or professional reasons. We have a leave policy in place to accommodate these needs.</p>
                                            <p>Dedicated hires are provisioned with 1 leave per month. The developers have to intimate the client beforehand, all efforts are made to avoid unplanned or sudden leaves. Prior approval of client is also taken while approving any leaves of the developers.</p>
                                            <p>They provide the client with the leave request well in advance to avoid inconvenience. Dedicated hires use their leave responsibly and do not abuse the leave policy as they know that any such leave abuse will result in disciplinary action, including termination of employment.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <section class="download-section tab-content" id="download">
                        <div class="rate-container">
                            <div class="head-box">
                                    <h2>Download Rate Card</h2>
                                    <p>To download, help us understand your requirements so that we can match your expectations and send the best pricing.</p>
                                </div>
                          <form class="detail-form"  method="POST" id="contact-form-section">
                                

                                <div class="dis-flex detail-form-outer">

                                    <div class="input-box-outer">
                                        <div class="input-box">
                                            <input type="text"  placeholder="Full Name*"
                                                class="input-field" id="fcont_name" name="fullname" maxlength="50" value=""/>
                                            <label>Full Name*</label>
                                            <small></small>
                                        </div>
                                    </div>
                                    <div class="input-box-outer">
                                        <div class="input-box">
                                            <input type="text"
                                                placeholder="Email Address*" id="fcont_email" class="input-field" value=""
                                                name="email" />
                                            <label>Email Address*</label>
                                            <small></small>
                                            <!--<small>incorrect email</small>-->
                                        </div>
                                    </div>

                                    <div class="input-box-outer">
                                        <div class="input-box">
                                            <input type="text" class="input-field" id="cont_phpne" maxlength="12" placeholder="Phone No.*" value=""
                                                name="cont_phpne" />
                                            <label>Phone No.*</label>
                                            <small></small>
                                        </div>
                                    </div>
                                    <!--<div class="input-box-outer">
                                        <div class="input-box input-select-box">
                                            <label>What is your budget with this particular hire?*</label>
                                            <select id="budget" name="budget">
                                                <option value="Less than $3000/month">Less than $3000/month</option>
                                                <option value="More than $3000/month">More than $3000/month</option>
                                            </select>
                                        </div>
                                    </div>-->
                                    <div id="exp-date-row" class="input-box-outer input-select-box">
                                        <label>What is your budget with this particular hire?*</label>
                                        <div class="select-box active input-field" onclick="apnSelect('exp-date-row');">
                                            <a href="javascript:void(0);" id="label-expdate" class="select-first">Less than $3000/month</a> 
                                            <span class="arrow-btn"></span>
                                        </div>
                                        <div class="select-list">
                                            <ul class="in-options">
                                                <li onclick="setoptValue('Less than $3000/month', 'sub-opt', 'label-expdate', 'exp-date-row');">Less than $3000/month</li>
                                                <li onclick="setoptValue('More than $3000/month', 'sub-opt', 'label-expdate', 'exp-date-row');">More than $3000/month</li>
                                                
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="input-box-outer width-full textarea-box">
                                        <div class="input-box">
                                            <textarea class="input-field" id="fuser-req" placeholder="(You can add links to shareable materials if any)" name="requirement"></textarea>
                                            <label>Share your requirements*</label>
                                            <small></small>
                                        </div>
                                    </div>
                                    <!-- Quiz -->
                                    <div class="form-quiz-group">
                                        <div class="quizQ">
                                            <span id="f-quizz"></span>
                                            <a href="javascript:void(0)" class="refreshbtn"
                                                onclick="fgenerateWsQuizz();"></a>
                                        </div>
                                        <span class="equal">=</span>
                                        <div class="quizAns">
                                            <input type="text" name="captcha" placeholder="??" id="f-quiz-ans"
                                                onkeypress="fcap_limit(event,this);">
                                            <span class="error" id="fcaptchaerror"></span>
                                        </div>
                                    </div>
                                    <input type="hidden" id="budgets" name="budget" value="Less than $3000/month">
                                    <input type="hidden" name="is-submitted" value="true" id="checkajax">
                                    <input type="button" class="download-submit" value="submit" id="downloadbutton" onclick="vcCmnDownloadFormValidation()">
                                </div>
                            </form>
                            <!-- pop -->
                            <div class="pop-mail-box popnone" id="popmail">
                                <span class="pop-close" id="popclose"></span>
                                <div class="inner-mail-box">
                                    <picture>
                                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/email-sent-icon.webp">
                                        <source type="image/png" srcset="<?php echo get_template_directory_uri(); ?>/images/email-sent-icon.png">
                                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/email-sent-icon.svg" alt="Valuecoders" width="92" height="82">
                                    </picture>
                                    <h3>Check your mailbox, please.</h3>
                                    <p class="clr-gray">You might have received the mail with the subject line-</p>
                                    <p>“ Access your Rate Card from Valuecoders ”</p>
                                    <p class="clr-gray">We will keep your information safe. Feel free to contact us with any questions at</p>
                                    <p><a href="mailto:hello@valuccoders.com">sales@valuccoders.com</a></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--<section class="get-in-touch-section tab-content" id="get-in-touch">
                        <div class="rate-container">
                            <div class="dis-flex">
                                <div class="left-box">
                                    <h2>Get In Touch</h2>
                                    <p>Place your order with us and become eligible for instant discounts as per the add-ons!</p>
                                    <p>If you have any questions or want to hire talent/s for your project, get on a call with our consultants. We answer all business inquiries, understand your project requirements and align the fittest profiles for further screening by you.</p>
                                    
                                </div>
                                <div class="right-box">
                                    <a href="#order" class="rate-btn">Order Now</a>
                                    <span class="block or">or</span>
                                    <a href="https://www.valuecoders.com/contact" class="rate-btn rate-btn-white" target="_blank">Schedule a call with a consultant</a>
                                    <span class="block">Get guaranteed response within 8 Hrs.</span>
                                </div>
                            </div>
                        </div>
                    </section>-->
                    <!--<section class="order-section tab-content" id="order">

                        <div class="rate-container">

                            <div class="dis-flex step-outer">
                                <div id="step1" class="step active">
                                    <span class="circle"></span>
                                    <span class="step-text">Step 1 <br>
                                        (Choose your options)</span>
                                </div>
                                <div id="step2" class="step">
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
                                    <input type="hidden" id="clickCount" value="0">
                                        <div id="content">
                                        <div id="hire-box-section-0" data-linkeditem="hire-box-0" class="hire-box">
                                            <div class="tech-box">
                                                <label class="label">Technology</label>
                                                
                                                <div class="select-option-box">
                                                    <select class="technology-box" id="hire-tech-select-0" name="technology[]" onchange="resetTime(0)" onclick="changeFunc(0);">
                                                        <option value="" disabled selected>Select the technology</option>
                                                        
                                                    </select>
                                                </div>
												<a  href="https://www.valuecoders.com/contact" target="_blank" class="form-caption">Need Help<span>,</span> Get in Touch!</a>
                                            </div>
                                            <div class="time-box">
                                                <span class="title">Hire For</span>
                                                <div class="hire-for" id="hire-for-0">
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
                                                
                                                <span class="form-caption">(160 hrs per month)</span>
                                            </div>
                                            <div id="multiselect_0" class="multiselect" style="display:none;"> 
                                                <div class="select-option-box">
                                                    <label class="label">Experience</label>
                                                    <select id="multiselect_dedicated_developer-0" name="multiselect_dedicated_developer[]" onchange="checkHour(160,0)">
                                                        <option value="" disabled selected> Select The Developer</option>
                                                        <option value="2200" data-hourly-price="2200" selected>Junior Level (1-3 Years Experienced)</option>
                                                        <option value="2800" data-hourly-price="2800">Mid Level (4-5 Years Experienced)</option>
                                                        <option value="3600" data-hourly-price="3600">Senior Level (5-7 Years Experienced)</option>
                                                        <option value="4500" data-hourly-price="4500">Technical Lead (8+ Years Experienced)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="hire-btn add-btn add-btn-0" onclick="addRow(0)"></div>
                                            <input class="hire-btn remove-btn remove-btn-0" style="display:none;" data-id="0" onclick="removeRow(this)">
                                        </div>
                                        </div> -->

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
                                    <!--</form>

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
                                                    <input type="text"  pattern="^[a-zA-Z0-9-]" maxlength="50" name="firstName" id="first_name" placeholder="First Name" class="input-field" onkeypress="return ValidateName(event,'lblError_firstname','firstName');" value="" required />
                                                    <label>First Name</label>
                                                    <small class="error-msg-section" id="lblError_firstname"></small>
                                                </div>
                                            </div>
                                            <div class="input-box-outer">
                                                <div class="input-box">
                                                    <input type="text"  pattern="^[a-zA-Z0-9-]" maxlength="50" name="lastname" id="last_name" placeholder="Last Name"
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
                                                        name="cont_phone" id="phone_no" maxlength="10"  required />
                                                    <label>Phone</label>
                                                    <small class="error-msg-section" id="lblError_phone"></small>
                                                </div>
                                            </div>
                                            <div class="input-box-outer">
                                                <div class="input-box">
                                                    <input type="text" pattern="^[a-zA-Z0-9-]" maxlength="25" class="input-field" placeholder="Country"
                                                        value="" name="cont_country" id="country" onkeypress="return ValidateName(event,'lblError_country','cont_country');" required/>
                                                    <label>Country</label>
                                                    <small class="error-msg-section" id="lblError_country"></small>
                                                </div>
                                            </div>
                                            <div class="input-box-outer">
                                                <div class="input-box">
                                                    <input type="text" class="input-field" maxlength="15"  placeholder="Tax ID" value=""
                                                        name="cont_tax" id="txt_id" onkeypress="return Validatetaxid(event,'lblError_tax','cont_tax');"/>
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

                                            
                                            <div class="dis-flex order-list">
                                                <span class="order-number" id="orderno">
                                                    N/A
                                                </span>
                                            </div>

                                            
                                            <div class="dis-flex order-list selected-tech">
                                                <ul id="selected-tech-list">
                                                    <li id="hire-box-0" style="display:none">
                                                        <span id="hire-tech-0" class="order-number order-tech-name">
                                                            01. .NET (80 hrs @ $27/hr)
                                                        </span>
                                                        <span id="tech-hour-price-0" class="order-price" id="order-price">
                                                            $0
                                                        <span class="close"></span>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>-->

                                            <!-- Add Ons -->
                                            <!--<div class="add-ons">
                                                <label>Add Ons</label>
                                                <span class="checkbox">
                                                    <input id="add-on-checkbox" type="checkbox" name="addons" value="addons" onclick="myFunction()">
                                                    <span class="checkmark"></span>
                                                </span>
                                            </div>-->

                                            <!-- Add Ons Selector-->
                                            <!---<div class="add-ons-selector-outer" style="display: none;" id="adonsouter1">
                                                <div class="add-ons-selector">
                                                    <div class="select-option-box">
                                                <label>Timezone</label>
                                                
                                                    <select id="add-ons-selector-section1" class="add-ons-selector-section" name="add-ons-selector-options" onchange="addOnSelector(this)">
                                                        <option value="0" data-extra-price="0" disabled selected>Select The Time Zone</option>
														<option value="IST Full Shift (100% working in local timezone)" data-extra-price="0">IST Full Shift (100% working in local timezone)</option>
														<option value="AU / US Full Shift (100% working in local timezone)" data-extra-price="10" >AU / US Full Shift (100% working in local timezone)</option>
                                                        <option value="AU / US Partial Shift (4 hours overlap with local timezone)" data-extra-price="5">AU / US Partial Shift (4 hours overlap with local timezone)</option>
                                                        
                                                        
                                                    </select>
                                                

												</div>

                                                <span class="price">
                                                    <span id="add-on-order-extraPrice"  class="add-on-order-price" name="add-ons-selector-options">
                                                        $0
                                                        
                                                    </span>
                                                </span>


                                            </div>
                                            </div>-->
											
											<!---<div class="add-ons-selector-outer" style="display: none;" id="adonsouter2">
                                                <div class="add-ons-selector">
                                                    <div class="select-option-box">
                                                <label>Team Discount</label>
                                                
                                                    <select id="add-ons-selector-section2" class="add-ons-selector-section" name="add-ons-teamdiscount-selector-options" onchange="addOndiscountSelector(this)">
                                                        <option value="0" data-extra-price="0" disabled selected>Select The Team Discount</option>
                                                        <option value="3-10 members" data-extra-price="2.5">3-10 members</option>
                                                        <option value="11-15 members" data-extra-price="5">11-15 members</option>
                                                        <option value="15-25 members" data-extra-price="7.5">15-25 members</option>
                                                        <option value="25+ members" data-extra-price="10">25+ members</option>
                                                    </select>
                                                

												</div>

                                                <span class="price">
                                                    <span id="add-on-order-discount-extraPrice"  class="add-on-order-discount-price">
                                                        $0
                                                       
                                                    </span>
                                                </span>


                                            </div>
                                            </div>-->
                                            
                                           <!---<div class="add-ons-selector-outer" style="display: none;" id="adonsouter3">
                                                <div class="add-ons-selector">
                                                    <div class="select-option-box">
                                                <label>Advance Payment Discount</label>
                                                
                                                    <select id="add-ons-selector-section3" class="add-ons-selector-section" name="addons-advancediscount" onchange="addOnadvancediscountSelector(this)">
                                                        <option value="0" data-extra-price="0" disabled selected>Select The Advance Payment Discount</option>
                                                        <option value="Quarterly payments" data-extra-price="2.5">Quarterly payments</option>
                                                        <option value="Half-yearly payment" data-extra-price="5">Half-yearly payment</option>
                                                        <option value="Yearly payment" data-extra-price="7.5">Yearly payment</option>
                                                        
                                                    </select>
                                                

												</div>

                                                <span class="price">
                                                    <span id="add-on-order-adiscount-extraPrice"  class="add-on-order-adiscount-price">
                                                        $0
                                                        
                                                    </span>
                                                </span>


                                            </div>
                                            </div>--->
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
                                        <!--</div>

                                        <div class="total-price-box">
                                            <span class="total-txt">Total</span>
                                            <span id="finalPrice" data-total-price="0" class="total-price">$0</span>
                                        </div>
                                        <input type="hidden" name="addonteamdisc" value="" id="add-on-discount">
                                        <input type="hidden" name="teamdisc" value="" id="teamdisc">
                                        <input type="hidden" name="addonadteamdisc" value="" id="add-on-advancediscount">
										<input type="hidden" name="teamadisc" value="" id="teamadisc">
                                        <input type="hidden"  id="addon-timezone-extraprice" name="timezoneprice" class="orderFormData" value="">
                                        <input type="hidden"  id="add-on-timeset" name="timeset" class="orderFormData" value="">
                                        <input type="hidden" id="orderFormData" name="orderFormData" class="orderFormData" value="">
										<input type="hidden" id="orderFormData1" name="orderFormDatas" class="orderFormData" value="">
										<input type="hidden" id="orderFormData2" name="orderFormDatass" class="orderFormData" value="">
                                        <input type="button" id="continue-btn" class="rate-btn continue-btn disabl" onclick="getTechData(this.id)" value="Continue" disabled>
                                        <input type="button" id="submit-btn" class="rate-btn submit-btn" onclick="getTechData(this.id)" value="Submit" style="display: none;">
                                         <div id="paymentResponse"></div>

                                    </form>

                                    <div class="order-footer">
                                        <div class="order-text">
                                            <span>Non Disclosure<br> Agreement</span>
                                            <span>24X7 <br>Support</span>
                                            <span class="has-free-trial">100% Money Back<br> Guaranteed</span>
                                        </div>
                                        <div class="order-logo">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/order-footer-logo.png" alt="Valuecoders">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
            </div>
        </div>
    </section>-->

	
    <div class="free-trail-pop-up rate-pop-up">
        <div class="pop-up-inner">
            <span class="pop-close"></span>
            <div class="pop-up-box">
                <h2><img src="<?php echo get_template_directory_uri(); ?>/images/money-icon.png" alt="Icon"> 100% Money Back Guaranteed</h2>
                <p>We offer a 100% money back guarantee for complete peace of mind. You may request a refund if:</p>
                <ul>
                    <li>Your request to cancel is received before the team is mobilised.</li>
                    <li>You are not satisfied with the final product.</li>
                </ul>

                <p>Please note:</p>
                <ul>
                    <li>No refund will be applicable if the files are committed / uploaded on client server/repository or shared with the client.</li>
                    <li>Pro-rated refund may apply in case of fixed cost projects based on the effort/time invested.</li>
                </ul>
            </div>
        </div>
    </div>
   
<script src='<?php echo get_template_directory_uri(); ?>/js/rate-card.js'></script>
<script src='<?php echo get_template_directory_uri(); ?>/js/ratecard-download-form.js'></script>
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
    
    .select-option-box select option{
        color: #000;
        cursor: pointer;
        user-select: none;
        padding: 15px;
        border-bottom: 1px #a9b1be solid;
        font-size: 14px;
    }
    .disabl{pointer-events: none;
	cursor: not-allowed;}
	.popnone{display:none;}
</style>
