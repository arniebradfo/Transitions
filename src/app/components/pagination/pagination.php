<?php 
/**
 * pagination component
 *
 * @link ???
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

// display_paginate_title makes a title 'Page n of x' appear instead of 'Next Page'
// next_page_number makes a title 'Page X' appear instead of 'Next Page'

function trns_pagination_component( $atts=[], $content=null, $tag='' ) {

	$next_page_number = ! empty( $atts['next_page_number'] );
	$display_paginate_title = ! empty( $atts['display_paginate_title'] );
	unset( $atts['display_paginate_title'], $atts['next_page_number'] );

	if (paginate_links()) { // in a list of pages or posts
		global $wp_query;

		$current_page = trns_get_page_number();
		$total_pages = trns_get_total_pages();

		$paginate_links = paginate_links(['prev_next'=>false]);

		if (get_next_posts_link()){
			$primary_link = get_next_posts_page_link(); 
			$primary_link_text = $next_page_number ? 'Page '.$current_page : 'Next Page';
			$icon_name = 'Arrow_Down';

		} elseif (get_previous_posts_link()){
			$primary_link = get_pagenum_link(1);
			$primary_link_text = 'First Page';
			$icon_name = 'Arrow_Up';
		}

	} elseif (wp_link_pages(['echo'=> 0])) { // on a paginated post or page

		global $page, $numpages;
		
		$current_page = $page;
		$total_pages = $numpages;

		$paginate_links = wp_link_pages([
			'before'           => '',
			'after'            => '',
			'next_or_number'   => 'number',
			'separator'        => '',
			'echo'             => 0
		]);

		$href_regex = '/href=[\'\"]([^\'\"]*)[\'\"]/';

		if ($current_page == $total_pages) { // this is the last page
			preg_match(
				$href_regex,
				$paginate_links,
				$primary_link 
			);
			$primary_link = $primary_link[1];
			$primary_link_text = 'First Page';
			$icon_name = 'Arrow_Up';

		} else { // this is not the last page		
			preg_match_all(
				$href_regex,
				wp_link_pages([
					'next_or_number'   => 'next',
					'echo'             => 0,			
				]),
				$primary_link 
			);
			$primary_link = end($primary_link[1]);
			$primary_link_text = $next_page_number ? 'Page '.($current_page+1) : 'Next Page';
			$icon_name = 'Arrow_Down';

		}
	}

	if (isset($paginate_links)) : 
		
		// add classes
		$paginate_links = preg_replace(
			'/(class=[\'\"])/',
			'$1pagination__link button button--icon ',
			$paginate_links
		); 
		// add .button--current class
		$paginate_links = preg_replace(
			'/(class=[\'\"][^\'\"]*current)/',
			'$1 button--current',
			$paginate_links
		); 
		// remove classes from .dots // ???
		$paginate_links = preg_replace(
			'/(class=[\'\"][^\'\"]*dots[^\'\"]*[\'\"])/',
			'class="pagination__link page-numbers dots"',
			$paginate_links
		); 
		
	?>

	<div <?php

		$atts['class'] = ! empty($atts['class']) ? "pagination {$atts['class']}" : 'pagination';
		foreach($atts as $att => $val)
			echo " $att=\"$val\""; // echo all attributes from the shortcode
		?>>
		<div class="pagination__column">
			<nav class="pagination__menu">

				<?php if ( $display_paginate_title ) : ?>
					<span class="pagination__title">
						<?php echo "Page $current_page of $total_pages"; ?>
					</span>

				<?php elseif (isset($primary_link)) : ?>
					<a class="button pagination__primary-button" href="<?php echo esc_url($primary_link); ?>" >
						<?php echo $primary_link_text; ?>
						<?php trns_icon_component(['name'=>$icon_name, 'class'=>'button__icon']) ?>
					</a>

				<?php endif; ?>

				<span class="pagination__label">Go to page:</span>

				<?php echo $paginate_links; ?>

			</nav>
		</div>
	</div>

	<?php endif; 

}

?>
