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
<header class="heading heading--post-full heading--<?php echo $featured_media_class_suffix; ?>">

	<div class="heading__wrapper">

		<a class="heading__site-title  button--large" 
			href="<?php echo esc_url( home_url( '/' ) ); ?>" 
			rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>

		<div class="heading__flex-splitter"></div>

		<?php if ( '' !== get_the_post_thumbnail() ): ?>
			<div class="heading__featured-media"> 
				<?php the_post_thumbnail( 'full', ['class'=>'heading__img jsTarget-parallax--top'] ); ?>
			</div>

		<?php else: ?>
			<div class="heading__featured-media heading__featured-media--empty"></div> 

		<?php endif; ?> 
	
		<div class="heading__meta">

			<time class="heading__meta-date" datetime="<?php the_time('c');?>">
				<?php the_date(); ?>
			</time>
			&#47;
			<a class="heading__meta-author" 
				href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
				<?php the_author(); ?>
			</a>
			
		</div>

		<h1 class="heading__title"><?php the_title(); ?></h1>

		<hr class="heading__rule" />

		<?php echo preg_replace( 
			'/<a\s/',
			'<a class="heading__tag button" ', // all links need classes
			get_the_tag_list('<p class="heading__tags">', ' ', '</p>')
		); ?>

	</div>

</header><!--/ heading-home.php -->
