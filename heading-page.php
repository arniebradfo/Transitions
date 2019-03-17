<?php
/**
 * Displays post heading
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php 
	# this all takes place in 'the loop'
	$has_featured_media = '' !== get_the_post_thumbnail();
	$featured_media_class_suffix = ( $has_featured_media ? 'has' : 'lacks') . '-featured-media';
?>
<!-- heading-post.php -->
<header class="heading heading--page heading--<?php echo $featured_media_class_suffix; ?>" id="heading">

	<div class="heading__column">

		<a class="heading__site-title  button--large" 
			href="<?php echo esc_url( home_url( '/' ) ); ?>" 
			rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>

		<div class="heading__flex-splitter"></div>		

		<?php if ( $has_featured_media ): ?>
			<div class="heading__featured-media jsTarget-loadFadeIn"> 
				<?php the_post_thumbnail( 'full', ['class'=>'heading__img jsTarget-parallax--top'] ); ?>
			</div>

		<?php else: ?>
			<div class="heading__featured-media heading__featured-media--empty jsTarget-loadFadeIn"></div> 

		<?php endif; ?> 

		<h1 class="heading__title jsTarget-loadDelay"><?php the_title(); ?></h1>

		<hr class="heading__rule jsTarget-loadDelay" />

		<?php 
			$subtitle = get_post_meta(get_the_ID(), 'subtitle', true); 
			if ($subtitle):
		?>
		
			<p class="heading__subtitle jsTarget-loadDelay">
				<?php echo $subtitle; ?>
			</p>

		<?php endif; ?>

	</div>

	<?php trns_pagination_component([ 'class'=>'heading__pagination jsTarget-loadDelay', 'display_paginate_title'=>true ]); ?>

</header><!--/ heading-home.php -->
