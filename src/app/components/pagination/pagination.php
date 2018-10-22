<?php if (paginate_links()) : ?>

<div class="pagination">
	<nav class="pagination__menu">
		<?php if (get_next_posts_link()) : ?>
			<?php echo preg_replace(
				'/<a\s/', 
				'<a class="pagination__primary-button"', 
				get_next_posts_link('Next Page')
			); ?>
		<?php elseif (get_previous_posts_link()): ?>
			<a class="pagination__primary-button" href="<?php echo get_pagenum_link(1); ?>" >First Page</a>
		<?php endif; ?>
		<span class="pagination__label">Go to page:</span>
		<?php echo preg_replace(
			'/(class=[\'\"])/',
			'$1pagination__link ',
			paginate_links(['prev_next'=>false])
		); ?>
	</nav>
</div>

<?php endif; ?>
