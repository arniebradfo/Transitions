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

?><!DOCTYPE html><!-- index.php -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="visually-hidden">
	<?php get_template_part('icon-defs'); ?>
</div>

<?php get_template_part('nav', 'primary'); ?>

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

<footer class="footer">

	<div class="footer__wrapper">

		<?php get_search_form(); ?>

		<?php wp_nav_menu( array(
			'theme_location'  => 'footer',
			'container_class' => 'footer__menu',
			'container'       => 'nav',
			'menu_class'      => 'menu footer__menu-list',
			'depth'           => 1
		)); ?>

	</div>

	<?php 
	if ( ! is_single() ) 
		get_template_part('copyright', 'footer'); 

	elseif ($adjacent_post = get_previous_post()) { 
		// TODO: option to go forwards or backwards with the adject post
		$posts = array($adjacent_post); 
		if (have_posts()) : while (have_posts()) : the_post() ;
			get_template_part('heading', 'postAdjacent');
		endwhile; endif;
	
	} ?>

</footer>

<?php wp_footer(); ?>

</body>
</html><!--/ index.php -->
