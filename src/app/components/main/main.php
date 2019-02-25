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

<main class="main" id="main">

<?php

$is_homepage = is_front_page() && get_page_number() < 2;

if( is_singular() ) {
	// print nothing, just skip to loop

} elseif ( $is_homepage ) { 
	get_template_part('heading', 'home');

} elseif( is_search() ) {
	get_template_part('heading', 'search');

} elseif( is_archive() ) {
	get_template_part('heading', 'archive');

} elseif( is_404() ) {
	get_template_part('heading', 'error');

} else { //
	get_template_part('heading', 'archive');

} ?>

<?php if ( $is_homepage ): ?>
	<section id="homepage-widgets" class="homepage-widgets">
		<?php dynamic_sidebar( 'homepage-widgets' ); ?>
	</section>
<?php endif; ?>

<?php if( ! is_singular() ) 
	echo '<div class="post-list" id="post-list">'; ?>

	<?php if ( have_posts() ) : ?>
	
		<?php 
		while ( have_posts() ) : // start "the loop"
			the_post();
			get_template_part( 'post', get_post_format() );
		endwhile;
		?>

	<?php else : // if there are no posts ?>
		<div class="post__content">
			<h2>Nothing matches the request</h2>
			<p>Sorry. Please try again.</p>
			<?php // echo get_search_form(); ?>
		</div>
	<?php endif; ?>

<?php if( ! is_singular() ) 
	echo '</div>'; ?>

<?php if( ! is_singular() && have_posts()) 
	get_template_part('pagination'); ?>

</main><!-- .main -->
