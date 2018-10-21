<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.2
 */

?>

<!-- post.php -->
<article <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">

	<?php get_template_part('heading', 'post'); ?>

	<div class="post__content">
		<?php
		if (is_single())
			the_content(); 
		else
			the_excerpt();
		?>
		<?php wp_link_pages(); ?>
	</div>

</article><!--/ post.php -->
