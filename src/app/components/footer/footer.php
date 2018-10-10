<?php
/**
 * The template for displaying the footer
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

</div><!-- .wrapper -->

<nav>
	<?php wp_nav_menu( array(
		'theme_location' => 'footer',
		'menu_id'        => 'footer-nav',
	)); ?>

	<?php get_search_form(); ?>
</nav>

<?php wp_footer(); ?>

</body>
</html>
