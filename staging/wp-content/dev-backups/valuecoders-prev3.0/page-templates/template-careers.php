<?php
/*
Template Name: Careers Page Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section">
	<div class="container">
		<div class="for-client-logo-box">
		<i></i>
		<i></i>
		<i></i>
		<i></i>
		</div>
		<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>
		<?php dynamic_sidebar('vc-profile'); ?>
	</div>
</section>

<?php vcTrustedStartups(); ?>

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
endif;
?>
<!-- WHy Hire Developer From VC -->

<?php 
$clientele = get_field( 'vc-clients' );
if( $clientele['is_enabled'] == 'yes' ) :
$dtImage 		= $clientele['image'];
$dtImageWebp	= $clientele['image-webp'];

$ltImage 		= $clientele['image-lt'];
$ltImageWebp	= $clientele['image-lt-webp'];
?>
<section class="client-img-section padding-b-150 <?php echo $clientele['sc_background']; ?>">
	<div class="container">
		<div class="dis-flex col-box-outer items-center">
		<?php if( !wp_is_mobile() ) : ?>
			<div class="flex-2 left-box">
				<?php 
				if( $dtImage && $dtImageWebp ) {
					echo '<picture class="dark-theme-img">
					<source type="'.$dtImageWebp['mime_type'].'" srcset="'.$dtImageWebp['url'].'">
					<source type="'.$dtImage['mime_type'].'" srcset="'.$dtImage['url'].'">
					<img loading="lazy" src="'.$dtImage['url'].'" alt="Valuecoders" width="'.$dtImage['width'].'" height="'.$dtImage['height'].'"> 
				</picture>';	
				}

				if( $ltImage && $ltImageWebp ) {
					echo '<picture class="lighter-theme-img">
					<source type="'.$ltImageWebp['mime_type'].'" srcset="'.$ltImageWebp['url'].'">
					<source type="'.$ltImage['mime_type'].'" srcset="'.$ltImage['url'].'">
					<img loading="lazy" src="'.$ltImage['url'].'" alt="Valuecoders" width="'.$ltImage['width'].'" 
					height="'.$ltImage['height'].'"> 
				</picture>';	
				}

				?>
			</div>
			<?php endif; ?>
			<div class="flex-2 right-box tick-icon-list"><?php echo $clientele['content']; ?></div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- ValueCoder clientele #Ends Here -->

<?php 
$teamVc = get_field( 'team-vc' );
if( $teamVc['is_enabled'] == 'yes' ) :
$teamImage 		= $teamVc['image'];
$teamImageWebp	= $teamVc['image-webp'];
?>
<section class="team-valuecoders-section padding-t-150 padding-b-150 <?php echo $teamVc['sc_background']; ?>">
	<div class="container">
		<div class="head-txt text-center">
			<?php echo $teamVc['content']; ?>
		</div>
	</div>
	<div class="margin-t-100">
		<?php 
		if( $teamImage && $teamImageWebp ) {
			echo '<picture>
			<source type="'.$teamImageWebp['mime_type'].'" srcset="'.$teamImageWebp['url'].'">
			<source type="'.$teamImage['mime_type'].'" srcset="'.$teamImage['url'].'">
			<img loading="lazy" src="'.$teamImage['url'].'" alt="Valuecoders" width="'.$teamImage['width'].'" height="'.$teamImage['height'].'"> 
		</picture>';
		}
		?>
	</div>
</section>
<?php endif; ?>

<section class="employee-testimonial-career-section  padding-t-150 padding-b-150">
        <div class="container">
            <div class="head-txt text-center">
                <h2>What Our Employee Say</h2>
                <p>We are grateful for our clients' trust in us, and we take pride in providing quality solutions that<br> surpass their expectations. Here is what some of them have to say about us:</p>
            </div>
            <div class="dis-flex margin-t-100">
                <div class="flex-3">
                    <div class="shadow-box">
                        <iframe height="271" src="https://www.youtube.com/embed/P6IJX4toWAU"
                            srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background: url(<?php bloginfo('template_url'); ?>/images/career-testi-video1.webp) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=https://www.youtube.com/embed/P6IJX4toWAU><span class='iframe-bg'></span></a>"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen title="Testimonial Image"></iframe>
                        <div class="client-description bg-lightgray small-column">
                            <span class="client-name">Khushbu Chauhan</span>
                            <span class="client-quote">Sr. Project Management Executive - L2</span>
                        </div>
                    </div>
                </div>
                <div class="flex-3">
                    <div class="shadow-box">
                        <iframe height="271" src="https://youtube.com/embed/8DBMHP0jOyM"
                            srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}a{display:flex;align-items:center;justify-content:center;}.iframe-bg{background: url(<?php bloginfo('template_url'); ?>/images/career-testi-video2.webp) top center no-repeat;background-size:cover;width:100%;height:100%;}</style><a href=https://youtube.com/embed/8DBMHP0jOyM><span class='iframe-bg'></span></a>"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen title="Testimonial Image"></iframe>
                        <div class="client-description bg-lightgray small-column">
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
                                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/profile-1.webp">
                                 <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/profile-1.png">
                                 <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/profile-1.png" alt="Valuecoders" width="76" height="74">
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
                         <p>At ValueCoders, all these things are taken care of. I'm always inspired to do my best and think forward. I like the mindset and culture, and being part of a team that gives its best to make the next generation of technologies usable and accessible to all its clients. For me, this is more than a job. I’m investing my time, my knowledge and experience in a company that is investing in me.</p>
                        </div>
                        <div class="cust-img-box dis-flex">
                            <div class="profile profile1">
                            <picture>
                                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/profile-2.webp">
                                 <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/profile-2.png">
                                 <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/profile-2.png" alt="Valuecoders" width="76" height="74">
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
                                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/profile-3.webp">
                                 <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/profile-3.png">
                                 <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/profile-3.png" alt="Valuecoders" width="76" height="74">
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
                            <p>My journey here at ValueCoders has been fantastic, filled with guidance and learning. Day by day I have learned new things thanks to all the support from my seniors and colleagues, the people here at ValueCoders are amazing and full of knowledge.</p>
                        </div>
                        <div class="cust-img-box dis-flex">
                            <div class="profile profile3">
                            <picture>
                                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/profile-4.webp">
                                 <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/profile-4.png">
                                 <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/profile-4.png" alt="Valuecoders" width="76" height="74">
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
                            <p>I got to know about this from a friend as unfortunately, I couldn't attend the 'Rewards and Recognition Call' because I was occupied with something else but the moment I heard it I went into a state of exuberance. Everyone around was so happy for me and above all, I saw pride in my manager’s eyes, Vipul sir, that his lad did it. I prominently agree to the fact he is the reason I got this award. Moreover, my journey in this organisation so far is above par in all aspects, I have been involved in multiple projects I got to know a lot about how the wheel rotates in corporate because yes obviously I was a freshman and needed to learn a lot,this company gave me the opportunity and right resources at the right time. Lastly I want to thank my peers for supporting me throughout. Thankyou ValueCoders for this recognition.</p>
                        </div>
                        <div class="cust-img-box dis-flex">
                            <div class="profile profile4">
                            <picture>
                                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/profile-5.webp">
                                 <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/profile-5.png">
                                 <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/profile-5.png" alt="Valuecoders" width="76" height="74">
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
                                <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/profile-6.webp">
                                 <source type="image/png" srcset="<?php bloginfo('template_url'); ?>/images/profile-6.png">
                                 <img loading="lazy" src="<?php bloginfo('template_url'); ?>/images/profile-6.png" alt="Valuecoders" width="76" height="74">
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
			<iframe src="https://vinove.kekahire.com/api/embedjobs/efdbfe8f-0c89-43a7-b197-ff60d832994a"></iframe>
		</div>
	</div>
</section>
<?php get_footer(); ?>