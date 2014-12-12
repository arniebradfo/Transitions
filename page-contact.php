<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 * Template Name: Contact Page
 */
get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php get_template_part('part-contact'); ?>
		
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

