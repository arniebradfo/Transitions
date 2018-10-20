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

	<p class="footer__copyright">
		<?php get_template_part('logo'); ?>
		<small class="footer__copyright-text">
			&copy;<?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>
		</small>
	</p>

</footer>

<?php wp_footer(); ?>

</body>
</html><!--/ footer.php -->

