<?php 

global $page,    // int
	$numpages,   // int
	$multipage,  // bool
	$more;       // bool
	// var_dump_pre($page);
	// var_dump_pre($numpages);
	// var_dump_pre($page == $page);

$display_paginate_title = false; // TODO: how to set this to true?

if (paginate_links()) {

	$paginate_links = paginate_links(['prev_next'=>false]);

	if (get_next_posts_link()){
		$primary_link = get_next_posts_page_link();
		$primary_link_text = 'Next Page';
		$icon_name = 'Arrow_Down';

	} elseif (get_previous_posts_link()){
		$primary_link = get_pagenum_link(1);
		$primary_link_text = 'First Page';
		$icon_name = 'Arrow_Up';
	}

} elseif (wp_link_pages(['echo'=> 0])) {

	$paginate_links = wp_link_pages([
		'before'           => '',
		'after'            => '',
		'next_or_number'   => 'number',
		'separator'        => '',
		'echo'             => 0
	]);

	$href_regex = '/href=[\'\"]([^\'\"]*)[\'\"]/';

	if ($page == $numpages) { // this is the last page
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
		$primary_link_text = 'Next Page';
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
	
?>

<div class="pagination">
	<div class="pagination__column">
		<nav class="pagination__menu">

			<?php if ($display_paginate_title) : ?>
				<span class="pagination__title">
					<?php echo "Page $page of $numpages"; ?>
				</span>

			<?php elseif (isset($primary_link)) : ?>
				<a class="button pagination__primary-button" href="<?php echo esc_url($primary_link); ?>" >
					<?php echo $primary_link_text; ?>
					<?php echo trns_icon_component(['name'=>$icon_name, 'class'=>'button__icon']) ?>
				</a>

			<?php endif; ?>

			<span class="pagination__label">Go to page:</span>

			<?php echo $paginate_links; ?>

		</nav>
	</div>
</div>

<?php endif; ?>
