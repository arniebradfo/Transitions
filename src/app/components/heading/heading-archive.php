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
<header class="heading heading--archive heading--lacks-featured-media" id="heading">

	<div class="heading__column">

		<a class="heading__site-title button--large" 
			href="<?php echo esc_url( home_url( '/' ) ); ?>" 
			rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>

		<div class="heading__flex-splitter"></div>		

		<div class="heading__featured-media heading__featured-media--empty"></div> 

		<!-- <div class="heading__meta">
			Page #<?php echo trns_get_page_number(); ?>
		</div> -->

		<h1 class="heading__title">
			<?php 
			if (is_home())
				echo 'All Posts';
			else
				echo get_the_archive_title(); 
			?>
		</h1>

		<?php the_archive_description( '<hr class="heading__rule" />', '' );
			# TODO: add class="heading__subtitle to the archive description" ?>

	</div>

	<?php trns_pagination_component([ 'class'=>'heading__pagination', 'display_paginate_title'=>true ]); ?>

</header><!--/heading-archive.php-->
