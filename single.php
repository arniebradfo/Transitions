<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class('test') ?> id="post-<?php the_ID(); ?>">
			
			<header id="post-header" class="post-masthead">



				<div class="perfect-contain">
					<?php 
						$thumbID = get_post_thumbnail_id(get_the_ID());
						$thumbSrc = wp_get_attachment_image_src( $thumbID, 'full' )[0];
						$thumbWidth = wp_get_attachment_image_src( $thumbID, 'full' )[1];
					?>
					<img src="<?php echo $thumbSrc;?>" 
					     alt="<?php echo get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>" 
					     width="<?php echo $thumbWidth;?>" 
					     height="<?php echo wp_get_attachment_image_src( $thumbID, 'full' )[2];?>" 
					     class="" 
					     srcset="<?php
					            $output = '';
					            $sizesArray = array( 'imgXS', 'imgS', 'imgM', 'imgL', 'imgXL', 'img2XL', 'img3XL', 'img4XL' );
					            foreach ($sizesArray as $i) {
					            	$currentSrc = wp_get_attachment_image_src( $thumbID, $i );
					            	$output .=  ($currentSrc[3] !== false ?$currentSrc[0].' ' .$currentSrc[1].'w, ':'');
					            }
					            $output .=  $thumbSrc .' '.$thumbWidth.'w';
					            echo $output;
					            ?>" 
					     sizes="(max-width: <?php echo $thumbWidth;?>px) 100vw, <?php echo $thumbWidth;?>px"
					/>
				</div>

				<h1 class="entry-title">
					<?php the_title(); ?>
					<span> <?php echo get_post_custom_values( 'deck' )[0]; ?> </span>
				</h1>

				<footer class="post-meta-data">
					<p><?php posted_on(); ?></p>
					<p><?php _e('Posted in:','html5reset'); ?> <?php the_category(','); ?> </p>
					<?php the_tags('<p>' . __('Tags: ','html5reset'), ', ', '</p>'); ?>
				</footer>

				<!-- svg buttons -->

				<div class="icon-capsule info-toggle">
					<svg class="icon icon-info" >
						<use xlink:href="#icon-info"></use>
					</svg>
					<svg class="icon icon-close" >
						<use xlink:href="#icon-close"></use>
					</svg>
				</div>

				<div class="icon-capsule scroll-down">
					<svg class="icon icon-arrow-bottom">
						<use xlink:href="#icon-arrow-bottom"></use>
					</svg>
				</div>

			</header>

			

			<section id="post-content">
				
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => __('Pages: ','html5reset'), 'next_or_number' => 'number')); ?>
				
				<?php // the_tags( __('Tags: ','html5reset'), ', ', ''); ?>
			
				<?php // posted_on(); ?>

				<p id="post-content-rule"></p>

			</section>

			<div class="icon-capsule scroll-to-top">
				<svg class="icon icon-arrow-double-top">
					<use xlink:href="#icon-arrow-double-top"></use>
				</svg>
			</div>
			
			
		</article>

		<?php edit_post_link(__('Edit this entry','html5reset'), '<p>', '</p>'); ?>

		<?php get_template_part('part-adjacentposts'); ?>
		
	<?php endwhile; endif; ?>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>