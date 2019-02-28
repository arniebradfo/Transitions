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
<header class="heading heading--home heading--lacks-featured-media" id="heading">

	<div class="heading__column">

		<div class="heading__flex-splitter"></div>

		<div class="heading__featured-media heading__featured-media--empty"></div> 

		<div class="heading__logo jsTarget-loadDelay">		
			<?php get_template_part('logo'); ?>
		</div>

		<h1 class="heading__title jsTarget-loadDelay">
			<?php bloginfo( 'name' ); ?>
		</h1>

		<hr class="heading__rule jsTarget-loadDelay" />

		<p class="heading__subtitle jsTarget-loadDelay">
			<?php bloginfo( 'description' ); ?>
		</p>

		<?php 
			trns_wp_nav_menu( array(
				'link_class'       => 'heading__menu-link button',
				'first_link_class' => 'button--fill',
				'theme_location'   => 'home',
				'container_class'  => 'heading__menu jsTarget-loadDelay',
				'container'        => 'nav',
				'menu_class'       => 'menu heading__menu-list',
				'depth'            => 1,
			));
		?>

	</div>

</header><!--/ heading-home.php -->
