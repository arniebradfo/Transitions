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
<!-- index.php -->

	<?php
	if( is_singular() ) {
		// print nothing, just skip to loop

	} elseif ( is_home() && !is_front_page() ){
		get_template_part('heading', 'archive');

	} elseif( is_archive() ) {
		get_template_part('heading', 'archive');

	} elseif( is_search() ) {
		get_template_part('heading', 'search');

	} else {
		get_template_part('heading', 'home');

	} ?>

	<?php if( ! is_singular() ) 
		echo '<div class="post-list">'; ?>

		<?php if ( have_posts() ) : ?>
		
			<?php 
			while ( have_posts() ) : // start "the loop"
				the_post();
				get_template_part( 'post', get_post_format() );
			endwhile;

			the_posts_pagination();
			?>

		<?php else : // if there are no posts ?>
			<p>there are no posts!!!</p>

		<?php endif; ?>

	<?php if( ! is_singular() ) 
		echo '</div>'; ?>
	
<!--/ index.php -->
<?php

get_footer();
