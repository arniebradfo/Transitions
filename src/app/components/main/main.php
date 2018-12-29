<?php
/**
 * The body template file
 *
 * TODO: Explain...
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

?>

<main class="main">

<?php
if( is_singular() ) {
	// print nothing, just skip to loop

} elseif ( is_front_page() && get_page_number() < 2 ){
	get_template_part('heading', 'home');

} elseif( is_search() ) {
	get_template_part('heading', 'search');

} elseif( is_archive() ) {
	get_template_part('heading', 'archive');

} else {
	get_template_part('heading', 'archive');

} ?>

<?php if( ! is_singular() ) 
	echo '<div class="post-list">'; ?>

	<?php if ( have_posts() ) : ?>
	
		<?php 
		while ( have_posts() ) : // start "the loop"
			the_post();
			get_template_part( 'post', get_post_format() );
		endwhile;
		?>

	<?php else : // if there are no posts ?>
		<p>there are no posts!!!</p>

	<?php endif; ?>

<?php if( ! is_singular() ) 
	echo '</div>'; ?>

<?php if( ! is_singular() && have_posts()) 
	get_template_part('pagination'); ?>

</main><!-- .main -->
