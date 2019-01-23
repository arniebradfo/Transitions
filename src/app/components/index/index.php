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

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<style type="text/css" id="critical-css">
		<?php echo file_get_contents(get_template_directory_uri()."/critical.css"); ?>
		.arniebradfo{ content:'All Killer. No Filler.'; }
	</style>
</head>

<!-- index.php -->
<body <?php body_class(); ?>>

	<script type="text/javascript" id="js-test">
		document.body.classList.add('jsState-styleUnloaded');
	</script>

	<div class="visually-hidden jsTarget-transitionEnd"></div>
	
	<div class="visually-hidden">
		<?php get_template_part('icon-defs'); ?>
	</div>

	<?php get_template_part('nav', 'primary'); ?>

	<?php get_template_part('main'); ?>

	<?php get_template_part('foot'); ?>

	<?php wp_footer(); ?>

</body>

</html><!--/ index.php -->
