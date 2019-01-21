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

<!--heading-error.php-->
<header class="heading heading--error heading--lacks-featured-media">

	<div class="heading__wrapper">

		<a class="heading__site-title button--large" 
			href="<?php echo esc_url( home_url( '/' ) ); ?>" 
			rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>

		<div class="heading__flex-splitter"></div>		

		<div class="heading__featured-media heading__featured-media--empty"></div> 

		<div class="heading__meta">
			Error 404
		</div>

		<h1 class="heading__title">
			Page Not Found
		</h1>

		<!-- <hr class="heading__rule" /> -->
		
		<div class="heading__searchform" >
			<?php echo get_search_form(); ?>
		</div>
	</div>

</header><!--/heading-error.php-->
