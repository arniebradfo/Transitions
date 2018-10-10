<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

get_header(); 

?>

	<?php if ( is_home() && !is_front_page() ) : 
		// the "Homepage" is a static page and this is the "Posts page"  ?>
		<h1><?php single_post_title(); ?></h1>

	<?php elseif ( is_archive() ) : ?>
		<?php
			the_archive_title( '<h1>', '</h1>' );
			the_archive_description( '<p>', '</p>' );
		?>

	<?php elseif ( is_search() ) : ?>
		<h1>
			Search Results for: 
			<?php get_search_query() ?>!!!
		</h1>
		<p>
			Search Again!!?
			<?php get_search_form(); ?>
		</p>

	<?php else : // this is the "Latest Posts Page" ?>
		<?php get_template_part('heading', 'home'); ?>

	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
	
		<?php while ( have_posts() ) : // start "the loop"
			the_post();

			get_template_part( 'post', get_post_format() );

		endwhile;

		the_posts_pagination();

	else : // if there are no posts ?>

		<p>there are no posts!!!</p>

	<?php endif; ?>

<?php

get_footer();
