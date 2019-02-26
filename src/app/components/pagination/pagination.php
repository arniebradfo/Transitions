<?php if (paginate_links()) : ?>

<div class="pagination">
	<div class="pagination__wrapper">
		<nav class="pagination__menu">
			<?php if (get_next_posts_link()) : ?>
				<?php echo preg_replace(
					'/<a\s/', 
					'<a class="button pagination__primary-button"', 
					get_next_posts_link('Next Page')
				); ?>
			<?php elseif (get_previous_posts_link()): ?>
				<a class="button pagination__primary-button" href="<?php echo get_pagenum_link(1); ?>" >First Page</a>
			<?php endif; ?>
			<span class="pagination__label">Go to page:</span>
			<?php 
				$paginate_links = paginate_links(['prev_next'=>false]);
				$paginate_links = preg_replace(
					'/(<a\sclass=[\'\"])/',
					'$1pagination__link button button--icon ',
					$paginate_links
				); 
				$paginate_links = preg_replace( // for the current page
					'/(<span\saria-current=[\'\"]page[\'\"]\sclass=[\'\"])/',
					'$1pagination__link button button--icon button--current ',
					$paginate_links
				); 
				echo $paginate_links;
			?>
		</nav>
	</div>
</div>

<?php endif; ?>
