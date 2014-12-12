<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

 	<?php if ( is_front_page() && is_home() ) { 
	  // Default homepage ?>

	<?php } elseif ( is_front_page() ) { 
	  // static homepage ?>

	<?php } elseif ( is_home() && get_option( 'page_for_posts' ) ) { 
	  // blog page ?>
	  <h1 class="page-title"><?php echo get_the_title( get_option( 'page_for_posts' ) ); ?></h1>

	<?php } else { 
	  //everyting else ?>

	<?php } ?>

	<div class="post-links clearfix">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php get_template_part('part-postlinks'); ?>

	<?php endwhile; ?>
	</div> <!-- end the clearfix post-links container -->

	<?php post_navigation(); ?>

	<?php else : ?>

		<h2 class="page-title"><?php _e('Nothing Found','html5reset'); ?></h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>