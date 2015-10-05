<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 * Template Name: About Page
 */
get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<h1 class="page-title"><?php the_title(); ?></h1>

	<article class="post" id="post-<?php the_ID(); ?>">

		<?php the_content(); ?>

		<div class="icon-capsule scroll-to-top">
			<svg class="icon icon-arrow-double-top">
				<use xlink:href="#icon-arrow-double-top"></use>
			</svg>
		</div>

	</article>

	<?php edit_post_link(__('Edit this entry','html5reset'), '<p>', '</p>'); ?>
		
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>

