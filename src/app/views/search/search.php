<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'transitions' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<h1>
				Search Results for: 
				<?php get_search_query() ?>!!!
			</h1>
		<?php else : ?>
			<h1>Nothing Found!!!</h1>
		<?php endif; ?>
	</header><!-- .page-header -->

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'post', 'excerpt' );

			endwhile; // End of the loop.

			the_posts_pagination();

		else :
		?>

			<p>
				Search Again!!?
			</p>
			<?php
				get_search_form();

		endif;
		?>

<?php
get_footer();
