<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('post-link') ?> >
			<a href="<?php the_permalink() ?>" class="post-permalink"></a>

		<h2><?php the_title(); ?>
			<span> <?php echo get_post_custom_values( 'deck' )[0]; ?> </span>
		</h2>
		
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
			            $sizesArray = array( 'imgXS', 'imgS', 'imgM', 'imgSsq', 'imgL', 'imgXL', 'img2XL', 'img3XL', 'img4XL' );
			            foreach ($sizesArray as $i) {
			            	$currentSrc = wp_get_attachment_image_src( $thumbID, $i );
			            	$output .=  ($currentSrc[3] !== false ?$currentSrc[0].' ' .$currentSrc[1].'w, ':'');
			            }
			            $output .=  $thumbSrc .' '.$thumbWidth.'w';
			            echo $output;
			            ?>" 
			     sizes="(max-width: 750px) 100vw,
			            (max-width: 1000px) 50vw,
			            (max-width: 1500px) 33vw,
			            25vw
			           "
			/>
		</div>

		<picture>
			<!--[if IE 9]><video style="display: none;"><![endif]-->
			<?php $thumbID = get_post_thumbnail_id(get_the_ID()); ?>
			<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'imgSsq' )[0]; ?>" 	media="(min-width: 750px)">
			<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'imgM' )[0]; 	?>" 	media="(min-width: 500px)">
			<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'imgS' )[0]; 	?>" 	media="(min-width: 250px)">
			<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'imgXS' )[0];	?>" 	media="(min-width: 0px)">
			<!--[if IE 9]></video><![endif]-->
			<img srcset="<?php // ??? - not sure if its nessasary to put anything here - ??? ?>" alt="<?php echo get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>">
			<noscript><?php the_post_thumbnail('sizeM'); ?></noscript>
		</picture>

		<div class="image-overlay"></div>
		
		<footer class="post-meta-data">
			<p><?php posted_on(); ?></p>
			<p><?php _e('Posted in:','html5reset'); ?> <?php the_category(',') ?> </p>
			<?php the_tags('<p>' . __('Tags: ','html5reset'), ', ', '</p>'); ?>
		</footer>

		<div class="icon-capsule info-toggle" >
			<svg class="icon icon-info" >
				<use xlink:href="#icon-info"></use>
			</svg>
			<svg class="icon icon-close" >
				<use xlink:href="#icon-close"></use>
			</svg>
		</div>

	</article>