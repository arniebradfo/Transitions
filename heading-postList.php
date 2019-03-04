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
<header class="heading heading--post-list heading--interactive heading--<?php echo $featured_media_class_suffix; ?>">

	<div class="heading__column">

		<a class="heading__cover-link button--custom" 
			href="<?php echo esc_url( get_permalink() ) ?>" 
			rel="bookmark"></a>

		<?php if ( '' !== get_the_post_thumbnail() ): ?>
			<div class="heading__featured-media"> 
				<?php the_post_thumbnail( 'full', ['class'=>'heading__img'] ); ?>
			</div>
		<?php endif; ?> 

		<div class="heading__flex-splitter"></div>		
	
		<div class="heading__meta">
			
			<time class="heading__meta-date" datetime="<?php the_time('c');?>">
				<?php echo get_the_date(); ?>
			</time>
			&#47;
			<a class="heading__meta-author" 
				href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
				<?php the_author(); ?>
			</a>

			<?php if(post_password_required()) : ?>
				&#47;
				<small class="heading__meta-lock">
					Locked <?php echo trns_icon_component(['name'=>'Lock', 'class'=>'heading__meta-lock-icon']); ?>
				</small>
			<?php elseif(!empty($post->post_password)) : ?>
				&#47;
				<small class="heading__meta-lock">
					Unlocked <?php echo trns_icon_component(['name'=>'Unlock', 'class'=>'heading__meta-lock-icon']); ?>
				</small>
			<?php endif; ?> 
			
		</div>

		<h2 class="heading__title"><?php the_title(); ?></h2>

		<hr class="heading__rule" />

	</div>

	<?php // trns_the_tags('<p class="heading__tags">', ' ', '</p>', '', 'heading__tag button'); ?>
	<?php trns_the_categories('', '', '', 'heading__category button', 'heading__categories'); ?>

</header><!--/ heading-home.php -->
