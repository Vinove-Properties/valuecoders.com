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
                                    <h3 class="faq-accordion-toggle">Advance Payment Discount</h3>
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
                                        <h3 class="faq-accordion-toggle">How do you compare with freelance platforms like Upwork and other Indian software outsourcing companies?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>If you're looking for a reliable and cost-effective IT software outsourcing partner, you've probably come across a few options, including freelance platforms, viz. Upwork and other Indian software outsourcing companies. So, how does ValueCoders compare?
</p>                                
                                        <p><strong>ValueCoders is a better option than others for the following reasons:</strong></p>
                                        <ul>
                                            <li>Higher quality of work - Since ValueCoders is a selective platform and only works with top talent, the quality of work is much higher than what you would find on other platforms/companies.
</li>
     
     <li>Higher quality of work - Since ValueCoders is a selective platform and only works with top talent, the quality of work is much higher than what you would find on other platforms/companies.
</li>
<li>Higher quality of work - Since ValueCoders is a selective platform and only works with top talent, the quality of work is much higher than what you would find on other platforms/companies.
</li>
<li>Focused specialization - With ValueCoders, you know that all the developers on the platform specialize in Android development, iOS development, web development, or any other specific area of expertise. This saves you time and money.
</li>
<li>Round-the-clock support - Our team is available 24/7 to help our clients with any issues they may have.
</li>
<li>Hassle-free experience - We take care of all the logistics so that our clients can focus on their core business activities.
</li>
</ul>
<p>The company has been in business for over 17+ years, and during that time, we've worked with some of the biggest names in the industry. Our clients know that when they work with us, they get a team of experienced professionals who will get the job done right.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How does the process work?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Our software development process is based on the Agile methodology. Our agile process is designed to ensure that our clients receive a quality product that meets their needs and expectations. We follow strict guidelines to ensure that your projects are completed on time and within budget. Our experienced developers have a proven track record of delivering quality software products.
</p>
                                            <p><strong>Here's a brief overview of how our process works:</strong></p>
                                            <ol>
                                                <li>We begin by understanding the requirements of the project. This includes understanding the business goals, objectives, and timelines.</li>
                                                <li>Once we clearly understand the project requirements, we create a detailed plan of action. This plan includes a timeline, milestones, and deliverables.</li>
                                                <li>We then allocate resources and assign tasks to the team of developers.</li>
                                                <li>The software development process begins with the coding phase. Our developers write high-quality code that meets the requirements of the project.</li>
                                                <li>Once the code is complete, we test it to ensure that it is error-free and meets all the quality standards.</li>
                                                <li>The software is then deployed to the client’s server.</li>
                                                <li>We provide ongoing support and maintenance to ensure that the software is always up-to-date.</li>
                                                </ol>

                                                <p>We have a team of experienced developers dedicated to providing the best possible service. Contact us today to learn more about our software development services.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How would I track productivity?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
<p>Once you outsource your project to our company, we will provide you with a detailed project report on a weekly basis. This report will include information on the number of hours worked on the project, as well as a list of tasks completed and their corresponding deadlines.
</p>
<p>You will also be able to view this report online via our secure client portal. Additionally, our team is available 24/7 to answer any questions or address any concerns you may have. We want you to be completely satisfied with the work we are doing for you.
</p>
<p>Moreover, there are a few different tools you can use to help track productivity. One is the productivity tracker, which can help you keep track of how much work is getting done and how productive employees are. Another tool you can use is a time tracking tool, which can help you see how many hours employees are working and how effective they are with their time.</p>
<p>You can also try using a combination of these methods to get a complete picture of productivity at Valuecoders. By using multiple methods, you can get a better idea of what works well and what could be improved.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How do you communicate?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Once you've outsourced your project to ValueCoders, you'll need to communicate with our team to ensure that the project is progressing as planned. We offer a variety of communication packages, so you can choose the one that best fits your needs.
</p>
                                            <p><strong>Email:</strong> You can always email us with questions or updates on your project. We will respond as soon as possible.</p>
                                            <p><strong>Instant Messaging:</strong> We offer instant messaging for all of our clients. This is a great way to stay in touch with us and get quick answers to your questions.</p>
                                            <p><strong>Online Project Management System:</strong> Our online project management system is a great way to keep track of your project's progress. You can see what tasks have been completed and what still needs to be done, and you can even leave comments for us.</p>
                                            <p>However, we offer hourly, daily, and weekly packages. We also offer a monthly package for those who need to stay in touch with us regularly.</p>
                                            <p>No matter how you communicate with us, we will always be available to answer your questions and provide updates on your project. We want to make sure that you are always kept in the loop so that you can be confident in our work.
</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer " itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">Do you offer project based quotes?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>We understand that every business is unique and has different needs, so we work with our clients to create custom quotes based on their specific requirements. We strive to provide the best possible service and value for our clients, and we're always available to answer any questions they may have.
</p>
                                            <p>Yes, we offer project-based quotes. We provide customized quotes for each project based on the project requirements. This allows our clients to get the most accurate estimate of the project cost. Whether you need a simple project quote or a more complex one, we can help you get the best value for your money. We understand the importance of getting the right project quote and will work with you to ensure you get the best possible price.</p>
                                            <p>Please send us a message describing the project, and we will be happy to provide you with a quote.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How experienced is your team?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Our team is a group of highly experienced professionals working in the IT industry for 17+ years. We have a deep understanding of the latest technologies and trends and are constantly striving to stay ahead of the curve.
</p>
                                            <p>We are passionate about our work and committed to providing our clients with the best possible service. We believe that our experience and knowledge are the keys to success, and we always look for new ways to improve our skills. We are confident in our ability to deliver high-quality work and are always ready to go the extra mile to ensure that our clients are happy with the results.</p>
                                            <p>Our team has a wide range of experience in the field. We have worked on 4200+ projects using the latest as well as established technologies for several clients globally, in a variety of industries. We have the expertise and knowledge to handle your project from start to finish.
</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How can I renew?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>We can help you renew your respective tenure if you want. One of our accountants will do it via online process or provide you with a paper copy of the new rates, effective immediately. 
</p>
                                            <p>Since the process depends on the type of rate card you have, so you'll need to contact our account manager to discuss renewal options if you have a monthly or yearly rate card. After this, you'll be able to continue using all of the features and benefits that come with it.
</p>
                                        <p>Do remember any changes made to your account will be subject to our standard terms and conditions. If you have any questions or concerns, please do not hesitate to contact us.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">Can I talk to the developer(s) directly?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Connecting with developers is important because it allows you to get feedback on your project, helps you find bugs, and also allows you to build a community around your project. It lets you keep track of changes made to your project, which is important for keeping your project up-to-date. It also allows you to get help when you need it, and it can also help you find new features or ideas for your project.</p>
                                            <p>Once you outsource your project to ValueCoders, you can easily connect with developers directly through our online platform. Our platform enables seamless communication between clients and developers so that you can start your project immediately. Our developers are highly skilled and experienced, so you can be confident that your project is in good hands.</p>
                                            <p>Moreover, you can use other platforms, such as GitHub, Stack Overflow, etc., to connect with our developers. Whatever method you use, make sure you connect with developers interested in your project and have the skill set you need. Connect with us today to get started on your next project.
</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">What if I need more than 160 hours?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>If you find that you need more than the 160 hours of development time that our rate card offers, don't worry - we can still help. We would be happy to discuss your project and see if it is a good fit for our team. Depending on the project, we will assign more than one developer.
</p>
                                            <p>There are a few ways to hire additional developers from us, even if the project exceeds the limit on our rate card.
</p>
<p>First, we offer discounts for projects that require more than 160 hours of development time. Simply contact us and let us know how many hours you need, and we'll provide a custom quote based on our current rates.</p>
<p>Second, if you have an ongoing project that regularly exceeds 160 hours, we can set up a retainer agreement. This means that you pay a fixed monthly fee for a certain number of hours of development time, and any hours over the limit are billed at a discounted rate. This is a great way to get the most bang for your buck if you know you'll need more than 160 hours of development time on a regular basis.</p>
<p>Lastly, we'll simply bill you for the additional hours at our standard hourly rate.</p>
<p>So, if you need more than 160 hours of development time, don't hesitate to reach out - we are here to help!
</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="faq-outer flex-2" itemscope itemtype="https://schema.org/FAQPage">
                                    <div class="faq-accordion-item-outer " itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">Do you offer skills such as testing/quality assurance, UI/UX designing, and business analysis also?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>Yes, we offer technical skill hiring for testing/quality assurance, UI/UX designing, and business analysis. We firmly believe that no project is complete without quality assurance, so all of our team members are trained and experienced in this critical area. Similarly, we understand the importance of user experience and work hard to ensure that all of our projects meet or exceed customer expectations in this regard.
</p>
                                            <p>We have a team of highly skilled professionals who can provide the best services for your project needs. We specialize in finding and vetting developers with the skills your business needs, whether it's for a short-term project or long-term growth. We also offer a money-back satisfaction guarantee, so if you're not happy with the results, you can get your money back.
</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">What if I am not satisfied with the work done?
                                        </h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>We always strive for complete satisfaction with our client's projects. However, if you are not satisfied with the work done by our team, we want to know at which stage you are facing issues. Our goal is to always satisfy our clients and deliver quality work.
</p>
                                            <p><strong>Here's what you can do if you're not happy with the work:</strong></p>

 
                    <ol>
                        <li>Talk to your project manager. They'll be able to address any concerns you have and make sure that the team is on track.</li>
                        <li>If you're still not satisfied, we'll work with you to make changes to the project until you are happy with the results. We want you to be happy with the work we've done, and we'll do whatever it takes to make that happen.</li>
                        <li>We would surely replace the engineer or specific team to serve you best.</li>
                        <li>We value your feedback and want to ensure that you are completely satisfied with the service we provide. Thank you for choosing our team.</li>
                    </ol>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">What is your refund (money back guarantee) policy?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                        <p>At ValueCoders, we want all of our clients to be happy with the work we do for them. If you are unsatisfied with the project, our Feedback & Escalation Management team connects with you for its quick resolution.</p>
                                        <p>We want you to be confident in our abilities and know that we stand behind your work. So if you're not happy, simply let us know, and we'll make it right. That's our guarantee to you.</p>
                                        <p>Yes, we provide a project satisfaction guarantee - if you're unhappy with the project's progress, just drop a mail at sales@valuecoders.com.We want you to be 100% satisfied with your purchase. Our team is always available to help if you have any questions or concerns.</p>
                                        <p>Please note that we do not offer refunds but once escalation comes from you, we take full responsibility for handling all issues. </p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How does your payment work?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>At ValueCoders, we work on a very simple and efficient payment model for hiring software developers. We have a team of dedicated developers as well as a team who work on an hourly basis. Hence, you can pay them hourly or choose monthly options. </p>
                                            <p>For dedicated, if the client needs trial or wants to discuss pricing on a post-paid basis then it's dependent upon several factors like no. of developers assigned OR duration of engagement, etc. However, it is suggested to connect with our sales person or schedule a “call back” feature for further clarification.</p>
                                            <p>We have an NDA (Non-Disclosure Agreement) policy in place so that your intellectual property remains protected.  Moreover, we use a highly encrypted system to keep your information safe and secure, so you can be sure that your payment will reach its destination safely.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer " itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">How can I pay?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>The most common way is to pay via Bank Transfer (INDIA & INTL both). You can also opt for Transferwise & other payment options. For this, you need to connect with our sales team at <a href="mailto:sales@valuecoders.com">sales@valuecoders.com </a></p>
                                            <p>Our hourly & dedicated rates vary depending on the developer's skillset, but you can expect to pay somewhere between <strong>US$25 to US$50 per hour</strong>. It could reach <strong>US$25US$2000 to US$6000</strong>US$25 as per the project complexity and developer’s experience. </p>
                                            <p>If you're looking to hire a developer for long-term, you can pay a monthly retainer fee. This will give you access to developers for a certain number of hours each month and is typically a better option than paying hourly or per project.</p>
                                            <p>We accept payments via bank transfer, PayPal, and credit card (Visa, Mastercard, and American Express). If you have any questions about our payment process, please don't hesitate to contact us at <a href="https://www.valuecoders.com/contact">https://www.valuecoders.com/contact</a></p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">Can I buy < 40 hours block?</h3>
                                                <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                                    itemtype="https://schema.org/Answer">
                                                    <p>Our hourly rates for talent solutions start at 40 hours. If you need less than 40 hours, we recommend that you try one of our other services. We also offer <strong>pay-as-you-go</strong> developer hiring services, so you can pay for only what you need.
</p>
                                                    <p>If you require less than 40 hours of development work, you can purchase a block of time from our team of expert developers. This way, you only pay for the development work that you need and can scale up or down as your business needs change.
</p>
<p>To learn more about our pay-as-you-go developer hiring services, contact us today. We'll be happy to discuss your specific needs and provide a custom quote.</p>
                                                </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">Is there a minimum contract duration?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>At ValueCoders, we believe that our clients should only be committed for as long as they need our services. We do not have a minimum contract duration, and clients are free to discontinue our services at any time.
</p>
                                            <p>However, we do require a minimum commitment of two weeks for all new clients. This allows us to get a better understanding of your specific needs and tailor our services to better suit you. This is also to protect our clients from any unforeseen issues that may come up within the first few weeks or months of working together. We want to be sure that our clients are happy with our work and that we can deliver on our promises.
</p>
<p>After the initial two-week period, you are free to discontinue our services at any time with no minimum contract duration required.</p>
                                        </div>
                                    </div>
                                    <div class="faq-accordion-item-outer" itemscope itemprop="mainEntity"
                                        itemtype="https://schema.org/Question">
                                        <h3 class="faq-accordion-toggle">In the case of dedicated hires, what is your leave policy?</h3>
                                        <div class="faq-accordion-content" itemscope itemprop="acceptedAnswer"
                                            itemtype="https://schema.org/Answer">
                                            <p>We understand that our dedicated hires may need to take time off for personal or professional reasons. We have a leave policy in place to accommodate these needs.</p>
                                            <p>Dedicated hires are provisioned with 1 leave per month. The developers have to intimate the client beforehand, all efforts are made to avoid unplanned or sudden leaves. Prior approval of client is also taken while approving any leaves of the developers.</p>
                                            <p>They provide the client with the leave request well in advance to avoid inconvenience. Dedicated hires use their leave responsibly and do not abuse the leave policy as they know that any such leave abuse will result in disciplinary action, including termination of employment.</p>
                                            
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
                                    <input type="hidden" id="clickCount" value="0">
                                        <div id="content">
                                        <div id="hire-box-section-0" data-linkeditem="hire-box-0" class="hire-box">
                                            <div class="tech-box">
                                                <label class="label">Technology</label>
                                                <!-- <div class="custom-select tech-select-box"> -->
                                                <div class="select-option-box">
                                                    <select class="technology-box" id="hire-tech-select-0" name="technology[]" onchange="resetTime(0)" onclick="changeFunc(0);">
                                                        <option value="" disabled selected>Select the technology</option>
                                                        
                                                    </select>
                                                </div>
                                                <a  href="https://www.valuecoders.com/contact" target="_blank" class="form-caption">Need Help, Get in Touch!</a>
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
                                            <!-- button -->
                                            <div class="hire-btn add-btn add-btn-0" onclick="addRow(0)"></div>
                                            <input class="hire-btn remove-btn remove-btn-0" style="display:none;" data-id="0" onclick="removeRow(this)">
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

                                            <!-- NA -->
                                            <div class="dis-flex order-list">
                                                <span class="order-number" id="orderno">
                                                    N/A
                                                </span>
                                            </div>

                                            <!-- Price -->
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
                                                        <option value="0" data-extra-price="0" disabled selected>Select The Time Zone</option>
                                                        <option value="AU / US Partial Shift (4 hours overlap with local timezone)" data-extra-price="5">AU / US Partial Shift (4 hours overlap with local timezone)</option>
                                                        <option value="AU / US Full Shift (100% working in local timezone)" data-extra-price="10" >AU / US Full Shift (100% working in local timezone)</option>
                                                        <option value="IST Full Shift (100% working in local timezone)" data-extra-price="0">IST Full Shift (100% working in local timezone)</option>
                                                    </select>
                                                <!-- </div> -->

												</div>

                                                <span class="price">
                                                    <span id="add-on-order-extraPrice"  class="add-on-order-price" name="add-ons-selector-options">
                                                        $0
                                                        <!-- <span class="close"></span> -->
                                                    </span>
                                                </span>


                                            </div>
                                            </div>
											
											<div class="add-ons-selector-outer" style="display: none;">
                                                <div class="add-ons-selector">
                                                    <div class="select-option-box">
                                                <label>Team Discount</label>
                                                <!-- <div class="custom-select"> -->
                                                    <select id="add-ons-selector-section" class="add-ons-selector-section" name="add-ons-teamdiscount-selector-options" onchange="addOndiscountSelector(this)">
                                                        <option value="0" data-extra-price="0" disabled selected>Select The Team Discount</option>
                                                        <option value="3-10 members" data-extra-price="2.5">3-10 members</option>
                                                        <option value="11-15 members" data-extra-price="5">11-15 members</option>
                                                        <option value="15-25 members" data-extra-price="7.5">15-25 members</option>
                                                        <option value="25+ members" data-extra-price="10">25+ members</option>
                                                    </select>
                                                <!-- </div> -->

												</div>

                                                <span class="price">
                                                    <span id="add-on-order-discount-extraPrice"  class="add-on-order-discount-price">
                                                        $0
                                                        <!-- <span class="close"></span> -->
                                                    </span>
                                                </span>


                                            </div>
                                            </div>
                                            
                                            <div class="add-ons-selector-outer" style="display: none;">
                                                <div class="add-ons-selector">
                                                    <div class="select-option-box">
                                                <label>Advance Payment Discount</label>
                                                <!-- <div class="custom-select"> -->
                                                    <select id="add-ons-selector-section" class="add-ons-selector-section" name="addons-advancediscount" onchange="addOnadvancediscountSelector(this)">
                                                        <option value="0" data-extra-price="0" disabled selected>Select The Advance Payment Discount</option>
                                                        <option value="Quarterly payments" data-extra-price="2.5">Quarterly payments</option>
                                                        <option value="Half-yearly payment" data-extra-price="5">Half-yearly payment</option>
                                                        <option value="Yearly payment" data-extra-price="7.5">Yearly payment</option>
                                                        
                                                    </select>
                                                <!-- </div> -->

												</div>

                                                <span class="price">
                                                    <span id="add-on-order-adiscount-extraPrice"  class="add-on-order-adiscount-price">
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
    <script src="https://js.stripe.com/v3"></script>
    <script>
function changeFunc(selectedCount){
let optionList = document.getElementById('hire-tech-select-'+selectedCount);

var optionss = [".NET", "C/C++", "Django", "Firebase", "Go Lang", "Graph QL", "JAVA", "Laravel", "Node", "PHP", "Python", "ROR", "Symfony", "Angular", "HTML/CSS", "Power BI", "React JS", "Vue JS", "Android", "Flutter", "Ionic", "IOS", "Kotlin", "React Native", "Swift", "Xamarin", "Cryptocurreny", "Ethereum", "ICO", "Smart Contract", "Solidity", "Drupal", "Kentico", "Sitecore", "Sitefinity", "Umbraco", "Wordpress", "Chatbot", "Dialog Flow", "RPA", "Tensor Flow", "MEAN", "MERN", "Magento", "Shopify", "Azure", "AWS" ];

for(var i = 0; i < optionss.length; i++) {
    var opt = optionss[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    optionList.appendChild(el);
}
}
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
		Clickappend = 0;
        const fruits = [Clickappend];
function addRow (str) {
    //alert(str);
	Clickappend++;
    var _checkAddRow = false;
    //var parm = '#hire-for-'+str;
    //var  parent = document.querySelector(parm);
  // alert(parent);
    if(clicks < 40){
		
         //var bx = parent.querySelector('input[name = "time_'+str+'"]:checked').value;
        
        
        console.log('brfore',clicks);

        if(checkRadioBtn('time_'+str)){
            // if(clicks == 0 ){
            //  var techSelected = document.querySelector('.select-selected').innerHTML;
            //      if(techSelected != 'Select the technology'){
            //         _checkAddRow = true;
            //         console.log(0,"aaa");
            //      }
            // }else {
                var selectedId = '#hire-tech-select-'+str
                var country_select = document.querySelector(selectedId);
                var techSelected = country_select.options[country_select.selectedIndex].text;
                if(techSelected != 'Select the technology'){
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
            '<div id="hire-box-section-'+Clickappend+'" data-linkeditem="hire-box-'+Clickappend+'" class="hire-box"><div class="tech-box"><div class="select-option-box"><label class="label">Technology'+Clickappend+'</label><select onchange="resetTime('+Clickappend+')" onclick="changeFunc('+Clickappend+')" id="hire-tech-select-'+Clickappend+'" class="technology-box" name="technology[]"><option value="" disabled selected>Select the technology</option></select></div></div><a href="#" class="form-caption">Need Help, Get in Touch!</a><div class="time-box"><span class="title">Hire For</span><div class="hire-for" id="hire-for-'+Clickappend+'"><div><input type="radio" data-hourly-price="30" id="40_'+Clickappend+'" value="40" name="time_'+Clickappend+'" onclick="checkHour(40,'+Clickappend+');"><label class="for-time" for="40_'+Clickappend+'">40 hrs</label></div><div><input type="radio" data-hourly-price="27" onclick="checkHour(80,'+Clickappend+');" id="80_'+Clickappend+'" value="80" name="time_'+Clickappend+'" ><label class="for-time" for="80_'+Clickappend+'">80 hrs</label></div><div><input type="radio" data-hourly-price="25" id="120_'+Clickappend+'" value="120" name="time_'+Clickappend+'" onclick="checkHour(120,'+Clickappend+');"><label class="for-time" for="120_'+Clickappend+'">120 hrs</label></div><div><input type="radio" id="160_'+Clickappend+'" value="160" name="time_'+Clickappend+'" onclick="checkHour(160,'+Clickappend+');"><label class="for-time dedicated" for="160_'+Clickappend+'">Dedicated</label></div></div><span class="form-caption">(160 hrs per month)</span></div><div id="multiselect_'+Clickappend+'" class="multiselect" style="display:none;"><div class="select-option-box"><label class="label">Experience</label><div class="custom-select"><select id="multiselect_dedicated_developer-'+Clickappend+'" name="multiselect_dedicated_developer[]" onchange="checkHour(160,'+Clickappend+')"><option value="" disabled selected>Select The Developer</option><option value="2200" data-hourly-price="2200" selected>Junior Level (1-3 Years Experienced)</option><option value="2800" data-hourly-price="2800">Mid Level (4-5 Years Experienced)</option><option value="3600" data-hourly-price="3600">Senior Level (5-7 Years Experienced)</option><option value="4500" data-hourly-price="4500">Technical Lead (8+ Years Experienced)</option></select></div></div></div> <div class="hire-btn add-btn add-btn-'+Clickappend+'" onclick="addRow('+Clickappend+')"></div><input class="hire-btn remove-btn remove-btn-'+Clickappend+'"  data-id="'+Clickappend+'" onclick="removeRow(this)"></div>');

        // to toggle add and remove icons start

        document.querySelectorAll('.hire-btn').forEach(function(el) {
           el.style.display = 'none';
        });

        var totalIconList =  document.querySelectorAll('.hire-btn').length;

        document.querySelector('.add-btn-'+Clickappend).style.display = 'block';       
        
        document.querySelectorAll('.remove-btn').forEach(function(el) {
           el.style.display = 'block';
        });
        
        document.querySelector('.remove-btn-'+Clickappend).style.display = 'none';

        
fruits.push(Clickappend);
console.log("ttttttttttttt");
console.log(fruits);
        // to toggle add and remove icons end
        var clickCount=Clickappend;
        document.getElementById('clickCount').value=clickCount;
        var listNode = document.getElementById('selected-tech-list'),
                liNode = document.createElement("li"),
                txtNode = document.createTextNode("Linode");            
            liNode.appendChild(txtNode);        
            liNode.setAttribute('id','hire-box-'+Clickappend);
            liNode.style.display = 'none';
            listNode.appendChild(liNode);
        } else{
            uncheckRadioBtn('time_'+str);
            alert("Data Missing!!!");

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
    var indxid = $(input).data("id");
    console.log(indxid);
    const index = fruits.indexOf(indxid);
if (index > -1) { // only splice array when item is found
    fruits.splice(index, 1); // 2nd parameter means remove one item only
}
   // console.log(clicks);
    // if(clicks == 0){
     //alert(input.parentNode);
    // }
    document.getElementById('content').removeChild(input.parentNode);
    document.getElementById(input.parentNode.dataset.linkeditem).remove();
    document.getElementById('clickCount').value=document.getElementById('content').children.length;

    var testData = !!document.getElementById("clickCount");
    console.log("AAAADDDD",testData);
    
calculateTotalPrice();

     // var input = document.createElement("input");
     //    input.setAttribute("type", "hidden");
     //    input.setAttribute("name", "clickCount");
     //    input.setAttribute("id", "clickCount");
     //    input.setAttribute("value", clicks);
     //    document.getElementById("content").appendChild(input);
}

function checkHour(val,count){
	var numbers = [40,80,120,160];
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
            if(techSelected != 'Select the technology'){
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
	   
	    numbers.forEach(function(number) {
			   if(number == val){
		   const child = document.getElementById(+number+'_'+count);
           child.parentElement.classList.add('active');
			   } else {
				document.getElementById(+number+'_'+count).parentElement.classList.remove('active');   
			   }
           
           
		   });

       // if(val==40){
           // const child = document.getElementById('40_'+count);
           // child.parentElement.classList.add('active');
           // document.getElementById('160_'+count).parentElement.classList.remove('active');
           // document.getElementById('80_'+count).parentElement.classList.remove('active');
           // document.getElementById('120_'+count).parentElement.classList.remove('active');
       // }else if(val==80){
           // const child = document.getElementById('80_'+count);
           // child.parentElement.classList.add('active');
           // document.getElementById('160_'+count).parentElement.classList.remove('active');
           // document.getElementById('40_'+count).parentElement.classList.remove('active');
           // document.getElementById('120_'+count).parentElement.classList.remove('active');
       // }else if(val==120){
           // const child = document.getElementById('120_'+count);
           // child.parentElement.classList.add('active');
           // document.getElementById('160_'+count).parentElement.classList.remove('active');
           // document.getElementById('80_'+count).parentElement.classList.remove('active');
           // document.getElementById('40_'+count).parentElement.classList.remove('active');
       // }else if(val==160){
           // const child = document.getElementById('160_'+count);
           // child.parentElement.classList.add('active');
           // document.getElementById('120_'+count).parentElement.classList.remove('active');
           // document.getElementById('80_'+count).parentElement.classList.remove('active');
           // document.getElementById('40_'+count).parentElement.classList.remove('active');
       // }
       var clkCount=document.getElementById('clickCount').value; 
    //   alert(clkCount);
       var totalCount= hourlyPrice = liNumber = 0;
       for(var i=0; i<=44; i++){
if(!fruits.includes(i))
    { continue; }


            var liNumber = i;
            console.log('i',i);

            

                var selectedId = '#hire-tech-select-'+i;
                var country_select = document.querySelector(selectedId);
                var techSelected = country_select.options[country_select.selectedIndex].text;
                console.log(techSelected);



            
             
			 numbers.forEach(function(number) {
			   
             if(document.getElementById(number+'_'+i).checked) {  
                totalCount =parseInt(document.getElementById(number+'_'+i).value);
                hourlyPrice =parseInt(document.getElementById(number+'_'+i).dataset.hourlyPrice);
             }
           
		     });
			 
			 
             if(document.getElementById('160_'+i).checked){
                totalCount =parseInt(document.getElementById('160_'+i).value);
                hourlyPrice =parseInt(document.getElementById('160_'+i).dataset.hourlyPrice);

                var selectedId = '#multiselect_dedicated_developer-'+i
                var multiselect_dedicated_developer = document.querySelector(selectedId);
                hourlyPrice = multiselect_dedicated_developer.options[multiselect_dedicated_developer.selectedIndex].getAttribute('data-hourly-price');
                // multiselect_dedicated_developer-
             }

             var element = document.getElementById("order-summary-right-box");
            element.classList.remove("no-content");
            var elements = document.getElementById("continue-btn");
            elements.classList.remove("disabl");
            document.getElementById('continue-btn').disabled = false;
            document.getElementById('orderno').style.display = 'none';
           

            var liSpan = '<span id="hire-tech-'+liNumber+'" class="order-number order-tech-name">0'+parseInt(liNumber+1)+'. NET (80 hrs @ $27/hr)</span><span id="tech-hour-price-'+liNumber+'" class="order-price">$0<span class="close"></span></span>';

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
  var elements = document.getElementsByClassName("add-ons-selector-outer");
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
    var elements    = document.getElementsByClassName("add-ons-selector-outer");

    var addonPrice  = document.getElementById("addon-timezone-extraprice").value;
    var addondiscountPrice  = document.getElementById('teamdisc').value;
    var addonadiscountPrice  = document.getElementById('teamadisc').value;
    
	var totalPriceCount = priceBox.length;
    var totalOrderPrice = addOnPriceTotal = finalPrice = 0 ;
    var parents = [];
    
    for (i = 0; i < totalPriceCount; i++) {
        var elem = priceBox[i];              
            totalOrderPrice+=parseInt(priceBox[i].innerText.replace(/[^0-9]/g,''));  
    }

	adonstotal = addonPrice/100;
	var caladons = totalOrderPrice*adonstotal;

	adonsdiscounttotal = addondiscountPrice/100;
	var caladonsdiscount = totalOrderPrice*adonsdiscounttotal;
	
	adonsadiscounttotal = addonadiscountPrice/100;
	var caladonsadiscount = totalOrderPrice*adonsadiscounttotal;
	
    //console.log(totalOrderPrice + adonstotal - caladonsadiscount - caladonsdiscount);
    finalPrice = totalOrderPrice + caladons - caladonsdiscount - caladonsadiscount;
	//finalPrice = totalOrderPrice - caladonsdiscount;
    console.log(totalOrderPrice);
    console.log("add",addOnPriceTotal);
    document.getElementById("finalPrice").textContent="$"+finalPrice;
    document.getElementById("finalPrice").dataset.totalPrice=finalPrice;
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

function getTechData(btn_id) {
    let form = document.querySelector('.order-form');
    let form2 = document.querySelector('.detail-form');
    let data = new FormData(form);
	data.delete('technology[]');
	data.delete('multiselect_dedicated_developer[]');
    let data2 = new FormData(form2);
    var object = {};
	var objects = {};
	
    //object['finalPrice'] = document.getElementById("finalPrice").textContent;
    data.forEach((value, key) => object[key] = value);
    data2.forEach((value, key) => objects[key] = value);
    var json = JSON.stringify(object);
	var jsons = JSON.stringify(objects);
    console.log(json)
	console.log(jsons)
  	//document.getElementById("orderFormData2").value = dedicated.join(",");
    document.getElementById("orderFormData").value = json;
    document.querySelector('.order-form').style.display="none";
    document.querySelector('.continue-btn').style.display="none";
    document.querySelector('.detail-form ').style.display="block";
    document.querySelector('.submit-btn').style.display="block";
   if(btn_id == 'submit-btn'){
	   
	    // alert(json);
    // document.querySelector('.order-summary-form').submit();
	//alert(ValidationEvent());
    //if(ValidationEvent()){   	
      //  document.getElementById('submit-btn').click();
		
   // }
   
//document.getElementById("submit-btn").addEventListener('click',function (){
    //ValidationEvent();
	
	//alert("first");
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
        const phreg = /^[0-9]*$/;
        if( !phreg.test(phone.value.trim()) && phone.value.length == 10){
			showError(phone, 'Phone Number is not valid');
            return false;
        }
        if( checkLength(comment,3,1500) === false ){
            return false;
        }
		
    var inputtech = document.getElementsByName('technology[]');
	var inputdedicatedd = document.getElementsByName('multiselect_dedicated_developer[]');
	var inputtimezone = document.getElementById("add-on-timeset").value;   
	var inputtimezoneprice = document.getElementById("addon-timezone-extraprice").value;
	var inputteamdiscounttext = document.getElementById("add-on-discount").value;
	var inputteamdiscountprice = document.getElementById("teamdisc").value;
	var inputadteamdiscounttext = document.getElementById("add-on-advancediscount").value;
	var inputadteamdiscountprice = document.getElementById("teamadisc").value;
    var techno = [];
	var dedicated = [];
	for (var i = 0; i < inputtech.length; i++) {
                var a = inputtech[i];
                k = "array[" + i + "].value= "
                                   + a.value + " ";
								  techno.push(a.value);
                                   a.value = "";
            }
	for (var i = 0; i < inputdedicatedd.length; i++) {
                var b = inputdedicatedd[i];
                g = "array[" + i + "].value= "
                                   + b.value + " ";
								  dedicated.push(b.value);
                                   b.value = "";
								   
            }	
			//alert(JSON.stringify(techno));
	//sessionStorage.setItem("technologtItem", JSON.stringify(techno));
	//sessionStorage.setItem("dedicatedItem", JSON.stringify(dedicated));
	//sessionStorage.setItem("timeItem", json);
	//sessionStorage.setItem("customerdetail", jsons);
	//sessionStorage.setItem("settimezone",inputtimezone);
    var techitems = JSON.stringify(techno);	
	var dedicaytditems = JSON.stringify(dedicated);
	var timeItems = json;
	var customerdetails = jsons;
	var setaddtimezone = inputtimezone;  
	var setaddtimezoneprice = inputtimezoneprice;
	//alert(setaddtimezone);
	//document.getElementById("orderFormData1").value = JSON.stringify(techno);
   // console.log(techitems);
	console.log(dedicaytditems);
	xhr = new XMLHttpRequest();
    xhr.open( 'POST', 'data.php', true );
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.onreadystatechange = function() {
	   if (this.readyState == 4 && this.status == 200) {
		  // Response
		  var response = this.responseText;  
           console.log(response);
	   }
	};
	var responseContainer = document.getElementById('paymentResponse'); 
	let ms = Date.now(); 
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
    
};
// Specify Stripe publishable key to initialize Stripe.js
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');
createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
});
	var params = 'techitem='+techitems+'&dedicateditm='+dedicaytditems+'&times='+timeItems+'&customers='+customerdetails+'&addons='+setaddtimezone+'&addonsprice='+setaddtimezoneprice+'&tdtext='+inputteamdiscounttext+'&tdprice='+inputteamdiscountprice+'&atdtext='+inputadteamdiscounttext+'&atdprice='+inputadteamdiscountprice;
	xhr.send(params);
	
		
  
    }else{
        return false;   
    }
	
   }
}



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
            }else if( input.name == "cont_phone" ){
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
            
            checkfoucsoutPhone(phone)
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
	
    if( (/^[0-9]*$/.test(inputtxt.value.trim()) && inputtxt.value.length >= 10) ){   
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
country.addEventListener("keypress", checkcountry);
country.addEventListener("keydown", ws_validateStr);
country.addEventListener("focusout", checkcountry);

txtid.addEventListener("keyup", checktxtid);
//txtid.addEventListener("keydown", ws_validateStr);
txtid.addEventListener("keypress", checktxtid);
txtid.addEventListener("focusout", checktxtid);

phone.addEventListener("keyup", checkPhone);
phone.addEventListener("keydown", ws_checkphonenumber);
phone.addEventListener("keypress", checkPhone);
phone.addEventListener("focusout", checkfoucsoutPhone);

comment.addEventListener("keyup", checkURequirement);
comment.addEventListener("keypress", checkURequirement);
comment.addEventListener("keydown", checkURequirement);
comment.addEventListener("focusout", checkURequirement);
comment.addEventListener("focusin", checkURequirement);

email.addEventListener("focusout", checkEmailEvent);
function checkURequirement(event){
    checkLength(comment,3,1500);
}
function checkcountry(event){
  checkLength(country,1,100);
}

function checktxtid(event){
  checkLength(txtid,1,100);
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
  checkLength(fname,2,255);
}

function checkCont(event){
  checkLength(lname,2,255);
}


function checkPhone(event){
    checkLength(phone,8,20);
    phonenumber(phone);
}

function checkfoucsoutPhone(event){
    phonenumber(phone);
}
//check input Length
function checkLength(input, min ,max) {
    if(input.value.length < min) {
        if( input.name == "firstName"  ){            
            showError(input, `Please Fill First Name`);
		} else if( input.name == "lastname" ){
            showError(input, `Please Fill Last Name`);    
        }else if( input.name == "cont_phone"  ){
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
        if( input.name == "cont_phone" ){
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
  let keyArray = [46, 8, 9, 27, 13,
        187, 189, 16, 17
    ]; - 1 !== keyArray.indexOf(e
            .keyCode) || 65 == e
        .keyCode && !0 === e.ctrlKey ||
        86 == e.keyCode && !0 === e
        .ctrlKey || 67 == e.keyCode && !
        0 === e.ctrlKey || 88 == e
        .keyCode && !0 === e.ctrlKey ||
        e.keyCode >= 35 && e.keyCode <=
        39 || (e.shiftKey || e.keyCode <
            48 || e.keyCode > 57) && (e
            .keyCode < 96 || e.keyCode >
            105) && e.preventDefault()
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
var priceBoxs    = document.getElementsByClassName("order-price");
    
	var totalPriceCounts = priceBoxs.length;
    var totalOrderPrices = 0;
    var parents = [];
    for (i = 0; i < totalPriceCounts; i++) {
        var elem = priceBoxs[i];              
            totalOrderPrices+=parseInt(priceBoxs[i].innerText.replace(/[^0-9]/g,''));  
    }
	
	
    var opt = sel.options[sel.selectedIndex];
    var price = opt.dataset.extraPrice
    var vals = opt.value  
	at = price/100;
	var caladonss = totalOrderPrices*at;
  document.getElementById("add-on-timeset").value = vals;
  document.getElementById("addon-timezone-extraprice").value = price;
  document.getElementById("add-on-order-extraPrice").innerHTML = "$"+caladonss+" ("+price+"% Extra)";
  document.getElementById("add-on-order-extraPrice").dataset.totalExtraPrice=price;

  calculateTotalPrice();
}

function addOndiscountSelector(sel) {
   var priceBoxs    = document.getElementsByClassName("order-price");
    
	var totalPriceCounts = priceBoxs.length;
    var totalOrderPrices = 0;
    var parents = [];
    for (i = 0; i < totalPriceCounts; i++) {
        var elem = priceBoxs[i];              
            totalOrderPrices+=parseInt(priceBoxs[i].innerText.replace(/[^0-9]/g,''));  
    }
    var opt = sel.options[sel.selectedIndex];
    var price = opt.dataset.extraPrice
	atdiscount = price/100;
	var caladonss = totalOrderPrices*atdiscount;
    var vals = opt.value
  document.getElementById("add-on-discount").value = vals;
  document.getElementById("add-on-order-discount-extraPrice").innerHTML = "$"+caladonss+" ("+price+"% Discount)";
  document.getElementById("add-on-order-discount-extraPrice").dataset.totalExtraPrice=price;
  document.getElementById("teamdisc").value=price;

  calculateTotalPrice();
}

function addOnadvancediscountSelector(sel) {
   var priceBoxs    = document.getElementsByClassName("order-price");
    
	var totalPriceCounts = priceBoxs.length;
    var totalOrderPrices = 0;
    var parents = [];
    for (i = 0; i < totalPriceCounts; i++) {
        var elem = priceBoxs[i];              
            totalOrderPrices+=parseInt(priceBoxs[i].innerText.replace(/[^0-9]/g,''));  
    }

    var opt = sel.options[sel.selectedIndex];
    var price = opt.dataset.extraPrice
	aatdiscount = price/100;
	var caladonss = totalOrderPrices*aatdiscount;

    var vals = opt.value
  document.getElementById("add-on-advancediscount").value = vals;
  document.getElementById("add-on-order-adiscount-extraPrice").innerHTML = "$"+caladonss+" ("+price+"% Discount)";
  document.getElementById("add-on-order-adiscount-extraPrice").dataset.totalExtraPrice=price;
  document.getElementById("teamadisc").value=price;

  calculateTotalPrice();
}



// validation starts 

function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
     var lblError = document.getElementById("lblError_phone");
      document.querySelector('input[name=cont_phone]').classList.remove("error-field");
      lblError.innerHTML = "";
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
          if (document.querySelector('input[name=cont_phone]').value.length > 9 ){
            document.querySelector('input[name=cont_phone]').classList.add("error-field");
            lblError.innerHTML = "Limit Reached.";
            return false //disable key press
        }
        if (unicode<48||unicode>57){
            document.querySelector('input[name=cont_phone]').classList.add("error-field");
            lblError.innerHTML = "Only Numbers allowed.";
            return false //disable key press
        } //if not a number
           
    }
}

function Validatetaxid(e,errorId,fieldname) {
        var keyCode = e.keyCode || e.which;
 
        var lblError = document.getElementById(errorId);
        lblError.innerHTML = "";
 
        //Regex for Valid Characters i.e. Alphabets.
        var regex = /^[0-9a-zA-Z]+$/;
 
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
         document.querySelector('input[name='+fieldname+']').classList.remove("error-field");
        if (!isValid) {
            document.querySelector('input[name='+fieldname+']').classList.add("error-field");
            lblError.innerHTML = "Only Alpha allowed.";
        }
 
        return isValid;
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
            //lblError.innerHTML = "Only Alphabets allowed.";
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

    /*function blockSpecialCountry() {
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
        }*/
		
	function blockSpecialtxt() {
		    var fieldname = 'cont_tax'; 
            var k = event.keyCode;
            var lblError = document.getElementById('lblError_tax');
            var validChecktxtid = (k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32  || (k < 48 && k > 57);
            
           // if(fieldname == 'cont_tax'){
			//	alert("fds");
             //   var _validCheckCountry = (k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k==32  || (k > 48 && k < 57);
           // }
            
            lblError.innerHTML = '';
              document.querySelector('input[name='+fieldname+']').classList.remove("error-field");
			  
            if(!validChecktxtid){
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
</style>
