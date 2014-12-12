<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

	<?php if (have_posts()) : ?>



		<h2 class="page-title"><?php _e('Search Results','html5reset'); ?></h2>

		<?php // post_navigation(); ?>

		<div class="post-links clearfix">
		<?php while (have_posts()) : the_post(); ?>
		
			<?php get_template_part('part-postlinks'); ?>

		<?php endwhile; ?>
		</div> <!-- end the clearfix post-links container -->

		<?php post_navigation(); ?>

		

	<?php else : ?>

		<h2 class="page-title"><?php _e('Nothing Found','html5reset'); ?></h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
