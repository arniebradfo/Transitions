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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		if ( is_single() ) {
			the_title( '<h1>', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	<p>Tagged: <?php the_tags() ?> </p>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'small' ); ?>
		</a>
	<?php endif; ?>

	<div>
		<?php // the_content(); ?>
		Lorem Ipsum
		<?php wp_link_pages(); ?>
	</div>

</article><!--/ post.php -->
