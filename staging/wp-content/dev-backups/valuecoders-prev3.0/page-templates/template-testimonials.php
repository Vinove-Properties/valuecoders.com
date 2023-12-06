<?php
/*
Template Name: Testimonials Page Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section vc-testimonials-section">
<div class="container">
    <div class="dis-flex margin-t-80">
        <div class="flex-2 header-left-content">
			<?php while( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; ?>
        </div>
        <div class=" flex-2 header-right-image">
            <picture>
                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/vc-testimonial-img.webp">
                <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/vc-testimonial-img.png">
                <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/vc-testimonial-img.png" alt="Valuecoders" width="763"
                    height="409">
            </picture>
        </div>
    </div>
</div>
</section>
<?php vcTrustedStartups(); ?>

<section class="customer-logo-section padding-t-150 padding-b-150">
<div class="container">
<div class="head-txt text-center">
<h2>Our Key Clients</h2>
<p>We have an array of clients across different regions worldwide, from Europe to Asia Pacific, and the USA. They keep coming back to us for the high-quality service we offer. Look at the list of some of our most reputed clients worldwide.</p>
</div>
<div class="custom-logo-img-box margin-t-100">
<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/vc-testi-img.svg" alt="about-exp-img" width="1710" height="904">
</div>
<div class="mob-custom-logo-img-box">
<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/testi-img1.svg" alt="about-exp-img" width="550" height="394">
<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/testi-img2.svg" alt="about-exp-img" width="550" height="394">
<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/testi-img3.svg" alt="about-exp-img" width="550" height="394">
<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/testi-img4.svg" alt="about-exp-img" width="550" height="394">
<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/testi-img5.svg" alt="about-exp-img" width="550" height="394">
<img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/testi-img6.svg" alt="about-exp-img" width="550" height="394">
</div>

</div>
</section>

    <section class="customer-column-section client-video-section padding-b-150">
        <div class="container">
            <div class="head-txt text-center">
                <h2>Customer Success Stories</h2>
                <p>We have 6800+ happy clients across the globe. Have a look at some success stories of our clients:</p>
            </div>
            <div class="dis-flex margin-t-100">
                <div class="flex-3">
                    <div class="flex-1">
                        <div class="shadow-box">
                            <iframe  height="486" src="https://www.youtube.com/embed/d78gD-wwVTg"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background: url(<?php bloginfo('template_url'); ?>/images/customer-video1-img.webp) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=https://www.youtube.com/embed/aErqOtvMClY?autoplay=1><span class='iframe-bg'></span></a>"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="Testimonial Image"></iframe>
                            <div class="client-description bg-white">
                                <p>"Huge thank you to ValueCoders; they have been a massive help in enabling us to start developing our project within a few weeks, so it's been great! There have been two small bumps in the road, but overall, It's been a fantastic service. I have already recommended it to one of my friends."</p>
                                <span class="client-name">Mohammed Mirza</span>
                                <span class="client-quote">Director, LOCALMASTERCHEFS LTD</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="shadow-box">
                            <div class="upper-logo-box">
                                <picture>
                                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img2.webp">
                                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img2.png">
                                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/custom-logo-img2.png" alt="Valuecoders"
                                        width="260" height="110">
                                </picture>
                            </div>
                            <div class="client-description bg-white">
                                <p>ValueCoders is our go-to partner to help us realize our software needs; they are
                                    supportive, friendly, and always ready to help us when we face difficulties in the
                                    project. 10/10 would recommend.</p>
                                <span class="client-name">Michelle Fno</span>
                                <span class="client-quote">CEO, Miscato Limited</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="shadow-box">
                            <iframe  height="486" src="https://www.youtube.com/embed/d78gD-wwVTg"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background: url(<?php bloginfo('template_url'); ?>/images/cust-video-img2.webp) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=https://www.youtube.com/embed/W7Bxt2Up0NQ?autoplay=1><span class='iframe-bg'></span></a>"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="Testimonial Image"></iframe>
                            <div class="client-description bg-white">
                                <p>"ValueCoders had great technical expertise, both in front-end and back-end developmen. Other project management was well organized. Account management was friendly and always available. I would give ValueCoders ten out of ten!"</p>
                                <span class="client-name">Kris Bruynson</span>
                                <span class="client-quote">Director, Storloft</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="shadow-box">
                            <iframe height="486" src="https://www.youtube.com/embed/d78gD-wwVTg"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background: url(<?php bloginfo('template_url'); ?>/images/cust-video-img3.webp) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=https://www.youtube.com/embed/QCIMuRQkfKU?autoplay=1><span class='iframe-bg'></span></a>"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="Testimonial Image"></iframe>
                            <div class="client-description bg-white">
                                <p>We got an awesome product! I would highly recommend ValueCoders to anyone for their professional attitude & customer care. Hope success to them!</p>
                                <span class="client-name">Mr. Savarni</span>
                                <span class="client-quote">Founder- sbspco.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="shadow-box">
                            <div class="upper-logo-box">
                                <picture>
                                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img5.webp">
                                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img5.png">
                                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/custom-logo-img5.png" alt="Valuecoders"
                                        width="260" height="110">
                                </picture>
                            </div>
                            <div class="client-description bg-white">
                                <p>We have been working with ValueCoders for the last year now and have deployed multiple developers at different points in time. We are really happy with the support we get from ValueCoders and the resources they provide.</p>
                                <span class="client-name">Ramanshu Mahaur</span>
                                <span class="client-quote">Founder & CTO @Spinny</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-3">
                        <div class="flex-1">
                        <div class="shadow-box">
                            <div class="upper-logo-box">
                                <picture>
                                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img1.webp">
                                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img1.png">
                                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/custom-logo-img1.png" alt="Valuecoders"
                                        width="260" height="110">
                                </picture>
                            </div>
                            <div class="client-description bg-white">
                                <p>We have worked with ValueCoders for more than a year, and their skilled team has
                                    allowed us to scale up during certain projects, thereby allowing our full-time
                                    team to focus on core platform functionality. Recommended.</p>
                                <span class="client-name">Adam Watts</span>
                                <span class="client-quote">"President & COO, Fintex Advisors"</span>
                            </div>
                        </div>
					</div>
                        <div class="flex-1">
                            <div class="shadow-box">
                                <iframe height="486" src="https://www.youtube.com/embed/e7nbilPZzBE?autoplay=1"
                                    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background: url(<?php bloginfo('template_url'); ?>/images/cust-video-img4.webp) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=https://www.youtube.com/embed/e7nbilPZzBE?autoplay=1><span class='iframe-bg'></span></a>"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen title="Testimonial Image"></iframe>
                                <div class="client-description bg-white">
                                    <p>"The team at ValueCoder really has provided us with exceptional services in creating this one-of-a-kind portal, and it has been a fantastic experience. I was particularly impressed how efficiently and quickly the team always came up with creative solutions to provide us with all the funtionalities within the poral  we had requesteed."</p>
                                    <span class="client-name">Judith Mueller</span>
                                    <span class="client-quote">"Executive Director, Mueller Health Foundation"</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="shadow-box">
                                <div class="upper-logo-box">
                                    <picture>
                                        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img4.webp">
                                        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img4.png">
                                        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/custom-logo-img4.png" alt="Valuecoders"
                                            width="260" height="110">
                                    </picture>
                                </div>
                                <div class="client-description bg-white">
                                    <p>ValueCoders has accelerated our project and brought a talented developer to
                                        our team. We worked with a back-end coder with many years of experience that
                                        understood integrations, business strategy and brought new ideas to the
                                        table that boosted our UI/UX. I highly recommend connecting with ValueCoders
                                        and meeting their team, interviewing a couple of coders, and picking the
                                        best one for your project. Thank you for the great work over the last
                                        several months!</p>
                                    <span class="client-name">Michelle Fno</span>
                                    <span class="client-quote">"Founder/CEO, Navor LLC"</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="shadow-box">
                                <div class="upper-logo-box">
                                    <picture>
                                        <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img6.webp">
                                        <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img6.png">
                                        <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/custom-logo-img6.png" alt="Valuecoders"
                                            width="260" height="110">
                                    </picture>
                                </div>
                                <div class="client-description bg-white">
                                    <p>We have been working with ValueCoders since the start of 2020. After using
                                        ValueCoders for one project, we decided to outsource our entire development team
                                        to ValueCoders. We really like the flexibility and different skills that
                                        ValueCoders offers. We can quickly scale up and down as required. Since
                                        outsourcing to ValueCoders, our productivity has substantially increased. I
                                        appreciate the way that we have been able to outsource to ValueCoders but still
                                        maintain direct communications with the developers and control over their work.
                                        Thank you, ValueCoders!</p>
                                    <span class="client-name">Karl Turnbull</span>
                                    <span class="client-quote">"IT Director, Community Systems Foundation."</span>
                                </div>
                            </div>
                        </div>
                 </div>
               
                <div class="flex-3">
                    <div class="flex-1">
                        <div class="shadow-box">
                            <iframe height="486" src="https://www.youtube.com/embed/oVbfGyMPq50"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background: url(<?php bloginfo('template_url'); ?>/images/cust-video-img5.webp) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=https://www.youtube.com/embed/oVbfGyMPq50?autoplay=1><span class='iframe-bg'></span></a>"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="Testimonial Image"></iframe>
                            <div class="client-description bg-white">
                                <p>"We outsourced our website development and coding to ValueCoders, and we are super happy with their services. We'd recommend them for any website development service for business development."</p>
                                <span class="client-name">Jame Thompson</span>
                                <span class="client-quote">"edinstitute.com.au"</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="shadow-box">
                            <div class="upper-logo-box">
                                <picture>
                                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img3.webp">
                                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img3.png">
                                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/custom-logo-img3.png" alt="Valuecoders"
                                        width="260" height="110">
                                </picture>
                            </div>
                            <div class="client-description bg-white">
                                <p>The team at ValueCoders has been a fantastic asset within our startup business.
                                    The senior management provides great support, guidance, and advice to get you up
                                    and running with your team. They provided flexible services with both fully
                                    retained staff members to join our team and also really flexible resources that
                                    we pull in at short notice to help out on specific skills/projects. We had the
                                    option to interview all the people working on our business and get to know them
                                    before they joined the team. It gave us great confidence that the people joining
                                    had already been part of ValueCoders for some time, and their capabilities were
                                    known. </p>
                                <span class="client-name">Andrew North</span>
                                <span class="client-quote">"Managing Director, BlueLane Holdings Ltd."</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="shadow-box">
                            <iframe height="486" src="https://www.youtube.com/embed/d78gD-wwVTg"
                                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background: url(<?php bloginfo('template_url'); ?>/images/cust-video-img5.webp) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=https://www.youtube.com/embed/d78gD-wwVTg?autoplay=1><span class='iframe-bg'></span></a>"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="Testimonial Image"></iframe>
                            <div class="client-description bg-white">
                                <p>"What we found with ValueCoders was they took time. The Project managers took a lot of time to start, to really understand our project before coming up with a contract or what they thought we needed. I had the reassurance from the start that the project Managers knew what type of project I wanted and what my needs were. I find that reassuring and that's really why we chose ValueCoders."</p>
                                <span class="client-name">James Kelly</span>
                                <span class="client-quote">"Co-founder, Miracle Choice"</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="shadow-box">
                            <div class="upper-logo-box">
                                <picture>
                                    <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img7.webp">
                                    <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/custom-logo-img7.png">
                                    <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/custom-logo-img7.png" alt="Valuecoders"
                                        width="260" height="110">
                                </picture>
                            </div>
                            <div class="client-description bg-white">
                                <p>ValueCoders is a very professional development team. I used their expertise in the
                                    building of an online comparison tool. We defined a clear scope, and the team
                                    designed mock-ups first. With the help of online project tools and Skype Q&A
                                    sessions, you can really work together despite the great geographical distance. I
                                    would highly recommend the services of ValueCoders as they go the extra mile to
                                    deliver a good product.</p>
                                <span class="client-name">Gerald van Kooten</span>
                                <span class="client-quote">"Partner at Anders Invest B.V."</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!-- <div class="load-more-btn text-center">
                <a href="#">Load More</a>
            </div> ---->
        </div>
    </section>
    <section class="experts-talk-first-section bg-blue-linear padding-t-150 padding-b-150">
        <div class="container">
            <div class="head-txt text-center">
                <h2>Let’s Discuss Your Project</h2>
                <p>Get free consultation and let us know your project idea to turn it into an amazing digital product.
                </p>
            </div>
            <div class="text-center margin-t-50">
                <a class="green-btn" href="https://www.valuecoders.com/v2wp/contact">Talk To Our Experts <i
                        class="arrow-icon"></i></a>
            </div>
        </div>
    </section>
<?php
$whyhire = get_field('why-vc');
if( $whyhire ) :
$iswEnabled = $whyhire['is_enable'];
if( $iswEnabled == "yes" ){
?>
<section class="icon-with-img-section <?php echo $whyhire['sc_background']; ?> padding-t-150 padding-b-150">
	<div class="container">
		<div class="dis-flex col-box-outer">
			<div class="flex-2">
				<div class="head-txt">
					<?php echo $whyhire['content']; ?>
				</div>
				<?php if( $whyhire['options'] ) : ?>
				<div class="dis-flex hire-php-icon icon-box-outer">
				<?php 
		    	$whcount = 0;
		    	foreach( $whyhire['options'] as $row ) : $whcount++; ?>
					<div class="flex-2 margin-t-50">
						<div class="flex-3 box-3">
							<div class="dis-flex items-center">
								<?php 
								$wyicon 	= $row['icon'];
								$wyiconWp 	= $row['icon-wp'];
								if( $wyicon && $wyiconWp ){
								echo '<picture>
								<source type="'.$wyiconWp['mime_type'].'" srcset="'.$wyiconWp['url'].'">
								<source type="'.$wyicon['mime_type'].'" srcset="'.$wyicon['url'].'">
								<img loading="lazy" src="'.$wyicon['url'].'" alt="Valuecoders" width="'.$wyicon['width'].'" height="'.$wyicon['height'].'"> 
								</picture>';
								}else{
									echo '<span class="icon icon'.$whcount.'"></span>';
								}
								?>
								<span class="icon-txt">
									<?php echo $row['title']; ?>
								</span>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="flex-2 text-right right-box">
				<?php if(!wp_is_mobile()) : ?>
				<picture>
					<source type="<?php echo $whyhire['section_image_webp_format']['mime_type']; ?>" 
						srcset="<?php echo $whyhire['section_image_webp_format']['url']; ?>">
					<source type="<?php echo $whyhire['image']['mime_type']; ?>" 
						srcset="<?php echo $whyhire['image']['url']; ?>">
					<img loading="lazy" src="<?php echo $whyhire['image']['url']; ?>" alt="Valuecoders" 
					width="<?php echo $whyhire['image']['width']; ?>" height="<?php echo $whyhire['image']['height']; ?>">
				</picture>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php 
}
endif; ?>
<script>
function loadmore() {
	var x = document.getElementById("show-content");
	var y = document.getElementById("load-btn-outer");
	let lcounter = y.getAttribute("data-counter");
	y.setAttribute( "data-counter", (parseInt(lcounter) +1) );
	let showRow = y.getAttribute("data-counter");

	if( showRow == 1 ){
		x.style.display = "block";	
	} 
	
	if( showRow > 14 ){
		y.style.display = "none";
	}

	if( showRow > 1 ){
		document.getElementById("tgroup-"+showRow).style.display = "block";
	}
}
</script>
<?php get_footer(); ?>