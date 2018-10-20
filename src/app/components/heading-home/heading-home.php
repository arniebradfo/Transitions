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
<section class="heading">

	<div class="heading__wrapper">
	
		<div class="heading__logo">		
			<?php get_template_part('logo'); ?>
		</div>

		<h1 class="heading__title">
			<?php bloginfo( 'name' ); ?>
		</h1>

		<hr class="heading__rule" />

		<p class="heading__description">
			<?php bloginfo( 'description' ); ?>
		</p>

		<?php wp_nav_menu( array(
			'theme_location'  => 'home',
			'container_class' => 'heading__menu',
			'container'       => 'nav',
			'menu_class'      => 'menu heading__menu-list',
			'depth'           => 1		
		)); ?>

	</div>
	

</section><!--/ heading-home.php -->
