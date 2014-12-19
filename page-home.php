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


<div 
	id="wrapper-home" 
	style="
		display: block; 
		z-index: 999;
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background-color:black;
	"
></div>


<header id="home-header">


	<div id="ring-1" class="ring">
		<?php echo file_get_contents(get_template_directory_uri() . '/_/svg/polaris.graphics-ring-1.svg'); ?>
	</div>
	<div id="ring-2" class="ring">
		<?php echo file_get_contents(get_template_directory_uri() . '/_/svg/polaris.graphics-ring-2.svg'); ?>
	</div>
	<?php echo file_get_contents(get_template_directory_uri() . '/_/svg/polaris.graphics-animation-styleless.svg'); ?>


	<nav id="home-nav" class="nav foot-nav" role="navigation">
		<?php 
		wp_nav_menu( array(
			'theme_location' => 'secondary',
			'container' => false,
			'walker' => new description_walker()
		) ); ?>
	</nav>


</header>

<?php get_footer(); ?>