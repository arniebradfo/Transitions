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
		if (is_singular()):

			the_content(); 

			wp_link_pages();
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		else:
			the_excerpt();
		?>
		<?php endif; ?>
	</div>

</article><!--/ post.php -->
