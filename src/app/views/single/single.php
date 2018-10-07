<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();

		get_template_part( 'post', get_post_format() );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

		the_post_navigation();

	endwhile; // End of the loop.
	?>

<?php
get_footer();
