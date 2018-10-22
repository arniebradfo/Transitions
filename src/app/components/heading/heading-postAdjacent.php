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
<header class="heading heading--post-full">

	<div class="heading__wrapper">

		<a class="heading__cover-link" 
			href="<?php echo esc_url( get_permalink() ) ?>" 
			rel="bookmark"></a>

		<?php if ( '' !== get_the_post_thumbnail() ): ?>
			<div class="heading__featured-media"> 
				<?php the_post_thumbnail( 'full', ['class'=>'heading__img'] ); ?>
			</div>

		<?php else: ?>
			<div class="heading__featured-media heading__featured-media--empty"></div> 

		<?php endif; ?> 
	
		<p class="heading__meta">

			<time class="heading__meta-date" datetime="<?php the_time('c');?>">
				<?php echo get_the_date(); ?>
			</time>
			&#47;
			<a class"heading__meta-author" 
				href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
				<?php the_author(); ?>
			</a>
			
		</p>

		<h1 class="heading__title"><?php the_title(); ?></h1>

		<hr class="heading__rule" />

		<?php the_tags('<p class="heading__tags">', ' ', '</p>'); ?>

		<a class="heading__next-button" 
			href="<?php echo esc_url( get_permalink() ) ?>" 
			rel="bookmark">
			Read more
		</a>

	</div>

</header><!--/ heading-home.php -->
