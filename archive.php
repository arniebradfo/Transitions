<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

	<?php if (have_posts()) : ?>

			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h2 class="page-title"><?php // _e('Archive for the','html5reset'); ?> <?php single_cat_title(); ?> <?php //_e('Category','html5reset'); ?></h2>

		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h2 class="page-title"><?php // _e('Posts Tagged','html5reset'); ?> <?php single_tag_title(); ?></h2>

		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2 class="page-title"><?php _e('Archive for','html5reset'); ?> <?php the_time('F jS, Y'); ?></h2>

		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2 class="page-title"><?php _e('Archive for','html5reset'); ?> <?php the_time('F, Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="page-title"><?php _e('Archive for','html5reset'); ?> <?php the_time('Y'); ?></h2>

		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="page-title"><?php _e('Author Archive','html5reset'); ?></h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="page-title"><?php _e('Blog Archives','html5reset'); ?></h2>
		
		<?php } ?>


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

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
