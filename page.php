<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php the_content(); ?>

		<?php edit_post_link(__('Edit this entry','html5reset'), '<p>', '</p>'); ?>
		
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
<?php if (get_post_custom_values( 'script' )[0]): ?>
	<script src="<?php echo get_post_custom_values( 'script' )[0]; ?>"></script>
<?php endif; ?>


