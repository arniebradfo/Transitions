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
<?php $css_class_modifier = is_singular() ? '--post-page' : '--post-list' ; ?>
<header class="heading heading--post <?php echo 'heading'.$css_class_modifier ?>">

	<?php if ( is_singular() ) : ?>
		<div class="heading__wrapper">
			<a class="heading__site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
	<?php else : ?>
		<a class="heading__wrapper heading__wrapper--post-link" 
			href="<?php echo esc_url( get_permalink() ) ?>" 
			rel="bookmark">
	<?php endif; ?>

		<?php if ( '' !== get_the_post_thumbnail() ): ?>
			<div class="heading__featured-media"> 
				<?php the_post_thumbnail( 'small', ['class'=>'heading__img'] ); ?>
			</div>
		<?php endif; ?> 
	
		<p class="heading__meta">
			<time class="heading__meta-date" datetime="<?php the_time('c');?>">
				<?php the_date(); ?>
			</time>
			&#47;
			<?php # TODO: add author link? ?>
			<span class"heading__meta-author"><?php the_author(); ?></span>
		</p>

		<?php if ( is_single() ) : ?>
			<h1 class="heading__title"><?php the_title(); ?></h1>
			
		<?php elseif ( is_front_page() && is_home() ) : ?>
			<h3 class="heading__title"><?php the_title(); ?></h3>

		<?php else : ?>
			<h2 class="heading__title"><?php the_title(); ?></h2>

		<?php endif; ?>

		<hr class="heading__rule" />

		<?php if (!is_singular()) echo '</a>'; ?>

	<?php if ( is_singular() ) : ?>
		<?php the_tags('<p class="heading__tags">', ' ', '</p>'); ?>
		</div>
	<?php else : ?>
		</a>
		<?php the_tags('<p class="heading__tags">', ' ', '</p>'); ?>
	<?php endif; ?>	

</header><!--/ heading-home.php -->
