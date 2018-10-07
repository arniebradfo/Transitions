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

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'transitions-featured-image' ); ?>
		</a>
	<?php endif; ?>

	<div>
		<?php
		/* translators: %s: Name of current post */
		the_content(
			sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);
		?>
	</div>

</article><!-- #post-## -->
