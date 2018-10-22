<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<!--heading-archive.php-->
<header class="heading heading--archive">

	<div class="heading__wrapper">

		<a class="heading__site-title" 
			href="<?php echo esc_url( home_url( '/' ) ); ?>" 
			rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>

		<div class="heading__featured-media"></div>

		<p class="heading__meta">
			Page #<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
		</p>

		<?php the_archive_title( '<h1 class="heading__title">', '</h1>' ); ?>	

		<?php the_archive_description( '<hr class="heading__rule" />', '' );
			# TODO: add class="heading__subtitle to the archive description" ?>

	</div>

</header><!--/heading-archive.php-->
