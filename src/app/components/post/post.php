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

	<header class="heading heading__post">

		<p class="post__meta">
			<time class="post__meta-date" datetime="<?php the_time('c');?>"><?php the_date(); ?></time>
			&#47;
			<span class"post__meta-author"><?php the_author(); ?></span>
		</p>


		<?php if ( is_single() ) : ?>
			<h1 class="post__title"><?php the_title(); ?></h1>
			
		<?php elseif ( is_front_page() && is_home() ) : ?>
			<h3 class="post__title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title(); ?><a/></h3>

		<?php else : ?>
			<h2 class="post__title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title(); ?><a/></h2>

		<?php endif; ?>
		

		<hr class="post__title-rule" />
		<p><?php the_tags(''); ?> </p>

		<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'small' ); ?>
			</a>
		<?php endif; ?>

	</header>


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
