<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>


<!-- heading-home.php -->
<section class="heading heading--home heading--lacks-featured-media">

	<div class="heading__wrapper">

		<div class="heading__flex-splitter"></div>

		<div class="heading__featured-media heading__featured-media--empty"></div> 

		<div class="heading__logo">		
			<?php get_template_part('logo'); ?>
		</div>

		<h1 class="heading__title">
			<?php bloginfo( 'name' ); ?>
		</h1>

		<hr class="heading__rule" />

		<p class="heading__subtitle">
			<?php bloginfo( 'description' ); ?>
		</p>

		<?php 
		echo preg_replace( 
			'/<a\sclass="/',
			'<a class="button--fill ', // the first link gets a fill
			preg_replace( 
				'/<a\s/',
				'<a class="heading__menu-link button" ', // all links need classes
				wp_nav_menu( array(
					'theme_location'  => 'home',
					'container_class' => 'heading__menu',
					'container'       => 'nav',
					'menu_class'      => 'menu heading__menu-list',
					'depth'           => 1,
					'echo'            => false // so we can preg_replace
				))
			), 1 
		);
		?>

	</div>
	

</section><!--/ heading-home.php -->
