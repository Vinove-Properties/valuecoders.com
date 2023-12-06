<?php require_once '../common/inc/config.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ValueCoders Careers | Learn, Grow & Ace your career - @ValueCoders</title>
    <meta name="description"
        content="Build your career with ValueCoders - entry-level or experienced professionals. We offer a friendly work environment with growth and learning opportunities that shape your career." />
    <meta name="keywords"
        content="software outsourcing company, software development outsourcing, software engineering company in india, software outsourcing company India, offshore software development, software outsourcing services" />
    <meta property="og:title" content="ValueCoders Careers | Learn, Grow & Ace your career - @ValueCoders" />

    <?php require_once '../include/header-files.php'; ?>
    <link rel="preload stylesheet" type="text/css" href="../css/company.min-2.0.css" defer />
</head>

<body id="themeAdd">
    <?php require_once '../include/menu.php'; ?>

    <section class="hero-section">
        <div class="container">
        <div class="for-client-logo-box">
          <i></i>
          <i></i>
          <i></i>
          <i></i>
        </div>
            <h1>Build Your Career With Us</h1>
            <p>ValueCoders is regularly recognized as a world leader in innovation, engineering, and business
                transformation, and that wouldn’t be possible without our employees. That’s why ensuring the
                professional development of our employees is a top priority.</p>
            <div class="count-box-outer dis-flex">
                <div class="count-box flex-4">
                    <span class="count-box-big clr-white">17+</span>
                    <span class="count-box-small">Years Experience</span>
                </div>
                <div class="count-box flex-4">
                    <span class="count-box-big clr-white">650+</span>
                    <span class="count-box-small">Fulltime Developers</span>
                </div>
                <div class="count-box flex-4">
                    <span class="count-box-big clr-white">2000+</span>
                    <span class="count-box-small">Man Years Exp</span>
                </div>
                <div class="count-box flex-4">
                    <span class="count-box-big clr-white">2500+</span>
                    <span class="count-box-small">Satisfied Customers</span>
                </div>
            </div>
        </div>
    </section>

    <section class="icon-with-img-section padding-t-150 padding-b-150">
        <div class="container">
            <div class="dis-flex col-box-outer">
                <div class="flex-2">
                    <div class="head-txt">
                        <h2>Why Choose ValueCoders?</h2>
                        <p>ValueCoders has 17+years of experience in delivering satisfactory & best-in-class mobile and
                            web app development services with a proactive approach to clients accross the globe.</p>
                    </div>
                    <div class="dis-flex hire-php-icon icon-box-outer">
                        <div class="flex-2 margin-t-50">
                            <div class="dis-flex items-center">
                                <span class="icon"></span>
                                <span class="icon-txt">5+ Years Of<br>
                                    Average Experience</span>
                            </div>
                        </div>
                        <div class="flex-2 margin-t-50">
                            <div class="dis-flex items-center">
                                <span class="icon icon2"></span>
                                <span class="icon-txt">Integrity &<br>
                                    Transparency</span>
                            </div>
                        </div>
                        <div class="flex-2 margin-t-50">
                            <div class="dis-flex items-center">
                                <span class="icon icon3"></span>
                                <span class="icon-txt">Free No<br>
                                    Obligation Quote
                                </span>
                            </div>
                        </div>
                        <div class="flex-2 margin-t-50">
                            <div class="dis-flex items-center">
                                <span class="icon icon4"></span>
                                <span class="icon-txt">Hassle-free<br>
                                    Project Management</span>
                            </div>
                        </div>
                        <div class="flex-2 margin-t-50">
                            <div class="dis-flex items-center">
                                <span class="icon icon5"></span>
                                <span class="icon-txt">Transparency<br>
                                    Is Guaranteed
                                </span>
                            </div>
                        </div>
                        <div class="flex-2 margin-t-50">
                            <div class="dis-flex items-center">
                                <span class="icon icon6"></span>
                                <span class="icon-txt">Flexible <br>
                                    Engagement Models</span>
                            </div>
                        </div>
                        <div class="flex-2 margin-t-50">
                            <div class="dis-flex items-center">
                                <span class="icon icon7"></span>
                                <span class="icon-txt">Self-Learning<br>
                                    KRA
                                </span>
                            </div>
                        </div>
                        <div class="flex-2 margin-t-50">
                            <div class="dis-flex items-center">
                                <span class="icon icon8"></span>
                                <span class="icon-txt">Technology Training<br>
                                    And Library</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-2 text-right right-box">
                    <?php if( !isMobile() ) : ?>
                    <picture>
                        <source type="image/webp" srcset="<?=HOST_URL?>images/valuecoders-img.webp">
                        <source type="image/png" srcset="<?=HOST_URL?>images/valuecoders-img.png">
                        <img loading="lazy" src="<?=HOST_URL?>images/valuecoders-img.png" alt="Valuecoders" width="674"
                            height="755">
                    </picture>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="client-img-section padding-b-150">
        <div class="container">
            <div class="dis-flex col-box-outer items-center">
                <?php if( !isMobile() ) : ?>
                <div class="flex-2 left-box">
                    <picture class="dark-theme-img">
                        <source type="image/webp" srcset="<?=HOST_URL?>images/our-clients.webp">
                        <source type="image/png" srcset="<?=HOST_URL?>images/our-clients.png">
                        <img loading="lazy" src="<?=HOST_URL?>images/our-clients.png" alt="Valuecoders" width="674"
                            height="755">
                    </picture>
                    <picture class="lighter-theme-img">
                        <source type="image/webp" srcset="<?=HOST_URL?>images/our-clients-for-lighter.webp">
                        <source type="image/png" srcset="<?=HOST_URL?>images/our-clients-for-lighter.png">
                        <img loading="lazy" src="<?=HOST_URL?>images/our-clients-for-lighter.png" alt="Valuecoders"
                            width="674" height="755">
                    </picture>
                </div>
                <?php endif; ?>
                <div class="flex-2 right-box tick-icon-list">
                    <h2>We work with the best <br>compaines in the world</h2>
                    <p>We deliver exceptional technology solutions for world class business in every business industry.
                        from dyamic startup and SMB to Fortune 500 companies.</p>
                    <ul>
                        <li>91.2% Average Customer Satisfaction</li>
                        <li>70.3 Net Promoter Score (90th percentile)</li>
                        <li>174 active world-class clients</li>
                        <li>Amet minim mollit non.</li>
                        <li>91.2% Average Customer Satisfaction</li>
                        <li>70.3 Net Promoter Score (90th percentile)</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="team-valuecoders-section padding-t-150 padding-b-150 bg-dark-theme">
        <div class="container">
            <div class="head-txt text-center">
                <h2>Team Valuecoders</h2>
                <p>At ValueCoders, we have a friendly, enthusiastic, and funloving yet professional environment. We love
                    our work and growing very fast.</p>
            </div>
        </div>
        <div class="margin-t-100">
            <picture>
                <source type="image/webp" srcset="<?=HOST_URL?>images/team-value-img.webp">
                <source type="image/png" srcset="<?=HOST_URL?>images/team-value-img.png">
                <img loading="lazy" src="<?=HOST_URL?>images/team-value-img.png" alt="Valuecoders" width="1920"
                    height="707">
            </picture>
        </div>
    </section>

    <section class="employee-testimonial-career-section  padding-t-150 padding-b-150">
        <div class="container">
            <div class="head-txt text-center">
                <h2>What Our Employee Say</h2>
                <p>We are grateful for our clients' trust in us, and we take pride in providing quality solutions that<br> surpass their expectations. Here is what some of them have to say about us:</p>
            </div>
            <div class="dis-flex margin-t-100">
                <div class="flex-3">
                    <div class="shadow-box">
                        <iframe width="100%" height="271" src="https://www.youtube.com/embed/d78gD-wwVTg"
                            srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background: url(../images/career-testi-video1.webp) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=https://www.youtube.com/embed/d78gD-wwVTg><span class='iframe-bg'></span></a>"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen title="Testimonial Image"></iframe>
                        <div class="client-description bg-lightgray small-column">
                            <p>“Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia
                                consequat duis enim velit mollit.”</p>
                            <span class="client-name">Khushbu Chauhan</span>
                            <span class="client-quote">Sr. Project Management Executive - L2</span>
                        </div>
                    </div>
                </div>
                <div class="flex-3">
                    <div class="shadow-box">
                        <iframe width="100%" height="271" src="https://www.youtube.com/embed/d78gD-wwVTg"
                            srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background: url(../images/career-testi-video2.webp) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=https://www.youtube.com/embed/d78gD-wwVTg><span class='iframe-bg'></span></a>"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen title="Testimonial Image"></iframe>
                        <div class="client-description bg-lightgray small-column">
                            <p>“Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia
                                consequat duis enim velit mollit.”</p>
                            <span class="client-name">Navin Kumar</span>
                            <span class="client-quote">Mobility team</span>
                        </div>
                    </div>
                </div>

                <div class="flex-3 first-row-last-col">
                    <div class="content-box-outer">
                        <div class="content-box bg-lightgray">
                            <p>It's been 9 months for me, working at ValueCoders and it has indeed been a very enriching experience for me. I enjoy and look forward to showing up for work everyday because of my amazing team and having a motive of learning and growing together.</p>
                        </div>
                        <div class="cust-img-box dis-flex">
                            <div class="profile profile1">
                            <picture>
                                <source type="image/webp" srcset="../images/profile-1.webp">
                                 <source type="image/png" srcset="../images/profile-1.png">
                                 <img loading="lazy" src="../images/profile-1.png" alt="Valuecoders" width="76" height="74">
                            </picture>
                            </div>
                            <div class="profile-text">
                                <h5 class="clr-white">Prathiksha Shetty</h5>
                                <h6>Associate Software Developer</h6>
                                <span class="rating"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-3">
                    <div class="content-box-outer">
                        <div class="content-box bg-lightgray">
                         <p>I was looking for a company that inspires me, a product that I feel passionate about, a position that challenges me and stretches me into different areas, management that encourages and empowers me to do my best and a great work environment and team spirit.</p>
                         <p>At Vinove, all these things are taken care of. I'm always inspired to do my best and think forward. I like the mindset and culture, and being part of a team that gives its best to make the next generation of technologies usable and accessible to all its clients. For me, this is more than a job. I’m investing my time, my knowledge and experience in a company that is investing in me.</p>
                        </div>
                        <div class="cust-img-box dis-flex">
                            <div class="profile profile1">
                            <picture>
                                <source type="image/webp" srcset="../images/profile-2.webp">
                                 <source type="image/png" srcset="../images/profile-2.png">
                                 <img loading="lazy" src="../images/profile-2.png" alt="Valuecoders" width="76" height="74">
                            </picture>
                            </div>
                            <div class="profile-text">
                                <h5 class="clr-white">Pankaj Masiwal</h5>
                                <h6>Operations (MERN Stack)</h6>
                                <span class="rating"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-3">
                    <div class="content-box-outer">
                        <div class="content-box bg-lightgray">
                            <p>It's been almost 1.5 years with ValueCoders and from the day I've joined, I've been given ample opportunities to nurture my professional  career development by finding a role as an Associate Java Developer that suits my abilities and interests. Being a Java Developer in the NCN/ OTAVA Team, there have been lots of opportunities for me to work on different tools like Salesforce, ConnectWise, Billing Platforms, Veeam Services, Auth0 etc., with a variety of business aspects. I am proud of the ValueCoders Family and appreciate the opportunities to realize my full potential, as well as a cooperative and encouraging work  culture. Valuecoders is a Great Place to Work!</p>
                        </div>
                        <div class="cust-img-box dis-flex">
                            <div class="profile profile2">
                            <picture>
                                <source type="image/webp" srcset="../images/profile-3.webp">
                                 <source type="image/png" srcset="../images/profile-3.png">
                                 <img loading="lazy" src="../images/profile-3.png" alt="Valuecoders" width="76" height="74">
                            </picture>
                            </div>
                            <div class="profile-text">
                                <h5 class="clr-white">Rupesh Kumar</h5>
                                <h6>Associate Software Developer</h6>
                                <span class="rating"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-3">
                    <div class="content-box-outer">
                        <div class="content-box bg-lightgray">
                            <p>It feels great to have received the IMAD and it is very special as it is my first ever recognition in the corporate world. It gives me motivation to put my all into whatever project I am working on, because I know that my hard work will be appreciated.</p>
                            <p>My journey here at Vinove has been fantastic, filled with guidance and learning. Day by day I have learned new things thanks to all the support from my seniors and colleagues, the people here at Vinove are amazing and full of knowledge.</p>
                        </div>
                        <div class="cust-img-box dis-flex">
                            <div class="profile profile3">
                            <picture>
                                <source type="image/webp" srcset="../images/profile-4.webp">
                                 <source type="image/png" srcset="../images/profile-4.png">
                                 <img loading="lazy" src="../images/profile-4.png" alt="Valuecoders" width="76" height="74">
                            </picture>
                            </div>
                            <div class="profile-text">
                                <h5 class="clr-white">Akash Vishwakarma</h5>
                                <h6>Associate Software Developer</h6>
                                <span class="rating"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-2 first-box">
                    <div class="content-box-outer">
                        <div class="content-box bg-lightgray">
                            <p>Initially, Thank You so much for recognising my efforts, and honestly, the feeling is very peculiar as I had not anticipated this award coming my way.</p>
                            <p>I got to know about this from a friend as unfortunately, I couldn't attend the 'Rewards and Recognition Call' because I was occupied with something else but the moment I heard it I went into a state of exuberance. Everyone around was so happy for me and above all, I saw pride in my manager’s eyes, Vipul sir, that his lad did it. I prominently agree to the fact he is the reason I got this award. Moreover, my journey in this organisation so far is above par in all aspects, I have been involved in multiple projects I got to know a lot about how the wheel rotates in corporate because yes obviously I was a freshman and needed to learn a lot,this company gave me the opportunity and right resources at the right time. Lastly I want to thank my peers for supporting me throughout. Thankyou Vinove for this recognition.</p>
                        </div>
                        <div class="cust-img-box dis-flex">
                            <div class="profile profile4">
                            <picture>
                                <source type="image/webp" srcset="../images/profile-5.webp">
                                 <source type="image/png" srcset="../images/profile-5.png">
                                 <img loading="lazy" src="../images/profile-5.png" alt="Valuecoders" width="76" height="74">
                            </picture>
                            </div>
                            <div class="profile-text">
                                <h5 class="clr-white">Mohd. Talib Khan</h5>
                                <h6>Associate Software Developer</h6>
                                <span class="rating"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-2 second-box">
                    <div class="content-box-outer">
                        <div class="content-box bg-lightgray">
                            <p>Valuecoders has provided me with a platform to learn, evolve, and constantly evaluate my progress. The opportunities presented are great for me in the longer scheme of my career growth too. They not only enabled me to implement new ideas but also gave me the platform to learn from my mistakes. In the past 10 months continuous feedback and conversation with my managers has groomed my project management skills and has helped me build a vision of what I would like to achieve in the coming few years.</p>
                        </div>
                        <div class="cust-img-box dis-flex">
                            <div class="profile profile5">
                            <picture>
                                <source type="image/webp" srcset="../images/profile-6.webp">
                                 <source type="image/png" srcset="../images/profile-6.png">
                                 <img loading="lazy" src="../images/profile-6.png" alt="Valuecoders" width="76" height="74">
                            </picture>
                            </div>
                            <div class="profile-text">
                                <h5 class="clr-white">Sunny Jha</h5>
                                <h6>Project Management Executive</h6>
                                <span class="rating"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="keka-iframe-section padding-t-150 padding-b-150">
        <div class="container">
            <div class="head-txt text-center">
                <h2>Let’s Work Together!</h2>
            </div>
            <div class="keka-iframe">
                <iframe src="https://vinove.kekahire.com/api/embedjobs/efdbfe8f-0c89-43a7-b197-ff60d832994a"
                    width="100%" height="1400px" frameborder="0"></iframe>
            </div>
        </div>
    </section>

    <section class="contact-us-section padding-t-150 padding-b-150">
        <?php require_once '../include/contact-form.php'; ?>
    </section>
    <?php require_once '../include/footer.php'; ?>

</body>

</html>