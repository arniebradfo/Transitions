<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>
	
	<h1 class="page-title">About</h1>

	<article class="post" id="post-<?php the_ID(); ?>">

		<header id="about-header" class="about-masthead">

			<picture class="perfect-contain">
				<!--[if IE 9]><video style="display: none;"><![endif]-->
				<?php $thumbID = get_post_thumbnail_id(); ?>
				<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'img2XL' )[0]; 	?>" 	media="(min-width: 3000px)">
				<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'img3XL' )[0]; 	?>" 	media="(min-width: 2000px)">
				<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'img4XL' )[0]; 	?>" 	media="(min-width: 1500px)">
				<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'imgXL' )[0];		?>" 	media="(min-width: 1000px)">
				<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'imgL' )[0]; 		?>" 	media="(min-width: 0px)">
				<!--[if IE 9]></video><![endif]-->
				<img srcset="<?php // ??? - not sure if its nessasary to put anything here - ??? ?>" alt="<?php echo get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>">
				<noscript><?php the_post_thumbnail('full'); ?></noscript>
			</picture>

			<h1 class="entry-title">
				Hi, I'm James 
				<span>What can I do for you?</span>
			</h1>

			<!-- svg button -->
			<div class="icon-capsule scroll-down">
				<svg class="icon icon-arrow-bottom">
					<use xlink:href="#icon-arrow-bottom"></use>
				</svg>
			</div>

		</header>

		<section class="about-section" id="bio">

			<h2>Do you need a web &amp; graphics guy?</h2>
			<p>
				I can help! 
				My name's James Bradford. 
				I’m a  multifaceted designer and developer living in beautiful Logan, Utah. 
				I produce compelling visual and interactive experiences by blending graphic design and web development with the perfect mix of technology and creativity. 
				I believe the web should be more intuitive, friendly, and beautiful, so I strive to craft simple, usable interfaces to promote remarkable and memorable brand identity.
				<!-- Scroll down to review my qualifications. --> 
			</p>

		</section>

		<section class="about-section" id="skills">

			<h2>Skills</h2>

			<h3>DESIGN SKILLSET</h3>
			<ul id="list-design" class="skillset clearfix">
				<li class="skill" id="logo-layout"><figure>
					<figcaption>Layout &amp;</br>Wireframing</figcaption>
					<svg class="logo program"><use xlink:href="#logo-layout"></use></svg>
				</figure></li>
				<li class="skill" id="logo-info-62"><figure>
					<figcaption>Information</br>Heiarchy</figcaption>
					<svg class="logo program"><use xlink:href="#logo-info-62"></use></svg>
				</figure></li>
				<li class="skill" id="logo-code"><figure>
					<figcaption>Web</br>Development</figcaption>
					<svg class="logo program"><use xlink:href="#logo-code"></use></svg>
				</figure></li>
				<li class="skill" id="logo-illustration"><figure>
					<figcaption></br>Illustration</figcaption>
					<svg class="logo program"><use xlink:href="#logo-illustration"></use></svg>
				</figure></li>
				<li class="skill" id="logo-photography"><figure>
					<figcaption></br>Photography</figcaption>
					<svg class="logo program"><use xlink:href="#logo-photography"></use></svg>
				</figure></li>
				<li class="skill" id="logo-packaging"><figure>
					<figcaption>Package</br>Design</figcaption>
					<svg class="logo program"><use xlink:href="#logo-packaging"></use></svg>
				</figure></li>
				<li class="skill" id="logo-ui"><figure>
					<figcaption>User</br>Interface</figcaption>
					<svg class="logo program"><use xlink:href="#logo-ui"></use></svg>
				</figure></li>
				<li class="skill" id="logo-ux"><figure>
					<figcaption>User</br>Experience</figcaption>
					<svg class="logo program"><use xlink:href="#logo-ux"></use></svg>
				</figure></li>
				<li class="skill" id="logo-branding"><figure>
					<figcaption>Branding &amp;</br>Identity</figcaption>
					<svg class="logo program"><use xlink:href="#logo-branding"></use></svg>
				</figure></li>
				<li class="skill" id="logo-iconography"><figure>
					<figcaption></br>Iconography</figcaption>
					<svg class="logo program"><use xlink:href="#logo-iconography"></use></svg>
				</figure></li>
				<li class="skill" id="logo-typography"><figure>
					<figcaption></br>Typography</figcaption>
					<svg class="logo program"><use xlink:href="#logo-typography"></use></svg>
				</figure></li>
				<li class="skill" id="logo-color-theory"><figure>
					<figcaption>Color</br>Theory</figcaption>
					<svg class="logo program"><use xlink:href="#logo-color-theory"></use></svg>
				</figure></li>
			</ul>

			<h3>Software proficiencies</h3>
			<ul id="list-software" class="skillset clearfix">
				<!-- nested lists -->
				<li class="skillsubset" id="adobe-software">
					<ul class="clearfix">
						<li class="set-title" id="logo-adobe"><figure>
							<figcaption>Adobe</br>Creative Suite</figcaption>
							<svg class="logo program"><use xlink:href="#logo-adobe"></use></svg>
						</figure></li>
						<li class="subskill" id="logo-a-photoshop"><figure>
							<figcaption>Photoshop</figcaption>
							<svg class="logo program"><use xlink:href="#logo-a-photoshop"></use></svg>
							<div class="progress" style="width:90%;"><span>90%</span></div>
						</figure></li>
						<li class="subskill" id="logo-a-illustrator"><figure>
							<figcaption>Illustrator</figcaption>
							<svg class="logo program"><use xlink:href="#logo-a-illustrator"></use></svg>
							<div class="progress" style="width:95%;"><span>95%</span></div>
						</figure></li>
						<li class="subskill" id="logo-a-indesign"><figure>
							<figcaption>InDesign</figcaption>
							<svg class="logo program"><use xlink:href="#logo-a-indesign"></use></svg>
							<div class="progress" style="width:85%;"><span>85%</span></div>
						</figure></li>
						<li class="subskill" id="logo-a-lightroom"><figure>
							<figcaption>Lightroom</figcaption>
							<svg class="logo program"><use xlink:href="#logo-a-lightroom"></use></svg>
							<div class="progress" style="width:50%;"><span>50%</span></div>
						</figure></li>
						<li class="subskill" id="logo-a-bridge"><figure>
							<figcaption>Bridge</figcaption>
							<svg class="logo program"><use xlink:href="#logo-a-bridge"></use></svg>
							<div class="progress" style="width:60%;"><span>60%</span></div>
						</figure></li>
					</ul>
				</li>
				<li class="skillsubset clearfix" id="google-software">
					<ul class="clearfix">
						<li class="set-title" id="logo-g-drive"><figure>
							<figcaption>Google</br>Drive Software</figcaption>
							<svg class="logo program"><use xlink:href="#logo-g-drive"></use></svg>
						</figure></li>
						<li class="subskill" id="logo-g-docs"><figure>
							<figcaption>Docs</figcaption>
							<svg class="logo program"><use xlink:href="#logo-g-docs"></use></svg>
							<div class="progress" style="width:85%;"><span>85%</span></div>
						</figure></li>
						<li class="subskill" id="logo-g-sheets"><figure>
							<figcaption>Sheets</figcaption>
							<svg class="logo program"><use xlink:href="#logo-g-sheets"></use></svg>
							<div class="progress" style="width:80%;"><span>80%</span></div>
						</figure></li>
						<li class="subskill" id="logo-g-slides"><figure>
							<figcaption>Slides</figcaption>
							<svg class="logo program"><use xlink:href="#logo-g-slides"></use></svg>
							<div class="progress" style="width:60%;"><span>60%</span></div>
						</figure></li>
					</ul>
				</li>
				<li class="skill" id="logo-sublime-text"><figure>
					<figcaption>Sublime TExt</figcaption>
					<svg class="logo program"><use xlink:href="#logo-sublime-text"></use></svg>
					<div class="progress" style="width:80%;"><span>80%</span></div>
				</figure></li>
				<li class="skill" id="logo-mamp"><figure>
					<figcaption>MAMP</figcaption>
					<svg class="logo program"><use xlink:href="#logo-mamp"></use></svg>
					<div class="progress" style="width:45%;"><span>45%</span></div>
				</figure></li>
			</ul>

			<h3>PROGRAMMING FLUENCY</h3>
			<ul id="list-programing" class="skillset clearfix">
				<li class="skill" id="logo-html5"><figure>
					<figcaption>HTML 5</figcaption>
					<svg class="logo program"><use xlink:href="#logo-html5"></use></svg>
					<div class="progress" style="width:90%;"><span>90%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
				<li class="skill" id="logo-css3"><figure>
					<figcaption>CSS 3</figcaption>
					<svg class="logo program"><use xlink:href="#logo-css3"></use></svg>
					<div class="progress" style="width:95%;"><span>95%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
				<li class="skill" id="logo-sass"><figure>
					<figcaption>Sass</figcaption>
					<svg class="logo program"><use xlink:href="#logo-sass"></use></svg>
					<div class="progress" style="width:85%;"><span>85%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
				<li class="skill" id="logo-javascript"><figure>
					<figcaption>javascript</figcaption>
					<svg class="logo program"><use xlink:href="#logo-javascript"></use></svg>
					<div class="progress" style="width:60%;"><span>60%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
				<li class="skill" id="logo-jquery"><figure>
					<figcaption>jquery</figcaption>
					<svg class="logo program"><use xlink:href="#logo-jquery"></use></svg>
					<div class="progress" style="width:70%;"><span>70%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
				<li class="skill" id="logo-wordpress"><figure>
					<figcaption>wordpress</figcaption>
					<svg class="logo program"><use xlink:href="#logo-wordpress"></use></svg>
					<div class="progress" style="width:85%;"><span>85%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
				<li class="skill" id="logo-php"><figure>
					<figcaption>php</figcaption>
					<svg class="logo program"><use xlink:href="#logo-php"></use></svg>
					<div class="progress" style="width:50%;"><span>50%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
				<li class="skill" id="logo-apache"><figure>
					<figcaption>apache</figcaption>
					<svg class="logo program"><use xlink:href="#logo-apache"></use></svg>
					<div class="progress" style="width:25%;"><span>25%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
				<li class="skill" id="logo-mysql"><figure>
					<figcaption>mysql</figcaption>
					<svg class="logo program"><use xlink:href="#logo-mysql"></use></svg>
					<div class="progress" style="width:15%;"><span>15%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
				<li class="skill" id="logo-grunt"><figure>
					<figcaption>grunt.js</figcaption>
					<svg class="logo program"><use xlink:href="#logo-grunt"></use></svg>
					<div class="progress" style="width:35%;"><span>35%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
				<li class="skill" id="logo-node"><figure>
					<figcaption>node.js</figcaption>
					<svg class="logo program"><use xlink:href="#logo-node"></use></svg>
					<div class="progress" style="width:10%;"><span>10%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
				<li class="skill" id="logo-npm"><figure>
					<figcaption>npm</figcaption>
					<svg class="logo program"><use xlink:href="#logo-npm"></use></svg>
					<div class="progress" style="width:15%;"><span>15%</span></div>
					<a href="#" class="icon-capsule"><svg class="icon icon-query">
						<use xlink:href="#icon-query"></use></svg></a>
				</figure></li>
			</ul>

		</section>

		<section class="about-section" id="work-experience">
			<h2>Work Experience</h2>

			<ul>

				<li><h3>Bestway Global</h3>
					<h5>Digital Operator &amp; Production Assistant</h5>
					<div class="work-info">
						<span class="work-location">Phuket,</br>Thailand</span>
						<time datetime="2015-1"> Jan. 2015 </time>
					</div>
					<p>
						Worked as an integral part of a photo/video production team on a 2 week photo shoot of more than 400 items 
						that included product photos, lifestyle photos, and a instructional video component.
					</p>
					<p>
						Helped compose shots and adjusted lighting/camera settings as needed.
						Helped art direct wardrobe/product/set combinations and photo compositions. 
						Managed and directed models including children ages 2-12 years. 
						Color corrected and light balanced photos as examples for a post-production team to follow. 
						Filled in as a photographer when needed.  
					</p>
					<p class="work-responsibilities">
						<span>Responsible for: </span>
						set design, 
						art direction, 
						photo editing, 
						photography, 
						scheduling &amp; management
					</p>
				</li>

				<li><h3>Willoughby &amp; Crane</h3>
					<h5>Freelance Logo Development</h5>
					<div class="work-info">
						<time datetime="2014-12">Dec. 2014</time>
					</div>
					<p>
						Designed a logo and branding identity for a Savannah, GA, based consulting firm.
					</p>
					<p class="work-responsibilities">
						<span>Responsible for: </span>
						logo design, 
						branding, 
						layout
					</p>
				</li>

				<li><h3>Bestway USA</h3>
					<h5>Production Assistant &amp; Digital Operator</h5>
					<div class="work-info">
						<span class="work-location">Phoenix,</br>AZ</span>
						<time datetime="2014-12"> Oct. 2014–</br>Dec. 2014 </time>
					</div>
					<p>
						Worked as an integral part of a photo/video production team on an epic 2 month photo shoot of more than 400 items 
						that included product photos, lifestyle photos, and a promotional video component.
					</p>
					<p>
						Organized and prepped all products and sets. 
						Helped art direct wardrobe/product/set combinations and photo compositions. 
						Managed and directed models including children ages 2-12 years. 
						Color corrected and light balanced photos as examples for a post-production team to follow. 
						Worked closely with a videographer to storyboard and organize the production of a promotional video for above ground pools and pool toys. 
						Filled in as a photographer when needed.  
					</p>
					<p class="work-responsibilities">
						<span>Responsible for: </span>
						set design, 
						art direction, 
						storyboarding, 
						photo editing, 
						photography, 
						scheduling &amp; management
					</p>
				</li>

				<li><h3>Covey Rise</h3>
					<h5>Freelance Photo Editing &amp; Graphic Design</h5>
					<div class="work-info">
						<time datetime="2014-2"> Feb. 2014–</br>present </time>
					</div>
					<p>
						Worked with the art director to edit photos for a bird hunting magazine.
					</p>
					<ul>
						<li><h4>Quail Coalition</h4>
							<h5>Freelance Graphic Design &amp; web development</h5>
							<p>
								Designed a 42 page annual publication for a quail conservation 
								nonprofit in conjunction with the Covey Rise team.
							</p>
							<p class="work-responsibilities">
								<span>Responsible for: </span>
								logo design, 
								layout, 
								photo editing
							</p>
						</li>
					</ul>
				</li>
				
				<li><h3>Frontline Advance LLC</h3>
					<div class="work-info">
						<time datetime="2014-1"> Jan. 2014–</br>present </time>
					</div>
					<p>
						Designed a wide range of promotional materials for 
						eCommerce and marketing of various sub-brands including:
					</p>
					<ul>
						<li><h4>Solo Stove</h4>
							<h5>Freelance Graphic Design &amp; web development</h5>
							<div class="work-info">
								<time datetime="2014-1">Jan. 2014–</br>present</time>
							</div>
							<p>
								Cxreated promotional ads and other web content for solostove.com
							</p>
							<p class="work-responsibilities">
								<span>Responsible for: </span>
								icon design,
								technical illustration, 
								copywriting, 
								layout, 
								infographics, 
								web development, 
								photo editing
							</p>
						</li>
						<li><h4>Fox Outfitters</h4>
							<h5>Freelance Branding, Graphic Design, &amp; Web Development</h5>
							<div class="work-info">
								<time datetime="2014-1">Jan. 2014–</br>present</time>
							</div>
							<p>
								Created initial logo and branding identity for 
								ecommerce camping gear startup. Designed and developed 
								a custom BigCommerce theme for their web platform.
							</p>
							<p class="work-responsibilities">
								<span>Responsible for: </span>
								branding, 
								logo design, 
								icon design, 
								package design, 
								photo editing, 
								interaction design, 
								web development
							</p>
						</li>
						<li><h4>SlumberMaax</h4>
							<h5>Freelance Web Development</h5>
							<div class="work-info">
								<time datetime="2014-2"> Feb. 2014 </time>
							</div>
							<p>
								Refurbished homepage of an ecommerce mattress distributer 
								by creating new sliding banners and animated categorical links.
							</p>
							<p class="work-responsibilities">
								<span>Responsible for: </span>
								layout, 
								interaction design, 
								web development
							</p>
						</li>
					</ul>
				</li>

				<li><h3>Dura Global Sourcing</h3>
					<div class="work-info">
						<time datetime="2014-1">Jan. 2014–</br>present</time>
					</div>
					<p>
						Designed a wide range of promotional materials for 
						eCommerce and marketing of various sub-brands including:
					</p>
					<ul>
						</li>
						<li><h4>Perfect Cloud</h4>
							<h5>Freelance Branding &amp; Graphic Design</h5>
							<div class="work-info">
								<time datetime="2014-5">May. 2014</time>
							</div>
							<p>
								Created initial logo and branding identity for 
								a memory foam mattress start up.
							</p>
							<p class="work-responsibilities">
								<span>Responsible for: </span>
								branding, 
								logo development, 
								icon design, 
								package design, 
								infographics
							</p>
						</li>
						<li><h4>Lumitronics</h4>
							<h5>Freelance Logo &amp; Package Design</h5>
							<div class="work-info">
								<time datetime="2014-5">May.-Sept.</br>2014</time>
							</div>
							<p>
								Created a new logo and packaging for LED trailer brake lights.
							</p>
							<p class="work-responsibilities">
								<span>Responsible for: </span>
								logo development, 
								package design
							</p>
						</li>
						<li><h4>e Flame</h4>
							<h5>Freelance Branding &amp; Graphic Design</h5>
							<div class="work-info">
								<time datetime="2014-9">Sept. 2014</time>
							</div>
							<p>
								Designed info graphics for a line of electric heaters.
							</p>
							<p class="work-responsibilities">
								<span>Responsible for: </span>
								branding, 
								icon design, 
								infographics, 
								layout
							</p>
						</li>
					</ul>
				</li>

				<li><h3>The Keer Group</h3>
					<h5>Freelance Graphic Design &amp; Web Development</h5>
					<div class="work-info">
						<time datetime="2013-11">Nov. 2013</br>–present</time>
					</div>
					<ul>
						<li><h4>Wild Chef Spices</h4>
							<p>
								Photoshopped new labels onto existing line of product photos to avoid a new photoshoot after a brand redesign.
							</p>
						</li>
						<li><h4>Woodcock Limited</h4>
							<p>
								Designed an annual publication for the Woodcock Ltd. Conservation Society.
								Developed the menu bar for their wordpress site.
								Designed other promotional materials.
							</p>
						</li>
					</ul>
				</li>

				<li><h3>Bestway Global</h3>
					<div class="work-info">
						<span class="work-location">Shanghai,</br>China</span>
					</div>
					<ul>
						<li><h5>Graphic Designer</h5>
							<div class="work-info">
								<time datetime="2013-9">Sept. 2013–</br>Mar. 2014</time>
								<a href="#" class="icon-capsule dark view-work"><svg class="icon">
									<use xlink:href="#icon-view"></use></svg></a>
							</div>
							<p>
								Worked closely with the art director and sales team to create graphics 
								and branding for Bestway and its subsidiary brands including: 
								Pavillo Camping Gear, 
								Swim Doctor, 
								Hydroforce, 
								UVcareful, 
								and Cloud9. 
							</p>
							<p>
								Lead in-house package design production team in the development of 
								dimension independent package design templates. Educated the team on 
								the tools and processes needed to produce print ready packaging for 
								over 200 products.
							</p>
							<p class="work-responsibilities">
								<span>Responsible for: </span>
								Branding, 
								logo design, 
								layout, 
								package design, 
								illustration, 
								icon design, 
								web design, 
								storyboarding, 
								photo editing
							</p>
						</li>
						<li><h5>User experience Design Intern</h5>
							<div class="work-info">
								<time datetime="2013-7">July–</br>Sept. 2013 </time>
							</div>
							<p>
								Selected from more than 500 applicants to be on a 6 person 
								multidisciplinary design team that also included industrial 
								designers and toy designers.
							</p>
							<p>
								Worked with team through multiple cycles of research, 
								design, consumer testing, and redesign to produce a set of 6 
								new market ready products for Bestway’s summer product line.
							</p>
						</li>
					</ul>
				</li>

				<li><h3>Nancy's Bakery &amp; Bistro</h3>
					<h5>Freelance Branding &amp; Graphic Design</h5>
					<div class="work-info">
						<span class="work-location">Shanghai,</br>China</span>
						<time datetime="2013-9">Oct. 2013–</br>Jan. 2014</time>
					</div>
					<p>
						Designed and produced a new bilingual (English and Chinese) 
						branding identity and materials for a restaurant in Pudong district, Shanghai.
					</p>
					<p class="work-responsibilities">
						<span>Responsible for: </span>
						branding, 
						logo design, 
						menu design, 
						copywriting, 
						photography, 
						photo editing, 
						layout, 
						package design
					</p>
				</li>

				<li><h3>Jared Goldberg</h3>
					<h5>Freelance Web Development</h5>
					<div class="work-info">
						<span class="work-location">Shanghai,</br>China</span>
						<time datetime="2013-12">Dec. 2013 </time>
					</div>
					<p>
						Created a portfolio microsite to be used for a graduate 
						school application resulting in Jared’s acceptance to the 
						California College of the Arts master’s program.					
					</p>
					<p class="work-responsibilities">
						<span>Responsible for: </span>
						interaction design, 
						web development
					</p>
				</li>

				<li><h3>University of Georgia Office of Sustainability &amp;</br>
					Students for Environmental Action</h3>
					<h5>pro Bono Graphic Design</h5>
					<div class="work-info">
						<span class="work-location">Athens, GA</span>
						<time datetime="2013-4">Spring 2013</time>
					</div>
					<p>
						designed logo and branded promotional materials for UGA’s 
						Earth Week events that included: posters, banners, t shirts, 
						and digital media.
					</p>
					<p class="work-responsibilities">
						<span>Responsible for: </span>
						logo development, 
						branding, 
						layout, 
						photo editing, 
						copywriting
					</p>
				</li>

				<li><h3>University of Georgia Cycling Team</h3>
					<h5>Pro Bono Graphic Design</h5>
					<div class="work-info">
						<span class="work-location"> Athens, GA </span>
						<time datetime="2012-11">Winter</br>2012–2013</time>
					</div>
					<p>
						Designed the 2013 cycling team uniform including: shirts, jackets, hats, bibs, and socks.
					</p>
				</li>

				<li><h3>Skateshop of Athens</h3>
					<h5>Freelance Graphic Design &amp; Illustration</h5>
					<div class="work-info">
						<span class="work-location">Athens, GA</span>
						<time datetime="2012-6">Summer 2012</time>
					</div>
					<p>
						Designed graphics for the shop brand of skateboard decks.
					</p>
				</li>
								
			</ul>
		</section>

		<section class="about-section" id="education">
			<h2>Education</h2>

			<ul>
				<li><h3>University of Georgia</h3>
					<h4>BFA Graphic Design</h4>
					<div class="work-info">
						<span class="work-location">Athens, GA</span>
						<time datetime="2009-8">Fall 2009–</br>Spring 2013</time>
					</div>
					<p>
						Lamar Dodd School of Art</br>HOPE Scholarship - full tuition
					</p>
				</li>
				<li><h3>Governor's Honors Program</h3>
					<h4>Visual Arts Major, Science Minor</h4>
					<div class="work-info">
						<span class="work-location">Valdosta, GA</span>
						<time datetime="2008-4">Summer 2008</time>
					</div>
					<p>
						An audition-only, state-sponsored summer 
						residential program of college level courses.
					</p>
				</li>
			</ul>

		</section>

		<div class="icon-capsule scroll-to-top">
			<svg class="icon icon-arrow-double-top">
				<use xlink:href="#icon-arrow-double-top"></use>
			</svg>
		</div>

	</article>

	<?php edit_post_link(__('Edit this entry','html5reset'), '<p>', '</p>'); ?>