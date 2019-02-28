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
<header class="heading heading--error heading--lacks-featured-media" id="heading">

	<div class="heading__column">

		<a class="heading__site-title button--large" 
			href="<?php echo esc_url( home_url( '/' ) ); ?>" 
			rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>

		<div class="heading__flex-splitter"></div>		

		<div class="heading__featured-media heading__featured-media--empty"></div> 

		<div class="heading__meta jsTarget-loadDelay">
			Error 404
		</div>

		<h1 class="heading__title jsTarget-loadDelay">
			Page Not Found
		</h1>

		<!-- <hr class="heading__rule" /> -->
		
		<div class="heading__searchform jsTarget-loadDelay" >
			<?php echo get_search_form(); ?>
		</div>
	</div>

</header><!--/heading-error.php-->
