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
<article <?php post_class('post '.(is_singular() ? 'post--full' : 'post--in-list jsTarget-eligibleTargetElement' )); ?> 
	id="post-<?php the_ID(); ?>">

	<?php 
		if ( is_page() )
			get_template_part('heading', 'page');	
		elseif ( is_singular() )
			get_template_part('heading', 'post'); 
		else 
			get_template_part('heading', 'postList'); 
	?>

	<?php if ( is_singular() ) : ?>

		<div class="post__content post__content--full jsTarget-loadDelay" id="post-content">

			<?php

			the_content(); 
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() )
				comments_template();

			?>
	
		</div>

		<footer class="jsTarget-loadDelay">
			
			<?php get_template_part('copyright', 'post'); ?>

			<?php if (is_user_logged_in())
				edit_post_link(
					'Edit this post',
					'<p class="post__edit ">',
					'</p>',
					null,
					'post__edit-button button button--outline'
				); ?>

			<?php if (trns_is_post_paginated()) : // post has pages ?>
				
				<?php if (!trns_is_last_page_of_post()) : // is not the last post ?>				
					<div class="post-pagination  post-pagination--titled">
						<div class="post-pagination__column">
							<div class="post-pagination__label">Next Page:</div>
							<h3 class="post-pagination__title"><?php the_title(); ?></h3>
						</div>

				<?php else: ?>
					<div class="post-pagination  post-pagination--last-page">

				<?php endif; ?>

					<?php trns_pagination_component(['next_page_number'=>true]); ?>
					
				</div>

		<?php endif; ?>

		</footer>



	<?php else : ?>

		<div class="post__content">
			<p>
				<?php the_excerpt(); ?>
			</p>
			<a class="post__primary-button button button--outline" href="<?php echo esc_url( get_permalink() ); ?>">
				Read more <?php echo trns_icon_component(['name'=>'Expand', 'class'=>'button__icon']) ?>
			</a>
		</div>

	<?php endif; ?>

</article><!--/ post.php -->
