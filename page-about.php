<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 * Template Name: About Page
 */
get_header(); ?>
	
	<?php echo file_get_contents(get_template_directory_uri() . '/_/svg/build/svg-defs-logos.svg'); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php get_template_part('part-about'); ?>
		
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>

