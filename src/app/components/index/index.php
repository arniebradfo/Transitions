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

?><!DOCTYPE html>
<?php echo trns_ascii_logo(); ?>
<html <?php language_attributes(); ?>>

<?php get_header(); ?>

<!-- index.php -->
<body <?php body_class(); ?>>

	<script type="text/javascript" id="js-test">
		document.body.classList.add('jsState-stylePreload');
	</script>

	<div class="visually-hidden jsTarget-transitionEnd"></div>
	
	<div class="visually-hidden">
		<?php get_template_part('icon-defs'); ?>
	</div>

	<?php get_template_part('nav', 'primary'); ?>

	<?php get_template_part('main'); ?>

	<?php get_template_part('foot'); ?>

	<?php get_footer(); ?>

</body>

</html><!--/ index.php -->
