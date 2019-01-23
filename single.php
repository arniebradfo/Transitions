<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class('test') ?> id="post-<?php the_ID(); ?>">
				
				<?php the_content(); ?>

				<?php // wp_link_pages(array('before' => __('Pages: ','html5reset'), 'next_or_number' => 'number')); ?>
				
				<?php // the_tags( __('Tags: ','html5reset'), ', ', ''); ?>
			
				<?php // posted_on(); ?>
			
		</article>

		<?php edit_post_link(__('Edit this entry','html5reset'), '<p>', '</p>'); ?>

		<?php get_template_part('part-adjacentposts'); ?>
		
	<?php endwhile; endif; ?>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>