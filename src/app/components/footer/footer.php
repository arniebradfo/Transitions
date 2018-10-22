<?php
/**
 * The template for doing the foot, as a verb
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.2
 */

?>
<!-- footer.php -->
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
</html><!--/ footer.php -->

