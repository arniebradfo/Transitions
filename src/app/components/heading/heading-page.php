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

<?php # this all takes place in 'the loop' ?>

<!-- heading-post.php -->
<header class="heading heading--page">

	<div class="heading__wrapper">

		<a class="heading__site-title" 
			href="<?php echo esc_url( home_url( '/' ) ); ?>" 
			rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>

		<div class="heading__flex-splitter"></div>		

		<?php if ( '' !== get_the_post_thumbnail() ): ?>
			<div class="heading__featured-media"> 
				<?php the_post_thumbnail( 'full', ['class'=>'heading__img'] ); ?>
			</div>

		<?php else: ?>
			<div class="heading__featured-media heading__featured-media--empty"></div> 

		<?php endif; ?> 

		<h1 class="heading__title"><?php the_title(); ?></h1>

		<hr class="heading__rule" />

		<?php 
			$subtitle = get_post_meta(get_the_ID(), 'subtitle', true); 
			if ($subtitle):
		?>
		
			<p class="heading__subtitle">
				<?php echo $subtitle; ?>
			</p>

		<?php endif; ?>

	</div>

</header><!--/ heading-home.php -->
