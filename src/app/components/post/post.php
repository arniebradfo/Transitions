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
<article <?php post_class('post post--'.(is_singular() ? 'full' : 'in-list' )); ?> 
	id="post-<?php the_ID(); ?>">

	<?php 
		if ( is_page() )
			get_template_part('heading', 'page');	
		elseif ( is_singular() )
			get_template_part('heading', 'post'); 
		else 
			get_template_part('heading', 'postList'); 
	?>

	<div class="post__content">
		<?php
		if ( is_singular() ) {

			the_content(); 

			wp_link_pages();
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() )
				comments_template();

			if ( is_single() )
				get_template_part('copyright', 'post');

		} else {
			the_excerpt();
		} ?>
	</div>
	
	<?php if (! is_singular() ): ?>
		<a class="post__primary-button button button--emphasis" href="<?php echo esc_url( get_permalink() ); ?>">
			Read more
		</a>
	<?php endif; ?>

</article><!--/ post.php -->
