<div class="pagination">

	<nav class="pagination__nav">
		<?php echo preg_replace(
			'/<a\s/', 
			'<a class="pagination__primary-button"', 
			get_next_posts_link('Next Page')
		); ?>
		<span class="pagination__label">Go to page:</span>
		<?php echo preg_replace(
			'/(class=[\'\"])/',
			'$1pagination__link ',
			paginate_links(['prev_next'=>false])
		); ?>
	</nav>
</div>