<?php
/**
 * Can't call it footer...
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

?>

<footer class="footer jsTarget-loadDelay" id="footer">

	<div class="footer__column">
		<div class="footer__items">

			<?php get_search_form(); ?>

			<?php trns_wp_nav_menu( array(
				'link_class'      => 'button footer__menu-link',
				'theme_location'  => 'footer',
				'container_class' => 'footer__menu',
				'container'       => 'nav',
				'menu_class'      => 'menu footer__menu-list',
				'depth'           => 1
			)); ?>

		</div>
	</div>

	<?php 
	if ( ! is_single() ) 
		get_template_part('copyright', 'footer'); 

	elseif ($adjacent_post = get_previous_post()) { 
		// TODO: option to go forwards or backwards with the adjacent post
		$posts = array($adjacent_post); 
		if (have_posts()) : while (have_posts()) : the_post() ;
			get_template_part('heading', 'postAdjacent');
		endwhile; endif;
	
	} ?>

</footer>

<?php wp_footer(); ?>
