<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>
	
	<h1 class="page-title">About</h1>

	<article class="post" id="post-<?php the_ID(); ?>">

		<header id="about-header" class="about-masthead">

			<picture class="perfect-contain">
				<!--[if IE 9]><video style="display: none;"><![endif]-->
				<?php $thumbID = get_post_thumbnail_id(); ?>
				<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'img2XL' )[0]; 	?>" 	media="(min-width: 3000px)">
				<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'img3XL' )[0]; 	?>" 	media="(min-width: 2000px)">
				<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'img4XL' )[0]; 	?>" 	media="(min-width: 1500px)">
				<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'imgXL' )[0];		?>" 	media="(min-width: 1000px)">
				<source srcset="<?php echo wp_get_attachment_image_src( $thumbID, 'imgL' )[0]; 		?>" 	media="(min-width: 0px)">
				<!--[if IE 9]></video><![endif]-->
				<img srcset="<?php // ??? - not sure if its nessasary to put anything here - ??? ?>" alt="<?php echo get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>">
				<noscript><?php the_post_thumbnail('full'); ?></noscript>
			</picture>

			<h1 class="entry-title">
				Hi, I'm James 
				<span>What can I do for you?</span>
			</h1>

			<!-- svg button -->
			<div class="icon-capsule scroll-down">
				<svg class="icon icon-arrow-bottom">
					<use xlink:href="#icon-arrow-bottom"></use>
				</svg>
			</div>

		</header>

		<?php the_content(); ?>

		<div class="icon-capsule scroll-to-top">
			<svg class="icon icon-arrow-double-top">
				<use xlink:href="#icon-arrow-double-top"></use>
			</svg>
		</div>

	</article>

	<?php edit_post_link(__('Edit this entry','html5reset'), '<p>', '</p>'); ?>