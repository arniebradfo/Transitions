<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html><!-- header.php -->
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

<main class="main"><!--/ header.php -->