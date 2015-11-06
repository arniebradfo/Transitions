<?php
/*
Template Name: Home Page
*/

/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); 

?>

<div id="home-bg"></div>

<header id="home-header" >

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php the_content(); ?>

	<?php endwhile; endif; ?>
	
	<nav id="home-nav" class="nav foot-nav">
		<?php 
		wp_nav_menu( array(
			'theme_location' => 'secondary',
			'container' => false,
			'walker' => new description_walker()
		) ); ?>
	</nav>

</header>

<?php get_footer(); ?>