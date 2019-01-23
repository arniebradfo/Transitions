<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>
	
	<h1 class="page-title">Contact</h1>

	<article class="post" id="post-<?php the_ID(); ?>">

		<header id="contact-header" class="contact-masthead">

			<section id="cd-google-map">
				<div id="google-container"></div>
				<div id="cd-zoom-in" class="icon-capsule">
					<svg class="icon icon-plus">
						<use xlink:href="#icon-plus"></use>
					</svg>
				</div>
				<div id="cd-zoom-out" class="icon-capsule">
					<svg class="icon icon-minus">
						<use xlink:href="#icon-minus"></use>
					</svg>
				</div>
			</section>

			<h1 class="entry-title">
				Greetings from</br>Logan, Utah
			</h1>

			<!-- svg button -->
			<div class="icon-capsule scroll-down">
				<svg class="icon icon-arrow-bottom">
					<use xlink:href="#icon-arrow-bottom"></use>
				</svg>
			</div>

		</header>

		<section class="about-section">

			<h3 id="contact-invitation">
				Drop me a line at: 
				<a href="mailto:<?php echo get_bloginfo('admin_email'); ?>">
					<?php echo get_bloginfo('admin_email'); ?>
				</a>
				<br/><br/>
				or
			</h3>

			<!-- contact form 7 should be here -->
			<?php the_content(); ?>

		</section>

		<div class="icon-capsule scroll-to-top">
			<svg class="icon icon-arrow-double-top">
				<use xlink:href="#icon-arrow-double-top"></use>
			</svg>
		</div>

	</article>

	<?php edit_post_link(__('Edit this entry','html5reset'), '<p>', '</p>'); ?>