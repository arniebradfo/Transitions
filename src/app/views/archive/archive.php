<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


	<?php if ( have_posts() ) : ?>
			<?php
				the_archive_title( '<h1>', '</h1>' );
				the_archive_description( '<p>', '</p>' );
			?>
	<?php endif; ?>

	<?php
	if ( have_posts() ) :
	?>
		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
				* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
			get_template_part( 'post', get_post_format() );

		endwhile;

		the_posts_pagination();

	else : ?>

		<p>there are no posts!!!</p>

	<?php endif;
	?>

<?php
get_footer();
